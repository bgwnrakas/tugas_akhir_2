<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title; ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>css/custom.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>css/select2.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

	<!-- Custom fonts for this template-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet"
		type="text/css">
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets'); ?>/js/jquery-1.10.2.js"></script>
	<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->

	<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('assets'); ?>/vendor/jquery/config.js"></script>

	<!-- Load file process.js -->
	<script>
		$(document).ready(function () {
			$('#example').DataTable();
		});

	</script>
	<script>
		$('.custom-file-input').on('change', function () {
			let fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass('selected').html(fileName);
		});

	</script>


	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?= base_url('assets'); ?>/js/select2.min.js"></script>
	<script src="<?= base_url('assets'); ?>/js/jquery.metisMenu.js"></script>
	<script src="<?= base_url('assets'); ?>/js/custom.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

	<script>
		$(document).ready(function () {
			$('.select-example').select2();

			// $('.select-example').change(function () {
			// 	var nik = $(this).find('option:selected').val();
			// 	$.ajax({
			// 	    type: "POST",
			// 	    url: "<?php echo base_url('Kepala_bagian/getJabatan'); ?>", 
			// 	    data: {
            //             nik: nik
            //          },
			// 	    dataType: 'json',//return type expected as json
			// 	    success: function(data){
            //             $('#jabatan').val(data[0].jabatan);
            //             if (data[0].jabatan == 'Operator') {
            //                 $('#jabatan_kriteria').val(4);
            //             }
            //             else if (data[0].jabatan == 'Mekanik') {
            //                 $('#jabatan_kriteria').val(3);
            //             }
            //             else if (data[0].jabatan == 'Kepala Regu') {
            //                 $('#jabatan_kriteria').val(2);
            //             }else{
            //                  $('#jabatan_kriteria').val(1);
            //             }
			// 	    },
			// 	});
			// });
		});
	</script>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">
