<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Kelola Kriteria</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Kriteria Karyawan</h6>
        </div>
        <div class="card-body">
            <?php
            if (empty($cek)) {
                echo '<a class="btn btn-primary btn-sm rounded-0 mb-3" data-toggle="tooltip" data-placement="top" title="Input" href="' . base_url('hrd/tambah_kriteria') . '">
                            <i class="fa fa-edit"></i>
                        </a>';
            }
            ?>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Kriteria</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Jenis Kriteria</th>
                        <th scope="col">Tahun Berlaku</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tb_kriteria as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['id_kriteria']; ?></td>
                            <td><?= $p['nama_kriteria']; ?></td>
                            <td><?= $p['bobot_kriteria']; ?></td>
                            <td><?= $p['jenis_kriteria']; ?></td>
                            <td><?= $p['tahun']; ?></td>
                            <td>
                                <?php
                                if (empty($cek)) {
                                    if ($p['tahun'] == date("Y")) {
                                        echo '<a class="btn btn-success btn-sm " type="a" data-toggle="tooltip" data-placement="top" title="Edit" href="' . base_url() . 'hrd/ubah_kriteria/' . $p['id_kriteria'] . '"><i class="fa fa-edit"></i></a>';
                                    } else {
                                        echo '<a class="btn btn-success btn-sm " type="a" data-toggle="tooltip" data-placement="top" title="Edit" href="' . base_url() . 'hrd/ubah_kriteria/' . $p['id_kriteria'] . '">Perbaharui</a>';
                                    }
                                    echo '<a class="btn btn-danger btn-sm tombol-hapus-kriteria" type="button" data-toggle="tooltip" data-placement="top" title="Delete" href="' . base_url() . 'hrd/delete_kriteria/' . $p['id_kriteria'] . '"><i class="fa fa-trash"></i></a>';
                                } else {
                                    echo '<small> Telah Terpakai</small>';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>











</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->