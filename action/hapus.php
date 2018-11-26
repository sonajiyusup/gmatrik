<?php 

include '../functions.php';


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
		$tgl = $_GET['t'];

	    hapusUdzurShalat($idUdzur);
	    header('location:/gmatrik/index.php?page=udzursltdetail&t='.$tgl.''); 
	} else
	if(isset($_GET['idmanualslt'])){
		$idManualSlt = $_GET['idmanualslt'];
		$tgl = $_GET['t'];

	    hapusShalatManual($idManualSlt);
	    header('location:/gmatrik/index.php?page=manualsltdetail&t='.$tgl.''); 
	} else
	if(isset($_GET['tjplg'])){
		$wkt = $_GET['w'];
		$tgl = $_GET['tjplg'];
		$jKelamin = $_GET['j'];
		$idPeriod = $_GET['p'];

	    hapusjplgDetail($tgl, $wkt, $jKelamin);
	    header('location:/gmatrik/index.php?page=jplgdetail&p='.$idPeriod.''); 
	} else
	if(isset($_GET['idudzurtahsin'])){
		$idTahsin = $_GET['idudzurtahsin'];

	    hapusUdzurTahsin($idTahsin);
	    header('location:/gmatrik/index.php?page=udzurtahsin'); 
	} else
	if(isset($_GET['idsetor'])){
		$id = $_GET['idsetor'];

	    hapusSetorHafalan($id);
	    header('location:/gmatrik/index.php?page=setor'); 
	}
 ?>