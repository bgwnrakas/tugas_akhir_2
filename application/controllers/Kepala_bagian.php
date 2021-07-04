<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala_bagian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Kabag_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/kabag_header', $data);
        $this->load->view('templates/kabag_sidebar', $data);
        $this->load->view('templates/kabag_topbar', $data);
        $this->load->view('kepala_bagian/index', $data);
        $this->load->view('templates/kabag_footer', $data);
    }

    public function kelola_penilaian()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Kelola Penilaian';
        $this->load->view('templates/kabag_header', $data);
        $this->load->view('templates/kabag_sidebar', $data);
        $this->load->view('templates/kabag_topbar', $data);
        $this->load->view('kepala_bagian/kelola_penilaian', $data);
        $this->load->view('templates/kabag_footer', $data);
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('templates/kabag_header', $data);
        $this->load->view('templates/kabag_sidebar', $data);
        $this->load->view('templates/kabag_topbar', $data);
        $this->load->view('kepala_bagian/profile', $data);
        $this->load->view('templates/kabag_footer', $data);
    }

    public function edit_profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/kabag_header', $data);
            $this->load->view('templates/kabag_sidebar', $data);
            $this->load->view('templates/kabag_topbar', $data);
            $this->load->view('kepala_bagian/edit_profile', $data);
            $this->load->view('templates/kabag_footer', $data);
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
            $this->Kabag_model->editDataProfile($id, $data);
            redirect('kepala_bagian/profile');
        }
    }
}
