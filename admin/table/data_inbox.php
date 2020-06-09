		<?php 
		include '../../connections/connection_db.php';
		session_start();
		date_default_timezone_set('Asia/Jakarta');
		$user=$_SESSION['name'];
		$no=1;
    $kabag=mysqli_query($con,"select * from user where name='kabag'");
    while ($us_kabag=mysqli_fetch_array($kabag)) {
      $nama_kabag=$us_kabag['nama'];
      $jabatan=$us_kabag['jabatan'];
    }
    $query = mysqli_query($con,"SELECT * FROM surat_masuk INNER JOIN file inner join disposisi on surat_masuk.no_surat=file.no_surat and surat_masuk.no_surat=disposisi.no_surat where surat_masuk.status='1' and disposisi.penerima='$user' ORDER BY disposisi.id_ds desc");
    while ($d = mysqli_fetch_array($query)) {  
     $tgl_surat=$d['tgl_surat'];
     $tgl_masuk=$d['tgl_masuk'];
     $tgl_verif=$d['tgl_dibaca'];

     $waktu1=strtotime($tgl_verif);
     $waktu2=strtotime("now");

     $diff=$waktu2 - $waktu1;
     $jam=floor($diff/(60*60));
     $menit=$diff - $jam * (60*60);
     $sisa = $menit % 60;
     $jumlah_detik = floor($sisa/1);
     $menit_fix=floor($menit/60);
     $hari = floor($diff/86400);

     ?>

     <tr>
      <td class="text-center text-muted"><?php echo $no; ?></td>
      <td>
        <div class="widget-content p-0">
          <div class="widget-content-wrapper">
            <div class="widget-content-left mr-3">
              <div class="widget-content-left">
                <img width="42" class="rounded-circle" src="../assets/images/profile/head.png" alt="">
              </div>
            </div>
            <div class="widget-content-left flex2">
              <div class="widget-heading" style="font-size: 11px"><?php echo $nama_kabag; ?></div>
              <div class="widget-subheading opacity-7" style="font-size: 11px"><?php echo $jabatan; ?></div>
            </div>
          </div>
        </div>
      </td>
      <td class="text-center" style="font-size: 11px"><?php echo $d['no_surat']; ?></td>
      <td class="text-center" style="font-size: 11px"><?php echo $d['perihal']; ?></td>
      <td class="text-center" style="font-size: 12px">
        <?php if ($d['status_ds']=='1'){
          echo "<div class='badge badge-success'>".$d['catatan']."</div>";
        }else{
          echo "<div class='badge badge-danger'>".$d['catatan']."</div>";
        } ?>
      </td>
      <td class="text-center">
        <?php echo "<a href='../file/".$d['nama_file']."' target='_blank' data-toggle='tooltip' title='".$d['nama_file']."'><span class='fas fa-file-pdf'></span></a>" ?>
      </td>
      <td class="text-center" style="font-size: 11px">
        <?php if ($d['status_ds']=='0') {
          echo "<a href='actions/aksi_baca_ds.php?id=".$d['id_ds']."' class='btn btn-sm btn-info'>Dibaca</a>";
        }else{
          if ($menit_fix=='0') {       
           echo " ".$jumlah_detik." detik yang lalu ";
         } elseif ($jam=='0') {
          echo " ".$menit_fix." menit yang lalu ";
        }elseif($hari=='0') {
         echo " ".$jam." jam ".$menit_fix." menit yang lalu ";
       }else{
         echo " ".$hari." hari yang lalu ";
       }
     } ?>
   </td>
 </tr>        


 <?php $no++; }

 ?>



