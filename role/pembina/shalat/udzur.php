<?php 
  include 'functions2.php';

  $idPembina = $_SESSION['id_pembina'];
 ?>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR UDZUR SHALAT MAHASISWA BINAAN</h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableUdzur" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>Periode</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Udzur</th>
                                  <th>Waktu Shalat</th>
                                  <th>Jumlah Waktu Shalat</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataUdzur = tampilUdzurShalatRolePembina($idPembina);

                                  if (is_array($dataUdzur) || is_object($dataUdzur)){
                                    foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['udzur']; ?></td>
                                  <td><?php echo $row['wkt']; ?></td>
                                  <td><?php echo $row['jml']; ?></td>
                                  <td><?php if($row['disetujui'] == 0){echo 'Belum di Review';}else if($row['disetujui'] == 1){echo 'Disetujui';}else if($row['disetujui'] == 2){echo 'Ditolak';} ?></td>
                                  <td><a href="" class="btn btn-xs">Review</a></td>
                                </tr>
                                <?php } } ?>
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


 <?php
  if(isset($_POST['submitJplg'])){
    if (is_array($_POST['wkt1'])) {
      foreach($_POST['wkt1'] as $s){
        tambahJplg($_POST['tplg1'], $_POST['radiojk'], $s);
      }
    }
    echo "<script>document.location='index.php?page=jplg'</script>";
  }
?>