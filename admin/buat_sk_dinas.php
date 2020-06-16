<?php include_once '../assets/header.php'; ?>

<div class="app-main__outer ">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="fas fa-pencil-alt icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div><h3>Buat Surat Perjalanan Dinas</h3>
						<div class="page-title-subheading">
							<nav class="" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="surat_keluar.php">Surat Keluar</a></li>
									<li class="active breadcrumb-item" aria-current="page">Perjalanan Dinas</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="page-title-actions">
					<a href="surat_keluar.php"><button type="button" title="Kembali" data-toggle="tooltip" class="btn-shadow mr-3 btn btn-primary "><span class="fas fa-arrow-left"></span> Kembali</button>
					</a>
				</div> 
			</div>
		</div> 

		<?php 
		include '../connections/connection_db.php';
		$carimax=mysqli_query($con,"select max(no_surat) as angka_akhir from surat_keluar");
		$data=mysqli_fetch_array($carimax);
		$hasilmax=$data['angka_akhir'];
		$noUrut=(int)substr($hasilmax, 11,3);
		$noUrut++;
		$char="100/BAGPEM/";
		$tahun="/2020";
		$noSurat=$char.sprintf("%03s",$noUrut).$tahun;
		?>

		<div class="main-card mb-3 card">
			<div class="card-body">
				<div class="form-row">
					<div class="form-group col-md-6">
						<form method="POST" action="actions/aksi_tambah_sk.php">
							<label><strong>Pembuat :</strong></label>
							<input type="text" class="form-control" name="pembuat" readonly="" value="<?php echo $_SESSION['name']; ?>">
						</div>
						<div class="form-group col-md-6">
							<label><strong>No Surat :</strong></label>
							<input type="text" class="form-control" name="no_surat" readonly=""  value="<?php echo $noSurat ?>">
						</div>
						<div class="form-group col-md-12">
							<label><strong>Perihal :</strong></label>
							<input type="text" class="form-control" name="perihal" autofocus="" required="" value="Surat Perjalanan Dinas an ">
						</div>
						<div class="form-group col-md-12" hidden="">
							<label><strong>Penerima Surat :</strong></label>
							<textarea name="penerima" class="form-control" id="editor1">
								<p style="margin-left:40px">-</p>
							</textarea>
						</div>
						<div class="form-group col-md-12">
							<label><strong>Isi Surat :</strong></label>
							<textarea name="isi" id="editor2" class="form-control">
								<table border="3" cellspacing="0" class="TableNormal1" style="border-collapse:collapse">
									<tbody>
										<tr>
											<td style="border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:32px; vertical-align:top; width:28px">
												<p style="margin-left:6px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">1</span></span></span></p>
											</td>
											<td style="border-bottom:1px solid #747474; border-left:none; border-right:1px solid gray; border-top:2px solid #b8b8b8; height:34px; vertical-align:top; width:292px">
												<p style="margin-left:7px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Pejabat benwenang yang memberi perintah</span></span></span></p>
											</td>
											<td colspan="2" style="border-bottom:1px solid #747474; border-left:none; border-right:1px solid #777777; border-top:2px solid #b8b8b8; height:34px; vertical-align:top; width:334px">
												<p style="margin-left:4px"><strong><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">KEPALA BAGIAN PEMERINTAHAN</span></span></span></strong></p>

												<p style="margin-left:4px"><strong><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Drs. DOLLY SYAHBANA, MM</span></span></span></strong></p>
											</td>
										</tr>
										<tr>
											<td style="border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:32px; vertical-align:top; width:28px">
												<p style="margin-left:6px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">2</span></span></span></p>
											</td>
											<td style="border-bottom:1px solid #646464; border-left:none; border-right:1px solid gray; border-top:none; height:32px; vertical-align:top; width:292px">
												<p style="margin-left:7px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Nama Pegawai&nbsp;yang diperintahkan</span></span></span></p>
											</td>
											<td colspan="2" style="border-bottom:1px solid #646464; border-left:none; border-right:1px solid #777777; border-top:none; height:32px; vertical-align:top; width:334px">
												<p style="margin-left:4px"><strong><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">MUHAMMAD REZA</span></span></span></strong></p>
											</td>
										</tr>
										<tr>
											<td style="border-bottom:2px solid #a8a8a8; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:75px; vertical-align:top; width:28px">
												<p style="margin-left:6px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">3</span></span></span></p>
											</td>
											<td style="border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid gray; border-top:none; height:83px; vertical-align:top; width:292px">
												<ol style="list-style-type:lower-alpha">
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Pangkat/Gol.Ruang</span></span></span></p>
													</li>
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Jabatan</span></span></span></p>
													</li>
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Gaji&nbsp;Pokok</span></span></span></p>
													</li>
												</ol>
											</td>
											<td colspan="2" style="border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #777777; border-top:none; height:83px; vertical-align:top; width:334px">
												<ol style="list-style-type:lower-alpha">
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Pranata Muda, III/a</span></span></span></p>
													</li>
													<li>
														<p>&nbsp;</p>
													</li>
													<li>
														<p>&nbsp;</p>
													</li>
												</ol>

												<p style="margin-left:3px">&nbsp;</p>
											</td>
										</tr>
										<tr>
											<td style="border-bottom:2px solid #a8a8a8; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:67px; vertical-align:top; width:28px">
												<p style="margin-left:4px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">4</span></span></span></p>
											</td>
											<td style="border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid gray; border-top:none; height:67px; vertical-align:top; width:292px">
												<p style="margin-left:12px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Maksud Perjalanan Dinas</span></span></span></p>
											</td>
											<td colspan="2" style="border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #777777; border-top:none; height:67px; vertical-align:top; width:334px">
												<p style="margin-left:4px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Melaksanankan Rapat Pleno Tahunan Provinsi 2020.</span></span></span></p>
											</td>
										</tr>
										<tr>
											<td style="border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:34px; vertical-align:top; width:28px">
												<p style="margin-left:6px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">5</span></span></span></p>
											</td>
											<td style="border-bottom:1px solid #646464; border-left:none; border-right:1px solid gray; border-top:none; height:34px; vertical-align:top; width:292px">
												<p style="margin-left:6px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Alat Transportasi</span></span></span></p>
											</td>
											<td colspan="2" style="border-bottom:1px solid #646464; border-left:none; border-right:1px solid #777777; border-top:none; height:34px; vertical-align:top; width:334px">
												<p style="margin-left:4px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Mobil</span></span></span></p>
											</td>
										</tr>
										<tr>
											<td style="border-bottom:1px solid #747474; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:40px; vertical-align:top; width:28px">
												<p style="margin-left:4px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">6</span></span></span></p>
											</td>
											<td style="border-bottom:1px solid #747474; border-left:none; border-right:1px solid gray; border-top:none; height:40px; vertical-align:top; width:292px">
												<p style="margin-left:27px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">a. Tempat berangkat</span></span></span></p>

												<p style="margin-left:28px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">b.&nbsp;Tempat Tujuan</span></span></span></p>
											</td>
											<td colspan="2" style="border-bottom:1px solid #747474; border-left:none; border-right:1px solid #777777; border-top:none; height:40px; vertical-align:top; width:334px">
												<p style="margin-left:3px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">a. Banjarmasin</span></span></span></p>

												<p style="margin-left:4px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">b.&nbsp;Palangkaraya</span></span></span></p>
											</td>
										</tr>
										<tr>
											<td style="border-bottom:1px solid #838383; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:67px; vertical-align:top; width:28px">
												<p style="margin-left:6px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">7</span></span></span></p>
											</td>
											<td style="border-bottom:1px solid #838383; border-left:none; border-right:1px solid gray; border-top:none; height:67px; vertical-align:top; width:292px">
												<ol style="list-style-type:lower-alpha">
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Lama&nbsp;Perjalanan Dinas</span></span></span></p>
													</li>
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Tanggal&nbsp;berangkat</span></span></span></p>
													</li>
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Tanggal Harus Kembali</span></span></span></p>
													</li>
												</ol>
											</td>
											<td colspan="2" style="border-bottom:1px solid #838383; border-left:none; border-right:1px solid #777777; border-top:none; height:67px; vertical-align:top; width:334px">
												<ol style="list-style-type:lower-alpha">
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">3 Hari</span></span></span></p>
													</li>
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">20 Juli&nbsp;2020</span></span></span></p>
													</li>
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">23&nbsp;Juli&nbsp;2020</span></span></span></p>
													</li>
												</ol>
											</td>
										</tr>
										<tr>
											<td style="border-bottom:2px solid #a8a8a8; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:68px; vertical-align:top; width:28px">
												<p style="margin-left:4px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">8</span></span></span></p>
											</td>
											<td style="border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid gray; border-top:none; height:68px; vertical-align:top; width:292px">
												<p style="margin-left:7px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Pengikut:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama</span></span></span></p>

												<p style="margin-left:7px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">1.</span></span></span></p>

												<p style="margin-left:7px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">2.</span></span></span></p>

												<p style="margin-left:7px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">3.</span></span></span></p>
											</td>
											<td style="border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #909090; border-top:none; height:68px; vertical-align:top; width:128px">
												<p style="margin-left:1px; text-align:center"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Umur</span></span></span></p>
											</td>
											<td style="border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #777777; border-top:none; height:68px; vertical-align:top; width:206px">
												<p style="margin-left:7px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Keterangan</span></span></span></p>
											</td>
										</tr>
										<tr>
											<td style="border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:83px; vertical-align:top; width:28px">
												<p style="margin-left:4px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">9</span></span></span></p>
											</td>
											<td style="border-bottom:1px solid #646464; border-left:none; border-right:1px solid gray; border-top:none; height:83px; vertical-align:top; width:292px">
												<p style="margin-left:7px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Pembebanan Anggaran :</span></span></span></p>

												<ol style="list-style-type:lower-alpha">
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">lnstansi:</span></span></span></p>
													</li>
													<li>
														<p><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Mata anggaran</span></span></span></p>
													</li>
												</ol>
											</td>
											<td colspan="2" style="border-bottom:1px solid #646464; border-left:none; border-right:1px solid #777777; border-top:none; height:83px; vertical-align:top; width:334px">
												<p>&nbsp;</p>

												<p style="margin-left:27px; margin-right:150px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">a. Pemerintah Kota</span></span></span></p>

												<p style="margin-left:27px; margin-right:150px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">b.</span></span></span></p>
											</td>
										</tr>
										<tr>
											<td style="border-bottom:1px solid #545454; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:32px; vertical-align:top; width:28px">
												<p style="margin-left:6px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">10</span></span></span></p>
											</td>
											<td style="border-bottom:1px solid #545454; border-left:none; border-right:1px solid gray; border-top:none; height:32px; vertical-align:top; width:292px">
												<p style="margin-left:7px"><span style="font-size:16px"><span style="color:#000000"><span style="font-family:Times New Roman,Times,serif">Keterangan lain-lain</span></span></span></p>
											</td>
											<td colspan="2" style="border-bottom:1px solid #545454; border-left:none; border-right:1px solid #777777; border-top:none; height:32px; vertical-align:top; width:334px">
												<p>&nbsp;</p>
											</td>
										</tr>
									</tbody>
								</table>

							</textarea>
						</div>
						<div class="form-group col-md-12" hidden="">
							<label><strong>Sifat :</strong></label>
							<input type="text" class="form-control" name="sifat" value="Surat Perjalanan Dinas" readonly="">
						</div>
						<br>
						<button type="submit" name="submit" class="btn btn-primary btn-sm">simpan</button>
					</form>
				</div>
			</div>



			<?php 
			include_once '../assets/footer.php';  
			?>

			<script>
				CKEDITOR.replace( 'editor1' );

				CKEDITOR.replace( 'editor2' );
			</script>