<?php 
  include 'functions.php';
  $tgl = $_GET['t'];
  $tgl_ = date('Y-M-d', strtotime($_GET['t']));
  $idPeriod = $_GET['p'];
  $jKelamin = $_GET['j'];
 ?>

	<div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=shalatiabyperiod&j=<?php echo $jKelamin;?>&p=<?php echo $idPeriod;?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                            GRAFIK PRESENSI SHALAT MAHASISWA &nbsp;
                                  <?php 
                                    if($tgl != '20180302'){
                                      $percent = percenIAByDay($jKelamin, ($tgl-1), $tgl);
                                      foreach ($percent as $row){
                                        if ($row['a'] > $row['b']) {
                                          echo '<span class="label bg-red">
                                          <i class="material-icons vertical-align-middle padding-bottom-3">trending_down</i>
                                          '.$row['percent'].'% dibandingkan hari sebelumnya</span>';
                                        } else
                                        if ($row['a'] < $row['b']) {
                                          echo '<span class="label bg-green">
                                          <i class="material-icons vertical-align-middle padding-bottom-3">trending_up</i>
                                          +'.$row['percent'].'% dibandingkan hari sebelumnya</span>';
                                        } 
                                      }
                                    }
                                  ?>
                              <small> Hari : &nbsp;
                                <div class="btn-group">
                                  <button type="button" class="btn <?php if($jKelamin == 'Akhwat'){echo 'bg-pink';}else if($jKelamin == 'Ikhwan'){echo 'bg-cyan';} ?> waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php 
                                      echo date('l', strtotime($tgl_)).' '.date('d M Y', strtotime($tgl_));
                                    ?>
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <?php
                                      $dataTgl = tampilListTglByPeriod($idPeriod);
                                      foreach($dataTgl as $row){
                                        ?>
                                          <li><?php echo '<a href="?page=shalatiabyday&j='.$jKelamin.'&p='.$idPeriod.'&t='.date('Ymd', strtotime($row['tanggal'])).'">'.date('l', strtotime($row['tanggal'])).' '.date('d M Y', strtotime($row['tanggal'])).'</a>'; ?></li>
                                        <?php
                                     }
                                    ?>
                                  </ul>
                                </div>   
                                <div class="btn-group">
                                                    <button type="button" class="btn <?php if($jKelamin == 'Akhwat'){echo 'bg-pink';}else if($jKelamin == 'Ikhwan'){echo 'bg-cyan';} ?> waves-effect dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php 
                                                          if($jKelamin == 'Akhwat'){echo 'AKHWAT';}else if($jKelamin == 'Ikhwan'){echo 'IKHWAN';}
                                                        ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <?php 
                                                        if ($jKelamin == 'Ikhwan') {
                                                          echo '<li><a href="?page=shalatiabyday&j=Ikhwan&p='.$idPeriod.'&t='.$tgl.'">IKHWAN</a></li>
                                                                <li><a href="?page=shalatiabyday&j=Akhwat&p='.$idPeriod.'&t='.$tgl.'">AKHWAT</a></li>';
                                                        } else
                                                        if ($jKelamin == 'Akhwat') {
                                                          echo '<li><a href="?page=shalatiabyday&j=Akhwat&p='.$idPeriod.'&t='.$tgl.'">AKHWAT</a></li>
                                                                <li><a href="?page=shalatiabyday&j=Ikhwan&p='.$idPeriod.'&t='.$tgl.'">IKHWAN</a></li>';
                                                        }
                                                       ?>
                                                    </ul>
                              </div>                             
                              </small>
                            </h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="70"></canvas>
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
                                          labels: ['Shubuh','Dzuhur','Ashar','Maghrib','Isya'],
                                          datasets: [{
                                              label: "Jumlah Waktu Shalat",
                                              data: [<?php
                                                    $jmlShalat = jmlShalatIAPerDayByWaktu($jKelamin, $tgl);
                                                    foreach ($jmlShalat as $row){
                                                     echo '"'.$row['jml'].'",';
                                                    }
                                                  ?>],
                                              borderColor: 'rgba(0, 188, 212, 0.75)',
                                              backgroundColor: 'rgba(0, 188, 212, 0.3)',
                                              pointBorderColor: 'rgba(0, 188, 212, 0)',
                                              pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                                              pointBorderWidth: 1
                                          }, {
                                                  label: "Jumlah Waktu Shalat Pada Hari Sebelumnya",
                                                  data: [<?php

                                                    if($tgl != '20180302'){
                                                      $jmlShalat = jmlShalatIAPerDayByWaktu($jKelamin, $tgl-1);
                                                      foreach ($jmlShalat as $row){
                                                       echo '"'.$row['jml'].'",';
                                                      }
                                                    } else
                                                    if($tgl == '20180302'){
                                                      $jmlShalat = jmlShalatIAPerDayByWaktu($jKelamin, $tgl);
                                                      foreach ($jmlShalat as $row){
                                                       echo '"'.$row['jml'].'",';
                                                      }
                                                    }
                                                  ?>],
                                                  borderColor: 'rgba(233, 30, 99, 0.75)',
                                                  backgroundColor: 'rgba(200, 30, 99, 0.3)',
                                                  pointBorderColor: 'rgba(200, 30, 99, 0)',
                                                  pointBackgroundColor: 'rgba(200, 30, 99, 0.9)',
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
                          <h2>
                            DATA PRESENSI SHALAT MAHASISWA &nbsp;
                            <span class="label bg-cyan">
                                <?php 
                                  echo date('l', strtotime($tgl_)).' '.date('d M Y', strtotime($tgl_));
                                ?>
                              </span>
                            <?php 
                                  /*$dataTglJPulang = tampilTglJPulang();
                                  foreach ($dataTglJPulang as $row) {
                                    if ($row['tanggal'] == date('Y-m-d', strtotime($tgl))) {
                                      echo '<span class="label bg-purple label-lg">JADWAL PULANG</span>';
                                    }
                                  }*/
                                 ?>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatDetailByDay" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Mahasiswa</th>
                                  <th>Shubuh</th>
                                  <th>Dzuhur</th>
                                  <th>Ashar</th>
                                  <th>Maghrib</th>
                                  <th>Isya</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatIAByDay($jKelamin, $tgl_);
                                  $no = 1;
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php if($row['shubuh'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['shubuh'].'</span>';} ?></td>
                                  <td><?php if($row['dzuhur'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['dzuhur'].'</span>';} ?></td>
                                  <td><?php if($row['ashar'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['ashar'].'</span>';} ?></td>
                                  <td><?php if($row['maghrib'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['maghrib'].'</span>';} ?></td>
                                  <td><?php if($row['isya'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['isya'].'</span>';} ?></td>
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
      var t = $('#tableShalatDetailByDay').DataTable({});
    } );
    </script> 