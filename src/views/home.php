<?php
require_once('C:/xampp/htdocs/chamado-real/validator_access.php');
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
    <div class="row">
      <div class="card-home">
        <div class="card">
          <div class="card-header">
            Menu
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6 d-flex justify-content-center">
                <a href="open_call.php">
                  <img src="../formulario_abrir_chamado.png" width="70" height="70" alt="Abrir Chamado">
                </a>
              </div>
              <div class="col-6 d-flex justify-content-center">
                <a href="consult_call.php">
                  <img src="../formulario_consultar_chamado.png" width="70" height="70" alt="Consultar Chamado">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>