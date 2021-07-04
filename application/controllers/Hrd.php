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

    public function kelola_karyawan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Kelola Karyawan';
        $this->load->view('templates/hrd_header', $data);
        $this->load->view('templates/hrd_sidebar', $data);
        $this->load->view('templates/hrd_topbar', $data);
        $this->load->view('hrd/kelola_karyawan', $data);
        $this->load->view('templates/hrd_footer', $data);
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
        $this->Admin_model->deleteDataPengguna($id);
        redirect('hrd/kelola_pengguna');
    }
}
