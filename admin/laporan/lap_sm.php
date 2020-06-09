<?php include_once '../../assets/kop_surat.php'; 
include '../../connections/connection_db.php'; 
$tgl_f=$_GET['tgl_awal'];
$tgl_2=$_GET['tgl_akhir'];
$no=1;
$query_jumlah =mysqli_query($con,"SELECT count(*) AS jumlah_sm FROM surat_masuk inner join file on surat_masuk.no_surat=file.no_surat where
 file.tgl_masuk between '$tgl_f 23:59:59' and '$tgl_2 23:59:59' ");
$d=mysqli_fetch_array($query_jumlah);
$total_records = $d['jumlah_sm'];
?>
<h3 align="center">Data Surat Masuk</h3><br>
<p align="center">Dari Tanggal <b><?php echo tgl_indo(date('D d-m-Y',strtotime($tgl_f))); ?></b> Sampai Tanggal <b><?php echo tgl_indo(date('D d-m-Y',strtotime($tgl_2))); ?></b></p>
<table class="table table-dark table-striped">
	<thead>
		<tr style="text-align: center;">
			<th scope="row">No</th>
			<th>Nomor Surat</th>
			<th>Tanggal Surat</th>
			<th>Pengirim</th>
			<th>Perihal</th>
			<th>Tanggal Diterima</th>
			<th>Nama File</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query=mysqli_query($con,"SELECT * FROM surat_masuk INNER JOIN file on surat_masuk.no_surat=file.no_surat where file.tgl_masuk between '$tgl_f 23:59:59' and '$tgl_2 23:59:59' order by surat_masuk.id_sm ");
		while ($d=mysqli_fetch_array($query)) {
			$tgl_masuk=$d['tgl_masuk'];
			?>

			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d['no_surat']; ?></td>
				<td><?php echo $d['tgl_surat']; ?></td>
				<td><?php echo $d['pengirim']; ?></td>
				<td><?php echo $d['perihal']; ?></td>
				<td><?php echo date('Y-m-d',strtotime($tgl_masuk)) ?></td>
				<td><?php echo $d['nama_file']; ?></td>
			</tr>
		</tbody>

		<?php $no++; }?>
	</table>



	<?php include_once '../../assets/tutup_surat.php'; ?>