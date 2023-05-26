<script type="text/javascript">
 google.charts.load('current', {'packages':['corechart']});

  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    $.ajax({
      url: "/vaga/by-bairro",
      dataType: "JSON",
      success: function(jsonData) {
        var dataArray = [
          ['Bairro', 'Quantidade de Vagas'],
        ];



        for (var i = 0; i < jsonData.length; i++) {
          var row = [jsonData[i].bairro, jsonData[i].vagas_por_bairro];
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
</script>