<?php
$info = base_url('img/icon/icone_info.png');
$info = '<img src="'.$info.'" height="16" align="left">';
$doc = array('doc0' => '3.1) Projeto de Pesquisa', 'doc1' => '3.2) Plano de trabalho do aluno', 'doc2' => '3.3) Carta do co-orientador da Universidade Destino', 'doc3' => '3.4) Histórico escolar do aluno com IRA', 'doc4' => '3.5) Carta de recomendação do estudante', 'doc5' => '3.6) Carta de motivação do estudante', 'doc6' => '3.7) Resultado do teste de proficiência da língua estrangeira', 'doc7' => '3.8) Carta de ciência do coordenador do curso de graduação da PUCPR e plano acadêmico para o retorno do estudante à PUCPR', 'doc8' => '3.9) Comprovante da bolsa PROUNI, FIES ou Rotativa PUCPR , se for o caso');
$idoc = array('','','','','','',$info.' Caso o aluno não tenha o score do teste de proficiência no momento da submissão, deve ser colocado um termo de ciência e concordância dessa exigência e que o <I>deadline</I> para apresentação do documento é de dois meses antes da viagem.','','','');
echo '<h1>Página 2/3 - Arquivos</h1>';
echo '<table width="80%" border=0>
	<tr>
		<td class="bold" colspan=2>1) Titulo do projeto</td>
	</tr>
	<tr>
		<td class="lt5" colspan=2>' . $dd1 . '</td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td class="bold" colspan=2>2) Aluno</td>
	</tr>
	<tr>
		<td class="lt3" colspan=2>' . $dd2 . ' - '.$nome_aluno.'</td>
	</tr>
	<tr><td><br></td></tr>	
	<tr>
		<td class="lt4 bold" colspan=2>3) Documentos</td>
	</tr>
';
echo '<form method="post" action="'.base_url('').'index.php/ici/resumo">';
echo '<input type="hidden" name="dd1" value="' . $dd1 . '">';
echo '<input type="hidden" name="dd2" value="' . $dd2 . '">';
echo '<input type="hidden" name="dd3" value="' . $dd3 . '">';

$this -> load -> model('geds');
$form_ok = 1;
for ($r = 0; $r < count($doc); $r++) {
	echo '
			<tr>
				<td class="lt2" colspan=2>' . $doc['doc' . $r] . '</td>
			</tr>
		';
	if (strlen($idoc[$r]) > 0)
		{
		echo '
			<tr>
				<td>
				<td class="lt1">' . $idoc[$r] . '</td>
			</tr>
		';	
		}
	$list = $this -> geds -> lista_arquivo_tipo('D0' . ($r + 1), $protocolo);
	if ($this -> geds -> total_files == 0) { $form_ok = 0;
	}
	if (strlen($list) == 0) {
		echo '
			<tr>
				<td width="20">&nbsp;</td>
				<td class="lt2"><font color="red">(obrigatório)</font> | <a href="#" onclick="postdoc(' . ($r + 1) . ',' . $protocolo . ');"><font color="blue">anexar documento</font></A></td>
			</tr>
		';
	} else {
		echo '<tr><td width="20">&nbsp;</td><td>';
		echo $list;
		echo '</td></tr>';
	}
}
echo '</table>';
if ($form_ok != 1) {
	echo '<h1><font color="red">Existem arquivos faltantes, não é possível enviar a proposta</font></h1>';
} else {
	echo '
	<tr>
		<td>
			<input type="submit" value="Avançar >>>" name="acao">
			<input type="hidden" name="dd4" value="OK">
		</td>
	</tr>';
}
echo '<tr><td>'.$protocolo;
?>
</table>
</form>
<script>
	function postdoc($id,proto) {
newxy2('<?php echo base_url('index.php/ici/ged/');?>D0'+$id+'/<?php echo $protocolo;?>',600,400);
}

function ged_download($id) {
newxy2('<?php echo base_url('index.php/ici/ged_download/');?>'+$id,400,200);
	}

	function ged_excluir($id) {
	newxy2('<?php echo base_url('index.php/ici/ged_excluir/');?>'+$id,400,200);
	}

	function newxy2(url, xx, yy) {
	NewWindow = window.open(url, 'newwin2', 'scrollbars=yes,resizable=no,width=' + xx + ',height=' + yy + ',top=10,left=10');
	NewWindow.focus();
	void (0);
	}
</script>
