<?php
// Configuración de la página
$page_title = "Inicio";
$page_css = "home";
$page_js = "home";

// Incluir cabeceras
include 'shared/head.php';
include 'shared/header.php';
?>

<main>
    <section class="hero-section d-flex align-items-center position-relative">
        <div class="overlay"></div>
        <div class="container position-relative text-white text-center" style="z-index: 2;">
            <h1 class="display-3 fw-bold font-montserrat mb-4" data-aos="fade-down" data-aos-duration="1000">
                Tu mundo, entregado en <span class="text-accent-corp">tus manos</span>
            </h1>
            <p class="lead mb-5 fw-light" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                Comprá en cualquier parte del mundo. Nosotros nos encargamos de la logística, aduanas y de llevarlo hasta la puerta de tu casa de forma rápida y segura.
            </p>
            <div data-aos="zoom-in" data-aos-delay="400">
                <a href="registro.php" class="btn btn-accent-corp btn-lg me-3 px-5 py-3 rounded-pill">Abre tu Casillero Gratis</a>
                <a href="paquetes.php" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill">Rastrear un Paquete</a>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold font-montserrat color-primary-corp">Nuestros Servicios</h2>
                <div class="divider-corp mx-auto my-3"></div>
                <p class="text-muted">Soluciones logísticas integrales diseñadas para tu comodidad.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow-sm service-card p-4 text-center">
                        <div class="icon-wrapper bg-light rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fa-solid fa-plane-departure fs-2 text-accent-corp"></i>
                        </div>
                        <h4 class="font-montserrat fw-bold mb-3">Casillero Internacional</h4>
                        <p class="text-muted small">Dirección física en Miami para que realices tus compras en USA, China o Europa sin complicaciones.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 shadow-sm service-card p-4 text-center">
                        <div class="icon-wrapper bg-light rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fa-solid fa-shield-halved fs-2 text-accent-corp"></i>
                        </div>
                        <h4 class="font-montserrat fw-bold mb-3">Gestión Aduanal</h4>
                        <p class="text-muted small">Nos encargamos de todos los trámites e impuestos. Tarifas transparentes sin sorpresas ocultas.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 border-0 shadow-sm service-card p-4 text-center">
                        <div class="icon-wrapper bg-light rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fa-solid fa-truck-fast fs-2 text-accent-corp"></i>
                        </div>
                        <h4 class="font-montserrat fw-bold mb-3">Entrega Última Milla</h4>
                        <p class="text-muted small">Flota propia para asegurar que tu paquete llegue intacto hasta tu hogar u oficina.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <h3 class="fw-bold font-montserrat mb-4">Encuéntranos</h3>
                    <p class="text-muted mb-4">Nuestra central logística está ubicada estratégicamente para procesar tus envíos con la mayor agilidad.</p>
                    <div id="locationMap" class="rounded shadow-sm" style="height: 400px; width: 100%; z-index: 1;"></div>
                </div>
                
                <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
                    <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4">
                        <h3 class="fw-bold font-montserrat mb-4 text-center">¿Tienes dudas?</h3>
                        <form id="contactForm" novalidate>
                            <div class="mb-3">
                                <label for="nombre" class="form-label small fw-bold">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                <div class="invalid-feedback">Por favor, ingresa tu nombre.</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label small fw-bold">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">Ingresa un correo electrónico válido.</div>
                            </div>
                            <div class="mb-4">
                                <label for="mensaje" class="form-label small fw-bold">Mensaje</label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                                <div class="invalid-feedback">El mensaje no puede estar vacío.</div>
                            </div>
                            <button type="submit" class="btn btn-primary-corp w-100 py-3 rounded-3 text-white fw-bold d-flex justify-content-center align-items-center">
                                <span id="btnText">Enviar Mensaje</span>
                                <div id="btnSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<?php 
// Incluir pie de página y scripts
include 'shared/footer.php';
include 'shared/scripts.php'; 
?>