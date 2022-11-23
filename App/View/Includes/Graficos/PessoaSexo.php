<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Feminino', <?= 1 ?>],
          ['Masculino', <?= 2 ?>]
        ]);
        var options = {'title':'Curriculos por sexo', 'width':400, 'height':300};
      
        var chart = new google.visualization.PieChart(document.getElementById('pessoa_sexo_chart_div'));
        chart.draw(data, options);
    }
</script>