<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pemeriksaan_odontogram extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pemeriksaan_odontogram');
        if (!$this->session->userdata('user_id') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_pemeriksaan_odontogram');

        // PAGINATION
        $baseUrl    = base_url() . "pemeriksaan_odontogram/index/";
        $totalRows  = count((array) $this->m_pemeriksaan_odontogram->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Rekam Medis Pemeriksaan Odontogram';
        $data['pasien']        = $this->m_pemeriksaan_odontogram->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "rekam_medis/pemeriksaan_odontogram/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_pemeriksaan_odontogram', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_pemeriksaan_odontogram');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "pemeriksaan_odontogram/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_pemeriksaan_odontogram->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Rekam Medis Pemeriksaan Odontogram';
        $data['pasien']        = $this->m_pemeriksaan_odontogram->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "rekam_medis/pemeriksaan_odontogram/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['pemeriksaan_odontogram_id']   = '';
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_pemeriksaan_odontogram->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data rekam medis pemeriksaan odontogram ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data rekam medis pemeriksaan odontogram ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pemeriksaan_odontogram/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['pemeriksaan_odontogram_id']   = $this->input->post('pemeriksaan_odontogram_id');
        $data['pasien_id'] = $this->input->post('pasien_id');
        $this->m_pemeriksaan_odontogram->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data rekam medis pemeriksaan odontogram dengan ID = ".$data['pemeriksaan_odontogram_id']." - ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data rekam medis pemeriksaan odontogram : ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pemeriksaan_odontogram/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_pemeriksaan_odontogram->delete($this->input->post('pemeriksaan_odontogram_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data rekam medis pemeriksaan odontogram dengan ID = ".$this->input->post('pemeriksaan_odontogram_id')." - ".$this->input->post('pasien_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data rekam medis pemeriksaan odontogram : ".$this->input->post('pasien_id');
        getAlert($alertStatus, $alertMessage);

        redirect('pemeriksaan_odontogram/index');
    }
    
}
?>