// AmCharts.loadFile("config/data.php", {}, function(data) { //esto sirve para crear un array y tratarlo como un objeto
//   var chartData = AmCharts.parseJSON(data);
//   console.log(chartData); // this will output an array
// });
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "dataLoader": {
    "url": "config/data.php",
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
    "gridColor": "#66ccff",
    "gridAlpha": 0.2,
    "dashLength": 0
  }],
  "gridAboveGraphs": true,
  "startDuration": 2,
  "graphs": [{
		"fillColors": "blue",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "valor",
		"title": "Registros",
		"balloonText": "[[title]] de [[category]]:<b>[[value]]</b>"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "Edificio",
	"categoryAxis": {
		// "autoGridCount": false,
		"gridPosition": "start",
		"axisColor": "#006666",
		"labelRotation": 90
	}

});
function setDataSet(dataset_url) {
  AmCharts.loadFile(dataset_url, {}, function(data) {
    chart.dataProvider = AmCharts.parseJSON(data);
    chart.validateData();
  });
}
