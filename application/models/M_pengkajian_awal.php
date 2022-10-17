<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pengkajian_awal extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('id_pengkajian_awal, pasien_id');
        $this->db->from('tbl_rm_pengkajian_awal');
        
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
        $this->db->insert('tbl_rm_pengkajian_awal', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_rm_pengkajian_awal', $data, array('id_pengkajian_awal' => $data['id_pengkajian_awal']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_rm_pengkajian_awal', array('id_pengkajian_awal' => $id));
    }
    
    public function get($id) {
        $this->db->where('id_pengkajian_awal', $id);
        $query = $this->db->get('tbl_rm_pengkajian_awal', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(id_pengkajian_awal) FROM tbl_rm_pengkajian_awal) as total_rm_pengkajian_awal
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
