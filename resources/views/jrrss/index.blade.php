@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">


            <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-vertical-center dots-align-right dots-orientation-portrait custom-dots-style-1 show-dots-hover show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{'autoplayTimeout': 7000}" data-dynamic-height="['650px','650px','650px','550px','500px']" style="height: 650px;">
                <div class="owl-stage-outer">
                    <div class="owl-stage ara_centrado_total">

                        <div  class="owl-item position-relative overlay overlay-show overlay-op-3" style="background-image: url({{ asset('themes/jrrss/assets/img/slider/SLIDE-01.jpg') }}); background-size: cover; background-position: center;">

                        </div>

                        <div  class="owl-item position-relative overlay overlay-show overlay-op-3" style="background-image: url({{ asset('themes/jrrss/assets/img/slider/SLIDE-02.jpg') }}); background-size: cover; background-position: center;">

                        </div>

                    </div>
                </div>
                <div class="owl-dots mb-5">
                    <button role="button" class="owl-dot active"><span></span></button>
                    <button role="button" class="owl-dot"><span></span></button>
                </div>
            </div>


            <section class="section-custom-medical">
                <div class="container">
                    <div class="row medical-schedules">
                        <div class="col-xl-3 box-two bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
                            <div class="feature-box-info">
                                <h3 class="m-0 p-0" style="color: #fff;">{{ $home[0]->content }}</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 box-two bg-color-dark appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
                            <div class="feature-box-info">
                                <h3 class="m-0 p-0" style="color: #fff;">{{ $home[1]->content }}</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 box-two bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200">
                            <div class="feature-box-info">
                                <h3 class="m-0 p-0" style="color: #fff;">{{ $home[2]->content }}</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 box-two bg-color-dark appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
                            <div class="feature-box-info">
                                <h3 class="m-0 p-0" style="color: #fff;">{{ $home[3]->content }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br><br><br>

            <section style="padding-bottom: 90px;">
                <div class="container">
                    <div class="row">
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-11 col-xl-10 text-center">
                                    <h2 class="custom-highlight-text-1 d-inline-block line-height-5
                                                text-4 positive-ls-3 font-weight-medium text-color-primary
                                                mb-2 appear-animation animated fadeInUpShorter appear-animation-visible"
                                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300"
                                                style="animation-delay: 1300ms;">
                                                #SOMOSJRRSS
                                    </h2>
                                    <h3 class="text-9 line-height-3 text-transform-none font-weight-semibold mb-4
                                        appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500"
                                        style="animation-delay: 1500ms;">
                                        Nuestras Reuniones
                                    </h3>
                                    <p class="text-3-5 pb-3 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter"
                                        data-appear-animation-delay="1900"
                                        style="animation-delay: 1900ms;">
                                        Cras a elit sit amet leo accumsan volutpat. Suspendisse hendreriast ehicula leo, vel efficitur felis ultrices non. Cras a elit sit amet leo acun volutpat. Suspendisse hendrerit vehicula leo, vel efficitur fel.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="" data-bs-toggle="modal" data-bs-target="#reuniones">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/servicios/01.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>CASA DE ORACIÓN PARA LAS NACIONES</h3>
                                        <br>
                                        <h4 style="padding: 10px;"><b>Sede Principal: Av. Gral. Salaverry 2599, San Isidro 15076</b> </h4>
                                        <p style="margin-top: -25px;">
                                            <b>Horario de Reunión:</b> Lunes 07:00 pm
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="" data-bs-toggle="modal" data-bs-target="#reuniones">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/servicios/02.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>NOCHES DE AVIVAMIENTO</h3>
                                        <br>
                                        <h4 style="padding: 10px;"><b>Sede Principal: Av. Gral. Salaverry 2599, San Isidro 15076</b> </h4>
                                        <p style="margin-top: -25px;">
                                            <b>Horario de Reunión:</b> Miercoles 07:00 pm
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="" data-bs-toggle="modal" data-bs-target="#reuniones">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/servicios/03.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>RMNT</h3>
                                        <br>
                                        <h4 style="padding: 10px;"><b>Sede Principal: Av. Gral. Salaverry 2599, San Isidro 15076</b> </h4>
                                        <p style="margin-top: -25px;">
                                            <b>Horario de Reunión:</b> Viernes 07:00 pm
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="" data-bs-toggle="modal" data-bs-target="#reuniones">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/servicios/04.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>DOMINGOS DE GLORIA</h3>
                                        <br>
                                        <h4 style="padding: 10px;"><b>Sede Principal: Av. Gral. Salaverry 2599, San Isidro 15076</b> </h4>
                                        <p style="margin-top: -25px;">
                                            <b>Horario de Reunión:</b> Domingos: 10:00 am | 06:00 pm
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible"
                    data-appear-animation="fadeIn" data-plugin-parallax="" data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                    data-image-src="{{ asset('themes/jrrss/assets/img/parallax/parallax_index.jpg') }}" style="position: relative; overflow: hidden; animation-delay: 100ms;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 text-center">
                                <h2 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                    Y en su vestidura y en su muslo tiene escrito este nombre: REY DE REYES Y SEÑOR DE SEÑORES.
                                </h2>
                                <p class="text-color-light opacity-7 text-3 px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms;">
                                    Apocalipsis 19:16
                                </p>
                            </div>
                        </div>
                    </div>
            </section>

            <section style="padding: 100px 0px 100px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-11 col-xl-10 text-center">
                                    <h2 class="custom-highlight-text-1 d-inline-block line-height-5
                                                text-4 positive-ls-3 font-weight-medium text-color-primary
                                                mb-2 appear-animation animated fadeInUpShorter appear-animation-visible"
                                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300"
                                                style="animation-delay: 1300ms;">
                                                #SOMOSJRRSS
                                    </h2>
                                    <h3 class="text-9 line-height-3 text-transform-none font-weight-semibold mb-4
                                        appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500"
                                        style="animation-delay: 1500ms;">
                                        Ministerios
                                    </h3>
                                    <p class="text-3-5 pb-3 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter"
                                        data-appear-animation-delay="1900"
                                        style="animation-delay: 1900ms;">
                                        Cras a elit sit amet leo accumsan volutpat. Suspendisse hendreriast ehicula leo, vel efficitur felis ultrices non. Cras a elit sit amet leo acun volutpat. Suspendisse hendrerit vehicula leo, vel efficitur fel.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="{{ route('web_rmnt') }}">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/servicios/03.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>RMNT</h3>
                                        <br>
                                        <p style="margin-top: -25px;">
                                            <b>Ministerio de Jovenes y Adolescentes</b>
                                        </p>
                                        <button class="btn btn-dark">Ingresar</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="{{ route('web_kids') }}">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/kids/04.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>KIDS</h3>
                                        <br>
                                        <p style="margin-top: -25px;">
                                            <b>Ministerio de Niños</b>
                                        </p>
                                        <button class="btn btn-dark">Ingresar</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="{{ route('web_ecelt') }}">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/ecelt/01.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>EL CIELO EN LA TIERRA</h3>
                                        <br>
                                        <p style="margin-top: -25px;">
                                            <b>Ministerio de Alabanza</b>
                                        </p>
                                        <button class="btn btn-dark">Ingresar</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible"
                    data-appear-animation="fadeIn" data-plugin-parallax="" data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                    data-image-src="{{ asset('themes/jrrss/assets/img/parallax/parallax_index.jpg') }}" style="position: relative; overflow: hidden; animation-delay: 100ms;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 text-center">
                                <h2 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                    UN ENCUENTRO CON DIOS
                                </h2>
                                <p class="text-color-light opacity-7  px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms; font-size: 18px;">
                                    Si eres nuevo en la iglesia y te gustaría conocer más de Dios.
                                </p>
                                <br>
                                <button class="btn btn-primary" style="font-size: 16px;"  data-bs-toggle="modal" data-bs-target="#contacto">
                                    <i class="fa fa-edit"></i> Escribenos
                                </button>
                            </div>
                        </div>
                    </div>
            </section>


            <section style="padding: 90px 0px 90px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <div class="col-md-6" style="padding: 15px;">
                                    <h2 class="custom-highlight-text-1 d-inline-block line-height-5
                                                text-4 positive-ls-3 font-weight-medium text-color-primary
                                                mb-2 appear-animation animated fadeInUpShorter appear-animation-visible"
                                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300"
                                                style="animation-delay: 1300ms;">
                                                #SOMOSJRRSS
                                    </h2>
                                    <h3 class="text-9 line-height-3 text-transform-none font-weight-semibold mb-4
                                        appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500"
                                        style="animation-delay: 1500ms;">
                                        Suscribete a la agenda JRRSS
                                    </h3>
                                    <p class="text-3-5 pb-3 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter"
                                        data-appear-animation-delay="1900"
                                        style="animation-delay: 1900ms;">
                                        ¡Te enviaremos todo lo que sucede cada semana en JRRSS para que no te pierdas de nada!
                                    </p>

                                    <form class="contact-form custom-form-style-1" method="POST" action="{{ route('apisubscriber') }}" id="pageContactForm">
                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="text" placeholder="Nombres Completos" value="" data-msg-required="Por favor ingresa tus nombres completos." maxlength="125" class="form-control bg-color-tertiary" name="full_name" id="full_name" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="email" placeholder="Dirección E-mail" value="" data-msg-required="Por favor ingresa tu correo electrónico." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control bg-color-tertiary" name="email" id="email" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <button data-loading-text="Loading..." id="submitPageContactButton" class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold" style="font-size: 14px;" >Enviar Ahora</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 ara_centrado_total" style="padding: 15px;">
                                    <img style="width: 98%" src="{{ asset('themes/jrrss/assets/img/celular.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

@endsection
