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
	                        <form method="POST" id="formInputTargetHafalan">
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
	                                    <select class="form-control show-tick" data-live-search="true" name="surah" required>
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
                                DATA TARGET HAFALAN QURAN MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
													<div class="table-responsive">
                                <table id="tableTargetHafalan" class="table table-hover table-condensed js-basic-example">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Quran Juz</th>
                                      <th>Nama Juz</th>
                                      <th>Jumlah Surah</th>
                                      <th>Target Semester</th>
                                      <th>Rentang Waktu</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      $targetHafalan = tampilTargetHafalan();
                                      $no = 1;

                                      if (is_array($targetHafalan) || is_object($targetHafalan)){
                                        foreach($targetHafalan as $row){
                                    ?>
                                  <tr >
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['juz']; ?></td>
                                    <td><?php echo $row['nama_juz']; ?></td>
                                    <td><?php echo $row['jumlah_surah']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    <td><?php echo date('F Y', strtotime($row['dari'])).' - '.date('F Y', strtotime($row['sampai'])); ?></td>
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
          inputTarget($_POST['juz'], $_POST['semester']);

					echo "<script>document.location='?page=targethafalan'</script>";
        }
    ?>