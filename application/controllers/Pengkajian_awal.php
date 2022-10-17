<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengkajian_awal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pengkajian_awal');
        if (!$this->session->userdata('id_user') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_pengkajian_awal');

        // PAGINATION
        $baseUrl    = base_url() . "pengkajian_awal/index/";
        $totalRows  = count((array) $this->m_pengkajian_awal->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Rekam Medis Pengkajian Awal';
        $data['pasien']        = $this->m_pengkajian_awal->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "rekam_medis/pengkajian_awal/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_pengkajian_awal', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_pengkajian_awal');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "pengkajian_awal/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_pengkajian_awal->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Rekam Medis Pengkajian Awal';
        $data['pasien']        = $this->m_pengkajian_awal->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "rekam_medis/pengkajian_awal/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['id_pengkajian_awal']   = '';
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_pengkajian_awal->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data rekam medis pengkajian awal ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data rekam medis pengkajian awal ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['id_pengkajian_awal']   = $this->input->post('id_pengkajian_awal');
        $data['pasien_id'] = $this->input->post('pasien_id');
        $this->m_pengkajian_awal->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data rekam medis pengkajian awal dengan ID = ".$data['id_pengkajian_awal']." - ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data rekam medis pengkajian awal : ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_pengkajian_awal->delete($this->input->post('id_pengkajian_awal'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data rekam medis pengkajian awal dengan ID = ".$this->input->post('id_pengkajian_awal')." - ".$this->input->post('pasien_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data rekam medis pengkajian awal : ".$this->input->post('pasien_id');
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal/index');
    }
    
}
?>