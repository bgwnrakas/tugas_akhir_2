<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Kelola Sub Kriteria</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Sub Kriteria</h6>
        </div>
        <div class="card-body">
            <?php 
                if (!empty($tb_kriteria) && empty($cek)) {
                    echo'<a class="btn btn-primary btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Input" href="'.base_url('hrd/tambah_sub_kriteria').'">
                        <i class="fa fa-edit"></i></a>';    
                }
            ?>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Kriteria</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Sub Kriteria</th>
                        <th scope="col">Nilai Fuzzy</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tb_sub_kriteria as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['id_kriteria']; ?></td>
                            <td><?= $p['nama_kriteria']; ?></td>
                            <td><?= $p['nama_sub_kriteria']; ?></td>
                            <td><?= $p['nilai_sub_kriteria']; ?></td>
                            <td> 
                            <?php
                                if (!empty($tb_kriteria) && empty($cek)) {
                                    echo'
                                        <a class="btn btn-success btn-sm " type="a" data-toggle="tooltip" data-placement="top" title="Edit" href="'.base_url().'hrd/ubah_sub_kriteria/'.$p['id_sub_kriteria'].'"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger btn-sm " type="button" data-toggle="tooltip" data-placement="top" title="Delete" href="'.base_url().'hrd/delete_sub_kriteria/'.$p['id_sub_kriteria'].'"><i class="fa fa-trash"></i></a>'; 
                                }else{
                                    echo'<small> Telah Terpakai</small>';
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