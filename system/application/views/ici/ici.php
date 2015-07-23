<?php

class ici extends Controller {
	function __construct() {
		global $dd, $acao;
		parent::__construct();
		$this -> load -> database();
	}

	function acesso($dd1 = '', $dd2 = '', $dd3 = '', $dd4 = '') {
		$this -> load -> library('session');

		$dados = array('cracha' => $dd1, 'cpf' => $dd1, 'josso' => $dd3, 'nome' => $dd2);
		$this -> session -> set_userdata($dados);

		echo '<meta http-equiv="refresh" content="2;' . base_url('') . '">';
	}

	function ged($id = 0, $proto = '', $tipo = '', $check = '') {
		$this -> load -> database();

		$this -> load -> library('session');
		$this -> load -> helper('url');
		$this -> lang -> load("app", "portuguese");

		$this -> load -> model('geds');

		$this -> geds -> tabela = 'ici_geds';

		$data['content'] = $this -> geds -> form($id, $proto, $tipo);
		$this -> load -> view('content', $data);
	}

	function ged_download($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'ici_geds';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> download($id);
	}

	function ged_excluir($id = 0, $chk = '') {
		$this -> load -> database();

		$this -> load -> model('geds');
		$this -> geds -> tabela = 'ici_geds';
		$this -> geds -> file_path = '_document/';
		$this -> geds -> file_delete($id);
	}

	function resumo()
		{
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> lang -> load("app", "portuguese");
		$this -> load -> model('geds');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> model('projects_ici');
		$this -> geds -> tabela = 'ici_geds';
		
		$data['title_page'] = 'IC Internacional';
		$data['menu'] = 0;
		$this -> load -> view('header/header');
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');

		$data['logo'] = base_url('img/logo/logo_ici.png');

		$this -> load -> view('header/logo', $data);		
		
			
		}
	function index() {
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> lang -> load("app", "portuguese");
		$this -> load -> model('geds');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> model('projects_ici');
		$this -> geds -> tabela = 'ici_geds';
		
		/* Dados Post */
		$dd1 = $this -> input -> post('dd1');
		$dd11	 = $this -> input -> post('dd11');
		$dd2 = $this -> input -> post('dd2');
		$dd21 = $this -> input -> post('dd21');
		$dd22 = $this -> input -> post('dd22');
		$dd23 = $this -> input -> post('dd23');
		$dd24 = $this -> input -> post('dd24');
		$dd25 = $this -> input -> post('dd25');
		$dd3 = $this -> input -> post('dd3');
		$dd4 = $this -> input -> post('dd4');		

		$data['title_page'] = 'IC Internacional';
		$data['menu'] = 0;
		$this -> load -> view('header/header');
		$this -> load -> view('header/cab', $data);

		$this -> load -> view('header/content_open');

		$data['logo'] = base_url('img/logo/logo_ici.png');

		$this -> load -> view('header/logo', $data);

		$ok = $this -> projects_ici -> valida_e_salva();

		$dd21 = $this -> input -> post('dd21');
		$dd4 = $this -> input -> post('dd4');
		
		$sql = "select * from pibic_aluno where pa_cracha = '" . $dd21 . "' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);
		if (count($rlt) > 0) {
			$line = $rlt[0];
			$data['nome_aluno'] = $line['pa_nome'];
		} else {
			$data['nome_aluno'] = '';
		}
		$autor = $this -> session -> userdata('cracha');

		
		$protocolo = sonumero($this->projects_ici->recupera_codigo_em_submissao($autor));
		$post = array('protocolo'=>$protocolo,'dd1'=>$dd1,'dd11'=>$dd11,'dd2'=>$dd2,'dd21'=>$dd21,'dd22'=>$dd22,'dd23'=>$dd23,'dd24'=>$dd24,'dd25'=>$dd25,'dd3'=>$dd3);
		$data = array_merge($data,$post);
		
		if ($ok == 1) {
			$autor = $this -> session -> userdata('cracha');
			$this -> projects_ici -> insere_novo_projeto();
			
			if ($dd4 == 'OK') {
				$this -> load -> view('ici/submit_03', $data);
			} else {
				$this -> load -> view('ici/submit_02', $data);
			}
		} else {
			$this -> load -> view('ici/submit_01', $data);
		}

	}

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
