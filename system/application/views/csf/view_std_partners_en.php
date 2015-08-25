<?php
$dados = '';
foreach ($dado_partners as $key => $value) {
	$dados .= "['$key',   $value],";
}
?>

<!-- Grafico HighChart--->
<script type="text/javascript">
	$(function() {
		//alterar nome da div para cada grafico
		$('#graf').highcharts({
			chart : {
				type : 'bar'
			},
			title : {
				text : 'SwB Partners:'
			},
			subtitle : {
				text : 'Top 7'
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
					text : 'Number of Scholarships'
				}
			},
			legend : {
				enabled : false
			},
			tooltip : {
				pointFormat : '<b>{point.y:.0f}</b> Students'
			},
			series : [{
				name : 'Population',
				color: '#B21120',
				data : [<?php echo "$dados" ?>],
				dataLabels : {
					enabled : true,
					rotation : 0,
					color : '#FFFFFF',
					align : 'center',
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
<div id="graf" style="width: 800px; height: 400px; margin: 0 auto padding-bottom: 8px; border: 1px solid #AF3E4D; margin-top: 150px; "></div>
<br />
