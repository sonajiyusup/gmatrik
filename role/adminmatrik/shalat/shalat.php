<?php 
  include 'functions.php';
 ?>

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>PRESENSI SHALAT WAJIB MAHASISWA &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect " data-toggle="modal" data-target="#importMhsModal" title="Import Database Mahasiswa"><i class="material-icons">get_app</i><span>IMPORT DATA PRESENSI</span></button>
                          </h2>
                        </div>
                        <div class="body ">
                        	                 
                        </div>
                    </div>
                </div>
            </div>


            <!-- Small Size -->
<!--             <div class="modal fade" id="ModalHapusMahasiswa" tabindex="-1" role="dialog">
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
            </div> -->

            <div class="modal fade" id="importMhsModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">IMPORT DATA MAHASISWA DARI DATABASE</h4>
                        </div>
                        <div class="modal-body">
	                        <div class="row">
		                        <div class="col-lg-12">
		                        	<label>Pilih Tahun Angkatan</label>
		                          <select class="form-control show-tick" name="gender" required>
		                            <option value="17">17</option>
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
      if (isset($_POST['importMahasiswa'])) {
        importMahasiswa($_POST['angkatan']);
        echo "<script>document.location='index.php?page=mahasiswa'</script>";
      }
    ?>

    </section>
    <!-- /.content -->