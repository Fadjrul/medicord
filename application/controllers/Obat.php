<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Obat extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_obat');
        if (!$this->session->userdata('id_user') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_obat');

        // PAGINATION
        $baseUrl    = base_url() . "obat/index/";
        $totalRows  = count((array) $this->m_obat->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Obat';
        $data['pasien']        = $this->m_obat->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "obat/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_obat', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_obat');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "obat/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_obat->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Obat';
        $data['pasien']        = $this->m_obat->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "obat/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['id_obat']   = '';
        $data['nama_obat'] = $this->input->post('nama_obat');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_obat->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data obat ".$data['nama_obat'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data obat ".$data['nama_obat'];
        getAlert($alertStatus, $alertMessage);

        redirect('obat/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['id_obat']   = $this->input->post('id_obat');
        $data['nama_obat'] = $this->input->post('nama_obat');
        $this->m_obat->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data obat dengan ID = ".$data['id_obat']." - ".$data['nama_obat'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data obat : ".$data['nama_obat'];
        getAlert($alertStatus, $alertMessage);

        redirect('obat/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_obat->delete($this->input->post('id_obat'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data obat dengan ID = ".$this->input->post('id_obat')." - ".$this->input->post('nama_obat');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data obat : ".$this->input->post('nama_obat');
        getAlert($alertStatus, $alertMessage);

        redirect('obat/index');
    }
    
}
?>