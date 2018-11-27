<?php 
  include 'functions2.php';
 ?>

    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

  <?php 
              if (isset($_GET['alert'])) {
                if ($_GET['alert'] == 'duplicateusername') {
                  echo "<div class='alert bg-red alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <strong>Tambah Data Orang Tua Gagal !</strong> Username tidak boleh sama
                            </div>";
                }
              }
             ?>  

                    <div class="card">
                        <div class="header">
                          <h2>DATA ORANG TUA MAHASISWA
                          <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahOrtu" style="width: 10%;" title="Tambah Data Orang Tua Mahasiswa"><i class="material-icons">playlist_add</i></button>
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

<div class="modal fade" id="tambahOrtu" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data Orang Tua Mahasiswa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="namaOrtu" class="form-control date" placeholder="Nama Orang Tua Mahasiswa" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="telp" class="form-control date" placeholder="No Telp." required>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="alamat" class="form-control date" placeholder="Alamat" >
                                        </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control date" placeholder="Email" required>
                                        </div>
                                  </div>
                                </div>

                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control date" placeholder="Username" required>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="password" class="form-control date" placeholder="Password" required>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                      </span>
                                    <div class="form-line">
                                      <select class="form-control show-tick" data-live-search="true" name="idMahasiswa" required>
                                        <option value="">-- Pilih Mahasiswa --</option>
                                                          <?php $data = tampilMahasiswa($idPembina);
                                                            foreach($data as $row){
                                                              echo '<option value="'.$row['id_mahasiswa'].'">'.$row['nama'].'</option>';
                                                            } 
                                                          ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambahOrtu" class="btn btn-primary waves-effect" style="width: 16.66666666666667%;">SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>            

    <?php 
      if (isset($_POST['tambahOrtu'])) {
        tambahOrtu($_POST['namaOrtu'], $_POST['alamat'], $_POST['email'], $_POST['telp'], $_POST['username'], $_POST['password'], $_POST['idMahasiswa']);
        
        //echo "<script>document.location='?page=ortu'</script>";
      }
    ?> 

    <script>
    $(document).ready(function() {
      var t = $('#tableOrtu').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        } );

    } );
    </script>    