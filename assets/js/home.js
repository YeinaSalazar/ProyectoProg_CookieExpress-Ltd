/**
 * Lógica específica para index.php
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // 1. INICIALIZACIÓN DEL MAPA (Leaflet JS)
    // Coordenadas centradas en San José
    const map = L.map('locationMap').setView([9.9281, -84.0905], 13);

    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    }).addTo(map);

    // Marcador personalizado
    const marker = L.marker([9.9281, -84.0905]).addTo(map);
    marker.bindPopup("<b>CookieExpress Ltda</b><br>Central Logística Principal.").openPopup();

    
    // 2. MANEJO DEL FORMULARIO DE CONTACTO VÍA AJAX
    const form = document.getElementById('contactForm');
    
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar recarga de página
            event.stopPropagation();
            
            // Validación de Bootstrap 5
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            // Preparar UI para envío
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');
            const submitBtn = form.querySelector('button[type="submit"]');
            
            btnText.textContent = "Enviando...";
            btnSpinner.classList.remove('d-none');
            submitBtn.disabled = true;

            // Recopilar datos
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            // Aquí iría la petición fetch() o $.ajax() hacia Slim Framework
            /* $.ajax({
                url: 'http://localhost/apiProyecto/public/contacto',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(response) { ... },
                error: function(err) { ... }
            });
            */

            // Simulación de respuesta de la API (Retardo de 1.5s)
            setTimeout(() => {
                // Restaurar botón
                btnText.textContent = "Enviar Mensaje";
                btnSpinner.classList.add('d-none');
                submitBtn.disabled = false;
                form.classList.remove('was-validated');
                form.reset();

                // Notificación con SweetAlert2 (Asumiendo que se carga en scripts.php)
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Mensaje Enviado!',
                        text: 'Nos pondremos en contacto contigo lo antes posible.',
                        confirmButtonColor: '#FF6B00'
                    });
                } else {
                    alert("Mensaje enviado con éxito.");
                }
            }, 1500);
        }, false);
    }
});