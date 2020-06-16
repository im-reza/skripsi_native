<?php include_once '../../assets/kop_surat.php'; 
include '../../connections/connection_db.php'; 
$tgl_f=$_GET['tgl_awal'];
$tgl_2=$_GET['tgl_akhir'];
$no=1;
$query_jumlah =mysqli_query($con,"SELECT count(*) AS jumlah_sk FROM surat_keluar where
 tanggal between '$tgl_f 23:59:59' and '$tgl_2 23:59:59' ");
$d=mysqli_fetch_array($query_jumlah);
$total_records = $d['jumlah_sk'];
?>
<h3 align="center">Data Surat Keluar</h3><br>
<p align="center">Dari Tanggal <b><?php echo tgl_indo(date('D d-m-Y',strtotime($tgl_f))); ?></b> Sampai Tanggal <b><?php echo tgl_indo(date('D d-m-Y',strtotime($tgl_2))); ?></b></p>
<table border="2">
	<thead>
		<tr style="text-align: center;">
			<th scope="row">No</th>
			<th>Pembuat</th>
			<th>Nomor Surat</th>
			<th>Tanggal Dibuat</th>
			<th>Perihal</th>
			<th>Kepada</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query=mysqli_query($con,"SELECT * FROM surat_keluar INNER JOIN user on surat_keluar.pembuat=user.name where surat_keluar.tanggal between '$tgl_f 23:59:59' and '$tgl_2 23:59:59'");
		while ($d=mysqli_fetch_array($query)) {
			$tgl_masuk=$d['tanggal'];
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td align="center"><?php echo $d['pembuat']; ?></td>
				<td align="center"><?php echo $d['no_surat']; ?></td>
				<td align="center"><?php echo tgl_indo(date('D, d-m-Y', strtotime($tgl_masuk))) ?></td>
				<td align="center"><?php echo $d['perihal']; ?></td>
				<td><?php echo $d['penerima']; ?></td>
			</tr>
		</tbody>

		<?php $no++; }?>
	</table>



	<?php include_once '../../assets/tutup_surat.php'; ?>
	<script> window.print(); </script>