<?php
$page_title = 'Mapa de sucursales';
$page_description = 'Sucursales y puntos de contacto de CookieExpress Ltda.';
$page_css = 'mapa';
$page_js = 'mapa';
$body_class = 'public-body';
include 'shared/head.php';
include 'shared/header.php';
?>
<main class="map-page py-5">
    <section class="container py-4 py-lg-5">
        <div class="row g-4 align-items-center mb-5">
            <div class="col-lg-5" data-aos="fade-up">
                <span class="section-label text-dark border-dark-subtle bg-white">Cobertura operativa</span>
                <h1 class="section-heading mt-4">Sucursales y puntos de gestion para una operacion internacional ordenada.</h1>
                <p class="section-copy">La vista combina un mapa visual sobrio con informacion de oficinas, horarios y capacidades para futuras integraciones con datos dinamicos.</p>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="map-stage glass-card">
                    <div class="map-grid" id="branchMap">
                        <button class="branch-dot active" data-branch="0" style="top:28%;left:24%;">San Jose</button>
                        <button class="branch-dot" data-branch="1" style="top:38%;left:46%;">Heredia</button>
                        <button class="branch-dot" data-branch="2" style="top:58%;left:36%;">Cartago</button>
                        <button class="branch-dot" data-branch="3" style="top:46%;left:68%;">Limon</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4" id="branchCards">
            <div class="col-md-6 col-xl-3" data-aos="fade-up">
                <article class="glass-card branch-card active"><h2>San Jose Centro</h2><p>Coordinacion comercial, atencion al cliente y administracion.</p><span>Lun a Sab, 8:00 a.m. - 6:00 p.m.</span></article>
            </div>
            <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="70">
                <article class="glass-card branch-card"><h2>Heredia Hub</h2><p>Clasificacion, recepcion y despacho metropolitano.</p><span>Lun a Sab, 7:00 a.m. - 7:00 p.m.</span></article>
            </div>
            <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="140">
                <article class="glass-card branch-card"><h2>Cartago Ruta Este</h2><p>Punto de retiro y consolidacion de entrega regional.</p><span>Lun a Vie, 8:00 a.m. - 5:30 p.m.</span></article>
            </div>
            <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="210">
                <article class="glass-card branch-card"><h2>Limon Aduanas</h2><p>Coordinacion documental y soporte a importaciones especiales.</p><span>Lun a Vie, 8:30 a.m. - 5:00 p.m.</span></article>
            </div>
        </div>
    </section>
</main>
<?php include 'shared/footer.php'; ?>
<?php include 'shared/scripts.php'; ?>
