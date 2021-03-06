<?php
class Geds extends Model {
	var $up_maxsize = 20971520;

	var $tabela = '';
	var $up_month_control = 1;
	var $versao = 0;
	var $nw_log = '';
	var $total_files = 0;
	
	function lista_arquivo($protocolo) {
		$sql = "select * from " . $this -> tabela . " 
						where doc_dd0 = '$protocolo' 
								and doc_ativo = 1 
						";
						
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$this -> total_files = count($rlt);

		$sx = '';
		if (count($rlt) > 0) {

			$sx = '<table border=0 class="lt1">';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$link = '<span onclick="ged_download(\''.$line['id_doc'].'\');" class="link" style="cursor: pointer;">';
				$sx .= '<tr>';
				$sx .= '<td>';
				$sx .= $link . $line['doc_filename'];
				$sx .= ' | ';
				$sx .= $line['doc_data'];
				$sx .= ' | ';
				$sx .= $line['doc_tipo'];
				$sx .= ' | ';
				$sx .= $line['doc_hora'];
				$sx .= ' | ';
				$sx .= number_format(($line['doc_size'] / 1024), 1, ',', '.') . 'k Byte';
				$sx .= '</span>';
				$sx .= '</td>';
				$sx .= '</tr>';
			}
			$sx .= '</table>';
		}
		return ($sx);
	}	

	function lista_arquivo_tipo($tipo = '', $protocolo = '') {
		$sql = "select * from " . $this -> tabela . " 
						where doc_dd0 = '$protocolo' 
								and doc_tipo = '$tipo'
								and doc_ativo = 1 
						";
						
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$this -> total_files = count($rlt);

		$sx = '';
		if (count($rlt) > 0) {

			$sx = '<table border=0 class="lt1">';
			for ($r = 0; $r < count($rlt); $r++) {
				$line = $rlt[$r];
				$link = '<span onclick="ged_download(\''.$line['id_doc'].'\');" class="link" style="cursor: pointer;">';
				$sx .= '<tr>';
				$sx .= '<td>';
				$sx .= $link . $line['doc_filename'];
				$sx .= ' | ';
				$sx .= $line['doc_data'];
				$sx .= ' | ';
				$sx .= $line['doc_tipo'];
				$sx .= ' | ';
				$sx .= $line['doc_hora'];
				$sx .= ' | ';
				$sx .= number_format(($line['doc_size'] / 1024), 1, ',', '.') . 'k Byte';
				$sx .= '</span>';
				if (($line['doc_status'] == '@'))
					{
					$linkd = '<span onclick="ged_excluir(\''.$line['id_doc'].'\');" class="link" style="cursor: pointer;">';
					$sx .= ' | ';
					$sx .= $linkd.'<font color="red">excluir</font>'.'<span>';
					} 
				$sx .= '</td>';
				$sx .= '</tr>';
			}
			$sx .= '</table>';
		}
		echo $sx;
		return ($sx);
	}

	function form($id = '', $proto = '', $tipo = '') {
		$options = '<option value="">' . msg('not_defined') . '</option>';
		$options .= $this -> documents_type_form($id);
		$path = '_document/';

		if (isset($_FILES['arquivo']['tmp_name'])) {
			$temp = $_FILES['arquivo']['tmp_name'];
			$size = $_FILES['arquivo']['size'];
			$nome = strtolower($_FILES['arquivo']['name']);
		} else {
			$nome = '';
		}
		$erro = '';

		if (strlen($nome) > 0) {
			$this -> dir($path);
			if ($this -> up_month_control == 1) {
				$path .= date("Y") . '/';
				$this -> dir($path);
				$path .= date("m") . '/';
				$this -> dir($path);
			}
			if (strlen($erro) == 0) {
				$compl = $proto . '-' . substr(md5($nome . date("His")), 0, 5) . '-';
				//$compl = troca($compl, '/', '-');
				if (!move_uploaded_file($temp, $path . $compl . $nome)) { $erro = msg('erro_save');
				} else {
					$this -> file_saved = $path . $compl . $nome;
					$this -> file_name = $nome;
					$this -> file_size = $size;
					$this -> file_path = $path;
					$this -> file_data = date("Ymd");
					$this -> file_time = date("H:i:s");
					$this -> file_type = $id;
					$this -> protocol = $proto;
					$this -> user = '';
					$this -> save();
					$saved = 1;
					echo $this -> windows_close();
					return ('');
				}
			}
		}

		$page = $this -> page();
		$dd = array();
		$sx = '<form id="upload" action="' . $page . '/' . $id . '/' . $proto . '/' . $tipo . '/' . '" method="post" enctype="multipart/form-data">
					<fieldset><legend>' . msg('file_tipo') . '</legend>
    				<select name="dd2" size=1>' . $options . '</select>
    				</fieldset>
    				<BR>
	    			<nobr><fieldset class="fieldset01"><legend class="legend01">' . msg('upload_submit') . '</legend> 
    				<span id="post"><input type="file" name="arquivo" id="arquivo" /></span>
     				<input type="submit" value="enviar arquivo" name="acao" id="idbotao" />
    				</fieldset>  
    				<BR>
    				<fieldset class="fieldset01"><legend class="legend01">' . msg('file_tipo') . '</legend>
    				MaxSize: <B>' . number_format($this -> up_maxsize / (1024 * 1024), 0, ',', '.') . 'MByte</B>
    				&nbsp;&nbsp;&nbsp;
					Extension Valid: <B>' . $this -> display_extension() . '</B>';
		$sx .= '</fieldset></form>';
		return ($sx);
	}

	function windows_close() {
		$sx = '
				<script>
					window.opener.location.reload();
					close();
				</script>
			';
		return ($sx);

	}

	function insert() {
		$sql = "insert into " . $this -> tabela . "_tipo 
				(doct_nome, doct_codigo, doct_publico, 
				doct_avaliador, doct_autor, doct_restrito,
				doct_ativo
				) values (
				'Comprovante PROUNI, FIES ou Rotativa PUCPR','D09',1,
				1,1,1,
				1
				)";
		//$rlt = $this -> db -> query($sql);

	}

	function documents_type_form($tipo) {
		$sql = "select * from " . $this -> tabela . "_tipo where doct_ativo = 1 ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		$sx = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$sel = '';
			if (trim($tipo) == trim($line['doct_codigo'])) { $sel = 'selected';
			}
			$sx .= '<option value="' . $line['doct_codigo'] . '" ' . $sel . '>';
			$sx .= msg(trim($line['doct_nome']));
			$sx .= '</option>';
			$sx .= chr(13);
		}
		return ($sx);

	}

	function display_extension() {
		$pd = '.pdf';
		return ($pd);
	}

	function page() {
		$pg = base_url('index.php/ici/ged');
		return ($pg);
	}

	function structure() {

		$table = $this -> tabela;
		if (strlen($this -> tabela) == 0) { echo 'Table name not found';
			exit ;
		}
		$sql = "CREATE TABLE " . $table . " (
  						id_doc serial NOT NULL,
  						doc_dd0 char(7),
  						doc_tipo char(5),
  						doc_ano char(4),
  						doc_filename text,
  						doc_status char(1),
  						doc_data integer,
  						doc_hora char(8),
  						doc_arquivo text,
  						doc_extensao char(4),
  						doc_size float,
  						doc_versao char(4),
  						doc_ativo integer
						) ";
		$rlt = $this -> db -> query($sql);

		$sql = "CREATE TABLE  " . $table . "_tipo (
					  id_doct serial NOT NULL,
  						doct_nome char(50),
  						doct_codigo char(5),
  						doct_publico integer,
  						doct_avaliador integer,
  						doct_autor integer,
  						doct_restrito integer,
  						doct_ativo integer
						) ";
		$rlt = $this -> db -> query($sql);
	}

	function download_send($arq = '') {
		header("Pragma: public");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Expires: 0");
		//header('Content-Length: $len');
		header('Content-Transfer-Encoding: none');
		$file_extension = $this -> file_type;
		$ctype = "pdf";
		switch( $file_extension ) {
			case "pdf" :
				$ctype = "application/pdf";
				break;
			case "exe" :
				$ctype = "application/octet-stream";
				break;
			case "zip" :
				$ctype = "application/zip";
				break;
			case "doc" :
				$ctype = "application/msword";
				break;
			case "xls" :
				$ctype = "application/vnd.ms-excel";
				break;
			case "ppt" :
				$ctype = "application/vnd.ms-powerpoint";
				break;
			case "gif" :
				$ctype = "image/gif";
				break;
			case "png" :
				$ctype = "image/png";
				break;
			case "jpeg" :
			case "jpg" :
				$ctype = "image/jpg";
				break;
			case "mp3" :
				$ctype = "audio/mpeg";
				break;
			case "wav" :
				$ctype = "audio/x-wav";
				break;
			case "mpeg" :
			case "mpg" :
			case "mpe" :
				$ctype = "video/mpeg";
				break;
			case "mov" :
				$ctype = "video/quicktime";
				break;
			case "avi" :
				$ctype = "video/x-msvideo";
				break;
		}
		if (strlen($arq) > 0) {
			$this -> file_path = $arq;
		}
		header("Content-Type: $ctype");
		header('Content-Disposition: attachment; filename="' . $this -> file_name . '"');
		header("Content-type: application-download");
		header("Content-Transfer-Encoding: binary");
		readfile($this -> file_path);
	}

	function download($id = '') {
		$arq = $this -> file_path;
		if (strlen($id) > 0) { $this -> id_file = $id;
		}
		if ($this -> le($this -> id_file)) {
			$arq = $this -> file_path;
			if (!(file_exists($arq))) {
				$arq = substr($arq, strpos($arq, '/') + 1, strlen($arq));
				if (!(file_exists($arq))) {
					echo '<HR>' . $arq;
					echo '<BR> Arquivo nao localizado ';
					echo '<BR> Reportando erro ao administrador';
					exit ;
				} else {
					$this -> download_send($arq);
				}
			} else {
				/** Download do arquivo **/
				$this -> download_send();
			}
		} else { echo '<BR><font color="red">ID not found';
		}
	}

	function le($id) {
		if (strlen($id) > 0) { $this -> id_file = $id;
		}
		if (strlen($this -> tabela) > 0) {
			$sql = "select * from " . $this -> tabela;
			$sql .= " where id_doc = " . round($this -> id_file);
			$sql .= " limit 1 ";
			$rlt = $this -> db -> query($sql);
			$rlt = $rlt -> result_array($rlt);
			$line = $rlt[0];
			if (count($rlt) > 0) {
				$this -> id_file = trim($line['id_doc']);
				$this -> file_name = trim($line['doc_filename']);
				$this -> file_size = trim($line['doc_size']);
				$this -> file_path = trim($line['doc_arquivo']);
				$this -> file_type = trim($line['doc_extensao']);
				$this -> file_date = trim($line['doc_data']);
				$this -> file_saved = trim($line['doc_ativo']);
				return (1);
			} else {
				echo msg('file_not_found');
			}

		} else { echo msg('table_not_set');
		}
		return (0);
	}

	function show_shortname($name) {
		$name = trim($name);
		if (strlen($name) > 30) {
			$name = substr($name, 0, 13) . '...' . substr($name, strlen($name) - 13, 13);
		}
		return ($name);
	}

	function save() {

		$sql = "insert into " . $this -> tabela;
		$sql .= " (doc_dd0,doc_tipo,doc_ano,doc_filename,doc_status,doc_data,doc_hora,
							doc_arquivo,doc_extensao,doc_size,doc_ativo,
							doc_versao ";
		if (strlen($this -> user) > 0) { $sql .= ', doc_user ';
		}
		$sql .= " )";
		$sql .= " values ";
		$sql .= " ('" . $this -> protocol . "',";
		$sql .= "'" . $this -> file_type . "',";
		$sql .= "'" . date("Y") . "',";
		$sql .= "'" . $this -> file_name . "',";
		$sql .= "'@',";
		$sql .= "'" . $this -> file_data . "',";
		$sql .= "'" . $this -> file_time . "',";
		$sql .= "'" . $this -> file_saved . "',";
		$sql .= "'" . $this -> file_extensao($this -> file_name) . "'";
		$sql .= "," . round($this -> file_size);
		$sql .= ",1 ";
		$sql .= ",'" . $this -> versao . "'";
		if (strlen($this -> user) > 0) { $sql .= ",'" . $this -> user . "'";
		}
		$sql .= " )";
		$rlt = $this -> db -> query($sql);
	}

	/* recupera a extens�o do aquivo */
	function file_extensao($fl) {
		$fl = strtolower($fl);
		$fs = strlen($fl);
		$ex = '???';
		if (substr($fl, $fs - 1, 1) == '.') { $ex = substr($fl, $fs, 1);
		}
		if (substr($fl, $fs - 2, 1) == '.') { $ex = substr($fl, $fs - 1, 2);
		}
		if (substr($fl, $fs - 3, 1) == '.') { $ex = substr($fl, $fs - 2, 3);
		}
		if (substr($fl, $fs - 4, 1) == '.') { $ex = substr($fl, $fs - 3, 4);
		}
		if (substr($fl, $fs - 5, 1) == '.') { $ex = substr($fl, $fs - 4, 5);
		}
		return (substr(trim($ex), 0, 4));
	}

	/* checa e cria diretorio */
	function dir($dir) {
		$ok = 0;
		if (is_dir($dir)) { $ok = 1;
		} else {
			mkdir($dir);
			$rlt = fopen($dir . '/index.php', 'w');
			fwrite($rlt, 'acesso restrito');
			fclose($rlt);
		}
		return ($ok);
	}

	function file_delete($id) {
			$this -> id_doc = $id;
			$this -> file_delete_confirm();
			echo $this -> windows_close();
	}

	function file_delete_confirm() {
		$sql = "update " . $this -> tabela;
		$sql .= " set doc_ativo = 0 ";
		$sql .= " where id_doc = " . $this -> id_doc;
		$rlt = $this -> db -> query($sql);
		return (1);
	}

	function file_undelete() {
		$sql = "update " . $this -> tabela;
		$sql .= " set doc_ativo = 1 ";
		$sql .= " where id_doc = " . $this -> id_doc;
		$rlt = $this -> db -> query($sql);
		return (1);
	}

}
