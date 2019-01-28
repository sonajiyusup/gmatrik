<?php 
  include 'functions.php';

 ?>

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php 
              if (isset($_GET['alert'])) {
                if ($_GET['alert'] == 'duplicateusername') {
                	echo "<div class='alert bg-red alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <strong>Tambah Pembina Gagal !</strong> Username tidak boleh sama
                            </div>";
                }
              }
             ?>                  
                    <div class="card">
                        <div class="header">
<<<<<<< HEAD
                          <h2>DATA PEMBINA MAHASISWA &nbsp;&nbsp;&nbsp;
                          <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahPembina" title="Import Database Mahasiswa"><i class="material-icons">get_app</i><span>TAMBAH DATA</span></button>
=======
                          <h2>DAFTAR PEMBINA MAHASISWA 
                            <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahDataPembina" style="width: 10%;" title="Tambah Data Pembina"><i class="material-icons">playlist_add</i></button>
>>>>>>> 41e6b1f362a61afe63eb6a87d87e3e755127a766
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePembina" class="table table-hover table-condensed">
						                <thead>
						                  <tr>
						                    <th>#</th>
						                    <th>Nama Pembina Mahasiswa</th>
						                    <th>Jumlah Binaan</th>
						                    <th>Ikhwan/Akhwat</th>
						                    <!-- <th>Telp</th> -->
						                    <th>Terakhir Login</th>
						                    <th>Aksi</th>
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
						                  <td><?php echo "<a href='index.php?page=pembinadetails&id=".$row['id_user']."&idP=".$row['id_pembina']."' style='text-decoration:none'>".$row['nama']."</a>" ?></td>
						                  <td><?php echo $row['jml_binaan'] ?></td>
						                  <td><?php if($row['j_kelamin'] == 'Ikhwan' || $row['j_kelamin'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['j_kelamin'] == 'Akhwat' || $row['j_kelamin'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
						                  <!-- <td><?php echo $row['telp'] ?></td> -->
						                  <td><?php if ($row['last_login'] == '0000-00-00 00:00:00'){ echo 'Belum Pernah';}else{ echo date("d-m-Y H:i", strtotime($row['last_login'])) ;}
						                  ?></td>
						                 	<td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a title='Edit' style="color:#3C8DBC;" href="?page=editpembina&id=<?php echo $row['id_user']; ?>&idP=<?php echo $row['id_pembina']; ?>" class='dropdown-item'><i class='material-icons' style='font-size: 20px'>mode_edit</i></a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><?php echo "<a title='Hapus' style='color:#DD4B39;' href='#ModalHapusPembina' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?idpembina=".$row['id_pembina']."&iduser=".$row['id_user']."' aria-hidden='true'><i class='material-icons' style='font-size: 20px'>delete</i></a>"; ?></li>
                                                    </ul>
                                                </div>
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
                            <h4 class="modal-title" id="smallModalLabel">Hapus Data Pembina ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="tambahPembina" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                	<form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data Pembina Mahasiswa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Nama" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">school</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="gelar" class="form-control date" placeholder="Gelar">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_outline</i>
                                        </span>
                                        <select class="form-control show-tick" name="gender" required>
	                                        <option value="">-- Ikhwan/Akhwat --</option>
	                                        <option value="Ikhwan">Ikhwan</option>
	                                        <option value="Akhwat">Akhwat</option>
                                    	</select>                                            
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control date" placeholder="Email" required>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="Telepon" required>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control date" placeholder="Username" required>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="password" class="form-control date" placeholder="Password" required>
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambahPembina" class="btn btn-primary waves-effect" style="width: 16.66666666666667%;">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>

    <?php 
      if (isset($_POST['tambahPembina'])) {
        tambahPembina($_POST['nama'], $_POST['gender'], date("Y-m-d", strtotime($_POST['tgl_lahir'])), $_POST['gelar'], $_POST['asalkota'], $_POST['email'], $_POST['telp'], $_POST['username'], $_POST['password']);
        
        //echo "<script>document.location='?page=pembina'</script>";
      }
    ?> 

    <script>
    $(document).ready(function() {
      var t = $('#tablePembina').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,6]}
            ]
        } );

    } );
    </script>    


<div class="modal fade" id="tambahDataPembina" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                	<form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data Mahasiswa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                            		<div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">account_box</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Nomor Induk Mahasiswa (akan menjadi username untuk keperluan login sistem)" disabled="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Nama" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <div class="col-sm-12">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">school</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Gelar" required>
                                        </div>
                                  </div>
                                  </div> -->
                                
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_outline</i>
                                        </span>
                                        <select class="form-control show-tick" name="gender" required>
	                                        <option value="">-- Ikhwan/Akhwat --</option>
	                                        <option value="Ikhwan">Ikhwan</option>
	                                        <option value="Akhwat">Akhwat</option>
                                    	</select>                                            
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">bookmark</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="Angkatan" required>
                                        </div>
                                  </div>
                                </div>

                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="Kota Asal" required>
                                        </div>
                                  </div>
                                </div>

                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="No Telp." required>
                                        </div>
                                  </div>
                                </div>
                                 <br><br>
                                <!--<h5 align="center">Data User</h5><br>
                                 <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control date" placeholder="Username" required>
                                        </div>
                                  </div>
                                </div> 
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="password" class="form-control date" placeholder="Password" required>
                                        </div>
                                  </div>
                                </div> 
                                -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambahPembina" class="btn btn-primary waves-effect" style="width: 16.66666666666667%;">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>    