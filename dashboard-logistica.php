<?php
$page_title = 'Dashboard logistica';
$page_description = 'Panel logistico de CookieExpress Ltda.';
$page_css = ['dashboard'];
$page_js = ['dashboard'];
$body_class = 'private-body';
$topbar_title = 'Centro de operacion logistica';
$topbar_subtitle = 'Recepcion, procesamiento y control de prioridad de paquetes.';
$topbar_badge = 'Logistica';
$topbar_user = 'Daniel Araya';
$topbar_role = 'Supervisor de bodega';
include 'shared/head.php';
?>
<div class="private-layout">
    <?php include 'shared/sidebar-logistica.php'; ?>
    <div class="private-content">
        <?php include 'shared/topbar-private.php'; ?>
        <main class="private-page page-grid">
            <section class="row g-4">
                <div class="col-md-4"><div class="metric-card"><div class="metric-icon"><i class="bi bi-box-arrow-in-down"></i></div><div class="metric-value mt-4">42</div><p class="mb-0 text-muted-soft">Recepciones pendientes</p></div></div>
                <div class="col-md-4"><div class="metric-card"><div class="metric-icon"><i class="bi bi-hourglass-split"></i></div><div class="metric-value mt-4">11</div><p class="mb-0 text-muted-soft">Casos con prioridad alta</p></div></div>
                <div class="col-md-4"><div class="metric-card"><div class="metric-icon"><i class="bi bi-clipboard-check"></i></div><div class="metric-value mt-4">86%</div><p class="mb-0 text-muted-soft">Cumplimiento de SLA hoy</p></div></div>
            </section>
            <section class="row g-4">
                <div class="col-xl-7"><div class="table-panel"><div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 mb-0">Cola operativa</h2><button class="btn btn-brand btn-sm" data-bs-toggle="modal" data-bs-target="#modalCambiarEstado">Actualizar estado</button></div><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Tracking</th><th>Cliente</th><th>Prioridad</th><th>Estado</th><th>Accion</th></tr></thead><tbody><tr><td>CKE-2026-1931</td><td>Ana Solis</td><td>Alta</td><td><span data-status="procesando">Procesando</span></td><td><a href="detalle-paquete.php" class="btn btn-soft-brand btn-sm">Abrir</a></td></tr><tr><td>CKE-2026-1884</td><td>Marco Urena</td><td>Media</td><td><span data-status="pendiente-de-pago">Pendiente de pago</span></td><td><a href="detalle-paquete.php" class="btn btn-soft-brand btn-sm">Abrir</a></td></tr><tr><td>CKE-2026-1820</td><td>Sofia Calvo</td><td>Baja</td><td><span data-status="recibido">Recibido</span></td><td><a href="detalle-paquete.php" class="btn btn-soft-brand btn-sm">Abrir</a></td></tr></tbody></table></div></div></div>
                <div class="col-xl-5"><div class="admin-card h-100"><h2 class="h4 mb-4">Flujo por etapa</h2><div class="chart-shell"><canvas id="logisticsStageChart"></canvas></div></div></div>
            </section>
        </main>
    </div>
</div>
<?php include 'shared/modals/modal-cambiar-estado.php'; ?>
<?php include 'shared/scripts.php'; ?>
