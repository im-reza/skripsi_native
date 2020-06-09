<?php include_once '../../assets/kop_surat.php'; include '../../connections/connection_db.php';?>
<?php  
$id=$_GET['id'];
$sql=mysqli_query($con,"SELECT * from surat_keluar where no_surat='$id'");
while ($data=mysqli_fetch_array($sql)) {
	$tgl_surat=$data['tanggal'];
	?>
	<div class="row">
		<div class="col-md-2">
			No 
			<br>
			Lampiran 
			<br>
			Perihal 
		</div>
		<div class="col-md-7">
			: <?php echo $data['no_surat']; ?> 
			<br>
			: -
			<br>
			: <u><?php echo $data['perihal']; ?></u>

		</div>
		<div class="col-md-3" style="">
			Banjarmasin , <?php echo tgl_indo(date("D d-m-Y",strtotime($tgl_surat))) ?>
			<br>
			<br>
			Kepada Yth,
			<br>
			<br>
			<b><?php echo $data['penerima']; ?></b>
			di- Banjarmasin
		</div>
	</div>
	<br>
	<br>
	<div class="col-md-12" style="margin-top: 35px;">
		<?php echo $data['isi']; ?>
	</div>

<?php } ?>

<?php include_once '../../assets/tutup_surat.php'; ?>