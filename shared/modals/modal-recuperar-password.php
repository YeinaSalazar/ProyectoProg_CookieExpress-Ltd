<div class="modal fade" id="modalRecuperarPassword" tabindex="-1" aria-labelledby="modalRecuperarPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRecuperarPasswordLabel">Recuperar acceso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted-soft">Ingresa tu correo para dejar listo el flujo de recuperacion por API en una fase posterior.</p>
                <form id="recoverPasswordForm">
                    <div class="mb-3">
                        <label class="form-label" for="recoverEmail">Correo electronico</label>
                        <input class="form-control" id="recoverEmail" name="email" type="email" required>
                    </div>
                    <button class="btn btn-brand w-100" type="submit">Enviar instrucciones</button>
                </form>
            </div>
        </div>
    </div>
</div>
