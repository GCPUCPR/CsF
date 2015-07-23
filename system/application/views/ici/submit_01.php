<?
$info = base_url('img/icon/icone_info.png');
$info = '<img src="' . $info . '" height="16" align="left">';
$dd1 = $this -> input -> post('dd1');
$dd11 = $this -> input -> post('dd11');
$dd2 = $this -> input -> post('dd2');
$dd21 = $this -> input -> post('dd21');
$dd22 = $this -> input -> post('dd22');
$dd23 = $this -> input -> post('dd23');
$dd24 = $this -> input -> post('dd24');
$dd25 = $this -> input -> post('dd25');
$dd3 = $this -> input -> post('dd3');
$sql = "select * from programa_pos 
				where 
					pos_ativo = 1 and pos_corrente = '1'
					order by pos_nome ";
$rlt = $this -> db -> query($sql);
$rlt = $rlt -> result_array($rlt);
$op_programa = '<option value="">::Selecione o programa::</option>';
for ($r = 0; $r < count($rlt); $r++) {
	$line = $rlt[$r];
	$select = '';
	if ($dd11 == trim($line['pos_codigo'])) { $select = ' selected ';
	}
	$op_programa .= '<option value="' . trim($line['pos_codigo']) . '" ' . $select . '>' . $line['pos_nome'] . '</option>';
}

/* Pais */
$sql = "select * from ajax_pais order by pais_nome";
$rlt = $this -> db -> query($sql);
$rlt = $rlt -> result_array($rlt);
$op_pais = '';
for ($r = 0; $r < count($rlt); $r++) {
	$line = $rlt[$r];
	$select = '';
	if ($dd23 == trim($line['pais_nome'])) { $select = ' selected ';
	}
	$op_pais .= '<option value="' . trim($line['pais_nome']) . '" ' . $select . '>' . $line['pais_nome'] . '</option>' . cr();
}

/************************************************************** DATAS */
$op_data_1 = '';
$op_data_2 = '';
for ($r = 2015; $r < date("Y") + 4; $r++) {
	for ($m = 1; $m <= 12; $m++) {
		$select = '';
		$mes = $r . strzero($m, 2) . '01';
		if ($dd24 == $mes) { $select = ' selected ';
		}
		$op_data_1 .= '<option value="' . $mes . '" ' . $select . '>' . strzero($m, 2) . '/'.$r.'</option>' . cr();

		$select = '';
		if ($dd25 == $mes) { $select = ' selected ';
		}
		$op_data_2 .= '<option value="' . $mes . '" ' . $select . '>' . strzero($m, 2) . '/'.$r.'</option>' . cr();
	}
}
?>
<!---- cabeclaho ----->
<h1>Página 1/3 - Dados da proposta</h1>
<form method="post">
	<table width="80%">
		<!---- Parte 1 ----->
		<tr>
			<td class="lt4 bold">1) Título do projeto do professor</td>
		</tr>
		<tr>
			<td>			<textarea name='dd1' rows=5 cols=80 style="width: 98%"><?php echo $dd1;?></textarea></td>
		</tr>
		<!---- Parte 1.1 ----->
		<tr>
			<td class="lt2 bold">Programa de Pós-Graduação</td>
		</tr>
		<tr>
			<td>
			<select name="dd11">
				<?php echo $op_programa;?>
			</select></td>
		</tr>
		<tr>
			<td>
			<BR>
			<BR>
			</td>
		</tr>
		<!---- Parte 2 ----->
		<tr>
			<td class="lt4 bold">2) Título do plano do aluno</td>
		</tr>
		<tr>
			<td>			<textarea name='dd2' rows=5 cols=80 style="width: 98%"><?php echo $dd2;?></textarea></td>
		</tr>
		<tr>
			<td>
			<BR>
			</td>
		</tr>
		<!---- Parte 2.1 ----->
		<tr>
			<td class="lt2 bold">2.1) Código do estudante</td>
		</tr>
		<tr>
			<td>
			<input type="text" size="10" maxsize="8" name="dd21" value="<?php echo $dd21;?>">
			<BR>
			Informe os oito (8) digitos da carteirinha do estudante.
			<BR>
			Ex: 101<B>88231231</B>1, digite somente o 88231231 </td>
		</tr>
		<!---- Parte 2.2 ----->
		<tr>
			<td>
			<BR>
			</td>
		</tr>
		<tr>
			<td class="lt2 bold">2.2) Universidade de destino e país</td>
		</tr>
		<tr>
			<td>Universidade:
			<input type="text" size="80" name="dd22" value="<?php echo $dd22;?>">
			</td>
		</tr>
		<tr>
			<td>País:
			<select name="dd23">
				<?php echo $op_pais;?>
			</select>
		</tr>
		<tr>
			<td>
			<BR>
			</td>
		</tr>
		<!---- Parte 2.3 ----->
		<tr>
			<td class="lt2 bold">2.3) Período no exterior</td>
		</tr>
		<tr>
			<td> Previsão de saída:
			<select name="dd24">
				<?php echo $op_data_1;?>
			</select> Previsão de retorno
			<select name="dd25">
				<?php echo $op_data_2;?>
			</select></td>
		</tr>
		<tr>
			<td>
			<BR>
			<BR>
			</td>
		</tr>
		<!---- Parte 3 ----->
		<tr>
			<td class="lt4 bold">3) Projetos de doutorado relacionados
		</tr>
		<tr>
			<td><?php echo $info;?>
			<span class="lt2">o projeto deve contar com pelo menos dois doutorandos de áreas diferentes atuando em um mesmo tema.</span></td>
			</td>
		</tr>
		<tr>
			<td>			<textarea name='dd3' rows=5 cols=80 style="width: 98%"><?php echo $dd3;?></textarea></td>
		</tr>
		<tr>
			<td>
			<input type="submit" value="Avançar >>>" name="acao">
			</td>
		</tr>
	</table>
</form>
