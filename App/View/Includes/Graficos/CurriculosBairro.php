<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['bar']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    $.ajax({
      url: "/curriculo/by-bairro",
      dataType: "JSON",
      success: function(jsonData) {
        var dataArray = [
          ['Bairro', 'Quantidade'],
        ];

        for (var i = 0; i < jsonData.length; i++) {
          var row = [jsonData[i].bairro, jsonData[i].quantidade];
          dataArray.push(row);
          console.log(jsonData[i].bairro)
        }

        var options = {
          title: "",       
          legend: {
            position: "none"
          },
        };

        var data = google.visualization.arrayToDataTable(dataArray);

        var chart = new google.visualization.ColumnChart(document.getElementById('curriculos_bairro_chart_div'));
        
        chart.draw(data, options);
        
      }
    });
  }
</script>