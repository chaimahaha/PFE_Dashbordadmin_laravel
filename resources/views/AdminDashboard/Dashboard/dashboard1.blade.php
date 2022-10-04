@extends('AdminDashboard.layouts.sidebar')
@section('title')
Dashboard
@endsection
@section('content')
<div class="card-body"> 
  <div class="row "> 
    <div class="col-sm-6 form-group"><br>
      <figure class="highcharts-figure">
        <div id="piechart"style="height: 400px;">
      </div>
      </figure>
    </div>
    <div class="col-sm-6 form-group"><br>
      <figure class="highcharts-figure">
        <div id="container3"></div>
      </figure>
    </div>
    <div class="col-sm-6 form-group"><br>
      <figure class="highcharts-figure">
        <div id="container4"></div>
      </figure>
    </div>
    <div class="col-sm-6 form-group"><br>
      <figure class="highcharts-figure">
        <div id="container5"></div>
      </figure>
    </div>
  </div>
  <div class="d-flex justify-content-center p-2">
    <a  href="/pie">Afficher plus</a>
  </div>
  </div>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script >
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
<script type="text/javascript">     
  var arraydata3 = {{ json_encode($confs,JSON_NUMERIC_CHECK) }};
    var arraydata4 = {{ json_encode($formations,JSON_NUMERIC_CHECK) }};
    Highcharts.chart('container3', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Statistiques des manifestations'
    },
    xAxis: {
      categories: ['Manifestations'],
      title: {
        text: null
      }
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Nombres',
        align: 'high'
      },
      labels: {
        overflow: 'justify'
      }
    },
   
    plotOptions: {
      bar: {
        dataLabels: {
          enabled: true
        }
      }
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'top',
      x: -40,
      y: 80,
      floating: true,
      borderWidth: 1,
      backgroundColor:
        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
      shadow: true
    },
    credits: {
      enabled: false
    },
    series: [{
      name: 'Conferences',
      data: arraydata3
    }, {
      name: 'Formations',
      data: arraydata4
    }]
  });
    var arraydata5 = {{ json_encode($arts,JSON_NUMERIC_CHECK) }};
    var arraydata6 = {{ json_encode($brevs,JSON_NUMERIC_CHECK) }};
    var arraydata7 = {{ json_encode($ouvs,JSON_NUMERIC_CHECK) }};
    var arraydata8 = {{ json_encode($chaps,JSON_NUMERIC_CHECK) }};
    var arraydata9 = {{ json_encode($confes,JSON_NUMERIC_CHECK) }};
    Highcharts.chart('container4', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Nombre des publications'
      },
      
      xAxis: {
        categories: [
         'Publications'
        ],
        crosshair: true
      },
      yAxis: {
        title: {
          useHTML: true,
          text: 'Nombre de Publications'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
      name: 'Articles Scientifique',
      data: [arraydata5]
  
    }, {
      name: 'Brevets',
      data: [arraydata6]
  
    }, {
      name: 'Ouvrages',
      data: [arraydata7]
  
    }, {
      name: 'Chapitres d\'ouvrage',
      data: [arraydata8]
  
    },{
      name:'Conference',
      data :[arraydata9]
    }]
    });
          var proddatah = {{ json_encode($hab,JSON_NUMERIC_CHECK) }};
          var proddatam = {{ json_encode($masters,JSON_NUMERIC_CHECK) }};
          var proddatap = {{ json_encode($pfes,JSON_NUMERIC_CHECK) }};
          var proddatat = {{ json_encode($theses,JSON_NUMERIC_CHECK) }};
          Highcharts.chart('container5', {
            chart: {
              type: 'column'
            },
            title: {
              text: 'Nombre des productions'
            },
            
            xAxis: {
              categories: [
               'Productions'
              ],
              crosshair: true
            },
            yAxis: {
              title: {
                useHTML: true,
                text: 'Nombre de Productions'
              }
            },
            tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
            },
            plotOptions: {
              column: {
                pointPadding: 0.2,
                borderWidth: 0
              }
            },
            series: [{
            name: 'Habilitations',
            data: [proddatah]
        
          }, {
            name: 'Masters',
            data: [proddatam]
        
          }, {
            name: 'PFEs',
            data: [proddatap]
        
          }, {
            name: 'Théses',
            data: [proddatat]
          }]
          });
  </script>    
@endsection
    
