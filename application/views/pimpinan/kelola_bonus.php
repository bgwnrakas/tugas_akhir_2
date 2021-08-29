<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Kelola Bonus</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Bonus Karyawan</h6>
        </div>
        <div class="card-body">

            <a class="btn btn-primary btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Input" href="<?= base_url('pimpinan/tambah_bonus'); ?>"><i class="fa fa-edit"></i></a>
            <a class="btn btn-warning btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Laporan" href="<?= base_url('pimpinan/print'); ?>"><i class="fas fa-print"></i></a>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Bonus</th>
                        <th scope="col">Batas Nilai YI</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tb_bonus as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= rupiah($p['jumlah_bonus']); ?></td>
                            <td><?= $p['min_nilai_yi']; ?> - <?= $p['max_nilai_yi']; ?></td>
                            <td> <a class="btn btn-success btn-sm " type="a" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url('pimpinan/ubah_bonus/' . $p['id']); ?>"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm tombol-hapus-bonus" type="button" data-toggle="tooltip" data-placement="top" title="Delete" href="<?= base_url('pimpinan/delete_bonus/' . $p['id']); ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Peringkat Penilaian Karyawan Tahun <?= date('Y'); ?></h6>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Yi</th>
                        <th scope="col">Peringkat</th>
                        <th scope="col">Bonus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($peringkat as $p) {
                        $bonus = $this->Bonus_model->getBonus($p['nilai_yi']);
                        if (!empty($bonus)) {
                            $jumlah = rupiah($bonus['jumlah_bonus']);
                        } else {
                            $jumlah = 'Bonus Tidak Tersedia';
                        }
                        echo '
                        <tr>
                            <td>' . $p['nik'] . '</td>
                            <td>' . $p['nama_karyawan'] . '</td>
                            <td>' . $p['departemen'] . '</td>
                            <td>' . $p['nilai_yi'] . '</td>
                            <td>' . $i . '</td>
                            <td>' . $jumlah . '</td>
                        </tr>';
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>






<!-- /.container-fluid -->


<!-- End of Main Content -->