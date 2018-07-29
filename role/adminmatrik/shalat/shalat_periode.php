<?php 
  include 'functions.php';
  $idPeriod = $_GET['id'];
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=shalat" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;GRAFIK NILAI RATA-RATA PRESENSI SEMUA MAHASISWA
                              <small> Periode : &nbsp;
                                <div class="btn-group">
                                                    <button type="button" class="btn bg-cyan waves-effect dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                                            <li><?php echo '<a href="?page=shalatpdetail&id='.$row['id_periode'].'">'.$row['id_periode'].'. '.date('d M Y', strtotime($row['tanggal_dari'])).' - '.date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></li>
                                                          <?php
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
                                                    $dataNilai = shalatByPeriodID($idPeriod);
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
                                                      $dataTarget = shalatByPeriodID($idPeriod-1);
                                                      foreach ($dataTarget as $row){
                                                       echo '"'.$row['nilai'].'",';
                                                      }
                                                    } else
                                                    if($idPeriod == 1){
                                                      $dataTarget = shalatByPeriodID($idPeriod);
                                                      foreach ($dataTarget as $row){
                                                       echo '"'.$row['nilai'].'",';
                                                      }
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 30, 0.20)',
                                                  backgroundColor: 'rgba(233, 30, 30, 0.2)',
                                                  pointBorderColor: 'rgba(233, 30, 30, 0)',
                                                  pointBackgroundColor: 'rgba(233, 30, 30, 0.4)',
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
                                  <th>Jadwal Pulang</th>
                                  <th>Total</th>
                                  <th>Jml Udzur</th>
                                  <th>Maks</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatByPeriodID($idPeriod);
                                  $no = 1;
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo date('l', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php if($row['plg'] == 'Akhwat'){echo '<span class="label bg-pink">Akhwat</span>';} else if($row['plg'] == 'Ikhwan'){echo '<span class="label bg-cyan">Ikhwan</span>';} ?></td>
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