<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">My Profile</h6>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-success" href="<?= base_url('pimpinan/edit_profile'); ?>">Edit Profile</a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="card mb-3" style="max-width: 1000px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <form action="" method="" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" rows="3" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" rows="3" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_created" class="col-sm-2 col-form-label">Bergabung</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="date_created" name="date_created" value="Member since <?= date('d F Y', $user['date_created']); ?>" rows="3" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->