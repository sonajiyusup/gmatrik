<?php 

  include 'functions2.php';
  
  $idMahasiswa = $_GET['m'];
  $namaMhs = tampilNamaMhs($idMahasiswa);

  $tgl = $_GET['t'];
 ?>

<div class="container-fluid">
  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=manualslt" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                                PERMINTAAN PRESENSI MANUAL SHALAT WAJIB MAHASISWA
                                <small>Nama Mahasiswa : <?php foreach($namaMhs as $row){ echo $row['nama']; }?><br>Tanggal : <?php echo date('d F Y', strtotime($tgl)); ?></small>
                            </h2>
                        </div>
                        <form method="POST" id="formReviewUdzur">
                          <div class="body table-responsive">
                              <table id="tableManualDetail" class="table table-condensed">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <!-- <th>ID Udzur</th> -->
                                    <th>Waktu Shalat</th>
                                    <th>Keterangan</th>
                                    <th>Setujui ?</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $dataUdzur = tampilShalatManualDetailByMhsByDay($idMahasiswa, $tgl);
                                    $no = 1;
                                    foreach($dataUdzur as $row){
                                   ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <!-- <td><?php echo $row['id_udzur']; ?></td> -->
                                    <td><?php echo ucwords($row['wkt_shalat']); ?></td>
                                    <td><?php echo $row['keterangan']; ?></td>
                                    <td>
                                    <?php if($row['disetujui'] == 0){echo '<input type="radio" class="radiojk" name="disetujui_'.$row['wkt_shalat'].'[]" value="1"/>
                                        <label for="radio_1">Ya</label>&nbsp;
                                        <input type="radio" class="radiojk" name="disetujui_'.$row['wkt_shalat'].'[]" value="2"/>
                                        <label for="radio_2">Tidak</label>';}else if($row['disetujui'] == 1){echo '<label class="badge bg-green">Sudah di Setujui<label>';}else if($row['disetujui'] == 2){echo '<label class="badge bg-red">Sudah di Tolak<label>';} ?>
                                    </td>
                                  </tr>
                                  <?php $no++; } ?>
                                </tbody> 
                              </table>                          
                              <br>

                            <button type="submit" name="submitReviewUdzur" class=" btn btn-primary">SIMPAN</button>&nbsp;
                            <a href="?page=udzurslt" class=" btn btn-link">BATAL</a>
                          </div>
                        </form>
                    </div>
                </div>
  </div>
</div>         

<?php 
        if (isset($_POST['submitReviewUdzur'])) {

          $dataUdzur = tampilUdzurShalatDetailByMhsByDay($idMahasiswa, $tgl);
          foreach($_POST['disetujui_'.$row['wkt_shalat']] as $wkt){
            reviewUdzurShalat($_POST['id_udzur'], $_POST['disetujui_'.$wkt]);
          }

          /*if(!empty($_POST['idMahasiswa'])) {
            foreach($_POST['idMahasiswa'] as $idMhs) {
              tambahMhsBinaan($idPembina, $idMhs);
            }
          }*/
        echo "<script>document.location='index.php?page=pembinadetails&id=".$idP."&idP=".$idPembina."'</script>";
      }
 ?>

<script>
    $(document).ready(function() {
      var t = $('#tableManualDetail').DataTable({});
    } );
</script>