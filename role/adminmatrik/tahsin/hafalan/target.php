<?php 
  include 'functions2.php';  
 ?>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA TARGET HAFALAN QURAN MAHASISWA
                                <small>Ditentukan Oleh Pimpinan Matrikulasi</small>
                            </h2>
                        </div>
                        <div class="body">
													<div class="table-responsive">
                                <table id="tableTargetHafalan" class="table table-hover table-condensed js-basic-example">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Quran Juz</th>
                                      <th>Nama Juz</th>
                                      <th>Jumlah Surah</th>
                                      <th>Target Semester</th>
                                      <th>Rentang Waktu</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      $targetHafalan = tampilTargetHafalan();
                                      $no = 1;

                                      if (is_array($targetHafalan) || is_object($targetHafalan)){
                                        foreach($targetHafalan as $row){
                                    ?>
                                  <tr >
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['juz']; ?></td>
                                    <td><?php echo $row['nama_juz']; ?></td>
                                    <td><?php echo $row['jumlah_surah']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    <td><?php echo date('F Y', strtotime($row['dari'])).' - '.date('F Y', strtotime($row['sampai'])); ?></td>
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