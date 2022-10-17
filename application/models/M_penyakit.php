<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_penyakit extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('id_penyakit, nama_penyakit');
        $this->db->from('tbl_penyakit');
        
        if($key!=''){
            $this->db->like("nama_penyakit", $key);
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
        $this->db->insert('tbl_penyakit', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_penyakit', $data, array('id_penyakit' => $data['id_penyakit']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_penyakit', array('id_penyakit' => $id));
    }
    
    public function get($id) {
        $this->db->where('id_penyakit', $id);
        $query = $this->db->get('tbl_penyakit', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
