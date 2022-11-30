<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pengkajian_awal extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key, $pasien, $pegawai) {
        $this->db->select('a.*, b.*, c.nama_pegawai');
        $this->db->from('tbl_rm_pengkajian_awal a');
        $this->db->join('tbl_pasien b','a.pasien_id=b.pasien_id','LEFT');
        $this->db->join('tbl_pegawai c','a.pegawai_id=c.pegawai_id','LEFT');
        
        if($pasien !=""){
            $this->db->where('a.pasien_id', $pasien);
        }

        if($pegawai !=""){
            $this->db->where('a.pegawai_id', $pegawai);
            
        }

        if($key!=''){
            $this->db->like("a.riwayat_penyakit", $key);
            $this->db->or_like("a.riwayat_pengobatan", $key);
            $this->db->or_like("a.riwayat_penyakit_keluarga", $key);
            $this->db->or_like("a.alergi", $key);
            $this->db->or_like("a.kesadaran_fisik", $key);
            $this->db->or_like("a.tekanan_darah", $key);
            $this->db->or_like("a.frekuensi_nafas", $key);
            $this->db->or_like("a.gcs", $key);
            $this->db->or_like("a.frekuensi_nadi", $key);
            $this->db->or_like("a.suhu_tubuh", $key);
            $this->db->or_like("a.masalah_fisik", $key);
            $this->db->or_like("a.keluhan_pernafasan", $key);
            $this->db->or_like("a.irama_nafas", $key);
            $this->db->or_like("a.suara_nafas", $key);
            $this->db->or_like("a.masalah_pernafasan", $key);
            $this->db->or_like("a.nyeri_dada", $key);
            $this->db->or_like("a.suara_jantung", $key);
            $this->db->or_like("a.crt", $key);
            $this->db->or_like("a.jvp", $key);
            $this->db->or_like("a.masalah_kardiovaskular", $key);
            $this->db->or_like("a.keluhan_pusing", $key);
            $this->db->or_like("a.kesadaran_persyarafan", $key);
            $this->db->or_like("a.pupil", $key);
            $this->db->or_like("a.sklera", $key);
            $this->db->or_like("a.kaku_kuduk", $key);
            $this->db->or_like("a.kelumpuhan", $key);
            $this->db->or_like("a.gangg_persepsi_sensorik", $key);
            $this->db->or_like("a.masalah_persyarafan", $key);
            $this->db->or_like("a.keluhan_sistem_ekskresi", $key);
            $this->db->or_like("a.produksi_urin", $key);
            $this->db->or_like("a.bak", $key);
            $this->db->or_like("a.warna_urin", $key);
            $this->db->or_like("a.bau_urin", $key);
            $this->db->or_like("a.masalah_ekskresi", $key);
            $this->db->or_like("a.mulut", $key);
            $this->db->or_like("a.abdomen", $key);
            $this->db->or_like("a.bab", $key);
            $this->db->or_like("a.konsistensi_bab", $key);
            $this->db->or_like("a.diet", $key);
            $this->db->or_like("a.frekuensi_diet", $key);
            $this->db->or_like("a.jml_frekuensi_diet", $key);
            $this->db->or_like("a.masalah_pencernaan", $key);
            $this->db->or_like("a.pergerak_sendi", $key);
            $this->db->or_like("a.akral", $key);
            $this->db->or_like("a.patah_tulang", $key);
            $this->db->or_like("a.eks_fiksasi", $key);
            $this->db->or_like("a.kekuatan_otot", $key);
            $this->db->or_like("a.turgor", $key);
            $this->db->or_like("a.masalah_muskuloskeletal", $key);
            $this->db->or_like("a.penis", $key);
            $this->db->or_like("a.scrotum", $key);
            $this->db->or_like("a.testis", $key);
            $this->db->or_like("a.vagina", $key);
            $this->db->or_like("a.pendarahan", $key);
            $this->db->or_like("a.siklus_haid", $key);
            $this->db->or_like("a.payudara", $key);
            $this->db->or_like("a.masalah_reproduksi", $key);
            $this->db->or_like("a.psikologis", $key);
            $this->db->or_like("a.sosiologis", $key);
            $this->db->or_like("a.spiritual", $key);
            $this->db->or_like("a.masalah_psikologis", $key);
            $this->db->or_like("a.hambatan_diri", $key);
            $this->db->or_like("a.data_penunjang", $key);
            $this->db->or_like("a.createtime", $key);
            $this->db->or_like("b.nama_pasien", $key);
            $this->db->or_like("b.no_rekam_medis", $key);
            $this->db->or_like("b.jenis_kelamin", $key);
            $this->db->or_like("b.tgl_lahir_pasien", $key);
            $this->db->or_like("c.nama_pegawai", $key);
        }

        if($limit !="" OR $start !=""){
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.pengkajian_awal_id', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function create($data) {
        $this->db->insert('tbl_rm_pengkajian_awal', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_rm_pengkajian_awal', $data, array('pengkajian_awal_id' => $data['pengkajian_awal_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_rm_pengkajian_awal', array('pengkajian_awal_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('pengkajian_awal_id', $id);
        $query = $this->db->get('tbl_rm_pengkajian_awal', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(pengkajian_awal_id) FROM tbl_rm_pengkajian_awal) as total_rm_pengkajian_awal
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
