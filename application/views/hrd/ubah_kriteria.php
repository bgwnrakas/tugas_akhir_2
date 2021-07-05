<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>hrd/kelola_kriteria">Kelola Kriteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Ubah Kriteria</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"> Form Ubah Kriteria</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('hrd/kelola_kriteria'); ?>" method="post">
                <div class="form-group row">
                    <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bobot" class="col-sm-2 col-form-label">Bobot</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bobot" name="bobot">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kriteria" class="col-sm-2 col-form-label">Jenis Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jenis_kriteria" name="jenis_kriteria">
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