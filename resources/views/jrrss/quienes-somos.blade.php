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
                                <li class="active">¿Quienes Somos?</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">¿Quienes Somos?</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Juntos llevamos la visión de Dios</h3>
                        <p>
                            Juntos llevamos la visión de Dios El Ministerio Internacional El Rey Jesús es una de las iglesias multiculturales de más 
                            rápido crecimiento en Estados Unidos, y es reconocida por sus visibles manifestaciones del poder sobrenatural de Dios.
                        </p>
                        <p>
                            El pastor principal de ERJ es el Apóstol Guillermo Maldonado, quien da cobertura a 500 iglesias en 70 países, que forman la Red Global Sobrenatural. Es también fundador de la Universidad del Ministerio Sobrenatural (USM) y autor de más de 50 libros con récord de ventas en Estados Unidos.
                        </p>
                    </div>
                    <div class="col-md-6 ara_centrado_total">
                        <img width="100%;" src="{{ asset('themes/jrrss/assets/img/papa-y-mama.jpg') }}" alt="">
                    </div>
                </div>
            </div>


            
            <div class="container pt-4">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-2 mt-5">La Visión en Acción</h4>

                        <div class="row process process-connecting-line my-5">
                            <div class="connecting-line appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" style="animation-delay: 100ms;"></div>
                            
                            <div class="col-md-3 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">1</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">EVANGELIZAR</h4>
                                    <p class="mb-0">
                                        Es aquella etapa del proceso de la visión en la que ganamos almas para Cristo. TODO miembro de la iglesia debe ser un ganador de almas. 
                                        Nuestro evangelismo es sobrenatural, pues no sólo predicamos la Palabra y testificamos, sino que también manifestamos pruebas del poder 
                                        de Dios a través de milagros, sanidades, palabras proféticas y de ciencia.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="900" style="animation-delay: 900ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">2</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">AFIRMAR</h4>
                                    <p class="mb-0">Es aquella etapa del proceso de la visión mediante la cual se cimenta, asegura, consolida la decisión del nuevo creyente (NC) 
                                        y se le da el seguimiento apropiado hasta que desarrolle los fundamentos básicos de su nueva vida en Cristo, para que luego forme parte de un  
                                        grupo de discipulado.</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1000" style="animation-delay: 1000ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">3</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">DISCIPULAR</h4>
                                    <p class="mb-0">
                                        El objetivo de discipular es  enseñar, entrenar, equipar, activar y pastorear ya que se busca el crecimiento constante y continuo de la 
                                        persona.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-5 mb-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1000" style="animation-delay: 1000ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">4</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">ENVIAR</h4>
                                    <p class="mb-0">
                                        Líderes son enviados dentro de la iglesia local, con el ADN de esa Casa y equipados con el poder y los dones necesarios para extender el 
                                        Reino de Dios por medio de desarrollar cada una de las tareas que se le encargan. También, a medida que crecen espiritualmente, pueden ser 
                                        promovidos y enviados como diácono, anciano o ministro, según el llamado que Dios tenga para su vida.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            
            
            <section class="section section-parallax section-height-5 overlay overlay-show overlay-op-7 border-0 m-0 appear-animation animated fadeIn appear-animation-visible" 
                    data-appear-animation="fadeIn" data-plugin-parallax="" data-plugin-options="{'speed': 1.5, 'parallaxHeight': '138%'}" 
                    data-image-src="{{ asset('themes/jrrss/assets/img/parallax/parallax_nosotros.jpg') }}" style="position: relative; overflow: hidden; animation-delay: 100ms;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 text-center">
                                <h2 class="text-color-light font-weight-bold custom-tertiary-font ls-0 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" 
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                    Y en su vestidura y en su muslo tiene escrito este nombre: REY DE REYES Y SEÑOR DE SEÑORES.
                                </h2>
                                <p class="text-color-light opacity-7 text-3 px-5 mx-5 mb-0 appear-animation animated fadeInUpShorter appear-animation-visible" 
                                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms;">
                                    Apocalipsis 19:16
                                </p>
                            </div>
                        </div>
                    </div>
            </section>
            
            <div class="container pt-4">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-2 mt-5">Reseña Historica</h4>

                        <div class="process process-vertical py-4">
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">1</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Morbi molestie aliquet magna ac dignissim. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.</p>
                                </div>
                            </div>
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" style="animation-delay: 600ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">2</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.</p>
                                </div>
                            </div>
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" style="animation-delay: 600ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">3</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor. Nam ullamcorper bibendum est et porta. Donec congue libero vitae semper varius. Vivamus eu congue leo. Quisque ullamcorper elit at metus elementum condimentum. Sed orci augue, pellentesque in egestas quis, vestibulum non ex. Suspendisse tempus tellus ac augue iaculis suscipit.</p>
                                </div>
                            </div>
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">4</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor.</p>
                                </div>
                            </div>
                            <div class="process-step appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content">5</strong>
                                </div>
                                <div class="process-step-content">
                                    <h4 class="mb-1 text-4 font-weight-bold">Título</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas risus est, dignissim non urna at, efficitur cursus nibh. Curabitur varius vel mauris at auctor.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            


        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
        


    </div>

@endsection