<?php 
  include 'functions.php';
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>BENTUK PELANGGARAN
                            <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahPbentuk" style="width: 10%;" title="Tambah Master Bentuk Pelanggaran"><i class="material-icons">playlist_add</i></button>
                            <small>Data Pelanggaran Berdasarkan Bentuk</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePbentuk" class="table table-bordered table-hover table-condensed">
						                <thead>
						                  <tr>
							                    <th>#</th>
							                    <th>Bentuk Pelanggaran</th>
							                    <th>Jumlah Pelanggaran</th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPBentuk = tampilPbentuk();
						                    
						                    $no = 1;
						                  	if (is_array($dataPBentuk) || is_object($dataPBentuk)){
						                    	foreach($dataPBentuk as $row){
															?>
						                <tr>
						                  <td><?php echo $no; ?></td>
						                  <td><a href="?page=pbentukdetail&id=<?php echo $row['id_pbentuk']; ?> "><?php echo $row['nama_bentuk']; ?></a></td>
						                  <td><?php echo $row['jumlah']; ?></td>
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

    <script>
    $(document).ready(function() {
      var t = $('#tablePbentuk').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>            