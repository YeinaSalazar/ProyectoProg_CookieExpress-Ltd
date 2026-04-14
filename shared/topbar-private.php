<?php
$topbar_title = $topbar_title ?? 'Panel';
$topbar_subtitle = $topbar_subtitle ?? 'Vista privada de CookieExpress.';
$topbar_badge = $topbar_badge ?? 'Operacion activa';
$topbar_user = $topbar_user ?? 'Usuario Demo';
$topbar_role = $topbar_role ?? 'Sesion de ejemplo';
?>
<div class="private-topbar">
    <div class="topbar-title">
        <span class="section-label text-dark border-dark-subtle bg-white"><?php echo $topbar_badge; ?></span>
        <h1 class="mt-3"><?php echo $topbar_title; ?></h1>
        <p class="text-muted-soft mb-0"><?php echo $topbar_subtitle; ?></p>
    </div>
    <div class="topbar-actions">
        <span class="topbar-chip"><i class="bi bi-bell"></i> 3 alertas</span>
        <span class="avatar-chip">
            <i class="bi bi-person-badge"></i>
            <span><strong><?php echo $topbar_user; ?></strong><br><small class="text-muted-soft"><?php echo $topbar_role; ?></small></span>
        </span>
    </div>
</div>
