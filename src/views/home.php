<?php
require_once('../../validator_access.php');
require_once('../controllers/LoginController.php');

$loginController = new LoginController();
if (!isset($list)) {
  $list = $loginController->getStudents();
}

?>

<html>

<head>
  <meta charset="utf-8" />
  <title>Chamado Real</title>

  <!-- Corrigido o link do Bootstrap para a versão mais recente -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    .card-home {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="../logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Chamado Real
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../logoff.php">SAIR</a>
      </li>
    </ul>
  </nav>

  <div class="container">

    <div class="row mt-3">
      <div class="card-home">
        <div class="card">
          <div class="card-header">
            Cadastro de Estudantes
          </div>
          <div class="card-body">
            <form method="post">
              <div class="form-group">
                <input name="name" type="name" class="form-control" placeholder="Nome" />
              </div>
              <div class="form-group">
                <input name="course" type="course" class="form-control" placeholder="Curso" />
              </div>
              <div class="form-group">
                <input name="registration" type="registration" class="form-control" placeholder="Matricula" />
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Senha" />
              </div>
              <?php if (isset($_GET['register']) && $_GET['register'] == 'erro') { ?>
                <div class="text-danger">
                  Usuário ou senha inválidos
                </div>
              <?php } ?>
              <button class="btn btn-gl btn-info bt-block" type="submit">Cadastrar</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              if (isset($_POST['name'], $_POST['course'], $_POST['registration'], $_POST['password'])) {
                $list = $loginController->addStudent($_POST['name'], $_POST['course'], $_POST['registration'], $_POST['password'], $list);
              } else {
                echo "erro de cadastro ";
                exit;
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="card-home">
        <div class="card">
          <div class="card-header">
            Lista de Estudantes
          </div>
          <div class="card-body">
            <?php
            foreach ($list as $student) {
              echo "<p>Nome: {$student->getName()}, Curso: {$student->getCourse()}, Matricula: {$student->getRegistration()}</p>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>