<?php
require_once __DIR__ . '/../controller/loginController.php';
require_once __DIR__ . '/../controller/gerenagendController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = $_POST['user'] ?? '';
  $senha = $_POST['pass'] ?? '';
  LoginController::autenticar($usuario, $senha);
}
$i = 0;
$j = 0;
$atual = "Agendamento";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="../css/bs-stepper.min.css">
  <link href="../css/style.css" rel="stylesheet">
  <title>Gerenciamento de Agendamentos - Hotel Winner</title>
  <script src="../js/gerenciamentoScript.js" defer></script>
  <script src="../js/jquery-3.7.1.min.js"></script>
</head>

<body>
  <?php include('navbar.php'); ?>
  <?php include('navgerenc.php'); ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4> Lista de Agendamentos
              <a href="createagend.php" class="btn btn-primary float-end">Adicionar agendamento</a>
            </h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Data de Check-in</th>
                  <th>Data de Check-out</th>
                  <th>Status</th>
                  <th>Quarto</th>
                  <th>Funcionário</th>
                  <th>Observações</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($agendamentos as $agend) {
                  ?>
                  <tr>
                    <td><?= date('d/m/Y', strtotime($agend['CHECK_IN'])) ?></td>
                    <td><?= date('d/m/Y', strtotime($agend['CHECK_OUT'])) ?></td>
                    <td><?php
                    if ($agend['STATUS'])
                      echo "Aberto";
                    else
                      echo "Fechado";
                    ?></td>
                    <td><?= $agend['ID_QUARTO'] ?></td>
                    <td><?= $agend['ID_FUNCIONARIO'] ?></td>
                    <td><?php if (strlen($agend['OBS']) > 20) {
                      echo substr($agend['OBS'], 0, 15);
                      echo '...';
                      ?>
                        <a data-bs-toggle="modal" data-bs-target="#modal<?= $i ?>" href="#"><span
                        class="material-symbols-outlined">expand_content</span></a><?php
                    } else
                      echo $agend['OBS']; ?>
                    </td>
                    <td>
                      <a href="viewagend.php?id=<?= $agend['ID_AGENDAMENTO'] ?>" class="btn btn-secondary btn-sm"><span
                          class="bi-eye-fill"></span>&nbsp;<span class="material-symbols-outlined" title="Ver">visibility</span></a>
                      <a href="editagend.php?id=<?= $agend['ID_AGENDAMENTO'] ?>" class="btn btn-light btn-sm"><span
                          class="bi-pencil-fill"></span>&nbsp;<span class="material-symbols-outlined" title="Editar">edit</span></a>
                      <form action="acoes.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit"
                          name="deleteAgend" value="<?= $agend['ID_AGENDAMENTO'] ?>" class="btn btn-danger btn-sm">
                          <span class="bi-trash3-fill"></span>&nbsp;<span class="material-symbols-outlined" title="Deletar">delete</span>
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php
                  $i++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal de observações. Cria um novo para cada agendamento que a observação tenha mais de 20 caracteres -->
  <?php
  foreach ($agendamentos as $agend) {
    if (strlen($agend['OBS']) > 20) {
      ?>
      <div class="modal fade" id="modal<?= $j ?>" aria-labelledby="<?= $j ?>ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="<?= $j ?>ModalLabel">Observações do Agendamento</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?= $agend['OBS'] ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>

      <?php
    }
    $j++;
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>