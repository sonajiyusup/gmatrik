<?php 
  include 'functions.php';
  $idPembina = $_SESSION['id_pembina'];
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>SANKSI
                          <small>Data Pelanggaran Berdasarkan Sanksi</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table class="table table-bordered table-hover table-condensed">
						                <thead>
						                  <tr>
							                    <th>#</th>
							                    <th>Nama Sanksi</th>
							                    <th>Bobot Sanksi</th>
							                    <th>Jumlah Pelanggaran</th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPsanksi = tampilPsanksiByPembina($idPembina);
						                    
						                    $no = 1;
						                  	if (is_array($dataPsanksi) || is_object($dataPsanksi)){
						                    foreach($dataPsanksi as $row){
						                   ?>
						                <tr>
						                  <td><?php echo $no; ?></td>
						                  <td><?php if($row['jumlah'] != 0){echo "<a href=?page=psanksidetail&id=".$row['id_psanksi'].">".$row['nama_sanksi']."</a>";}else{echo $row['nama_sanksi'];} ?></td>
						                  <td><?php echo $row['bobot']; ?></td>
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