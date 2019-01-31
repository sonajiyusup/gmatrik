<?php 
  include 'functions.php';
  $wkt = $_GET['w'];
 ?>

  <div class="row clearfix">
    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                          <a href="?page=shalatw" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                          GRAFIK NILAI PRESENSI SHALAT MAHASISWA&nbsp;
                              <?php 
                                    
                                      $percent = shalatByWktDetailPercent($wkt);
                                      foreach ($percent as $row){
                                        if ($row['a'] > $row['b']) {
                                          echo 
                                          '<span class="label bg-red">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_down</i>
                                          '.$row['percent'].'% dibandingkan rata-rata semua waktu shalat
                                          </span>';
                                        } else
                                        if ($row['a'] < $row['b']) {
                                          echo 
                                          '<span class="label bg-green">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_up</i>
                                             +'.$row['percent'].'% dibandingkan rata-rata semua waktu shalat
                                          </span>';
                                        } 
                                      }
                                    
                                  ?>
                                  </h2>
                          <small>
                          Berdasarkan Waktu Shalat : 
                                <div class="btn-group">
                                                    <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php echo ucfirst($wkt); ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><?php echo '<a href="?page=shalatwdetail&w=shubuh">Shubuh</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwdetail&w=dzuhur">Dzuhur</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwdetail&w=ashar">Ashar</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwdetail&w=maghrib">Maghrib</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwdetail&w=isya">Isya</a>'; ?></li>
                                                    </ul>
                                                </div>                            
                          </small>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="70"></canvas>
                        </div>
                        <script type="text/javascript">
                          $(function () {
                              new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
                          });

                          function getChartJs(type) {
                              var config = null;

                              if (type === 'line') {
                                  config = {
                                      type: 'line',
                                      data: {
                                          labels: [<?php
                                                    $dataPeriode = tampilPeriodeShalat();
                                                    foreach ($dataPeriode as $row){
                                                     echo '"'.$row['id_periode'].'",';
                                                    }
                                                  ?>],
                                                  datasets: [{
                                                      label: "Nilai Rata-rata Waktu Shalat <?php echo $wkt; ?>",
                                                      data: [<?php
                                                            $dataNilai = shalatByWktDetail($wkt);
                                                            foreach ($dataNilai as $row){
                                                             echo '"'.$row['nilai'].'",';
                                                            }
                                                          ?>],
                                                      borderColor: 'rgba(0, 188, 212, 0.75)',
                                                      backgroundColor: 'rgba(0, 188, 212, 0.3)',
                                                      pointBorderColor: 'rgba(0, 188, 212, 0)',
                                                      pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                                                      pointBorderWidth: 1
                                                  }, {
                                                  label: "Nilai Rata-rata Semua Waktu Shalat",
                                                  data: [<?php
                                                      $dataTarget = shalatNilaiSemua();
                                                      foreach ($dataTarget as $row){
                                                       echo '"'.$row['nilai'].'",';
                                                      }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.75)',
                                                  backgroundColor: 'rgba(200, 30, 99, 0.3)',
                                                  pointBorderColor: 'rgba(200, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(200, 30, 99, 0.9)',
                                                  pointBorderWidth: 1
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
                          <h2>DATA NILAI PRESENSI SHALAT MAHASISWA <br><small>
                              Waktu Shalat : 
                              <span class="label bg-cyan">
                                <?php echo ucfirst($wkt); ?>
                              </span>
                              </small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatWktDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Periode</th>
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
                                  $data = shalatByWktDetail($wkt);
                                  foreach($data as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo '<a href="?page=shalatwperiod&p='.$row['id_periode'].'&w='.$wkt.'">'.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></td>
                                  <td><?php echo $row['fingerprint']; ?></td>
                                  <td><?php echo $row['manual']; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['total_jplg']; ?></td>
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
      var t = $('#tableShalatWktDetail').DataTable({});
    } );
    </script> 