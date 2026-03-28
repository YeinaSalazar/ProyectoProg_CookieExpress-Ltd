<?php
// Configuración de la página
$page_title = "Página no encontrada";
$page_css = "404"; // CSS Específico

// Para evitar indexación de páginas de error en Google
header("HTTP/1.0 404 Not Found");

include 'shared/head.php';
include 'shared/header.php';
?>

<main class="error-page d-flex align-items-center justify-content-center py-5 bg-light">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6" data-aos="zoom-in" data-aos-duration="800">
                
                <div class="error-icon-wrapper mb-4 position-relative d-inline-block">
                    <i class="fa-solid fa-box-open text-muted" style="font-size: 8rem;"></i>
                    <i class="fa-solid fa-magnifying-glass text-accent-corp position-absolute search-animation"></i>
                </div>

                <h1 class="display-1 fw-bold font-montserrat color-primary-corp mb-0">404</h1>
                <h2 class="h3 fw-bold font-montserrat mb-3">¡Ups! Paquete extraviado</h2>
                
                <p class="text-muted mb-5 lead">
                    Parece que la página que estás buscando se perdió en el tránsito, cambió de dirección o nunca existió. 
                </p>

                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <a href="index.php" class="btn btn-primary-corp btn-lg px-4 rounded-pill d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-house me-2"></i> Volver al Inicio
                    </a>
                    <a href="paquetes.php" class="btn btn-outline-dark btn-lg px-4 rounded-pill d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-box-check me-2"></i> Rastrear mi envío
                    </a>
                </div>

                <div class="mt-5 text-muted small">
                    ¿Crees que esto es un error del sistema? <a href="contacto.php" class="text-accent-corp text-decoration-none fw-bold">Contáctanos</a>
                </div>

            </div>
        </div>
    </div>
</main>

<?php 
include 'shared/footer.php';
include 'shared/scripts.php'; 
?>