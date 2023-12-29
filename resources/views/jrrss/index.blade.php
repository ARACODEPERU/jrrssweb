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
                        <div class="col-xl-3 box-one bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
                            <div class="feature-box-info">
                                <h4 class="m-0 p-0">Evangelizar</h4>
                            </div>
                        </div>
                        <div class="col-xl-3 box-two bg-color-dark appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
                            <div class="feature-box-info">
                                <h4 class="m-0 p-0">Afirmar</h4>
                            </div>
                        </div>
                        <div class="col-xl-3 box-three bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200">
                            <div class="feature-box-info">
                                <h4 class="m-0 p-0">Discipular</h4>
                            </div>
                        </div>
                        <div class="col-xl-3 box-four bg-color-dark appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
                            <div class="feature-box-info">
                                <h4 class="m-0 p-0">Enviar</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br><br><br>

            <section>
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
                                <a href="#">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/servicios/01.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>Heading here</h3>
                                        <p>Description goes here</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="#">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/servicios/02.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>Heading here</h3>
                                        <p>Description goes here</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="#">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/servicios/03.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>Heading here</h3>
                                        <p>Description goes here</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <div class="ih-item square colored effect8 scale_down">
                                <a href="#">
                                    <div class="img">
                                        <img src="{{ asset('themes/jrrss/assets/img/servicios/04.jpg') }}" alt="img">
                                    </div>
                                    <div class="info">
                                        <h3>Heading here</h3>
                                        <p>Description goes here</p>
                                    </div>
                                </a>
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