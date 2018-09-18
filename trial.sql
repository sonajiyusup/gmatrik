SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_shalat) AS 'total', 
ROUND(((sp.jws_ikhwan+sp.jws_ikhwan)/2)) AS 'target', 
ROUND(COUNT(s.wkt_shalat)/372) AS 'jmlrt', 
ROUND((COUNT(s.wkt_shalat)/372)/((sp.jws_ikhwan+sp.jws_ikhwan)/2)*100) AS 'nilai' 
FROM shalat_periode sp 
LEFT JOIN shalat s 
ON sp.id_periode = s.id_periode 
GROUP BY sp.id_periode 
ORDER BY sp.id_periode


SELECT p.id_pembina, p.nama AS 'pembina', s.id_mahasiswa, s.nama AS 'Mhs Binaan', s.id_mhsbinaan, s.jws
FROM pembina p
LEFT JOIN (
    SELECT mb.id_mhsbinaan, mb.id_pembina, mb.id_mahasiswa, m.nama, COUNT(sl.wkt_tapping) AS jws
    FROM m_binaan mb
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
    LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa
    GROUP BY m.nama
) s ON p.id_pembina = s.id_pembina



SELECT p.id_pembina, p.nama AS 'pembina', SUM(s.jws) As 'total', ROUND(SUM(s.jws)/COUNT(s.id_mahasiswa),2) AS 'Rata2', rt.rikhwan, rt.rakhwat
FROM pembina p
LEFT JOIN (
    SELECT sl.id_periode, mb.id_mhsbinaan, mb.id_pembina, mb.id_mahasiswa, m.nama, COUNT(sl.wkt_tapping) AS jws
    FROM m_binaan mb
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
    LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa
    GROUP BY m.nama
) s ON p.id_pembina = s.id_pembina
LEFT JOIN (
	SELECT sp.id_periode, ROUND(SUM(sp.jws_ikhwan)/COUNT(sp.jws_ikhwan),2) AS rikhwan ,ROUND(SUM(sp.jws_akhwat)/COUNT(sp.jws_akhwat),2) AS rakhwat FROM shalat_periode sp
) rt ON s.id_periode = rt.id_periode
GROUP BY p.nama



SELECT p.id_pembina, p.nama AS 'pembina', SUM(s.jws) As 'total', ROUND(SUM(s.jws)/COUNT(s.id_mahasiswa),2) AS 'Rata2', 
(CASE WHEN p.j_kelamin = 'Ikhwan' THEN rt.rikhwan ELSE rt.rakhwat END) AS pembagi,
ROUND((((SUM(s.jws)/COUNT(s.id_mahasiswa)/7)/(CASE WHEN p.j_kelamin = 'Ikhwan' THEN rt.rikhwan ELSE rt.rakhwat END))*100),2) AS Nilai

FROM pembina p
LEFT JOIN (
    SELECT sl.id_periode, mb.id_mhsbinaan, mb.id_pembina, mb.id_mahasiswa, m.nama, COUNT(sl.wkt_tapping) AS jws
    FROM m_binaan mb
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
    LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa
    GROUP BY m.nama
) s ON p.id_pembina = s.id_pembina
LEFT JOIN (
	SELECT sp.id_periode, ROUND(SUM(sp.jws_ikhwan)/COUNT(sp.jws_ikhwan),2) AS rikhwan ,ROUND(SUM(sp.jws_akhwat)/COUNT(sp.jws_akhwat),2) AS rakhwat FROM shalat_periode sp
) rt ON s.id_periode = rt.id_periode
GROUP BY p.nama



SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_shalat) AS 'total', j.jmlb
FROM shalat_periode sp 
LEFT JOIN shalat s ON sp.id_periode = s.id_periode 
LEFT JOIN(
    SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina
    FROM m_binaan mb
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
) t ON s.id_mahasiswa = t.id_mahasiswa
LEFT JOIN(
	SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb
	FROM m_binaan mb
	LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
	LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
	WHERE mb.id_pembina = 30
	GROUP BY p.nama	
) j ON t.id_pembina = j.id_pembina
WHERE t.id_pembina = 30
GROUP BY sp.id_periode 
ORDER BY sp.id_periode



SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_shalat) AS 'total', 
(CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END) AS target,  COUNT(s.wkt_shalat)/j.jmlb AS 'jmlrt', j.jmlb,
ROUND((((COUNT(s.wkt_shalat)/(CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END))/j.jmlb)*100),2) AS nilai
FROM shalat_periode sp 
LEFT JOIN shalat s ON sp.id_periode = s.id_periode 
LEFT JOIN(
    SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin
    FROM m_binaan mb
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
) t ON s.id_mahasiswa = t.id_mahasiswa
LEFT JOIN(
	SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb
	FROM m_binaan mb
	LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
	LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
	WHERE mb.id_pembina = 20
	GROUP BY p.nama	
) j ON t.id_pembina = j.id_pembina
WHERE t.id_pembina = 20
GROUP BY sp.id_periode 
ORDER BY sp.id_periode



SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_shalat) AS 'total', (CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END) AS target, COUNT(s.wkt_shalat)/j.jmlb AS 'jmlrt', j.jmlb, ROUND((((COUNT(s.wkt_shalat)/(CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END))/j.jmlb)*100),2) AS nilai FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN( SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) t ON s.id_mahasiswa = t.id_mahasiswa LEFT JOIN( SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE mb.id_pembina = 20 GROUP BY p.nama	) j ON t.id_pembina = j.id_pembina WHERE t.id_pembina = 20 GROUP BY sp.id_periode ORDER BY sp.id_periode


-- Shalat Detail By Period
SELECT sp.id_periode, s.tanggal, COUNT(s.wkt_shalat) AS 'total', ROUND(((sp.jws_ikhwan+sp.jws_akhwat)/2),2) AS 'jws', ROUND((((sp.jws_ikhwan+sp.jws_akhwat)/2)/7),2) AS 'target_harian', (DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1 AS 'jml_hari', ROUND((((COUNT(s.wkt_shalat)/372)/ROUND((((sp.jws_ikhwan+sp.jws_akhwat)/2)/((DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1)),2))*100),2) AS 'nilai_harian' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode WHERE sp.id_periode = $idPeriod GROUP BY s.tanggal


-- Shalat By Pembina Detail By Period
SELECT sp.id_periode, s.tanggal, 
COUNT(s.wkt_shalat) AS 'total', 
(CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END) AS target, 
ROUND(((CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END)/7),2) AS target_harian, 
ROUND((COUNT(s.wkt_shalat)/j.jmlb),2) AS jws,
(DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1 AS 'jml_hari', 
j.jmlb,
ROUND((((COUNT(s.wkt_shalat)/j.jmlb)/ROUND(((CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END)/((DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1)),2))*100),2) AS 'nilai_harian' 
FROM shalat_periode sp 
LEFT JOIN shalat s ON sp.id_periode = s.id_periode 
LEFT JOIN(
    SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin
    FROM m_binaan mb
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
) t ON s.id_mahasiswa = t.id_mahasiswa
LEFT JOIN(
	SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb
	FROM m_binaan mb
	LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
	LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
	WHERE mb.id_pembina = 22
	GROUP BY p.nama	
) j ON t.id_pembina = j.id_pembina
WHERE (t.id_pembina = 22) AND (sp.id_periode = 2)
GROUP BY s.tanggal

-- Shalat By Pembina Detail By Period Modified Calculation
SELECT sp.id_periode, s.tanggal, 
COUNT(s.wkt_shalat) AS 'total', 
(j.jmlb*5) AS 'target', 
(DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1 AS 'jml_hari', 
j.jmlb,
ROUND(((COUNT(s.wkt_shalat)/(j.jmlb*5))*100),2) AS 'nilai_harian' 
FROM shalat_periode sp 
LEFT JOIN shalat s ON sp.id_periode = s.id_periode 
LEFT JOIN(
    SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin
    FROM m_binaan mb
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
) t ON s.id_mahasiswa = t.id_mahasiswa
LEFT JOIN(
	SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb
	FROM m_binaan mb
	LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
	LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
	WHERE mb.id_pembina = 22
	GROUP BY p.nama	
) j ON t.id_pembina = j.id_pembina
WHERE (t.id_pembina = 22) AND (sp.id_periode = 2)
GROUP BY s.tanggal


SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, (DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)) AS 'jml_hari'
FROM shalat_periode sp 
WHERE sp.id_periode = 2


-- Shalat By Pembina Detail By Period
SELECT sp.id_periode, s.tanggal, COUNT(s.wkt_shalat) AS 'total', (CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END) AS target, ROUND(((CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END)/7),2) AS target_harian, ROUND((COUNT(s.wkt_shalat)/j.jmlb),2) AS jws, (DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1 AS 'jml_hari', j.jmlb, ROUND((((COUNT(s.wkt_shalat)/j.jmlb)/ROUND(((CASE WHEN t.j_kelamin = 'Ikhwan' THEN sp.jws_ikhwan ELSE sp.jws_akhwat END)/((DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1)),2))*100),2) AS 'nilai_harian' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode LEFT JOIN( SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa ) t ON s.id_mahasiswa = t.id_mahasiswa LEFT JOIN( SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina WHERE mb.id_pembina = 22 GROUP BY p.nama ) j ON t.id_pembina = j.id_pembina WHERE (t.id_pembina = 22) AND (sp.id_periode = 2) GROUP BY s.tanggal ORDER BY s.tanggal


-- submodul shalatbpembinadetail by period by day
SELECT mb.id_mhsbinaan, mb.id_mahasiswa, m.nama, su.wkt_tapping AS Shubuh, zu.wkt_tapping AS Dzuhur, ar.wkt_tapping AS Ashar, mg.wkt_tapping AS Maghrib, iy.wkt_tapping AS Isya
FROM m_binaan mb
LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '2018-03-30'
) su ON m.id_mahasiswa = su.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-30'
) zu ON m.id_mahasiswa = zu.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '2018-03-30'
) ar ON m.id_mahasiswa = ar.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '2018-03-30'
) mg ON m.id_mahasiswa = mg.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'isya' AND s.tanggal = '2018-03-30'
) iy ON m.id_mahasiswa = iy.id_mahasiswa
WHERE mb.id_pembina = 20


-- submodul shalatbpembinadetail by period by day
SELECT mb.id_mhsbinaan, mb.id_mahasiswa, m.nama, su.wkt_tapping AS Shubuh, zu.wkt_tapping AS Dzuhur, ar.wkt_tapping AS Ashar, mg.wkt_tapping AS Maghrib, iy.wkt_tapping AS Isya FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '2018-03-30' ) su ON m.id_mahasiswa = su.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-30' ) zu ON m.id_mahasiswa = zu.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '2018-03-30' ) ar ON m.id_mahasiswa = ar.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '2018-03-30') mg ON m.id_mahasiswa = mg.id_mahasiswa LEFT JOIN ( SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat FROM shalat s WHERE s.wkt_shalat = 'isya' AND s.tanggal = '2018-03-30' ) iy ON m.id_mahasiswa = iy.id_mahasiswa WHERE mb.id_pembina = 20


