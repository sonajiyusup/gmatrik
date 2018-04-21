<?php 

  include 'functions.php';
      $dataMahasiswa = mahasiswaDetails($_SESSION['id_user']);
      foreach($dataMahasiswa as $row){ 
 ?>

<div class="row clearfix">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2><a href="?page=profil" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;EDIT DATA PROFIL SAYA
                            </h2>
                        </div>
                        <div class="body">
                          <form method="POST">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nim" class="form-control date" placeholder="Nama" value="<?php echo $row['nim']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Nama" value="<?php echo $row['nama']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_outline</i>
                                        </span>
                                        <select class="form-control show-tick" name="gender" value="<?php 
                                            if ($row['j_kelamin'] == "Ikhwan" || $row['j_kelamin'] == "Laki-laki") {
                                              echo "Ikhwan";
                                            } else
                                            if($row['j_kelamin'] == "Akhwat" || $row['j_kelamin'] == "Perempuan"){
                                              echo "Akhwat";
                                            }
                                          ?>">
                                          <option><?php 
                                            if ($row['j_kelamin'] == "Ikhwan" || $row['j_kelamin'] == "Laki-laki") {
                                              echo "Ikhwan";
                                            } else
                                            if($row['j_kelamin'] == "Akhwat" || $row['j_kelamin'] == "Perempuan"){
                                              echo "Akhwat";
                                            }
                                          ?></option>
                                          <?php 
                                            if ($row['j_kelamin'] == "Ikhwan" || $row['j_kelamin'] == "Laki-laki") {
                                              echo "<option>Akhwat</option>";
                                            } else
                                            if($row['j_kelamin'] == "Akhwat" || $row['j_kelamin'] == "Perempuan"){
                                              echo "<option>Ikhwan</option>";
                                            }
                                          ?>
                                        </select required>                                            
                                    </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">today</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $row['tgl_lahir']; ?>" required>
                                        </div>
                                  </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control date" placeholder="Email" value="<?php echo $row['email']; ?>" required>
                                        </div>
                                  </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="No Telp." value="<?php echo $row['telp']; ?>" required>
                                        </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="editProfilSaya"><span>SIMPAN</span></button>
                                  </form>
                                </div>
                    </div>
                </div>
  </div>
</div>           

<?php
    if (isset($_POST['editProfilSaya'])) {
        editMahasiswa($_SESSION['id_user'], $_POST['nama'], $_POST['gender'], date("Y-m-d", strtotime($_POST['tgl_lahir'])), $_POST['asalkota'], $_POST['email'], $_POST['telp']);
      echo "<script>document.location='index.php?page=profil&alert=profileupdated'</script>";
    }
  } 
?>