<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pimpinan_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/pimpinan_header', $data);
        $this->load->view('templates/pimpinan_sidebar', $data);
        $this->load->view('templates/pimpinan_topbar', $data);
        $this->load->view('pimpinan/index', $data);
        $this->load->view('templates/pimpinan_footer', $data);
    }

    public function kelola_bonus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Kelola Bonus';
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
        $this->load->view('templates/pimpinan_header', $data);
        $this->load->view('templates/pimpinan_sidebar', $data);
        $this->load->view('templates/pimpinan_topbar', $data);
        $this->load->view('pimpinan/tambah_bonus', $data);
        $this->load->view('templates/pimpinan_footer', $data);
    }

    public function ubah_bonus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Ubah Bonus';
        $this->load->view('templates/pimpinan_header', $data);
        $this->load->view('templates/pimpinan_sidebar', $data);
        $this->load->view('templates/pimpinan_topbar', $data);
        $this->load->view('pimpinan/ubah_bonus', $data);
        $this->load->view('templates/pimpinan_footer', $data);
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
}
