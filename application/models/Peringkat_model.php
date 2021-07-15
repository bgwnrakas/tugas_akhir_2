<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peringkat_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('tb_ranking',$data);
        return true;
    }

    public function reset($id_karyawan)
    { 
        $this->db->delete('tb_ranking', ['id_karyawan' => $id_karyawan, 'tahun' => date('Y')]);
    }

    public function getPeringkat()
    {
        $this->db->select('*')
               ->from('tb_ranking')
               ->join('tb_karyawan', 'tb_ranking.id_karyawan = tb_karyawan.id_karyawan')
               ->order_by('nilai_yi','DESC');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update($id_karyawan,$tahun,$nilai_yi)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->where('tahun', $tahun);
        $this->db->update('tb_ranking', array('nilai_yi' => $nilai_yi));
        return true;
    }
}
