<?php 
  include 'functions.php';
  $wkt = $_GET['w'];
  $idPeriod = $_GET['p'];
  $tgl = $_GET['t'];
 ?>

	<div class="row clearfix">

    <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                            <a href="?page=shalatwperiod&p=<?php echo $idPeriod; ?>&w=<?php echo $wkt; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                            DATA PRESENSI SHALAT MAHASISWA &nbsp;
                            <div class="btn-group">
                                                    <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php echo ucfirst($wkt); ?>
                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><?php echo '<a href="?page=shalatwbday&p='.$idPeriod.'&t='.$tgl.'&w=shubuh">Shubuh</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwbday&p='.$idPeriod.'&t='.$tgl.'&w=dzuhur">Dzuhur</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwbday&p='.$idPeriod.'&t='.$tgl.'&w=ashar">Ashar</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwbday&p='.$idPeriod.'&t='.$tgl.'&w=maghrib">Maghrib</a>'; ?></li>
                                                      <li><?php echo '<a href="?page=shalatwbday&p='.$idPeriod.'&t='.$tgl.'&w=isya">Isya</a>'; ?></li>
                                                    </ul>
                                          </div> 
                                                <?php 
                                                  if($tgl != '20180302'){
                                                    $percent = shalatWktByDayPercent($tgl-1, $tgl, $wkt);
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
                                                      } else
                                                      if ($row['percent'] == 0) {
                                                        echo '<span class="label bg-cyan">
                                                        <i class="material-icons vertical-align-middle padding-bottom-3">trending_flat</i>
                                                        sama dibandingkan hari sebelumnya</span>';
                                                      }
                                                    }
                                                  }
                                                ?>
                            <small>Hari - Tanggal : &nbsp;
                              <div class="btn-group">
                                                    <button type="button" class="btn bg-orange waves-effect dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php 
                                                          echo date('l - d M Y', strtotime($tgl));
                                                        ?>
                                                    <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                          $dataTgl = tampilListTglByPeriod($idPeriod);
                                                          foreach($dataTgl as $row){
                                                          ?>
                                                            <li><?php echo '<a href="?page=shalatwbday&p='.$idPeriod.'&t='.date('Ymd', strtotime($row['tanggal'])).'&w='.$wkt.'">'.date('D - d M Y', strtotime($row['tanggal'])).'</a>'; ?></li>
                                                          <?php
                                                          }
                                                        ?>
                                                    </ul>
                              </div>
                            </small>
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
                                          labels: ["Jumlah Shalat"],
                                          datasets: [{
                                              label: "<?php echo date('l - d M Y', strtotime($tgl)); ?>",
                                              data: [<?php
                                                      $dataNilai = shalatWktByDayGraph($tgl, $wkt);
                                                        foreach ($dataNilai as $row){
                                                          echo '"'.$row['jml'].'",';
                                                        }
                                                    ?>],
                                              backgroundColor: 'rgba(0, 188, 212, 0.8)'
                                          },{
                                              label: "<?php echo date('l - d M Y', strtotime($tgl-1)); ?>",
                                              data: [<?php
                                                      $dataNilai = shalatWktByDayGraph($tgl-1, $wkt);
                                                        foreach ($dataNilai as $row){
                                                          echo '"'.$row['jml'].'",';
                                                        }
                                                    ?>],
                                              backgroundColor: 'rgba(233, 30, 99, 0.8)'
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
                            <a href="?page=shalatmbyperiod&p=<?php echo $idPeriod; ?>&m=<?php echo $idMahasiswa; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                            DATA PRESENSI SHALAT MAHASISWA &nbsp;
                            <small>Waktu Shalat : &nbsp;
                            <span class="label bg-orange">
                              <?php echo ucfirst($wkt); ?>
                            </span>
                            </small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatByWktByPeriodByDay" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Mahasiswa</th>
                                  <th>Waktu Tapping</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatWktByDay($tgl, $wkt);
                                  $no = 1;
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php if($row['tap'] == NULL){echo '<span class="label bg-grey">KOSONG</span>';}else{echo '<span class="label bg-green">'.$row['tap'].'</span>';} ?></td>
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
      var t = $('#tableShalatByWktByPeriodByDay').DataTable({});
    } );
    </script> 