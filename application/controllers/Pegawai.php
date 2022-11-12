<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pegawai extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pegawai');
        if (!$this->session->userdata('id_user') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_pegawai');

        // PAGINATION
        $baseUrl    = base_url() . "pegawai/index/";
        $totalRows  = count((array) $this->m_pegawai->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Pegawai';
        $data['pegawai']        = $this->m_pegawai->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "pegawai/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_pegawai', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_pegawai');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "pegawai/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_pegawai->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Pegawai';
        $data['pegawai']        = $this->m_pegawai->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "pegawai/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    public function create() {
        csrfValidate();
        // POST
        $data['id_pegawai']   = '';
        $data['nama_pegawai'] = $this->input->post('nama_pegawai');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['status_pegawai'] = $this->input->post('status_pegawai');
        $data['bidang_pegawai'] = $this->input->post('bidang_pegawai');;
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_pegawai->create($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data pegawai ".$data['nama_pegawai'];
        getAlert($alertStatus, $alertMessage);

        redirect('pegawai/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['id_pegawai']   = $this->input->post('id_pegawai');
        $data['nama_pegawai'] = $this->input->post('nama_pegawai');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['status_pegawai'] = $this->input->post('status_pegawai');
        $data['bidang_pegawai'] = $this->input->post('bidang_pegawai');
        $this->m_pegawai->update($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data pegawai : ".$data['nama_pegawai'];
        getAlert($alertStatus, $alertMessage);

        redirect('pegawai/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_pegawai->delete($this->input->post('id_pegawai'));

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data pegawai : ".$this->input->post('nama_pegawai');
        getAlert($alertStatus, $alertMessage);

        redirect('pegawai/index');
    }
    
}
?>