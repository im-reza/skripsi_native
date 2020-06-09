<?php include_once '../assets/header.php';    include '../connections/connection_db.php'; ?>

<div class="app-main__outer ">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="fas fa-search icon-gradient bg-mean-fruit">
            </i>
          </div>
          <div><h3>Lacak Surat </h3>
            <div class="page-title-subheading">
              Hasil lacak surat <br>
            </div>
          </div>
        </div>
      </div>
    </div> 


    <?php 
    date_default_timezone_set('Asia/Jakarta');
    $kabag="<div class='widget-content-left'>
    <img width='42' class='rounded-circle' src='../assets/images/profile/head.png' alt=''>
    </div>";
    $admin="<div class='widget-content-left'>
    <img width='42' class='rounded-circle' src='../assets/images/profile/admin.png' alt=''>
    </div>";
    $kasubag="<div class='widget-content-left'>
    <img width='42' class='rounded-circle' src='../assets/images/profile/office.png' alt=''>
    </div>";
    $ks_kerjasama="<div class='widget-content-left'>
    <img width='42' class='rounded-circle' src='../assets/images/profile/woman.png' alt=''>
    </div>";
    $no=$_GET['nomor_s'];
    $query=mysqli_query($con,"SELECT * FROM surat_masuk LEFT JOIN file ON surat_masuk.no_surat=file.no_surat LEFT JOIN disposisi ON surat_masuk.no_surat=disposisi.no_surat WHERE surat_masuk.no_surat='$no' ");
    while ($d=mysqli_fetch_array($query)) {
      $tgl_surat=$d['tgl_masuk'];
      $tgl_verif=$d['tgl'];
      $tgl_dibaca=$d['tgl_dibaca'];
      ?>
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <center><div class="card-header"><?php echo $d['pengirim']; ?> | <?php echo $no ?> | <?php echo $d['perihal']; ?> | <?php echo $d['penerima']; ?> </div></center>
          <div class="card-body" style="color: green">
            <ul class="events">
              <li>
                <time><?php echo tgl_indo(date('D, d-F-Y, H:i',strtotime($tgl_surat))) ?></time> 
                <span><strong>Diterima & Diinput</strong>Admin</span><?php echo $admin; ?>
              </li>
              <?php if ($d['status']=='0'){
                echo "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i'))."</time> 
                <span style='color:red'><strong>Belum Diverifikasi</strong>Kabag</span> ".$kabag."
                </li> ";
              }else{
                echo  "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i',strtotime($tgl_verif)))."</time> 
                <span><strong>Diverifikasi</strong>Kabag</span> ".$kabag."
                </li> 
                <li>
                <time>".tgl_indo(date('D, d-F-Y, H:i',strtotime($tgl_verif)))."</time> 
                <span><strong>Diteruskan kpd : ".$d['penerima']."</strong>Kabag<br> Catatan : ".$d['catatan']."</span> ".$kabag."
                </li>
                ";
              } ?>
              <?php if ($d['status_ds']=='0') {
               if ($d['penerima']=='kabag') {
                echo "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i'))."</time> 
                <span style='color:red'><strong>Diterima namun Belum Dibaca</strong>".$d['penerima']."</span> ".$kabag."
                </li>";
              }elseif ($d['penerima']=='admin') {
                echo "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i'))."</time> 
                <span style='color:red'><strong>Diterima namun Belum Dibaca</strong>".$d['penerima']."</span> ".$admin."
                </li>";
              }elseif ($d['penerima']=='kasubag kerjasama') {
                echo "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i'))."</time> 
                <span style='color:red'><strong>Diterima namun Belum Dibaca</strong>".$d['penerima']."</span> ".$ks_kerjasama."
                </li>";
              }else{
                echo "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i'))."</time>  
                <span style='color:red'><strong>Diterima namun Belum Dibaca</strong>".$d['penerima']."</span> ".$kasubag."
                </li>";
              }
            } elseif ($d['status_ds']=='1') {
              if ($d['penerima']=='kabag') {
                echo "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i',strtotime($tgl_dibaca)))."</time> 
                <span><strong>Diterima & Dibaca</strong>".$d['penerima']."</span> ".$kabag."
                </li>";
              }elseif ($d['penerima']=='admin') {
                echo "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i',strtotime($tgl_dibaca)))."</time> 
                <span><strong>Diterima & Dibaca</strong>".$d['penerima']."</span> ".$admin."
                </li>";
              }elseif ($d['penerima']=='kasubag kerjasama') {
                echo "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i',strtotime($tgl_dibaca)))."</time> 
                <span><strong>Diterima & Dibaca</strong>".$d['penerima']."</span> ".$ks_kerjasama."
                </li>";
              }else{
                echo "<li>
                <time>".tgl_indo(date('D, d-F-Y, H:i',strtotime($tgl_dibaca)))."</time> 
                <span><strong>Diterima & Dibaca</strong>".$d['penerima']."</span> ".$kasubag."
                </li>";
              }
              
            }
            ?>
          </ul>
        </div>
      </div>
    </div>

  <?php } ?>




  <?php 
  include_once '../assets/footer.php';  
  ?>
