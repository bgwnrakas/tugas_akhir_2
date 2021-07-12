<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penilaian_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('tb_penilaian',$data);
        return true;
    }

    public function update($id_penilaian,$id_sub_kriteria)
    {
        $this->db->where('id_penilaian', $id_penilaian);
        $this->db->update('tb_penilaian', array('id_sub_kriteria' => $id_sub_kriteria));
    }

    public function isNotNull($id_karyawan,$id_sub_kriteria)
    {
      $this->db->select('*')
         ->from('tb_penilaian')
         ->where('id_sub_kriteria',$id_sub_kriteria)
         ->where('id_karyawan',$id_karyawan);
      $result = $this->db->get();
      return $result->row_array();
    } 

    public function deletePenilaian($id_karyawan)
    { 
        $this->db->delete('tb_penilaian', ['id_karyawan' => $id_karyawan, 'tahun' => date('Y')]);
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('tb_karyawan', array('status' => ''));
    }
}
