<!-- Begin Page Content -->
<style>
  .swal-footer { text-align: center; }
</style>

<?php if ($this->session->flashdata('error')): ?>
<script>
    $('#cek').click(function () {
        swal("error!", "Data Penilaian Berhasil Tersimpan!", "success");
    });
</script>
<?php endif; ?>

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
            <form action="<?= base_url('kepala_bagian/submit_penilaian'); ?>" method="post">
                <div class="form-group row">
                    <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <select class="form-control select-example" id="karyawan" name="id_karyawan" required>
                             <option value="" selected disabled>-Pilih Karywan-</option>
                            <?php foreach ($karyawan as $r) :
                                echo'<option value="'.$r['id_karyawan'].'">'.$r['no_ktp'].' - '.$r['nama_karyawan'].'</option>';
                            endforeach; ?>
                        </select>
                    </div>
                </div>
                <?php foreach ($kriteria as $d) :?>
                    <div class="form-group row">
                        <label for="posisi" class="col-sm-2 col-form-label"><?= $d['nama_kriteria'] ;?></label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_sub_kriteria[]" required>
                                <option value="" selected disabled>-Pilih Penilaian-</option>
                                <?php 
                                $query = $this->Kriteria_model->getSubKriteria($d['id_kriteria']);
                                foreach ($query as $q) :
                                    echo'<option value="'.$q['id_sub_kriteria'].'">'.$q['nama_sub_kriteria'].'</option>';
                                endforeach; 
                                ?>
                            </select>
                        </div>
                    </div>
                <?php  endforeach;?>
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