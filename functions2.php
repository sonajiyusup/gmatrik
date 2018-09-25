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
		$ambildata = mysql_query("SELECT m.id_mahasiswa, m.nama, m.j_kelamin, COUNT(b.talim) AS total, c.target, IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu, c.target-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2, ROUND((((COUNT(b.talim))/(c.target-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai FROM ( SELECT m.id_mahasiswa, m.nama, m.j_kelamin FROM mahasiswa m ) m LEFT JOIN ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) b ON m.id_mahasiswa = b.id_mahasiswa LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS target FROM j_talim jt GROUP BY jt.j_kelamin ) c ON m.j_kelamin = c.j_kelamin LEFT JOIN ( SELECT tu.id_mahasiswa, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu GROUP BY tu.id_mahasiswa ) u ON m.id_mahasiswa = u.id_mahasiswa GROUP BY b.id_mahasiswa ORDER BY m.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function talimMhsGraph(){
		$ambildata = mysql_query("SELECT m.nama, m.j_kelamin, ROUND((((COUNT(b.talim))/(c.target-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai FROM ( SELECT m.id_mahasiswa, m.nama, m.j_kelamin FROM mahasiswa m ) m LEFT JOIN ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) b ON m.id_mahasiswa = b.id_mahasiswa LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS target FROM j_talim jt GROUP BY jt.j_kelamin ) c ON m.j_kelamin = c.j_kelamin LEFT JOIN ( SELECT tu.id_mahasiswa, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu GROUP BY tu.id_mahasiswa ) u ON m.id_mahasiswa = u.id_mahasiswa GROUP BY b.id_mahasiswa ORDER BY nilai DESC LIMIT 5") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}	

	function talimIA(){
		$ambildata = mysql_query("SELECT m.j_kelamin, COUNT(b.talim) AS total, (CASE WHEN m.j_kelamin = 'Akhwat' THEN a.jml ELSE i.jml END) AS jmhs, (CASE WHEN m.j_kelamin = 'Akhwat' THEN a.jml ELSE i.jml END)*c.target AS target, u.jmlu, ((CASE WHEN m.j_kelamin = 'Akhwat' THEN a.jml ELSE i.jml END)*c.target)-(u.jmlu) AS target2, ROUND((((COUNT(b.talim))/(((CASE WHEN m.j_kelamin = 'Akhwat' THEN a.jml ELSE i.jml END)*c.target)-(u.jmlu)))*100),2) AS nilai FROM ( SELECT m.id_mahasiswa, m.nama, m.j_kelamin FROM mahasiswa m ) m LEFT JOIN ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) b ON m.id_mahasiswa = b.id_mahasiswa LEFT JOIN ( SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jml FROM mahasiswa m WHERE m.j_kelamin = 'Ikhwan' GROUP BY m.j_kelamin ) i ON m.j_kelamin = i.j_kelamin LEFT JOIN ( SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jml FROM mahasiswa m WHERE m.j_kelamin = 'Akhwat' GROUP BY m.j_kelamin ) a ON m.j_kelamin = a.j_kelamin LEFT JOIN ( SELECT m.j_kelamin, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu LEFT JOIN mahasiswa m ON tu.id_mahasiswa = m.id_mahasiswa GROUP BY m.j_kelamin ) u ON m.j_kelamin = u.j_kelamin LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS target FROM j_talim jt GROUP BY jt.j_kelamin ) c ON m.j_kelamin = c.j_kelamin GROUP BY m.j_kelamin ORDER BY m.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}		

	function talimPembina(){
		$ambildata = mysql_query("SELECT p.id_pembina, p.nama, p.j_kelamin, o.total, b.jmlb, j.jmlt, (b.jmlb*j.jmlt) AS target1, uz.jmlu, (b.jmlb*j.jmlt)-uz.jmlu AS target2, ROUND(((o.total/((b.jmlb*j.jmlt)-uz.jmlu))*100),2) AS nilai FROM pembina p LEFT JOIN ( SELECT mb.id_pembina, COUNT(c.wkt_tapping) AS total FROM m_binaan mb LEFT JOIN ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM mahasiswa m LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) c ON mb.id_mahasiswa = c.id_mahasiswa GROUP BY mb.id_pembina ) o ON p.id_pembina = o.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY p.id_pembina ) b ON p.id_pembina = b.id_pembina LEFT JOIN ( SELECT jt.j_kelamin, COUNT(jt.talim) AS jmlt FROM j_talim jt GROUP BY jt.j_kelamin ) j ON p.j_kelamin = j.j_kelamin LEFT JOIN ( SELECT mb.id_pembina, COUNT(u.jmlu) AS jmlu FROM m_binaan mb LEFT JOIN ( SELECT tu.id_mahasiswa, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu WHERE tu.disetujui = 1 GROUP BY tu.id_mahasiswa ) u ON mb.id_mahasiswa = u.id_mahasiswa GROUP BY mb.id_pembina ) uz ON p.id_pembina = uz.id_pembina GROUP BY p.id_pembina ORDER BY p.nama") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}		

	function talimJtalim(){
		$ambildata = mysql_query("SELECT v.talim, COUNT(v.wkt_tapping) AS total, j.jmlt, m.jmhs, (j.jmlt*m.jmhs) AS target1, IF(uz.jmlu IS NULL, 0, uz.jmlu) AS jmlu, (j.jmlt*m.jmhs) - IF(uz.jmlu IS NULL, 0, uz.jmlu) AS target2, ROUND((((COUNT(v.wkt_tapping))/((j.jmlt*m.jmhs) - IF(uz.jmlu IS NULL, 0, uz.jmlu)))*100),2) AS nilai FROM ( ( SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim FROM ( SELECT s.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim FROM shalat s LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) ) a INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim ORDER BY a.id_mahasiswa, a.tanggal ) UNION ALL ( SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim FROM talim t LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa ) ) v LEFT JOIN ( SELECT d.talim, COUNT(d.talim) AS jmlt FROM ( SELECT jt.tanggal, jt.talim, IF(jt.talim <> 'skb', jt.j_kelamin, (GROUP_CONCAT(jt.j_kelamin SEPARATOR ' '))) AS j_kelamin FROM j_talim jt GROUP BY jt.tanggal ) d GROUP BY d.talim ) j ON v.talim = j.talim JOIN ( SELECT COUNT(m.id_mahasiswa) AS jmhs FROM mahasiswa m ) m LEFT JOIN ( SELECT tu.talim, COUNT(tu.udzur) AS jmlu FROM talim_udzur tu WHERE tu.disetujui = 1 GROUP BY tu.talim ) uz ON v.talim = uz.talim GROUP BY v.talim") or die(mysql_error());

			while ($ad = mysql_fetch_assoc($ambildata)) // Perulangan while ini JANGAN pake {}
				$data[] = $ad;
				return $data;			
	}			

?>