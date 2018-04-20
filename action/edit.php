<?php 

include '../functions.php';

      if (isset($_POST['editPembina'])) {
		$id = $_POST['idPembina'];

        editPembina($id, $_POST['nama'], $_POST['gender'], date("Y-m-d", strtotime($_POST['tgl_lahir'])), $_POST['gelar'], $_POST['asalkota'], $_POST['email'], $_POST['telp']);
        
        echo "<script>document.location='/simon/index.php?page=pembinadetails&id=".$id."'</script>";
      }
?> 