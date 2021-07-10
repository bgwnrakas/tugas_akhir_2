<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kabag_model extends CI_Model
{
    public function editDataProfile($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function getDepartemenKabag($id)
    {
        $data = $this->db->get_where('user_role', ['id' => $id])->row_array();
        return  explode(' ', $data['role'], 2)[1];
    }
}
