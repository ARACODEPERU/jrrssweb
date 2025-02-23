@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">
            
            <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual 
                dots-inside dots-vertical-center dots-align-right dots-orientation-portrait custom-dots-style-1 show-dots-hover 
                show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0 view-pc" 
                data-plugin-options="{'autoplayTimeout': 6500}" 
                data-dynamic-height="['650px','650px','650px','550px','500px']" 
                style="height: 650px; background:#fff;">
                <div class="owl-stage-outer">
                    <div class="owl-stage ara_centrado_total">
                        @foreach ($sliders as $slide)
                        <div  class="owl-item position-relative " 
                                style="background-size: cover; background-position: center;">
                                <img style="max-width: 100%; height: auto;"  src="{{ $slide->content }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-dots mb-5">
                    @foreach ($sliders as $key => $slide)
                        @if ($key==0)
                        <button role="button" class="owl-dot active"><span></span></button>
                        @else
                        <button role="button" class="owl-dot"><span></span></button>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual 
                dots-inside dots-vertical-center dots-align-right dots-orientation-portrait custom-dots-style-1 show-dots-hover 
                show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0 view-pc" 
                data-plugin-options="{'autoplayTimeout': 6500}" 
                data-dynamic-height="['650px','650px','650px','550px','500px']" 
                style="height: 650px; background:#fff;">
                <div class="owl-stage-outer">
                    <div class="owl-stage ara_centrado_total">
                        @foreach ($sliders as $slide)
                        <div  class="owl-item position-relative overlay overlay-show overlay-op-3" 
                                style="background-size: cover; background-position: center;">
                                <img style="max-width: 100%; height: auto;"  src="{{ $slide->content }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-dots mb-5">
                    @foreach ($sliders as $key => $slide)
                        @if ($key==0)
                        <button role="button" class="owl-dot active"><span></span></button>
                        @else
                        <button role="button" class="owl-dot"><span></span></button>
                        @endif
                    @endforeach
                </div>
            </div> --}}

            <div class="view-mobile owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual 
                dots-inside dots-vertical-center dots-align-right dots-orientation-portrait custom-dots-style-1 show-dots-hover 
                show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0 " 
                data-plugin-options="{'autoplayTimeout': 6500}" 
                data-dynamic-height="['200px','200px','200px','200px','130px']" 
                style="height: 350px;">
                <div class="owl-stage-outer">
                    <div class="owl-stage ara_centrado_total">
                        @foreach ($sliders as $slide)
                        <div  class="owl-item position-relative" 
                                style="background-size: cover; background-position: center;">
                                <img style="max-width: 100%; height: auto;"  src="{{ $slide->content }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-dots mb-5">
                    @foreach ($sliders as $key => $slide)
                        @if ($key==0)
                        <button role="button" class="owl-dot active"><span></span></button>
                        @else
                        <button role="button" class="owl-dot"><span></span></button>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- <section class="section-custom-medical view-pc">
                <div class="container">
                    <div class="row medical-schedules">
                        <div class="col-xl-3 box-two bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
                            <div class="feature-box-info">
                                <h3 class="m-0 p-0" style="color: #fff;">{{ $home[0]->content }}</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 box-two bg-color-dark appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
                            <div class="feature-box-info">
                                <h3 class="m-0 p-0" style="color: #fff;">{{ $home[1]->content }}</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 box-two bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200">
                            <div class="feature-box-info">
                                <h3 class="m-0 p-0" style="color: #fff;">{{ $home[2]->content }}</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 box-two bg-color-dark appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
                            <div class="feature-box-info">
                                <h3 class="m-0 p-0" style="color: #fff;">{{ $home[3]->content }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br><br> --}}
            <br><br>

            <section style="padding-bottom: 90px;">
                <div class="container-lg">
                    <div class="row">
                        <div class="container mt-4">
                            <div class="row justify-content-center ">
                                <div class="col-md-12 text-center">
                                    <h2 class="custom-highlight-text-1 d-inline-block line-height-4
                                                text-4 positive-ls-3 font-weight-medium text-color-primary
                                                mb-2 appear-animation animated fadeInUpShorter appear-animation-visible"
                                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300"
                                                style="animation-delay: 1300ms;">
                                                {{ $reuniones[0]->item->content }}
                                    </h2>
                                    <h3 class="text-9 line-height-3 text-transform-none font-weight-semibold mb-4
                                        appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500"
                                        style="animation-delay: 1500ms;">
                                        {{ $reuniones[5]->item->content }}
                                    </h3>
                                    <p class="pb-3 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter"
                                        data-appear-animation-delay="1900"
                                        style="animation-delay: 1900ms;">
                                        {{ $reuniones[6]->item->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($reuniones as $key => $reunion)
                            @if ($key > 0 && $key < 5)
                                <div class="col-md-6" style="padding: 15px;">
                                    <div class="ih-item square colored effect8 scale_down">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#reuniones{{ $key }}">
                                            <div class="img">
                                                <img src="{{ $reunion->item->items[1]->content }}" alt="img">
                                            </div>
                                            <div class="info">
                                                <h3>{{ $reunion->item->items[0]->content }}</h3>
                                                <br>
                                                <h4 style="padding: 10px;"><b>{{ $reunion->item->items[2]->content }}: {{ $reunion->item->items[3]->content }}</b> </h4>
                                                <p style="margin-top: -25px;">
                                                    <b>Horario de Reunión:</b> {{ $reunion->item->items[5]->content }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible"
                    data-appear-animation="fadeIn" data-plugin-parallax="" data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                    data-image-src="{{ $bible[0]->content }}" style="position: relative; overflow: hidden; animation-delay: 100ms;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 text-center">
                                <h1 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms; font-family: 'Montserrat', serif !important; ">
                                    {{ $bible[1]->content }}
                                </h1>
                                <p class="text-color-light opacity-7 text-3 px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms;">
                                    {{ $bible[2]->content }}
                                </p>
                            </div>
                        </div>
                    </div>
            </section>

            <section style="padding: 100px 0px 100px 0px;">
                <div class="container-lg">
                    <div class="row">
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-11 col-xl-10 text-center">
                                    <h2 class="custom-highlight-text-1 d-inline-block line-height-5
                                                text-4 positive-ls-3 font-weight-medium text-color-primary
                                                mb-2 appear-animation animated fadeInUpShorter appear-animation-visible"
                                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300"
                                                style="animation-delay: 1300ms;">
                                                {{ $ministerios[0]->item->content }}
                                    </h2>
                                    <h3 class="text-9 line-height-3 text-transform-none font-weight-semibold mb-4
                                        appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500"
                                        style="animation-delay: 1500ms;">
                                        {{ $ministerios[4]->item->content }}
                                    </h3>
                                    <p class="text-3-5 pb-3 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter"
                                        data-appear-animation-delay="1900"
                                        style="animation-delay: 1900ms;">
                                        {{ $ministerios[5]->item->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($ministerios as $key => $ministerio)
                            @if ($key > 0 && $key < 4)
                            <div class="col-md-4" style="padding: 10px;">
                                <div class="ih-item square colored effect8 scale_down">
                                    <a href="{{ $ministerio->item->items[3]->content }}">
                                        <div class="img">
                                            <img src="{{ $ministerio->item->items[0]->content }}" alt="img">
                                        </div>
                                        <div class="info">
                                            <h3>{{ $ministerio->item->items[1]->content }}</h3>
                                            <br>
                                            <p style="margin-top: -25px;">
                                                <b>{{ $ministerio->item->items[2]->content }}</b>
                                            </p>
                                            <button class="btn btn-dark">Ingresar</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible"
                    data-appear-animation="fadeIn" data-plugin-parallax="" data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                    data-image-src="{{ asset('themes/jrrss/assets/img/parallax/parallax_index.jpg') }}" style="position: relative; overflow: hidden; animation-delay: 100ms;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 text-center">
                                <h1 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms; font-family: 'Montserrat', serif !important; ">
                                    {{ $gods_meeting[0]->content }}
                                </h1>
                                <p class="text-color-light opacity-7  px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms; font-size: 18px;">
                                    {{ $gods_meeting[1]->content }}
                                </p>
                                <br>
                                <a href="{{ route('web_contacto') }}" class="btn btn-primary" style="font-size: 17px;">
                                    <i class="fa fa-edit"></i> Escribenos
                                </a>
                            </div>
                        </div>
                    </div>
            </section>


            <section style="padding: 90px 0px 90px 0px;">
                <div class="container-lg">
                    <div class="row">
                        <div class="col-md-1" style="padding: 15px;"></div>
                        <div class="col-md-4  box-zoom" style="padding: 25px; text-align:center;">
                            <h2 class="custom-highlight-text-1 d-inline-block line-height-5
                                        text-4 positive-ls-3 font-weight-medium text-color-primary
                                        mb-2 appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300"
                                        style="animation-delay: 1300ms;">
                                        #SOMOSJRRSS
                            </h2>
                            <h4 class="line-height-1 text-transform-none font-weight-semibold
                                appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500"
                                style="animation-delay: 1500ms;  margin-top: -5px; font-size: 30px;">
                                {{ $difusion[0]->content }}
                            </h4>
                            <br>
                            <img class="mb-1 appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2100"
                                style="animation-delay: 2100ms; margin-top: -5px; width: 100%; background: red;" 
                                src="{{ $difusion[2]->content }}" alt="">
                            <p class="text-3-5 pb-3 mb-1 appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="1900"
                                style="animation-delay: 1900ms; margin-top: -20px;">
                                {{ $difusion[1]->content }}
                            </p>
                                
							<a href="{{ $difusion[3]->content }}"
                                target="_blanck" class="btn btn-primary
                                mb-1 appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2300">
                                <div style="justify-content: space-between;">
                                    <div style="float: left; font-size: 24px;">
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                    <div style="float: left; padding: 5px; font-size: 16px;">
                                        &nbsp; ¡Canal de difusión JRRSS!
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2" style="padding: 15px;"></div>
                        <div class="col-md-4  box-zoom" style="padding: 25px; text-align:center;">
                            <h2 class="custom-highlight-text-1 d-inline-block line-height-5
                                        text-4 positive-ls-3 font-weight-medium text-color-primary
                                        mb-2 appear-animation animated fadeInUpShorter appear-animation-visible"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300"
                                        style="animation-delay: 1300ms;">
                                        #SOMOSJRRSS
                            </h2>
                            <h4 class="line-height-1 text-transform-none font-weight-semibold
                                appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500"
                                style="animation-delay: 1500ms;  margin-top: -5px; font-size: 30px;">
                                {{ $difusion[4]->content }}
                            </h4>
                            <img class="mb-1 appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2100"
                                style="animation-delay: 2100ms; margin-top: -10px; width: 100%;" 
                                src="{{ $difusion[6]->content }}" alt="">
                            <p class=" pb-3 mb-1 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="1900"
                                style="animation-delay: 1900ms; margin-top: -20px;">
                                {{ $difusion[5]->content }}
                            </p>
                                
							<a href="{{ $difusion[7]->content }}"
                                target="_blanck"  class="btn btn-primary
                                mb-1 appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2300">
                                <div style="justify-content: space-between;">
                                    <div style="float: left; font-size: 24px;">
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                    <div style="float: left; padding: 5px; font-size: 16px;">
                                        &nbsp; ¡Canal de difusión RMNT!
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-1" style="padding: 15px;"></div>
                    </div>
                </div>
            </section>

            @foreach ($reuniones as $key => $reunion)
                @if ($key > 0 && $key < 5)
                    <div class="modal fade" id="reuniones{{ $key }}" tabindex="-1" aria-labelledby="reunionesLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="reunionesLabel">{{ $reunion->item->items[0]->content }}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5><b>{{ $reunion->item->items[2]->content }}: {{ $reunion->item->items[3]->content }}</b> </h5>
                                    <p style="margin-top: -15px;">
                                        <b>Horario de Reunión:</b> {{ $reunion->item->items[5]->content }}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!!  $reunion->item->items[4]->content  !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach


        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

@endsection
