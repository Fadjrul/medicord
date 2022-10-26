<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Status_pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_status_pasien');
        if (!$this->session->userdata('id_user') or $this->session->userdata('user_group') != 1) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('auth');
        }
    }


    public function index()
    {
        $this->session->unset_userdata('sess_search_status_pasien');

        // PAGINATION
        $baseUrl    = base_url() . "status_pasien/index/";
        $totalRows  = count((array) $this->m_status_pasien->read('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Status Pasien';
        $data['pasien']        = $this->m_status_pasien->read($perPage, $page, '');

        // TEMPLATE
        $view         = "status_pasien/index";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_status_pasien', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_status_pasien');
        }

        // PAGINATION
        $baseUrl    = base_url() . "status_pasien/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_status_pasien->read('', '', $data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Status Pasien';
        $data['pasien']        = $this->m_status_pasien->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "pasien/index";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function create_page()
    {
        
        //DATA
        $data['setting']        = getSetting();
        $data['title']          = 'Tambah Data Status Pasien';
        $data['status_pasien']  = $this->m_status_pasien->get($this->uri->segment(3));
        $data['status_pasiens'] = $this->m_status_pasien->read('', '', '');

        // TEMPLATE
        $view         = "pasien/add";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function detail_page()
    {

        //DATA
        $data['setting']        = getSetting();
        $data['title']          = 'Detail Data Status Pasien';
        $data['status_pasien']  = $this->m_status_pasien->get($this->uri->segment(3));
        $data['status_pasiens'] = $this->m_status_pasien->read('', '', '');

        // TEMPLATE
        $view         = "status_pasien/detail";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function update_page()
    {

        //DATA
        $data['setting']        = getSetting();
        $data['title']          = 'Ubah Data Status Pasien';
        $data['status_pasien']  = $this->m_status_pasien->get($this->uri->segment(3));
        $data['status_pasiens'] = $this->m_status_pasien->read('', '', '');

        // TEMPLATE
        $view         = "pasien/update";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function create()
    {
        csrfValidate();

        // POST
        $data['id_status_pasien']   = $this->input->post('id_status_pasien');
        $data['status_pasien'] = $this->input->post('status_pasien');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_status_pasien->create($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data status pasien " . $data['status_pasien'];
        getAlert($alertStatus, $alertMessage);

        redirect('status_pasien/index');
    }


    public function update()
    {
        csrfValidate();
        // POST
        $data['id_status_pasien']   = $this->input->post('id_status_pasien');
        $data['status_pasien'] = $this->input->post('status_pasien');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_status_pasien->update($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data status pasien : " . $data['status_pasien'];
        getAlert($alertStatus, $alertMessage);

        redirect('status_pasien/index');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_status_pasien->delete($this->input->post('id_status_pasien'));

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data status pasien : " . $this->input->post('status_pasien');
        getAlert($alertStatus, $alertMessage);

        redirect('status_pasien/index');
    }
}