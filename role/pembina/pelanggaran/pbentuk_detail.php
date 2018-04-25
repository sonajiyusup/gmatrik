<?php 
  include 'functions.php';
  $idPbentuk = $_GET['id']; 
  $idPembina = $_SESSION['id_pembina'];

  $nbP = tampilSesuatu('pbentuk', 'nama_bentuk', 'id_pbentuk', $idPbentuk);
 ?>    

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2><a href="?page=pbentuk" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;BENTUK PELANGGARAN
                            <small>Detil Berdasarkan Bentuk Pelanggaran : <b><?php foreach($nbP as $namaPbentuk){ echo $namaPbentuk; }?></b></small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePbentukdetail" class="table table-bordered table-hover table-condensed">
						                <thead>
						                  <tr>
						                    <th>ID Pelanggaran</th>
						                    <th>Nama Mahasiswa</th>
						                    <th>Aksi Pelanggaran</th>
						                    <th>Tanggal</th>
						                    <th></th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPBentuk = pDetailByIdPembina('pbentuk', $idPbentuk, $idPembina);
						                    
						                    $no = 1;
						                  	if (is_array($dataPBentuk) || is_object($dataPBentuk)){
						                    	foreach($dataPBentuk as $row){

						                   ?>
						                <tr>
						                  <td><?php echo $row['id_pelanggaran']; ?></td>
						                  <td><?php echo $row['namamhs']; ?></td>
						                  <td><?php echo $row['nama_aksi']; ?></td>
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
      var t = $('#tablePbentukdetail').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,4]}
            ]
        } );

    } );
    </script> 