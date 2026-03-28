/**
 * Lógica para paquetes.php (Tracking y Gestión)
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Referencias DOM
    const contenedorPaquetes = document.getElementById('contenedor-paquetes');
    const inputSearch = document.getElementById('searchSearch');
    const formFactura = document.getElementById('formSubirFactura');

    // 1. CARGAR PAQUETES VÍA AJAX
    function cargarPaquetes() {
        // SIMULACIÓN DE LLAMADA AL API (/apiProyecto/public/paquetes/mis-paquetes)
        // Aquí usarías $.ajax o fetch con el Token del usuario.
        
        setTimeout(() => {
            const dataFalsa = [
                {
                    id: 1,
                    tracking: "TBA1234567890",
                    tienda: "Amazon",
                    descripcion: "Piezas de Computadora",
                    peso: "2.5 lbs",
                    estado_actual: "Requiere Factura",
                    badge_class: "badge-soft-warning",
                    img_url: "https://images.unsplash.com/photo-1603048297172-c92544798d5e?w=150&q=80",
                    historial: [
                        { fecha: "26 Mar 2026, 10:30 AM", estado: "Recibido en Bodega Miami", tipo: "completed" },
                        { fecha: "Pendiente", estado: "Esperando Factura del Cliente", tipo: "current" }
                    ]
                },
                {
                    id: 2,
                    tracking: "1Z9999999999999999",
                    tienda: "eBay",
                    descripcion: "Zapatillas Deportivas",
                    peso: "1.2 lbs",
                    estado_actual: "En Tránsito a CR",
                    badge_class: "badge-soft-primary",
                    img_url: "https://images.unsplash.com/photo-1549465220-1a8b9238cd48?w=150&q=80",
                    historial: [
                        { fecha: "24 Mar 2026, 02:15 PM", estado: "Recibido en Bodega Miami", tipo: "completed" },
                        { fecha: "25 Mar 2026, 09:00 AM", estado: "Factura Aprobada", tipo: "completed" },
                        { fecha: "27 Mar 2026, 08:45 AM", estado: "En Vuelo hacia Costa Rica", tipo: "current" }
                    ]
                }
            ];

            renderizarPaquetes(dataFalsa);
        }, 1200); // Retardo simulado para mostrar el loader
    }

    // 2. RENDERIZAR HTML DE LOS PAQUETES
    function renderizarPaquetes(paquetes) {
        contenedorPaquetes.innerHTML = ''; // Limpiar loader

        if(paquetes.length === 0) {
            contenedorPaquetes.innerHTML = '<div class="p-5 text-center text-muted">No tienes paquetes registrados en este momento.</div>';
            return;
        }

        paquetes.forEach(paq => {
            // Generar el timeline
            let timelineHTML = '<div class="tracking-timeline mt-3">';
            paq.historial.forEach(hist => {
                timelineHTML += `
                    <div class="timeline-step ${hist.tipo}">
                        <div class="small fw-bold">${hist.estado}</div>
                        <div class="text-muted" style="font-size: 0.75rem;">${hist.fecha}</div>
                    </div>
                `;
            });
            timelineHTML += '</div>';

            // Botones de acción dinámicos
            let actionButtons = '';
            if(paq.estado_actual === "Requiere Factura") {
                actionButtons = `<button class="btn btn-sm btn-accent-corp w-100 btn-subir-factura" data-id="${paq.id}" data-tracking="${paq.tracking}">
                                    <i class="fa-solid fa-upload me-1"></i> Subir Factura
                                 </button>`;
            }

            // Construir la tarjeta
            const itemHTML = `
                <div class="list-group-item p-4 paquete-item border-bottom">
                    <div class="row align-items-md-center">
                        <div class="col-auto mb-3 mb-md-0">
                            <img src="${paq.img_url}" class="paquete-thumb" alt="Foto paquete" data-fullimg="${paq.img_url}" data-desc="${paq.descripcion} - Tracking: ${paq.tracking}">
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <h6 class="mb-1 fw-bold font-montserrat">${paq.tienda} <span class="badge ${paq.badge_class} ms-2">${paq.estado_actual}</span></h6>
                            <div class="text-muted small mb-1">Tracking: <span class="text-dark fw-bold">${paq.tracking}</span></div>
                            <div class="text-muted small">${paq.descripcion} &bull; Peso: ${paq.peso}</div>
                        </div>
                        <div class="col-md-5 mb-3 mb-md-0">
                            <button class="btn btn-sm btn-light w-100 text-start d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTimeline${paq.id}" aria-expanded="false">
                                <span>Ver Historial de Rastreo</span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                            <div class="collapse" id="collapseTimeline${paq.id}">
                                ${timelineHTML}
                            </div>
                        </div>
                        <div class="col-md-2 text-md-end">
                            ${actionButtons}
                        </div>
                    </div>
                </div>
            `;
            contenedorPaquetes.insertAdjacentHTML('beforeend', itemHTML);
        });

        asignarEventosDinamicos();
    }

    // 3. EVENTOS PARA ELEMENTOS GENERADOS DINÁMICAMENTE
    function asignarEventosDinamicos() {
        // Abrir Modal de Factura
        const btnsFactura = document.querySelectorAll('.btn-subir-factura');
        const modalFactura = new bootstrap.Modal(document.getElementById('modalFactura'));
        
        btnsFactura.forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('idPaqueteFactura').value = this.dataset.id;
                document.getElementById('trackingFacturaRef').textContent = this.dataset.tracking;
                modalFactura.show();
            });
        });

        // Abrir Modal de Imagen
        const thumbs = document.querySelectorAll('.paquete-thumb');
        const modalImagen = new bootstrap.Modal(document.getElementById('modalImagen'));
        const imgFull = document.getElementById('imagenPaqueteFull');
        const descImg = document.getElementById('descripcionImagenPaquete');

        thumbs.forEach(thumb => {
            thumb.addEventListener('click', function() {
                imgFull.src = this.dataset.fullimg;
                descImg.textContent = this.dataset.desc;
                modalImagen.show();
            });
        });
    }

    // 4. ENVÍO DEL FORMULARIO DE FACTURA (AJAX)
    if(formFactura) {
        formFactura.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const btnSubmit = this.querySelector('button[type="submit"]');
            const originalText = btnSubmit.innerHTML;
            btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Subiendo...';
            btnSubmit.disabled = true;

            const formData = new FormData(this);
            
            /* Petición real usando fetch para archivos:
            fetch('/apiProyecto/public/paquetes/subir-factura', {
                method: 'POST',
                body: formData // No setear Content-Type, el navegador lo hace con boundary
            })
            */

            setTimeout(() => {
                // Simulación exitosa
                bootstrap.Modal.getInstance(document.getElementById('modalFactura')).hide();
                this.reset();
                btnSubmit.innerHTML = originalText;
                btnSubmit.disabled = false;

                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Factura Subida',
                        text: 'El documento ha sido enviado a aduanas para su revisión.',
                        confirmButtonColor: '#FF6B00'
                    }).then(() => {
                        // Recargar lista
                        contenedorPaquetes.innerHTML = '<div class="p-5 text-center text-muted"><div class="spinner-border text-accent-corp mb-3" role="status"></div><p>Actualizando paquetes...</p></div>';
                        cargarPaquetes();
                    });
                }
            }, 1500);
        });
    }

    // Búsqueda simple en el front-end
    if(inputSearch) {
        inputSearch.addEventListener('keyup', function() {
            const term = this.value.toLowerCase();
            const items = document.querySelectorAll('.paquete-item');
            
            items.forEach(item => {
                const text = item.innerText.toLowerCase();
                item.style.display = text.includes(term) ? '' : 'none';
            });
        });
    }

    // Inicializar
    cargarPaquetes();
});