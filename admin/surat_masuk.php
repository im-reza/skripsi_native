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
          <div class="d-inline-block dropdown">
            <button type="button" data-target="#tambah_modal_sm" data-toggle="modal"  class="btn-shadow dropdown-toggle btn btn-success">
              <span class="btn-icon-wrapper pr-2 opacity-7">
                <i class="fas fa-pencil-alt fa-w-20"></i>
              </span>
              Add
            </button>
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

        <h5 class="card-title">
          <div class="search-wrapper">
            <div class="input-holder">
              <input type="text" class="search-input" id="cari_sm" placeholder="Type to search">
              <button class="search-icon"><span></span></button>
            </div>
            <button class="close"></button>
          </div>
        </h5>


        <!-- tabel surat masuk load data dengan ajax -->
        <div class="table-responsive table-bordered table-hover" id="data_table">

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
            <a class="btn btn-danger btn-sm btn-ok">Ya, Hapus !</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- tutup modal hapus -->

  <!-- modal tambah data surat masuk -->
  <div class="modal bd-example-modal-lg" id="tambah_modal_sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
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
              <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="Nomor Berkas..." required>
            </div>
            <div class="form-group col-md-6">
              <label><strong>Tanggal di surat :</strong></label>
              <input type="date" class="date form-control" name="tgl_surat" id="tgl_surat" value="<?php echo date('Y-m-d') ?>" required="">
            </div>
          </div>
          <div class="form-group">
            <label><strong>Pengirim :</strong></label>
            <input type="text"class="form-control" name="pengirim" id="pengirim" placeholder="Pengirim..." required>
          </div>
          <div class="form-group">
            <label><strong>Perihal surat :</strong></label>
            <input type="text"class="form-control" name="perihal" id="perihal" placeholder="Perihal..." required>
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
</div></div>
<!-- end modal tambah data surat masuk -->


<!-- modal edit data surat masuk -->
<div class="modal fade bd-example-modal-lg" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Surat :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="actions/aksi_edit_sm.php" enctype="multipart/form-data">
          <div class="form-row">
            <input type="text" class="form-control" name="id_sm_edt" id="id_sm" hidden="">
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
        $('#id_sm').val(data.id_sm);
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