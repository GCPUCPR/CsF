<?
	require('../_class/_class_csf.php');
	$csf = new csf;
	
	//Chama metodo que gera os quadros estatisticos
	$total = $csf->total_bolsistas();
	$totali = $csf->total_inscricoes();
?>
<body style="font-family: Arial;border: 0 none;">
<div style="text-align: justify">
<?php

	echo '<table width="100%">';
	echo '<TR><TD align="center" width="50%" class="">';
	echo 'Total de alunos<BR><h2>'.$total.'</h2>';      
	//echo '<TD align="center" width="50%" class="">';  
	//echo 'Total de inscritos<BR><h2>'.$totali.'</h2>'; 
	echo '</table>';
	
?>
</div>
<!--Chama metodo que gera os mapas e tabela dinamicos -->
	<center><?php echo $csf->world_mapa_estudantes(); ?></center>

	<!--
	<div style="text-align: justify">
		<BR><BR><center><h2><?=msg('est_no_ext');?></h2></center>
	   	<div style="text-align: justify">
	   		<?php echo msg("csf_mapa_foot"); ?>
	   	</div>
		<!--Chama metodo que gera a relacao dos alunos por curso e pais -->		
		<!--<?php echo $csf->lista_inscritos();?></div>-->