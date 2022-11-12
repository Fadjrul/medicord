<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_kepesertaan_pasien extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('*');
        $this->db->from('tbl_kepesertaan_pasien');

        if ($key != '') {
            $this->db->like("nama_kepesertaan_pasien", $key);
            $this->db->or_like("createtime", $key);
        }

        if ($limit != "" or $start != "") {
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

    public function get($id)
    {
        $this->db->where('id_kepesertaan_pasien', $id);
        $query = $this->db->get('tbl_kepesertaan_pasien', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
