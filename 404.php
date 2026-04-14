<?php
$page_title = 'Pagina no encontrada';
$page_description = 'Error 404 de CookieExpress Ltda.';
$page_css = '404';
$body_class = 'public-body';
http_response_code(404);
include 'shared/head.php';
include 'shared/header.php';
?>
<main class="error-page py-5">
    <section class="container py-5">
        <div class="glass-card error-card mx-auto text-center" data-aos="zoom-in">
            <span class="error-badge">404</span>
            <h1 class="mt-4 mb-3">No encontramos la ruta que buscabas.</h1>
            <p class="section-copy mx-auto">La pagina pudo haber cambiado, no existir todavia o estar fuera del flujo actual del prototipo. Te dejamos accesos utiles para volver a la plataforma.</p>
            <div class="d-flex justify-content-center flex-wrap gap-3 mt-4">
                <a class="btn btn-brand" href="index.php">Ir al inicio</a>
                <a class="btn btn-outline-brand" href="paquetes.php">Rastrear paquete</a>
                <a class="btn btn-soft-brand" href="contacto.php">Contactar soporte</a>
            </div>
        </div>
    </section>
</main>
<?php include 'shared/footer.php'; ?>
<?php include 'shared/scripts.php'; ?>
