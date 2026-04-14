<?php
$current_page = basename($_SERVER['PHP_SELF']);
$logistica_links = [
    ['dashboard-logistica.php', 'bi-truck', 'Operacion diaria'],
    ['detalle-paquete.php', 'bi-upc-scan', 'Control de paquetes'],
    ['parametros.php', 'bi-diagram-3', 'Catalogos'],
];
?>
<aside class="private-sidebar d-flex flex-column">
    <a class="brand-mark" href="dashboard-logistica.php">
        <span class="brand-icon"><i class="bi bi-box-seam"></i></span>
        <span>Cookie<span>Express</span><small>Centro logistico</small></span>
    </a>
    <div class="sidebar-section-title">Operacion</div>
    <nav class="sidebar-nav">
<?php foreach ($logistica_links as [$href, $icon, $label]): ?>
        <a class="sidebar-link <?php echo $current_page === $href ? 'active' : ''; ?>" href="<?php echo $href; ?>">
            <i class="bi <?php echo $icon; ?>"></i>
            <span><?php echo $label; ?></span>
        </a>
<?php endforeach; ?>
    </nav>
    <div class="sidebar-footnote">
        <div class="small text-white-50 mb-2">Turno actual</div>
        <div class="fw-bold text-white">42 recepciones pendientes</div>
        <div class="small text-white-50">Tiempo promedio de clasificacion: 18 min</div>
    </div>
</aside>
