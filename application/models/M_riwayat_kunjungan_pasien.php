<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_riwayat_kunjungan_pasien extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('id_riwayat_kunjungan_pasien, pasien_id');
        $this->db->from('tbl_rm_riwayat_kunjungan_pasien');
        
        if($key!=''){
            $this->db->like("pasien_id", $key);
        }

        if($limit !="" OR $start !=""){
            $this->db->limit($limit, $start);
        }

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
        $this->db->insert('tbl_rm_riwayat_kunjungan_pasien', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_rm_riwayat_kunjungan_pasien', $data, array('id_riwayat_kunjungan_pasien' => $data['id_riwayat_kunjungan_pasien']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_rm_riwayat_kunjungan_pasien', array('id_riwayat_kunjungan_pasien' => $id));
    }
    
    public function get($id) {
        $this->db->where('id_riwayat_kunjungan_pasien', $id);
        $query = $this->db->get('tbl_rm_riwayat_kunjungan_pasien', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(id_riwayat_kunjungan_pasien) FROM tbl_rm_riwayat_kunjungan_pasien) as total_rm_riwayat_kunjungan_pasien
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
