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
                                                    <!-- Accordion -->
                                                    <div class="accordion-payment">
                                                        <!-- Yape section -->
                                                        <div class="border rounded mb-3">
                                                            <button type="button" class="accordion-header w-100 text-start d-flex align-items-center justify-content-between px-4 py-3 border-0 bg-white fw-semibold" onclick="toggleAccordion('yape')">
                                                                <span class="d-flex align-items-center gap-2">
                                                                    <svg width="20" height="20" fill="#0d6efd" viewBox="0 0 24 24"><path d="M21 2H3a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm-7 13h-2V9h-2V7h4v8z"/></svg>
                                                                    Pagar con Yape
                                                                </span>
                                                                <svg class="accordion-arrow" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                                                </svg>
                                                            </button>
                                                            <div id="accordion-yape" class="accordion-content border-top px-4 py-3" style="display: none;">
                                                                <p class="small mb-3 text-muted">
                                                                    Abre tu app Yape, genera el código de aprobación/OTP para compras en línea y escríbelo aquí junto con tu celular.
                                                                </p>
                                                                <div class="row g-3">
                                                                    <div class="col-md-4">
                                                                        <input id="yapePhone" class="form-control" type="text" inputmode="numeric" maxlength="9" placeholder="Celular Yape">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input id="yapeOtp" class="form-control" type="text" inputmode="numeric" maxlength="6" placeholder="Codigo OTP">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input id="yapeEmail" class="form-control" type="email" value="{{ $ticket->email }}" placeholder="Correo">
                                                                    </div>
                                                                </div>
                                                                <button id="yapePayButton" type="button" class="btn btn-primary rounded-0 py-2 px-4 font-weight-semibold mt-3">Pagar con Yape</button>
                                                            </div>
                                                        </div>

                                                        <!-- Tarjeta section -->
                                                        <div class="border rounded mb-3">
                                                            <button type="button" class="accordion-header w-100 text-start d-flex align-items-center justify-content-between px-4 py-3 border-0 bg-white fw-semibold" onclick="toggleAccordion('card')">
                                                                <span class="d-flex align-items-center gap-2">
                                                                    <svg width="20" height="20" fill="#0d6efd" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V6h16v12zM6 10h12v2H6v-2z"/></svg>
                                                                    Pagar con Tarjeta
                                                                </span>
                                                                <svg class="accordion-arrow" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                                                </svg>
                                                            </button>
                                                            <div id="accordion-card" class="accordion-content border-top px-4 py-3" style="display: none;">
                                                                <div id="cardPaymentBrick_container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
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
            // Accordion toggle function
            let activeAccordion = null;
            function toggleAccordion(section) {
                const yapeContent = document.getElementById('accordion-yape');
                const cardContent = document.getElementById('accordion-card');

                if (activeAccordion === section) {
                    if (section === 'yape') yapeContent.style.display = 'none';
                    else cardContent.style.display = 'none';
                    activeAccordion = null;
                } else {
                    if (activeAccordion === 'yape') yapeContent.style.display = 'none';
                    else if (activeAccordion === 'card') cardContent.style.display = 'none';

                    if (section === 'yape') yapeContent.style.display = 'block';
                    else cardContent.style.display = 'block';
                    activeAccordion = section;
                }

                document.querySelectorAll('.accordion-arrow').forEach(el => el.style.transform = 'rotate(0deg)');
                if (activeAccordion === 'yape') {
                    document.querySelectorAll('.accordion-arrow')[0].style.transform = 'rotate(180deg)';
                } else if (activeAccordion === 'card') {
                    document.querySelectorAll('.accordion-arrow')[1].style.transform = 'rotate(180deg)';
                }
            }

            const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
                locale: 'es-PE'
            });
            const bricksBuilder = mp.bricks();
            const processYapePayment = async () => {
                const button = document.getElementById('yapePayButton');
                const phoneNumber = document.getElementById('yapePhone').value;
                const otp = document.getElementById('yapeOtp').value;
                const email = document.getElementById('yapeEmail').value;

                if (!phoneNumber || !otp || !email) {
                    Swal.fire('Datos incompletos', 'Ingresa celular, codigo OTP y correo.', 'warning');
                    return;
                }

                button.disabled = true;
                button.innerText = 'Procesando...';

                try {
                    const yape = mp.yape({ phoneNumber, otp });
                    const token = await yape.create();
                    const response = await fetch("{{ route('web_process_payment', $ticket->id) }}", {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            token: token.id || token,
                            transaction_amount: {{ $ticket->total }},
                            installments: 1,
                            payment_method_id: 'yape',
                            payer: { email },
                            payer_email: email
                        })
                    });

                    if (!response.ok) {
                        const error = await response.json();
                        throw new Error(error.error || 'Error al procesar Yape.');
                    }

                    const data = await response.json();
                    if (data.status == 'approved') {
                        window.location.href = data.url;
                        return;
                    }

                    Swal.fire({
                        icon: 'warning',
                        title: 'Pago no aprobado',
                        text: data.message || 'Mercado Pago no aprobÃ³ el pago. Puedes revisar los datos e intentar nuevamente.'
                    });
                } catch (error) {
                    Swal.fire('Error', error.message || 'Error al procesar Yape.', 'error');
                } finally {
                    button.disabled = false;
                    button.innerText = 'Pagar con Yape';
                }
            };
            document.getElementById('yapePayButton').addEventListener('click', processYapePayment);
            const renderCardPaymentBrick = async (bricksBuilder) => {
                const settings = {
                    initialization: {
                        amount: {{ $ticket->total }},
                        // payer: {
                        //     firstName: "{{ $ticket['full_name'] }}",
                        //     lastName: "{{ $ticket['full_surnames'] }}",
                        //     email: "{{ $ticket['email'] }}",
                        // },
                    },
                    customization: {
                        visual: {
                            style: {
                                theme: 'bootstrap',
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
                                            resolve();
                                            window.location.href = data.url;
                                        } else if (data.status == 'pending' || data.status == 'in_process') {
                                            resolve();
                                            Swal.fire({
                                                icon: 'info',
                                                title: 'Pago en proceso',
                                                text: data.message || 'Mercado Pago está revisando tu pago. Te avisaremos cuando se confirme.'
                                            }).then(() => {
                                                window.location.href = data.url;
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'warning',
                                                title: 'Pago no aprobado',
                                                text: data.message || 'Mercado Pago no aprobó el pago. Puedes revisar los datos e intentar nuevamente.'
                                            });
                                            reject(new Error(data.message || 'Pago no aprobado'));
                                        }
                                    })
                                    .catch((error) => {
                                        if (error instanceof SyntaxError) {
                                            // Si hay un error de sintaxis al analizar la respuesta JSON
                                            Swal.fire('Error', 'Error al procesar el pago.', 'error');
                                        } else {
                                            // Mostrar la alerta con el mensaje de error devuelto por el backend
                                            Swal.fire('Error', error.message, 'error');
                                        }
                                        reject(error);
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
