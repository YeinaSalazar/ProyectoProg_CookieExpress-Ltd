<?php
// Configuración de la página
$page_title = "Iniciar Sesión";
$page_css = "auth";
$page_js = "auth";

// Incluir cabecera HTML (No incluimos el header.php completo para una experiencia inmersiva, pero sí un botón de regreso)
include 'shared/head.php';
?>

<main class="auth-wrapper d-flex align-items-center justify-content-center min-vh-100">
    <div class="auth-background"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5" data-aos="zoom-in" data-aos-duration="800">
                <div class="card auth-card border-0 shadow-lg p-4 p-md-5 rounded-4 position-relative z-index-2 bg-white">
                    
                    <a href="index.php" class="text-decoration-none text-muted small mb-4 d-inline-block back-link">
                        <i class="fa-solid fa-arrow-left me-2"></i>Volver al inicio
                    </a>

                    <div class="text-center mb-4">
                        <h2 class="font-montserrat fw-bold color-primary-corp">
                            <i class="fa-solid fa-box-fast text-accent-corp me-2"></i>Bienvenido
                        </h2>
                        <p class="text-muted small">Ingresa a tu casillero de CookieExpress</p>
                    </div>

                    <form id="loginForm" novalidate>
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-envelope text-muted"></i></span>
                                <input type="email" class="form-control border-start-0 ps-0 bg-light" id="email" name="email" placeholder="tu@correo.com" required>
                                <div class="invalid-feedback">Ingresa un correo válido.</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label for="password" class="form-label small fw-bold mb-0">Contraseña</label>
                                <a href="#" class="small text-accent-corp text-decoration-none">¿Olvidaste tu contraseña?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-lock text-muted"></i></span>
                                <input type="password" class="form-control border-start-0 border-end-0 ps-0 bg-light" id="password" name="password" placeholder="••••••••" required>
                                <button class="btn btn-light border border-start-0 text-muted toggle-password" type="button">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <div class="invalid-feedback">La contraseña es obligatoria.</div>
                            </div>
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                            <label class="form-check-label small text-muted" for="rememberMe">Recordar mis datos</label>
                        </div>

                        <button type="submit" class="btn btn-primary-corp w-100 py-3 rounded-3 text-white fw-bold d-flex justify-content-center align-items-center">
                            <span id="btnLoginText">Ingresar al Casillero</span>
                            <div id="btnLoginSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"></div>
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">¿Aún no tienes casillero? <a href="registro.php" class="text-accent-corp fw-bold text-decoration-none">Regístrate gratis</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'shared/scripts.php'; ?>