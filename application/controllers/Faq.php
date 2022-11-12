<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_faq');
        if (!$this->session->userdata('id_user') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_faq');

        // PAGINATION
        $baseUrl    = base_url() . "faq/index/";
        $totalRows  = count((array) $this->m_faq->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Faq';
        $data['faq']   = $this->m_faq->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "faq/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_faq', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_faq');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "faq/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_faq->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Faq';
        $data['faq']   = $this->m_faq->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "faq/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['id_faq']   = '';
        $data['faq_question'] = $this->input->post('faq_question');
        $data['createtime'] = date('Y-m-d H:i:s');
        $this->m_faq->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data faq ".$data['faq_question'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data faq ".$data['faq_question'];
        getAlert($alertStatus, $alertMessage);

        redirect('faq');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['id_faq']      = $this->input->post('id_faq');
        $data['faq_question']    = $this->input->post('faq_question');
        $this->m_faq->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data faq dengan ID = ".$data['id_faq']." - ".$data['faq_question'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data faq : ".$data['faq_question'];
        getAlert($alertStatus, $alertMessage);

        redirect('faq');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_faq->delete($this->input->post('id_faq'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data faq dengan ID = ".$this->input->post('id_faq')." - ".$this->input->post('faq_question');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data faq : ".$this->input->post('faq_question');
        getAlert($alertStatus, $alertMessage);

        redirect('faq');
    }
    
}
?>