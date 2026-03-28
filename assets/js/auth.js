/**
 * Lógica para login.php y registro.php
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Funcionalidad: Mostrar/Ocultar Contraseña
    const togglePasswordBtns = document.querySelectorAll('.toggle-password');
    togglePasswordBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const icon = this.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });

    // 2. Manejo de Inicio de Sesión (AJAX)
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!loginForm.checkValidity()) {
                loginForm.classList.add('was-validated');
                return;
            }

            const btnText = document.getElementById('btnLoginText');
            const btnSpinner = document.getElementById('btnLoginSpinner');
            const submitBtn = loginForm.querySelector('button[type="submit"]');

            // Estado de carga
            btnText.textContent = "Verificando...";
            btnSpinner.classList.remove('d-none');
            submitBtn.disabled = true;

            const data = Object.fromEntries(new FormData(loginForm).entries());

            // SIMULACIÓN DE LLAMADA A LA API REST (Slim Framework)
            /* $.ajax({
                url: '/apiProyecto/public/auth/login',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(res) {
                    // Guardar Token (ej: localStorage.setItem('jwt', res.token);)
                    window.location.href = 'paquetes.php';
                },
                error: function(err) { ... mostrar error con SweetAlert ... }
            });
            */

            setTimeout(() => {
                // Simulación exitosa
                window.location.href = 'paquetes.php'; // Redirigir al dashboard
            }, 1500);
        });
    }

    // 3. Manejo de Registro (AJAX)
    const registroForm = document.getElementById('registroForm');
    if (registroForm) {
        const pass = document.getElementById('passwordReg');
        const passConfirm = document.getElementById('passwordConfirm');

        // Validación en tiempo real de contraseñas
        passConfirm.addEventListener('input', function() {
            if (pass.value !== passConfirm.value) {
                passConfirm.setCustomValidity("Las contraseñas no coinciden");
            } else {
                passConfirm.setCustomValidity("");
            }
        });

        registroForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Verificar si contraseñas coinciden al enviar
            if (pass.value !== passConfirm.value) {
                passConfirm.setCustomValidity("Las contraseñas no coinciden");
            }

            if (!registroForm.checkValidity()) {
                registroForm.classList.add('was-validated');
                return;
            }

            const btnText = document.getElementById('btnRegText');
            const btnSpinner = document.getElementById('btnRegSpinner');
            const submitBtn = registroForm.querySelector('button[type="submit"]');

            btnText.textContent = "Creando Casillero...";
            btnSpinner.classList.remove('d-none');
            submitBtn.disabled = true;

            const data = Object.fromEntries(new FormData(registroForm).entries());
            delete data['terminos']; // No solemos enviar el boolean del checkbox al backend si ya validamos en front

            // SIMULACIÓN API
            setTimeout(() => {
                // Restaurar botón
                btnText.textContent = "Crear Casillero Gratis";
                btnSpinner.classList.add('d-none');
                submitBtn.disabled = false;

                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Casillero Creado!',
                        text: 'Tu código de casillero es CKE-8492. Revisa tu correo.',
                        confirmButtonColor: '#0A2540'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'login.php';
                        }
                    });
                }
            }, 2000);
        });
    }
});