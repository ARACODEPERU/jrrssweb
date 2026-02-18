@extends('layouts.jrrss')

@section('content')
    <div class="body">

        <!-- AOS Animation CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}" class="view-pc" data-aos="fade-in"
                style="position: relative; height: 310px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                    src="{{ asset('storage/' . ($banner->content ?? '')) }}" alt="">
            </section>

            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}" class="view-movile" data-aos="fade-in"
                style="position: relative; height: 80px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                    src="{{ asset('storage/' . ($banner->content ?? '')) }}" alt="">
            </section>

            <div class="container-lg pt-5">
                <div class="row">
                    <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
                        <br>
                        <h2 style="font-weight: 700;">
                            {{ $presentation[0]->content ?? '' }}
                        </h2>
                        <p style="padding: 5px 0px;">
                            {{ $presentation[1]->content ?? '' }}
                        </p>
                    </div>
                    <div class="col-md-6 ara_centrado_total" data-aos="fade-left" data-aos-delay="400">
                        {!! $presentation[2]->content ?? '' !!}
                    </div>
                </div>
            </div>

            <br><br>

            <div class="container-lg py-4">
                <div class="row">
                    <div class="col" style="min-height: 250px;">
                        <div class="row portfolio-list lightbox"
                            data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                            @foreach ($galery as $item)
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ ($loop->iteration * 100) }}">
                                    <div class="portfolio-item">
                                        <span
                                            class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                            <span class="thumb-info-wrapper border-radius-0">
                                                <img src="{{ asset('storage/' . ($item->group->items[0]->content ?? '')) }}"
                                                    class="img-fluid border-radius-0" alt="">
                                                <span class="thumb-info-action">
                                                    <a href="{{ asset('storage/' . ($item->group->items[0]->content ?? '')) }}"
                                                        class="lightbox-portfolio">
                                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                                class="fas fa-search text-dark"></i></span>
                                                    </a>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        {{ $galery->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>

            <br>
            <div class="container pt-2" style="text-align:center;">
                <div class="row">
                    <div class="col-md-12" data-aos="zoom-in" data-aos-delay="200">
                        <a href="{{ $rsociales[0]->content ?? '#' }}" target="_blank">
                            <button class="boton-fuego">
                                <i class="fab fa-facebook" style="font-size: 24px;"></i>&nbsp; Facebook
                            </button>
                        </a>
                        <a href="{{ $rsociales[1]->content ?? '#' }}" target="_blank">
                            <button class="boton-fuego">
                                <i class="fab fa-instagram" style="font-size: 24px;"></i>&nbsp; Instagram
                            </button>
                        </a>
                        <a href="{{ $rsociales[2]->content ?? '#' }}" target="_blank" >
                            <button class="boton-fuego">
                                <i class="fab fa-tiktok" style="font-size: 24px;"></i>&nbsp; Tik Tok
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <br><br>

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
                data-image-src="{{ asset('storage/' . ($biblico[0]->content ?? '')) }}"
                style="min-height: 500px;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-8">
                            <div class="glass-card text-center" data-aos="zoom-in" data-aos-delay="200">
                                <h2 class="text-white font-weight-bold text-9 mb-3" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5); font-family: 'Montserrat', serif !important;">
                                    {{ $biblico[1]->content ?? '' }}
                                </h2>
                                <div class="divider divider-small divider-small-center divider-light mb-4">
                                    <hr style="width: 50px; border-top: 3px solid #fff; opacity: 1;">
                                </div>
                                <p class="text-white text-4 mb-0 font-weight-light" style="line-height: 1.8; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                                    {{ $biblico[2]->content ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- FIN: NUEVA PROPUESTA --}}

            <br><br>

            <div class="container-lg py-4">
                <div class="row">
                            @foreach ($videos as $video)
                                <div class="col-md-4" style="padding: 15px;" data-aos="fade-up" data-aos-delay="{{ ($loop->iteration * 100) }}">
                                    {!! $video->group->items[0]->content ?? '' !!}
                                </div>
                            @endforeach
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        {{ $videos->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>

        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            mirror: true, // Animación al hacer scroll hacia arriba
            once: false, // Animación cada vez que se hace scroll
        });
    </script>
@endsection
