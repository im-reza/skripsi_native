<?php 
include '../../connections/connection_db.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
if (isset($_GET['id'])) {
	$no_br=$_GET['id'];
	$tgl_dibaca=date('Y-m-d H:i:s');
	$querysm=mysqli_query($con,"update disposisi set status_ds='1',tgl_dibaca='$tgl_dibaca' where id_ds='$no_br'");
	if ($querysm) {
		echo "<script>window.location.href='../inbox.php'</script>";
	} else {
		echo "<script>window.location.href='../inbox.php'</script>";
	}
}



?>