<?php 
  include 'functions.php';
 ?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DATA SEMESTER &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#tambahDataSemester" title="Tambah Data Semester"><i class="material-icons">get_app</i><span>TAMBAH DATA</span></button>
                            <!-- <button class="btn btn-sm btn-default waves-effect" data-toggle="modal" data-target="#importMhsModal" title="Tambah Data Mahasiswa"><i class="material-icons">get_app</i><span>IMPORT DATA</span></button> -->
                          </h2>
                        </div>
                        <div class="body ">
                            <div class="table-responsive">
                                      <table id="DataSemester" class="table table-hover table-condensed">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Semester</th>
                                            <th>Angkatan</th>
                                            <th>Tanggal Dari</th>
                                            <th>Tanggal Sampai</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $dataSemester = tampilSemester();
                                            
                                            $no = 1;
                                            foreach($dataSemester as $row){
                                           ?>
                                        <tr>
                                          <td><b><?php echo $no ?></b></td>  
                                          <td><?php echo $row['semester'];?></td>
                                          <td><?php echo $row['angkatan'] ?></td>
                                          <td><?php echo $row['tanggal_dari'] ?></td>
                                          <td><?php echo $row['tanggal_sampai'] ?></td>
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


<div class="modal fade" id="tambahDataSemester" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <form class="form-horizontal" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data Semester</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                              <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="angkatan" class="form-control" placeholder="Angkatan" required>
                                        </div>
                                    </div>
                                </div>

                               <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="semester" class="form-control" placeholder="Semester" required>
                                        </div>
                                    </div>
                                </div>


                              <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="tanggalsampai" class="datepicker form-control" placeholder="Dari Tanggal" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">account_box</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="tanggaldari" class="datepicker form-control" placeholder="Sampai Tanggal" required>
                                        </div>
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambahSemester" class="btn btn-primary btn-block waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link btn-block waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
</div>   


            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusMahasiswa" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Data Mahasiswa ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">HAPUS</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>

         <div class="modal fade" id="importMhsModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <form method="post">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">IMPORT DATA MAHASISWA DARI DATABASE</h4>
                        </div>
                        <div class="modal-body">
	                        <div class="row">
		                        <div class="col-lg-12">
		                        	<label>Pilih Tahun Angkatan</label>
		                          <select class="form-control show-tick" name="angkatan" required>
		                            <option value="17">17</option>
                                    <option value="18">18</option>
		                          </select> 
		                        </div>
	                      	</div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="importMahasiswa">IMPORT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>

    <?php 

      if (isset($_POST['tambahSemester'])) {
        tambahSemester($_POST['angkatan'], $_POST['semester'], $_POST['tanggaldari'], $_POST['tanggalsampai']);
        echo "<script>document.location='index.php?page=semester'</script>";
      }

/*      if (isset($_POST['importMahasiswa'])) {
        importMahasiswa($_POST['angkatan']);
        echo "<script>document.location='index.php?page=mahasiswa'</script>";
      }*/
    ?>

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
      var t = $('#DataSemester').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,6]}
            ]
        } );

    } );
    </script>        