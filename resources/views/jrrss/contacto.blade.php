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
                                <li class="active">Contacto</li>
                            </ul>
                        </div>
                        <div class="col-md-12 align-self-center p-static text-center mt-2">
                            <h1 class="font-weight-bold text-color-secondary text-11">Contactanos</h1>
                        </div>
                    </div>
                </div>
            </section>

            
				<div class="container container-xl-custom pt-5">
					<div class="row">
						<div class="col">
							<p class="mb-1">SOMOS JRRSS</p>
							<h3 class="text-secondary font-weight-bold text-capitalize text-7 mb-3">Envianos un Mensaje</h3>
						</div>
					</div>
					<div class="row pb-4">
						<div class="col-lg-7 pb-5">

							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lectus lacus, rutrum sit amet placerat et, bibendum nec mauris. Duis molestie purus eget placerat viverra.
							</p>

							<form class="contact-form custom-form-style-1" method="POST" action="{{ route('apisubscriber') }}" id="pageContactForm">
							
								
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
										<button data-loading-text="Loading..." id="submitPageContactButton" class="btn btn-outline btn-primary rounded-0 py-3 px-5 font-weight-semibold" >Enviar Ahora</button>
										
									</div>
								</div>
							</form>

						</div>
						<div class="col-lg-5">
							<div class="custom-card-style-2 card-contact-us mb-5">
								<div class="m-4">
									<div class="row flex-column px-5 pt-3 pb-4">
										<div class="row px-3 mb-3">
											<h3 class="text-secondary font-weight-bold text-capitalize my-3">Información de Contacto</h3>
											<p>Lorem inpsum dolor sit amet, consectetur adipiscing elit. Sed eget risus pora, tincidunt turpis at, intermedum tortor.</p>
										</div>
										<div class="row px-lg-3 pb-2 align-items-center">
											<div class="col-2 col-lg-1 px-1 text-center">
												<i class="fas fa-map-marker-alt text-8 text-secondary"></i>
											</div>
											<div class="col-10 col-lg-11">
												<h4 class="text-secondary font-weight-bold text-capitalize mb-0">Sede Principal</h4>
												<p class="mb-0">Av Saenz Peña 870-878. , Callao, Perú</p>
											</div>
										</div>
										<hr class="my-3 opacity-5">
										<div class="row px-lg-3 py-2 align-items-center">
											<div class="col-2 col-lg-1 px-1 text-center">
												<i class="fas fa-mobile-alt text-8 text-secondary"></i>
											</div>
											<div class="col-10 col-lg-11">
												<h4 class="text-secondary font-weight-bold text-capitalize mb-0">Teléfono</h4>
												<p class="mb-0"><a href="#" class="text-color-default">(+51) 999 999999</a></p>
											</div>
										</div>
										<hr class="my-3 opacity-5">
										<div class="row px-lg-3 py-2 align-items-center">
											<div class="col-2 col-lg-1 px-1 text-center">
												<i class="far fa-envelope text-7 text-secondary"></i>
											</div>
											<div class="col-10 col-lg-11">
												<h4 class="text-secondary font-weight-bold text-capitalize mb-0">E-mail</h4>
												<p class="mb-0"><a class="px-0 text-default" href="mailto:mail@domain.com">ibi.jrrss@gmail.com</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
				<div id="googlemaps" class="google-map custom-map" style="text-align: center;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.7585025642!2d-77.13881422513082!3d-12.060130142149312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105cb908f14800b%3A0x9d3dece06a24733!2sAv%20Saenz%20Pe%C3%B1a%20870%2C%20Callao%2007001!5e0!3m2!1ses-419!2spe!4v1702736452376!5m2!1ses-419!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
				
				<script>
					let form = document.getElementById('pageContactForm');
					form.addEventListener('submit', function(e) {
						e.preventDefault();
			
						var formulario = document.getElementById('pageContactForm');
						var formData = new FormData(formulario);
			
						// Deshabilitar el botón
						var submitButton = document.getElementById('submitPageContactButton');
						submitButton.disabled = true;
						submitButton.style.opacity = 0.25;
			
						// Crear una nueva solicitud XMLHttpRequest
						var xhr = new XMLHttpRequest();
			
						// Configurar la solicitud POST al servidor
						xhr.open('POST', "{{ route('apisubscriber') }}", true);
			
						// Configurar la función de callback para manejar la respuesta
						xhr.onload = function() {
							// Habilitar nuevamente el botón
							submitButton.disabled = false;
							submitButton.style.opacity = 1;
							if (xhr.status === 200) {
								var response = JSON.parse(xhr.responseText);
								Swal.fire({
									icon: 'success',
									title: 'Enhorabuena',
									text: response.message,
									customClass: {
										container: 'sweet-modal-zindex' // Clase personalizada para controlar el z-index
									}
								});
								formulario.reset();
							} else if (xhr.status === 422) {
								var errorResponse = JSON.parse(xhr.responseText);
								// Maneja los errores de validación aquí, por ejemplo, mostrando los mensajes de error en algún lugar de tu página.
								var errorMessages = errorResponse.errors;
								var errorMessageContainer = document.getElementById('messagePageContact');
								errorMessageContainer.innerHTML = 'Errores de validación:<br>';
								for (var field in errorMessages) {
									if (errorMessages.hasOwnProperty(field)) {
										errorMessageContainer.innerHTML += field + ': ' + errorMessages[field].join(', ') +
											'<br>';
									}
								}
							} else {
								console.error('Error en la solicitud: ' + xhr.status);
							}
			
			
						};
			
						// Enviar la solicitud al servidor
						xhr.send(formData);
					});
				</script>

        </div>

        <!-- Footer - area start -->
        <x-jrrss.footer-area></x-jrrss.footer-area>
        <!-- Footer - area end -->
        


    </div>

@endsection