<?php 
  include 'functions2.php';  
  $idPembina = $_SESSION['id_pembina'];
 ?>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PENYETORAN HAFALAN QURAN MAHASISWA
                                <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahPembina" style="width: 10%;" title="Tambah Data Pembina"><i class="material-icons">playlist_add</i></button>
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
                                    <td><a title='Hapus' style='color:#DD4B39;' href='#ModalHapusSetor' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?idsetor=<?php echo $row['id']; ?>' aria-hidden='true'><i class='material-icons' style='font-size: 17px'>cancel</i></a></td>
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

            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusSetor" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Data Penyetoran Hafalan Quran Mahasiswa?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">YA</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">TIDAK</button>
                        </div>
                    </div>
                </div>
            </div>  

<div class="modal fade" id="tambahPembina" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">FORM INPUT PENYETORAN HAFALAN QURAN MAHASISWA</h4>
                        </div>
                        <div class="modal-body">
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submitSetorHafalan" class="btn btn-primary waves-effect" style="width: 16.66666666666667%;">SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>

    <?php 
        if (isset($_POST['submitSetorHafalan'])) {
          inputSetorHafalan($_POST['idMahasiswa'], $_POST['idSurah'], $_POST['keterangan'], $_POST['tglsetor']);

					echo "<script>document.location='?page=setor'</script>";
        }
    ?>