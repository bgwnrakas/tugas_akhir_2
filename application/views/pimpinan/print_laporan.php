<!DOCTYPE html>
<html>

<head>
	<title>LAPORAN</title>
</head>

<body>
	<hr>
	<width="100" height="100">
		</hr>
		<h1>
			<center>
				<font size="5" face="arial">LAPORAN PENGELOLAAN BONUS KARYAWAN</font>
			</center>
		</h1>
		<h1>
			<center>
				<font size="5" face="arial">PT. MALAKASARI</font>
			</center>
		</h1>
		<center><b>Jl. Raya Banjaran No.KM. 12,2, Malakasari, Kec. Baleendah, Bandung, Jawa Barat <b></center><br>
		<hr>
		<width="100" height="100">
			</hr>
			<br>
			<table border="1px" style="width:100%">
				<tr>
					<th> NO </th>
					<th> NAMA KARAYAWAN </th>
					<th> DEPARTEMEN </th>
					<th> NILAI YI </th>
					<th> BONUS </th>
				</tr>
				<?php
		 $no=0;
			foreach ($record_print as $r)
			{
				$bonus = $this->Bonus_model->getBonus($r['nilai_yi']);
                    if (!empty($bonus)) { 
                        $jumlah = rupiah($bonus['jumlah_bonus']);
                    }else{
                        $jumlah = 'Bonus Tidak Tersedia';
                }
			$no++;
			echo'
			<tr>
			<td>'.$no.'</td>
			<td>'.$r['nama_karyawan'].'</td>
			<td>'.$r['departemen'].'</td>
			<td>'.$r['nilai_yi'].'</td>
			<td>'.$jumlah.'</td>
        </tr>';
			}
	 ?>
			</table>
			<script type="text/javascript">
				window.print();
			</script>
</body>

</html>
