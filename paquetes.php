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
                <div class="bg-white p-3 rounded-3 …
 <?php
$page_title = "Mi Casillero";
$page_css = "paquetes";
$page_js = "paquetes";

// Simulación backend
$usuario = [
    "nombre" => "Jose Luis",
    "casillero" => "CKE-8492"
];

include 'shared/head.php';
include 'shared/header.php';
?>

<main class="dashboard-wrapper bg-light py-5">
    <div class="container">

        <!-- HEADER -->
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold mb-1">¡Hola, <?php echo $usuario['nombre']; ?>!</h2>
                <p class="text-muted small">Gestiona tus paquetes y revisa su estado.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="bg-white p-3 rounded shadow-sm d-inline-block">
                    <span class="small text-muted d-block">Código de casillero</span>
                    <span class="fw-bold text-primary fs-5">
                        <?php echo $usuario['casillero']; ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- KPIs DINÁMICOS -->
        <div class="row g-4 mb-5">

            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-start border-warning border-4">
                    <p class="small text-muted mb-1">Requieren Factura</p>
                    <h3 id="kpi-factura">0</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-start border-primary border-4">
                    <p class="small text-muted mb-1">En Tránsito</p>
                    <h3 id="kpi-transito">0</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-start border-success border-4">
                    <p class="small text-muted mb-1">Entregados</p>
                    <h3 id="kpi-entregado">0</h3>
                </div>
            </div>

        </div>

        <!-- LISTA -->
        <div class="card shadow-sm">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Mis Paquetes</h5>

                <!-- 🔥 ID CORREGIDO -->
                <input type="text"
                       id="searchSearch"
                       class="form-control w-auto"
                       placeholder="Buscar paquete...">
            </div>

            <div class="card-body p-0">
                <div id="contenedor-paquetes">

                    <!-- Loader -->
                    <div class="text-center p-5">
                        <div class="spinner-border"></div>
                        <p class="mt-2">Cargando paquetes...</p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</main>

<!-- MODAL FACTURA -->
<div class="modal fade" id="modalFactura">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Subir Factura</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formSubirFactura">

                    <input type="hidden" id="idPaqueteFactura">

                    <p>Tracking: <strong id="trackingFacturaRef"></strong></p>

                    <input type="file" class="form-control mb-3" required>

                    <input type="number"
                           class="form-control mb-3"
                           placeholder="Valor en USD"
                           required>

                    <button class="btn btn-primary w-100">
                        Subir
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>

<?php 
include 'shared/footer.php';
include 'shared/scripts.php'; 
?>