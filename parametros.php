<?php
$page_title = 'Parametros';
$page_description = 'Gestion de parametros del negocio de CookieExpress Ltda.';
$page_css = ['dashboard', 'parametros'];
$page_js = ['parametros'];
$body_class = 'private-body';
$topbar_title = 'Parametros de negocio';
$topbar_subtitle = 'Tarifas, impuestos, servicios y catalogos operativos.';
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
            <section class="admin-card"><div class="filters-row"><select class="form-select"><option>Todas las categorias</option><option>Tarifa</option><option>Impuesto</option><option>Servicio</option></select><button class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#modalParametro">Nuevo parametro</button></div></section>
            <section class="table-panel"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Parametro</th><th>Categoria</th><th>Valor</th><th>Vigencia</th><th>Acciones</th></tr></thead><tbody><tr><td>Tarifa libra express</td><td>Tarifa</td><td>$7.50</td><td>Activa</td><td><button class="btn btn-soft-brand btn-sm" data-bs-toggle="modal" data-bs-target="#modalParametro">Editar</button></td></tr><tr><td>IVA importacion</td><td>Impuesto</td><td>13%</td><td>Activa</td><td><button class="btn btn-soft-brand btn-sm" data-bs-toggle="modal" data-bs-target="#modalParametro">Editar</button></td></tr><tr><td>Entrega premium AM</td><td>Servicio</td><td>$4.00</td><td>Activa</td><td><button class="btn btn-soft-brand btn-sm" data-bs-toggle="modal" data-bs-target="#modalParametro">Editar</button></td></tr></tbody></table></div></section>
        </main>
    </div>
</div>
<?php include 'shared/modals/modal-parametro.php'; ?>
<?php include 'shared/scripts.php'; ?>
