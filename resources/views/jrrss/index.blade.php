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
                data-dynamic-height="['650px','650px','650px','550px','500px']">
                <div class="owl-stage-outer">
                    <div class="owl-stage ara_centrado_total">
                        @foreach ($sliders as $slide)
                        <div  class="owl-item position-relative " 

                                style="background-size: cover; background-position: center;">
                                <img style="max-width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"  src="{{ asset('storage/' . $slide->content) }}" alt="Slide de la página principal {{ $loop->iteration }}">
                        </div>
                        @endforeach
                    </div>
                </div>
                </div>
                <div class="owl-dots mb-5">
                    @foreach ($sliders as $key => $slide)
                        <button role="button" class="owl-dot {{ $loop->first ? 'active' : '' }}" aria-label="Ir a la diapositiva {{ $loop->iteration }}"><span></span></button>
                    @endforeach
                </div>
            </div>

            <div class="view-movile owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual 
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
                                <img style="max-width: 100%; height: auto;"  src="{{ asset('storage/' . $slide->content) }}" alt="Slide de la página principal {{ $loop->iteration }}">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-dots mb-5">
                    @foreach ($sliders as $key => $slide)
                        <button role="button" class="owl-dot {{ $loop->first ? 'active' : '' }}" aria-label="Ir a la diapositiva {{ $loop->iteration }}"><span></span></button>
                    @endforeach
                </div>
            </div>

            <br><br>

            <section class="pb-5 mb-4">
                <div class="container-lg"> 
                    <div class="row">
                        <div class="container mt-4">
                            <div class="row justify-content-center ">
                                <div class="col-md-12 text-center">
                                    <h2 class="custom-highlight-text-1 d-inline-block line-height-4
                                                text-4 positive-ls-3 font-weight-medium text-color-primary
                                                mb-2 appear-animation"
                                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300">
                                                {{ $reuniones[0]->item->content ?? 'Reuniones' }}
                                    </h2>
                                    <h3 class="text-9 line-height-3 text-transform-none font-weight-semibold mb-4 appear-animation"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500">
                                        {{ $reuniones[5]->item->content ?? '' }}
                                    </h3>
                                    <p class="pb-3 mb-4 appear-animation"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1900">
                                        {{ $reuniones[6]->item->content ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div> 
                    <div class="row">
                        @foreach ($reuniones->slice(1, 4) as $key => $reunion)
                                <div class="col-md-6 p-3">
                                    <div class="ih-item square colored effect8 scale_down">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#reuniones{{ $key }}">
                                            <div class="img">
                                                <img src="{{ asset('storage/' . ($reunion->item->items[1]->content ?? 'default.jpg')) }}" alt="{{ $reunion->item->items[0]->content ?? 'Imagen' }}">
                                            </div>
                                            <div class="info">
                                                <h4 class="p-2"><b>{{ $reunion->item->items[2]->content ?? '' }}: {{ $reunion->item->items[3]->content ?? '' }}</b> </h4>
                                                <p class="mt-n4">
                                                    <b>Horario de Reunión:</b> {{ $reunion->item->items[5]->content ?? '' }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        @endforeach
                </div>
            </section>
            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0"
                    data-appear-animation="fadeIn" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                    data-image-src="{{ asset('storage/' . ($bible[0]->content ?? '')) }}">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 text-center">
                                <h1 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation font-montserrat"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                    {{ $bible[1]->content ?? '' }}
                                </h1>
                                <p class="text-color-light opacity-7 text-3 px-5 mx-5 mb-0 appear-animation"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                                    {{ $bible[2]->content ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
            </section>

            <section class="py-5 my-4"> 
                    <div class="row">
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <h2 class="custom-highlight-text-1 d-inline-block line-height-5
                                                text-4 positive-ls-3 font-weight-medium text-color-primary
                                                mb-2 appear-animation"
                                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300">
                                                {{ $ministerios[0]->item->content ?? 'Ministerios' }}
                                    </h2>
                                    <h3 class="text-9 line-height-3 text-transform-none font-weight-semibold mb-4
                                        appear-animation"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500">
                                        {{ $ministerios[4]->item->content ?? '' }}
                                    </h3>
                                    <p class="text-3-5 pb-3 mb-4 appear-animation"
                                        data-appear-animation="fadeInUpShorter"
                                        data-appear-animation-delay="1900">
                                        {{ $ministerios[5]->item->content ?? '' }}
                                    </p>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($ministerios->slice(1, 3) as $key => $ministerio)
                            <div class="col-md-4 p-2">
                                <div class="ih-item square colored effect8 scale_down">
                                    <a href="{{ $ministerio->item->items[3]->content ?? '#' }}">
                                        <div class="img">
                                            <img src="{{ asset('storage/' . ($ministerio->item->items[0]->content ?? '')) }}" alt="{{ $ministerio->item->items[1]->content ?? '' }}">
                                        </div>
                                        <div class="info">
                                            <h3>{{ $ministerio->item->items[1]->content ?? '' }}</h3>
                                            <p class="mt-n4">
                                                <b>{{ $ministerio->item->items[2]->content ?? '' }}</b>
                                            </p>
                                            <button class="btn btn-dark">Ingresar</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </section>
            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0"
                    data-appear-animation="fadeIn" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                    data-image-src="{{ asset('themes/jrrss/assets/img/parallax/parallax_index.jpg') }}">
                    <div class="container"> 
                        <div class="row justify-content-center">
                            <div class="col-lg-9 text-center">
                                <h1 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation font-montserrat"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                    {{ $gods_meeting[0]->content ?? '' }}
                                </h1>
                                <p class="text-color-light opacity-7 px-5 mx-5 mb-0 appear-animation fs-5"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                                    {{ $gods_meeting[1]->content }}
                                </p>
                                <br>
                                <a href="{{ route('web_contacto') }}">
                                    <button class="boton-fuego"><i class="fa fa-edit"></i> Escribenos</button>
                                </a>
                            </div>
                        </div>
                    </div>
            </section>


            <section class="py-5">
                <div class="container-lg">
                    <div class="row">
                        <div class="col-md-1 p-3"></div>
                        <div class="col-md-4 box-zoom p-4 text-center">
                            <h2 class="custom-highlight-text-1 d-inline-block line-height-5
                                        text-4 positive-ls-3 font-weight-medium text-color-primary
                                        mb-2 appear-animation"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300">
                                        #SOMOSJRRSS
                            </h2>
                            <h4 class="line-height-1 text-transform-none font-weight-semibold
                                appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500" style="font-size: 30px;">
                                {{ $difusion[0]->content }}
                            </h4>
                            <br>
                            <img class="mb-1 appear-animation w-100 mt-n1"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2100"
                                src="{{ asset('storage/' . $difusion[2]->content) }}" alt="Canal de difusión JRRSS">
                            <p class="text-3-5 pb-3 mb-1 appear-animation mt-n3"
                                data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="1900">
                                {{ $difusion[1]->content }}
                            </p>
                                
                            <a href="{{ $difusion[3]->content }}">
                                <button class="boton-fuego">
                                    <i class="fab fa-whatsapp fs-4"></i> &nbsp; ¡Canal de difusión!
                                </button>
                            </a>
                        </div>
                        <div class="col-md-2 p-3"></div>
                        <div class="col-md-4 box-zoom p-4 text-center">
                            <h2 class="custom-highlight-text-1 d-inline-block line-height-5
                                        text-4 positive-ls-3 font-weight-medium text-color-primary
                                        mb-2 appear-animation"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300">
                                        #SOMOSJRRSS
                            </h2>
                            <h4 class="line-height-1 text-transform-none font-weight-semibold
                                appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500" style="font-size: 30px;">
                                {{ $difusion[4]->content }}
                            </h4>
                            <img class="mb-1 appear-animation w-100 mt-n2"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2100"
                                src="{{ asset('storage/' . $difusion[6]->content) }}" alt="Canal de difusión RMNT">
                            <p class=" pb-3 mb-1 appear-animation mt-n3"
                                    data-appear-animation="fadeInUpShorter"
                                data-appear-animation-delay="1900">
                                {{ $difusion[5]->content }}
                            </p>
                                
                            <a href="{{ $difusion[7]->content }}">
                                <button class="boton-fuego">
                                    <i class="fab fa-whatsapp fs-4"></i> &nbsp; ¡Canal de difusión!
                                </button>
                            </a>
                        </div>
                        <div class="col-md-1 p-3"></div>
                    </div>
                </div>
            </section>

            @foreach ($reuniones->slice(1, 4) as $key => $reunion)
                    <div class="modal fade" id="reuniones{{ $key }}" tabindex="-1" aria-labelledby="reunionesLabel{{ $key }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="reunionesLabel{{ $key }}">{{ $reunion->item->items[0]->content ?? '' }}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5><b>{{ $reunion->item->items[2]->content ?? '' }}: {{ $reunion->item->items[3]->content ?? '' }}</b> </h5>
                                    <p class="mt-n3">
                                        <b>Horario de Reunión:</b> {{ $reunion->item->items[5]->content ?? '' }}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!!  $reunion->item->items[4]->content ?? ''  !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


        </div>

    </div>

@endsection