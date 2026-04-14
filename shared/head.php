<?php
$page_title = $page_title ?? 'CookieExpress Ltda';
$page_description = $page_description ?? 'Sistema de gestion de envios internacionales de CookieExpress Ltda.';
$body_class = $body_class ?? '';
$page_css_files = [];

if (!empty($page_css)) {
    $page_css_files = is_array($page_css) ? $page_css : [$page_css];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8'); ?>">
    <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?> | CookieExpress Ltda</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="assets/css/global.css">
<?php foreach ($page_css_files as $css_file): ?>
    <link rel="stylesheet" href="assets/css/<?php echo htmlspecialchars($css_file, ENT_QUOTES, 'UTF-8'); ?>.css">
<?php endforeach; ?>
</head>
<body class="<?php echo htmlspecialchars($body_class, ENT_QUOTES, 'UTF-8'); ?>">
    <div id="ajax-loader" aria-hidden="true">
        <div class="loader-panel">
            <span class="loader-spinner"></span>
            <p class="mb-0">Conectando con la plataforma logistica...</p>
        </div>
    </div>
