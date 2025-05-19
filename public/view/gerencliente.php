<?php
require_once __DIR__ . '/../controller/loginController.php';
require_once __DIR__ . '/../controller/gerenclienteController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    LoginController::autenticar($usuario, $senha);
}

$atual = "Cliente";
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
    <title>Gerenciamento de Clientes - Hotel Winner</title>
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
              <h4> Lista de Clientes
                <a href="createcliente.php" class="btn btn-primary float-end">Adicionar cliente</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nasc.</th>
                    <th>Fiador</th>
                    <th>Contato</th>
                    <th>Documento</th>
                    <th>Tipo de Doc.</th>
                    <th>Observações</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($clientes as $cliente) {
                  ?>
                  <tr>
                    <td><?=$cliente['ID_CLIENTE']?></td>
                    <td><?=$cliente['NOME']?></td>
                    <td><?=date('d/m/Y', strtotime($cliente['DATA_NASCIMENTO']))?></td>
                    <td><?=$cliente['FIADOR']?></td>
                    <td><?=$cliente['CONTATO']?></td>
                    <td><?=$cliente['DOCUMENTO']?></td>
                    <td><?=$cliente['TIPO_DOCUMENTO']?></td>
                    <td><?php if(strlen($cliente['OBS']) > 14){
                      echo substr($cliente['OBS'], 0, 9);
                      echo '...';
                      ?>
                      <a onclick="alert('<?=$cliente['OBS']?>')"><span class="material-symbols-outlined">expand_content</span></button><?php
                    }else
                      echo $cliente['OBS'];?></td>
                    <td>
                      <a href="viewcliente.php?id=<?=$cliente['ID_CLIENTE']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                      <a href="editcliente.php?id=<?=$cliente['ID_CLIENTE']?>" class="btn btn-light btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                      <form action="acoes.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="deleteCliente" value="<?=$cliente['ID_CLIENTE']?>" class="btn btn-danger btn-sm">
                          <span class="bi-trash3-fill"></span>&nbsp;Excluir
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php
                  }
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>