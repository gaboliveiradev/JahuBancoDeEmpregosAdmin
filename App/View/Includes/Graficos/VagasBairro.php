
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Nome dos Bairros', 'Vagas Ofertadas',],
      ['Distrito Industrial', 18],
      ['Centro', 15],
      ['Jardim Carolina', 9],
      ['Jardim América', 2],
      ['Jardim Parati', 1]
    ]);

    var options = {
      legend: { position: 'none' },
      isStacked: 'percent',
      chart: {
        title: '',
        subtitle: '',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('vaga_bairro_chart_div'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>