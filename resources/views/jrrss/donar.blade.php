@extends('layouts.jrrss')

@section('content')
    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">


            <section>
                <img style="max-width: 100%; height: auto;" src="{{ $banner->content }}" alt="">
            </section>


            <div class="container container-xl-custom pt-5 ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-1">SOMOS JRRSS</p>
                                <<<<<<< HEAD <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">FORMAS
                                    DE DAR EN
                                    PERÚ</h3>
                                    =======
                                    <h3 class="font-weight-bold text-capitalize text-7 mb-3">FORMAS DE DAR EN PERÚ</h3>
                                    >>>>>>> 6315a77360bcfec73ac9b0835000d4fc1281e161
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>N° DE CUENTAS BBVA</h4>
                                <p>
                                    S/. CC: 0011-0193-0200407793-05
                                    <br>
                                    $. CC: 0011-0193-0200412460-04
                                </p>
                                <p>
                                    S/. CCI: 011-193-0002-00407793-05
                                    <br>
                                    $. CCI: 011-193-0002-00412460-04
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4>N° DE CUENTAS BCP</h4>
                                <p>
                                    S/. CC: 192-2949073-0-15
                                    <br>
                                    $. CC: 192-2669178-1-02
                                </p>
                                <p>
                                    S/. CCI: 002-192-002949073015-36
                                    <br>
                                    $. CCI: 002-192-002669178102-30
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4>N° DE CUENTAS INTERBANK</h4>
                                <p>
                                    S/. CC: 056-300320215-8
                                    <br>
                                    $. CC: 056-300320216-5
                                </p>
                                <p>
                                    S/. CCI: 003-056-003003202158-93
                                    <br>
                                    $. CCI: 003-056-003003202165-93
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4>PLIN ó YAPE</h4>
                                <img style="width: 100%;" src="{{ asset('themes/jrrss/assets/img/PLIN-YAPE.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-1">SOMOS JRRSS</p>
                                <h3 class="font-weight-bold text-capitalize text-7 mb-3">TU SEMILLA TIENE UN
                                    PROPÓSITO</h3>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 pb-5 ">

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lectus lacus, rutrum
                                    sit amet placerat et, bibendum nec mauris. Duis molestie purus eget placerat viverra.
                                </p>
                                <ul class="nav nav-tabs" style="margin-bottom: 50px">
                                    <li class="nav-item">
                                        <button onclick="changeFormPayment(1)" id="btnSoles" class="nav-link active"
                                            aria-current="page" href="#">SOLES</button>
                                    </li>
                                    <li class="nav-item">
                                        <button onclick="changeFormPayment(2)" id="btnPaypal" class="nav-link"
                                            href="#">DOLARES</button>
                                    </li>
                                </ul>
                                <div id="divFormMercadoPago">
                                    <form class="custom-form-style-1" method="POST"
                                        action="{{ route('web_donar_tarjeta') }}">
                                        @csrf
                                        <input type="hidden" value="soles" name="currency" id="currency" />
                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="text" placeholder="Nombres Completos" value=""
                                                    data-msg-required="Por favor ingresa tus nombres completos."
                                                    maxlength="125" class="form-control bg-color-tertiary" name="full_name"
                                                    id="full_name" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="number" placeholder="Monto a donar" value=""
                                                    data-msg-required="Por favor ingresa el monto que deseas donar."
                                                    maxlength="125" class="form-control bg-color-tertiary" name="amount"
                                                    id="amount" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <select class="form-select form-control bg-color-tertiary"
                                                    aria-label="Default select example" maxlength="125"
                                                    name="donation_destinity_id" id="tipo" required>
                                                    <option value="Diezmos">Diezmos</option>
                                                    <option selected value="Ofrenda">Ofrenda</option>
                                                    <option value="Pacto">Pacto</option>
                                                    <option value="Primicias">Primicias</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <button data-loading-text="Loading..." id="submitPaypal"
                                                    class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold">Donar
                                                    con Mercado Pago</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="divFormPaypal" style="display: none">
                                    <form class="custom-form-style-1" method="POST" action="{{ route('paypal_donate') }}"
                                        id="pageContactForm">
                                        @csrf
                                        <input type="hidden" value="dolares" name="currency" id="currency" />
                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="text" placeholder="Nombres Completos" value=""
                                                    data-msg-required="Por favor ingresa tus nombres completos."
                                                    maxlength="125" class="form-control bg-color-tertiary"
                                                    name="full_name" id="full_name" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="number" placeholder="Monto a donar" value=""
                                                    data-msg-required="Por favor ingresa el monto que deseas donar."
                                                    maxlength="125" class="form-control bg-color-tertiary" name="amount"
                                                    id="amount" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <select class="form-select form-control bg-color-tertiary"
                                                    aria-label="Default select example" maxlength="125"
                                                    name="donation_destinity_id" id="tipo" required>
                                                    <option value="1">Diezmos</option>
                                                    <option selected value="2">Ofrenda</option>
                                                    <option value="3">Pacto</option>
                                                    <option value="4">Primicias</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <button data-loading-text="Loading..." id="submitPaypal"
                                                    class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold">Donar
                                                    con Paypal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Ejecutar código cuando se haya cargado completamente la página
                function changeFormPayment(type) {
                    const divMercadoPago = document.getElementById('divFormMercadoPago');
                    const divPaypal = document.getElementById('divFormPaypal');
                    const btnSoles = document.getElementById('btnSoles');
                    const btnPaypal = document.getElementById('btnPaypal');

                    if (type === 1) {
                        // Mostrar MercadoPago y ocultar PayPal
                        divMercadoPago.style.display = 'block';
                        divPaypal.style.display = 'none';

                        // Agregar clase 'active' a MercadoPago y quitarla de PayPal
                        btnSoles.classList.add('active');
                        btnPaypal.classList.remove('active');
                    } else if (type === 2) {
                        // Mostrar PayPal y ocultar MercadoPago
                        divMercadoPago.style.display = 'none';
                        divPaypal.style.display = 'block';

                        // Agregar clase 'active' a PayPal y quitarla de MercadoPago
                        btnPaypal.classList.add('active');
                        btnSoles.classList.remove('active');
                    }
                }
            </script>



        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>
@endsection
