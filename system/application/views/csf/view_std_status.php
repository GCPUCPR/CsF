<?php
$dados = '';
foreach ($dado as $key => $value) {
	$dados .= "['$key',   $value],";
}
?>
<!-- Grafico HighChart--->
<script type="text/javascript">
	$(function() {
		$('#gr2').highcharts({
			chart : {
				type : 'bar'
			},
			title : {
				text : 'Situação dos estudantes'
			},
			subtitle : {
				//text : 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
			},
			xAxis : {
				type : 'category',
				labels : {
					rotation : 0,
					style : {
						fontSize : '10px',
						fontFamily : 'Verdana, sans-serif'
					}
				}
			},
			yAxis : {
				min : 0,
				title : {
					text : 'Escala'
				}
			},
			legend : {
				enabled : false
			},
			tooltip : {
				pointFormat : '<b>{point.y:.0f}</b> Estudantes'
			},
			series : [{
				name : 'Population',
				data : [<?php echo "$dados" ?>],
				dataLabels : {
					enabled : true,
					rotation : 0,
					color : '#FFFFFF',
					align : 'right',
					format : '{point.y:.0f}', // no decimal in number, format for inbteger
					y : 3, // 3 pixels down from the top
					style : {
						fontSize : '10px',
						fontFamily : 'Verdana, sans-serif'
					}
				}
			}]
		});
	}); 
</script>


