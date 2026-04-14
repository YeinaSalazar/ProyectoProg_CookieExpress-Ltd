<?php
$page_title = 'Reportes';
$page_description = 'Reportes administrativos de CookieExpress Ltda.';
$page_css = ['dashboard', 'reportes'];
$page_js = ['dashboard', 'reportes'];
$body_class = 'private-body';
$topbar_title = 'Reportes y estadisticas';
$topbar_subtitle = 'KPIs, comparativos y resumen ejecutivo para administracion.';
$topbar_badge = 'Administrador';
$topbar_user = 'Laura Mendez';
$topbar_role = 'Administracion general';
include 'shared/head.php';
?>
<div class="private-layout">
    <?php include 'shared/sidebar-admin.php'; ?>
    <div class="private-content">
        <?php include 'shared/topbar-private.php'; ?>
        <main class="private-page page-grid">
            <section class="row g-4">
                <div class="col-md-6 col-xl-3"><div class="metric-card"><div class="metric-icon"><i class="bi bi-cash-stack"></i></div><div class="metric-value mt-4">$42.8k</div><p class="mb-0 text-muted-soft">Ingresos del periodo.</p></div></div>
                <div class="col-md-6 col-xl-3"><div class="metric-card"><div class="metric-icon"><i class="bi bi-box"></i></div><div class="metric-value mt-4">684</div><p class="mb-0 text-muted-soft">Paquetes procesados.</p></div></div>
                <div class="col-md-6 col-xl-3"><div class="metric-card"><div class="metric-icon"><i class="bi bi-stopwatch"></i></div><div class="metric-value mt-4">2.8 d</div><p class="mb-0 text-muted-soft">Tiempo promedio de entrega.</p></div></div>
                <div class="col-md-6 col-xl-3"><div class="metric-card"><div class="metric-icon"><i class="bi bi-flag"></i></div><div class="metric-value mt-4">14</div><p class="mb-0 text-muted-soft">Casos retenidos.</p></div></div>
            </section>
            <section class="row g-4">
                <div class="col-xl-8"><div class="admin-card h-100"><h2 class="h4 mb-4">Volumen y facturacion</h2><div class="chart-shell"><canvas id="reportsChart"></canvas></div></div></div>
                <div class="col-xl-4"><div class="admin-card h-100"><h2 class="h4 mb-4">Distribucion por ruta</h2><div class="chart-shell"><canvas id="reportsDonutChart"></canvas></div></div></div>
            </section>
            <section class="table-panel"><div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 mb-0">Detalle de transacciones</h2><div class="d-flex gap-2"><button class="btn btn-soft-brand btn-sm">Exportar Excel</button><button class="btn btn-soft-brand btn-sm">Exportar PDF</button></div></div><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Tracking</th><th>Cliente</th><th>Ruta</th><th>Fecha</th><th>Estado</th><th class="text-end">Flete</th></tr></thead><tbody><tr><td>CKE-2026-1931</td><td>Ana Solis</td><td>Miami > San Jose</td><td>14 abril 2026</td><td><span data-status="en-transito">En transito</span></td><td class="text-end">$18.50</td></tr><tr><td>CKE-2026-1884</td><td>Marco Urena</td><td>Miami > Heredia</td><td>14 abril 2026</td><td><span data-status="pendiente-de-pago">Pendiente de pago</span></td><td class="text-end">$9.75</td></tr><tr><td>CKE-2026-1700</td><td>Sofia Calvo</td><td>Madrid > Cartago</td><td>10 abril 2026</td><td><span data-status="entregado">Entregado</span></td><td class="text-end">$22.30</td></tr></tbody></table></div></section>
        </main>
    </div>
</div>
<?php include 'shared/scripts.php'; ?>
