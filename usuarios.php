<?php
$page_title = 'Usuarios';
$page_description = 'Gestion visual de usuarios de CookieExpress Ltda.';
$page_css = ['dashboard', 'usuarios'];
$page_js = ['usuarios'];
$body_class = 'private-body';
$topbar_title = 'Gestion de usuarios';
$topbar_subtitle = 'Vista CRUD lista para conectarse con API RESTful.';
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
            <section class="admin-card"><div class="filters-row"><input class="form-control" id="userSearch" placeholder="Buscar por nombre o correo"><select class="form-select"><option>Todos los roles</option><option>Administrador</option><option>Logistica</option><option>Cliente</option></select><button class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#modalUsuario">Nuevo usuario</button></div></section>
            <section class="table-panel"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Usuario</th><th>Rol</th><th>Estado</th><th>Ultimo acceso</th><th>Acciones</th></tr></thead><tbody><tr><td><strong>Laura Mendez</strong><div class="small text-muted-soft">laura@cookieexpress.com</div></td><td>Administrador</td><td><span data-status="procesando">Activo</span></td><td>Hoy, 08:10</td><td><button class="btn btn-soft-brand btn-sm" data-bs-toggle="modal" data-bs-target="#modalUsuario">Editar</button></td></tr><tr><td><strong>Daniel Araya</strong><div class="small text-muted-soft">daniel@cookieexpress.com</div></td><td>Logistica</td><td><span data-status="recibido">Activo</span></td><td>Hoy, 07:42</td><td><button class="btn btn-soft-brand btn-sm" data-bs-toggle="modal" data-bs-target="#modalUsuario">Editar</button></td></tr><tr><td><strong>Ana Solis</strong><div class="small text-muted-soft">ana.solis@email.com</div></td><td>Cliente</td><td><span data-status="en-transito">Verificado</span></td><td>Ayer, 06:28</td><td><button class="btn btn-soft-brand btn-sm" data-bs-toggle="modal" data-bs-target="#modalUsuario">Editar</button></td></tr></tbody></table></div></section>
        </main>
    </div>
</div>
<?php include 'shared/modals/modal-usuario.php'; ?>
<?php include 'shared/scripts.php'; ?>
