let form = document.getElementById('pageContactForm2');
					form.addEventListener('submit', function(e) {
						e.preventDefault();
			
						var formulario = document.getElementById('pageContactForm2');
						var formData = new FormData(formulario);
			
						// Deshabilitar el botón
						var submitButton = document.getElementById('submitPageContactButton2');
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
								alert("Su mensaje ha sido enviado con exito.");
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