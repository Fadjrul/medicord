<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_poliklinik extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('id_poliklinik, nama_poliklinik');
        $this->db->from('tbl_poliklinik');
        
        if($key!=''){
            $this->db->like("nama_poliklinik", $key);
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
        $this->db->insert('tbl_poliklinik', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_poliklinik', $data, array('id_poliklinik' => $data['id_poliklinik']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_poliklinik', array('id_poliklinik' => $id));
    }
    
    public function get($id) {
        $this->db->where('id_poliklinik', $id);
        $query = $this->db->get('tbl_poliklinik', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(id_poliklinik) FROM tbl_poliklinik) as total_poliklinik
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
