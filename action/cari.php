<?php
include 'koneksi.php';
$idPembina = 27;

// "SELECT m.id_user, mb.id_mahasiswa, m.nim, m.nama, m.telp, u.last_login FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN users u ON m.id_user = u.id_user WHERE mb.id_pembina = $idPembina"

if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($con,"select * from mahasiswa order by nama limit 5");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($con,"SELECT m.id_user, mb.id_mahasiswa, m.nim, m.nama, m.telp, u.last_login FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN users u ON m.id_user = u.id_user WHERE mb.id_pembina = $idPembina AND nama like '%".$search."%' limit 5");
}
	
$data = array();

while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['id_mahasiswa'], "text"=>$row['nama']);
}

echo json_encode($data);
