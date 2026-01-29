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
                    src="{{ asset('storage/' . ($banner->content ?? '')) }}" alt="">
            </section>

            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}" class="view-movile"
                style="position: relative; height: 80px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                    src="{{ asset('storage/' . ($banner->content ?? '')) }}" alt="">
            </section>

            <div class="container-lg py-4">
                <div class="row">
                    @foreach ($videos as $video)
                        <div class="col-md-4" style="padding: 15px;">
                            <div class="card">
                                {!! $video->group->items[2]->content !!}
                                <div class="card-content">
                                    <h2 class="card-title">{{ $video->group->items[0]->content }}</h2>
                                    <p class="card-description">{{ $video->group->items[1]->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        {{ $videos->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <style>
                    .card {
                        background: white;
                        border-radius: 10px;
                        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                        overflow: hidden;
                        width: 100%;
                        transition: transform 0.3s;
                    }
                    .card:hover {
                        transform: scale(1.05);
                    }
                    .card-content {
                        padding: 10px 20px 2px 20px;
                    }
                    .card-title {
                        font-size: 1.2em;
                        font-weight: 500;
                    }
                    .card-description {
                        color: #555;
                        margin: 5px 0;
                    }
                </style>
            </div>

        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>
@endsection
