<?php 
  include 'functions.php';
 ?>

	<div class="row clearfix">

    <!-- Line Chart -->
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
                                                    $namaPembina = shalatByPembina();
                                                    foreach ($namaPembina as $row){
                                                     echo '"'.$row['pembina'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Nilai Rata-rata Mhs Binaan",
                                              data: [<?php
                                                    $dataNilai = shalatByPembina();
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['Nilai'].'",';
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
                                  <th>Total</th>
                                  <th>Rata-rata per-Periode</th>
                                  <th>Pembagi</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $dataPresensi = shalatByPembina();
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo '<a href="?page=shalatbpembinadetail&id='.$row['id_pembina'].'">'.$row['pembina'].'</a>';  ?></td>
                                  <td><?php if($row['j_kelamin'] == 'Ikhwan' || $row['j_kelamin'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['j_kelamin'] == 'Akhwat' || $row['j_kelamin'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['Rata2']; ?></td>
                                  <td><?php echo $row['pembagi']; ?></td>
                                  <td><?php echo $row['Nilai']; ?></td>
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