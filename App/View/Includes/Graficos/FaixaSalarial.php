<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(loadSalarioPorSetor);

  function loadSalarioPorSetor()
  {
    var data = google.visualization.arrayToDataTable([
          ['Gênero', 'Quantidade'],
          ['Ind', 1517.53],
          ['Ser', 13438.5]          
        ]);

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

          console.log(dataArray);

          var data = google.visualization.arrayToDataTable(dataArray);
          var chart = new google.visualization.ColumnChart(document.getElementById('faixa_salarial_barchart_material'));
              chart.draw(data, options);
        }
    });
  }
</script>