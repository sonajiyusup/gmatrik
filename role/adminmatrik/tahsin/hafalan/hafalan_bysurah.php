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
                              <small>Berdasarkan Progres Surah Tertinggi ke Terendah</small>
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
                                                    $data = tampilHafalanBySurahRoleAdminmatrik(1);
                                                    foreach ($data as $row){
                                                     echo '"'.$row['nama_surah'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Progres (%)",
                                              data: [<?php
                                                    $data = tampilHafalanBySurahRoleAdminmatrik(1);
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
                            <small>Berdasarkan Progres Surah Tertinggi ke Terendah</small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableHafalanSurah" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>No Surah</th>
                                  <th>Nama Surah</th>
                                  <th>Target (Jml Mahasiswa)</th>
                                  <th>Jumlah Mahasiswa Sudah Setor</th>
                                  <th>Progres</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $data = tampilHafalanBySurahRoleAdminmatrik(0);
                                  foreach($data as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['no_surah']; ?></td>
                                  <td><?php echo '<a href="?page=surahdetail&id='.$row['id'].'">'.$row['nama_surah'].'</a>'; ?></td>
                                  <td><?php echo $row['target']; ?></td>
                                  <td><?php echo $row['jmlb_setor']; ?></td>
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
      var t = $('#tableHafalanSurah').DataTable({});
    } );
    </script> 