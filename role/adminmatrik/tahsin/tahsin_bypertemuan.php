<?php 
  include 'functions2.php';
 ?>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>DAFTAR NILAI PRESENSI TAHSIN MAHASISWA&nbsp;&nbsp;&nbsp;
                            <small>Berdasarkan Pertemuan</small>
                          </h2>
                        </div>
                        <div class="body">                               
                          <div class="table-responsive">
                            <table id="tablePertemuan" class="table table-hover table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Hari - Tanggal</th>
                                  <th>Nama Pembina</th>
                                  <th>Tahsin</th>
                                  <th>Jumlah Binaan</th>
                                  <th>Jumlah Presensi</th>
                                  <th>Absen</th>
                                  <th>Udzur</th>
                                  <th>Target</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  
                                  $data = tahsinByPertemuanRoleAdminmatrik();
                                  $no = 1;
                                  if (is_array($data) || is_object($data)){
                                    foreach($data as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><a href="?page=>"><?php echo date('l - d M Y', strtotime($row['tanggal'])); ?></a></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php echo $row['tahsin']; ?></td>
                                  <td><?php echo $row['jmlb']; ?></td>
                                  <td><?php echo $row['total']; ?></td>
                                  <td><?php echo $row['absen']; ?></td>
                                  <td><?php echo $row['jmlu']; ?></td>
                                  <td><?php echo $row['target']; ?></td>
                                  <td><?php echo $row['nilai']; ?></td>
                                </tr>
                                <?php $no++; } } ?>
                              </tbody> 
                            </table>
                          </div>                        
                        </div>
  </div>
</div>

    <script type="text/javascript">
    $(document).ready(function() {
      var t = $('#tablePertemuan').DataTable({
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0]}
            ]
        });
    } );
    </script> 