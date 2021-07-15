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
}
