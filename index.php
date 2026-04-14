<?php
$page_title = 'Inicio';
$page_description = 'Landing corporativa de CookieExpress Ltda para la gestion de envios internacionales.';
$page_css = 'home';
$page_js = 'home';
$body_class = 'public-body';
include 'shared/head.php';
include 'shared/header.php';
?>
<main class="home-page">
    <section class="hero-home position-relative overflow-hidden">
        <div class="hero-noise"></div>
        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="section-label mb-4" data-aos="fade-up">Trazabilidad premium para envios internacionales</span>
                    <h1 class="section-heading text-white" data-aos="fade-up" data-aos-delay="80">Gestionamos cada paquete con precision operativa, visibilidad total y una experiencia digital a la altura de una marca global.</h1>
                    <p class="hero-copy text-white-50" data-aos="fade-up" data-aos-delay="140">CookieExpress Ltda conecta compras, bodega, aduana, transporte y entrega final en un flujo claro para clientes, personal logistico y administracion.</p>
                    <div class="d-flex flex-wrap gap-3 mt-4" data-aos="fade-up" data-aos-delay="200">
                        <a class="btn btn-brand" href="registro.php">Abrir casillero gratis</a>
                        <a class="btn btn-outline-light rounded-pill px-4" href="paquetes.php">Rastrear paquete</a>
                    </div>
                    <div class="row g-3 mt-4">
                        <div class="col-sm-4">
                            <div class="hero-stat-card glass-card text-white">
                                <strong>24h</strong>
                                <span>Ventana promedio de procesamiento en bodega Miami.</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="hero-stat-card glass-card text-white">
                                <strong>98.4%</strong>
                                <span>Paquetes con actualizacion de estado dentro del SLA operativo.</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="hero-stat-card glass-card text-white">
                                <strong>3 roles</strong>
                                <span>Experiencias diferenciadas para cliente, logistica y administracion.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-visual" data-aos="fade-left">
                        <div class="hero-route-card">
                            <div class="hero-route-top">
                                <span>Ruta destacada</span>
                                <strong>Miami Hub 07</strong>
                            </div>
                            <div class="hero-route-line">
                                <span>Compra online</span>
                                <i class="bi bi-arrow-right"></i>
                                <span>Bodega</span>
                                <i class="bi bi-arrow-right"></i>
                                <span>Aduana</span>
                                <i class="bi bi-arrow-right"></i>
                                <span>Entrega</span>
                            </div>
                            <div class="route-status-grid">
                                <article>
                                    <small>En recepcion</small>
                                    <strong>126</strong>
                                </article>
                                <article>
                                    <small>En vuelo</small>
                                    <strong>54</strong>
                                </article>
                                <article>
                                    <small>En reparto</small>
                                    <strong>18</strong>
                                </article>
                            </div>
                        </div>
                        <canvas id="heroOrbits" width="520" height="420" aria-hidden="true"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="story-section py-5">
        <div class="container py-4 py-lg-5">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5" data-aos="fade-up">
                    <span class="section-label text-dark border-dark-subtle bg-white">Por que CookieExpress</span>
                    <h2 class="section-heading mt-4">Una plataforma pensada para trazabilidad real, no solo para verse bien.</h2>
                    <p class="section-copy">Disenamos una experiencia front end que deja lista la integracion futura con AJAX, API RESTful, dashboards por rol y expedientes operativos completos.</p>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="80">
                            <article class="glass-card feature-card h-100">
                                <i class="bi bi-radar"></i>
                                <h3>Seguimiento visible</h3>
                                <p>Estados claros, hitos de operacion y timeline listos para conectarse con eventos reales del backend.</p>
                            </article>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="120">
                            <article class="glass-card feature-card h-100">
                                <i class="bi bi-grid-1x2"></i>
                                <h3>Dashboards por rol</h3>
                                <p>Interfaces privadas diferenciadas para decisiones administrativas, ejecucion logistica y consulta del cliente.</p>
                            </article>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="160">
                            <article class="glass-card feature-card h-100">
                                <i class="bi bi-shield-check"></i>
                                <h3>Base escalable</h3>
                                <p>Componentes compartidos, modales reutilizables y helpers JS consistentes con un proyecto clasico en XAMPP.</p>
                            </article>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <article class="glass-card feature-card h-100">
                                <i class="bi bi-globe-americas"></i>
                                <h3>Operacion internacional</h3>
                                <p>Contenido creible para importaciones, sucursales, tarifas y procesamiento aduanal en contexto realista.</p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="process-section py-5">
        <div class="container py-lg-5">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-4 mb-5">
                <div>
                    <span class="section-label text-dark border-dark-subtle bg-white">Proceso logistico</span>
                    <h2 class="section-heading mt-4 mb-0">Del checkout a la entrega, con un flujo que el usuario entiende en segundos.</h2>
                </div>
                <p class="section-copy mb-0">Cada etapa se comunica con claridad para reducir ansiedad, soporte innecesario y dudas sobre impuestos, estatus o documentos pendientes.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3" data-aos="fade-up">
                    <div class="process-card"><span>01</span><h3>Compra internacional</h3><p>El cliente compra en tiendas de USA, Europa o Asia y utiliza su casillero asignado.</p></div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="80">
                    <div class="process-card"><span>02</span><h3>Recepcion en bodega</h3><p>El operador valida ingreso, peso, evidencia fotografica y documentos requeridos.</p></div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="140">
                    <div class="process-card"><span>03</span><h3>Transito y aduana</h3><p>El sistema presenta costos, incidencias y cambios de estado con lenguaje claro.</p></div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="process-card"><span>04</span><h3>Entrega o retiro</h3><p>La plataforma confirma salida a reparto y cierra el expediente del paquete.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials-section py-5">
        <div class="container py-lg-5">
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-right">
                    <span class="section-label text-dark border-dark-subtle bg-white">Percepcion de marca</span>
                    <h2 class="section-heading mt-4">Una interfaz sobria que transmite control y confianza.</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6" data-aos="fade-up">
                            <div class="glass-card quote-card h-100">
                                <p>La visibilidad del expediente reduce tickets de soporte y mejora la sensacion de control del cliente final.</p>
                                <strong>Coordinacion de servicio</strong>
                                <span>Operacion Costa Rica</span>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="120">
                            <div class="glass-card quote-card h-100 accent">
                                <p>La diferenciacion por rol permite que cada perfil vea solo lo necesario sin sacrificar informacion critica.</p>
                                <strong>Analista academico</strong>
                                <span>Programacion III</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-band py-5">
        <div class="container">
            <div class="cta-panel" data-aos="zoom-in">
                <div>
                    <span class="section-label">Listo para integracion</span>
                    <h2 class="mt-4">Front end preparado para conectar CRUD, sesiones y AJAX reales.</h2>
                    <p class="mb-0 text-white-50">Explora la version publica o entra a los paneles demo para revisar la base administrativa.</p>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a class="btn btn-brand" href="dashboard-admin.php">Ver dashboard admin</a>
                    <a class="btn btn-outline-light rounded-pill px-4" href="mapa.php">Explorar sucursales</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'shared/footer.php'; ?>
<?php include 'shared/scripts.php'; ?>
