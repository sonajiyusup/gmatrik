<?php 
  include 'functions2.php';  
  $idMahasiswa = $_GET['m'];
  $namaMhs = tampilNamaMhs($idMahasiswa);
 ?>

<div class="row clearfix">
 <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=udzurslt" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                            GRAFIK JUMLAH UDZUR MAHASISWA
                              <small>Berdasarkan Jenis Udzur</small>
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
                                                    $data = shalatUdzurDetailByMhsAdminmatrikGraph($idMahasiswa);
                                                    foreach ($data as $row){
                                                     echo '"'.$row['udzur'].'",';
                                                    }
                                                  ?>],
                                          datasets: [{
                                              label: "Jumlah Udzur",
                                              data: [<?php
                                                    $dataNilai = shalatUdzurDetailByMhsAdminmatrikGraph($idMahasiswa);
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
                          <h2>DAFTAR UDZUR SHALAT WAJIB MAHASISWA<br>
                          <small>Mahasiswa : <?php foreach($namaMhs as $row){ echo $row['nama']; }?></small></h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableUdzur" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Hari/Tanggal</th>
                                  <th>Periode</th>
                                  <th>Waktu Shalat</th>
                                  <th>Udzur</th>
                                  <th>Keterangan</th>
                                  <th>Diajukan</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataUdzur = tampilUdzurShalatDetailByMhsAdminmatrik($idMahasiswa);
                                  $no = 1;
                                  if (is_array($dataUdzur) || is_object($dataUdzur)){
                                    foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo ucwords($row['wkt_shalat']); ?></td>
                                  <td><?php echo $row['udzur']; ?></td>
                                  <td><?php echo $row['keterangan']; ?></td>
                                  <td><?php echo date('d/m/Y g:i a', strtotime($row['diajukan'])); ?></td>
                                  <td><?php if($row['disetujui'] == 1){echo '<label class="badge bg-green">Sudah di Setujui Pembina<label>'; }else if($row['disetujui'] == 2){echo '<label class="badge bg-red">di Tolak Pembina<label>';} ?></td>
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