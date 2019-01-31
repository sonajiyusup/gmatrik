<?php 
  include 'functions.php';
  $idPembina = $_GET['id'];
 ?>

	<div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2><a href="?page=shalatbpembina" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;DATA NILAI PRESENSI MAHASISWA BERDASARKAN PEMBINA
                            <br>
                              <span class="label bg-cyan"> Jumlah Mahasiswa Binaan : 
                                    <?php 
                                      $jmlb = tampilJmlBinaan($idPembina);
                                        foreach($jmlb as $row){
                                          echo $row['jmlb'];
                                        } 
                                    ?>
                              </span>
                          </h2>
                        </div>
                        <div class="body">
                          <div class="table-responsive">
                            <table id="tableShalatByPembinaDetail" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Periode</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $dataPembina = shalatByPembinaIdNew($idPembina);
                                  foreach($dataPembina as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo '<a href="?page=shalatbpembinadetailnew&pm='.$idPembina.'&pr='.$row['id_periode'].'">'.date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai'])).'</a>'; ?></td>
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
      var t = $('#tableShalatByPembinaDetail').DataTable({});
    } );
    </script> 