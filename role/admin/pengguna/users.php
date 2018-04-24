<?php 
  include 'functions.php';
 ?>

<?php 
                              if (isset($_GET['alert'])) {
                                if ($_GET['alert'] == 'duplicateusername') {
                                  echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          Username Sudah Pernah Dibuat, Coba lagi dengan nama lain...
                                        </div>';
                                }
                              }
                            ?> 
                            
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>MANAJEMEN PENGGUNA 
                            <button class="btn btn-sm btn-link waves-effect " data-toggle="modal" data-target="#tambahUser" style="width: 10%;" title="Tambah Penguna Sistem"><i class="material-icons">playlist_add</i></button>
                            <small>Semua Pengguna Sistem</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
													<!-- Table Daftar User -->
						              <table id="tableUser" class="table table-hover table-condensed">
						                <thead>
						                  <tr>
						                    <th>ID User</th>
						                    <th>Username</th>
						                    <th></th>
						                    <th></th>
						                    <th>Level</th>
						                    <th>Terakhir Login</th>
						                    <th>Aksi</th>
						                  </tr>
						                </thead>
						              </table>
						              <!-- /Table Daftar User -->   
						              </div>                       
                        </div>
                    </div>
                </div>
            </div>

<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Pengguna Sistem</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_outline</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Nama" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">domain</i>
                                        </span>
                                        <select class="form-control show-tick" name="level" required>
                                          <option value="">-- Hak Akses --</option>
                                          <option value="0">Administrator</option>
                                          <option value="1">Pimpinan</option>
                                          <option value="2">Admin Matrikulasi</option>
                                      </select>                                            
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">people</i>
                                        </span>
                                        <select class="form-control show-tick" name="gender" required>
                                          <option value="">-- Ikhwan/Akhwat --</option>
                                          <option value="Ikhwan">Ikhwan</option>
                                          <option value="Akhwat">Akhwat</option>
                                      </select>                                            
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambahUser" class="btn btn-primary waves-effect" style="width: 16.66666666666667%;">SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>

    <?php 
      if (isset($_POST['tambahUser'])) {
        $status = tambahUser($_POST['nama'], $_POST['gender'], $_POST['level'], $_POST['username']);

        if ($status == 1) {
          echo "<script>document.location='?page=users&alert=duplicateusername'</script>";
        } else{
          echo "<script>document.location='?page=users'</script>";
        }
      }
    ?> 


    <script>
    $(document).ready(function() {
      var t = $('#tableUser').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "/gmatrik/dataUser.php",
            "order": [[ 4, "asc" ]],
            "columnDefs": [
            	{ "visible": false, "targets": [2,3]},
              { "searchable": false, "orderable": false, "targets": [6]}
            ]
        } );

    } );
    </script>  