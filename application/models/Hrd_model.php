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

    public function deleteDataKaryawan($id_karyawan)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tb_karyawan', ['id_karyawan' => $id_karyawan]);
    }

    public function deleteDataKriteria($id_kriteria)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tb_kriteria', ['id_kriteria' => $id_kriteria]);
    }

    public function deleteDataSubKriteria($id_sub_kriteria)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tb_sub_kriteria', ['id_sub_kriteria' => $id_sub_kriteria]);
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


    public function getDataKaryawanById($id_karyawan)
    {
        return $this->db->get_where('tb_karyawan', ['id_karyawan' => $id_karyawan])->row_array();
    }

    public function getDataKriteriaById($id_kriteria)
    {
        return $this->db->get_where('tb_kriteria', ['id_kriteria' => $id_kriteria])->row_array();
    }

    public function getDataSubKriteriaById($id_sub_kriteria)
    {
        return $this->db->get_where('tb_sub_kriteria', ['id_sub_kriteria' => $id_sub_kriteria])->row_array();
    }

    public function editDataKriteria($id_kriteria,$data)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('tb_kriteria', $data);
    }

    public function editDataSubKriteria($id_sub_kriteria)
    {
        $data = [
            "id_sub_kriteria" => $this->input->post('id_sub_kriteria'),
            "id_kriteria" => $this->input->post('id_kriteria'),
            "nama_sub_kriteria" => $this->input->post('nama_sub_kriteria'),
            "nilai_sub_kriteria" => $this->input->post('nilai_sub_kriteria'),
        ];

        $this->db->where('id_sub_kriteria', $this->input->post('id_sub_kriteria'));
        $this->db->update('tb_sub_kriteria', $data);
    }

    public function editDataKaryawan($id_karyawan)
    {
        $data = [
            "id_karyawan" => $this->input->post('id_karyawan'),
            "nik" => $this->input->post('nik'),
            "no_ktp" => $this->input->post('no_ktp'),
            "nama_karyawan" => $this->input->post('nama_karyawan'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "alamat" => $this->input->post('alamat'),
            "departemen" => $this->input->post('departemen'),
            "posisi" => $this->input->post('posisi'),
        ];

        $this->db->where('id_karyawan', $this->input->post('id_karyawan'));
        $this->db->update('tb_karyawan', $data);
    }

    public function hitungJumlahKaryawan()
    {
        $query = $this->db->get('tb_karyawan');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else{
            return 0;
        }
    }

    public function hitungkriteria()
    {
        $query = $this->db->get('tb_kriteria');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else{
            return 0;
        }
    }

    public function hitungUser()
    {
        $query = $this->db->get('user');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else{
            return 0;
        }
    }
}
