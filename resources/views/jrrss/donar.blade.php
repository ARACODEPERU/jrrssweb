@extends('layouts.jrrss')

@section('content')
    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            <section
                class="page-header bg-color-tertiary custom-page-header page-header-modern page-header-background page-header-background-sm parallax mt-0"
                data-plugin-parallax data-plugin-options="{'speed': 1.2}"
                data-image-src="{{ $banner->content }}">
                <div class="container">
                    <div class="row" style="padding: 80px 0px;">
                        {{-- <div class="col-md-12 align-self-center">
                            <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                <li class="active">Donar</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Donar</h1>
                        </div> --}}
                    </div>
                </div>
            </section>


            <div class="container container-xl-custom pt-5 ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-1">SOMOS JRRSS</p>
                                <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">FORMAS DE DAR EN PERÚ</h3>
                            </div>
                        </div>
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
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-1">SOMOS JRRSS</p>
                                <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">TU SEMILLA TIENE UN
                                    PROPÓSITO</h3>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 pb-5 ">

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lectus lacus, rutrum
                                    sit amet placerat et, bibendum nec mauris. Duis molestie purus eget placerat viverra.
                                </p>

                                <form class="custom-form-style-1" method="POST"
                                    action="{{ route('paypal_donate') }}" id="pageContactForm">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col">
                                            <input type="text" placeholder="Nombres Completos" value=""
                                                data-msg-required="Por favor ingresa tus nombres completos." maxlength="125"
                                                class="form-control bg-color-tertiary" name="full_name" id="full_name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <select name="currency" id="currency" class="form-control bg-color-tertiary">
                                                <option value="soles" selected>Soles</option>
                                                <option value="dolares">Dolares</option>
                                            </select>
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
                                                aria-label="Default select example" maxlength="125" name="donation_destinity_id"
                                                id="tipo" required>
                                                <option value="1">Diezmos</option>
                                                <option selected value="2">Ofrenda</option>
                                                <option value="2">Pacto</option>
                                                <option value="3">Primicias</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <button data-loading-text="Loading..." id="submitMercadoPago"
                                                class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold">Donar
                                                con Mercado Pago</button>
                                        </div>
                                        <div class="form-group col">
                                            <button data-loading-text="Loading..." id="submitPaypal"
                                                class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold" style="display: none">Donar
                                                con Paypal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script>
// Ejecutar código cuando se haya cargado completamente la página
window.addEventListener('load', function() {
        // Obtener elementos del DOM
const currencySelect = document.getElementById('currency');
const mercadoPagoButton = document.getElementById('submitMercadoPago');
const paypalButton = document.getElementById('submitPaypal');
  // Escuchar cambios en la selección de moneda
  currencySelect.addEventListener('change', function() {
    const selectedCurrency = currencySelect.value;

    // Mostrar u ocultar botones según la moneda seleccionada
    if (selectedCurrency == 'soles') {
      mercadoPagoButton.style.display = 'block';
      paypalButton.style.display = 'none';
    } else if (selectedCurrency == 'dolares') {
      mercadoPagoButton.style.display = 'none';
      paypalButton.style.display = 'block';
    }
  });
});
</script>



        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>
@endsection
