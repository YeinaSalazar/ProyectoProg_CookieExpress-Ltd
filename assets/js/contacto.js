(function ($) {
    $(function () {
        $('#contactForm').on('submit', function (event) {
            event.preventDefault();

            var form = this;
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            if (window.CookieExpressConfig && window.CookieExpressConfig.demoMode) {
                window.alert('Consulta preparada para integrarse via AJAX.');
                form.reset();
                return;
            }

            window.CookieExpressAPI.post('/contacto', $(form).serialize())
                .done(function () {
                    window.alert('Consulta enviada con exito.');
                    form.reset();
                });
        });
    });
})(window.jQuery);
