<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN</title>
</head>
<body>
			<hr><width="100" height="75"></hr>
			<h1><center><font size="5" face="arial">PT. MALAKASARI</font></center></h1>
			<!-- <center><b>Jl. Suryalaya Indah No. 21 Buah Batu <b></center><br> -->
			<hr><width="100" height="75"></hr>
	<table border="1px">
		<tr>
			<th> NO </th>
			<th> NAMA KARAYAWAN </th>
			<th> DEPARTEMEN </th>
			<th> NILAI YI </th>
		</tr>


		 <?php
		 $no=0;
		foreach ($record_print as $r) {
			$no++;
			echo'
			<tr>
			<td>'.$no.'</td>
			<td>'.$r->nama_karyawan.'</td>
			<td>'.$r->departemen.'</td>
            <td>'.$r->nilai_yi.'</td>
            </tr>';
		}
	 ?>
	</table>
	<script type="text/javascript">
	window.print();
</script>
</body>
</html>