<?php include_once '../assets/header.php'; ?>

<div class="app-main__outer ">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="fas fa-edit icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div><h3>Edit Surat</h3>
						<div class="page-title-subheading">
							Melakukan Edit Surat Keluar
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
		$id=$_GET['id'];
		$data=mysqli_query($con,"select * from surat_keluar where no_surat='$id'");
		while ($d=mysqli_fetch_array($data)) {
			?>
			<div class="main-card mb-3 card">
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-6">
							<form method="POST" action="actions/aksi_edit_sk.php">
								<label><strong>Pembuat :</strong></label>
								<input type="text" class="form-control" name="pembuat" readonly="" value="<?php echo $_SESSION['name']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label><strong>No Surat :</strong></label>
								<input type="text" class="form-control" name="no_surat" readonly=""  value="<?php echo $d['no_surat']; ?>">
							</div>
							<div class="form-group col-md-12">
								<label><strong>Perihal :</strong></label>
								<input type="text" class="form-control" name="perihal" autofocus="" required="" value="<?php echo $d['perihal'] ?>">
							</div>
							<div class="form-group col-md-12">
								<label><strong>Penerima Surat :</strong></label>
								<textarea name="penerima" class="form-control" id="editor1" required=""><?php echo $d['penerima']; ?></textarea>
							</div>
							<div class="form-group col-md-12">
								<label><strong>Isi Surat :</strong></label>
								<textarea name="isi" id="editor2" class="form-control" required=""><?php echo $d['isi']; ?></textarea>
							</div>
							<div class="form-group col-md-12" hidden="">
								<label><strong>Sifat :</strong></label>
								<input type="text" class="form-control" name="sifat" value="<?php echo $d['sifat']; ?>" readonly="">
							</div>
							<br>
							<button type="submit" name="submit" class="btn btn-primary btn-sm">Edit</button>
						</form>
					</div>
				</div>

			<?php } ?>

			<?php 
			include_once '../assets/footer.php';  
			?>

			<script>
				CKEDITOR.replace( 'editor1' );

				CKEDITOR.replace( 'editor2' );
			</script>