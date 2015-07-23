<?
	require('../_class/_class_csf.php');
	$csf = new csf;
	$total = $csf->total_bolsistas();
	
	echo '<div id="content">';
	echo '<div style="text-align: justify">';
	$txt = troca($txt,' 50 ',' '.$total.' '); 
	echo $txt;
	
?>
	<body style="font-family: Arial;border: 0 none;">
	<div style="text-align: justify">
		<!--Chama metodo que gerar os dados: -->
		<center><?php echo $csf->estudante_area();?></center>

		
	</div>


