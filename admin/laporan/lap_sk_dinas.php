<?php include_once '../../assets/kop_surat.php'; include '../../connections/connection_db.php';?>
<?php  
$id=$_GET['id'];
$sql=mysqli_query($con,"SELECT * from surat_keluar where no_surat='$id'");
while ($data=mysqli_fetch_array($sql)) {
	$tgl_surat=$data['tanggal'];
	?>
	<div class="row">
		<div class="col-md-12">
			<center>
				<u><h3>SURAT PERJALANAN DINAS</h3></u>
				Nomor : <?php echo $data['no_surat']; ?>
			</center>
		</div>
	</div>
	<br>
	<br>
	<div class="col-md-12" style="margin-top: 5px;">
		<center>
			<?php echo $data['isi']; ?>
		</center>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-2"></div>
		<div class="col-md-4" style="text-align: center; font-size: 14px;font-family: sans-serif;margin-top: 3%;">
			Ditetapkan di Banjarmasin
			<br>
			Pada tanggal, <?php echo tgl_indo(date("D d-m-Y",strtotime($tgl_surat))) ?>
		</div>
	</div>
<?php } ?>

<?php include_once '../../assets/tutup_surat.php'; ?>