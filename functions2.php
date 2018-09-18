<?php 

	include 'functions.php';

// ===================================================================== Mahasiswa Role SHALAT =====================================================================
	function tampilUdzurShalatRoleMhs($idMahasiswa){
		$ambildata = mysql_query("SELECT su.id_periode, su.tanggal, su.udzur, GROUP_CONCAT(su.wkt_shalat SEPARATOR ',') AS wkt, COUNT(su.wkt_shalat) AS jml, su.keterangan, su.disetujui FROM shalat_udzur2 su WHERE su.id_mahasiswa = $idMahasiswa GROUP BY su.tanggal") or die(mysql_error());
		if (mysql_num_rows($ambildata) > 0) {
			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;
		} else{
			echo "<div class='alert alert-warning alert-dismissibl' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
							Belum Ada Data Udzur Shalat
						</div>";
		}		
	}

	function talimMhs(){
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, m.j_kelamin, COUNT(b.talim) AS total, c.target, ROUND((((COUNT(b.talim))/c.target)*100),2) AS nilai FROM ( SELECT m.id_mahasiswa, m.nama, m.j_kelamin FROM mahasiswa m ) m LEFT JOIN ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) b ON m.id_mahasiswa = b.id_mahasiswa LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS target FROM j_talim jt GROUP BY jt.j_kelamin ) c ON m.j_kelamin = c.j_kelamin GROUP BY b.id_mahasiswa ORDER BY m.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function talimMhsGraph(){
		$ambildata = mysql_query("SELECT m.nama, b.j_kelamin, ROUND((((COUNT(b.talim))/c.target)*100),2) AS nilai FROM ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT s.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) b LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS target FROM j_talim jt GROUP BY jt.j_kelamin ) c ON b.j_kelamin = c.j_kelamin LEFT JOIN mahasiswa m ON b.id_mahasiswa = m.id_mahasiswa GROUP BY b.id_mahasiswa ORDER BY nilai DESC LIMIT 5") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

?>