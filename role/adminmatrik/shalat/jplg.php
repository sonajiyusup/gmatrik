<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                          <h2>JADWAL PULANG MAHASISWA</h2>
                        </div>
                        <form method="POST" name="formJplg">
                        <div class="body">                               
                                <input name="group1" type="radio" id="radio_30" class="with-gap radio-col-blue" name="radiojk" value="Ikhwan" checked />
                                <label for="radio_30">IKHWAN</label>&nbsp;
                                <input name="group1" type="radio" id="radio_31" class="with-gap radio-col-pink" name="radiojk" value="Ikhwan"/>
                                <label for="radio_31">AKHWAT</label><br><br>                        
                                    <label>Hari 1</label>&nbsp;
                                    <!-- <label class="switch">
                                      <input type="checkbox" name="opt" id="opt" value="Y" onclick="toggle('.myClass', this)">
                                      <span class="slider round"></span><br>
                                    </label>  --> 

                                    <!-- <div class="showhide">   -->
                                      <!-- <div class="controls">     -->
                                        <!-- <div class="entry"> -->
                                          <input type="text" id="txt" class="datepicker form-control" name="tplg1" placeholder="Tanggal Pulang"/><br>
                                          <input type="checkbox" class="flat-red" id="check-all1">&nbsp;Semua&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1[]" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1[]" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1[]" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1[]" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check" name="wkt1[]" value="isya">&nbsp;Isya
                                          <br>
                                          <!-- <button type="button" class="btn btn-xs btn-primary waves-effect btn-add">
                                              <i class="material-icons">add</i>
                                          </button> -->
                                          <!-- <button class="hapus"></button> -->
                                          <br>
                                        <!-- </div> -->
                                      <!-- </div> -->
                                    <!-- </div>                           -->
                                    <label>Hari 2</label>&nbsp;
                                          <input type="text" id="txt" class="datepicker form-control" name="tplg2" placeholder="Tanggal Pulang"/><br>
                                          <input type="checkbox" class="flat-red" id="check-all2">&nbsp;Semua&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red check2" name="wkt2[]" value="isya">&nbsp;Isya
                                          <br>
                                          <br>
                                    <label>Hari 3</label>&nbsp;
                                          <input type="text" id="txt" class="datepicker form-control" name="tplg3" placeholder="Tanggal Pulang"/><br>
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="shubuh">&nbsp;Shubuh&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="dzuhur">&nbsp;Dzuhur&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="ashar">&nbsp;Ashar&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="maghrib">&nbsp;Maghrib&nbsp;&nbsp;
                                          <input type="checkbox" class="flat-red" name="wkt3[]" value="isya">&nbsp;Isya
                                          <br><br><br><br>
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="submitJplg">SUBMIT</button>
                        </div>

                        </form>
</div>
</div>
</div>      


 <?php
  if(isset($_POST['submitJplg'])){
    if (is_array($_POST['wkt1'])) {
      foreach($_POST['wkt1'] as $s){
        tambahJplg($_POST['tplg1'], $_POST['radiojk'], $s);
      }
    }
    /*if (is_array($_POST['wkt2'])) {
      foreach($_POST['wkt2'] as $s){
        tambahJplg($_POST['tplg2'], $_POST['radiojk'], $s);
      }
    }
    if (is_array($_POST['wkt3'])) {
      foreach($_POST['wkt3'] as $s){
        tambahJplg($_POST['tplg3'], $_POST['radiojk'], $s);
      }
    }*/
    echo "<script>document.location='index.php?page=jplg'</script>";
  }
?>