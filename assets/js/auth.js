(function ($) {
    function togglePassword(button) {
        var target = $(button).data('target');
        var input = $(target);
        var icon = $(button).find('i');
        var type = input.attr('type') === 'password' ? 'text' : 'password';
        input.attr('type', type);
        icon.attr('class', type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash');
    }

    function resolveDashboard(role) {
        if (role === 'admin') {
            return 'dashboard-admin.php';
        }
        if (role === 'logistica') {
            return 'dashboard-logistica.php';
        }
        return 'dashboard-cliente.php';
    }

    $(function () {
        $(document).on('click', '.toggle-password', function () {
            togglePassword(this);
        });

        $('#loginForm').on('submit', function (event) {
            event.preventDefault();
            if (!this.checkValidity()) {
                this.reportValidity();
                return;
            }

            var role = $('#loginRole').val();
            window.localStorage.setItem('cookieexpress_demo_role', role);
            window.location.href = resolveDashboard(role);
        });

        $('#registroForm').on('submit', function (event) {
            event.preventDefault();
            if (!this.checkValidity()) {
                this.reportValidity();
                return;
            }

            if ($('#regPassword').val() !== $('#regPasswordConfirm').val()) {
                window.alert('Las contrasenas no coinciden.');
                return;
            }

            window.alert('Cuenta creada en modo demo. Casillero asignado: CKE-8492.');
            window.location.href = 'login.php';
        });

        $('#recoverPasswordForm').on('submit', function (event) {
            event.preventDefault();
            if (!this.checkValidity()) {
                this.reportValidity();
                return;
            }

            window.alert('Flujo de recuperacion listo para integrarse con el backend.');
            var modal = bootstrap.Modal.getInstance(document.getElementById('modalRecuperarPassword'));
            if (modal) {
                modal.hide();
            }
            this.reset();
        });
    });
})(window.jQuery);
