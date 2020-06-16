<?php include_once '../assets/header.php'; ?>
<div class="app-main__outer ">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="fas fa-envelope-open-text icon-gradient bg-mean-fruit">
            </i>
          </div>
          <div>Table surat masuk
            <div class="page-title-subheading">
              <nav class="" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="active breadcrumb-item" aria-current="page">Surat Masuk</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <a href="#" data-target="#lap_modal_sm" data-toggle="modal">
            <button class="btn btn-primary">Cetak</button>
          </a>
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
                  <a href='#' data-target="#tambah_modal_sm_pemberitahuan" data-toggle="modal" class="nav-link">
                    <i class="nav-link-icon lnr-inbox"></i>
                    <span>
                      Surat Pemberitahuan
                    </span>
                    <div class="ml-auto badge badge-pill badge-success"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href='#' data-target="#tambah_modal_sm_undangan" data-toggle="modal" class="nav-link">
                    <i class="nav-link-icon lnr-book"></i>
                    <span>
                      Surat Undangan
                    </span>
                    <div class="ml-auto badge badge-pill badge-success"></div>
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
        }elseif (isset($_SESSION['size_format'])) {
          echo "".$_SESSION['size_format']."";
        }elseif (isset($_SESSION['size_big'])) {
          echo "".$_SESSION['size_big']."";
        }elseif (isset($_SESSION['duplicate'])) {
          echo "".$_SESSION['duplicate']."";
        }elseif (isset($_SESSION['success_delete'])) {
          echo "".$_SESSION['success_delete']."";
        }elseif (isset($_SESSION['error_delete'])) {
          echo "".$_SESSION['error_delete']."";
        }elseif (isset($_SESSION['success_edit'])) {
          echo "".$_SESSION['success_edit']."";
        }elseif (isset($_SESSION['failed_edit'])) {
          echo "".$_SESSION['failed_edit']."";
        }
        unset($_SESSION['success']);
        unset($_SESSION['failed']);
        unset($_SESSION['size_format']);
        unset($_SESSION['size_big']);
        unset($_SESSION['duplicate']);
        unset($_SESSION['success_delete']);
        unset($_SESSION['error_delete']);
        unset($_SESSION['success_edit']);
        unset($_SESSION['failed_edit']);
        ?>
        <div class="row">
          <div class="col-md-6">
            <h5 class="card-title">
              <div class="search-wrapper">
                <div class="input-holder">
                  <input type="text" class="search-input" id="cari_sm" placeholder="Type to search">
                  <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
              </div>
            </h5>
          </div>
        </div>


        <!-- tabel surat masuk load data dengan ajax -->
        <div id="data_table">

        </div>
        <!-- tutup table -->

      </div>
    </div>


    <?php 
    include_once '../assets/footer.php';  
    ?>
    <!-- modal hapus -->
    <div class="modal bd-example-modal-lg" id="delete_modal_sm" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Perhatian !!!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah anda benar ingin menghapus Data surat Masuk ini ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a class="btn btn-danger btn-ok">Ya, Hapus !</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- tutup modal hapus -->

  <!-- modal tambah data surat masuk -->
  <div class="modal bd-example-modal-lg" id="tambah_modal_sm_pemberitahuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Surat :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="actions/aksi_tambah_sm.php" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label><strong>Nomor Surat :</strong></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                </div>
                <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="Nomor Berkas..." required>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label><strong>Tanggal di surat :</strong></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                </div>
                <input type="date" class="date form-control" name="tgl_surat" id="tgl_surat" value="<?php echo date('Y-m-d') ?>" required="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label><strong>Pengirim :</strong></label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
              </div>
              <input type="text"class="form-control" name="pengirim" id="pengirim" placeholder="Pengirim..." required>
            </div>
          </div>
          <div class="form-group">
            <label><strong>Perihal surat :</strong></label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-info"></i></span>
              </div>
              <input type="text"class="form-control" name="perihal" id="perihal" placeholder="Perihal..." required>
            </div>
          </div>
          <div class="form-group col-md-6" hidden="">
            <input type="text" class="form-control" name="type_surat" id="type_surat" value="pemberitahuan" required="">
          </div>
          <div class="form-group">
            <label><strong>Opload File</strong></label>
            <input type="file"class="form-control-file" name="file" id="file" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div> 
