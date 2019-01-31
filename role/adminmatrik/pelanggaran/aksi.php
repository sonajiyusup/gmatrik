<?php 
  include 'functions2.php';
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>AKSI PELANGGARAN
                            <!-- <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahPaksi" style="width: 10%;" title="Tambah Master Aksi Pelanggaran"><i class="material-icons">playlist_add</i></button> -->
                            <small>Data Pelanggaran Berdasarkan Aksi</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePaksi" class="table table-bordered table-hover table-condensed">
						              	<thead>
						                  <tr>
						                    <th>#</th>
						                    <th>Aksi Pelanggaran</th>
						                    <th>Jumlah Pelanggaran</th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPelanggaran = aksiPelanggaranRoleAdminmatrik();
						                    
						                    $no = 1;
						                    foreach($dataPelanggaran as $row){
						                   ?>
						                <tr>
						                  <td><b><?php echo $no ?></b></td>  
						                  <td><?php echo $row['aksi_pelanggaran']; ?></td>
                              <td><?php echo $row['jmlp']; ?></td>
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

            <div class="modal fade" id="tambahPaksi" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                	<form method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Tambah Data Master Aksi Pelanggaran Mahasiswa</h4>
                        </div>
                        <div class="modal-body">   
                        	
                    		</div>  
                        <div class="modal-footer">
                            <button type="submit" name="tambahPaksi" class="btn btn-primary btn-ok waves-effect">SUBMIT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>

    <?php 
      if (isset($_POST['tambahPaksi'])) {
        tambahPaksi($_POST['idPbentuk'], $_POST['nama_aksi']);
        echo "<script>document.location='index.php?page=paksi'</script>";
      }
    ?> 

    <script>
    $(document).ready(function() {
      var t = $('#tablePaksi').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>            