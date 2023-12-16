<div>
    <footer id="footer" class="border-0" style="background: url('{{ asset('themes/jrrss/assets/img/parallax/parallax-9.jpg') }}'); background-size:cover; background-position: 0 0;">
        <div class="container py-4">
            <div class="row justify-content-md-center py-5">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <img src="{{ asset('themes/jrrss/assets/img/logo_blanco.png') }}" alt="">
                    <br><br>
                    <p class="pe-1">Lorem ipsumsemper nisl lacinia sit amet. Praesent venenatis turpis vitae purus semper...</p>
                    <div class="row mt-3 mt-lg-5">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h4 class="mb-2">Llamanos</h4>
                            <p class="mb-0 font-weight-semibold">TELÉFONO</p>
                            <a href="tel:+8001234567" class="text-color-primary text-5 p-relative bottom-3" target="_blank" title="Llamanos">(+51) 999 999999</a>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-2">Sede Principal</h4>
                            <p><a href="">Av Saenz Peña 870-878. , Callao, Perú</a></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h4 class="mb-2">Escribenos</h4>
                            <p class="mb-0 font-weight-semibold">EMAIL</p>
                            <a href="mail:porto@domain.com" class="text-color-primary text-5 p-relative bottom-3" target="_blank" title="Escribenos">ibi.jrrss@gmail.com</a>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-2">Redes Sociales</h4>
                            <ul class="social-icons social-icons-big social-icons-dark-2">
                                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f text-4"></i></a></li>
                                <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram text-4"></i></a></li>
                                <li class="social-icons-youtube"><a href="http://www.youtube.com/" target="_blank" title="Youtube"><i class="fab fa-youtube text-4"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter text-4"></i></a></li>
                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in text-4"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <h2 class="text-6 font-weight-bold mb-1">Envianos un mensaje</h2>
                    <p class="pe-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna. Phasellus semper scelerisque purus.</p>
                    <form class="contact-form form-errors-light" action="php/contact-form.php" method="POST">
                        <input type="hidden" value="Contact Form" name="subject" id="subject">
                        <div class="form-group col-lg-12 ms-auto my-0">
                            <div class="contact-form-success alert alert-success d-none">
                                Message has been sent to us.
                            </div>

                            <div class="contact-form-error alert alert-danger d-none">
                                Error sending your message.
                                <span class="mail-error-message text-1 d-block"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" placeholder="Nombre Completo..." name="name" id="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" placeholder="Correo Electrónico" name="email" id="email" required>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="4" class="form-control text-3 h-auto py-2" placeholder="Tu Mensaje..." name="message" id="message" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col" style="font-size: 13px;">
                                <input type="submit" value="Enviar Ahora" class="btn btn-primary box-shadow-2 font-weight-semi-bold px-4 py-3 text-3" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-copyright footer-copyright-style-2 footer-top-light-border">
            <div class="container py-2">
                <div class="row py-4">
                    <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                        <p>© Copyright 2024. Todos los Derechos Reservados a Jesús Rey de Reyes y Señor de Señores | Desarrollado por <a href=""><b>Aracode Smart Solutión</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>