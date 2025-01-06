<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JRRSS | Sitio Web</title>

    <meta name="keywords" content="Jesus Rey de Reyes y Señor de Señores" />
    <meta name="description" content="Iglesia Biblica Internacional">
    <meta name="author" content="aracode smart solution">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('themes/jrrss/assets/img/favicon.ico') }}" type="image/x-icon" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet"
        href="{{ asset('themes/jrrss/assets/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('themes/jrrss/assets/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/theme-shop.css') }}">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/vendor/circle-flip-slideshow/css/component.css') }}">


    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/skins/default.css') }}">
    <link id="skinCSS" rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/skins/skin-corporate-8.css') }}">
    <link id="skinCSS" rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/skins/skin-medical.css') }}">
    <link id="skinCSS" rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/skins/skin-construction-2.css') }}">


    <!-- Demo CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/demos/demo-medical.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/demos/demo-construction-2.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/demos/demo-barber.css') }}"> 

    
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/aracode.css') }}">

    <!-- Theme Custom CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/custom.css') }}"> --}}

    <!-- ihover -->
    <link rel="stylesheet" href="{{ asset('themes/jrrss/assets/css/ihover-aracode.css') }}">



    @yield('styles')
</head>

<body data-plugin-page-transition>
    @yield('content')

    <!-- Vendor -->
    <script src="{{ asset('themes/jrrss/assets/vendor/plugins/js/plugins.min.js') }}"></script>

    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('themes/jrrss/assets/js/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('themes/jrrss/assets/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('themes/jrrss/assets/js/theme.init.js') }}"></script>



    <!-- Circle Flip Slideshow Script -->
    <script src="{{ asset('themes/jrrss/assets/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js') }}"></script>
    <!-- Current Page Views -->
    <script src="{{ asset('themes/jrrss/assets/js/views/view.home.js') }}"></script>
    <!-- Current Page Vendor and Views -->
    <script src="{{ asset('themes/jrrss/assets/js/views/view.contact.js') }}"></script>
    <!-- Theme Initialization Files -->
    <script src="{{ asset('themes/jrrss/assets/js/theme.init.js') }}"></script>


    {{-- <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script> --}}

    @yield('scripts')

</body>

</html>
