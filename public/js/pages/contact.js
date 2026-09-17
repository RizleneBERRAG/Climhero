/* ==========================================================================
   CLIMHERO - Formulaire de devis par etapes
   Amelioration progressive : sans JavaScript, le formulaire reste un
   formulaire classique en une seule page, entierement fonctionnel.
   ========================================================================== */
(function () {
    'use strict';

    function initQuoteForm() {
        var form = document.querySelector('[data-qform]');
        if (!form) return;

        var steps = Array.prototype.slice.call(form.querySelectorAll('[data-qform-step]'));
        if (steps.length < 2) return;

        var bar = form.querySelector('[data-qform-bar]');
        var dots = Array.prototype.slice.call(form.querySelectorAll('[data-qform-dot]'));
        var current = 0;

        form.classList.add('is-enhanced');

        var startedAt = form.querySelector('[data-started-at]');
        if (startedAt) startedAt.value = String(Date.now());

        function render(index, scroll) {
            current = Math.max(0, Math.min(index, steps.length - 1));

            steps.forEach(function (step, i) {
                step.classList.toggle('is-active', i === current);
            });

            dots.forEach(function (dot, i) {
                dot.classList.toggle('is-active', i === current);
                dot.classList.toggle('is-done', i < current);
            });

            if (bar) bar.style.width = ((current + 1) / steps.length * 100) + '%';

            if (scroll) {
                var top = form.getBoundingClientRect().top + window.scrollY - 120;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        }

        /* Validation native, etape par etape */
        function validate(step) {
            var fields = step.querySelectorAll('input, select, textarea');
            var ok = true;

            Array.prototype.forEach.call(fields, function (field) {
                if (field.type === 'hidden' || field.name === 'website') return;
                if (typeof field.checkValidity !== 'function') return;

                var wrapper = field.closest('.field') || field.closest('.consent');

                if (!field.checkValidity()) {
                    ok = false;
                    if (wrapper) wrapper.classList.add('field--error');
                    if (ok === false && !step.querySelector('[data-focus-target]')) {
                        field.setAttribute('data-focus-target', '1');
                    }
                } else if (wrapper) {
                    wrapper.classList.remove('field--error');
                }
            });

            if (!ok) {
                var target = step.querySelector('[data-focus-target]');
                if (target) {
                    target.removeAttribute('data-focus-target');
                    target.focus();
                    target.reportValidity();
                }
            }

            return ok;
        }

        form.querySelectorAll('[data-qform-next]').forEach(function (button) {
            button.addEventListener('click', function () {
                if (!validate(steps[current])) return;
                render(current + 1, true);
            });
        });

        form.querySelectorAll('[data-qform-prev]').forEach(function (button) {
            button.addEventListener('click', function () {
                render(current - 1, true);
            });
        });

        /* Le clic sur une etape deja franchie permet de revenir en arriere */
        dots.forEach(function (dot, index) {
            dot.addEventListener('click', function () {
                if (index < current) render(index, true);
            });
        });

        /* Si le serveur a renvoye des erreurs, on ouvre l'etape concernee */
        var firstError = form.querySelector('.field--error');
        var startIndex = 0;

        if (firstError) {
            var owner = firstError.closest('[data-qform-step]');
            if (owner) startIndex = steps.indexOf(owner);
        }

        render(startIndex, false);

        /* Validation de la derniere etape avant envoi */
        form.addEventListener('submit', function (event) {
            if (!validate(steps[steps.length - 1])) {
                event.preventDefault();
            }
        });

        /* Nettoyage visuel des erreurs pendant la saisie */
        form.addEventListener('input', function (event) {
            var wrapper = event.target.closest('.field, .consent');
            if (wrapper) wrapper.classList.remove('field--error');
        });
    }

    /* Deduction de la commune a partir du code postal saisi */
    function initPostalHint() {
        var postal = document.getElementById('postal_code');
        var city = document.getElementById('city');
        if (!postal || !city) return;

        var known = {
            '38510': 'Charvieu-Chavagneux',
            '38230': 'Pont-de-Cheruy',
            '38300': 'Bourgoin-Jallieu',
            '38460': 'Cremieu',
            '69330': 'Meyzieu',
            '69800': 'Saint-Priest',
            '69740': 'Genas',
            '69150': 'Decines-Charpieu',
            '69100': 'Villeurbanne',
            '01700': 'Beynost'
        };

        postal.addEventListener('input', function () {
            var value = postal.value.replace(/\D/g, '').slice(0, 5);
            postal.value = value;

            if (value.length === 5 && known[value] && !city.value) {
                city.value = known[value];
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initQuoteForm();
        initPostalHint();
    });
})();
