<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peringkat_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('tb_ranking',$data);
        return true;
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
}
