<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Hrd_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/index', $data);
        $this->load->view('templates/hrd_footer', $data);
    }

    public function kelola_kriteria()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Kelola Kriteria';
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/kelola_kriteria', $data);
        $this->load->view('templates/hrd_footer', $data);
    }

    public function tambah_kriteria()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Kriteria';
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/tambah_kriteria', $data);
        $this->load->view('templates/hrd_footer', $data);
    }

    public function ubah_kriteria()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Ubah Kriteria';
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/ubah_kriteria', $data);
        $this->load->view('templates/hrd_footer', $data);
    }

    public function kelola_karyawan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_karyawan'] = $this->db->get('tb_karyawan')->result_array();
        $data['title'] = 'Kelola Karyawan';
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/kelola_karyawan', $data);
        $this->load->view('templates/hrd_footer', $data);
    }

    public function tambah_karyawan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Karyawan';
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('no_ktp', 'no_ktp', 'required');
        $this->form_validation->set_rules('posisi', 'posisi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/hrd_header', $data);
            $this->load->view('templates/hrd_sidebar', $data);
            $this->load->view('templates/hrd_topbar', $data);
            $this->load->view('hrd/tambah_karyawan', $data);
            $this->load->view('templates/hrd_footer', $data);
        } else {
            $nik = $this->input->post('nik');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $jabatan = $this->input->post('jabatan');
            $no_ktp = $this->input->post('no_ktp');
            $posisi = $this->input->post('posisi');
            $status = $this->input->post('status');
            $email = $this->input->post('email');
            $id_user = $this->input->post('id_user');

            $data = array(
                'nik' => $nik,
                'nama_karyawan' => $nama_karyawan,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'jabatan' => $jabatan,
                'no_ktp' => $no_ktp,
                'posisi' => $posisi,
                'status' => $status,
                'email' => $email,
                'id_user' => $id_user,
            );
            $this->db->insert('tb_karyawan', $data);
            redirect('hrd/kelola_karyawan');
        }
    }

    public function ubah_karyawan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = $this->Hrd_model->getDataKaryawanByNik();
        $data['title'] = 'Ubah Karyawan';
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'no_ktp', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('posisi', 'posisi', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/hrd_header', $data);
            $this->load->view('templates/hrd_sidebar', $data);
            $this->load->view('templates/hrd_topbar', $data);
            $this->load->view('hrd/ubah_karyawan', $data);
            $this->load->view('templates/hrd_footer');
        } else {
            $nik = $this->input->post('nik');
            $no_ktp = $this->input->post('no_ktp');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $jabatan = $this->input->post('jabatan');
            $posisi = $this->input->post('posisi');
            $email = $this->input->post('email');

            $data = array(
                'nik' => $nik,
                'no_ktp' => $no_ktp,
                'nama_karyawan' => $nama_karyawan,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'jabatan' => $jabatan,
                'posisi' => $posisi,
                'email' => $email

            );

            $this->Hrd_model->editDataKaryawan($data);
            redirect('hrd/kelola_karyawan');
        }
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/profile', $data);
        $this->load->view('templates/hrd_footer', $data);
    }

    public function edit_profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/hrd_header', $data);
            $this->load->view('templates/hrd_sidebar', $data);
            $this->load->view('templates/hrd_topbar', $data);
            $this->load->view('hrd/edit_profile', $data);
            $this->load->view('templates/hrd_footer', $data);
        } else {
            foreach ($_POST as $key => $value) {
                $$key = $value;
            }
            $config = array(
                'upload_path' => "./assets/img/profile/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'file_name' => 'fotoUpdate' . $name . '-' . date('Y-m-d'),
                'overwrite' => TRUE,
                'max_size' => "15048000",
                'max_height' => "3000",
                'max_width' => "3000"
            );
            if (!empty($_FILES["image"]["name"])) {
                $this->load->library('upload', $config, 'uploadIMG');
                $this->uploadIMG->initialize($config);
                $this->uploadIMG->do_upload('image');
                $image = $this->uploadIMG->data("file_name");
            } else {
                $image = $old_img;
            }

            $data = array(
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'image' => $image,

            );
            $this->Hrd_model->editDataProfile($id, $data);
            redirect('hrd/profile');
        }
    }

    public function kelola_pengguna()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data2['user'] = $this->db->get('user')->result_array();
        $data['title'] = 'Kelola Pengguna';
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/kelola_pengguna', $data2);
        $this->load->view('templates/hrd_footer', $data);
    }

    public function edit_pengguna($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data2['user'] = $this->Hrd_model->getDataUserById($id);
        $data['title'] = 'Edit Pengguna';
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');
        $this->form_validation->set_rules('is_active', 'is_active', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/hrd_header', $data);
            $this->load->view('templates/hrd_sidebar', $data);
            $this->load->view('templates/hrd_topbar', $data);
            $this->load->view('hrd/edit_pengguna', $data2);
            $this->load->view('templates/hrd_footer');
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $role_id = $this->input->post('role_id');
            $is_active = $this->input->post('is_active');

            $data = array(
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'role_id' => $role_id,
                'is_active' => $is_active

            );

            $this->Hrd_model->editDataPengguna($data);
            redirect('hrd/kelola_pengguna');
        }
    }

    public function delete_pengguna($id)
    {
        $this->Hrd_model->deleteDataPengguna($id);
        redirect('hrd/kelola_pengguna');
    }
}
