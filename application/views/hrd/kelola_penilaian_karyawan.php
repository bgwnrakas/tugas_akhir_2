<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Kelola Penilaian Karyawan</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Kriteria Karyawan</h6>
        </div>
        <div class="card-body">
             <?php 
                if (count($allkarywan) == count($ceknilai)) { 
                    $cekRank = $this->Karyawan_model->CekRankingIfNullAll();
                    if (empty($cekRank)) { ?>
                        <a class="btn btn-success btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Hitung Penilaian" href="<?= base_url('hrd/hitung_penilaian'); ?>">Hitung Penilaian <i class="fas fa-tools"></i></a>
                    <?php 
                    }else{ ?>
                        <a class="btn btn-primary btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Hitung Penilaian" href="<?= base_url('hrd/hitung_penilaian'); ?>">Lihat Hasil Penilaian <i class="fas fa-eye"></i></a>
                   <?php }
                ?> 
            <?php } else { ?>
                <a class="btn btn-secondary btn-sm rounded-0 mb-3 disabled" type="a" data-toggle="tooltip" data-placement="top" title="Hitung Penilaian" href="#">Hitung Penilaian <i class="fas fa-tools"></i></a>
            <?php } ?>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Departemen</th>
                        <?php foreach ($kriteria as $k) {
                            echo '<th scope="col">' . $k['nama_kriteria'] . '</th>';
                        } ?>
                    </tr>
                </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($allkarywan as $d) {
                        echo '
                                <tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $d['nama_karyawan'] . '</td>
                                <td>' . $d['departemen'] . '</td>';
                        $subkriteria = $this->Kriteria_model->getSubKriteriaByID($d['id_karyawan']);
                        if (!empty($subkriteria)) {
                            foreach ($subkriteria as $s) {
                                echo '<td>' . $s['nama_sub_kriteria'] . '</td>';
                            }
                            $rank = $this->Karyawan_model->CekKaryawanOnRank($d['id_karyawan'], $d['departemen']);
                         
                        } else {
                            foreach ($kriteria as $k) {
                                echo '<td><small class="text-danger">Belum Di Nilai</small></td>';
                            }
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