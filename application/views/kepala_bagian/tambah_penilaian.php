<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>kepala_bagian/kelola_penilaian">Kelola Penilaian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Tambah Penilaian</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"> Form Tambah Penilaian</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('kepala_bagian/kelola_penilaian'); ?>" method="post">
                <div class="form-group row">
                    <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="posisi" name="posisi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggung_jawab" class="col-sm-2 col-form-label">Tanggung Jawab</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tanggunga_jawab" name="tanggung_jawab">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kepribadian" class="col-sm-2 col-form-label">Kepribadian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kepribadian" name="kepribadian">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kerja_sama" class="col-sm-2 col-form-label">Kerja Sama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kerja_sama" name="kerja_sama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="absensi" class="col-sm-2 col-form-label">Absensi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="absensi" name="absensi">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" hidden>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="id_user" class="form-control" id="id_user" name="id_user" value="<?= $user['id']; ?>" hidden>
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