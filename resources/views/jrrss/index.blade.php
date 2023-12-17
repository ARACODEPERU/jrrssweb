@extends('layouts.jrrss')

@section('content')

    <div class="body">
        
        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->
        

        <div role="main" class="main">

            
            <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-vertical-center dots-align-right dots-orientation-portrait custom-dots-style-1 show-dots-hover show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{'autoplayTimeout': 7000}" data-dynamic-height="['650px','650px','650px','550px','500px']" style="height: 650px;">
                <div class="owl-stage-outer">
                    <div class="owl-stage">

                        <!-- Carousel Slide 1 -->
                        <div  class="owl-item position-relative overlay overlay-show overlay-op-3" style="background-image: url(themes/jrrss/assets/img/slider/SLIDE-01.jpg); background-size: cover; background-position: center;">
                            <!--
                            <div class="container position-relative z-index-3 h-100">
                                <div class="row align-items-center h-100">
                                    <div class="col pb-4">
                                        <h1 class="text-color-light font-weight-extra-bold text-13 line-height-2 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">SPECIALISTS</h1>
                                        <h2 class="text-color-light font-weight-extra-bold text-4-5 line-height-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">20 YEARS CARING ABOUT YOU</h2>
                                        <div class="d-inline-block">
                                            <p class="text-color-light custom-border-bottom-1 font-weight-light text-4-5 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">We are located in New York</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>

                        <!-- Carousel Slide 2 -->
                        <div  class="owl-item position-relative overlay overlay-show overlay-op-3" style="background-image: url(themes/jrrss/assets/img/slider/SLIDE-02.jpg); background-size: cover; background-position: center;">
                            <!--
                            <div class="container position-relative z-index-3 h-100">
                                <div class="row align-items-center h-100">
                                    <div class="col pb-4">
                                        <h1 class="text-color-light font-weight-extra-bold text-13 line-height-2 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">SPECIALISTS</h1>
                                        <h2 class="text-color-light font-weight-extra-bold text-4-5 line-height-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">20 YEARS CARING ABOUT YOU</h2>
                                        <div class="d-inline-block">
                                            <p class="text-color-light custom-border-bottom-1 font-weight-light text-4-5 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">We are located in New York</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
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
                                <h4 class="m-0 p-0">Discipular</h4>
                            </div>
                        </div>
                        <div class="col-xl-3 box-three bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200">
                            <div class="feature-box-info">
                                <h4 class="m-0 p-0">Afirmar</h4>
                            </div>
                        </div>
                        <div class="col-xl-3 box-four bg-color-dark appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
                            <div class="feature-box-info">
                                <h4 class="m-0 p-0">Enviar</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5 pt-3 pb-3">
                        <div class="col-md-8">
                            <p class="lead font-weight-normal">Aqui sigue mas contenido en el body</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non ornare arcu. Class aptent taciti sociosqu ad...</p>

                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <img src="img/demos/medical/gallery/gallery-1.jpg" alt class="img-fluid box-shadow-custom" /> 
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