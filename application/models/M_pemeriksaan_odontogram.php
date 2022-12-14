<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pemeriksaan_odontogram extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('*');
        $this->db->from('tbl_rm_pemeriksaan_odontogram');
        
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
        $this->db->insert('tbl_rm_pemeriksaan_odontogram', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_rm_pemeriksaan_odontogram', $data, array('pemeriksaan_odontogram_id' => $data['pemeriksaan_odontogram_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_rm_pemeriksaan_odontogram', array('pemeriksaan_odontogram_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('pemeriksaan_odontogram_id', $id);
        $query = $this->db->get('tbl_rm_pemeriksaan_odontogram', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(pemeriksaan_odontogram_id) FROM tbl_rm_pemeriksaan_odontogram) as total_rm_pemeriksaan_odontogram
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
