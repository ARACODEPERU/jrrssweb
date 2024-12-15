@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            <section class="page-header bg-color-tertiary custom-page-header page-header-modern page-header-background page-header-background-sm parallax mt-0"
                     data-plugin-parallax data-plugin-options="{'speed': 1.2}"
                     data-image-src="{{ $banner->content }}">
                <div class="container">
                    <div class="row" style="padding: 80px 0px;">
                        {{-- <div class="col-md-12 align-self-center">
                            <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                <li class="active">¿Quienes Somos?</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">¿Quienes Somos?</h1>
                        </div> --}}
                    </div>
                </div>
            </section>

            <div class="container-lg pt-4">
                <div class="row  box-flotante">
                    <div class="col-md-6">
                        <br>
                        <h2>
                            <b  style="font-weight: 600;">{{ $presentacion[0]->content }}</b>
                        </h2>
                        <p style="padding: 0px;">
                            {{ $presentacion[1]->content }}
                        </p>
                    </div>
                    <div class="col-md-6 ara_centrado_total">
                        <img width="100%;" src="{{ $presentacion[2]->content }}" alt="">
                    </div>
                </div>
            </div>



            <div class="container pt-4">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-2 mt-5">{{ $visions[0]->content }}</h4>

                        <div class="row process process-connecting-line my-5">
                            <div class="connecting-line appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" style="animation-delay: 100ms;"></div>
                            <div class="col-md-3 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">{{ $visions[1]->content }}</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">{{ $visions[2]->content }}</h4>
                                    <p class="mb-0">
                                        {{ $visions[3]->content }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="900" style="animation-delay: 900ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">{{ $visions[4]->content }}</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">{{ $visions[5]->content }}</h4>
                                    <p class="mb-0">{{ $visions[6]->content }}</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1000" style="animation-delay: 1000ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">{{ $visions[7]->content }}</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">{{ $visions[8]->content }}</h4>
                                    <p class="mb-0">
                                        {{ $visions[9]->content }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1000" style="animation-delay: 1000ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">{{ $visions[10]->content }}</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">{{ $visions[11]->content }}</h4>
                                    <p class="mb-0">
                                        {{ $visions[12]->content }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible"
                    data-appear-animation="fadeIn" data-plugin-parallax="" data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                    data-image-src="{{ $parallax[0]->content }}" style="position: relative; overflow: hidden; animation-delay: 100ms;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 text-center">
                                <h2 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                    {{ $parallax[1]->content }}
                                </h2>
                                <p class="text-color-light opacity-7 text-3 px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms;">
                                    {{ $parallax[2]->content }}
                                </p>
                            </div>
                        </div>
                    </div>
            </section>

            <div class="container pt-4">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-2 mt-5">{{ $resenas[0]->item->content }}</h4>

                        <div class="process process-vertical py-4">
                            @foreach ($resenas as $key => $resena)
                                @if ($key>0)
                                    <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                        <div class="process-step-circle">
                                            <strong class="process-step-circle-content">{{ $resena->item->items[0]->content }}</strong>
                                        </div>
                                        <div class="process-step-content">
                                            <h4 class="mb-1 text-4 font-weight-bold">{{ $resena->item->items[1]->content }}</h4>
                                            <p class="mb-0">{{ $resena->item->items[2]->content }}</p>
                                        </div>
                                    </div>
                                    @endif
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
