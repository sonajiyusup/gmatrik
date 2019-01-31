<?php 
  include 'functions.php';
  $jKelamin = $_GET['j'];
  $idPeriod = $_GET['p'];
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=shalatiadetail&j=<?php echo $jKelamin; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;GRAFIK NILAI RATA-RATA PRESENSI MAHASISWA &nbsp; 

                              <?php 
                                    if($idPeriod != 1){
                                      $percent = percenIAByPeriod($jKelamin, ($idPeriod-1), $idPeriod);
                                      foreach ($percent as $row){
                                        if ($row['a'] > $row['b']) {
                                          echo 
                                          '<span class="label bg-red">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_down</i>
                                          '.$row['percent'].'% dibandingkan periode sebelumnya
                                          </span>';
                                        } else
                                        if ($row['a'] < $row['b']) {
                                          echo 
                                          '<span class="label bg-green">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_up</i>
                                             +'.$row['percent'].'% dibandingkan periode sebelumnya
                                          </span>';
                                        } 
                                      }
                                    }
                                  ?>
                              <small> Periode : &nbsp;
                                <div class="btn-group">
                                                    <button type="button" class="btn <?php if($jKelamin == 'Akhwat'){echo 'bg-pink';}else if($jKelamin == 'Ikhwan'){echo 'bg-cyan';} ?> waves-effect dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php $dataPresensi = tampilTglPeriodeById($idPeriod);
                                                          foreach($dataPresensi as $row){
                                                            echo $row['id_periode'].'. '.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']));
                                                          } 
                                                        ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                          $dataPeriode = tampilPeriodeShalat();
                                                          foreach($dataPeriode as $row){
                                                          ?>
                                                            <li><?php echo '<a href="?page=shalatiabyperiod&j='.$jKelamin.'&p='.$row['id_periode'].'">'.$row['id_periode'].'. '.date('d M Y', strtotime($row['tanggal_dari'])).' - '.date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></li>
                                                          <?php
                                                          }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <div class="btn-group">
                                                    <button type="button" class="btn <?php if($jKelamin == 'Akhwat'){echo 'bg-pink';}else if($jKelamin == 'Ikhwan'){echo 'bg-cyan';} ?> waves-effect dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php 
                                                          if($jKelamin == 'Akhwat'){echo 'AKHWAT';}else if($jKelamin == 'Ikhwan'){echo 'IKHWAN';}
                                                        ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <?php 
                                                        if ($jKelamin == 'Ikhwan') {
                                                          echo '<li><a href="?page=shalatiabyperiod&j=Ikhwan&p='.$idPeriod.'">IKHWAN</a></li>
                                                                <li><a href="?page=shalatiabyperiod&j=Akhwat&p='.$idPeriod.'">AKHWAT</a></li>';
                                                        } else
                                                        if ($jKelamin == 'Akhwat') {
                                                          echo '<li><a href="?page=shalatiabyperiod&j=Akhwat&p='.$idPeriod.'">AKHWAT</a></li>
                                                                <li><a href="?page=shalatiabyperiod&j=Ikhwan&p='.$idPeriod.'">IKHWAN</a></li>';
                                                        }
                                                       ?>
                                                    </ul>
                              </div>
                              </small>
                            </h2>
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
                                                    $dataPeriode = shalatByPeriodID($idPeriod);
                                                    foreach ($dataPeriode as $row){
                                                      echo '"'.date('l', strtotime($row['tanggal'])).'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Harian Rata-rata",
                                              data: [<?php
                                                    $dataNilai = shalatIAByPeriodDetail($jKelamin, $idPeriod);
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
                                                  label: "Hari Yang Sama Pada Periode Sebelumnya",
                                                  data: [<?php

                                                    if($idPeriod != 1){
                                                      $dataTarget = shalatIAByPeriodDetail($jKelamin, $idPeriod-1);
                                                      foreach ($dataTarget as $row){
                                                       echo '"'.$row['nilai'].'",';
                                                      }
                                                    } else
                                                    if($idPeriod == 1){
                                                      $dataTarget = shalatIAByPeriodDetail($jKelamin, $idPeriod);
                                                      foreach ($dataTarget as $row){
                                                       echo '"'.$row['nilai'].'",';
                                                      }
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
                          <h2>DATA NILAI RATA-RATA PRESENSI MAHASISWA
                            <small> Periode :&nbsp; 
                              <span class="label bg-cyan">
                                <?php $dataPresensi = tampilTglPeriodeById($idPeriod);
                                  foreach($dataPresensi as $row){
                                    echo date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']));
                                  } 
                                ?>
                              </span>
                            </small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatIkhtisarDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Hari</th>
                                  <th>Tanggal</th>
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
                                  $dataPresensi = shalatIAByPeriodDetail($jKelamin, $idPeriod);
                                  $no = 1;
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo '<a href="?page=shalatiabyday&j='.$jKelamin.'&p='.$idPeriod.'&t='.date('Ymd', strtotime($row['tanggal'])).'">'.date('l', strtotime($row['tanggal'])).'</a>'; ?></td> 
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['fingerprint']; ?></td>
                                  <td><?php echo $row['manual']; ?></td>
                                  <td><?php echo $row['total']; ?></td>
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
      var t = $('#tableShalatIkhtisarDetail').DataTable({});
    } );
    </script> 