<!-- Begin Page Content -->
<style>
    .swal-footer {
        text-align: center;
    }
</style>

<!-- <?php
        // if ($this->session->flashdata('berhasil')) : 
        ?>
    <script>
        swal("Success!", "Data Penilaian Berhasil Tersimpan!", "success");
    </script>
<?php
// endif; 
?> -->

<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Kelola Penilaian

            </li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-row justify-content-between">
                <div class="bd-highlight">
                    <h6 class="m-0 font-weight-bold text-info">Penilaian Karyawan (<?= count($karyawan); ?>/<?= $totalKaryawan; ?>)</h6>
                </div>
                <div class="bd-highlight font-weight-bold text-info">Departemen <?= $departemen; ?> </div>
            </div>
        </div>
        <div class="card-body">
            <?php if (count($karyawan) == $totalKaryawan) { ?>
                <a class="btn btn-secondary btn-sm rounded-0 mb-3 disabled" type="a" data-toggle="tooltip" data-placement="top" title="Input"><i class="fa fa-edit"></i></a>
            <?php } else { ?>
                <a class="btn btn-primary btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Input" href="<?= base_url('kepala_bagian/tambah_penilaian'); ?>"><i class="fa fa-edit"></i></a>
            <?php } ?>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Karyawan</th>
                        <?php foreach ($kriteria as $k) {
                            echo '<th scope="col">' . $k['nama_kriteria'] . '</th>';
                        } ?>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($allkarywan as $d) {
                        echo '
                                <tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $d['nama_karyawan'] . '</td>';
                        $subkriteria = $this->Kriteria_model->getSubKriteriaByID($d['id_karyawan']);
                        if (!empty($subkriteria)) {
                            foreach ($subkriteria as $s) {
                                echo '<td>' . $s['nama_sub_kriteria'] . '</td>';
                            }
                            $rank = $this->Karyawan_model->CekKaryawanOnRank($d['id_karyawan'], $departemen);
                            if (empty($rank)) {
                                echo ' 
                                            <td>
                                                <a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" href="' . base_url('kepala_bagian/ubah_penilaian/' . $d['id_karyawan']) . '">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                 <a class="btn btn-danger btn-sm tombol-hapus-penilaian" type="button" data-toggle="tooltip" data-placement="top" title="Delete" href="' . base_url('kepala_bagian/delete_penilaian/' . $d['id_karyawan']) . '">
                                                    <i class="fa fa-trash"></i> 
                                                </a>
                                            </td>';
                            } else {
                                echo '
                                            <td>
                                                <a class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Disbled" href="#">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Disbled" href="#">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>';
                            }
                        } else {
                            foreach ($kriteria as $k) {
                                echo '<td><small class="text-danger">Belum Di Nilai</small></td>';
                            }
                            echo '<td><small>-</small></td>';
                        }
                        echo '</tr>';
                        $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->