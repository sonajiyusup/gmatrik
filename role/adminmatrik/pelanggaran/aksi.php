<?php 
  include 'functions.php';
 ?>   

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>AKSI PELANGGARAN
                            <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahPaksi" style="width: 10%;" title="Tambah Master Aksi Pelanggaran"><i class="material-icons">playlist_add</i></button>
                            <small>Data Pelanggaran Berdasarkan Aksi</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
									<!-- Table Daftar Pembina -->
						              <table id="tablePaksi" class="table table-bordered table-hover table-condensed">
						              	<thead>
						                  <tr>
						                    <th></th>
						                    <th>Nama Pembina</th>
						                    <th>Jumlah Binaan</th>
						                    <th>Ikhwan/Akhwat</th>
						                    <th>Telp</th>
						                    <th>Terakhir Login</th>
						                    <th>Aksi</th>
						                  </tr>
						                </thead>
						                <tbody>
						                  <?php 
						                    $dataPelanggaran = tampilPembina();
						                    
						                    $no = 1;
						                    foreach($dataPelanggaran as $row){
						                   ?>
						                <tr>
						                  <td><b><?php echo $no ?></b></td>  
						                  
						                 	<td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a title='Edit' style="color:#3C8DBC;" href="?page=editpembina&id=<?php echo $row['id_user']; ?>&idP=<?php echo $row['id_pembina']; ?>" class='dropdown-item'><i class='material-icons' style='font-size: 20px'>mode_edit</i></a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><?php echo "<a title='Hapus' style='color:#DD4B39;' href='#ModalHapusPembina' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?idpembina=".$row['id_pembina']."&iduser=".$row['id_user']."' aria-hidden='true'><i class='material-icons' style='font-size: 20px'>delete</i></a>"; ?></li>
                                                    </ul>
                                                </div>
						                  </td>
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