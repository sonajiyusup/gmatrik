<?php 
  include 'functions.php';
  $idPaksi = $_GET['id']; 

  $naP = tampilSesuatu('paksi', 'nama_aksi', 'id_paksi', $idPaksi);
 ?>     

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2><a href="?page=paksi" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;AKSI PELANGGARAN
                            <small>Detil Berdasarkan Aksi Pelanggaran : <b><?php foreach($naP as $namaPaksi){ echo $namaPaksi; }?></b></small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePaksidetail" class="table table-bordered table-hover table-condensed">
						                <thead>
						                  <tr>
						                    <th>ID Pelanggaran</th>
						                    <th>Nama Mahasiswa</th>
						                    <th>Sanksi</th>
						                    <th>Tanggal</th>
						                    <th></th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPAksi = pDetailById('paksi', $idPaksi);
						                    
						                    $no = 1;
						                  	if (is_array($dataPAksi) || is_object($dataPAksi)){
						                    	foreach($dataPAksi as $row){

						                   ?>
						                <tr>
						                  <td><?php echo $row['id_pelanggaran']; ?></td>
						                  <td><?php echo $row['namamhs']; ?></td>
						                  <td><?php echo $row['nama_sanksi']; ?></td>
						                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
						                 	<td><a class="btn btn-link btn-xs" href="index.php?page=pmaindetail&id=<?php echo $row['id_pelanggaran']; ?>">Lihat Detil</a></td>
						                </tr>
						                  <?php 
						                    }
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
      var t = $('#tablePaksidetail').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,4]}
            ]
        } );

    } );
    </script> 