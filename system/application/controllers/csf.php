<?php
class csf extends Controller {
	var $idioma = 'pt';
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> helper('cookie');

		$this -> lang -> load("app", "portuguese");
		//$this -> load -> library('form_validation');
		//$this -> load -> database();
		//$this -> load -> helper('url');
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
	}

	function cab() {

		/* Carrega classes adicionais */
		$css = array();
		$js = array();
		array_push($css, 'style_cab.css');
		array_push($js, 'js_cab.js');
		array_push($js, 'unslider.min.js');
		array_push($js, 'high/highcharts.js');
		/* transfere para variavel do codeigniter */
		$data['css'] = $css;
		$data['js'] = $js;

		//$id = $this -> session -> userdata('idioma');
		if (isset($_SESSION['idioma'])) {
			$id = $_SESSION['idioma'];
		} else {
			$id = 'pt';
		}

		if (strlen($id) == 0) {
			$id = 'pt';
		}
		$this -> idioma = trim($id);

		$this -> load -> view("header/header");
		$this -> load -> view("csf/site_css");
		$this -> load -> view('componentes/headerpuc');

		if ($this -> idioma == 'en') {
			$this -> load -> view('componentes/nav_en');
		} else {
			$this -> load -> view('componentes/nav');
		}

	}

	function index() {
		$this -> cab();

		if ($this -> idioma == 'en') {
			$this -> load -> view('csf/site_crousel_part_01_en');
			$this -> load -> view('csf/site_crousel_part_02_en');
			$this -> load -> view('csf/site_crousel_part_03_en');

		} else {
			$this -> load -> view('csf/site_crousel_part_01');
			$this -> load -> view('csf/site_crousel_part_02');
			$this -> load -> view('csf/site_crousel_part_03');
		}

		$this -> load -> view('componentes/footer');
	}

	function en() {
		$some_cookie_array = array('idioma' => 'en');
		//$this -> session -> set_userdata($some_cookie_array);
		$_SESSION['idioma'] = 'en';
		$this -> idioma = 'en';
		$this -> index();
	}

	function pt() {
		$some_cookie_array = array('idioma' => 'pt');
		//$this -> session -> set_userdata($some_cookie_array);
		$_SESSION['idioma'] = 'pt';
		$this -> idioma = 'pt';
		$this -> index();
	}

	function what() {
		$this -> cab();

		if ($this -> idioma == 'en') {
			$this -> load -> view('csf/site_what_en');
		} else {
			$this -> load -> view('csf/site_what');

		}

		$this -> load -> view('componentes/footer');
	}

	function editais() {
		$this -> cab();

		if ($this -> idioma == 'en') {
			$this -> load -> view('csf/site_editais_en');
		} else {
			$this -> load -> view('csf/site_editais');

			//carrega grafico da situacao dos estudantes intercambistas
			$data = array();
			$line = $this -> csfs -> mostra_dados_std_status();
			$data['dado'] = $line;
			$this -> load -> view('csf/view_std_status', $data);

		}

		$this -> load -> view('componentes/footer');
	}

	function eventos() {
		$this -> cab();

		if ($this -> idioma == 'en') {
			$this -> load -> view('csf/site_eventos_en');
		} else {
			$this -> load -> view('csf/site_eventos');

		}

		$this -> load -> view('componentes/footer');
	}

	function despedida_01() {
		$this -> cab();

		if ($this -> idioma == 'en') {
			$this -> load -> view('csf/site_despedida_01_en');
		} else {
			$this -> load -> view('csf/site_despedida_01');

		}

		$this -> load -> view('componentes/footer');
	}

	function indicadores() {
		$this -> cab();
		/* Models */
		$this -> load -> model('csfs');

		if ($this -> idioma == 'en') {
			$this -> load -> view('csf/site_indicadores_en');
		} else {
			$this -> load -> view('csf/site_indicadores');

		}

		$this -> load -> view('componentes/footer');
	}

	function depoimentos() {
		$this -> cab();

		if ($this -> idioma == 'en') {
			$this -> load -> view('csf/site_depoimentos_en');
		} else {
			$this -> load -> view('csf/site_depoimentos');

		}

		$this -> load -> view('componentes/footer');
	}

	function faq() {
		$this -> cab();

		if ($this -> idioma == 'en') {
			$this -> load -> view('csf/site_faq_en');
		} else {
			$this -> load -> view('csf/site_faq');

		}

		$this -> load -> view('componentes/footer');
	}

	function contato() {
		$this -> cab();

		if ($this -> idioma == 'en') {
			$this -> load -> view('csf/site_contato_en');
		} else {
			$this -> load -> view('csf/site_contato');

		}

		$this -> load -> view('componentes/footer');
	}

	/*******************NOVOS INDICADORES******************************/
	//GRAFICO 1 => grafico de parceiros
	function view_std_partners() {
		$this -> load -> model('csfs');
		$this -> cab();

		if ($this -> idioma == 'en') {
			//carrega grafico de parceiros
			$data_partners = array();
			$line = $this -> csfs -> mostra_std_partners();
			$data_partners['dado_partners'] = $line;
			$this -> load -> view('csf/view_std_partners_en', $data_partners);
		} else {
			//carrega grafico de parceiros
			$data_partners = array();
			$line = $this -> csfs -> mostra_std_partners();
			$data_partners['dado_partners'] = $line;
			$this -> load -> view('csf/view_std_partners', $data_partners);

		}
		$this -> load -> view('componentes/footer');
	}
	
	//GRAFICO 2 => grafico de estudantes por paises
	function view_std_country() {
		$this -> load -> model('csfs');
		$this -> cab();

		if ($this -> idioma == 'en') {
			//carrega grafico estudantes por paises
			$data_country = array();
			$line = $this -> csfs -> mostra_dados_std_country();
			$data_country['dado_country'] = $line;
			$this -> load -> view('csf/view_std_country_en', $data_country);
		} else {
			//carrega grafico estudantes por paises
			$data_country = array();
			$line = $this -> csfs -> mostra_dados_std_country();
			$data_country['dado_country'] = $line;
			$this -> load -> view('csf/view_std_country', $data_country);

		}
		$this -> load -> view('componentes/footer');
	}
	
	//GRAFICO 3 => grafico dos cursos que mais enviam alunos
	function view_std_course() {
		$this -> load -> model('csfs');
		$this -> cab();

		if ($this -> idioma == 'en') {
			//carrega grafico dos cursos que mais enviam alunos
			$data_course = array();
			$line = $this -> csfs -> mostra_std_course();
			$data_course['dado_course'] = $line;
			$this -> load -> view('csf/view_std_course_en', $data_course);
		} else {
			//carrega grafico dos cursos que mais enviam alunos
			$data_course = array();
			$line = $this -> csfs -> mostra_std_course();
			$data_course['dado_course'] = $line;
			$this -> load -> view('csf/view_std_course', $data_course);

		}
		$this -> load -> view('componentes/footer');
	}

	//GRAFICO 4 => grafico de estudantes por universidade
	function view_std_university() {
		$this -> load -> model('csfs');
		$this -> cab();

		if ($this -> idioma == 'en') {
			//carrega grafico de estudantes por universidade
			$data_university = array();
			$line = $this -> csfs -> mostra_dados_std_university();
			$data_university['dado_university'] = $line;
			$this -> load -> view('csf/view_std_university_en', $data_university);
		} else {
			//carrega grafico de estudantes por universidade
			$data_university = array();
			$line = $this -> csfs -> mostra_dados_std_university();
			$data_university['dado_university'] = $line;
			$this -> load -> view('csf/view_std_university', $data_university);

		}
		$this -> load -> view('componentes/footer');
	}

	//GRAFICO 5 => grafico da situacao dos estudantes intercambistas
	function view_std_status() {
		$this -> load -> model('csfs');
		$this -> cab();

		if ($this -> idioma == 'en') {
			//carrega grafico da situacao dos estudantes intercambistas
			$data = array();
			$line = $this -> csfs -> mostra_dados_std_status();
			$data_status['dado_st'] = $line;
			$this -> load -> view('csf/view_std_status_en', $data_status);
		} else {
			//carrega grafico da situacao dos estudantes intercambistas
			$data = array();
			$line = $this -> csfs -> mostra_dados_std_status();
			$data_status['dado_st'] = $line;
			$this -> load -> view('csf/view_std_status', $data_status);

		}
		$this -> load -> view('componentes/footer');
	}

	//GRAFICO 6 => grafico dos estudantes por genero
	function view_std_genero() {
		$this -> load -> model('csfs');
		$this -> cab();

		if ($this -> idioma == 'en') {
			//carrega grafico estudantes por genero
			$data_gen = array();
			$line = $this -> csfs -> mostra_dados_std_genero();
			$data_genero['dado_gen'] = $line;
			$this -> load -> view('csf/view_std_gen_en', $data_genero);
		} else {
			//carrega grafico estudantes por genero
			$data_gen = array();
			$line = $this -> csfs -> mostra_dados_std_genero();
			$data_genero['dado_gen'] = $line;
			$this -> load -> view('csf/view_std_gen', $data_genero);

		}
		$this -> load -> view('componentes/footer');
	}
	
	//Mapa 01 => estudantes no mundo
	function view_std_map_word() {
		$this -> load -> model('csfs');
		$this -> cab();

		if ($this -> idioma == 'en') {
			//carrega grafico estudantes por genero
			$data_mapa = array();
			$line = $this -> csfs -> mostra_std_map();
			$data_map['dado_mapaword'] = $line;
			//$this -> load -> view('csf/view_std_map_word');
			$this -> load -> view('csf/view_std_map_word_en', $data_map);
		} else {
			//carrega grafico estudantes por genero
			$data_mapa = array();
			$line = $this -> csfs -> mostra_std_map();
			$data_map['dado_mapaword'] = $line;
			//$this -> load -> view('csf/view_std_map_word');
			$this -> load -> view('csf/view_std_map_word', $data_map);

		}
		$this -> load -> view('componentes/footer');
	}	
	

}
