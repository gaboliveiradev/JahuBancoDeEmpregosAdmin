<script type="module">
 
 google.charts.load('current', {'packages':['corechart']});

  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    $.ajax({
      url: "/pessoa/by-sexo",
      dataType: "JSON",
      success: function(jsonData) {

        var dataArray = [
          ['Genero', 'Total'],
        ];

        for (var i = 0; i < jsonData.length; i++) {
         
          dataArray.push([jsonData[i].genero, jsonData[i].pessoas_por_sexo]);         
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
</script>