<!-- Begin Page Content -->
<style>
  .swal-footer { text-align: center; }
</style>

<?php if($this->session->flashdata('berhasil')): ?>
<script>
    swal("Success!", "Data Penilaian Berhasil Tersimpan!", "success");  
</script>
<?php endif; ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Kelola Penilaian
            <?php echo $this->session->flashdata('berhasil');?>
            </li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Penilaian Karyawan</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Input" href="<?= base_url('kepala_bagian/tambah_penilaian'); ?>"><i class="fa fa-edit"></i></a>
            <a class="btn btn-secondary btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Hitung Penilaian" href="<?= base_url('kepala_bagian/hitung'); ?>"><i class="fas fa-tools"></i></a>
            <a class="btn btn-warning btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Laporan" href=""><i class="fas fa-print"></i></a>
            <a class="btn btn-info btn-sm rounded-0 mb-3" type="a" data-toggle="tooltip" data-placement="top" title="Laporan" href=""><i class="fas fa-sort-numeric-up-alt"></i></a>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Kepribadian</th>
                        <th scope="col">Tanggung Jawab</th>
                        <th scope="col">Kerja Sama</th>
                        <th scope="col">Hasil Pekerjaan</th>
                        <th scope="col">Absensi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                <?php foreach ($karyawan as $d) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $d['nama_karyawan'];?></td>
                        <?php $bobot = $this->Kriteria_model->getBobot($d['NIK']);?>
                        <?php foreach ($bobot as $r) : ?>
                            <td><?= $r['nama_kriteria'];?></td>
                        <?php endforeach;?>
                        <td> <a class="btn btn-success btn-sm " type="a" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url('kepala_bagian/ubah_penilaian'); ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm " type="button" data-toggle="tooltip" data-placement="top" title="Delete" href=""><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $i++; endforeach;?>
                </tbody>
            </table>
        </div>
    </div>











</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->