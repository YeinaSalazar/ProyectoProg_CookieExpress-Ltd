<?php
$page_title = 'Contacto';
$page_description = 'Canales de contacto y soporte de CookieExpress Ltda.';
$page_css = 'contacto';
$page_js = 'contacto';
$body_class = 'public-body';
include 'shared/head.php';
include 'shared/header.php';
?>
<main class="contact-page py-5">
    <section class="container py-4 py-lg-5">
        <div class="row g-4 align-items-center mb-5">
            <div class="col-lg-6" data-aos="fade-up">
                <span class="section-label text-dark border-dark-subtle bg-white">Atencion y soporte</span>
                <h1 class="section-heading mt-4">Canales claros para consultas comerciales, seguimiento operativo y soporte al cliente.</h1>
                <p class="section-copy">La seccion de contacto esta preparada para validacion front end y para conectarse despues con tu API RESTful sin cambiar la experiencia visual.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="contact-hero-card glass-card">
                    <div class="contact-highlight">
                        <span>Tiempo promedio de respuesta</span>
                        <strong>30 minutos</strong>
                    </div>
                    <div class="contact-grid-mini">
                        <article><small>Soporte</small><strong>Lun-Sab</strong></article>
                        <article><small>Correo</small><strong>24/7</strong></article>
                        <article><small>Oficinas</small><strong>4 activas</strong></article>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="glass-card h-100" data-aos="fade-up">
                    <div class="contact-info-list">
                        <article>
                            <i class="bi bi-geo-alt"></i>
                            <div><strong>Oficina central</strong><span>San Pedro, San Jose, Costa Rica</span></div>
                        </article>
                        <article>
                            <i class="bi bi-telephone"></i>
                            <div><strong>Telefono</strong><span>+506 2255-1840</span></div>
                        </article>
                        <article>
                            <i class="bi bi-envelope"></i>
                            <div><strong>Correo</strong><span>soporte@cookieexpress.com</span></div>
                        </article>
                        <article>
                            <i class="bi bi-clock"></i>
                            <div><strong>Horario</strong><span>Lunes a sabado, 8:00 a.m. - 6:00 p.m.</span></div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="glass-card h-100" data-aos="fade-up" data-aos-delay="80">
                    <div class="row g-4">
                        <div class="col-lg-7">
                            <h2 class="h3 mb-3">Escribenos</h2>
                            <form id="contactForm" novalidate>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="contactName">Nombre completo</label>
                                        <input class="form-control" id="contactName" name="name" type="text" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="contactEmail">Correo electronico</label>
                                        <input class="form-control" id="contactEmail" name="email" type="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="contactPhone">Telefono</label>
                                        <input class="form-control" id="contactPhone" name="phone" type="tel">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="contactReason">Motivo</label>
                                        <select class="form-select" id="contactReason" name="reason" required>
                                            <option value="">Seleccione una opcion</option>
                                            <option value="seguimiento">Seguimiento</option>
                                            <option value="facturacion">Facturacion y cobros</option>
                                            <option value="registro">Cuenta y acceso</option>
                                            <option value="corporativo">Solicitud corporativa</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="contactMessage">Mensaje</label>
                                        <textarea class="form-control" id="contactMessage" name="message" required></textarea>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-3">
                                        <span class="text-muted-soft small">Placeholder listo para envio por AJAX.</span>
                                        <button class="btn btn-brand" type="submit">Enviar consulta</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="faq-panel">
                                <h3 class="h5 mb-3">Consultas frecuentes</h3>
                                <div class="accordion" id="faqAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne">Cuanto dura el transito desde Miami?</button></h2>
                                        <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion"><div class="accordion-body">Entre 24 y 48 horas habiles, mas liberacion aduanal y ruta de entrega local.</div></div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo">Como subo mi factura?</button></h2>
                                        <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Desde el detalle del paquete o mediante el modal operativo disponible en el panel del cliente.</div></div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree">Puedo solicitar entrega express?</button></h2>
                                        <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Si, el catalogo de parametros contempla servicios premium y recargos asociados.</div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'shared/footer.php'; ?>
<?php include 'shared/scripts.php'; ?>
