<?php
$page_title = 'Iniciar sesion';
$page_description = 'Acceso al sistema CookieExpress Ltda.';
$page_css = 'auth';
$page_js = 'auth';
$body_class = 'auth-body';
include 'shared/head.php';
?>
<main class="auth-page">
    <section class="auth-shell">
        <div class="container py-5">
            <div class="row align-items-center g-5 min-vh-100">
                <div class="col-lg-5 d-none d-lg-block" data-aos="fade-right">
                    <div class="auth-copy-panel">
                        <span class="section-label">Acceso seguro</span>
                        <h1 class="section-heading mt-4 text-white">Un mismo sistema, tres experiencias privadas y una base lista para API real.</h1>
                        <p class="text-white-50">Esta pantalla esta preparada para autenticacion por sesion o token, con helpers reutilizables y modal de recuperacion integrado.</p>
                        <div class="auth-role-list">
                            <article><strong>Administrador</strong><span>KPIs, usuarios, parametros y reportes.</span></article>
                            <article><strong>Logistica</strong><span>Recepcion, cambios de estado y control operativo.</span></article>
                            <article><strong>Cliente</strong><span>Casillero, historial y expediente de paquetes.</span></article>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-5 ms-xl-auto" data-aos="fade-left">
                    <div class="auth-card p-4 p-lg-5">
                        <a class="auth-back" href="index.php"><i class="bi bi-arrow-left"></i> Volver al inicio</a>
                        <div class="mb-4">
                            <h2 class="mb-2">Bienvenido a CookieExpress</h2>
                            <p class="text-muted-soft mb-0">Ingresa con tu cuenta para consultar el panel correspondiente.</p>
                        </div>
                        <form id="loginForm" novalidate>
                            <div class="mb-3">
                                <label class="form-label" for="loginEmail">Correo electronico</label>
                                <input class="form-control" id="loginEmail" name="email" type="email" placeholder="nombre@correo.com" required>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label mb-0" for="loginPassword">Contrasena</label>
                                    <button class="btn btn-link p-0 auth-link" type="button" data-bs-toggle="modal" data-bs-target="#modalRecuperarPassword">Recuperar acceso</button>
                                </div>
                                <div class="input-group auth-input-group">
                                    <input class="form-control" id="loginPassword" name="password" type="password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#loginPassword"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="loginRole">Rol demo</label>
                                <select class="form-select" id="loginRole" name="role">
                                    <option value="cliente">Cliente</option>
                                    <option value="logistica">Logistica</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            </div>
                            <div class="d-grid gap-3">
                                <button class="btn btn-brand" type="submit">Ingresar al sistema</button>
                                <a class="btn btn-outline-brand" href="registro.php">Crear cuenta de cliente</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'shared/modals/modal-recuperar-password.php'; ?>
<?php include 'shared/scripts.php'; ?>
