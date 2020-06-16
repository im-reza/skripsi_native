<?php include_once'auth.php';  include '../connections/connection_db.php'; include '../connections/tgl_indo.php'; 
$user=$_SESSION['name'];
$ds=mysqli_query($con,"SELECT count(*) AS jumlah_ds FROM surat_masuk where status='0'");
$box_masuk=mysqli_query($con,"SELECT count(*) AS t_masuk FROM disposisi where penerima='$user'");
$inbox=mysqli_query($con,"SELECT count(*) as t_inbox from disposisi where penerima='$user' and status_ds='0' ");
$t_disposisi=mysqli_fetch_array($ds);
$t_masuk=mysqli_fetch_array($box_masuk);
$t_inbox=mysqli_fetch_array($inbox);
$angka_ds=$t_disposisi['jumlah_ds'];
$angka_inbox=$t_inbox['t_inbox'];
$jumlah_kabag=$angka_ds+$angka_inbox;

 $s_user=mysqli_query($con,"select * from user where name='$user'");
 $usr=mysqli_fetch_array($s_user);
 $cuti=$usr["status_user"];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Bagpem</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <meta name="msapplication-tap-highlight" content="no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

  <link href='../assets/fullcalendar/packages/core/main.css' rel='stylesheet' />
  <link href='../assets/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
  <link href='../assets/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
  <link href="../assets/free.css" rel="stylesheet">
  <link rel="icon" type="text/css" href="../assets/images/rumah-banjar.png">

