<?php 

include '../functions.php';

	if (isset($_GET['idpembina'])) {
		$idPembina = $_GET['idpembina'];
		$idUser = $_GET['iduser'];

	    hapusPembina($idPembina, $idUser);
	    header('location:/simon/index.php?page=pembina'); 
	} else
	if (isset($_GET['idmahasiswa'])) {
		$idMahasiswa = $_GET['idmahasiswa'];
		$idUser = $_GET['iduser'];

	    hapusMahasiswa($idMahasiswa, $idUser);
	    header('location:/simon/index.php?page=mahasiswa'); 
	} else
	if(isset($_GET['idpage'])){
		header('location:/simon/index.php'); 
	} else
	if(isset($_GET['idmahasiswabinaan'])){
		$idMahasiswa = $_GET['idmahasiswabinaan'];
		$idPembina = $_GET['uidpembina']; //nama variabel 'GET' JANGAN SAMA dengan 'GET' lainnya

	    hapusMhsBinaan($idMahasiswa);
	    header('location:/simon/index.php?page=pembinadetails&id='.$idPembina); 
	}
 ?>