-- not posted / drafted
SELECT mb.id_pembina, COUNT(su.wkt_tapping) AS 'jml_shubuh', ROUND(((COUNT(su.wkt_tapping)/COUNT(mb.id_mahasiswa))),2)*100 AS 'nilai_shubuh', 
COUNT(zu.wkt_tapping) AS 'jml_dzuhur', ROUND(((COUNT(zu.wkt_tapping)/COUNT(mb.id_mahasiswa))),2)*100 AS 'nilai_dzuhur',
COUNT(ar.wkt_tapping) AS 'jml_ashar', ROUND(((COUNT(ar.wkt_tapping)/COUNT(mb.id_mahasiswa))),2)*100 AS 'nilai_ashar',
COUNT(mg.wkt_tapping) AS 'jml_maghrib', ROUND(((COUNT(mg.wkt_tapping)/COUNT(mb.id_mahasiswa))),2)*100 AS 'nilai_maghrib',
COUNT(iy.wkt_tapping) AS 'jml_isya', ROUND(((COUNT(iy.wkt_tapping)/COUNT(mb.id_mahasiswa))),2)*100 AS 'nilai_isya'
FROM m_binaan mb
LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '2018-03-30'
) su ON m.id_mahasiswa = su.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-30'
) zu ON m.id_mahasiswa = zu.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '2018-03-30'
) ar ON m.id_mahasiswa = ar.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '2018-03-30'
) mg ON m.id_mahasiswa = mg.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'isya' AND s.tanggal = '2018-03-30'
) iy ON m.id_mahasiswa = iy.id_mahasiswa
WHERE mb.id_pembina = 20
GROUP BY mb.id_pembina


-- shalat ikhtisar
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_shalat) AS 'total', ROUND(((sp.jws_ikhwan+sp.jws_ikhwan)/2)) AS 'target', ROUND(COUNT(s.wkt_shalat)/372) AS 'jmlrt', ROUND((COUNT(s.wkt_shalat)/372)/((sp.jws_ikhwan+sp.jws_ikhwan)/2)*100) AS 'nilai' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode GROUP BY sp.id_periode ORDER BY sp.id_periode


SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, 
COUNT(s.wkt_shalat) AS 'total', 
ROUND((((sp.jws_ikhwan+sp.jws_akhwat)/2)),2) AS 'jws', 
ROUND(COUNT(s.wkt_shalat)/372) AS 'jmlrt_mhs', 
ROUND(((COUNT(s.wkt_shalat)/372)/((sp.jws_ikhwan+sp.jws_akhwat)/2)*100),2) AS 'nilai' 
FROM shalat_periode sp 
LEFT JOIN shalat s 
ON sp.id_periode = s.id_periode 
GROUP BY sp.id_periode 
ORDER BY sp.id_periode


-- shalat periode
SELECT sp.id_periode, s.tanggal, COUNT(s.wkt_shalat) AS 'total', ROUND(((sp.jws_ikhwan+sp.jws_akhwat)/2),2) AS 'jws', ROUND((((sp.jws_ikhwan+sp.jws_akhwat)/2)/7),2) AS 'target_harian', (DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1 AS 'jml_hari', ROUND((((COUNT(s.wkt_shalat)/372)/ROUND((((sp.jws_ikhwan+sp.jws_akhwat)/2)/((DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1)),2))*100),2) AS 'nilai_harian' FROM shalat_periode sp LEFT JOIN shalat s ON sp.id_periode = s.id_periode WHERE sp.id_periode = $idPeriod GROUP BY s.tanggal ORDER BY s.tanggal


SELECT sp.id_periode, s.tanggal,
(372*5) AS 'target_harian',  
((DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1) AS 'jml_hari',
COUNT(s.wkt_shalat) AS total,
 COUNT(s.wkt_shalat)/(CASE WHEN jp.j_kelamin = 'akhwat' THEN 372/2 ELSE 372 END) AS 'total_rata',
ROUND((((sp.jws_ikhwan+sp.jws_akhwat)/2)),2) AS 'jws', 
IF(jp.p_jws IS NULL, 0, jp.p_jws) AS 'dispensasi',
jp.j_kelamin,
ROUND((((sp.jws_ikhwan+sp.jws_akhwat)/2)),2)-(IF(jp.p_jws IS NULL, 0, jp.p_jws)) AS total_jws,
ROUND(((((COUNT(s.wkt_shalat)/(CASE WHEN jp.j_kelamin = 'akhwat' THEN 372/2 ELSE 372 END))*((DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1))/(((sp.jws_ikhwan+sp.jws_akhwat)/2)-(IF(jp.p_jws IS NULL, 0, jp.p_jws))))*100),2) AS 'nilai_harian'
FROM shalat_periode sp 
LEFT JOIN shalat s ON sp.id_periode = s.id_periode
LEFT JOIN j_pulang jp ON s.tanggal = jp.tanggal
WHERE sp.id_periode = 9
GROUP BY s.tanggal 
ORDER BY s.tanggal

ROUND(((((COUNT(s.wkt_shalat)/372)*((DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari))+1))/(((sp.jws_ikhwan+sp.jws_akhwat)/2)-(IF(jp.p_jws IS NULL, 0, jp.p_jws))))*100),2)

(CASE WHEN jp.j_kelamin = 'akhwat' THEN 193 ELSE 372 END) AS target, 
(CASE WHEN jp.j_kelamin = 'akhwat' THEN 193 ELSE jp.j_kelamin = 'ikhwan' THEN 179 ELSE 372 END) AS target, 


-- shalatByPembina()
SELECT p.id_pembina, p.nama AS 'pembina', p.j_kelamin, SUM(s.jws) As 'total', ROUND(SUM(s.jws)/COUNT(s.id_mahasiswa),2) AS 'Rata2', (CASE WHEN p.j_kelamin = 'Ikhwan' THEN rt.rikhwan ELSE rt.rakhwat END) AS pembagi, ROUND((((SUM(s.jws)/COUNT(s.id_mahasiswa)/7)/(CASE WHEN p.j_kelamin = 'Ikhwan' THEN rt.rikhwan ELSE rt.rakhwat END))*100),2) AS Nilai FROM pembina p LEFT JOIN ( SELECT sl.id_periode, mb.id_mhsbinaan, mb.id_pembina, mb.id_mahasiswa, m.nama, COUNT(sl.wkt_tapping) AS jws FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa GROUP BY m.nama ) s ON p.id_pembina = s.id_pembina LEFT JOIN ( SELECT sp.id_periode, ROUND(SUM(sp.jws_ikhwan)/COUNT(sp.jws_ikhwan),2) AS rikhwan ,ROUND(SUM(sp.jws_akhwat)/COUNT(sp.jws_akhwat),2) AS rakhwat FROM shalat_periode sp ) rt ON s.id_periode = rt.id_periode GROUP BY p.nama


SELECT p.id_pembina, 
p.nama AS 'pembina', 
p.j_kelamin, 
SUM(s.jws) As 'total', 
ROUND(SUM(s.jws)/COUNT(s.id_mahasiswa),2) AS 'Rata2', 
(CASE WHEN p.j_kelamin = 'Ikhwan' THEN rt.rikhwan ELSE rt.rakhwat END) AS pembagi, 
ROUND((((SUM(s.jws)/COUNT(s.id_mahasiswa)/7)/(CASE WHEN p.j_kelamin = 'Ikhwan' THEN rt.rikhwan ELSE rt.rakhwat END))*100),2) AS Nilai 
FROM pembina p 
LEFT JOIN ( 
	SELECT sl.id_periode, mb.id_mhsbinaan, mb.id_pembina, mb.id_mahasiswa, m.nama, COUNT(sl.wkt_tapping) AS jws 
	FROM m_binaan mb 
	LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
	LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa 
	GROUP BY m.nama 
) s ON p.id_pembina = s.id_pembina 
LEFT JOIN ( 
	SELECT sp.id_periode, ROUND(SUM(sp.jws_ikhwan)/COUNT(sp.jws_ikhwan),2) AS rikhwan ,ROUND(SUM(sp.jws_akhwat)/COUNT(sp.jws_akhwat),2) AS rakhwat 
	FROM shalat_periode sp 
) rt ON s.id_periode = rt.id_periode GROUP BY p.nama



SELECT p.id_pembina, 
p.nama AS 'pembina', 
p.j_kelamin, 
SUM(s.jws) As 'total', 
j.jmlb
FROM pembina p 
LEFT JOIN ( 
	SELECT sl.id_periode, mb.id_mhsbinaan, mb.id_pembina, mb.id_mahasiswa, m.nama, COUNT(sl.wkt_tapping) AS jws
	FROM m_binaan mb 
	LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
	LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa 
	GROUP BY m.nama 
) s ON p.id_pembina = s.id_pembina 
LEFT JOIN (
	SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb
	FROM m_binaan mb
	LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
	GROUP BY p.nama
) j ON p.id_pembina = j.id_pembina
LEFT JOIN (
	SELECT COUNT(p.tanggal) FROM (
	    SELECT s.tanggal
	    FROM shalat s 
	    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
	    WHERE m.j_kelamin = 'Akhwat'
	    GROUP BY s.tanggal
	) p
)
GROUP BY p.nama


COUNT(CASE WHEN pm.j_kelamin = 'Akhwat' THEN pakhwat.tanggal ELSE pikhwan.tanggal END) AS jmltgl

-- test jml tgl by pembina (bug)
SELECT pm.id_pembina, pm.nama, (CASE WHEN pm.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END) AS 'i/a', COUNT(pa.tanggal) AS jmltgl
FROM pembina pm
LEFT JOIN
(
    SELECT s.tanggal, m.id_mahasiswa
    FROM shalat s 
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE m.j_kelamin = 'Akhwat'
    GROUP BY s.tanggal
) pa ON pm.id_pembina = pa.id_pembina
LEFT JOIN
(
    SELECT s.tanggal, m.id_mahasiswa
    FROM shalat s 
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE m.j_kelamin = 'Ikhwan'
    GROUP BY s.tanggal
) pi ON pm.id_pembina = pi.id_pembina
GROUP BY pm.nama

-- test jml tgl by pembina (work, bug sedikit)
SELECT p.id_pembina, 
p.nama AS 'pembina', 
p.j_kelamin, 
COUNT(s.jws) AS 'total', 
j.jmlb,
r.jmltgl,
(j.jmlb*r.jmltgl*5) AS target,
ROUND(((COUNT(s.jws)/(j.jmlb*r.jmltgl*5))*100),2) AS nilai
FROM pembina p 
LEFT JOIN ( 
	SELECT sl.tanggal, sl.id_periode, mb.id_mhsbinaan, mb.id_pembina, mb.id_mahasiswa, m.nama, sl.wkt_tapping AS jws
	FROM m_binaan mb 
	LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
	LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa 
) s ON p.id_pembina = s.id_pembina 
LEFT JOIN (
	SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb
	FROM m_binaan mb
	LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
	GROUP BY p.id_pembina
) j ON p.id_pembina = j.id_pembina
LEFT JOIN (
    SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))-1 AS jmltgl, s.tanggal
    FROM shalat s
) r ON s.tanggal = r.tanggal
GROUP BY p.nama



SELECT p.id_pembina, 
p.nama AS 'pembina', 
p.j_kelamin, 
SUM(s.jws) As 'total', 
r.jmltgl
FROM pembina p 
LEFT JOIN ( 
	SELECT sl.tanggal, sl.id_periode, mb.id_mhsbinaan, mb.id_pembina, mb.id_mahasiswa, m.nama, COUNT(sl.wkt_tapping) AS jws
	FROM m_binaan mb 
	LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
	LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa 
	GROUP BY m.nama 
) s ON p.id_pembina = s.id_pembina 
LEFT JOIN (
    SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))-1 AS jmltgl, s.tanggal
    FROM shalat s
) r ON s.tanggal = r.tanggal
GROUP BY p.nama


-- jmltgl (work but not applicable)
SELECT COUNT(i.tanggal) FROM
(
    SELECT h.tanggal, h.id_pembina FROM
    (
        SELECT p.id_pembina, sl.tanggal, sl.id_periode, mb.id_mhsbinaan, mb.id_mahasiswa, m.nama, sl.wkt_tapping AS jws 
        FROM pembina p
        LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina
        LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
        LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa 
        ORDER BY p.id_pembina, sl.tanggal
    ) h
    GROUP BY h.tanggal
) i


