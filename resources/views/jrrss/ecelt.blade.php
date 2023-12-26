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
                                <li class="active">ECELT</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">ECELT</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h3>AYUDÁNDOLE A ENSEÑAR A SUS HIJOS ACERCA DE JESÚS</h3>
                        <p>
                            ¡Usted está llamado a formar a sus hijos
                            en el camino que deben seguir y ese
                            camino es JESÚS! Tal vez no sabe por
                            dónde comenzar, ¡pero estamos aquí
                            para ayudarle!
                        </p>
                        <p>
                            En Supernatural Kidz Church, usted tiene
                            acceso a eventos para la familia y de
                            entrenamiento, videos de consejos
                            semanales, recursos y más para
                            caminar con el Señor.
                        </p>
                    </div>
                    <div class="col-md-6 ara_centrado_total">
                        <iframe width="100%" height="380" src="https://www.youtube.com/embed/ruKNF1ukR6E" title="NOSOTROS LOS JOVENES | CONFERENCIA RMNT 2022" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="container py-4">

                <div class="row">
                    <div class="col" style="min-height: 250px;">

                        <div class="row portfolio-list lightbox" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                            <div class="col-md-4 appear-animation animated expandIn appear-animation-visible" data-appear-animation="expandIn" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                <div class="portfolio-item">
                                    <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                        <span class="thumb-info-wrapper border-radius-0">
                                            <img src="{{ asset('themes/jrrss/assets/img/rmnt/01.jpg') }}" class="img-fluid border-radius-0" alt="">
                                            <span class="thumb-info-action">
                                                <a href="{{ asset('themes/jrrss/assets/img/rmnt/01.jpg') }}" class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 appear-animation animated expandIn appear-animation-visible" data-appear-animation="expandIn" data-appear-animation-delay="600" style="animation-delay: 600ms;">
                                <div class="portfolio-item">
                                    <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                        <span class="thumb-info-wrapper border-radius-0">
                                            <img src="{{ asset('themes/jrrss/assets/img/rmnt/02.jpg') }}" class="img-fluid border-radius-0" alt="">
                                            <span class="thumb-info-action">
                                                <a href="{{ asset('themes/jrrss/assets/img/rmnt/02.jpg') }}" class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 appear-animation animated expandIn appear-animation-visible" data-appear-animation="expandIn" data-appear-animation-delay="1000"  style="animation-delay: 100ms;">
                                <div class="portfolio-item">
                                    <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                        <span class="thumb-info-wrapper border-radius-0">
                                            <img src="{{ asset('themes/jrrss/assets/img/rmnt/03.jpg') }}" class="img-fluid border-radius-0" alt="">
                                            <span class="thumb-info-action">
                                                <a href="{{ asset('themes/jrrss/assets/img/rmnt/03.jpg') }}" class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 appear-animation animated expandIn appear-animation-visible" data-appear-animation="expandIn" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                <div class="portfolio-item">
                                    <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                        <span class="thumb-info-wrapper border-radius-0">
                                            <img src="{{ asset('themes/jrrss/assets/img/rmnt/01.jpg') }}" class="img-fluid border-radius-0" alt="">
                                            <span class="thumb-info-action">
                                                <a href="{{ asset('themes/jrrss/assets/img/rmnt/01.jpg') }}" class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 appear-animation animated expandIn appear-animation-visible" data-appear-animation="expandIn" data-appear-animation-delay="600" style="animation-delay: 600ms;">
                                <div class="portfolio-item">
                                    <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                        <span class="thumb-info-wrapper border-radius-0">
                                            <img src="{{ asset('themes/jrrss/assets/img/rmnt/02.jpg') }}" class="img-fluid border-radius-0" alt="">
                                            <span class="thumb-info-action">
                                                <a href="{{ asset('themes/jrrss/assets/img/rmnt/02.jpg') }}" class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 appear-animation animated expandIn appear-animation-visible" data-appear-animation="expandIn" data-appear-animation-delay="1000"  style="animation-delay: 100ms;">
                                <div class="portfolio-item">
                                    <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                        <span class="thumb-info-wrapper border-radius-0">
                                            <img src="{{ asset('themes/jrrss/assets/img/rmnt/03.jpg') }}" class="img-fluid border-radius-0" alt="">
                                            <span class="thumb-info-action">
                                                <a href="{{ asset('themes/jrrss/assets/img/rmnt/03.jpg') }}" class="lightbox-portfolio">
                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                                </a>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <nav aria-label="...">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
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

            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible" 
                    data-appear-animation="fadeIn" data-plugin-parallax="" data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}" 
                    data-image-src="{{ asset('themes/jrrss/assets/img/parallax/parallax_rmnt.jpg') }}" style="position: relative; overflow: hidden; animation-delay: 100ms;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 text-center">
                                <h2 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" 
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                    Que nadie te menosprecie por ser joven. Al contrario, que los creyentes vean en ti un ejemplo a seguir en la manera de hablar, en la conducta, y en amor, fe y pureza.
                                </h2>
                                <p class="text-color-light opacity-7 text-3 px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible" 
                                   data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms;">
                                   1 Timoteo 4:12
                                </p>
                            </div>
                        </div>
                    </div>
            </section>

            <br><br>
            
            <div class="container py-4">

                <div class="row">
                    <div class="col" style="min-height: 250px;">

                        <div class="row portfolio-list lightbox" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                            <div class="col-md-6" style="padding: 10px;">
                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/VCHW02K24aA" title="AGUA VIVA KIDS - Los Milagros De Jesus" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-6" style="padding: 10px;">
                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/VCHW02K24aA" title="AGUA VIVA KIDS - Los Milagros De Jesus" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-6" style="padding: 10px;">
                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/VCHW02K24aA" title="AGUA VIVA KIDS - Los Milagros De Jesus" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-6" style="padding: 10px;">
                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/VCHW02K24aA" title="AGUA VIVA KIDS - Los Milagros De Jesus" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-6" style="padding: 10px;">
                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/VCHW02K24aA" title="AGUA VIVA KIDS - Los Milagros De Jesus" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-6" style="padding: 10px;">
                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/VCHW02K24aA" title="AGUA VIVA KIDS - Los Milagros De Jesus" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <nav aria-label="...">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
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