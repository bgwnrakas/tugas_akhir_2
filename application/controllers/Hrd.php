<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Hrd_model');
        $this->load->model('Kriteria_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $data['total_karyawan'] = $this->Hrd_model->hitungJumlahKaryawan();
        $data['total_kriteria'] = $this->Hrd_model->hitungkriteria();
        $data['total_user'] = $this->Hrd_model->hitungUser();
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/index', $data);
        $this->load->view('templates/hrd_footer', $data);
    }

    public function kelola_kriteria()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_kriteria'] = $this->db->get('tb_kriteria')->result_array();
        $data['cek'] = $this->Kriteria_model->cekIfUsed();
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
        $this->form_validation->set_rules('nama_kriteria', 'nama_kriteria', 'required');
        $this->form_validation->set_rules('bobot_kriteria', 'bobot_kriteria', 'required');
        $this->form_validation->set_rules('jenis_kriteria', 'jenis_kriteria', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/hrd_header', $data);
            $this->load->view('templates/hrd_sidebar', $data);
            $this->load->view('templates/hrd_topbar', $data);
            $this->load->view('hrd/tambah_kriteria', $data);
            $this->load->view('templates/hrd_footer', $data);
        } else {
            $nama_kriteria = $this->input->post('nama_kriteria');
            $bobot_kriteria = $this->input->post('bobot_kriteria');
            $jenis_kriteria = $this->input->post('jenis_kriteria');

            $data = array(
                'nama_kriteria' => $nama_kriteria,
                'bobot_kriteria' => $bobot_kriteria,
                'jenis_kriteria' => $jenis_kriteria,
                'tahun' => date("Y"),
            );
            $this->db->insert('tb_kriteria', $data);
            redirect('hrd/kelola_kriteria');
        }
    }

    public function ubah_kriteria($id_kriteria)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_kriteria'] = $this->Hrd_model->getDataKriteriaById($id_kriteria);
        $data['title'] = 'Ubah kriteria';
        $this->form_validation->set_rules('nama_kriteria', 'nama_kriteria', 'required');
        $this->form_validation->set_rules('bobot_kriteria', 'bobot_kriteria', 'required');
        $this->form_validation->set_rules('jenis_kriteria', 'jenis_kriteria', 'required');
        $this->form_validation->set_rules('tahun', 'tahun', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/hrd_header', $data);
            $this->load->view('templates/hrd_sidebar', $data);
            $this->load->view('templates/hrd_topbar', $data);
            $this->load->view('hrd/ubah_kriteria', $data);
            $this->load->view('templates/hrd_footer');
        } else {
            $id_kriteria = $this->input->post('id_kriteria');
            $nama_kriteria = $this->input->post('nama_kriteria');
            $bobot_kriteria = $this->input->post('bobot_kriteria');
            $jenis_kriteria = $this->input->post('jenis_kriteria');
            $tahun = $this->input->post('tahun');
            $data = array(
                'nama_kriteria' => $nama_kriteria,
                'bobot_kriteria' => $bobot_kriteria,
                'jenis_kriteria' => $jenis_kriteria,
                'tahun' => $tahun,
            );
            $this->Hrd_model->editDataKriteria($id_kriteria,$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    role="alert">Data Pendaftaran Berhasil di Ubag !');
            redirect('hrd/kelola_kriteria');
        }
    }

    public function delete_kriteria($id_kriteria)
    {
        $this->Hrd_model->deleteDataKriteria($id_kriteria);
        redirect('hrd/kelola_kriteria');
    }

    public function kelola_sub_kriteria()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_sub_kriteria'] = $this->Kriteria_model->getDataSubKriteria();
        $data['cek'] = $this->Kriteria_model->cekIfUsed();
        $data['tb_kriteria'] = $this->db->get('tb_kriteria')->result_array();
        $data['title'] = 'Kelola Sub Kriteria';
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/kelola_sub_kriteria', $data);
        $this->load->view('templates/hrd_footer', $data);
    }

    public function tambah_sub_kriteria()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_kriteria'] = $this->db->get('tb_kriteria')->result_array();
        $data['title'] = 'Tambah Sub Kriteria';
        $this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'required');
        $this->form_validation->set_rules('nama_sub_kriteria', 'nama_sub_kriteria', 'required');
        $this->form_validation->set_rules('nilai_sub_kriteria', 'nilai_sub_kriteria', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/hrd_header', $data);
            $this->load->view('templates/hrd_sidebar', $data);
            $this->load->view('templates/hrd_topbar', $data);
            $this->load->view('hrd/tambah_sub_kriteria', $data);
            $this->load->view('templates/hrd_footer', $data);
        } else {
            $id_kriteria = $this->input->post('id_kriteria');
            $nama_sub_kriteria = $this->input->post('nama_sub_kriteria');
            $nilai_sub_kriteria = $this->input->post('nilai_sub_kriteria');

            $data = array(
                'id_kriteria' => $id_kriteria,
                'nama_sub_kriteria' => $nama_sub_kriteria,
                'nilai_sub_kriteria' => $nilai_sub_kriteria,
            );
            $this->db->insert('tb_sub_kriteria', $data);
            redirect('hrd/kelola_sub_kriteria');
        }
    }

    public function ubah_sub_kriteria($id_sub_kriteria)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_sub_kriteria'] = $this->Hrd_model->getDataSubKriteriaById($id_sub_kriteria);
        $data['tb_kriteria'] = $this->db->get('tb_kriteria')->result_array();
        $data['title'] = 'Ubah Sub kriteria';
        $this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'required');
        $this->form_validation->set_rules('nama_sub_kriteria', 'nama_sub_kriteria', 'required');
        $this->form_validation->set_rules('nilai_sub_kriteria', 'nilai_sub_kriteria', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/hrd_header', $data);
            $this->load->view('templates/hrd_sidebar', $data);
            $this->load->view('templates/hrd_topbar', $data);
            $this->load->view('hrd/ubah_sub_kriteria', $data);
            $this->load->view('templates/hrd_footer');
        } else {
            $id_sub_kriteria = $this->input->post('id_sub_kriteria');
            $id_kriteria = $this->input->post('id_kriteria');
            $nama_sub_kriteria = $this->input->post('nama_sub_kriteria');
            $nilai_sub_kriteria = $this->input->post('nilai_sub_kriteria');


            $data = array(
                'id_sub_kriteria' => $id_sub_kriteria,
                'id_kriteria' => $id_kriteria,
                'nama_sub_kriteria' => $nama_sub_kriteria,
                'nilai_sub_kriteria' => $nilai_sub_kriteria

            );

            $this->Hrd_model->editDataSubKriteria($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    role="alert">Data Pendaftaran Berhasil di Ubag !');
            redirect('hrd/kelola_sub_kriteria');
        }
    }

    public function delete_sub_kriteria($id_sub_kriteria)
    {
        $this->Hrd_model->deleteDataSubKriteria($id_sub_kriteria);
        redirect('hrd/kelola_sub_kriteria');
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
        $this->form_validation->set_rules('departemen', 'departemen', 'required');
        $this->form_validation->set_rules('no_ktp', 'no_ktp', 'required');
        $this->form_validation->set_rules('posisi', 'posisi', 'required');

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
            $departemen = $this->input->post('departemen');
            $no_ktp = $this->input->post('no_ktp');
            $posisi = $this->input->post('posisi');

            $data = array(
                'nik' => $nik,
                'nama_karyawan' => $nama_karyawan,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'departemen' => $departemen,
                'no_ktp' => $no_ktp,
                'posisi' => $posisi,
            );
            $this->db->insert('tb_karyawan', $data);
            redirect('hrd/kelola_karyawan');
        }
    }

    public function ubah_karyawan($id_karyawan)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_karyawan'] = $this->Hrd_model->getDataKaryawanById($id_karyawan);
        $data['title'] = 'Ubah Karyawan';
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'no_ktp', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('departemen', 'departemen', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/hrd_header', $data);
            $this->load->view('templates/hrd_sidebar', $data);
            $this->load->view('templates/hrd_topbar', $data);
            $this->load->view('hrd/ubah_karyawan', $data);
            $this->load->view('templates/hrd_footer');
        } else {
            $id_karyawan = $this->input->post('id_karyawan');
            $nik = $this->input->post('nik');
            $no_ktp = $this->input->post('no_ktp');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $departemen = $this->input->post('departemen');
            $posisi = $this->input->post('posisi');


            $data = array(
                'id_karyawan' => $id_karyawan,
                'nik' => $nik,
                'no_ktp' => $no_ktp,
                'nama_karyawan' => $nama_karyawan,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'departemen' => $departemen,
                'posisi' => $posisi

            );

            $this->Hrd_model->editDataKaryawan($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    role="alert">Data Pendaftaran Berhasil di Ubag !');
            redirect('hrd/kelola_karyawan');
        }
    }

    public function delete_karyawan($id_karyawan)
    {
        $this->Hrd_model->deleteDataKaryawan($id_karyawan);
        redirect('hrd/kelola_karyawan');
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
        $data2['user_role'] = $this->db->get('user_role')->result_array();
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
