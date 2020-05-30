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
					<div><h3>Buat Surat dengan format sendiri</h3>
						<div class="page-title-subheading">
							<nav class="" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="surat_keluar.php">Surat Keluar</a></li>
									<li class="active breadcrumb-item" aria-current="page">Format Sendiri</li>
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
							<input type="text" class="form-control" name="perihal" autofocus="" required="" value="Surat  ">
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
							<textarea name="isi" id="editor2" class="form-control">Isi Text
							</textarea>
						</div>
						<div class="form-group col-md-12" hidden="">
							<label><strong>Sifat :</strong></label>
							<input type="text" class="form-control" name="sifat" value="Surat Biasa" readonly="">
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