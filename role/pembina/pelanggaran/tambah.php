<?php 
  include 'functions.php';
 ?>   

	<div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2><a href="?page=pikhtisar" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;TAMBAH DATA PELANGGARAN MAHASISWA BINAAN
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="row clearfix">
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" style="font-size: 24px">streetview</i>
                                        </span>
<<<<<<< HEAD
                                        <input type="text" name="" class="form-control" id="daftarMhs" placeholder="Nama Mahasiswa">
                                    </div>
                                  </div>
                                
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" style="font-size: 24px">streetview</i>
                                        </span>
=======
>>>>>>> 3975af3886a58f692a5995e0ce5d8cdbb54d2d56
                                        <select class="form-control show-tick" id="pbentuk" name="pbentuk">
	                                        <option value="">-- Bentuk Pelanggaran --</option>
                                            <?php
                                            $query = mysql_query("SELECT * FROM pbentuk ORDER BY nama_bentuk");
                                              while ($row = mysql_fetch_array($query)) {
                                              ?>
                                                  <option value="<?php echo $row['id_pbentuk']; ?>">
                                                      <?php echo $row['nama_bentuk']; ?>
                                                  </option>
                                              <?php
                                              }
                                            ?>
                                    		</select>
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" style="font-size: 24px">accessibility</i>
                                        </span>
                                        <select class="form-control show-tick" id="paksi" name="paksi">
                                          <option value="">-- Aksi Pelanggaran --</option>
                                            <?php
                                            $query = mysql_query("SELECT
                                                                *
                                                              FROM
                                                                paksi
                                                                INNER JOIN pbentuk ON paksi.id_pbentuk = pbentuk.id_pbentuk ORDER BY paksi.nama_aksi");
                                              while ($row = mysql_fetch_array($query)) {
                                              ?>
                                                  <option id="paksi" class="<?php echo $row['id_pbentuk']; ?>" value="<?php echo $row['id_paksi']; ?>">
                                                      <?php echo $row['nama_aksi']; ?>
                                                  </option>
                                              <?php
                                              }
                                            ?>
                                        </select>  
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" style="font-size: 24px">turned_in</i>
                                        </span>
                                        <select class="form-control show-tick" id="psanksi" name="psanksi">
                                            <option value="">-- Sanksi --</option>
                                            <?php
                                            $query = mysql_query("SELECT * FROM psanksi ORDER BY nama_sanksi");
                                              while ($row = mysql_fetch_array($query)) {
                                              ?>
                                                  <option value="<?php echo $row['id_psanksi']; ?>">
                                                      <?php echo $row['nama_sanksi']; ?>
                                                  </option>
                                              <?php
                                              }
                                            ?>
                                        </select>  
                                      </div>
                                    </div>

                                    <div class="col-sm-12">
                                      <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" style="font-size: 24px">account_balance</i>
                                        </span>
                                        <select class="form-control show-tick" id="planjut" name="planjut">
                                            <option value="">-- Tindak Lanjut --</option>
                                            <?php
                                            $query = mysql_query("SELECT * FROM planjut pl INNER JOIN psanksi ps ON pl.id_psanksi = ps.id_psanksi ORDER BY pl.level");
                                              while ($row = mysql_fetch_array($query)) {
                                              ?>
                                                  <option id="kota" class="<?php echo $row['id_psanksi']; ?>" value="<?php echo $row['id_planjut']; ?>">
                                                      <?php echo $row['nama_tindaklanjut']; ?>
                                                  </option>
                                              <?php
                                              }
                                            ?>
                                        </select>
                                      </div>
                                    </div>
                                    <!-- <div class="col-sm-12">
                                      <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons" style="font-size: 24px">today</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="tgl_lahir" placeholder="Tanggal" id="datepicker_plgr">
                                            </div>
                                      </div>
                                    </div> -->
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <div class="form-line">
                                          <textarea rows="3" class="form-control no-resize" placeholder="Keterangan"></textarea>
                                        </div>
                                      </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script>
  /*$(function () {
    //Date picker
    $('#datepicker_plgr').datepicker({
      autoclose: true
    })
  })*/
</script>