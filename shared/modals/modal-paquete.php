<div class="modal fade" id="modalPaquete" tabindex="-1" aria-labelledby="modalPaqueteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="modalPaqueteLabel">Paquete</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button></div>
            <div class="modal-body">
                <form id="packageModalForm" class="row g-3">
                    <div class="col-md-6"><label class="form-label">Tracking</label><input class="form-control" name="tracking" type="text"></div>
                    <div class="col-md-6"><label class="form-label">Cliente</label><input class="form-control" name="cliente" type="text"></div>
                    <div class="col-md-4"><label class="form-label">Peso</label><input class="form-control" name="peso" type="text"></div>
                    <div class="col-md-4"><label class="form-label">Valor</label><input class="form-control" name="valor" type="text"></div>
                    <div class="col-md-4"><label class="form-label">Estado</label><select class="form-select" name="estado"><option>Recibido</option><option>Procesando</option><option>En transito</option></select></div>
                </form>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-outline-brand" data-bs-dismiss="modal">Cancelar</button><button type="button" class="btn btn-brand">Guardar</button></div>
        </div>
    </div>
</div>
