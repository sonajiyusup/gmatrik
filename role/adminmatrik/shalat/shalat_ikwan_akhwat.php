<?php 
  include 'functions.php';
 ?>
<section>
	<div class="row clearfix">
    <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK NILAI RATA-RATA PRESENSI SHALAT MAHASISWA
                              <small>Berdasarkan Ikhwan Akhwat</small>
                            </h2>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="55"></canvas>
                        </div>
                        <script type="text/javascript">
                          $(function () {
                              new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
                          });

                          function getChartJs(type) {
                              var config = null;

                              if (type === 'bar') {
                                  config = {
                                      type: 'bar',
                                      data: {
                                          labels: [<?php
                                                    $data = shalatIkhwanAkhwat();
                                                    foreach ($data as $row){
                                                     echo '"'.$row['j_kelamin'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Rata-rata Mhs Binaan",
                                              data: [<?php
                                                    $dataNilai = shalatIkhwanAkhwat();
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['nilai'].'",';
                                                    }
                                                  ?>],
                                              backgroundColor: 'rgba(0, 188, 212, 0.8)',
                                          }]
                                      },
                                      options: {
                                          responsive: true,
                                          legend: false
                                      }
                                  }
                              }
                              return config;
                          }                          
                        </script>
                    </div>
                </div>

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
                                  <th>Jml Mahasiswa</th>
                                  <th>Jml Hari</th>
                                  <th>Fingerprint</th>
                                  <th>Manual</th>
                                  <th>Total</th>
                                  <th>Dispensasi Pulang</th>
                                  <th>Udzur</th>
                                  <th>Target</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatIkhwanAkhwat();
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo '<a href="?page=shalatiadetail&j='.$row['j_kelamin'].'">'.$row['j_kelamin'].'</a>'; ?></td>
                                  <td><?php echo $row['jmhs']; ?></td>
                                  <td><?php echo $row['jhari']; ?></td>
                                  <td><?php echo $row['fingerprint']; ?></td>
                                  <td><?php echo $row['manual']; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['jplg']; ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['target2']; ?></td>
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