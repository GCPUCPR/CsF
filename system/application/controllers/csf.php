<?php
class csf extends Controller {
	var $idioma = 'pt';
	function __construct() {
		parent::__construct();
		//$this -> load -> database();
		$this -> load -> helper('cookie');

		$this -> lang -> load("app", "portuguese");
		//$this -> load -> library('form_validation');
		//$this -> load -> database();
		//$this -> load -> helper('url');
		$this -> load -> library('session');

		date_default_timezone_set('America/Sao_Paulo');
	}

	function cab() {
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

}
