<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_faq extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('*');
        $this->db->from('tbl_faq');
        
        if($key!=''){
            $this->db->like("faq_question", $key);
            $this->db->or_like("faq_answer", $key);
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
        $this->db->insert('tbl_faq', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_faq', $data, array('faq_id' => $data['faq_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_faq', array('faq_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('faq_id', $id);
        $query = $this->db->get('tbl_faq', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>