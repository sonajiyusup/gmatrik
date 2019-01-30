<?php 

  include 'functions.php';

  $id = $_GET['id'];     
  $dataPimpinan = pimpinanDetails($id);
  foreach($dataPimpinan as $row){
?>

<div class="row clearfix">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2><a href="?page=pimpinan" class="btn btn-sm btn-link waves-effect" title="Kembali"><i class="material-icons">arrow_back</i></a>&nbsp;&nbsp;&nbsp;EDIT DATA PIMPINAN
                            </h2>
                        </div>
                        <div class="body">
                          <form method="POST">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $row['nama']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person_outline</i>
                                        </span>
                                        <select class="form-control show-tick" name="gender" required>
                                          <?php 
                                            if ($row['gender'] == "Ikhwan") {
                                              echo "<option value='Ikhwan'>Ikhwan</option>
                                                    <option value='Akhwat'>Akhwat</option>";
                                            } else
                                            if($row['gender'] == "Akhwat"){
                                              echo "<option value='Akhwat'>Akhwat</option>
                                                    <option value='Ikhwan'>Ikhwan</option>";
                                            } else
                                            if($row['gender'] == NULL){
                                              echo "<option selected='selected' value=''>Ikhwan/Akhwat</option>
                                                    <option value='Ikhwan'>Ikhwan</option>
                                                    <option value='Akhwat'>Akhwat</option>";
                                            }
                                         ?>
                                        </select>                                            
                                    </div>
                                  
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $row['jabatan']; ?>">
                                        </div>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="editPimpinan" ><span>SIMPAN</span></button>
                                  <a href="?page=pimpinan" class="btn btn-default btn-block waves-effect" ><span>BATAL</span></a>
                                  </form>
                                </div>
                    </div>
                </div>
  </div>
</div>           

<?php
    if (isset($_POST['editPimpinan'])) {
      editPimpinan($id, $_POST['nama'], $_POST['gender'], $_POST['jabatan']);
      echo "<script>document.location='index.php?page=pimpinan'</script>";
    }
  }
?>