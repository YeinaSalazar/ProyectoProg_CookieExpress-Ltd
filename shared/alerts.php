<?php
$alert_items = $alert_items ?? [
    ['warning', 'Factura pendiente para el paquete CKE-2026-1931.', 'Hace 15 minutos'],
    ['info', 'Nueva actualizacion de ruta Miami > San Jose registrada.', 'Hace 42 minutos'],
];
?>
<div class="alert-stack">
<?php foreach ($alert_items as [$type, $message, $meta]): ?>
    <div class="alert-card">
        <i class="bi <?php echo $type === 'warning' ? 'bi-exclamation-triangle' : 'bi-info-circle'; ?>"></i>
        <div>
            <div class="fw-bold"><?php echo $message; ?></div>
            <div class="small text-muted-soft"><?php echo $meta; ?></div>
        </div>
    </div>
<?php endforeach; ?>
</div>
