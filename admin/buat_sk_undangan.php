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
					<div><h3>Buat Surat Undangan</h3>
						<div class="page-title-subheading">
							<nav class="" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="surat_keluar.php">Surat Keluar</a></li>
									<li class="active breadcrumb-item" aria-current="page">Undangan</li>
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
							<input type="text" class="form-control" name="no_surat" readonly=""  value="<?php echo $noSurat ?>" >
						</div>
						<div class="form-group col-md-12">
							<label><strong>Perihal :</strong></label>
							<input type="text" class="form-control" name="perihal" required="" autofocus="" value="Surat Undangan ">
						</div>
						<div class="form-group col-md-12">
							<label><strong>Penerima Surat :</strong></label>
							<textarea name="penerima" class="form-control" id="editor1">
								<ol>
									<li>&nbsp;</li>
									<li>&nbsp;</li>
									<li>&nbsp;</li>
								</ol>
							</textarea>
						</div>
						<div class="form-group col-md-12">
							<label><strong>Isi Surat :</strong></label>
							<textarea name="isi" id="editor2" class="form-control">
								<p style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px">Menindaklanjuti rencana dan kegasama pembangunan Pusat Daur Ulang (PDU) di Kota Banjarmasin dengan EKONID Tahun 2020 yang dirancanakan akan melaksanakan pertemuan dengan Walikota Banjarmasin pada tanggal 20 Juli&nbsp;2020.</span></span></p>

								<p style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px">Adapun lokasi yang diusulkan adalah pada kelurahan Sungai Andai seberang Soto Bang Amat tempat penumpukan enceng gondok dań hasil pembersihan sungai. Berkenaan dengan hal tersebut di atas maka perlu dilaksanakan Rapat Koordinasi dan Visitasi lokasi PDU dimaksud pada :</span></span></p>

								<p style="margin-left:40px; text-align:justify"><strong><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px">Hari/Tanggal&nbsp;&nbsp; &nbsp;: Selasa, 25&nbsp;Juli 2020 Pukul&nbsp;09.00 Wita s/d selesai<br />
								Tempat&nbsp;&nbsp; &nbsp;: Barenlitbangda Kota Banjarmasin Gedung C Lt 3. JI. RE. Martadinata No 1</span></span></strong></p>

								<p style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px">Sehubungan dengan hal tersebut di atas dimohonkan agar dapat menugaskan pejabat pada masing-masing SKPD.<br />
								Demikian disampaikan, atas perhatian dan kehadirannya diucapkan terima kasih.</span></span></p>

							</textarea>
						</div>
						<div class="form-group col-md-12" hidden="">
							<label><strong>Sifat :</strong></label>
							<input type="text" class="form-control" name="sifat" value="Surat Undangan" readonly="">
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