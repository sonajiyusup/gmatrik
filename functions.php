<?php 

	mysql_connect("localhost", "root", "");
	mysql_select_db("gmatrik");
	// mysql_select_db("simon");

	function tambahUser($nama, $j_kelamin, $level, $user){

		$randpass = substr(str_shuffle(str_repeat("0123456789aAbBcCdDeEfFgGhHiIjJ0123456789kKlLmMnNoOpPqQrRsStT0123456789uUvVwWxXyYzZ", 10)), 0, 10);
		$_randpass = mysql_real_escape_string($randpass);

		mysql_query("INSERT INTO users (username, password, password_default, level) VALUES ('$user','$_randpass', 1, '$level')");

		if (mysql_errno() == 1062) {
    	return 1;
		} else{
			$sql = mysql_query("SELECT id_user FROM users WHERE username='$user'") or die(mysql_error());
			$row = mysql_fetch_assoc($sql);
			$id_user = $row['id_user'];

			if ($level == 0) {
				mysql_query("INSERT INTO administrator (nama, j_kelamin, id_user) VALUES ('$nama','$j_kelamin', '$id_user')");
			} else
			if($level == 1){
				mysql_query("INSERT INTO pimpinan (nama, j_kelamin, id_user) VALUES ('$nama','$j_kelamin', '$id_user')");
			} else
			if($level == 2){
				mysql_query("INSERT INTO adminmatrik (nama, j_kelamin, id_user) VALUES ('$nama','$j_kelamin', '$id_user')");
			}
		}
	}	

	function tambahPembina($nama, $j_kelamin, $tgl_lahir, $gelar, $asalkota, $email, $telp, $user, $pass){
		mysql_query("INSERT INTO users (username, password, level) VALUES ('$user','$pass', 3)");

		$sql = mysql_query("SELECT id_user FROM users WHERE username='$user'") or die(mysql_error());
		$row = mysql_fetch_assoc($sql);
		$id_user = $row['id_user'];

		if (mysql_num_rows($row) == 1) {
			echo "<script>document.location='?page=pembina&alert=duplicateusername'</script>";
		} else{
			mysql_query("INSERT INTO pembina (nama, j_kelamin, tgl_lahir, gelar, asalkota, email, telp, id_user) VALUES ('$nama', '$j_kelamin', '$tgl_lahir', '$gelar', '$asalkota', '$email', '$telp', '$id_user')");

			echo "<script>document.location='?page=pembina'</script>";
		}
	}

	function tambahMhsBinaan($idPembina, $idMahasiswa){
		mysql_query("INSERT INTO m_binaan (id_pembina, id_mahasiswa) VALUES ('$idPembina', '$idMahasiswa');");
		mysql_query("UPDATE mahasiswa m SET m.j_kelamin=(SELECT p.j_kelamin FROM pembina p WHERE p.id_pembina = $idPembina) WHERE m.id_mahasiswa = $idMahasiswa;");
	}

	function tambahJplg($tgl, $jKelamin, $wkt){
		$tgl_ = date('Y-m-d', strtotime($tgl));
		mysql_query("INSERT INTO j_pulang2 (id_periode, tanggal, j_kelamin, wkt_shalat) VALUES ((SELECT s.id_periode FROM shalat s WHERE s.tanggal = '$tgl_' GROUP BY s.id_periode), '$tgl_', '$jKelamin', '$wkt');");
	}

	function tampilPembina(){
		// $ambildata = mysql_query("SELECT p.*, COUNT(mb.id_mahasiswa) AS 'jml_binaan', u.* FROM pembina p LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina LEFT JOIN users u ON p.id_user = u.id_user GROUP BY p.nama ORDER BY p.nama") or die(mysql_error());
		$ambildata = mysql_query("SELECT p.* FROM pembina_mahasiswa p ORDER BY p.nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar pembina kosong";
		}		
	}

	function tampilUsers(){
		$ambildata = mysql_query("SELECT * FROM users ORDER BY id_user") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar pengguna sistem kosong";
		}		
	}	

	function tampilJplg(){
		$ambildata = mysql_query("SELECT jp.id_pekan, sp.tanggal_dari, sp.tanggal_sampai, jp.j_kelamin, COUNT(jp.wkt_shalat) AS jws FROM j_pulang2 jp LEFT JOIN shalat_periode sp ON jp.id_periode = sp.id_periode GROUP BY jp.id_periode ORDER BY jp.id_periode DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Data Jadwal Pulang Mahasiswa Masih Kosong";
		}			
	}

	function tampilJtalim(){
		$ambildata = mysql_query("SELECT * FROM j_talim") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Data Jadwal Ta'lim Mahasiswa Masih Kosong";
		}			
	}	

	function tampilMahasiswa(){
		// $ambildata = mysql_query("SELECT mahasiswa.*, users.* FROM users INNER JOIN mahasiswa ON mahasiswa.id_user = users.id_user ORDER BY nama") or die(mysql_error());
		$ambildata = mysql_query("SELECT m.*, p.nama AS namapembina, p.gelar FROM mahasiswa m LEFT JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina ORDER BY nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar mahasiswa kosong";
		}		
	}

	function tampilSemester(){
		// $ambildata = mysql_query("SELECT mahasiswa.*, users.* FROM users INNER JOIN mahasiswa ON mahasiswa.id_user = users.id_user ORDER BY nama") or die(mysql_error());
		$ambildata = mysql_query("SELECT s.* FROM semester s ORDER BY s.id_semester DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Data semester kosong";
		}		
	}

	function tampilMahasiswaById($idMahasiswa){
		$ambildata = mysql_query("SELECT m.*, u.*, p.id_pembina AS idp, p.nama AS namap FROM users u INNER JOIN mahasiswa m ON m.id_user = u.id_user LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE m.id_mahasiswa = $idMahasiswa ORDER BY m.nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar mahasiswa kosong";
		}		
	}	

	function tampilNamaMhs($idMahasiswa){
		$ambildata = mysql_query("SELECT m.nama FROM mahasiswa m WHERE m.id_mahasiswa = $idMahasiswa") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar mahasiswa kosong";
		}		
	}		

	function tampilCalonBinaan(){
		$ambildata = mysql_query("SELECT m.* FROM mahasiswa m WHERE m.id_mahasiswa NOT IN (SELECT m_binaan.id_mahasiswa FROM m_binaan) ORDER BY m.nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Semua Mahasiswa Sudah Ada Pembina-nya
						</div>";
		}
	}	

	function tampilAdminmatrik(){
		$ambildata = mysql_query("SELECT adminmatrik.*, users.* FROM users INNER JOIN adminmatrik ON adminmatrik.id_user = users.id_user ORDER BY nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar pembina kosong";
		}		
	}

	function tampilPimpinan(){
		$ambildata = mysql_query("SELECT p.* FROM pimpinan p ORDER BY p.nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar pimpinan kosong";
		}		
	}	

	function tampilAdministrator(){
		$ambildata = mysql_query("SELECT administrator.*, users.* FROM users INNER JOIN administrator ON administrator.id_user = users.id_user ORDER BY nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar pembina kosong";
		}		
	}	

	function tampilPbentuk(){
		$ambildata = mysql_query("SELECT pb.id_pbentuk, pb.nama_bentuk, COUNT(pm.id_pbentuk) AS jumlah FROM pbentuk pb LEFT JOIN pmain pm ON pb.id_pbentuk = pm.id_pbentuk GROUP BY pb.nama_bentuk ORDER BY jumlah DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Bentuk pelanggaran belum ditambahkan";
		}
	}

	function tampilPbentukByPembina($idPembina){
		$ambildata = mysql_query("SELECT pb.id_pbentuk, pb.nama_bentuk, COUNT(pmb.id_pbentuk) AS jumlah FROM pbentuk pb LEFT JOIN ( SELECT b.id_pembina, pb.id_pbentuk FROM pmain pm LEFT JOIN pbentuk pb ON pm.id_pbentuk = pb.id_pbentuk LEFT JOIN ( SELECT p.id_pembina, p.id_user AS uid_pembina, p.nama AS namap, mb.id_mhsbinaan FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina ) b ON pm.id_mhsbinaan = b.id_mhsbinaan WHERE b.id_pembina = $idPembina ) pmb ON pb.id_pbentuk = pmb.id_pbentuk GROUP BY pb.nama_bentuk ORDER BY jumlah DESC, pb.id_pbentuk") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Bentuk pelanggaran belum ditambahkan";
		}
	}	

	function tampilPbentukAsModal(){
		$ambildata = mysql_query("SELECT id_pbentuk, nama_bentuk FROM pbentuk") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Bentuk pelanggaran belum ditambahkan";
		}
	}	

	function tambahPbentuk($nama_bentuk){
		mysql_query("INSERT INTO pbentuk(nama_bentuk) VALUES ('$nama_bentuk'); ");
	}

	function tampilSesuatu($table, $column, $row, $id){
		$ambildata = mysql_query("SELECT $column FROM $table WHERE $row = $id");
		$data = mysql_fetch_assoc($ambildata);
		return $data;
	}

	function MhsByPembinaDetail($idPembina){
		$ambildata = mysql_query("SELECT mb.id_mahasiswa, m.nim , m.nama AS 'nama_mahasiswa', m.id_user AS 'uid_mahasiswa', p.id_user AS 'uid_pembina' FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE mb.id_pembina = $idPembina ORDER BY m.nama");
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<strong>Belum ada Mahasiswa Binaan</strong>";
		}		
	}	

	function pembinaDetails($idPembina){
		// $ambildata = mysql_query("SELECT p.*, u.*, COUNT(mb.id_mahasiswa) AS 'jml_binaan' FROM pembina p LEFT JOIN users u ON p.id_user = u.id_user LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina WHERE u.id_user = $idUser GROUP BY p.nama");
		$ambildata = mysql_query("SELECT p.* FROM pembina_mahasiswa p WHERE p.id_pembina = $idPembina");
			$ad = mysql_fetch_assoc($ambildata);
				$data[] = $ad;
				return $data;
	}

	function mahasiswaDetails($nim){
		// $ambildata = mysql_query("SELECT m.*, u.*, p.id_pembina, p.nama AS nama_pembina, p.gelar, p.id_user AS uid_pembina , p.j_kelamin AS jk_pembina, p.avatar AS ava_pembina, ot.id_user AS uid_ortu, ot.id, ot.nama AS nama_ortu FROM mahasiswa m LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN users u ON m.id_user = u.id_user LEFT JOIN orang_tua ot ON m.id_mahasiswa = ot.id_mahasiswa WHERE m.id_user = $idUser");

		$ambildata = mysql_query("SELECT m.*, p.id_pembina, p.nama AS namapembina FROM mahasiswa m LEFT JOIN pembina_mahasiswa p ON m.id_pembina = p.id_pembina WHERE m.nim = $nim ");
			$ad = mysql_fetch_assoc($ambildata);
				$data[] = $ad;
				return $data;
	}	

	function pimpinanDetails($idPimpinan){
		$ambildata = mysql_query("SELECT pi.* FROM pimpinan pi WHERE pi.id_pimpinan = $idPimpinan ");
			$ad = mysql_fetch_assoc($ambildata);
				$data[] = $ad;
				return $data;
	}		

	function namaPembinaById($idPembina){
	    $ambildata = mysql_query("SELECT p.id_pembina, p.nama AS nama, p.gelar FROM pembina p WHERE p.id_pembina = $idPembina");
	      $ad = mysql_fetch_assoc($ambildata);
	      	$data[] = $ad;
	        return $data;
	}

	function idUserByIdPembina($idPembina){
	    $ambildata = mysql_query("SELECT p.id_user FROM pembina p WHERE p.id_pembina = $idPembina");
	      $data = mysql_fetch_assoc($ambildata);
	        return $data;		
	}

	function hapusPembina($idPembina, $idUser){
		mysql_query("DELETE FROM pembina WHERE id_pembina = $idPembina");
		mysql_query("DELETE FROM users WHERE id_user = $idUser");
	}

	function hapusOrtuMahasiswa($idOrtu, $idUser){
		mysql_query("DELETE FROM orang_tua WHERE id = $idOrtu");
		mysql_query("DELETE FROM users WHERE id_user = $idUser");
	}	

	function hapusMahasiswa($idMahasiswa, $idUser){
		mysql_query("DELETE FROM mahasiswa WHERE id_mahasiswa = $idMahasiswa");
		mysql_query("DELETE FROM users WHERE id_user = $idUser");
	}	

	function hapusMhsBinaan($idMahasiswa){
		mysql_query("DELETE FROM m_binaan WHERE id_mahasiswa = $idMahasiswa");
		mysql_query("UPDATE mahasiswa SET j_kelamin = NULL WHERE id_mahasiswa = $idMahasiswa");
	}

	function hapusUdzurShalat($idUdzur){
		mysql_query("DELETE FROM shalat_udzur2 WHERE id_udzur = $idUdzur");
	}			

	function hapusShalatManual($idManual){
		mysql_query("DELETE FROM shalat_manual WHERE id_manual = $idManual");
	}			

	function hapusjplgDetail($tgl, $wkt, $jKelamin){
		$tgl_ = date('Y-m-d', strtotime($tgl));
		mysql_query("DELETE FROM j_pulang2 WHERE tanggal = '$tgl_' AND wkt_shalat = '$wkt' AND j_kelamin = '$jKelamin'");
	}		

	function hapusUdzurTahsin($id){
		mysql_query("DELETE FROM tahsin_udzur WHERE id = $id");
	}			

	function hapusSetorHafalan($id){
		mysql_query("DELETE FROM setor_hafalan WHERE id = $id") or die(mysql_error());
	}		

	function editPembina($idPembina, $nama, $gelar, $gender, $kotaasal, $telepon){
		mysql_query("UPDATE pembina_mahasiswa SET nama = '$nama', gelar = '$gelar', gender = '$gender', kota_asal = '$kotaasal', telepon = '$telepon' WHERE id_pembina = $idPembina ");
	}

	function editMahasiswa($nim, $nama, $angkatan, $gender, $idPembina, $kotaasal, $telepon, $aktif){
		mysql_query("UPDATE mahasiswa SET id_pembina = $idPembina, nama = '$nama', angkatan = '$angkatan', gender = '$gender', kota_asal = '$kotaasal', telepon = '$telepon', aktif = '$aktif' WHERE nim = $nim ");
	}	

	function editPimpinan($idPimpinan, $nama, $gender, $jabatan){
		mysql_query("UPDATE pimpinan SET nama = '$nama', gender = '$gender', jabatan = '$jabatan' WHERE id_pimpinan = $idPimpinan ");
	}	

	function totalPembina(){
		$ambildata = mysql_query("SELECT COUNT(id_pembina) as Total from pembina_mahasiswa");
		$data = mysql_fetch_assoc($ambildata);
		return $data;
	}

	function totalMahasiswa(){
		$ambildata = mysql_query("SELECT COUNT(nim) as Total from mahasiswa");
		$data = mysql_fetch_assoc($ambildata);
		return $data;
	}	

	function totalPelanggaran(){
		$ambildata = mysql_query("SELECT COUNT(id_pelanggaran) as Total from pmain");
		$data = mysql_fetch_assoc($ambildata);
		return $data;
	}	

	function totalUser(){
		$ambildata = mysql_query("SELECT COUNT(id_user) as Total from users");
		$data = mysql_fetch_assoc($ambildata);
		return $data;		
	}

	function totalAdminMatrik(){
		$ambildata = mysql_query("SELECT COUNT(id_adminmatrik) as Total from adminmatrik");
		$data = mysql_fetch_assoc($ambildata);
		return $data;
	}

	function totalBinaanByPembina($idPembina){
		$ambildata = mysql_query("SELECT COUNT(m.nim) AS 'jml_binaan' FROM mahasiswa m WHERE m.id_pembina = $idPembina GROUP BY m.id_pembina");
		$data = mysql_fetch_assoc($ambildata);
		return $data;		
	}

	function totalPelanggaranBinaanByPembina($idPembina){
		$ambildata = mysql_query("SELECT COUNT(p.id_pelanggaran) AS 'jml_plgr_mhs' FROM pmain p INNER JOIN m_binaan mb ON p.id_mhsbinaan = mb.id_mhsbinaan WHERE mb.id_pembina = $idPembina");
		$data = mysql_fetch_assoc($ambildata);
		return $data;
	}

	function BinaanByPembina($idPembina){
		$ambildata = mysql_query("SELECT * from mhs_binaan WHERE id_pembina = $idPembina");
			$ad = mysql_fetch_assoc($ambildata);
				$data[] = $ad;
				return $data;		
	}	

	function tampilBinaanByPembina($idPembina){
		$ambildata = mysql_query("SELECT m.id_user, mb.id_mahasiswa, m.nim, m.nama, m.telp, u.last_login FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN users u ON m.id_user = u.id_user WHERE mb.id_pembina = $idPembina") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar pembina kosong";
		}	
	}

	function mahasiswaByPembina($idPembina){
		$ambildata = mysql_query("SELECT mahasiswa.nim AS nim, mahasiswa.nama AS nama FROM mhs_binaan INNER JOIN mahasiswa on mhs_binaan.id_mahasiswa = mahasiswa.id_mahasiswa WHERE mhs_binaan.id_pembina = $idPembina");
			$ad = mysql_fetch_assoc($ambildata);
				$data[] = $ad;
				return $data;		
	}

	function adminMatrikDetails($idUser){
		$ambildata = mysql_query("SELECT adminmatrik.*, users.* FROM users INNER JOIN adminmatrik ON adminmatrik.id_user = users.id_user WHERE users.id_user = $idUser");
			$ad = mysql_fetch_assoc($ambildata);
				$data[] = $ad;
				return $data;
	}

	function admininstratorDetails($idUser){
		$ambildata = mysql_query("SELECT administrator.*, users.* FROM users INNER JOIN administrator ON administrator.id_user = users.id_user WHERE users.id_user = $idUser");
			$ad = mysql_fetch_assoc($ambildata);
				$data[] = $ad;
				return $data;
	}	

	function editAdminMatrikDetails($id_AM, $nama, $telp, $email, $j_kelamin, $tgl_lahir){
		mysql_query("UPDATE adminmatrik SET nama='$nama', telp='$telp', email='$email', j_kelamin='$j_kelamin', tgl_lahir='$tgl_lahir' WHERE id_adminmatrik='$id_AM' ") or die(mysql_error());
	}

	function gantiUserPassword($idUser, $newPass){
		mysql_query("UPDATE users SET `password` = '$newPass', `password_default` = '0' WHERE id_user = '$idUser'");
	}

	function resetPassword($idUser){
		$randpass = substr(str_shuffle(str_repeat("0123456789aAbBcCdDeEfFgGhHiIjJ0123456789kKlLmMnNoOpPqQrRsStT0123456789uUvVwWxXyYzZ", 10)), 0, 10);
		mysql_query("UPDATE users SET `password` = '$randpass', `password_default` = '1' WHERE id_user = '$idUser'");
	}

	function importMahasiswa($angkatan){
		$koneksi_mdb = odbc_connect( 'att2000', "", "");
		
		$sql = "SELECT USERID,Badgenumber,Name FROM USERINFO WHERE Badgenumber LIKE '$angkatan%' AND Name NOT LIKE '$angkatan%' ORDER BY Name";
		$result = odbc_exec($koneksi_mdb, $sql);

		while($row_mdb = odbc_fetch_array($result)){

			/*$namaTanpaSpasi = str_replace(' ', '', $row_mdb['Name']);
			$pass = $namaTanpaSpasi.(substr($row_mdb['Badgenumber'], -5));*/
			$randpass = substr(str_shuffle(str_repeat("0123456789aAbBcCdDeEfFgGhHiIjJ0123456789kKlLmMnNoOpPqQrRsStT0123456789uUvVwWxXyYzZ", 10)), 0, 10);
			$_randpass = mysql_real_escape_string($randpass);

			//if(strpos($row_mdb['Name'], $row_mdb['Badgenumber']) === FALSE){
				$mysql_insert_usr = "INSERT INTO users(username, password, password_default, level) VALUES ('".$row_mdb['Badgenumber']."', '$_randpass', '1', '3')";
				mysql_query($mysql_insert_usr);

				$sql = mysql_query("SELECT id_user FROM users WHERE username='".$row_mdb['Badgenumber']."'") or die(mysql_error());
				$row = mysql_fetch_assoc($sql);
				$id_user = $row['id_user'];

				$name = mysql_real_escape_string($row_mdb['Name']);
				$lname = strtolower($name);

				$mysql_insert_mhs = "INSERT INTO mahasiswa (nim, id_user, nama, angkatan, aktif) VALUES ('".$row_mdb['Badgenumber']."', '".$id_user."', '".ucwords($lname)."', '18', '1')";
				mysql_query($mysql_insert_mhs);
				//echo $row_mdb['Name']." Berhasil diinput <br>";
			//}
		}
	}

	function tambahSemester($angkatan, $semester, $tanggaldari, $tanggalsampai){
		mysql_query("INSERT INTO semester(angkatan, semester, tanggal_dari, tanggal_sampai) VALUES ('$angkatan','$semester','$tanggaldari','$tanggalsampai')");
	}

	function tambahMahasiswa($nim, $idPembina, $nama, $gender, $angkatan, $kotaasal, $telepon){

			/*$namaTanpaSpasi = str_replace(' ', '', $row_mdb['Name']);
			$pass = $namaTanpaSpasi.(substr($row_mdb['Badgenumber'], -5));*/
			$randpass = substr(str_shuffle(str_repeat("0123456789aAbBcCdDeEfFgGhHiIjJ0123456789kKlLmMnNoOpPqQrRsStT0123456789uUvVwWxXyYzZ", 10)), 0, 10);
			$_randpass = mysql_real_escape_string($randpass);

			//if(strpos($row_mdb['Name'], $row_mdb['Badgenumber']) === FALSE){
				$mysql_insert_usr = "INSERT INTO users(username, password, password_default, level) VALUES ('$nim', '$_randpass', '1', '3')";
				mysql_query($mysql_insert_usr);

				$sql = mysql_query("SELECT id_user FROM users WHERE username='$nim'") or die(mysql_error());
				$row = mysql_fetch_assoc($sql);
				$id_user = $row['id_user'];

				$mysql_insert_mhs = "INSERT INTO mahasiswa (nim, id_user, id_pembina, nama, gender, angkatan, kota_asal, telepon, aktif) VALUES ('$nim', '".$id_user."', '$idPembina', '$nama', '$gender', '$angkatan', '$kotaasal', '$telepon', 1)";
				mysql_query($mysql_insert_mhs);
				//echo $row_mdb['Name']." Berhasil diinput <br>";
			//}
	}


	function tambahPembinaNew($nama, $gelar, $gender, $kotaasal, $telepon, $username){
			$randpass = substr(str_shuffle(str_repeat("0123456789aAbBcCdDeEfFgGhHiIjJ0123456789kKlLmMnNoOpPqQrRsStT0123456789uUvVwWxXyYzZ", 10)), 0, 10);
			$_randpass = mysql_real_escape_string($randpass);

		
				$mysql_insert_usr = "INSERT INTO users(username, password, password_default, level) VALUES ('$username', '$_randpass', '1', '2')";
				mysql_query($mysql_insert_usr);

				$sql = mysql_query("SELECT id_user FROM users WHERE username='$username'") or die(mysql_error());
				$row = mysql_fetch_assoc($sql);
				$id_user = $row['id_user'];

				$mysql_insert_pembina = "INSERT INTO pembina_mahasiswa (id_user, nama, gelar, gender, kota_asal, telepon) VALUES ('".$id_user."', '$nama', '$gelar', '$gender', '$kotaasal', '$telepon')";
				mysql_query($mysql_insert_pembina);
	}	


	function tambahPimpinan($username, $nama, $gender, $jabatan){
			$randpass = substr(str_shuffle(str_repeat("0123456789aAbBcCdDeEfFgGhHiIjJ0123456789kKlLmMnNoOpPqQrRsStT0123456789uUvVwWxXyYzZ", 10)), 0, 10);
			$_randpass = mysql_real_escape_string($randpass);

		
				$mysql_insert_usr = "INSERT INTO users(username, password, password_default, level) VALUES ('$username', '$_randpass', '1', '2')";
				mysql_query($mysql_insert_usr);

				$sql = mysql_query("SELECT id_user FROM users WHERE username='$username'") or die(mysql_error());
				$row = mysql_fetch_assoc($sql);
				$id_user = $row['id_user'];

				$mysql_insert_pembina = "INSERT INTO pimpinan (id_user, nama, gender, jabatan) VALUES ('".$id_user."', '$nama', '$gender', '$jabatan')";
				mysql_query($mysql_insert_pembina);
	}		

	function importShalat($angkatan, $from, $to){

		// Periode shalat table
		mysql_query("INSERT INTO shalat_periode (tanggal_dari, tanggal_sampai) VALUES ('$from','$to')");


		$koneksi_mdb = odbc_connect( 'att2000', "", "");
		
		$sql = "SELECT userid AS id_mahasiswa, Format(tanggal, 'yyyy-mm-dd') AS tgl, Format(TimeValue(Min(t.CHECKTIME))) As wkt_tapping, session AS wkt_shalat FROM (SELECT session_from, session_to, date_from, date_to, session FROM ((timesetup i LEFT JOIN dateperiod d ON i.period_id = d.period_id) LEFT JOIN sessionrange q ON i.sessionrange_id = q.sessionrange_id)) As s INNER JOIN (SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, u.userid, u.Badgenumber, CHECKTIME FROM CHECKINOUT c LEFT JOIN USERINFO u ON c.userid = u.userid WHERE (Format(DateValue(c.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '$from' AND '$to') AND (u.Badgenumber LIKE '$angkatan%')) t ON ((t.tanggal BETWEEN s.date_from AND s.date_to) AND (t.tapping BETWEEN s.session_from AND s.session_to)) GROUP BY userid, tanggal, session, u.Badgenumber ORDER BY userid, tanggal, Format(TimeValue(Min(t.CHECKTIME)))";

		$result = odbc_exec($koneksi_mdb, $sql);		

		while($row_mdb = odbc_fetch_array($result)){

			$wktNew = date('H:i:s', strtotime($row_mdb['wkt_tapping']));
			$tglNew = date('Y-m-d', strtotime($row_mdb['tgl']));	

			//if(strpos($row_mdb['Name'], $row_mdb['Badgenumber']) === FALSE){
			$mysql_insert_presensi = "INSERT INTO shalat(id_mahasiswa, id_periode, tanggal, wkt_tapping, wkt_shalat) VALUES ('".$row_mdb['id_mahasiswa']."', (SELECT id_periode FROM shalat_periode WHERE tanggal_dari BETWEEN '$from' AND '$to'), '$tglNew', '$wktNew','".$row_mdb['wkt_shalat']."')";

			mysql_query($mysql_insert_presensi);

			//mysql_query("INSERT INTO shalat (id_mahasiswa, tanggal, wkt_tapping, wkt_shalat) VALUES ('$angkatan', '$to', '$from');");
		}
	}


	// Untuk testing struktur table shalat baru
	function importShalat2($angkatan, $from, $to, $_shubuhFrom, $_shubuhTo, $_dzuhurFrom, $_dzuhurTo, $_asharFrom, $_asharTo, $_maghribFrom, $_maghribTo, $_isyaFrom, $_isyaTo){

		$from_ = date('Y-m-d', strtotime($from));
		$to_ = date('Y-m-d', strtotime($to));

		$shubuhFrom = date('H.i.s', strtotime($_shubuhFrom));
		$shubuhTo = date('H.i.s', strtotime($_shubuhTo));
		$dzuhurFrom = date('H.i.s', strtotime($_dzuhurFrom));
		$dzuhurTo = date('H.i.s', strtotime($_dzuhurTo));
		$asharFrom = date('H.i.s', strtotime($_asharFrom));
		$asharTo = date('H.i.s', strtotime($_asharTo));
		$maghribFrom = date('H.i.s', strtotime($_maghribFrom));
		$maghribTo = date('H.i.s', strtotime($_maghribTo));
		$isyaFrom = date('H.i.s', strtotime($_isyaFrom));
		$isyaTo = date('H.i.s', strtotime($_isyaTo));		

		// Periode shalat table
		// mysql_query("INSERT INTO shalat_periode (tanggal_dari, tanggal_sampai) VALUES ('$from_','$to_')");

		$koneksi_mdb = odbc_connect( 'att2000', "", "");
		
		// $sql = "SELECT t.userid AS id_mahasiswa, Format(t.tanggal, 'yyyy-mm-dd') AS tgl, Format(TimeValue(Min(t.CHECKTIME))) As shubuh, Format(TimeValue(Min(d.CHECKTIME))) As dzuhur, Format(TimeValue(Min(a.CHECKTIME))) As ashar, Format(TimeValue(Min(m.CHECKTIME))) As maghrib, Format(TimeValue(Min(i.CHECKTIME))) As isya FROM (((( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ua.userid, ua.Badgenumber, CHECKTIME FROM CHECKINOUT ca LEFT JOIN USERINFO ua ON ca.userid = ua.userid WHERE (Format(DateValue(ca.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from_' AND '$to_') AND (Format(TimeValue(ca.CHECKTIME)) BETWEEN '$shubuhFrom' AND '$shubuhTo') AND (ua.Badgenumber LIKE '$angkatan%') )t LEFT JOIN ( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ub.userid, ub.Badgenumber, CHECKTIME FROM CHECKINOUT cb LEFT JOIN USERINFO ub ON cb.userid = ub.userid WHERE (Format(DateValue(cb.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from_' AND '$to_') AND (Format(TimeValue(cb.CHECKTIME)) BETWEEN '$dzuhurFrom' AND '$dzuhurTo') AND (ub.Badgenumber LIKE '$angkatan%') )d ON (t.userid = d.userid) AND (t.tanggal = d.tanggal)) LEFT JOIN ( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, uc.userid, uc.Badgenumber, CHECKTIME FROM CHECKINOUT cc LEFT JOIN USERINFO uc ON cc.userid = uc.userid WHERE (Format(DateValue(cc.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from_' AND '$to_') AND (Format(TimeValue(cc.CHECKTIME)) BETWEEN '$asharFrom' AND '$asharTo') AND (uc.Badgenumber LIKE '$angkatan%') )a ON (t.userid = a.userid) AND (t.tanggal = a.tanggal)) LEFT JOIN ( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ud.userid, ud.Badgenumber, CHECKTIME FROM CHECKINOUT cd LEFT JOIN USERINFO ud ON cd.userid = ud.userid WHERE (Format(DateValue(cd.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from_' AND '$to_') AND (Format(TimeValue(cd.CHECKTIME)) BETWEEN '$maghribFrom' AND '$maghribTo') AND (ud.Badgenumber LIKE '$angkatan%') )m ON (t.userid = m.userid) AND (t.tanggal = m.tanggal)) LEFT JOIN ( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ue.userid, ue.Badgenumber, CHECKTIME FROM CHECKINOUT ce LEFT JOIN USERINFO ue ON ce.userid = ue.userid WHERE (Format(DateValue(ce.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from_' AND '$to_') AND (Format(TimeValue(ce.CHECKTIME)) BETWEEN '$isyaFrom' AND '$isyaTo') AND (ue.Badgenumber LIKE '$angkatan%') )i ON (t.userid = i.userid) AND (t.tanggal = i.tanggal) GROUP BY t.userid, t.tanggal, ua.Badgenumber ORDER BY t.userid, t.tanggal";

		$sql = "SELECT t.Badgenumber AS nim, Format(t.tanggal, 'yyyy-mm-dd') AS tgl, Format(TimeValue(Min(t.CHECKTIME))) As shubuh, Format(TimeValue(Min(d.CHECKTIME))) As dzuhur, Format(TimeValue(Min(a.CHECKTIME))) As ashar, Format(TimeValue(Min(m.CHECKTIME))) As maghrib, Format(TimeValue(Min(i.CHECKTIME))) As isya FROM (((( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ua.userid, ua.Badgenumber, CHECKTIME FROM CHECKINOUT ca LEFT JOIN USERINFO ua ON ca.userid = ua.userid WHERE (Format(DateValue(ca.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from' AND '$to') AND (Format(TimeValue(ca.CHECKTIME)) BETWEEN '$shubuhFrom' AND '$shubuhTo') AND (ua.Badgenumber LIKE '$angkatan%') )t LEFT JOIN ( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ub.userid, ub.Badgenumber, CHECKTIME FROM CHECKINOUT cb LEFT JOIN USERINFO ub ON cb.userid = ub.userid WHERE (Format(DateValue(cb.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from' AND '$to') AND (Format(TimeValue(cb.CHECKTIME)) BETWEEN '$dzuhurFrom' AND '$dzuhurTo') AND (ub.Badgenumber LIKE '$angkatan%') )d ON (t.userid = d.userid) AND (t.tanggal = d.tanggal)) LEFT JOIN ( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, uc.userid, uc.Badgenumber, CHECKTIME FROM CHECKINOUT cc LEFT JOIN USERINFO uc ON cc.userid = uc.userid WHERE (Format(DateValue(cc.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from' AND '$to') AND (Format(TimeValue(cc.CHECKTIME)) BETWEEN '$asharFrom' AND '$asharTo') AND (uc.Badgenumber LIKE '$angkatan%') )a ON (t.userid = a.userid) AND (t.tanggal = a.tanggal)) LEFT JOIN ( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ud.userid, ud.Badgenumber, CHECKTIME FROM CHECKINOUT cd LEFT JOIN USERINFO ud ON cd.userid = ud.userid WHERE (Format(DateValue(cd.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from' AND '$to') AND (Format(TimeValue(cd.CHECKTIME)) BETWEEN '$maghribFrom' AND '$maghribTo') AND (ud.Badgenumber LIKE '$angkatan%') )m ON (t.userid = m.userid) AND (t.tanggal = m.tanggal)) LEFT JOIN ( SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ue.userid, ue.Badgenumber, CHECKTIME FROM CHECKINOUT ce LEFT JOIN USERINFO ue ON ce.userid = ue.userid WHERE (Format(DateValue(ce.CHECKTIME), 'yyyy-mm-dd') BETWEEN '$from' AND '$to') AND (Format(TimeValue(ce.CHECKTIME)) BETWEEN '$isyaFrom' AND '$isyaTo') AND (ue.Badgenumber LIKE '$angkatan%') )i ON (t.userid = i.userid) AND (t.tanggal = i.tanggal) GROUP BY t.userid, t.tanggal, ua.Badgenumber ORDER BY t.userid, t.tanggal";

		$result = odbc_exec($koneksi_mdb, $sql);		

		while($row_mdb = odbc_fetch_array($result)){

			$tgl_ = date('Y-m-d', strtotime($row_mdb['tgl']));	



			if($row_mdb['shubuh'] == ''){$shubuh_ = 0;}else{$shubuh_ = 1;}
			if($row_mdb['dzuhur'] == ''){$dzuhur_ = 0;}else{$dzuhur_ = 1;}
			if($row_mdb['ashar'] == ''){$ashar_ = 0;}else{$ashar_ = 1;}
			if($row_mdb['maghrib'] == ''){$maghrib_ = 0;}else{$maghrib_ = 1;}
			if($row_mdb['isya'] == ''){$isya_ = 0;}else{$isya_ = 1;}

			/*if($shubuh_ == date('H:i:s', strtotime('00:00:00'))){$shubuh_ = NULL;}else{$shubuh_ = $shubuh_;}
			if($dzuhur_ == date('H:i:s', strtotime('00:00:00'))){$dzuhur_ = NULL;}else{$dzuhur_ = $dzuhur_;}
			if($ashar_ == date('H:i:s', strtotime('00:00:00'))){$ashar_ = NULL;}else{$ashar_ = $ashar_;}
			if($maghrib_ == date('H:i:s', strtotime('00:00:00'))){$maghrib_ = NULL;}else{$maghrib_ = $maghrib_;}
			if($isya_ == date('H:i:s', strtotime('00:00:00'))){$isya_ = NULL;}else{$isya_ = $isya_;}*/

			//if(strpos($row_mdb['Name'], $row_mdb['Badgenumber']) === FALSE){
			$mysql_insert_presensi = "INSERT INTO presensi_shalat(nim, tanggal, shubuh, dzuhur, ashar, maghrib, isya) VALUES 
			(".$row_mdb['nim'].", '$tgl_', '".$shubuh_."','".$dzuhur_."','".$ashar_."','".$maghrib_."','".$isya_."');";

			mysql_query($mysql_insert_presensi);

			//mysql_query("INSERT INTO shalat (id_mahasiswa, tanggal, wkt_tapping, wkt_shalat) VALUES ('$angkatan', '$to', '$from');");
		}
	}	

	function updateTimeSetup($_dateFrom, $_dateTo, $_shubuhFrom, $_shubuhTo, $_dzuhurFrom, $_dzuhurTo, $_asharFrom, $_asharTo, $_maghribFrom, $_maghribTo, $_isyaFrom, $_isyaTo){
		$koneksi_mdb = odbc_connect( 'att2000', "", "");

		$dateFrom = date('d/m/Y', strtotime($_dateFrom));
		$dateTo = date('d/m/Y', strtotime($_dateTo));

		$shubuhFrom = date('H:i:s', strtotime($_shubuhFrom));
		$shubuhTo = date('H:i:s', strtotime($_shubuhTo));
		$dzuhurFrom = date('H:i:s', strtotime($_dzuhurFrom));
		$dzuhurTo = date('H:i:s', strtotime($_dzuhurTo));
		$asharFrom = date('H:i:s', strtotime($_asharFrom));
		$asharTo = date('H:i:s', strtotime($_asharTo));
		$maghribFrom = date('H:i:s', strtotime($_maghribFrom));
		$maghribTo = date('H:i:s', strtotime($_maghribTo));
		$isyaFrom = date('H:i:s', strtotime($_isyaFrom));
		$isyaTo = date('H:i:s', strtotime($_isyaTo));

		$sql_update_dateperiod = "UPDATE dateperiod SET date_from = '$dateFrom', date_to = '$dateTo' WHERE period_id = 1";
		odbc_exec($koneksi_mdb, $sql_update_dateperiod);

		$sql_update_shubuh = "UPDATE sessionrange SET session_from = '$shubuhFrom', session_to = '$shubuhTo' WHERE session = 'shubuh'";
		odbc_exec($koneksi_mdb, $sql_update_shubuh);
		$sql_update_dzuhur = "UPDATE sessionrange SET session_from = '$dzuhurFrom', session_to = '$dzuhurTo' WHERE session = 'dzuhur'";
		odbc_exec($koneksi_mdb, $sql_update_dzuhur);
		$sql_update_ashar = "UPDATE sessionrange SET session_from = '$asharFrom', session_to = '$asharTo' WHERE session = 'ashar'";
		odbc_exec($koneksi_mdb, $sql_update_ashar);
		$sql_update_maghrib = "UPDATE sessionrange SET session_from = '$maghribFrom', session_to = '$maghribTo' WHERE session = 'maghrib'";
		odbc_exec($koneksi_mdb, $sql_update_maghrib);
		$sql_update_isya = "UPDATE sessionrange SET session_from = '$isyaFrom', session_to = '$isyaTo' WHERE session = 'isya'";
		odbc_exec($koneksi_mdb, $sql_update_isya);
	}

	/*function importShalatTest($angkatan, $from, $to){
		mysql_query("INSERT INTO tesshalat (angkatan, dari_tgl, sampai_tgl) VALUES ('$angkatan', '$from', '$to');");
	}*/

	/*function AllMahasiswaMDB(){
		$koneksi_mdb = odbc_connect( 'attBackup', "", "");
		
		$sql = "SELECT userid, Badgenumber, Name FROM USERINFO WHERE Badgenumber LIKE '17%' ORDER BY Badgenumber";

		$result = odbc_exec($koneksi_mdb, $sql);		

		while ($ad = odbc_fetch_array($result)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}*/

	// Table Nilai PRESENSI SHALAT WAJIB MAHASISWA
	function shalatIkhwanAkhwat(){
		$ambildata = mysql_query("SELECT m.j_kelamin, h.jmhs, COUNT(s.wkt_tapping) AS fingerprint, mn.manual, COUNT(s.wkt_tapping)+mn.manual AS total, d.jhari, h.jmhs*d.jhari*5 AS target1, j.jwsp*h.jmhs AS jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, (j.jwsp*h.jmhs)+(IF(u.jmlu IS NULL, 0, u.jmlu)) AS totalu, (h.jmhs*d.jhari*5)-((j.jwsp*h.jmhs)+(IF(u.jmlu IS NULL, 0, u.jmlu))) AS target2, ROUND((((COUNT(s.wkt_tapping)+mn.manual)/((h.jmhs*d.jhari*5)-((j.jwsp*h.jmhs)+(IF(u.jmlu IS NULL, 0, u.jmlu)))))*100),2) AS nilai FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa LEFT JOIN ( SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m GROUP BY m.j_kelamin ) h ON m.j_kelamin = h.j_kelamin JOIN ( SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jhari FROM shalat s ) d LEFT JOIN ( SELECT jp.j_kelamin, COUNT(jp.wkt_shalat) AS jwsp FROM j_pulang2 jp GROUP BY jp.j_kelamin ) j ON m.j_kelamin = j.j_kelamin LEFT JOIN ( SELECT COUNT(su.udzur) AS jmlu, m.j_kelamin FROM shalat_udzur2 su LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa WHERE su.disetujui = 1 ) u ON m.j_kelamin = u.j_kelamin LEFT JOIN ( SELECT m.j_kelamin, IF(ma.jmlm IS NULL, 0, ma.jmlm) AS manual FROM mahasiswa m LEFT JOIN ( SELECT m.j_kelamin, COUNT(sm.wkt_shalat) AS jmlm FROM mahasiswa m LEFT JOIN shalat_manual sm ON m.id_mahasiswa = sm.id_mahasiswa WHERE sm.disetujui = 1 GROUP BY m.j_kelamin ) ma ON m.j_kelamin = ma.j_kelamin GROUP BY m.j_kelamin ) mn ON m.j_kelamin = mn.j_kelamin GROUP BY m.j_kelamin") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}		

	function shalatIAByDetail($jKelamin){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, d.jhari, m.jml AS jmhs, sh.total AS fingerprint, IF(ma.jmlm IS NULL, 0, ma.jmlm) AS manual, sh.total+IF(ma.jmlm IS NULL, 0, ma.jmlm) AS total, d.jhari*m.jml*5 AS target1, IF(j.jplg IS NULL, 0, j.jplg) AS jplg, m.jml*(IF(j.jplg IS NULL, 0, j.jplg)) AS total_jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, (d.jhari*m.jml*5)-(m.jml*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2, ROUND(((((sh.total+IF(ma.jmlm IS NULL, 0, ma.jmlm)))/((d.jhari*m.jml*5)-(m.jml*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari FROM shalat_periode sp ) d ON sp.id_periode = d.id_periode LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = '$jKelamin' GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS jml FROM mahasiswa m WHERE m.j_kelamin = '$jKelamin' ) m LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = '$jKelamin' GROUP BY jp.id_periode ) j ON sp.id_periode = j.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa WHERE su.disetujui = 1 AND m.j_kelamin = '$jKelamin' GROUP BY su.id_periode ) u ON sp.id_periode = u.id_periode LEFT JOIN ( SELECT sp.id_periode, COUNT(sm.wkt_shalat) AS jmlm FROM shalat_manual sm LEFT JOIN shalat_periode sp ON sm.tanggal BETWEEN sp.tanggal_dari AND sp.tanggal_sampai LEFT JOIN mahasiswa m ON sm.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = '$jKelamin' AND sm.disetujui = 1 GROUP BY sp.id_periode ) ma ON sp.id_periode = ma.id_periode") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;		
	}

	function shalatIAByDetailPercent($jKelamin1, $jKelamin2){
		$ambildata = mysql_query("SELECT a.nilai AS a, b.nilai AS b, ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS percent FROM ( SELECT ROUND((SUM(a.nilai)/j.jml),2) AS nilai FROM ( SELECT ROUND((((sh.total)/((d.jhari*m.jml*5)-(m.jml*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari FROM shalat_periode sp ) d ON sp.id_periode = d.id_periode LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = '$jKelamin1' GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS jml FROM mahasiswa m WHERE m.j_kelamin = '$jKelamin1' ) m LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = '$jKelamin1' GROUP BY jp.id_periode ) j ON sp.id_periode = j.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa WHERE su.disetujui = 1 AND m.j_kelamin = '$jKelamin1' GROUP BY su.id_periode ) u ON sp.id_periode = u.id_periode ) a JOIN ( SELECT COUNT(sp.id_periode) AS jml FROM shalat_periode sp ) j ) a JOIN ( SELECT ROUND((SUM(b.nilai)/j.jml),2) AS nilai FROM ( SELECT ROUND((((sh.total)/((d.jhari*m.jml*5)-(m.jml*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari FROM shalat_periode sp ) d ON sp.id_periode = d.id_periode LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = '$jKelamin2' GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS jml FROM mahasiswa m WHERE m.j_kelamin = '$jKelamin2' ) m LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = '$jKelamin2' GROUP BY jp.id_periode ) j ON sp.id_periode = j.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa WHERE su.disetujui = 1 AND m.j_kelamin = '$jKelamin2' GROUP BY su.id_periode ) u ON sp.id_periode = u.id_periode ) b JOIN ( SELECT COUNT(sp.id_periode) AS jml FROM shalat_periode sp ) j ) b") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function shalatIAByPeriodDetail($j_kelamin, $periodId){
		$ambildata = mysql_query("SELECT t.tanggal, IF(p.tanggal IS NULL, t.total, 0) AS fingerprint, IF(ma.jmlm IS NULL, 0, ma.jmlm) AS manual, IF(p.tanggal IS NULL, t.total, 0)+IF(ma.jmlm IS NULL, 0, ma.jmlm) AS total, j.jmhs, (IF(p.tanggal IS NULL, j.jmhs, p.j_kelamin))*5 AS target1, IF(p.tanggal IS NULL, '-', p.j_kelamin) AS plg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, ((IF(p.tanggal IS NULL, j.jmhs, p.j_kelamin))*5)-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2, IF(ROUND(((((IF(p.tanggal IS NULL, t.total, 0)+IF(ma.jmlm IS NULL, 0, ma.jmlm)))/(((IF(p.tanggal IS NULL, j.jmhs, p.j_kelamin))*5)-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) IS NULL, 0, ROUND((((IF(p.tanggal IS NULL, t.total, 0))/(((IF(p.tanggal IS NULL, j.jmhs, p.j_kelamin))*5)-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2)) AS nilai FROM ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, s.id_periode FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = '$j_kelamin' GROUP BY s.tanggal ) t LEFT JOIN ( SELECT jp.tanggal, jp.j_kelamin FROM j_pulang2 jp WHERE jp.j_kelamin = '$j_kelamin' GROUP BY jp.tanggal ) p ON t.tanggal = p.tanggal JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m WHERE m.j_kelamin = '$j_kelamin' ) j LEFT JOIN ( SELECT su.tanggal, COUNT(su.udzur) AS jmlu FROM shalat_udzur2 su LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa WHERE su.disetujui = 1 AND m.j_kelamin = '$j_kelamin' GROUP BY su.tanggal ) u ON t.tanggal = u.tanggal LEFT JOIN ( SELECT sm.tanggal, COUNT(sm.wkt_shalat) AS jmlm FROM shalat_manual sm LEFT JOIN mahasiswa m ON sm.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = '$j_kelamin' AND sm.disetujui = 1 GROUP BY sm.tanggal ) ma ON t.tanggal = ma.tanggal WHERE t.id_periode = $periodId GROUP BY t.tanggal") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function shalatIAByDay($j_kelamin, $tgl){
		$tgl_ = date('Y-m-d', strtotime($tgl));

		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, su.wkt_tapping AS 'shubuh', dz.wkt_tapping AS 'dzuhur', ah.wkt_tapping AS 'ashar', mg.wkt_tapping AS 'maghrib', iy.wkt_tapping AS 'isya' FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '$tgl_' ) su ON m.id_mahasiswa = su.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '$tgl_' ) dz ON m.id_mahasiswa = dz.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '$tgl_' ) ah ON m.id_mahasiswa = ah.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '$tgl_' ) mg ON m.id_mahasiswa = mg.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'isya' AND s.tanggal = '$tgl_' ) iy ON m.id_mahasiswa = iy.id_mahasiswa WHERE m.j_kelamin = '$j_kelamin' ORDER BY m.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}


	function shalatMhsGraph(){
		$ambildata = mysql_query("SELECT a.nama, a.j_kelamin, a.nilai FROM ( SELECT m.nama, m.j_kelamin, sh.total, t.jtgl, t.jtgl*5 As target1, p.jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, (t.jtgl*5)-(p.jplg+IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2, ROUND(((sh.total/((t.jtgl*5)-(p.jplg+IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, COUNT(s.wkt_tapping) AS total FROM shalat s GROUP BY s.id_mahasiswa ) sh ON m.id_mahasiswa = sh.id_mahasiswa JOIN ( SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jtgl FROM shalat s ) t LEFT JOIN ( SELECT jp.j_kelamin, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp GROUP BY jp.j_kelamin ) p ON m.j_kelamin = p.j_kelamin LEFT JOIN ( SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 GROUP BY su.id_mahasiswa ) u ON m.id_mahasiswa = u.id_mahasiswa ORDER BY nilai DESC LIMIT 5 ) a") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatMhs(){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, m.j_kelamin, sh.total AS fingerprint, IF(sm.jmlm IS NULL, 0, sm.jmlm) AS manual, sh.total+IF(sm.jmlm IS NULL, 0, sm.jmlm) AS total, t.jtgl, t.jtgl*5 As target1, p.jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, (t.jtgl*5)-(p.jplg+IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2, ROUND((((sh.total+IF(sm.jmlm IS NULL, 0, sm.jmlm))/((t.jtgl*5)-(p.jplg+IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, COUNT(s.wkt_tapping) AS total FROM shalat s GROUP BY s.id_mahasiswa ) sh ON m.id_mahasiswa = sh.id_mahasiswa JOIN ( SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jtgl FROM shalat s ) t LEFT JOIN ( SELECT jp.j_kelamin, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp GROUP BY jp.j_kelamin ) p ON m.j_kelamin = p.j_kelamin LEFT JOIN ( SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 GROUP BY su.id_mahasiswa ) u ON m.id_mahasiswa = u.id_mahasiswa LEFT JOIN ( SELECT sm.id_mahasiswa, COUNT(sm.wkt_shalat) AS jmlm FROM shalat_manual sm WHERE sm.disetujui = 1 GROUP BY sm.id_mahasiswa ) sm ON m.id_mahasiswa = sm.id_mahasiswa ORDER BY m.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatMhs2(){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, m.j_kelamin, sh.total AS fingerprint, IF(sm.jmlm IS NULL, 0, sm.jmlm) AS manual, sh.total+IF(sm.jmlm IS NULL, 0, sm.jmlm) AS total, t.jtgl, t.jtgl*5 As target1, IF(p.jplg IS NULL, 0, p.jplg) AS jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, (t.jtgl*5)-((IF(p.jplg IS NULL, 0, p.jplg))+IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2, ROUND((((sh.total+IF(sm.jmlm IS NULL, 0, sm.jmlm))/((t.jtgl*5)-((IF(p.jplg IS NULL, 0, p.jplg))+IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, COUNT(s.wkt_tapping) AS total FROM shalat s WHERE s.id_periode = 5 GROUP BY s.id_mahasiswa ) sh ON m.id_mahasiswa = sh.id_mahasiswa JOIN ( SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jtgl FROM shalat s WHERE s.id_periode = 5 ) t LEFT JOIN ( SELECT jp.j_kelamin, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.id_periode = 5 GROUP BY jp.j_kelamin ) p ON m.j_kelamin = p.j_kelamin LEFT JOIN ( SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 AND su.id_periode = 5 GROUP BY su.id_mahasiswa ) u ON m.id_mahasiswa = u.id_mahasiswa LEFT JOIN ( SELECT sm.id_mahasiswa, COUNT(sm.wkt_shalat) AS jmlm FROM shalat_manual sm WHERE sm.disetujui = 1 AND sm.id_periode = 5 GROUP BY sm.id_mahasiswa ) sm ON m.id_mahasiswa = sm.id_mahasiswa ORDER BY m.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function shalatMhsDetail($idMahasiswa){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, IF(sh.total IS NULL, 0, sh.total) AS fingerprint, IF(ma.jmlm IS NULL, 0, ma.jmlm) AS manual, IF(sh.total IS NULL, 0, sh.total)+IF(ma.jmlm IS NULL, 0, ma.jmlm) AS total, DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1 AS jtgl, (DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*5 AS target1, IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)) AS jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, ((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*5)-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2, IF((ROUND(((((IF(sh.total IS NULL, 0, sh.total)+IF(ma.jmlm IS NULL, 0, ma.jmlm)))/(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*5)-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2)) > 100, 100, (ROUND(((((IF(sh.total IS NULL, 0, sh.total)+IF(ma.jmlm IS NULL, 0, ma.jmlm)))/(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*5)-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2))) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total, m.j_kelamin, m.id_mahasiswa FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.id_mahasiswa = $idMahasiswa GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Ikhwan' GROUP BY jp.id_periode ) pi ON sh.id_periode = pi.id_periode LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Akhwat' GROUP BY jp.id_periode ) pa ON sh.id_periode = pa.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 AND su.id_mahasiswa = $idMahasiswa GROUP BY su.id_periode ) u ON sh.id_periode = u.id_periode LEFT JOIN ( SELECT sp.id_periode, COUNT(sm.wkt_shalat) AS jmlm FROM shalat_manual sm LEFT JOIN shalat_periode sp ON sm.tanggal BETWEEN sp.tanggal_dari AND sp.tanggal_sampai WHERE sm.id_mahasiswa = $idMahasiswa GROUP BY sp.id_periode ) ma ON sp.id_periode = ma.id_periode ORDER BY sp.id_periode DESC") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function shalatIkhtisarDetail($idPeriod){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nim, m.nama, m.j_kelamin, p.total FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, COUNT(s.wkt_tapping) AS total FROM shalat s WHERE s.id_periode = $idPeriod GROUP BY s.id_mahasiswa ) p ON m.id_mahasiswa = p.id_mahasiswa ORDER BY m.nama ") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatMhsDetailPercent($idMahasiswa){
		$ambildata = mysql_query("SELECT a.nilai AS a, b.nilai AS b, ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS percent FROM ( SELECT ROUND((SUM(a.nilai)/j.jml),2) AS nilai FROM ( SELECT ROUND((((sh.total)/((d.jhari*mh.jmhs*5)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari FROM shalat_periode sp ) d ON sp.id_periode = d.id_periode LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total FROM shalat s GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) mh LEFT JOIN ( SELECT jp.id_periode, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.id_periode ) p ON sp.id_periode = p.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' ) a JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' ) i LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp GROUP BY jp.id_periode ) j ON sp.id_periode = j.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 GROUP BY su.id_periode ) u ON sp.id_periode = u.id_periode ) a JOIN ( SELECT COUNT(sp.id_periode) AS jml FROM shalat_periode sp ) j ) a JOIN ( SELECT ROUND((SUM(b.nilai)/j.jml),2) AS nilai FROM ( SELECT ROUND((((sh.total)/(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*5)-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total, m.j_kelamin, m.id_mahasiswa FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.id_mahasiswa = $idMahasiswa GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Ikhwan' GROUP BY jp.id_periode ) pi ON sh.id_periode = pi.id_periode LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Akhwat' GROUP BY jp.id_periode ) pa ON sh.id_periode = pa.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 AND su.id_mahasiswa = $idMahasiswa GROUP BY su.id_periode ) u ON sh.id_periode = u.id_periode ) b JOIN ( SELECT COUNT(sp.id_periode) AS jml FROM shalat_periode sp ) j ) b") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatMhsByPeriodGraph($idMahasiswa, $idPeriode){
		$ambildata = mysql_query("SELECT s.tanggal, IF((ROUND((((IF(sh.total IS NULL, 0, sh.total)+IF(ma.jmlm IS NULL, 0, ma.jmlm))/((5-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu)))))*100),2)) > 100, 100, (ROUND((((IF(sh.total IS NULL, 0, sh.total)+IF(ma.jmlm IS NULL, 0, ma.jmlm))/((5-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu)))))*100),2))) AS nilai FROM shalat s LEFT JOIN ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, m.j_kelamin, m.id_mahasiswa FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.id_mahasiswa = $idMahasiswa GROUP BY s.tanggal ) sh ON s.tanggal = sh.tanggal LEFT JOIN ( SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Ikhwan' GROUP BY jp.tanggal ) pi ON s.tanggal = pi.tanggal LEFT JOIN ( SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Akhwat' GROUP BY jp.tanggal ) pa ON s.tanggal = pa.tanggal LEFT JOIN ( SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.id_mahasiswa = $idMahasiswa AND su.disetujui = 1 GROUP BY su.tanggal ) u ON s.tanggal = u.tanggal LEFT JOIN ( SELECT sm.tanggal, COUNT(sm.wkt_shalat) AS jmlm FROM shalat_manual sm WHERE sm.id_mahasiswa = $idMahasiswa AND sm.disetujui = 1 GROUP BY sm.tanggal ) ma ON s.tanggal = ma.tanggal WHERE s.id_periode = $idPeriode GROUP BY s.tanggal") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatMhsByPeriod($idMahasiswa, $idPeriode){
		$ambildata = mysql_query("SELECT s.tanggal, IF(sh.total IS NULL, 0, sh.total) AS fingerprint, IF(ma.jmlm IS NULL, 0, ma.jmlm) AS manual, IF(sh.total IS NULL, 0, sh.total)+IF(ma.jmlm IS NULL, 0, ma.jmlm) AS total, 5 AS target1, IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)) AS jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, ((5-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu)))) AS target2, IF((ROUND((((IF(sh.total IS NULL, 0, sh.total)+IF(ma.jmlm IS NULL, 0, ma.jmlm))/((5-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu)))))*100),2)) > 100, 100, (ROUND((((IF(sh.total IS NULL, 0, sh.total)+IF(ma.jmlm IS NULL, 0, ma.jmlm))/((5-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu)))))*100),2))) AS nilai FROM shalat s LEFT JOIN ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, m.j_kelamin, m.id_mahasiswa FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.id_mahasiswa = $idMahasiswa GROUP BY s.tanggal ) sh ON s.tanggal = sh.tanggal LEFT JOIN ( SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Ikhwan' GROUP BY jp.tanggal ) pi ON s.tanggal = pi.tanggal LEFT JOIN ( SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Akhwat' GROUP BY jp.tanggal ) pa ON s.tanggal = pa.tanggal LEFT JOIN ( SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.id_mahasiswa = $idMahasiswa AND su.disetujui = 1 GROUP BY su.tanggal ) u ON s.tanggal = u.tanggal LEFT JOIN ( SELECT sm.tanggal, COUNT(sm.wkt_shalat) AS jmlm FROM shalat_manual sm WHERE sm.id_mahasiswa = $idMahasiswa AND sm.disetujui = 1 GROUP BY sm.tanggal ) ma ON s.tanggal = ma.tanggal WHERE s.id_periode = $idPeriode GROUP BY s.tanggal") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function shalatMhsByDay($idMahasiswa, $tgl){
		$tgl_ = date('Y-m-d', strtotime($tgl));
		
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, su.wkt_tapping AS shubuh, zu.wkt_tapping AS dzuhur, ar.wkt_tapping AS ashar, mg.wkt_tapping AS maghrib, iy.wkt_tapping AS isya FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '$tgl_' ) su ON m.id_mahasiswa = su.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '$tgl_' ) zu ON m.id_mahasiswa = zu.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '$tgl_' ) ar ON m.id_mahasiswa = ar.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '$tgl_' ) mg ON m.id_mahasiswa = mg.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'isya' AND s.tanggal = '$tgl_' ) iy ON m.id_mahasiswa = iy.id_mahasiswa WHERE m.id_mahasiswa = $idMahasiswa") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}		

	function shalatMhsByDayGraph($idMahasiswa, $tgl){
		$tgl_ = date('Y-m-d', strtotime($tgl));

		$ambildata = mysql_query(" SELECT IF(sh.jml IS NULL, 0, sh.jml) AS jml FROM shalat s LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_shalat, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.tanggal = '$tgl_' AND s.id_mahasiswa = $idMahasiswa GROUP BY s.wkt_shalat ORDER BY s.wkt_tapping ) sh ON s.wkt_shalat = sh.wkt_shalat GROUP BY s.wkt_shalat ORDER BY s.wkt_tapping") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;				
	}

	function percentMhsByDay($idMahasiswa, $tgl1, $tgl2){
		$tgl1_ = date('Y-m-d', strtotime($tgl1));
		$tgl2_ = date('Y-m-d', strtotime($tgl2));

		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((IF(a.jml = 0, (((b.jml-a.jml)/5)*100), (((((b.jml-a.jml)/a.jml))*100)))),2) AS percent FROM ( SELECT m.id_mahasiswa, COUNT(sh.wkt_tapping) AS jml FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping FROM shalat s WHERE s.tanggal = '$tgl1_' ) sh ON m.id_mahasiswa = sh.id_mahasiswa WHERE m.id_mahasiswa = $idMahasiswa ) a JOIN ( SELECT m.id_mahasiswa, COUNT(sh.wkt_tapping) AS jml FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping FROM shalat s WHERE s.tanggal = '$tgl2_' ) sh ON m.id_mahasiswa = sh.id_mahasiswa WHERE m.id_mahasiswa = $idMahasiswa ) b") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function tampilPeriodeShalat(){
		$ambildata = mysql_query("SELECT id_periode, tanggal_dari, tanggal_sampai FROM `shalat_periode`") or die(mysql_error());
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}

	function tampilWktShalat(){
		$ambildata = mysql_query("SELECT s.wkt_shalat FROM shalat s GROUP by s.wkt_shalat ORDER BY s.wkt_tapping") or die(mysql_error());
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;		
	}

	function tampilTglPeriodeById($idPeriod){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai FROM shalat_periode sp WHERE sp.id_periode = $idPeriod") or die(mysql_error());
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}	

	function tampilMaxTglPeriodeById(){
		$ambildata = mysql_query("SELECT MAX(sp.id_periode) AS id_periode, MAX(sp.tanggal_dari) AS tanggal_dari, MAX(sp.tanggal_sampai) As tanggal_sampai FROM shalat_periode sp") or die(mysql_error());
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}

	function shalatNilaiIkhwan(){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.jws_ikhwan AS 'target', ROUND(COUNT(s.wkt_shalat)/179) AS 'jmlrt', ROUND((COUNT(s.wkt_shalat)/186)/sp.jws_ikhwan*100) AS 'nilai_ikhwan' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = 'Ikhwan' GROUP BY sp.id_periode ORDER BY sp.id_periode") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}

	function shalatNilaiAkhwat(){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.jws_akhwat AS 'target', ROUND(COUNT(s.wkt_shalat)/193) AS 'jmlrt', ROUND((COUNT(s.wkt_shalat)/201)/sp.jws_akhwat*100) AS 'nilai_akhwat' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = 'Akhwat' GROUP BY sp.id_periode ORDER BY sp.id_periode") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}

	// Untuk Chart sparkline di Dashboard & Shalat Ikhtisar
	function shalatNilaiSemua(){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, d.jhari, mh.jmhs, sh.total, d.jhari*mh.jmhs*5 AS target1, IF(p.id_periode IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg, IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)) AS jpmhs, IF(j.jplg IS NULL, 0, j.jplg) AS jplg, (IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)) AS total_jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, (d.jhari*mh.jmhs*5)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2, ROUND((((sh.total)/((d.jhari*mh.jmhs*5)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari FROM shalat_periode sp ) d ON sp.id_periode = d.id_periode LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total FROM shalat s GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) mh LEFT JOIN ( SELECT jp.id_periode, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.id_periode ) p ON sp.id_periode = p.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' ) a JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' ) i LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp GROUP BY jp.id_periode ) j ON sp.id_periode = j.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 GROUP BY su.id_periode ) u ON sp.id_periode = u.id_periode") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}

	function shalatByPeriodID($idPeriod){
		$ambildata = mysql_query("SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, j.jmhs,(IF(p.tanggal IS NULL, j.jmhs, (CASE WHEN p.j_kelamin = 'Akhwat' THEN i.plg ELSE a.plg END)))*5 AS target1,IF(p.tanggal IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg,IF(p.tanggal IS NULL, j.jmhs, (CASE WHEN p.j_kelamin = 'Akhwat' THEN i.plg ELSE a.plg END)) AS jsisa,IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,((IF(p.tanggal IS NULL, j.jmhs, (CASE WHEN p.j_kelamin = 'Akhwat' THEN i.plg ELSE a.plg END)))*5)-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2,ROUND((((COUNT(s.wkt_tapping))/(((IF(p.tanggal IS NULL, j.jmhs, (CASE WHEN p.j_kelamin = 'Akhwat' THEN i.plg ELSE a.plg END)))*5)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai FROM shalat s LEFT JOIN ( SELECT jp.tanggal, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.tanggal ) p ON s.tanggal = p.tanggal JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) j JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' ) a JOIN (SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' ) i LEFT JOIN ( SELECT su.tanggal, COUNT(su.udzur) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 ) u ON s.tanggal = u.tanggal WHERE s.id_periode = $idPeriod GROUP BY s.tanggal") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}	

	function percenIkhtisarByPeriod($p1, $p2){
		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((((b.jml-a.jml)/a.jml)*100),2) AS percent FROM ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.id_periode = $p1 GROUP BY s.id_periode ) a JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.id_periode = $p2 GROUP BY s.id_periode ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function percenMhsByPeriod($idMahasiswa, $p1, $p2){
		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((((b.jml-a.jml)/a.jml)*100),2) AS 'percent' FROM ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.id_periode = $p1 AND s.id_mahasiswa = $idMahasiswa GROUP BY s.id_periode ) a JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.id_periode = $p2 AND s.id_mahasiswa = $idMahasiswa GROUP BY s.id_periode ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;				
	}

	function percenIAByPeriod($j_kelamin, $p1, $p2){
		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((((b.jml-a.jml)/a.jml)*100),2) AS percent FROM ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE s.id_periode = $p1 AND m.j_kelamin = '$j_kelamin' GROUP BY s.id_periode ) a JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE s.id_periode = $p2 AND m.j_kelamin = '$j_kelamin' GROUP BY s.id_periode ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function shalatIkhtisarDetailByDay($tgl){

		$tgl_ = date('Y-m-d', strtotime($tgl));

		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, su.wkt_tapping AS 'shubuh', dz.wkt_tapping AS 'dzuhur', ah.wkt_tapping AS 'ashar', mg.wkt_tapping AS 'maghrib', iy.wkt_tapping AS 'isya' FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '$tgl_' ) su ON m.id_mahasiswa = su.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '$tgl_' ) dz ON m.id_mahasiswa = dz.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '$tgl_' ) ah ON m.id_mahasiswa = ah.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '$tgl_' ) mg ON m.id_mahasiswa = mg.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'isya' AND s.tanggal = '$tgl_') iy ON m.id_mahasiswa = iy.id_mahasiswa ORDER BY m.nama") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;		
	}

	function jmlShalatPerDayByWaktu($tgl){
		$tgl_ = date('Y-m-d', strtotime($tgl));

		$ambildata = mysql_query("SELECT s.wkt_shalat, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.tanggal = '$tgl_' GROUP BY s.wkt_shalat ORDER BY s.wkt_tapping") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function jmlShalatIAPerDayByWaktu($j_kelamin, $tgl){
		$tgl_ = date('Y-m-d', strtotime($tgl));

		$ambildata = mysql_query("SELECT s.wkt_shalat, COUNT(s.wkt_tapping) AS jml FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = '$j_kelamin' AND s.tanggal = '$tgl_' GROUP BY s.wkt_shalat ORDER BY s.wkt_tapping") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}	

	function percenIkhtisarByDay($tgl1, $tgl2){
		$tgl1_ = date('Y-m-d', strtotime($tgl1));
		$tgl2_ = date('Y-m-d', strtotime($tgl2));

		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((((b.jml-a.jml)/a.jml)*100),2) AS percent FROM ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.tanggal = '$tgl1_' GROUP BY s.tanggal ) a JOIN ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.tanggal = '$tgl2_' GROUP BY s.tanggal ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function percenIAByDay($j_kelamin, $tgl1, $tgl2){
		$tgl1_ = date('Y-m-d', strtotime($tgl1));
		$tgl2_ = date('Y-m-d', strtotime($tgl2));

		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((((b.jml-a.jml)/a.jml)*100),2) AS percent FROM ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = '$j_kelamin' AND s.tanggal = '$tgl1_' GROUP BY s.tanggal ) a JOIN ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = '$j_kelamin' AND s.tanggal = '$tgl2_' GROUP BY s.tanggal ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function shalatByPembina($column){
		if ($column == 'chart') {
			$ambildata = mysql_query("SELECT ROUND((((s.total+IF(ma.jmlm IS NULL, 0, ma.jmlm))/((r.jhari*5*j.jmlb)-(pu.jplg)-(IF(uz.jmlu IS NULL, 0, uz.jmlu))))*100),2) AS nilai FROM pembina p LEFT JOIN ( SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY p.id_pembina ) j ON p.id_pembina = j.id_pembina LEFT JOIN ( SELECT mb.id_pembina, COUNT(sl.wkt_tapping) AS total FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa GROUP BY mb.id_pembina ) s ON p.id_pembina = s.id_pembina LEFT JOIN ( SELECT mb.id_pembina, COUNT(sm.wkt_shalat) AS jmlm FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat_manual sm ON m.id_mahasiswa = sm.id_mahasiswa WHERE sm.disetujui = 1 GROUP BY mb.id_pembina ) ma ON p.id_pembina = ma.id_pembina JOIN ( SELECT DATEDIFF(MAX(sp.tanggal_sampai),MIN(sp.tanggal_dari))+1 AS jhari FROM shalat_periode sp ) r LEFT JOIN ( SELECT p.id_pembina, COUNT(jp.wkt_shalat) AS jplg FROM pembina p LEFT JOIN j_pulang2 jp ON p.j_kelamin = jp.j_kelamin GROUP BY p.id_pembina ) pu ON p.id_pembina = pu.id_pembina LEFT JOIN ( SELECT mb.id_pembina, COUNT(su.wkt_shalat) AS jmlu FROM m_binaan mb LEFT JOIN shalat_udzur2 su ON mb.id_mahasiswa = su.id_mahasiswa WHERE su.disetujui = 1 GROUP BY mb.id_pembina ) uz ON p.id_pembina = uz.id_pembina GROUP BY p.id_pembina") or die(mysql_error());
			
				while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
					$data[] = $ad;
					return $data;				
		} else
		if ($column == 'table') {
			$ambildata = mysql_query("SELECT p.id_pembina, p.nama, p.j_kelamin, j.jmlb, s.total AS fingerprint, IF(ma.jmlm IS NULL, 0, ma.jmlm) AS manual, s.total+IF(ma.jmlm IS NULL, 0, ma.jmlm) AS total, r.jhari, r.jhari*5*j.jmlb AS target, pu.jplg, IF(uz.jmlu IS NULL, 0, uz.jmlu) AS jmlu, (r.jhari*5*j.jmlb)-(pu.jplg)-(IF(uz.jmlu IS NULL, 0, uz.jmlu)) AS target2, ROUND((((s.total+IF(ma.jmlm IS NULL, 0, ma.jmlm))/((r.jhari*5*j.jmlb)-(pu.jplg)-(IF(uz.jmlu IS NULL, 0, uz.jmlu))))*100),2) AS nilai FROM pembina p LEFT JOIN ( SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY p.id_pembina ) j ON p.id_pembina = j.id_pembina LEFT JOIN ( SELECT mb.id_pembina, COUNT(sl.wkt_tapping) AS total FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa GROUP BY mb.id_pembina ) s ON p.id_pembina = s.id_pembina LEFT JOIN ( SELECT mb.id_pembina, COUNT(sm.wkt_shalat) AS jmlm FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat_manual sm ON m.id_mahasiswa = sm.id_mahasiswa WHERE sm.disetujui = 1 GROUP BY mb.id_pembina ) ma ON p.id_pembina = ma.id_pembina JOIN ( SELECT DATEDIFF(MAX(sp.tanggal_sampai),MIN(sp.tanggal_dari))+1 AS jhari FROM shalat_periode sp ) r LEFT JOIN ( SELECT p.id_pembina, COUNT(jp.wkt_shalat) AS jplg FROM pembina p LEFT JOIN j_pulang2 jp ON p.j_kelamin = jp.j_kelamin GROUP BY p.id_pembina ) pu ON p.id_pembina = pu.id_pembina LEFT JOIN ( SELECT mb.id_pembina, COUNT(su.wkt_shalat) AS jmlu FROM m_binaan mb LEFT JOIN shalat_udzur2 su ON mb.id_mahasiswa = su.id_mahasiswa WHERE su.disetujui = 1 GROUP BY mb.id_pembina ) uz ON p.id_pembina = uz.id_pembina GROUP BY p.id_pembina") or die(mysql_error());
			
				while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
					$data[] = $ad;
					return $data;				
		} else
		if ($column == 'nama'){
			$ambildata = mysql_query("SELECT p.nama AS 'pembina' FROM pembina p ORDER BY p.nama") or die(mysql_error());
			
				while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
					$data[] = $ad;
					return $data;				
		}
	}

	function shalatByPembinaId($idPembina){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, d.jhari, t.j_kelamin, COUNT(s.wkt_shalat) AS 'total', j.jmlb, j.jmlb*d.jhari*5 AS target1, j.jmlb*(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(a.jplg IS NULL, 0, a.jplg)) ELSE (IF(i.jplg IS NULL, 0, i.jplg)) END) AS jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, (j.jmlb*d.jhari*5)-((j.jmlb*(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(a.jplg IS NULL, 0, a.jplg)) ELSE (IF(i.jplg IS NULL, 0, i.jplg)) END))+IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2, ROUND(((COUNT(s.wkt_shalat)/((j.jmlb*d.jhari*5)-((j.jmlb*(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(a.jplg IS NULL, 0, a.jplg)) ELSE (IF(i.jplg IS NULL, 0, i.jplg)) END))+IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN ( SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) t ON s.id_mahasiswa = t.id_mahasiswa LEFT JOIN ( SELECT p.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE mb.id_pembina = $idPembina GROUP BY p.nama ) j ON t.id_pembina = j.id_pembina LEFT JOIN ( SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari FROM shalat_periode sp ) d ON sp.id_periode = d.id_periode LEFT JOIN ( SELECT sp.id_periode, COUNT(jp.wkt_shalat) AS jplg, jp.j_kelamin FROM shalat_periode sp LEFT JOIN j_pulang2 jp ON sp.id_periode = jp.id_periode WHERE jp.j_kelamin = 'Ikhwan' GROUP BY sp.id_periode ) i ON sp.id_periode = i.id_periode LEFT JOIN ( SELECT sp.id_periode, COUNT(jp.wkt_shalat) AS jplg, jp.j_kelamin FROM shalat_periode sp LEFT JOIN j_pulang2 jp ON sp.id_periode = jp.id_periode WHERE jp.j_kelamin = 'Akhwat' GROUP BY sp.id_periode ) a ON sp.id_periode = a.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE p.id_pembina = $idPembina AND su.disetujui = 1 GROUP BY su.id_periode ) u ON sp.id_periode = u.id_periode WHERE t.id_pembina = $idPembina GROUP BY sp.id_periode ORDER BY sp.id_periode") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function shalatByPembinaIdNew($idPembina){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, p.total FROM shalat_periode sp LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total FROM shalat s LEFT JOIN m_binaan mb ON s.id_mahasiswa = mb.id_mahasiswa WHERE mb.id_pembina = $idPembina GROUP BY s.id_periode ) p ON sp.id_periode = p.id_periode") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}	

	function shalatByPembinaIdNewDetail($idPembina, $idPeriode){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nim, m.nama, p.total FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, COUNT(s.wkt_tapping) AS total FROM shalat s WHERE s.id_periode = $idPeriode GROUP BY s.id_mahasiswa ) p ON m.id_mahasiswa = p.id_mahasiswa LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa WHERE mb.id_pembina = $idPembina ORDER BY m.nama") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}		

	function shalatByPembinaIdPercentage($idPembina){
		$ambildata = mysql_query("SELECT a.nilai AS a, b.nilai AS b, ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS 'percent' FROM ( SELECT ROUND((SUM(a.nilai)/a.jml),2) AS nilai FROM ( SELECT p.jml, ROUND(((COUNT(s.jws)/((j.jmlb*(r.jmltgl-pu.jplg)*5)-(IF(uz.jmlu IS NULL, 0, uz.jmlu))))*100),2) AS nilai FROM pembina p LEFT JOIN ( SELECT mb.id_pembina, sl.wkt_tapping AS jws FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa ) s ON p.id_pembina = s.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY p.id_pembina ) j ON p.id_pembina = j.id_pembina LEFT JOIN ( SELECT p.id_pembina, DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jmltgl FROM pembina p LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa GROUP BY p.id_pembina ) r ON p.id_pembina = r.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(jp.tanggal) AS jplg FROM pembina p LEFT JOIN j_pulang jp ON p.j_kelamin = jp.j_kelamin GROUP BY p.id_pembina ) pu ON p.id_pembina = pu.id_pembina LEFT JOIN ( SELECT mb.id_pembina, u.jmlu FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN ( SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 GROUP BY su.id_mahasiswa ) u ON m.id_mahasiswa = u.id_mahasiswa GROUP BY mb.id_pembina ) uz ON p.id_pembina = uz.id_pembina JOIN ( SELECT COUNT(p.id_pembina) AS jml FROM pembina p ) p GROUP BY p.id_pembina ) a ) a JOIN ( SELECT ROUND(((COUNT(s.jws)/((j.jmlb*(r.jmltgl-pu.jplg)*5)-(IF(uz.jmlu IS NULL, 0, uz.jmlu))))*100),2) AS nilai FROM pembina p LEFT JOIN ( SELECT mb.id_pembina, sl.wkt_tapping AS jws FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa ) s ON p.id_pembina = s.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY p.id_pembina ) j ON p.id_pembina = j.id_pembina LEFT JOIN ( SELECT p.id_pembina, DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jmltgl FROM pembina p LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa GROUP BY p.id_pembina ) r ON p.id_pembina = r.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(jp.tanggal) AS jplg FROM pembina p LEFT JOIN j_pulang jp ON p.j_kelamin = jp.j_kelamin GROUP BY p.id_pembina ) pu ON p.id_pembina = pu.id_pembina LEFT JOIN ( SELECT mb.id_pembina, u.jmlu FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN ( SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 GROUP BY su.id_mahasiswa ) u ON m.id_mahasiswa = u.id_mahasiswa GROUP BY mb.id_pembina ) uz ON p.id_pembina = uz.id_pembina JOIN ( SELECT COUNT(p.id_pembina) AS jml FROM pembina p ) p WHERE p.id_pembina = $idPembina GROUP BY p.id_pembina ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatByPembinaByPeriod($idPembina, $idPeriod){
		$ambildata = mysql_query("SELECT sp.id_periode, s.tanggal, COUNT(s.wkt_shalat) AS 'total', j.jmlb, (j.jmlb*5) AS 'target1', (CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END) AS jplg, IF(uz.jmlu IS NULL, 0, uz.jmlu) AS jmlu, IF(((CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END)) = 5 , 0, (j.jmlb*5)-(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END)-(IF(uz.jmlu IS NULL, 0, uz.jmlu))) AS target2, ROUND(((COUNT(s.wkt_shalat)/(IF(((CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END)) = 5 , 0, (j.jmlb*5)-(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END)-(IF(uz.jmlu IS NULL, 0, uz.jmlu)))))*100),2) AS 'nilai' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN( SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) t ON s.id_mahasiswa = t.id_mahasiswa LEFT JOIN( SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE mb.id_pembina = $idPembina GROUP BY p.nama ) j ON t.id_pembina = j.id_pembina LEFT JOIN ( SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Akhwat' GROUP BY jp.tanggal ) pa ON s.tanggal = pa.tanggal LEFT JOIN ( SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.j_kelamin = 'Ikhwan' GROUP BY jp.tanggal ) pi ON s.tanggal = pi.tanggal LEFT JOIN ( SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE p.id_pembina = $idPembina AND su.disetujui = 1 GROUP BY su.tanggal ) uz ON s.tanggal = uz.tanggal WHERE (t.id_pembina = $idPembina) AND (sp.id_periode = $idPeriod) GROUP BY s.tanggal") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;		
	}

	function shalatByPembinaByPeriodPercent($idPembina, $idPeriod1, $idPeriod2){
		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((((b.jml-a.jml)/a.jml)*100),2) AS percent FROM ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml FROM shalat s LEFT JOIN m_binaan mb ON s.id_mahasiswa = mb.id_mahasiswa WHERE s.id_periode = $idPeriod1 AND mb.id_pembina = $idPembina GROUP BY s.id_periode ) a JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml FROM shalat s LEFT JOIN m_binaan mb ON s.id_mahasiswa = mb.id_mahasiswa WHERE s.id_periode = $idPeriod2 AND mb.id_pembina = $idPembina GROUP BY s.id_periode ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatByPembinaByPeriodByDay($idPembina, $tgl){

		$tgl_ = date('Y-m-d', strtotime($tgl));

		$ambildata = mysql_query("SELECT mb.id_mhsbinaan, mb.id_mahasiswa, m.nama, su.wkt_tapping AS 'shubuh', zu.wkt_tapping AS 'dzuhur', ar.wkt_tapping AS 'ashar', mg.wkt_tapping AS 'maghrib', iy.wkt_tapping AS 'isya' FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '$tgl_' ) su ON m.id_mahasiswa = su.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '$tgl_' ) zu ON m.id_mahasiswa = zu.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '$tgl_' ) ar ON m.id_mahasiswa = ar.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '$tgl_') mg ON m.id_mahasiswa = mg.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'isya' AND s.tanggal = '$tgl_' ) iy ON m.id_mahasiswa = iy.id_mahasiswa WHERE mb.id_pembina = $idPembina") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;		
	}

	function shalatByPembinaByDayGraph($idPembina, $tgl){
		$tgl_ = date('Y-m-d', strtotime($tgl));

		$ambildata = mysql_query("SELECT IF(sh.jml IS NULL, 0, sh.jml) AS jml FROM shalat s LEFT JOIN ( SELECT mb.id_pembina, s.wkt_shalat, COUNT(s.wkt_tapping) AS jml FROM m_binaan mb LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal = '$tgl_' AND mb.id_pembina = $idPembina GROUP BY s.wkt_shalat ORDER BY s.wkt_tapping ) sh ON s.wkt_shalat = sh.wkt_shalat GROUP BY s.wkt_shalat ORDER BY s.wkt_tapping") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatByPembinaByDayPercent($idPembina, $tgl1, $tgl2){
		$tgl1_ = date('Y-m-d', strtotime($tgl1));
		$tgl2_ = date('Y-m-d', strtotime($tgl2));

		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((IF(a.jml = 0, (((b.jml-a.jml)/5)*100), (((((b.jml-a.jml)/a.jml))*100)))),2) AS percent FROM ( SELECT mb.id_pembina, COUNT(sh.wkt_tapping) AS jml FROM m_binaan mb LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping FROM shalat s WHERE s.tanggal = '$tgl1_' ) sh ON mb.id_mahasiswa = sh.id_mahasiswa WHERE mb.id_pembina = $idPembina ) a JOIN ( SELECT mb.id_pembina, COUNT(sh.wkt_tapping) AS jml FROM m_binaan mb LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping FROM shalat s WHERE s.tanggal = '$tgl2_' ) sh ON mb.id_mahasiswa = sh.id_mahasiswa WHERE mb.id_pembina = $idPembina ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;		
	}


	function shalatByWkt(){
		$ambildata = mysql_query("SELECT s.wkt_shalat, COUNT(s.wkt_tapping) AS fingerprint, IF(ma.jmlm IS NULL, 0, ma.jmlm) AS manual, COUNT(s.wkt_tapping)+IF(ma.jmlm IS NULL, 0, ma.jmlm) AS total, t.jtgl, h.jmhs, (t.jtgl*h.jmhs) AS target1, (p.jplg*h.jmhs) AS jplg, u.jmlu, (t.jtgl*h.jmhs)-(p.jplg*h.jmhs)-u.jmlu AS target2, ROUND((((((COUNT(s.wkt_tapping)+IF(ma.jmlm IS NULL, 0, ma.jmlm)))/((t.jtgl*h.jmhs)-(p.jplg*h.jmhs)-u.jmlu))*100)),2) AS nilai FROM shalat s JOIN ( SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jtgl FROM shalat s ) t JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) h LEFT JOIN ( SELECT jp.wkt_shalat, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp GROUP BY jp.wkt_shalat ) p ON s.wkt_shalat = p.wkt_shalat LEFT JOIN ( SELECT su.wkt_shalat, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 GROUP BY su.wkt_shalat ) u ON s.wkt_shalat = u.wkt_shalat LEFT JOIN ( SELECT sm.wkt_shalat, COUNT(sm.wkt_shalat) AS jmlm FROM shalat_manual sm WHERE sm.disetujui = 1 GROUP BY sm.wkt_shalat ) ma ON s.wkt_shalat = ma.wkt_shalat GROUP BY s.wkt_shalat ORDER BY s.wkt_tapping") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;					
	}

	function shalatByWktDetail($wkt){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, sh.total AS fingerprint, IF(ma.jmlm IS NULL, 0, ma.jmlm) AS manual, sh.total+IF(ma.jmlm IS NULL, 0, ma.jmlm) AS total, DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1 AS jtgl, h.jmhs, (DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*h.jmhs As target1, IF(p.id_periode IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg, IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)) AS jpmhs, IF(j.jplg IS NULL, 0, j.jplg) AS jplg, (IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg) AS total_jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, (((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*h.jmhs)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))) AS target2, ROUND(((((sh.total+IF(ma.jmlm IS NULL, 0, ma.jmlm)))/(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*h.jmhs)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total FROM shalat s WHERE s.wkt_shalat = '$wkt' GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) h LEFT JOIN ( SELECT jp.id_periode, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.id_periode ) p ON sp.id_periode = p.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' ) a JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' ) i LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.wkt_shalat = '$wkt' GROUP BY jp.id_periode ) j ON sp.id_periode = j.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.wkt_shalat = '$wkt' AND su.disetujui = 1 GROUP BY su.id_periode ) u ON sp.id_periode = u.id_periode LEFT JOIN ( SELECT sp.id_periode, COUNT(sm.wkt_shalat) AS jmlm FROM shalat_manual sm LEFT JOIN shalat_periode sp ON sm.tanggal BETWEEN sp.tanggal_dari AND sp.tanggal_sampai WHERE sm.wkt_shalat = '$wkt' AND sm.disetujui = 1 GROUP BY sp.id_periode ) ma ON sp.id_periode = ma.id_periode") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;		
	}

	function shalatByWktDetailPercent($wkt){
		$ambildata = mysql_query("SELECT a.nilai AS a, b.nilai AS b, ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS 'percent' FROM ( SELECT ROUND((SUM(a.nilai)/p.jml),2) AS nilai FROM ( SELECT ROUND((((sh.total)/((d.jhari*mh.jmhs*5)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari FROM shalat_periode sp ) d ON sp.id_periode = d.id_periode LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total FROM shalat s GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) mh LEFT JOIN ( SELECT jp.id_periode, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.id_periode ) p ON sp.id_periode = p.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' ) a JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' ) i LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp GROUP BY jp.id_periode ) j ON sp.id_periode = j.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.disetujui = 1 GROUP BY su.id_periode ) u ON sp.id_periode = u.id_periode ) a JOIN ( SELECT COUNT(sp.id_periode) AS jml FROM shalat_periode sp ) p ) a JOIN ( SELECT ROUND((SUM(b.nilai)/p.jml),2) AS nilai FROM ( SELECT ROUND((((sh.total)/(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*h.jmhs)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat_periode sp LEFT JOIN ( SELECT s.id_periode, COUNT(s.wkt_tapping) AS total FROM shalat s WHERE s.wkt_shalat = '$wkt' GROUP BY s.id_periode ) sh ON sp.id_periode = sh.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) h LEFT JOIN ( SELECT jp.id_periode, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.id_periode ) p ON sp.id_periode = p.id_periode JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' ) a JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' ) i LEFT JOIN ( SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.wkt_shalat = '$wkt' GROUP BY jp.id_periode ) j ON sp.id_periode = j.id_periode LEFT JOIN ( SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.wkt_shalat = '$wkt' AND su.disetujui = 1 GROUP BY su.id_periode ) u ON sp.id_periode = u.id_periode ) b JOIN ( SELECT COUNT(sp.id_periode) AS jml FROM shalat_periode sp ) p ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function shalatWktByPeriod($idPeriod, $wkt){
		$ambildata = mysql_query("SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, h.jmhs, h.jmhs*1 AS target1, IF(p.tanggal IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg, IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)) AS jpmhs, IF(j.jplg IS NULL, 0, j.jplg) AS jplg, (IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg) AS total_jplg, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, (h.jmhs*1)-((IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2, ROUND((((COUNT(s.wkt_tapping))/((h.jmhs*1)-((IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat s JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) h LEFT JOIN ( SELECT jp.tanggal, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.tanggal ) p ON s.tanggal = p.tanggal JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' ) a JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' ) i LEFT JOIN ( SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.wkt_shalat = '$wkt' GROUP BY jp.tanggal ) j ON s.tanggal = j.tanggal LEFT JOIN ( SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.wkt_shalat = '$wkt' AND su.disetujui = 1 GROUP BY su.tanggal ) u ON s.tanggal = u.tanggal WHERE s.id_periode = $idPeriod AND s.wkt_shalat = '$wkt' GROUP BY s.tanggal") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}


	function shalatWktByPeriodPercent($idPeriod1, $idPeriod2, $wkt){
		$ambildata = mysql_query("SELECT a.nilai AS a, b.nilai AS b, ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS 'percent' FROM ( SELECT ROUND((SUM(a.nilai)/j.jhari),2) AS nilai FROM ( SELECT ROUND((((COUNT(s.wkt_tapping))/((h.jmhs*1)-((IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat s JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) h LEFT JOIN ( SELECT jp.tanggal, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.tanggal ) p ON s.tanggal = p.tanggal JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' ) a JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' ) i LEFT JOIN ( SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.wkt_shalat = '$wkt' GROUP BY jp.tanggal ) j ON s.tanggal = j.tanggal LEFT JOIN ( SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.wkt_shalat = '$wkt' AND su.disetujui = 1 GROUP BY su.tanggal ) u ON s.tanggal = u.tanggal WHERE s.id_periode = $idPeriod1 AND s.wkt_shalat = '$wkt' GROUP BY s.tanggal ) a JOIN ( SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jhari FROM shalat s WHERE s.id_periode = $idPeriod1 ) j ) a JOIN ( SELECT ROUND((SUM(b.nilai)/j.jhari),2) AS nilai FROM ( SELECT ROUND((((COUNT(s.wkt_tapping))/((h.jmhs*1)-((IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai FROM shalat s JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) h LEFT JOIN ( SELECT jp.tanggal, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.tanggal ) p ON s.tanggal = p.tanggal JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' ) a JOIN ( SELECT COUNT(m.id_mahasiswa) AS plg FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' ) i LEFT JOIN ( SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg FROM j_pulang2 jp WHERE jp.wkt_shalat = '$wkt' GROUP BY jp.tanggal ) j ON s.tanggal = j.tanggal LEFT JOIN ( SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu FROM shalat_udzur2 su WHERE su.wkt_shalat = '$wkt' AND su.disetujui = 1 GROUP BY su.tanggal ) u ON s.tanggal = u.tanggal WHERE s.id_periode = $idPeriod2 AND s.wkt_shalat = '$wkt' GROUP BY s.tanggal ) b JOIN ( SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jhari FROM shalat s WHERE s.id_periode = $idPeriod2 ) j ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
	}

	function shalatWktByDay($tgl, $wkt){
		$tgl_ = date('Y-m-d', strtotime($tgl));

		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, sh.tap FROM mahasiswa m LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping AS tap FROM shalat s WHERE s.tanggal = '$tgl_' AND s.wkt_shalat = '$wkt' ) sh ON m.id_mahasiswa = sh.id_mahasiswa") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function shalatWktByDayGraph($tgl, $wkt){
		$tgl_ = date('Y-m-d', strtotime($tgl));

		$ambildata = mysql_query(" SELECT COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.tanggal = '$tgl_' AND s.wkt_shalat = '$wkt'") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatWktByDayPercent($tgl1, $tgl2, $wkt){
		$tgl1_ = date('Y-m-d', strtotime($tgl1));
		$tgl2_ = date('Y-m-d', strtotime($tgl2));

		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((((b.jml-a.jml)/a.jml)*100),2) AS 'percent' FROM ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.tanggal = '$tgl1_' AND s.wkt_shalat = '$wkt' GROUP BY s.tanggal ) a JOIN ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.tanggal = '$tgl2_' AND s.wkt_shalat = '$wkt' GROUP BY s.tanggal ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;		
	}

	function tampilListTglByPeriod($idPeriod){
		$ambildata = mysql_query("SELECT s.tanggal FROM shalat s WHERE s.id_periode = $idPeriod GROUP BY s.tanggal") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function tampilJmlBinaan($idPembina){
		$ambildata = mysql_query("SELECT COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb WHERE mb.id_pembina = $idPembina") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function tampilTglJPulang(){
		$ambildata = mysql_query("SELECT tanggal FROM j_pulang") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

 ?>