<script type="text/javascript">
 google.charts.load('current', {'packages':['corechart']});

  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
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