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
                                                     echo '"'.date('d M Y', strtotime($row['tanggal'])).'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Total Waktu Shalat",
                                              data: [<?php
                                                    $dataNilai = shalatByPeriodID($idPeriod);
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['total'].'",';
                                                    }
                                                  ?>],
                                              borderColor: 'rgba(0, 188, 212, 0.75)',
                                              backgroundColor: 'rgba(0, 188, 212, 0.3)',
                                              pointBorderColor: 'rgba(0, 188, 212, 0)',
                                              pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                                              pointBorderWidth: 1
                                          }, {
                                                  label: "Rata-rata Jumlah Waktu Shalat Per-hari",
                                                  data: [<?php
                                                    $dataTarget = shalatByPeriodID($idPeriod);
                                                    foreach ($dataTarget as $row){
                                                     echo '"'.$row['jmlrt'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.75)',
                                                  pointBorderColor: 'rgba(233, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
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
                          <h2>DATA NILAI RATA-RATA PRESENSI SEMUA MAHASISWA
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatIkhtisarDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>Tanggal</th>
                                  <th>Total Waktu Shalat</th>
                                  <th>Jumlah Rata-rata Waktu Shalat</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatByPeriodID($idPeriod);
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['jmlrt']; ?></td>
                                  
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
      var t = $('#tableShalatIkhtisarDetail').DataTable({});
    } );
    </script> 