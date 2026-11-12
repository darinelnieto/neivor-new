// HubSpot attribution: runs on every page.
// - Saves first touch (localStorage) and last touch (sessionStorage).
// - Exposes window.neivorAttribution for the HubSpot forms:
//   getUtk(): hubspotutk cookie, fill(form): hidden attribution fields.
(function () {
    var attributionKeys = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid', 'msclkid'];

    function storageGet(storageName, key) {
        try {
            return JSON.parse(window[storageName].getItem(key) || 'null');
        } catch (error) {
            return null;
        }
    }

    function storageSet(storageName, key, value) {
        try {
            window[storageName].setItem(key, JSON.stringify(value));
        } catch (error) {
            return;
        }
    }

    function readCurrentTouch() {
        var params = new URLSearchParams(window.location.search);
        var touch = {
            referrer: document.referrer || '',
            landing_page: window.location.href,
            timestamp: new Date().toISOString()
        };
        attributionKeys.forEach(function (key) {
            touch[key] = params.get(key) || '';
        });
        return touch;
    }

    function hasCampaignData(touch) {
        return attributionKeys.some(function (key) {
            return Boolean(touch[key]);
        });
    }

    function isExternalReferrer(referrer) {
        if (!referrer) {
            return false;
        }
        try {
            return new URL(referrer).hostname !== window.location.hostname;
        } catch (error) {
            return false;
        }
    }

    function guessSource(touch) {
        if (!touch) {
            return 'desconocido';
        }
        if (touch.gclid || /cpc|ppc|paid/i.test(touch.utm_medium)) {
            return 'busqueda_paga';
        }
        if (touch.fbclid || /social/i.test(touch.utm_medium)) {
            return 'social';
        }
        if (/email/i.test(touch.utm_medium)) {
            return 'email';
        }
        if (touch.utm_source) {
            return 'campana_' + touch.utm_source;
        }
        if (/google\.|bing\.|yahoo\.|duckduckgo\.|ecosia\./i.test(touch.referrer)) {
            return 'busqueda_organica';
        }
        if (/chatgpt\.com|openai\.com|perplexity\.ai|gemini\.google|copilot\.microsoft|claude\.ai/i.test(touch.referrer)) {
            return 'ia_generativa';
        }
        if (/facebook\.|instagram\.|linkedin\.|t\.co|twitter\.|x\.com|tiktok\./i.test(touch.referrer)) {
            return 'social';
        }
        if (isExternalReferrer(touch.referrer)) {
            return 'referido';
        }
        return 'directo';
    }

    function captureAttribution() {
        var touch = readCurrentTouch();
        var isNewEntry = isExternalReferrer(touch.referrer) || hasCampaignData(touch);

        if (!storageGet('localStorage', 'kd_first_touch')) {
            storageSet('localStorage', 'kd_first_touch', touch);
        }
        if (!storageGet('sessionStorage', 'kd_last_touch') || isNewEntry) {
            storageSet('sessionStorage', 'kd_last_touch', touch);
        }
    }

    function fillHiddenAttributionFields(form) {
        var currentTouch = readCurrentTouch();
        var firstTouch = storageGet('localStorage', 'kd_first_touch') || currentTouch;
        var lastTouch = storageGet('sessionStorage', 'kd_last_touch') || firstTouch;
        var values = {
            utm_source: firstTouch.utm_source,
            utm_medium: firstTouch.utm_medium,
            utm_campaign: firstTouch.utm_campaign,
            utm_term: firstTouch.utm_term,
            utm_content: firstTouch.utm_content,
            gclid: firstTouch.gclid,
            fbclid: firstTouch.fbclid,
            msclkid: firstTouch.msclkid,
            fuente_lead_original: guessSource(firstTouch),
            fuente_lead_ultima: guessSource(lastTouch),
            referrer_original: firstTouch.referrer,
            landing_page_original: firstTouch.landing_page
        };

        Object.keys(values).forEach(function (name) {
            var input = form.querySelector('input[type="hidden"][name="' + name + '"]');
            if (input && !input.value && values[name]) {
                input.value = values[name];
            }
        });
    }

    function getHubspotUtk() {
        var match = document.cookie.match(/(?:^|; )hubspotutk=([^;]*)/);
        return match ? decodeURIComponent(match[1]) : '';
    }

    captureAttribution();

    window.neivorAttribution = {
        fill: fillHiddenAttributionFields,
        getUtk: getHubspotUtk
    };
})();
