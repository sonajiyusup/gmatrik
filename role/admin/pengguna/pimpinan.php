<?php 
  include 'functions.php';
 ?>

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR PIMPINAN MATRIKULASI
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePimpinan" class="table table-hover table-condensed">
						                <thead>
						                  <tr>
						                    <th>#</th>
						                    <th>Nama</th>
						                    <th>Username</th>
						                    <th>Terakhir Login</th>
						                    <th></th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
                                  $dataPimpinan = tampilPimpinan();
                                  $no  = 1;
                                  if (is_array($dataPimpinan) || is_object($dataPimpinan)){
                                    foreach($dataPimpinan as $row){ 
                                  
						                   ?>
						                <tr>
						                  <td><?php echo $no ?></td>
						                  <td><?php echo "<a href='index.php?page=pimpinandetails&id=".$row['id_user']."'>".$row['nama']."</a>" ?></td>
						                  <td><?php echo $row['username'] ?></td>
						                  <td><?php if ($row['last_login'] == '0000-00-00 00:00:00'){ echo 'Belum Pernah';}else{ echo date("d-m-Y H:i", strtotime($row['last_login'])) ;}
						                  ?></td>
						                 	<td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a title='Edit' style="color:#3C8DBC;" href="?page=editpimpinan&id=<?php echo $row['id_user']; ?>" class='dropdown-item'><i class='material-icons' style='font-size: 20px'>mode_edit</i></a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><?php echo "<a title='Hapus' style='color:#DD4B39;' href='#ModalHapusAdminMatrik' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?idpimpinan=".$row['id_pimpinan']."&iduser=".$row['id_user']."' aria-hidden='true'><i class='material-icons' style='font-size: 20px'>delete</i></a>"; ?></li>
                                                    </ul>
                                                </div>
						                  </td>
						                </tr>
						                  <?php 
						                    $no++; }
                              }
						                   ?>      
						                </tbody>          
						              </table>
						              <!-- /Table Daftar Pembina -->   
						        </div>                       
                        </div>
                    </div>
                </div>
            </div>

            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusPimpinan" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Data Pimpinan ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>


    <script>
    $(document).ready(function() {
      var t = $('#tablePimpinan').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,4]}
            ]
        } );

    } );
    </script>    