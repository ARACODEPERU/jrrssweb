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
                                <li class="active">Coberturas</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Nuestras Coberturas</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container pt-4">
                <div class="row">
                    @foreach ($coberturas as $key => $cobertura)
                        <div class="col-md-6" style="padding: 40px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{ $cobertura->item->items[2]->content }}</h3>
                                </div>
                                <div class="col-md-12 ara_centrado_total" style="margin-top: -15px;">
                                    <img style="width: 100%;" src="{{ $cobertura->item->items[0]->content }}" alt="">
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <p>
                                                {{ $cobertura->item->items[3]->content }}
                                            </p>
                                            <p>
                                                <b>Dirección:</b> {{ $cobertura->item->items[4]->content }}
                                                <br>
                                                <b>Teléfono:</b> {{ $cobertura->item->items[5]->content }}
                                                <br>
                                                <b>Correo Electrónico:</b> {{ $cobertura->item->items[6]->content }}
                                                <br>
                                                <b>Horario de Reunión:</b> {{ $cobertura->item->items[7]->content }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img style="width: 100%;
                                                        border-radius: 50%; /* Hace que los bordes sean redondos */
                                                        overflow: hidden; /* Asegura que la imagen se ajuste al radio especificado */
                                                        border: 2px solid #000; /* Cambia el color del borde según tus preferencias */"
                                                        src="{{ $cobertura->item->items[1]->content }}"
                                                alt="img">
                                        </div>
                                        <div class="col-md-10">
                                            <h4 style="margin-top: 10px;">{{ $cobertura->item->items[9]->content }}</h4>
                                            <div style="margin-top: -20px;" class="ps-funcion">{{ $cobertura->item->items[9]->content }}</div>
                                        </div>
                                        <div>{!! $cobertura->item->items[11]->content !!}</div>
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
