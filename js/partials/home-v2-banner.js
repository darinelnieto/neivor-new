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
        submit.className = 'submit-button';
        submit.innerHTML = '<svg class="submit-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M20.52 3.48A11.86 11.86 0 0 0 12.07 0C5.52 0 .19 5.32.19 11.88c0 2.09.55 4.13 1.59 5.94L.08 24l6.32-1.66a11.9 11.9 0 0 0 5.67 1.44h.01c6.55 0 11.88-5.33 11.88-11.89 0-3.18-1.23-6.16-3.44-8.41Zm-8.45 18.25h-.01a9.86 9.86 0 0 1-5.03-1.38l-.36-.21-3.75.98 1-3.65-.23-.38a9.88 9.88 0 1 1 8.38 4.64Zm5.42-7.4c-.3-.15-1.77-.87-2.05-.97-.28-.1-.48-.15-.68.15-.2.3-.78.97-.96 1.17-.18.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.47-.89-.79-1.49-1.76-1.67-2.06-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.68-1.63-.93-2.23-.25-.59-.5-.51-.68-.52h-.58c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.5s1.07 2.9 1.22 3.1c.15.2 2.1 3.21 5.09 4.5.71.31 1.27.5 1.7.64.72.23 1.37.2 1.89.12.58-.09 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z"/></svg><span>' + (container.dataset.submitLabel || definition.submitText || 'Enviar') + '</span>';
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