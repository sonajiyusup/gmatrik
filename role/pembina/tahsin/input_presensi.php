<?php 
  include 'functions2.php';

  $idPembina = $_SESSION['id_pembina'];
 ?>

	<div class="row clearfix">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                          <h2>FORM INPUT PRESENSI TAHSIN/TAHFIDZ MAHASISWA</h2>
                        </div>
                        <form method="POST" id="formInputPresensiTahsin">
                        <div class="body">                                
                                  
                                    <div class="input-group">
                                      <label>Tanggal :</label>
                                      <div class="form-line">
                                        <input type="text" class="form-control datepicker" name="tgltahsin" placeholder="Tanggal Tahsin" required /><br>
                                      </div>
                                    </div>
                                    <div class="input-group">
                                      <label>Tahsin :</label>
                                      <div class="form-line">
                                        <select class="form-control show-tick" name="namatahsin" required>
                                          <option value="">- Pilih Tahsin -</option>
                                          <option value="badashubuh">Tahsin Ba'da Shubuh</option>
                                          <option value="badaashar">Tahsin Ba'da Ashar</option>
                                          <option value="tambahan">Tahsin Tambahan</option>
                                        </select>
                                      </div>
                                    </div>
                                    <label>Input Presensi :</label>
                                    <div class="table-responsive">
                                    <!-- Table Daftar Pembina -->
                                      <table class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>Hadir?</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          &nbsp;&nbsp;&nbsp;<input type="checkbox" class="flat-red" id="check-all-tahsin">&nbsp;&nbsp;Semua
                                          <?php 
                                            $binaanTahsin = tampilDaftarBinaanTahsin($idPembina);
                                            $no = 1;

                                            if (is_array($binaanTahsin) || is_object($binaanTahsin)){
                                              foreach($binaanTahsin as $row){
                                          ?>
                                        <tr style="height: 5px;">
                                          <td><input type="checkbox" class="flat-red checktahsin" name="idMahasiswa[]" value="<?php echo $row['id_mahasiswa']; ?>"></td>
                                          <td><?php echo "<span class='badge'>".$row['nim']."</span>"; ?></td>
                                          <td><?php echo $row['nama']; ?></td>
                                        </tr>
                                          <?php 
                                            $no++; }
                                           }
                                          ?>      
                                        </tbody>          
                                      </table>
                                      <!-- /Table Daftar Pembina -->
                                    </div>
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="submitPresensiTahsin">SUBMIT</button>
                          </div>
                        </form>
</div>
</div>
</div>   

    <?php 
     
        if (isset($_POST['submitPresensiTahsin'])) {

          if(!empty($_POST['idMahasiswa'])) {
            foreach($_POST['idMahasiswa'] as $idMhs) {
              inputPresensiTahsin($idMhs, $_POST['tgltahsin'], $_POST['namatahsin']);
            }
          }

        //echo "<script>document.location='index.php'</script>";
        }
     
    ?>


    <script>
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-green'
    })

    $('input').on('ifChecked', function(event){
      var idMhs = $(this).val();
      $('#formInputPresensiTahsin').append(
        $('<input>')
          .attr('type', 'hidden')
          .attr('id', 'input'+idMhs)
          .attr('name', 'idMahasiswa[]')
          .val(idMhs)
      );
    });

    $('input').on('ifUnchecked', function(event){
      var idMhs = $(this).val();
      document.getElementById("input"+idMhs).remove();
    });
    </script>