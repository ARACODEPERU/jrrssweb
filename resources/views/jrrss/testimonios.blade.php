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
                                <li class="active">Testimonios</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Testimonios</h1>
                        </div> --}}
                    </div>
                </div>
            </section>

            <div class="container pt-4">
                <div class="row">
                    @foreach ($testimonios as $key => $testimonio)
                        <div class="col-md-6">
                            {!! $testimonio->item->items[0]->content !!}
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <nav aria-label="...">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active" aria-current="page">
                                <span class="page-link">2</span>
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