</head>
<body>

  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header ">
    <div class="app-header header-shadow">
      <div class="app-header__logo">
        <div class="logo-src"><a href="index.php"><img src="../assets/images/banjarmasin1.png" style="width: 150px; height: 45px;margin-left: 20px;"></a></div>
        <div class="header__pane ml-auto">
          <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="app-header__mobile-menu">
        <div>
          <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
      <div class="app-header__menu">
        <span>
          <button type="button" class="btn-icon btn-icon-only btn btn-secondary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
              <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
          </button>
        </span>
      </div>
      <div class="app-header__content">
        <div class="app-header-left">
          <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                    <i class="nav-link-icon far fa-user-circle"></i>
                  </a>
                  <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                   <ul class="nav flex-column">
                     <?php $q=mysqli_query($con,"select * from user");
                     while ($dd=mysqli_fetch_array($q)) {
                       ?>

                       <li class="nav-item">
                         <a disabled href="javascript:void(0);" class="nav-link disabled">
                          <?php if ($dd['name']=='admin') {
                            echo " <img width='42' class='rounded-circle' src='../assets/images/profile/admin.png' alt=''>";
                          }elseif ($dd['name']=='kabag') {
                            echo " <img width='42' class='rounded-circle' src='../assets/images/profile/head.png' alt=''>";
                          }elseif($dd['name']=='kasubag otda') {
                            echo " <img width='42' class='rounded-circle' src='../assets/images/profile/office.png' alt=''>";
                          }elseif($dd['name']=='kasubag kecamatan') {
                            echo " <img width='42' class='rounded-circle' src='../assets/images/profile/office.png' alt=''>";
                          }else{
                            echo " <img width='42' class='rounded-circle' src='../assets/images/profile/woman.png' alt=''>";
                          } ?>
                          <span class="ml-2">
                            <?php echo $dd['name']; ?>
                          </span>
                          <?php if ($dd['status_user']=='cuti'){
                            echo "<div class='ml-auto status-circle' style='background-color:red'></div>";
                          }elseif($dd['online']=='0') {
                           echo "<div class='ml-auto status-circle'></div>";
                         }elseif($dd['online']=='1'){
                          echo "<div class='ml-auto status-circle' style='background-color:#26D07C'></div>";
                        } ?>
                      </a>
                    </li>

                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-btn-lg pr-0">
        <div class="widget-content p-0">
          <div class="widget-content-wrapper">
            <div class="widget-content-left">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                <?php if ($_SESSION['name']=='kabag') {
                  if ($t_disposisi['jumlah_ds']>='1'){
                    echo "<i class='nav-link-icon bell fas fa-bell'></i><span class='indicator'></span>"; 
                  } 
                }elseif ($_SESSION['name'] && $t_inbox['t_inbox']>0 ) {
                 echo "<i class='nav-link-icon bell fas fa-bell'></i><span class='indicator'></span>";
               }elseif($_SESSION['name'] && $t_inbox['t_inbox']=='0'){
                echo "<i class='nav-link-icon fas fa-bell'></i>";
              }
              ?>
            </a>
            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
              <?php if ($_SESSION['name']=='kabag') {
                if ($t_disposisi['jumlah_ds']>0) {
                 echo "
                 <a href='verif_ds.php' class='dropdown-item'>
                 <i class='mr-2 far fa-check-square'></i>Verify Disposisi
                 <div class='ml-auto indicator_n'></div>
                 </a>";
               }else{
                 echo "<a href='verif_ds.php' class='dropdown-item'>
                 <i class='mr-2 far fa-check-square'></i>Verify Disposisi
                 <div class='ml-auto'></div>
                 </a>";
               } 
             }
             ?>
             <?php if ($t_inbox['t_inbox']>0) {
                 echo "
                 <a href='inbox.php' class='dropdown-item'>
                 <i class='mr-2 far fa-comment-dots'></i>Inbox
                 <div class='ml-auto indicator_n'></div>
                 </a>";
               }else{
                 echo "<a href='inbox.php' class='dropdown-item'>
                 <i class='mr-2 far fa-comment-dots'></i>Inbox
                 <div class='ml-auto'></div>
                 </a>";
               } 
             ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="app-header-right">
 <div class="header-btn-lg pr-0">
   <div class="widget-content p-0">
     <div class="widget-content-wrapper">
       <div class="widget-content-left">
         <div class="btn-group">
           <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
            <?php if ($_SESSION['name']=='admin') {
              if ($cuti=='cuti') {
                echo " <img width='42' class='rounded-circle' src='../assets/images/profile/admin.png' alt=''><span class='indicator_user_busy'></span>";
              }else{
                echo " <img width='42' class='rounded-circle' src='../assets/images/profile/admin.png' alt=''><span class='indicator_user_online'></span>";
              }
            }elseif ($_SESSION['name']=='kabag') {
              if ($cuti=='cuti') {
                echo " <img width='42' class='rounded-circle' src='../assets/images/profile/head.png' alt=''><span class='indicator_user_busy'></span>";
              }else{
                echo " <img width='42' class='rounded-circle' src='../assets/images/profile/head.png' alt=''><span class='indicator_user_online'></span>";
              }
            }elseif($_SESSION['name']=='kasubag kerjasama') {
              if ($cuti=='cuti') {
                echo " <img width='42' class='rounded-circle' src='../assets/images/profile/woman.png' alt=''><span class='indicator_user_busy'></span>";
              }else{
                echo " <img width='42' class='rounded-circle' src='../assets/images/profile/woman.png' alt=''><span class='indicator_user_online'></span>";
              }
            }else{
             if ($cuti=='cuti') {
                echo " <img width='42' class='rounded-circle' src='../assets/images/profile/office.png' alt=''><span class='indicator_user_busy'></span>";
              }else{
                echo " <img width='42' class='rounded-circle' src='../assets/images/profile/office.png' alt=''><span class='indicator_user_online'></span>";
              }
            } ?>
            <i class="fa fa-angle-down ml-1"></i>
          </a>
          <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
           <a class="dropdown-item" href="setting.php"><i class="mr-2 fas fa-user-cog"></i>Setting</a>
           <div tabindex="-1" class="dropdown-divider"></div>
           <a class="dropdown-item" href="../logout.php"><i class="mr-2 fas fa-power-off"></i>Logout</a>
         </div>
       </div>
     </div>
     <div class="widget-content-left  ml-3 header-user-info">
       <div class="widget-heading">
         <?php echo $_SESSION['nama']; ?>
       </div>
       <div class="widget-subheading" id="posisi">
         <?php echo $_SESSION['name']; ?>
       </div>
     </div>
     <div class="widget-content-right header-user-info ml-3">
       <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
         <i class="fa text-white fa-calendar pr-1 pl-1"></i>
       </button>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
<div class="scrollbar-container"></div>
<div class="app-main">
 <div class="app-sidebar sidebar-shadow">
   <div class="app-header__logo">
    <a href="#"><div class="logo-src"></div></a>
    <div class="header__pane ml-auto">
      <div>
        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>
  </div>
  <div class="app-header__mobile-menu">
    <div>
      <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
  </div>
  <div class="app-header__menu">
    <span>
      <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
        <span class="btn-icon-wrapper">
          <i class="fa fa-ellipsis-v fa-w-6"></i>
        </span>
      </button>
    </span>
  </div>
  <div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
      <ul class="vertical-nav-menu ">
        <li class="app-sidebar__heading">Dashboards</li>
        <li>
          <a href="index.php">
            <i class="metismenu-icon fas fa-home"></i> Home
          </a>
        </li>

        <li>
          <a href="#">
            <i class="metismenu-icon fas fa-envelope-open-text"></i> Surat masuk
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
          </a>
          <ul class="mm-show">
            <li>
              <a href="surat_masuk.php">
                <i class="metismenu-icon">
                </i><span class="fas fa-table"></span> Data Surat Masuk
              </a>
            </li>
            <?php if ($_SESSION['name']=='kabag'){
              echo " <li>
              <a href='disposisi.php'>
              <i class='metismenu-icon'>
              </i><span class='fas fa-table'></span> Data Disposisi
              </a>
              </li>
              <li>
              <a href='verif_ds.php'>
              <i class='metismenu-icon'>
              </i><span class='far fa-check-square'></span> Verif Disposisi
              ".(($t_disposisi['jumlah_ds']>0) ? "<div class='ml-auto button__badge_list'>".$t_disposisi['jumlah_ds']."</div>" : "")
              ."
              </a>
              </li>";
            }else{
              echo "<li>
              <a href='disposisi.php'>
              <i class='metismenu-icon'>
              </i><span class='fas fa-table'></span> Data Disposisi
              </a>
              </li>";
            } ?>
            <li>
              <a href='inbox.php'>
                <i class='metismenu-icon'>
                </i><span class='far fa-comment-dots'></span> Inbox
                <?php if ($t_inbox['t_inbox']>0){
                  echo "<div class='ml-auto button__badge_list'>".$t_inbox['t_inbox']."</div>";
                } ?>
              </a>
            </li>
            <li>
              <a href='#' data-target="#search_modal" data-toggle="modal">
                <i class='metismenu-icon'>
                </i><span class='fas fa-search'></span> Cari Surat Masuk
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="metismenu-icon fas fa-pencil-alt"></i> Surat Keluar
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
          </a>
          <ul class="mm-show">
            <li>
              <a href="surat_keluar.php">
                <i class="metismenu-icon">
                </i><span class="fas fa-table"></span> Data Surat Keluar
              </a>
            </li>
            <li>
              <a href="buat_sk_undangan.php">
                <i class="metismenu-icon">
                </i><span class="fas fa-plus"></span> Surat Undangan
              </a>
            </li>
            <li>
              <a href="buat_sk_cuti.php">
                <i class="metismenu-icon">
                </i><span class="fas fa-plus"></span> Surat Permohonan Cuti
              </a>
            </li>
            <li>
              <a href="buat_sk_kerja.php">
                <i class="metismenu-icon">
                </i><span class="fas fa-plus"></span> Surat Perintah Kerja
              </a>
            </li>
            <li>
              <a href="buat_sk_dinas.php">
                <i class="metismenu-icon">
                </i><span class="fas fa-plus"></span> Surat Perjalanan Dinas
              </a>
            </li>
            <li>
              <a href="buat_sk_biasa.php">
                <i class="metismenu-icon">
                </i><span class="fas fa-plus"></span> Surat Biasa
              </a>
            </li>
          </ul>
        </li>
        <li class="app-sidebar__heading">Report</li>
        <li class="mm-active">
          <a href="#">
            <i class="metismenu-icon fas fa-print"></i> Pilih Laporan
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
          </a>
          <ul>
            <li>
              <a href="#" data-target="#lap_modal_sm" data-toggle="modal">
                <i class="metismenu-icon">
                </i>Laporan Surat Masuk
              </a>
            </li>
            <li>
              <a href="#" data-target="#lap_modal_ds" data-toggle="modal">
                <i class="metismenu-icon">
                </i>Laporan Disposisi
              </a>
            </li>
            <li>
              <a href="#" data-target="#lap_modal_sk" data-toggle="modal">
                <i class="metismenu-icon">
                </i>Laporan Surat Keluar
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

</div>

