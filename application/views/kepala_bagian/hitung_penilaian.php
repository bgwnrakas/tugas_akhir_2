<div class="container-fluid">

	<!-- Page Heading -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Hasil Perhitungan
				<?php echo $this->session->flashdata('berhasil');?>
			</li>
		</ol>
	</nav>

	<div class="card shadow mb-5">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Fuzzy Nilai</h6>
		</div>
		<div class="card-body">
			<table class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th scope="col">Nama Karyawan</th>
						<th scope="col">Jabatan</th>
						<th scope="col">Kepribadian</th>
						<th scope="col">Tanggung Jawab</th>
						<th scope="col">Kerja Sama</th>
						<th scope="col">Hasil Pekerjaan</th>
						<th scope="col">Absensi</th>
					</tr>
				</thead>
				<tbody>
					<?php
                         $x = count(reset($fuzzy));
                         $y = count($fuzzy);
                         for ($i=0; $i < $y; $i++) { 
                             echo"<tr>";
                             for ($j=0; $j < $x; $j++) { 
                                if ($j==0) {
                                    echo'<td>'.$fuzzy[$i][$j].'</td>';
                                }else{
                                     echo'<td class="text-center">'.$fuzzy[$i][$j].'</td>';
                                }
                             }
                             echo"</tr>";
                         }
                    ?>
				</tbody>
				<tfood>
					<tr>
						<th scope="col">Pembagi</th>
						<?php
                            for ($i=0; $i <count($pembagi) ; $i++) { 
                                echo'<th scope="col">'.round($pembagi[$i+1], 5).'</th>';
                            }
                        ?>
					</tr>
				</tfood>
			</table>
		</div>
	</div>

	<div class="card shadow mb-5">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Ternomalisasi</h6>
		</div>
		<div class="card-body">
			<table class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th scope="col">Nama Karyawan</th>
						<th scope="col">Jabatan</th>
						<th scope="col">Kepribadian</th>
						<th scope="col">Tanggung Jawab</th>
						<th scope="col">Kerja Sama</th>
						<th scope="col">Hasil Pekerjaan</th>
						<th scope="col">Absensi</th>
					</tr>
				</thead>
				<tbody>
					<?php
                         $x = count(reset($ternormalisasi));
                         $y = count($ternormalisasi);
                         for ($i=0; $i < $y; $i++) { 
                             echo"<tr>";
                             for ($j=0; $j < $x; $j++) { 
                                if ($j==0) {
                                    echo'<td>'.$ternormalisasi[$i][$j].'</td>';
                                }else{
                                     echo'<td class="text-center">'.round($ternormalisasi[$i][$j],5).'</td>';
                                }
                             }
                             echo"</tr>";
                         }
                    ?>
				</tbody>
			</table>
		</div>
	</div>

    <div class="card shadow mb-5">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Optimalisasi</h6>
		</div>
		<div class="card-body">
			<table class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th scope="col">Nama Karyawan</th>
						<th scope="col">Jabatan</th>
						<th scope="col">Kepribadian</th>
						<th scope="col">Tanggung Jawab</th>
						<th scope="col">Kerja Sama</th>
						<th scope="col">Hasil Pekerjaan</th>
						<th scope="col">Absensi</th>
					</tr>
				</thead>
				<tbody>
					<?php
                         $x = count(reset($optimalisasi));
                         $y = count($optimalisasi);
                         for ($i=0; $i < $y; $i++) { 
                             echo"<tr>";
                             for ($j=0; $j < $y; $j++) { 
                                if ($j==0) {
                                    echo'<td>'.$optimalisasi[$i][$j].'</td>';
                                }else{
                                     echo'<td class="text-center">'.round($optimalisasi[$i][$j],5).'</td>';
                                }
                             }
                             echo"</tr>";
                         }
                    ?>
				</tbody>
			</table>
		</div>
	</div>

    <div class="card shadow mb-5">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Nilai Maksimum , Minumum dan Yi</h6>
		</div>
		<div class="card-body">
			<table class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th scope="col">Nama Karyawan</th>
						<th scope="col">Nilai Maksimum</th>
						<th scope="col">Nilai Minimum</th>
						<th scope="col">Yi</th>
					</tr>
				</thead>
				<tbody>
					<?php
                         $x = count(reset($matrixYi));
                         $y = count($matrixYi);
                         for ($i=0; $i < $y; $i++) { 
                             echo"<tr>";
                             for ($j=0; $j < $x; $j++) { 
                                if ($j==0) {
                                    echo'<td>'.$matrixYi[$i][$j].'</td>';
                                }else{
                                     echo'<td class="text-center">'.round($matrixYi[$i][$j],5).'</td>';
                                }
                             }
                             echo"</tr>";
                         }
                    ?>
				</tbody>
			</table>
		</div>
	</div>

    <div class="card shadow mb-5">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Peringkat</h6>
		</div>
		<div class="card-body">
			<table class="table table-striped table-hover" style="width:100%">
				<thead>
					<tr>
						<th scope="col">Nama Karyawan</th>
						<th scope="col">Yi</th>
                        <th scope="col">Peringkat</th>
					</tr>
				</thead>
				<tbody>
					<?php
                        //  Fungsi untuk melakukan sort
                         array_multisort(array_column($matrixYi, 3), SORT_DESC, $matrixYi);
                         $x = count(reset($matrixYi));
                         $y = count($matrixYi);
                         for ($i=0; $i < $y; $i++) { 
                             echo"<tr>";
                             echo'<td>'.$matrixYi[$i][0].'</td>';
                             echo'<td>'.round($matrixYi[$i][3],5).'</td>';
                             echo'<td>'. $i+1 .'</td>';
                             echo"</tr>";
                         }
                    ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
