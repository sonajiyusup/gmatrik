<?php 
		include 'koneksi.php';
		if(isset($_POST['upload'])){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'assets/img/user/'.$nama);
					$query = mysql_query("UPDATE adminmatrik SET avatar = '$nama' WHERE id_adminmatrik = ".$_SESSION['id_AM']);
					if($query){
						echo "<script>document.location='index.php?page=profil'</script>";
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
			
		} else
		if(isset($_POST['uploadAvaPembina'])){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){
					move_uploaded_file($file_tmp, 'assets/img/user/'.$nama);
					$query = mysql_query("UPDATE pembina SET avatar = '$nama' WHERE id_pembina = ".$_SESSION['id_pembina']);
					if($query){
						echo "<script>document.location='index.php?page=profil&alert=avaupdated'</script>";
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
			
		} else
		if(isset($_POST['uploadAvaMahasiswa'])){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'assets/img/user/'.$nama);
					$query = mysql_query("UPDATE mahasiswa SET avatar = '$nama' WHERE id_mahasiswa = ".$_SESSION['id_mahasiswa']);
					if($query){
						echo "<script>document.location='index.php?page=profil&alert=avaupdated'</script>";
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
			
		}	
?>