<?php 

  include 'functions.php';
      $dataAdminMatrik = adminMatrikDetails($_SESSION['id_user']);
      foreach($dataAdminMatrik as $row){ 
 ?>


<div class="container-fluid">

  <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
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
                            <col width="750">
                                <tr> 
                                  <td colspan="3"> 
                                    <div class="image" align="center">
                                      <img src=<?php echo "assets/img/user/".$row['avatar']; ?> width="48" height="48" alt="User" /><br>
                                      <h5 align="center"><?php echo $row['nama']; ?></h5>
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
                                  <td><?php echo $row['j_kelamin']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tanggal Lahir</th>
                                  <td>:</td>
                                  <td><?php echo date('d F Y', strtotime($row['tgl_lahir'])); ?></td>
                                </tr>
                              </table>                          
                              
                              <a href="index.php?page=editprofil" class="btn btn-primary btn-block waves-effect"><i class="material-icons" style='font-size: 16px'>mode_edit</i><span>EDIT DATA PROFIL</span></a>
                              <?php echo "<a class='btn btn-warning btn-block waves-effect' href='#ModalGantiPass' data-toggle='modal' data-href='action/hapus.php?&iduser=".$row['id_user']."'><i class='material-icons' style='font-size: 16px'>delete</i><span>GANTI PASSWORD</span></a>"; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                             
  </div>
</div>


            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusPembina" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Akun Pembina ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>         