		<?php 
		include '../../connections/connection_db.php';
		session_start();
		date_default_timezone_set('Asia/Jakarta');
		$query = mysqli_query($con,"SELECT * FROM surat_masuk INNER JOIN file on surat_masuk.no_surat=file.no_surat where surat_masuk.status='0' ORDER BY surat_masuk.id_sm DESC");
		if (mysqli_num_rows($query)==0) {
			echo "<p style='text-align:center'>Tidak ada data.</p>";
		}else{
			while ($d = mysqli_fetch_array($query)) {  
				$tgl_surat=$d['tgl_surat'];
				$tgl_masuk=$d['tgl_masuk'];

				$waktu1=strtotime($tgl_masuk);
				$waktu2=strtotime("now");

				$diff=$waktu2 - $waktu1;
				$jam=floor($diff/(60*60));
				$menit=$diff - $jam * (60*60);
				$sisa = $menit % 60;
				$jumlah_detik = floor($sisa/1);
				$menit_fix=floor($menit/60);
				$hari = floor($diff/86400);

				?>
				<div class="col-md-6">
					<div class="animated lightSpeedIn">
						<div class="main-card mb-3 card-shadow-info border card border-info">
							<div class="card-header">
								<i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i><?php echo $d['perihal']; ?>
							</div>
							<div class="card-body">
								<div class="tab-content">
									<div class="tab-pane active">
										<div class="row">
											<div class="col-md-6">No Surat</div>
											<div class="col-md-6">: <?php echo $d['no_surat']; ?></div>
											<div class="col-md-6">Tgl Surat</div>
											<div class="col-md-6">: <?php echo $d['tgl_surat']; ?></div>
											<div class="col-md-6">Pengirim</div>
											<div class="col-md-6">: <?php echo $d['pengirim']; ?></div>
											<div class="col-md-6">Tanggal Masuk</div>
											<div class="col-md-6">: <?php echo date('Y-m-d',strtotime($tgl_masuk)) ?></div>
											<div class="col-md-6">File</div>
											<div class="col-md-6">: <?php echo "<a href='../file/".$d['nama_file']."' class='btn btn-sm btn-info' target='_blank' data-toggle='tooltip' title='".$d['nama_file']."'><span class='fas fa-file-pdf'></span></a>" ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="d-block text-right card-footer">
							<?php if ($menit_fix=='0') {       
								echo " ".$jumlah_detik." detik yang lalu ";
							} elseif ($jam=='0') {
								echo " ".$menit_fix." menit yang lalu ";
							}elseif($hari=='0') {
								echo " ".$jam." jam ".$menit_fix." menit yang lalu ";
							}else{
								echo " ".$hari." hari yang lalu ";
							} ?>
							<a href="#" class='btn-wide btn btn-success btn_ds' id="<?php echo $d['id_sm'];?>">Verify</a>
						</div>
					</div>
				</div>
			</div>
		<?php }}

		?>



