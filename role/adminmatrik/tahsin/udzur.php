<?php 
  include 'functions2.php';  
 ?>

<div class="row clearfix">
 <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK JUMLAH UDZUR TAHSIN/TAHFIDZ MAHASISWA
                              <small>Berdasarkan 5 Mahasiswa dengan Jumlah Udzur Tertinggi</small>
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
                                                    $data = udzurTahsinRoleAdminMatrik('1');
                                                    foreach ($data as $row){
                                                     echo '"'.$row['nama'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Jumlah Udzur",
                                              data: [<?php
                                                    $dataNilai = udzurTahsinRoleAdminMatrik('1');
                                                    foreach ($dataNilai as $row){
                                                     echo '"'.$row['jmlu'].'",';
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
                          <h2>DAFTAR UDZUR TAHSIN/TAHFIDZ MAHASISWA<br>
                          <small>Berdasarkan Mahasiswa Berdasar Jumlah Udzur Tertinggi</small></h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableUdzur" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>NIM</th>
                                  <th>Nama Mahasiswa</th>
                                  <th>Jumlah Udzur</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataUdzur = udzurTahsinRoleAdminMatrik('0');
                                  $no = 1;
                                  if (is_array($dataUdzur) || is_object($dataUdzur)){
                                    foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['nim']; ?></td>
                                  <td><?php echo '<a href="?page=udzurtahsindetail&m='.$row['id_mahasiswa'].'">'.$row['nama'].'</a>' ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
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
      var t = $('#tableUdzur').DataTable({});
    } );
    </script> 