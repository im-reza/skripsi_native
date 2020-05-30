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
          <div>Melakukan Verifikasi Disposisi
            <div class="page-title-subheading">
             <nav class="" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="surat_masuk.php">Surat Masuk</a></li>
                <li class="breadcrumb-item"><a href="disposisi.php">Disposisi</a></li>
                <li class="active breadcrumb-item" aria-current="page">Verifikasi</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>           

  <?php if (isset($_SESSION['success'])) {
    echo "".$_SESSION['success']."";
  }elseif (isset($_SESSION['failed'])) {
    echo "".$_SESSION['failed']."";
  }
  unset($_SESSION['success']);
  unset($_SESSION['failed']);

  ?>
  <div class="tab-pane tabs-animation fade show active">
    <div class="row" id="tab_disposisi" >

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

  <!-- modal tambah data surat masuk -->
  <div class="modal fade bd-example-modal-lg" id="tambah_ds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pendisposisian :</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="actions/aksi_tambah_ds.php" enctype="multipart/form-data">
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
                <input type="date" class="date form-control" name="tgl_masuk" id="tgl_masuk" readonly="">
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
             <textarea class="form-control" name="catatan" rows="3" required=""></textarea>
           </div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div> 
</div>
<!-- end modal tambah data surat masuk -->

<script>
  $(document).ready(function() {
    $('#penerima-multiple').select2();
  });
</script>


<!-- load tabel sm -->
<script>
  $(document).ready(function(){
    load_data();
    function load_data(page){
      $.ajax({
        url:"table/data_verif_ds.php",
        method:"POST",
        data:{page:page},
        success:function(data){
          $('#tab_disposisi').html(data);
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
        $('#tgl_masuk').val(data.tgl_masuk);
        $('#pengirim').val(data.pengirim);
        $('#perihal').val(data.perihal);
        $('#tambah_ds').modal('show');
      }
    });
  });
</script>
