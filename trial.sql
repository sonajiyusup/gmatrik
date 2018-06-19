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


-- shalat wajib berdasarkan ikhwan/akhwat (WORK !, )
SELECT m.j_kelamin AS 'I/A', COUNT(s.wkt_tapping) AS total, jk.jmhs, g.jmltgl, g.jplg, g.jmltgl-g.jplg AS jhari,
jk.jmhs*(g.jmltgl-g.jplg)*5 AS target,
ROUND(((COUNT(s.wkt_tapping)/(jk.jmhs*(g.jmltgl-g.jplg)*5))*100),2) AS nilai
FROM mahasiswa m 
LEFT JOIN shalat s ON m.id_mahasiswa = s.id_mahasiswa
LEFT JOIN (
    SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jmhs 
    FROM mahasiswa m
    GROUP BY m.j_kelamin
) jk ON m.j_kelamin = jk.j_kelamin
LEFT JOIN (
    SELECT m.j_kelamin,
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
    GROUP BY m.j_kelamin     
) g ON m.j_kelamin = g.j_kelamin
GROUP BY m.j_kelamin

-- shalat wajib berdasarkan ikhwan/akhwat detail
SELECT sp.id_periode, sp.tanggal_dari, sp.tanggal_sampai, COUNT(s.wkt_tapping) AS total, j.jmhs, 
ROUND(((COUNT(s.wkt_tapping)/j.jmhs)),2) AS rtotal,
sp.jws_akhwat AS target,
ROUND(((((COUNT(s.wkt_tapping)/j.jmhs))/sp.jws_akhwat)*100),2) AS nilai
FROM shalat_periode sp
LEFT JOIN shalat s ON sp.id_periode = s.id_periode
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
LEFT JOIN (
    SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Akhwat'
) j ON m.j_kelamin = j.j_kelamin
WHERE m.j_kelamin = 'Akhwat'
GROUP BY sp.id_periode

-- shalat wajib berdasarkan ikhwan/akhwat detail (different nila1 nilai2 calc version)
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

-- shalat wajib berdasarkan ikhwan/akhwat detail by period
SELECT s.tanggal, COUNT(s.wkt_tapping) AS total, j.jmhs, j.jmhs*5 AS target, ROUND(((COUNT(s.wkt_tapping)/(j.jmhs*5))*100),2) AS nilai
FROM shalat s
LEFT JOIN mahasiswa m ON s.id_mahasiswa = m.id_mahasiswa
LEFT JOIN (
    SELECT m.j_kelamin, COUNT(m.id_mahasiswa) AS jmhs
    FROM mahasiswa m
    WHERE m.j_kelamin = 'Akhwat'
) j ON m.j_kelamin = j.j_kelamin
WHERE m.j_kelamin = 'Akhwat' AND s.id_periode = 4
GROUP BY s.tanggal

-- shalat wajib berdasarkan ikhwan/akhwat detail by period by day
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