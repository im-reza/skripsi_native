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
          <div>My Inbox
            <div class="page-title-subheading">
              Kotak Masuk
            </div>
          </div>
        </div>
      </div>
    </div>           

    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-header">My Inbox
            <div class="btn-actions-pane-right">
            </div>
          </div>
          <div class="table-responsive">
            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Dari</th>
                  <th>No Surat</th>
                  <th class="text-center">Perihal</th>
                  <th class="text-center">Catatan</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody  id="tab_inbox">

              </tbody>
            </table>

          </div>
          <div class="d-block text-center card-footer">
            
          </div>
        </div>
      </div>
    </div>




    <?php 
    include_once '../assets/footer.php';  
    ?>

    <!-- script hapus -->
    <script>
      $(document).ready(function(e){
        $(this).find('.btn-ok').attr('href',$(e.relatedTarget).data('href'));;
      });
    </script>
    <!-- tutup script hapus -->


    <!-- load tabel sm -->
    <script>
      $(document).ready(function(){
        load_data();
        function load_data(page){
          $.ajax({
            url:"table/data_inbox.php",
            method:"POST",
            data:{page:page},
            success:function(data){
              $('#tab_inbox').html(data);
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