-- test jml tgl by pembina (WORK FULLY !)
SELECT p.id_pembina, 
p.nama AS 'pembina', 
p.j_kelamin, 
COUNT(s.jws) AS 'total', 
j.jmlb,
r.jmltgl,
pu.jplg,
r.jmltgl-pu.jplg AS jhari,
(j.jmlb*(r.jmltgl-pu.jplg)*5) AS target,
ROUND(((COUNT(s.jws)/(j.jmlb*(r.jmltgl-pu.jplg)*5))*100),2) AS nilai
FROM pembina p 
LEFT JOIN ( 
	SELECT mb.id_pembina, sl.wkt_tapping AS jws
	FROM m_binaan mb 
	LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
	LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa 
) s ON p.id_pembina = s.id_pembina 
LEFT JOIN (
	SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb
	FROM m_binaan mb
	LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
	GROUP BY p.id_pembina
) j ON p.id_pembina = j.id_pembina
LEFT JOIN (
    SELECT p.id_pembina, DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jmltgl
    FROM pembina p
    LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina
    LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa
    GROUP BY p.id_pembina
) r ON p.id_pembina = r.id_pembina
LEFT JOIN (
    SELECT p.id_pembina, COUNT(jp.tanggal) AS jplg
    FROM pembina p
    LEFT JOIN j_pulang jp ON p.j_kelamin = jp.j_kelamin
    GROUP BY p.id_pembina
) pu ON p.id_pembina = pu.id_pembina
GROUP BY p.nama


SELECT p.id_pembina, p.nama AS 'pembina', p.j_kelamin, COUNT(s.jws) AS 'total', j.jmlb, r.jmltgl, pu.jplg, r.jmltgl-pu.jplg AS jhari, (j.jmlb*(r.jmltgl-pu.jplg)*5) AS target, ROUND(((COUNT(s.jws)/(j.jmlb*(r.jmltgl-pu.jplg)*5))*100),2) AS nilai FROM pembina p LEFT JOIN ( SELECT mb.id_pembina, sl.wkt_tapping AS jws FROM m_binaan mb LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa ) s ON p.id_pembina = s.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb FROM m_binaan mb LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina GROUP BY p.id_pembina ) j ON p.id_pembina = j.id_pembina LEFT JOIN ( SELECT p.id_pembina, DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jmltgl FROM pembina p LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa GROUP BY p.id_pembina ) r ON p.id_pembina = r.id_pembina LEFT JOIN ( SELECT p.id_pembina, COUNT(jp.tanggal) AS jplg FROM pembina p LEFT JOIN j_pulang jp ON p.j_kelamin = jp.j_kelamin GROUP BY p.id_pembina ) pu ON p.id_pembina = pu.id_pembina GROUP BY p.nama
		

-- try shalat wajib berdasarkan mahasiswa (BUG)
SELECT m.id_mahasiswa, m.nama, m.j_kelamin, COUNT(s.wkt_tapping) AS total,
DATEDIFF(MAX(sp.tanggal_sampai),MIN(sp.tanggal_dari))+1 AS jmltgl
FROM mahasiswa m
LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa
JOIN shalat_periode sp
GROUP BY m.id_mahasiswa

-- try shalat wajib berdasarkan mahasiswa (WORK !)
SELECT m.id_mahasiswa, m.nama, m.j_kelamin, COUNT(s.wkt_tapping) AS total,
a.jmltgl, a.jplg, a.jmltgl-a.jplg AS jhari,
(a.jmltgl-a.jplg)*5 AS target,
ROUND(((COUNT(s.wkt_tapping)/((a.jmltgl-a.jplg)*5))*100),2) AS nilai
FROM mahasiswa m
LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa
LEFT JOIN (
    SELECT m.id_mahasiswa,
    DATEDIFF(MAX(sp.tanggal_sampai),MIN(sp.tanggal_dari))+1 AS jmltgl,
    r.jplg
    FROM mahasiswa m
    LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa
    JOIN shalat_periode sp
    LEFT JOIN (
        SELECT m.id_mahasiswa, COUNT(jp.tanggal) AS jplg
        FROM mahasiswa m
        LEFT JOIN j_pulang jp ON m.j_kelamin = jp.j_kelamin
        GROUP BY m.id_mahasiswa
    ) r ON m.id_mahasiswa = r.id_mahasiswa
    GROUP BY m.id_mahasiswa    
) a ON m.id_mahasiswa = a.id_mahasiswa
GROUP BY m.id_mahasiswa


-- shalat wajib berdasarkan mahasiswa detail (WORK !)
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_tapping) AS total,
(CASE WHEN m.j_kelamin = 'Akhwat' THEN sp.jws_akhwat ELSE sp.jws_ikhwan END) AS target,
ROUND(((COUNT(s.wkt_tapping)/(CASE WHEN m.j_kelamin = 'Akhwat' THEN sp.jws_akhwat ELSE sp.jws_ikhwan END))*100),2) AS nilai
FROM shalat_periode sp
LEFT JOIN shalat s ON sp.id_periode = s.id_periode
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
WHERE m.id_mahasiswa = 1175
GROUP BY sp.id_periode


-- shalat wajib berdasarkan mahasiswa detail by period (WORK !)
SELECT s.tanggal, COUNT(s.wkt_tapping) AS total,
5 AS target, ROUND(((COUNT(s.wkt_tapping)/5)*100),2) AS nilai
FROM shalat s
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
WHERE m.id_mahasiswa = 1175 AND s.id_periode = 3
GROUP BY s.tanggal


-- shalat wajib berdasarkan mahasiswa detail by period by day (WORK !)
SELECT su.id_mahasiswa, su.wkt_tapping AS 'Shubuh', zu.wkt_tapping AS 'Dzuhur', ar.wkt_tapping AS 'Ashar', mg.wkt_tapping AS 'Maghrib', iy.wkt_tapping AS 'Isya'
FROM shalat s 
LEFT JOIN(
    SELECT m.id_mahasiswa, s.wkt_tapping
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '2018-03-09'
) su ON s.id_mahasiswa = su.id_mahasiswa
LEFT JOIN(
    SELECT m.id_mahasiswa, s.wkt_tapping
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-09'
) zu ON s.id_mahasiswa = zu.id_mahasiswa
LEFT JOIN(
    SELECT m.id_mahasiswa, s.wkt_tapping
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '2018-03-09'
) ar ON s.id_mahasiswa = ar.id_mahasiswa
LEFT JOIN(
    SELECT m.id_mahasiswa, s.wkt_tapping
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '2018-03-09'
) mg ON s.id_mahasiswa = mg.id_mahasiswa
LEFT JOIN(
    SELECT m.id_mahasiswa, s.wkt_tapping
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE s.wkt_shalat = 'isya' AND s.tanggal = '2018-03-09'
) iy ON s.id_mahasiswa = iy.id_mahasiswa
WHERE su.id_mahasiswa = 1175
GROUP BY su.id_mahasiswa


-- shalat wajib berdasarkan ikhwan/akhwat versi j_pulang2 + shalat_udzur2 (WORK !, LIGHTER)
SELECT m.j_kelamin, COUNT(s.wkt_tapping) AS total, h.jmhs, d.jhari,
h.jmhs*d.jhari*5 AS target_awal,
j.jwsp*h.jmhs AS jplg,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
(j.jwsp*h.jmhs)+(IF(u.jmlu IS NULL, 0, u.jmlu)) AS total_dispen,
(h.jmhs*d.jhari*5)-((j.jwsp*h.jmhs)+(IF(u.jmlu IS NULL, 0, u.jmlu))) AS target_akhir,
ROUND(((COUNT(s.wkt_tapping)/((h.jmhs*d.jhari*5)-((j.jwsp*h.jmhs)+(IF(u.jmlu IS NULL, 0, u.jmlu)))))*100),2) AS nilai
FROM mahasiswa m
LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa
LEFT JOIN (
    SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m
    GROUP BY m.j_kelamin
) h ON m.j_kelamin = h.j_kelamin
JOIN (
    SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jhari
    FROM shalat s
) d
LEFT JOIN (
    SELECT jp.j_kelamin, COUNT(jp.wkt_shalat) AS jwsp
    FROM j_pulang2 jp
    GROUP BY jp.j_kelamin
) j ON m.j_kelamin = j.j_kelamin
LEFT JOIN (
    SELECT COUNT(su.udzur) AS jmlu, m.j_kelamin
    FROM shalat_udzur2 su
    LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa
    WHERE su.disetujui = 1
) u ON m.j_kelamin = u.j_kelamin
GROUP BY m.j_kelamin


