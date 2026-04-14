(function ($) {
    $(function () {
        $('#profileForm').on('submit', function (event) {
            event.preventDefault();
            window.alert('Perfil listo para persistirse via AJAX.');
        });
    });
})(window.jQuery);
