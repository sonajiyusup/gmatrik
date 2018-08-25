<?php 
  include 'functions.php';
  include 'functions2.php';
 ?>
<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR UDZUR SHALAT &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahUdzur" title="Input Permintaan Udzur Shalat"><i class="material-icons">playlist_add</i><span>TAMBAH DATA</span></button>
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableJplg" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>Periode</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Waktu Shalat</th>
                                  <th>Jumlah Waktu Shalat</th>
                                  <th>Keterangan</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $dataPresensi = tampilJplg();
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php echo $row['j_kelamin']; ?></td>
                                  <td><?php echo $row['wkt']; ?></td>
                                  <td><?php echo $row['jws']; ?></td>
                                  <td></td>
                                </tr>
                                <?php $no++; } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
</div>
</div>

            <div class="modal fade" id="tambahJplg" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <form method="POST" name="formJplg" id="formJplg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">INPUT PERMINTAAN UDZUR SHALAT</h4>
                        </div>
                        <div class="modal-body">
                                <input name="group1" type="radio" id="radio_30" class="radiojk" name="radiojk" id="rdi" value="sakit"/>
                                <label for="radio_30">SAKIT</label>&nbsp;
                                <input name="group1" type="radio" id="radio_31" class="radiojk" name="radiojk" id="rda" value="hujan"/>
                                <label for="radio_31">HUJAN DERAS</label>
                                <input name="group1" type="radio" id="radio_31" class="radiojk" name="radiojk" id="rda" value="haid"/>
                                <label for="radio_31">HAID</label><br><br>                        
                                    <label>Hari 1</label>&nbsp;
                                    <!-- <label class="switch">
                                      <input type="checkbox" name="opt" id="opt" value="Y" onclick="toggle('.myClass', this)">
                                      <span class="slider round"></span><br>
                                    </label>  --> 

                                    <!-- <div class="showhide">   -->
                                      <!-- <div class="controls">     -->
                                        <!-- <div class="entry"> -->
                                          <input type="text" id="txt" class="datepicker form-control" name="tplg1" placeholder="Tanggal Pulang"/><br>
                                          <input type="checkbox" class="flat-red" id="check-all1">&nbsp;Semua&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1" value="isya">&nbsp;Isya
                                          <br>
                                          <!-- <button type="button" class="btn btn-xs btn-primary waves-effect btn-add">
                                              <i class="material-icons">add</i>
                                          </button> -->
                                          <!-- <button class="hapus"></button> -->
                                          <br>
                                        <!-- </div> -->
                                      <!-- </div> -->
                                    <!-- </div>                           -->
                                    <label>Hari 2</label>&nbsp;
                                          <input type="text" id="txt" class="datepicker form-control" name="tplg2" placeholder="Tanggal Pulang"/><br>
                                          <input type="checkbox" class="flat-red" id="check-all2">&nbsp;Semua&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="isya">&nbsp;Isya
                                          <br>
                                          <br>
                                    <label>Hari 3</label>&nbsp;
                                          <input type="text" id="txt" class="datepicker form-control" name="tplg3" placeholder="Tanggal Pulang"/><br>
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="isya">&nbsp;Isya
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

    <script>
    $(document).ready(function() {
      var t = $('#tableJplg').DataTable({});
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
    $('input').on('ifChecked', function(event){
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
    });

    //j_kelamin radiobutton on Jplg
    $('#rdi').on('ifChecked', function (event) {
        $('#rdi').val('Ikhwan');
    });

    $('#rda').on('ifChecked', function (event) {
        $('#rda').val('Akhwat');
    });
    </script>