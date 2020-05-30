<?php include_once '../assets/header.php';
$surat_undangan=mysqli_query($con,"SELECT COUNT(*) AS undangan FROM surat_keluar where sifat='Surat Undangan'");
$t_undangan=mysqli_fetch_array($surat_undangan);
$surat_cuti=mysqli_query($con,"SELECT COUNT(*) AS cuti FROM surat_keluar where sifat='Surat Permohonan Cuti'");
$t_cuti=mysqli_fetch_array($surat_cuti);
$surat_kerja=mysqli_query($con,"SELECT COUNT(*) AS kerja FROM surat_keluar where sifat='Surat Perintah Kerja'");
$t_kerja=mysqli_fetch_array($surat_kerja);
$surat_dinas=mysqli_query($con,"SELECT COUNT(*) AS dinas FROM surat_keluar where sifat='Surat Perjalanan Dinas'");
$t_dinas=mysqli_fetch_array($surat_dinas);
$surat_biasa=mysqli_query($con,"SELECT COUNT(*) AS biasa FROM surat_keluar where sifat='Surat Biasa'");
$t_biasa=mysqli_fetch_array($surat_biasa);
?>
<div class="app-main__outer ">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="fas fa-pencil-alt icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Tabel surat keluar
						<div class="page-title-subheading">
							<nav class="" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="active breadcrumb-item" aria-current="page">Surat Keluar</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="page-title-actions">
					<div class="d-inline-block dropdown">
						<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-success">
							<span class="btn-icon-wrapper pr-2 opacity-7">
								<i class="fas fa-pencil-alt fa-w-20"></i>
							</span>
							Add
						</button>
						<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a href="buat_sk_undangan.php" class="nav-link">
										<i class="nav-link-icon lnr-inbox"></i>
										<span>
											Surat Undangan
										</span>
										<div class="ml-auto badge badge-pill badge-success"><?php echo $t_undangan['undangan']; ?></div>
									</a>
								</li>
								<li class="nav-item">
									<a href="buat_sk_cuti.php" class="nav-link">
										<i class="nav-link-icon lnr-book"></i>
										<span>
											Surat Permohonan Cuti
										</span>
										<div class="ml-auto badge badge-pill badge-success"><?php echo $t_cuti['cuti']; ?></div>
									</a>
								</li>
								<li class="nav-item">
									<a href="buat_sk_kerja.php" class="nav-link">
										<i class="nav-link-icon lnr-book"></i>
										<span>
											Surat Perintah Kerja
										</span>
										<div class="ml-auto badge badge-pill badge-success"><?php echo $t_kerja['kerja']; ?></div>
									</a>
								</li>
								<li class="nav-item">
									<a href="buat_sk_dinas.php" class="nav-link">
										<i class="nav-link-icon lnr-book"></i>
										<span>
											Surat Perjalanan Dinas
										</span>
										<div class="ml-auto badge badge-pill badge-success"><?php echo $t_dinas['dinas']; ?></div>
									</a>
								</li>
								<li class="nav-item">
									<a href="buat_sk_biasa.php" class="nav-link">
										<i class="nav-link-icon lnr-book"></i>
										<span>
											Surat Biasa
										</span>
										<div class="ml-auto badge badge-pill badge-success"><?php echo $t_biasa['biasa']; ?></div>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> 

		<div class="main-card mb-3 card">
			<div class="card-body">

				<?php if (isset($_SESSION['success'])) {
					echo "".$_SESSION['success']."";
				}elseif (isset($_SESSION['failed'])) {
					echo "".$_SESSION['failed']."";
				}elseif (isset($_SESSION['success_edit'])) {
					echo "".$_SESSION['success_edit']."";
				}elseif (isset($_SESSION['error_edit'])) {
					echo "".$_SESSION['error_edit']."";
				}elseif (isset($_SESSION['success_delete'])) {
					echo "".$_SESSION['success_delete']."";
				}elseif (isset($_SESSION['error_delete'])) {
					echo "".$_SESSION['error_delete']."";
				}
				unset($_SESSION['success']);
				unset($_SESSION['failed']);
				unset($_SESSION['success_edit']);
				unset($_SESSION['error_edit']);
				unset($_SESSION['success_delete']);
				unset($_SESSION['error_delete']);
				?>

				<h5 class="card-title">
					<div class="search-wrapper">
						<div class="input-holder">
							<input type="text" class="search-input" id="cari_sk" placeholder="Type to search">
							<button class="search-icon"><span></span></button>
						</div>
						<button class="close"></button>
					</div>
				</h5>

				<!-- tabel surat keluar load data dengan ajax -->
				<div class="table-responsive table-bordered table-hover" id="data_table">
					
				</div>
				<!-- tutup table -->


			</div>
		</div>


		<?php 
		include_once '../assets/footer.php';  
		?>


		<div class="modal fade bd-example-modal-lg" id="delete_modal" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Perhatian !!!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h5>Apakah anda benar ingin menghapus Data surat keluar ini ? </p></h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<a class="btn btn-danger btn-sm btn-ok">Ya, Hapus !</a>
					</div>
				</div>
			</div>
		</div>

		<script>
			$(document).ready(function(){
				$('#cari_sk').on('keyup',function(){
					$.ajax({
						type:'POST',
						url:'table/search_sk.php',
						data:{
							cari_sk:$(this).val()
						},
						cache:false,
						success:function(data){
							$('#data_table').html(data);
						}
					});
				});
			});
		</script>

		<script>
			$('#delete_modal').on('show.bs.modal',function(e){
				$(this).find('.btn-ok').attr('href',$(e.relatedTarget).data('href'));;
			});
		</script>

		<script>
			$(document).ready(function(){
				load_data();
				function load_data(page){
					$.ajax({
						url:"table/data_sk.php",
						method:"POST",
						data:{page:page},
						success:function(data){
							$('#data_table').html(data);
						}
					})
				}
				$(document).on('click', '.halaman', function(){
					var page = $(this).attr("id");
					load_data(page);
				});
			});
		</script>

