<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>hrd/kelola_kriteria">Kelola Kriteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Kriteria</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Form Ubah Kriteria</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="hidden" name="tahun" value="<?=date("Y")?>">
                        <input type="text" class="form-control" id="id_kriteria" name="id_kriteria" value="<?= $tb_kriteria['id_kriteria']; ?>" hidden>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="<?= $tb_kriteria['nama_kriteria']; ?>" rows="3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bobot_kriteria" class="col-sm-2 col-form-label">Bobot Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bobot_kriteria" name="bobot_kriteria" value="<?= $tb_kriteria['bobot_kriteria']; ?>" rows="3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kriteria" class="col-sm-2 col-form-label">Jenis Kriteria</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis_kriteria" name="jenis_kriteria" value="">
                            <option><?= $tb_kriteria['jenis_kriteria']; ?></option>
                            <option>Benefit</option>
                            <option>Cost</option>
                        </select>
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