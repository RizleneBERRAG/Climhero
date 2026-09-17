/* ==========================================================================
   CLIMHERO - Comportements globaux
   Aucun framework, aucune dependance. Charge sur toutes les pages.
   ========================================================================== */
(function () {
    'use strict';

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ----------------------------------------------------------------------
       Header sticky
       ---------------------------------------------------------------------- */
    function initStickyHeader() {
        var header = document.querySelector('[data-header]');
        if (!header) return;

        var ticking = false;
        function update() {
            header.classList.toggle('is-stuck', window.scrollY > 12);
            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(update);
                ticking = true;
            }
        }, { passive: true });

        update();
    }

    /* ----------------------------------------------------------------------
       Menu deroulant desktop
       ---------------------------------------------------------------------- */
    function initDropdowns() {
        var items = document.querySelectorAll('[data-dropdown]');

        items.forEach(function (item) {
            var trigger = item.querySelector('.nav__link');
            if (!trigger) return;

            var closeTimer;

            function open() {
                window.clearTimeout(closeTimer);
                item.classList.add('is-open');
                trigger.setAttribute('aria-expanded', 'true');
            }

            function close(delay) {
                closeTimer = window.setTimeout(function () {
                    item.classList.remove('is-open');
                    trigger.setAttribute('aria-expanded', 'false');
                }, delay || 0);
            }

            item.addEventListener('mouseenter', open);
            item.addEventListener('mouseleave', function () { close(140); });
            item.addEventListener('focusin', open);
            item.addEventListener('focusout', function (event) {
                if (!item.contains(event.relatedTarget)) close(0);
            });

            trigger.addEventListener('click', function (event) {
                event.preventDefault();
                item.classList.contains('is-open') ? close(0) : open();
            });
        });

        document.addEventListener('keydown', function (event) {
            if (event.key !== 'Escape') return;
            items.forEach(function (item) {
                item.classList.remove('is-open');
                var trigger = item.querySelector('.nav__link');
                if (trigger) trigger.setAttribute('aria-expanded', 'false');
            });
        });
    }

    /* ----------------------------------------------------------------------
       Menu mobile
       ---------------------------------------------------------------------- */
    function initMobileNav() {
        var burger = document.querySelector('[data-burger]');
        var panel = document.querySelector('[data-mobile-nav]');
        if (!burger || !panel) return;

        burger.addEventListener('click', function () {
            var open = panel.classList.toggle('is-open');
            burger.classList.toggle('is-open', open);
            burger.setAttribute('aria-expanded', open ? 'true' : 'false');
            document.body.style.overflow = open ? 'hidden' : '';
        });

        panel.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                panel.classList.remove('is-open');
                burger.classList.remove('is-open');
                burger.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            });
        });
    }

    /* ----------------------------------------------------------------------
       Apparition au scroll
       ---------------------------------------------------------------------- */
    function initReveal() {
        var targets = document.querySelectorAll('[data-reveal]');
        if (!targets.length) return;

        if (reduceMotion || !('IntersectionObserver' in window)) {
            targets.forEach(function (el) { el.classList.add('is-in'); });
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-in');
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

        targets.forEach(function (el, index) {
            var stagger = el.closest('[data-reveal-group]');
            if (stagger && !el.style.getPropertyValue('--reveal-delay')) {
                var siblings = Array.prototype.indexOf.call(stagger.querySelectorAll('[data-reveal]'), el);
                el.style.setProperty('--reveal-delay', Math.min(siblings, 6) * 80 + 'ms');
            }
            observer.observe(el);
        });
    }

    /* ----------------------------------------------------------------------
       Compteurs animes
       ---------------------------------------------------------------------- */
    function initCounters() {
        var counters = document.querySelectorAll('[data-count]');
        if (!counters.length) return;

        function run(el) {
            var target = parseFloat(el.getAttribute('data-count'));
            var suffix = el.getAttribute('data-suffix') || '';
            var duration = 1500;
            var start = null;

            if (reduceMotion) {
                el.textContent = target.toLocaleString('fr-FR') + suffix;
                return;
            }

            function frame(now) {
                if (start === null) start = now;
                var progress = Math.min((now - start) / duration, 1);
                var eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.round(target * eased).toLocaleString('fr-FR') + suffix;
                if (progress < 1) window.requestAnimationFrame(frame);
            }

            window.requestAnimationFrame(frame);
        }

        if (!('IntersectionObserver' in window)) {
            counters.forEach(run);
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                run(entry.target);
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.5 });

        counters.forEach(function (el) { observer.observe(el); });
    }

    /* ----------------------------------------------------------------------
       Accordeons FAQ
       ---------------------------------------------------------------------- */
    function initAccordions() {
        document.querySelectorAll('[data-accordion]').forEach(function (group) {
            var items = group.querySelectorAll('.faq-item');

            items.forEach(function (item) {
                var button = item.querySelector('.faq-item__q');
                var panel = item.querySelector('.faq-item__a');
                if (!button || !panel) return;

                button.addEventListener('click', function () {
                    var willOpen = !item.classList.contains('is-open');

                    if (group.hasAttribute('data-accordion-single')) {
                        items.forEach(function (other) {
                            other.classList.remove('is-open');
                            var btn = other.querySelector('.faq-item__q');
                            if (btn) btn.setAttribute('aria-expanded', 'false');
                        });
                    }

                    item.classList.toggle('is-open', willOpen);
                    button.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
                });
            });
        });
    }

    /* ----------------------------------------------------------------------
       Onglets generiques
       ---------------------------------------------------------------------- */
    function initTabs() {
        document.querySelectorAll('[data-tabs]').forEach(function (root) {
            var triggers = root.querySelectorAll('[data-tab]');
            var panels = root.querySelectorAll('[data-panel]');

            triggers.forEach(function (trigger) {
                trigger.addEventListener('click', function () {
                    var key = trigger.getAttribute('data-tab');

                    triggers.forEach(function (other) {
                        var active = other === trigger;
                        other.classList.toggle('is-active', active);
                        other.setAttribute('aria-selected', active ? 'true' : 'false');
                    });

                    panels.forEach(function (panel) {
                        panel.classList.toggle('is-active', panel.getAttribute('data-panel') === key);
                    });
                });
            });
        });
    }

    /* ----------------------------------------------------------------------
       Annee courante dans le footer
       ---------------------------------------------------------------------- */
    function initYear() {
        document.querySelectorAll('[data-year]').forEach(function (el) {
            el.textContent = new Date().getFullYear();
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initStickyHeader();
        initDropdowns();
        initMobileNav();
        initReveal();
        initCounters();
        initAccordions();
        initTabs();
        initYear();
    });
})();
