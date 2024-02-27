<?php
require_once "../validator_acess.php";

$calls = array();

$arquivo = fopen('../arquivo.txt', 'r');

while (!feof($arquivo)) {
  $registro = fgets($arquivo);
  $calls[] = $registro;
}

fclose($arquivo);

?>

<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


  <style>
    .consult-call-card {
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

      <div class="consult-call-card">
        <div class="card">
          <div class="card-header">
            Consulta de call
          </div>

          <div class="card-body">

            <?php foreach ($calls as $call) { ?>

              <?php

              $call_datas = explode('#', $call);
              if ($_SESSION['perfil_id'] == 2) {
                if ($_SESSION['id'] != $call_datas[0]) {
                  continue;
                }
              }

              if (count($call_datas) < 3) {
                continue;
              }

              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">
                    <?= $call_datas[1] ?>
                  </h5>
                  <h6 class="card-subtitle mb-2 text-muted">
                    <?= $call_datas[2] ?>
                  </h6>
                  <p class="card-text">
                    <?= $call_datas[3] ?>
                  </p>

                </div>
              </div>

            <?php } ?>

            <div class="row mt-5">
              <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>