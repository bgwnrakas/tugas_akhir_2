<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>hrd/kelola_sub_kriteria">Kelola Sub Kriteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Sub Kriteria</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"> Form Tambah Sub Kriteria</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('hrd/tambah_sub_kriteria'); ?>" method="post">
                <div class="form-group row">
                    <label for="id_kriteria" class="col-sm-2 col-form-label">ID Kriteria</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_kriteria" name="id_kriteria" value="">
                            <?php foreach ($tb_kriteria as $p) : ?>
                                <option><?= $p['id_kriteria']; ?> - <?= $p['nama_kriteria']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_sub_kriteria" class="col-sm-2 col-form-label">Nama Sub Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_sub_kriteria" name="nama_sub_kriteria">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nilai_sub_kriteria" class="col-sm-2 col-form-label">Nilai Fuzzy</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nilai_sub_kriteria" name="nilai_sub_kriteria">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </div>
            </form>
        </div>
    </div>







</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->