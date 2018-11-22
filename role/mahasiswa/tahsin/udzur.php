<?php 
  include 'functions2.php';

  $idMahasiswa = $_SESSION['id_mahasiswa'];
  $jKelamin = $_SESSION['jKelamin'];
 ?>

<script type="text/javascript">
function makeid() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 5; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}

function deleteFormGroup(formId) {
  document.getElementById('formUdzur_'+formId).innerHTML = "";
}

var addFormGroup  = function (event) {
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    }); 
};

</script>
<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR UDZUR TAHSIN &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahUdzur" title="Input Pengajuan Udzur Shalat"><i class="material-icons">playlist_add</i><span>TAMBAH PENGAJUAN UDZUR</span></button>
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableUdzur" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Tahsin</th>
                                  <th>Waktu Pengajuan</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataUdzur = tampilUdzurTahsinRoleMhs($idMahasiswa);
                                  $no = 1;
                                  if (is_array($dataUdzur) || is_object($dataUdzur)){
                                    foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><a href="?page=udzursltdetail&t=<?php echo $row['tanggal']; ?>"><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></a></td>
                                  <td><?php echo $row['tahsin']; ?></td>
                                  <td><?php echo $row['diajukan']; ?></td>
                                  <td><?php if($row['direview'] == 0){echo '<label class="badge bg-orange">Belum di Review<label>';}else if($row['direview'] == 1){echo '<label class="badge bg-green">Sudah di Review<label>';}?></td>
                                  <td><?php if($row['disetujui'] == 0){echo "<a title='Hapus' style='color:#DD4B39;' href='#ModalHapusUdzurTahsin' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?idudzurtahsin=".$row['id']."' aria-hidden='true'><i class='material-icons' style='font-size: 20px'>cancel</i></a>";}else if($row['disetujui'] == 1){echo "";} ?></td>
                                </tr>
                                <?php $no++; } } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
  </div>
</div>

            <div class="modal fade" id="tambahUdzur" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <form method="POST" name="formUdzurTahsin" id="formUdzurTahsin">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">INPUT PERMINTAAN UDZUR SHALAT</h4>
                      </div>
                      <div class="modal-body">
                          <div class="form-group multiple-form-group" id="defaultForm">          
                                      <label>Tanggal :</label><br>
                                        <select class="form-control show-tick" data-live-search="true" name="idTahsin">
                                          <option value="">-- Pilih Tahsin --</option>
                                                        <?php $t = tampilTahsinForUdzurRoleMhs($idMahasiswa);
                                                          foreach($t as $row){
                                                            echo '<option value="'.$row['id'].'">'.$row['id'].' - '.date('l d/m/Y', strtotime($row['tanggal'])).' - '.$row['tahsin'].'</option>';
                                                          } 
                                                        ?>
                                        </select> 
                          </div>
                          <label>Udzur :</label><br>
                          <input name="udzur" type="radio" class="radiojk" id="sakit" value="Sakit"/>
                          <label for="sakit">SAKIT</label>&nbsp;&nbsp;
                          <input name="udzur" type="radio" class="radiojk" id="izinsyari" value="Izin Syar'i"/>
                          <label for="is">IZIN SYAR'I</label>&nbsp;&nbsp;
                                <br><br>
                          <label>Keterangan :</label><br>
                          <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Udzur"/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="submitUdzur">SUBMIT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div> 
</div>   

            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusUdzurTahsin" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Batalkan Permintaan Udzur Tahsin ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">YA</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">TIDAK</button>
                        </div>
                    </div>
                </div>
            </div>     

    <script type="text/javascript">
    $(document).ready(function() {
      var t = $('#tableUdzur').DataTable({
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        });
      $(document).on('focus', '.datepicker',function(){
          $(this).bootstrapMaterialDatePicker({ weekStart : 0, time: false })
      });
    } );
    </script> 


    <?php 
        if (isset($_POST['submitUdzur'])) {
          tambahUdzurTahsin($_POST['idTahsin'], $idMahasiswa, $_POST['udzur'], $_POST['keterangan']);

        echo "<script>document.location='index.php?page=udzurtahsin'</script>";
      }
    ?>