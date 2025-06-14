<div class="modal fade" data-bs-backdrop='static' id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Gerenciamento de Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="card">
          <div class="card-body ">
            <div class="mb-3 ">
              <label for="nameInput" class="form-label">Nome completo*</label>
              <input type="text" class="form-control" id="nameInput">
            </div>
            <div class="mb-3 ">
              <label for="dateInput" class="form-label">Data de nascimento*</label>
              <input type="date" class="form-control" id="dateInput" max='2025-01-01'>
            </div>
            <div class="mb-3">
              <label for="payInput" class="form-label">Fiador*</label>
              <input type="text" class="form-control" id="payInput">
            </div>
            <div class="mb-3 col-6">
              <label for="contInput" class="form-label">Contato*</label>
              <input type="text" class="form-control" id="contInput">
            </div>
            <br>
            <div class="mb-3">
              <label for="typeInput" class="form-label">Tipo de documento*</label>
              <select id="typeInput" class="form-select" onchange="clearDoc('docInput')" aria-label="Tipo de documento">
                <option selected disabled>Selecione</option>
                <option value="1">RG</option>
                <option value="2">CPF</option>
                <option value="3">Passaporte</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="docInput" class="form-label">Número do Documento*</label>
              <input type="text" class="form-control" id="docInput" min=0>
            </div>
            <div class="mb-3">
              <label for="obsInput" class="form-label">Observações</label>
              <textarea class="form-control" id="obsInput" rows="3"></textarea>
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