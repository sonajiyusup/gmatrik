<?php 

  include 'functions2.php';
  
  $idMahasiswa = $_SESSION['id_mahasiswa'];
  $tgl = $_GET['t'];
 ?>

<div class="container-fluid">
  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <a href="?page=udzurslt" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;
                                PERMINTAAN UDZUR SHALAT
                                <small>Tanggal : <?php echo date('d F Y', strtotime($tgl)); ?></small>
                            </h2>
                        </div>
                        <form method="POST" id="formReviewUdzur">
                          <div class="body table-responsive">
                              <table id="tableUdzur" class="table table-condensed">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Waktu Shalat</th>
                                    <th>Udzur</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $dataUdzur = tampilUdzurShalatDetailByMhsByDay($idMahasiswa, $tgl);
                                    $no = 1;

                                    if (is_array($dataUdzur) || is_object($dataUdzur)){
                               				foreach($dataUdzur as $row){
                                   ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo ucwords($row['wkt_shalat']); ?></td>
                                    <td><?php echo $row['udzur']; ?></td>
                                    <td><?php echo $row['keterangan']; ?></td>
                                    <td><?php if($row['disetujui'] == 0){echo '<label class="badge bg-orange">Belum disetujui<label>';}else if($row['disetujui'] == 1){echo '<label class="badge bg-green">Disetujui<label>';}else if($row['disetujui'] == 2){echo '<label class="badge bg-red">Ditolak<label>';}?></td>
                                    <td><?php if($row['disetujui'] == 0){echo "<a title='Hapus' style='color:#DD4B39;' href='#ModalHapusUdzur' class='dropdown-item' data-toggle='modal' data-href='action/hapus.php?idudzur=".$row['id_udzur']."&m=".$idMahasiswa."&t=".$tgl."' aria-hidden='true'><i class='material-icons' style='font-size: 20px'>cancel</i></a>";}else if($row['disetujui'] == 1){echo "";} ?></td>
                                    
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
            <div class="modal fade" id="ModalHapusUdzur" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Batalkan Permintaan Udzur Shalat ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-danger btn-ok waves-effect">YA</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">TIDAK</button>
                        </div>
                    </div>
                </div>
            </div>  

    <script>
    $(document).ready(function() {
      var t = $('#tableUdzur').DataTable( {
            "columnDefs": [
              { "searchable": false, "orderable": false, "targets": [0,5]}
            ]
        } );

    } );
    </script>              