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


            <div class="container container-xl-custom pt-5">
                <div class="row">
                    <div class="col">
                        <p class="mb-1">SOMOS JRRSS</p>
                        <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">Envianos un Mensaje</h3>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-lg-7 pb-5">
                        <p>
                            Envía un mensaje para comunicarte con nosotros, deja tu información si deseas que nos
                            comuniquemos contigo o si solo deseas informarnos algo.
                        </p>

                        <form action="{{ route('web_subscriber') }}" method="POST"
                            class="contact-form custom-form-style-1">

                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                    <input type="text" placeholder="Nombres" value="" maxlength="125"
                                        class="form-control bg-color-tertiary" name="full_name" id="full_name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input type="text" placeholder="Número de teléfono" value="" maxlength="100"
                                        class="form-control bg-color-tertiary" name="phone" id="phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input type="email" placeholder="Dirección E-mail" value=""
                                        class="form-control bg-color-tertiary" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <textarea maxlength="5000" placeholder="Tu mensaje aqui..." data-msg-required="Por favor ingresa el mensaje."
                                        rows="5" class="form-control bg-color-tertiary" name="message" id="message" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <button type="submit" class="btn btn-primary rounded-0 py-3 px-5 font-weight-semibold">
                                        Enviar Ahora
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-5">
                        <div class="custom-card-style-2 card-contact-us mb-5">
                            <div class="m-4">
                                <div class="row flex-column px-5 pt-3 pb-4">
                                    <div class="row px-3 mb-3">
                                        <h3 class="text-secondary font-weight-bold text-capitalize my-3">Información de
                                            Contacto</h3>
                                        <p>Lorem inpsum dolor sit amet, consectetur adipiscing elit. Sed eget risus pora,
                                            tincidunt turpis at, intermedum tortor.</p>
                                    </div>
                                    <div class="row px-lg-3 pb-2 align-items-center">
                                        <div class="col-2 col-lg-1 px-1 text-center">
                                            <i class="fas fa-map-marker-alt text-8 text-secondary"></i>
                                        </div>
                                        <div class="col-10 col-lg-11">
                                            <h4 class="text-secondary font-weight-bold text-capitalize mb-0">Sede Principal
                                            </h4>
                                            <p class="mb-0">Av Saenz Peña 870-878. , Callao, Perú</p>
                                        </div>
                                    </div>
                                    <hr class="my-3 opacity-5">
                                    <div class="row px-lg-3 py-2 align-items-center">
                                        <div class="col-2 col-lg-1 px-1 text-center">
                                            <i class="fas fa-mobile-alt text-8 text-secondary"></i>
                                        </div>
                                        <div class="col-10 col-lg-11">
                                            <h4 class="text-secondary font-weight-bold text-capitalize mb-0">Teléfono</h4>
                                            <p class="mb-0"><a href="#" class="text-color-default">(+51) 999
                                                    999999</a></p>
                                        </div>
                                    </div>
                                    <hr class="my-3 opacity-5">
                                    <div class="row px-lg-3 py-2 align-items-center">
                                        <div class="col-2 col-lg-1 px-1 text-center">
                                            <i class="far fa-envelope text-7 text-secondary"></i>
                                        </div>
                                        <div class="col-10 col-lg-11">
                                            <h4 class="text-secondary font-weight-bold text-capitalize mb-0">E-mail</h4>
                                            <p class="mb-0"><a class="px-0 text-default"
                                                    href="mailto:mail@domain.com">ibi.jrrss@gmail.com</a></p>
                                        </div>
                                    </div>
                                    <hr class="my-3 opacity-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{ $difusion[3]->content }}" target="_blanck" class="btn btn-whatsapp">
                                                <div style="justify-content: space-between;">
                                                    <div style="float: left; font-size: 24px;">
                                                        <i class="fab fa-whatsapp"></i>
                                                    </div>
                                                    <div style="float: left; padding: 5px; font-size: 16px;">
                                                        &nbsp; ¡Canal de difusión JRRSS!
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
            <div id="googlemaps" class="google-map custom-map" style="text-align: center;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.7585025642!2d-77.13881422513082!3d-12.060130142149312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105cb908f14800b%3A0x9d3dece06a24733!2sAv%20Saenz%20Pe%C3%B1a%20870%2C%20Callao%2007001!5e0!3m2!1ses-419!2spe!4v1702736452376!5m2!1ses-419!2spe"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>
@endsection
