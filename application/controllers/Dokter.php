<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dokter extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_dokter');
        $this->load->library('upload');
        
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
        $data['dokter']        = $this->m_dokter->read($perPage, $page,'');
		
        
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
        $data['dokter']        = $this->m_dokter->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "dokter/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    
    public function create_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Tambah Data Dokter';
        $data['dokter']       = $this->m_dokter->read('', '', '');

        // TEMPLATE
        $view         = "dokter/add";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function detail_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Detail Data Pasien';
        $data['dokter']        = $this->m_dokter->get($this->uri->segment(3));
        $data['dokters']        = $this->m_dokter->read('', '', '');

        // TEMPLATE
        $view         = "dokter/detail";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function update_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Ubah Data Pasien';
        $data['dokter']        = $this->m_dokter->get($this->uri->segment(3));
        $data['dokters']       = $this->m_dokter->read('', '', '');

        // TEMPLATE
        $view         = "dokter/update";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function create() {
        csrfValidate();
        $formatName                	= $this->input->post('id_dokter').date('YmdHis');
        // Upload For ttd dokter
		if ($_FILES['ttd']['name'] != '') {

			$config_ttd['upload_path']     = './assets/core-images/';
			$config_ttd['allowed_types']   = "gif|jpg|jpeg|png|svg";
			$config_ttd['overwrite']       = "true";
			$config_ttd['file_name']       = 'dokter' . $formatName;
			$this->upload->initialize($config_ttd);

			if (!$this->upload->do_upload('ttd')) {
				echo $this->upload->display_errors();
			} else {
				unlink("./assets/core-images/".$this->input->post('ttd_dokter'));
				$ttd                    = $this->upload->data();
				$data['ttd_dokter']    = $ttd['file_name'];
			}
		}

        // POST
        $data['id_dokter']   = '';
        $data['nama_dokter'] = $this->input->post('nama_dokter');
        $data['spesialis'] = $this->input->post('spesialis');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_dokter->create($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data dokter ".$data['nama_dokter'];
        getAlert($alertStatus, $alertMessage);

        redirect('dokter/index');
    }
    

    public function update() {
        csrfValidate();
        $formatName                	= $this->input->post('id_dokter').date('YmdHis');
        // Upload For ttd dokter
		if ($_FILES['ttd']['name'] != '') {

			$config_ttd['upload_path']     = './assets/core-images/';
			$config_ttd['allowed_types']   = "gif|jpg|jpeg|png|svg";
			$config_ttd['overwrite']       = "true";
			$config_ttd['file_name']       = 'dokter' . $formatName;
			$this->upload->initialize($config_ttd);

			if (!$this->upload->do_upload('ttd')) {
				echo $this->upload->display_errors();
			} else {
				unlink("./assets/core-images/".$this->input->post('ttd_dokter'));
				$ttd                    = $this->upload->data();
				$data['ttd_dokter']    = $ttd['file_name'];
			}
		}

        // POST
        $data['id_dokter']   = $this->input->post('id_dokter');
        $data['nama_dokter'] = $this->input->post('nama_dokter');
        $data['spesialis'] = $this->input->post('spesialis');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_telp'] = $this->input->post('no_telp');
        $this->m_dokter->update($data);

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

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data dokter : ".$this->input->post('nama_dokter');
        getAlert($alertStatus, $alertMessage);

        redirect('dokter/index');
    }
    
}
?>