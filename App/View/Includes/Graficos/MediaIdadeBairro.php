
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Nome dos Bairros', 'Media',],
      ['Jardim Dona Emilia', 55.2],
      ['Centro', 22.5],
      ['Jardim Carolina', 58.2],
      ['Jardim América', 33.2],
      ['Jardim Parati', 21.4]
    ]);

    var options = {
      legend: { position: 'none' },
      isStacked: 'percent',
      chart: {
        title: '',
        subtitle: '',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('media_idade_bairro_chart_div'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>