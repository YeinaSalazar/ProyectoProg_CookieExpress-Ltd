<?php
// Configuración de la página
$page_title = "Mi Casillero";
$page_css = "paquetes";
$page_js = "paquetes";

// Simulación de sesión activa (En producción vendría del backend)
$usuario_logueado = true;

include 'shared/head.php';
include 'shared/header.php';
?>

<main class="dashboard-wrapper bg-light py-5">
    <div class="container">
        <div class="row mb-4 align-items-center" data-aos="fade-down">
            <div class="col-md-8">
                <h2 class="font-montserrat fw-bold color-primary-corp mb-1">¡Hola, Jose Luis!</h2>
                <p class="text-muted small">Revisa el estado de tus compras y gestiona tus envíos.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="bg-white p-3 rounded-3 shadow-sm d-inline-block">
                    <span class="text-muted small d-block">Tu código de casillero</span>
                    <span class="fw-bold font-montserrat text-accent-corp fs-5">CKE-8492</span>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5" id="dashboard-stats" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-3 border-start border-4 border-warning">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1">Requieren Factura</p>
                            <h3 class="fw-bold mb-0">1</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle text-warning">
                            <i class="fa-solid fa-file-invoice fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-3 border-start border-4 border-primary">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1">En Tránsito</p>
                            <h3 class="fw-bold mb-0">2</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                            <i class="fa-solid fa-plane text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-3 border-start border-4 border-success">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1">Listos para Entrega</p>
                            <h3 class="fw-bold mb-0">1</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                            <i class="fa-solid fa-box-check fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card-header bg-white border-bottom p-4 d-flex justify-content-between align-items-center">
                <h5 class="font-montserrat fw-bold mb-0">Mis Paquetes</h5>
                <div class="input-group w-auto">
                    <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" class="form-control border-start-0 bg-light" id="searchPaquete" placeholder="Buscar tracking...">
                </div>
            </div>
            <div class="card-body p-0">
                <div id="contenedor-paquetes" class="list-group list-group-flush">
                    <div class="p-5 text-center text-muted" id="loading-paquetes">
                        <div class="spinner-border text-accent-corp mb-3" role="status"></div>
                        <p>Cargando información de tus paquetes...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="modalFactura" tabindex="-1" aria-labelledby="modalFacturaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title font-montserrat fw-bold" id="modalFacturaLabel">Subir Factura Comercial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted small">Sube la factura de tu compra para procesar los trámites aduanales del paquete <strong id="trackingFacturaRef" class="text-dark"></strong>.</p>
                <form id="formSubirFactura" enctype="multipart/form-data">
                    <input type="hidden" id="idPaqueteFactura" name="id_paquete">
                    <div class="mb-4">
                        <label for="archivoFactura" class="form-label small fw-bold">Archivo (PDF, JPG, PNG)</label>
                        <input class="form-control" type="file" id="archivoFactura" name="factura" accept=".pdf, .jpg, .jpeg, .png" required>
                    </div>
                    <div class="mb-3">
                        <label for="valorDeclarado" class="form-label small fw-bold">Valor Total (USD)</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control" id="valorDeclarado" name="valor_declarado" placeholder="Ej: 45.99" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-accent-corp w-100 py-2">
                        <i class="fa-solid fa-cloud-arrow-up me-2"></i>Subir Documento
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalImagen" tabindex="-1" aria-labelledby="modalImagenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0 pb-0 position-absolute top-0 end-0 z-index-2">
                <button type="button" class="btn-close btn-close-white bg-dark p-2 m-2 opacity-75 rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 text-center">
                <img src="" id="imagenPaqueteFull" class="img-fluid rounded shadow-lg" alt="Foto del paquete">
                <div class="bg-dark text-white p-3 rounded-bottom mt-n1">
                    <p class="mb-0 small" id="descripcionImagenPaquete"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include 'shared/footer.php';
include 'shared/scripts.php'; 
?>