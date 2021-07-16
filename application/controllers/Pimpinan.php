<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pimpinan_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Peringkat_model');
        $this->load->model('Bonus_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $data['total_bonus'] = $this->Pimpinan_model->hitungTotalBonus();
        $this->load->view('templates/pimpinan_header', $data);
        $this->load->view('templates/pimpinan_sidebar', $data);
        $this->load->view('templates/pimpinan_topbar', $data);
        $this->load->view('pimpinan/index', $data);
        $this->load->view('templates/pimpinan_footer', $data);
    }

    public function kelola_bonus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_bonus'] = $this->db->get('tb_bonus')->result_array();
        $data['tb_ranking'] = $this->db->get('tb_ranking')->result_array();
        $data['title'] = 'Kelola Bonus';
        $data['peringkat'] = $this->Peringkat_model->getPeringkat();
        $this->load->view('templates/pimpinan_header', $data);
        $this->load->view('templates/pimpinan_sidebar', $data);
        $this->load->view('templates/pimpinan_topbar', $data);
        $this->load->view('pimpinan/kelola_bonus', $data);
        $this->load->view('templates/pimpinan_footer', $data);
    }

    public function tambah_bonus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Bonus';
        $this->form_validation->set_rules('jumlah_bonus', 'jumlah_bonus', 'required');
        $this->form_validation->set_rules('min_nilai_yi', 'min_nilai_yi', 'required');
        $this->form_validation->set_rules('max_nilai_yi', 'max_nilai_yi', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/pimpinan_header', $data);
            $this->load->view('templates/pimpinan_sidebar', $data);
            $this->load->view('templates/pimpinan_topbar', $data);
            $this->load->view('pimpinan/tambah_bonus', $data);
            $this->load->view('templates/pimpinan_footer', $data);
        } else {
            $jumlah_bonus = $this->input->post('jumlah_bonus');
            $min_nilai_yi = $this->input->post('min_nilai_yi');
            $max_nilai_yi = $this->input->post('max_nilai_yi');
            $email = $this->input->post('email');
            $id_user = $this->input->post('id_user');

            $data = array(
                'jumlah_bonus' => str_replace(".", "", $jumlah_bonus),
                'min_nilai_yi' => $min_nilai_yi,
                'max_nilai_yi' => $max_nilai_yi,
                'email' => $email,
                'id_user' => $id_user,
            );
            $this->db->insert('tb_bonus', $data);
            redirect('pimpinan/kelola_bonus');
        }
    }

    public function ubah_bonus($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_bonus'] = $this->Pimpinan_model->getDataBonusById($id);
        $data['title'] = 'Ubah Bonus';
        $this->form_validation->set_rules('jumlah_bonus', 'jumlah_bonus', 'required');
        $this->form_validation->set_rules('min_nilai_yi', 'min_nilai_yi', 'required');
        $this->form_validation->set_rules('max_nilai_yi', 'max_nilai_yi', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/pimpinan_header', $data);
            $this->load->view('templates/pimpinan_sidebar', $data);
            $this->load->view('templates/pimpinan_topbar', $data);
            $this->load->view('pimpinan/ubah_bonus', $data);
            $this->load->view('templates/pimpinan_footer');
        } else {
            $id = $this->input->post('id');
            $jumlah_bonus = $this->input->post('jumlah_bonus');
            $min_nilai_yi = $this->input->post('min_nilai_yi');
            $max_nilai_yi = $this->input->post('max_nilai_yi');
            $email = $this->input->post('email');

            $data = array(
                'jumlah_bonus' => str_replace(".", "", $jumlah_bonus),
                'min_nilai_yi' => $min_nilai_yi,
                'max_nilai_yi' => $max_nilai_yi,
                'email' => $email
            );

            $this->Pimpinan_model->editDataBonus($id, $data);
            redirect('pimpinan/kelola_bonus');
        }
    }

    public function delete_bonus($id)
    {
        $this->Pimpinan_model->deleteDataBonus($id);
        redirect('pimpinan/kelola_bonus');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('templates/pimpinan_header', $data);
        $this->load->view('templates/pimpinan_sidebar', $data);
        $this->load->view('templates/pimpinan_topbar', $data);
        $this->load->view('pimpinan/profile', $data);
        $this->load->view('templates/pimpinan_footer', $data);
    }

    public function edit_profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/pimpinan_header', $data);
            $this->load->view('templates/pimpinan_sidebar', $data);
            $this->load->view('templates/pimpinan_topbar', $data);
            $this->load->view('pimpinan/edit_profile', $data);
            $this->load->view('templates/pimpinan_footer', $data);
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
            $this->Pimpinan_model->editDataProfile($id, $data);
            redirect('pimpinan/profile');
        }
    }

    public function print()
    {
        $data['record_print'] = $this->Peringkat_model->getPeringkat();
        $this->load->view('pimpinan/print_laporan', $data);
    }
}
