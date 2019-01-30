<?php 

  include 'functions.php';

  $idPembina = $_GET['id'];     
  $pembina = pembinaDetails($idPembina);
  foreach($pembina as $row){
?>
<div class="row clearfix">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2><a href="?page=pembina" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;EDIT DATA PEMBINA MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
                          <form method="POST">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control date" placeholder="Nama" value="<?php echo $row['nama']; ?>" >
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">school</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="gelar" class="form-control" placeholder="Kota Asal" value="<?php echo $row['gelar']; ?>">
                                        </div>
                                  </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_outline</i>
                                        </span>
                                        <select class="form-control show-tick" name="gender" value="<?php echo $row['gender']; ?>">
                                          <option><?php echo $row['gender']; ?></option>
                                          <?php 
                                            if ($row['gender'] == "Ikhwan") {
                                              echo "<option>Akhwat</option>";
                                            } else
                                            if($row['gender'] == "Akhwat"){
                                              echo "<option>Ikhwan</option>";
                                            }
                                          ?>
                                        </select>                                            
                                    </div>
                                  
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="kotaasal" class="form-control " placeholder="Kota Asal" value="<?php echo $row['kota_asal']; ?>">
                                        </div>
                                  </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone_iphone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="number" name="telepon" class="form-control " placeholder="Telepon" value="<?php echo $row['telepon']; ?>">
                                        </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="editPembina"><span>SIMPAN</span></button>
                                  <a href="?page=pembina" class="btn btn-default btn-block waves-effect" ><span>BATAL</span></a>
                                  </form>
                                </div>
                    </div>
                </div>
  </div>
</div>           

<?php
    if (isset($_POST['editPembina'])) {
      editPembina($idPembina, $_POST['nama'], $_POST['gelar'], $_POST['gender'], $_POST['kotaasal'], $_POST['telepon']);
      echo "<script>document.location='?page=pembina'</script>";
    }
  } 
?>