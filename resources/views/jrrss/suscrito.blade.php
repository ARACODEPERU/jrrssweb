@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}" style="position: relative; height: 350px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" src="{{ $banner->content }}" alt="">
            </section>

            {{-- <div class="container-lg pt-4">
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
            </div> --}}


        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

@endsection

