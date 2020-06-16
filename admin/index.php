    <?php
    include_once '../assets/header.php';
    $surat_masuk = mysqli_query($con, "SELECT COUNT(*) AS total FROM surat_masuk");
    $disposisi = mysqli_query($con, "SELECT COUNT(*) AS dis FROM surat_masuk where status='1'");
    $surat_keluar = mysqli_query($con, "SELECT COUNT(*) AS sk FROM surat_keluar");
    $user = $_SESSION['name'];
    $inbox = mysqli_query($con, "SELECT count(*) AS t_inbox FROM disposisi where penerima='$user' ");
    $t_disposisi = mysqli_fetch_array($disposisi);
    $t_suratmasuk = mysqli_fetch_array($surat_masuk);
    $t_suratkeluar = mysqli_fetch_array($surat_keluar);
    $t_inbox = mysqli_fetch_array($inbox);

    $tgl_surat=mysqli_query($con,"select * from file order by tgl_masuk desc limit 1");
    $tgl=mysqli_fetch_array($tgl_surat);
    $tgl_1=$tgl['tgl_masuk'];

    $tgl_disposisi=mysqli_query($con,"select tgl from disposisi order by tgl desc limit 1;");
    $tgl_d=mysqli_fetch_array($tgl_disposisi);
    $tgl_2=$tgl_d['tgl'];

    $tgl_inbox=mysqli_query($con,"select tgl from disposisi where penerima='$user' order by tgl desc limit 1");
    $tgl_i=mysqli_fetch_array($tgl_inbox);
    $tgl_3=$tgl_i['tgl'];

    $tgl_sk=mysqli_query($con," select tanggal from surat_keluar order by tanggal desc limit 1;");
    $tgl_k=mysqli_fetch_array($tgl_sk);
    $tgl_4=$tgl_k['tanggal'];


    
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
                        <div style="font-family: cursive;">
                            <h5>
                                <?php
                                date_default_timezone_set("Asia/Jakarta");
                                $b = time();
                                $hour = date("G", $b);
                                if ($hour >= 0 && $hour <= 11) {
                                    echo "Selamat Pagi,";
                                } elseif ($hour >= 12 && $hour <= 14) {
                                    echo "Selamat Siang,";
                                } elseif ($hour >= 15 && $hour <= 17) {
                                    echo "Selamat Sore,";
                                } elseif ($hour >= 17 && $hour <= 18) {
                                    echo "Selamat Petang,";
                                } elseif ($hour >= 19 && $hour <= 23) {
                                    echo "Selamat Malam,";
                                }
                                ?>
                                <?php if ($_SESSION['name'] == 'kasubag kerjasama') {
                                    echo "Ibu " . $_SESSION['nama'] . "... ";
                                } else {
                                    echo "Bapak " . $_SESSION['nama'] . "... ";
                                } ?>
                            </h5>
                            <div class="page-title-subheading">Select menu in sidebar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card mb-2 widget-content border card border-danger">
                         <i style="font-size: 45px" class="mr-3 fas fa-envelope-open-text"></i>
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total surat masuk</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers"><?php echo $t_suratmasuk['total']; ?></div>
                                </div>
                            </div>
                            <div class="widget-progress-wrapper">
                                <a style="color: #000" href="surat_masuk.php" class="progress-sub-label">
                                    <div class="sub-label-left">Lihat</div>
                                    <div class="sub-label-right"><i class="fa fa-arrow-circle-right"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2 widget-content border card border-warning">
                        <i style="font-size: 45px" class="mr-3 far fa-check-square"></i>
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total disposisi</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers"><?php echo $t_disposisi['dis']; ?></div>
                                </div>
                            </div>
                            <div class="widget-progress-wrapper">
                                <a style="color: #000" href="disposisi.php" class="progress-sub-label">
                                    <div class="sub-label-left">Lihat</div>
                                    <div class="sub-label-right"><i class="fa fa-arrow-circle-right"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2 widget-content border card border-success">
                        <i style="font-size: 45px" class="mr-3 far fa-comment-dots"></i>
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total Inbox saya</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers"><?php echo $t_inbox['t_inbox']; ?></div>
                                </div>
                            </div>
                            <div class="widget-progress-wrapper">
                                <a style="color: #000" href="inbox.php" class="progress-sub-label">
                                    <div class="sub-label-left">Lihat</div>
                                    <div class="sub-label-right"><i class="fa fa-arrow-circle-right"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2 widget-content border card border-info">
                         <i style="font-size: 45px" class="mr-3 fas fa-pencil-alt"></i>
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total surat keluar</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers"><?php echo $t_suratkeluar['sk']; ?></div>
                                </div>
                            </div>
                            <div class="widget-progress-wrapper">
                                <a style="color: #000" href="surat_keluar.php" class="progress-sub-label">
                                    <div class="sub-label-left">Lihat</div>
                                    <div class="sub-label-right"><i class="fa fa-arrow-circle-right"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content col-md-8 border card border-secondary">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <?php
            include_once '../assets/footer.php';
            ?>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {

                        timeZone: 'UTC',


                        plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        navLinks: true,
                        selectable: true,
                        selectMirror: true,
                        eventLimit: true,
                        events: 'actions/load_calendar.php',
                        eventClick: function(info) {
                            info.jsEvent.preventDefault(); 

                            if (info.event.url) {
                                window.open(info.event.url);
                            }
                        },
                    });

                    calendar.render();
                });

            </script>