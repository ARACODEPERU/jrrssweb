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
                    <div class="row" style="padding: 60px 0px;">
                        {{-- <div class="col-md-12 align-self-center">
                            <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                <li class="active">Sedes</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Nuestras Sedes</h1>
                        </div> --}}
                    </div>
                </div>
            </section>

            <div class="container-lg" style="margin-top: 20px;">
                <div class="row">
                    @foreach ($sedes as $key => $sede )
                        <div class="col-md-4" style="padding: 20px;">
                            <div class="box-flotante">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img style="width: 100%; margin-top:-20px;" src="{{ $sede->item->items[0]->content }}" alt="">
                                        <h5 style="background: #000; color: #fff; padding: 8px 10px; z-index: 9999; top: 0px; position: relative;">
                                            <img style="width: 30px;" src="{{ $sede->item->items[1]->content }}" alt="">
                                            &nbsp; {{ $sede->item->items[2]->content }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 ara_centrado_total">
                                        <img style=" width: 50px; border-radius: 50%; 
                                                    overflow: hidden; border: 1px solid #000;"
                                                    src="{{ $sede->item->items[8]->content }}"
                                            alt="img">
                                    </div>
                                    <div class="col-md-9" style="margin-left: -10px;">
                                        <h5 style="margin-top: 8px; text-align:left;">{{ $sede->item->items[9]->content }}</h5>
                                        <div style="margin-top: -20px; text-align:left;">{{ $sede->item->items[10]->content }}</div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12" style="padding: 0px 20px;">
                                        <!--
                                        <p>
                                            {{ $sede->item->items[3]->content }}
                                        </p>
                                        -->
                                            <p style="line-height: 15px;">
                                                <b>Dirección:</b><br> {{ $sede->item->items[4]->content }}
                                            </p>
                                            <p style="line-height: 15px;">
                                                <b>Teléfono:</b><br> {{ $sede->item->items[5]->content }}
                                            </p>
                                            <p style="line-height: 15px;">
                                                <b>Correo Electrónico:</b><br> {{ $sede->item->items[6]->content }}
                                            </p>
                                            <p style="line-height: 15px;">
                                                <b>Horario de Reunión:</b><br> {{ $sede->item->items[7]->content }}
                                            </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <br><br>



        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

@endsection
