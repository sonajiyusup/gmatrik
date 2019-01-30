<?php 
  include 'functions.php';
 ?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA PIMPINAN &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#TambahPimpinan" title="Tambah Data Pimpinan"><i class="material-icons">get_app</i><span>TAMBAH DATA</span></button>
                          </h2>
                        </div>
                        <div class="body ">
                            <div class="table-responsive">
                                
                                      <table id="tableUser" class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Ikhwan/Akhwat</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $dataPimpinan = tampilPimpinan();
                                            
                                            $no = 1;
                                            foreach($dataPimpinan as $row){
                                           ?>
                                        <tr>
                                          <td><b><?php echo $no; ?></b></td>  
                                          <td><?php echo $row['nama'];?></td>
                                          <td><?php if($row['gender'] == 'Ikhwan' || $row['gender'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['gender'] == 'Akhwat' || $row['gender'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                                          <td><?php echo $row['jabatan'];?></td>
                                          <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a title='Edit' style="color:#3C8DBC;" href="?page=editpimpinan&id=<?php echo $row['id_pimpinan'];?>" class='dropdown-item'><i class='material-icons' style='font-size: 20px'>mode_edit</i></a></li>
                                                                </ul>
                                                            </div>
                                          </td>
                                        </tr>
                                          <?php 
                                            $no++; }
                                           ?>      
                                        </tbody> 
                                      </table>
                                    
                                      </div>                       
                        </div>
                    </div>
                </div>
            </div> 

    </section>
    <!-- /.content -->

    <script>
/*    $(document).ready(function() {
      var t = $('#tablePembina').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "/gmatrik/dataMahasiswa.php",
            "order": [[ 4, "asc" ]],
            "columnDefs": [
              { "visible": false, "targets": [0,1,2]},
              { "searchable": false, "orderable": false, "targets": [5,6,7]}
            ]
        } );

    } );*/
    </script>

    <script>
    $(document).ready(function() {
      var t = $('#tableUser').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,4]}
            ]
        } );

    } );
    </script>        


    <div class="modal fade" id="TambahPimpinan" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data Pimpinan</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_outline</i>
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
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
                                        </div>
                                    </div>
                                </div>
                                </div><br>
                                <label>Data User</label>
                                <div class="col-sm-12">
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control" placeholder="Username (Digunakan untuk Login Sistem)" required>
                                        </div>
                                  </div>
                                </div>
                            </div>
                        
                        <div class="modal-footer">
                            <button type="submit" name="tambahPimpinan" class="btn btn-primary waves-effect" style="width: 16.66666666666667%;">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>

    <?php 
      if (isset($_POST['tambahPimpinan'])) {
        tambahPimpinan($_POST['username'], $_POST['nama'], $_POST['gender'], $_POST['jabatan']);
        
        echo "<script>document.location='?page=pimpinan'</script>";
      }
    ?> 