<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penyakit extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_penyakit');
        if (!$this->session->userdata('id_user') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_penyakit');

        // PAGINATION
        $baseUrl    = base_url() . "penyakit/index/";
        $totalRows  = count((array) $this->m_penyakit->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Penyakit';
        $data['pasien']        = $this->m_penyakit->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "penyakit/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_penyakit', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_penyakit');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "penyakit/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_penyakit->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Penyakit';
        $data['pasien']        = $this->m_penyakit->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "penyakit/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['id_penyakit']   = '';
        $data['nama_penyakit'] = $this->input->post('nama_penyakit');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_penyakit->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data penyakit ".$data['nama_penyakit'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data penyakit ".$data['nama_penyakit'];
        getAlert($alertStatus, $alertMessage);

        redirect('penyakit/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['id_penyakit']   = $this->input->post('id_penyakit');
        $data['nama_penyakit'] = $this->input->post('nama_penyakit');
        $this->m_penyakit->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data penyakit dengan ID = ".$data['id_penyakit']." - ".$data['nama_penyakit'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data penyakit : ".$data['nama_penyakit'];
        getAlert($alertStatus, $alertMessage);

        redirect('penyakit/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_penyakit->delete($this->input->post('id_penyakit'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data penyakit dengan ID = ".$this->input->post('id_penyakit')." - ".$this->input->post('nama_penyakit');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data penyakit : ".$this->input->post('nama_penyakit');
        getAlert($alertStatus, $alertMessage);

        redirect('penyakit/index');
    }
    
}
?>