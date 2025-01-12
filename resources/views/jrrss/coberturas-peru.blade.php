@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            <section>
                <img style="max-width: 100%; height: auto;"  src="{{ $banner->content }}" alt="">
            </section>

            <div class="container-lg" style="margin-top: 20px;">
                <div class="row">
                    @foreach ($coberturas as $key => $cobertura )
                        <div class="col-md-4" style="padding: 20px;">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img style="width: 100%; margin-top:-20px;" src="{{ $cobertura->item->items[0]->content }}" alt="">
                                        <h5 style="background: #000; color: #fff; padding: 8px 10px; z-index: 9999; top: 0px; position: relative;">
                                            <img style="width: 30px;" src="{{ $cobertura->item->items[1]->content }}" alt="">
                                            &nbsp; {{ $cobertura->item->items[2]->content }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 ara_centrado_total">
                                        <img style=" width: 60px; border-radius: 50%; 
                                                    overflow: hidden; border: 1px solid #000;"
                                                    src="{{ $cobertura->item->items[3]->content }}"
                                            alt="img">
                                    </div>
                                    <div class="col-md-9" style="margin-left: -10px;">
                                        <h5 style="margin-top: 8px; text-align:left; padding: 3px 0px;">{{ $cobertura->item->items[4]->content }}</h5>
                                        <div style="margin-top: -20px; text-align:left; padding: 3px 0px;">{{ $cobertura->item->items[5]->content }}</div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12" style="padding: 0px 35px;">
                                        
                                            <p style="line-height: 15px;">
                                                <b>Dirección:</b><br> {{ $cobertura->item->items[6]->content }}
                                            </p>
                                            <p style="line-height: 15px;">
                                                <b>Teléfono:</b><br> {{ $cobertura->item->items[7]->content }}
                                            </p>
                                            <p style="line-height: 15px;">
                                                <b>Correo Electrónico:</b><br> {{ $cobertura->item->items[8]->content }}
                                            </p>
                                            <p style="line-height: 15px;">
                                                <b>Horario de Reunión:</b><br> {{ $cobertura->item->items[9]->content }}
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
