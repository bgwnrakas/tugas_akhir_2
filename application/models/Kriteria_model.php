<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kriteria_model extends CI_Model
{
  public function getKriteria()
  {
    $this->db->select('*')
      ->from('tb_kriteria')
      ->where('tahun',date('Y'))
      ->order_by('jenis_kriteria', 'ASC')
      ->order_by('id_kriteria', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }
  

  public function getKriteriaBobot()
  {
    $data  = $this->getKriteria();
    $bobot = array();
    foreach ($data as $index => $r) {
      $bobot[$index] = $r['bobot_kriteria'];
    }
    return $bobot;
  }

  public function getKriteriaJenis()
  {
    $data  = $this->getKriteria();
    $jenis = array();
    foreach ($data as $index => $r) {
      $jenis[$index] = $r['jenis_kriteria'];
    }
    return $jenis;
  }

  public function getSubKriteria($id_kriteria)
  {
    $this->db->select('*')
      ->from('tb_sub_kriteria')
      ->where('id_kriteria', $id_kriteria);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getSubKriteriaByID($id_karyawan)
  {
    $this->db->select('*')
      ->from('tb_sub_kriteria')
      ->join('tb_penilaian', 'tb_sub_kriteria.id_sub_kriteria = tb_penilaian.id_sub_kriteria')
      ->join('tb_karyawan', 'tb_penilaian.id_karyawan = tb_karyawan.id_karyawan')
      ->where('tb_karyawan.id_karyawan', $id_karyawan)
      ->where('tb_penilaian.tahun', date("Y"));
    $result = $this->db->get();
    return $result->result_array();
  }

  public function getSubKriteriaByID2($id_sub_kriteria, $id_karyawan)
  {
    $this->db->select('*')
      ->from('tb_penilaian')
      ->join('tb_sub_kriteria', 'tb_sub_kriteria.id_sub_kriteria = tb_penilaian.id_sub_kriteria')
      ->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_penilaian.id_karyawan')
      ->where('tb_penilaian.id_sub_kriteria', $id_sub_kriteria)
      ->where('tb_penilaian.id_karyawan', $id_karyawan);
    $result = $this->db->get();
    return $result->row_array();
  }

  public function getDataSubKriteria()
  {
    $this->db->select('*')
      ->from('tb_sub_kriteria')
      ->join('tb_kriteria', 'tb_sub_kriteria.id_kriteria = tb_kriteria.id_kriteria');
    $result = $this->db->get();
    return $result->result_array();
  }

  public function cekIfUsed()
  {
    $this->db->select('*')
      ->from('tb_kriteria')
      ->join('tb_karyawan', 'tb_kriteria.tahun = tb_karyawan.status')
      ->where('tb_kriteria.tahun',date("Y"));
    $query = $this->db->get();
    return $query->result_array();
  }
}
