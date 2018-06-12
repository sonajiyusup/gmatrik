<?php 
  include 'functions.php';
  $idPembina = $_GET['idP'];
  $idPeriod = $_GET['p'];
  $tgl = $_GET['t'];
 ?>

	<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>
                            <a href="?page=shalatbpembinabp&idP=<?php echo $idPembina; ?>&id=<?php echo $idPeriod; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                            DATA NILAI RATA-RATA PRESENSI SHALAT MAHASISWA BINAAN &nbsp;
                            <div class="btn-group">
                                  <button type="button" class="btn bg-cyan waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php 
                                      $namaPembina = namaPembinaById($idPembina);
                                      foreach($namaPembina as $row){
                                        echo $row['nama'].' '.$row['gelar'];
                                      } 
                                    ?>
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <?php
                                      $dataPembina = tampilPembina();
                                      foreach($dataPembina as $row){
                                        ?>
                                          <li><?php echo '<a href="?page=shalatbpembinabpday&idP='.$row['id_pembina'].'&p='.$idPeriod.'&t='.$tgl.'">'.$row['nama'].' '.$row['gelar'].'</a>'; ?></li>
                                        <?php
                                     }
                                    ?>
                                  </ul>
                                </div>
                            <small> Tanggal : &nbsp;
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
                                                            <li><?php echo '<a href="?page=shalatbpembinabpday&idP='.$idPembina.'&p='.$idPeriod.'&t='.date('Ymd', strtotime($row['tanggal'])).'">'.date('D - d M Y', strtotime($row['tanggal'])).'</a>'; ?></li>
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
                          <div class="table-responsive">
                            <table id="tableShalatByPembinaByPeriodByDay" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Mahasiswa Binaan</th>
                                  <th>Shubuh</th>
                                  <th>Dzuhur</th>
                                  <th>Ashar</th>
                                  <th>Maghrib</th>
                                  <th>Isya</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatByPembinaByPeriodByDay($idPembina, $tgl);
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
      var t = $('#tableShalatByPembinaByPeriodByDay').DataTable({});
    } );
    </script> 