<?php 
  include 'functions.php';
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
						                    $dataPsanksi = tampilPsanksi();
						                    
						                    $no = 1;
						                  	if (is_array($dataPsanksi) || is_object($dataPsanksi)){
						                    foreach($dataPsanksi as $row){
						                   ?>
						                <tr>
						                  <td><?php echo $no; ?></td>
						                  <td><a href="?page=psanksidetail&id=<?php echo $row['id_psanksi']; ?> "><?php echo $row['nama_sanksi']; ?></a></td>
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