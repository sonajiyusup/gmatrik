<?php 

  include 'functions2.php';
    $id = $_SESSION['id_ortu'];
    $idUser = $_SESSION['id_user'];

      $dataOrtu = tampilOrtuDetailRoleAdminmatrik($id);

      foreach($dataOrtu as $row){
 ?>

<div class="container-fluid">
  <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PROFIL SAYA
                                <small><?php echo $_SESSION['rolename']; ?></small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="tableProfil" class="table table-condensed">
                            <col width="350">
                            <col width="20">
                            <col width="350">
                                <tr> 
                                  <td colspan="3"> 
                                    <div class="image" align="center">
                                        <img src=<?php
                                          if ($row['avatar'] == NULL) {
                                              echo 'assets/img/user/default.png';
                                          } else if($row['avatar'] != NULL){
                                            echo 'assets/img/user/'.$row['avatar'];
                                          }               
                                        ?> width="100" height="100" alt="User" />
                                      <br>
                                      <h4 align="center"><?php echo $row['nama_ortu']; ?></h4>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <th>ID Orang Tua Mahasiswa</th>
                                  <td>:</td>
                                  <td><?php echo $row['id']; ?></td>
                                </tr>
                                <tr>
                                  <th>Username</th>
                                  <td>:</td>
                                  <td><span class="label bg-deep-orange"><?php echo $row['username']; ?></span></td>
                                </tr>
                                <tr>
                                  <th>Nama Mahasiswa</th>
                                  <td>:</td>
                                  <td><?php if($row['nama_mhs'] == NULL){echo 'Belum Diset';} else{ echo "<a href=index.php?page=mahasiswadetails&id=".$row['uid_mhs'].">".$row['nama_mhs']."</a>";} ?></td>
                                </tr>
                                <tr>
                                  <th>No Telp</th>
                                  <td>:</td>
                                  <td><?php if($row['telp'] == NULL){echo 'Belum diatur';}else{echo $row['telp'];} ?></td>
                                </tr>
                                <tr>
                                  <th>Email</th>
                                  <td>:</td>
                                  <td><?php if($row['email'] == NULL){echo 'Belum diatur';}else{echo $row['email'];} ?></td>
                                </tr>
                                <tr>
                                  <th>Alamat</th>
                                  <td>:</td>
                                  <td><?php if($row['alamat'] == NULL){echo 'Belum diatur';}else{echo $row['alamat'];} ?></td>
                                </tr>
                                <tr>
                                  <th>Password</th>
                                  <td>:</td>
                                  <td><?php echo "<code>".$row['password']."</code>"; ?></td>
                                </tr>
                              </table>                          
                              
                              <a href="index.php?page=editprofil" class="btn btn-primary btn-block waves-effect"><i class="material-icons" style='font-size: 16px'>mode_edit</i><span>&nbsp;EDIT DATA PROFIL</span></a>
                              <?php echo "<a class='btn btn-link btn-block waves-effect' href='#ModalGantiPass' data-toggle='modal' ><i class='material-icons' style='font-size: 16px'>lock</i><span>&nbsp;GANTI PASSWORD</span></a>"; ?>

                        </div>
                        <?php } ?>
                    </div>
                </div>
                             
  </div>
</div>
             <div class="modal fade" id="ModalGantiPass" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">GANTI PASSWORD</h4>
                        </div>
                        <div class="modal-body">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="pass" id="pwinput2" pattern=".{0}|.{8,}" title="8 Karakter Minimal" required>
                                            <label class="form-label">Password Baru : </label>
                                        </div>
                                    </div>
                               <br><br>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="passConf" id="pwinput3" pattern=".{0}|.{8,}" title="8 Karakter Minimal" required>
                                            <label class="form-label">Konfirmasi Password : </label>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-ok waves-effect" name="gantiPass">SIMPAN</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>  

            <div class="modal fade" id="ModalUploadAva" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">UPLOAD FOTO PROFIL</h4>
                        </div>
                        <div class="modal-body">
                          <input type="file" name="file" required>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary btn-ok waves-effect" name="uploadAvaMahasiswa" value="UPLOAD">
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div> 

<?php 
  if (isset($_POST['gantiPass'])) {
    gantiUserPassword($idUser, $_POST['pass']);
    echo "<script>document.location='?page=profil&alert=passchanged'</script>";
  }

 ?>            