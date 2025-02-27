@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->

        <div role="main" class="main">


            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}" class="view-pc"
                style="position: relative; height: 310px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                    src="{{ $banner->content }}" alt="">
            </section>

            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}" class="view-movile"
                style="position: relative; height: 80px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                    src="{{ $banner->content }}" alt="">
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
                        <img width="100%;" src="{{ $presentacion[2]->content }}" alt="">
                    </div>
                </div>
            </div>

            <br><br>

            <div class="container-lg py-4">
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

        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

@endsection
