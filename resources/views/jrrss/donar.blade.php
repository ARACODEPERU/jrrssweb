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
                                <li class="active">Donar</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Donar</h1>
                        </div>
                    </div>
                </div>
            </section>

            
				<div class="container container-xl-custom pt-5 ">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mb-1">SOMOS JRRSS</p>
                                    <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">TU SEMILLA TIENE UN PROPÓSITO</h3>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-md-12 pb-5 ">

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lectus lacus, rutrum sit amet placerat et, bibendum nec mauris. Duis molestie purus eget placerat viverra.
                                    </p>

                                    <form class="contact-form custom-form-style-1" method="POST" action="{{ route('apisubscriber') }}" id="pageContactForm">
                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="text" placeholder="Nombres Completos" value="" data-msg-required="Por favor ingresa tus nombres completos." maxlength="125" class="form-control bg-color-tertiary" name="full_name" id="full_name" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <select class="form-select form-control bg-color-tertiary" aria-label="Default select example" maxlength="125" name="tipo" id="tipo" required>
                                                    <option selected>Seleccionar Tipo de Siembra </option>
                                                    <option value="1">Diezmos</option>
                                                    <option value="2">Ofrenda</option>
                                                    <option value="2">Pacto</option>
                                                    <option value="3">Primicias</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <button data-loading-text="Loading..." id="submitPageContactButton" class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold" >Donar Ahora</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
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