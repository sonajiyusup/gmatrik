<?php 
  include 'functions2.php';
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA PELANGGARAN MAHASISWA
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
                                <th>Aksi Pelanggaran</th>
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

    <script>
    $(document).ready(function() {
      var t = $('#tablePelanggaran').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>  