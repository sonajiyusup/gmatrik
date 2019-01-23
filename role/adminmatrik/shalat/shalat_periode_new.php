<?php 
  include 'functions.php';
  $idPeriod = $_GET['id'];
 ?>

	<div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA NILAI RATA-RATA PRESENSI MAHASISWA
                            <small> Periode :&nbsp; 
                              <span class="label bg-cyan">
                                <?php $dataPresensi = tampilTglPeriodeById($idPeriod);
                                  foreach($dataPresensi as $row){
                                    echo date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']));
                                  } 
                                ?>
                              </span>
                            </small>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatIkhtisarDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>NIM</th>
                                  <th>Nama Mahasiswa</th>
                                  <th>Ikhwan/Akhwat</th>
                                  <th>Total Jumlah Shalat</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataPresensi = shalatIkhtisarDetail($idPeriod);
                                  $no = 1;
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['nim']; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php echo $row['j_kelamin']; ?></td>
                                  <td><?php echo $row['total']; ?></td>
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
      var t = $('#tableShalatIkhtisarDetail').DataTable({});
    } );
    </script> 