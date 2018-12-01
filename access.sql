-- MS Acess Query for shalat, id_mahasiswa
SELECT t.userid AS id_mahasiswa, Format(t.tanggal, 'yyyy-mm-dd') AS tgl, Format(TimeValue(Min(t.CHECKTIME))) As shubuh, Format(TimeValue(Min(d.CHECKTIME))) As dzuhur, Format(TimeValue(Min(a.CHECKTIME))) As ashar, Format(TimeValue(Min(m.CHECKTIME))) As maghrib, Format(TimeValue(Min(i.CHECKTIME))) As isya
FROM ((((
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ua.userid, ua.Badgenumber, CHECKTIME 
	FROM CHECKINOUT ca
	LEFT JOIN USERINFO ua ON ca.userid = ua.userid 
	WHERE (Format(DateValue(ca.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(ca.CHECKTIME))  BETWEEN '04:00:00' AND '06:00:00') AND (ua.Badgenumber LIKE '18*')	
)t
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ub.userid, ub.Badgenumber, CHECKTIME 
	FROM CHECKINOUT cb 
	LEFT JOIN USERINFO ub ON cb.userid = ub.userid 
	WHERE (Format(DateValue(cb.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(cb.CHECKTIME))  BETWEEN '12:00:00' AND '13:00:00') AND (ub.Badgenumber LIKE '18*')		
)d ON (t.userid = d.userid) AND (t.tanggal = d.tanggal))
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, uc.userid, uc.Badgenumber, CHECKTIME 
	FROM CHECKINOUT cc 
	LEFT JOIN USERINFO uc ON cc.userid = uc.userid 
	WHERE (Format(DateValue(cc.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(cc.CHECKTIME))  BETWEEN '15:00:00' AND '16:30:00') AND (uc.Badgenumber LIKE '18*')		
)a ON (t.userid = a.userid) AND (t.tanggal = a.tanggal))
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ud.userid, ud.Badgenumber, CHECKTIME 
	FROM CHECKINOUT cd 
	LEFT JOIN USERINFO ud ON cd.userid = ud.userid 
	WHERE (Format(DateValue(cd.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(cd.CHECKTIME))  BETWEEN '18:00:00' AND '18:45:00') AND (ud.Badgenumber LIKE '18*')		
)m ON (t.userid = m.userid) AND (t.tanggal = m.tanggal))
LEFT JOIN (
	SELECT Format(DateValue(CHECKTIME)) As tanggal, Format(TimeValue(CHECKTIME)) As tapping, ue.userid, ue.Badgenumber, CHECKTIME 
	FROM CHECKINOUT ce 
	LEFT JOIN USERINFO ue ON ce.userid = ue.userid 
	WHERE (Format(DateValue(ce.CHECKTIME), 'yyyy-mm-dd')  BETWEEN '2018-11-16' AND '2018-11-17') AND (Format(TimeValue(ce.CHECKTIME))  BETWEEN '19:00:00' AND '19:50:00') AND (ue.Badgenumber LIKE '18*')		
)i ON (t.userid = i.userid) AND (t.tanggal = i.tanggal)
GROUP BY t.userid, t.tanggal, ua.Badgenumber 
ORDER BY t.userid, t.tanggal