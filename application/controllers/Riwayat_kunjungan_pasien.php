<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Riwayat_kunjungan_pasien extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_riwayat_kunjungan_pasien');
        if (!$this->session->userdata('user_id') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_riwayat_kunjungan_pasien');

        // PAGINATION
        $baseUrl    = base_url() . "riwayat_kunjungan_pasien/index/";
        $totalRows  = count((array) $this->m_riwayat_kunjungan_pasien->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Rekam Medis Riwayat Kunjungan Pasien';
        $data['riwayat_kunjungan_pasien']        = $this->m_riwayat_kunjungan_pasien->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "rekam_medis/riwayat_kunjungan_pasien/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_riwayat_kunjungan_pasien', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_riwayat_kunjungan_pasien');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "riwayat_kunjungan_pasien/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_riwayat_kunjungan_pasien->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 3;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Rekam Medis Riwayat Kunjungan Pasien';
        $data['riwayat_kunjungan_pasien']        = $this->m_riwayat_kunjungan_pasien->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "rekam_medis/riwayat_kunjungan_pasien/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['riwayat_kunjungan_pasien_id']   = '';
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_riwayat_kunjungan_pasien->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data rekam medis riwayat kunjungan pasien ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data rekam medis riwayat kunjungan pasien ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('riwayat_kunjungan_pasien/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['riwayat_kunjungan_pasien_id']   = $this->input->post('riwayat_kunjungan_pasien_id');
        $data['pasien_id'] = $this->input->post('pasien_id');
        $this->m_riwayat_kunjungan_pasien->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data rekam medis riwayat kunjungan pasien dengan ID = ".$data['riwayat_kunjungan_pasien_id']." - ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data rekam medis riwayat kunjungan pasien : ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('riwayat_kunjungan_pasien/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_riwayat_kunjungan_pasien->delete($this->input->post('riwayat_kunjungan_pasien_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data rekam medis riwayat kunjungan pasien dengan ID = ".$this->input->post('riwayat_kunjungan_pasien_id')." - ".$this->input->post('pasien_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data rekam medis riwayat kunjungan pasien : ".$this->input->post('pasien_id');
        getAlert($alertStatus, $alertMessage);

        redirect('riwayat_kunjungan_pasien/index');
    }
    
}
?>