<?php include_once '../assets/header.php';    include '../connections/connection_db.php'; ?>

<div class="app-main__outer ">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="fas fa-pencil-alt icon-gradient bg-mean-fruit">
            </i>
          </div>
          <div><h3>Setting Akun</h3>
            <div class="page-title-subheading">
              Memperbaharui Informasi Akun <br>
              <p style="color: red">*Setelah anda mengklik tombol simpan anda akan dialihkan ke halaman login !</p>
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <a href="index.php"><button type="button" title="Kembali" data-toggle="tooltip" class="btn-shadow mr-3 btn btn-primary "><span class="fas fa-arrow-left"></span> Kembali</button>
          </a>
        </div> 
      </div>
    </div> 

    <?php if (isset($_SESSION['success'])) {
      echo "".$_SESSION['success']."";
    }elseif (isset($_SESSION['failed'])) {
      echo "".$_SESSION['failed']."";
    }elseif (isset($_SESSION['duplicate'])) {
      echo "".$_SESSION['duplicate']."";
    }
    unset($_SESSION['success']);
    unset($_SESSION['failed']);
    unset($_SESSION['duplicate']);
    ?>

    <?php 
    $user=$_SESSION['nama'];
    $query=mysqli_query($con,"select * from user where nama='$user'");
    while ($d=mysqli_fetch_array($query)) {
      $cuti=$d["status_user"];
      $username=$d['name'];
      ?>
      <center>
        <div class="col-md-8">
          <div class="main-card mb-3 card">
            <div class="card-body">
              <form name="frm" action="actions/aksi_edit_user.php" method="POST">
               <div class="form-group row mt-2" hidden="">
                <label class="col-sm-4 col-form-label">ID</label> :
                <div class="input-group mb-1 col-sm-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                  </div>
                  <input type="text" class="form-control" name="id" value="<?php echo $d['id'] ?>">
                </div>
              </div>
              <div class="form-group row mt-2">
                <label class="col-sm-4 col-form-label" style="text-align: left;">Username</label> :
                <div class="input-group mb-1 col-sm-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="username" readonly="" value="<?php echo $d['name'] ?>">
                </div>
              </div>
              <div class="form-group row mt-2">
                <label class="col-sm-4 col-form-label" style="text-align: left;">Password</label> :
                <div class="input-group mb-1 col-sm-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="password.." onChange="cekPass()" required="">
                </div>
              </div>
              <div class="form-group row mt-2">
                <label class="col-sm-4 col-form-label" style="text-align: left;">Ulangi Password</label> :
                <div class="input-group mb-1 col-sm-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" name="repassword" placeholder="ulangi password.." onChange="cekPass()" required="">
                </div>
              </div>
              <div class="form-group row mt-2">
                <label class="col-sm-4 col-form-label" style="text-align: left;">Nama</label> :
                <div class="input-group mb-1 col-sm-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                  </div>
                  <input type="text" class="form-control" name="nama" required="" value="<?php echo $d['nama'] ?>">
                </div>
              </div>
              <div class="form-group row mt-2">
                <label class="col-sm-4 col-form-label" style="text-align: left;">NIP</label> :
                <div class="input-group mb-1 col-sm-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                  </div>
                  <input type="text" class="form-control" name="nip" required="" value="<?php echo $d['nip'] ?>">
                </div>
              </div>
              <div class="form-group row mt-2">
                <label class="col-sm-4 col-form-label" style="text-align: left;">Telegram</label> :
                <div class="input-group mb-1 col-sm-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="id_telegram" required="" value="<?php echo $d['id_telegram'] ?>">
                </div>
              </div>
              <div class="form-group row mt-2">
                <label class="col-sm-4 col-form-label" style="text-align: left;">Kehadiran</label> :
                <div class="input-group mb-1 col-sm-6">
                  <select style="width: 100%" class="custom-select" id="status_user" name="status_user" required="">
                    <option value="bekerja"<?php if($cuti=="bekerja") echo 'selected="selected"'; ?>>Bekerja</option>
                    <option value="cuti"<?php if($cuti=="cuti") echo 'selected="selected"'; ?>>Cuti</option>
                  </select>
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-success mt-2" disabled="true" style="float: center;">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </center>

  <?php } ?>


  <?php 
  include_once '../assets/footer.php';  
  ?>

  <script>
    $(document).ready(function() {
      $('#status_user').select2();
    });
  </script>

  <script>
    function cekPass()
    {
      p1 = document.frm.password.value;
      p2 = document.frm.repassword.value;
      if(p1==p2)
      {
        document.frm.submit.disabled=false;
      }
      else
      {
        document.frm.submit.disabled=true;
      }
    }
  </script>