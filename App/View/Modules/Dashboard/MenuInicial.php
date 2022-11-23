<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include "./View/Includes/Bootstrap/css_config.php" ?>
  <?php include "./View/Includes/Graficos/PessoaSexo.php" ?>
  <?php include "./View/Includes/Graficos/CurriculosBairro.php" ?>
  <?php include "./View/Includes/Graficos/FaixaSalarial.php" ?>
  <title>Dashboard - Logado como <?= $_SESSION['admin_logged']->nome ?></title>

  <style>
    .box {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      width: 90vw;
    }
  </style>
</head>

<body>
  <header>
    <?php include "./View/Includes/header.php" ?>
  </header>

  <center>
    <section class="box">
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <div class="card text-center">
              <div class="card-header">
                <b>Currículo:</b> Pessoas por Sexo
              </div>
              <div class="card-body">
                <div id="pessoa_sexo_chart_div"></div>
              </div>
              <div class="card-footer text-muted">
                Ultima atualização, há 20 min.
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card text-center">
              <div class="card-header">
                <b>Empresa:</b> Faixa Salarial por Setor
              </div>
              <div class="card-body">
                <div id="faixa_salarial_barchart_material"></div>
              </div>
              <div class="card-footer text-muted">
                Ultima atualização, há 1 hora.
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card text-center">
        <div class="card-header">
          <b>Currículo:</b> Currículos por Bairros
        </div>
        <div class="card-body">
          <div id="curriculos_bairro_chart_div" style="width: 1000px; height: 300px;"></div>
        </div>
        <div class="card-footer text-muted">
          Ultima atualização, há dois dias.
        </div>
      </div>
    </section>
  </center>

  <?php include './View/Includes/Bootstrap/js_config.php' ?>
</body>

</html>