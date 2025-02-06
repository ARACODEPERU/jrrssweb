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
            if (sswitch) {
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
            }

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
        data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 
                            'stickyEnableOnMobile': false, 'stickyStartAt': 164, 'stickySetTop': '-164px', 
                            'stickyChangeLogo': false}">
        <div class="header-body border-0">
            <div class="ara_centrado_total view-pc">
                <img style="max-width: 100%;
                height: auto;" src="{{ $header[0]->content }}" alt="">
            </div>
            {{-- <div class="header-nav-bar header-nav-bar-top-border bg-light"> --}}
            <div class="header-nav-bar">
                <div class="header-container">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row justify-content-end">
                                <div class="header-nav p-0">
                                    <div class="header-nav header-nav-line header-nav-divisor header-nav-spaced justify-content-lg-center">
                                        <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
                                                <ul class="nav nav-pills flex-column flex-lg-row" id="mainNav">
                                                    <li class="dropdown">
                                                        <a class="dropdown-item  {{ request()->routeIs('cms_principal') ? 'active' : '' }}"
                                                            href="{{ route('cms_principal') }}">
                                                            HOME
                                                        </a>
                                                    </li>
                                                    <li class="dropdown dropdown-mega">
														<a class="dropdown-item dropdown-toggle" href="">
															DESCUBRE &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                                        </a>
														<ul class="dropdown-menu">
															<li>
																<div class="dropdown-mega-content container px-2">
																	<div class="row px-1">
																		<div class="col-lg-3">
																			<span class="dropdown-mega-sub-title">NOSOTROS</span>
																			<ul class="dropdown-mega-sub-nav">
																				<li>
                                                                                    <a class="dropdown-item {{ request()->routeIs('web_quienes_somos') ? 'active' : '' }}" 
                                                                                        href="{{ route('web_quienes_somos') }}">
                                                                                        ¿Quienes Somos?
                                                                                    </a>
                                                                                </li>
																			</ul>
																		</div>
																		<div class="col-lg-3">
																			<span class="dropdown-mega-sub-title">MINISTERIOS</span>
																			<ul class="dropdown-mega-sub-nav">
																				<li>
                                                                                    <a class="dropdown-item {{ request()->routeIs('web_ecelt') ? 'active' : '' }}" 
                                                                                        href="{{ route('web_ecelt') }}">
                                                                                        El Cielo En La Tierra (ECELT)
                                                                                    </a>
                                                                                </li>
																				<li>
                                                                                    <a class="dropdown-item {{ request()->routeIs('web_revolucion_juvenil') ? 'active' : '' }}" 
                                                                                        href="{{ route('web_revolucion_juvenil') }}">
                                                                                        Revolución Juvenil
                                                                                    </a>
                                                                                </li>
																				<li>
                                                                                    <a class="dropdown-item {{ request()->routeIs('web_kids') ? 'active' : '' }}" 
                                                                                        href="{{ route('web_kids') }}">
                                                                                        Escuelita KIDS
                                                                                    </a>
                                                                                </li>
																			</ul>
																		</div>
																		<div class="col-lg-3">
																			<span class="dropdown-mega-sub-title">INSTITUTO SOBRENATURAL AL MUNDO</span>
																			<ul class="dropdown-mega-sub-nav">
																				<li>
                                                                                    <a class="dropdown-item {{ request()->routeIs('web_proceso_miembro') ? 'active' : '' }}" 
                                                                                        href="{{ route('web_proceso_miembro') }}">
                                                                                        Proceso de Miembro
                                                                                    </a>
                                                                                </li>						
																				<li>
                                                                                    <a class="dropdown-item {{ request()->routeIs('web_proceso_discipulo') ? 'active' : '' }}" 
                                                                                        href="{{ route('web_proceso_discipulo') }}">
                                                                                        Proceso de Discípulo
                                                                                    </a>
                                                                                </li>
																				<li>
                                                                                    <a class="dropdown-item {{ request()->routeIs('web_proceso_lideres') ? 'active' : '' }}" 
                                                                                        href="{{ route('web_proceso_lideres') }}">
                                                                                        Proceso de Lideres
                                                                                    </a>
                                                                                </li>
																				<li>
                                                                                    <a class="dropdown-item {{ request()->routeIs('web_proceso_lideres') ? 'active' : '' }}" 
                                                                                        href="{{ route('web_ism') }}">
                                                                                        Instituto Sobrenatural al mundo
                                                                                    </a>
                                                                                </li>
																			</ul>
																		</div>
																		<div class="col-lg-3">
																			<span class="dropdown-mega-sub-title">¿NECESITAS AYUDA?</span>
																			<ul class="dropdown-mega-sub-nav">
																				<li><a class="dropdown-item" href="">Oración</a></li>
																				<li><a class="dropdown-item" href="">Empleo</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</li>
														</ul>
													</li>
                                                    {{-- <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_quienes_somos') ? 'active' : '' }}"
                                                            href="{{ route('web_quienes_somos') }}">
                                                            ¿QUIENES SOMOS?
                                                        </a>
                                                    </li> --}}
                                                    {{-- <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_sedes') ? 'active' : '' }}"
                                                            href="{{ route('web_sedes') }}">
                                                            SEDES
                                                        </a>
                                                    </li> --}}
                                                    <li class="dropdown">
														<a href="" 
                                                            class="nav-link dropdown-toggle {{ request()->routeIs('web_sedes') ? 'active' : '' }}">
                                                            SEDES &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                                        </a>
														<ul class="dropdown-menu">
															<li>
                                                                <a href="{{ route('web_sedes_peru') }}" 
                                                                    class="dropdown-item  {{ request()->routeIs('web_sedes_peru') ? 'active' : '' }}">
                                                                    <img style="width: 15px; height: 15px;" src="{{ asset('themes/jrrss/assets/img/flags/peru.png') }}" alt="">
                                                                    &nbsp; Perú
                                                                </a>
                                                            </li>
															<li>
                                                                <a href="{{ route('web_sedes_estados_unidos') }}" 
                                                                    class="dropdown-item  {{ request()->routeIs('web_sedes_estados_unidos') ? 'active' : '' }}">
                                                                    <img style="width: 15px; height: 15px;" src="{{ asset('themes/jrrss/assets/img/flags/estados-unidos.png') }}" alt="">
                                                                    &nbsp; Estados Unidos
                                                                </a>
                                                            </li>
															<li>
                                                                <a href="{{ route('web_sedes_españa') }}" 
                                                                    class="dropdown-item  {{ request()->routeIs('web_sedes_españa') ? 'active' : '' }}">
                                                                    <img style="width: 15px; height: 15px;" src="{{ asset('themes/jrrss/assets/img/flags/españa.png') }}" alt="">
                                                                    &nbsp; España
                                                                </a>
                                                            </li>
														</ul>
													</li>
                                                    {{-- <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_cobertura') ? 'active' : '' }}"
                                                            href="{{ route('web_cobertura') }}">
                                                            COBERTURA
                                                        </a>
                                                    </li> --}}
                                                    <li class="dropdown">
														<a href="" 
                                                            class="nav-link dropdown-toggle {{ request()->routeIs('web_cobertura') ? 'active' : '' }}">
                                                            COBERTURAS &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                                        </a>
														<ul class="dropdown-menu">
															<li>
                                                                <a href="{{ route('web_coberturas_peru') }}" 
                                                                    class="dropdown-item">
                                                                    <img style="width: 15px; height: 15px;" src="{{ asset('themes/jrrss/assets/img/flags/peru.png') }}" alt="">
                                                                    &nbsp; Perú
                                                                </a>
                                                            </li>
															{{-- <li>
                                                                <a href="" 
                                                                    class="dropdown-item">
                                                                    <img style="width: 15px; height: 15px;" src="{{ asset('themes/jrrss/assets/img/flags/estados-unidos.png') }}" alt="">
                                                                    &nbsp; Estados Unidos
                                                                </a>
                                                            </li>
															<li>
                                                                <a href="" 
                                                                    class="dropdown-item">
                                                                    <img style="width: 15px; height: 15px;" src="{{ asset('themes/jrrss/assets/img/flags/españa.png') }}" alt="">
                                                                    &nbsp; España
                                                                </a>
                                                            </li> --}}
														</ul>
													</li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_eventos') ? 'active' : '' }}"
                                                            href="{{ route('web_eventos') }}">
                                                            EVENTOS
                                                        </a>
                                                    </li>
                                                    {{-- <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_eventos') ? 'active' : '' }}"
                                                            href="{{ route('web_eventos') }}">
                                                            BENEFACTORA
                                                        </a>
                                                    </li> --}}
                                                    <li class="dropdown">
														<a href="{{ route('web_benefactora') }}" 
                                                            class="nav-link dropdown-toggle {{ request()->routeIs('web_benefactora') ? 'active' : '' }}">
                                                            BENEFACTORA &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                                        </a>
														<ul class="dropdown-menu">
															<li>
                                                                <a href="{{ route('web_panes_y_peces') }}" 
                                                                    class="dropdown-item  {{ request()->routeIs('web_panes_y_peces') ? 'active' : '' }}">
                                                                    Panes y Peces
                                                                </a>
                                                            </li>
															<li>
                                                                <a href="{{ route('web_el_buen_samaritano') }}" 
                                                                    class="dropdown-item  {{ request()->routeIs('web_el_buen_samaritano') ? 'active' : '' }}">
                                                                    El Buen Samaritano
                                                                </a>
                                                            </li>
															<li>
                                                                <a href="{{ route('web_sembrando_sonrisas') }}" 
                                                                    class="dropdown-item  {{ request()->routeIs('web_sembrando_sonrisas') ? 'active' : '' }}">
                                                                    Sembrando Sonrisas
                                                                </a>
                                                            </li>
														</ul>
													</li>
                                                    <!--
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('escueloa') ? 'active' : '' }}"
                                                            href="">
                                                            ESCUELA SOBRENATURAL
                                                        </a>
                                                    </li>
                                                    -->
                                                    {{-- <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_ecelt') ? 'active' : '' }}"
                                                            href="{{ route('web_ecelt') }}">
                                                            ECELT
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_revolucion_juvenil') ? 'active' : '' }}"
                                                            href="{{ route('web_revolucion_juvenil') }}">
                                                            REVOLUCIÓN JUVENIL
                                                        </a>
                                                    </li> --}}
                                                    {{-- <li class="dropdown">
                                                        <a class="dropdown-item {{ request()->routeIs('web_kids') ? 'active' : '' }}"
                                                            href="{{ route('web_kids') }}">
                                                            KIDS
                                                        </a>
                                                    </li> --}}
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
                                                            <i class="fa fa-heart" aria-hidden="true"></i>&nbsp; DONAR
                                                        </a>
                                                    </li>
                                                    @if ($transmissions)
                                                        <li style="padding: 0px 10px; margin-top:8px;">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="fa fa-rss" aria-hidden="true"></i> EN
                                                                VIVO</button>
                                                        </li>
                                                    @endif
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
    @if ($transmissions)
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $transmissions->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        {!! $transmissions->iframe_transmission !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="reuniones" tabindex="-1" aria-labelledby="reunionesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="reunionesLabel">El titulo de la reunión</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5><b>Sede Principal: Av Saenz Peña 870</b> </h5>
                    <p style="margin-top: -15px;">
                        <b>Horario de Reunión:</b> Lunes 07:00 pm
                    </p>
                    <div class="row">
                        <div class="col-md-12">
                            <iframe
                                src="https://www.gdoogle.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.7585025642!2d-77.13881422513082!3d-12.060130142149312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105cb908f14800b%3A0x9d3dece06a24733!2sAv%20Saenz%20Pe%C3%B1a%20870%2C%20Callao%2007001!5e0!3m2!1ses-419!2spe!4v1703834596132!5m2!1ses-419!2spe"
                                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="contacto" tabindex="-1" aria-labelledby="contactoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="contactoLabel">Queremos saber de usted</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 pb-5">
                        <form class="contact-form custom-form-style-1" method="POST"
                            action="{{ route('apisubscriber') }}" id="pageContactForm">

                            <div class="row">
                                <div class="form-group col">
                                    <input type="text" placeholder="Nombres" value=""
                                        data-msg-required="Por favor ingresa tus nombres completos." maxlength="125"
                                        class="form-control bg-color-tertiary" name="full_name" id="full_name"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input type="text" placeholder="Número de teléfono" value=""
                                        data-msg-required="Por favor ingresa tu número de teléfono." maxlength="100"
                                        class="form-control bg-color-tertiary" name="phone" id="phone"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input type="email" placeholder="Dirección E-mail" value=""
                                        data-msg-required="Por favor ingresa tu correo electrónico."
                                        data-msg-email="Please enter a valid email address." maxlength="100"
                                        class="form-control bg-color-tertiary" name="email" id="email"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <textarea maxlength="5000" placeholder="Tu mensaje aqui..." data-msg-required="Por favor ingresa el mensaje."
                                        rows="5" class="form-control bg-color-tertiary" name="message" id="message" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <button data-loading-text="Loading..." id="submitPageContactButton"
                                        class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold">Enviar
                                        Ahora</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


</div>