</div>
</div>
</div>
<!-- end modal tambah data surat masuk -->
<div class="modal bd-example-modal-lg" id="tambah_modal_sm_undangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Tambah Surat Undangan :</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form method="POST" action="actions/aksi_tambah_acara.php" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label><strong>Nomor Surat Undangan :</strong></label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
              </div>
              <input type="text" class="form-control" name="no_surat" id="no_surat_u" placeholder="Nomor Berkas..." required>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label><strong>Tanggal di surat :</strong></label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
              </div>
              <input type="date" class="date form-control" name="tgl_surat" id="tgl_surat_u" value="<?php echo date('Y-m-d') ?>" required="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label><strong>Pengirim Undangan :</strong></label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-address-card"></i></span>
            </div>
            <input type="text"class="form-control" name="pengirim" id="pengirim_u" placeholder="Pengirim..." required>
          </div>
        </div>
        <div class="form-group">
          <label><strong>Perihal Undangan :</strong></label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-info"></i></span>
            </div>
            <input type="text"class="form-control" name="perihal" id="perihal_u" placeholder="Perihal..." required>
          </div>
        </div>
        <label><strong>Acara :</strong></label>
        <div class="form-group">
          <label><strong>Tempat :</strong></label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            <input type="text"class="form-control" name="tempat" id="tempat_u" placeholder="Tempat..." required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label><strong>Mulai :</strong></label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input type="datetime-local" class="form-control" name="start_event" id="start_u" required>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label><strong>Sampai :</strong></label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input type="datetime-local" class="date form-control" name="end_event" id="end_u" required="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label><strong>Opload File Undangan :</strong></label>
          <input type="file"class="form-control-file" name="file" id="file_u" required>
        </div>
      </div>
      <div class="form-group col-md-6" hidden="">
        <input type="text" class="form-control" name="type_surat" id="type_surat_u" value="undangan" required="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
      </form>
    </div>
  </div>
</div>
</div> 
</div>
</div>
</div>

<!-- modal edit data surat masuk -->
<div class="modal fade bd-example-modal-lg" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Surat Pemberitahuan :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="actions/aksi_edit_sm.php" enctype="multipart/form-data">
          <div class="form-row">
            <input type="text" class="form-control" name="id_sm_edt" id="id_sm_edt" hidden="">
            <div class="form-group col-md-6">
              <label><strong>Nomor Surat :</strong></label>
              <input type="text" class="form-control" name="no_surat_edt" id="no_surat_edt" readonly="">
            </div>
            <div class="form-group col-md-6">
              <label><strong>Tanggal di surat :</strong></label>
              <input type="date" class="date form-control" name="tgl_surat_edt" id="tgl_surat_edt" value="<?php echo date('Y-m-d') ?>" required="">
            </div>
          </div>
          <div class="form-group">
            <label><strong>Pengirim :</strong></label>
            <input type="text"class="form-control" name="pengirim_edt" id="pengirim_edt" required>
          </div>
          <div class="form-group">
            <label><strong>Perihal surat :</strong></label>
            <input type="text"class="form-control" name="perihal_edt" id="perihal_edt" required>
          </div>
          <div class="form-group col-md-6" hidden="">
            <input type="text" class="form-control" name="type_surat_edt" value="pemberitahuan" required="">
          </div>
          File Lama : <label name="file_lama_edt" id="file_lama_edt"></label>
          <div class="form-group">
            <label><strong>Atau Upload ulang File (PDF/JPG) :</strong></label>
            <input type="file"class="form-control-file" name="file_edt" id="file_edt">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="submit" class="btn btn-info">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div> 
