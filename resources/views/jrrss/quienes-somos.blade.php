@extends('layouts.jrrss')

@section('content')

    <div class="body">
        
        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->
        

        <div role="main" class="main">
            
            <section class="page-header bg-color-tertiary custom-page-header page-header-modern page-header-background page-header-background-sm parallax mt-0" 
                     data-plugin-parallax data-plugin-options="{'speed': 1.2}" 
                     data-image-src="{{ asset('themes/jrrss/assets/img/demos/construction-2/page-header.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                <li class="active">¿Quienes Somos?</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">¿Quienes Somos?</h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container pt-4">


                <div class="row">
                    <div class="col">
                        <h4 class="mb-2 mt-5">Reseña Historica</h4>

                        <div class="process process-vertical py-4">
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">1</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.</p>
                                </div>
                            </div>
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" style="animation-delay: 600ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">2</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.</p>
                                </div>
                            </div>
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" style="animation-delay: 600ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">3</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.</p>
                                </div>
                            </div>
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">4</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor.</p>
                                </div>
                            </div>
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">5</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h4 class="mb-2 mt-5">Connecting Line</h4>

                        <div class="row process process-connecting-line my-5">
                            <div class="connecting-line appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" style="animation-delay: 100ms;"></div>
                            <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600" style="animation-delay: 600ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">1</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">First Step</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus nulla dui, in dapibus magna aliquam et.</p>
                                </div>
                            </div>
                            <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">2</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Second Step</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus nulla dui, in dapibus magna aliquam et.</p>
                                </div>
                            </div>
                            <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1000" style="animation-delay: 1000ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">3</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Third Step</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus nulla dui, in dapibus magna aliquam et.</p>
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