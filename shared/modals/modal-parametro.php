<div class="modal fade" id="modalParametro" tabindex="-1" aria-labelledby="modalParametroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalParametroLabel">Parametro de negocio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="parameterModalForm" class="row g-3">
                    <div class="col-12"><label class="form-label">Nombre</label><input class="form-control" name="nombre" type="text"></div>
                    <div class="col-md-6"><label class="form-label">Categoria</label><select class="form-select" name="categoria"><option>Tarifa</option><option>Impuesto</option><option>Servicio</option></select></div>
                    <div class="col-md-6"><label class="form-label">Valor</label><input class="form-control" name="valor" type="text"></div>
                </form>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-outline-brand" data-bs-dismiss="modal">Cancelar</button><button type="button" class="btn btn-brand">Guardar</button></div>
        </div>
    </div>
</div>
