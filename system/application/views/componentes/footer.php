<?php 
	if ($this -> idioma == 'en') {
?>
<footer>
	<br/>

	<p class="pull-right">
		<a href="#">Back to the top</a>
	</p>

	<p>
		<!--Botao para retorna a pag anterior-->
		<form>
	    <input type="button" value="Back"onClick="JavaScript: window.history.back();">
		</form>
		<br/>
		<a href="http://www.pucpr.br/index.php" target="_blank"><strong>Pontifícia Universidade Católica do Paraná</strong></a>
	</p>
	<p>
		Coordination of the Science without Borders PUCPR
		<br />
		(41) 3271-2112 | 3271-1602
		<br />
		csf@pucpr.br
	</p>
</footer>
<?php
	} else {
?>
<footer>
	<br/>
	<p class="pull-right">
		<a href="#">Voltar para o topo</a>
	</p>
	<p>
		<!--Botao para retorna a pag anterior-->
		<form>
	    <input type="button" value="Voltar"onClick="JavaScript: window.history.back();">
		</form>
		<br/>
		<a href="http://www.pucpr.br/index.php" target="_blank"><strong>Pontifícia Universidade Católica do Paraná</strong></a>
	</p>
	<p>
		Coordenação do Ciência sem Fronteiras da PUCPR
		<br />
		(41) 3271-2112 | 3271-1602
		<br />
		csf@pucpr.br
	</p>
</footer>
<?php
	}
?>

