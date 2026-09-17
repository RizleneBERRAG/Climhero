/* ==========================================================================
   CLIMHERO - Scripts de la page d'accueil
   1. Thermostat anime du hero
   2. Simulateur d'aides a la renovation energetique
   ========================================================================== */
(function () {
    'use strict';

    var RING_LENGTH = 591; /* 2 * PI * 94 arrondi */

    /* ----------------------------------------------------------------------
       1. Thermostat du hero
       ---------------------------------------------------------------------- */
    function initThermostat() {
        var root = document.querySelector('[data-thermo]');
        if (!root) return;

        var ring = root.querySelector('[data-thermo-ring]');
        var temp = root.querySelector('[data-thermo-temp]');
        var label = root.querySelector('[data-thermo-label]');
        var mode = root.querySelector('[data-thermo-mode]');
        var cop = root.querySelector('[data-thermo-cop]');
        var save = root.querySelector('[data-thermo-save]');
        var buttons = root.querySelectorAll('[data-thermo-set]');

        var presets = {
            heat: {
                temp: 21,
                fill: 0.68,
                label: 'Temperature de confort en hiver',
                mode: 'Mode chauffage',
                cop: '4,6',
                save: '-62 %'
            },
            cool: {
                temp: 25,
                fill: 0.42,
                label: 'Temperature de consigne en ete',
                mode: 'Mode rafraichissement',
                cop: '5,1',
                save: '-38 %'
            }
        };

        function apply(key) {
            var preset = presets[key];
            if (!preset) return;

            root.classList.remove('is-heat', 'is-cool');
            root.classList.add(key === 'heat' ? 'is-heat' : 'is-cool');

            if (ring) ring.style.strokeDashoffset = String(Math.round(RING_LENGTH * (1 - preset.fill)));
            if (label) label.textContent = preset.label;
            if (mode) mode.textContent = preset.mode;
            if (cop) cop.textContent = preset.cop;
            if (save) save.textContent = preset.save;

            if (temp) animateTemp(temp, preset.temp);

            buttons.forEach(function (button) {
                button.classList.toggle('is-active', button.getAttribute('data-thermo-set') === key);
            });
        }

        function animateTemp(el, target) {
            var from = parseInt(el.textContent, 10) || 0;
            if (from === target) return;

            var steps = Math.abs(target - from);
            var direction = target > from ? 1 : -1;
            var current = from;
            var timer = window.setInterval(function () {
                current += direction;
                el.textContent = String(current);
                if (current === target) window.clearInterval(timer);
            }, Math.max(420 / Math.max(steps, 1), 60));
        }

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                apply(button.getAttribute('data-thermo-set'));
            });
        });

        apply('heat');

        /* Alternance automatique tant que l'utilisateur n'a pas interagi */
        var touched = false;
        buttons.forEach(function (button) {
            button.addEventListener('click', function () { touched = true; });
        });

        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            var current = 'heat';
            window.setInterval(function () {
                if (touched) return;
                current = current === 'heat' ? 'cool' : 'heat';
                apply(current);
            }, 6000);
        }
    }

    /* ----------------------------------------------------------------------
       2. Simulateur d'aides
       ---------------------------------------------------------------------- */
    function initSimulator() {
        var root = document.querySelector('[data-simulateur]');
        var dataNode = document.getElementById('aides-data');
        if (!root || !dataNode) return;

        var data;
        try {
            data = JSON.parse(dataNode.textContent);
        } catch (error) {
            return;
        }

        var out = {
            total: root.querySelector('[data-simu-total]'),
            mpr: root.querySelector('[data-simu-mpr]'),
            cee: root.querySelector('[data-simu-cee]'),
            bonus: root.querySelector('[data-simu-bonus]'),
            tva: root.querySelector('[data-simu-tva]'),
            rac: root.querySelector('[data-simu-rac]'),
            eco: root.querySelector('[data-simu-eco]'),
            link: root.querySelector('[data-simu-link]')
        };

        function euros(value) {
            return Math.round(value).toLocaleString('fr-FR') + ' euros';
        }

        function range(min, max, unit) {
            unit = unit === undefined ? ' euros' : unit;
            if (min === max) return Math.round(min).toLocaleString('fr-FR') + unit;
            return Math.round(min).toLocaleString('fr-FR') + ' a ' + Math.round(max).toLocaleString('fr-FR') + unit;
        }

        function selected(name) {
            var input = root.querySelector('input[name="' + name + '"]:checked');
            return input ? input.value : null;
        }

        function compute() {
            var equipKey = selected('equipement');
            var profil = selected('profil');
            var chauffage = selected('chauffage');
            var equip = data.equipements[equipKey];
            if (!equip || !profil) return;

            var mpr = equip.mpr[profil] || [0, 0];
            var cee = equip.cee[profil] || [0, 0];
            var bonus = equip.bonus_eligible ? (data.bonus_depose[chauffage] || 0) : 0;

            var totalMin = mpr[0] + cee[0] + bonus;
            var totalMax = mpr[1] + cee[1] + bonus;

            var racMin = Math.max(equip.cout[0] - totalMax, 0);
            var racMax = Math.max(equip.cout[1] - totalMin, 0);

            if (out.total) out.total.textContent = range(totalMin, totalMax, '');
            if (out.mpr) out.mpr.textContent = (mpr[0] === 0 && mpr[1] === 0) ? 'non eligible' : range(mpr[0], mpr[1]);
            if (out.cee) out.cee.textContent = range(cee[0], cee[1]);
            if (out.bonus) out.bonus.textContent = bonus > 0 ? euros(bonus) : 'non applicable';
            if (out.tva) out.tva.textContent = String(equip.tva).replace('.', ',') + ' %';
            if (out.rac) out.rac.textContent = range(racMin, racMax);

            if (out.eco) {
                var note = equip.note ? ' ' + equip.note : '';
                out.eco.textContent = equip.economie + '.' + note;
            }

            if (out.link && equip.url) out.link.setAttribute('href', equip.url);
        }

        root.addEventListener('change', compute);
        compute();
    }

    document.addEventListener('DOMContentLoaded', function () {
        initThermostat();
        initSimulator();
    });
})();
