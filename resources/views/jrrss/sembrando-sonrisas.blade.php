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
                        <h2>
                            <b style="font-weight: 700;">{{ $presentacion[0]->content ?? '' }}</b>
                        </h2>
                        <p style="padding: 5px 0px;">
                            {{ $presentacion[1]->content ?? '' }}
                        </p>
                    </div>
                    <div class="col-md-6 ara_centrado_total" data-aos="fade-left" data-aos-delay="400">
                        {!! $presentacion[2]->content ?? '' !!}
                    </div>
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
