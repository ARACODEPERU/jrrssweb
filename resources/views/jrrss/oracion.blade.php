@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->

        <div role="main" class="main">

            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}">
                <img style="max-width: 100%; height: auto;"  src="{{ $banner->content }}" alt="">
            </section>

            <div class="container-lg pt-5">
                <div class="row">
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
                        {{-- <img width="100%;" src="{{ $presentacion[2]->content }}" alt=""> --}}
                    </div>
                </div>
            </div>

            <br>

        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

@endsection
