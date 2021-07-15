<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>hrd/kelola_pengguna">Kelola Pengguna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Pengguna</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Edit Pengguna</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="id" name="id" value="<?= $user['id']; ?>" hidden>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role_id" class="col-sm-2 col-form-label">Role ID</label>


                    <div class="col-sm-10">
                        <select class="form-control" id="role_id" name="role_id">
                            <?php
                            foreach ($user_role as $p) {
                                if ($p['id'] == $user['role_id']) {
                                    echo '<option value="' . $p['id'] . '" selected>' . $p['id'] . ' - ' . $p['role'] . '</option>';
                                } else {
                                    echo '<option value="' . $p['id'] . '">' . $p['id'] . ' - ' . $p['role'] . '</option>';
                                }
                            } ?>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="role_id" class="col-sm-2 col-form-label">Active</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="is_active" name="is_active" value="">
                            <option><?= $user['is_active']; ?></option>
                            <option>0</option>
                            <option>1</option>
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