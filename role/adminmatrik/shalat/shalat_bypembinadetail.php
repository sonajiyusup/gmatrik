<?php 
  include 'functions.php';
  $idPembina = $_GET['id'];
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=shalatbpembina" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;GRAFIK NILAI PRESENSI MAHASISWA BERDASARKAN PEMBINA&nbsp;
                              <?php 
                                    
                                      $percent = shalatByPembinaIdPercentage($idPembina);
                                      foreach ($percent as $row){
                                        if ($row['a'] > $row['b']) {
                                          echo 
                                          '<span class="label bg-red">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_down</i>
                                          '.$row['percent'].'% dibandingkan rata-rata semua pembina
                                          </span>';
                                        } else
                                        if ($row['a'] < $row['b']) {
                                          echo 
                                          '<span class="label bg-green">
                                            <i class="material-icons vertical-align-middle padding-bottom-3">trending_up</i>
                                             +'.$row['percent'].'% dibandingkan rata-rata semua pembina
                                          </span>';
                                        } 
                                      }
                                    
                                  ?>

                              <small>
                                <div class="btn-group">
                                                    <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php $namaPembina = namaPembinaById($idPembina);
                                                          foreach($namaPembina as $row){
                                                            echo $row['nama'].' '.$row['gelar'];
                                                          } 
                                                        ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                          $dataPembina = tampilPembina();
                                                          foreach($dataPembina as $row){
                                                          ?>
                                                            <li><?php echo '<a href="?page=shalatbpembinadetail&id='.$row['id_pembina'].'">'.$row['nama'].' '.$row['gelar'].'</a>'; ?></li>
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
                                                    $dataPeriode = tampilPeriodeShalat();
                                                    foreach ($dataPeriode as $row){
                                                     echo '"'.$row['id_periode'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai",
                                              data: [<?php
                                                    $dataNilai = shalatByPembinaId($idPembina);
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
                                                  label: "Nilai Rata-rata Semua Pembina",
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
                          <h2>DATA NILAI PRESENSI MAHASISWA BERDASARKAN PEMBINA
                            <br>
                              <span class="label bg-cyan"> Jumlah Mahasiswa Binaan : 
                                    <?php 
                                      $jmlb = tampilJmlBinaan($idPembina);
                                        foreach($jmlb as $row){
                                          echo $row['jmlb'];
                                        } 
                                    ?>
                              </span>
                            
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatByPembinaDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Periode</th>
                                  <th>Jml Hari</th>
                                  <th>Total</th>
                                  <th>Dispensasi</th>
                                  <th>Jml Udzur</th>
                                  <th>Maks</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPembina = shalatByPembinaId($idPembina);
                                  foreach($dataPembina as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo '<a href="?page=shalatbpembinabp&idP='.$idPembina.'&id='.$row['id_periode'].'">'.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></td>
                                  <td><?php echo $row['jhari']; ?></td>
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
      var t = $('#tableShalatByPembinaDetail').DataTable({});
    } );
    </script> 