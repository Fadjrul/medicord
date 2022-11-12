<?php defined('BASEPATH') or exit('No direct script access allowed');
class Setting extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("m_setting");
		$this->load->library('upload');

		// check session data
		if (!$this->session->userdata('id_user') or $this->session->userdata('user_group') != 1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
	}

	public function index()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['title']   = 'Setting';

		// TEMPLATE
		$view         = "setting/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
	}

	public function update()
	{
		csrfValidate();
		$formatName                	= $this->input->post('id_setting') . date('YmdHis');

		// Upload For Logo
		if ($_FILES['logo']['name'] != '') {

			$config_logo['upload_path']     = './assets/core-images/';
			$config_logo['allowed_types']   = "gif|jpg|jpeg|png|svg";
			$config_logo['overwrite']       = "true";
			$config_logo['file_name']       = 'medicord' . $formatName;
			$this->upload->initialize($config_logo);

			if (!$this->upload->do_upload('logo')) {
				echo $this->upload->display_errors();
			} else {
				unlink("./assets/core-images/" . $this->input->post('setting_logo'));
				$logo                    = $this->upload->data();
				$data['setting_logo']    = $logo['file_name'];
			}
		}

		$data['id_setting']              = $this->input->post('id_setting');
		$data['setting_appname']         = $this->input->post('setting_appname');
		$data['setting_short_appname']   = $this->input->post('setting_short_appname');
		$data['setting_owner_name']      = $this->input->post('setting_owner_name');
		$data['setting_phone']           = $this->input->post('setting_phone');
		$data['setting_email']           = $this->input->post('setting_email');
		$data['setting_address']         = $this->input->post('setting_address');
		$data['setting_about']           = $this->input->post('setting_about');
		$data['setting_instagram']       = $this->input->post('setting_instagram');
		$data['setting_facebook']        = $this->input->post('setting_facebook');
		$data['setting_youtube']         = $this->input->post('setting_youtube');

		$this->m_setting->update_setting($data);

		// ALERT
		$alertStatus  = 'success';
		$alertMessage = 'Berhasil Update Data Informasi Aplikasi';
		getAlert($alertStatus, $alertMessage);

		redirect('setting/index');
	}


	public function setRows()
	{
		rowpage($this->input->post('row'));
	}
}
