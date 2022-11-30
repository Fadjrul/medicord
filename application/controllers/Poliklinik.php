<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Poliklinik extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_poliklinik');
        if (!$this->session->userdata('user_id') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_poliklinik');

        // PAGINATION
        $baseUrl    = base_url() . "poliklinik/index/";
        $totalRows  = count((array) $this->m_poliklinik->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Poliklinik';
        $data['poliklinik']    = $this->m_poliklinik->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "poliklinik/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_poliklinik', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_poliklinik');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "poliklinik/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_poliklinik->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Poliklinik';
        $data['poliklinik']    = $this->m_poliklinik->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "poliklinik/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['poliklinik_id']   = '';
        $data['nama_poliklinik'] = $this->input->post('nama_poliklinik');
        $data['gedung'] = $this->input->post('gedung');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_poliklinik->create($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data poliklinik ".$data['nama_poliklinik'];
        getAlert($alertStatus, $alertMessage);

        redirect('poliklinik/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['poliklinik_id']   = $this->input->post('poliklinik_id');
        $data['nama_poliklinik'] = $this->input->post('nama_poliklinik');
        $data['gedung'] = $this->input->post('gedung');
        $this->m_poliklinik->update($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data poliklinik : ".$data['nama_poliklinik'];
        getAlert($alertStatus, $alertMessage);

        redirect('poliklinik/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_poliklinik->delete($this->input->post('poliklinik_id'));
        
        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data poliklinik : ".$this->input->post('nama_poliklinik');
        getAlert($alertStatus, $alertMessage);

        redirect('poliklinik/index');
    }
    
}
?>