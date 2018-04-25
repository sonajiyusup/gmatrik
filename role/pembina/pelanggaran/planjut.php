<?php 
  include 'functions.php';
  $idPembina = $_SESSION['id_pembina'];
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>TINDAK LANJUT
                          <small>Data Pelanggaran Berdasarkan Tindak Lanjut</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePlanjut" class="table table-bordered table-hover table-condensed">
						                <thead>
						                  <tr>
							                  <th>Level</th>
						                    <th>Tindak Lanjut</th>
						                    <th>Jumlah Pelanggaran</th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPlanjut = tampilPlanjutByPembina($idPembina);
						                    
						                    $no = 1;
						                  	if (is_array($dataPlanjut) || is_object($dataPlanjut)){
						                    foreach($dataPlanjut as $row){
						                   ?>
							                <tr>
							                  <td><?php echo $row['level']; ?></td>
							                  <td><?php if($row['jumlah'] != 0){echo "<a href=?page=planjutdetail&id=".$row['id_planjut'].">".$row['nama_tindaklanjut']."</a>";}else{echo $row['nama_tindaklanjut'];} ?></td>
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

    <script>
    $(document).ready(function() {
      var t = $('#tablePlanjut').DataTable();
    } );
    </script>            