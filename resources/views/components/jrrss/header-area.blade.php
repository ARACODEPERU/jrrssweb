<div>
    <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 164, 'stickySetTop': '-164px', 'stickyChangeLogo': false}">
        <div class="header-body border-0">
            <div class="header-top header-top-default border-bottom-0 bg-color-dark">
                <div class="container">
                    <div class="header-row py-2">
                        <div class="header-column justify-content-start">
                            <div class="header-row">
                                <nav class="header-nav-top">
                                    <ul class="nav nav-pills text-uppercase text-2">
                                        <li class="nav-item nav-item-anim-icon" style="padding: 0px 10px;">
                                            <a class="nav-link pe-0 text-light opacity-7" href=""><i class="far fa-play-circle"></i> EN VIVO</a>
                                        </li>
                                        <li class="nav-item nav-item-anim-icon" style="padding: 0px 10px;">
                                            <a class="nav-link pe-0 text-light opacity-7" href=""><i class="fas fa-university"></i> CAMPUS VIRTUAL</a>
                                        </li>
                                        <li class="nav-item nav-item-anim-icon" style="padding: 0px 10px;">
                                            <a class="nav-link pe-0 text-light opacity-7" href=""><i class="fa fa-key"></i> Intranet</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean social-icons-icon-light">
                                    <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    <li class="social-icons-youtube"><a href="http://www.youtube.com/" target="_blank" title="youtube"><i class="fab fa-youtube"></i></a></li>
                                    <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-tiktok"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ara_centrado_total">
                <img style="max-width: 100%;
                height: auto;" src="{{ asset('themes/jrrss/assets/img/cabecera-WEB.jpg') }}" alt="">
            </div>
            <div class="header-nav-bar header-nav-bar-top-border bg-light">
                <div class="header-container ">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row justify-content-end">
                                <div class="header-nav p-0">
                                    <div class="header-nav header-nav-line header-nav-divisor header-nav-spaced justify-content-lg-center">
                                        <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
                                                <ul class="nav nav-pills flex-column flex-lg-row" id="mainNav">
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('cms_principal') ? 'active' : '' }}" href="{{ route('cms_principal') }}">
                                                            HOME
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_quienes_somos') ? 'active' : '' }}" href="{{ route('web_quienes_somos') }}">
                                                            ¿QUIENES SOMOS?
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_sedes') ? 'active' : '' }}" href="{{ route('web_sedes') }}">
                                                            SEDES
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_cobertura') ? 'active' : '' }}" href="{{ route('web_cobertura') }}">
                                                            COBERTURA
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_eventos') ? 'active' : '' }}" href="{{ route('web_eventos') }}">
                                                            EVENTOS
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('escueloa') ? 'active' : '' }}" href="">
                                                            ESCUELA SOBRENATURAL
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('escueloa') ? 'active' : '' }}" href="">
                                                            ECELT
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('escueloa') ? 'active' : '' }}" href="">
                                                            RMNT
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('escueloa') ? 'active' : '' }}" href="">
                                                            KIDS
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_testimonios') ? 'active' : '' }}" href="{{ route('web_testimonios') }}">
                                                            TESTIMONIOS
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_contacto') ? 'active' : '' }}" href="{{ route('web_contacto') }}">
                                                            CONTACTO
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('donar_falta') ? 'active' : '' }}" href="">
                                                            DONAR
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>