<?php 
  include 'functions.php';
 ?>
<section>
	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK NILAI RATA-RATA PRESENSI IKHWAN</h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart_ikhwan" height="150"></canvas>
                        </div>
                        <script type="text/javascript">
                          $(function () {
                              new Chart(document.getElementById("line_chart_ikhwan").getContext("2d"), getChartJs('line'));
                          });

                          function getChartJs(type) {
                              var config_ikhwan = null;

                              if (type === 'line') {
                                  config_ikhwan = {
                                      type: 'line',
                                      data: {
                                          labels: [<?php
                                                    $dataPeriode = tampilPeriodeShalat();
                                                    foreach ($dataPeriode as $row){
                                                     echo '"'.$row['id_periode'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Rata-rata Ikhwan",
                                              data: [<?php
                                                    $dataNilaiAkhwat = shalatNilaiIkhwan();
                                                    foreach ($dataNilaiAkhwat as $row){
                                                     echo '"'.$row['nilai_ikhwan'].'",';
                                                    }
                                                  ?>],
                                              borderColor: 'rgba(0, 188, 212, 0.75)',
                                              backgroundColor: 'rgba(0, 188, 212, 0.3)',
                                              pointBorderColor: 'rgba(0, 188, 212, 0)',
                                              pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                                              pointBorderWidth: 1
                                          }, {
                                                  label: "Rata-rata Jumlah Maksimal Shalat",
                                                  data: [<?php
                                                    $dataTarget = shalatNilaiIkhwan();
                                                    foreach ($dataTarget as $row){
                                                     echo '"'.$row['target'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.75)',
                                                  pointBorderColor: 'rgba(233, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                                                  pointBorderWidth: 1
                                              }, {
                                                  label: "Rata-rata Jumlah Shalat",
                                                  data: [<?php
                                                    $dataJmlSlt = shalatNilaiIkhwan();
                                                    foreach ($dataJmlSlt as $row){
                                                     echo '"'.$row['jmlrt'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(173, 66, 244, 0.75)',
                                                  pointBorderColor: 'rgba(173, 66, 244, 0)',
                                                  pointBackgroundColor: 'rgba(173, 66, 244, 0.9)',
                                                  pointBorderWidth: 1
                                              }]
                                      },
                                      options: {
                                          responsive: true,
                                          legend: false
                                      }
                                  }
                              }
                              return config_ikhwan;
                          }                          
                        </script>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK NILAI RATA-RATA PRESENSI AKHWAT</h2>
                        </div>
                        <div class="body">
                            <canvas id="chart_akhwat" height="150"></canvas>
                        </div>
                        <script type="text/javascript">
                          $(function () {
                              var Chart(document.getElementById("chart_akhwat").getContext("2d"), getChartJs('line'));
                          });

                          function getChartJs(type) {
                              var config_akhwat = null;

                              if (type === 'line') {
                                  config_akhwat = {
                                      type: 'line',
                                      data: {
                                          labels: [<?php
                                                    $dataPeriode = tampilPeriodeShalat();
                                                    foreach ($dataPeriode as $row){
                                                     echo '"'.$row['id_periode'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Rata-rata Akhwat",
                                              data: [<?php
                                                    $dataNilaiIkhwan = shalatNilaiAkhwat();
                                                    foreach ($dataNilaiIkhwan as $row){
                                                     echo '"'.$row['nilai_akhwat'].'",';
                                                    }
                                                  ?>],
                                              borderColor: 'rgba(0, 188, 212, 0.75)',
                                              backgroundColor: 'rgba(0, 188, 212, 0.3)',
                                              pointBorderColor: 'rgba(0, 188, 212, 0)',
                                              pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                                              pointBorderWidth: 1
                                          }, {
                                                  label: "Rata-rata Jumlah Maksimal Shalat",
                                                  data: [<?php
                                                    $dataTarget = shalatNilaiAkhwat();
                                                    foreach ($dataTarget as $row){
                                                     echo '"'.$row['target'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.75)',
                                                  pointBorderColor: 'rgba(233, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                                                  pointBorderWidth: 1
                                              }, {
                                                  label: "Rata-rata Jumlah Shalat",
                                                  data: [<?php
                                                    $dataJmlSlt = shalatNilaiAkhwat();
                                                    foreach ($dataJmlSlt as $row){
                                                     echo '"'.$row['jmlrt'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(173, 66, 244, 0.75)',
                                                  pointBorderColor: 'rgba(173, 66, 244, 0)',
                                                  pointBackgroundColor: 'rgba(173, 66, 244, 0.9)',
                                                  pointBorderWidth: 1
                                              }]
                                      },
                                      options: {
                                          responsive: true,
                                          legend: false
                                      }
                                  }
                              }
                              return config_akhwat;
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
                                  <th>ID</th>
                                  <th>Periode</th>
                                  <th>Total Waktu Shalat</th>
                                  <th>Nilai Rata-rata Ikhwan</th>
                                  <th>Nilai Rata-rata Akhwat</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatNilaiIkhtisar();
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo '<a href="?page=shalatpdetail&id='.$row['id_periode'].'">'.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['nilai_ikhwan']; ?></td>
                                  <td><?php echo $row['nilai_akhwat']; ?></td>
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