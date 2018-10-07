<?php 

  include 'functions2.php';
  
  $idMahasiswa = $_GET['m'];
  $tgl = $_GET['t'];
 ?>

<div class="container-fluid">
  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=udzurslt" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                                PERMINTAAN UDZUR SHALAT
                                <small>Tanggal : <?php echo date('d F Y', strtotime($tgl)); ?></small>
                            </h2>
                        </div>
                        <form method="POST" id="formReviewUdzur">
                          <div class="body table-responsive">
                              <table id="tableUdzur" class="table table-condensed">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <!-- <th>ID Udzur</th> -->
                                    <th>Waktu Shalat</th>
                                    <th>Udzur</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $dataUdzur = tampilUdzurShalatDetailByMhsByDay($idMahasiswa, $tgl);
                                    $no = 1;
                                    foreach($dataUdzur as $row){
                                   ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <!-- <td><?php echo $row['id_udzur']; ?></td> -->
                                    <td><?php echo ucwords($row['wkt_shalat']); ?></td>
                                    <td><?php echo $row['udzur']; ?></td>
                                    <td><?php echo $row['keterangan']; ?></td>
                                    <td><?php if($row['disetujui'] == 0){echo '<label class="badge bg-orange">Belum disetujui<label>';}else if($row['disetujui'] == 1){echo '<label class="badge bg-green">Disetujui<label>';}else if($row['disetujui'] == 2){echo '<label class="badge bg-red">Ditolak<label>';}?></td>
                                  </tr>
                                  <?php $no++; } ?>
                                </tbody> 
                              </table>                          
                          </div>
                        </form>
                    </div>
                </div>
  </div>
</div>         