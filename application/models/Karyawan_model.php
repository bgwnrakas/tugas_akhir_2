<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Karyawan_model extends CI_Model
{
    public function getDataKaryawanBelum()
    {
        return $this->db->get_where('tb_karyawan', ['status' => 'Belum'])->result_array();
    }

    public function getDataKaryawanDiNilai()
    {
        return $this->db->get_where('tb_karyawan', ['status' => 'Dinilai'])->result_array();
    }

    public function getDataJabatan($nik)
    {
        $this->db->select('jabatan');
        $this->db->from('tb_karyawan');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }

    public function updateStatus($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('tb_karyawan', array('status' => 'Dinilai'));
    }
}
