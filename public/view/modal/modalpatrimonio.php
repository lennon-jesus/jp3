<div class="modal fade" data-bs-backdrop='static' id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Gerenciamento de Patrimônios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="card">
          <div class="card-body ">
            <div class="mb-3 ">
              <label for="nameInput" class="form-label">Nome do Item*</label>
              <input type="text" class="form-control" id="nameInput">
            </div>
            <div class="mb-3 ">
              <label for="valorInput" class="form-label">Valor*</label>
              <input type="number" min=0 class="form-control" id="valorInput">
            </div>
            <div class="mb-3">
              <label for="statusInput" class="form-label">Status*</label>
              <select id="statusInput" class="form-select" aria-label="Status">
                <option selected value="1">Utilizado</option>
                <option value="2">Inutilizado</option>
                <option value="3">Indisponível</option>
              </select>
            </div>
            <div class="mb-3 col-6">
              <label for="roomInput" class="form-label">Quarto*</label>
              <select id="roomInput" class="form-select" aria-label="Quarto">
                <option selected disabled>Selecione</option>
                <option value="1">Não aplica</option>
                <!-- Pega cada quarto do banco, desabilita se o STATUS for 1 (ocupado) -->
                <?php
                $j = 2;
                foreach ($rooms as $room) { ?>
                    <option value="<?=$j?>">Quarto <?= $room['NUMERACAO'] ?></option>
                  <?php
                  $j++;
                } ?>

              </select>
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