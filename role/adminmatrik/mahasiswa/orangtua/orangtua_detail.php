<?php 

  include 'functions2.php';
    $id = $_GET['id'];
      $dataOrtu = tampilOrtuDetailRoleAdminmatrik($id);

      foreach($dataOrtu as $row){
 ?>

<div class="container-fluid">
  <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><a href="?page=ortu" class="btn btn-sm btn-link waves-effect" style="width: 10%;" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;PROFIL ORANG TUA MAHASISWA
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
                              
                              <!-- <a href="index.php?page=editmahasiswa&id=<?php echo $row['id_user']; ?>" class="btn btn-primary btn-block waves-effect"><i class="material-icons" style='font-size: 16px'>mode_edit</i><span>&nbsp;EDIT DATA PROFIL</span></a> -->
                              
                              <?php //if($row['password_default'] == 0){ echo "<a class='btn btn-warning btn-block waves-effect' href='#ModalResetPassword' data-toggle='modal' ><i class='material-icons' style='font-size: 16px'>lock_open</i><span>&nbsp;RESET PASSWORD</span></a>";} ?>

                              <?php // echo "<a class='btn btn-danger btn-block waves-effect' href='#ModalHapusMahasiswa' data-toggle='modal' data-href='action/hapus.php?idmahasiswa=".$row['id_mahasiswa']."&iduser=".$row['id_user']."'><i class='material-icons' style='font-size: 16px'>delete</i><span>&nbsp;HAPUS MAHASISWA</span></a>"; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                             
  </div>
</div> 

            <div class="modal fade" id="ModalHapusMahasiswa" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">HAPUS MAHASISWA ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger btn-ok waves-effect" name="upload">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>            

            <div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <form method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">RESET PASSWORD MAHASISWA ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-warning btn-ok waves-effect" name="resetPass">RESET</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>               

<?php 
  if (isset($_POST['resetPass'])) {
    resetPassword($id);
    echo "<script type='text/javascript'>window.location.href='index.php?page=mahasiswadetails&id=".$id."';</script>";
  }
 ?>