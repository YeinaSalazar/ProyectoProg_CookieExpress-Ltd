/**
 * Lógica específica para contacto.php
 */

document.addEventListener('DOMContentLoaded', function() {
    
    const formContacto = document.getElementById('formularioContactoGeneral');
    
    if (formContacto) {
        formContacto.addEventListener('submit', function(event) {
            event.preventDefault(); 
            event.stopPropagation();
            
            // Validación de Bootstrap 5
            if (!formContacto.checkValidity()) {
                formContacto.classList.add('was-validated');
                return;
            }

            // Preparar UI para envío (deshabilitar botón y mostrar spinner)
            const btnText = document.getElementById('btnContactoText');
            const btnSpinner = document.getElementById('btnContactoSpinner');
            const submitBtn = formContacto.querySelector('button[type="submit"]');
            
            btnText.textContent = "Procesando envío...";
            btnSpinner.classList.remove('d-none');
            submitBtn.disabled = true;

            // Recopilar datos del formulario
            const formData = new FormData(formContacto);
            const data = Object.fromEntries(formData.entries());

            // SIMULACIÓN DE PETICIÓN AJAX A SLIM FRAMEWORK
            /*
            $.ajax({
                url: '/apiProyecto/public/contacto/enviar',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(response) {
                    // Manejar éxito
                },
                error: function(error) {
                    // El error se manejaría en global.js
                }
            });
            */

            // Simular respuesta del servidor después de 1.5 segundos
            setTimeout(() => {
                // Restaurar botón a su estado original
                btnText.textContent = "Enviar Mensaje";
                btnSpinner.classList.add('d-none');
                submitBtn.disabled = false;
                
                // Limpiar formulario
                formContacto.classList.remove('was-validated');
                formContacto.reset();

                // Notificación de éxito usando SweetAlert (definido en global.js)
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Mensaje Recibido!',
                        text: 'Gracias por contactarnos. Un agente logístico de CookieExpress te responderá a ' + data.email + ' en breve.',
                        confirmButtonColor: '#0A2540', // Azul marino corporativo
                        confirmButtonText: 'Entendido'
                    });
                } else {
                    alert("Mensaje enviado con éxito. Te responderemos pronto.");
                }
            }, 1500);
        }, false);
    }
});