<!-- end modal edit -->
<div class="modal fade bd-example-modal-lg" id="edit_modal_u" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Surat Undangan :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="actions/aksi_edit_acara.php" enctype="multipart/form-data">
          <div class="form-row">
            <input type="text" class="form-control" name="id_sm_edt" id="id_sm_u" hidden="">
            <div class="form-group col-md-6">
              <label><strong>Nomor Surat :</strong></label>
              <input type="text" class="form-control" name="no_surat_edt" id="no_surat_edt_u" readonly="">
            </div>
            <div class="form-group col-md-6">
              <label><strong>Tanggal di surat :</strong></label>
              <input type="date" class="date form-control" name="tgl_surat_edt" id="tgl_surat_edt_u" required="">
            </div>
            <div class="form-group col-md-6">
              <label><strong>Pengirim Undangan :</strong></label>
              <input type="text"class="form-control" name="pengirim_edt" id="pengirim_u_edt" placeholder="Pengirim..." required>
            </div>
            <div class="form-group col-md-6">
              <label><strong>Perihal Undangan :</strong></label>
              <input type="text"class="form-control" name="perihal_edt" id="perihal_u_edt" placeholder="Perihal..." required>
            </div>
          </div>
          <label><strong>Acara :</strong></label>
          <div class="form-group">
            <label><strong>Tempat :</strong></label>
            <input type="text"class="form-control" name="tempat_edt" id="tempat_u_edt" placeholder="Tempat..." required>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label><strong>Mulai :</strong></label>
              <input type="datetime-local" class="form-control" name="start_event_edt" id="start_u_edt" required>
            </div>
            <div class="form-group col-md-6">
              <label><strong>Sampai :</strong></label>
              <input type="datetime-local" class="date form-control" name="end_event_edt" id="end_u_edt" required="">
            </div>
          </div>
          <div class="form-group col-md-6" hidden="">
            <input type="text" class="form-control" name="type_surat_edt" value="undangan" required="">
          </div>
          File Lama : <label name="file_lama_edt" id="file_lama_edt_u"></label>
          <div class="form-group">
            <label><strong>Atau Upload ulang File (PDF/JPG) :</strong></label>
            <input type="file"class="form-control-file" name="file_edt" id="file_u_edt">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="submit" class="btn btn-info">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div> 

<div class="modal fade bd-example-modal-lg" id="show_modal_sm" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Disposisi :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form action="laporan/lap_data_ds.php" method="GET" target="_blank">
          <div class="form-row" >
            <div class="form-group col-md-12">
             <center><label><strong>Nomor Surat :</strong></label></center>
             <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
              </div>
              <input type="text" class="form-control" name="no_surat_show" id="no_surat_show" readonly="" style="text-align: center;">
            </div>
          </div>
          <div class="form-group col-md-6">
           <center><label><strong>Pengirim :</strong></label></center>
           <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-address-card"></i></span>
            </div>
            <input type="text" class="form-control" id="pengirim_show" readonly="" style="text-align: center;">
          </div>
        </div>
        <div class="form-group col-md-6">
         <center><label><strong>Perihal :</strong></label></center>
         <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-info"></i></span>
          </div>
          <input type="text" class="form-control" id="perihal_show" readonly="" style="text-align: center;">
        </div>
      </div>
      <div class="form-group col-md-4">
        <center><label><strong>Tanggal Surat :</strong></label></center>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
          </div>
          <input type="text" class="form-control" id="tgl_surat_show" readonly="" style="text-align: center;">
        </div>
      </div>
      <div class="form-group col-md-4">
        <center><label><strong>Tanggal Masuk :</strong></label></center>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
          </div>
          <input type="text" class="form-control" id="tgl_masuk_show" readonly="" style="text-align: center;">
        </div>
      </div>
      <div class="form-group col-md-4">
        <center><label><strong>Tanggal Verifikasi :</strong></label></center>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
          </div>
          <input type="text" class="form-control" id="tgl_verif_show" readonly="" style="text-align: center;">
        </div>
      </div>
      <div class="form-group col-md-12">
        <center><label><strong>Penerima :</strong></label></center>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-users"></i></span>
          </div>
          <input type="text" class="form-control" id="penerima_show" readonly="" style="text-align: center;">
        </div>
      </div>
      <div class="form-group col-md-12">
        <center><label><strong>Catatan :</strong></label></center>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
          </div>
          <textarea class="form-control" id="catatan_show" readonly="" style="text-align: center;"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-success">Cetak</button>
  </div>
