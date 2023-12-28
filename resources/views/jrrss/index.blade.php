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

            <section class="section border-0 bg-transparent m-0 py-5">
                <div class="container-fluid">
                    <div class="row px-4">

                        <div class="owl-carousel owl-theme full-width nav-style-1 nav-arrows-thin nav-font-size-lg custom-nav-1 custom-nav-1-pos-2 p-relative mb-0 owl-loaded owl-drag owl-carousel-init" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 4}}, 'loop': true, 'nav': true, 'dots': false, 'margin': 40}" style="height: auto;">
                            
                            
                            
                            
                            
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-1871px, 0px, 0px); transition: all 0s ease 0s; width: 6081px;">
                            
                                <div class="owl-item cloned" style="width: 427.75px; margin-right: 40px;">
                                    <div>
                                        <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                            <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                                <img src="{{ asset('themes/jrrss/assets/img/demos/dentist/services/service-2.jpg') }}" class="img-fluid" alt="">
                                                <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                                    <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                        <span class="thumb-info-inner">
                                                            <h4 class="text-color-light text-5 font-weight-bold">Dental Cleaning</h4>
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                                    <span class="thumb-info-swap-content-wrapper">
                                                        <span class="thumb-info-inner text-start ps-5">
                                                            <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="{{ asset('themes/jrrss/assets/img/demos/dentist/icons/icon-5.svg') }}">
                                                        </span>
                                                        <span class="thumb-info-inner text-2">
                                                            <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                            <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            <div class="owl-item cloned" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-3.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Root Canal</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-6.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item cloned" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-4.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Oral Surgery</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-7.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item cloned" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-2.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Dental Cleaning</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-5.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item active" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-1.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Dental Exams</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-4.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item active" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-2.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Dental Cleaning</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-5.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item active" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-3.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Root Canal</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-6.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item active" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-4.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Oral Surgery</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-7.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-2.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Dental Cleaning</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-5.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item cloned" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-1.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Dental Exams</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-4.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item cloned" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-2.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Dental Cleaning</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-5.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item cloned" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-3.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Root Canal</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-6.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div><div class="owl-item cloned" style="width: 427.75px; margin-right: 40px;"><div>
                                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-slow-image-zoom-hover thumb-info-swap-content anim-hover-inner-wrapper">
                                    <span class="thumb-info-wrapper overlay overlay-op-3 overlay-show overflow-hidden">
                                        <img src="img/demos/dentist/services/service-4.jpg" class="img-fluid" alt="">
                                        <span class="thumb-info-title bg-transparent w-100 mw-100 p-0 top-0 p-5">
                                            <span class="anim-hover-inner-translate-bottom-20px transition-2ms d-inline-block">
                                                <span class="thumb-info-inner">
                                                    <h4 class="text-color-light text-5 font-weight-bold">Oral Surgery</h4>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="thumb-info-title bottom-30 bg-transparent w-100 mw-100 p-0">
                                            <span class="thumb-info-swap-content-wrapper">
                                                <span class="thumb-info-inner text-start ps-5">
                                                    <img style="max-width: 60px;" height="60" width="60" class="transform-none mb-3" src="img/demos/dentist/icons/icon-7.svg">
                                                </span>
                                                <span class="thumb-info-inner text-2">
                                                    <p class="px-5 text-4 text-lg-2 opacity-7 font-weight-medium text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere elit in massa congue congue. Ut ornare fermentum sem, vitae port.</p>
                                                    <a href="demo-dentist-services-details.html" class="btn btn-primary btn-arrow-effect-1 py-2 px-3 ms-5 mb-3 text-3 text-lg-1 ls-0 border-0">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"></button><button type="button" role="presentation" class="owl-next"></button></div><div class="owl-dots disabled"></div></div>

                    </div>
                </div>
            </section>



        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
        


    </div>

@endsection