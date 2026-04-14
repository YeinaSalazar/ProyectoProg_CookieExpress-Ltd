<?php
$page_title = 'Dashboard cliente';
$page_description = 'Panel del cliente de CookieExpress Ltda.';
$page_css = ['dashboard'];
$page_js = ['dashboard'];
$body_class = 'private-body';
$topbar_title = 'Mi casillero y envios';
$topbar_subtitle = 'Resumen rapido de compras, estados y proximas acciones.';
$topbar_badge = 'Cliente';
$topbar_user = 'Ana Solis';
$topbar_role = 'Cliente activo';
include 'shared/head.php';
?>
<div class="private-layout">
    <?php include 'shared/sidebar-cliente.php'; ?>
    <div class="private-content">
        <?php include 'shared/topbar-private.php'; ?>
        <main class="private-page page-grid">
            <section class="row g-4">
                <div class="col-md-4"><div class="metric-card"><div class="metric-icon"><i class="bi bi-upc-scan"></i></div><div class="metric-value mt-4">CKE-8492</div><p class="mb-0 text-muted-soft">Codigo de casillero asignado.</p></div></div>
                <div class="col-md-4"><div class="metric-card"><div class="metric-icon"><i class="bi bi-truck"></i></div><div class="metric-value mt-4">3</div><p class="mb-0 text-muted-soft">Paquetes activos en proceso.</p></div></div>
                <div class="col-md-4"><div class="metric-card"><div class="metric-icon"><i class="bi bi-wallet2"></i></div><div class="metric-value mt-4">$72.45</div><p class="mb-0 text-muted-soft">Cobros pendientes por cancelar.</p></div></div>
            </section>
            <section class="row g-4">
                <div class="col-xl-7"><div class="table-panel"><div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 mb-0">Estados recientes</h2><a href="mis-paquetes.php" class="btn btn-soft-brand btn-sm">Ver todos</a></div><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Tracking</th><th>Ultimo evento</th><th>Estado</th><th></th></tr></thead><tbody><tr><td>CKE-2026-1931</td><td>Ingreso a centro local</td><td><span data-status="en-transito">En transito</span></td><td><a href="detalle-paquete.php" class="btn btn-soft-brand btn-sm">Detalle</a></td></tr><tr><td>CKE-2026-1884</td><td>Pago requerido</td><td><span data-status="pendiente-de-pago">Pendiente de pago</span></td><td><a href="detalle-paquete.php" class="btn btn-soft-brand btn-sm">Detalle</a></td></tr></tbody></table></div></div></div>
                <div class="col-xl-5"><div class="admin-card h-100"><h2 class="h4 mb-3">Proximas acciones</h2><div class="d-grid gap-3"><button class="btn btn-outline-brand text-start" data-bs-toggle="modal" data-bs-target="#modalSubirFactura">Subir factura</button><a class="btn btn-outline-brand text-start" href="perfil.php">Actualizar perfil</a><a class="btn btn-outline-brand text-start" href="mapa.php">Ver sucursales y retiros</a></div></div></div>
            </section>
        </main>
    </div>
</div>
<?php include 'shared/modals/modal-subir-factura.php'; ?>
<?php include 'shared/scripts.php'; ?>
