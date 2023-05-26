<script type="text/javascript">
 google.charts.load('current', {'packages':['corechart']});

  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    $.ajax({
      url: "/salario/by-setor",
      dataType: "JSON",
      success: function(jsonData) {
        var dataArray = [
          ['Setor', 'Salário'],
        ];



        for (var i = 0; i < jsonData.length; i++) {
          var row = [jsonData[i].setor, jsonData[i].media_salario_setor];
          dataArray.push(row);         
        }
        var options = {
          title: "",       
          
        };

        var data = google.visualization.arrayToDataTable(dataArray);

        var chart = new google.visualization.PieChart(document.getElementById('faixa_salarial_barchart_material'));

        chart.draw(data, options);
        
      }
    });
  }
</script>