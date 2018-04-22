<?php 
  include 'functions.php';
 ?>

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>PRESENSI SHALAT WAJIB MAHASISWA &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default waves-effect " data-toggle="modal" data-target="#importShalat" title="Import Database Mahasiswa"><i class="material-icons">get_app</i><span>IMPORT DATA PRESENSI</span></button>
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

            <div class="modal fade" id="importShalat" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <form method="POST">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">IMPORT DATA PRESENSI MAHASISWA</h4>
                        </div>
                        <div class="modal-body">
                        	<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">today</i>
														</span>
														<div class="form-line">
															<input type="text" name="daterangeShalat" class="form-control date" id="reportrange" placeholder="Periode Waktu Tapping" required>
														</div>
													</div>
													<div class="bootstrap-timepicker">
			                      <div class="row">
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Shubuh :</label>
			                              <input type="text" name="shubuhFrom" id="shubuh_dari" class="timepicker form-control" placeholder="Dari" value="04:00">
			                              <input type="text" name="shubuhTo" id="shubuh_sampai" class="timepicker form-control" placeholder="Sampai" value="06:00">
			                          </div>
			                        </div>
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Dzuhur :</label>
			                              <input type="text" name="dzuhurFrom" id="dzuhur_dari" class="timepicker form-control" placeholder="Dari" value="12:00">
			                              <input type="text" name="dzuhurTo" id="dzuhur_sampai" class="timepicker form-control" placeholder="Sampai" value="13:00">
			                          </div>
			                        </div>
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Ashar :</label>
			                              <input type="text" name="asharFrom" id="ashar_dari" class="timepicker form-control" placeholder="Dari" value="15:00">
			                              <input type="text" name="asharTo" id="ashar_sampai" class="timepicker form-control" placeholder="Sampai" value="16:00">
			                          </div>
			                        </div>
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Maghrib :</label>
			                              <input type="text" name="maghribFrom" id="maghrib_dari" class="timepicker form-control" placeholder="Dari" value="18:00">
			                              <input type="text" name="maghribTo" id="maghrib_sampai" class="timepicker form-control" placeholder="Sampai" value="18:35">
			                          </div>
			                        </div>
			                        <div class="col-md-3 nopadding">
			                          <div class="form-group">
			                            <label>Isya :</label>
			                              <input type="text" name="isyaFrom" id="isya_dari" class="timepicker form-control" placeholder="Dari" value="19:00">
			                              <input type="text" name="isyaTo" id="isya_sampai" class="timepicker form-control" placeholder="Sampai" value="20:00">
			                          </div>
			                        </div>
			                      </div>
			                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect" name="importPresensiShalat">IMPORT</button>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div> 

    <?php 

      if(isset($_POST['importPresensiShalat'])) {
        $tgl = explode('-', $_POST['daterangeShalat']);
        $from = $tgl[0];
        $to = $tgl[1];

        $datefrom = date('Y-m-d', strtotime($from));
        $dateto = date('Y-m-d',strtotime($to));

        $shubuhFrom = $_POST['shubuhFrom'];
        $shubuhTo = $_POST['shubuhTo'];

        $dzuhurFrom = $_POST['dzuhurFrom'];
        $dzuhurTo = $_POST['dzuhurTo'];

        $asharFrom = $_POST['asharFrom'];
        $asharTo = $_POST['asharTo'];

        $maghribFrom = $_POST['maghribFrom'];
        $maghribTo = $_POST['maghribTo'];

        $isyaFrom = $_POST['isyaFrom'];
        $isyaTo = $_POST['isyaTo'];

        updateTimeSetup($from, $to, $shubuhFrom, $shubuhTo, $dzuhurFrom, $dzuhurTo, $asharFrom, $asharTo, $maghribFrom, $maghribTo, $isyaFrom, $isyaTo);
        importShalat($_POST['angkatan'], $datefrom, $dateto);

        echo "<script>document.location='?page=shalat'</script>";
      }
    ?>

    </section>
    <!-- /.content -->