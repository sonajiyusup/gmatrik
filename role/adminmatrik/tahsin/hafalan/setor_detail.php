<?php 
  include 'functions2.php';  
  $tgl = $_GET['t'];
 ?>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <a href="?page=setorhafalan" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;DATA PENYETORAN HAFALAN QURAN MAHASISWA
                                <small><?php echo  date('d F Y', strtotime($tgl)); ?></small>
                            </h2>
                        </div>
                        <div class="body">
													<div class="table-responsive">
                                <table id="tabledata" class="table table-hover table-condensed js-basic-example">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nama Mahasiswa</th>
                                      <th>Pembina</th>
                                      <th>No Surah</th>
                                      <th>Nama Surah</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      $data = tampilSetorHafalanDetailRoleAdminmatrik($tgl);
                                      $no = 1;

                                      if (is_array($data) || is_object($data)){
                                        foreach($data as $row){
                                    ?>
                                  <tr >
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['pembina']; ?></td>
                                    <td><?php echo $row['no_surah']; ?></td>
                                    <td><?php echo $row['nama_surah']; ?></td>
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