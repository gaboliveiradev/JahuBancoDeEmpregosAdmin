<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});

    google.charts.setOnLoadCallback(loadSalarioPorSetor);
    google.charts.setOnLoadCallback(loadEmpresasPorBairro);
    google.charts.setOnLoadCallback(loadPessoasPorGenero);
    google.charts.setOnLoadCallback(loadCurriculosPorBairro);
    google.charts.setOnLoadCallback(loadVagasPorBairro);
    google.charts.setOnLoadCallback(loadMediaIdadeSexo);
    google.charts.setOnLoadCallback(loadMediaIdadeBairro);

    /**
     * OK
     */
    function loadSalarioPorSetor()
    {
      $.ajax({
          url: "/salario/by-setor",
          dataType: "JSON",
          success: function(jsonData) 
          {
            var dataArray = [
              ['Setor', 'Salário'],
            ];

            for (var i = 0; i < jsonData.length; i++)
              dataArray.push([jsonData[i].setor, parseFloat(jsonData[i].media_salario_setor)]);
            
            var options = {
              title: 'Salário por Setor',
              is3D: true,
            };

            var data = google.visualization.arrayToDataTable(dataArray);
            var chart = new google.visualization.ColumnChart(document.getElementById('faixa_salarial_barchart_material'));
                chart.draw(data, options);
          }
      });
    }

    /**
     * OK
     */
    function loadEmpresasPorBairro() 
    {
      $.ajax({
        url: "/empresa/by-bairro",
        dataType: "JSON",
        success: function(jsonData) {
          
          var dataArray = [
            ['Bairro', 'Quantidade'],
          ];

          for (var i = 0; i < jsonData.length; i++) {
            dataArray.push([jsonData[i].bairro, parseInt(jsonData[i].empresas_por_bairro)]);         
          }

          var data = google.visualization.arrayToDataTable(dataArray);
          var chart = new google.visualization.BarChart(document.getElementById('empresas_bairro_chart_div'));
          chart.draw(data);        
        }
      });
    }


    function loadPessoasPorGenero() 
    {
      $.ajax({
      url: "/pessoa/by-sexo",
      dataType: "JSON",
      success: function(jsonData) {

        var dataArray = [
          ['Genero', 'Total'],
        ];

        for (var i = 0; i < jsonData.length; i++) {
         
          dataArray.push([jsonData[i].genero, parseInt(jsonData[i].pessoas_por_sexo)]);         
        }

        console.log(dataArray);


        var options = {
          title: "Pessoas Por Gênero",       
          
        };

        var data = google.visualization.arrayToDataTable(dataArray);

        var chart = new google.visualization.PieChart(document.getElementById('pessoa_sexo_chart_div'));

        chart.draw(data, options);
        
      }
    });
    }

    function loadCurriculosPorBairro() 
    {
      $.ajax({
      url: "/curriculo/by-bairro",
      dataType: "JSON",
      success: function(jsonData) {

        console.log(jsonData)


        var dataArray = [
          ['Bairro', 'Quantidade'],
        ];

        for (var i = 0; i < jsonData.length; i++) {
          var row = [jsonData[i].bairro, parseInt(jsonData[i].quantidade)];
          dataArray.push(row);
          
        }

        var options = {
          title: "",       
          legend: {
            position: "none"
          },
        };

        var data = google.visualization.arrayToDataTable(dataArray);

        var chart = new google.visualization.BarChart(document.getElementById('curriculos_bairro_chart_div'));
        
        chart.draw(data, options);
        
      }
    });
    }

    function loadVagasPorBairro() 
    {
      $.ajax({
      url: "/vaga/by-bairro",
      dataType: "JSON",
      success: function(jsonData) {
        var dataArray = [
          ['Bairro', 'Quantidade de Vagas'],
        ];



        for (var i = 0; i < jsonData.length; i++) {
          var row = [jsonData[i].bairro, parseInt(jsonData[i].vagas_por_bairro)];
          dataArray.push(row);         
        }
        var options = {
          title: "",       
          
        };

        var data = google.visualization.arrayToDataTable(dataArray);

        var chart = new google.visualization.PieChart(document.getElementById('vaga_bairro_chart_div'));

        chart.draw(data, options);
        
      }
      });
    }

    function loadMediaIdadeSexo()
    {
      $.ajax({
      url: "/idade/by-sexo",
      dataType: "JSON",
      success: function(jsonData) {
        var dataArray = [
          ['Genero', 'Idade'],
        ];

        for (var i = 0; i < jsonData.length; i++) {
          var row = [jsonData[i].genero, parseInt(jsonData[i].idade)];
          dataArray.push(row);         
        }


        var options = {
          title: "",       
         
        };

        var data = google.visualization.arrayToDataTable(dataArray);

        var chart = new google.visualization.PieChart(document.getElementById('media_idade_sexo_chart_div'));

        chart.draw(data, options);
        
      }
    });

    }

    function loadMediaIdadeBairro()
    {
      $.ajax({
      url: "/idade/by-bairro",
      dataType: "JSON",
      success: function(jsonData) {
        var dataArray = [
          ['Bairro', 'Idade'],
        ];

        for (var i = 0; i < jsonData.length; i++) {
          var row = [jsonData[i].bairro, parseInt(jsonData[i].idade)];
          dataArray.push(row);         
        }

        var options = {
          title: "",       
          legend: {
            position: "none"
          },
        };

        var data = google.visualization.arrayToDataTable(dataArray);

        var chart = new google.visualization.BarChart(document.getElementById('media_idade_bairro_chart_div'));

        chart.draw(data, options);
        
      }
    });

    }
  </script>

  
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
    <?php include  VIEWS . "/../Includes/header.php" ?>
  </header>
  <center>
    <section class="box">
      <div class="container text-center m-3">
        <div class="row">
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

          <div class="card text-center">
              <div class="card-header">
                <b>Empresa:</b> Quantidade de Empresas por Bairro
              </div>
              <div class="card-body">
                <div id="empresas_bairro_chart_div"></div>
              </div>
              <div class="card-footer text-muted">
                Ultima atualização, há 1 hora.
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card text-center m-3">
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
        </div>
      </div>

      <div class="card text-center m-3">
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


      <div class="card text-center m-3">
        <div class="card-header">
          <b>Vagas:</b> Vagas por Bairros
        </div>
        <div class="card-body">
          <div id="vaga_bairro_chart_div" style="width: 1000px; height: 300px;"></div>
        </div>
        <div class="card-footer text-muted">
          Ultima atualização, há dois dias.
        </div>
      </div>

      <div class="card text-center m-3">
        <div class="card-header">
          <b>Currículo:</b> Média de Idade Por Bairro
        </div>
        <div class="card-body">
          <div id="media_idade_bairro_chart_div" style="width: 1000px; height: 300px;"></div>
        </div>
        <div class="card-footer text-muted">
          Ultima atualização, há dois dias.
        </div>
      </div>

      <div class="card text-center m-3">
        <div class="card-header">
          <b>Currículo:</b> Média de Idade Por Sexo
        </div>
        <div class="card-body">
          <div id="media_idade_sexo_chart_div" style="width: 1000px; height: 300px;"></div>
        </div>
        <div class="card-footer text-muted">
          Ultima atualização, há dois dias.
        </div>
      </div>

    </section>
  </center>

  <?php include  VIEWS . '/../Includes/Bootstrap/js_config.php' ?>

  <?php include  VIEWS . "/../Includes/Bootstrap/css_config.php" ?>

  <?php //include  VIEWS . "/../Includes/Graficos/PessoaSexo.php" ?>
  <?php //include  VIEWS . "/../Includes/Graficos/CurriculosBairro.php" ?>
  <?php //include  VIEWS . "/../Includes/Graficos/EmpresasBairro.php" ?>
  <?php //include  VIEWS . "/../Includes/Graficos/FaixaSalarial.php" ?>
  <?php //include  VIEWS . "/../Includes/Graficos/MediaIdadeBairro.php" ?>
  <?php //include  VIEWS . "/../Includes/Graficos/MediaIdadeSexo.php" ?>
  <?php //include  VIEWS . "/../Includes/Graficos/VagasBairro.php" ?>
</body>

</html>