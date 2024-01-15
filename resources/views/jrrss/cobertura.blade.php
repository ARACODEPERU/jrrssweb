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
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                <li class="active">Coberturas</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Nuestras Coberturas</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-6" style="padding: 40px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Iglesia Portadores De Su Gloria </h3>
                            </div>
                            <div class="col-md-12 ara_centrado_total" style="margin-top: -15px;">
                                <img style="width: 100%;" src="{{ asset('themes/jrrss/assets/img/cobertura/arequipa.jpg') }}" alt="">
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <p>
                                            ¡Usted está llamado a formar a sus hijos
                                            en el camino que deben seguir y ese
                                            camino es JESÚS! Tal vez no sabe por
                                            dónde comenzar, ¡pero estamos aquí
                                            para ayudarle!
                                        </p>
                                        <p>
                                            <b>Dirección:</b> Av. Gral. Salaverry 2599, San Isidro 15076
                                            <br>
                                            <b>Teléfono:</b> (+51) 977627207
                                            <br>
                                            <b>Correo Electrónico:</b> (+51) 977627207
                                            <br>
                                            <b>Horario de Reunión:</b> Domingos 09:00 pm
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img style="width: 100%;
                                                    border-radius: 50%; /* Hace que los bordes sean redondos */
                                                    overflow: hidden; /* Asegura que la imagen se ajuste al radio especificado */
                                                    border: 2px solid #000; /* Cambia el color del borde según tus preferencias */"
                                                    src="{{ asset('themes/jrrss/assets/img/sedes/ps-arequipa.jpg') }}"
                                            alt="img">
                                    </div>
                                    <div class="col-md-10">
                                        <h4 style="margin-top: 10px;">Nombre del Pastor</h4>
                                        <div style="margin-top: -20px;" class="ps-funcion">Pastores Responsables</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding: 40px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Iglesia Portadores De Su Gloria </h3>
                            </div>
                            <div class="col-md-12 ara_centrado_total" style="margin-top: -15px;">
                                <img style="width: 100%;" src="{{ asset('themes/jrrss/assets/img/cobertura/arequipa.jpg') }}" alt="">
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <p>
                                            ¡Usted está llamado a formar a sus hijos
                                            en el camino que deben seguir y ese
                                            camino es JESÚS! Tal vez no sabe por
                                            dónde comenzar, ¡pero estamos aquí
                                            para ayudarle!
                                        </p>
                                        <p>
                                            <b>Dirección:</b> Av. Gral. Salaverry 2599, San Isidro 15076
                                            <br>
                                            <b>Teléfono:</b> (+51) 977627207
                                            <br>
                                            <b>Correo Electrónico:</b> (+51) 977627207
                                            <br>
                                            <b>Horario de Reunión:</b> Domingos 09:00 pm
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img style="width: 100%;
                                                    border-radius: 50%; /* Hace que los bordes sean redondos */
                                                    overflow: hidden; /* Asegura que la imagen se ajuste al radio especificado */
                                                    border: 2px solid #000; /* Cambia el color del borde según tus preferencias */"
                                                    src="{{ asset('themes/jrrss/assets/img/sedes/ps-arequipa.jpg') }}"
                                            alt="img">
                                    </div>
                                    <div class="col-md-10">
                                        <h4 style="margin-top: 10px;">Nombre del Pastor</h4>
                                        <div style="margin-top: -20px;" class="ps-funcion">Pastores Responsables</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding: 40px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Iglesia Portadores De Su Gloria </h3>
                            </div>
                            <div class="col-md-12 ara_centrado_total" style="margin-top: -15px;">
                                <img style="width: 100%;" src="{{ asset('themes/jrrss/assets/img/cobertura/arequipa.jpg') }}" alt="">
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <p>
                                            ¡Usted está llamado a formar a sus hijos
                                            en el camino que deben seguir y ese
                                            camino es JESÚS! Tal vez no sabe por
                                            dónde comenzar, ¡pero estamos aquí
                                            para ayudarle!
                                        </p>
                                        <p>
                                            <b>Dirección:</b> Av. Gral. Salaverry 2599, San Isidro 15076
                                            <br>
                                            <b>Teléfono:</b> (+51) 977627207
                                            <br>
                                            <b>Correo Electrónico:</b> (+51) 977627207
                                            <br>
                                            <b>Horario de Reunión:</b> Domingos 09:00 pm
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img style="width: 100%;
                                                    border-radius: 50%; /* Hace que los bordes sean redondos */
                                                    overflow: hidden; /* Asegura que la imagen se ajuste al radio especificado */
                                                    border: 2px solid #000; /* Cambia el color del borde según tus preferencias */"
                                                    src="{{ asset('themes/jrrss/assets/img/sedes/ps-arequipa.jpg') }}"
                                            alt="img">
                                    </div>
                                    <div class="col-md-10">
                                        <h4 style="margin-top: 10px;">Nombre del Pastor</h4>
                                        <div style="margin-top: -20px;" class="ps-funcion">Pastores Responsables</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding: 40px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Iglesia Portadores De Su Gloria </h3>
                            </div>
                            <div class="col-md-12 ara_centrado_total" style="margin-top: -15px;">
                                <img style="width: 100%;" src="{{ asset('themes/jrrss/assets/img/cobertura/arequipa.jpg') }}" alt="">
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <p>
                                            ¡Usted está llamado a formar a sus hijos
                                            en el camino que deben seguir y ese
                                            camino es JESÚS! Tal vez no sabe por
                                            dónde comenzar, ¡pero estamos aquí
                                            para ayudarle!
                                        </p>
                                        <p>
                                            <b>Dirección:</b> Av. Gral. Salaverry 2599, San Isidro 15076
                                            <br>
                                            <b>Teléfono:</b> (+51) 977627207
                                            <br>
                                            <b>Correo Electrónico:</b> (+51) 977627207
                                            <br>
                                            <b>Horario de Reunión:</b> Domingos 09:00 pm
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img style="width: 100%;
                                                    border-radius: 50%; /* Hace que los bordes sean redondos */
                                                    overflow: hidden; /* Asegura que la imagen se ajuste al radio especificado */
                                                    border: 2px solid #000; /* Cambia el color del borde según tus preferencias */"
                                                    src="{{ asset('themes/jrrss/assets/img/sedes/ps-arequipa.jpg') }}"
                                            alt="img">
                                    </div>
                                    <div class="col-md-10">
                                        <h4 style="margin-top: 10px;">Nombre del Pastor</h4>
                                        <div style="margin-top: -20px;" class="ps-funcion">Pastores Responsables</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br><br>



        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->



    </div>

@endsection
