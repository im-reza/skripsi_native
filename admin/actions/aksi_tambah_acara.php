<?php 
include '../../connections/connection_db.php';
include '../../connections/tgl_indo.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

function sendMessage($telegram_id, $text, $secret_token) {

	$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
	$url = $url . "&text=" . urlencode($text);
	$ch = curl_init();
	$optArray = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($ch, $optArray);
	$result = curl_exec($ch);
	curl_close($ch);
}
if (isset($_REQUEST['submit'])) {
	$id_kabag=mysqli_query($con,"select id_telegram from user where name='kabag'");
	while ($kabag=mysqli_fetch_array($id_kabag)) {
		$telegram_id=$kabag['id_telegram'];
	}
	$secret_token = "1070076828:AAFr7XYh55CSvb5A6NUIyUfKU2_XdrgFVnk";
	$tgl_s=$_POST['tgl_surat'];
	$start_event=date('Y-m-d H:i',strtotime($_POST['start_event']));
	$end_event=date('Y-m-d H:i',strtotime($_POST['end_event']));
	$type=$_POST['type_surat'];
	$tgl_srt=date("Y-m-d",strtotime($tgl_s));
	$tgl_diterima=date("Y-m-d H:i:s");
	$no_br=htmlspecialchars($_POST['no_surat']);
	$pengirim=htmlspecialchars($_POST['pengirim']);
	$perihal=htmlspecialchars($_POST['perihal']);
	$tempat=$_POST['tempat'];

	$ekstensi_boleh=array('pdf','jpg');
	$namafile=$_FILES['file']['name'];
	$namasementara=$_FILES['file']['tmp_name'];
	$x=explode('.', $namafile);
	$namabaru='('.date("d_m_y_Hs").')'.' '.($namafile);
	$ekstensi=strtolower(end($x));
	$ukuran=$_FILES['file']['size'];
	$dirUpload="../../file/";

	$text='#-- *Surat Undangan* --#
	Surat nomor *'.$no_br.'*,
	dari : *'.$pengirim.'*,
	Perihal : *'.$perihal.'*, 
	Tempat : *'.$tempat.'*,
	Mulai : *'.tgl_indo(date('D, d-m-Y H.i', strtotime($start_event))).'*,
	sampai : *'.tgl_indo(date('D, d-m-Y H.i',strtotime($end_event))).'*, 
	 #-- Harap segera diverifikasi ! --# ';
	

	$cek=mysqli_num_rows(mysqli_query($con,"select * from surat_masuk where no_surat='$no_br'"));

	if ($cek>0) {
		$_SESSION['duplicate']='<div class="alert alert-secondary alert-dismissible fade show" role="alert">
		Data dengan no " '.$no_br.' " Sudah Ada !!!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo "<script>window.location.href='../surat_masuk.php'</script>";

	} else {

		if (in_array($ekstensi, $ekstensi_boleh)==true) {
			if ($ukuran<21044070) {
				sendMessage($telegram_id, $text, $secret_token);
				move_uploaded_file($namasementara, $dirUpload.$namabaru);
				$query=mysqli_query($con,"insert into surat_masuk values ('','$no_br','$tgl_srt','$pengirim','$perihal','$type','0') ");
				$queryfile=mysqli_query($con,"insert into file values ('','$no_br','$namabaru','$tgl_diterima')");
				$queryacara=mysqli_query($con,"insert into acara values ('','$no_br','$tempat','$start_event','$end_event')");
				if ($queryfile) {
              # code...
					$_SESSION['success']='<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil menambahkan surat '.$type.' data no '.$no_br.', Selamat !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>';
					echo "<script>window.location.href='../surat_masuk.php'</script>";
				} else {
					$_SESSION['failed']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Gagal Upload !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>';
					echo "<script>window.location.href='../surat_masuk.php'</script>";
				}

			} else {
				$_SESSION['size_format']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
				File Terlalu Besar
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				echo "<script>window.location.href='../surat_masuk.php'</script>";
			}
		} else {
			$_SESSION['size_big']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
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
