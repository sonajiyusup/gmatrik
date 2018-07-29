<?php 
  include 'functions.php';
  $tgl_ = date('Y-M-d', strtotime($_GET['t']));
  $idPeriod = $_GET['p'];
 ?>

	<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                            <a href="?page=shalatpdetail&id=<?php echo $idPeriod;?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                            DATA PRESENSI SHALAT MAHASISWA &nbsp;
                            <div class="btn-group">
                                  <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                          <li><?php echo '<a href="?page=shalatbyday&p='.$idPeriod.'&t='.date('Ymd', strtotime($row['tanggal'])).'">'.date('l', strtotime($row['tanggal'])).' '.date('d M Y', strtotime($row['tanggal'])).'</a>'; ?></li>
                                        <?php
                                     }
                                    ?>
                                  </ul>
                                </div>
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
                                  $dataPresensi = shalatIkhtisarDetailByDay($tgl_);
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