</form>
</div>
</div>
</div>

<!-- load tabel sm -->
<script>
  $(document).ready(function(){
    load_data();
    function load_data(page){
      $.ajax({
        url:"table/data_sm.php",
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
<!-- tutup load -->



<script>
  $(document).on('click','.btn_show',function(){
    var no=$(this).attr("id");
    $.ajax({
      url:"table/show_ds_sm.php",
      method:"POST",
      data:{
        no:no
      },
      dataType:"json",
      success:function(data){
        $('#no_surat_show').val(data.no_surat);
        $('#pengirim_show').val(data.pengirim);
        $('#perihal_show').val(data.perihal);
        $('#tgl_surat_show').val(data.tgl_surat);
        $('#tgl_masuk_show').val(data.tgl_masuk);
        $('#tgl_verif_show').val(data.tgl);
        $('#penerima_show').val(data.penerima);
        $('#catatan_show').val(data.catatan);
        $('#show_modal_sm').modal('show');
      }
    });
  });
</script>

<!-- script cari data untuk di edit -->
<script>
  $(document).on('click','.btn_edit',function(){
    var no=$(this).attr("id");
    $.ajax({
      url:"edit_sm.php",
      method:"POST",
      data:{
        no:no
      },
      dataType:"json",
      success:function(data){
        $('#id_sm_edt').val(data.id_sm);
        $('#no_surat_edt').val(data.no_surat);
        $('#tgl_surat_edt').val(data.tgl_surat);
        $('#pengirim_edt').val(data.pengirim);
        $('#perihal_edt').val(data.perihal);
        $('#file_lama_edt').text(data.nama_file);
        $('#edit_modal').modal('show');
      }
    });
  });
</script>
<!-- tutup script cari data untuk di edit -->

<script>
  $(document).on('click','.btn_edit_u',function(){
    var nos=$(this).attr("id");
    $.ajax({
      url:"edit_sm_u.php",
      method:"POST",
      data:{
        no:nos
      },
      dataType:"json",
      success:function(data){
        $('#id_sm_u').val(data.id_sm);
        $('#no_surat_edt_u').val(data.no_surat);
        $('#tgl_surat_edt_u').val(data.tgl_surat);
        $('#pengirim_u_edt').val(data.pengirim);
        $('#perihal_u_edt').val(data.perihal);
        $('#tempat_u_edt').val(data.tempat);
        $('#file_lama_edt_u').text(data.nama_file);
        $('#edit_modal_u').modal('show');
        console.log(data);
      }
    });
  });
</script>

<!-- script hapus -->
<script>
  $('#delete_modal_sm').on('show.bs.modal',function(e){
    $(this).find('.btn-ok').attr('href',$(e.relatedTarget).data('href'));;
  });
</script>
<!-- tutup script hapus -->


<!-- script cari data -->
<script>
  $(document).ready(function(){
    $('#cari_sm').on('keyup',function(){
      $.ajax({
        type:'POST',
        url:'table/search_sm.php',
        data:{
          cari_sm:$(this).val()
        },
        cache:false,
        success:function(data){
          $('#data_table').html(data);
        }
      });
    });
  });
</script>
<!-- tutup cari data -->