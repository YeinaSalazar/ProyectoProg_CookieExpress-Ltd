<?php
$page_title = 'Mis paquetes';
$page_description = 'Listado de paquetes del cliente en CookieExpress Ltda.';
$page_css = ['dashboard'];
$page_js = ['dashboard'];
$body_class = 'private-body';
$topbar_title = 'Mis paquetes';
$topbar_subtitle = 'Historial consolidado con filtros y accesos al expediente.';
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
            <section class="admin-card"><div class="filters-row"><input class="form-control" placeholder="Buscar tracking"><select class="form-select"><option>Todos los estados</option><option>En transito</option><option>Pendiente de pago</option><option>Entregado</option></select></div></section>
            <section class="table-panel"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Tracking</th><th>Descripcion</th><th>Estado</th><th>Ultima actualizacion</th><th></th></tr></thead><tbody><tr><td>CKE-2026-1931</td><td>Accesorios tecnologicos</td><td><span data-status="en-transito">En transito</span></td><td>Hoy, 09:00</td><td><a href="detalle-paquete.php" class="btn btn-soft-brand btn-sm">Ver detalle</a></td></tr><tr><td>CKE-2026-1884</td><td>Ropa deportiva</td><td><span data-status="pendiente-de-pago">Pendiente de pago</span></td><td>Hoy, 07:15</td><td><a href="detalle-paquete.php" class="btn btn-soft-brand btn-sm">Ver detalle</a></td></tr><tr><td>CKE-2026-1700</td><td>Libros y accesorios</td><td><span data-status="entregado">Entregado</span></td><td>10 abril 2026</td><td><a href="detalle-paquete.php" class="btn btn-soft-brand btn-sm">Ver detalle</a></td></tr></tbody></table></div></section>
        </main>
    </div>
</div>
<?php include 'shared/scripts.php'; ?>
