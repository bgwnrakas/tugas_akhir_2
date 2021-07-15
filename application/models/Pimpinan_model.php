<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pimpinan_model extends CI_Model
{


    public function editDataProfile($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function getDataBonusById($id)
    {
        return $this->db->get_where('tb_bonus', ['id' => $id])->row_array();
    }

    public function editDataBonus($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_bonus', $data);
    }

    public function deleteDataBonus($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tb_bonus', ['id' => $id]);
    }

    public function hitungTotalBonus() {
        $this->db->select_sum('jumlah_bonus');
        $result = $this->db->get('tb_bonus')->row();  
        return $result->jumlah_bonus;
    }

    public function tampil_data()
	{
        // // return $this->db->get('tb_karyawan');
        // $this->db->from('tb_karyawan');
        // $this->db->join('tb_ranking', 'tb_ranking.id_ranking' = 'tb_karyawan.id_karyawan');
        // if($id ! = null){
        //     $this->db->where('item_id', $id);
        // }
        // $query = $this->db->get();
        // return $query;
    }
    
    public function join_tabel(){
		$this->db->select('*');
		$this->db->from('tb_karyawan');
		$this->db->innerjoin('tb_ranking','tb_ranking.id_karyawan=tb_ranking.id_karyawan');
		$query=$this->db->get();
		return $query;
	}
}
