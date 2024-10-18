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
                    <div class="row" style="padding: 80px 0px;">
                        {{-- <div class="col-md-12 align-self-center">
                            <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                <li class="active">Sobrenatural Kids</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Sobrenatural Kids</h1>
                        </div> --}}
                    </div>
                </div>
            </section>

            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h2 style="font-weight: 700;">
                            {{ $presentacion[0]->content }}
                        </h2>
                        <p style="padding: 5px 0px;">
                            {{ $presentacion[1]->content }}
                        </p>
                    </div>
                    <div class="col-md-6 ara_centrado_total">
                        {!! $presentacion[2]->content !!}
                    </div>
                </div>
            </div>

            <br><br>

            <div class="container py-4">

                <div class="row">
                    <div class="col" style="min-height: 250px;">

                        <div class="row portfolio-list lightbox" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                            
                            @foreach ($galeryKids as $key => $kids)
                                @if ($key>0)
                                <div class="col-md-4 appear-animation animated expandIn appear-animation-visible" data-appear-animation="expandIn" data-appear-animation-delay="600" style="animation-delay: 600ms;">
                                    <div class="portfolio-item">
                                        <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                            <span class="thumb-info-wrapper border-radius-0">
                                                <img src="{{ $kids->item->items[0]->content }}" class="img-fluid border-radius-0" alt="">
                                                <span class="thumb-info-action">
                                                    <a href="{{ $kids->item->items[0]->content }}" class="lightbox-portfolio">
                                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                                    </a>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <nav aria-label="...">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                              </li>
                            </ul>
                          </nav>
                    </div>
                    <div class="col-md-4"></div>
                </div>

            </div>

            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible"
                    data-appear-animation="fadeIn" data-plugin-parallax="" data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}"
                    data-image-src="{{ $textBiblie[0]->content }}" style="position: relative; overflow: hidden; animation-delay: 100ms;">
                    <div class="container">
                        <div class="row justify-content-center" style="padding: 80px 0px;">
                            <div class="col-lg-9 text-center">
                                <h2 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                    {{ $textBiblie[1]->content }}
                                </h2>
                                <p class="text-color-light opacity-7 text-3 px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible"
                                   data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms;">
                                   {{ $textBiblie[2]->content }}
                                </p>
                            </div>
                        </div>
                    </div>
            </section>

            <br><br>

            <div class="container py-4">

                <div class="row">
                    <div class="col" style="min-height: 250px;">

                        <div class="row portfolio-list lightbox" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                            
                            @foreach ($videoteca as $key => $video)
                                @if ($key>0)
                                    <div class="col-md-6" style="padding: 10px;">
                                        {!! $video->item->items[0]->content !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <nav aria-label="...">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                              </li>
                            </ul>
                          </nav>
                    </div>
                    <div class="col-md-4"></div>
                </div>

            </div>



        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

@endsection
