<?php include "config/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<?php include ("vista/head.php"); ?>
    <title>bar chart-amcharts-php</title>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
		<!-- <script src="https://www.amcharts.com/lib/3/pie.js"></script> -->
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
		<link  type="text/css" href="https://cdn.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet">

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.12/plugins/export/export.min.js"></script>
		<style>
		    #chartdiv {
		      width: 100%;
		      height: 500px;
		    }
		    </style>

</head>
<body>
	<div >

		<h3>Contador de impresoras</h3>
		<a href="impresoras.php" class="btn btn-sm btn-danger">Volver</a>
	</div>
  <form class="form-horizontal" action="config/chart_impr.php" method="POST">
  <?php
  $sql = mysqli_query($conn,"SELECT DISTINCT id_impresora,nombre_imp FROM impresora_contador ORDER BY id_impresora");
  echo "<select id='chartType' name='myselectbox' required>
    <option value=''>Seleccione una impresora</option>";
    while ($row = mysqli_fetch_assoc($sql)) {
      echo "<option value='$row[nombre_imp]'>$row[nombre_imp]</option>"; // if you want to
      //get the name into table, then use like this
      //echo "<option value='$row[name]'>$row[name]</option>";  or
      //echo "<option>$row[name]</option>";
    }
    echo "</select>";
    ?>
        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-sm" value="Elegir">
  </form>
    <div id="chartdiv" style="width: 100%; height: 700px;"></div>
    <div id="show">
      <!-- ITEMS TO BE DISPLAYED HERE -->
    </div>

    <!-- <script type="text/javascript">
  $(document).ready(function(){ /* PREPARE THE SCRIPT */
    $("#myselectbox").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
      var myselectbox = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
      var dataString = "myselectbox="+myselectbox; /* STORE THAT TO A DATA STRING */

      $.ajax({ /* THEN THE AJAX CALL */
        type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
        url: "config/chart_impr.php", /* PAGE WHERE WE WILL PASS THE DATA */
        data: dataString, /* THE DATA WE WILL BE PASSING */
        success: function(result){ /* GET THE TO BE RETURNED DATA */
          $("#show").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
        }
      });

    });
  });
</script> -->

<script>
// AmCharts.loadFile("config/chart_impr.php", {}, function(data) { //esto sirve para crear un array y tratarlo como un objeto
//   var chartData = AmCharts.parseJSON(data);
// 	chart.dataProvider = chartData;
//   console.log(chartData); // this will output an array
// });
// function labelFunction(item, text) {
//   if (text == "total") {
//     var index = item.index;
//     var serialDataItem = chart.chartData[index];
//     var valueAxes = serialDataItem.axes;
//     var sum = 0;
//     for (var a in valueAxes) {
//       var graphs = valueAxes[a].graphs;
//       for (var g in graphs) {
//         var graph = graphs[g];
//         if (!graph.graph.hidden) {
//           sum += graph.values.value;
//         }
//       }
//     }
//     return AmCharts.roundTo(sum, 5);
//   }
// }
var chart = AmCharts.makeChart("chartdiv", {
	"legend": {
    "useGraphSettings": true
  },
  "type": "serial",
	"theme": "light",

  "dataLoader": {
    "url": "config/chart_impr.php",
		"format" : "json",
		"init": function ( options, chart ) {
			console.log( 'Cargando Datos' );
		},
		"load": function ( options, chart ) {
			console.log( 'Archivo cargado: ' + options.url );
		},
		"complete": function ( chart ) {
			console.log( 'Woohoo! A terminado de cargar' );
		},
		"error": function ( options, chart ) {
			console.log( 'Ummm algo salió mal al argar este archivo: ' + options.url );
		},
		"progress": function( totalPercent, filePercent, url ) {
			console.log( 'Total porcentaje cargado: ' + Math.round( totalPercent ) );
		},
		"showErrors": true,
		"delimiter": ",",       // column separator
		"useColumnNames": true, // use first row for column names
		"skip": 1,               // skip header row
		"async": true
  },
	"export": {
		"enabled": true
	},
  "valueAxes": [{
		"stackType": "regular",
    "gridColor": "#66ccff",
    "gridAlpha": 0.2,
    "dashLength": 0,
  }],
  "gridAboveGraphs": true,
  "startDuration": 2,
	"plotAreaBorderAlpha": 0.2,

  "graphs": [{
		"fillColors": "blue",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "Impresion",
		"title": "Impresion",
		"balloonText": "[[title]] :<b>[[value]]</b>"
  },{
		"fillColors": "green",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "Copia",
		"title": "Copia",
		"balloonText": "[[title]] :<b>[[value]]</b>"

  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "nombre",
	"categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0.02,
    "tickPosition": "start",
    "tickLength": 0,
		"labelRotation": 90

  }

});

/**
 * Add guides to simulate secondary category axis
 */
// AmCharts.addInitHandler( function( chart ) {
//
//   // check if "secondCategoryField" is set
//   if ( chart.secondCategoryField === undefined )
//     return;
//
//   // init guides array
//   if ( chart.categoryAxis.guides === undefined )
//     chart.categoryAxis.guides = [];
//
//   // add a guide for each category
//   for( var x = 0; x < chart.dataProvider.length; x++ ) {
//     chart.categoryAxis.guides.push( {
//       "category": chart.dataProvider[ x ][ chart.categoryField ],
//       "toCategory": chart.dataProvider[ x ][ chart.categoryField ],
//       "expand": true,
//       "label": chart.dataProvider[ x ][ chart.secondCategoryField ],
//       "position": "top",
//       "tickLength": 0
//     } );
//   }
//
// }, [ "serial" ] );


</script>
</body>
</html>
