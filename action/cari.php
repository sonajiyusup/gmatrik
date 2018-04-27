<?php
//codingan.com
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'simon';

//menghubungkan ke database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//mendapatkan input pencarian
$searchTerm = $_GET['term'];

//mendapatkan data yang sesuai dari tabel daftar_kota
$query = $db->query("SELECT m.nama FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa WHERE m.nama LIKE '%".$searchTerm."%' ORDER BY m.nama ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nama'];
}
//return data json
echo json_encode($data);
?>
