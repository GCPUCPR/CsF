<?php 
if ($this -> idioma == 'en') {
?>
<!-- Inserir no header, logo após a abertura do body -->
    <div id="barra_institucional">
      <div class="cont_barra_inst">
          <div class="menu_institucional">
            <a href="http://www.pucpr.br/institucional/index.php" target="_blank">
              <div class="menu_inst_1" >The University</div>
            </a>
            <a class="menu_inst_2" href="http://www.grupomarista.org.br/" target="_blank">
              <div class="menu_inst_2" >Marista group</div>
            </a>
            <a class="menu_inst_3" href="http://www.pucpr.br" target="_blank">
              <div class="menu_inst_3" >Go to the website PUCPR</div>
            </a>
          </div>
          <a href="http://www.pucpr.br" target="_blank">
            <div class="logo_pucpr_topo">
            </div>
          </a>
      </div>
    </div>
<?php
} else {
?>	
<!-- Inserir no header, logo apÃ³s a abertura do body -->
<div id="barra_institucional">
	<div class="cont_barra_inst">
		<div class="menu_institucional">
			<a href="http://www.pucpr.br/institucional/index.php" target="_blank">
			<div class="menu_inst_1" >A Universidade</div> </a>
			<a class="menu_inst_2" href="http://www.grupomarista.org.br/" target="_blank">
			<div class="menu_inst_2" >Grupo Marista</div> </a>
			<a class="menu_inst_3" href="http://www.pucpr.br" target="_blank">
			<div class="menu_inst_3" >Ir para o site da PUCPR</div> </a>
		</div>
		<a href="http://www.pucpr.br" target="_blank"> <div class="logo_pucpr_topo"></div> </a>
	</div>
</div>

<style>
	div2
		{
			border: 1px solid #000000;
			background-color: #e0e0FF;
		}
</style>
<?php
}

?> 