<?php 

  include 'functions.php';
      $dataAdminMatrik = adminMatrikDetails($_SESSION['id_user']);
      foreach($dataAdminMatrik as $row){ 
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
                            <col width="250">
                            <col width="20">
                            <col width="500">
                                <tr> 
                                  <td colspan="3"> 
                                    <div class="image" align="center">
                                      <a href="#ModalUploadAva" title="Klik untuk Ganti Foto Profil" data-toggle='modal'>
                                        <img src=<?php echo "assets/img/user/".$row['avatar']; ?> width="100" height="100" alt="User" />
                                      </a>
                                      <br>
                                      <h4 align="center"><?php echo $row['nama']; ?></h4>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <th>ID Admin Matrikulasi</th>
                                  <td>:</td>
                                  <td><?php echo $row['id_adminmatrik']; ?></td>
                                </tr>
                                <tr>
                                  <th>Username</th>
                                  <td>:</td>
                                  <td><code><?php echo $row['username']; ?></code></td>
                                </tr>
                                <tr>
                                  <th>Email</th>
                                  <td>:</td>
                                  <td><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                  <th>No Telp</th>
                                  <td>:</td>
                                  <td><?php echo $row['telp']; ?></td>
                                </tr>
                                <tr>
                                  <th>Ikhwan/Akhwat</th>
                                  <td>:</td>
                                  <td><?php 
                                            if ($row['j_kelamin'] == "Ikhwan" || $row['j_kelamin'] == "Laki-laki") {
                                              echo "Ikhwan";
                                            } else
                                            if($row['j_kelamin'] == "Akhwat" || $row['j_kelamin'] == "Perempuan"){
                                              echo "Akhwat";
                                            }
                                          ?></td>
                                </tr>
                                <tr>
                                  <th>Tanggal Lahir</th>
                                  <td>:</td>
                                  <td><?php echo date('d F Y', strtotime($row['tgl_lahir'])); ?></td>
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
                            <input type="submit" class="btn btn-primary btn-ok waves-effect" name="upload" value="UPLOAD">
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div> 

<?php 
  if (isset($_POST['gantiPass'])) {
    gantiUserPassword($_SESSION['id_user'], $_POST['pass']);
    echo "<script>document.location='?page=profil&alert=passchanged'</script>";
  }

 ?>            