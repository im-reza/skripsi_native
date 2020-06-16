<?php include_once '../../assets/kop_surat.php'; 
include '../../connections/connection_db.php'; 
$tgl_f=$_GET['tgl_awal'];
$tgl_2=$_GET['tgl_akhir'];
$no=1;
?>
<h3 align="center">Data Disposisi</h3><br>
<p align="center">Dari Tanggal <b><?php echo tgl_indo(date('D d-m-Y',strtotime($tgl_f))); ?></b> Sampai Tanggal <b><?php echo tgl_indo(date('D d-m-Y',strtotime($tgl_2))); ?></b></p>
<table border="2">
	<thead>
		<tr>
			<th scope="row">No</th>
			<th>No Surat</th>
			<th>Pengirim</th>
			<th>Perihal</th>
			<th>Tanggal Verifikasi</th>
			<th>Kepada</th>
			<th>Catatan Kabag</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query=mysqli_query($con,"select surat_masuk.no_surat,surat_masuk.tgl_surat,surat_masuk.pengirim,surat_masuk.perihal,disposisi.catatan,disposisi.tgl, GROUP_CONCAT(penerima SEPARATOR  ' & ') as penerima from disposisi inner join surat_masuk on surat_masuk.no_surat=disposisi.no_surat where disposisi.tgl between '$tgl_f 23:59:59' and '$tgl_2 23:59:59' GROUP BY disposisi.no_surat");
		while ($d=mysqli_fetch_array($query)) {
			$tgl=$d['tgl'];
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d['no_surat']; ?></td>
				<td><?php echo $d['pengirim']; ?></td>
				<td><?php echo $d['perihal']; ?></td>
				<td><?php echo tgl_indo(date('D, d-m-Y',strtotime($tgl))) ?></td>
				<td><?php echo $d['penerima']; ?></td>
				<td><?php echo $d['catatan']; ?></td>
			</tr>
		</tbody>

		<?php $no++; }?>
	</table>



	<?php include_once '../../assets/tutup_surat.php'; ?>
	<script> window.print(); </script>