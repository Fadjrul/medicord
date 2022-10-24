<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_pasien extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $status_pasien, $kepesertaan_pasien)
    {
        $this->db->select('a.*, b.nama_status_pasien, c.nama_kepesertaan_pasien');
        $this->db->from('tbl_pasien a');
        $this->db->join('tbl_status_pasien b','a.status_pasien_id=b.id_status_pasien','LEFT');
        $this->db->join('tbl_kepesertaan_pasien c','a.kepesertaan_pasien_id=c.id_kepesertaan_pasien','LEFT');

        if($status_pasien !=""){
            $this->db->where('a.status_pasien_id', $status_pasien);
        }

        if($kepesertaan_pasien !=""){
            $this->db->where('a.kepesertaan_pasien_id', $kepesertaan_pasien);
        }

        if ($key != '') {
            $this->db->like("a.no_rekam_medis", $key);
            $this->db->or_like("a.nama_pasien", $key);
            $this->db->or_like("a.nik_pasien", $key);
            $this->db->or_like("a.nama_kepala_keluarga", $key);
            $this->db->or_like("a.jenis_kelamin", $key);
            $this->db->or_like("a.tgl_lahir_pasien", $key);
            $this->db->or_like("a.alamat_pasien", $key);
            $this->db->or_like("a.no_telp_pasien", $key);
            $this->db->or_like("a.no_bpjs_pasien", $key);
            $this->db->or_like("a.dw", $key);
            $this->db->or_like("a.lw", $key);
            $this->db->or_like("b.nama_status_pasien", $key);
            $this->db->or_like("c.nama_kepesertaan_pasien", $key);
            $this->db->or_like("a.createtime", $key);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.id_pasien', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function last()
    {
        $this->db->select('no_rekam_medis');
        $this->db->from('tbl_pasien');
        $this->db->order_by('no_rekam_medis', 'desc');
        $this->db->limit(1);

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
