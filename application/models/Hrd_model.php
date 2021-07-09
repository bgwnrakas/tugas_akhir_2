<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hrd_model extends CI_Model
{

    function get()
    {
        $data = $this->db->get('user');
        return $data;
    }

    public function deleteDataPengguna($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('user', ['id' => $id]);
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function editDataProfile($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function editDataPengguna($id)
    {
        $data = [
            "id" => $this->input->post('id'),
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "role_id" => $this->input->post('role_id'),
            "is_active" => $this->input->post('is_active'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }


    public function getDataKaryawanByNik($nik)
    {
        return $this->db->get_where('tb_karyawan', ['nik' => $nik])->result_array();
    }

    public function editDataKaryawan($id)
    {
        $data = [
            "nik" => $this->input->post('nik'),
            "no_ktp" => $this->input->post('no_ktp'),
            "nama_karyawan" => $this->input->post('nama_karyawan'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "alamat" => $this->input->post('alamat'),
            "jabatan" => $this->input->post('jabatan'),
            "posisi" => $this->input->post('posisi'),
            "email" => $this->input->post('email'),
        ];

        $this->db->where('id', $this->input->post('nik'));
        $this->db->update('tb_karyawan', $data);
    }
}
