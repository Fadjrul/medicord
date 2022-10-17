<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_group extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('id_group, group_name');
        $this->db->from('tbl_group');
        
        if($key!=''){
            $this->db->like("group_name", $key);
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
        $this->db->insert('tbl_group', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_group', $data, array('id_group' => $data['id_group']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_group', array('id_group' => $id));
    }
    
    public function get($id) {
        $this->db->where('id_group', $id);
        $query = $this->db->get('tbl_group', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>