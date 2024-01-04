@extends('layouts.jrrss')

@section('content')

    <div class="body">
        
        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->
        

        <div role="main" class="main">
            
            <section class="page-header bg-color-tertiary custom-page-header page-header-modern page-header-background page-header-background-sm parallax mt-0" 
                     data-plugin-parallax data-plugin-options="{'speed': 1.2}" 
                     data-image-src="{{ asset('themes/jrrss/assets/img/demos/construction-2/page-header.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <ul class="breadcrumb custom-breadcrumb d-block text-center text-4">
                                <li><a href="{{ route('cms_principal') }}">Home</a></li>
                                <li class="active">GRACIAS POR DONAR</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">GRACIAS POR DONAR</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <p class="mb-1">Estimado(a)</p>
                        <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">JESUS ANAYA AGUIRRE</h3>
                        <p>
                            Le extendemos nuestro agradecimiento por sumarce al sostenimiento del ministerio. Sabiendo que toda semilla que usted siembra traera una gran cosecha como dice su palabra:
                        </p>
                        <p>
                            Pero otra parte cayó en buena tierra, y dio fruto, pues brotó y creció, y produjo a treinta, a sesenta, y a ciento por uno. 
                            <br>
                            <span style="color: orange"><b>S. Marcos 4:8 RVR1960</b></span>
                        </p>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>


        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
        


    </div>

@endsection