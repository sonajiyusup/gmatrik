<?php 
  include 'functions2.php';

  $idPembina = $_SESSION['id_pembina'];
 ?>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR UDZUR SHALAT MAHASISWA BINAAN<br>
                          <small>Berdasarkan Tanggal</small></h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableUdzur" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Mahasiswa</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Udzur</th>
                                  <th>Jumlah Waktu Shalat</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataUdzur = tampilUdzurShalatRolePembina($idPembina);
                                  $no = 1;
                                  if (is_array($dataUdzur) || is_object($dataUdzur)){
                                    foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['udzur']; ?></td>
                                  <td><?php echo $row['jml']; ?></td>
                                  <td><?php if($row['direview'] == 0){echo '<label class="badge bg-orange">Belum di Review<label>';}else if($row['direview'] == 1){echo '<label class="badge bg-green">Sudah di Review<label>';}?></td>
                                  <td><a href="" class="btn btn-xs">Review</a></td>
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