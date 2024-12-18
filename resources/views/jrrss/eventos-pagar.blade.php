@extends('layouts.jrrss')

@section('content')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->
        <div role="main" class="main">
            @if ($ticket)
                <div class="container-lg container-xl-custom pt-5">
                    <div class="row pb-4">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="custom-card-style-2 card-contact-us mb-5">
                                <div class="m-4">
                                    <div class="row flex-column px-5 pt-3 pb-4">
                                        <div class="row px-3 mb-3">
                                            <h3 class="text-secondary font-weight-bold text-capitalize my-3">
                                                {{ $ticket->event->title }}
                                            </h3>
                                            <p>Estimado(a) <b>{{ $ticket->full_name }}</b> estas a punto de adquirir
                                                <b>{{ $ticket->quantity }}
                                                    {{ $ticket->type->type_id }} por
                                                    S/.{{ $ticket->type->price }}.</b> c/u , dando un total de
                                                <b>S/.{{ $ticket->total }}.</b> dar clic en el siguiente botón
                                                para
                                                pagar. Gracias !
                                            </p>
                                        </div>
                                        <form class="contact-form custom-form-style-1" method="POST"
                                            action="{{ route('apisubscriber') }}" id="pageContactForm">
                                            <div class="row">
                                                <div class="form-group col">
                                                    {{-- <button data-loading-text="Loading..." id="submitPageContactButton"
                                                        class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold"
                                                        style="font-size: 14px;">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Comprar Ahora
                                                    </button> --}}
                                                    <div id="cardPaymentBrick_container"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            @else
                <div class="alert alert-primary" role="alert">
                    Ticket usado
                </div>
            @endif
        </div>
        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
    </div>
    @if ($preference_id)
        <script>
            const mp = new MercadoPago("{{ env('MERCADOPAGO_KEY') }}", {
                locale: 'es-PE'
            });
            const bricksBuilder = mp.bricks();
            const renderCardPaymentBrick = async (bricksBuilder) => {
                const settings = {
                    initialization: {
                        preferenceId: "{{ $preference_id }}",
                        amount: {{ $ticket->total }},
                        payer: {
                            firstName: "{{ $ticket->full_name }}",
                            lastName: "{{ $ticket->full_surnames }}",
                            email: "{{ $ticket->email }}",
                        },
                    },
                    customization: {
                        visual: {
                            style: {
                                customVariables: {
                                    theme: 'bootstrap',
                                }
                            }
                        },
                        paymentMethods: {
                            maxInstallments: 1,
                        }
                    },
                    callbacks: {
                        onReady: () => {
                            // callback llamado cuando Brick esté listo
                        },
                        onSubmit: (cardFormData) => {
                            //  callback llamado cuando el usuario haga clic en el botón enviar los datos
                            //  ejemplo de envío de los datos recolectados por el Brick a su servidor
                            return new Promise((resolve, reject) => {
                                fetch("{{ route('web_process_payment', $ticket->id) }}", {
                                        method: "PUT",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                        },
                                        body: JSON.stringify(cardFormData)
                                    })
                                    .then((response) => {
                                        if (!response.ok) {
                                            return response.json().then(error => {
                                                throw new Error(error.error);
                                            });
                                        }
                                        return response.json();

                                    })
                                    .then((data) => {
                                        if (data.status == 'approved') {
                                            window.location.href = data.url;
                                        } else {
                                            alert('No se pudo continuar el proceso');
                                            window.location.href = data.url;
                                        }
                                    })
                                    .catch((error) => {
                                        if (error instanceof SyntaxError) {
                                            // Si hay un error de sintaxis al analizar la respuesta JSON
                                            alert('Error al procesar el pago.');
                                        } else {
                                            // Mostrar la alerta con el mensaje de error devuelto por el backend
                                            alert(error.message);
                                        }
                                    })
                            });
                        },
                        onError: (error) => {
                            console.log(error)
                        },
                    },
                };
                window.cardPaymentBrickController = await bricksBuilder.create('cardPayment',
                    'cardPaymentBrick_container', settings);
            };
            renderCardPaymentBrick(bricksBuilder);
        </script>
    @endif
@endsection
