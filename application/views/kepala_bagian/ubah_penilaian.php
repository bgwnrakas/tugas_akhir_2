<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>kepala_bagian/kelola_penilaian">Kelola Penilaian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Ubah Penilaian</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"> Form Ubah Penilaian</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('kepala_bagian/update_penilaian'); ?>" method="post">
                <div class="form-group row">
                    <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_karyawan" value="<?= $karyawan['nama_karyawan'];?>" name="nama_karyawan" readonly>
                        <input type="hidden"  name="id_karyawan" value="<?= $karyawan['id_karyawan'];?>">
                    </div>
                </div>
               <?php 
                foreach ($kriteria as $d) 
                {
                    echo'
                        <div class="form-group row">
                            <label for="posisi" class="col-sm-2 col-form-label">'.$d['nama_kriteria'].'</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_sub_kriteria[]" required>';
                                            $query = $this->Kriteria_model->getSubKriteria($d['id_kriteria']);
                                            foreach ($query as $q):
                                                $cek = $this->Penilaian_model->isNotNull($karyawan['id_karyawan'],$q['id_sub_kriteria']);
                                                if (!empty($cek)) { 
                                                     if ($cek['id_sub_kriteria'] == $q['id_sub_kriteria']) {
                                                        echo'<option value="'.$q['id_sub_kriteria'].'" selected>'.$q['nama_sub_kriteria'].'</option>';
                                                    }
                                                }else{
                                                    echo'<option value="'.$q['id_sub_kriteria'].'">'.$q['nama_sub_kriteria'].'</option>';
                                                }
                                            endforeach; 
                                echo'                       
                                    </select>
                                </div>
                            </div>'; } ?>
                            <?php 
                                foreach ($kriteria as $d) 
                                {
                                    $query = $this->Kriteria_model->getSubKriteria($d['id_kriteria']); 
                                    foreach ($query as $q)
                                    {
                                        $cek = $this->Penilaian_model->isNotNull($karyawan['id_karyawan'],$q['id_sub_kriteria']);
                                        if (!empty($cek)) {
                                              if ($cek['id_sub_kriteria'] == $q['id_sub_kriteria']) {
                                                echo'<input type="hidden" name="id_penilaian[]" value="'.$cek['id_penilaian'].'">';
                                             }
                                        } 
                                    }
                                } 
                            ?>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Done</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
