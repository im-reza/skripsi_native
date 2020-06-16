<?php include_once '../assets/header.php'; ?>
<div class="app-main__outer ">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="far fa-paper-plane icon-gradient bg-mean-fruit">
            </i>
          </div>
          <div>Table Disposisi terverifikasi
            <div class="page-title-subheading">
             <nav class="" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="surat_masuk.php">Surat Masuk</a></li>
                <li class="active breadcrumb-item" aria-current="page">Disposisi</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <div class="page-title-actions">
        <div class="d-inline-block dropdown">
         <a href="#" data-target="#lap_modal_ds" data-toggle="modal">
          <button class="btn btn-primary">Cetak</button>
        </a>
      </div>
    </div>

  </div>
</div>           

<div class="main-card mb-3 card">
  <div class="card-body">

    <?php if (isset($_SESSION['success'])) {
      echo "".$_SESSION['success']."";
    }elseif (isset($_SESSION['failed'])) {
      echo "".$_SESSION['size_failed']."";
    }
    unset($_SESSION['success']);
    unset($_SESSION['failed']);

    ?>

    <h5 class="card-title">
      <div class="search-wrapper">
        <div class="input-holder">
          <input type="text" class="search-input" id="cari_ds" placeholder="Type to search">
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
<div class="modal fade bd-example-modal-lg" id="delete_modal_sm" aria-hidden="true">
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
<!-- tutup modal hapus -->

<div class="modal fade bd-example-modal-lg" id="edit_ds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Disposisi :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="actions/aksi_edit_ds.php" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label><strong>Nomor Surat :</strong></label>
              <input type="text" class="form-control" name="no_surat" id="no_surat" readonly="">
            </div>
            <div class="form-group col-md-4">
              <label><strong>Tanggal di surat :</strong></label>
              <input type="date" class="date form-control" name="tgl_surat" id="tgl_surat" readonly="">
            </div>
            <div class="form-group col-md-4">
              <label><strong>Tanggal diterima :</strong></label>
              <input type="text" class="date form-control" name="tgl_masuk" id="tgl_masuk" readonly="">
            </div>
            <div class="form-group col-md-6">
              <label><strong>Pengirim :</strong></label>
              <input type="text"class="form-control" name="pengirim" id="pengirim" readonly="">
            </div>
            <div class="form-group col-md-6">
              <label><strong>Perihal surat :</strong></label>
              <input type="text"class="form-control" name="perihal" id="perihal" readonly="">
            </div>
          </div>
          <label><strong>Diteruskan kpd :</strong></label>
          <select style="width: 100%" class="custom-select" id="penerima-multiple" name="penerima[]" multiple="multiple" required="">
            <option value="admin">admin</option>
            <option value="kabag">kabag</option>
            <option value="kasubag otda">kasubag otda</option>
            <option value="kasubag kecamatan">kasubag kecamatan</option>
            <option value="kasubag kerjasama">kasubag kerjasama</option>
          </select>
          <div class="form-group mt-2">
           <label><strong>Catatan :</strong></label>
           <textarea class="form-control" name="catatan" id="catatan" rows="3" required=""></textarea>
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
</div>

<script>
  $(document).ready(function() {
    $('#penerima-multiple').select2();
  });
</script>

<script>
  $(document).on('click','.btn_edit',function(){
    var no=$(this).attr("id");
    $.ajax({
      url:"table/show_ds_sm.php",
      method:"POST",
      data:{
        no:no
      },
      dataType:"json",
      success:function(data){
        $('#no_surat').val(data.no_surat);
        $('#pengirim').val(data.pengirim);
        $('#tgl_surat').val(data.tgl_surat);
        $('#tgl_masuk').val(data.tgl_masuk);
        $('#perihal').val(data.perihal);
        $('#catatan').val(data.catatan);
        $('#edit_ds').modal('show');
      }
    });
  });
</script>


<!-- load tabel sm -->
<script>
  $(document).ready(function(){
    load_data();
    function load_data(page){
      $.ajax({
        url:"table/data_ds.php",
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
  $(document).on('click','.btn_ds',function(){
    var no=$(this).attr("id");
    $.ajax({
      url:"table/show_ds.php",
      method:"POST",
      data:{
        no:no
      },
      dataType:"json",
      success:function(data){
        $('#no_surat').val(data.no_surat);
        $('#tgl_surat').val(data.tgl_surat);
        $('#pengirim').val(data.pengirim);
        $('#perihal').val(data.perihal);
        $('#tambah_ds').modal('show');
      }
    });
  });
</script>


<!-- script cari data -->
<script>
  $(document).ready(function(){
    $('#cari_ds').on('keyup',function(){
      $.ajax({
        type:'POST',
        url:'table/search_ds.php',
        data:{
          cari_ds:$(this).val()
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