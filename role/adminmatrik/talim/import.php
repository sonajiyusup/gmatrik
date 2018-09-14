<?php 
  include 'functions.php';
 ?>

 <script type="text/javascript">
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
 </script>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                          <h2>IMPORT DATABASE PRESENSI TA'LIM MAHASISWA
                          <small>Ta'lim massal presensi fingerprint</small>
                          </h2>
                        </div>
                        <form method="POST">
                        <div class="body">      

                                      <label>Periode :</label>
                                      &nbsp;
                                      <select class="form-control show-tick" name="period" required>
                                        <?php $dataPresensi = tampilMaxTglPeriodeById();
                                                                foreach($dataPresensi as $row){
                                                                  echo "<option selected='selected' value=''>".$row['id_periode'].". ".date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']))."</option>";
                                                                } 
                                                              ?>

                                        <?php $dataPresensi = tampilPeriodeShalat();
                                                                foreach($dataPresensi as $row){
                                                                  echo "<option value='".$row['id_periode']."'>".$row['id_periode'].". ".date('d M Y', strtotime($row['tanggal_dari']))." - ".date('d M Y', strtotime($row['tanggal_sampai']))."</option>";
                                                                } 
                                                              ?>
                                                
                                      </select> 
                                <br><br><br><br>
                                <label>Jenis Ta'lim :</label>
                                &nbsp;
                                <div class="form-group multiple-form-group">          
                                <input name="group1" type="radio" id="radio_30" class="radiojk" name="radiojk" id="reguler" value="reguler"/>
                                <label for="radio_30">Ta'lim Kepala Matrikulasi</label>&nbsp;&nbsp;
                                <input name="group1" type="radio" id="radio_31" class="radiojk" name="radiojk" id="skb" value="skb"/>
                                <label for="radio_31">Ta'lim SKB</label>&nbsp;&nbsp;
                                <input name="group1" type="radio" id="radio_32" class="radiojk" name="radiojk" id="lain" value="lain"/>
                                <label for="radio_32">Ta'lim Lainnya</label>&nbsp;&nbsp;
                                <br><br>
                                    <!-- <label class="switch">
                                      <input type="checkbox" name="opt" id="opt" value="Y" onclick="toggle('.myClass', this)">
                                      <span class="slider round"></span><br>
                                    </label>  --> 
                                    <!-- <div class="showhide">   -->
                                      <!-- <div class="controls">     -->
                                        <!-- <div class="entry"> -->
                                          <label>Tanggal Ta'lim :</label>
                                          <div class="form-line">
                                            <input type="text" class="form-control datepicker" placeholder="Pilih tanggal" />
                                          </div><br>
                                            <div class="bootstrap-timepicker">
                                                <label>Waktu Ta'lim :</label>
                                              <br>
                                                <div class="form-line">
                                                  <input type="text" name="shubuhFrom" id="shubuh_dari" class="timepicker form-control" placeholder="Dari">
                                                </div>
                                                <div class="form-line">
                                                  <input type="text" name="shubuhTo" id="shubuh_sampai" class="timepicker form-control" placeholder="Sampai">
                                                </div>
                                            </div>
                                          <br><br>
                                            <button type="button" class="btn btn-xs btn-link waves-effect btn-add" title="Tambah Ta'lim">
                                                <i class="material-icons">add</i>
                                            </button>
                                          <!-- <button class="hapus"></button> -->
                                          <br>
                                        <!-- </div> -->
                                      <!-- </div> -->
                                    <!-- </div>   -->
                                </div>
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="importPresensiShalat">IMPORT</button>
                        </form>
</div>
</div>