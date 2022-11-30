<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('m_pasien');
		$this->load->model('m_dokter');
		$this->load->model('m_message');
        // check session data
		if (!$this->session->userdata('user_id')) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
	}
		
	public function index(){
		// DATA
		$data['setting'] = getSetting();
		$data['title']   = 'Dashboard';
		$data['widget']  = $this->m_pasien->widget();
		$data['message'] = $this->m_message->read(5,'','', '0');

		// TEMPLATE
		$view         = "dashboard/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
	}
}
