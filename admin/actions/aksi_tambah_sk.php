<?php 
include '../../connections/connection_db.php'; include '../../connections/tgl_indo.php';
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
	$pembuat=$_POST['pembuat'];
	$no_br=$_POST['no_surat'];
	$tgl=date("Y-m-d H:i");
	$perihal=$_POST['perihal'];
	$penerima=$_POST['penerima'];
	$isi=$_POST['isi'];
	$sifat=$_POST['sifat'];
	$secret_token = "1070076828:AAFr7XYh55CSvb5A6NUIyUfKU2_XdrgFVnk";

	$dibuat=tgl_indo(date('D d-m-Y H:i',strtotime($tgl)));

	$text='#-- *Membuat Surat Keluar* --#
	Tanggal : *'.$dibuat.'*,
	Nomor Surat : *'.$no_br.'*,
	Yang Membuat : *'.$pembuat.'*,
	Perihal : *'.$perihal.'*
	#-- Terimakasih --# ';

	$id_kabag=mysqli_query($con,"select id_telegram from user where name='kabag'");
	while ($kabag=mysqli_fetch_array($id_kabag)) {
		$telegram_id=$kabag['id_telegram'];
	}
	$query=mysqli_query($con,"insert into surat_keluar values ('','$pembuat','$no_br','$tgl','$perihal','$penerima','$isi','$sifat') ");
	if ($query) {
		sendMessage($telegram_id, $text, $secret_token);
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