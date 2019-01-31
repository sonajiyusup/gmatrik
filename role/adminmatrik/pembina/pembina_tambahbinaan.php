<?php 
  include 'functions.php';

  $idPembina = $_GET['id'];
  $np = namaPembinaById($idPembina);
  $ip = idUserByIdPembina($idPembina);
 ?>

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2><!-- <a href="?page=pembinadetails&id=<?php foreach($ip as $idP){ echo $idP; }?>&idP=<?php echo $idPembina; ?>" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a> -->&nbsp;&nbsp;&nbsp;<br>TAMBAH DATA MAHASISWA BINAAN 
                            <small>Untuk Pembina Mahasiswa : <?php foreach($np as $namaP){ echo $namaP['nama'].' '.$namaP['gelar']; }?></small>
                          </h2>
                        </div>
                        <div class="body ">
                        		<div class="table-responsive">
															<!-- Table Daftar Pembina -->
                                <table id="tableUsers" class="table table-hover table-condensed js-basic-example dataTable">
                                  <thead>
                                    <tr>
                                      <th>Pilih</th>
                                      <th>NIM</th>
                                      <th>Nama</th>
                                      <!-- <th>Ikhwan/Akhwat</th> -->
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      $calonBinaan = tampilCalonBinaan();
                                      $no = 1;

                                      if (is_array($calonBinaan) || is_object($calonBinaan)){
                                        foreach($calonBinaan as $row){
                                    ?>
                                  <tr style="height: 5px;">
                                    <td><input type="checkbox" class="flat-red" name="idMahasiswa" value="<?php echo $row['id_mahasiswa']; ?>" required></td>
                                    <td><?php echo "<span class='badge'>".$row['nim']."</span>" ?></td>
                                    <td><?php echo "<a href='index.php?page=mahasiswadetails&id=".$row['id_user']."'>".$row['nama']."</a>" ?></td>
                                    <!-- <td><?php if($row['j_kelamin'] == 'Ikhwan' || $row['j_kelamin'] == 'Laki-laki'){echo '<span class="label bg-green">Ikhwan</span>';} else if($row['j_kelamin'] == 'Akhwat' || $row['j_kelamin'] == 'Perempuan'){echo '<span class="label bg-yellow">Akhwat</span>';} else if($row['j_kelamin'] == NULL){echo '<span class="label label-default">Belum diset</span>';} ?></td> -->
                                  </tr>
                                    <?php 
                                      $no++; }
                                     }
                                    ?>      
                                  </tbody>          
                                </table>
                                <!-- /Table Daftar Pembina -->
						              	</div>
                          <form method="POST" id="formBinaan">
						              	<button type="submit" name="submitBinaanMahasiswa" class="btn btn-primary waves-effect">SIMPAN</button>
                            <button class="btn btn-link waves-effect">BATAL</button>
						              </form>
                        </div>
                    </div>
                </div>
            </div>

    <?php 
      foreach($ip as $idP){
        if (isset($_POST['submitBinaanMahasiswa'])) {

          if(!empty($_POST['idMahasiswa'])) {
            foreach($_POST['idMahasiswa'] as $idMhs) {
              tambahMhsBinaan($idPembina, $idMhs);
            }
          }

        echo "<script>document.location='index.php?page=pembinadetails&id=".$idP."&idP=".$idPembina."'</script>";
      }
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
      $('#formBinaan').append(
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