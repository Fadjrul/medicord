<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_dokter extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('id_dokter, nama_dokter');
        $this->db->from('tbl_dokter');
        
        if($key!=''){
            $this->db->like("nama_dokter", $key);
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
        $this->db->insert('tbl_dokter', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_dokter', $data, array('id_dokter' => $data['id_dokter']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_dokter', array('id_dokter' => $id));
    }
    
    public function get($id) {
        $this->db->where('id_dokter', $id);
        $query = $this->db->get('tbl_dokter', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(id_dokter) FROM tbl_dokter) as total_dokter
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
