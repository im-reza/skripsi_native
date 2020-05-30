<?php  
include '../../connections/connection_db.php';
session_start();
if (isset($_REQUEST['id'])) {
	$id=$_GET['id'];
	$delet=mysqli_query($con,"select * from file where no_surat='$id'");
	$r=mysqli_fetch_array($delet);
	unlink("../../file/".$r['nama_file']);
	$hapus=mysqli_query($con,"DELETE FROM surat_masuk WHERE no_surat='$id' ");	
	if ($hapus) {
		$_SESSION['success_delete']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
		Data dengan no '.$id.' berhasil dihapus !!!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo "<script>window.location.href='../surat_masuk.php'</script>";
		$reset=mysqli_query($con,"alter table surat_masuk auto_increment=1");
		$reset1=mysqli_query($con,"alter table file auto_increment=1");
		$reset2=mysqli_query($con,"alter table tmp_disposisi auto_increment=1");
	} else {
		$_SESSION['error_delete']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Gagal Menghapus Data
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo "<script>window.location.href='../surat_masuk.php'</script>";
	}
}
?>