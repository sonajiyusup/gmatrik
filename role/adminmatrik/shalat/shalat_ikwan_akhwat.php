<?php 
  include 'functions.php';
 ?>
<section>
	<div class="row clearfix">

    <!-- Line Chart -->
                

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA NILAI PRESENSI SHALAT WAJIB MAHASISWA IKHWAN & AKHWAT
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatIA" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>Ikhwan/Akhwat</th>
                                  <th>Total</th>
                                  <th>Jml Mahasiswa</th>
                                  <th>Jml Udzur</th>
                                  <th>Dispensasi</th>
                                  <th>Maks Jml Shalat</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatIkhwanAkhwat();
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['j_kelamin']; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['jmhs']; ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['total_dispen']; ?></td>
                                  <td><?php echo $row['target_akhir']; ?></td>
                                  <td><?php echo $row['nilai']; ?></td>
                                </tr>
                                <?php } ?>
                              </tbody> 
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->

<!-- Daterange picker import data presensi shalat mahasiswa -->
    <script>
    $(document).ready(function() {
      var t = $('#tableShalatIA').DataTable({});
    } );
    </script> 