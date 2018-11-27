<?php 
  include 'functions2.php';
 ?>

    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA ORANG TUA MAHASISWA
                          </h2>
                        </div>
                        <div class="body ">
                            <div class="table-responsive">
                                      <table id="tableOrtu" class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Nama Orang Tua Mahasiswa</th>
                                            <th>Telp</th>
                                            <th>Alamat</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Terakhir Login</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $dataOrtu = tampilOrtuRoleAdminmatrik();
                                            $no = 1;
                                            if (is_array($dataOrtu) || is_object($dataOrtu)){
                                             foreach($dataOrtu as $row){
                                           ?>
                                        <tr>
                                          <td><b><?php echo $no ?></b></td> 
                                          <td><a href="?page=ortudetail&id=<?php echo $row['id']; ?>"><?php echo $row['nama_ortu']; ?></a></td>
                                          <td><?php echo $row['telp'] ?></td>
                                          <td><?php echo $row['alamat'] ?></td>
                                          <td><a href="?page=mahasiswadetails&id=<?php echo $row['uid_mhs']; ?>"><?php echo $row['nama_mahasiswa'] ?></a></td>
                                          <td><?php if ($row['last_login'] == '0000-00-00 00:00:00'){ echo '<span class="label bg-grey">Belum Pernah</span>';}else{ echo date("d-m-Y H:i", strtotime($row['last_login'])) ;}?></td>
                                        </tr>
                                          <?php 
                                            $no++; }
                                          }
                                          ?>      
                                        </tbody>          
                                      </table>
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
      var t = $('#tableOrtu').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>    