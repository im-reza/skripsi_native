<?php 
include '../../connections/connection_db.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
if (isset($_REQUEST['submit'])) {
	$pembuat=$_POST['pembuat'];
	$no_br=$_POST['no_surat'];
	$tgl=date("Y-m-d");
	$perihal=$_POST['perihal'];
	$penerima=$_POST['penerima'];
	$isi=$_POST['isi'];
	$sifat=$_POST['sifat'];
	$query=mysqli_query($con,"insert into surat_keluar values ('','$pembuat','$no_br','$tgl','$perihal','$penerima','$isi','$sifat') ");
	if ($query) {
		$_SESSION['success']='<div class="alert alert-success alert-dismissible fade show" role="alert">
		Berhasil menambahkan data No. '.$no_br.', Selamat !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo "<script>window.location.href='../surat_keluar.php'</script>";
	} else {
		$_SESSION['failed']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Gagal
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo "<script>window.location.href='../surat_keluar.php'</script>";
	}
}



?>