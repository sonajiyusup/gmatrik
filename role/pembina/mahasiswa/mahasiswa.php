<?php 
  include 'functions.php';

  $idPembina = $_SESSION['id_pembina'];

 ?>

    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR MAHASISWA BINAAN
                          </h2>
                        </div>
                        <div class="body ">
                            <div class="table-responsive">
                                    <!-- Table Daftar Pembina -->
                                      <table id="tableMhsBinaan" class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Telp</th>
                                            <th>Terakhir Login</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $dataMhsBinaan = tampilBinaanByPembina($idPembina);
                                            $no = 1;
                                            if (is_array($dataMhsBinaan) || is_object($dataMhsBinaan)){
                                             foreach($dataMhsBinaan as $row){
                                           ?>
                                        <tr>
                                          <td><b><?php echo $no ?></b></td> 
                                          <td><span class='label bg-deep-orange'><?php echo $row['nim'] ?></span></td> 
                                          <td><?php echo "<a href='index.php?page=mahasiswadetails&id=".$row['id_user']."' style='text-decoration:none'>".$row['nama']."</a>" ?></td>
                                          <td><?php if($row['telp'] == NULL){echo 'Belum Diinput';}else{echo $row['telp']; } ?></td>
                                          <td><?php if ($row['last_login'] == '0000-00-00 00:00:00'){ echo '<span class="label bg-grey">Belum Pernah</span>';}else{ echo date("d-m-Y H:i", strtotime($row['last_login'])) ;}?></td>
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
</div>

            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusPembina" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Data Pembina ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>

    <script>
    $(document).ready(function() {
      var t = $('#tableMhsBinaan').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>    