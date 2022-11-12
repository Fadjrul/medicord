<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengkajian_awal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pengkajian_awal');
        $this->load->model('m_pasien');
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
        $this->session->unset_userdata('sess_search_pengkajian_awal');

        // PAGINATION
        $baseUrl    = base_url() . "pengkajian_awal/index/";
        $totalRows  = count((array) $this->m_pengkajian_awal->read('','','','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Rekam Medis Pengkajian Awal';
        $data['pengkajian_awal']  = $this->m_pengkajian_awal->read($perPage, $page,'','','','','');
		
        
        // TEMPLATE
		$view         = "rekam_medis/pengkajian_awal/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_pengkajian_awal', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_pengkajian_awal');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "pengkajian_awal/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_pengkajian_awal->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Rekam Medis Pengkajian Awal';
        $data['pengkajian_awal']        = $this->m_pengkajian_awal->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "rekam_medis/pengkajian_awal/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    public function create_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Tambah Data';
        $data['pasien']  = $this->m_pasien->read('', '', '', '', '');
        $data['pegawai']  = $this->m_pegawai->read('', '', '', '', '');
        $data['pengkajian_awal']       = $this->m_pengkajian_awal->read('', '', '', '', '');

        // TEMPLATE
        $view         = "rekam_medis/pengkajian_awal/add";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function detail_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Detail Data';
        $data['pengkajian_awal']  = $this->m_pengkajian_awal->get($this->uri->segment(3));
        $data['pasien']  = $this->m_pasien->read('', '', '', '', '');
        $data['pegawai']  = $this->m_pegawai->read('', '', '', '', '');
        $data['pengkajian_awals']        = $this->m_pengkajian_awal->read('', '', '', '', '');

        // TEMPLATE
        $view         = "rekam_medis/pengkajian_awal/detail";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function update_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Ubah Data';
        $data['pengkajian_awal']  = $this->m_pengkajian_awal->get($this->uri->segment(3));
        $data['pasien']  = $this->m_pasien->read('', '', '', '', '');
        $data['pegawai']  = $this->m_pegawai->read('', '', '', '', '');
        $data['pengkajian_awals']        = $this->m_pengkajian_awal->read('', '', '', '', '');

        // TEMPLATE
        $view         = "rekam_medis/pengkajian_awal/update";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['id_pengkajian_awal']   = '';
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['pegawai_id'] = $this->input->post('pegawai_id');
        $data['riwayat_penyakit'] = $this->input->post('riwayat_penyakit');
        $data['riwayat_pengobatan'] = $this->input->post('riwayat_pengobatan');
        $data['riwayat_penyakit_keluarga'] = $this->input->post('riwayat_penyakit_keluarga');
        $data['alergi'] = $this->input->post('alergi');
        $data['kesadaran_fisik'] = $this->input->post('kesadaran_fisik');
        $data['tekanan_darah'] = $this->input->post('tekanan_darah');
        $data['frekuensi_nafas'] = $this->input->post('frekuensi_nafas');
        $data['gcs'] = $this->input->post('gcs');
        $data['frekuensi_nadi'] = $this->input->post('frekuensi_nadi');
        $data['suhu_tubuh'] = $this->input->post('suhu_tubuh');
        $data['masalah_fisik'] = implode(", ",$this->input->post('masalah_fisik'));
        $data['keluhan_pernafasan'] = implode(", ",$this->input->post('keluhan_pernafasan'));
        $data['irama_nafas'] = $this->input->post('irama_nafas');
        $data['suara_nafas'] = implode(", ",$this->input->post('suara_nafas'));
        $data['masalah_pernafasan'] = implode(", ",$this->input->post('masalah_pernafasan'));
        $data['nyeri_dada'] = $this->input->post('nyeri_dada');
        $data['suara_jantung'] = $this->input->post('suara_jantung');
        $data['crt'] = $this->input->post('crt');
        $data['jvp'] = $this->input->post('jvp');
        $data['masalah_kardiovaskular'] = implode(", ",$this->input->post('masalah_kardiovaskular'));
        $data['keluhan_pusing'] = $this->input->post('keluhan_pusing');
        $data['kesadaran_persyarafan'] = implode(", ",$this->input->post('kesadaran_persyarafan'));
        $data['pupil'] = $this->input->post('pupil');
        $data['sklera'] = implode(", ",$this->input->post('sklera'));
        $data['kaku_kuduk'] = $this->input->post('kaku_kuduk');
        $data['kelumpuhan'] = $this->input->post('kelumpuhan');
        $data['gangg_persepsi_sensorik'] = $this->input->post('gangg_persepsi_sensorik');
        $data['masalah_persyarafan'] = implode(", ",$this->input->post('masalah_persyarafan'));
        $data['keluhan_sistem_ekskresi'] = implode(", ",$this->input->post('keluhan_sistem_ekskresi'));
        $data['produksi_urin'] = $this->input->post('produksi_urin');
        $data['bak'] = $this->input->post('bak');
        $data['warna_urin'] = $this->input->post('warna_urin');
        $data['bau_urin'] = $this->input->post('bau_urin');
        $data['masalah_ekskresi'] = implode(", ",$this->input->post('masalah_ekskresi'));
        $data['mulut'] = implode(", ",$this->input->post('mulut'));
        $data['abdomen'] = implode(", ",$this->input->post('abdomen'));
        $data['bab'] = $this->input->post('bab');
        $data['konsistensi_bab'] = implode(", ",$this->input->post('konsistensi_bab'));
        $data['diet'] = implode(", ",$this->input->post('diet'));
        $data['frekuensi_diet'] = $this->input->post('frekuensi_diet');
        $data['jml_frekuensi_diet'] = $this->input->post('jml_frekuensi_diet');
        $data['masalah_pencernaan'] = implode(", ",$this->input->post('masalah_pencernaan'));
        $data['pergerak_sendi'] = $this->input->post('pergerak_sendi');
        $data['akral'] = implode(", ",$this->input->post('akral'));
        $data['patah_tulang'] = $this->input->post('patah_tulang');
        $data['eks_fiksasi'] = implode(", ",$this->input->post('eks_fiksasi'));
        $data['kekuatan_otot'] = $this->input->post('kekuatan_otot');
        $data['turgor'] = $this->input->post('turgor');
        $data['masalah_muskuloskeletal'] = implode(", ",$this->input->post('masalah_muskuloskeletal'));
        $data['penis'] = $this->input->post('penis');
        $data['scrotum'] = $this->input->post('scrotum');
        $data['testis'] = $this->input->post('testis');
        $data['vagina'] = $this->input->post('vagina');
        $data['pendarahan'] = $this->input->post('pendarahan');
        $data['siklus_haid'] = $this->input->post('siklus_haid');
        $data['payudara'] = $this->input->post('payudara');
        $data['masalah_reproduksi'] = implode(", ",$this->input->post('masalah_reproduksi'));
        $data['psikologis'] = implode(", ",$this->input->post('psikologis'));
        $data['sosiologis'] = implode(", ",$this->input->post('sosiologis'));
        $data['spiritual'] = implode(", ",$this->input->post('spiritual'));
        $data['masalah_psikologis'] = implode(", ",$this->input->post('masalah_psikologis'));
        $data['hambatan_diri'] = implode(", ",$this->input->post('hambatan_diri'));
        $data['data_penunjang'] = $this->input->post('data_penunjang');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_pengkajian_awal->create($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data rekam medis pengkajian awal ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal/index');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['id_pengkajian_awal']   = '';
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['pegawai_id'] = $this->input->post('pegawai_id');
        $data['riwayat_penyakit'] = $this->input->post('riwayat_penyakit');
        $data['riwayat_pengobatan'] = $this->input->post('riwayat_pengobatan');
        $data['riwayat_penyakit_keluarga'] = $this->input->post('riwayat_penyakit_keluarga');
        $data['alergi'] = $this->input->post('alergi');
        $data['kesadaran_fisik'] = $this->input->post('kesadaran_fisik');
        $data['tekanan_darah'] = $this->input->post('tekanan_darah');
        $data['frekuensi_nafas'] = $this->input->post('frekuensi_nafas');
        $data['gcs'] = $this->input->post('gcs');
        $data['frekuensi_nadi'] = $this->input->post('frekuensi_nadi');
        $data['suhu_tubuh'] = $this->input->post('suhu_tubuh');
        $data['masalah_fisik'] = implode(", ",$this->input->post('masalah_fisik'));
        $data['keluhan_pernafasan'] = implode(", ",$this->input->post('keluhan_pernafasan'));
        $data['irama_nafas'] = $this->input->post('irama_nafas');
        $data['suara_nafas'] = implode(", ",$this->input->post('suara_nafas'));
        $data['masalah_pernafasan'] = implode(", ",$this->input->post('masalah_pernafasan'));
        $data['nyeri_dada'] = $this->input->post('nyeri_dada');
        $data['suara_jantung'] = $this->input->post('suara_jantung');
        $data['crt'] = $this->input->post('crt');
        $data['jvp'] = $this->input->post('jvp');
        $data['masalah_kardiovaskular'] = implode(", ",$this->input->post('masalah_kardiovaskular'));
        $data['keluhan_pusing'] = $this->input->post('keluhan_pusing');
        $data['kesadaran_persyarafan'] = implode(", ",$this->input->post('kesadaran_persyarafan'));
        $data['pupil'] = $this->input->post('pupil');
        $data['sklera'] = implode(", ",$this->input->post('sklera'));
        $data['kaku_kuduk'] = $this->input->post('kaku_kuduk');
        $data['kelumpuhan'] = $this->input->post('kelumpuhan');
        $data['gangg_persepsi_sensorik'] = $this->input->post('gangg_persepsi_sensorik');
        $data['masalah_persyarafan'] = implode(", ",$this->input->post('masalah_persyarafan'));
        $data['keluhan_sistem_ekskresi'] = implode(", ",$this->input->post('keluhan_sistem_ekskresi'));
        $data['produksi_urin'] = $this->input->post('produksi_urin');
        $data['bak'] = $this->input->post('bak');
        $data['warna_urin'] = $this->input->post('warna_urin');
        $data['bau_urin'] = $this->input->post('bau_urin');
        $data['masalah_ekskresi'] = implode(", ",$this->input->post('masalah_ekskresi'));
        $data['mulut'] = implode(", ",$this->input->post('mulut'));
        $data['abdomen'] = implode(", ",$this->input->post('abdomen'));
        $data['bab'] = $this->input->post('bab');
        $data['konsistensi_bab'] = implode(", ",$this->input->post('konsistensi_bab'));
        $data['diet'] = implode(", ",$this->input->post('diet'));
        $data['frekuensi_diet'] = $this->input->post('frekuensi_diet');
        $data['jml_frekuensi_diet'] = $this->input->post('jml_frekuensi_diet');
        $data['masalah_pencernaan'] = implode(", ",$this->input->post('masalah_pencernaan'));
        $data['pergerak_sendi'] = $this->input->post('pergerak_sendi');
        $data['akral'] = implode(", ",$this->input->post('akral'));
        $data['patah_tulang'] = $this->input->post('patah_tulang');
        $data['eks_fiksasi'] = implode(", ",$this->input->post('eks_fiksasi'));
        $data['kekuatan_otot'] = $this->input->post('kekuatan_otot');
        $data['turgor'] = $this->input->post('turgor');
        $data['masalah_muskuloskeletal'] = implode(", ",$this->input->post('masalah_muskuloskeletal'));
        $data['penis'] = $this->input->post('penis');
        $data['scrotum'] = $this->input->post('scrotum');
        $data['testis'] = $this->input->post('testis');
        $data['vagina'] = $this->input->post('vagina');
        $data['pendarahan'] = $this->input->post('pendarahan');
        $data['siklus_haid'] = $this->input->post('siklus_haid');
        $data['payudara'] = $this->input->post('payudara');
        $data['masalah_reproduksi'] = implode(", ",$this->input->post('masalah_reproduksi'));
        $data['psikologis'] = implode(", ",$this->input->post('psikologis'));
        $data['sosiologis'] = implode(", ",$this->input->post('sosiologis'));
        $data['spiritual'] = implode(", ",$this->input->post('spiritual'));
        $data['masalah_psikologis'] = implode(", ",$this->input->post('masalah_psikologis'));
        $data['hambatan_diri'] = implode(", ",$this->input->post('hambatan_diri'));
        $data['data_penunjang'] = $this->input->post('data_penunjang');
        $this->m_pengkajian_awal->update($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data rekam medis pengkajian awal : ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal/index');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_pengkajian_awal->delete($this->input->post('id_pengkajian_awal'));

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data rekam medis pengkajian awal : ".$this->input->post('pasien_id');
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal/index');
    }
    
}
?>