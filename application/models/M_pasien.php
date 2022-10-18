<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_pasien extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('*');
        $this->db->from('tbl_pasien');

        if ($key != '') {
            $this->db->like("no_rekam_medis", $key);
            $this->db->or_like("nama_pasien", $key);
            $this->db->or_like("nik_pasien", $key);
            $this->db->or_like("nama_kepala_keluarga", $key);
            $this->db->or_like("jenis_kelamin", $key);
            $this->db->or_like("tgl_lahir_pasien", $key);
            $this->db->or_like("alamat_pasien", $key);
            $this->db->or_like("no_telp_pasien", $key);
            $this->db->or_like("no_bpjs_pasien", $key);
            $this->db->or_like("dw", $key);
            $this->db->or_like("lw", $key);
            $this->db->or_like("status_pasien", $key);
            $this->db->or_like("jns_kepesertaan", $key);
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

    public function create($data)
    {
        $this->db->insert('tbl_pasien', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_pasien', $data, array('id_pasien' => $data['id_pasien']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_pasien', array('id_pasien' => $id));
    }

    public function get($id)
    {
        $this->db->where('id_pasien', $id);
        $query = $this->db->get('tbl_pasien', 1);
        return $query->result();
    }

    public function widget()
    {
        $query  = $this->db->query(" SELECT
            (SELECT count(id_pasien) FROM tbl_pasien) as total_pasien
        ");
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
