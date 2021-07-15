<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala_bagian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
        $this->load->model('Kabag_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Penilaian_model');
        $this->load->model('Peringkat_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['departemen'] = $this->Kabag_model->getDepartemenKabag($this->session->userdata('role_id'));
        $data['title'] = 'Dashboard';
        $data['karyawan'] = $this->Karyawan_model->getDataKaryawanDiNilai($data['departemen']);
        $data['totalKaryawan'] = $this->Karyawan_model->CountAllKaryawanByDepartmen($data['departemen']);
        $this->load->view('templates/kabag_header', $data);
        $this->load->view('templates/kabag_sidebar', $data);
        $this->load->view('templates/kabag_topbar', $data);
        $this->load->view('kepala_bagian/index', $data);
        $this->load->view('templates/kabag_footer', $data);
    }

    public function getJabatan()
    {
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
        $jabatan = $this->Karyawan_model->getDataJabatan($nik);
        echo json_encode($jabatan);
    }

    public function submit_penilaian()
    {
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
        for ($i = 0; $i < count($id_sub_kriteria); $i++) {
            $data = array(
                'id_karyawan' => $id_karyawan,
                'id_sub_kriteria' => $id_sub_kriteria[$i],
                'tahun' => date("Y")
            );
            $simpan = $this->Penilaian_model->insert($data);
        }
        $update = $this->Karyawan_model->updateStatus($id_karyawan);
        if ($simpan) {
            $this->session->set_flashdata('berhasil', 'Data Tersimpan!');
            redirect('Kepala_bagian/kelola_penilaian');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal tersimpan!');
            redirect('Kepala_bagian/tambah_penilaian');
        }
    }

    public function kelola_penilaian()
    {
        $data['departemen'] = $this->Kabag_model->getDepartemenKabag($this->session->userdata('role_id'));
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Penilaian';
        $data['allkarywan'] = $this->Karyawan_model->getDataKaryawanDepatemenAll($data['departemen']);
        $data['karyawan'] = $this->Karyawan_model->getDataKaryawanDiNilai($data['departemen']);
        $data['totalKaryawan'] = $this->Karyawan_model->CountAllKaryawanByDepartmen($data['departemen']);
        $data['kriteria'] = $this->Kriteria_model->getKriteria();
        $this->load->view('templates/kabag_header', $data);
        $this->load->view('templates/kabag_sidebar', $data);
        $this->load->view('templates/kabag_topbar', $data);
        $this->load->view('kepala_bagian/kelola_penilaian', $data);
        $this->load->view('templates/kabag_footer', $data);
    }

    public function tambah_penilaian()
    {
        $data['departemen'] = $this->Kabag_model->getDepartemenKabag($this->session->userdata('role_id'));
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Penilaian';

        $data['karyawan'] = $this->Karyawan_model->getDataKaryawanBelum($data['departemen']);
        $data['kriteria'] = $this->Kriteria_model->getKriteria();

        $this->load->view('templates/kabag_header', $data);
        $this->load->view('templates/kabag_sidebar', $data);
        $this->load->view('templates/kabag_topbar', $data);
        $this->load->view('kepala_bagian/tambah_penilaian', $data);
        $this->load->view('templates/kabag_footer', $data);
    }

    public function ubah_penilaian($id_karyawan)
    {
        $data['departemen'] = $this->Kabag_model->getDepartemenKabag($this->session->userdata('role_id'));
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Ubah Penilaian';

        $data['karyawan'] = $this->Karyawan_model->getDataKaryawanByID($id_karyawan);
        $data['kriteria'] = $this->Kriteria_model->getKriteria();
        $this->load->view('templates/kabag_header', $data);
        $this->load->view('templates/kabag_sidebar', $data);
        $this->load->view('templates/kabag_topbar', $data);
        $this->load->view('kepala_bagian/ubah_penilaian', $data);
        $this->load->view('templates/kabag_footer', $data);
    }

    public function delete_penilaian($id_karyawan)
    {
        $this->Penilaian_model->deletePenilaian($id_karyawan);
        redirect('Kepala_bagian/kelola_penilaian');
    }

    public function update_penilaian()
    {
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
        for ($i = 0; $i < count($id_penilaian); $i++) {
            $update = $this->Penilaian_model->update($id_penilaian[$i], $id_sub_kriteria[$i]);
        }

        redirect('Kepala_bagian/kelola_penilaian');
    }

    public function profile()
    {
        $data['departemen'] = $this->Kabag_model->getDepartemenKabag($this->session->userdata('role_id'));
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
        $data['departemen'] = $this->Kabag_model->getDepartemenKabag($this->session->userdata('role_id'));
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

    public function hitung()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Hasil Perhitungan Penilaian';
        $data['departemen'] = $this->Kabag_model->getDepartemenKabag($this->session->userdata('role_id'));
        $data['kriteria'] = $this->Kriteria_model->getKriteria();
        // Get Data Karyawan
        $karyawan = $this->Karyawan_model->getDataKaryawanDiNilai($data['departemen']);
        $bobot    = $this->Kriteria_model->getKriteriaBobot();
        $jenis    = $this->Kriteria_model->getKriteriaJenis();

        // --- Bilangan Fuzzy ---
        $fuzzy = array();
        foreach ($karyawan as $datakaryawan => $r) {
            $subkriteria = $this->Kriteria_model->getSubKriteriaByID($r['id_karyawan']);
            $fuzzy[$datakaryawan][0] = $r['id_karyawan'];
            foreach ($subkriteria as $sub => $s) {
                $fuzzy[$datakaryawan][$sub + 1] = $s['nilai_sub_kriteria'];
            }
        }

        // // --- Mencari Pembagi ---
        $x = count(reset($fuzzy)); // Mendapatkan Dimensi X dari Matrix
        $y = count($fuzzy); // Mendapatkan Dimensi Y dari Matrix

        $pembagi = array();
        for ($i = 1; $i < $x; $i++) {
            $pangkat = 0;
            for ($j = 0; $j < $y; $j++) {
                $pangkat += pow($fuzzy[$j][$i], 2);
            }
            $pembagi[$i] = sqrt($pangkat);
        }

        // Menghitung Matrix Ternormalisasi
        $ternormalisasi = array();
        for ($i = 0; $i < $y; $i++) {
            $ternormalisasi[$i][0] = $fuzzy[$i][0];
            for ($j = 1; $j < $x; $j++) {
                $ternormalisasi[$i][$j] = $fuzzy[$i][$j] / $pembagi[$j];
            }
        }

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
                if ($jenis[$j - 1] == "Benefit") {
                    $maksimum[$i] += $optimalisasi[$i][$j];
                } else {
                    $minimum[$i] += $optimalisasi[$i][$j];
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

        // // // Mengirim Data Array Ke View
        $data['pembagi']        = $pembagi;
        $data['fuzzy']          = $fuzzy;
        $data['ternormalisasi'] = $ternormalisasi;
        $data['optimalisasi']   = $optimalisasi;
        $data['bobot']          = $bobot;
        $data['matrixYi']       = $matrixYi;

        $this->load->view('templates/kabag_header', $data);
        $this->load->view('templates/kabag_sidebar', $data);
        $this->load->view('templates/kabag_topbar', $data);
        $this->load->view('kepala_bagian/hitung_penilaian', $data);
        $this->load->view('templates/kabag_footer', $data);
    }

    public function simpan_peringkat()
    {
        $departemen = $this->Kabag_model->getDepartemenKabag($this->session->userdata('role_id'));
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
        for ($i = 0; $i < count($id_karyawan); $i++) {
            $cek = $this->Karyawan_model->CekKaryawanOnRank($id_karyawan[$i], $departemen);
            if (empty($cek)) {
                $data = array(
                    'id_karyawan' => $id_karyawan[$i],
                    'nilai_yi' => $yi[$i],
                    'tahun' => date("Y")
                );
                $simpan = $this->Peringkat_model->insert($data);
            } else {
                $update = $this->Peringkat_model->update($id_karyawan[$i], date("Y"), $yi[$i]);
            }
        }

        if ($simpan) {
            redirect('Kepala_bagian/kelola_penilaian');
        } else {
            redirect('Kepala_bagian/hitung');
        }
    }

    public function reset_peringkat()
    {
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
        for ($i = 0; $i < count($id_karyawan); $i++) {
            $delete = $this->Peringkat_model->reset($id_karyawan[$i]);
        }
        redirect('Kepala_bagian/kelola_penilaian');
    }

    public function example()
    {
        $alternatif = array();

        $karyawan = $this->Karyawan_model->getDataKaryawanDiNilai();
        echo "<br> Daftar Karywan <br>===================<br>";
        foreach ($karyawan as $r) {
            echo $r['nama_karyawan'];
            echo "<br>";
        }

        $kriteria = $this->Kriteria_model->getJenisKriteria();
        echo "<br> Daftar Kriteria <br>===================<br>";
        foreach ($kriteria as $r) {
            echo $r['jenis_kriteria'];
            echo "<br>";
        }


        echo "<br> Daftar Karyawan dan Kriteria <br>===================<br>";
        foreach ($karyawan as $r) {
            echo $r['nama_karyawan'];

            $bobot = $this->Kriteria_model->getBobot($r['NIK']);
            foreach ($bobot as $b) {
                echo ' | ' . $b['nama_kriteria'];
            }
            echo "<br>";
        }

        $matrix = array();

        echo "<br> Daftar Karyawan dan FUZZY <br>===================<br>";
        foreach ($karyawan as $datakaryawan => $r) {
            // echo $r['nama_karyawan'];
            $bobot = $this->Kriteria_model->getBobot($r['NIK']);
            foreach ($bobot as $databobot => $b) {
                echo ' | ' . $b['bobot_kriteria'];
                $matrix[$datakaryawan][$databobot] = $b['bobot_kriteria'];
            }
            echo "<br>";
        }
        echo "<br>";
        $x = count(reset($matrix));
        $y = count($matrix);
        $pembagi = array();
        for ($i = 0; $i < $x; $i++) {
            $pangkat = 0;
            for ($j = 0; $j < $y; $j++) {
                echo ' | ' . $matrix[$j][$i];
                $pangkat += pow($matrix[$j][$i], 2);
            }
            echo "<br>";
            $pembagi[$i] = sqrt($pangkat);
        }

        echo "<br> Pembagi <br>===================<br>";
        for ($i = 0; $i < count($pembagi); $i++) {
            echo $pembagi[$i];
            echo '<br>';
        }

        $matrixNormalisasi = array();
        echo "<br> Ternomalisasi <br>===================<br>";
        for ($i = 0; $i < $y; $i++) {
            for ($j = 0; $j < $x; $j++) {
                $matrixNormalisasi[$i][$j] = $matrix[$i][$j] / $pembagi[$j];
                echo $matrixNormalisasi[$i][$j] . ' | ';
            }
            echo '<br>';
        }

        $matrixOptimalisasi = array();
        $bobot = array(2, 1.5, 1.5, 1.5, 2, 1.5);

        for ($i = 0; $i < $x; $i++) {
            for ($j = 0; $j < $y; $j++) {
                $matrixOptimalisasi[$j][$i] = $matrixNormalisasi[$j][$i] / $bobot[$i];
            }
        }

        echo "<br> Optimalisasi <br>===================<br>";
        for ($i = 0; $i < $y; $i++) {
            for ($j = 0; $j < $x; $j++) {
                echo $matrixOptimalisasi[$i][$j] . ' | ';
            }
            echo '<br>';
        }


        $maksimum = array();
        $minimum = array();


        for ($i = 0; $i < $y; $i++) {
            $minimum[$i] = 0;
            $maksimum[$i] = 0;
            for ($j = 0; $j < $x; $j++) {
                if ($j == $x - 1) {
                    $minimum[$i] += $matrixOptimalisasi[$i][$j];
                } else {
                    $maksimum[$i] += $matrixOptimalisasi[$i][$j];
                }
            }
        }

        $yi = array();
        echo "<br> Maksimum and Minimum<br>===================<br>";
        for ($i = 0; $i < $y; $i++) {
            $yi[$i] =  $maksimum[$i] - $minimum[$i];
            echo $maksimum[$i] . ' | ' . $minimum[$i] . ' YI = ' . $yi[$i] . '<br> ';
        }
    }
}
