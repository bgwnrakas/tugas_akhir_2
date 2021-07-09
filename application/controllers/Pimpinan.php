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
        $data['tb_bonus'] = $this->db->get('tb_bonus')->result_array();
        $data['title'] = 'Kelola Bonus';

        // Get Data Karyawan
        $karyawan = $this->Karyawan_model->getDataKaryawanDiNilai();

        // --- Bilangan Fuzzy ---
        $fuzzy = array();
        foreach ($karyawan as $datakaryawan => $r) {
            $fuzzy[$datakaryawan][0] = $r['nama_karyawan'];
            $bobot = $this->Kriteria_model->getBobot($r['nik']);
            foreach ($bobot as $databobot => $b) {
                $fuzzy[$datakaryawan][$databobot + 1] = $b['bobot_kriteria'];
            }
        }

        // --- Mencari Pembagi ---
        $x = count(reset($fuzzy)); // Mendapatkan Dimensi X dari Matrix
        $y = count($fuzzy); // Mendapatkan Dimensi Y dari Matrix

        $pembagi = array();
        for ($i = 1; $i < $x; $i++) {
            $pangkat = 0;
            for ($j = 0; $j < $y; $j++) {
                $pangkat += pow($fuzzy[$j][$i], 2);
            }
            $pembagi[$i] = sqrt($pangkat);
            // echo $pembagi[$i] .' | ';
        }

        // Menghitung Matrix Ternormalisasi
        $ternormalisasi = array();
        for ($i = 0; $i < $y; $i++) {
            $ternormalisasi[$i][0] = $fuzzy[$i][0];
            for ($j = 1; $j < $x; $j++) {
                $ternormalisasi[$i][$j] = $fuzzy[$i][$j] / $pembagi[$j];
            }
        }

        // Inisialisasi Bobot
        $bobot = array(2, 1.5, 1.5, 1.5, 2, 1.5);

        // Menghitung Matrix Optimalisasi
        $optimalisasi = array();

        for ($i = 1; $i < $x; $i++) {
            for ($j = 0; $j < $y; $j++) {
                $optimalisasi[$j][0] = $ternormalisasi[$j][0];
                $optimalisasi[$j][$i] = $ternormalisasi[$j][$i] / $bobot[$i - 1];
                // echo  $optimalisasi[$j][$i] .' | ';
            }
            // echo"<br>";
        }

        // Menghitung Nilai Maximum,Minimum dan Yi
        $maksimum = array();
        $minimum = array();
        $Yi = array();
        for ($i = 0; $i < $y; $i++) {
            $minimum[$i] = 0;
            $maksimum[$i] = 0;
            for ($j = 1; $j < $x; $j++) {
                if ($j == $x - 1) {
                    $minimum[$i] += $optimalisasi[$i][$j];
                } else {
                    $maksimum[$i] += $optimalisasi[$i][$j];
                }
            }
            $Yi[$i] = $maksimum[$i] - $minimum[$i];
        }

        //  Membuat Matrix Akhir Untuk Menampung Semua hasil
        $matrixYi = array();
        for ($i = 0; $i < $y; $i++) {
            $matrixYi[$i][0] = $fuzzy[$i][0];
            $matrixYi[$i][1] = $maksimum[$i];
            $matrixYi[$i][2] = $minimum[$i];
            $matrixYi[$i][3] = $Yi[$i];
        }


        // // Mengirim Data Array Ke View
        $data['pembagi']        = $pembagi;
        $data['fuzzy']          = $fuzzy;
        $data['ternormalisasi'] = $ternormalisasi;
        $data['optimalisasi']   = $optimalisasi;
        $data['bobot']          = $bobot;
        $data['matrixYi']       = $matrixYi;

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
        $this->form_validation->set_rules('batas_nilai_yi', 'batas_nilai_yi', 'required');
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
            $batas_nilai_yi = $this->input->post('batas_nilai_yi');
            $email = $this->input->post('email');
            $id_user = $this->input->post('id_user');

            $data = array(
                'jumlah_bonus' => $jumlah_bonus,
                'batas_nilai_yi' => $batas_nilai_yi,
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
        $this->form_validation->set_rules('batas_nilai_yi', 'batas_nilai_yi', 'required');
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
            $batas_nilai_yi = $this->input->post('batas_nilai_yi');
            $email = $this->input->post('email');


            $data = array(
                'id' => $id,
                'jumlah_bonus' => $jumlah_bonus,
                'batas_nilai_yi' => $batas_nilai_yi,
                'email' => $email

            );

            $this->Pimpinan_model->editDataBonus($data);
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
}
