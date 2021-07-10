<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peringkat_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('tb_ranking',$data);
        return true;
    }
}
