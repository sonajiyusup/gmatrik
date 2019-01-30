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
                          <h2>DATA PEMBINA MAHASISWA &nbsp;&nbsp;&nbsp;
                          <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahPembina" title="Tambah Data Pembina Mahasiswa"><i class="material-icons">get_app</i><span>TAMBAH DATA</span></button>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePembina" class="table table-hover table-condensed">
						                <thead>
						                  <tr>
						                    <th>#</th>
						                    <th>Nama</th>
                                <th>Gelar</th>
						                    <th>Ikhwan/Akhwat</th>
                                <th>Kota Asal</th>
						                    <th>Telepon</th>
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
						                  <td><?php echo $row['nama'];?></td>
						                  <td><?php echo $row['gelar'] ?></td>
						                  <td><?php if($row['gender'] == 'Ikhwan' || $row['gender'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['gender'] == 'Akhwat' || $row['gender'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                              <td><?php echo $row['kota_asal'] ?></td>
						                  <td><?php echo $row['telepon'] ?></td>
						                  
						                 	<td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a title='Edit' style="color:#3C8DBC;" href="?page=editpembina&id=<?php echo $row['id_pembina']; ?>" class='dropdown-item'><i class='material-icons' style='font-size: 20px'>mode_edit</i></a></li>
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
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">school</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="gelar" class="form-control" placeholder="Gelar">
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
                                            <input type="text" name="kotaasal" class="form-control" placeholder="Kota Asal" required>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control" placeholder="Telepon" required>
                                        </div>
                                  </div>
                                </div><br>
                                <label>Data User</label>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control" placeholder="Username (Digunakan untuk Login Sistem)" required>
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
        tambahPembinaNew($_POST['nama'], $_POST['gelar'], $_POST['gender'], $_POST['kotaasal'],  $_POST['telp'], $_POST['username']);
        
        echo "<script>document.location='?page=pembina'</script>";
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