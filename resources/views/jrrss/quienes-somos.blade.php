@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}" class="view-pc"
                style="position: relative; height: 310px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                    src="{{ asset('storage/' . $banner->content ?? '') }}" alt="Banner Quiénes Somos">
            </section>

            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}" class="view-movile"
                style="position: relative; height: 80px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                    src="{{ asset('storage/' . $banner->content ?? '') }}" alt="Banner Quiénes Somos">
            </section>

            <div class="container-lg" style="padding: 30px 20px 60px 20px;">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <h2>
                            <b  style="font-weight: 600;">{{ $presentacion[0]->content ?? 'Quiénes Somos' }}</b>
                        </h2>
                        <p style="padding: 0px;">
                            {{ $presentacion[1]->content ?? '' }}
                        </p>
                    </div>
                    <div class="col-md-6 ara_centrado_total">
                        <img style="width: 100%;" src="{{ asset('storage/' . ($presentacion[2]->content ?? '')) }}" alt="Presentación">
                    </div>
                </div>
            </div>


            {{-- <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible"
                    data-appear-animation="fadeIn" data-plugin-parallax="" data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                    data-image-src="{{asset('storage/' . $parallax[0]->content ?? '')   }}" style="position: relative; overflow: hidden; animation-delay: 100ms;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 text-center">
                                <h2 class="text-color-light font-weight-bold custom-tertiary-font mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" 
                                    style="animation-delay: 200ms; font-size: 60px; line-height: 60px; font-family: 'Montserrat', serif !important; ">
                                    {{ $parallax[1]->content ?? '' }}
                                </h2>
                                <p class="text-color-light opacity-7 text-3 px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms;">
                                    {{ $parallax[2]->content ?? '' }}
                                </p>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
            </section> --}}

            {{-- INICIO: NUEVA PROPUESTA (GLASSMORPHISM) --}}
            <style>
                .glass-card {
                    background: rgba(255, 255, 255, 0.1);
                    backdrop-filter: blur(10px);
                    -webkit-backdrop-filter: blur(10px);
                    border: 1px solid rgba(255, 255, 255, 0.2);
                    border-radius: 20px;
                    padding: 3rem;
                    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                }
            </style>
            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 d-flex align-items-center appear-animation"
                data-appear-animation="fadeIn"
                data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                data-image-src="{{ asset('storage/' . ($parallax[0]->content ?? '')) }}"
                style="min-height: 500px;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-8">
                            <div class="glass-card text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                <h2 class="text-white font-weight-bold text-9 mb-3" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5); font-family: 'Montserrat', serif !important;">
                                    {{ $parallax[1]->content ?? '' }}
                                </h2>
                                <div class="divider divider-small divider-small-center divider-light mb-4">
                                    <hr style="width: 50px; border-top: 3px solid #fff; opacity: 1;">
                                </div>
                                <p class="text-white text-4 mb-0 font-weight-light" style="line-height: 1.8; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                                    {{ $parallax[2]->content ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- FIN: NUEVA PROPUESTA --}}

            <div class="container-lg pt-4">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-2 mt-5">{{ $resenas[0]->item->content ?? 'Reseña Histórica' }}</h4>

                        <div class="process process-vertical py-4">
                            {{-- Usamos slice(1) para saltar el título y evitar el if dentro del loop --}}
                            @foreach ($resenas->slice(1) as $resena)
                                <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                    <div class="process-step-circle">
                                        <strong class="process-step-circle-content">{{ $resena->item->items[0]->content ?? '' }}</strong>
                                    </div>
                                    <div class="process-step-content">
                                        <h4 class="mb-1 text-4 font-weight-bold">{{ $resena->item->items[1]->content ?? '' }}</h4>
                                        <p class="mb-0">{{ $resena->item->items[2]->content ?? '' }}</p>
                                    </div>
                                </div>
                            @endforeach
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
