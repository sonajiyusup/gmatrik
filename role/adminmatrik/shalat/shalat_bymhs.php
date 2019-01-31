<?php 
  include 'functions.php';
 ?>
<section>
	<div class="row clearfix">
    <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK NILAI RATA-RATA PRESENSI SHALAT MAHASISWA
                              <small>Berdasarkan 5 Nilai Tertinggi</small>
                            </h2>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="55"></canvas>
                        </div>
                        <script type="text/javascript">
                          $(function () {
                              new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
                          });

                          function getChartJs(type) {
                              var config = null;

                              if (type === 'bar') {
                                  config = {
                                      type: 'bar',
                                      data: {
                                          labels: [<?php
                                                    $data = shalatMhsGraph();
                                                    foreach ($data as $row){
                                                     echo '"'.$row['nama'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai",
                                              data: [<?php
                                                    $dataNilai = shalatMhsGraph();
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['nilai'].'",';
                                                    }
                                                  ?>],
                                              backgroundColor: 'rgba(0, 188, 212, 0.8)',
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
                          <h2>NILAI PRESENSI TOTAL MAHASISWA &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#importMhsModal" title="Import Database Mahasiswa"><i class="material-icons">print</i><span>CETAK LAPORAN</span></button>
                            <small>Pekan ke : 5 (19 Oct 2018 - 25 Oct 2018)</small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatMhs" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama</th>
                                  <th>Ikhwan/Akhwat</th>
                                  <th>Shalat 65%</th>
                                  <th>Ta'lim 15%</th>
                                  <th>Tahsin/Tahfidz 20%</th>
                                  <!-- <th>Perolehan Presensi</th> -->
                                  <!-- <th>Dispensasi Jadwal Pulang</th> -->
                                  <!-- <th>Udzur</th> -->
                                  <!-- <th>Target Awal</th> -->
                                  <!-- <th>Target Akhir</th> -->
                                  <th>Nilai</th>
                                  <th>Keterangan</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $dataPresensi = shalatMhs2();
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo '<a href="?page=shalatmdetail&id='.$row['id_mahasiswa'].'">'.$row['nama'].'</a>'; ?></td>
                                  <td><?php echo $row['j_kelamin']; ?></td>
                                  <td><?php echo $row['fingerprint']; ?></td>
                                  <!-- <td><?php echo $row['jplg']; ?></td> -->
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['target1']; ?></td>
                                  
                                  <td><?php echo $row['nilai']; ?></td>
                                  <td></td>
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
      var t = $('#tableShalatMhs').DataTable({});
    } );
    </script> 