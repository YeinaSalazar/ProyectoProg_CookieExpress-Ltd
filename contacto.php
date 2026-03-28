<?php
// Configuración de la página
$page_title = "Atención al Cliente";
$page_css = "contacto";
$page_js = "contacto";

// Incluir cabeceras
include 'shared/head.php';
include 'shared/header.php';
?>

<main class="contacto-wrapper bg-light py-5">
    <div class="container mb-5 text-center" data-aos="fade-down">
        <h1 class="display-5 fw-bold font-montserrat color-primary-corp mb-3">¿Cómo podemos ayudarte?</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Nuestro equipo de soporte logístico está listo para resolver tus dudas sobre importaciones, rastreos y aduanas.
        </p>
    </div>

    <div class="container">
        <div class="row g-5">
            
            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                
                <div class="d-flex flex-column gap-3 mb-5">
                    <div class="card border-0 shadow-sm contact-info-card p-3 d-flex flex-row align-items-center">
                        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle me-3">
                            <i class="fa-solid fa-location-dot fs-4"></i>
                        </div>
                        <div>
                            <h6 class="font-montserrat fw-bold mb-1">Oficina Central</h6>
                            <p class="text-muted small mb-0">San José, Costa Rica</p>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm contact-info-card p-3 d-flex flex-row align-items-center">
                        <div class="bg-accent-corp bg-opacity-10 text-accent-corp p-3 rounded-circle me-3">
                            <i class="fa-solid fa-phone fs-4"></i>
                        </div>
                        <div>
                            <h6 class="font-montserrat fw-bold mb-1">Teléfono</h6>
                            <p class="text-muted small mb-0">+506 8000-0000</p>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm contact-info-card p-3 d-flex flex-row align-items-center">
                        <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle me-3">
                            <i class="fa-solid fa-envelope fs-4"></i>
                        </div>
                        <div>
                            <h6 class="font-montserrat fw-bold mb-1">Correo Electrónico</h6>
                            <p class="text-muted small mb-0">soporte@cookieexpress.com</p>
                        </div>
                    </div>
                </div>

                <h4 class="font-montserrat fw-bold mb-4 color-primary-corp">Preguntas Frecuentes</h4>
                <div class="accordion shadow-sm" id="faqAccordion">
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                ¿Cuánto tarda en llegar mi paquete?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small">
                                Una vez que recibimos tu paquete en nuestra bodega de Miami, el tiempo de tránsito hacia Costa Rica es de 24 a 48 horas hábiles, más el tiempo de liberación aduanal.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                ¿Qué artículos están prohibidos?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small">
                                Por regulaciones aduaneras y de seguridad aérea, no transportamos armas de fuego, explosivos, líquidos inflamables, dinero en efectivo o animales vivos.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                ¿Cómo subo mi factura?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small">
                                Inicia sesión en tu casillero, ve a la sección de "Rastreo", ubica el paquete que requiere acción y haz clic en el botón naranja "Subir Factura". Aceptamos PDF y JPG.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4 bg-white h-100">
                    <h3 class="fw-bold font-montserrat mb-4">Envíanos un mensaje</h3>
                    
                    <form id="formularioContactoGeneral" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6 mb-2">
                                <label for="nombreContacto" class="form-label small fw-bold">Nombre Completo</label>
                                <input type="text" class="form-control bg-light" id="nombreContacto" name="nombre" required>
                                <div class="invalid-feedback">Por favor, ingresa tu nombre.</div>
                            </div>
                            
                            <div class="col-md-6 mb-2">
                                <label for="emailContacto" class="form-label small fw-bold">Correo Electrónico</label>
                                <input type="email" class="form-control bg-light" id="emailContacto" name="email" required>
                                <div class="invalid-feedback">Ingresa un correo electrónico válido.</div>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="asuntoContacto" class="form-label small fw-bold">Asunto</label>
                                <select class="form-select bg-light" id="asuntoContacto" name="asunto" required>
                                    <option value="" selected disabled>Selecciona una opción...</option>
                                    <option value="rastreo">Problema con el rastreo</option>
                                    <option value="factura">Dudas sobre facturación/aduanas</option>
                                    <option value="registro">Problemas al crear cuenta</option>
                                    <option value="otros">Otros</option>
                                </select>
                                <div class="invalid-feedback">Por favor, selecciona un asunto.</div>
                            </div>
                            
                            <div class="col-12 mb-4">
                                <label for="mensajeContacto" class="form-label small fw-bold">Mensaje</label>
                                <textarea class="form-control bg-light" id="mensajeContacto" name="mensaje" rows="5" placeholder="Escribe los detalles de tu consulta aquí..." required></textarea>
                                <div class="invalid-feedback">El mensaje no puede estar vacío.</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary-corp w-100 py-3 rounded-3 text-white fw-bold d-flex justify-content-center align-items-center mt-auto">
                            <span id="btnContactoText">Enviar Mensaje</span>
                            <div id="btnContactoSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"></div>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

<?php 
include 'shared/footer.php';
include 'shared/scripts.php'; 
?>