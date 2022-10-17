<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_setting extends CI_Model {
                
    function __construct() {
        parent::__construct();
    }
    

    public function fetch_setting() {
        $this->db->select("*");
        $this->db->from('tbl_setting');
        $this->db->where('id_setting', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    

    public function update_setting($data) {
        $this->db->update('tbl_setting', $data, array('id_setting' => $data['id_setting']));
    }
    

    function __destruct() {
        $this->db->close();
    }          
}
?>