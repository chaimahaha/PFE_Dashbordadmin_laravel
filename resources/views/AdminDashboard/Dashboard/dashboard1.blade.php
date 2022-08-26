@extends('AdminDashboard.layouts.sidebar')
@section('title')
    Dashboard
@endsection
@section('script')   
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Grade', 'Membre'],
            <?php echo $chartsData ?>
        ]);

        var options = {
          title: 'Membres par grade',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@endsection
@section('content')
    <div id="piechart" style="width: 450px; height: 350px;"></div>
@endsection
