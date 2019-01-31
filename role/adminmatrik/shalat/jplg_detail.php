<?php 

  include 'functions2.php';
  
  $idPeriod = $_GET['p'];
 ?>

<div class="container-fluid">
  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=jplg" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                                JADWAL KEPULANGAN MAHASISWA
                                <!-- <small>Tanggal : <?php echo date('d F Y', strtotime($tgl)); ?></small> -->
                            </h2>
                        </div>
                        <form method="POST" id="formReviewUdzur">
                          <div class="body table-responsive">
                              <table id="tableJplgDetail" class="table table-condensed">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Ikhwan/Akhwat</th>
                                    <th>Waktu Shalat</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $dataJplg = tampilJplgDetail($idPeriod);
                                    $no = 1;

                                    if (is_array($dataJplg) || is_object($dataJplg)){
                               				foreach($dataJplg as $row){
                                   ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo date('D - d M Y', strtotime($row['tanggal'])); ?></td>
                                    <td><?php if($row['j_kelamin'] == 'Ikhwan' || $row['j_kelamin'] == 'Laki-laki'){echo '<span class="label bg-light-blue">Ikhwan</span>';} else if($row['j_kelamin'] == 'Akhwat' || $row['j_kelamin'] == 'Perempuan'){echo '<span class="label bg-pink">Akhwat</span>';} ?></td>
                                    <td><?php echo ucwords($row['wkt_shalat']); ?></td>
                                    <td><?php echo "<a title='Hapus' style='color:#DD4B39;' href='#ModalHapusJplg' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?tjplg=".$row['tanggal']."&w=".$row['wkt_shalat']."&j=".$row['j_kelamin']."&p=".$row['id_periode']."' aria-hidden='true'><i class='material-icons' style='font-size: 20px'>cancel</i></a>"; ?></td>
                                  </tr>
                                  <?php $no++; } } ?>
                                </tbody> 
                              </table>                          
                          </div>
                        </form>
                    </div>
                </div>
  </div>
</div>          
            <!-- Small Size -->
            <div class="modal fade" id="ModalHapusJplg" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Hapus Jadwal Kepulangan Mahasiswa?</h4>
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
      var t = $('#tableJplgDetail').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,1,3]}
            ]
        } );

    } );
    </script>              