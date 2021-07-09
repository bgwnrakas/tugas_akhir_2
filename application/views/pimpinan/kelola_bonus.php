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
            <a class="btn btn-warning btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Laporan" href=""><i class="fas fa-print"></i></a>

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
                            <td><?= $p['jumlah_bonus']; ?></td>
                            <td><?= $p['batas_nilai_yi']; ?></td>
                            <td> <a class="btn btn-success btn-sm " type="a" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url('pimpinan/ubah_bonus'); ?>"><i class="fa fa-edit"></i></a>

                                <a class="btn btn-danger btn-sm " type="button" data-toggle="tooltip" data-placement="top" title="Delete" href="<?= base_url('pimpinan/delete_bonus'); ?>"><i class="fa fa-trash"></i></a>
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
            <h6 class="m-0 font-weight-bold text-info">Peringkat</h6>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Yi</th>
                        <th scope="col">Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //  Fungsi untuk melakukan sort
                    array_multisort(array_column($matrixYi, 3), SORT_DESC, $matrixYi);
                    $x = count(reset($matrixYi));
                    $y = count($matrixYi);
                    for ($i = 0; $i < $y; $i++) {
                        echo "<tr>";
                        echo '<td>' . $matrixYi[$i][0] . '</td>';
                        echo '<td>' . round($matrixYi[$i][3], 5) . '</td>';
                        echo '<td>' . $i + 1 . '</td>';
                        echo "</tr>";
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