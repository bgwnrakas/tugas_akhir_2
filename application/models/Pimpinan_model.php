<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pimpinan_model extends CI_Model
{


    public function editDataProfile($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}
