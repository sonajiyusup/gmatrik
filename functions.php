<?php 

	mysql_connect("localhost", "root", "");
	mysql_select_db("simon");

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

		if (mysql_num_rows($row) == 0) {
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

	function tampilPembina(){
		$ambildata = mysql_query("SELECT p.*, COUNT(mb.id_mahasiswa) AS 'jml_binaan', u.* FROM pembina p LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina LEFT JOIN users u ON p.id_user = u.id_user GROUP BY p.nama ORDER BY p.nama") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar pembina kosong";
		}		
	}

	function tampilUsers(){
		$ambildata = mysql_query("SELECT * FROM users ORDER BY level") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Daftar pengguna sistem kosong";
		}		
	}	

	function tampilMahasiswa(){
		$ambildata = mysql_query("SELECT mahasiswa.*, users.* FROM users INNER JOIN mahasiswa ON mahasiswa.id_user = users.id_user ORDER BY nama") or die(mysql_error());
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
		$ambildata = mysql_query("SELECT pimpinan.*, users.* FROM users INNER JOIN pimpinan ON pimpinan.id_user = users.id_user ORDER BY nama") or die(mysql_error());
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

	function tambahPaksi($idPbentuk, $namaAksi){
		mysql_query("INSERT INTO paksi(id_pbentuk, nama_aksi) VALUES ('$idPbentuk', '$namaAksi'); ");
	}

	function tampilPaksi(){
		$ambildata = mysql_query("SELECT pa.id_paksi, pa.nama_aksi, COUNT(pm.id_paksi) AS jumlah FROM paksi pa LEFT JOIN pmain pm ON pa.id_paksi = pm.id_paksi GROUP BY pa.nama_aksi ORDER BY jumlah DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Aksi pelanggaran belum ditambahkan";
		}
	}	

	function tampilPaksiByPembina($idPembina){
		$ambildata = mysql_query("SELECT pa.id_paksi, pa.nama_aksi, COUNT(pmb.id_paksi) AS jumlah FROM paksi pa LEFT JOIN ( SELECT b.id_pembina, pa.id_paksi FROM pmain pm LEFT JOIN paksi pa ON pm.id_paksi = pa.id_paksi LEFT JOIN ( SELECT p.id_pembina, p.id_user AS uid_pembina, p.nama AS namap, mb.id_mhsbinaan FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina ) b ON pm.id_mhsbinaan = b.id_mhsbinaan WHERE b.id_pembina = $idPembina ) pmb ON pa.id_paksi = pmb.id_paksi GROUP BY pa.nama_aksi ORDER BY jumlah DESC, pa.id_paksi") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Bentuk pelanggaran belum ditambahkan";
		}
	}		

	function tampilPsanksi(){
		$ambildata = mysql_query("SELECT ps.id_psanksi, ps.nama_sanksi, ps.bobot ,COUNT(pm.id_psanksi) AS jumlah FROM psanksi ps LEFT JOIN pmain pm ON ps.id_psanksi = pm.id_psanksi GROUP BY ps.nama_sanksi ORDER BY jumlah DESC") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Sanksi belum ditambahkan";
		}
	}		

	function tampilPsanksiByPembina($idPembina){
		$ambildata = mysql_query("SELECT ps.id_psanksi, ps.nama_sanksi, ps.bobot, COUNT(pmb.id_psanksi) AS jumlah FROM psanksi ps LEFT JOIN ( SELECT b.id_pembina, ps.id_psanksi FROM pmain pm LEFT JOIN psanksi ps ON pm.id_psanksi = ps.id_psanksi LEFT JOIN ( SELECT p.id_pembina, p.id_user AS uid_pembina, p.nama AS namap, mb.id_mhsbinaan FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina ) b ON pm.id_mhsbinaan = b.id_mhsbinaan WHERE b.id_pembina = $idPembina ) pmb ON ps.id_psanksi = pmb.id_psanksi GROUP BY ps.nama_sanksi ORDER BY jumlah DESC, ps.id_psanksi") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Bentuk pelanggaran belum ditambahkan";
		}
	}	

	function tampilPlanjut(){
		$ambildata = mysql_query("SELECT pl.id_planjut, pl.level, pl.nama_tindaklanjut, ps.nama_sanksi, COUNT(pm.id_planjut) AS jumlah FROM planjut pl LEFT JOIN pmain pm ON pl.id_planjut = pm.id_planjut LEFT JOIN psanksi ps ON pl.id_psanksi = ps.id_psanksi GROUP BY pl.nama_tindaklanjut ORDER BY level") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Sanksi belum ditambahkan";
		}
	}	

	function tampilPlanjutByPembina($idPembina){
		$ambildata = mysql_query("SELECT pl.id_planjut, pl.nama_tindaklanjut, pl.level, COUNT(pmb.id_planjut) AS jumlah FROM planjut pl LEFT JOIN ( SELECT b.id_pembina, pl.id_planjut FROM pmain pm LEFT JOIN planjut pl ON pm.id_planjut = pl.id_planjut LEFT JOIN ( SELECT p.id_pembina, p.id_user AS uid_pembina, p.nama AS namap, mb.id_mhsbinaan FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina ) b ON pm.id_mhsbinaan = b.id_mhsbinaan WHERE b.id_pembina = $idPembina ) pmb ON pl.id_planjut = pmb.id_planjut GROUP BY pl.nama_tindaklanjut ORDER BY pl.level") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Bentuk pelanggaran belum ditambahkan";
		}
	}		

	function tampilPikhtisar(){
		$ambildata = mysql_query("SELECT id_pelanggaran, b.id_mahasiswa, b.namamhs, nama_bentuk, nama_aksi, nama_sanksi, nama_tindaklanjut, deskripsi, tanggal FROM pmain pm LEFT JOIN pbentuk pb ON pm.id_pbentuk = pb.id_pbentuk LEFT JOIN paksi pa ON pm.id_paksi = pa.id_paksi LEFT JOIN psanksi ps ON pm.id_psanksi = ps.id_psanksi LEFT JOIN planjut pl ON pm.id_planjut = pl.id_planjut LEFT JOIN( SELECT m.id_mahasiswa, m.nama AS namamhs, mb.id_mhsbinaan FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) b ON pm.id_mhsbinaan = b.id_mhsbinaan") or die(mysql_error());

			if (mysql_num_rows($ambildata) > 0) {
				while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
					$data[] = $ad;
					return $data;
			} else{
				echo "Data pelanggaran masih kosong";
			}
	}	

	function tampilPikhtisarByPembina($idPembina){
		$ambildata = mysql_query("SELECT id_pelanggaran, b.id_mahasiswa, b.namamhs, nama_bentuk, nama_aksi, nama_sanksi, nama_tindaklanjut, deskripsi, tanggal FROM pmain pm LEFT JOIN pbentuk pb ON pm.id_pbentuk = pb.id_pbentuk LEFT JOIN paksi pa ON pm.id_paksi = pa.id_paksi LEFT JOIN psanksi ps ON pm.id_psanksi = ps.id_psanksi LEFT JOIN planjut pl ON pm.id_planjut = pl.id_planjut LEFT JOIN ( SELECT m.id_mahasiswa, mb.id_pembina, m.nama AS namamhs, mb.id_mhsbinaan FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) b ON pm.id_mhsbinaan = b.id_mhsbinaan WHERE b.id_pembina = $idPembina") or die(mysql_error());
		
			if (mysql_num_rows($ambildata) > 0) {
				while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
					$data[] = $ad;
					return $data;
			} else{
				echo "Data pelanggaran masih kosong";
			}
	}	

	function pDetailById($kategori, $id){

		$sql = "SELECT id_pelanggaran, b.uid_pembina, b.id_pembina, b.namap, uid_mhs, b.nim, b.id_mahasiswa, b.namamhs, pb.id_pbentuk, nama_bentuk, pa.id_paksi, nama_aksi, ps.id_psanksi, nama_sanksi, pl.id_planjut, nama_tindaklanjut, deskripsi, tanggal FROM pmain pm LEFT JOIN pbentuk pb ON pm.id_pbentuk = pb.id_pbentuk LEFT JOIN paksi pa ON pm.id_paksi = pa.id_paksi LEFT JOIN psanksi ps ON pm.id_psanksi = ps.id_psanksi LEFT JOIN planjut pl ON pm.id_planjut = pl.id_planjut LEFT JOIN( SELECT p.id_pembina, p.id_user AS uid_pembina, p.nama AS namap, m.id_user AS uid_mhs, m.nim, m.id_mahasiswa, m.nama AS namamhs, mb.id_mhsbinaan FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) b ON pm.id_mhsbinaan = b.id_mhsbinaan";

		if ($kategori == 'ikhtisar') {
			$ambildata = mysql_query($sql." WHERE id_pelanggaran = $id") or die(mysql_error());
		} else
		if($kategori == 'pbentuk'){
			$ambildata = mysql_query($sql." WHERE pb.id_pbentuk = $id") or die(mysql_error());
		} else
		if($kategori == 'paksi'){
			$ambildata = mysql_query($sql." WHERE pa.id_paksi = $id") or die(mysql_error());
		} else
		if($kategori == 'psanksi'){
			$ambildata = mysql_query($sql." WHERE ps.id_psanksi = $id") or die(mysql_error());
		} else
		if($kategori == 'planjut'){
			$ambildata = mysql_query($sql." WHERE pl.id_planjut = $id") or die(mysql_error());
		}
		
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Data pelanggaran masih kosong";
		}
	}

	function pDetailByIdPembina($kategori, $id, $idPembina){

		$sql = "SELECT id_pelanggaran, b.uid_pembina, b.id_pembina, b.namap, uid_mhs, b.nim, b.id_mahasiswa, b.namamhs, pb.id_pbentuk, nama_bentuk, pa.id_paksi, nama_aksi, ps.id_psanksi, nama_sanksi, pl.id_planjut, nama_tindaklanjut, deskripsi, tanggal FROM pmain pm LEFT JOIN pbentuk pb ON pm.id_pbentuk = pb.id_pbentuk LEFT JOIN paksi pa ON pm.id_paksi = pa.id_paksi LEFT JOIN psanksi ps ON pm.id_psanksi = ps.id_psanksi LEFT JOIN planjut pl ON pm.id_planjut = pl.id_planjut LEFT JOIN( SELECT p.id_pembina, p.id_user AS uid_pembina, p.nama AS namap, m.id_user AS uid_mhs, m.nim, m.id_mahasiswa, m.nama AS namamhs, mb.id_mhsbinaan FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) b ON pm.id_mhsbinaan = b.id_mhsbinaan";

		if ($kategori == 'ikhtisar') {
			$ambildata = mysql_query($sql." WHERE id_pelanggaran = $id AND b.id_pembina = $idPembina") or die(mysql_error());
		} else
		if($kategori == 'pbentuk'){
			$ambildata = mysql_query($sql." WHERE pb.id_pbentuk = $id AND b.id_pembina = $idPembina") or die(mysql_error());
		} else
		if($kategori == 'paksi'){
			$ambildata = mysql_query($sql." WHERE pa.id_paksi = $id AND b.id_pembina = $idPembina") or die(mysql_error());
		} else
		if($kategori == 'psanksi'){
			$ambildata = mysql_query($sql." WHERE ps.id_psanksi = $id AND b.id_pembina = $idPembina") or die(mysql_error());
		} else
		if($kategori == 'planjut'){
			$ambildata = mysql_query($sql." WHERE pl.id_planjut = $id AND b.id_pembina = $idPembina") or die(mysql_error());
		}
		
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-danger alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Maaf, Kami tidak bisa memproses request anda...
						</div>";
		}
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

	function pembinaDetails($idUser){
		$ambildata = mysql_query("SELECT p.*, u.*, COUNT(mb.id_mahasiswa) AS 'jml_binaan' FROM pembina p LEFT JOIN users u ON p.id_user = u.id_user LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina WHERE u.id_user = $idUser GROUP BY p.nama");
			$ad = mysql_fetch_assoc($ambildata);
				$data[] = $ad;
				return $data;
	}

	function mahasiswaDetails($idUser){
		$ambildata = mysql_query("SELECT m.*, u.*, p.id_pembina, p.nama AS nama_pembina, p.gelar, p.id_user AS uid_pembina , p.j_kelamin AS jk_pembina, p.avatar AS ava_pembina FROM mahasiswa m LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN users u ON m.id_user = u.id_user WHERE m.id_user = $idUser");
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

	function hapusMahasiswa($idMahasiswa, $idUser){
		mysql_query("DELETE FROM mahasiswa WHERE id_mahasiswa = $idMahasiswa");
		mysql_query("DELETE FROM users WHERE id_user = $idUser");
	}	

	function hapusMhsBinaan($idMahasiswa){
		mysql_query("DELETE FROM m_binaan WHERE id_mahasiswa = $idMahasiswa");
		mysql_query("UPDATE mahasiswa SET j_kelamin = NULL WHERE id_mahasiswa = $idMahasiswa");
	}

	function editPembina($idUser, $nama, $j_kelamin, $tgl_lahir, $gelar, $asalkota, $email, $telp){
		mysql_query("UPDATE pembina SET nama = '$nama', j_kelamin = '$j_kelamin', tgl_lahir = '$tgl_lahir', gelar = '$gelar', asalkota = '$asalkota', email = '$email', telp = '$telp' WHERE id_user = $idUser ");
	}

	function editMahasiswa($idUser, $nama, $j_kelamin, $tgl_lahir, $asalkota, $email, $telp){
		mysql_query("UPDATE mahasiswa SET nama = '$nama', j_kelamin = '$j_kelamin', tgl_lahir = '$tgl_lahir', asalkota = '$asalkota', email = '$email', telp = '$telp' WHERE id_user = $idUser ");
	}	

	function totalPembina(){
		$ambildata = mysql_query("SELECT COUNT(id_pembina) as Total from pembina");
		$data = mysql_fetch_assoc($ambildata);
		return $data;
	}

	function totalMahasiswa(){
		$ambildata = mysql_query("SELECT COUNT(id_mahasiswa) as Total from mahasiswa");
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
		$ambildata = mysql_query("SELECT COUNT(mb.id_mahasiswa) AS 'jml_binaan' FROM pembina p LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina WHERE p.id_pembina = $idPembina");
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
		
		$sql = "SELECT USERID,Badgenumber,Name FROM USERINFO WHERE Badgenumber LIKE '$angkatan%' AND Name NOT LIKE '$angkatan%'";
		$result = odbc_exec($koneksi_mdb, $sql);

		while($row_mdb = odbc_fetch_array($result)){

			/*$namaTanpaSpasi = str_replace(' ', '', $row_mdb['Name']);
			$pass = $namaTanpaSpasi.(substr($row_mdb['Badgenumber'], -5));*/
			$randpass = substr(str_shuffle(str_repeat("0123456789aAbBcCdDeEfFgGhHiIjJ0123456789kKlLmMnNoOpPqQrRsStT0123456789uUvVwWxXyYzZ", 10)), 0, 10);
			$_randpass = mysql_real_escape_string($randpass);

			//if(strpos($row_mdb['Name'], $row_mdb['Badgenumber']) === FALSE){
				$mysql_insert_usr = "INSERT INTO users(username, password, password_default, level) VALUES ('".$row_mdb['Badgenumber']."', '$_randpass', '1', '4')";
				mysql_query($mysql_insert_usr);

				$sql = mysql_query("SELECT id_user FROM users WHERE username='".$row_mdb['Badgenumber']."'") or die(mysql_error());
				$row = mysql_fetch_assoc($sql);
				$id_user = $row['id_user'];

				$name = mysql_real_escape_string($row_mdb['Name']);

				$mysql_insert_mhs = "INSERT INTO mahasiswa (id_mahasiswa, nim, nama, id_user) VALUES ('".$row_mdb['USERID']."', '".$row_mdb['Badgenumber']."', '".$name."', '$id_user')";
				mysql_query($mysql_insert_mhs);
				//echo $row_mdb['Name']." Berhasil diinput <br>";
			//}
		}
	}

	function importShalat($angkatan, $from, $to, $jmlWktShalat){

		// Periode shalat table
		mysql_query("INSERT INTO shalat_periode (tanggal_dari, tanggal_sampai, jml_wkt_shalat) VALUES ('$from','$to', '$jmlWktShalat')");


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
	function shalatNilaiIkhtisar(){
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_shalat) AS 'total', ikhwan.nilai AS 'nilai_ikhwan', akhwat.nilai AS 'nilai_akhwat' FROM shalat_periode sp LEFT JOIN ( SELECT sp.id_periode, ROUND((COUNT(s.wkt_shalat)/179)/sp.jws_ikhwan*100) AS 'nilai' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = 'Ikhwan' GROUP BY sp.id_periode ORDER BY sp.id_periode ) AS ikhwan ON sp.id_periode = ikhwan.id_periode LEFT JOIN ( SELECT sp.id_periode, ROUND((COUNT(s.wkt_shalat)/193)/sp.jws_akhwat*100) AS 'nilai' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE m.j_kelamin = 'Akhwat' GROUP BY sp.id_periode ORDER BY sp.id_periode ) AS akhwat ON sp.id_periode = akhwat.id_periode LEFT JOIN shalat s ON sp.id_periode = s.id_periode GROUP BY sp.id_periode ORDER BY sp.id_periode") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "Data Nilai Shalat kosong";
		}	
	}		

	function tampilPeriodeShalat(){
		$ambildata = mysql_query("SELECT id_periode, tanggal_dari, tanggal_sampai FROM `shalat_periode`") or die(mysql_error());
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
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_shalat) AS total, IF(p.id_periode IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg, ROUND((((sp.jws_ikhwan+sp.jws_akhwat)/2)),2) AS target, ROUND(COUNT(s.wkt_shalat)/j.jmhs) AS jmlrt, ROUND(((COUNT(s.wkt_shalat)/j.jmhs)/((sp.jws_ikhwan+sp.jws_akhwat)/2)*100),2) AS nilai FROM shalat_periode sp JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) j LEFT JOIN ( SELECT jp.id_periode, jp.j_kelamin FROM j_pulang2 jp GROUP BY jp.id_periode ) p ON sp.id_periode = p.id_periode LEFT JOIN shalat s ON sp.id_periode = s.id_periode GROUP BY sp.id_periode ORDER BY sp.id_periode") or die(mysql_error());
		
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

	function percenIkhtisarByDay($tgl1, $tgl2){
		$tgl1_ = date('Y-m-d', strtotime($tgl1));
		$tgl2_ = date('Y-m-d', strtotime($tgl2));

		$ambildata = mysql_query("SELECT a.jml AS a, b.jml AS b, ROUND((((b.jml-a.jml)/a.jml)*100),2) AS percent FROM ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.tanggal = '$tgl1_' GROUP BY s.tanggal ) a JOIN ( SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml FROM shalat s WHERE s.tanggal = '$tgl2_' GROUP BY s.tanggal ) b") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}

	function shalatByPembina($column){
		if ($column == 'chart') {
			$ambildata = mysql_query("SELECT ROUND(((COUNT(s.jws)/(j.jmlb*(r.jmltgl-pu.jplg)*5))*100),2) AS nilai FROM pembina p LEFT JOIN ( SELECT mb.id_pembina, sl.wkt_tapping AS jws FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa ) s ON p.id_pembina = s.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY p.id_pembina ) j ON p.id_pembina = j.id_pembina LEFT JOIN ( SELECT p.id_pembina, DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jmltgl FROM pembina p LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa GROUP BY p.id_pembina ) r ON p.id_pembina = r.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(jp.tanggal) AS jplg FROM pembina p LEFT JOIN j_pulang jp ON p.j_kelamin = jp.j_kelamin GROUP BY p.id_pembina ) pu ON p.id_pembina = pu.id_pembina GROUP BY p.nama") or die(mysql_error());
			
				while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
					$data[] = $ad;
					return $data;				
		} else
		if ($column == 'table') {
			$ambildata = mysql_query("SELECT p.id_pembina, p.nama AS 'pembina', p.j_kelamin, COUNT(s.jws) AS 'total', j.jmlb, r.jmltgl, pu.jplg, r.jmltgl-pu.jplg AS jhari, (j.jmlb*(r.jmltgl-pu.jplg)*5) AS target, ROUND(((COUNT(s.jws)/(j.jmlb*(r.jmltgl-pu.jplg)*5))*100),2) AS nilai FROM pembina p LEFT JOIN ( SELECT mb.id_pembina, sl.wkt_tapping AS jws FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa ) s ON p.id_pembina = s.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY p.id_pembina ) j ON p.id_pembina = j.id_pembina LEFT JOIN ( SELECT p.id_pembina, DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jmltgl FROM pembina p LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa GROUP BY p.id_pembina ) r ON p.id_pembina = r.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(jp.tanggal) AS jplg FROM pembina p LEFT JOIN j_pulang jp ON p.j_kelamin = jp.j_kelamin GROUP BY p.id_pembina ) pu ON p.id_pembina = pu.id_pembina GROUP BY p.nama") or die(mysql_error());
			
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
		$ambildata = mysql_query("SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_shalat) AS 'total', (CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END) AS target, ROUND((COUNT(s.wkt_shalat)/j.jmlb),2) AS 'jmlrt', j.jmlb, ROUND((((COUNT(s.wkt_shalat)/(CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END))/j.jmlb)*100),2) AS nilai FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN( SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) t ON s.id_mahasiswa = t.id_mahasiswa LEFT JOIN( SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE mb.id_pembina = $idPembina GROUP BY p.nama	) j ON t.id_pembina = j.id_pembina WHERE t.id_pembina = $idPembina GROUP BY sp.id_periode ORDER BY sp.id_periode") or die(mysql_error());
		
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;	
	}

	function shalatByPembinaByPeriod($idPembina, $idPeriod){
		$ambildata = mysql_query("SELECT sp.id_periode, s.tanggal, COUNT(s.wkt_shalat) AS 'total', (j.jmlb*5) AS 'target', j.jmlb, ROUND(((COUNT(s.wkt_shalat)/(j.jmlb*5))*100),2) AS 'nilai_harian' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN( SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) t ON s.id_mahasiswa = t.id_mahasiswa LEFT JOIN( SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE mb.id_pembina = $idPembina GROUP BY p.nama ) j ON t.id_pembina = j.id_pembina WHERE (t.id_pembina = $idPembina) AND (sp.id_periode = $idPeriod) GROUP BY s.tanggal") or die(mysql_error());
		
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