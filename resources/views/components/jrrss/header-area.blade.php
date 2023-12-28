<div>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Estilos para Switch */
        .switch {
            width: 60px;
            height: 25px;
            padding: 0 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            border-radius: 100px;
            border: #333 solid 2px;
            background-color: #132b41;
        }

        .switch i {
            font-size: 1rem;
            color: #fdc21c;
        }

        /*Accede al ultimo item de la lista */
        ul.nav li.switch::before {
            content: "";
            position: absolute;
            height: 25px;
            width: 25px;
            border-radius: 50%;
            background-color: #fff;
            border: solid thin #000;
            left: 0;
            right: unset;
        }

        ul.nav li.switch.active::before {
            right: 0;
            left: unset;
            border: solid thin #fff;
        }

        li.switch.active i {
            color: #fff
        }

        body.dark .header-container {
            background-color: #313131;
        }

        body.dark .main {
            background-color: #313131;
        }

        body.dark div.body {
            background-color: #313131;
        }

        body.dark nav {
            background-color: #313131;
        }

        body.dark nav ul {
            background-color: #313131;
        }

        a.dropdown-item.dark {
            color: white;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          const sswitch = document.querySelector(".switch");
      
          if (localStorage.getItem('darkMode') === 'true') {
            sswitch.classList.add("active");
            document.body.classList.add("dark");
            const a_tags = document.querySelectorAll(".dropdown-item");
            a_tags.forEach((a_tag) => {
              a_tag.classList.add("dark");
            });
          }
      
          sswitch.addEventListener("click", e => {
            darkMode(sswitch);
          });
      
          function darkMode(sswitch) {
            let darkMode = localStorage.getItem('darkMode');
      
            if (darkMode === 'true') {
              localStorage.setItem('darkMode', 'false');
            } else {
              localStorage.setItem('darkMode', 'true');
            }
      
            sswitch.classList.toggle("active");
            document.body.classList.toggle("dark");
            const a_tags = document.querySelectorAll(".dropdown-item");
            a_tags.forEach((a_tag) => {
              a_tag.classList.toggle("dark");
            });
          }
        });
      </script>
    <header id="header"
        data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 164, 'stickySetTop': '-164px', 'stickyChangeLogo': false}">
        <div class="header-body border-0">
            <div class="header-top header-top-default border-bottom-0 bg-color-dark">
                <div class="container">
                    <div class="header-row py-2">
                        <div class="header-column justify-content-start">
                            <div class="header-row">
                                <nav class="header-nav-top">
                                    <ul class="nav nav-pills text-uppercase text-2">
                                        <li style="padding: 0px 10px;">
                                            <button type="button" class="btn btn-outline-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-rss" aria-hidden="true"></i> EN VIVO</button>
                                        </li>
                                        <li class="nav-item nav-item-anim-icon" style="padding: 0px 10px;">
                                            <a class="nav-link pe-0 text-light opacity-7" href=""><i
                                                    class="fas fa-university"></i> CAMPUS VIRTUAL</a>
                                        </li>
                                        <li class="nav-item nav-item-anim-icon" style="padding: 0px 20px 0 10px;">
                                            <a class="nav-link pe-0 text-light opacity-7" href=""><i
                                                    class="fa fa-key"></i> Intranet</a>
                                        </li>
                                        <li class="switch" style="margin-top: 5px;">
                                            <i class="bx bxs-sun"></i>
                                            <i class="bx bxs-moon"></i>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean social-icons-icon-light">
                                    <li class="social-icons-facebook" style="padding: 5px;">
                                        <a href="http://www.facebook.com/" target="_blank"
                                            title="Facebook"  style="font-size: 16px;"><i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="social-icons-instagram" style="padding: 5px;">
                                        <a href="http://www.instagram.com/"
                                            target="_blank" t  style="font-size: 16px;"itle="Instagram"><i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="social-icons-youtube" style="padding: 5px;">
                                        <a href="http://www.youtube.com/" target="_blank"
                                            title="youtube"  style="font-size: 16px;"><i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="social-icons-twitter" style="padding: 5px;">
                                        <a href="http://www.twitter.com/" target="_blank"
                                            title="Twitter"  style="font-size: 16px;"><i class="fab fa-tiktok"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ara_centrado_total">
                <img style="max-width: 100%;
                height: auto;"
                    src="{{ asset('themes/jrrss/assets/img/cabecera-WEB.jpg') }}" alt="">
            </div>
            <div class="header-nav-bar header-nav-bar-top-border bg-light">
                <div class="header-container ">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row justify-content-end">
                                <div class="header-nav p-0">
                                    <div
                                        class="header-nav header-nav-line header-nav-divisor header-nav-spaced justify-content-lg-center">
                                        <div
                                            class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
                                                <ul class="nav nav-pills flex-column flex-lg-row" id="mainNav">
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('cms_principal') ? 'active' : '' }}"
                                                            href="{{ route('cms_principal') }}">
                                                            HOME
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_quienes_somos') ? 'active' : '' }}"
                                                            href="{{ route('web_quienes_somos') }}">
                                                            ¿QUIENES SOMOS?
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_sedes') ? 'active' : '' }}"
                                                            href="{{ route('web_sedes') }}">
                                                            SEDES
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_cobertura') ? 'active' : '' }}"
                                                            href="{{ route('web_cobertura') }}">
                                                            COBERTURA
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_eventos') ? 'active' : '' }}"
                                                            href="{{ route('web_eventos') }}">
                                                            EVENTOS
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('escueloa') ? 'active' : '' }}"
                                                            href="">
                                                            ESCUELA SOBRENATURAL
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('ecelt') ? 'active' : '' }}"
                                                            href="{{ route('web_ecelt') }}">
                                                            ECELT
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_rmnt') ? 'active' : '' }}"
                                                            href="{{ route('web_rmnt') }}">
                                                            RMNT
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_kids') ? 'active' : '' }}"
                                                            href="{{ route('web_kids') }}">
                                                            KIDS
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_testimonios') ? 'active' : '' }}"
                                                            href="{{ route('web_testimonios') }}">
                                                            TESTIMONIOS
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_contacto') ? 'active' : '' }}"
                                                            href="{{ route('web_contacto') }}">
                                                            CONTACTO
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_donar') ? 'active' : '' }}"
                                                            href="{{ route('web_donar') }}">
                                                            DONAR
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
                                            data-bs-target=".header-nav-main nav">
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">El titulo del en vivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/M5cme71g00Y?si=H0fyYfQ5WKUD7uig" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>
</div>
