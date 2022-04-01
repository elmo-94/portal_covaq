<!--

  How to use Google JS Visualization Api offline, step by step

  this approach might work with other libraries loaded with google.load, after all it's still JavaScript!!!

-->
<?php include 'config.php'; 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
      Google Visualization API Sample
    </title>
    <link src="gviz_tooltip.css" rel="stylesheet">
    <!-- step 1: Run with these uncommented, with the inspector open on Network panel -->
    <!--
      <script type="text/javascript" src="http://www.google.com/jsapi"></script>
      <script type="text/javascript">
        google.load('visualization', '1', {packages: ['corechart']});
      </script>
    -->


    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/jsapi.js"></script>
    <!--
      step 2: Look for a request similar to: http://www.google.com/uds/api/visualization/1.0/9eca2fc9082ae71a955f5f6b22ee82f9/format+en,default,corechart.I.js

      copy the contents (body) of the request to uds_api_contents.js (referenced below)
    -->
    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/uds_api_contents.js"></script>

    <!-- there's no step 3, youknow! -->

    <script type="text/javascript">
      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
        ['Year', 'Entradas', 'Saidas', 'Saldo'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        new google.visualization.BarChart(document.getElementById('visualization')).
        draw(
          data,
          {
            curveType: "function",
            width: 500, height: 400,
            vAxis: { maxValue: 10 }
          }
        );
      }


      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
  <body style="font-family: Arial;border: 0 none;">
    <div id="visualization" style="width: 1000px; height: 600px;"></div>
  </body>
</html>