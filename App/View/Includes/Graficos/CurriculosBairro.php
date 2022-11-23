<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Nome dos Bairros', 'Quantidade de Currículos',],
      ['Jardim Juliana', 3],
      ['Jardim Dona Emília', 7],
      ['Jardim Carolina', 9],
      ['Jardim Paulista', 4]
    ]);

    var options = {
      chart: {
        title: '',
        subtitle: '',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('curriculos_bairro_chart_div'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>