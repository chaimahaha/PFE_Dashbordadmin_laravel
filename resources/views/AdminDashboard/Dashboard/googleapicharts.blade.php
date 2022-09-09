@extends('AdminDashboard.Dashboard.dashboard1')
@section('content1')
<div class="col-sm-6 form-group"><br>
    <figure class="highcharts-figure">
      <div id="piechart" style="width: 450px; height: 350px;">
    </div>
    </figure>
  </div>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script >
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data2 = google.visualization.arrayToDataTable([
          ['Classe', 'Conférence'],
            <?php echo $chartsDatas ?>
        ]);
        var options2 = {
          title: 'Conférence par classe',
          pieHole: 0.4,
        }; 
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data2, options2);  
      }
</script>
@endsection