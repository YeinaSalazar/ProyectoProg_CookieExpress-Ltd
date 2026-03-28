<?php
// Configuración de la página
$page_title = "Reportes y Estadísticas";
$page_css = "reportes";
$page_js = "reportes";

// Incluir cabeceras
include 'shared/head.php';
include 'shared/header.php';
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>

<main class="admin-dashboard bg-light py-5">
    <div class="container-fluid px-4 px-lg-5">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4" data-aos="fade-down">
            <div>
                <span class="badge bg-dark mb-2"><i class="fa-solid fa-shield-halved me-1"></i> Panel Administrativo</span>
                <h2 class="font-montserrat fw-bold color-primary-corp mb-0">Reportes Operativos</h2>
            </div>
            <div class="mt-3 mt-md-0 d-flex gap-2">
                <select class="form-select w-auto bg-white shadow-sm border-0" id="filtroMes">
                    <option value="actual" selected>Mes Actual</option>
                    <option value="anterior">Mes Anterior</option>
                    <option value="trimestre">Último Trimestre</option>
                </select>
                <button class="btn btn-primary-corp shadow-sm" id="btnActualizar">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3" data-aos="fade-up" data-aos-delay="50">
                <div class="card kpi-card border-0 shadow-sm p-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted small mb-1 fw-bold">Ingresos Totales</p>
                            <h3 class="fw-bold text-success mb-0" id="kpi-ingresos">$0.00</h3>
                        </div>
                        <div class="kpi-icon bg-success bg-opacity-10 text-success">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                    </div>
                    <div class="mt-3 small">
                        <span class="text-success fw-bold"><i class="fa-solid fa-arrow-trend-up me-1"></i>+12.5%</span> vs mes anterior
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card kpi-card border-0 shadow-sm p-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted small mb-1 fw-bold">Paquetes Procesados</p>
                            <h3 class="fw-bold color-primary-corp mb-0" id="kpi-paquetes">0</h3>
                        </div>
                        <div class="kpi-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fa-solid fa-boxes-stacked"></i>
                        </div>
                    </div>
                    <div class="mt-3 small">
                        <span class="text-success fw-bold"><i class="fa-solid fa-arrow-trend-up me-1"></i>+5.2%</span> vs mes anterior
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3" data-aos="fade-up" data-aos-delay="150">
                <div class="card kpi-card border-0 shadow-sm p-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted small mb-1 fw-bold">Tiempo Promedio</p>
                            <h3 class="fw-bold text-info mb-0" id="kpi-tiempo">0 Días</h3>
                        </div>
                        <div class="kpi-icon bg-info bg-opacity-10 text-info">
                            <i class="fa-solid fa-stopwatch"></i>
                        </div>
                    </div>
                    <div class="mt-3 small">
                        <span class="text-muted">Desde bodega hasta entrega</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card kpi-card border-0 shadow-sm p-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted small mb-1 fw-bold">Envíos Retenidos</p>
                            <h3 class="fw-bold text-danger mb-0" id="kpi-retenidos">0</h3>
                        </div>
                        <div class="kpi-icon bg-danger bg-opacity-10 text-danger">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                    </div>
                    <div class="mt-3 small">
                        <span class="text-danger fw-bold">Requieren acción aduanal</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="250">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                        <h6 class="font-montserrat fw-bold">Volumen de Importaciones (Últimos 6 meses)</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                        <h6 class="font-montserrat fw-bold">Distribución por Ruta</h6>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <canvas id="doughnutChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-delay="350">
            <div class="card-header bg-white border-bottom p-3 d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <h6 class="font-montserrat fw-bold mb-3 mb-md-0">Detalle de Transacciones Recientes</h6>
                <div class="d-flex gap-2">
                    <button id="exportExcel" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-file-excel me-1"></i> Excel</button>
                    <button id="exportPDF" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-file-pdf me-1"></i> PDF</button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="tablaReportes">
                        <thead class="table-light">
                            <tr>
                                <th>Tracking</th>
                                <th>Cliente</th>
                                <th>Ruta/Zona</th>
                                <th>Fecha Ingreso</th>
                                <th>Estado</th>
                                <th class="text-end">Flete ($)</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyReportes">
                            <tr><td colspan="6" class="text-center py-4"><div class="spinner-border text-accent-corp" role="status"></div></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>

<?php 
include 'shared/footer.php';
include 'shared/scripts.php'; 
?>