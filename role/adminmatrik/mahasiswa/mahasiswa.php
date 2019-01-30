<?php 
  include 'functions.php';
 ?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA MAHASISWA &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahDataMahasiswa" title="Tambah Data Mahasiswa"><i class="material-icons">get_app</i><span>TAMBAH DATA</span></button>
                          </h2>
                        </div>
                        <div class="body ">
                            <div class="table-responsive">
                                
                                      <table id="tableMahasiswa" class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Ikhwan/Akhwat</th>
                                            <th>Pembina</th>
                                            <th>Angkatan</th>
                                            <th>Kota Asal</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $dataMahasiswa = tampilMahasiswa();
                                            
                                            $no = 1;
                                            foreach($dataMahasiswa as $row){
                                           ?>
                                        <tr>
                                          <td><b><?php echo $no ?></b></td>  
                                          <td><?php echo $row['nim'];?></td>
                                          <td><?php echo $row['nama'] ?></td>
                                          <td><?php if($row['gender'] == 'Ikhwan' || $row['gender'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['gender'] == 'Akhwat' || $row['gender'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                                          <td><?php echo $row['namapembina'] ?></td>
                                          <td><?php echo $row['angkatan'] ?></td>
                                          <td><?php echo $row['kota_asal'] ?></td>
                                          <td><?php echo $row['telepon'] ?></td>
                                          <td><?php if ($row['aktif'] == 0){ echo 'Tidak Aktif';}else{ echo 'Aktif' ;}?></td>
                                          <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a title='Edit' style="color:#3C8DBC;" href="?page=editmahasiswa&nim=<?php echo $row['nim'];?>" class='dropdown-item'><i class='material-icons' style='font-size: 20px'>mode_edit</i></a></li>
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

<!-- 	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA MAHASISWA &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#importMhsModal" title="Import Database Mahasiswa"><i class="material-icons">get_app</i><span>IMPORT DATA</span></button>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
								
						              <table id="tablePembina" class="table table-hover table-condensed">
						                <thead>
						                  <tr>
						                  	<th></th>
						                  	<th></th>
						                    <th></th>
						                    <th>NIM</th>
						                    <th>Nama</th>
						                    <th>Ikhwan/Akhwat</th>
						                    <th>Terakhir Login</th>
						                    <th>Aksi</th>
						                  </tr>
						                </thead>
						              </table>
						            
						              </div>                       
                        </div>
                    </div>
                </div>
            </div> -->

<div class="modal fade" id="tambahDataMahasiswa" tabindex="-1" role="dialog">
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
                                            <input type="number" name="nim" class="form-control date" placeholder="Nomor Induk Mahasiswa (akan menjadi username untuk keperluan login sistem)" required>
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
                                            <i class="material-icons">person_outline</i>
                                        </span>
                                        <select class="form-control show-tick" data-live-search="true" name="idPembina" required>
                                                        <option value="" selected>-- Pilih Pembina Mahasiswa --</option>
                                                        <?php $namaMhs = tampilPembina();
                                                          foreach($namaMhs as $row){
                                                            echo '<option value="'.$row['id_pembina'].'">'.$row['nama'].'</option>';
                                                          } 
                                                        ?>
                                        </select>                                           
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">bookmark</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="angkatan" class="form-control date" placeholder="Angkatan" required>
                                        </div>
                                  </div>
                                </div>

                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="kotaasal" class="form-control date" placeholder="Kota Asal" required>
                                        </div>
                                  </div>
                                </div>

                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="telepon" class="form-control date" placeholder="No Telp.">
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
                            <button type="submit" name="tambahMahasiswa" class="btn btn-primary btn-block waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link btn-block waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>   


            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusMahasiswa" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Data Mahasiswa ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>

<!--             <div class="modal fade" id="importMhsModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <form method="post">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">IMPORT DATA MAHASISWA DARI DATABASE</h4>
                        </div>
                        <div class="modal-body">
	                        <div class="row">
		                        <div class="col-lg-12">
		                        	<label>Pilih Tahun Angkatan</label>
		                          <select class="form-control show-tick" name="angkatan" required>
		                            <option value="17">17</option>
                                    <option value="18">18</option>
		                          </select> 
		                        </div>
	                      	</div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="importMahasiswa">IMPORT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>  -->

    <?php 

      if (isset($_POST['tambahMahasiswa'])) {
        tambahMahasiswa($_POST['nim'], $_POST['idPembina'], $_POST['nama'], $_POST['gender'], $_POST['angkatan'], $_POST['kotaasal'], $_POST['telepon']);
        echo "<script>document.location='index.php?page=mahasiswa'</script>";
      }

/*      if (isset($_POST['importMahasiswa'])) {
        importMahasiswa($_POST['angkatan']);
        echo "<script>document.location='index.php?page=mahasiswa'</script>";
      }*/
    ?>

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
      var t = $('#tableMahasiswa').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,6]}
            ]
        } );

    } );
    </script>        