<?php 
  include 'functions2.php';  
  $idPembina = $_SESSION['id_pembina'];
 ?>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT PENYETORAN HAFALAN QURAN MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
	                        <form method="POST" id="formInputdata">
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="input-group">
                                  <label>Tanggal :</label>
                                    <div class="form-line">
                                      <input type="text" class="form-control datepicker" name="tglsetor" placeholder="Tanggal Penyetoran Hafalan" required /><br>
                                    </div>
                                </div>
                              </div>
                          </div>
	                        <div class="row">
	                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	                        		<div class="input-group">
	                                <label>Nama Mahasiswa :</label>
	                                  <div class="form-line">
	                                    <select class="form-control show-tick" data-live-search="true" name="idMahasiswa" required>
	                                    	<option value="">-- Pilih Mahasiswa Binaan --</option>
	                                                        <?php $data = tampilBinaanByPembina($idPembina);
	                                                          foreach($data as $row){
	                                                            echo '<option value="'.$row['id_mahasiswa'].'">'.$row['nama'].'</option>';
	                                                          } 
	                                                        ?>
	                                    </select>
	                                  </div>
	                              </div>
	                        	</div>
	                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	                        		<div class="input-group">
	                                <label>Surah :</label>
	                                  <div class="form-line">
	                                    <select class="form-control show-tick" data-live-search="true" name="idSurah" required>
	                                    	<option value="">-- Pilih Surah Yang Sudah di Setor --</option>
	                                                        <?php $surah = tampilSurah();
	                                                          foreach($surah as $row){
	                                                            echo '<option value="'.$row['id'].'">'.$row['no_surah'].'. '.$row['nama_surah'].' ('.$row['jumlah_ayat'].' Ayat)'.'</option>';
	                                                          } 
	                                                        ?>
	                                    </select>
	                                  </div>
	                              </div>
                                
	                        	</div>
	                        </div>
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="input-group">
                                  <label>Keterangan :</label>
                                    <div class="form-line">
                                      <input type="text" name="keterangan" >
                                    </div>
                                </div>
                              </div>
                          </div>
	                        <button type="submit" class="btn btn-primary waves-effect" name="submitSetorHafalan">SUBMIT</button>
	                        </form>
                        </div>
                    </div>
                </div>
</div>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PENYETORAN HAFALAN QURAN MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
													<div class="table-responsive">
                                <table id="tabledata" class="table table-hover table-condensed js-basic-example">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nama Mahasiswa</th>
                                      <th>No Surah</th>
                                      <th>Nama Surah</th>
                                      <th>Jumlah Ayat</th>
                                      <th>Tanggal Penyetoran</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      $data = tampilSetorHafalanRolePembina($idPembina);
                                      $no = 1;

                                      if (is_array($data) || is_object($data)){
                                        foreach($data as $row){
                                    ?>
                                  <tr >
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['no_surah']; ?></td>
                                    <td><?php echo $row['nama_surah']; ?></td>
                                    <td><?php echo $row['jumlah_ayat']; ?></td>
                                    <td><?php echo date('d-M-Y', strtotime($row['tanggal_setor'])); ?></td>
                                    <td></td>
                                  </tr>
                                    <?php 
                                      $no++; }
                                     }
                                    ?>      
                                  </tbody>          
                                </table>
                                <!-- /Table Daftar Pembina -->
						              	</div>	                        
                        </div>
                    </div>
                </div>
</div>

    <?php 
        if (isset($_POST['submitSetorHafalan'])) {
          inputSetorHafalan($_POST['idMahasiswa'], $_POST['idSurah'], $_POST['keterangan'], $_POST['tglsetor']);

					echo "<script>document.location='?page=setor'</script>";
        }
    ?>