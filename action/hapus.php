<?php 

include '../functions.php';
include '../functions2.php';

	if (isset($_GET['idpembina'])) {
		$idPembina = $_GET['idpembina'];
		$idUser = $_GET['iduser'];

	    hapusPembina($idPembina, $idUser);
	    header('location:/gmatrik/index.php?page=pembina'); 
	} else
	if (isset($_GET['idmahasiswa'])) {
		$idMahasiswa = $_GET['idmahasiswa'];
		$idUser = $_GET['iduser'];

	    hapusMahasiswa($idMahasiswa, $idUser);
	    header('location:/gmatrik/index.php?page=mahasiswa'); 
	} else
	if(isset($_GET['idpage'])){
		header('location:/gmatrik/index.php'); 
	} else
	if(isset($_GET['idmahasiswabinaan'])){
		$idMahasiswa = $_GET['idmahasiswabinaan'];
		$idPembina = $_GET['uidpembina']; //nama variabel 'GET' JANGAN SAMA dengan 'GET' lainnya

	    hapusMhsBinaan($idMahasiswa);
	    header('location:/gmatrik/index.php?page=pembinadetails&id='.$idPembina); 
	} else
	if(isset($_GET['idudzur'])){
		$idUdzur = $_GET['idudzur'];

	    hapusUdzurShalat($idUdzur);
	    header('location:/gmatrik/index.php?page=udzurslt'); 
	}
 ?>