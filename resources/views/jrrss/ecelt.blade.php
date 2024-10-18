@extends('layouts.jrrss')

@section('content')
    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            <section
                class="page-header bg-color-tertiary custom-page-header page-header-modern page-header-background page-header-background-sm parallax mt-0"
                data-plugin-parallax data-plugin-options="{'speed': 1.2}" data-image-src="{{ $banner->content }}">
                <div class="container">
                    <div class="row" style="padding: 80px 0px;">
                        {{-- <div class="col-md-12 align-self-center">
                            <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                <li class="active">ECELT</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">EL CIERLO EN LA TIERRA</h1>
                        </div> --}}
                    </div>
                </div>
            </section>

            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h2 style="font-weight: 700;">
                            {{ $presentation[0]->content }}
                        </h2>
                        <p style="padding: 5px 0px;">
                            {{ $presentation[1]->content }}
                        </p>
                    </div>
                    <div class="col-md-6 ara_centrado_total">
                        {!! $presentation[2]->content !!}
                    </div>
                </div>
            </div>

            <br><br>

            <div class="container py-4">

                <div class="row">
                    <div class="col" style="min-height: 250px;">
                        <div class="row portfolio-list lightbox"
                            data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                            @foreach ($galery as $item)
                                <div class="col-md-4 appear-animation animated expandIn appear-animation-visible"
                                    data-appear-animation="expandIn" data-appear-animation-delay="1000"
                                    style="animation-delay: 100ms;">
                                    <div class="portfolio-item">
                                        <span
                                            class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                            <span class="thumb-info-wrapper border-radius-0">
                                                <img src="{{ $item->group->items[0]->content }}"
                                                    class="img-fluid border-radius-0" alt="">
                                                <span class="thumb-info-action">
                                                    <a href="{{ $item->group->items[0]->content }}"
                                                        class="lightbox-portfolio">
                                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                                class="fas fa-search text-dark"></i></span>
                                                    </a>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        {{ $galery->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <div class="col-md-4"></div>
                </div>

            </div>
            <br>
            <div class="container pt-2" style="text-align:center;">
                <div class="row">
                    <div class="form-group col-md-12">
                        <a href="{{ $rsociales[0]->content }}" target="_blank" class="btn btn-primary" style="font-size: 16px;">
                            <i class="fab fa-facebook" style="font-size: 18px;" aria-hidden="true"></i>
                            &nbsp;&nbsp; Facebook
                        </a>
                        <a href="{{ $rsociales[1]->content }}" target="_blank" class="btn btn-primary" style="font-size: 16px;">
                            <i class="fab fa-instagram" style="font-size: 18px;" aria-hidden="true"></i>
                            &nbsp;&nbsp; Instagram
                        </a>
                        <a href="{{ $rsociales[2]->content }}" target="_blank" class="btn btn-primary" style="font-size: 16px;">
                            <i class="fab fa-tiktok" style="font-size: 18px;" aria-hidden="true"></i>
                            &nbsp;&nbsp; Tik Tok
                        </a>
                    </div>
                </div>
            </div>

            <br><br>

            <section
                class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible"
                data-appear-animation="fadeIn" data-plugin-parallax=""
                data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}" data-image-src="{{ $biblico[0]->content }}"
                style="position: relative; overflow: hidden; animation-delay: 100ms;">
                <div class="container">
                    <div class="row justify-content-center" style="padding: 80px 0px;">
                        <div class="col-lg-9 text-center">
                            <h2 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"
                                style="animation-delay: 200ms;">
                                {{ $biblico[1]->content }}
                            </h2>
                            <p class="text-color-light opacity-7 text-3 px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400"
                                style="animation-delay: 400ms;">
                                {{ $biblico[2]->content }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <br><br>

            <div class="container py-4">

                <div class="row">
                    <div class="col" style="min-height: 250px;">

                        <div class="row portfolio-list lightbox"
                            data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">

                            @foreach ($videos as $video)
                                <div class="col-md-6" style="padding: 15px;">
                                    {!! $video->group->items[0]->content !!}
                                </div>
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
