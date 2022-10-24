<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pegawai extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        
        if($key!=''){
            $this->db->like("nama_pegawai", $key);
            $this->db->like("jenis_kelamin", $key);
            $this->db->like("status_pegawai", $key);
            $this->db->like("bidang_pegawai", $key);
            $this->db->like("alamat_pegawai", $key);
            $this->db->like("no_telp_pegawai", $key);
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
        $this->db->insert('tbl_pegawai', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_pegawai', $data, array('id_pegawai' => $data['id_pegawai']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_pegawai', array('id_pegawai' => $id));
    }
    
    public function get($id) {
        $this->db->where('id_pegawai', $id);
        $query = $this->db->get('tbl_pegawai', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(id_pegawai) FROM tbl_pegawai) as total_pegawai
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
