<?php 
  include 'functions2.php';  
 ?>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PENYETORAN HAFALAN QURAN MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
													<div class="table-responsive">
                                <table id="tabledata" class="table table-hover table-condensed js-basic-example">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Tanggal</th>
                                      <th>Jumlah Penyetoran Hafalan Quran</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      $data = tampilSetorHafalanRoleAdminmatrik();
                                      $no = 1;

                                      if (is_array($data) || is_object($data)){
                                        foreach($data as $row){
                                    ?>
                                  <tr >
                                    <td><?php echo $no; ?></td>
                                    <td><a href="?page=setordetail&t=<?php echo $row['tanggal_setor']; ?>"><?php echo date('d-M-Y', strtotime($row['tanggal_setor'])); ?></a></td>
                                    <td><?php echo $row['jmlsetor']; ?></td>
                                    
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