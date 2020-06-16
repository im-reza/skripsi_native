<table class="mb-0 table" style="font-size: 12px">
	<thead>
		<tr style="text-align: center;">
			<th>#</th>
			<th>Pembuat</th>
			<th>No surat</th>
			<th>Tgl Dibuat</th>
			<th>Perihal</th>
			<th>Penerima</th>
			<th>Cetak</th>
			<th>Edit</th>
			<th>Hapus</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		include '../../connections/connection_db.php'; include '../../connections/tgl_indo.php';
		session_start();
		$id=1;
		$page = (isset($_POST['page']))? $_POST['page'] : 1;
		$limit = 5; 
		$limit_start = ($page - 1) * $limit;
		$no = $limit_start + 1;
		$query = mysqli_query($con,"SELECT * FROM surat_keluar INNER JOIN user on surat_keluar.pembuat=user.name ORDER BY surat_keluar.id_sk DESC LIMIT $limit_start, $limit");
		if (mysqli_num_rows($query)==0) {
			echo '<tr><td colspan="14">Tidak Ada Data.</td></tr>';
		}else{
			while ($d = mysqli_fetch_array($query)) {  
				$tgl_surat=$d['tanggal'];
				?>
				<tr>
					<th><?php echo $id; ?></th>
					<td style="color: blue" class="text-center"><?php echo $d['pembuat']; ?></td>
					<td><?php echo $d['no_surat']; ?></td>
					<td><?php echo tgl_indo(date('D, d-m-Y',strtotime($tgl_surat))); ?></td>
					<td><?php echo $d['perihal']; ?></td>
					<td><?php echo $d['penerima']; ?></td>
					<td hidden=""><?php echo $d['isi']; ?></td>
					<td style="text-align: center;">
						<?php if ($d['sifat']=="Surat Undangan"){
							echo "<a target='_blank' href='laporan/lap_sk_undangan.php?id=".$d['no_surat']."' data-toggle='tooltip' title='Surat Undangan'><button class='btn btn-secondary btn-sm'><span class='fas fa-file-pdf'></span></button></a>";
						}elseif ($d['sifat']=="Surat Permohonan Cuti") {
							echo "<a target='_blank' href='laporan/lap_sk_cuti.php?id=".$d['no_surat']."' data-toggle='tooltip' title='Surat Cuti'><button class='btn btn-primary btn-sm'><span class='fas fa-file-pdf'></span></button></a>";
						}elseif ($d['sifat']=="Surat Perintah Kerja") {
							echo "<a target='_blank' href='laporan/lap_sk_kerja.php?id=".$d['no_surat']."' data-toggle='tooltip' title='Surat Perintah Kerja'><button class='btn btn-warning btn-sm'><span class='fas fa-file-pdf'></span></button></a>"; 
						}elseif ($d['sifat']=="Surat Perjalanan Dinas") {
							echo "<a target='_blank' href='laporan/lap_sk_dinas.php?id=".$d['no_surat']."' data-toggle='tooltip' title='Surat Perjalanan Dinas'><button class='btn btn-success btn-sm'><span class='fas fa-file-pdf'></span></button></a>";
						}elseif ($d['sifat']=="Surat Biasa") {
							echo "<a target='_blank' href='laporan/lap_sk_undangan.php?id=".$d['no_surat']."' data-toggle='tooltip' title='Surat yang Dibuat Sendiri'><button class='btn btn-dark btn-sm'><span class='fas fa-file-pdf'></span></button></a>";
						}
						?>
					</td>
					<td style="text-align: center;">
						<?php if ($_SESSION['name']==$d['pembuat']){
							echo "<a href='edit_sk.php?id=".$d['no_surat']."'><button class='btn btn-info btn-sm'><span class='fas fa-edit'></span></button></a>";
						}elseif ($_SESSION['name']=='kabag') {
							echo "<a href='edit_sk.php?id=".$d['no_surat']."'><button class='btn btn-info btn-sm'><span class='fas fa-edit'></span></button></a>";
						}else{
							echo "<a href='edit_sk.php?id=".$d['no_surat']."' class='nav-link disabled'><button disabled='' class='btn btn-info btn-sm'><span class='fas fa-edit'></span></button></a>";
						}
						?>
					</td>
					<td style="text-align: center;">
						<?php if ($_SESSION['name']==$d['pembuat']){
							echo "<button class='btn btn-sm btn-danger' data-href='actions/aksi_hapus_sk.php?id=".$d['no_surat']."' data-toggle='modal' data-target='#delete_modal'><span class='fas fa-trash-alt'></span></button>";
						}elseif ($_SESSION['name']=='kabag') {
							echo "<button class='btn btn-sm btn-danger' data-href='actions/aksi_hapus_sk.php?id=".$d['no_surat']."' data-toggle='modal' data-target='#delete_modal'><span class='fas fa-trash-alt'></span></button>";
						}else{
							echo "<button disabled='' class='btn btn-sm btn-danger' data-href='actions/aksi_hapus_sk.php?id=".$d['no_surat']."' data-toggle='modal' data-target='#delete_modal'><span class='fas fa-trash-alt'></span></button>";
						}
						?>
					</td>
				</tr> 
			</tbody>
			<?php  $id++;}} ?>
		</table>
		<?php
		$query_jumlah =mysqli_query($con,"SELECT count(*) AS jumlah FROM surat_keluar");
		$d=mysqli_fetch_array($query_jumlah);
		$total_records = $d['jumlah'];
		?>
		<br>
		<nav class="mb-5">
			<ul class="pagination justify-content-center">
				<?php
				$jumlah_page = ceil($total_records / $limit);
              $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;

              if($page == 1){
              	echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
              	echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              } else {
              	$link_prev = ($page > 1)? $page - 1 : 1;
              	echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
              	echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              }

              for($i = $start_number; $i <= $end_number; $i++){
              	$link_active = ($page == $i)? ' active' : '';
              	echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
              }

              if($page == $jumlah_page){
              	echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
              	echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
              } else {
              	$link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
              	echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
              	echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
              }
              ?>
          </ul>
      </nav>
