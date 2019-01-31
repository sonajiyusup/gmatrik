CREATE TABLE `users` (
  `id_user` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_default` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `terakhir_login` datetime DEFAULT NULL
) ENGINE=InnoDB


CREATE TABLE `adminmatrikulasi` (
  `id_adminmatrikulasi` int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  foreign key(id_user) references users(id_user)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `pembina_mahasiswa` (
  `id_pembina` int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gelar` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `kota_asal` varchar(25) NOT NULL,
  `telepon` varchar(13) DEFAULT NULL
) ENGINE=InnoDB


CREATE TABLE `mahasiswa` (
  `nim` int(8) PRIMARY KEY NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_pembina` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `angkatan` int(2) NOT NULL,
  `kota_asal` varchar(25) NOT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `aktif` int(1) NOT NULL,
  foreign key(id_user) references users(id_user),
  foreign key(id_pembina) references pembina_mahasiswa(id_pembina)
) ENGINE=InnoDB


CREATE TABLE `pimpinan` (
  `id_pimpinan` int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  foreign key(id_user) references users(id_user)
) ENGINE=InnoDB


CREATE TABLE `semester` (
  `id_semester` int(3) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `angkatan` int(2) NOT NULL,
  `semester` int(1) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL
) ENGINE=InnoDB


CREATE TABLE `pekan` (
  `id_pekan` int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_semester` int(1) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL,
  foreign key(id_semester) references semester(id_semester)
) ENGINE=InnoDB


CREATE TABLE `jadwal_pulang` (
  `id_pekan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `shubuh` int(1) NOT NULL,
  `dzuhur` int(1) NOT NULL,
  `ashar` int(1) NOT NULL,
  `maghrib` int(1) NOT NULL,
  `isya` int(1) NOT NULL,
  foreign key(id_pekan) references pekan(id_pekan)
) ENGINE=InnoDB


CREATE TABLE `presensi_shalat` (
  `nim` int(8) NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `shubuh` int(1) NOT NULL,
  `dzuhur` int(1) NOT NULL,
  `ashar` int(1) NOT NULL,
  `maghrib` int(1) NOT NULL,
  `isya` int(1) NOT NULL,
  foreign key(nim) references mahasiswa(nim),
  foreign key(id_pekan) references pekan(id_pekan)
) ENGINE=InnoDB


CREATE TABLE `tahsin` (
  `id_tahsin` int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_pekan` int(5) NOT NULL,
  `id_pembina` int(5) NOT NULL,
  `tahsin` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  foreign key(id_pekan) references pekan(id_pekan),
  foreign key(id_pembina) references pembina_mahasiswa(id_pembina)
) ENGINE=InnoDB


CREATE TABLE `udzur_tahsin` (
  `id_udzur` int(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_tahsin` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL,
  `direview` datetime NOT NULL,
  foreign key(id_tahsin) references tahsin(id_tahsin),
  foreign key(nim) references mahasiswa(nim)
) ENGINE=InnoDB


CREATE TABLE `talim` (
  `id_talim` int(5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `id_pembina` int(5) NOT NULL,
  `talim` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  foreign key(id_pekan) references pekan(id_pekan),
  foreign key(id_pembina) references pembina_mahasiswa(id_pembina)
) ENGINE=InnoDB


CREATE TABLE `udzur_talim` (
  `id_udzur` int(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_talim` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL,
  `direview` datetime NOT NULL,
  foreign key(id_talim) references talim(id_talim),
  foreign key(nim) references mahasiswa(nim)
) ENGINE=InnoDB


CREATE TABLE `udzur_shalat` (
  `id_udzur` int(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nim` int(8) NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_shalat` varchar(7) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL,
  `direview` datetime NOT NULL,
  foreign key(id_pekan) references pekan(id_pekan),
  foreign key(nim) references mahasiswa(nim)
) ENGINE=InnoDB


CREATE TABLE `presensi_tahsin` (
  `id_tahsin` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  foreign key(id_tahsin) references tahsin(id_tahsin),
  foreign key(nim) references mahasiswa(nim)
) ENGINE=InnoDB


CREATE TABLE `presensi_talim` (
  `id_talim` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  foreign key(id_talim) references talim(id_talim),
  foreign key(nim) references mahasiswa(nim)
) ENGINE=InnoDB