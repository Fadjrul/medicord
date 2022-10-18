<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pasien extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pasien');
        if (!$this->session->userdata('id_user') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_pasien');

        // PAGINATION
        $baseUrl    = base_url() . "pasien/index/";
        $totalRows  = count((array) $this->m_pasien->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Pasien';
        $data['pasien']        = $this->m_pasien->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "pasien/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_pasien', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_pasien');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "pasien/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_pasien->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Pasien';
        $data['pasien']        = $this->m_pasien->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "pasien/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    
    public function create_page() {
        // PAGE
        $uriSegment = 3;
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Tambah Data Pasien';
        $data['pasien'] = $this->m_pasien->read('','','');
		
        // TEMPLATE
		$view         = "pasien/add";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    public function create() {
        csrfValidate();
        // POST
        $data['id_pasien']   = '';
        $data['nama_pasien'] = $this->input->post('nama_pasien');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_pasien->create($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data pasien ".$data['nama_pasien'];
        getAlert($alertStatus, $alertMessage);

        redirect('pasien/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['id_pasien']   = $this->input->post('id_pasien');
        $data['nama_pasien'] = $this->input->post('nama_pasien');
        $this->m_pasien->update($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data pasien : ".$data['nama_pasien'];
        getAlert($alertStatus, $alertMessage);

        redirect('pasien/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_pasien->delete($this->input->post('id_pasien'));

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data pasien : ".$this->input->post('nama_pasien');
        getAlert($alertStatus, $alertMessage);

        redirect('pasien/index');
    }
    
}
?>