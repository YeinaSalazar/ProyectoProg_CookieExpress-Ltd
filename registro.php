<?php
$page_title = "Crear Casillero";
$page_css = "auth";
$page_js = "auth";
include 'shared/head.php';
?>

<main class="auth-wrapper d-flex align-items-center justify-content-center min-vh-100 py-5">
    <div class="auth-background"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-7" data-aos="zoom-in" data-aos-duration="800">
                <div class="card auth-card border-0 shadow-lg p-4 p-md-5 rounded-4 position-relative z-index-2 bg-white">
                    
                    <a href="index.php" class="text-decoration-none text-muted small mb-4 d-inline-block back-link">
                        <i class="fa-solid fa-arrow-left me-2"></i>Volver al inicio
                    </a>

                    <div class="text-center mb-4">
                        <h2 class="font-montserrat fw-bold color-primary-corp">
                            Abre tu <span class="text-accent-corp">Casillero</span>
                        </h2>
                        <p class="text-muted small">Comienza a importar hoy mismo. Es rápido y gratuito.</p>
                    </div>

                    <form id="registroForm" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6 mb-2">
                                <label for="nombre" class="form-label small fw-bold">Nombre Completo</label>
                                <input type="text" class="form-control bg-light" id="nombre" name="nombre" required>
                                <div class="invalid-feedback">Requerido.</div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="telefono" class="form-label small fw-bold">Teléfono Celular</label>
                                <input type="tel" class="form-control bg-light" id="telefono" name="telefono" required>
                                <div class="invalid-feedback">Requerido.</div>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="emailReg" class="form-label small fw-bold">Correo Electrónico</label>
                                <input type="email" class="form-control bg-light" id="emailReg" name="email" required>
                                <div class="invalid-feedback">Ingresa un correo válido.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="passwordReg" class="form-label small fw-bold">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control border-end-0 bg-light" id="passwordReg" name="password" minlength="8" required>
                                    <button class="btn btn-light border border-start-0 text-muted toggle-password" type="button">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                </div>
                                <div class="form-text small">Mínimo 8 caracteres.</div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="passwordConfirm" class="form-label small fw-bold">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control border-end-0 bg-light" id="passwordConfirm" required>
                                    <button class="btn btn-light border border-start-0 text-muted toggle-password" type="button">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback" id="feedbackConfirm">Las contraseñas no coinciden.</div>
                            </div>
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="terminos" required>
                            <label class="form-check-label small text-muted" for="terminos">
                                Acepto los <a href="#" class="text-accent-corp">Términos y Condiciones</a> y la Política de Privacidad.
                            </label>
                        </div>

                        <button type="submit" class="btn btn-accent-corp w-100 py-3 rounded-3 text-white fw-bold d-flex justify-content-center align-items-center">
                            <span id="btnRegText">Crear Casillero Gratis</span>
                            <div id="btnRegSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"></div>
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">¿Ya tienes una cuenta? <a href="login.php" class="color-primary-corp fw-bold text-decoration-none">Inicia Sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'shared/scripts.php'; ?>