<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_pasien extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $status_pasien, $kepesertaan_pasien, $jns_key)
    {
        $this->db->select('a.*, b.*, c.*, d.* ');
        $this->db->from('tbl_pasien a');
        $this->db->join('tbl_status_pasien b','a.status_pasien_id=b.status_pasien_id','LEFT');
        $this->db->join('tbl_kepesertaan_pasien c','a.kepesertaan_pasien_id=c.kepesertaan_pasien_id','LEFT');
        $this->db->join('tbl_jns_key d','a.jns_key_id=d.jns_key_id','LEFT');

        if($status_pasien !=""){
            $this->db->where('a.status_pasien_id', $status_pasien);
        }

        if($kepesertaan_pasien !=""){
            $this->db->where('a.kepesertaan_pasien_id', $kepesertaan_pasien);
        }

        if($jns_key !=""){
            $this->db->where('a.jns_key_id', $jns_key);
        }

        if ($key != '') {
            $this->db->like("a.no_rekam_medis", $key);
            $this->db->or_like("a.nama_pasien", $key);
            $this->db->or_like("a.nik_pasien", $key);
            $this->db->or_like("a.nama_kepala_keluarga", $key);
            $this->db->or_like("a.no_kk", $key);
            $this->db->or_like("a.jenis_kelamin", $key);
            $this->db->or_like("a.tgl_lahir_pasien", $key);
            $this->db->or_like("a.alamat_pasien", $key);
            $this->db->or_like("a.no_telp_pasien", $key);
            $this->db->or_like("a.no_bpjs_pasien", $key);
            $this->db->or_like("a.dw", $key);
            $this->db->or_like("a.lw", $key);
            $this->db->or_like("b.nama_status_pasien", $key);
            $this->db->or_like("c.nama_kepesertaan_pasien", $key);
            $this->db->or_like("d.nama_jns_key", $key);
            $this->db->or_like("a.createtime", $key);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.pasien_id', 'DESC');

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
        $this->db->update('tbl_pasien', $data, array('pasien_id' => $data['pasien_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_pasien', array('pasien_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('pasien_id', $id);
        $query = $this->db->get('tbl_pasien', 1);
        return $query->result();
    }

    public function widget()
    {
        $query  = $this->db->query(" SELECT
            (SELECT count(pasien_id) FROM tbl_pasien) as total_pasien
        ");
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
