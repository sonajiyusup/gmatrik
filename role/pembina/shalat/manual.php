<?php 
  include 'functions2.php';

  $idPembina = $_SESSION['id_pembina'];
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
    event.preventDefault();
    var r = makeid();
    var addElement = '<div class="form-group multiple-form-group" id="formUdzur_'+r+'"><div class="row"><div class="col-xs-8"><input type="text" class="form-control datepicker" name="tudzur[]" placeholder="Tanggal Udzur"/></div><div class="col-xs-4"><button type="button" class="btn btn-xs btn-link waves-effect btn-delete" title="Hapus Hari" onclick="deleteFormGroup(\''+r+'\');"> <i class="material-icons">delete</i> </button></div></div><br><input type="checkbox" class="flat-red check" name="shubuh[]" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp; <input type="checkbox" class="flat-red check" name="dzuhur[]" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp; <input type="checkbox" class="flat-red check" name="ashar[]" value="ashar">&nbsp;Ashar&nbsp;&nbsp; <input type="checkbox" class="flat-red check" name="maghrib[]" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp; <input type="checkbox" class="flat-red check" name="isya[]" value="isya">&nbsp;Isya <br><br> </div>';
    $("#defaultForm").append(addElement);
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    }); 
};

$(document).on('click', '.btn-add', addFormGroup);

</script>
<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR PRESENSI MANUAL SHALAT WAJIB
                            <small>Berdasarkan Tanggal & Mahasiswa</small>
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tablePresensiManual" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Nama Mahasiswa</th>
                                  <th>Jumlah Waktu Shalat</th>
                                  <th>Waktu Pengajuan</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataManual = tampilShalatManualMhsRolePembina($idPembina);
                                  $no = 1;
                                  if (is_array($dataManual) || is_object($dataManual)){
                                    foreach($dataManual as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php echo $row['jml']; ?></td>
                                  <td><?php echo $row['diajukan']; ?></td>
                                  <td><?php if($row['direview'] == 0){echo '<label class="badge bg-orange">Belum di Review<label>';}else if($row['direview'] == 1){echo '<label class="badge bg-green">Sudah di Review<label>';}?></td>
                                  <td><a href="?page=manualsltdetail&m=<?php echo $row['id_mahasiswa']; ?>&t=<?php echo $row['tanggal']; ?>" class="btn btn-xs">Review</a></td>
                                </tr>
                                <?php $no++; } } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
</div>
</div>
</div>      

    <script type="text/javascript">
    $(document).ready(function() {
      var t = $('#tablePresensiManual').DataTable({
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        });
      $(document).on('focus', '.datepicker',function(){
          $(this).bootstrapMaterialDatePicker({ weekStart : 0, time: false })
      });
    } );
    </script> 