@extends('layouts.jrrss')

@section('content')
    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->
            <div role="main" class="main">

                <div class="ara_centrado_total">
                    <img style="max-width: 100%; height: auto;" src="{{ asset('themes/jrrss/assets/img/page-header/evento-1.jpg') }}">
                </div>


                <div class="container container-xl-custom pt-5">
                    <div class="row pb-4">
                        <div class="col-lg-5">
                            <div class="custom-card-style-2 card-contact-us mb-5">
                                <div class="m-4">
                                    <div class="row flex-column px-5 pt-3 pb-4">
                                        <div class="row px-3 mb-3">
                                            <h3 class="text-secondary font-weight-bold text-capitalize my-3">Registro Online
                                            </h3>
                                            <p>Lorem inpsum dolor sit amet, consectetur adipiscing elit. Sed eget risus
                                                pora,
                                                tincidunt turpis at, intermedum tortor.</p>
                                        </div>
                                        <form class="contact-form custom-form-style-1" method="POST"
                                            action="{{ route('apisubscriber') }}" id="pageContactForm">


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
                                                    <input type="text" placeholder="Teléfono" value=""
                                                        data-msg-required="Por favor ingresa tu número de teléfono."
                                                        maxlength="100" class="form-control bg-color-tertiary"
                                                        name="phone" id="phone" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <input type="email" placeholder="Dirección E-mail" value=""
                                                        data-msg-required="Por favor ingresa tu correo electrónico."
                                                        data-msg-email="Please enter a valid email address." maxlength="100"
                                                        class="form-control bg-color-tertiary" name="email" id="email"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                        <input class="form-control bg-color-tertiary" list="datalistOptions" id="exampleDataList" placeholder="Desde que ciudad viene?">
                                                        <datalist id="datalistOptions">
                                                            <option value="San Francisco">
                                                            <option value="New York">
                                                            <option value="Seattle">
                                                            <option value="Los Angeles">
                                                            <option value="Chicago">
                                                        </datalist>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <button data-loading-text="Loading..." id="submitPageContactButton"
                                                        class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Comprar Ahora
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
    </div>

@endsection