-- shalat wajib berdasarkan ikhwan/akhwat detail (WORK)
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, d.jhari, m.jml, sh.total,
d.jhari*m.jml*5 AS target1,
IF(j.jplg IS NULL, 0, j.jplg) AS jplg,
m.jml*(IF(j.jplg IS NULL, 0, j.jplg)) AS total_jplg,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
(d.jhari*m.jml*5)-(m.jml*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2,
ROUND((((sh.total)/((d.jhari*m.jml*5)-(m.jml*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
FROM shalat_periode sp
LEFT JOIN (
    SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari
    FROM shalat_periode sp
) d ON sp.id_periode = d.id_periode
LEFT JOIN (
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS total
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE m.j_kelamin = 'Akhwat'
    GROUP BY s.id_periode
) sh ON sp.id_periode = sh.id_periode
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jml
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Akhwat'
) m
LEFT JOIN (
    SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    WHERE jp.j_kelamin = 'Akhwat'
    GROUP BY jp.id_periode
) j ON sp.id_periode = j.id_periode
LEFT JOIN (
    SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su
    LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa
    WHERE su.disetujui = 1 AND m.j_kelamin = 'Akhwat'
    GROUP BY su.id_periode
) u ON sp.id_periode = u.id_periode


-- shalat wajib berdasarkan ikhwan/akhwat detail percentage (WORK)
SELECT a.nilai AS a, b.nilai AS b, 
ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS percent
FROM (
    SELECT ROUND((SUM(a.nilai)/j.jml),2) AS nilai
    FROM (
        SELECT ROUND((((sh.total)/((d.jhari*m.jml*5)-(m.jml*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
        FROM shalat_periode sp
        LEFT JOIN (
            SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari
            FROM shalat_periode sp
        ) d ON sp.id_periode = d.id_periode
        LEFT JOIN (
            SELECT s.id_periode, COUNT(s.wkt_tapping) AS total
            FROM shalat s
            LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
            WHERE m.j_kelamin = 'Akhwat'
            GROUP BY s.id_periode
        ) sh ON sp.id_periode = sh.id_periode
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS jml
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Akhwat'
        ) m
        LEFT JOIN (
            SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
            FROM j_pulang2 jp
            WHERE jp.j_kelamin = 'Akhwat'
            GROUP BY jp.id_periode
        ) j ON sp.id_periode = j.id_periode
        LEFT JOIN (
            SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
            FROM shalat_udzur2 su
            LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa
            WHERE su.disetujui = 1 AND m.j_kelamin = 'Akhwat'
            GROUP BY su.id_periode
        ) u ON sp.id_periode = u.id_periode    
    ) a
    JOIN (
        SELECT COUNT(sp.id_periode) AS jml
        FROM shalat_periode sp 
    ) j
) a 
JOIN (
    SELECT ROUND((SUM(b.nilai)/j.jml),2) AS nilai
    FROM (
        SELECT ROUND((((sh.total)/((d.jhari*m.jml*5)-(m.jml*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
        FROM shalat_periode sp
        LEFT JOIN (
            SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari
            FROM shalat_periode sp
        ) d ON sp.id_periode = d.id_periode
        LEFT JOIN (
            SELECT s.id_periode, COUNT(s.wkt_tapping) AS total
            FROM shalat s
            LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
            WHERE m.j_kelamin = 'Ikhwan'
            GROUP BY s.id_periode
        ) sh ON sp.id_periode = sh.id_periode
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS jml
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Ikhwan'
        ) m
        LEFT JOIN (
            SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
            FROM j_pulang2 jp
            WHERE jp.j_kelamin = 'Ikhwan'
            GROUP BY jp.id_periode
        ) j ON sp.id_periode = j.id_periode
        LEFT JOIN (
            SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
            FROM shalat_udzur2 su
            LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa
            WHERE su.disetujui = 1 AND m.j_kelamin = 'Ikhwan'
            GROUP BY su.id_periode
        ) u ON sp.id_periode = u.id_periode    
    ) b
    JOIN (
        SELECT COUNT(sp.id_periode) AS jml
        FROM shalat_periode sp 
    ) j
) b

-- shalat wajib berdasarkan ikhwan/akhwat detail (different nila1 nilai2 calc version) (WORK !)
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_tapping) AS total, j.jmhs, 
DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1 AS jtgl,
IF(k.jplg IS NULL, 0, k.jplg) AS jplg,
(DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1)-IF(k.jplg IS NULL, 0, k.jplg) AS jhari,
j.jmhs*((DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1)-IF(k.jplg IS NULL, 0, k.jplg))*5 AS 'target2',
ROUND(((COUNT(s.wkt_tapping)/j.jmhs)),2) AS 'total1',
sp.jws_akhwat AS 'target1',
ROUND(((((COUNT(s.wkt_tapping)/j.jmhs))/sp.jws_akhwat)*100),2) AS 'nilai1',
((COUNT(s.wkt_tapping)/(j.jmhs*((DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1)-IF(k.jplg IS NULL, 0, k.jplg))*5))*100) AS 'nilai2'
FROM shalat_periode sp
LEFT JOIN shalat s ON sp.id_periode = s.id_periode
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
LEFT JOIN (
    SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Akhwat'
) j ON m.j_kelamin = j.j_kelamin
LEFT JOIN (
    SELECT jp.id_periode, COUNT(jp.tanggal) AS jplg
    FROM j_pulang jp     
    WHERE jp.j_kelamin = 'Akhwat'
    GROUP BY jp.id_periode
) k ON sp.id_periode = k.id_periode
WHERE m.j_kelamin = 'Akhwat'
GROUP BY sp.id_periode

-- shalat wajib berdasarkan ikhwan/akhwat detail by period (WORK)
SELECT t.tanggal, 
IF(p.tanggal IS NULL, t.total, 0) AS total,
j.jmhs,
(IF(p.tanggal IS NULL, j.jmhs, p.j_kelamin))*5 AS target1,
IF(p.tanggal IS NULL, '-', p.j_kelamin) AS plg,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
((IF(p.tanggal IS NULL, j.jmhs, p.j_kelamin))*5)-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2,
IF(ROUND((((IF(p.tanggal IS NULL, t.total, 0))/(((IF(p.tanggal IS NULL, j.jmhs, p.j_kelamin))*5)-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) IS NULL, 0, ROUND((((IF(p.tanggal IS NULL, t.total, 0))/(((IF(p.tanggal IS NULL, j.jmhs, p.j_kelamin))*5)-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2)) AS nilai 
FROM (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, s.id_periode
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE m.j_kelamin = 'Ikhwan'
    GROUP BY s.tanggal
) t
LEFT JOIN ( 
    SELECT jp.tanggal, jp.j_kelamin 
    FROM j_pulang2 jp 
    WHERE jp.j_kelamin = 'Ikhwan'
    GROUP BY jp.tanggal 
) p ON t.tanggal = p.tanggal 
JOIN ( 
    SELECT COUNT(m.id_mahasiswa) AS jmhs 
    FROM mahasiswa m 
    WHERE m.j_kelamin = 'Ikhwan'
) j 
LEFT JOIN ( 
    SELECT su.tanggal, COUNT(su.udzur) AS jmlu 
    FROM shalat_udzur2 su 
    WHERE su.disetujui = 1 
) u ON t.tanggal = u.tanggal 
WHERE t.id_periode = 1
GROUP BY t.tanggal

-- shalat wajib berdasarkan ikhwan/akhwat detail by period by day (WORK !)
SELECT m.id_mahasiswa, m.nama, su.wkt_tapping AS 'Shubuh', zu.wkt_tapping AS 'Dzuhur', ar.wkt_tapping AS 'Ashar', mg.wkt_tapping AS 'Maghrib', iy.wkt_tapping AS 'Isya'
FROM mahasiswa m 
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.tanggal
    FROM shalat s
    WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '2018-03-23'
) su ON m.id_mahasiswa = su.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.tanggal
    FROM shalat s
    WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-23'
) zu ON m.id_mahasiswa = zu.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.tanggal
    FROM shalat s
    WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '2018-03-23'
) ar ON m.id_mahasiswa = ar.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.tanggal
    FROM shalat s
    WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '2018-03-23'
) mg ON m.id_mahasiswa = mg.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.tanggal
    FROM shalat s
    WHERE s.wkt_shalat = 'isya' AND s.tanggal = '2018-03-23'
) iy ON m.id_mahasiswa = iy.id_mahasiswa
WHERE m.j_kelamin = 'Ikhwan'

-- shalat wajib berdasarkan ikhwan/akhwat detail by period by day (nilai by wkt shalat)
SELECT s.wkt_shalat, COUNT(s.wkt_tapping) AS total
FROM shalat s
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
WHERE m.j_kelamin = 'Ikhwan'
GROUP BY s.wkt_shalat
ORDER BY s.wkt_tapping


-- shalat wajib berdasarkan wkt_shalat (WORK !)
SELECT s.wkt_shalat, COUNT(s.wkt_tapping) AS total, j.jmhs, 
DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jtgl, p.jplg,
(DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1)-p.jplg AS jhari,
j.jmhs*((DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1)-p.jplg) AS target,
ROUND(((COUNT(s.wkt_tapping)/(j.jmhs*((DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1)-p.jplg)))*100),2) AS nilai
FROM shalat s
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m 
) j
JOIN (
    SELECT COUNT(jp.tanggal) AS jplg
    FROM j_pulang jp
) p
GROUP BY s.wkt_shalat
ORDER BY s.wkt_tapping

-- shalat wajib berdasarkan wkt_shalat detail (WORK !)
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, su.jws AS 'total', j.jmhs,
DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1 AS jtgl,
IF(k.jplg IS NULL, 0, k.jplg) AS jplg,
(DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1)-IF(k.jplg IS NULL, 0, k.jplg) AS jhari,
j.jmhs*((DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1)-IF(k.jplg IS NULL, 0, k.jplg)) AS target,
ROUND(((su.jws/(j.jmhs*((DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1)-IF(k.jplg IS NULL, 0, k.jplg))))*100),2) AS nilai
FROM shalat_periode sp
LEFT JOIN(
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS jws
    FROM shalat s
    WHERE s.wkt_shalat = 'shubuh'
    GROUP BY s.id_periode
) su ON sp.id_periode = su.id_periode
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m
) j
LEFT JOIN (
    SELECT jp.id_periode, COUNT(jp.tanggal) AS jplg
    FROM j_pulang jp     
    GROUP BY jp.id_periode
) k ON sp.id_periode = k.id_periode
GROUP BY sp.id_periode

-- shalat wajib berdasarkan wkt_shalat detail (WORK ! Lengkap dg kondisional plg ikhwan/akhwat)
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, su.jws AS 'total', j.jmhs,
DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1 AS jtgl,
IF(k.jplg IS NULL, 0, k.jplg) AS jplg, k.j_kelamin AS plg,
(DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1)-IF(k.jplg IS NULL, 0, k.jplg) AS jhari,
j.jmhs*((DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1)-IF(k.jplg IS NULL, 0, k.jplg)) AS target,
ROUND(((su.jws/(j.jmhs*((DATEDIFF(MAX(sp.tanggal_sampai), MIN(sp.tanggal_dari))+1)-IF(k.jplg IS NULL, 0, k.jplg))))*100),2) AS nilai
FROM shalat_periode sp
LEFT JOIN(
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS jws
    FROM shalat s
    WHERE s.wkt_shalat = 'shubuh'
    GROUP BY s.id_periode
) su ON sp.id_periode = su.id_periode
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m
) j
LEFT JOIN (
    SELECT jp.id_periode, COUNT(jp.tanggal) AS jplg, jp.j_kelamin
    FROM j_pulang jp     
    GROUP BY jp.id_periode
) k ON sp.id_periode = k.id_periode
GROUP BY sp.id_periode

-- shalat wajib berdasarkan wkt_shalat detail by period (WORK ! Lengkap dg kondisional plg ikhwan/akhwat)
SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, j.jmhs,
IF(p.tanggal IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg,
IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)) AS jplg,
j.jmhs-(IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END))) AS target,
ROUND(((COUNT(s.wkt_tapping)/(j.jmhs-(IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))))*100),2) AS nilai
FROM shalat s
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m
) j
LEFT JOIN (
    SELECT jp.tanggal, jp.j_kelamin
    FROM j_pulang jp 
) p ON s.tanggal = p.tanggal
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Akhwat'
) a
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Ikhwan'
) i
WHERE s.id_periode = 9 AND s.wkt_shalat = 'dzuhur'
GROUP BY s.tanggal

-- shalat wajib berdasarkan wkt_shalat detail by period by day (WORK !)
SELECT s.id_mahasiswa, m.nama, s.wkt_tapping
FROM shalat s
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
WHERE s.id_periode = 3 AND s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-16'


-- shalatNilaiSemua NEW QUERY DESIGN (WORK)
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, d.jhari, mh.jmhs, sh.total,
d.jhari*mh.jmhs*5 AS target1,
IF(p.id_periode IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg,
IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)) AS jpmhs,
IF(j.jplg IS NULL, 0, j.jplg) AS jplg,
(IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)) AS total_jplg,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
(d.jhari*mh.jmhs*5)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2,
ROUND((((sh.total)/((d.jhari*mh.jmhs*5)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
FROM shalat_periode sp
LEFT JOIN (
    SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari
    FROM shalat_periode sp
) d ON sp.id_periode = d.id_periode
LEFT JOIN (
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS total
    FROM shalat s
    GROUP BY s.id_periode
) sh ON sp.id_periode = sh.id_periode
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m 
) mh
LEFT JOIN (
    SELECT jp.id_periode, jp.j_kelamin
    FROM j_pulang2 jp 
    GROUP BY jp.id_periode
) p ON sp.id_periode = p.id_periode
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Akhwat'
) a
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Ikhwan'
) i
LEFT JOIN (
    SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    GROUP BY jp.id_periode
) j ON sp.id_periode = j.id_periode
LEFT JOIN (
    SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su
    WHERE su.disetujui = 1
    GROUP BY su.id_periode
) u ON sp.id_periode = u.id_periode


-- shalatByPeriodID NEW (WORK)
SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, j.jmhs,
(IF(p.tanggal IS NULL, j.jmhs, (CASE WHEN p.j_kelamin = 'Akhwat' THEN i.plg ELSE a.plg END)))*5 AS target1,
IF(p.tanggal IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg,
IF(p.tanggal IS NULL, j.jmhs, (CASE WHEN p.j_kelamin = 'Akhwat' THEN i.plg ELSE a.plg END)) AS jsisa,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
((IF(p.tanggal IS NULL, j.jmhs, (CASE WHEN p.j_kelamin = 'Akhwat' THEN i.plg ELSE a.plg END)))*5)-IF(u.jmlu IS NULL, 0, u.jmlu) AS target2,
ROUND((((COUNT(s.wkt_tapping))/(((IF(p.tanggal IS NULL, j.jmhs, (CASE WHEN p.j_kelamin = 'Akhwat' THEN i.plg ELSE a.plg END)))*5)-IF(u.jmlu IS NULL, 0, u.jmlu)))*100),2) AS nilai
FROM shalat s
LEFT JOIN (
    SELECT jp.tanggal, jp.j_kelamin
    FROM j_pulang2 jp 
    GROUP BY jp.tanggal
) p ON s.tanggal = p.tanggal
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m
) j
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Akhwat'
) a
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Ikhwan'
) i
LEFT JOIN (
    SELECT su.tanggal, COUNT(su.udzur) AS jmlu
    FROM shalat_udzur2 su
    WHERE su.disetujui = 1
) u ON s.tanggal = u.tanggal
WHERE s.id_periode = 9
GROUP BY s.tanggal


