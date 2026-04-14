<?php
$page_title = 'Rastreo de paquetes';
$page_description = 'Seguimiento publico de paquetes en CookieExpress Ltda.';
$page_css = 'paquetes';
$page_js = 'paquetes';
$body_class = 'public-body';
include 'shared/head.php';
include 'shared/header.php';
?>
<main class="tracking-page py-5">
    <section class="container py-4 py-lg-5">
        <div class="row g-4 align-items-center mb-5">
            <div class="col-lg-6" data-aos="fade-up">
                <span class="section-label text-dark border-dark-subtle bg-white">Tracking publico</span>
                <h1 class="section-heading mt-4">Consulta el estado de tu envio con una experiencia clara y lista para conectarse a endpoints reales.</h1>
                <p class="section-copy">Esta vista funciona como buscador publico por codigo y como referencia visual del expediente que luego consumira datos dinamicos via AJAX.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="tracking-search-card glass-card">
                    <form id="trackingForm" class="row g-3 align-items-end">
                        <div class="col-md-8">
                            <label class="form-label" for="trackingCode">Codigo de seguimiento</label>
                            <input class="form-control" id="trackingCode" name="tracking" placeholder="CKE-2026-1931" required>
                        </div>
                        <div class="col-md-4 d-grid">
                            <button class="btn btn-brand" type="submit">Consultar</button>
                        </div>
                    </form>
                    <div class="tracking-note mt-3">Demo sugerida: <strong>CKE-2026-1931</strong></div>
                </div>
            </div>
        </div>

        <div id="trackingResult" class="tracking-result" data-aos="fade-up">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="glass-card h-100">
                        <span class="status-badge status-en-transito mb-3">En transito</span>
                        <h2 class="h4 mb-3">Paquete CKE-2026-1931</h2>
                        <ul class="tracking-meta list-unstyled mb-0">
                            <li><span>Cliente</span><strong>Ana Solis</strong></li>
                            <li><span>Origen</span><strong>Miami, FL</strong></li>
                            <li><span>Destino</span><strong>San Jose, CR</strong></li>
                            <li><span>Peso</span><strong>4.6 lb</strong></li>
                            <li><span>Servicio</span><strong>Express Priority</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="glass-card h-100">
                        <div class="timeline">
                            <div class="timeline-item"><strong>Paquete recibido en bodega Miami</strong><div class="text-muted-soft small">12 abril 2026, 08:45 a.m.</div></div>
                            <div class="timeline-item"><strong>Factura validada y proceso aduanal iniciado</strong><div class="text-muted-soft small">12 abril 2026, 01:10 p.m.</div></div>
                            <div class="timeline-item"><strong>Salida a vuelo consolidado hacia Costa Rica</strong><div class="text-muted-soft small">13 abril 2026, 05:20 a.m.</div></div>
                            <div class="timeline-item"><strong>Ingreso a centro logistico local</strong><div class="text-muted-soft small">14 abril 2026, 09:00 a.m.</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'shared/footer.php'; ?>
<?php include 'shared/scripts.php'; ?>
