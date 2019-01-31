<?php 
  include 'functions2.php';

  $id = $_SESSION['id_ortu'];
  $dataOrtu = tampilOrtuDetailRoleAdminmatrik($id);
    foreach($dataOrtu as $row){        
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
                                            <input type="text" name="namaOrtu" class="form-control date" placeholder="Nama" value="<?php echo $row['nama_ortu']; ?>" >
                                        </div>
                                    </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control date" placeholder="Email" value="<?php echo $row['email']; ?>">
                                        </div>
                                  </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="No Telp." value="<?php echo $row['telp']; ?>">
                                        </div>
                                  </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="alamat" class="form-control date" placeholder="Alamat" value="<?php echo $row['alamat']; ?>">
                                        </div>
                                  </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control date" placeholder="Username" value="<?php echo $row['username']; ?>" disabled>
                                        </div>
                                  </div>
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                      </span>
                                    <div class="form-line">
                                      <select class="form-control show-tick" data-live-search="true" name="idMahasiswa" disabled>
                                        <option selected value="<?php echo $row['id_mahasiswa'] ?>">-- <?php echo $row['nama_mhs'] ?> --</option>
                                                          <?php $data = tampilMahasiswa();
                                                            foreach($data as $row){
                                                              echo '<option value="'.$row['id_mahasiswa'].'">'.$row['nama'].'</option>';
                                                            } 
                                                          ?>
                                      </select>
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="editOrtu"><span>SIMPAN</span></button>
                                  </form>
                                </div>
                    </div>
                </div>  
</div>           

<?php
    if(isset($_POST['editOrtu'])) {
      editProfilOrtu($id, $_POST['namaOrtu'], $_POST['alamat'], $_POST['email'], $_POST['telp']);
      echo "<script>document.location='?page=profil'</script>";
    }
  } 
?>