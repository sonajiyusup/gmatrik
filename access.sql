-- MS Acess Query for shalat, id_mahasiswa
SELECT t.Badgenumber AS nim, Format(t.tanggal, 'yyyy-mm-dd') AS tgl, Format(TimeValue(Min(t.CHECKTIME))) As shubuh, Format(TimeValue(Min(d.CHECKTIME))) As dzuhur, Format(TimeValue(Min(a.CHECKTIME))) As ashar, Format(TimeValue(Min(m.CHECKTIME))) As maghrib, Format(TimeValue(Min(i.CHECKTIME))) As isya
FROM ((((
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ua.userid, ua.Badgenumber, CHECKTIME 
	FROM CHECKINOUT ca
	LEFT JOIN USERINFO ua ON ca.userid = ua.userid 
	WHERE (Format(DateValue(ca.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(ca.CHECKTIME))  BETWEEN '04.00.00' AND '07.00.00') AND (ua.Badgenumber LIKE '18*')	
)t
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ub.userid, ub.Badgenumber, CHECKTIME 
	FROM CHECKINOUT cb 
	LEFT JOIN USERINFO ub ON cb.userid = ub.userid 
	WHERE (Format(DateValue(cb.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(cb.CHECKTIME))  BETWEEN '12.00.00' AND '14.00.00') AND (ub.Badgenumber LIKE '18*')		
)d ON (t.userid = d.userid) AND (t.tanggal = d.tanggal))
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, uc.userid, uc.Badgenumber, CHECKTIME 
	FROM CHECKINOUT cc 
	LEFT JOIN USERINFO uc ON cc.userid = uc.userid 
	WHERE (Format(DateValue(cc.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(cc.CHECKTIME))  BETWEEN '15.00.00' AND '17.35.00') AND (uc.Badgenumber LIKE '18*')		
)a ON (t.userid = a.userid) AND (t.tanggal = a.tanggal))
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ud.userid, ud.Badgenumber, CHECKTIME 
	FROM CHECKINOUT cd 
	LEFT JOIN USERINFO ud ON cd.userid = ud.userid 
	WHERE (Format(DateValue(cd.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(cd.CHECKTIME))  BETWEEN '18.00.00' AND '18.45.00') AND (ud.Badgenumber LIKE '18*')		
)m ON (t.userid = m.userid) AND (t.tanggal = m.tanggal))
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ue.userid, ue.Badgenumber, CHECKTIME 
	FROM CHECKINOUT ce 
	LEFT JOIN USERINFO ue ON ce.userid = ue.userid 
	WHERE (Format(DateValue(ce.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(ce.CHECKTIME))  BETWEEN '19.00.00' AND '21.45.00') AND (ue.Badgenumber LIKE '18*')		
)i ON (t.userid = i.userid) AND (t.tanggal = i.tanggal)
GROUP BY t.userid, t.tanggal, ua.Badgenumber 
ORDER BY t.userid, t.tanggal


-- MS Acess Query for shalat, id_mahasiswa
SELECT t.Badgenumber AS nim, Format(t.tanggal, 'yyyy-mm-dd') AS tgl, Format(TimeValue(Min(t.CHECKTIME))) As shubuh, Format(TimeValue(Min(d.CHECKTIME))) As dzuhur, Format(TimeValue(Min(a.CHECKTIME))) As ashar, Format(TimeValue(Min(m.CHECKTIME))) As maghrib, Format(TimeValue(Min(i.CHECKTIME))) As isya
FROM ((((
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ua.userid, ua.Badgenumber, CHECKTIME 
	FROM CHECKINOUT ca
	LEFT JOIN USERINFO ua ON ca.userid = ua.userid 
	WHERE (Format(DateValue(ca.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '$from' AND '2018-11-17') AND (Format(TimeValue(ca.CHECKTIME))  BETWEEN '$shubuhFrom' AND '$shubuhTo') AND (ua.Badgenumber LIKE '$angkatan%')	
)t
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ub.userid, ub.Badgenumber, CHECKTIME 
	FROM CHECKINOUT cb 
	LEFT JOIN USERINFO ub ON cb.userid = ub.userid 
	WHERE (Format(DateValue(cb.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '$from' AND '$to') AND (Format(TimeValue(cb.CHECKTIME))  BETWEEN '$dzuhurFrom' AND '$dzuhurTo') AND (ub.Badgenumber LIKE '$angkatan%')		
)d ON (t.userid = d.userid) AND (t.tanggal = d.tanggal))
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, uc.userid, uc.Badgenumber, CHECKTIME 
	FROM CHECKINOUT cc 
	LEFT JOIN USERINFO uc ON cc.userid = uc.userid 
	WHERE (Format(DateValue(cc.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '$from' AND '$to') AND (Format(TimeValue(cc.CHECKTIME))  BETWEEN '$asharFrom' AND '$asharTo') AND (uc.Badgenumber LIKE '$angkatan%')		
)a ON (t.userid = a.userid) AND (t.tanggal = a.tanggal))
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ud.userid, ud.Badgenumber, CHECKTIME 
	FROM CHECKINOUT cd 
	LEFT JOIN USERINFO ud ON cd.userid = ud.userid 
	WHERE (Format(DateValue(cd.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '$from' AND '$to') AND (Format(TimeValue(cd.CHECKTIME))  BETWEEN '$maghribFrom' AND '$maghribTo') AND (ud.Badgenumber LIKE '$angkatan%')		
)m ON (t.userid = m.userid) AND (t.tanggal = m.tanggal))
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ue.userid, ue.Badgenumber, CHECKTIME 
	FROM CHECKINOUT ce 
	LEFT JOIN USERINFO ue ON ce.userid = ue.userid 
	WHERE (Format(DateValue(ce.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '$from' AND '$to') AND (Format(TimeValue(ce.CHECKTIME))  BETWEEN '$isyaFrom' AND '$isyaTo') AND (ue.Badgenumber LIKE '$angkatan%')		
)i ON (t.userid = i.userid) AND (t.tanggal = i.tanggal)
GROUP BY t.userid, t.tanggal, ua.Badgenumber 
ORDER BY t.userid, t.tanggal



SELECT ps.nim, m.nama, SUM(ps.shubuh+ps.dzuhur+ps.ashar+ps.maghrib+ps.isya) As total
FROM presensi_shalat ps
LEFT JOIN mahasiswa m ON ps.nim = m.nim
WHERE ps.nim = 18101002 AND tanggal BETWEEN '2018-11-16' AND '2018-11-17'
GROUP BY ps.nim