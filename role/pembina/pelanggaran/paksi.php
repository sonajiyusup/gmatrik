<?php 
  include 'functions.php';
  $idPembina = $_SESSION['id_pembina'];
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>AKSI PELANGGARAN
                            <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahPaksi" style="width: 10%;" title="Tambah Master Aksi Pelanggaran"><i class="material-icons">playlist_add</i></button>
                            <small>Data Pelanggaran Berdasarkan Aksi</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePaksi" class="table table-bordered table-hover table-condensed">
						                <thead>
						                  <tr>
							                    <th>#</th>
							                    <th>Aksi Pelanggaran</th>
							                    <th>Jumlah Pelanggaran</th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPaksi = tampilPaksiByPembina($idPembina);
						                    
						                    $no = 1;
						                  	if (is_array($dataPaksi) || is_object($dataPaksi)){
						                    	foreach($dataPaksi as $row){

						                   ?>
						                <tr>
						                  <td><?php echo $no; ?></td>
						                  <td><?php if($row['jumlah'] != 0){echo "<a href=?page=paksidetail&id=".$row['id_paksi'].">".$row['nama_aksi']."</a>";}else{echo $row['nama_aksi'];} ?></td>
						                  <td><?php echo $row['jumlah']; ?></td>
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

            <div class="modal fade" id="tambahPaksi" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                	<form method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Tambah Data Master Aksi Pelanggaran Mahasiswa</h4>
                        </div>
                        <div class="modal-body">   
                        	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" id="paksi" name="nama_aksi" required>
	                                            <label class="form-label">Nama Aksi Pelanggaran</label>
	                                        </div>
														
													</div>
													<div class="form-group">
                          
	                            <select id="pbentuk" name="idPbentuk" class="form-control" required>
	                                <option value="">-- Pilih Bentuk Pelanggaran --</option>
	                                <?php
	                                  $namaPbentuk = tampilPbentukAsModal();

	                                  if (is_array($namaPbentuk) || is_object($namaPbentuk)){
	                                    foreach($namaPbentuk as $row){
	                                ?>
	                                    <option id="pbentuk" class="<?php echo $row['id_pbentuk']; ?>" value="<?php echo $row['id_pbentuk']; ?>">
	                                        <?php echo $row['nama_bentuk']; ?>
	                                    </option>
	                                <?php
	                                   }
	                                  }
	                                ?>
	                            </select>  
	                            <br>
	                          
                        	</div>
                    		</div>  
                        <div class="modal-footer">
                            <button type="submit" name="tambahPaksi" class="btn btn-primary btn-ok waves-effect">SUBMIT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>

    <?php 
      if (isset($_POST['tambahPaksi'])) {
        tambahPaksi($_POST['idPbentuk'], $_POST['nama_aksi']);
        echo "<script>document.location='index.php?page=paksi'</script>";
      }
    ?> 


    <script>
    $(document).ready(function() {
      var t = $('#tablePaksi').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>            