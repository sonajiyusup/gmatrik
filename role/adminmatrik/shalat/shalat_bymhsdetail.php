<?php 
  include 'functions.php';
  $idMhs = $_GET['id'];
 ?>

  <div class="row clearfix">
    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                          <a href="?page=shalatm" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                          GRAFIK NILAI PRESENSI SHALAT MAHASISWA&nbsp;
                              <?php 
                                    
                                      $percent = shalatMhsDetailPercent($idMhs);
                                      foreach ($percent as $row){
                                        if ($row['a'] > $row['b']) {
                                          echo 
                                          '<span class="label bg-red">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_down</i>
                                          '.$row['percent'].'% dibandingkan rata-rata semua mahasiswa
                                          </span>';
                                        } else
                                        if ($row['a'] < $row['b']) {
                                          echo 
                                          '<span class="label bg-green">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_up</i>
                                             +'.$row['percent'].'% dibandingkan rata-rata semua mahasiswa
                                          </span>';
                                        } 
                                      }
                                    
                                  ?>
                              </h2>
                                <!-- <div class="btn-group">
                                                    <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-live-search="true">
                                                        <?php $namaMhs = tampilMahasiswaById($idMhs);
                                                          foreach($namaMhs as $row){
                                                            echo $row['nama'];
                                                          } 
                                                        ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                          $namaMhs = tampilMahasiswa();
                                                          foreach($namaMhs as $row){
                                                          ?>
                                                            <li><?php echo '<a href="?page=shalatmdetail&id='.$row['id_mahasiswa'].'">'.$row['nama'].'</a>'; ?></li>
                                                          <?php
                                                          }
                                                        ?>
                                                    </ul>
                                                </div>   -->
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <select class="form-control show-tick" data-live-search="true" onchange="location = this.value;">
                                                        <?php $namaMhs = tampilMahasiswaById($idMhs);
                                                          foreach($namaMhs as $row){
                                                            echo '<option selected>'.$row['nama'].'</option>';
                                                          } 
                                                        ?>
                                                        <?php $namaMhs = tampilMahasiswa();
                                                          foreach($namaMhs as $row){
                                                            echo '<option value="?page=shalatmdetail&id='.$row['id_mahasiswa'].'">'.$row['nim'].' - '.$row['nama'].'</option>';
                                                          } 
                                                        ?>
                                    </select>  
                              </div> 
                              <br>                       
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
                                              label: "Nilai Rata-rata Shalat",
                                              data: [<?php
                                                    $dataNilai = shalatMhsDetail($idMhs);
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
                                                  label: "Nilai Shalat Rata-rata Semua Mahasiswa",
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
                              Nama Mahasiswa : 
                              <span class="label bg-cyan">
                                <?php $namaMhs = tampilMahasiswaById($idMhs);
                                  foreach($namaMhs as $row){
                                    echo $row['nama'];
                                  } 
                                ?>
                              </span>
                              &nbsp;Pembina : 
                              <span class="label bg-cyan">
                                <?php $namaMhs = tampilMahasiswaById($idMhs);
                                  foreach($namaMhs as $row){
                                    echo $row['namap'];
                                  } 
                                ?>
                              </span>
                              </small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatMhsDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
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
                                  $no = 1;
                                  $data = shalatMhsDetail($idMhs);
                                  foreach($data as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo '<a href="?page=shalatmbyperiod&p='.$row['id_periode'].'&m='.$idMhs.'">'.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></td>
                                  <td><?php echo $row['fingerprint']; ?></td>
                                  <td><?php echo $row['manual']; ?></td>
                                  <td><?php echo $row['total']; ?></td>
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
      var t = $('#tableShalatMhsDetail').DataTable({});
    } );
    </script> 