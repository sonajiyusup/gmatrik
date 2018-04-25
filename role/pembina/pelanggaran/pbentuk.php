<?php 
  include 'functions.php';
  $idPembina = $_SESSION['id_pembina'];
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>BENTUK PELANGGARAN
                            <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahPbentuk" style="width: 10%;" title="Tambah Master Bentuk Pelanggaran"><i class="material-icons">playlist_add</i></button>
                            <small>Data Pelanggaran Berdasarkan Bentuk</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePbentuk" class="table table-bordered table-hover table-condensed">
						                <thead>
						                  <tr>
							                    <th>#</th>
							                    <th>Bentuk Pelanggaran</th>
							                    <th>Jumlah Pelanggaran</th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPBentuk = tampilPbentukByPembina($idPembina);
						                    
						                    $no = 1;
						                  	if (is_array($dataPBentuk) || is_object($dataPBentuk)){
						                    	foreach($dataPBentuk as $row){
															?>
						                <tr>
						                  <td><?php echo $no; ?></td>
						                  <td><?php if($row['jumlah'] != 0){echo "<a href=?page=pbentukdetail&id=".$row['id_pbentuk'].">".$row['nama_bentuk']."</a>";}else{echo $row['nama_bentuk'];} ?></td>
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

            <div class="modal fade" id="tambahPbentuk" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                	<form method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Tambah Data Master Bentuk Pelanggaran Mahasiswa</h4>
                        </div>
                        <div class="modal-body">     
                        	<div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="pbentuk" name="nama_bentuk" required>
                                            <label class="form-label">Nama Bentuk Pelanggaran</label>
                                        </div>
													</div> 
                    		</div>  
                        <div class="modal-footer">
                            <button type="submit" name="tambahPbentuk" class="btn btn-primary btn-ok waves-effect">SUBMIT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>

    <?php 
      if (isset($_POST['tambahPbentuk'])) {
        tambahPbentuk($_POST['nama_bentuk']);
        echo "<script>document.location='index.php?page=pbentuk'</script>";
      }
    ?>             

    <script>
    $(document).ready(function() {
      var t = $('#tablePbentuk').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>            