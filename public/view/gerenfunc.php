<?php
require_once __DIR__ . '/../controller/loginController.php';
require_once __DIR__ . '/../controller/gerenfuncController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['user'] ?? '';
    $senha = $_POST['pass'] ?? '';
    LoginController::autenticar($usuario, $senha);
}

$atual = "Funcionário";
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
    <title>Gerenciamento de Funcionários - Hotel Winner</title>
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
              <h4> Lista de Funcionários
                <a href="createfunc.php" class="btn btn-primary float-end">Adicionar funcionário</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Senha</th>
                    <th>Nível de Acesso</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($funcionarios as $func) {
                  ?>
                  <tr>
                    <td><?=$func['ID_FUNCIONARIO']?></td>
                    <td><?=$func['USUARIO']?></td>
                    <td><?=$func['SENHA']?></td>
                    <td><?php
                    if($func['ID_NIVELACESSO'])
                      echo "Gerente";
                    else
                      echo "Comum";
                    ?></td>
                    <td>
                      <a href="viewagend.php?id=<?=$func['ID_FUNCIONARIO']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                      <a href="editagend.php?id=<?=$func['ID_FUNCIONARIO']?>" class="btn btn-light btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                      <form action="acoes.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="deleteFunc" value="<?=$func['ID_FUNCIONARIO']?>" class="btn btn-danger btn-sm">
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