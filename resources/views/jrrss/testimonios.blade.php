@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            
            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}"
                style="position: relative; height: 310px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                    src="{{ $banner->content }}" alt="">
            </section>

            <div class="container-lg pt-4">
                <div class="row">
                    @foreach ($testimonios as $key => $testimonio)
                        <div class="col-md-4">
                            <div style="padding: 15px;" style="width:100%; height: 330px;">
                                {!! $testimonio->item->items[0]->content !!}
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        {{ $testimonios->links('vendor.pagination.bootstrap-4') }}
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
