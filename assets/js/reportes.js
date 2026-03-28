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
                    labels: ['Octubre', 'Noviembre', 'Diciembre', 'Enero', 'Febrero', 'Marzo'],
                    data: [450, 600, 1200, 750, 800, 842]
                },
                graficoRutas: {
                    labels: ['San José', 'Guanacaste', 'Heredia', 'Alajuela'],
                    data: [45, 25, 15, 15] // Porcentajes
                },
                tabla: [
                    { tracking: 'CKE-8492-01', cliente: 'Jose Luis', ruta: 'San José', fecha: '2026-03-27', estado: 'Entregado', flete: 15.50 },
                    { tracking: 'CKE-9910-02', cliente: 'María C.', ruta: 'Guanacaste', fecha: '2026-03-26', estado: 'En Tránsito', flete: 22.00 },
                    { tracking: 'CKE-1029-01', cliente: 'Carlos R.', ruta: 'San José', fecha: '2026-03-25', estado: 'Aduanas', flete: 45.00 },
                    { tracking: 'CKE-3341-05', cliente: 'Ana V.', ruta: 'Heredia', fecha: '2026-03-24', estado: 'Entregado', flete: 12.25 },
                    { tracking: 'CKE-7721-01', cliente: 'Luis F.', ruta: 'Alajuela', fecha: '2026-03-24', estado: 'Procesando', flete: 8.50 }
                ]
            };

            renderizarDashboard(dataAPI);
            document.getElementById('btnActualizar').querySelector('i').classList.remove('fa-spin');
        }, 800);
    }

    // 2. RENDERIZAR INTERFAZ
    function renderizarDashboard(data) {
        // Actualizar KPIs
        document.getElementById('kpi-ingresos').textContent = '$' + data.kpis.ingresos.toLocaleString('en-US', {minimumFractionDigits: 2});
        document.getElementById('kpi-paquetes').textContent = data.kpis.paquetes;
        document.getElementById('kpi-tiempo').textContent = data.kpis.tiempo_promedio + ' Días';
        document.getElementById('kpi-retenidos').textContent = data.kpis.retenidos;

        // Renderizar Gráfico de Barras
        const ctxBar = document.getElementById('barChart').getContext('2d');
        if (chartVolumen) chartVolumen.destroy();
        chartVolumen = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: data.graficoBarras.labels,
                datasets: [{
                    label: 'Paquetes Procesados',
                    data: data.graficoBarras.data,
                    backgroundColor: '#0A2540', // primary-corp
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });

        // Renderizar Gráfico de Anillo (Doughnut)
        const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
        if (chartRutas) chartRutas.destroy();
        chartRutas = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: data.graficoRutas.labels,
                datasets: [{
                    data: data.graficoRutas.data,
                    backgroundColor: ['#0A2540', '#FF6B00', '#17a2b8', '#6c757d'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Renderizar Tabla
        const tbody = document.getElementById('tbodyReportes');
        tbody.innerHTML = '';
        data.tabla.forEach(row => {
            // Asignar color según estado
            let badgeColor = 'bg-secondary';
            if(row.estado === 'Entregado') badgeColor = 'bg-success';
            if(row.estado === 'En Tránsito') badgeColor = 'bg-primary';
            if(row.estado === 'Aduanas') badgeColor = 'bg-warning text-dark';

            const tr = `
                <tr>
                    <td class="fw-bold text-dark">${row.tracking}</td>
                    <td>${row.cliente}</td>
                    <td>${row.ruta}</td>
                    <td>${row.fecha}</td>
                    <td><span class="badge ${badgeColor}">${row.estado}</span></td>
                    <td class="text-end fw-bold">$${row.flete.toFixed(2)}</td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', tr);
        });
    }

    // 3. FUNCIONES DE EXPORTACIÓN
    // Exportar a Excel (Usando SheetJS)
    document.getElementById('exportExcel').addEventListener('click', function() {
        const tabla = document.getElementById('tablaReportes');
        const wb = XLSX.utils.table_to_book(tabla, {sheet: "Reporte"});
        XLSX.writeFile(wb, "CookieExpress_Reporte.xlsx");
    });

    // Exportar a PDF (Usando jsPDF + AutoTable)
    document.getElementById('exportPDF').addEventListener('click', function() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        doc.setFontSize(18);
        doc.text("Reporte de Transacciones - CookieExpress", 14, 22);
        
        doc.autoTable({
            html: '#tablaReportes',
            startY: 30,
            theme: 'grid',
            styles: { fontSize: 9 },
            headStyles: { fillColor: [10, 37, 64] } // primary-corp color
        });
        
        doc.save('CookieExpress_Reporte.pdf');
    });

    // 4. LISTENERS DE CONTROLES
    document.getElementById('btnActualizar').addEventListener('click', () => {
        cargarDatosDashboard(document.getElementById('filtroMes').value);
    });

    document.getElementById('filtroMes').addEventListener('change', (e) => {
        cargarDatosDashboard(e.target.value);
    });

    // Inicializar al cargar
    cargarDatosDashboard('actual');
});