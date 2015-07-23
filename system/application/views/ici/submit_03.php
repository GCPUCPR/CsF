<h1>Página 3/3 - Resumo da proposta</h1>
<?php
echo '<table width="80%" border=0>
	<tr>
		<td class="bold" colspan=2>1) Titulo do projeto</td>
	</tr>
	<tr>
		<td class="lt5" colspan=2>' . $pj_titulo . '</td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td class="bold" colspan=2>2) Titulo do plano</td>
	</tr>
	<tr>
		<td class="lt5" colspan=2>' . $pj_search . '</td>
	</tr>	
	<tr>
		<td class="bold" colspan=2>2.1) Aluno</td>
	</tr>
	<tr>
		<td class="lt3" colspan=2>' . $pj_aluno . ' - '.$nome_aluno.'</td>
	</tr>
	<tr><td><br></td></tr>	
	<tr>
		<td class="lt4 bold" colspan=2>3) Documentos</td>
	</tr>
';
echo '</table>';
echo $lista_arquivo;
echo '<form method="post" action="'.base_url('').'index.php/ici/fim">';
echo '<input type="submit" value="Confirmar Submissão da Proposta">';
echo '</form>';
?>