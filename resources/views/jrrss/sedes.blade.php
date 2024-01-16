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
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                <li class="active">Sedes</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Nuestras Sedes</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container pt-1">
                @foreach ($sedes as $key => $sede )
                    <div class="row" style="background-color: #f8f8f8; padding: 10px; margin-top: 40px;">
                        <div class="col-md-6 ara_centrado_total" style="padding: 10px;">
                            <img style="width: 100%;" src="{{ $sede->item->items[0]->content }}" alt="">
                        </div>
                        <div class="col-md-6" style="padding: 30px 10px 30px 10px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>
                                        <img style="width: 30px;" src="{{ $sede->item->items[1]->content }}" alt="">
                                        &nbsp; {{ $sede->item->items[2]->content }}
                                    </h3>
                                    <p>
                                        {{ $sede->item->items[3]->content }}
                                    </p>
                                    <p>
                                        <b>Dirección:</b> {{ $sede->item->items[4]->content }}
                                        <br>
                                        <b>Teléfono:</b> {{ $sede->item->items[5]->content }}
                                        <br>
                                        <b>Correo Electrónico:</b> {{ $sede->item->items[6]->content }}
                                        <br>
                                        <b>Horario de Reunión:</b> {{ $sede->item->items[7]->content }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <img style="width: 100%;
                                                border-radius: 50%; /* Hace que los bordes sean redondos */
                                                overflow: hidden; /* Asegura que la imagen se ajuste al radio especificado */
                                                border: 2px solid #000; /* Cambia el color del borde según tus preferencias */"
                                                src="{{ $sede->item->items[8]->content }}"
                                        alt="img">
                                </div>
                                <div class="col-md-10">
                                    <h4 style="margin-top: 10px;">{{ $sede->item->items[9]->content }}</h4>
                                    <div style="margin-top: -20px;" class="ps-funcion">{{ $sede->item->items[10]->content }}</div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                            <div class="col-md-4">
                                <a href="{{ $sede->item->items[11]->content }}" class="btn btn-primary" style="width: 100%;">¿Como llegar?</a>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <br><br>



        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

@endsection
