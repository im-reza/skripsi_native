<?php  
include '../../connections/connection_db.php';
session_start();
if (isset($_REQUEST['id'])) {
	$id=$_GET['id'];
	$hapus=mysqli_query($con,"DELETE FROM surat_keluar WHERE no_surat='$id' ");	
	if ($hapus) {
		$_SESSION['success_delete']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
		Data '.$id.' berhasil dihapus !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo "<script>window.location.href='../surat_keluar.php'</script>";
		$reset=mysqli_query($con,"alter table surat_keluar auto_increment=1");
	} else {
		$_SESSION['error_delete']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Gagal Menghapus Data
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo "<script>window.location.href='../surat_keluar.php'</script>";
	}
}
?>