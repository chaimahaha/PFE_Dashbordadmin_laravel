@extends('AdminDashboard.layouts.sidebar')
@section('title')
Dashboard
@endsection
@section('content')
<div class="col-sm-6 form-group"><br>
    <figure class="highcharts-figure">
      <div id="piechart2" style="width: 450px; height: 350px;">
    </div>
    <div class="d-flex justify-content-center p-2">
      <a  href="/dash">Afficher moins</a>
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
            <?php echo $chartsData ?>
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