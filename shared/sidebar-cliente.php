<?php
$current_page = basename($_SERVER['PHP_SELF']);
$cliente_links = [
    ['dashboard-cliente.php', 'bi-house-door', 'Mi panel'],
    ['mis-paquetes.php', 'bi-box2-heart', 'Mis paquetes'],
    ['perfil.php', 'bi-person-circle', 'Mi perfil'],
];
?>
<aside class="private-sidebar d-flex flex-column">
    <a class="brand-mark" href="dashboard-cliente.php">
        <span class="brand-icon"><i class="bi bi-box-seam"></i></span>
        <span>Cookie<span>Express</span><small>Area de cliente</small></span>
    </a>
    <div class="sidebar-section-title">Cuenta</div>
    <nav class="sidebar-nav">
<?php foreach ($cliente_links as [$href, $icon, $label]): ?>
        <a class="sidebar-link <?php echo $current_page === $href ? 'active' : ''; ?>" href="<?php echo $href; ?>">
            <i class="bi <?php echo $icon; ?>"></i>
            <span><?php echo $label; ?></span>
        </a>
<?php endforeach; ?>
    </nav>
    <div class="sidebar-footnote">
        <div class="small text-white-50 mb-2">Casillero asignado</div>
        <div class="fw-bold text-white">CKE-8492</div>
        <div class="small text-white-50">Miami Hub 07 - listo para nuevas compras</div>
    </div>
</aside>
