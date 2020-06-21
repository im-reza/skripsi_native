 


</div>
</div>
</div>
</div>

<!-- START FOOTER -->
<div class="app-wrapper-footer">
	<div class="app-footer">
		<div class="app-footer__inner">
			<div class="app-footer-right">
				<ul class="nav">
					<li class="nav-item" style="font-size: 12px;">
						<i class="far fa-copyright"></i> copyright  2020 | built <i class="fas fa-heart"></i> by. Reza. All right reserved.
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script src="../assets/jquery/dist/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<script src='../assets/fullcalendar/packages/core/main.js'></script>
<script src='../assets/fullcalendar/packages/interaction/main.js'></script>
<script src='../assets/fullcalendar/packages/daygrid/main.js'></script>
<script src='../assets/fullcalendar/packages/timegrid/main.js'></script>
<script src="../assets/scripts/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>



</body>

</html>

<script>
	$(function () {
		var url = window.location.pathname,
		urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");  
		$('a').each(function () {
			if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
				$(this).addClass('mm-active');
			}
		});
	});
</script>


<script>
	$(document).ready(function(){
		$('.modal').on('show.bs.modal', function (e) {
			$('.modal .modal-dialog').attr('class', 'modal-dialog modal-lg animate__bounceInRight animated');
		})
	});
</script>

<script>
	$(function() {
		$("#nomor_s").autocomplete({
			source: 'actions/autocomplete.php'
		});
	});
</script>

<div class="modal fade bd-example-modal-lg" id="search_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Cari/Lacak Surat Masuk:</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="GET" action="track.php">
					<div class="form-row">
						<div class="form-group col-md-12">
							<label><strong>Nomor Surat :</strong></label>
							<input type="text" class="form-control" name="nomor_s" id="nomor_s" placeholder="Nomor Berkas..." required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" name="submit" class="btn btn-success">Lanjut</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="modal fade bd-example" id="lap_modal_sm" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Melakukan Cetak Data Surat Masuk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="laporan/lap_sm.php" method="GET" target="_blank">
					<div class="form-row">
						<div class="form-group col-md-12">
							<label><strong>Dari Tanggal :</strong></label>
							<input type="date" class="date form-control" name="tgl_awal" required="">
						</div>
						<div class="form-group col-md-12">
							<label><strong>Sampai Tanggal :</strong></label>
							<input type="date" class="date form-control" name="tgl_akhir" value="<?php echo date('Y-m-d') ?>" required="">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Cetak</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade bd-example" id="lap_modal_sk" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Melakukan Cetak Data Surat keluar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="laporan/lap_sk.php" method="GET" target="_blank">
					<div class="form-row">
						<div class="form-group col-md-12">
							<label><strong>Dari Tanggal :</strong></label>
							<input type="date" class="date form-control" name="tgl_awal" required="">
						</div>
						<div class="form-group col-md-12">
							<label><strong>Sampai Tanggal :</strong></label>
							<input type="date" class="date form-control" name="tgl_akhir" value="<?php echo date('Y-m-d') ?>" required="">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Cetak</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade bd-example" id="lap_modal_ds" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Melakukan Cetak Data Surat Disposisi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="laporan/lap_ds.php" method="GET" target="_blank">
					<div class="form-row">
						<div class="form-group col-md-12">
							<label><strong>Dari Tanggal :</strong></label>
							<input type="date" class="date form-control" name="tgl_awal" required="">
						</div>
						<div class="form-group col-md-12">
							<label><strong>Sampai Tanggal :</strong></label>
							<input type="date" class="date form-control" name="tgl_akhir" value="<?php echo date('Y-m-d') ?>" required="">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Cetak</button>
				</div>
			</form>
		</div>
	</div>
</div>
