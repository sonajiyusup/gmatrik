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
                          <h2>DAFTAR UDZUR SHALAT &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahUdzur" title="Input Permintaan Udzur Shalat"><i class="material-icons">playlist_add</i><span>TAMBAH PERMINTAAN UDZUR</span></button>
                          </h2>
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
                                  <th>Keterangan</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $dataUdzur = tampilUdzurShalatRoleMhs($idMahasiswa);

                                  if (is_array($dataUdzur) || is_object($dataUdzur)){
                                    foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['udzur']; ?></td>
                                  <td><?php echo $row['wkt']; ?></td>
                                  <td><?php echo $row['jml']; ?></td>
                                  <td><?php if($row['keterangan'] == NULL){echo '-';}else{echo $row['keterangan'];} ?></td>
                                  <td><?php if($row['disetujui'] == 0){echo 'Belum di Review';}else if($row['disetujui'] == 1){echo 'Disetujui';}else if($row['disetujui'] == 2){echo 'Ditolak';} ?></td>
                                </tr>
                                <?php } } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
</div>
</div>

            <div class="modal fade" id="tambahUdzur" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <form method="POST" name="formJplg" id="formJplg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">INPUT PERMINTAAN UDZUR SHALAT</h4>
                        </div>
                        <div class="modal-body">
                                <input name="group1" type="radio" id="radio_30" class="radiojk" name="radiojk" id="sakit" value="sakit"/>
                                <label for="radio_30">SAKIT</label>&nbsp;&nbsp;
                                <input name="group1" type="radio" id="radio_31" class="radiojk" name="radiojk" id="hujan" value="hujan"/>
                                <label for="radio_31">HUJAN DERAS</label>&nbsp;&nbsp;
                                <?php 
                                  if($jKelamin == 'Akhwat'){
                                    echo '<input name="group1" type="radio" id="radio_32" class="radiojk" name="radiojk" id="haid" value="haid"/>
                                <label for="radio_32">HAID</label>';
                                  }
                                ?>
                                <br><br>              
                                <div class="form-group multiple-form-group" id="defaultForm">          
                                    <!-- <label class="switch">
                                      <input type="checkbox" name="opt" id="opt" value="Y" onclick="toggle('.myClass', this)">
                                      <span class="slider round"></span><br>
                                    </label>  --> 

                                    <!-- <div class="showhide">   -->
                                      <!-- <div class="controls">     -->
                                        <!-- <div class="entry"> -->
                                          <input type="text" class="form-control datepicker" name="tudzur[]" placeholder="Tanggal Udzur"/><br>
                                          <!-- <input type="checkbox" class="flat-red" id="check-all1">&nbsp;Semua&nbsp;&nbsp; -->
                                          <input type="checkbox" class="flat-red check" name="shubuh[]" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="dzuhur[]" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="ashar[]" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="maghrib[]" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="isya[]" value="isya">&nbsp;Isya
                                          <br><br>
                                          <!-- <button class="hapus"></button> -->
                                          <br>
                                        <!-- </div> -->
                                      <!-- </div> -->
                                    <!-- </div>   -->
                                </div>
                                <button type="button" class="btn btn-xs btn-link waves-effect btn-add" title="Tambah Hari">
                                              <i class="material-icons">add</i>
                                          </button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="submitJplg">SUBMIT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div> 
</div>      

    <script type="text/javascript">
    $(document).ready(function() {
      var t = $('#tableUdzur').DataTable({});
      $(document).on('focus', '.datepicker',function(){
          $(this).bootstrapMaterialDatePicker({ weekStart : 0, time: false })
      });
    } );
    </script> 


 <?php
  if(isset($_POST['submitJplg'])){
    if (is_array($_POST['wkt1'])) {
      foreach($_POST['wkt1'] as $s){
        tambahJplg($_POST['tplg1'], $_POST['radiojk'], $s);
      }
    }
    /*if (is_array($_POST['wkt2'])) {
      foreach($_POST['wkt2'] as $s){
        tambahJplg($_POST['tplg2'], $_POST['radiojk'], $s);
      }
    }
    if (is_array($_POST['wkt3'])) {
      foreach($_POST['wkt3'] as $s){
        tambahJplg($_POST['tplg3'], $_POST['radiojk'], $s);
      }
    }*/
    echo "<script>document.location='index.php?page=jplg'</script>";
  }
?>
    <script>
    /*$('input').on('ifChecked', function(event){
      var s = $(this).val();
      $('#formJplg').append(
        $('<input>')
          .attr('type', 'hidden')
          .attr('id', 'input'+s)
          .attr('name', 'wkt1[]')
          .val(s)
      );
    });

    $('input').on('ifUnchecked', function(event){
      var s = $(this).val();
      document.getElementById("input"+s).remove();
    });*/

    //j_kelamin radiobutton on Jplg
    /*$('#rdi').on('ifChecked', function (event) {
        $('#rdi').val('Ikhwan');
    });

    $('#rda').on('ifChecked', function (event) {
        $('#rda').val('Akhwat');
    });*/
    </script>