<table class="mb-0 table" style="font-size: 12px;">
	<thead class="bg-light">
		<tr style="text-align: center;">
			<th>#</th>
			<th>No Surat</th>
			<th>Pengirim</th>
			<th>Perihal</th>
			<th>Tanggal Verifikasi</th>
			<th>File</th>
			<th>Kepada</th>
			<th>Catatan</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		include '../../connections/connection_db.php';
		session_start();
		if (isset($_POST['cari_ds'])) { 

			$search=$_POST['cari_ds'];
			$page = (isset($_POST['page']))? $_POST['page'] : 1;
			$limit = 5; 
			$limit_start = ($page - 1) * $limit;
			$no = $limit_start + 1;
			$id=1;
			$query = mysqli_query($con,"select surat_masuk.no_surat,surat_masuk.tgl_surat,surat_masuk.pengirim,surat_masuk.perihal,file.nama_file,file.tgl_masuk,disposisi.catatan,disposisi.tgl, GROUP_CONCAT(penerima SEPARATOR  ' & ') as penerima from disposisi inner join surat_masuk inner join file on surat_masuk.no_surat=disposisi.no_surat and surat_masuk.no_surat=file.no_surat where surat_masuk.status='1' and surat_masuk.no_surat like '%".$search."%' GROUP BY disposisi.no_surat order by disposisi.tgl DESC LIMIT $limit_start, $limit");
			if (mysqli_num_rows($query)==0) {
				echo '<tr><td colspan="14">Tidak Ada Data.</td></tr>';
			}else{
			while ($d = mysqli_fetch_array($query)) {  
				$tgl_verif=$d['tgl'];
				?>
				<tr>
					<th><?php echo $id ?></th>
					<td><?php echo $d['no_surat']; ?></td>
					<td><?php echo $d['pengirim']; ?></td>
					<td><?php echo $d['perihal']; ?></td>
					<td style="text-align: center;"><?php echo date('Y-m-d H:i',strtotime($tgl_verif)) ?></td>
					<td style="text-align: center;"><?php echo "<a href='../file/".$d['nama_file']."' target='_blank' data-toggle='tooltip' title='".$d['nama_file']."'><span class='fas fa-file-pdf'></span></a>" ?></td>
					<td style="text-align: center;color: red"><?php echo $d['penerima']; ?></td>
					<td style="color: red"><?php echo $d['catatan']; ?></td>
					<td>
						<button class="btn btn-sm btn-info btn_edit" id="<?php echo $d['no_surat']; ?>"><span class="far fa-edit"></button>
						</td>
					</tr> 
				</tbody>
				<?php 
				$id++;
			}}} ?>
		</table>
		<?php
		$query_jumlah =mysqli_query($con,"SELECT count(*) as jumlah_ds FROM surat_masuk inner join disposisi on surat_masuk.no_surat=disposisi.no_surat where surat_masuk.no_surat like '%".$search."%' ");
		$d=mysqli_fetch_array($query_jumlah);
		$total_records = $d['jumlah_ds'];
		?>
		<br>
		<nav class="mb-5">
			<ul class="pagination justify-content-center">
				<?php
				$jumlah_page = ceil($total_records / $limit);
              $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
              for($i = $start_number; $i <= $end_number; $i++){
              	$link_active = ($page == $i)? ' active' : '';
              	echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
              }
              ?>
          </ul>
      </nav>


