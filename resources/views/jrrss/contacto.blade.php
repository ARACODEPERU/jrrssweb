@extends('layouts.jrrss')

@section('content')

    <div class="body">
        
        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->
        

        <div role="main" class="main">

            

            
            <section class="section-custom-medical">
                <div class="container">
                    <div class="row medical-schedules">
                        <div class="col-xl-3 box-one bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
                            <div class="feature-box feature-box-style-2 align-items-center p-4">
                                <div class="feature-box-icon p-0">
                                    <img src="{{ asset('themes/jrrss/assets/img/demos/medical/icons/medical-icon-heart.png') }}" alt class="img-fluid pt-1" />
                                </div>
                                <div class="feature-box-info">
                                    <h4 class="m-0 p-0">Evangelizar</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 box-two bg-color-dark appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
                            <div class="feature-box-info">
                                <h4 class="m-0 p-0">Discipular</h4>
                            </div>
                        </div>
                        <div class="col-xl-3 box-three bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200">
                            <div class="feature-box-info">
                                <h4 class="m-0 p-0">Afirmar</h4>
                            </div>
                        </div>
                        <div class="col-xl-3 box-four bg-color-dark appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
                            <div class="feature-box-info">
                                <h4 class="m-0 p-0">Enviar</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5 pt-3 pb-3">
                        <div class="col-md-8">
                            <p class="lead font-weight-normal">Aqui sigue mas contenido en el body</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non ornare arcu. Class aptent taciti sociosqu ad...</p>

                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <img src="img/demos/medical/gallery/gallery-1.jpg" alt class="img-fluid box-shadow-custom" /> 
                        </div>
                    </div>
                </div>
            </section>



        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
        


    </div>

@endsection