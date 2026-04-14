(function (window, document, $) {
    'use strict';

    function initAOS() {
        if (window.AOS) {
            window.AOS.init({ duration: 850, offset: 60, once: true, easing: 'ease-out-cubic' });
        }
    }

    function initNavbar() {
        var navbar = document.querySelector('.public-navbar');
        if (!navbar) {
            return;
        }

        function onScroll() {
            navbar.classList.toggle('is-scrolled', window.scrollY > 24);
        }

        onScroll();
        window.addEventListener('scroll', onScroll);
    }

    function initAjaxLoader() {
        if (!$) {
            return;
        }

        $.ajaxSetup({
            beforeSend: function (xhr) {
                var token = window.localStorage.getItem('cookieexpress_token');
                if (token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
            }
        });

        $(document).ajaxStart(function () {
            $('#ajax-loader').css('display', 'grid');
        });

        $(document).ajaxStop(function () {
            $('#ajax-loader').hide();
        });
    }

    function initStatusBadges() {
        document.querySelectorAll('[data-status]').forEach(function (node) {
            var status = node.getAttribute('data-status');
            node.classList.add('status-badge', 'status-' + status);
        });
    }

    function initGsapEntrances() {
        if (!window.gsap) {
            return;
        }

        var nodes = document.querySelectorAll('.hero-stat-card, .metric-card, .glass-card');
        if (nodes.length) {
            window.gsap.from(nodes, { y: 20, opacity: 0, duration: 0.7, ease: 'power2.out', stagger: 0.08 });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        initAOS();
        initNavbar();
        initAjaxLoader();
        initStatusBadges();
        initGsapEntrances();
    });
})(window, document, window.jQuery);
