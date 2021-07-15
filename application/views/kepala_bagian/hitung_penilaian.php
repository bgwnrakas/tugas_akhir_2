<div class="container-fluid">

	<!-- Page Heading -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url(); ?>kepala_bagian/kelola_penilaian">Kelola Penilaian</a></li>
			<li class="breadcrumb-item active" aria-current="page">Hasil Perhitungan</li>
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
						<?php
						foreach ($kriteria as $k) {
							echo '<th scope="col" class="text-center">' . $k['nama_kriteria'] . '</th>';
						}
						?>
					</tr>
				</thead>
				<tbody>
					<?php
					$x = count(reset($fuzzy));
					$y = count($fuzzy);
					for ($i = 0; $i < $y; $i++) {
						echo "<tr>";
						for ($j = 0; $j < $x; $j++) {
							if ($j == 0) {
								$kar = $this->Karyawan_model->getDataKaryawanByID($matrixYi[$i][$j]);
								echo '<td>' . $kar['nama_karyawan'] . '</td>';
							} else {
								echo '<td class="text-center">' . $fuzzy[$i][$j] . '</td>';
							}
						}
						echo "</tr>";
					}
					?>
				</tbody>
				<tfood>
					<tr>
						<th scope="col">Pembagi</th>
						<?php
						for ($i = 0; $i < count($pembagi); $i++) {
							echo '<th scope="col" class="text-center">' . round($pembagi[$i + 1], 5) . '</th>';
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
						<?php
						foreach ($kriteria as $k) {
							echo '<th scope="col" class="text-center">' . $k['nama_kriteria'] . '</th>';
						}
						?>
					</tr>
				</thead>
				<tbody>
					<?php
					$x = count(reset($ternormalisasi));
					$y = count($ternormalisasi);

					for ($i = 0; $i < $y; $i++) {
						echo "<tr>";
						for ($j = 0; $j < $x; $j++) {
							if ($j == 0) {
								$kar = $this->Karyawan_model->getDataKaryawanByID($matrixYi[$i][$j]);
								echo '<td>' . $kar['nama_karyawan'] . '</td>';
							} else {
								echo '<td class="text-center">' . round($ternormalisasi[$i][$j], 5) . '</td>';
							}
						}
						echo "</tr>";
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
						<?php
						foreach ($kriteria as $k) {
							echo '<th scope="col" class="text-center">' . $k['nama_kriteria'] . '</th>';
						}
						?>
					</tr>
				</thead>
				<tbody>
					<?php
					$x = count(reset($optimalisasi));
					$y = count($optimalisasi);
					for ($i = 0; $i < $y; $i++) {
						echo "<tr>";
						for ($j = 0; $j < $x; $j++) {
							if ($j == 0) {
								$kar = $this->Karyawan_model->getDataKaryawanByID($matrixYi[$i][$j]);
								echo '<td>' . $kar['nama_karyawan'] . '</td>';
							} else {
								echo '<td class="text-center">' . round($optimalisasi[$i][$j], 5) . '</td>';
							}
						}
						echo "</tr>";
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
						<th scope="col" class="text-center">Nilai Maksimum</th>
						<th scope="col" class="text-center">Nilai Minimum</th>
						<th scope="col" class="text-center">Yi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$x = count(reset($matrixYi));
					$y = count($matrixYi);
					for ($i = 0; $i < $y; $i++) {
						echo "<tr>";
						for ($j = 0; $j < $x; $j++) {
							if ($j == 0) {
								$kar = $this->Karyawan_model->getDataKaryawanByID($matrixYi[$i][$j]);
								echo '<td>' . $kar['nama_karyawan'] . '</td>';
							} else {
								echo '<td class="text-center">' . round($matrixYi[$i][$j], 5) . '</td>';
							}
						}
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="card shadow mb-5">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">Peringkat Karyawan</h6>
		</div>
		<div class="card-body">
			<?php
				$cekRank = $this->Karyawan_model->CekRankingIfNull($departemen);
				if (empty($cekRank)) {
					echo'<form action="'.base_url("kepala_bagian/simpan_peringkat").'" method="post">';
				}else{
					echo'<form action="'.base_url("kepala_bagian/reset_peringkat").'" method="post">';
				}
			?>
				<table class="table table-bordered table-hover" style="width:100%">
					<thead>
						<tr class="bg-info text-white">
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
						for ($i = 0; $i < $y; $i++) {
							$kar = $this->Karyawan_model->getDataKaryawanByID($matrixYi[$i][0]);
							echo "<tr>";
							echo '<td>' . $kar['nama_karyawan'] . '</td>';
							echo '<td>' . round($matrixYi[$i][3], 5) . '</td>';
							echo '<td>' . $i + 1 . '</td>';
							echo "</tr>";
							echo '
							 	<input type="hidden" name="id_karyawan[]" value="' . $matrixYi[$i][0] . '">
							 	<input type="hidden" name="yi[]" value="' . round($matrixYi[$i][3], 5) . '">
								<input type="hidden" name="peringkat[]" value="' . $i + 1 . '">
							 ';
                         }
                    ?>
				</tbody>
			</table>
			<br>
			<div class="text-center">
			<?php	
				if (empty($cekRank)) {
					echo'<button type="submit" class="btn btn-info  px-5 py-2">Simpan Peringkat</button>';
				}else{
					echo'<button type="submit" class="btn btn-warning  px-5 py-2">Reset Peringkat</button>';
					}
					?>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->