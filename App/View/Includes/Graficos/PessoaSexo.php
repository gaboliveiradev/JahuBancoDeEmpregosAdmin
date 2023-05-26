<script type="text/javascript">
 google.charts.load('current', {'packages':['corechart']});

  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    $.ajax({
      url: "/pessoa/by-sexo",
      dataType: "JSON",
      success: function(jsonData) {
        var dataArray = [
          ['Setor', 'Salário'],
        ];



        for (var i = 0; i < jsonData.length; i++) {
          var row = [jsonData[i].genero, jsonData[i].pessoas_por_sexo];
          dataArray.push(row);         
        }
        var options = {
          title: "",       
          
        };

        var data = google.visualization.arrayToDataTable(dataArray);

        var chart = new google.visualization.PieChart(document.getElementById('pessoa_sexo_chart_div'));

        chart.draw(data, options);
        
      }
    });
  }
</script>