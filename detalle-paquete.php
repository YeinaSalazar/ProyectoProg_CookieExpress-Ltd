<?php
$page_title = 'Detalle de paquete';
$page_description = 'Expediente del paquete en CookieExpress Ltda.';
$page_css = ['dashboard', 'detalle-paquete'];
$page_js = ['detalle-paquete'];
$body_class = 'private-body';
$topbar_title = 'Expediente del paquete';
$topbar_subtitle = 'Timeline, evidencias, cargos y control operativo del envio.';
$topbar_badge = 'Operacion';
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
                <div class="col-xl-4"><div class="admin-card package-summary"><span data-status="en-transito">En transito</span><h2 class="mt-3">CKE-2026-1931</h2><ul class="list-unstyled mb-0"><li><span>Cliente</span><strong>Ana Solis</strong></li><li><span>Origen</span><strong>Miami Hub 07</strong></li><li><span>Destino</span><strong>Curridabat, San Jose</strong></li><li><span>Valor declarado</span><strong>$248.90</strong></li><li><span>Cobro pendiente</span><strong>$24.15</strong></li></ul></div></div>
                <div class="col-xl-8"><div class="admin-card h-100"><div class="d-flex justify-content-between align-items-center mb-4"><h2 class="h4 mb-0">Timeline del expediente</h2><div class="d-flex gap-2"><button class="btn btn-soft-brand btn-sm" data-bs-toggle="modal" data-bs-target="#modalVerImagen">Ver evidencia</button><button class="btn btn-brand btn-sm" data-bs-toggle="modal" data-bs-target="#modalCambiarEstado">Cambiar estado</button></div></div><div class="timeline"><div class="timeline-item"><strong>Recepcion confirmada en bodega</strong><div class="small text-muted-soft">12 abril 2026, 08:45 a.m.</div></div><div class="timeline-item"><strong>Factura comercial validada</strong><div class="small text-muted-soft">12 abril 2026, 11:30 a.m.</div></div><div class="timeline-item"><strong>Salida a vuelo consolidado</strong><div class="small text-muted-soft">13 abril 2026, 05:20 a.m.</div></div><div class="timeline-item"><strong>Ingreso a centro logistico local</strong><div class="small text-muted-soft">14 abril 2026, 09:00 a.m.</div></div></div></div></div>
            </section>
            <section class="row g-4">
                <div class="col-xl-6"><div class="admin-card h-100"><h2 class="h4 mb-3">Cobros y conceptos</h2><div class="table-responsive"><table class="table align-middle"><tbody><tr><td>Flete internacional</td><td class="text-end">$18.50</td></tr><tr><td>Impuesto aduanal</td><td class="text-end">$3.95</td></tr><tr><td>Gestion administrativa</td><td class="text-end">$1.70</td></tr><tr><td><strong>Total</strong></td><td class="text-end"><strong>$24.15</strong></td></tr></tbody></table></div></div></div>
                <div class="col-xl-6"><div class="admin-card h-100"><h2 class="h4 mb-3">Observaciones internas</h2><textarea class="form-control">Caja en buen estado. Cliente solicito llamada previa antes de entrega.</textarea><div class="mt-3 d-flex justify-content-end"><button class="btn btn-brand">Guardar nota</button></div></div></div>
            </section>
        </main>
    </div>
</div>
<?php include 'shared/modals/modal-cambiar-estado.php'; ?>
<?php include 'shared/modals/modal-ver-imagen.php'; ?>
<?php include 'shared/scripts.php'; ?>