-- Shalat detail ikhtisar by day (WORK)
SELECT m.id_mahasiswa, m.nama, su.wkt_tapping AS 'shubuh', dz.wkt_tapping AS 'dzuhur', ah.wkt_tapping AS 'ashar', mg.wkt_tapping AS 'maghrib', iy.wkt_tapping AS 'isya'
FROM mahasiswa m
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '2018-03-23'
) su ON m.id_mahasiswa = su.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-23'
) dz ON m.id_mahasiswa = dz.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '2018-03-23'
) ah ON m.id_mahasiswa = ah.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '2018-03-23'
) mg ON m.id_mahasiswa = mg.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'isya' AND s.tanggal = '2018-03-23'
) iy ON m.id_mahasiswa = iy.id_mahasiswa


-- Shalat detail ikhtisar by day JML for graph (WORK)
SELECT su.tanggal, su.jml AS shubuh, zu.jml AS dzuhur, ar.jml AS ashar, mg.jml AS maghrib, iy.jml AS isya
FROM (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml
    FROM shalat s 
    WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '2018-03-23'
    GROUP BY s.wkt_shalat
) su
LEFT JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml
    FROM shalat s 
    WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-23'
    GROUP BY s.wkt_shalat    
) zu ON su.tanggal = zu.tanggal
LEFT JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml
    FROM shalat s 
    WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '2018-03-23'
    GROUP BY s.wkt_shalat    
) ar ON su.tanggal = ar.tanggal
LEFT JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml
    FROM shalat s 
    WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '2018-03-23'
    GROUP BY s.wkt_shalat    
) mg ON su.tanggal = mg.tanggal
LEFT JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml
    FROM shalat s 
    WHERE s.wkt_shalat = 'isya' AND s.tanggal = '2018-03-23'
    GROUP BY s.wkt_shalat    
) iy ON su.tanggal = iy.tanggal


-- Hitung persentase naik/turun shalat by day / date (WORK)
SELECT a.jml AS a, b.jml AS b, 
ROUND((((b.jml-a.jml)/a.jml)*100),2) AS '%'
FROM (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    WHERE s.tanggal = '2018-03-16' 
    GROUP BY s.tanggal 
) a 
JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    WHERE s.tanggal = '2018-03-17' 
    GROUP BY s.tanggal
) b


-- Shalat Ikhwan/ Akhwat By Day (WORK)
SELECT m.id_mahasiswa, m.nama, su.wkt_tapping AS 'shubuh', dz.wkt_tapping AS 'dzuhur', ah.wkt_tapping AS 'ashar', mg.wkt_tapping AS 'maghrib', iy.wkt_tapping AS 'isya'
FROM mahasiswa m
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '2018-03-23'
) su ON m.id_mahasiswa = su.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-23'
) dz ON m.id_mahasiswa = dz.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '2018-03-23'
) ah ON m.id_mahasiswa = ah.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '2018-03-23'
) mg ON m.id_mahasiswa = mg.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'isya' AND s.tanggal = '2018-03-23'
) iy ON m.id_mahasiswa = iy.id_mahasiswa
WHERE m.j_kelamin = 'Akhwat'


-- Hitung persentase naik/turun ikhwan/akhwat shalat by day / date (WORK)
SELECT a.jml AS a, b.jml AS b, 
ROUND((((b.jml-a.jml)/a.jml)*100),2) AS '%'
FROM (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE m.j_kelamin = 'Akhwat' AND s.tanggal = '2018-03-16'
    GROUP BY s.tanggal 
) a 
JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE m.j_kelamin = 'Akhwat' AND s.tanggal = '2018-03-17'
    GROUP BY s.tanggal
) b


-- shalat ikhwan/akhwat by day JML for graph (WORK)
SELECT s.wkt_shalat, COUNT(s.wkt_tapping) AS jml
FROM shalat s
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
WHERE m.j_kelamin = 'Akhwat' AND s.tanggal = '2018-03-20'
GROUP BY s.wkt_shalat
ORDER BY s.wkt_tapping


-- shalat by pembina LENGKAP (WORK)
SELECT p.id_pembina, p.nama AS pembina, p.j_kelamin, 
COUNT(s.jws) AS total, 
j.jmlb, 
r.jmltgl, pu.jplg, r.jmltgl-pu.jplg AS jhari, 
(j.jmlb*(r.jmltgl-pu.jplg)*5) AS target1,
IF(uz.jmlu IS NULL, 0, uz.jmlu) AS jmlu,
(j.jmlb*(r.jmltgl-pu.jplg)*5)-(IF(uz.jmlu IS NULL, 0, uz.jmlu)) AS target2,
ROUND(((COUNT(s.jws)/((j.jmlb*(r.jmltgl-pu.jplg)*5)-(IF(uz.jmlu IS NULL, 0, uz.jmlu))))*100),2) AS nilai 
FROM pembina p 
LEFT JOIN ( 
    SELECT mb.id_pembina, sl.wkt_tapping AS jws 
    FROM m_binaan mb 
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
    LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa 
) s ON p.id_pembina = s.id_pembina 
LEFT JOIN ( 
    SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb 
    FROM m_binaan mb 
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina 
    GROUP BY p.id_pembina 
) j ON p.id_pembina = j.id_pembina 
LEFT JOIN ( 
    SELECT p.id_pembina, DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jmltgl 
    FROM pembina p 
    LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina 
    LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa 
    GROUP BY p.id_pembina 
) r ON p.id_pembina = r.id_pembina 
LEFT JOIN ( 
    SELECT p.id_pembina, COUNT(jp.tanggal) AS jplg 
    FROM pembina p 
    LEFT JOIN j_pulang jp ON p.j_kelamin = jp.j_kelamin 
    GROUP BY p.id_pembina 
) pu ON p.id_pembina = pu.id_pembina 
LEFT JOIN (
    SELECT mb.id_pembina, u.jmlu
    FROM m_binaan mb 
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
    LEFT JOIN (
        SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu
        FROM shalat_udzur2 su 
        WHERE su.disetujui = 1
        GROUP BY su.id_mahasiswa
    ) u ON m.id_mahasiswa = u.id_mahasiswa
    GROUP BY mb.id_pembina    
) uz ON p.id_pembina = uz.id_pembina
GROUP BY p.nama

