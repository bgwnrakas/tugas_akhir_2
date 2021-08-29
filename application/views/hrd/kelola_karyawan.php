<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Kelola Karyawan</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Karyawan</h6>
        </div>
        <div class="card-body">

            <a class="btn btn-primary btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Input" href="<?= base_url('hrd/tambah_karyawan'); ?>"><i class="fa fa-edit"></i></a>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">No KTP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Departemen</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tb_karyawan as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['nik']; ?></td>
                                <td><?= $p['no_ktp']; ?></td>
                                <td><?= $p['nama_karyawan']; ?></td>
                                <td><?= $p['jenis_kelamin']; ?></td>
                                <td><?= $p['tempat_lahir']; ?></td>
                                <td><?= tanggal($p['tgl_lahir']); ?></td>
                                <td><?= $p['alamat']; ?></td>
                                <td><?= $p['departemen']; ?></td>
                                <td><?= $p['posisi']; ?></td>
                                <td>
                                    <?php
                                    if (empty($p['status'])) {
                                        echo '
                                     <a class="btn btn-success btn-sm " type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="' . base_url() . 'hrd/ubah_karyawan/' . $p['id_karyawan'] . '"><i class="fa fa-edit"></i></a>
                                     <a class="btn btn-danger btn-sm tombol-hapus-karyawan" type="button" data-toggle="tooltip" data-placement="top" title="Delete" href="' . base_url() . 'hrd/delete_karyawan/' . $p['id_karyawan'] . '"><i class="fa fa-trash"></i></a>';
                                    } else {
                                        echo '<small> Disabled</small>';
                                    } ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

















</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->