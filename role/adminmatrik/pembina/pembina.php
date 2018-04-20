<?php 
  include 'functions.php';
 ?>

<div class="container-fluid">
	<div class="block-header">
		<h2>PEMBINA MAHASISWA</h2>            
	</div>

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>DATA PEMBINA</h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tableUsers" class="table table-hover table-condensed js-basic-example dataTable ">
						                <thead>
						                  <tr>
						                    <th>#</th>
						                    <th>Nama Pembina</th>
						                    <th>Jumlah Binaan</th>
						                    <th>Ikhwan/Akhwat</th>
						                    <th>Telp</th>
						                    <th>Terakhir Login</th>
						                    <th></th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPembina = tampilPembina();
						                    
						                    $no = 1;
						                    foreach($dataPembina as $row){
						                   ?>
						                <tr>
						                  <td><b><?php echo $no ?></b></td>  
						                  <td><?php echo "<a href='index.php?page=pembinadetails&id=".$row['id_user']."'>".$row['nama']."</a>" ?></td>
						                  <td><?php echo $row['jml_binaan'] ?></td>
						                  <td><?php if($row['j_kelamin'] == 'Ikhwan' || $row['j_kelamin'] == 'Laki-laki'){echo '<span class="label bg-green">Ikhwan</span>';} else if($row['j_kelamin'] == 'Akhwat' || $row['j_kelamin'] == 'Perempuan'){echo '<span class="label bg-yellow">Akhwat</span>';} ?></td>
						                  <td><?php echo $row['telp'] ?></td>
						                  <td><?php if ($row['last_login'] == '0000-00-00 00:00:00'){ echo 'Belum Pernah';}else{ echo date("d-m-Y H:i", strtotime($row['last_login'])) ;}
						                  ?></td>
						                 	<td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a style="color:#3C8DBC;" href="index.php?page=editpembina&id=<?php echo $row['id_pembina']; ?>" class='dropdown-item'><i class='material-icons' style='font-size: 20px'>mode_edit</i></a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><?php echo "<a style='color:#DD4B39;' href='#ModalHapusPembina' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?idpembina=".$row['id_pembina']."&iduser=".$row['id_user']."' aria-hidden='true'><i class='material-icons' style='font-size: 20px'>close</i></a>"; ?></li>
                                    </ul>
                                </div>
						                  	<!-- <div class="dropdown">
						                      <button class="btn btn-default btn-sm dropdown-toggle " type="button" data-toggle="dropdown">
						                        <i class="fa fa-cog fa-lg"></i>&nbsp;&nbsp;<span class="caret"></span>
						                      </button>
						                      <ul class="dropdown-menu">
						                        <li><a style="color:#3C8DBC;" href="index.php?page=editpembina&id=<?php echo $row['id_pembina']; ?>" class='dropdown-item'><i class='fa fa-edit'></i>Edit</a></li>
						                        <li><?php echo "<a style='color:#DD4B39;' href='#ModalHapusPembina' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?idpembina=".$row['id_pembina']."&iduser=".$row['id_user']."' aria-hidden='true'><i class='fa fa-remove'></i>Hapus</a>"; ?></li>
						                        
						                      </ul>
						                    </div> -->
						                  </td>
						                </tr>
						                  <?php 
						                    $no++; }
						                   ?>      
						                </tbody>          
						              </table>
						              <!-- /Table Daftar Pembina -->   
						              </div>                       
                        </div>
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