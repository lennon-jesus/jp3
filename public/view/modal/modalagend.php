<div class="modal fade" data-bs-backdrop='static' id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Gerenciamento de Agendamentos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="card">
          <div class="card-body ">
            <div class="mb-3 ">
              <label for="nameInput" class="form-label">Data de Check-in*</label>
              <input type="date" class="form-control" id="checkInInput">
            </div>
            <div class="mb-3 ">
              <label for="dateInput" class="form-label">Data de Check-out*</label>
              <input type="date" class="form-control" id="checkOutInput">
            </div>
            <div class="mb-3">
              <label for="statusInput" class="form-label">Status*</label>
              <select id="statusInput" class="form-select" aria-label="Status">
                <option selected value="1">Aberto</option>
                <option value="2">Fechado</option>
              </select>
            </div>
            <div class="mb-3 col-6">
              <label for="roomInput" class="form-label">Quarto*</label>
              <select id="roomInput" class="form-select" aria-label="Quarto">
                <option selected disabled>Selecione</option>

                <!-- Pega cada quarto do banco, desabilita se o STATUS for 1 (ocupado) -->
                <?php
                $j = 1;
                foreach ($rooms as $room) {
                  if ($room['STATUS'] == 0) { ?>
                    <option value="<?=$j?>" style="color: green">Quarto <?= $room['NUMERACAO'] ?></option>
                  <?php } else if ($room['STATUS'] == 1) { ?>
                      <option value="<?=$j?>" style="color: red" disabled>Quarto <?= $room['NUMERACAO'] ?></option>
                  <?php }
                  $j++;
                } ?>

              </select>
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