<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penilaian_model extends CI_Model
{


    public function insert($data)
    {
        $this->db->insert('tb_penilaian',$data);
        return true;
    }

   
}
