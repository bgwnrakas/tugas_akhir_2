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

    public function getDataKaryawanDepatemenAll($departemen)
    {
        $this->db->select('*');
        $this->db->from('tb_karyawan');
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

    public function CekRankingIfNull($departemen)
    {
        $this->db->select('*')
               ->from('tb_karyawan')
               ->join('tb_ranking', 'tb_karyawan.id_karyawan = tb_ranking.id_karyawan','left')
               ->where('tb_karyawan.departemen',$departemen)
               ->where('tb_ranking.tahun', date("Y"));
        $result = $this->db->get();
        return $result->result_array();  
    }

    public function CekKaryawanOnRank($id_karyawan,$departemen)
    {
        $this->db->select('*')
               ->from('tb_karyawan')
               ->join('tb_ranking', 'tb_karyawan.id_karyawan = tb_ranking.id_karyawan','left')
               ->where('tb_karyawan.departemen',$departemen)
               ->where('tahun', date("Y"))
               ->where('tb_ranking.id_karyawan',$id_karyawan);
        $result = $this->db->get();
        return $result->row_array();  
    }
}
