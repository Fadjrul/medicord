<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pemeriksaan_odontogram extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('id_pemeriksaan_odontogram, pasien_id');
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
        $this->db->update('tbl_rm_pemeriksaan_odontogram', $data, array('id_pemeriksaan_odontogram' => $data['id_pemeriksaan_odontogram']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_rm_pemeriksaan_odontogram', array('id_pemeriksaan_odontogram' => $id));
    }
    
    public function get($id) {
        $this->db->where('id_pemeriksaan_odontogram', $id);
        $query = $this->db->get('tbl_rm_pemeriksaan_odontogram', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(id_pemeriksaan_odontogram) FROM tbl_rm_pemeriksaan_odontogram) as total_rm_pemeriksaan_odontogram
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
