@extends('layouts.jrrss')

@section('content')
    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->
        @if ($events)
            @foreach ($events as $event)
            <div role="main" class="main">
                <div class="ara_centrado_total">
                    <img style="width: 100%; height: auto;" src="{{ asset('storage/' . $event->image1) }}">
                </div>
                <div class="container-lg container-xl-custom pt-5">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3" style="line-height: 35px;">
                                {{ $event->title }}
                            </h3>
                            <p>
                                {!! $event->description !!}
                            </p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row pb-2">
                        <div class="col-md-7 pb-5">
                            <div class="row mb-5">
                                <div class="col">
                                    @foreach ($event->exhibitors as $key => $item)
                                        <div class="d-flex flex-wrap bg-light custom-link-hover-effects 
                                                    custom-instructor-details" style="padding: 15px 0px;">
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
                                                                    {{ $item->exhibitor->names }} {{ $item->exhibitor->father_lastname }}
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
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $event->advertising_video !!}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                @if ($event)
                                        <div class="col-md-12">
                                            <div class="custom-card-style-2 card-contact-us mb-5">
                                                <div class="m-4">
                                                    <div class="row flex-column px-5 pt-3 pb-4">
                                                        <div class="row px-3 mb-3">
                                                            <h3 class="text-secondary font-weight-bold text-capitalize my-3">
                                                                <i class="fa fa-ticket" style="font-size: 22px;" aria-hidden="true"></i>
                                                                Adquirir Entrada
                                                            </h3>
                                                            <p>
                                                            </p>
                                                        </div>
                                                        <form method="POST" action="{{ route('web_eventos_registrarse') }}"
                                                            id="pageContactForm">
                                                            @csrf
                                                            <div class="row g-3">
                                                                <input type="hidden" value="{{ $event->id }}" name="event_id" />
                                                                <div class="col-md-6">
                                                                    <label for="full_name" class="col-form-label">Nombres</label>
                                                                    <input type="text" placeholder="Por favor ingresa tus nombres."
                                                                        value="{{ old('full_name') }}"
                                                                        data-msg-required="Por favor ingresa tus nombres." maxlength="125"
                                                                        class="form-control" name="full_name" id="full_name" required>
    
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="full_surnames" class="col-form-label">Apellidos</label>
    
                                                                    <input type="text" placeholder="Por favor ingresa tus apellidos."
                                                                        value="{{ old('full_surnames') }}"
                                                                        data-msg-required="Por favor ingresa tus apellidos ."
                                                                        maxlength="125" class="form-control" name="full_surnames"
                                                                        id="full_surnames" required>
    
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="identification_number" class="col-form-label">Número de
                                                                        identificación</label>
    
                                                                    <input type="text"
                                                                        placeholder="Por favor ingresa Número de identificación."
                                                                        value="{{ old('identification_number') }}"
                                                                        data-msg-required="Por favor ingresa Número de identificación."
                                                                        maxlength="100" class="form-control" name="identification_number"
                                                                        id="identification_number" required>
    
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="phone" class="col-form-label">Número de
                                                                        Teléfono</label>
    
                                                                    <input type="text"
                                                                        placeholder="Por favor ingresa tu número de teléfono."
                                                                        value="{{ old('phone') }}"
                                                                        data-msg-required="Por favor ingresa tu número de teléfono."
                                                                        maxlength="100" class="form-control" name="phone" id="phone"
                                                                        required>
    
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="email" class="col-form-label">Correo
                                                                        Electrónico</label>
    
                                                                    <input type="email"
                                                                        placeholder="Por favor ingresa tu correo electrónico"
                                                                        value="{{ old('email') }}"
                                                                        data-msg-required="Por favor ingresa tu correo electrónico."
                                                                        data-msg-email="Por favor ingresa tu correo electrónico"
                                                                        maxlength="100" class="form-control" name="email" id="email"
                                                                        required>
    
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="exampleDataList" class="col-form-label">Ciudad</label>
    
                                                                    <input class="form-control" list="datalistOptions" name="lugar"
                                                                        id="exampleDataList" placeholder="Desde que ciudad viene?"
                                                                        value="{{ old('lugar') }}">
                                                                    <datalist id="datalistOptions">
                                                                        @foreach ($ubigeo as $row)
                                                                            <option value="{{ $row->city_name }}" />
                                                                        @endforeach
                                                                    </datalist>
    
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="tipo" class="col-form-label">Entrada</label>
    
                                                                    <select class="form-select form-control"
                                                                        aria-label="Default select example" name="tipo" id="tipo"
                                                                        required>
                                                                        <option selected>Tipo de ticket </option>
                                                                        @foreach ($event->prices as $row)
                                                                            @if ($row->price > 0)
                                                                                <option value="{{ $row->id }}">
                                                                                    {{ $row->type->description }} S/.
                                                                                    {{ $row->price }}
                                                                                </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
    
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="quantity" class="col-form-label">Cantidad de
                                                                        entrada</label>
    
                                                                    <input type="number"
                                                                        placeholder="Por favor ingresa la cantidad de entrada."
                                                                        value="{{ old('quantity') }}"
                                                                        data-msg-required="Por favor ingresa la cantidad de entrada."
                                                                        maxlength="125" class="form-control" name="quantity"
                                                                        id="quantity" required>
    
                                                                </div>
                                                                <div class="col-md-12 d-grid">
                                                                    <br>
                                                                    <button type="submit" class="boton-fuego">
                                                                        <i class="fa fa-shopping-cart" style="font-size: 20px;"></i>&nbsp; Continuar
                                                                    </button>
                                                                </div>
                                                                @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
    
    
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
    </div>

@endsection
