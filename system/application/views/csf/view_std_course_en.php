<?php
$dados = '';
foreach ($dado_course as $key => $value) {
	$dados .= "['$key',   $value],";
}
?>
<!-- Grafico HighChart--->
<script type="text/javascript">
	$(function() {
		$('#graf-2').highcharts({//alterar nome da div para cada grafico
			chart : {
				type : 'line'
			},
			title : {
				text : 'Courses that send more students:'
			},
			subtitle : {
				text : 'Top 7'
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
					text : 'Number of students'
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
<div id="graf-2" style="width: 800px; height: 400px; margin: 0 auto padding-bottom: 8px; border: 1px solid #AF3E4D; margin-top: 150px; "></div>
<br />



