<?php 
  include 'functions.php';
  $idMahasiswa = $_GET['m'];
  $idPeriod = $_GET['p'];
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=shalatbpembinadetail&id=<?php echo $idPembina; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;GRAFIK NILAI PRESENSI SHALAT MAHASISWA 
                                <div class="btn-group">
                                                    <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php $namaMhs = tampilMahasiswaById($idMahasiswa);
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
                                                            <li><?php echo '<a href="?page=shalatmbyperiod&p='.$idPeriod.'&m='.$row['id_mahasiswa'].'">'.$row['nama'].'</a>'; ?></li>
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
                                                            <li><?php echo '<a href="?page=shalatmbyperiod&p='.$row['id_periode'].'&m='.$idMahasiswa.'">'.$row['id_periode'].'. '.date('d M Y', strtotime($row['tanggal_dari'])).' - '.date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></li>
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
                                                    $dataPeriode = shalatMhsByPeriodGraph($idMahasiswa, $idPeriod);
                                                    foreach ($dataPeriode as $row){
                                                      echo '"'.date('D - d M Y', strtotime($row['tanggal'])).'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Jumlah Shalat",
                                              data: [<?php
                                                    $dataNilai = shalatMhsByPeriodGraph($idMahasiswa, $idPeriod);
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['jml'].'",';
                                                    }
                                                  ?>],
                                              borderColor: 'rgba(0, 188, 212, 0.75)',
                                              backgroundColor: 'rgba(0, 188, 212, 0.3)',
                                              pointBorderColor: 'rgba(0, 188, 212, 0)',
                                              pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
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
                                <?php $namaMhs = tampilMahasiswaById($idMahasiswa);
                                  foreach($namaMhs as $row){
                                    echo $row['nama'];
                                  } 
                                ?>
                              </span>
                              &nbsp;Pembina : 
                              <span class="label bg-cyan">
                                <?php $namaMhs = tampilMahasiswaById($idMahasiswa);
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
                            <table id="tableShalatByPembinaByPeriod" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Hari</th>
                                  <th>Tanggal</th>
                                  <th>Total</th>
                                  <th>Dispensasi</th>
                                  <th>Jml Udzur</th>
                                  <th>Maks Jml Shalat</th>
                                  <th>Nilai</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatMhsByPeriod($idMahasiswa, $idPeriod);
                                  $no = 1;
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo date('l', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['jplg']; ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['target2']; ?></td>
                                  <td><?php echo $row['nilai']; ?></td>
                                  <td><?php echo '<a href="" class="btn btn-default btn-xs waves-effect">Lebih Detil</a>' ?></td> 
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