<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    function __construct() {
		parent::__construct();
		$this->load->model('m_content');
		$this->load->model('m_link');
		$this->load->model('m_news_category');
	}

	public function sejarah(){
		// DATA
		$data['setting']             = getSetting();
		$data['link']                = $this->m_link->read('','','');
		$data['content']             = $this->m_content->get('sejarah');
		$data['news_category']       = $this->m_news_category->read('','','');

		// TEMPLATE
		$view         = "landing_page/profil/sejarah";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}

    public function visi_misi(){
		// DATA
		$data['setting']             = getSetting();
		$data['link']                = $this->m_link->read('','','');
		$data['content']             = $this->m_content->get('visi');
		$data['news_category']       = $this->m_news_category->read('','','');

		// TEMPLATE
		$view         = "landing_page/profil/visi";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}

	public function sambutan(){
		// DATA
		$data['setting']             = getSetting();
		$data['link']                = $this->m_link->read('','','');
		$data['content']             = $this->m_content->get('sambutan');
		$data['news_category']       = $this->m_news_category->read('','','');

		// TEMPLATE
		$view         = "landing_page/profil/sambutan";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}

    public function tugas_pokok_fungsi(){
		// DATA
		$data['setting']             = getSetting();
		$data['link']                = $this->m_link->read('','','');
		$data['content']             = $this->m_content->get('tupoksi');
		$data['news_category']       = $this->m_news_category->read('','','');

		// TEMPLATE
		$view         = "landing_page/profil/tupoksi";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}


    public function maklumat_pelayanan(){
		// DATA
		$data['setting']             = getSetting();
		$data['link']                = $this->m_link->read('','','');
		$data['content']             = $this->m_content->get('maklumat');
		$data['news_category']       = $this->m_news_category->read('','','');

		// TEMPLATE
		$view         = "landing_page/profil/maklumat";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}


	public function struktur_organisasi(){
		// DATA
		$data['setting']             = getSetting();
		$data['link']                = $this->m_link->read('','','');
		$data['content']             = $this->m_content->get('struktur');
		$data['news_category']       = $this->m_news_category->read('','','');

		// TEMPLATE
		$view         = "landing_page/profil/struktur";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}

	
}
