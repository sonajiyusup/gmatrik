<?php 
  include 'functions2.php';
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>SANKSI
                          <small>Data Pelanggaran Berdasarkan Sanksi</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tableSanksi" class="table table-bordered table-hover table-condensed">
						                <thead>
                              <tr>
                                <th>#</th>
                                <th>Sanksi Pelanggaran</th>
                                <th>Jumlah Pelanggaran</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $dataPelanggaran = sanksiPelanggaranRoleAdminmatrik();
                                
                                $no = 1;
                                foreach($dataPelanggaran as $row){
                               ?>
                            <tr>
                              <td><b><?php echo $no ?></b></td>  
                              <td><?php echo $row['sanksi']; ?></td>
                              <td><?php echo $row['jmls']; ?></td>
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
      var t = $('#tableSanksi').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>   