<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_obat extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('id_obat, nama_obat');
        $this->db->from('tbl_obat');
        
        if($key!=''){
            $this->db->like("nama_obat", $key);
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
        $this->db->insert('tbl_obat', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_obat', $data, array('id_obat' => $data['id_obat']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_obat', array('id_obat' => $id));
    }
    
    public function get($id) {
        $this->db->where('id_obat', $id);
        $query = $this->db->get('tbl_obat', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(id_obat) FROM tbl_obat) as total_obat
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
