<?php 
  include 'functions2.php';  
 ?>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT TARGET HAFALAN QURAN MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
	                        <form method="POST" id="formInputTargetHafalan">
	                        <div class="row">
	                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	                        		<div class="input-group">
	                                <label>Juz :</label>
	                                  <div class="form-line">
	                                    <select class="form-control show-tick" data-live-search="true" name="juz" required>
	                                    	<option value="">-- Pilih Target Juz Quran --</option>
	                                                        <?php $juz = tampiljuz();
	                                                          foreach($juz as $row){
	                                                            echo '<option value="'.$row['id'].'">Juz '.$row['juz'].' ('.$row['deskripsi'].') '.$row['jumlah_surah'].' Surah</option>';
	                                                          } 
	                                                        ?>
	                                    </select>
	                                  </div>
	                              </div>
	                        	</div>
	                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	                        		<div class="input-group">
	                                <label>Semeser :</label>
	                                  <div class="form-line">
	                                    <select class="form-control show-tick" name="semester" required>
	                                    	<option value="">-- Pilih Target Semester --</option>
	                                                        <?php $juz = tampilSemester();
	                                                          foreach($juz as $row){
	                                                            echo '<option value="'.$row['id'].'">Semester '.$row['semester'].' ('.date('F Y', strtotime($row['dari'])).' - '.date('F Y', strtotime($row['sampai'])).')</option>';
	                                                          } 
	                                                        ?>
	                                    </select>
	                                  </div>
	                              </div>
	                        	</div>
	                        </div>
	                        <button type="submit" class="btn btn-primary waves-effect" name="submitTargetHafalan">SUBMIT</button>
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
        if (isset($_POST['submitTargetHafalan'])) {
          inputTarget($_POST['juz'], $_POST['semester']);

					echo "<script>document.location='?page=targethafalan'</script>";
        }
    ?>