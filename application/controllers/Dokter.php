<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dokter extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_dokter');
        if (!$this->session->userdata('id_user') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_dokter');

        // PAGINATION
        $baseUrl    = base_url() . "Dokter/index/";
        $totalRows  = count((array) $this->m_dokter->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Dokter';
        $data['pasien']        = $this->m_dokter->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "dokter/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_dokter', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_dokter');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "Dokter/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_dokter->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Dokter';
        $data['pasien']        = $this->m_dokter->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "dokter/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['id_dokter']   = '';
        $data['nama_dokter'] = $this->input->post('nama_dokter');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_dokter->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data dokter ".$data['nama_dokter'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data dokter ".$data['nama_dokter'];
        getAlert($alertStatus, $alertMessage);

        redirect('dokter/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['id_dokter']   = $this->input->post('id_dokter');
        $data['nama_dokter'] = $this->input->post('nama_dokter');
        $this->m_dokter->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data dokter dengan ID = ".$data['id_dokter']." - ".$data['nama_dokter'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data dokter : ".$data['nama_dokter'];
        getAlert($alertStatus, $alertMessage);

        redirect('dokter/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_dokter->delete($this->input->post('id_dokter'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data dokter dengan ID = ".$this->input->post('id_dokter')." - ".$this->input->post('nama_dokter');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data dokter : ".$this->input->post('nama_dokter');
        getAlert($alertStatus, $alertMessage);

        redirect('dokter/index');
    }
    
}
?>