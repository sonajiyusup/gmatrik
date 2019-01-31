<?php 
  include 'functions.php';
 ?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA USER &nbsp;&nbsp;&nbsp;
                            <!-- <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#importMhsModal" title="Tambah Data Mahasiswa"><i class="material-icons">get_app</i><span>IMPORT DATA</span></button> -->
                          </h2>
                        </div>
                        <div class="body ">
                            <div class="table-responsive">
                                
                                      <table id="tableUser" class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Password Default</th>
                                            <th>Level Akses</th>
                                            <th>Terakhir Login</th>
                                            <th>Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $dataUser = tampilUsers();
                                            
                                            $no = 1;
                                            foreach($dataUser as $row){
                                           ?>
                                        <tr>
                                          <td><b><?php echo $no; ?></b></td>  
                                          <td><?php echo $row['username'];?></td>
                                          <td><?php if($row['password_default'] == 0){echo '<span class="label bg-light-blue">Sudah Diganti</span>';} else {echo $row['password'];} ?></td>
                                          <td><?php if($row['level'] == 1){echo 'Admin Matrikulasi';}else if($row['level'] == 2){echo 'Pembina Mahasiswa';}else if($row['level'] == 3){echo 'Mahasiswa';}else if($row['level'] == 4){echo 'Pimpinan';} ?></td>
                                          <td><?php if($row['terakhir_login'] == NULL){echo 'Belum Pernah';}else{echo $row['terakhir_login'];} ?></td>
                                          <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                
                                                                  <?php if($row['password_default'] == 0){echo "<li><a title='Reset Password ke Default' style='color:#3C8DBC;' href='#ResetPassword' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?iduser=".$row['id_user']."' aria-hidden='true'><i class='material-icons' style='font-size: 20px'>lock</i></a>
                                                                </li>";} ?>
                                                                </ul>
                                                            </div>
                                          </td>
                                        </tr>
                                          <?php 
                                            $no++; }
                                           ?>      
                                        </tbody> 
                                      </table>
                                    
                                      </div>                       
                        </div>
                    </div>
                </div>
            </div> 

    </section>
    <!-- /.content -->

    <script>
/*    $(document).ready(function() {
      var t = $('#tablePembina').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "/gmatrik/dataMahasiswa.php",
            "order": [[ 4, "asc" ]],
            "columnDefs": [
              { "visible": false, "targets": [0,1,2]},
              { "searchable": false, "orderable": false, "targets": [5,6,7]}
            ]
        } );

    } );*/
    </script>

    <script>
    $(document).ready(function() {
      var t = $('#tableUser').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,5]}
            ]
        } );

    } );
    </script>        


            <div class="modal fade" id="ResetPassword" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Reset Password Ke Default ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-warning btn-ok waves-effect">RESET</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>    