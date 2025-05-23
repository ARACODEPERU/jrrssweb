@extends('layouts.jrrss')

@section('content')
    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            @if ($ticket)
                <section
                    class="page-header bg-color-tertiary custom-page-header page-header-modern page-header-background page-header-background-sm parallax mt-0"
                    data-plugin-parallax data-plugin-options="{'speed': 1.2}"
                    data-image-src="{{ asset('themes/jrrss/assets/img/demos/construction-2/page-header.jpg') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 align-self-center">
                                <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                    <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                    <li class="active">GRACIAS POR COMPRAR TU ENTRADA</li>
                                </ul>
                            </div>
                            <div class="col-md-12 align-self-center p-static text-center mt-2">
                                <h1 class="font-weight-bold text-color-secondary text-11">GRACIAS POR COMPRAR TU ENTRADA
                                </h1>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container pt-4">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <p class="mb-1">Estimado(a)</p>
                            <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">{{ $ticket->full_name }}
                                {{ $ticket->full_surnames }}</h3>
                            <p>
                                Le extendemos nuestro agradecimiento por adquirir su(s) entrada(s) para 
                                <span style="color: orange"><b>{{ $ticket->event->title }}</b></span> 
                                por el valor de
                                <span style="color: orange"><b>S/. {{ $ticket->total }}</b></span>, 
                                Estamos seguros que será de gran bendición para su vida.
                            </p>
                            <div class="card-container">
                                <img style="width: 100%;" src="{{ asset('img/ticket.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            @endif

        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>
@endsection
