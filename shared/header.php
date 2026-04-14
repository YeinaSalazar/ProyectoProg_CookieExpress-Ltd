<?php
$current_page = basename($_SERVER['PHP_SELF']);
$public_nav = [
    'index.php' => 'Inicio',
    'paquetes.php' => 'Rastreo',
    'mapa.php' => 'Sucursales',
    'contacto.php' => 'Contacto',
];
?>
<header class="site-header">
    <nav class="navbar navbar-expand-xl navbar-dark public-navbar fixed-top">
        <div class="container">
            <a class="navbar-brand brand-mark" href="index.php">
                <span class="brand-icon"><i class="bi bi-box-seam"></i></span>
                <span>
                    Cookie<span>Express</span>
                    <small>Logistica internacional</small>
                </span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Abrir navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-xl-center gap-xl-2">
<?php foreach ($public_nav as $file => $label): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === $file ? 'active' : ''; ?>" href="<?php echo $file; ?>">
                            <?php echo $label; ?>
                        </a>
                    </li>
<?php endforeach; ?>
                    <li class="nav-item ms-xl-3 mt-3 mt-xl-0">
                        <a class="btn btn-outline-light btn-sm px-3" href="login.php">Iniciar sesion</a>
                    </li>
                    <li class="nav-item mt-2 mt-xl-0">
                        <a class="btn btn-brand btn-sm px-3" href="registro.php">Crear casillero</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
