    <?php 
    include_once '../assets/header.php';
    $surat_masuk=mysqli_query($con,"SELECT COUNT(*) AS total FROM surat_masuk");
    $disposisi=mysqli_query($con,"SELECT COUNT(*) AS dis FROM surat_masuk where status='0'");
    $surat_keluar=mysqli_query($con,"SELECT COUNT(*) AS sk FROM surat_keluar");
    $user=$_SESSION['name'];
    $inbox=mysqli_query($con,"SELECT count(*) AS t_inbox FROM disposisi where penerima='$user' ");
    $t_disposisi=mysqli_fetch_array($disposisi);
    $t_suratmasuk=mysqli_fetch_array($surat_masuk);
    $t_suratkeluar=mysqli_fetch_array($surat_keluar);
    $t_inbox=mysqli_fetch_array($inbox);
    ?>

    <div class="app-main__outer ">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="far fa-smile icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div style="font-family: cursive;"> <h5>
                            <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $b = time();
                            $hour = date("G",$b);
                            if ($hour>=0 && $hour<=11)
                            {
                                echo "Selamat Pagi,";
                            }
                            elseif ($hour >=12 && $hour<=14)
                            {
                                echo "Selamat Siang,";
                            }
                            elseif ($hour >=15 && $hour<=17)
                            {
                                echo "Selamat Sore,";
                            }
                            elseif ($hour >=17 && $hour<=18)
                            {
                                echo "Selamat Petang,";
                            }
                            elseif ($hour >=19 && $hour<=23)
                            {
                                echo "Selamat Malam,";
                            }
                            ?>
                            <?php if ($_SESSION['name']=='kasubag kerjasama') {
                                echo "Ibu ".$_SESSION['nama']."... ";
                            }else{
                                echo "Bapak ".$_SESSION['nama']."... ";
                            } ?>
                        </h5>
                        <div class="page-title-subheading">Select menu in sidebar
                        </div>
                    </div>
                </div>
            </div>
        </div>           
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Surat Masuk</div>
                            <div class="widget-subheading">Total surat masuk</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $t_suratmasuk['total']; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Disposisi</div>
                            <div class="widget-subheading">Belum Diproses</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $t_disposisi['dis']; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 widget-content bg-happy-itmeo">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Kotak Masuk Saya</div>
                            <div class="widget-subheading">Total</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $t_inbox['t_inbox']; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 widget-content bg-love-kiss">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Surat Keluar</div>
                            <div class="widget-subheading">Total surat keluar</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $t_suratkeluar['sk']; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>


        <?php 
        include_once '../assets/footer.php';  
        ?>
   