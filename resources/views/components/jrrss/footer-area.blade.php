<div>
    <footer id="footer" class="border-0" style="background: url('{{ asset('themes/jrrss/assets/img/parallax/parallax-9.jpg') }}'); background-size:cover; background-position: 0 0;">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/js/contacto_footer.js"></script>
        <div class="container-lg" style="padding: 130px 0px;">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <img src="{{ asset('themes/jrrss/assets/img/logo_blanco.png') }}" alt="">
                        <br><br>
                        <p class="pe-1" style="font-size: 16px;">{{ $footer[0]->content }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <h4 class="mb-2">Llamanos</h4>
                        <p class="mb-0 font-weight-semibold">TELÉFONO</p>
                        <a href="tel:+8001234567" class="text-color-primary text-5 p-relative bottom-3" target="_blank" title="Llamanos" style="font-size: 16px;">{{ $footer[1]->content }}</a>
                    </div>
                    <br>
                    <div>
                        <h4 class="mb-2">Escribenos</h4>
                        <p class="mb-0 font-weight-semibold">EMAIL</p>
                        <a href="mail:porto@domain.com" class="text-color-primary text-5 p-relative bottom-3" target="_blank" title="Escribenos" style="font-size: 16px;">{{ $footer[2]->content }}</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <h4 class="mb-2">Sede Principal</h4>
                        <p><a href="" style="font-size: 16px;">{{ $footer[3]->content }}</a></p>
                    </div>
                    <br>
                    <div>
                        <h4 class="mb-2">Redes Sociales</h4>
                        <ul class="social-icons social-icons-big social-icons-dark-2">
                            <li class="social-icons-facebook"><a href="{{ $footer[4]->content }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f text-4"></i></a></li>
                            <li class="social-icons-instagram"><a href="{{ $footer[5]->content }}" target="_blank" title="Instagram"><i class="fab fa-instagram text-4"></i></a></li>
                            <li class="social-icons-youtube"><a href="{{ $footer[6]->content }}" target="_blank" title="Youtube"><i class="fab fa-youtube text-4"></i></a></li>
                            <li class="social-icons-tiktok"><a href="{{ $footer[7]->content }}" target="_blank" title="Tiktok"><i class="fab fa-tiktok text-4"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <div class="row justify-content-md-center py-5">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <img src="{{ asset('themes/jrrss/assets/img/logo_blanco.png') }}" alt="">
                    <br><br>
                    <p class="pe-1" style="font-size: 16px;">{{ $footer[0]->content }}</p>
                    <div class="row mt-3 mt-lg-5">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h4 class="mb-2">Llamanos</h4>
                            <p class="mb-0 font-weight-semibold">TELÉFONO</p>
                            <a href="tel:+8001234567" class="text-color-primary text-5 p-relative bottom-3" target="_blank" title="Llamanos" style="font-size: 16px;">{{ $footer[1]->content }}</a>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-2">Sede Principal</h4>
                            <p><a href="" style="font-size: 16px;">{{ $footer[3]->content }}</a></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h4 class="mb-2">Escribenos</h4>
                            <p class="mb-0 font-weight-semibold">EMAIL</p>
                            <a href="mail:porto@domain.com" class="text-color-primary text-5 p-relative bottom-3" target="_blank" title="Escribenos" style="font-size: 16px;">{{ $footer[2]->content }}</a>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-2">Redes Sociales</h4>
                            <ul class="social-icons social-icons-big social-icons-dark-2">
                                <li class="social-icons-facebook"><a href="{{ $footer[4]->content }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f text-4"></i></a></li>
                                <li class="social-icons-instagram"><a href="{{ $footer[5]->content }}" target="_blank" title="Instagram"><i class="fab fa-instagram text-4"></i></a></li>
                                <li class="social-icons-youtube"><a href="{{ $footer[6]->content }}" target="_blank" title="Youtube"><i class="fab fa-youtube text-4"></i></a></li>
                                <li class="social-icons-tiktok"><a href="{{ $footer[7]->content }}" target="_blank" title="Tiktok"><i class="fab fa-tiktok text-4"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <p class="pe-1" style="font-size: 16px;">{{ $footer[8]->content }}</p>
                </div>
                <!--
                <div class="col-lg-5">
                    <h2 class="text-6 font-weight-bold mb-1">Envianos un mensaje</h2>
                    <p class="pe-1">Envía un mensaje para comunicarte con nosotros, deja tu información si deseas que nos comuniquemos contigo.</p>
                    <form class="contact-form form-errors-light" method="POST" action="{{ route('apisubscriber') }}" id="pageContactForm2">
                        <div class="row">
                            <div class="form-group col">
                                <input type="text" placeholder="Nombres" value="" data-msg-required="Por favor ingresa tus nombres completos." maxlength="125" class="form-control bg-color-tertiary" name="full_name" id="full_name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <input type="text" placeholder="Número de teléfono" value="" data-msg-required="Por favor ingresa tu número de teléfono." maxlength="100" class="form-control bg-color-tertiary"  name="phone" id="phone" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <input type="email" placeholder="Dirección E-mail" value="" data-msg-required="Por favor ingresa tu correo electrónico." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control bg-color-tertiary" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <textarea maxlength="5000" placeholder="Tu mensaje aqui..." data-msg-required="Por favor ingresa el mensaje." rows="5" class="form-control bg-color-tertiary" name="message" id="message" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button data-loading-text="Loading..." id="submitPageContactButton2" class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold" >Enviar Ahora</button>

                            </div>
                        </div>
                    </form>
                </div>
                -->
            </div> --}}
        </div>
        <div class="footer-copyright footer-copyright-style-2 footer-top-light-border">
            <div class="container py-2">
                <div class="row py-2">
                    <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                        <p>© Copyright 2025. Todos los Derechos Reservados a Jesús Rey de Reyes y Señor de Señores | Desarrollado por <a href=""><b>Aracode Smart Solutions</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
