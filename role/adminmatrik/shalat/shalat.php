<?php 
  include 'functions.php';
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK NILAI RATA-RATA PRESENSI SEMUA MAHASISWA</h2>
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
                                              label: "Rata-rata Nilai Shalat",
                                              data: [<?php
                                                    $dataNilai = shalatNilaiSemua();
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
                                                  label: "Rata-rata Jumlah Maksimal Shalat",
                                                  data: [<?php
                                                    $dataTarget = shalatNilaiSemua();
                                                    foreach ($dataTarget as $row){
                                                     echo '"'.$row['target'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.30)',
                                                  backgroundColor: 'rgba(233, 30, 99, 0.2)',
                                                  pointBorderColor: 'rgba(233, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(233, 30, 99, 0.7)',
                                                  pointBorderWidth: 1
                                              }, {
                                                  label: "Rata-rata Jumlah Shalat",
                                                  data: [<?php
                                                    $dataJmlSlt = shalatNilaiSemua();
                                                    foreach ($dataJmlSlt as $row){
                                                     echo '"'.$row['jmlrt'].'",';
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(173, 66, 244, 0.30)',
                                                  pointBorderColor: 'rgba(173, 66, 244, 0)',
                                                  pointBackgroundColor: 'rgba(173, 66, 244, 0.7)',
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
                          <h2>DATA NILAI RATA-RATA PRESENSI SEMUA MAHASISWA</h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatIkhtisar" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Periode</th>
                                  <th>Total Waktu Shalat</th>
                                  <th>Maks Jml Waktu Shalat</th>
                                  <th>Jadwal Pulang</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatNilaiSemua();
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo '<a href="?page=shalatpdetail&id='.$row['id_periode'].'">'.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['target2']; ?></td>
                                  <td><?php echo $row['plg']; ?></td>
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

              <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>DATA PEKAN PRESENSI TAHSIN/TAHFIDZ</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            <table id="tablepekan" class="table table-hover table-condensed table-bordered">
                              <thead>
                                <tr>
                                  <th>Semester</th>
                                  <th>Pekan ke</th>
                                  <th>Rentang Waktu</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>1</td>
                                  <td><a href="">12 Sep 2018 - 27 Sep 2018</a></td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>2</td>
                                  <td><a href="">28 Sep 2018 - 04 Oct 2018</a></td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>3</td>
                                  <td><a href="">05 Oct 2018 - 11 Oct 2018</a></td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>4</td>
                                  <td><a href="">12 Oct 2018 - 18 Oct 2018</a></td>
                                </tr>
                                <tr>  
                                  <td>1</td>
                                  <td>5</td>
                                  <td><a href="">19 Oct 2018 - 25 Oct 2018</a></td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>6</td>
                                  <td><a href="">26 Oct 2018 - 01 Nov 2018</a></td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>7</td>
                                  <td><a href="">02 Nov 2018 - 08 Nov 2018</a></td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>8</td>
                                  <td><a href="">09 Nov 2018 - 15 Nov 2018</a></td>
                                </tr>
                               </tbody> 
                            </table>
                          </div>
                        </div>

                    </div>
                </div>

              </div>
    </section>
    <!-- /.content -->

    <script>
    $(document).ready(function() {
      var t = $('#tableShalatIkhtisar').DataTable({});
    } );
    </script> 

        <script>
    $(document).ready(function() {
      var t = $('#tablepekan').DataTable({});
    } );
    </script> 