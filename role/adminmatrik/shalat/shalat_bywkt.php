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
                              <small>Berdasarkan Waktu Shalat</small>
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
                                          labels: ["Shubuh","Dzuhur","Ashar","Maghrib","Isya"],
                                          datasets: [{
                                              label: "Nilai",
                                              data: [<?php
                                                    $dataNilai = shalatByWkt();
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
                          <h2>DATA NILAI PRESENSI SHALAT WAJIB MAHASISWA
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatMhs" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Waktu Shalat</th>
                                  <th>Fingerprint</th>
                                  <th>Manual</th>
                                  <th>Total</th>
                                  <th>Jml Hari</th>
                                  <th>Dispensasi Pulang</th>
                                  <th>Udzur</th>
                                  <th>Target</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $dataPresensi = shalatByWkt();
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo '<a href="?page=shalatwdetail&w='.$row['wkt_shalat'].'">'.ucfirst($row['wkt_shalat']).'</a>' ?></td>
                                  <td><?php echo $row['fingerprint']; ?></td>
                                  <td><?php echo $row['manual']; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['jtgl']; ?></td>
                                  <td><?php echo $row['jplg']; ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['target2']; ?></td>
                                  <td><?php echo $row['nilai']; ?></td>
                                </tr>
                                <?php $no++; } ?>
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
      var t = $('#tableShalatMhs').DataTable({});
    } );
    </script> 