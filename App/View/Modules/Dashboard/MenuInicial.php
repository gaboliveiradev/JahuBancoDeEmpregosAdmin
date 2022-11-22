<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./View/Includes/Bootstrap/css_config.php" ?>
    <title>Dashboard - Logado como <?= $_SESSION['admin_logged']->nome ?></title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
              ['Feminino', <?= 10 ?>],
              ['Masculino', <?= 20 ?>]
            ]);
          
            var options = {'title':'Pessoas x Sexo', 'width':400, 'height':300};
          
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <header>
        <?php include "./View/Includes/header.php" ?>
    </header>
    <section>
        <div id="chart_div"></div>
    </section>

    <?php include './View/Includes/Bootstrap/js_config.php' ?>
</body>
</html>