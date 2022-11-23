
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Sexo', 'Media',],
      ['Masculino', 55.2],
      ['Fermino', 22.5],
    ]);

    var options = {
      legend: { position: 'none' },
      isStacked: 'percent',
      chart: {
        title: '',
        subtitle: '',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('media_idade_sexo_chart_div'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>