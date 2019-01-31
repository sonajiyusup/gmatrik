<?php 
  include 'functions2.php';  
 ?>

<div class="row clearfix">
 <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK JUMLAH PRESENSI MANUAL SHALAT WAJIB MAHASISWA
                              <small>Berdasarkan 5 Mahasiswa dengan Jumlah Presensi Manual Tertinggi</small>
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
                                                    $data = shalatManualAdminmatrikGraph();
                                                    foreach ($data as $row){
                                                     echo '"'.$row['nama'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Jumlah Presensi Manual",
                                              data: [<?php
                                                    $dataNilai = shalatManualAdminmatrikGraph();
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['jmlm'].'",';
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
                          <h2>DAFTAR PRESENSI MANUAL SHALAT WAJIB MAHASISWA<br>
                          <small>Berdasarkan Mahasiswa</small></h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableManual" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Mahasiswa</th>
                                  <th>Pembina</th>
                                  <th>Jumlah Presensi Manual Shalat Wajib</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataManual = tampilShalatManualAdminmatrik();
                                  $no = 1;
                                  if (is_array($dataManual) || is_object($dataManual)){
                                    foreach($dataManual as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo '<a href="?page=manualsltdetail&m='.$row['id_mahasiswa'].'">'.$row['nama'].'</a>' ?></td>
                                  <td><?php echo $row['pembina']; ?></td>
                                  <td><?php echo $row['jmlm']; ?></td>
                                </tr>
                                <?php $no++; } } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
          </div>

      </div>
</div>      

    <script>
    $(document).ready(function() {
      var t = $('#tableManual').DataTable({});
    } );
    </script> 