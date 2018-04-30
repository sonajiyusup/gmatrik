<?php 
  include 'functions.php';

  $idPembina = $_SESSION['id_pembina'];
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR PELANGGARAN MAHASISWA 
                            <a href="?page=tambahpelanggaran" class="btn btn-sm btn-link waves-effect" style="width: 10%;" title="Tambah Data Pelanggaran"><i class="material-icons">playlist_add</i></a>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pelanggaran -->
						              <table id="tablePelanggaran" class="table table-bordered table-hover table-condensed">
						                <thead>
						                  <tr>
						                    <th>#</th>
																<th>Nama Mahasiswa</th>
																<th>Aksi Pelanggaran</th>
																<th>Sanksi</th>
																<th>Tindak Lanjut</th>
																<th>Tanggal</th>
																<th></th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
																$dataPikhtisar = tampilPikhtisarByPembina($idPembina);
																                                                
																$no = 1;
																if (is_array($dataPikhtisar) || is_object($dataPikhtisar)){
																foreach($dataPikhtisar as $row){
																?>
						                <tr>
						                  <td><?php echo $no; ?></td>
						                  <td><?php echo $row['namamhs']; ?></td>
						                  <td><?php echo $row['nama_aksi']; ?></td>
						                  <td><?php echo $row['nama_sanksi']; ?></td>
						                  <td><?php echo $row['nama_tindaklanjut']; ?></td>
						                  <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
						                 	<td><a class="btn btn-link btn-xs" href="index.php?page=pmaindetail&id=<?php echo $row['id_pelanggaran']; ?>">Lihat Detil</a></td>
						                </tr>
						                  <?php 
						                    $no++; }
						                   }
						                  ?>      
						                </tbody>          
						              </table>
						              <!-- /Table Daftar Pelanggaran -->  
						              </div>                       
                        </div>
                    </div>
                </div>
            </div>

    <script>
    $(document).ready(function() {
      var t = $('#tablePelanggaran').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,6]}
            ]
        } );

    } );
    </script>            