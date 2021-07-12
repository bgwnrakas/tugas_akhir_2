<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>hrd/kelola_sub_kriteria">Kelola Sub Kriteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Sub Kriteria</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Form Ubah Sub Kriteria</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="id_sub_kriteria" name="id_sub_kriteria" value="<?= $tb_sub_kriteria['id_sub_kriteria']; ?>" hidden>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_kriteria" class="col-sm-2 col-form-label">ID Kriteria</label>


                    <div class="col-sm-10">
                        <select class="form-control" id="id_kriteria" name="id_kriteria">
                            <?php
                            foreach ($tb_kriteria as $p) {
                                if ($p['id_kriteria'] == $tb_sub_kriteria['id_kriteria']) {
                                    echo '<option value="' . $p['id_kriteria'] . '" selected>' . $p['id_kriteria'] . '-' . $p['nama_kriteria'] . '</option>';
                                } else {
                                    echo '<option value="' . $p['id_kriteria'] . '">' . $p['id_kriteria'] . '-' . $p['nama_kriteria'] . '</option>';
                                }
                            } ?>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="nama_sub_kriteria" class="col-sm-2 col-form-label">Nama Sub Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_sub_kriteria" name="nama_sub_kriteria" value="<?= $tb_sub_kriteria['nama_sub_kriteria']; ?>" rows="3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nilai_sub_kriteria" class="col-sm-2 col-form-label">Nilai Sub Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nilai_sub_kriteria" name="nilai_sub_kriteria" value="<?= $tb_sub_kriteria['nilai_sub_kriteria']; ?>" rows="3">
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Done</button>
                </div>
            </form>
        </div>
    </div>










</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->