@extends('layouts.jrrss')


@section('content')
    <div class="body">
        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->
        <div role="main" class="main">

            <div class="ara_centrado_total">
                <img style="width: 100%; height: auto;"
                    src="{{ asset('storage/' . $event->image1) }}">
            </div>
            @if ($event)
                <div class="container container-xl-custom pt-5">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-6">
                            <div class="custom-card-style-2 card-contact-us mb-5">
                                <div class="m-4">
                                    <div class="row flex-column px-5 pt-3 pb-4">
                                        <div class="row px-3 mb-3">
                                            <h3 class="text-secondary font-weight-bold text-capitalize my-3">
                                                Información del cliente
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
                                                <div class="col-sm-12 d-grid">
                                                    <button type="submit" class="btn btn-primary">Continuar</button>
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
                    </div>
                </div>
            @endif
        </div>
        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
    </div>

@endsection
