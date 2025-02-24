@extends('layouts.jrrss')

@section('content')

    <div class="body">

        <!-- Header - area start -->
        <x-jrrss.header-area></x-jrrss.header-area>
        <!-- Header - area end -->


        <div role="main" class="main">

            <section data-plugin-parallax data-plugin-options="{'speed': 1.2}" style="position: relative; height: 250px; overflow: hidden;">
                <img style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" src="{{ $banner->content }}" alt="">
            </section>

            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <p class="mb-1">Estimado(a)</p>
                        <h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">
                            Nombre de la Persona
                        </h3>
                        <p>
                            ¡Gracias por tomarte el tiempo de escribirnos! 
                            <br>
                            🙌 Hemos recibido tu mensaje y pronto nos pondremos en contacto contigo. 
                            Nos alegra saber de ti y estaremos felices de acompañarte en lo que necesites.
                        </p>
                        <p>
                            📞 Si tu consulta es urgente, no dudes en visitarnos o llamarnos. Estamos aquí para ti.
                            <br>
                            🙏 Que Dios te bendiga y llene tu vida de paz y amor.
                        </p>
                        <p>
                            💙 Con cariño, <br>
                            <span style="color: orange">Jesús Rey de Reyes y Señor de Señores</span> <br>
                            📧 ibi.jrrss@gmail.com | 📱 (+51) 989 533 683
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

