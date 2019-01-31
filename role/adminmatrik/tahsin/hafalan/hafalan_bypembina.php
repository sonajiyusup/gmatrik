<?php 
  include 'functions2.php';
 ?>
<section>
	<div class="row clearfix">
    <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK PROGRESS HAFALAN QURAN MAHASISWA
                              <small>Berdasarkan Pembina</small>
                            </h2>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="85"></canvas>
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
                                                    $data = tampilHafalanByPembinaRoleAdminmatrik();
                                                    foreach ($data as $row){
                                                     echo '"'.$row['nama'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Progres (%)",
                                              data: [<?php
                                                    $data = tampilHafalanByPembinaRoleAdminmatrik();
                                                    foreach ($data as $row){
                                                     echo '"'.$row['progres'].'",';
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
                          <h2>DATA PROGRESS HAFALAN QURAN MAHASISWA
                            <small>Berdasarkan Pembina</small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableHafalanByPembina" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Pembina</th>
                                  <th>Jumlah Binaan</th>
                                  <th>Jumlah Target Surah</th>
                                  <th>Total Target</th>
                                  <th>Jumlah Setor Surah Mahasiswa</th>
                                  <th>Progres</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $data = tampilHafalanByPembinaRoleAdminmatrik();
                                  foreach($data as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo '<a href="?page=hafalanpdetail&id='.$row['id_pembina'].'">'.$row['nama'].'</a>'; ?></td>
                                  <td><?php echo $row['jmlb']; ?></td>
                                  <td><?php echo $row['jsurah']; ?></td>
                                  <td><?php echo $row['target_hafalan']; ?></td>
                                  <td><?php echo $row['jmls']; ?></td>
                                  <td><?php echo $row['progres'].'%'; ?></td>
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
      var t = $('#tableHafalanByPembina').DataTable({});
    } );
    </script> 