<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Karyawan_model extends CI_Model
{
    public function getDataKaryawanByID($id_karyawan)
    {
        return $this->db->get_where('tb_karyawan', ['id_karyawan' => $id_karyawan])->row_array();
    }
    
    public function getDataKaryawanBelum($departemen)
    {
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->where('status !=', date("Y"));
        $this->db->where('departemen', $departemen);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataKaryawanDiNilai($departemen)
    {
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->where('status', date("Y"));
        $this->db->where('departemen', $departemen);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateStatus($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->update('tb_karyawan', array('status' => date("Y")));
    }

    public function CountAllKaryawanByDepartmen($departemen)
    {
        $this->db->where('departemen', $departemen);
        return $this->db->count_all_results('tb_karyawan');
    }

    public function CekRankingKaryawan($departemen)
    {
        $this->db->select('*')
               ->from('tb_ranking')
               ->join('tb_karyawan', 'tb_ranking.id_karyawan = tb_karyawan.id_karyawan')
               ->where('tb_karyawan.departemen',$departemen);
        $result = $this->db->get();
        return $result->result_array();
    }
}
