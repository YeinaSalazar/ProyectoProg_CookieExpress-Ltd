/**
 * SISTEMA UNIFICADO (paquetes + reportes)
 */

document.addEventListener('DOMContentLoaded', function () {

    // ==============================
    // 🔥 TARIFAS
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

    // =====================================================
    // 📦 SECCIÓN PAQUETES (solo si existe en el HTML)
    // =====================================================
    const contenedorPaquetes = document.getElementById('contenedor-paquetes');
    const inputSearch = document.getElementById('searchSearch');
    const formFactura = document.getElementById('formSubirFactura');

    if (contenedorPaquetes) {

        function obtenerPaquetes() {
            let paquetes = [
                {
                    id: 1,
                    tracking: "CKE-1001",
                    tienda: "Amazon",
                    descripcion: "Laptop Gamer",
                    peso: 3,
                    volumen: 8000,
                    destino: "San José",
                    estado_actual: "Requiere Factura"
                },
                {
                    id: 2,
                    tracking: "CKE-1002",
                    tienda: "eBay",
                    descripcion: "Zapatillas",
                    peso: 1,
                    volumen: 3000,
                    destino: "Guanacaste",
                    estado_actual: "En Tránsito"
                },
                {
                    id: 3,
                    tracking: "CKE-1003",
                    tienda: "Shein",
                    descripcion: "Ropa",
                    peso: 2,
                    volumen: 4000,
                    destino: "Heredia",
                    estado_actual: "Entregado"
                }
            ];

            return paquetes.map(p => ({
                ...p,
                flete: calcularTarifa(p.peso, p.volumen, p.destino)
            }));
        }

        function cargarPaquetes() {
            contenedorPaquetes.innerHTML = <div class="p-5 text-center"><div class="spinner-border"></div></div>;

            setTimeout(() => {
                renderizarPaquetes(obtenerPaquetes());
            }, 800);
        }

        function renderizarPaquetes(paquetes) {
            contenedorPaquetes.innerHTML = '';

            paquetes.forEach(paq => {

                let badge = 'secondary';
                if (paq.estado_actual === "Entregado") badge = 'success';
                if (paq.estado_actual === "En Tránsito") badge = 'primary';
                if (paq.estado_actual === "Requiere Factura") badge = 'warning';

                let historial = '<ul>';

                historial += <li>Recibido en Miami</li>;

                if (paq.estado_actual !== "Requiere Factura") {
                    historial += <li>Factura procesada</li>;
                }

                if (paq.estado_actual !== "Requiere Factura") {
                    historial += <li>En camino a Costa Rica</li>;
                }

                if (paq.estado_actual === "Entregado") {
                    historial += <li>Entregado</li>;
                }

                historial += '</ul>';

                let btn = '';
                if (paq.estado_actual === "Requiere Factura") {
                    btn = `<button class="btn btn-warning btn-subir-factura"
                            data-id="${paq.id}"
                            data-tracking="${paq.tracking}">
                            Subir Factura
                           </button>`;
                }

                const html = `
                    <div class="list-group-item paquete-item p-4">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>${paq.tienda}
                                    <span class="badge bg-${badge}">${paq.estado_actual}</span>
                                </h6>
                                <small>${paq.tracking}</small><br>
                                <small>${paq.descripcion}</small><br>
                                <small>${paq.destino}</small><br>
                                <strong>$${paq.flete.toFixed(2)}</strong>
                            </div>
                            <div class="col-md-5">${historial}</div>
                            <div class="col-md-3">${btn}</div>
                        </div>
                    </div>
                `;

                contenedorPaquetes.insertAdjacentHTML('beforeend', html);
            });

            document.querySelectorAll('.btn-subir-factura').forEach(btn => {
                btn.addEventListener('click', function () {
                    document.getElementById('idPaqueteFactura').value = this.dataset.id;
                    document.getElementById('trackingFacturaRef').textContent = this.dataset.tracking;

                    new bootstrap.Modal(document.getElementById('modalFactura')).show();
                });
            });
        }

        if (formFactura) {
            formFactura.addEventListener('submit', function (e) {
                e.preventDefault();

                alert('Factura subida correctamente');
                bootstrap.Modal.getInstance(document.getElementById('modalFactura')).hide();

                cargarPaquetes();
            });
        }

        if (inputSearch) {
            inputSearch.addEventListener('keyup', function () {
                const term = this.value.toLowerCase();

                document.querySelectorAll('.paquete-item').forEach(item => {
                    item.style.display = item.innerText.toLowerCase().includes(term) ? '' : 'none';
                });
            });
        }

        cargarPaquetes();
    }

    // =====================================================
    // 📊 SECCIÓN REPORTES (solo si existe en el HTML)
    // =====================================================
    const kpiIngresos = document.getElementById('kpi-ingresos');

    if (kpiIngresos) {

        let chart;

        function cargarReportes() {

            const data = {
                ingresos: 5000,
                paquetes: 20,
                labels: ['Ene', 'Feb', 'Mar'],
                valores: [5, 10, 20]
            };

            document.getElementById('kpi-ingresos').textContent = '$' + data.ingresos;
            document.getElementById('kpi-paquetes').textContent = data.paquetes;

            const ctx = document.getElementById('barChart').getContext('2d');

            if (chart) chart.destroy();

            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        data: data.valores
                    }]
                }
            });
        }

        cargarReportes();
    }

});