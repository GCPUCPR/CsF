<?
	require('../_class/_class_csf.php');
	$csf = new csf;
	
	$total = $csf->total_bolsistas();
?>
	<body style="font-family: Arial;border: 0 none;">
	<div style="text-align: justify">

</div>
    <!--Chama metodo para: grafico e tabela de paises onde os alunos estão -->
    <center><?php echo $csf->estudante_perfil();?></center>
	

	
