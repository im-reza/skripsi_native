<?php    include '../../connections/connection_db.php';
session_start(); ?>
<table class="mb-0 table" style="font-size: 12px;">
	<thead class="bg-light">
		<tr style="text-align: center;">
			<th>#</th>
			<th>No Surat</th>
			<th>Tanggal Surat</th>
			<th>Pengirim</th>
			<th>Perihal</th>
			<th>Tanggal Diterima</th>
			<th>File</th>
			<th>Disposisi</th>
			<th>Edit</th>
			<th>Hapus</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if (isset($_POST['cari_sm'])) { 
			$nomor=1;
			$search=$_POST['cari_sm'];
			$page = (isset($_POST['page']))? $_POST['page'] : 1;
			$limit = 5; 
			$limit_start = ($page - 1) * $limit;
			$no = $limit_start + 1;
			$query = mysqli_query($con,"SELECT * FROM surat_masuk INNER JOIN file on surat_masuk.no_surat=file.no_surat where
				surat_masuk.no_surat like '%".$search."%' or
				surat_masuk.no_surat like '%".$search."%' or
				surat_masuk.tgl_surat like '%".$search."%' or
				surat_masuk.pengirim like '%".$search."%' or
				surat_masuk.perihal like '%".$search."%' or
				file.nama_file like '%".$search."%' or
				file.tgl_masuk like '%".$search."%' ORDER BY surat_masuk.id_sm DESC 
				LIMIT $limit_start, $limit");
			if (mysqli_num_rows($query)==0) {
				echo '<tr><td colspan="14">Tidak Ada Data.</td></tr>';
			}else{
				while ($d = mysqli_fetch_array($query)) {  
					$tgl_surat=$d['tgl_surat'];
					$tgl_masuk=$d['tgl_masuk'];
					?>
					<tr>
						<th><?php echo $nomor; ?></th>
						<td><?php echo $d['no_surat']; ?></td>
						<td><?php echo date('Y-m-d',strtotime($tgl_surat)); ?></td>
						<td><?php echo $d['pengirim']; ?></td>
						<td><?php echo $d['perihal']; ?></td>
						<td><?php echo date('Y-m-d',strtotime($tgl_masuk)) ?></td>
						<td style="text-align: center;"><?php echo "<a href='../file/".$d['nama_file']."' target='_blank' data-toggle='tooltip' title='".$d['nama_file']."'><span class='fas fa-file-pdf'></span></a>" ?></td>
						<td style="text-align: center;">
							<?php if ($d['status']=="0"){
								 echo "<div style='font-size:8px' class='mb-2 badge badge-pill badge-danger'>not verify</div>";
							} else{
								echo "<a href='#?' class='mb-2 badge badge-pill badge-success btn_show' id='".$d['no_surat']."' ><i class='fas fa-print'></i></a>";
							}
							?>
						</td>
						<td style='text-align: center'>
							<?php if ($d['type_surat']=='pemberitahuan'){
								echo "<button class='btn btn-sm btn-info btn_edit' id=".$d['id_sm']."><span class='far fa-edit'></button>";
							}elseif ($d['type_surat']=='undangan') {
								echo "<button class='btn btn-sm btn-info btn_edit_u' id=".$d['id_sm']."><span class='far fa-edit'></button>";
							} ?> 
						</td>
						<td style='text-align: center'>
							<button class='btn btn-sm btn-danger' data-href='actions/aksi_hapus_sm.php?id=<?php echo $d['no_surat'] ?> ' data-toggle='modal' data-target='#delete_modal_sm'><span class='fas fa-trash-alt'></span></button>
						</td>
					</tr> 
				</tbody>
				<?php $nomor++; }}} ?>
			</table>
			<?php
			$query_jumlah =mysqli_query($con,"SELECT count(*) AS jumlah_sm FROM surat_masuk INNER JOIN file on surat_masuk.no_surat=file.no_surat where surat_masuk.no_surat like '%".$search."%' or
				surat_masuk.tgl_surat like '%".$search."%' or
				surat_masuk.pengirim like '%".$search."%' or
				surat_masuk.perihal like '%".$search."%' or
				file.nama_file like '%".$search."%' or
				file.tgl_masuk like '%".$search."%' ");
			$d=mysqli_fetch_array($query_jumlah);
			$total_records = $d['jumlah_sm'];
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