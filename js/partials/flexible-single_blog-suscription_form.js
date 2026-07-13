(function () {
    function bindForm(form) {
        if (!form || form.dataset.bound === '1') {
            return;
        }

        form.dataset.bound = '1';

        var feedback = form.querySelector('.suscription-feedback');
        var submitButton = form.querySelector('button[type="submit"]');
        var endpoint = form.dataset.endpoint;
        var portalId = form.dataset.portalId;
        var formId = form.dataset.formId;

        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            var email = form.email.value.trim();
            var firstName = form.firstname.value.trim();
            var contentPreference = form.contentPreference.value;

            if (!email || !firstName || !contentPreference) {
                feedback.textContent = 'Completa todos los campos obligatorios para continuar.';
                return;
            }

            submitButton.disabled = true;
            feedback.textContent = 'Enviando...';

            try {
                var response = await fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        portalId: portalId,
                        formId: formId,
                        email: email,
                        firstname: firstName,
                        contentPreference: contentPreference,
                        pageUri: window.location.href,
                        pageName: document.title
                    })
                });

                var data = await response.json();

                if (!response.ok) {
                    throw new Error((data && data.message) ? data.message : 'No se pudo enviar el formulario.');
                }

                feedback.textContent = 'Gracias, tu suscripcion fue enviada.';
                form.reset();
            } catch (error) {
                feedback.textContent = error.message || 'Ocurrio un error al enviar.';
            } finally {
                submitButton.disabled = false;
            }
        });
    }

    function init() {
        var forms = document.querySelectorAll('.suscription-api-form');
        forms.forEach(bindForm);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
