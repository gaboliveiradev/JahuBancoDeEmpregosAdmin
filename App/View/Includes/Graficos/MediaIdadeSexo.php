<script type="text/javascript">
 google.charts.load('current', {'packages':['corechart']});

  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
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
</script>