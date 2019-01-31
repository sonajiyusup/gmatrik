<?php 
  include 'functions.php';
 ?>
<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR JADWAL TA'LIM MAHASISWA &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahJplg" title="Import Database Mahasiswa"><i class="material-icons">playlist_add</i><span>TAMBAH DATA</span></button>
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tableJtalim" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>Periode</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Ikhwan/Akhwat</th>
                                  <th>Ta'lim</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  $dataPresensi = tampilJtalim();

                                  if (is_array($dataPresensi) || is_object($dataPresensi)){
                                  foreach($dataPresensi as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $row['id_periode']; ?></td>
                                  <td><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></td>
                                  <td><?php if($row['j_kelamin'] == 'Ikhwan' || $row['j_kelamin'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['j_kelamin'] == 'Akhwat' || $row['j_kelamin'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                                  <td><?php if($row['talim'] == 'shubuh'){echo "Ba'da Shubuh";}else if($row['talim'] == 'isya'){echo "Ba'da Isya";}else if($row['talim'] == 'skb'){echo "Kajian Bulanan SKB";} ?></td>
                                </tr>
                                <?php $no++; } } ?>
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
                        <h4 class="modal-title" id="smallModalLabel">INPUT JADWAL TA'LIM MAHASISWA</h4>
                        </div>
                        <div class="modal-body">
                                    <input name="group1" type="radio" id="radio_30" class="radiojk" name="radiojk" id="rdi" value="Ikhwan"/>
                                    <label for="radio_30">IKHWAN</label>&nbsp;
                                    <input name="group1" type="radio" id="radio_31" class="radiojk" name="radiojk" id="rda" value="Akhwat"/>
                                    <label for="radio_31">AKHWAT</label><br><br>        
                                    <label>Tanggal</label>&nbsp;
                                    <!-- <label class="switch">
                                      <input type="checkbox" name="opt" id="opt" value="Y" onclick="toggle('.myClass', this)">
                                      <span class="slider round"></span><br>
                                    </label>  --> 

                                    <!-- <div class="showhide">   -->
                                      <!-- <div class="controls">     -->
                                        <!-- <div class="entry"> -->
                                          <input type="text" id="txt" class="datepicker form-control" name="tplg1" placeholder="Tanggal Ta'lim"/><br>

                                          <label>Waktu Ta'lim</label><br>
                                          <input name="group2" type="radio" id="radio_30" class="radiojk" name="radiojk" id="rdi" value="aftershubuh"/>
                                          <label for="radio_5">Ba'da Shubuh</label>&nbsp;
                                          <input name="group2" type="radio" id="radio_31" class="radiojk" name="radiojk" id="rda" value="afterashar"/>
                                          <label for="radio_6">Ba'da Ashar</label><br><br>  
                                         
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
      var t = $('#tableJtalim').DataTable({});
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