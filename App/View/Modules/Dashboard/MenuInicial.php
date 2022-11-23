<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./View/Includes/Bootstrap/css_config.php" ?>
    <?php include "./View/Includes/Graficos/PessoaSexo.php" ?>
    <title>Dashboard - Logado como <?= $_SESSION['admin_logged']->nome ?></title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Bairro', 'Quantidade'],
          ['Jardim Juliana', 1],
          ['Jardim Dona Emília', 2],
          ['Jardim Carolina', 1],
          ['Jardim Paulista', 4]
        ]);

        var options = {
          chart: {
            title: 'Currículos por Bairro',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body>
    <header>
        <?php include "./View/Includes/header.php" ?>
    </header>
    <section>
        <h2 class="text-center">Gráficos relacionados ao Curriculo</h2>
        <div class="container text-center">
            <div class="row">
                <div>
                    <div class="col">
                        <div id="columnchart_material" style="width: 800px; height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './View/Includes/Bootstrap/js_config.php' ?>
</body>
</html>