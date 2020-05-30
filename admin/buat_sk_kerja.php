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
					<div><h3>Buat Surat Perintah Kerja</h3>
						<div class="page-title-subheading">
							<nav class="" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="surat_keluar.php">Surat Keluar</a></li>
									<li class="active breadcrumb-item" aria-current="page">Surat Perintah Kerja</li>
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
							<input type="text" class="form-control" name="perihal" autofocus="" required="" value="Surat Perintah Kerja ">
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
								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">Dasar :&nbsp; Sehubungan dengan Surat Badan Keuangan da Aset Daerah Nomor : 005/392/BAKEUDA-III/2020 Tanggal 02 Mei 2020, </span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">Perihal : Monitoring Aplikasi Palui Online. Maka dengan ini Kepala Bagian Pemerintahan Sekretariat Daerah Kota Banjarmasin :</span></span></p>

								<p>&nbsp;</p>

								<p style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px"><strong>MENUGASKAN :</strong></span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">Kepada :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Muhammad Reza</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 16630460</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Pangkat/Gol. Ruang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : -</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Teknisi Jaringan</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Abdurrahman Siddiq</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 122222</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Pangkat/Gol. Ruang&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;: -</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;: Programer</span></span></p>

								<p>&nbsp;</p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">Untuk :&nbsp;&nbsp;&nbsp;1. Menghadiri acara dimaksud, yang akan dilaksanakan pada :</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Senin</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tanggal&nbsp;&nbsp;&nbsp;&nbsp; : 20 Juli 2020</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tempat &nbsp;&nbsp;&nbsp; &nbsp;: Kantor Badan Keuangan dan Aset Daerah</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2. Mempersiapkan bahan-bahan yang diperlukan untuk hal dimaksud.</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3. Berangkat pada tanggal 20&nbsp;Juli&nbsp;2020, tanggal harus kembali 20&nbsp;Juli&nbsp;2020</span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4. Melaporkan hasil pelaksanaan tugas kepada Kepala Bagian Pemerintahan Sekretariat Daerah Kota Banjarmasin. </span></span><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">&nbsp; </span></span></p>

								<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:16px">Demikian Surat Perintah Tugas ini diperbuat, untuk dapat dilaksanakan dengan penuh tanggung jawab.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>
							</textarea>
						</div>
						<div class="form-group col-md-12" hidden="">
							<label><strong>Sifat :</strong></label>
							<input type="text" class="form-control" name="sifat" value="Surat Perintah Kerja" readonly="">
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