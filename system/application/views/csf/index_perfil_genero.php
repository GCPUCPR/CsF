<?
	require('../_class/_class_csf.php');
	$csf = new csf;
	
	//Chama metodo que gera os quadros estatisticos
	$total_masc = $csf->estudantes_genero_masc();
	$total_fem = $csf->estudantes_genero_fem();
?>
<body style="font-family: Arial;border: 0 none;">
<div style="text-align: justify">
	<?php
		echo '<table width="60%" align="center">';
		echo '<TR><TD align="center" width="50%" class="">';
		echo '<img src="img/ico_masc.jpg"><BR>Masculino<BR><h2>'.$total_masc.'</h2>';
		echo '<TD align="center" width="50%" class="">'; 
		echo '<img src="img/ico_fem.jpg"><BR>Feminino<BR><h2>'.$total_fem.'</h2>'; 
		echo '</table>';
	?>
</div>
		<!--Chama metodo para: grafico e tabela de paises onde os alunos estão 
		<?php echo $csf->estudantes_genero();?>
		<br/>-->
		<?php echo $csf->grafico_estudantes_genero();?>	

</div>


