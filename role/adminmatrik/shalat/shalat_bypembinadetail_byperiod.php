<?php 
  include 'functions.php';
  $idPembina = $_GET['idP'];
  $idPeriod = $_GET['id'];
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=shalatbpembinadetail&id=<?php echo $idPembina; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;GRAFIK NILAI RATA-RATA PRESENSI SHALAT MAHASISWA BINAAN &nbsp;
                                <div class="btn-group">
                                  <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php 
                                      $namaPembina = namaPembinaById($idPembina);
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
                                          <li><?php echo '<a href="?page=shalatbpembinabp&idP='.$row['id_pembina'].'&id='.$idPeriod.'">'.$row['nama'].' '.$row['gelar'].'</a>'; ?></li>
                                        <?php
                                     }
                                    ?>
                                  </ul>
                                </div>

                              <small> Periode : &nbsp;
                                <div class="btn-group">
                                                    <button type="button" class="btn bg-orange waves-effect dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                                            <li><?php echo '<a href="?page=shalatbpembinabp&idP='.$idPembina.'&id='.$row['id_periode'].'">'.$row['id_periode'].'. '.date('d M Y', strtotime($row['tanggal_dari'])).' - '.date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></li>
                                                          <?php
                                                          }
                                                        ?>
                                                    </ul>
                                                </div>
                              </small>
                            </h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="80"></canvas>
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
                                                      echo '"'.date('D', strtotime($row['tanggal'])).'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Rata-rata",
                                              data: [<?php
                                                    $dataNilai = shalatByPembinaByPeriod($idPembina, $idPeriod);
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['nilai_harian'].'",';
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
                                                      $dataTarget = shalatByPembinaByPeriod($idPembina, $idPeriod-1);
                                                      foreach ($dataTarget as $row){
                                                       echo '"'.$row['nilai_harian'].'",';
                                                      }
                                                    } else
                                                    if($idPeriod == 1){
                                                      $dataTarget = shalatByPembinaByPeriod($idPembina, $idPeriod);
                                                      foreach ($dataTarget as $row){
                                                       echo '"'.$row['nilai_harian'].'",';
                                                      }
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.20)',
                                                  backgroundColor: 'rgba(233, 30, 99, 0.2)',
                                                  pointBorderColor: 'rgba(233, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(233, 30, 99, 0.5)',
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
                          <h2>DATA NILAI RATA-RATA PRESENSI SHALAT MAHASISWA BINAAN <span class="label bg-cyan">
                                    <?php 
                                      $namaPembina = namaPembinaById($idPembina);
                                      foreach($namaPembina as $row){
                                        echo $row['nama'].' '.$row['gelar'];
                                      } 
                                    ?> </span>
                            <small> Periode : &nbsp; <span class="label bg-orange">
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
                            <table id="tableShalatByPembinaByPeriod" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Hari</th>
                                  <th>Tanggal</th>
                                  <th>Total Waktu Shalat</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatByPembinaByPeriod($idPembina, $idPeriod);
                                  $no = 1;
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo date('l', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['nilai_harian']; ?></td>
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
      var t = $('#tableShalatByPembinaByPeriod').DataTable({});
    } );
    </script> 