-- shalat by pembina detail LENGKAP (WORK)
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, 
d.jhari, t.j_kelamin,
COUNT(s.wkt_shalat) AS 'total', 
j.jmlb,
j.jmlb*d.jhari*5 AS target1,
(COUNT(s.wkt_shalat)/(j.jmlb*d.jhari*5))*100 AS nilai1,
j.jmlb*(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(a.jplg IS NULL, 0, a.jplg)) ELSE (IF(i.jplg IS NULL, 0, i.jplg)) END) AS jplg,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
(j.jmlb*d.jhari*5)-((j.jmlb*(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(a.jplg IS NULL, 0, a.jplg)) ELSE (IF(i.jplg IS NULL, 0, i.jplg)) END))+IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2,
ROUND(((COUNT(s.wkt_shalat)/((j.jmlb*d.jhari*5)-((j.jmlb*(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(a.jplg IS NULL, 0, a.jplg)) ELSE (IF(i.jplg IS NULL, 0, i.jplg)) END))+IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
FROM shalat_periode sp 
LEFT JOIN shalat s ON sp.id_periode = s.id_periode 
LEFT JOIN ( 
    SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin 
    FROM m_binaan mb 
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina 
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
) t ON s.id_mahasiswa = t.id_mahasiswa 
LEFT JOIN ( 
    SELECT p.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb 
    FROM m_binaan mb 
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina 
    WHERE mb.id_pembina = 34 
    GROUP BY p.nama 
) j ON t.id_pembina = j.id_pembina 
LEFT JOIN (
    SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari
    FROM shalat_periode sp
) d ON sp.id_periode = d.id_periode
LEFT JOIN (
    SELECT sp.id_periode, COUNT(jp.wkt_shalat) AS jplg, jp.j_kelamin
    FROM shalat_periode sp
    LEFT JOIN j_pulang2 jp ON sp.id_periode = jp.id_periode
    WHERE jp.j_kelamin = 'Ikhwan'
    GROUP BY sp.id_periode    
) i ON sp.id_periode = i.id_periode
LEFT JOIN (
    SELECT sp.id_periode, COUNT(jp.wkt_shalat) AS jplg, jp.j_kelamin
    FROM shalat_periode sp
    LEFT JOIN j_pulang2 jp ON sp.id_periode = jp.id_periode
    WHERE jp.j_kelamin = 'Akhwat'
    GROUP BY sp.id_periode
) a ON sp.id_periode = a.id_periode
LEFT JOIN (
    SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su
    LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa
    LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
    WHERE p.id_pembina = 34 AND su.disetujui = 1
    GROUP BY su.id_periode    
) u ON sp.id_periode = u.id_periode
WHERE t.id_pembina = 34 
GROUP BY sp.id_periode 
ORDER BY sp.id_periode

-- shalat by pembina detail percentage (WORK)
SELECT a.nilai AS a, b.nilai AS b, 
ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS 'percent'
FROM (
    SELECT ROUND((SUM(a.nilai)/a.jml),2) AS nilai
    FROM (
        SELECT p.jml, ROUND(((COUNT(s.jws)/((j.jmlb*(r.jmltgl-pu.jplg)*5)-(IF(uz.jmlu IS NULL, 0, uz.jmlu))))*100),2) AS nilai 
        FROM pembina p 
        LEFT JOIN ( 
            SELECT mb.id_pembina, sl.wkt_tapping AS jws 
            FROM m_binaan mb 
            LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
            LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa 
        ) s ON p.id_pembina = s.id_pembina 
        LEFT JOIN ( 
            SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb 
            FROM m_binaan mb 
            LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina 
            GROUP BY p.id_pembina 
        ) j ON p.id_pembina = j.id_pembina 
        LEFT JOIN ( 
            SELECT p.id_pembina, DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jmltgl 
            FROM pembina p 
            LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina 
            LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa 
            GROUP BY p.id_pembina 
        ) r ON p.id_pembina = r.id_pembina 
        LEFT JOIN ( 
            SELECT p.id_pembina, COUNT(jp.tanggal) AS jplg 
            FROM pembina p 
            LEFT JOIN j_pulang jp ON p.j_kelamin = jp.j_kelamin 
            GROUP BY p.id_pembina 
        ) pu ON p.id_pembina = pu.id_pembina 
        LEFT JOIN (
            SELECT mb.id_pembina, u.jmlu
            FROM m_binaan mb 
            LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
            LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
            LEFT JOIN (
                SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu
                FROM shalat_udzur2 su 
                WHERE su.disetujui = 1
                GROUP BY su.id_mahasiswa
            ) u ON m.id_mahasiswa = u.id_mahasiswa
            GROUP BY mb.id_pembina    
        ) uz ON p.id_pembina = uz.id_pembina
        JOIN (
            SELECT COUNT(p.id_pembina) AS jml
            FROM pembina p 
        ) p
        GROUP BY p.id_pembina
    ) a
) a 
JOIN (
    SELECT ROUND(((COUNT(s.jws)/((j.jmlb*(r.jmltgl-pu.jplg)*5)-(IF(uz.jmlu IS NULL, 0, uz.jmlu))))*100),2) AS nilai 
    FROM pembina p 
    LEFT JOIN ( 
        SELECT mb.id_pembina, sl.wkt_tapping AS jws 
        FROM m_binaan mb 
        LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
        LEFT JOIN shalat sl ON m.id_mahasiswa = sl.id_mahasiswa 
    ) s ON p.id_pembina = s.id_pembina 
    LEFT JOIN ( 
        SELECT p.id_pembina, COUNT(mb.id_mahasiswa) AS jmlb 
        FROM m_binaan mb 
        LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina 
        GROUP BY p.id_pembina 
    ) j ON p.id_pembina = j.id_pembina 
    LEFT JOIN ( 
        SELECT p.id_pembina, DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jmltgl 
        FROM pembina p 
        LEFT JOIN m_binaan mb ON p.id_pembina = mb.id_pembina 
        LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa 
        GROUP BY p.id_pembina 
    ) r ON p.id_pembina = r.id_pembina 
    LEFT JOIN ( 
        SELECT p.id_pembina, COUNT(jp.tanggal) AS jplg 
        FROM pembina p 
        LEFT JOIN j_pulang jp ON p.j_kelamin = jp.j_kelamin 
        GROUP BY p.id_pembina 
    ) pu ON p.id_pembina = pu.id_pembina 
    LEFT JOIN (
        SELECT mb.id_pembina, u.jmlu
        FROM m_binaan mb 
        LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
        LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa
        LEFT JOIN (
            SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu
            FROM shalat_udzur2 su 
            WHERE su.disetujui = 1
            GROUP BY su.id_mahasiswa
        ) u ON m.id_mahasiswa = u.id_mahasiswa
        GROUP BY mb.id_pembina    
    ) uz ON p.id_pembina = uz.id_pembina
    JOIN (
        SELECT COUNT(p.id_pembina) AS jml
        FROM pembina p 
    ) p
    WHERE P.id_pembina = 30
    GROUP BY p.id_pembina
) b


-- shalat by pembina detail by period LENGKAP (WORK)
SELECT sp.id_periode, s.tanggal, 
COUNT(s.wkt_shalat) AS 'total', 
j.jmlb, 
(j.jmlb*5) AS 'target1', 
(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END) AS jplg,
IF(uz.jmlu IS NULL, 0, uz.jmlu) AS jmlu,
IF(((CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END)) = 5 , 0, (j.jmlb*5)-(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END)-(IF(uz.jmlu IS NULL, 0, uz.jmlu))) AS target2,
ROUND(((COUNT(s.wkt_shalat)/(IF(((CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END)) = 5 , 0, (j.jmlb*5)-(CASE WHEN t.j_kelamin = 'Akhwat' THEN (IF(pa.jplg IS NULL, 0, pa.jplg)) ELSE (IF(pi.jplg IS NULL, 0, pi.jplg)) END)-(IF(uz.jmlu IS NULL, 0, uz.jmlu)))))*100),2) AS 'nilai' 
FROM shalat_periode sp 
LEFT JOIN shalat s ON sp.id_periode = s.id_periode 
LEFT JOIN( 
    SELECT mb.id_mhsbinaan, m.id_mahasiswa, p.id_pembina, p.j_kelamin 
    FROM m_binaan mb 
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina 
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
) t ON s.id_mahasiswa = t.id_mahasiswa 
LEFT JOIN( 
    SELECT P.id_pembina, p.nama, COUNT(mb.id_mahasiswa) AS jmlb 
    FROM m_binaan mb 
    LEFT JOIN mahasiswa m ON mb.id_mahasiswa = m.id_mahasiswa 
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina 
    WHERE mb.id_pembina = 34 GROUP BY p.nama 
) j ON t.id_pembina = j.id_pembina 
LEFT JOIN (
    SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    WHERE jp.j_kelamin = 'Akhwat'
    GROUP BY jp.tanggal    
) pa ON s.tanggal = pa.tanggal
LEFT JOIN (
    SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    WHERE jp.j_kelamin = 'Ikhwan'
    GROUP BY jp.tanggal    
) pi ON s.tanggal = pi.tanggal
LEFT JOIN (
    SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su
    LEFT JOIN mahasiswa m ON su.id_mahasiswa = m.id_mahasiswa
    LEFT JOIN m_binaan mb ON m.id_mahasiswa = mb.id_mahasiswa
    LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
    WHERE p.id_pembina = 34 AND su.disetujui = 1
    GROUP BY su.tanggal     
) uz ON s.tanggal = uz.tanggal
WHERE (t.id_pembina = 34) AND (sp.id_periode = 1) GROUP BY s.tanggal


-- pembina by day nilai information for graph (WORK)
SELECT s.wkt_shalat, COUNT(s.wkt_tapping) AS jml
FROM shalat s
LEFT JOIN m_binaan mb ON s.id_mahasiswa = mb.id_mahasiswa
LEFT JOIN pembina p ON mb.id_pembina = p.id_pembina
WHERE s.tanggal = '2018-03-09' AND mb.id_pembina = 22
GROUP BY s.wkt_shalat
ORDER BY s.wkt_tapping


-- percentage shalat by pembina by period (WORK)
SELECT a.jml AS a, b.jml AS b, 
ROUND((((b.jml-a.jml)/a.jml)*100),2) AS '%'
FROM (
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    LEFT JOIN m_binaan mb ON s.id_mahasiswa = mb.id_mahasiswa
    WHERE s.id_periode = 1 AND mb.id_pembina = 32
    GROUP BY s.id_periode 
) a 
JOIN (
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    LEFT JOIN m_binaan mb ON s.id_mahasiswa = mb.id_mahasiswa
    WHERE s.id_periode = 2 AND mb.id_pembina = 32
    GROUP BY s.id_periode 
) b


-- percentage shalat by pembina by day
SELECT a.jml AS a, b.jml AS b, 
ROUND((((b.jml-a.jml)/a.jml)*100),2) AS '%'
FROM (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    LEFT JOIN m_binaan mb ON s.id_mahasiswa = mb.id_mahasiswa
    WHERE s.tanggal = '2018-03-09' AND mb.id_pembina = 22
    GROUP BY s.tanggal 
) a 
JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    LEFT JOIN m_binaan mb ON s.id_mahasiswa = mb.id_mahasiswa
    WHERE s.tanggal = '2018-03-10' AND mb.id_pembina = 22
    GROUP BY s.tanggal 
) b


-- shalat by pembina by day graph (WORK)
    SELECT IF(sh.jml IS NULL, 0, sh.jml) AS jml
    FROM shalat s
    LEFT JOIN (
        SELECT mb.id_pembina, s.wkt_shalat, COUNT(s.wkt_tapping) AS jml
        FROM m_binaan mb 
        LEFT JOIN shalat s ON mb.id_mahasiswa = s.id_mahasiswa
        WHERE s.tanggal = '2018-03-11' AND mb.id_pembina = 30
        GROUP BY s.wkt_shalat
        ORDER BY s.wkt_tapping
    ) sh ON s.wkt_shalat = sh.wkt_shalat
    GROUP BY s.wkt_shalat
    ORDER BY s.wkt_tapping


-- shalat by pembina by day percentage comparison (WORK)
SELECT a.jml AS a, b.jml AS b,
ROUND((IF(a.jml = 0, (((b.jml-a.jml)/5)*100), (((((b.jml-a.jml)/a.jml))*100)))),2) AS percent
FROM (
    SELECT mb.id_pembina, COUNT(sh.wkt_tapping) AS jml
    FROM m_binaan mb
    LEFT JOIN (
        SELECT s.id_mahasiswa, s.wkt_tapping
        FROM shalat s
        WHERE s.tanggal = '2018-03-11'
    ) sh ON mb.id_mahasiswa = sh.id_mahasiswa
    WHERE mb.id_pembina = 30
) a 
JOIN (
    SELECT mb.id_pembina, COUNT(sh.wkt_tapping) AS jml
    FROM m_binaan mb
    LEFT JOIN (
        SELECT s.id_mahasiswa, s.wkt_tapping
        FROM shalat s
        WHERE s.tanggal = '2018-03-12'
    ) sh ON mb.id_mahasiswa = sh.id_mahasiswa
    WHERE mb.id_pembina = 30
) b    

------------------------------------------------------------- SHALAT BY MAHASISWA ------------------------------------------------------------

-- shalat by mahasiswa NEW (WORK)
SELECT m.nama, m.j_kelamin, sh.total, t.jtgl, 
t.jtgl*5 As target1, 
p.jplg, 
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
(t.jtgl*5)-(p.jplg+IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2,
ROUND(((sh.total/((t.jtgl*5)-(p.jplg+IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
FROM mahasiswa m
LEFT JOIN (
    SELECT s.id_mahasiswa, COUNT(s.wkt_tapping) AS total
    FROM shalat s
    GROUP BY s.id_mahasiswa
) sh ON m.id_mahasiswa = sh.id_mahasiswa
JOIN (
    SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jtgl
    FROM shalat s 
) t
LEFT JOIN (
    SELECT jp.j_kelamin, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    GROUP BY jp.j_kelamin
) p ON m.j_kelamin = p.j_kelamin
LEFT JOIN (
    SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su 
    WHERE su.disetujui = 1
    GROUP BY su.id_mahasiswa
) u ON m.id_mahasiswa = u.id_mahasiswa
ORDER BY m.nama

-- BEST 5 halat by mahasiswa NEW GRAPH (WORK)
SELECT a.nama, a.j_kelamin, a.nilai
FROM (
    SELECT m.nama, m.j_kelamin, sh.total, t.jtgl, 
    t.jtgl*5 As target1, 
    p.jplg, 
    IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
    (t.jtgl*5)-(p.jplg+IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2,
    ROUND(((sh.total/((t.jtgl*5)-(p.jplg+IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
    FROM mahasiswa m
    LEFT JOIN (
        SELECT s.id_mahasiswa, COUNT(s.wkt_tapping) AS total
        FROM shalat s
        GROUP BY s.id_mahasiswa
    ) sh ON m.id_mahasiswa = sh.id_mahasiswa
    JOIN (
        SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jtgl
        FROM shalat s 
    ) t
    LEFT JOIN (
        SELECT jp.j_kelamin, COUNT(jp.wkt_shalat) AS jplg
        FROM j_pulang2 jp
        GROUP BY jp.j_kelamin
    ) p ON m.j_kelamin = p.j_kelamin
    LEFT JOIN (
        SELECT su.id_mahasiswa, COUNT(su.wkt_shalat) AS jmlu
        FROM shalat_udzur2 su 
        WHERE su.disetujui = 1
        GROUP BY su.id_mahasiswa
    ) u ON m.id_mahasiswa = u.id_mahasiswa
    ORDER BY nilai DESC
    LIMIT 5    
) a


-- shalat by mahasiswa detail NEW (WORK)
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, 
sh.total,
DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1 AS jtgl,
(DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*5 AS target1,
IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)) AS jplg,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*5)-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2,
ROUND((((sh.total)/(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*5)-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
FROM shalat_periode sp
LEFT JOIN (
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS total, m.j_kelamin, m.id_mahasiswa
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE m.id_mahasiswa = 1432
    GROUP BY s.id_periode
) sh ON sp.id_periode = sh.id_periode
LEFT JOIN (
    SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    WHERE jp.j_kelamin = 'Ikhwan'
    GROUP BY jp.id_periode
) pi ON sh.id_periode = pi.id_periode
LEFT JOIN (
    SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    WHERE jp.j_kelamin = 'Akhwat'
    GROUP BY jp.id_periode
) pa ON sh.id_periode = pa.id_periode
LEFT JOIN (
    SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su 
    WHERE su.disetujui = 1 AND su.id_mahasiswa = 1432
    GROUP BY su.id_periode
) u ON sh.id_periode = u.id_periode

-- shalat by mahasiswa detail percentage (WORK)
SELECT a.nilai AS a, b.nilai AS b, 
ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS percent
FROM (
    SELECT ROUND((SUM(a.nilai)/j.jml),2) AS nilai
    FROM (
        SELECT ROUND((((sh.total)/((d.jhari*mh.jmhs*5)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
        FROM shalat_periode sp
        LEFT JOIN (
            SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari
            FROM shalat_periode sp
        ) d ON sp.id_periode = d.id_periode
        LEFT JOIN (
            SELECT s.id_periode, COUNT(s.wkt_tapping) AS total
            FROM shalat s
            GROUP BY s.id_periode
        ) sh ON sp.id_periode = sh.id_periode
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS jmhs
            FROM mahasiswa m 
        ) mh
        LEFT JOIN (
            SELECT jp.id_periode, jp.j_kelamin
            FROM j_pulang2 jp 
            GROUP BY jp.id_periode
        ) p ON sp.id_periode = p.id_periode
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Akhwat'
        ) a
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Ikhwan'
        ) i
        LEFT JOIN (
            SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
            FROM j_pulang2 jp
            GROUP BY jp.id_periode
        ) j ON sp.id_periode = j.id_periode
        LEFT JOIN (
            SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
            FROM shalat_udzur2 su
            WHERE su.disetujui = 1
            GROUP BY su.id_periode
        ) u ON sp.id_periode = u.id_periode    
    ) a
    JOIN (
        SELECT COUNT(sp.id_periode) AS jml
        FROM shalat_periode sp 
    ) j
) a 
JOIN (
    SELECT ROUND((SUM(b.nilai)/j.jml),2) AS nilai
    FROM (
        SELECT ROUND((((sh.total)/(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*5)-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
        FROM shalat_periode sp
        LEFT JOIN (
            SELECT s.id_periode, COUNT(s.wkt_tapping) AS total, m.j_kelamin, m.id_mahasiswa
            FROM shalat s
            LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
            WHERE m.id_mahasiswa = 1432
            GROUP BY s.id_periode
        ) sh ON sp.id_periode = sh.id_periode
        LEFT JOIN (
            SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
            FROM j_pulang2 jp
            WHERE jp.j_kelamin = 'Ikhwan'
            GROUP BY jp.id_periode
        ) pi ON sh.id_periode = pi.id_periode
        LEFT JOIN (
            SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
            FROM j_pulang2 jp
            WHERE jp.j_kelamin = 'Akhwat'
            GROUP BY jp.id_periode
        ) pa ON sh.id_periode = pa.id_periode
        LEFT JOIN (
            SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
            FROM shalat_udzur2 su 
            WHERE su.disetujui = 1 AND su.id_mahasiswa = 1432
            GROUP BY su.id_periode
        ) u ON sh.id_periode = u.id_periode    
    ) b
    JOIN (
        SELECT COUNT(sp.id_periode) AS jml
        FROM shalat_periode sp 
    ) j
) b


-- shalatmbyperiod precentage (WORK)
SELECT a.jml AS a, b.jml AS b, 
ROUND((((b.jml-a.jml)/a.jml)*100),2) AS '%'
FROM (
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    WHERE s.id_periode = 2 AND s.id_mahasiswa = 1434
    GROUP BY s.id_periode 
) a 
JOIN (
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    WHERE s.id_periode = 3 AND s.id_mahasiswa = 1434
    GROUP BY s.id_periode 
) b


-- shalat by mahasiswa period for GRAPH
SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml
FROM shalat s
WHERE s.id_periode = 7 AND s.id_mahasiswa = 1179
GROUP BY s.tanggal


-- shalat by mahasiswa detail by period (UNSOLVED MISS DATE)
SELECT s.tanggal, 
IF(sh.total IS NULL, 0, sh.total) AS total, 
5 AS target1,
IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)) AS jplg,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
((5-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu)))) AS target2,
ROUND(((IF(sh.total IS NULL, 0, sh.total)/((5-(IF((CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END) IS NULL, 0, (CASE WHEN sh.j_kelamin = 'Akhwat' THEN pa.jplg ELSE pi.jplg END)))-(IF(u.jmlu IS NULL, 0, u.jmlu)))))*100),2) AS nilai
FROM shalat s
LEFT JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, m.j_kelamin, m.id_mahasiswa
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE m.id_mahasiswa = 1179
    GROUP BY s.tanggal
) sh ON s.tanggal = sh.tanggal
LEFT JOIN (
    SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    WHERE jp.j_kelamin = 'Ikhwan'
    GROUP BY jp.tanggal    
) pi ON s.tanggal = pi.tanggal
LEFT JOIN (
    SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    WHERE jp.j_kelamin = 'Akhwat'
    GROUP BY jp.tanggal    
) pa ON s.tanggal = pa.tanggal
LEFT JOIN (
    SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su
    WHERE su.id_mahasiswa = 1179 AND su.disetujui = 1
    GROUP BY su.tanggal
) u ON s.tanggal = u.tanggal
WHERE s.id_periode = 8
GROUP BY s.tanggal


-- shalat by mahasiswa detail by period by day (WORK)
SELECT m.id_mahasiswa, m.nama, su.wkt_tapping AS Shubuh, zu.wkt_tapping AS Dzuhur, ar.wkt_tapping AS Ashar, mg.wkt_tapping AS Maghrib, iy.wkt_tapping AS Isya
FROM mahasiswa m
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'shubuh' AND s.tanggal = '2018-03-30'
) su ON m.id_mahasiswa = su.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'dzuhur' AND s.tanggal = '2018-03-30'
) zu ON m.id_mahasiswa = zu.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'ashar' AND s.tanggal = '2018-03-30'
) ar ON m.id_mahasiswa = ar.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'maghrib' AND s.tanggal = '2018-03-30'
) mg ON m.id_mahasiswa = mg.id_mahasiswa
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping, s.wkt_shalat
    FROM shalat s
    WHERE s.wkt_shalat = 'isya' AND s.tanggal = '2018-03-30'
) iy ON m.id_mahasiswa = iy.id_mahasiswa
WHERE m.id_mahasiswa = 1179


-- shalat by mahasiswa by day graph (WORK)
    SELECT IF(sh.jml IS NULL, 0, sh.jml) AS jml
    FROM shalat s
    LEFT JOIN (
        SELECT s.id_mahasiswa, s.wkt_shalat, COUNT(s.wkt_tapping) AS jml
        FROM shalat s
        WHERE s.tanggal = '2018-04-08' AND s.id_mahasiswa = 1197
        GROUP BY s.wkt_shalat
        ORDER BY s.wkt_tapping
    ) sh ON s.wkt_shalat = sh.wkt_shalat
    GROUP BY s.wkt_shalat
    ORDER BY s.wkt_tapping


-- percentage shalat by mahasiswa by day (BUG when a = 0)
SELECT a.jml AS a, b.jml AS b, 
ROUND((((b.jml-a.jml)/a.jml)*100),2) AS 'percent'
FROM (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    WHERE s.tanggal = '2018-04-05' AND s.id_mahasiswa = 2029
    GROUP BY s.tanggal 
) a 
JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    WHERE s.tanggal = '2018-04-06' AND s.id_mahasiswa = 2029
    GROUP BY s.tanggal 
) b


-- percentage shalat by mahasiswa by day (FULLY WORK)
SELECT a.jml AS a, b.jml AS b,
ROUND((IF(a.jml = 0, (((b.jml-a.jml)/5)*100), (((((b.jml-a.jml)/a.jml))*100)))),2) AS percent
FROM (
    SELECT m.id_mahasiswa, COUNT(sh.wkt_tapping) AS jml
    FROM mahasiswa m
    LEFT JOIN (
        SELECT s.id_mahasiswa, s.wkt_tapping
        FROM shalat s
        WHERE s.tanggal = '2018-04-01'
    ) sh ON m.id_mahasiswa = sh.id_mahasiswa
    WHERE m.id_mahasiswa = 1197
) a 
JOIN (
    SELECT m.id_mahasiswa,  COUNT(sh.wkt_tapping) AS jml
    FROM mahasiswa m
    LEFT JOIN (
        SELECT s.id_mahasiswa,  s.wkt_tapping
        FROM shalat s
        WHERE s.tanggal = '2018-04-06'
    ) sh ON m.id_mahasiswa = sh.id_mahasiswa
    WHERE m.id_mahasiswa = 1197
) b


------------------------------------------------------------- SHALAT BY WAKTU SHALAT ------------------------------------------------------------


-- shalat by waktu shalat ikhtisar (WORK)
SELECT s.wkt_shalat, COUNT(s.wkt_tapping) AS total, t.jtgl, h.jmhs,
(t.jtgl*h.jmhs) AS target1,
(p.jplg*h.jmhs) AS jplg,
u.jmlu,
(t.jtgl*h.jmhs)-(p.jplg*h.jmhs)-u.jmlu AS target2,
ROUND(((((COUNT(s.wkt_tapping))/((t.jtgl*h.jmhs)-(p.jplg*h.jmhs)-u.jmlu))*100)),2) AS nilai
FROM shalat s
JOIN (
    SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jtgl
    FROM shalat s 
) t
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m 
) h
LEFT JOIN (
    SELECT jp.wkt_shalat, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    GROUP BY jp.wkt_shalat
) p ON s.wkt_shalat = p.wkt_shalat
LEFT JOIN (
    SELECT su.wkt_shalat, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su
    WHERE su.disetujui = 1
    GROUP BY su.wkt_shalat
) u ON s.wkt_shalat = u.wkt_shalat
GROUP BY s.wkt_shalat
ORDER BY s.wkt_tapping


-- shalat by waktu shalat detail (WORK)
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, 
sh.total,
DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1 AS jtgl,
h.jmhs,
(DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*h.jmhs As target1,
IF(p.id_periode IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg,
IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)) AS jpmhs,
IF(j.jplg IS NULL, 0, j.jplg) AS jplg,
(IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg) AS total_jplg,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*h.jmhs)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))) AS target2,
ROUND((((sh.total)/(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*h.jmhs)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
FROM shalat_periode sp
LEFT JOIN (
    SELECT s.id_periode, COUNT(s.wkt_tapping) AS total
    FROM shalat s
    WHERE s.wkt_shalat = 'dzuhur'
    GROUP BY s.id_periode
) sh ON sp.id_periode = sh.id_periode
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m 
) h
LEFT JOIN (
    SELECT jp.id_periode, jp.j_kelamin
    FROM j_pulang2 jp 
    GROUP BY jp.id_periode
) p ON sp.id_periode = p.id_periode
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Akhwat'
) a
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Ikhwan'
) i
LEFT JOIN (
    SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    WHERE jp.wkt_shalat = 'dzuhur'
    GROUP BY jp.id_periode
) j ON sp.id_periode = j.id_periode
LEFT JOIN (
    SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su
    WHERE su.wkt_shalat = 'dzuhur' AND su.disetujui = 1
    GROUP BY su.id_periode
) u ON sp.id_periode = u.id_periode

-- shalat by waktu shalat detail percentage (WORK)
SELECT a.nilai AS a, b.nilai AS b, 
ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS 'percent'
FROM (
    SELECT ROUND((SUM(a.nilai)/p.jml),2) AS nilai
    FROM (
        SELECT ROUND((((sh.total)/((d.jhari*mh.jmhs*5)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*(IF(j.jplg IS NULL, 0, j.jplg)))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
        FROM shalat_periode sp
        LEFT JOIN (
            SELECT sp.id_periode, DATEDIFF(sp.tanggal_sampai, sp.tanggal_dari)+1 AS jhari
            FROM shalat_periode sp
        ) d ON sp.id_periode = d.id_periode
        LEFT JOIN (
            SELECT s.id_periode, COUNT(s.wkt_tapping) AS total
            FROM shalat s
            GROUP BY s.id_periode
        ) sh ON sp.id_periode = sh.id_periode
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS jmhs
            FROM mahasiswa m 
        ) mh
        LEFT JOIN (
            SELECT jp.id_periode, jp.j_kelamin
            FROM j_pulang2 jp 
            GROUP BY jp.id_periode
        ) p ON sp.id_periode = p.id_periode
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Akhwat'
        ) a
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Ikhwan'
        ) i
        LEFT JOIN (
            SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
            FROM j_pulang2 jp
            GROUP BY jp.id_periode
        ) j ON sp.id_periode = j.id_periode
        LEFT JOIN (
            SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
            FROM shalat_udzur2 su
            WHERE su.disetujui = 1
            GROUP BY su.id_periode
        ) u ON sp.id_periode = u.id_periode    
    ) a
    JOIN (
        SELECT COUNT(sp.id_periode) AS jml
        FROM shalat_periode sp
    ) p
) a 
JOIN (
    SELECT ROUND((SUM(b.nilai)/p.jml),2) AS nilai
    FROM (
        SELECT ROUND((((sh.total)/(((DATEDIFF(sp.tanggal_sampai,sp.tanggal_dari)+1)*h.jmhs)-((IF(p.id_periode IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
        FROM shalat_periode sp
        LEFT JOIN (
            SELECT s.id_periode, COUNT(s.wkt_tapping) AS total
            FROM shalat s
            WHERE s.wkt_shalat = 'dzuhur'
            GROUP BY s.id_periode
        ) sh ON sp.id_periode = sh.id_periode
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS jmhs
            FROM mahasiswa m 
        ) h
        LEFT JOIN (
            SELECT jp.id_periode, jp.j_kelamin
            FROM j_pulang2 jp 
            GROUP BY jp.id_periode
        ) p ON sp.id_periode = p.id_periode
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Akhwat'
        ) a
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Ikhwan'
        ) i
        LEFT JOIN (
            SELECT jp.id_periode, COUNT(jp.wkt_shalat) AS jplg
            FROM j_pulang2 jp
            WHERE jp.wkt_shalat = 'dzuhur'
            GROUP BY jp.id_periode
        ) j ON sp.id_periode = j.id_periode
        LEFT JOIN (
            SELECT su.id_periode, COUNT(su.wkt_shalat) AS jmlu
            FROM shalat_udzur2 su
            WHERE su.wkt_shalat = 'dzuhur' AND su.disetujui = 1
            GROUP BY su.id_periode
        ) u ON sp.id_periode = u.id_periode    
    ) b
    JOIN (
        SELECT COUNT(sp.id_periode) AS jml
        FROM shalat_periode sp
    ) p
) b


-- shalat by waktu shalat by period (WORK)
SELECT s.tanggal, COUNT(s.wkt_tapping) AS total,
h.jmhs, 
h.jmhs*1 AS target1,
IF(p.tanggal IS NULL, '-', (CASE WHEN p.j_kelamin = 'Akhwat' THEN 'Akhwat' ELSE 'Ikhwan' END)) AS plg,
IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)) AS jpmhs,
IF(j.jplg IS NULL, 0, j.jplg) AS jplg,
(IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg) AS total_jplg,
IF(u.jmlu IS NULL, 0, u.jmlu) AS jmlu,
(h.jmhs*1)-((IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu)) AS target2,
ROUND((((COUNT(s.wkt_tapping))/((h.jmhs*1)-((IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
FROM shalat s 
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m 
) h
LEFT JOIN (
    SELECT jp.tanggal, jp.j_kelamin
    FROM j_pulang2 jp 
    GROUP BY jp.tanggal
) p ON s.tanggal = p.tanggal
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Akhwat'
) a
JOIN (
    SELECT COUNT(m.id_mahasiswa) AS plg
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Ikhwan'
) i
LEFT JOIN (
    SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg
    FROM j_pulang2 jp
    WHERE jp.wkt_shalat = 'shubuh'
    GROUP BY jp.tanggal
) j ON s.tanggal = j.tanggal
LEFT JOIN (
    SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu
    FROM shalat_udzur2 su
    WHERE su.wkt_shalat = 'shubuh' AND su.disetujui = 1
    GROUP BY su.tanggal
) u ON s.tanggal = u.tanggal
WHERE s.id_periode = 8 AND s.wkt_shalat = 'shubuh'
GROUP BY s.tanggal



-- shalat by waktu shalat by period percentage (WORK)
SELECT a.nilai AS a, b.nilai AS b, 
ROUND((((b.nilai-a.nilai)/a.nilai)*100),2) AS 'percent'
FROM (
    SELECT ROUND((SUM(a.nilai)/j.jhari),2) AS nilai
    FROM (
        SELECT ROUND((((COUNT(s.wkt_tapping))/((h.jmhs*1)-((IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
        FROM shalat s 
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS jmhs
            FROM mahasiswa m 
        ) h
        LEFT JOIN (
            SELECT jp.tanggal, jp.j_kelamin
            FROM j_pulang2 jp 
            GROUP BY jp.tanggal
        ) p ON s.tanggal = p.tanggal
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Akhwat'
        ) a
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Ikhwan'
        ) i
        LEFT JOIN (
            SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg
            FROM j_pulang2 jp
            WHERE jp.wkt_shalat = 'isya'
            GROUP BY jp.tanggal
        ) j ON s.tanggal = j.tanggal
        LEFT JOIN (
            SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu
            FROM shalat_udzur2 su
            WHERE su.wkt_shalat = 'isya' AND su.disetujui = 1
            GROUP BY su.tanggal
        ) u ON s.tanggal = u.tanggal
        WHERE s.id_periode = 4 AND s.wkt_shalat = 'isya'
        GROUP BY s.tanggal    
    ) a
    JOIN (
        SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jhari
        FROM shalat s
        WHERE s.id_periode = 4
    ) j
) a 
JOIN (
    SELECT ROUND((SUM(b.nilai)/j.jhari),2) AS nilai
    FROM (
        SELECT ROUND((((COUNT(s.wkt_tapping))/((h.jmhs*1)-((IF(p.tanggal IS NULL, 0, (CASE WHEN p.j_kelamin = 'Akhwat' THEN a.plg ELSE i.plg END)))*IF(j.jplg IS NULL, 0, j.jplg))-(IF(u.jmlu IS NULL, 0, u.jmlu))))*100),2) AS nilai
        FROM shalat s 
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS jmhs
            FROM mahasiswa m 
        ) h
        LEFT JOIN (
            SELECT jp.tanggal, jp.j_kelamin
            FROM j_pulang2 jp 
            GROUP BY jp.tanggal
        ) p ON s.tanggal = p.tanggal
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Akhwat'
        ) a
        JOIN (
            SELECT COUNT(m.id_mahasiswa) AS plg
            FROM mahasiswa m
            WHERE m.j_kelamin = 'Ikhwan'
        ) i
        LEFT JOIN (
            SELECT jp.tanggal, COUNT(jp.wkt_shalat) AS jplg
            FROM j_pulang2 jp
            WHERE jp.wkt_shalat = 'isya'
            GROUP BY jp.tanggal
        ) j ON s.tanggal = j.tanggal
        LEFT JOIN (
            SELECT su.tanggal, COUNT(su.wkt_shalat) AS jmlu
            FROM shalat_udzur2 su
            WHERE su.wkt_shalat = 'isya' AND su.disetujui = 1
            GROUP BY su.tanggal
        ) u ON s.tanggal = u.tanggal
        WHERE s.id_periode = 5 AND s.wkt_shalat = 'isya'
        GROUP BY s.tanggal    
    ) b
    JOIN (
        SELECT DATEDIFF(MAX(s.tanggal),MIN(s.tanggal))+1 AS jhari
        FROM shalat s
        WHERE s.id_periode = 5
    ) j
) b


-- shalat by waktu shalat by day (WORK)
SELECT m.id_mahasiswa, m.nama, sh.tap
FROM mahasiswa m 
LEFT JOIN (
    SELECT s.id_mahasiswa, s.wkt_tapping AS tap
    FROM shalat s 
    WHERE s.tanggal = '2018-03-19' AND s.wkt_shalat = 'shubuh'
) sh ON m.id_mahasiswa = sh.id_mahasiswa


-- shalat by waktu shalat by day percentage (WORK)
SELECT a.jml AS a, b.jml AS b, 
ROUND((((b.jml-a.jml)/a.jml)*100),2) AS 'percent'
FROM (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    WHERE s.tanggal = '2018-03-04' AND s.wkt_shalat = 'shubuh'
    GROUP BY s.tanggal 
) a 
JOIN (
    SELECT s.tanggal, COUNT(s.wkt_tapping) AS jml 
    FROM shalat s
    WHERE s.tanggal = '2018-03-05' AND s.wkt_shalat = 'shubuh'
    GROUP BY s.tanggal 
) b

----------------------------------------------------------------------------------- J_talim and shalat 

-- Ta'lim WORK
SELECT a.id_mahasiswa, a.j_kelamin, a.id_periode, a.tanggal, a.wkt_tapping, a.talim
FROM (
    SELECT s.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim
    FROM shalat s
    LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
    WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt)
    AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt)    
) a
INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim
ORDER BY a.id_mahasiswa, a.tanggal


-- Ta'lim j_talim UNION talim = Ta'lim DB (WORK)
( 
    SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim 
    FROM ( 
        SELECT s.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim 
        FROM shalat s 
        LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
        WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) 
    ) a 
    INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim 
    ORDER BY a.id_mahasiswa, a.tanggal 
) 
UNION ALL 
( 
    SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim 
    FROM talim t 
    LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa 
)


-- Nilai Ta'lim by Mahasiswa (WORK)
SELECT m.id_mahasiswa, m.nama, m.j_kelamin, COUNT(b.talim) AS total, c.target,
ROUND((((COUNT(b.talim))/c.target)*100),2) AS nilai
FROM (
    SELECT m.id_mahasiswa, m.nama, m.j_kelamin
    FROM mahasiswa m 
) m
LEFT JOIN (
    ( 
        SELECT a.tanggal, a.id_periode, a.id_mahasiswa, a.j_kelamin, a.wkt_tapping, a.talim 
        FROM ( 
            SELECT m.id_mahasiswa, m.j_kelamin, s.id_periode, s.tanggal, s.wkt_tapping, s.wkt_shalat AS talim 
            FROM mahasiswa m
            LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa
            WHERE s.tanggal IN (SELECT jt.tanggal FROM j_talim jt) AND s.wkt_shalat IN (SELECT jt.talim FROM j_talim jt) 
        ) a 
        INNER JOIN j_talim jt ON a.j_kelamin = jt.j_kelamin AND a.tanggal = jt.tanggal AND a.talim = jt.talim 
        ORDER BY a.id_mahasiswa, a.tanggal 
    ) 
    UNION ALL 
    ( 
        SELECT t.tanggal, t.id_periode, t.id_mahasiswa, m.j_kelamin, t.wkt_talim AS wkt_tapping, t.talim 
        FROM talim t 
        LEFT JOIN mahasiswa m ON t.id_mahasiswa = m.id_mahasiswa 
    )    
) b ON m.id_mahasiswa = b.id_mahasiswa
LEFT JOIN (
    SELECT jt.j_kelamin, COUNT(jt.talim) AS target
    FROM j_talim jt
    GROUP BY jt.j_kelamin    
) c ON m.j_kelamin = c.j_kelamin
GROUP BY b.id_mahasiswa 