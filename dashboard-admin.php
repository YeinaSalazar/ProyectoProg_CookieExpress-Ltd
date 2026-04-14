<?php
$page_title = 'Dashboard administrativo';
$page_description = 'Panel del administrador de CookieExpress Ltda.';
$page_css = ['dashboard'];
$page_js = ['dashboard'];
$body_class = 'private-body';
$topbar_title = 'Dashboard administrativo';
$topbar_subtitle = 'KPIs, incidencias y trazabilidad global de la operacion.';
$topbar_badge = 'Administrador';
$topbar_user = 'Laura Mendez';
$topbar_role = 'Administracion general';
$alert_items = [
    ['warning', '3 usuarios logisticos tienen permisos pendientes de revision.', 'Hace 12 minutos'],
    ['info', 'El volumen de paquetes crecio 8.4% frente a la semana anterior.', 'Actualizado hoy'],
];
include 'shared/head.php';
?>
<div class="private-layout">
    <?php include 'shared/sidebar-admin.php'; ?>
    <div class="private-content">
        <?php include 'shared/topbar-private.php'; ?>
        <main class="private-page page-grid">
            <section class="row g-4">
                <div class="col-md-6 col-xl-3"><div class="metric-card"><div class="metric-icon"><i class="bi bi-boxes"></i></div><div class="metric-value mt-4">128</div><p class="mb-0 text-muted-soft">Paquetes activos en la red.</p></div></div>
                <div class="col-md-6 col-xl-3"><div class="metric-card"><div class="metric-icon"><i class="bi bi-people"></i></div><div class="metric-value mt-4">1,284</div><p class="mb-0 text-muted-soft">Clientes con actividad en el mes.</p></div></div>
                <div class="col-md-6 col-xl-3"><div class="metric-card"><div class="metric-icon"><i class="bi bi-currency-dollar"></i></div><div class="metric-value mt-4">$42.8k</div><p class="mb-0 text-muted-soft">Facturacion estimada del periodo.</p></div></div>
                <div class="col-md-6 col-xl-3"><div class="metric-card"><div class="metric-icon"><i class="bi bi-exclamation-diamond"></i></div><div class="metric-value mt-4">17</div><p class="mb-0 text-muted-soft">Incidencias que requieren seguimiento.</p></div></div>
            </section>
            <section class="row g-4">
                <div class="col-xl-8">
                    <div class="admin-card h-100">
                        <div class="d-flex justify-content-between align-items-center mb-4"><h2 class="h4 mb-0">Rendimiento operativo</h2><span class="text-muted-soft small">Ultimos 6 meses</span></div>
                        <div class="chart-shell"><canvas id="adminKpiChart"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="admin-card h-100">
                        <h2 class="h4 mb-4">Alertas y actividad</h2>
                        <?php include 'shared/alerts.php'; ?>
                    </div>
                </div>
            </section>
            <section class="row g-4">
                <div class="col-xl-7">
                    <div class="table-panel">
                        <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 mb-0">Actividad reciente</h2><a href="reportes.php" class="btn btn-soft-brand btn-sm">Ver reportes</a></div>
                        <div class="table-responsive"><table class="table align-middle"><thead><tr><th>Evento</th><th>Usuario</th><th>Hora</th><th>Estado</th></tr></thead><tbody><tr><td>Cambio de estado a En transito</td><td>Equipo Miami</td><td>09:20</td><td><span data-status="en-transito">En transito</span></td></tr><tr><td>Nuevo cliente registrado</td><td>Portal web</td><td>08:55</td><td><span data-status="procesando">Validado</span></td></tr><tr><td>Factura cargada</td><td>Ana Solis</td><td>08:14</td><td><span data-status="recibido">Recibido</span></td></tr></tbody></table></div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="admin-card h-100">
                        <h2 class="h4 mb-3">Accesos rapidos</h2>
                        <div class="d-grid gap-3">
                            <a class="btn btn-outline-brand text-start" href="usuarios.php">Gestionar usuarios y roles</a>
                            <a class="btn btn-outline-brand text-start" href="parametros.php">Actualizar tarifas y servicios</a>
                            <a class="btn btn-outline-brand text-start" href="detalle-paquete.php">Revisar expediente de paquete</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
<?php include 'shared/scripts.php'; ?>
