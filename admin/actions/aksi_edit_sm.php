<?php 
include '../../connections/connection_db.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
if (isset($_REQUEST['submit'])) {
	$id=$_POST['id_sm_edt'];
	$tgl_s=$_POST['tgl_surat_edt'];
	$tgl_srt=date("Y-m-d",strtotime($tgl_s));
	$no_br=$_POST['no_surat_edt'];
	$pengirim=htmlspecialchars($_POST['pengirim_edt']);
	$perihal=htmlspecialchars($_POST['perihal_edt']);
	$tgl=date("Y-m-d H:i:s");

	$ekstensi_boleh=array('pdf','jpg');
	$namafile=$_FILES['file_edt']['name'];
	$namasementara=$_FILES['file_edt']['tmp_name'];
	$x=explode('.', $namafile);
	$namabaru='('.date("d_m_y_Hs").')'.' '.($namafile);
	$ekstensi=strtolower(end($x));
	$ukuran=$_FILES['file_edt']['size'];
	$dirUpload="../../file/";


	if ($namafile=='') {
		$queryfile=mysqli_query($con,"UPDATE file SET tgl_masuk='$tgl' where no_surat='$no_br' ");
		$query=mysqli_query($con,"UPDATE surat_masuk SET tgl_surat='$tgl_srt',pengirim='$pengirim',perihal='$perihal' where id_sm='$id' ");
		$_SESSION['success_edit']='<div class="alert alert-info alert-dismissible fade show" role="alert">
		Berhasil mengedit data dan file '.$no_br.' !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo "<script>window.location.href='../surat_masuk.php'</script>";
	}else{


	if (in_array($ekstensi, $ekstensi_boleh)==true) {
		if ($ukuran<21044070) {

			$delet=mysqli_query($con,"select * from file where no_surat='$no_br'");
			$r=mysqli_fetch_array($delet);
			$nama_f=$r['nama_file'];
			unlink("../../file/".$nama_f);

			move_uploaded_file($namasementara, $dirUpload.$namabaru);
			$queryfile=mysqli_query($con,"UPDATE file SET nama_file='$namabaru',tgl_masuk='$tgl' where no_surat='$no_br' ");
			$query=mysqli_query($con,"UPDATE surat_masuk SET tgl_surat='$tgl_srt',pengirim='$pengirim',perihal='$perihal' where id_sm='$id' ");
			if ($query) {
				$_SESSION['success_edit']='<div class="alert alert-info alert-dismissible fade show" role="alert">
				Berhasil mengedit data dan file '.$no_br.' !
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				echo "<script>window.location.href='../surat_masuk.php'</script>";
			} else {
				$_SESSION['failed_edit']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Gagal mengedit !
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				echo "<script>window.location.href='../surat_masuk.php'</script>";
			}
		} else {
			$_SESSION['size_big']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
			File Terlalu Besar
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
			echo "<script>window.location.href='../surat_masuk.php'</script>";
		}
	} else {
		$_SESSION['size_format']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
		Hanya file yang berformat PDF, atau JPG. yang dapat diinput !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo "<script>window.location.href='../surat_masuk.php'</script>";
	}
}
}





?>
