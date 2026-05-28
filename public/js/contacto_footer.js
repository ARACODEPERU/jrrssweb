(function () {
    'use strict';

    var formIds = ['pageContactForm', 'pageContactForm2'];

    function notify(icon, title, text) {
        if (window.Swal) {
            window.Swal.fire({
                icon: icon,
                title: title,
                text: text
            });
            return;
        }

        window.alert(text || title);
    }

    function getErrorMessage(errors) {
        if (!errors || typeof errors !== 'object') {
            return 'No se pudo enviar el mensaje. Revisa los datos e intenta nuevamente.';
        }

        var firstKey = Object.keys(errors)[0];
        var firstError = firstKey ? errors[firstKey] : null;

        if (Array.isArray(firstError)) {
            return firstError[0];
        }

        return firstError || 'No se pudo enviar el mensaje. Revisa los datos e intenta nuevamente.';
    }

    function setButtonLoading(button, isLoading) {
        if (!button) {
            return;
        }

        if (isLoading) {
            button.dataset.originalText = button.textContent;
            button.textContent = button.dataset.loadingText || 'Enviando...';
            button.disabled = true;
            return;
        }

        button.textContent = button.dataset.originalText || 'Enviar Ahora';
        button.disabled = false;
    }

    function bindForm(form) {
        if (!form || form.dataset.contactFooterBound === 'true') {
            return;
        }

        form.dataset.contactFooterBound = 'true';

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            var button = form.querySelector('button[type="submit"], button:not([type])');
            var formData = new FormData(form);

            setButtonLoading(button, true);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            })
                .then(function (response) {
                    return response.json().then(function (data) {
                        return {
                            ok: response.ok,
                            data: data
                        };
                    });
                })
                .then(function (result) {
                    if (!result.ok || !result.data.success) {
                        notify('error', 'No se pudo enviar', getErrorMessage(result.data.errors));
                        return;
                    }

                    form.reset();
                    notify('success', 'Mensaje enviado', result.data.message || 'Datos registrados con exito');
                })
                .catch(function () {
                    notify('error', 'No se pudo enviar', 'Ocurrio un problema al enviar el mensaje. Intenta nuevamente.');
                })
                .finally(function () {
                    setButtonLoading(button, false);
                });
        });
    }

    formIds.forEach(function (id) {
        bindForm(document.getElementById(id));
    });
}());
