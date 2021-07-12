<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>hrd/kelola_karyawan">Kelola Karyawan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Karyawan</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Form Ubah Karyawan</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $tb_karyawan['id_karyawan']; ?>" hidden>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $tb_karyawan['nik']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_ktp" class="col-sm-2 col-form-label">No KTP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?= $tb_karyawan['no_ktp']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?= $tb_karyawan['nama_karyawan']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="">
                            <option><?= $tb_karyawan['jenis_kelamin']; ?></option>
                            <option>L</option>
                            <option>P</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $tb_karyawan['tempat_lahir']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $tb_karyawan['tgl_lahir']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $tb_karyawan['alamat']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="departemen" name="departemen">
                            <option><?= $tb_karyawan['departemen']; ?></option>
                            <option>Spinning</option>
                            <option>Weaving</option>
                            <option>Dyeing</option>
                            <option>Celup</option>
                            <option>Finishing</option>
                            <option>Utility</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="posisi" name="posisi" value="<?= $tb_karyawan['posisi']; ?>" readonly>
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