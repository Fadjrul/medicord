<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_user extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('a.*, b.group_name');
        $this->db->from('tbl_user a');
        $this->db->join('tbl_group b', 'a.group_id = b.id_group','LEFT');
        
        if($key!=''){
            $this->db->like("a.user_name", $key);
            $this->db->or_like("a.user_fullname", $key);
            $this->db->or_like("a.user_email", $key);
            $this->db->or_like("b.group_name", $key);
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
        $this->db->insert('tbl_user', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_user', $data, array('id_user' => $data['id_user']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_user', array('id_user' => $id));
    }
    
    public function get($id) {
        $this->db->select('a.*, b.group_name');
        $this->db->from('tbl_user a');
        $this->db->join('tbl_group b', 'a.group_id = b.id_group','LEFT');
        $this->db->where('a.id_user', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>