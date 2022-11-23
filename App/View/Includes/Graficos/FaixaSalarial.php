<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Setores', 'Administração', 'TI', 'Marketing', 'RH', 'RP'],
          ['Salários', 4300, 8900, 5100, 3400, 6790],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          },
          bars: 'vertical' 
        };

        var chart = new google.charts.Bar(document.getElementById('faixa_salarial_barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>