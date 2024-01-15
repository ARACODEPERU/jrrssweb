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
                                <li class="active">Sedes</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Nuestras Sedes</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container pt-1">
                <div class="row" style="background-color: #f8f8f8; padding: 10px; margin-top: 40px;">
                    <div class="col-md-6 ara_centrado_total" style="padding: 10px;">
                        <img style="width: 100%;" src="{{ asset('themes/jrrss/assets/img/sedes/pastoresRodriguez.jpeg') }}" alt="">    
                    </div>
                    <div class="col-md-6" style="padding: 30px 10px 30px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>
                                    <img style="width: 30px;" src="{{ asset('themes/jrrss/assets/img/flags/peru.png') }}" alt=""> 
                                    &nbsp; SEDE: Lima Sur
                                </h3>
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
                                    <b>Correo Electrónico:</b> contacto@somosjrrss.org
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
                                            src="{{ asset('themes/jrrss/assets/img/sedes/ps-rodriguez.jpg') }}"
                                     alt="img">
                            </div>
                            <div class="col-md-10">
                                <h4 style="margin-top: 10px;">Alberto & Aitza Rodriguez</h4>
                                <div style="margin-top: -20px;" class="ps-funcion">Pastores Responsables</div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-4">
                            <a href="" class="btn btn-primary" style="width: 100%;">¿Como llegar?</a>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="background-color: #f8f8f8; padding: 10px; margin-top: 40px;">
                    <div class="col-md-6 ara_centrado_total" style="padding: 10px;">
                        <img style="width: 100%;" src="{{ asset('themes/jrrss/assets/img/sedes/pastoresRodriguez.jpeg') }}" alt="">    
                    </div>
                    <div class="col-md-6" style="padding: 30px 10px 30px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>
                                    <img style="width: 30px;" src="{{ asset('themes/jrrss/assets/img/flags/españa.png') }}" alt=""> 
                                    &nbsp; SEDE: Madrid
                                </h3>
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
                                    <b>Correo Electrónico:</b> contacto@somosjrrss.org
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
                                            src="{{ asset('themes/jrrss/assets/img/sedes/ps-rodriguez.jpg') }}"
                                     alt="img">
                            </div>
                            <div class="col-md-10">
                                <h4 style="margin-top: 10px;">Alberto & Aitza Rodriguez</h4>
                                <div style="margin-top: -20px;" class="ps-funcion">Pastores Responsables</div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-4">
                            <a href="" class="btn btn-primary" style="width: 100%;">¿Como llegar?</a>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container pt-1">
                <div class="row" style="background-color: #f8f8f8; padding: 10px; margin-top: 40px;">
                    <div class="col-md-6 ara_centrado_total" style="padding: 10px;">
                        <img style="width: 100%;" src="{{ asset('themes/jrrss/assets/img/sedes/pastoresRodriguez.jpeg') }}" alt="">    
                    </div>
                    <div class="col-md-6" style="padding: 30px 10px 30px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>
                                    <img style="width: 30px;" src="{{ asset('themes/jrrss/assets/img/flags/peru.png') }}" alt=""> 
                                    &nbsp; SEDE: Lima Sur
                                </h3>
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
                                    <b>Correo Electrónico:</b> contacto@somosjrrss.org
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
                                            src="{{ asset('themes/jrrss/assets/img/sedes/ps-rodriguez.jpg') }}"
                                     alt="img">
                            </div>
                            <div class="col-md-10">
                                <h4 style="margin-top: 10px;">Alberto & Aitza Rodriguez</h4>
                                <div style="margin-top: -20px;" class="ps-funcion">Pastores Responsables</div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-4">
                            <a href="" class="btn btn-primary" style="width: 100%;">¿Como llegar?</a>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>

                <div class="row" style="background-color: #f8f8f8; padding: 10px; margin-top: 40px;">
                    <div class="col-md-6 ara_centrado_total" style="padding: 10px;">
                        <img style="width: 100%;" src="{{ asset('themes/jrrss/assets/img/sedes/pastoresRodriguez.jpeg') }}" alt="">    
                    </div>
                    <div class="col-md-6" style="padding: 30px 10px 30px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>
                                    <img style="width: 30px;" src="{{ asset('themes/jrrss/assets/img/flags/españa.png') }}" alt=""> 
                                    &nbsp; SEDE: New Yersi
                                </h3>
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
                                    <b>Correo Electrónico:</b> contacto@somosjrrss.org
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
                                            src="{{ asset('themes/jrrss/assets/img/sedes/ps-rodriguez.jpg') }}"
                                     alt="img">
                            </div>
                            <div class="col-md-10">
                                <h4 style="margin-top: 10px;">Alberto & Aitza Rodriguez</h4>
                                <div style="margin-top: -20px;" class="ps-funcion">Pastores Responsables</div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-4">
                            <a href="" class="btn btn-primary" style="width: 100%;">¿Como llegar?</a>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
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
