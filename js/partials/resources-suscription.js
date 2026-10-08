// JS for partial: resources-suscription\n
(function () {
    function text(value) {
        return value == null ? '' : String(value);
    }

    function createField(field) {
        var wrapper = document.createElement('div');
        wrapper.className = 'mb-3';
        var fieldType = field.fieldType || field.type || 'text';

        if (field.hidden) {
            fieldType = 'hidden';
        }

        if (fieldType === 'hidden') {
            var hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = field.name;
            hidden.value = text(field.defaultValue);
            wrapper.appendChild(hidden);
            return wrapper;
        }

        if (!field.labelHidden) {
            var label = document.createElement('label');
            label.className = 'form-label';
            label.textContent = text(field.label || field.name) + (field.required ? '*' : '');
            wrapper.appendChild(label);
        }

        var input;
        if (fieldType === 'textarea') {
            input = document.createElement('textarea');
        } else if (fieldType === 'select') {
            input = document.createElement('select');
            var placeholder = document.createElement('option');
            placeholder.value = '';
            placeholder.textContent = 'Selecciona una opcion';
            input.appendChild(placeholder);
        } else if (fieldType === 'radio' || fieldType === 'checkbox') {
            (field.options || []).forEach(function (option) {
                var optionLabel = document.createElement('label');
                optionLabel.className = 'd-block';
                var optionInput = document.createElement('input');
                optionInput.type = fieldType;
                optionInput.name = field.name;
                optionInput.value = text(option.value);
                optionInput.required = Boolean(field.required);
                optionLabel.appendChild(optionInput);
                optionLabel.appendChild(document.createTextNode(' ' + text(option.label || option.value)));
                wrapper.appendChild(optionLabel);
            });
            return wrapper;
        } else {
            input = document.createElement('input');
            input.type = fieldType === 'phone' ? 'tel' : fieldType;
        }

        input.name = field.name;
        input.className = 'form-control';
        input.required = Boolean(field.required);
        input.placeholder = text(field.placeholder || field.label || field.name) + (field.required ? '*' : '');
        if (field.defaultValue) {
            input.value = text(field.defaultValue);
        }
        if (fieldType === 'select') {
            (field.options || []).forEach(function (option) {
                var selectOption = document.createElement('option');
                selectOption.value = text(option.value);
                selectOption.textContent = text(option.label || option.value);
                input.appendChild(selectOption);
            });
        }
        wrapper.appendChild(input);
        return wrapper;
    }

    function renderForm(container, definition) {
        var form = document.createElement('form');
        form.className = 'hubspot-api-form';
        form.noValidate = true;

        (definition.fields || []).forEach(function (field) {
            if (field.name && field.enabled !== false) {
                form.appendChild(createField(field));
            }
        });

        if (definition.privacyPolicyText) {
            var privacyPolicy = document.createElement('div');
            privacyPolicy.className = 'hubspot-privacy-policy mb-3';
            privacyPolicy.innerHTML = definition.privacyPolicyText;
            form.appendChild(privacyPolicy);
        }

        var submit = document.createElement('button');
        submit.type = 'submit';
        submit.className = 'submit-button cta-violeta';
        submit.innerHTML = '<span>' + (container.dataset.submitLabel || definition.submitText || 'Enviar') + '</span>';
        form.appendChild(submit);

        var feedback = document.createElement('p');
        feedback.className = 'hubspot-feedback mt-2 mb-0';
        feedback.setAttribute('aria-live', 'polite');
        form.appendChild(feedback);
        container.replaceChildren(form);

        form.addEventListener('submit', async function (event) {
            event.preventDefault();
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            var fields = {};
            new FormData(form).forEach(function (fieldValue, name) {
                fields[name] = fields[name] ? fields[name] + ';' + fieldValue : fieldValue;
            });
            submit.disabled = true;
            feedback.textContent = 'Enviando...';

            try {
                var response = await fetch(container.dataset.submitEndpoint, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({
                        portalId: container.dataset.portalId,
                        formId: container.dataset.formId,
                        fields: fields,
                        pageUri: window.location.href,
                        pageName: document.title
                    })
                });
                var data = await response.json();
                if (!response.ok) {
                    throw new Error(data && data.message ? data.message : 'No se pudo enviar el formulario.');
                }
                // console.info('HubSpot hero submitted fields:', data.submitted_fields || fields);

                var downloadFileUrl = container.dataset.downloadFileUrl;
                var downloadFileName = container.dataset.downloadFileName;
                if (downloadFileUrl) {
                    var downloadLink = document.createElement('a');
                    downloadLink.href = downloadFileUrl;
                    downloadLink.download = downloadFileName || 'recurso';
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    downloadLink.remove();
                }

                var submitScript = container.dataset.submitScript;
                if (submitScript) {
                    var formApi = window.jQuery ? window.jQuery(form) : form;
                    new Function('$form', submitScript)(formApi);
                }
                feedback.textContent = 'Gracias, tus datos fueron enviados.';
                form.reset();
            } catch (error) {
                feedback.textContent = error.message || 'Ocurrio un error al enviar.';
            } finally {
                submit.disabled = false;
            }
        });
    }

    function init() {
        document.querySelectorAll('.form-new[data-form-endpoint]').forEach(async function (container) {
            try {
                var formEndpoint = container.dataset.formEndpoint || '';
                var hasPortalParams = formEndpoint.indexOf('portalId=') !== -1 && formEndpoint.indexOf('formId=') !== -1;
                var formUrl = formEndpoint;

                if (!hasPortalParams) {
                    var params = new URLSearchParams({
                        portalId: container.dataset.portalId || '',
                        formId: container.dataset.formId || '',
                        region: container.dataset.region || 'na1'
                    });
                    formUrl = formEndpoint + '?' + params.toString();
                }

                var response = await fetch(formUrl);
                var definition = await response.json();
                if (!response.ok) {
                    throw new Error(definition && definition.message ? definition.message : 'No se pudo cargar el formulario.');
                }
                renderForm(container, definition);
            } catch (error) {
                container.textContent = error.message || 'No se pudo cargar el formulario.';
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();