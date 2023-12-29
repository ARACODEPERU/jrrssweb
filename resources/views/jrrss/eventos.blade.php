@extends('layouts.jrrss')

@section('content')
    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->
        @if ($event)
            <div role="main" class="main">

                <div class="ara_centrado_total">
                    <img style="max-width: 100%; height: auto;" src="{{ asset('storage/' . $event->image1) }}">
                </div>


                <div class="container container-xl-custom pt-5">
                    <div class="row">
                        <div class="col">
                            <p class="mb-1">#{{ $event->category->description }}</p>
                            <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">{{ $event->title }}</h3>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-7 pb-5">
                            <div class="row mb-5">
                                {!! $event->description !!}
                            </div>

                            <div class="row mb-5">
                                <div class="col">
                                    @foreach ($event->exhibitors as $item)
                                        <div
                                            class="d-flex flex-wrap bg-light custom-link-hover-effects custom-instructor-details">
                                            <div class="position-relative col-12 col-md-3 lazyloaded"
                                                data-bg-src="{{ $item->exhibitor->image }}"
                                                style="background-position: center center; background-size: cover; min-height: 302px; 
                                                    background-image: url(&quot;{{ $item->exhibitor->image }}&quot;);">
                                            </div>
                                            <div class="col-md-9 p-5">

                                                <div class="d-md-flex mb-4">
                                                    <div class="ps-md-0 mb-3 mb-md-0 pe-4 me-4 border-right">
                                                        <div class="d-flex flex-row align-items-center h-100">
                                                            <div class="p-0">
                                                                <p class="mb-0 text-1 text-uppercase p-relative top-3">
                                                                    Expositor
                                                                </p>
                                                                <h4 class="mb-0 text-color-secondary text-6">
                                                                    {{ $item->exhibitor->full_name }}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="custom-read-more-style-1 position-relative"
                                                    data-plugin-readmore=""
                                                    data-plugin-options="{
                                                        'buttonOpenLabel': 'Leer Más <i class=\'fas fa-chevron-down text-2 ms-1\'></i>',
                                                        'buttonCloseLabel': 'View Less <i class=\'fas fa-chevron-up text-2 ms-1\'></i>',
                                                        'maxHeight': 120
                                                    }"
                                                    style="height: 120px; overflow: hidden; max-height: none;">
                                                    <p class="text-3-5">{{ $item->exhibitor->presentacion }}</p>
                                                    <div class="readmore-button-wrapper text-start"
                                                        style="position: absolute; bottom: 0px; left: 0px; width: 100%; z-index: 2;">
                                                        <a href="#" class="text-decoration-none">Leer Más <i
                                                                class="fas fa-chevron-down text-2 ms-1"></i></a>
                                                    </div>
                                                    <div class="readmore-overlay"
                                                        style="background: linear-gradient(rgba(2, 0, 36, 0) 0%, rgb(255, 255, 255) 100%); position: absolute; bottom: 0px; left: 0px; width: 100%; height: 100px; z-index: 1;">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $event->advertising_video !!}
                                </div>
                            </div>
                            <div class="custom-card-style-2 card-contact-us mb-5">
                                <div class="m-4">
                                    <div class="row flex-column px-5 pt-3 pb-4">
                                        <div class="row px-3 mb-3">
                                            <h3 class="text-secondary font-weight-bold text-capitalize my-3">Registro Online
                                            </h3>
                                            <p>Lorem inpsum dolor sit amet, consectetur adipiscing elit. Sed eget risus
                                                pora,
                                                tincidunt turpis at, intermedum tortor.</p>
                                        </div>
                                        <form class="contact-form custom-form-style-1" method="POST"
                                            action="{{ route('apisubscriber') }}" id="pageContactForm">


                                            <div class="row">
                                                <div class="form-group col">
                                                    <input type="text" placeholder="Nombres Completos" value=""
                                                        data-msg-required="Por favor ingresa tus nombres completos."
                                                        maxlength="125" class="form-control bg-color-tertiary"
                                                        name="full_name" id="full_name" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <input type="text" placeholder="Teléfono" value=""
                                                        data-msg-required="Por favor ingresa tu número de teléfono."
                                                        maxlength="100" class="form-control bg-color-tertiary"
                                                        name="phone" id="phone" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <input type="email" placeholder="Dirección E-mail" value=""
                                                        data-msg-required="Por favor ingresa tu correo electrónico."
                                                        data-msg-email="Please enter a valid email address." maxlength="100"
                                                        class="form-control bg-color-tertiary" name="email" id="email"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                        <input class="form-control bg-color-tertiary" list="datalistOptions" id="exampleDataList" placeholder="Desde que ciudad viene?">
                                                        <datalist id="datalistOptions">
                                                            <option value="San Francisco">
                                                            <option value="New York">
                                                            <option value="Seattle">
                                                            <option value="Los Angeles">
                                                            <option value="Chicago">
                                                        </datalist>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-7">
                                                    <select class="form-select form-control bg-color-tertiary"
                                                        aria-label="Default select example" name="tipo" id="tipo"
                                                        required>
                                                        <option selected>Tipo de ticket </option>
                                                        @foreach ($event->prices as $row)
                                                            <option value="{{ $row->id }}">
                                                                {{ $row->type->description }} S/.
                                                                {{ $row->price }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5">
                                                     <input type="number" placeholder="Cantidad" value="" data-msg-required="Por favor ingresa la cantidad de entrada." maxlength="125" class="form-control bg-color-tertiary" name="amount" id="amount" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <button data-loading-text="Loading..." id="submitPageContactButton"
                                                        class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold"
                                                        style="font-size: 14px;">
                                                        <i class="fa fa-edit" aria-hidden="true"></i> Inscripción
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
    </div>

@endsection
