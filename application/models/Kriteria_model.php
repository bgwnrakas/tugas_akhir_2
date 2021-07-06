<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kriteria_model extends CI_Model
{
    public function getJenisKriteria()
    {
      $this->db->select('jenis_kriteria');
      $this->db->from('tb_kriteria');
      $this->db->group_by('jenis_kriteria');
      $this->db->order_by('id_kriteria','ASC');
      $query = $this->db->get(); 
      return $query->result_array();
    }

    public function getNamaKriteria($jenis)
    {
      $this->db->select('*');
      $this->db->from('tb_kriteria');
      $this->db->where('jenis_kriteria',$jenis);
      $query = $this->db->get(); 
      return $query->result_array();
    }

    public function getBobot($nik)
    {

      $this->db->select('*')
         ->from('tb_kriteria')
         ->join('tb_penilaian', 'tb_kriteria.id_kriteria = tb_penilaian.id_kriteria')
         ->join('tb_karyawan','tb_penilaian.NIK = tb_karyawan.NIK')
         ->where('tb_karyawan.NIK',$nik);
      $result = $this->db->get();
      return $result->result_array();
    }
}
