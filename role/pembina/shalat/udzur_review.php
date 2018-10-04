<?php 

  include 'functions2.php';
  
  $idMahasiswa = $_GET['m'];
  $namaMhs = tampilNamaMhs($idMahasiswa);

  $tgl = $_GET['t'];
 ?>

<div class="container-fluid">
  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=udzurslt" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                                PERMINTAAN UDZUR SHALAT MAHASISWA
                                <small>Nama : <?php foreach($namaMhs as $row){ echo $row['nama']; }?><br>Tanggal : <?php echo date('d F Y', strtotime($tgl)); ?></small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="tableUdzur" class="table table-condensed">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Waktu Shalat</th>
                                  <th>Udzur</th>
                                  <th>Keterangan</th>
                                  <th>Setujui ?</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $dataUdzur = tampilUdzurShalatDetailByMhsByDay($idMahasiswa, $tgl);
                                  $no = 1;
                                  foreach($dataUdzur as $row){
                                 ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo ucwords($row['wkt_shalat']); ?></td>
                                  <td><?php echo $row['udzur']; ?></td>
                                  <td><?php echo $row['keterangan']; ?></td>
                                  <td><input name="groupv[]" type="radio" id="radio_1" class="radiojk" name="disetujui[]" value="1"/>
                                      <label for="radio_1">Ya</label>&nbsp;
                                      <input name="groupv[]" type="radio" id="radio_2" class="radiojk" name="disetujui[]" value="2"/>
                                      <label for="radio_2">Tidak</label></td>
                                </tr>
                                <?php $no++; } ?>
                              </tbody> 
                            </table>                          
                            <br>

                          <button class=" btn btn-primary">SIMPAN</button>&nbsp;
                          <a href="?page=udzurslt" class=" btn btn-link">BATAL</a>
                        </div>
                    </div>
                </div>
                             
  </div>
</div>         