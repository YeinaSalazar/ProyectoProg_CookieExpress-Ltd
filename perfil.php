<?php
$page_title = 'Perfil';
$page_description = 'Perfil del usuario autenticado en CookieExpress Ltda.';
$page_css = ['dashboard', 'perfil'];
$page_js = ['perfil'];
$body_class = 'private-body';
$topbar_title = 'Mi perfil';
$topbar_subtitle = 'Actualiza tus datos personales y de contacto.';
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
                <div class="col-xl-8"><div class="admin-card"><h2 class="h4 mb-4">Informacion personal</h2><form id="profileForm" class="row g-3"><div class="col-md-6"><label class="form-label">Nombre completo</label><input class="form-control" value="Ana Solis"></div><div class="col-md-6"><label class="form-label">Correo</label><input class="form-control" value="ana.solis@email.com"></div><div class="col-md-6"><label class="form-label">Telefono</label><input class="form-control" value="+506 8822-1144"></div><div class="col-md-6"><label class="form-label">Direccion</label><input class="form-control" value="Curridabat, San Jose"></div><div class="col-12"><label class="form-label">Observaciones de entrega</label><textarea class="form-control">Favor llamar antes de entregar.</textarea></div><div class="col-12 d-flex justify-content-end"><button class="btn btn-brand" type="submit">Guardar cambios</button></div></form></div></div>
                <div class="col-xl-4"><div class="admin-card profile-aside"><h2 class="h4 mb-3">Datos de casillero</h2><ul class="list-unstyled mb-0"><li><span>Codigo</span><strong>CKE-8492</strong></li><li><span>Hub internacional</span><strong>Miami Hub 07</strong></li><li><span>Tipo de cuenta</span><strong>Cliente regular</strong></li><li><span>Ultima actualizacion</span><strong>14 abril 2026</strong></li></ul></div></div>
            </section>
        </main>
    </div>
</div>
<?php include 'shared/scripts.php'; ?>
