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
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="custom-card-style-2 card-contact-us mb-5">
                                <div class="m-4">
                                    <div class="row flex-column px-5 pt-3 pb-4">
                                        <div class="row px-3 mb-3">
                                            <h3 class="text-secondary font-weight-bold text-capitalize my-3">Título del Congreso
                                            </h3>
                                            <p>Estimado(a) <b>Jesús Anaya Aguirre</b> estas a punto de adquirir <b>03 Vip a S/.300</b>, dar clic en el siguiente botón para pagar. Gracias ! </p>
                                        </div>
                                        <form class="contact-form custom-form-style-1" method="POST"
                                            action="{{ route('apisubscriber') }}" id="pageContactForm">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <button data-loading-text="Loading..." id="submitPageContactButton"
                                                        class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold"
                                                        style="font-size: 14px;">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Comprar Ahora
                                                    </button>
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
            </div>
        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
    </div>

@endsection
