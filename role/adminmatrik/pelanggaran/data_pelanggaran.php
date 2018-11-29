<?php 
  include 'functions2.php';
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA PELANGGARAN MAHASISWA&nbsp;&nbsp;
                          <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahPelanggaran" style="width: 6%;" title="Tambah Data Pelanggaran"><i class="material-icons">playlist_add</i></button>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePelanggaran" class="table table-bordered table-hover table-condensed">
						                <thead>
                              <tr>
                                <th>#</th>
                                <th>Nama Mahasiswa</th>
                                <th width="235">Aksi Pelanggaran</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Sanksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $dataPelanggaran = tampilPelanggaranRoleAdminmatrik();
                                
                                $no = 1;
                                foreach($dataPelanggaran as $row){
                               ?>
                            <tr>
                              <td><b><?php echo $no ?></b></td>  
                              <td><?php echo $row['nama']; ?></td>
                              <td><?php echo $row['aksi_pelanggaran']; ?></td>
                              <td><?php echo $row['keterangan']; ?></td>
                              <td><?php echo $row['tanggal']; ?></td>
                              <td><?php echo $row['sanksi']; ?></td>
                            </tr>
                              <?php 
                                $no++; }
                               ?>      
                            </tbody>  
						              </table>
						              <!-- /Table Daftar Pembina -->   
						              </div>                       
                        </div>
                    </div>
                </div>
</div>           

<div class="modal fade" id="tambahPelanggaran" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <form method="POST" name="formJplg" id="formJplg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">INPUT DATA PELANGGARAN MAHASISWA</h4>
                        </div>
                        <div class="modal-body">
                                <label>Mahasiswa Yang Melanggar</label>&nbsp;
                                <select class="form-control show-tick" name="idMahasiswa" data-live-search="true" required>
                                  <option value="">-- Pilih Mahasiswa --</option>

                                  <?php $dataMahasiswa = tampilMahasiswa();
                                                          foreach($dataMahasiswa as $row){
                                                            echo "<option value='".$row['id_mahasiswa']."'>".$row['nama']."</option>";
                                                          } 
                                                        ?>
                                          
                                </select> 
                                <br><br>            
                                <label>Kategori Aksi Pelanggaran</label>&nbsp;
                                <select class="form-control show-tick" name="aksi" data-live-search="true" required>
                                  <option value="">-- Pilih Aksi Pelanggaran --</option>

                                  <?php $dataAksi = tampilAksiPelanggaranRoleAdminmatrik();
                                                          foreach($dataAksi as $row){
                                                            echo "<option value='".$row['id']."'>".$row['aksi_pelanggaran']."</option>";
                                                          } 
                                                        ?>
                                          
                                </select> 
                                <br><br>            
                                <label>Sanksi</label>&nbsp;
                                <select class="form-control show-tick" name="sanksi" required>
                                  <option value="">-- Pilih Sanksi --</option>

                                  <?php $dataSanksi = tampilSanksiPelanggaranRoleAdminmatrik();
                                                          foreach($dataSanksi as $row){
                                                            echo "<option value='".$row['id']."'>".$row['sanksi']."</option>";
                                                          } 
                                                        ?>
                                </select> 
                                <br><br>            
                                <label>Tanggal Pelanggaran</label>&nbsp;
                                <input type="text" id="txt" class="datepicker form-control" name="tplg2" placeholder="Pilih Tanggal"/>
                                <br>          
                                <label>Keterangan</label>&nbsp;
                                <textarea class="form-control" rows="3" name="keterangan" placeholder="Masukan Keterangan Pelanggaran"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="submitPelanggaran">SUBMIT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div> 

    <script>
    $(document).ready(function() {
      var t = $('#tablePelanggaran').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>  