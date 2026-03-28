/**
 * Lógica Global de CookieExpress Ltda
 * Este archivo se carga en TODAS las páginas a través de scripts.php
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // ==========================================
    // 1. INICIALIZAR ANIMACIONES SCROLL (AOS)
    // ==========================================
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,       // Duración de la animación (ms)
            easing: 'ease-out',  // Tipo de transición (suave al final)
            once: true,          // La animación solo ocurre la primera vez que se hace scroll
            offset: 50           // Cuántos px hay que bajar para que el elemento aparezca
        });
    }

    // ==========================================
    // 2. INICIALIZAR COMPONENTES DE BOOTSTRAP 5
    // ==========================================
    // Inicializar todos los Tooltips (globos de ayuda) que puedan existir en cualquier página
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    if (tooltipTriggerList.length > 0) {
        [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    }

    // ==========================================
    // 3. EFECTOS GLOBALES DE UI (Navbar)
    // ==========================================
    // Añade una sombra a la barra de navegación cuando el usuario empieza a hacer scroll hacia abajo
    const navbar = document.querySelector('.navbar.sticky-top');
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 10) {
                navbar.classList.add('shadow');
                navbar.classList.remove('shadow-sm');
            } else {
                navbar.classList.add('shadow-sm');
                navbar.classList.remove('shadow');
            }
        });
    }

    // ==========================================
    // 4. CONFIGURACIÓN DE ALERTAS (SweetAlert2)
    // ==========================================
    // Si SweetAlert está cargado, creamos un objeto con los colores corporativos
    // para usarlo en otras partes del proyecto y mantener la identidad visual.
    window.toastCorp = null;
    if (typeof Swal !== 'undefined') {
        window.toastCorp = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            customClass: {
                title: 'font-montserrat'
            }
        });
    }

    // ==========================================
    // 5. INTERCEPTORES GLOBALES DE AJAX (jQuery)
    // ==========================================
    // Esto es CLAVE para la conexión con tu API REST en Slim Framework.
    // Atrapa cualquier petición AJAX de cualquier página (login, registro, paquetes).
    if (typeof jQuery !== 'undefined') {
        
        // Antes de que salga la petición (Ideal para inyectar el Token JWT de seguridad)
        $.ajaxSetup({
            beforeSend: function(xhr) {
                // Si guardas un token de sesión en localStorage al hacer login, lo inyectas aquí
                const token = localStorage.getItem('jwt_cookieexpress');
                if (token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
            }
        });

        // Evento Global: Cuando inicia CUALQUIER petición AJAX
        $(document).ajaxStart(function() {
            const loader = document.getElementById('ajax-loader');
            if (loader) loader.style.display = 'flex'; // Muestra la pantalla de carga
        });

        // Evento Global: Cuando termina CUALQUIER petición AJAX
        $(document).ajaxStop(function() {
            const loader = document.getElementById('ajax-loader');
            if (loader) loader.style.display = 'none'; // Oculta la pantalla de carga
        });

        // Evento Global: Manejo de Errores (Si el API de Slim falla, está caído, o da error 500/401)
        $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
            console.error("Error en API:", settings.url);
            
            // Si el error es 401 (No Autorizado), el token expiró -> Redirigir al login
            if (jqxhr.status === 401) {
                localStorage.removeItem('jwt_cookieexpress');
                window.location.href = 'login.php';
                return;
            }

            // Mostrar mensaje de error general
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error de conexión',
                    text: 'No pudimos comunicarnos con el servidor logístico. Por favor intenta de nuevo.',
                    confirmButtonColor: '#0A2540' // Azul Marino corporativo
                });
            } else {
                alert("Error de conexión con el servidor.");
            }
        });
    }

});