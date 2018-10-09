<?php 
  include 'functions2.php';

  $idMahasiswa = $_SESSION['id_mahasiswa'];
  $jKelamin = $_SESSION['jKelamin'];
 ?>

 <!-- <script type="text/javascript">
 // Referensi : https://bootsnipp.com/snippets/featured/multiple-fields

    (function ($) {
        $(function () {

            var addFormGroup = function (event) {
                event.preventDefault();

                var $formGroup = $(this).closest('.form-group');
                var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                var $formGroupClone = $formGroup.clone();

                $(this)
                    .toggleClass('btn-default btn-add btn-danger btn-remove')
                    .html('–');

                $formGroupClone.find('input').val('');
                $formGroupClone.insertAfter($formGroup);

                var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                    $lastFormGroupLast.find('.btn-add').attr('disabled', true);
                }
            };

            var removeFormGroup = function (event) {
                event.preventDefault();

                var $formGroup = $(this).closest('.form-group');
                var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

                var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                    $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                }

                $formGroup.remove();
            };

            var countFormGroup = function ($form) {
                return $form.find('.form-group').length;
            };

            $(document).on('click', '.btn-add', addFormGroup);
            $(document).on('click', '.btn-remove', removeFormGroup);

        });
    })(jQuery);   
 </script> -->
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
                          <h2>DAFTAR PRESENSI MANUAL SHALAT WAJIB&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahUdzur" title="Input Permintaan Udzur Shalat"><i class="material-icons">playlist_add</i><span>TAMBAH PENGAJUAN PRESENSI MANUAL</span></button>
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tablePresensiManual" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Jumlah Waktu Shalat</th>
                                  <th>Waktu Pengajuan</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataManual = tampilShalatManualMhs($idMahasiswa);
                                  $no = 1;
                                  if (is_array($dataManual) || is_object($dataManual)){
                                    foreach($dataManual as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><a href="?page=manualsltdetail&t=<?php echo $row['tanggal']; ?>"><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></a></td>
                                  <td><?php echo $row['jml']; ?></td>
                                  <td><?php echo $row['diajukan']; ?></td>
                                  <td><?php if($row['direview'] == 0){echo '<label class="badge bg-orange">Belum di Review<label>';}else if($row['direview'] == 1){echo '<label class="badge bg-green">Sudah di Review<label>';}?></td>
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
                  <form method="POST" name="formUdzur" id="formJplg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">INPUT PENGAJUAN PRESENSI SHALAT WAJIB MANUAL</h4>
                        </div>
                        <div class="modal-body">             
                                <div class="form-group multiple-form-group" id="defaultForm">          
                                      <label>Tanggal :</label><br>
                                          <input type="text" class="form-control datepicker" name="tmanual[]" placeholder="Tanggal Presensi" required /><br>
                                      <label>Waktu Shalat :</label><br>
                                          <input type="checkbox" class="flat-red" id="check-all1">&nbsp;Semua&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="shubuh[]" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="dzuhur[]" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="ashar[]" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="maghrib[]" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="isya[]" value="isya">&nbsp;Isya
                                          <br><br>
                                      <label>Keterangan :</label><br>
                                      <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Presensi Manual"/>
                                </div>
                                <!-- <button type="button" class="btn btn-xs btn-link waves-effect btn-add" title="Tambah Hari">
                                              <i class="material-icons">add</i>
                                          </button> -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="submitManual">SUBMIT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
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


    <?php 
        if (isset($_POST['submitManual'])) {
          foreach($_POST['tmanual'] as $tgl) {
            if(!empty($_POST['shubuh'])) {
              foreach($_POST['shubuh'] as $shubuh) {
                tambahShalatManual($idMahasiswa, $tgl, $shubuh, $_POST['keterangan']);
              }
            }
            if(!empty($_POST['dzuhur'])) {
              foreach($_POST['dzuhur'] as $dzuhur) {
                tambahShalatManual($idMahasiswa, $tgl, $dzuhur, $_POST['keterangan']);
              }
            }
            if(!empty($_POST['ashar'])) {
              foreach($_POST['ashar'] as $ashar) {
                tambahShalatManual($idMahasiswa, $tgl, $ashar, $_POST['keterangan']);
              }
            }
            if(!empty($_POST['maghrib'])) {
              foreach($_POST['maghrib'] as $maghrib) {
                tambahShalatManual($idMahasiswa, $tgl, $maghrib, $_POST['keterangan']);
              }
            }
            if(!empty($_POST['isya'])) {
              foreach($_POST['isya'] as $isya) {
                tambahShalatManual($idMahasiswa, $tgl, $isya, $_POST['keterangan']);
              }
            }
          }

        echo "<script>document.location='index.php?page=manualslt'</script>";
      }
    ?>