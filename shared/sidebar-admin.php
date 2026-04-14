<?php
$current_page = basename($_SERVER['PHP_SELF']);
$admin_links = [
    'General' => [
        ['dashboard-admin.php', 'bi-speedometer2', 'Dashboard'],
        ['reportes.php', 'bi-bar-chart-line', 'Reportes'],
    ],
    'Gestion' => [
        ['usuarios.php', 'bi-people', 'Usuarios'],
        ['parametros.php', 'bi-sliders', 'Parametros'],
        ['detalle-paquete.php', 'bi-box-seam', 'Expediente paquete'],
    ],
];
?>
<aside class="private-sidebar d-flex flex-column">
    <a class="brand-mark" href="dashboard-admin.php">
        <span class="brand-icon"><i class="bi bi-box-seam"></i></span>
        <span>Cookie<span>Express</span><small>Panel administrativo</small></span>
    </a>
<?php foreach ($admin_links as $group => $links): ?>
    <div class="sidebar-section-title"><?php echo $group; ?></div>
    <nav class="sidebar-nav">
<?php foreach ($links as [$href, $icon, $label]): ?>
        <a class="sidebar-link <?php echo $current_page === $href ? 'active' : ''; ?>" href="<?php echo $href; ?>">
            <i class="bi <?php echo $icon; ?>"></i>
            <span><?php echo $label; ?></span>
        </a>
<?php endforeach; ?>
    </nav>
<?php endforeach; ?>
    <div class="sidebar-footnote">
        <div class="small text-white-50 mb-2">Resumen operativo</div>
        <div class="fw-bold text-white">128 paquetes activos</div>
        <div class="small text-white-50">17 incidencias requieren seguimiento hoy</div>
    </div>
</aside>
