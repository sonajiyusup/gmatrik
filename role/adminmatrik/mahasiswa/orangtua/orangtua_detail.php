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
                              
                              <a href="index.php?page=editortu&id=<?php echo $id; ?>" class="btn btn-primary btn-block waves-effect"><i class="material-icons" style='font-size: 16px'>mode_edit</i><span>&nbsp;EDIT DATA PROFIL</span></a>

                              <?php echo "<a class='btn btn-danger btn-block waves-effect' href='#ModalHapusOrtu' data-toggle='modal' data-href='action/hapus.php?idortu=".$row['id']."&iduser=".$row['id_user']."' ><i class='material-icons' style='font-size: 16px'>delete</i><span>&nbsp;HAPUS ORANG TUA MAHASISWA</span></a>"; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                             
  </div>
</div> 

            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusOrtu" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Data Akun Orang Tua Mahasiswa ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>                     