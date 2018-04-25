<?php 
  include 'functions.php';
  $idP = $_GET['id']; 
  $idPembina = $_SESSION['id_pembina'];

 ?>  

<div class="container-fluid">
  <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               <a href="?page=pikhtisar" class="btn btn-sm btn-link waves-effect" style="width: 10%;" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;DETIL PELANGGARAN
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table  class="table table-condensed">
                            <col width="200">
							              <col width="20">
							              <col width="750">
							              <?php 
							                $dataPelanggaran = pDetailByIdPembina('ikhtisar', $idP, $idPembina);
							                $no = 1;
															if (is_array($dataPelanggaran) || is_object($dataPelanggaran)){
																foreach($dataPelanggaran as $row){
							              ?>
                               <tr> 
						                    <th>ID Pelanggaran</th>
						                    <td>:</td>
						                    <td><?php echo $row['id_pelanggaran']; ?></td>
						                  </tr>
						                  <tr>
						                    <th>Nama Mahasiswa</th>
						                    <td>:</td>
						                    <td><a href="?page=mahasiswadetails&id=<?php echo $row['uid_mhs']; ?>"><?php echo $row['namamhs']; ?></a></td>
						                  </tr>
						                  <tr>
						                    <th>Bentuk Pelanggaran</th>
						                    <td>:</td>
						                    <td><a href="?page=pbentukdetail&id=<?php echo $row['id_pbentuk']; ?>"><?php echo $row['nama_bentuk']; ?></a></td>
						                  </tr>
						                  <tr>
						                    <th>Aksi Pelanggaran</th>
						                    <td>:</td>
						                    <td><a href="?page=paksidetail&id=<?php echo $row['id_paksi']; ?>"><?php echo $row['nama_aksi']; ?></a></td>
						                  </tr>
						                  <tr>
						                    <th>Sanksi</th>
						                    <td>:</td>
						                    <td><a href="?page=psanksidetail&id=<?php echo $row['id_psanksi']; ?>"><?php echo $row['nama_sanksi']; ?></a></td>
						                  </tr>
						                  <tr>
						                    <th>Tindak Lanjut</th>
						                    <td>:</td>
						                    <td><a href="?page=planjutdetail&id=<?php echo $row['id_planjut']; ?>"><?php echo $row['nama_tindaklanjut']; ?></a></td>
						                  </tr>
						                  <tr>
						                    <th>Tanggal</th>
						                    <td>:</td>
						                    <td><?php echo date('d F Y', strtotime($row['tanggal'])); ?></td>
						                  </tr>
						                  <tr>
						                    <th>Keterangan</th>
						                    <td height="100">:</td>
						                    <td><?php echo $row['deskripsi']; ?></td>
						                  </tr>
						                  <?php } }?>
                            </table>                          
                        </div>
                    </div>
                </div>
                             
  </div>
</div>    