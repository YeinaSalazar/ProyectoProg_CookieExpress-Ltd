<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUsuarioLabel">Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="userModalForm" class="row g-3">
                    <div class="col-md-6"><label class="form-label">Nombre</label><input class="form-control" name="nombre" type="text"></div>
                    <div class="col-md-6"><label class="form-label">Correo</label><input class="form-control" name="correo" type="email"></div>
                    <div class="col-md-6"><label class="form-label">Rol</label><select class="form-select" name="rol"><option>Administrador</option><option>Logistica</option><option>Cliente</option></select></div>
                    <div class="col-md-6"><label class="form-label">Estado</label><select class="form-select" name="estado"><option>Activo</option><option>Inactivo</option></select></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-brand">Guardar</button>
            </div>
        </div>
    </div>
</div>
