<?php 
  include 'functions.php';
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>AKSI PELANGGARAN
                            <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahPbentuk" style="width: 10%;" title="Tambah Master Aksi Pelanggaran"><i class="material-icons">playlist_add</i></button>
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
						                    $dataPaksi = tampilPaksi();
						                    
						                    $no = 1;
						                  	if (is_array($dataPaksi) || is_object($dataPaksi)){
						                    	foreach($dataPaksi as $row){

						                   ?>
						                <tr>
						                  <td><?php echo $no; ?></td>
						                  <td><a href="?page=paksidetail&id=<?php echo $row['id_paksi']; ?> "><?php echo $row['nama_aksi']; ?></a></td>
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
      var t = $('#tablePaksi').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>            