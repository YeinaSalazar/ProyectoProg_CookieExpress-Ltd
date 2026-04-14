<?php
$page_title = 'Registro';
$page_description = 'Registro de clientes en CookieExpress Ltda.';
$page_css = 'auth';
$page_js = 'auth';
$body_class = 'auth-body';
include 'shared/head.php';
?>
<main class="auth-page">
    <section class="auth-shell auth-shell-register">
        <div class="container py-5">
            <div class="row align-items-center g-5 min-vh-100">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="auth-copy-panel compact">
                        <span class="section-label">Registro de clientes</span>
                        <h1 class="section-heading mt-4 text-white">Abre tu casillero y deja lista tu cuenta para futuras compras internacionales.</h1>
                        <p class="text-white-50">La vista contempla datos personales, validacion visual y estructura pensada para integrarse despues con AJAX y sesiones reales.</p>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="auth-card p-4 p-lg-5">
                        <a class="auth-back" href="index.php"><i class="bi bi-arrow-left"></i> Volver al inicio</a>
                        <div class="mb-4">
                            <h2 class="mb-2">Crear cuenta de cliente</h2>
                            <p class="text-muted-soft mb-0">Completa el formulario y recibe tu codigo de casillero en la simulacion front end.</p>
                        </div>
                        <form id="registroForm" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="regNombre">Nombre completo</label>
                                    <input class="form-control" id="regNombre" name="nombre" type="text" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="regCedula">Documento</label>
                                    <input class="form-control" id="regCedula" name="cedula" type="text" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="regTelefono">Telefono</label>
                                    <input class="form-control" id="regTelefono" name="telefono" type="tel" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="regPais">Pais</label>
                                    <select class="form-select" id="regPais" name="pais" required>
                                        <option value="">Seleccione</option>
                                        <option>Costa Rica</option>
                                        <option>Panama</option>
                                        <option>Nicaragua</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="regEmail">Correo electronico</label>
                                    <input class="form-control" id="regEmail" name="email" type="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="regPassword">Contrasena</label>
                                    <div class="input-group auth-input-group">
                                        <input class="form-control" id="regPassword" name="password" type="password" required>
                                        <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#regPassword"><i class="bi bi-eye"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="regPasswordConfirm">Confirmar contrasena</label>
                                    <div class="input-group auth-input-group">
                                        <input class="form-control" id="regPasswordConfirm" name="password_confirm" type="password" required>
                                        <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#regPasswordConfirm"><i class="bi bi-eye"></i></button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" id="regTerms" type="checkbox" required>
                                        <label class="form-check-label text-muted-soft" for="regTerms">Acepto terminos, politica de privacidad y uso academico de la plataforma.</label>
                                    </div>
                                </div>
                                <div class="col-12 d-grid d-md-flex gap-3 mt-3">
                                    <button class="btn btn-brand" type="submit">Crear casillero</button>
                                    <a class="btn btn-outline-brand" href="login.php">Ya tengo cuenta</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'shared/scripts.php'; ?>
