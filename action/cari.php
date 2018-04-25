<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'simon';
//menghubungkan ke database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//mendapatkan input pencarian
$searchTerm = $_GET['nama'];
$idPembina = $_SESSION['id_pembina'];
//mendapatkan data yang sesuai dari tabel daftar_kota
$query = $db->query("SELECT m.nama AS 'nama_mahasiswa' FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE mb.id_pembina = $idPembina AND m.nama LIKE '%".$searchTerm."%' ORDER BY m.nama");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nama_mahasiswa'];
}
//return data json
echo json_encode($data);

?>
