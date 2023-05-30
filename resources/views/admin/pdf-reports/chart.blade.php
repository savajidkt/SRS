<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

		</style>
	</head>
	<body>

<script src="{{asset('highcharts.js')}}"></script>
<script src="{{asset('modules/exporting.js')}}"></script>
<script src="{{asset('modules/export-data.js')}}"></script>
<script src="{{asset('modules/accessibility.js')}}"></script>
<figure class="highcharts-figure">
    <div id="container"></div>
</figure>
<script>
// var pieColors = (function () {
//     var colors = [],
//         base = Highcharts.getOptions().colors[0],
//         i;

//     for (i = 0; i < 10; i += 1) {
//         // Start out with a darkened base color (negative brighten), and end
//         // up with a much brighter color
//         colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
//     }
//     return colors;
// }());
var colorsA = ['#FF530D', '#E82C0C', '#FF0000', '#E80C7A', '#E80C7A','#E80CBB'];
// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in February, 2022'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            colors: colorsA,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                distance: -50,
                filter: {
                    property: 'percentage',
                    operator: '>',
                    value: 4
                }
            }
        }
    },
    series: [{
        name: 'Share',
        data: [
            { name: 'Chrome', y: 74.03 },
            { name: 'Edge', y: 12.66 },
            { name: 'Firefox', y: 4.96 },
            { name: 'Safari', y: 2.49 },
            { name: 'Internet Explorer', y: 2.31 },
            { name: 'Other', y: 3.398 }
        ]
    }]
});

document.querySelector('.highcharts-credits').style.display = 'none';
document.querySelector('.highcharts-exporting-group').style.display = 'none';
</script>
	</body>
</html>