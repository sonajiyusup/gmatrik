<?php 
  include 'functions.php';
 ?>

	<div class="row clearfix">

    <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK NILAI RATA-RATA PRESENSI SHALAT MAHASISWA
                              <small>Berdasarkan Pembina</small>
                            </h2>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="95"></canvas>
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
                                                    $namaPembina = shalatByPembina('nama');
                                                    foreach ($namaPembina as $row){
                                                     echo '"'.$row['pembina'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Rata-rata Mhs Binaan",
                                              data: [<?php
                                                    $dataNilai = shalatByPembina('chart');
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
                          <h2>DATA NILAI RATA-RATA PRESENSI SHALAT MAHASISWA
                            <small>Berdasarkan Pembina</small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatByPembina" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Pembina</th>
                                  <th>Ikhwan/Akhwat</th>
                                  <th>Jml Binaan</th>
                                  <th>Fingerprint</th>
                                  <th>Manual</th>
                                  <th>Total</th>
                                  <th>Jml Hari</th>
                                  <th>Udzur</th>
                                  <th>Dispensasi Pulang</th>
                                  <th>Target</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $dataPresensi = shalatByPembina('table');
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo '<a href="?page=shalatbpembinadetail&id='.$row['id_pembina'].'">'.$row['nama'].'</a>';  ?></td>
                                  <td><?php if($row['j_kelamin'] == 'Ikhwan' || $row['j_kelamin'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['j_kelamin'] == 'Akhwat' || $row['j_kelamin'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                                  <td><?php echo $row['jmlb']; ?></td>
                                  <td><?php echo $row['fingerprint']; ?></td>
                                  <td><?php echo $row['manual']; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['jhari']; ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['jplg']; ?></td>
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
      var t = $('#tableShalatByPembina').DataTable({});
    } );
    </script> 