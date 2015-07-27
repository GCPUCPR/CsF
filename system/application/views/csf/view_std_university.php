<?php
$dados = '';
foreach ($dado_university as $key => $value) {
	$dados .= "['$key',   $value],";
}
?>
<!-- Grafico HighChart--->
<script type="text/javascript">
	$(function() {
		$('#gr4').highcharts({//alterar nome da div para cada grafico
			chart : {
				type : 'column'
			},
			title : {
				text : 'Universidades de destino...:'
			},
			subtitle : {
				text : 'Top 10'
			},
			xAxis : {
				type : 'category',
				labels : {
					rotation : -45,
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
					rotation : -45,
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


