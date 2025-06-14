<div class="modal fade" data-bs-backdrop='static' id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Gerenciamento de Quartos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="card">
          <div class="card-body ">
            <div class="mb-3 ">
              <label for="numInput" class="form-label">Numeração*</label>
              <input type="number" min="0" class="form-control" id="numInput">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <a class="btn btn-secondary" id="modalCancelar" data-bs-toggle="modal" data-bs-target="#cancelModal"
            href="#">Cancelar</button>
            <a href="#" class="btn btn-light">Confirmar</a>
        </div>
      </div>
    </div>
  </div>
</div>