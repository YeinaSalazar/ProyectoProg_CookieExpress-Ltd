/**
 * Lógica para reportes.php (Dashboard Administrativo)
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Variables globales para instancias de gráficos
    let chartVolumen, chartRutas;

    // 1. OBTENER DATOS VÍA AJAX
    function cargarDatosDashboard(filtro) {
        
        // Efecto visual de recarga
        document.getElementById('btnActualizar').querySelector('i').classList.add('fa-spin');

        // SIMULACIÓN DE LLAMADA AL API (/apiProyecto/public/admin/reportes?filtro=mes)
        setTimeout(() => {
            // Mock Data
            const dataAPI = {
                kpis: { ingresos: 12450.50, paquetes: 842, tiempo_promedio: 4.5, retenidos: 12 },
                graficoBarras: {
                    labels: ['Oct
 /**
 * Lógica REALISTA para reportes.php
 */

document.addEventListener('DOMContentLoaded', function () {

    let chartVolumen, chartRutas;

    // ==============================
    // 🔥 TARIFAS (SIMULANDO BACKEND)
    // ==============================
    const tarifas = {
        base: 5,
        porKg: 2,
        porVolumen: 0.003, // cm3
        destinos: {
            'San José': 1,
            'Alajuela': 1.1,
            'Heredia': 1.05,
            'Guanacaste': 1.5
        }
    };

    // ==============================
    // 🔥 CALCULO REAL DE TARIFA
    // ==============================
    function calcularTarifa(peso, volumen, destino) {
        const costoPeso = peso * tarifas.porKg;
        const costoVolumen = volumen * tarifas.porVolumen…
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
                    tienda: "Amaz…
 /**
 * Lógica MEJORADA para paquetes.php
 */

document.addEventListener('DOMContentLoaded', function () {

    const contenedorPaquetes = document.getElementById('contenedor-paquetes');
    const inputSearch = document.getElementById('searchSearch');
    const formFactura = document.getElementById('formSubirFactura');

    // ==============================
    // 🔥 TARIFAS (MISMAS QUE REPORTES)
    // ==============================
    const tarifas = {
        base: 5,
        porKg: 2,
        porVolumen: 0.003,
        destinos: {
            'San José': 1,
            'Alajuela': 1.1,
            'Heredia': 1.05,
            'Guanacaste': 1.5
        }
    };

    function calcularTarifa(peso, volumen, destino) {
        const costoPeso = peso * tarifas.porKg;
        const costoVolumen = volumen * tarifas.porVolumen;
        const multiplicador = tarifas.destinos[destino] || 1;

        return (tarifas.base + costoPeso + costoVolumen) * multiplicador;
    }

    // ==============================
    // 🔥 SIMULACIÓN BACKEND REAL
    // ==============================
    function obtenerPaquetesBackend() {

        let paquetes = [
            {
                id: 1,
                tracking: "CKE-1001",
                tienda: "Amazon",
                descripcion: "Laptop Gamer",
                peso: 3,
                volumen: 8000,
                destino: "San José",
                estado_actual: "Requiere Factura",
                fecha: "2026-03-20"
            },
            {
                id: 2,
                tracking: "CKE-1002",
                tienda: "eBay",
                descripcion: "Zapatillas Nike",
                peso: 1,
                volumen: 3000,
                destino: "Guanacaste",
                estado_actual: "En Tránsito",
                fecha: "2026-03-22"
            },
            {
                id: 3,
                tracking: "CKE-1003",
                tienda: "Shein",
                descripcion: "Ropa Variada",
                peso: 2,
                volumen: 4000,
                destino: "Heredia",
                estado_actual: "Entregado",
                fecha: "2026-03-18"
            }
        ];

        // 🔥 Calcular flete real
        paquetes = paquetes.map(p => ({
            ...p,
            flete: calcularTarifa(p.peso, p.volumen, p.destino)
        }));

        return paquetes;
    }

    // ==============================
    // 🚀 CARGAR PAQUETES
    // ==============================
    function cargarPaquetes() {

        contenedorPaquetes.innerHTML = `
            <div class="p-5 text-center text-muted">
                <div class="spinner-border mb-3"></div>
                <p>Cargando paquetes...</p>
            </div>
        `;

        setTimeout(() => {
            const data = obtenerPaquetesBackend();
            renderizarPaquetes(data);
        }, 800);
    }

    // ==============================
    // 🎨 RENDER
    // ==============================
    function renderizarPaquetes(paquetes) {

        contenedorPaquetes.innerHTML = '';

        if (paquetes.length === 0) {
            contenedorPaquetes.innerHTML = 'No hay paquetes';
            return;
        }

        paquetes.forEach(paq => {

            // 🔥 Badge dinámico
            let badge = 'secondary';
            if (paq.estado_actual === "Entregado") badge = 'success';
            if (paq.estado_actual === "En Tránsito") badge = 'primary';
            if (paq.estado_actual === "Requiere Factura") badge = 'warning';

            // 🔥 Timeline dinámico
            const historial = generarHistorial(paq);

            // 🔥 Botón factura
            let btnFactura = '';
            if (paq.estado_actual === "Requiere Factura") {
                btnFactura = `
                    <button class="btn btn-sm btn-warning w-100 btn-subir-factura"
                        data-id="${paq.id}"
                        data-tracking="${paq.tracking}">
                        Subir Factura
                    </button>
                `;
            }

            const html = `
                <div class="list-group-item p-4 paquete-item">
                    <div class="row">
                        
                        <div class="col-md-4">
                            <h6>${paq.tienda} 
                                <span class="badge bg-${badge}">${paq.estado_actual}</span>
                            </h6>
                            <small>Tracking: ${paq.tracking}</small><br>
                            <small>${paq.descripcion}</small><br>
                            <small>Peso: ${paq.peso} kg</small><br>
                            <small>Destino: ${paq.destino}</small><br>
                            <strong>$${paq.flete.toFixed(2)}</strong>
                        </div>

                        <div class="col-md-5">
                            ${historial}
                        </div>

                        <div class="col-md-3">
                            ${btnFactura}
                        </div>

                    </div>
                </div>
            `;

            contenedorPaquetes.insertAdjacentHTML('beforeend', html);
        });

        asignarEventosDinamicos();
    }

    // ==============================
    // 🔥 HISTORIAL AUTOMÁTICO
    // ==============================
    function generarHistorial(paq) {

        let pasos = [];

        pasos.push("Recibido en Miami");

        if (paq.estado_actual !== "Requiere Factura") {
            pasos.push("Factura procesada");
        }

        if (paq.estado_actual === "En Tránsito" || paq.estado_actual === "Entregado") {
            pasos.push("En camino a Costa Rica");
        }

        if (paq.estado_actual === "Entregado") {
            pasos.push("Entregado");
        }

        let html = '<ul>';

        pasos.forEach(p => {
            html += <li>${p}</li>;
        });

        html += '</ul>';

        return html;
    }

    // ==============================
    // 🎯 EVENTOS
    // ==============================
    function asignarEventosDinamicos() {

        document.querySelectorAll('.btn-subir-factura').forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('idPaqueteFactura').value = this.dataset.id;
                document.getElementById('trackingFacturaRef').textContent = this.dataset.tracking;

                new bootstrap.Modal(document.getElementById('modalFactura')).show();
            });
        });
    }

    // ==============================
    // 📤 SUBIR FACTURA
    // ==============================
    if (formFactura) {
        formFactura.addEventListener('submit', function (e) {
            e.preventDefault();

            const btn = this.querySelector('button');
            btn.innerHTML = 'Subiendo...';
            btn.disabled = true;

            setTimeout(() => {
                btn.innerHTML = 'Subir';
                btn.disabled = false;

                bootstrap.Modal.getInstance(document.getElementById('modalFactura')).hide();

                alert('Factura subida correctamente');

                cargarPaquetes();
            }, 1200);
        });
    }

    // ==============================
    // 🔍 BUSCADOR
    // ==============================
    if (inputSearch) {
        inputSearch.addEventListener('keyup', function () {
            const term = this.value.toLowerCase();

            document.querySelectorAll('.paquete-item').forEach(item => {
                item.style.display = item.innerText.toLowerCase().includes(term) ? '' : 'none';
            });
        });
    }

    // INIT
    cargarPaquetes();

});