[ /**
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
                    labels: ['Oct…
[/**
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
        const costoVolumen = volumen * tarifas.porVolumen;
        const multiplicador = tarifas.destinos[destino] || 1;

        return (tarifas.base + costoPeso + costoVolumen) * multiplicador;
    }

    // ==============================
    // 🔥 SIMULACIÓN BACKEND REAL
    // ==============================
    function obtenerDatosBackend(filtro) {

        // Datos base simulados (esto luego viene del backend)
        let paquetes = [
            { tracking: 'CKE-001', cliente: 'Jose', destino: 'San José', peso: 2, volumen: 3000, fecha: '2026-03-20', estado: 'Entregado' },
            { tracking: 'CKE-002', cliente: 'Maria', destino: 'Guanacaste', peso: 5, volumen: 8000, fecha: '2026-03-21', estado: 'En Tránsito' },
            { tracking: 'CKE-003', cliente: 'Luis', destino: 'Alajuela', peso: 1, volumen: 2000, fecha: '2026-03-22', estado: 'Procesando' },
            { tracking: 'CKE-004', cliente: 'Ana', destino: 'Heredia', peso: 3, volumen: 5000, fecha: '2026-03-23', estado: 'Entregado' },
            { tracking: 'CKE-005', cliente: 'Carlos', destino: 'San José', peso: 4, volumen: 6000, fecha: '2026-03-24', estado: 'Aduanas' }
        ];

        // 🔥 Aplicar cálculo de tarifa
        paquetes = paquetes.map(p => ({
            ...p,
            flete: calcularTarifa(p.peso, p.volumen, p.destino)
        }));

        // 🔥 KPIs
        const ingresos = paquetes.reduce((acc, p) => acc + p.flete, 0);
        const entregados = paquetes.filter(p => p.estado === 'Entregado').length;

        // 🔥 Agrupación para gráfico
        const conteoPorMes = {};
        paquetes.forEach(p => {
            const mes = new Date(p.fecha).toLocaleString('es-ES', { month: 'long' });
            conteoPorMes[mes] = (conteoPorMes[mes] || 0) + 1;
        });

        // 🔥 Rutas
        const rutas = {};
        paquetes.forEach(p => {
            rutas[p.destino] = (rutas[p.destino] || 0) + 1;
        });

        return {
            kpis: {
                ingresos: ingresos,
                paquetes: paquetes.length,
                tiempo_promedio: 3.5,
                retenidos: paquetes.filter(p => p.estado === 'Aduanas').length
            },
            graficoBarras: {
                labels: Object.keys(conteoPorMes),
                data: Object.values(conteoPorMes)
            },
            graficoRutas: {
                labels: Object.keys(rutas),
                data: Object.values(rutas)
            },
            tabla: paquetes
        };
    }

    // ==============================
    // 🔥 CARGA DASHBOARD
    // ==============================
    function cargarDatosDashboard(filtro) {

        document.getElementById('btnActualizar')
            .querySelector('i')
            .classList.add('fa-spin');

        setTimeout(() => {
            const data = obtenerDatosBackend(filtro);
            renderizarDashboard(data);

            document.getElementById('btnActualizar')
                .querySelector('i')
                .classList.remove('fa-spin');
        }, 500);
    }

    // ==============================
    // 🎨 RENDER
    // ==============================
    function renderizarDashboard(data) {

        // KPIs
        document.getElementById('kpi-ingresos').textContent =
            '$' + data.kpis.ingresos.toFixed(2);

        document.getElementById('kpi-paquetes').textContent =
            data.kpis.paquetes;

        document.getElementById('kpi-tiempo').textContent =
            data.kpis.tiempo_promedio + ' días';

        document.getElementById('kpi-retenidos').textContent =
            data.kpis.retenidos;

        // 🔥 GRAFICO BARRAS
        const ctxBar = document.getElementById('barChart').getContext('2d');
        if (chartVolumen) chartVolumen.destroy();

        chartVolumen = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: data.graficoBarras.labels,
                datasets: [{
                    data: data.graficoBarras.data
                }]
            }
        });

        // 🔥 GRAFICO DONUT
        const ctxDonut = document.getElementById('doughnutChart').getContext('2d');
        if (chartRutas) chartRutas.destroy();

        chartRutas = new Chart(ctxDonut, {
            type: 'doughnut',
            data: {
                labels: data.graficoRutas.labels,
                datasets: [{
                    data: data.graficoRutas.data
                }]
            }
        });

        // 🔥 TABLA
        const tbody = document.getElementById('tbodyReportes');
        tbody.innerHTML = '';

        data.tabla.forEach(p => {

            let color = 'secondary';
            if (p.estado === 'Entregado') color = 'success';
            if (p.estado === 'En Tránsito') color = 'primary';
            if (p.estado === 'Aduanas') color = 'warning';

            const fila = `
                <tr>
                    <td>${p.tracking}</td>
                    <td>${p.cliente}</td>
                    <td>${p.destino}</td>
                    <td>${p.fecha}</td>
                    <td><span class="badge bg-${color}">${p.estado}</span></td>
                    <td>$${p.flete.toFixed(2)}</td>
                </tr>
            `;

            tbody.insertAdjacentHTML('beforeend', fila);
        });
    }

    // ==============================
    // 📤 EXPORTACIONES
    // ==============================
    document.getElementById('exportExcel').addEventListener('click', function () {
        const tabla = document.getElementById('tablaReportes');
        const wb = XLSX.utils.table_to_book(tabla, { sheet: "Reporte" });
        XLSX.writeFile(wb, "Reporte.xlsx");
    });

    document.getElementById('exportPDF').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.text("Reporte de Paquetes", 14, 20);

        doc.autoTable({
            html: '#tablaReportes'
        });

        doc.save('Reporte.pdf');
    });

    // ==============================
    // 🎛️ EVENTOS
    // ==============================
    document.getElementById('btnActualizar').addEventListener('click', () => {
        cargarDatosDashboard();
    });

    document.getElementById('filtroMes').addEventListener('change', (e) => {
        cargarDatosDashboard(e.target.value);
    });

    // INIT
    cargarDatosDashboard();

});