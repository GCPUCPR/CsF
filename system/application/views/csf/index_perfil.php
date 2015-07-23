<?
	require('../_class/_class_csf.php');
	$csf = new csf;
	
	$total = $csf->total_bolsistas();
?>
	<body style="font-family: Arial;border: 0 none;">
	<div style="text-align: justify">

</div>

<!--Chama metodo que gerar os dados: -->
  
    <!--Chama metodo para: grafico e tabela de paises onde os alunos estão -->
    <center><?php echo $csf->estudante_perfil();?></center>

	
	<!--
	<center><?php echo $csf->estudantes_genero();?></center>
	<center><?php echo $csf->grafico_estudantes_genero();?></center>
	<center><?php echo $csf->estudantes_curso_instituicao();?></center>	
	<center><?php echo $csf->lista_bolsistas();?></center>
	<center><?php echo $csf->world_mapa_onde();?></center>	
	-->	
