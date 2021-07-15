<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Kelola Pengguna</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Akun Terdaftar</h6>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role ID</th>
                        <th scope="col">Active</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['name']; ?></td>
                            <td><?= $p['email']; ?></td>
                            <td><?= $p['role_id']; ?></td>
                            <td><?= $p['is_active']; ?></td>
                            <td> <a class="btn btn-success btn-sm " type="a" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url(); ?>hrd/edit_pengguna/<?= $p['id']; ?>"><i class="fa fa-edit"></i></a>

                                <a class="btn btn-danger btn-sm " type="button" data-toggle="tooltip" data-placement="top" title="Delete" href="<?= base_url(); ?>hrd/delete_pengguna/<?= $p['id']; ?>"><i class="fa fa-trash"></i></a>
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