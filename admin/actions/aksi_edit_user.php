<?php 
include '../../connections/connection_db.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
if (isset($_REQUEST['submit'])) {
	$id=$_POST['id'];
	$password=$_POST['password'];
	$nama=$_POST['nama'];
	$nip=$_POST['nip'];
	$id_telegram=$_POST['id_telegram'];

	
		$query=mysqli_query($con,"UPDATE user SET password=md5('$password'),nama='$nama',nip='$nip',id_telegram='$id_telegram' where id='$id' ");

		if ($query) {
              # code...
			$_SESSION['success']='<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil mengedit data user
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
			echo "<script>window.location.href='../../logout.php'</script>";
		} else {
			$_SESSION['failed']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Gagal edit
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
			echo "<script>window.location.href='../setting.php'</script>";
		}

	} 





?>
