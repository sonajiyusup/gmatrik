-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Mei 2018 pada 09.20
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `j_kelamin` varchar(15) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(35) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id_admin`, `nama`, `j_kelamin`, `tgl_lahir`, `email`, `telp`, `avatar`, `id_user`) VALUES
(1, 'Yodi Yanwar', 'Laki-laki', '1994-12-13', 'yodi.yanwar@tazkia.ac.id', '0816616350', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminmatrik`
--

CREATE TABLE `adminmatrik` (
  `id_adminmatrik` int(3) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `j_kelamin` varchar(15) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `adminmatrik`
--

INSERT INTO `adminmatrik` (`id_adminmatrik`, `nama`, `telp`, `email`, `j_kelamin`, `tgl_lahir`, `id_user`, `avatar`) VALUES
(2, 'Derry', '085637242', 'derry@tazkia.ac.id', 'Laki-laki', '1987-01-02', 2, 'os_x_el_capitan-wallpaper-1366x768.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_calonbinaan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_calonbinaan` (
`id_user` int(11)
,`id_mahasiswa` int(11)
,`nim` int(11)
,`nama` varchar(35)
,`j_kelamin` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_mahasiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_mahasiswa` (
`nama` varchar(35)
,`nim` int(11)
,`id_mahasiswa` int(11)
,`id_user` int(11)
,`j_kelamin` varchar(15)
,`last_login` datetime
,`password` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_user` (
`id_user` int(11)
,`username` varchar(30)
,`password` varchar(50)
,`password_default` int(1)
,`level` int(11)
,`last_login` datetime
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `j_kelamin` varchar(15) DEFAULT NULL,
  `asalkota` varchar(20) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `angkatan`, `j_kelamin`, `asalkota`, `email`, `telp`, `avatar`, `tgl_lahir`, `id_user`) VALUES
(1174, 17101003, 'Hanapi Muslim', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 33),
(1175, 17102002, 'Ibnu Hibban Hartono', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 34),
(1176, 17101004, 'Salma Dliya Fuady', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 35),
(1177, 17101005, 'Hilwa Fitri Millenia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 36),
(1178, 17102003, 'Mas Ichsan Nurhayati', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 37),
(1179, 17104002, 'Aisyah As-salafiyah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 38),
(1180, 17101006, 'Luthfia Luhuringkania', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 39),
(1181, 17101007, 'Regina Zahra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 40),
(1182, 17101008, 'Faizah Taufik', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 41),
(1183, 17101010, 'Nur Jamilah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 42),
(1184, 17102004, 'Salma Nabilah Salsabil', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 43),
(1185, 17102005, 'Wardatul Fadhilah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 44),
(1186, 17103001, 'Meilisa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 45),
(1187, 17103002, 'Zahra Shafira', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 46),
(1188, 17101009, 'Muyassaroh', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 47),
(1189, 17101011, 'Zafarina Zati Hulwani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 48),
(1190, 17101012, 'Putri Ananda', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 49),
(1191, 17102006, 'Rasyifa Salsabilla', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 50),
(1192, 17102007, 'Nurma Hermila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 51),
(1193, 17102008, 'Melati Hasna Abidah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 52),
(1194, 17102009, 'Salsabila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 53),
(1195, 17102010, 'Sakinah Zahra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 54),
(1196, 17102011, 'Fannia Mauludiyah Fachru', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 55),
(1197, 17103003, 'Adila Nur Islamiaty', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 56),
(1198, 17101013, 'Ella Wandania', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 57),
(1199, 17101014, 'Nur Kintan Maharani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 58),
(1200, 17101015, 'Asri Nurazhari Putrimant', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 59),
(1201, 17101016, 'Mala Mareta', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 60),
(1202, 17102012, 'Maulida Nur Safitri', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 61),
(1203, 17102013, 'Tasya Aulia Damayanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 62),
(1204, 17102014, 'Fajriati Noer Hidayah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 63),
(1205, 17102015, 'Mutya Nurya Ningsih', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 64),
(1206, 17101017, 'Atika Sundari', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 65),
(1207, 17101018, 'Asphia Sahiba', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 66),
(1208, 17101019, 'Salsabila Putri Sekar Ut', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 67),
(1209, 17101020, 'Sabrina Elsa Firdatul Ja', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 68),
(1210, 17101021, 'Rahmi Muflihah Abroni', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 69),
(1211, 17101022, 'Sintia Monica', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 70),
(1212, 17101023, 'Anisah Afifah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 71),
(1213, 17101024, 'Dinda Nur Maulidah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 72),
(1214, 17101025, 'Syanindita Ananda Riana', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 73),
(1215, 17101026, 'Zahidah Rahmah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 74),
(1216, 17101027, 'Rika Ra\'idah Dwicahyani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 75),
(1217, 17101028, 'Wahyuni Utami', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 76),
(1218, 17101029, 'Nabila Kinanty Aqilla', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 77),
(1219, 17101030, 'Maida Fitri Yani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 78),
(1220, 17101031, 'Syifa Qolbi Amalia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 79),
(1221, 17101032, 'Nurul \'Izzah Addiini', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 80),
(1222, 17101033, 'Nur Halimah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 81),
(1223, 17101034, 'Mutiara Lailla Ramadhini', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 82),
(1224, 17101035, 'Sausan Raniah Asy Syahid', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 83),
(1225, 17101036, 'Nafira Fitri Ayu Widadar', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 84),
(1226, 17101037, 'Hanifah Salsabilla', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 85),
(1227, 17102016, 'Fatimah Tuzzahroh', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 86),
(1228, 17102017, 'Sekar Rizky Amalia Suher', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 87),
(1229, 17102018, 'Dara Ayu Kusuma Ningrum', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 88),
(1230, 17102019, 'Eka Nursyahfitri', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 89),
(1231, 17103004, 'Ayu Dini Hastuti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 90),
(1232, 17103005, 'Nur Azizah Pulungan', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 91),
(1233, 17103006, 'Syahila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 92),
(1234, 17101044, 'Alma Widiyanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 93),
(1235, 17101043, 'Hana Raisa Fahira', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 94),
(1236, 17102022, 'Adinda Salsabila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 95),
(1237, 17102023, 'Luthfiah Khairunisa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 96),
(1238, 17104003, 'Naimatul Kurniah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 97),
(1239, 17102021, 'Arda Prawi Agustanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 98),
(1240, 17101041, 'Felia Rizkiana', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 99),
(1241, 17101042, 'Ghina Lintang Azizah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 100),
(1242, 17103007, 'Lisa Anita Pratiwi', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 101),
(1243, 17101040, 'Alin Duani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 102),
(1244, 17103008, 'Syara Nur Fatimah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 103),
(1245, 17102020, 'Dwika Noviana', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 104),
(1246, 17101039, 'Nurul Ramdhany', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 105),
(1247, 17101038, 'Assyifa Nur Aziza', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 106),
(1248, 17103010, 'Rahmaiola Raissa Aziza', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 107),
(1249, 17101055, 'Rossdinna Nurul Rizqi', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 108),
(1250, 17101054, 'Fiki Hijjatun Nada', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 109),
(1251, 17102027, 'Adilia Nurul Zahra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 110),
(1252, 17101052, 'Haanii Haritsa Yuzen', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 111),
(1253, 17101053, 'Hilga Hanistya Saputri', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 112),
(1254, 17101050, 'Jenny Ananda', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 113),
(1255, 17104005, 'Fifi Afiah Luqman', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 114),
(1256, 17101051, 'Mufidah Amalia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 115),
(1257, 17101049, 'Rihaadatul Aisyi', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 116),
(1258, 17102026, 'Desy Norma Safira', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 117),
(1259, 17104004, 'Annastasha Wahyuningtyas', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 118),
(1260, 17101048, 'Rhifa Azzahra Salsabila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 119),
(1261, 17102025, 'Indah Alfiarna', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 120),
(1262, 17101047, 'Aulia Nur Asyifa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 121),
(1263, 17101046, 'Fitria Novianti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 122),
(1264, 17101045, 'Zakia Chairani Ayudia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 123),
(1265, 17102024, 'Syifa Aini Puspaning Dew', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 124),
(1266, 17103013, 'Rufatulalawiah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 125),
(1267, 17102030, 'Nur Ihsannisaa Riyadi', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 126),
(1268, 17101056, 'Nawarendra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 127),
(1269, 17103014, 'Nur Laila Madinatul Qoir', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 128),
(1270, 17103012, 'Cita Rizki Ananda', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 129),
(1271, 17102029, 'Azifatul Hasanah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 130),
(1272, 17103009, 'Suci Fauziah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 131),
(1273, 17103011, 'Ummu Kaltsum', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 132),
(1274, 17102028, 'Salma Rahiimi', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 133),
(1275, 17103018, 'Jihan Noer Evian', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 134),
(1276, 17102035, 'Nabila Ramadiana', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 135),
(1277, 17101070, 'Ashilah Raihanah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 136),
(1278, 17101072, 'Maulida Jihan Aulia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 137),
(1279, 17101071, 'Hana Nur Ratih', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 138),
(1280, 17101069, 'Nabilah Ghalisani Fildza', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 139),
(1281, 17102034, 'Rihadatul Aisyi', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 140),
(1282, 17103017, 'Afta Rizky Amalia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 141),
(1283, 17103016, 'Wening Tyas Nur Anissa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 142),
(1284, 17101068, 'Farah Hafizhatun Nisa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 143),
(1285, 17103015, 'Aidatul Afifah Isra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 144),
(1286, 17101067, 'Hasna Luthfi Khairunnisa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 145),
(1287, 17101065, 'Salma Shafira Salsabila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 146),
(1288, 17102033, 'Dias Hanifa Ardhanariswa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 147),
(1289, 17101066, 'Afifa Rahmi Ihsana', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 148),
(1290, 17104006, 'Adilah Lulu Aprilia Kusu', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 149),
(1291, 17102032, 'Safana Ishlah Madani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 150),
(1292, 17101064, 'Hana Azahra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 151),
(1293, 17101061, 'Amalia Hanifah Latief', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 152),
(1294, 17101063, 'Luthfiah Siti Sarah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 153),
(1295, 17101062, 'Salma Qurrata A', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 154),
(1296, 17101060, 'Irma Rahmani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 155),
(1297, 17101059, 'Hilda Hidayatul Muwafaqo', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 156),
(1298, 17102031, 'Firyal Arina Salsabila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 157),
(1299, 17101058, 'Tiara Fatihah Ramadhanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 158),
(1300, 17101057, 'Annisa Mutia Ruza', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 159),
(1301, 17101077, 'Hidayatul Azqia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 160),
(1302, 17101075, 'Aryawati', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 161),
(1303, 17101074, 'Aulia Azka', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 162),
(1304, 17101073, 'Irena Siti Dzahrah Putri', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 163),
(1305, 17103022, 'Anisa Nanda Faisjal', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 164),
(1306, 17102037, 'Yunita Surya Pratiwi', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 165),
(1307, 17102038, 'Mayang Nirwana', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 166),
(1308, 17103021, 'Raehan Fadila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 167),
(1309, 17103020, 'Annisa Syahidah Mujahida', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 168),
(1310, 17101079, 'Nila Hidayatunnisak', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 169),
(1311, 17102036, 'Hani Khairo Amalia N.a', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 170),
(1312, 17103019, 'Ririn Riani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 171),
(1313, 17102040, 'Nandya Ahlus Sanah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 172),
(1314, 17102039, 'Tia Anggraeni Nurdiana', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 173),
(1315, 17101080, 'Mawatu Shalihah Kaily', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 174),
(1316, 17101081, 'Baiq Damayanti Azhar Put', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 175),
(1317, 17102047, 'Anisa Irma Suryani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 176),
(1318, 17103025, 'Indah Oktaviola', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 177),
(1319, 17102046, 'Umulia Safitri', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 178),
(1320, 17101086, 'Leli Irma Suryani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 179),
(1321, 17101088, 'Salma Fatimah Az-zahra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 180),
(1322, 17102045, 'Ania Iqrima Azalia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 181),
(1323, 17101087, 'Isnafauziahbiljannah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 182),
(1324, 17103024, 'Nurul Hakim Dwi Yanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 183),
(1325, 17102044, 'Riyadotul Mustamiah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 184),
(1326, 17101085, 'Afini Dwina Andarini', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 185),
(1327, 17101083, 'Riqotu Fuadatuddiniyah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 186),
(1328, 17102043, 'Aulia Salsabila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 187),
(1329, 17101084, 'Dea Nabilah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 188),
(1330, 17102042, 'Sofiya Nadhifah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 189),
(1331, 17102041, 'Baiq Fathia Zulfahmia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 190),
(1332, 17103023, 'Muti\'ah Azizah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 191),
(1333, 17101082, 'Solehah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 192),
(1334, 17104007, 'Shofi Luthfiana', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 193),
(1335, 17103028, 'Farah Alia Intania Kamil', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 194),
(1336, 17102051, 'Utsman Abdul Hakim', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 195),
(1337, 17101089, 'Izzati Luthfiyya', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 196),
(1338, 17102050, 'Rukiyah Hasibuan', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 197),
(1339, 17102049, 'Novia Lestari', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 198),
(1340, 17101091, 'Vira Asriani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 199),
(1341, 17103026, 'Leniari', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 200),
(1342, 17101076, 'Baiq Putri Nabila', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 201),
(1343, 17102048, 'Nur Khodijah Khairani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 202),
(1344, 17102053, 'Ismah Choirunnisa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 203),
(1345, 17101090, 'Dini Khoerunisa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 204),
(1346, 17101095, 'Mustova Karim', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 205),
(1347, 17103030, 'Jougie Maulana Triadi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 206),
(1348, 17101093, 'Haikal Fernanda', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 207),
(1349, 17103029, 'Muhammad Rouman Affan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 208),
(1350, 17101092, 'Firza Faadhilah Arifian', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 209),
(1351, 17102054, 'Aulia Zahra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 210),
(1352, 17101103, 'Farid Hidayatullah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 211),
(1353, 17102052, 'Defender Khoufarobbi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 212),
(1354, 17101102, 'Ridwan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 213),
(1355, 17101098, 'Muhamad Rizky Maulana', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 214),
(1356, 17101101, 'Arland Pratama Wijaya', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 215),
(1357, 17101099, 'Affa\' Mahdi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 216),
(1358, 17101100, 'M Haekal Fajrul Falah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 217),
(1359, 17101097, 'Abyan Rakhman', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 218),
(1360, 17101094, 'Aza Priambada', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 219),
(1361, 17101096, 'Fauzan Hanif Sukma Pramo', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 220),
(1362, 17101106, 'Muhammad Syahri Ramadani', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 221),
(1363, 17101104, 'Imaduddin Dwi Hananto', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 222),
(1364, 17101118, 'Fahmi Marjuki', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 223),
(1365, 17101117, 'Zubeir Abdul Wahid Chan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 224),
(1366, 17102060, 'Ghulam Hadi Al Fatah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 225),
(1367, 17103033, 'Syafii Bin Kadaryono Haf', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 226),
(1368, 17101116, 'Muhamad Lutfi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 227),
(1369, 17102058, 'Aziz Rachmadji', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 228),
(1370, 17101115, 'Noviyandi Difa Pratama', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 229),
(1371, 17103032, 'Eki', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 230),
(1372, 17101113, 'Sesa Afrian Yahya', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 231),
(1373, 17101111, 'Muhamad Solehudin', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 232),
(1374, 17102057, 'Muh Fathul Mubaraq Ss', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 233),
(1375, 17101114, 'Yody Nur Rachmat', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 234),
(1376, 17101112, 'Zahid Ahmad', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 235),
(1377, 17101109, 'Arta Saiful Hilmi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 236),
(1378, 17101110, 'Muhammad Rafi\' Firdaus', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 237),
(1379, 17102055, 'Poltak Fathirisi Nurlam', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 238),
(1380, 17102056, 'Yazid Azam', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 239),
(1381, 17103031, 'Luqman Aulia Rizky', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 240),
(1382, 17101108, 'Aziz Guntur Purnamaputra', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 241),
(1383, 17101107, 'Wildan Maulid Hanafi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 242),
(1384, 17101105, 'Arman Fadil Maulana', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 243),
(1385, 17102062, 'Ramadhani', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 244),
(1386, 17102063, 'Fuadhli Rahman Katam', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 245),
(1387, 17102059, 'Lalu Arya Pringgadani', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 246),
(1388, 17102061, 'Agung Prasetyo Wibowo', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 247),
(1389, 17101127, 'Hanif Dwi Putra', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 248),
(1390, 17101128, 'Zulfitra Hadianto Palwam', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 249),
(1391, 17101124, 'Lalu Rizky Adriansyah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 250),
(1392, 17101126, 'Difan Nurhafidzar Juanda', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 251),
(1393, 17103037, 'Muhammad Syihabudin', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 252),
(1394, 17103036, 'Miftah Azmi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 253),
(1395, 17101123, 'Farras Mubasysyirsyah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 254),
(1396, 17102065, 'Muhammad Islam Assidiq', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 255),
(1397, 17101122, 'Ahlam Nabila', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 256),
(1398, 17101119, 'Fikri Abdurrohman Maajid', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 257),
(1399, 17103035, 'Asril Suwandi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 258),
(1400, 17101121, 'Khalel Mohammed Amar', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 259),
(1401, 17103034, 'Taufik Nur Maarif', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 260),
(1402, 17101120, 'Alif Limka Firdaus', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 261),
(1403, 17102064, 'Naufal Al Baqir', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 262),
(1404, 17101135, 'Ibnu Rasyid Hamidi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 263),
(1405, 17103040, 'Ganang Abi Rafianto', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 264),
(1406, 17103039, 'Muhammad Abdillah Dhafaq', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 265),
(1407, 17101133, 'Naufal Ahmad', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 266),
(1408, 17101134, 'Muhammad Zacky Makarim S', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 267),
(1409, 17101132, 'Muhammad Fathan Farizan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 268),
(1410, 17101130, 'L. M. Cahya Kurnia Harma', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 269),
(1411, 17102068, 'Muhammad Ismail', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 270),
(1412, 17101131, 'Labib Ulwan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 271),
(1413, 17102067, 'Muhammad Raihan Alfathi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 272),
(1414, 17102066, 'Muhammad Fadlil Kirom', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 273),
(1415, 17101125, 'Edo Abdulrahim Fattah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 274),
(1416, 17101129, 'Moh Ala Furqoni', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 275),
(1417, 17103038, 'Muh. Rifky Irsyadi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 276),
(1418, 17102078, 'Putra Muhammad Riawan Pa', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 277),
(1419, 17103046, 'Ghaznawie Ihyamukti', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 278),
(1420, 17101157, 'Naufal Raditya Krisna', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 279),
(1421, 17101154, 'Faatihan Aulia Azwin', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 280),
(1422, 17102077, 'Khalid Syaifulhaq', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 281),
(1423, 17104008, 'Hilmi Taqiyyudin Aufa', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 282),
(1424, 17101156, 'Hafisz Maulana Rasjid', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 283),
(1425, 17101155, 'Muhammad Haniful Amin', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 284),
(1426, 17101153, 'Hilmy Fikri', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 285),
(1427, 17102076, 'Rakha Aditama Iskandar', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 286),
(1428, 17101152, 'Miftah Faruq Nugraha', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 287),
(1429, 17103044, 'Tariq Mukhlisin', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 288),
(1430, 17102075, 'Muhammad Bukhari Muslim', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 289),
(1431, 17101151, 'Irvan Riyansyah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 290),
(1432, 17102074, 'Abdul Latif', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 291),
(1433, 17103045, 'Ghazi Ahmad', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 292),
(1434, 17101148, 'Abdullah Haidar', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 293),
(1435, 17102073, 'Farhan Anshori', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 294),
(1436, 17101150, 'Muhammad Puji Pangestu', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 295),
(1437, 17101149, 'Muhammad Rizki Sinar Ila', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 296),
(1438, 17101147, 'Falah Ageng Pakerti', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 297),
(1439, 17101146, 'Iza Fais Saputra', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 298),
(1440, 17102072, 'Muhammad Ivan Firmansyah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 299),
(1441, 17101145, 'Muhammad Angga Abdullah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 300),
(1442, 17103043, 'Abdurrahman Kholish', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 301),
(1443, 17101142, 'Reynaldi Wahab', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 302),
(1444, 17102071, 'Rafi\' Muttaqin', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 303),
(1445, 17101144, 'Muhammad Ananda Fajar', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 304),
(1446, 17101143, 'Moch. Lukmannul Hakim', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 305),
(1447, 17101141, 'Ramadhana Devandani Enti', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 306),
(1448, 17101140, 'Adam Nurdiansyah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 307),
(1449, 17102069, 'Muhammad Zain Ghojali', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 308),
(1450, 17103041, 'Ilham Akbar', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 309),
(1451, 17101139, 'Juan Fadri Ramdhani', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 310),
(1452, 17101138, 'Herdy Almadiptha Rahman', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 311),
(1453, 17103042, 'Ilham Zulkarami Aslam', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 312),
(1454, 17102070, 'Maulana Rizky Septiaji', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 313),
(1455, 17101137, 'Muhammad Denito Bastian', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 314),
(1456, 17101136, 'Muhammad Faisal', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 315),
(1457, 17101166, 'Nurrahman Wira Aji', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 316),
(1458, 17101165, 'Zuhdi Anjari Tigara', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 317),
(1459, 17101164, 'Muhammad.daffa As-syauqi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 318),
(1460, 17101163, 'Billy Muhammad Fadilah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 319),
(1461, 17103048, 'Ahmad Kariim Robbani', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 320),
(1462, 17101162, 'Hariz Ilmam Husnan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 321),
(1463, 17102081, 'Yonasya Esa Kautsarizki', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 322),
(1464, 17102080, 'Perdana Priambudi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 323),
(1465, 17101161, 'Baso Ratulangi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 324),
(1466, 17103047, 'Lalu Satria Prayuda', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 325),
(1467, 17102079, 'M. Angga Haryadi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 326),
(1468, 17101159, 'Ridwan Hasyim', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 327),
(1469, 17101160, 'Rizal Muhammad Fauzan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 328),
(1470, 17104009, 'Ahmad Atiq Abqari', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 329),
(1471, 17101158, 'Muhammad Nasyith Sholahu', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 330),
(1472, 17101176, 'Muhammad Fadhil Mujahid', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 331),
(1473, 17101175, 'Rayhan Pasa Aryandra', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 332),
(1474, 17102083, 'Tedy Zainul Muttaqin Ibn', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 333),
(1475, 17102082, 'Mochamad Ridho Fahlefi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 334),
(1476, 17101174, 'Muhammad Fitriana Hasan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 335),
(1477, 17101171, 'Ferdi Wijaya', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 336),
(1478, 17101172, 'Risang Muhammad', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 337),
(1479, 17101173, 'Muahmmad Hafidz Fathoni', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 338),
(1480, 17101167, 'Moh.yanis Yosfiah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 339),
(1481, 17101170, 'Azmi Syahid', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 340),
(1482, 17101169, 'Indra Wijaya', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 341),
(1483, 17101168, 'Ilham Akbar Ramadhan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 342),
(1484, 17101180, 'Dimas Adektama', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 343),
(1485, 17101179, 'Adi Pahlevi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 344),
(1486, 17102085, 'Nanda Wahyu Noerkamal', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 345),
(1487, 17101178, 'M. Ridwan Saufi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 346),
(1488, 17102084, 'Abid Rahmatullah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 347),
(1489, 17103049, 'Reno Meizanggi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 348),
(1490, 17101177, 'Muhammad Diaz Advani', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 349),
(1491, 17101182, 'Renaldi Septiawan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 350),
(1492, 17101183, 'Ilham Muhammad Ghifari', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 351),
(1493, 17102086, 'Orde Leo Al Fathur', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 352),
(1494, 17101181, 'M.farid', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 353),
(1495, 17101184, 'Ramadan Arudi Satyagraha', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 354),
(1496, 17101185, 'Muhammad Iqbal', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 355),
(1497, 17101187, 'Ahmad Hilmi Jamaludin', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 356),
(1498, 17101189, 'Muhammad Farhan Maulana', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 357),
(1499, 17101188, 'Azka Muharam', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 358),
(1500, 17103052, 'Zidan Muhammad Qushay', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 359),
(1501, 17104010, 'Taufiq Ismail', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 360),
(1502, 17101186, 'Nabil Nur Salsabil', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 361),
(1503, 17103050, 'Akmal Mahira Setiawan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 362),
(1504, 17102087, 'Muhammad Faishal Hilman', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 363),
(1505, 17101190, 'Muhammad Rasyid Ridha', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 364),
(2010, 17102088, 'Faliza Hafidhotul F', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 365),
(2029, 17101225, 'Afka Qoriyanto', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 366),
(2030, 17101217, 'Alfariq Riansyah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 367),
(2031, 17101216, 'Anto Wijaya', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 368),
(2032, 17101210, 'Eko Saputra', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 369),
(2033, 17101223, 'Fahri', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 370),
(2034, 17101221, 'Febby Kurniawan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 371),
(2035, 17101219, 'Holili', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 372),
(2036, 17101226, 'Imam', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 373),
(2037, 17101220, 'Jodi Prasetyo', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 374),
(2038, 17102095, 'M Rizal', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 375),
(2039, 17101208, 'Muhamad Arjum', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 376),
(2040, 17103053, 'Rahmanda', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 377),
(2041, 17102091, 'Rangga Wijaya', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 378),
(2042, 17103057, 'Rayzandy Gunawan', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 379),
(2043, 17101204, 'Renaldi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 380),
(2044, 17101212, 'Riyan Erwinsyah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 381),
(2045, 17101211, 'Robi Permana', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 382),
(2046, 17102093, 'Saptiadi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 383),
(2047, 17101233, 'Qomardiansyah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 384),
(2048, 17101195, 'Mikal Mufid Asdika', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 385),
(2049, 17101203, 'Jihad Nabil Rafif Mahdi', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 386),
(2051, 17101193, 'Feydhul Qodir Muwaffaq', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 387),
(2052, 17101192, 'Rangga Adithiya', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 388),
(2053, 17101207, 'Ashmita Merry Anggreini', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 389),
(2054, 17102090, 'Asih Purminta', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 390),
(2055, 17101227, 'Ayu Lestari', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 391),
(2056, 17101229, 'Dessy Kurnia Ramadhanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 392),
(2057, 17102094, 'Dwi Eldia Oktaviani', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 393),
(2058, 17101214, 'Eka Pratiwi', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 394),
(2059, 17103060, 'Fitri Nursari', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 395),
(2060, 17101228, 'Gressy Aurellia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 396),
(2061, 17103061, 'Holmi', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 397),
(2062, 17101231, 'Ismi Yati Azis', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 398),
(2063, 17101230, 'Kana Nurrohma', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 399),
(2064, 17101209, 'Kirana Dewi Nouriand', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 400),
(2065, 17103054, 'Lilis Diana', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 401),
(2066, 17101218, 'Maemunah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 402),
(2067, 17101222, 'Omiyuka', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 403),
(2068, 17103056, 'Ovi Tri Astuti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 404),
(2069, 17102092, 'Putri Faradiba', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 405),
(2070, 17104011, 'Rana Wulandari', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 406),
(2071, 17101224, 'Rini Anggreni', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 407),
(2072, 17103055, 'Riska Wijayanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 408),
(2073, 17103059, 'Sifa Aprilia', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 409),
(2074, 17101232, 'Silvia Afri Wulanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 410),
(2075, 17101206, 'Sumaria', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 411),
(2076, 17101215, 'Surni Meiyanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 412),
(2077, 17103058, 'Tina Fitasari', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 413),
(2078, 17101205, 'Yulisandri', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 414),
(2079, 17101213, 'Yusriyanti', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 415),
(2080, 17101194, 'Elisa', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 416),
(2081, 17102089, 'Nabila Farha', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 417),
(2082, 17103062, 'Sella Septiani K', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 418),
(2083, 17103051, 'Juheri', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 419);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_binaan`
--

CREATE TABLE `m_binaan` (
  `id_mhsbinaan` int(11) NOT NULL,
  `id_pembina` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_binaan`
--

INSERT INTO `m_binaan` (`id_mhsbinaan`, `id_pembina`, `id_mahasiswa`) VALUES
(47, 29, 1470),
(48, 29, 1382),
(49, 29, 1353),
(50, 29, 1405),
(51, 29, 1174),
(52, 29, 1423),
(53, 29, 1426),
(54, 29, 1450),
(55, 29, 1492),
(56, 29, 1362),
(57, 29, 1428),
(58, 29, 1475),
(59, 29, 1355),
(60, 29, 1373),
(61, 29, 1441),
(62, 29, 1414),
(63, 29, 1496),
(64, 29, 1440),
(65, 29, 1495),
(66, 29, 2052),
(67, 29, 1489),
(68, 29, 1443),
(69, 29, 1401),
(70, 29, 1383),
(71, 29, 1437),
(72, 30, 1432),
(73, 30, 1434),
(74, 30, 1356),
(75, 30, 1360),
(76, 30, 1460),
(77, 30, 1371),
(78, 30, 1361),
(79, 30, 1348),
(80, 30, 2049),
(81, 30, 1466),
(82, 30, 1406),
(83, 30, 1454),
(84, 30, 1416),
(85, 30, 1490),
(86, 30, 1504),
(87, 30, 1413),
(88, 30, 1505),
(89, 30, 1393),
(90, 30, 1486),
(91, 30, 1491),
(92, 30, 1469),
(93, 30, 1367),
(94, 30, 1336),
(95, 30, 1380),
(96, 30, 1376),
(97, 18, 1442),
(98, 18, 1488),
(99, 18, 1399),
(100, 18, 1484),
(101, 18, 1415),
(102, 18, 1386),
(103, 18, 2034),
(104, 18, 1419),
(105, 18, 1451),
(106, 18, 1412),
(107, 18, 1387),
(108, 18, 1410),
(109, 18, 1391),
(110, 18, 1430),
(111, 18, 1459),
(112, 18, 1456),
(113, 18, 1436),
(114, 18, 1444),
(115, 18, 1447),
(116, 18, 2044),
(117, 18, 2045),
(118, 18, 1501),
(119, 18, 1375),
(120, 18, 1500),
(121, 18, 1458),
(122, 18, 1390),
(123, 27, 1503),
(124, 27, 1465),
(125, 27, 1421),
(126, 27, 1438),
(127, 27, 1352),
(128, 27, 1395),
(129, 27, 1433),
(130, 27, 1424),
(131, 27, 1462),
(132, 27, 1175),
(133, 27, 1404),
(134, 27, 1483),
(135, 27, 1347),
(137, 27, 2048),
(138, 27, 1449),
(139, 27, 1455),
(140, 27, 1498),
(141, 27, 1471),
(142, 27, 1407),
(143, 27, 1457),
(144, 27, 1354),
(145, 27, 1474),
(146, 27, 1365),
(147, 27, 1409),
(148, 21, 1357),
(149, 21, 1461),
(150, 21, 1384),
(151, 21, 1369),
(152, 21, 1364),
(153, 21, 1477),
(154, 21, 2051),
(155, 21, 1350),
(156, 21, 1453),
(157, 21, 1439),
(158, 21, 1422),
(159, 21, 1381),
(160, 21, 1494),
(161, 21, 1368),
(162, 21, 1445),
(163, 21, 1472),
(164, 21, 1476),
(165, 21, 1425),
(166, 21, 1378),
(167, 21, 1408),
(168, 21, 1403),
(169, 21, 1420),
(170, 21, 1379),
(171, 21, 1427),
(172, 24, 1448),
(173, 24, 1481),
(174, 24, 1435),
(175, 24, 1398),
(176, 24, 1366),
(177, 24, 1389),
(178, 24, 1452),
(179, 24, 1467),
(180, 24, 1394),
(181, 24, 1374),
(182, 24, 1417),
(183, 24, 1479),
(184, 24, 1480),
(185, 24, 1464),
(186, 24, 1418),
(187, 24, 1372),
(188, 24, 1463),
(189, 24, 1446),
(190, 23, 1359),
(191, 23, 1485),
(192, 23, 1388),
(193, 23, 1497),
(194, 23, 1402),
(195, 23, 1392),
(196, 23, 1363),
(197, 23, 1482),
(198, 23, 1431),
(199, 23, 2083),
(200, 23, 1400),
(201, 23, 1358),
(202, 23, 1396),
(203, 23, 1487),
(204, 23, 1502),
(205, 23, 1370),
(206, 23, 1468),
(207, 23, 1478),
(208, 23, 1429),
(209, 20, 1397),
(210, 20, 1377),
(211, 20, 2032),
(212, 20, 1411),
(213, 20, 1349),
(214, 20, 1493),
(215, 20, 1385),
(216, 20, 1473),
(217, 32, 2029),
(218, 32, 2030),
(219, 32, 2031),
(220, 32, 2033),
(221, 32, 2035),
(222, 32, 2036),
(223, 32, 2037),
(224, 32, 2038),
(225, 32, 2039),
(226, 32, 2047),
(227, 32, 2040),
(228, 32, 2041),
(229, 32, 2042),
(230, 32, 2043),
(231, 32, 2046),
(232, 22, 1259),
(233, 22, 2054),
(234, 22, 1328),
(235, 22, 2055),
(236, 22, 1271),
(237, 22, 1229),
(238, 22, 2056),
(239, 22, 1335),
(240, 22, 1311),
(241, 22, 1341),
(242, 22, 1294),
(243, 22, 1193),
(244, 22, 1332),
(245, 22, 1276),
(246, 22, 1313),
(247, 22, 1269),
(248, 22, 2067),
(249, 22, 2068),
(250, 22, 2069),
(251, 22, 1216),
(252, 22, 1312),
(253, 22, 2073),
(254, 22, 1265),
(255, 22, 1220),
(256, 33, 1326),
(257, 33, 1300),
(258, 33, 1309),
(259, 33, 1302),
(260, 33, 1247),
(261, 33, 1231),
(262, 33, 1230),
(263, 33, 1240),
(264, 33, 1255),
(265, 33, 1292),
(266, 33, 1297),
(267, 33, 1219),
(268, 33, 1256),
(269, 33, 1192),
(270, 33, 1257),
(271, 33, 1176),
(272, 33, 1228),
(273, 33, 1214),
(274, 33, 1299),
(275, 33, 1185),
(276, 33, 1215),
(277, 33, 1187),
(278, 33, 1264),
(279, 25, 1197),
(280, 25, 1285),
(281, 25, 1331),
(282, 25, 2060),
(283, 25, 1261),
(284, 25, 1237),
(285, 25, 1186),
(286, 25, 1205),
(287, 25, 1218),
(288, 25, 1232),
(289, 25, 1222),
(290, 25, 1191),
(291, 25, 1291),
(292, 25, 1195),
(293, 25, 1287),
(294, 25, 1330),
(295, 25, 1211),
(296, 25, 2076),
(297, 25, 1233),
(298, 25, 1340),
(299, 34, 1179),
(300, 34, 1305),
(301, 34, 2053),
(302, 34, 2080),
(303, 34, 1182),
(304, 34, 1284),
(305, 34, 1241),
(306, 34, 1235),
(307, 34, 1226),
(308, 34, 1301),
(309, 34, 2061),
(310, 34, 2062),
(311, 34, 2064),
(312, 34, 1242),
(313, 34, 1180),
(314, 34, 1188),
(315, 34, 1238),
(316, 34, 1267),
(317, 34, 1281),
(318, 34, 2082),
(319, 34, 1272),
(320, 34, 1306),
(321, 34, 1270),
(322, 35, 1207),
(323, 35, 1200),
(324, 35, 1206),
(325, 35, 1316),
(326, 35, 1258),
(327, 35, 1288),
(328, 35, 1198),
(329, 35, 1204),
(330, 35, 1250),
(331, 35, 1252),
(332, 35, 1296),
(333, 35, 1344),
(334, 35, 1201),
(335, 35, 1307),
(336, 35, 2081),
(337, 35, 1324),
(338, 35, 1260),
(339, 35, 2071),
(340, 35, 1194),
(342, 35, 1333),
(343, 35, 1314),
(344, 35, 1319),
(345, 35, 1217),
(346, 36, 1282),
(347, 36, 1234),
(348, 36, 1277),
(349, 36, 1351),
(350, 36, 1345),
(351, 36, 2058),
(352, 36, 2010),
(353, 36, 1196),
(354, 36, 1298),
(355, 36, 2059),
(356, 36, 1263),
(357, 36, 1323),
(358, 36, 1278),
(359, 36, 1339),
(360, 36, 1183),
(361, 36, 1343),
(362, 36, 1246),
(363, 36, 1210),
(364, 36, 1325),
(365, 36, 1249),
(366, 36, 1338),
(367, 36, 1244),
(368, 36, 1203),
(369, 37, 1236),
(370, 37, 1322),
(371, 37, 1303),
(372, 37, 1329),
(373, 37, 1245),
(374, 37, 1227),
(375, 37, 1279),
(376, 37, 1177),
(377, 37, 1318),
(378, 37, 2063),
(379, 37, 1308),
(380, 37, 1248),
(381, 37, 1181),
(382, 37, 1327),
(383, 37, 2072),
(384, 37, 1209),
(385, 37, 1321),
(386, 37, 1295),
(387, 37, 1274),
(388, 37, 1334),
(389, 37, 2074),
(390, 37, 2077),
(391, 37, 1283),
(392, 38, 1293),
(393, 38, 1212),
(394, 38, 1213),
(395, 38, 1286),
(396, 38, 1253),
(397, 38, 1337),
(398, 38, 2065),
(399, 38, 2066),
(400, 38, 1202),
(401, 38, 1223),
(402, 38, 1199),
(403, 38, 1190),
(404, 38, 2070),
(405, 38, 1266),
(406, 38, 1224),
(407, 38, 2075),
(408, 38, 1273),
(409, 38, 2079),
(410, 38, 1189),
(411, 38, 2078),
(412, 39, 1290),
(413, 39, 1251),
(414, 39, 1289),
(415, 39, 1243),
(416, 39, 1317),
(417, 39, 1239),
(418, 39, 1262),
(419, 39, 1342),
(420, 39, 2057),
(421, 39, 1304),
(422, 39, 1254),
(423, 39, 1275),
(424, 39, 1320),
(425, 39, 1178),
(426, 39, 1315),
(427, 39, 1280),
(428, 39, 1225),
(429, 39, 1268),
(430, 39, 1310),
(431, 39, 1221),
(432, 39, 1184),
(433, 39, 1208),
(434, 24, 1346),
(435, 23, 1499);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paksi`
--

CREATE TABLE `paksi` (
  `id_paksi` int(11) NOT NULL,
  `id_pbentuk` int(11) DEFAULT NULL,
  `nama_aksi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paksi`
--

INSERT INTO `paksi` (`id_paksi`, `id_pbentuk`, `nama_aksi`) VALUES
(3, 1, 'mencuri'),
(4, 1, 'miras'),
(5, 1, 'narkoba'),
(6, 1, 'pornografi'),
(7, 1, 'pornoaksi'),
(8, 1, 'zina'),
(9, 3, 'merokok'),
(10, 3, 'membawa rokok'),
(11, 2, 'Berpacaran'),
(12, 9, 'Pamer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbentuk`
--

CREATE TABLE `pbentuk` (
  `id_pbentuk` int(11) NOT NULL,
  `nama_bentuk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pbentuk`
--

INSERT INTO `pbentuk` (`id_pbentuk`, `nama_bentuk`) VALUES
(1, 'Melakukan perbuatan maksiat yang dapat mencemarkan nama baik pribadi dan\r\natau STEI TAZKIA'),
(2, 'Berkhalwat'),
(3, 'merokok'),
(4, 'Rokok'),
(7, 'Adab'),
(8, 'Sopan Santun'),
(9, 'Sombong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembina`
--

CREATE TABLE `pembina` (
  `id_pembina` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `j_kelamin` varchar(15) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `gelar` varchar(10) DEFAULT NULL,
  `asalkota` varchar(20) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembina`
--

INSERT INTO `pembina` (`id_pembina`, `nama`, `j_kelamin`, `tgl_lahir`, `gelar`, `asalkota`, `email`, `telp`, `avatar`, `id_user`) VALUES
(18, 'Bintang Pamuncak', 'Ikhwan', '2017-01-01', 'S.Ei', 'Semarang', 'bintang@tazkia.ac.id', '0859473235', NULL, 21),
(20, 'Rizky Akbar Cholilullah', 'Ikhwan', '2017-12-13', 'S.Ei', 'Pekalongan', 'rizky_akbar@tazkia.ac.id', '0816384924', NULL, 24),
(21, 'Rian Alfiansyah', 'Ikhwan', '2017-12-20', 'S.Ei', 'Tasikmalaya', 'rian@tazkia.ac.id', '0856483922', NULL, 25),
(22, 'Adita Dyah Asokawati', 'Akhwat', '2017-12-28', 'S.E', 'Bogor', 'adita@tazkia.ac.id', '08127384924', NULL, 26),
(23, 'Riyan Ariyandi', 'Ikhwan', '2017-12-08', 'S.Pd', 'Riau', 'riyan.ariyandi@tazkia.ac.id', '0812474829', NULL, 27),
(24, 'Rizqan Abadi', 'Ikhwan', '2017-12-22', 'S.Pd', 'Lombok', 'rizqan@tazkia.ac.id', '0857382844', NULL, 28),
(25, 'Shofi Arofatul Marits', 'Akhwat', '2017-12-11', 'S.E', 'Palembang', 'sofi@tazkia.ac.id', '0896473824', NULL, 29),
(26, 'Diva Azka Karimah', 'Akhwat', '2017-12-13', 'S.E', 'Jakarta', 'diva@tazkia.ac.id', '0812758382', NULL, 30),
(27, 'Nashrudin Al-Huda', 'Ikhwan', '2017-12-01', 'S.E', 'Semarang', 'huda@tazkia.ac.id', '0856738232', NULL, 31),
(29, 'Abdul Hamid', 'Ikhwan', '2015-05-01', 'Lc', 'Solo', 'abdul.hamid@tazkia.ac.id', '0816542364', NULL, 420),
(30, 'Akbar', 'Ikhwan', '2018-05-05', 'S.E.I', 'Padang', 'akbar@tazkia.ac.id', '0896421774', NULL, 421),
(32, 'Lalu Alvin Fahrezi', 'Ikhwan', '2016-04-10', 'S.Akun', 'Bogor', 'alvin@tazkia.ac.id', '0812562156', NULL, 423),
(33, 'Dina Maharani', 'Akhwat', '2018-02-03', 'S.Akun', 'Sukabumi', 'dina@tazkia.ac.id', '0858212354', NULL, 424),
(34, 'Fuadatul Istiqomah', 'Akhwat', '2017-01-20', 'S.Pd', 'Semarang', 'fuadatul@tazkia.ac.id', '0812654862', NULL, 425),
(35, 'Hikmah Hidayati', 'Akhwat', '2017-03-10', 'S.Pd', 'Sukabumi', 'hikmah@tazkia.ac.id', '0857132456', NULL, 426),
(36, 'Lilik Hardianti', 'Akhwat', '2018-05-03', 'S.Si', 'Banten', 'lilik@tazkia.ac.id', '08536422164', NULL, 427),
(37, 'Linawati', 'Akhwat', '2017-03-31', 'S.H', 'Bogor', 'lina@tazkia.ac.id', '08964255764', NULL, 428),
(38, 'Siti Rabia Mutia Amali', 'Akhwat', '2018-05-04', 'S.H', 'Jakarta', 'rabia@tazkia.ac.id', '08974662143', NULL, 429),
(39, 'Sitti Rajab HS', 'Akhwat', '2018-05-02', 'M.Si', 'Banten', 'rajab@tazkia.ac.id', '08123644656', NULL, 430);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(11) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `j_kelamin` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `planjut`
--

CREATE TABLE `planjut` (
  `id_planjut` int(11) NOT NULL,
  `id_psanksi` int(11) DEFAULT NULL,
  `nama_tindaklanjut` varchar(50) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `planjut`
--

INSERT INTO `planjut` (`id_planjut`, `id_psanksi`, `nama_tindaklanjut`, `level`) VALUES
(1, NULL, 'Diberikan nasehat', 1),
(2, 1, 'Barang disita', 2),
(3, NULL, 'Anulir 5% Nilai Pembinaan', 3),
(4, 2, 'Anulir 10% Nilai Pembinaan', 4),
(5, 2, 'Anulir 20% Nilai Pembinaan', 5),
(6, NULL, 'Anulir 30% Nilai Pembinaan', 6),
(7, NULL, 'Diskors', 7),
(8, 3, 'Anulir 1 Semester Nilai Pembinaan', 8),
(9, 3, 'Anulir 2 Semester Nilai Pembinaan', 9),
(10, 3, 'Drop out', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pmain`
--

CREATE TABLE `pmain` (
  `id_pelanggaran` int(11) NOT NULL,
  `id_mhsbinaan` int(11) DEFAULT NULL,
  `id_pbentuk` int(11) DEFAULT NULL,
  `id_paksi` int(11) DEFAULT NULL,
  `id_psanksi` int(11) DEFAULT NULL,
  `id_planjut` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `psanksi`
--

CREATE TABLE `psanksi` (
  `id_psanksi` int(11) NOT NULL,
  `nama_sanksi` varchar(5) DEFAULT NULL,
  `bobot` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `psanksi`
--

INSERT INTO `psanksi` (`id_psanksi`, `nama_sanksi`, `bobot`) VALUES
(1, 'SP 1', 'Ringan'),
(2, 'SP 2', 'Menengah'),
(3, 'SP 3', 'Berat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shalat`
--

CREATE TABLE `shalat` (
  `id_mahasiswa` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `wkt_tapping` time DEFAULT NULL,
  `wkt_shalat` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_default` int(1) NOT NULL,
  `level` int(11) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `password_default`, `level`, `last_login`) VALUES
(1, 'admin', 'admin', 0, 0, '2018-04-24 08:58:28'),
(2, 'derry', 'bismillah', 0, 2, '2018-05-16 10:21:28'),
(21, 'bintang', 'bintang123', 0, 3, '2018-03-12 08:11:09'),
(23, 'hasan', 'hasan123', 0, 2, '2017-11-30 17:06:08'),
(24, 'rizky@tazkia.ac.id', 'rizy123', 0, 3, '0000-00-00 00:00:00'),
(25, 'rian', 'rian123', 0, 3, '2018-03-12 08:09:33'),
(26, 'adita', 'adita123', 0, 3, '2018-04-25 09:39:28'),
(27, 'riyan', 'riyan123', 0, 3, '2018-03-12 08:10:45'),
(28, 'rizqan', 'rizqan123', 0, 3, '0000-00-00 00:00:00'),
(29, 'sofi', 'sofi123', 0, 3, '2017-12-02 21:28:17'),
(30, 'diva', 'diva123', 0, 3, '0000-00-00 00:00:00'),
(31, 'huda', 'huda123', 0, 3, '2018-04-25 08:38:41'),
(33, '17101003', 'VGA52j6y2L', 1, 4, '0000-00-00 00:00:00'),
(34, '17102002', 'Ac81i17Hxc', 1, 4, '0000-00-00 00:00:00'),
(35, '17101004', 'ZSw0YK4jt8', 1, 4, '0000-00-00 00:00:00'),
(36, '17101005', 'D558xQ0U22', 1, 4, '0000-00-00 00:00:00'),
(37, '17102003', '014g8N7zT6', 1, 4, '0000-00-00 00:00:00'),
(38, '17104002', 's7s766DRGB', 1, 4, '0000-00-00 00:00:00'),
(39, '17101006', '3F07jK7zmw', 1, 4, '0000-00-00 00:00:00'),
(40, '17101007', 'eHRZfG1T25', 1, 4, '0000-00-00 00:00:00'),
(41, '17101008', '55kihAhUQ9', 1, 4, '0000-00-00 00:00:00'),
(42, '17101010', '91BcTp2mU8', 1, 4, '0000-00-00 00:00:00'),
(43, '17102004', 'EGlHi4IE2f', 1, 4, '0000-00-00 00:00:00'),
(44, '17102005', 'zei19hDzfP', 1, 4, '0000-00-00 00:00:00'),
(45, '17103001', '3vJ29A42Vd', 1, 4, '0000-00-00 00:00:00'),
(46, '17103002', '8fEUGYKor2', 1, 4, '0000-00-00 00:00:00'),
(47, '17101009', 'cHG7N7V83S', 1, 4, '0000-00-00 00:00:00'),
(48, '17101011', 'zrRE4N3C6f', 1, 4, '0000-00-00 00:00:00'),
(49, '17101012', 'JH9Y8pYyS6', 1, 4, '0000-00-00 00:00:00'),
(50, '17102006', 'MTxY1mtSb1', 1, 4, '0000-00-00 00:00:00'),
(51, '17102007', 'jil7T0RD79', 1, 4, '0000-00-00 00:00:00'),
(52, '17102008', '9JLFYsqKo2', 1, 4, '0000-00-00 00:00:00'),
(53, '17102009', '140s2x4k19', 1, 4, '0000-00-00 00:00:00'),
(54, '17102010', 'O01vCNlS29', 1, 4, '0000-00-00 00:00:00'),
(55, '17102011', 'b2B4MxZLUR', 1, 4, '0000-00-00 00:00:00'),
(56, '17103003', '3eGCvkkzv1', 1, 4, '0000-00-00 00:00:00'),
(57, '17101013', 'X454NIElQM', 1, 4, '0000-00-00 00:00:00'),
(58, '17101014', '3bX3Fv3SB8', 1, 4, '0000-00-00 00:00:00'),
(59, '17101015', '3QV9S5Tn7M', 1, 4, '0000-00-00 00:00:00'),
(60, '17101016', '23lTDlHRXk', 1, 4, '0000-00-00 00:00:00'),
(61, '17102012', 'Wgrqx1M042', 1, 4, '0000-00-00 00:00:00'),
(62, '17102013', '405TfihYk5', 1, 4, '0000-00-00 00:00:00'),
(63, '17102014', '27A65VN1IM', 1, 4, '0000-00-00 00:00:00'),
(64, '17102015', 'wjxn9iaMCI', 1, 4, '0000-00-00 00:00:00'),
(65, '17101017', 'bRVCSMOL42', 1, 4, '0000-00-00 00:00:00'),
(66, '17101018', 'F5k2Z0J68L', 1, 4, '0000-00-00 00:00:00'),
(67, '17101019', 'u415HnKT2z', 1, 4, '0000-00-00 00:00:00'),
(68, '17101020', 'C4o3dVv40d', 1, 4, '0000-00-00 00:00:00'),
(69, '17101021', 'rTCd7ga8rC', 1, 4, '0000-00-00 00:00:00'),
(70, '17101022', 'QKEwp2t9I1', 1, 4, '0000-00-00 00:00:00'),
(71, '17101023', 'P06o81Rpnx', 1, 4, '0000-00-00 00:00:00'),
(72, '17101024', '8ZimIXX8D3', 1, 4, '0000-00-00 00:00:00'),
(73, '17101025', 'b1IeZ25osS', 1, 4, '0000-00-00 00:00:00'),
(74, '17101026', 'pect28guc1', 1, 4, '0000-00-00 00:00:00'),
(75, '17101027', 'Bjj21q4U91', 1, 4, '0000-00-00 00:00:00'),
(76, '17101028', 'JAZqgDw0Df', 1, 4, '0000-00-00 00:00:00'),
(77, '17101029', 'S77W650Fnn', 1, 4, '0000-00-00 00:00:00'),
(78, '17101030', 'MsKnX9Ue4t', 1, 4, '0000-00-00 00:00:00'),
(79, '17101031', 'I3xI5kLDF5', 1, 4, '0000-00-00 00:00:00'),
(80, '17101032', 'XRYoG4256m', 1, 4, '0000-00-00 00:00:00'),
(81, '17101033', '40AK1p91jk', 1, 4, '0000-00-00 00:00:00'),
(82, '17101034', 'pQEkyNhh5o', 1, 4, '0000-00-00 00:00:00'),
(83, '17101035', 'WKXitT75Fh', 1, 4, '0000-00-00 00:00:00'),
(84, '17101036', '32TN9821G9', 1, 4, '0000-00-00 00:00:00'),
(85, '17101037', 'c1WnngG704', 1, 4, '0000-00-00 00:00:00'),
(86, '17102016', '42JE9rK8q8', 1, 4, '0000-00-00 00:00:00'),
(87, '17102017', '23708ux4eG', 1, 4, '0000-00-00 00:00:00'),
(88, '17102018', '683Z77PAfU', 1, 4, '0000-00-00 00:00:00'),
(89, '17102019', 'TK8J3jg2ox', 1, 4, '0000-00-00 00:00:00'),
(90, '17103004', '3Ih32s6nr4', 1, 4, '0000-00-00 00:00:00'),
(91, '17103005', '0t1y7eWXYm', 1, 4, '0000-00-00 00:00:00'),
(92, '17103006', 'q4VDQTl8s3', 1, 4, '0000-00-00 00:00:00'),
(93, '17101044', 'V57Qa452As', 1, 4, '0000-00-00 00:00:00'),
(94, '17101043', 'kdrsxmtoHa', 1, 4, '0000-00-00 00:00:00'),
(95, '17102022', 'fOBqWW1c7o', 1, 4, '0000-00-00 00:00:00'),
(96, '17102023', 'OGN5RQT0xT', 1, 4, '0000-00-00 00:00:00'),
(97, '17104003', '79XqmF3NEK', 1, 4, '0000-00-00 00:00:00'),
(98, '17102021', 'Hqx726cryn', 1, 4, '0000-00-00 00:00:00'),
(99, '17101041', '52u8hjjFHj', 1, 4, '0000-00-00 00:00:00'),
(100, '17101042', 'GlG01Ve29q', 1, 4, '0000-00-00 00:00:00'),
(101, '17103007', 'dMwy20qS4X', 1, 4, '0000-00-00 00:00:00'),
(102, '17101040', '7UiLISmXyv', 1, 4, '0000-00-00 00:00:00'),
(103, '17103008', 'tx0TxC1nzO', 1, 4, '0000-00-00 00:00:00'),
(104, '17102020', 'JSG6JpIxUj', 1, 4, '0000-00-00 00:00:00'),
(105, '17101039', '7W38rup90b', 1, 4, '0000-00-00 00:00:00'),
(106, '17101038', 'J79WTp6qm4', 1, 4, '0000-00-00 00:00:00'),
(107, '17103010', 'K9l6zo3cPI', 1, 4, '0000-00-00 00:00:00'),
(108, '17101055', '77lY9Q01Z4', 1, 4, '0000-00-00 00:00:00'),
(109, '17101054', '3Uyw5wO3B6', 1, 4, '0000-00-00 00:00:00'),
(110, '17102027', '8N1xi5zy41', 1, 4, '0000-00-00 00:00:00'),
(111, '17101052', '1VWE9J56D2', 1, 4, '0000-00-00 00:00:00'),
(112, '17101053', '30qvUN23ie', 1, 4, '0000-00-00 00:00:00'),
(113, '17101050', 'kRlrO52Bvn', 1, 4, '0000-00-00 00:00:00'),
(114, '17104005', '2coux5C9VH', 1, 4, '0000-00-00 00:00:00'),
(115, '17101051', '70oE96nVRy', 1, 4, '0000-00-00 00:00:00'),
(116, '17101049', '41CQ5be967', 1, 4, '0000-00-00 00:00:00'),
(117, '17102026', '6Z5y0C9CxQ', 1, 4, '0000-00-00 00:00:00'),
(118, '17104004', 'Am3Xc57pAH', 1, 4, '0000-00-00 00:00:00'),
(119, '17101048', 'VQsX1k3XlR', 1, 4, '0000-00-00 00:00:00'),
(120, '17102025', '8i5bp6H2Al', 1, 4, '0000-00-00 00:00:00'),
(121, '17101047', 'i19IuxAx6J', 1, 4, '0000-00-00 00:00:00'),
(122, '17101046', 'bl2p11Eo0E', 1, 4, '0000-00-00 00:00:00'),
(123, '17101045', 'ev3U2F0n16', 1, 4, '0000-00-00 00:00:00'),
(124, '17102024', 'z468m9T1aL', 1, 4, '0000-00-00 00:00:00'),
(125, '17103013', 'go1ixNkuYv', 1, 4, '0000-00-00 00:00:00'),
(126, '17102030', 'd4V3417aiD', 1, 4, '0000-00-00 00:00:00'),
(127, '17101056', '53877a5gl1', 1, 4, '0000-00-00 00:00:00'),
(128, '17103014', 'ORi7Qy5XY1', 1, 4, '0000-00-00 00:00:00'),
(129, '17103012', 'C1Uvdfr3RA', 1, 4, '0000-00-00 00:00:00'),
(130, '17102029', '458W27MPD6', 1, 4, '0000-00-00 00:00:00'),
(131, '17103009', 'Zf9ckvfvxV', 1, 4, '0000-00-00 00:00:00'),
(132, '17103011', 'T6NR8N7sdz', 1, 4, '0000-00-00 00:00:00'),
(133, '17102028', 'q8v1hbnS4n', 1, 4, '0000-00-00 00:00:00'),
(134, '17103018', 'Ez3Dimd47f', 1, 4, '0000-00-00 00:00:00'),
(135, '17102035', '3L5ly1YVFG', 1, 4, '0000-00-00 00:00:00'),
(136, '17101070', 'LjL2k5SLA1', 1, 4, '0000-00-00 00:00:00'),
(137, '17101072', 'k2Rz2h5Sfc', 1, 4, '0000-00-00 00:00:00'),
(138, '17101071', 'e53w4r5V6y', 1, 4, '0000-00-00 00:00:00'),
(139, '17101069', '05ZXO6xmrx', 1, 4, '0000-00-00 00:00:00'),
(140, '17102034', 'TQ5AGl6PrZ', 1, 4, '0000-00-00 00:00:00'),
(141, '17103017', 'jyZlt7uHGG', 1, 4, '0000-00-00 00:00:00'),
(142, '17103016', 'B0XivtIaj6', 1, 4, '0000-00-00 00:00:00'),
(143, '17101068', 'idD0X8JX84', 1, 4, '0000-00-00 00:00:00'),
(144, '17103015', '814a3pXU00', 1, 4, '0000-00-00 00:00:00'),
(145, '17101067', 'm2dajwq4bT', 1, 4, '0000-00-00 00:00:00'),
(146, '17101065', 'F6j1tkck4M', 1, 4, '0000-00-00 00:00:00'),
(147, '17102033', 'fwjh192OX9', 1, 4, '0000-00-00 00:00:00'),
(148, '17101066', 'Z6582YE2L8', 1, 4, '0000-00-00 00:00:00'),
(149, '17104006', '7LGzNsxVN1', 1, 4, '0000-00-00 00:00:00'),
(150, '17102032', '9u6dEw1TQl', 1, 4, '0000-00-00 00:00:00'),
(151, '17101064', '9G6zN908JU', 1, 4, '0000-00-00 00:00:00'),
(152, '17101061', 'kBVdDr3W13', 1, 4, '0000-00-00 00:00:00'),
(153, '17101063', 'Lr5vG9B46V', 1, 4, '0000-00-00 00:00:00'),
(154, '17101062', 'XbmjodnWzt', 1, 4, '0000-00-00 00:00:00'),
(155, '17101060', '51xeBj590f', 1, 4, '0000-00-00 00:00:00'),
(156, '17101059', 'k1A85KhSZR', 1, 4, '0000-00-00 00:00:00'),
(157, '17102031', 'XLFNPKC5EJ', 1, 4, '0000-00-00 00:00:00'),
(158, '17101058', 'z93zKjPJ04', 1, 4, '0000-00-00 00:00:00'),
(159, '17101057', '8x7M110iaF', 1, 4, '0000-00-00 00:00:00'),
(160, '17101077', '7F7p3v6jpj', 1, 4, '0000-00-00 00:00:00'),
(161, '17101075', '7rrp2oe943', 1, 4, '0000-00-00 00:00:00'),
(162, '17101074', '3lNKo62jDN', 1, 4, '0000-00-00 00:00:00'),
(163, '17101073', 'oOfvVcgqVU', 1, 4, '0000-00-00 00:00:00'),
(164, '17103022', '4V8VT345fB', 1, 4, '0000-00-00 00:00:00'),
(165, '17102037', 'wsZn78uK2k', 1, 4, '0000-00-00 00:00:00'),
(166, '17102038', 'ugV1Bq20lx', 1, 4, '0000-00-00 00:00:00'),
(167, '17103021', '7O0FOYXHOB', 1, 4, '0000-00-00 00:00:00'),
(168, '17103020', 'VN5qQ08t4M', 1, 4, '0000-00-00 00:00:00'),
(169, '17101079', 'zX96guUHJ3', 1, 4, '0000-00-00 00:00:00'),
(170, '17102036', '9W7ToY144j', 1, 4, '0000-00-00 00:00:00'),
(171, '17103019', '4g5t5s7b11', 1, 4, '0000-00-00 00:00:00'),
(172, '17102040', 'ai6D3848rt', 1, 4, '0000-00-00 00:00:00'),
(173, '17102039', 'FRo0G0K8u7', 1, 4, '0000-00-00 00:00:00'),
(174, '17101080', 'XJ4zcc6lJu', 1, 4, '0000-00-00 00:00:00'),
(175, '17101081', 'nCYlFT7myy', 1, 4, '0000-00-00 00:00:00'),
(176, '17102047', '3l8qtv3zB1', 1, 4, '0000-00-00 00:00:00'),
(177, '17103025', 'h265TLn3ZJ', 1, 4, '0000-00-00 00:00:00'),
(178, '17102046', 'ta05GJ4c24', 1, 4, '0000-00-00 00:00:00'),
(179, '17101086', 'Z3oC29IJ69', 1, 4, '0000-00-00 00:00:00'),
(180, '17101088', 'bZiG9TXWEx', 1, 4, '0000-00-00 00:00:00'),
(181, '17102045', 'HL0xoxuk9v', 1, 4, '0000-00-00 00:00:00'),
(182, '17101087', 'r16xBa09V8', 1, 4, '0000-00-00 00:00:00'),
(183, '17103024', 'wV5702IW8z', 1, 4, '0000-00-00 00:00:00'),
(184, '17102044', 'mW0qM3ejz6', 1, 4, '0000-00-00 00:00:00'),
(185, '17101085', '46rxR9SvI0', 1, 4, '0000-00-00 00:00:00'),
(186, '17101083', 'MF274JHK9n', 1, 4, '0000-00-00 00:00:00'),
(187, '17102043', 'Tj4M5D8pjC', 1, 4, '0000-00-00 00:00:00'),
(188, '17101084', '18ebSw373I', 1, 4, '0000-00-00 00:00:00'),
(189, '17102042', 'Uyl9PCx5xD', 1, 4, '0000-00-00 00:00:00'),
(190, '17102041', 'f9kLQ2pHH8', 1, 4, '0000-00-00 00:00:00'),
(191, '17103023', 'd2kxbiOFe7', 1, 4, '0000-00-00 00:00:00'),
(192, '17101082', 'R410Rcxv81', 1, 4, '0000-00-00 00:00:00'),
(193, '17104007', 'w189ePC73A', 1, 4, '0000-00-00 00:00:00'),
(194, '17103028', 'TwRl08KeN8', 1, 4, '0000-00-00 00:00:00'),
(195, '17102051', 'XwH25OXvWj', 1, 4, '0000-00-00 00:00:00'),
(196, '17101089', 'LWYz72dzj6', 1, 4, '0000-00-00 00:00:00'),
(197, '17102050', 'A6i9mRuE1C', 1, 4, '0000-00-00 00:00:00'),
(198, '17102049', 'zj92F0ZXy9', 1, 4, '0000-00-00 00:00:00'),
(199, '17101091', 'jC2Tt71z8u', 1, 4, '0000-00-00 00:00:00'),
(200, '17103026', 'eKDWn1149Q', 1, 4, '0000-00-00 00:00:00'),
(201, '17101076', 'ZXb5oyIAIW', 1, 4, '0000-00-00 00:00:00'),
(202, '17102048', 'Q7ofP005Lb', 1, 4, '0000-00-00 00:00:00'),
(203, '17102053', '4f0aK4L7Oc', 1, 4, '0000-00-00 00:00:00'),
(204, '17101090', 'xIq7H9OqNI', 1, 4, '0000-00-00 00:00:00'),
(205, '17101095', '772oPac585', 1, 4, '0000-00-00 00:00:00'),
(206, '17103030', 'lVK8X0rG2U', 1, 4, '0000-00-00 00:00:00'),
(207, '17101093', 'JHsGfI9iGX', 1, 4, '0000-00-00 00:00:00'),
(208, '17103029', 'L5mB1g28a2', 1, 4, '0000-00-00 00:00:00'),
(209, '17101092', 'aB545F1761', 1, 4, '0000-00-00 00:00:00'),
(210, '17102054', '26qk81c6Q3', 1, 4, '0000-00-00 00:00:00'),
(211, '17101103', '2QxN45Zz3z', 1, 4, '0000-00-00 00:00:00'),
(212, '17102052', '1Dlc0dPjUp', 1, 4, '0000-00-00 00:00:00'),
(213, '17101102', '5M077W5bsU', 1, 4, '0000-00-00 00:00:00'),
(214, '17101098', 'WkB8L69qn9', 1, 4, '0000-00-00 00:00:00'),
(215, '17101101', 'PAg0m94VN9', 1, 4, '0000-00-00 00:00:00'),
(216, '17101099', '9i4MHv0D42', 1, 4, '0000-00-00 00:00:00'),
(217, '17101100', 'r8bYxAfVp8', 1, 4, '0000-00-00 00:00:00'),
(218, '17101097', '23393754j2', 1, 4, '0000-00-00 00:00:00'),
(219, '17101094', 'UJPET0JWqm', 1, 4, '0000-00-00 00:00:00'),
(220, '17101096', '359XWjzP8V', 1, 4, '0000-00-00 00:00:00'),
(221, '17101106', 'ZN8Fdw91uJ', 1, 4, '0000-00-00 00:00:00'),
(222, '17101104', '708dw2ohrm', 1, 4, '0000-00-00 00:00:00'),
(223, '17101118', '7gI3NxOK12', 1, 4, '0000-00-00 00:00:00'),
(224, '17101117', 'E5J8cuo4r2', 1, 4, '0000-00-00 00:00:00'),
(225, '17102060', 'PuDZRC92Jq', 1, 4, '0000-00-00 00:00:00'),
(226, '17103033', 'VKer599y5A', 1, 4, '0000-00-00 00:00:00'),
(227, '17101116', '89KqWolVp3', 1, 4, '0000-00-00 00:00:00'),
(228, '17102058', 'GKvB37x52G', 1, 4, '0000-00-00 00:00:00'),
(229, '17101115', 'Rmy6AgIVD7', 1, 4, '0000-00-00 00:00:00'),
(230, '17103032', 'Qr70tEaF1U', 1, 4, '0000-00-00 00:00:00'),
(231, '17101113', 'upo4cZ8238', 1, 4, '0000-00-00 00:00:00'),
(232, '17101111', 'qb4Gzp37cx', 1, 4, '0000-00-00 00:00:00'),
(233, '17102057', '0a9NNHw7c9', 1, 4, '0000-00-00 00:00:00'),
(234, '17101114', 'K931T1RZ6w', 1, 4, '0000-00-00 00:00:00'),
(235, '17101112', '67518di61c', 1, 4, '0000-00-00 00:00:00'),
(236, '17101109', 'z5D0M73Fd8', 1, 4, '0000-00-00 00:00:00'),
(237, '17101110', 'eE4b5qI3GJ', 1, 4, '0000-00-00 00:00:00'),
(238, '17102055', '1Zj82F2630', 1, 4, '0000-00-00 00:00:00'),
(239, '17102056', 'fJ8Tg6IrZn', 1, 4, '0000-00-00 00:00:00'),
(240, '17103031', 'z5m560r8F5', 1, 4, '0000-00-00 00:00:00'),
(241, '17101108', '3B3V9OgJZ6', 1, 4, '0000-00-00 00:00:00'),
(242, '17101107', 'IYS7U26zgi', 1, 4, '0000-00-00 00:00:00'),
(243, '17101105', 'plJL41L7X0', 1, 4, '0000-00-00 00:00:00'),
(244, '17102062', 'GF7OPwGn32', 1, 4, '0000-00-00 00:00:00'),
(245, '17102063', '0OthIN663r', 1, 4, '0000-00-00 00:00:00'),
(246, '17102059', 'U6Usc7BQuz', 1, 4, '0000-00-00 00:00:00'),
(247, '17102061', '6nB7Db243Q', 1, 4, '0000-00-00 00:00:00'),
(248, '17101127', 'wKf94cwRtU', 1, 4, '0000-00-00 00:00:00'),
(249, '17101128', '6g88U2eAT9', 1, 4, '0000-00-00 00:00:00'),
(250, '17101124', '9pqA5r4910', 1, 4, '0000-00-00 00:00:00'),
(251, '17101126', 'yp0JWrP51i', 1, 4, '0000-00-00 00:00:00'),
(252, '17103037', 'vdVN0N5YC9', 1, 4, '0000-00-00 00:00:00'),
(253, '17103036', 'NFrmm3G1ht', 1, 4, '0000-00-00 00:00:00'),
(254, '17101123', 'x0tZWIWlz8', 1, 4, '0000-00-00 00:00:00'),
(255, '17102065', '0USI11sD7S', 1, 4, '0000-00-00 00:00:00'),
(256, '17101122', '7632OxAuj3', 1, 4, '0000-00-00 00:00:00'),
(257, '17101119', 'AsTRcUF3f5', 1, 4, '0000-00-00 00:00:00'),
(258, '17103035', '5sRZJnj4X6', 1, 4, '0000-00-00 00:00:00'),
(259, '17101121', 'Zn0lY0449d', 1, 4, '0000-00-00 00:00:00'),
(260, '17103034', 'NXoqBjv619', 1, 4, '0000-00-00 00:00:00'),
(261, '17101120', 'zx1X17N486', 1, 4, '0000-00-00 00:00:00'),
(262, '17102064', 'wj11ylaQq2', 1, 4, '0000-00-00 00:00:00'),
(263, '17101135', '2v9028Yh54', 1, 4, '0000-00-00 00:00:00'),
(264, '17103040', 'lIM99W48e0', 1, 4, '0000-00-00 00:00:00'),
(265, '17103039', '58We0G8n7n', 1, 4, '0000-00-00 00:00:00'),
(266, '17101133', '8VHw35W6EN', 1, 4, '0000-00-00 00:00:00'),
(267, '17101134', '9Rq9oCJWlK', 1, 4, '0000-00-00 00:00:00'),
(268, '17101132', 'Agwr661b54', 1, 4, '0000-00-00 00:00:00'),
(269, '17101130', 'P5W78hv468', 1, 4, '0000-00-00 00:00:00'),
(270, '17102068', 'BAP9DmswUF', 1, 4, '0000-00-00 00:00:00'),
(271, '17101131', 'qRJcJB3zGG', 1, 4, '0000-00-00 00:00:00'),
(272, '17102067', 'kWCFcU0139', 1, 4, '0000-00-00 00:00:00'),
(273, '17102066', 'oZDft5iP7y', 1, 4, '0000-00-00 00:00:00'),
(274, '17101125', '7hB5DvFuIX', 1, 4, '0000-00-00 00:00:00'),
(275, '17101129', 'sSMy6gH5h0', 1, 4, '0000-00-00 00:00:00'),
(276, '17103038', 'TmHfbDTCF6', 1, 4, '0000-00-00 00:00:00'),
(277, '17102078', 'rGU6h93BE0', 1, 4, '0000-00-00 00:00:00'),
(278, '17103046', 'MpmAJOlasH', 1, 4, '0000-00-00 00:00:00'),
(279, '17101157', '711Ex4G073', 1, 4, '0000-00-00 00:00:00'),
(280, '17101154', '3z6s7uuol5', 1, 4, '0000-00-00 00:00:00'),
(281, '17102077', 'H65azIF4MU', 1, 4, '0000-00-00 00:00:00'),
(282, '17104008', '1N1530295F', 1, 4, '0000-00-00 00:00:00'),
(283, '17101156', 'foKYc05vd0', 1, 4, '0000-00-00 00:00:00'),
(284, '17101155', 'p0JMmdRAs6', 1, 4, '0000-00-00 00:00:00'),
(285, '17101153', 'hi369514A3', 1, 4, '0000-00-00 00:00:00'),
(286, '17102076', '78jRIi49Ij', 1, 4, '0000-00-00 00:00:00'),
(287, '17101152', 'GA1FrMn561', 1, 4, '0000-00-00 00:00:00'),
(288, '17103044', '2mKo5fWCM0', 1, 4, '0000-00-00 00:00:00'),
(289, '17102075', 'tTJt3R5BYm', 1, 4, '0000-00-00 00:00:00'),
(290, '17101151', '30KJI1A3P1', 1, 4, '0000-00-00 00:00:00'),
(291, '17102074', '65a0w5b3S2', 1, 4, '0000-00-00 00:00:00'),
(292, '17103045', 'ep55C99xdr', 1, 4, '0000-00-00 00:00:00'),
(293, '17101148', '9EBP9hX23J', 1, 4, '0000-00-00 00:00:00'),
(294, '17102073', 't25m8xCje7', 1, 4, '0000-00-00 00:00:00'),
(295, '17101150', 'rr1Evb65wF', 1, 4, '0000-00-00 00:00:00'),
(296, '17101149', '54SjZtRcpo', 1, 4, '0000-00-00 00:00:00'),
(297, '17101147', '6JQCUUcjD7', 1, 4, '0000-00-00 00:00:00'),
(298, '17101146', '1H0QyEKPYx', 1, 4, '0000-00-00 00:00:00'),
(299, '17102072', '5Zfdj3pyPs', 1, 4, '0000-00-00 00:00:00'),
(300, '17101145', 'cjR9sn4T4t', 1, 4, '0000-00-00 00:00:00'),
(301, '17103043', '3D97Wo9zG6', 1, 4, '0000-00-00 00:00:00'),
(302, '17101142', 'tR1M5m6hMj', 1, 4, '0000-00-00 00:00:00'),
(303, '17102071', '9FUgp9n3HY', 1, 4, '0000-00-00 00:00:00'),
(304, '17101144', 'fZ88H7Pd13', 1, 4, '0000-00-00 00:00:00'),
(305, '17101143', 'Uc9s5NmND0', 1, 4, '0000-00-00 00:00:00'),
(306, '17101141', 'SN9XI98r6U', 1, 4, '0000-00-00 00:00:00'),
(307, '17101140', 'X9dR84jNRS', 1, 4, '0000-00-00 00:00:00'),
(308, '17102069', 'dj2wxh2BwL', 1, 4, '0000-00-00 00:00:00'),
(309, '17103041', 'FIwt1wPKQd', 1, 4, '0000-00-00 00:00:00'),
(310, '17101139', 'RA2no7T4SI', 1, 4, '0000-00-00 00:00:00'),
(311, '17101138', 'v89up7995A', 1, 4, '0000-00-00 00:00:00'),
(312, '17103042', 'M9YhOa220y', 1, 4, '0000-00-00 00:00:00'),
(313, '17102070', '230Wjr198G', 1, 4, '0000-00-00 00:00:00'),
(314, '17101137', '9y3i3pZRf5', 1, 4, '0000-00-00 00:00:00'),
(315, '17101136', 'FL4gb0KZE1', 1, 4, '0000-00-00 00:00:00'),
(316, '17101166', '75T9s2381p', 1, 4, '0000-00-00 00:00:00'),
(317, '17101165', 'aszNNBCp87', 1, 4, '0000-00-00 00:00:00'),
(318, '17101164', '26Pxeg5DS9', 1, 4, '0000-00-00 00:00:00'),
(319, '17101163', 'xN94diJSI1', 1, 4, '0000-00-00 00:00:00'),
(320, '17103048', 'Raag2Wt722', 1, 4, '0000-00-00 00:00:00'),
(321, '17101162', '68UeFt0Ox8', 1, 4, '0000-00-00 00:00:00'),
(322, '17102081', '2wg87EqT83', 1, 4, '0000-00-00 00:00:00'),
(323, '17102080', 'btK5abWXUa', 1, 4, '0000-00-00 00:00:00'),
(324, '17101161', 'xJ96quIfX5', 1, 4, '0000-00-00 00:00:00'),
(325, '17103047', 'DC3M1dH1Ct', 1, 4, '0000-00-00 00:00:00'),
(326, '17102079', '2373SkH8Zg', 1, 4, '0000-00-00 00:00:00'),
(327, '17101159', '6P970vH7S3', 1, 4, '0000-00-00 00:00:00'),
(328, '17101160', 'k8ql6O32wE', 1, 4, '0000-00-00 00:00:00'),
(329, '17104009', 'z00825y7WY', 1, 4, '0000-00-00 00:00:00'),
(330, '17101158', 'upC4HJS9lt', 1, 4, '0000-00-00 00:00:00'),
(331, '17101176', '858A0WMV23', 1, 4, '0000-00-00 00:00:00'),
(332, '17101175', 'Nq5ImHyqri', 1, 4, '0000-00-00 00:00:00'),
(333, '17102083', '0O2q0GAz5n', 1, 4, '0000-00-00 00:00:00'),
(334, '17102082', 't5KrTJ4Tj3', 1, 4, '0000-00-00 00:00:00'),
(335, '17101174', '3oRWtIRbyD', 1, 4, '0000-00-00 00:00:00'),
(336, '17101171', 'K3peMgZQ63', 1, 4, '0000-00-00 00:00:00'),
(337, '17101172', '7YY19lcX00', 1, 4, '0000-00-00 00:00:00'),
(338, '17101173', '29Ak39V2WP', 1, 4, '0000-00-00 00:00:00'),
(339, '17101167', 'Y298Ok7X22', 1, 4, '0000-00-00 00:00:00'),
(340, '17101170', 'r2WVT4e33v', 1, 4, '0000-00-00 00:00:00'),
(341, '17101169', '3BplDjz9q7', 1, 4, '0000-00-00 00:00:00'),
(342, '17101168', 'CV4a81wO4b', 1, 4, '0000-00-00 00:00:00'),
(343, '17101180', 'Oo9f3b77A8', 1, 4, '0000-00-00 00:00:00'),
(344, '17101179', 'k3uX6xl42J', 1, 4, '0000-00-00 00:00:00'),
(345, '17102085', '556Sm2YB58', 1, 4, '0000-00-00 00:00:00'),
(346, '17101178', 'S657322Pk9', 1, 4, '0000-00-00 00:00:00'),
(347, '17102084', '6F4gvxlr85', 1, 4, '0000-00-00 00:00:00'),
(348, '17103049', 'LAJ1PsIk0J', 1, 4, '0000-00-00 00:00:00'),
(349, '17101177', 'EHGvZ5Wahd', 1, 4, '0000-00-00 00:00:00'),
(350, '17101182', 'Uf2O0rYuVZ', 1, 4, '0000-00-00 00:00:00'),
(351, '17101183', '1quF00mpkA', 1, 4, '0000-00-00 00:00:00'),
(352, '17102086', '375g8X02Li', 1, 4, '0000-00-00 00:00:00'),
(353, '17101181', 'i7l686kb6E', 1, 4, '0000-00-00 00:00:00'),
(354, '17101184', '8KFUH3TT7b', 1, 4, '0000-00-00 00:00:00'),
(355, '17101185', 'V937wn3r17', 1, 4, '0000-00-00 00:00:00'),
(356, '17101187', 'idkjjB85AV', 1, 4, '0000-00-00 00:00:00'),
(357, '17101189', '602nGWpBZZ', 1, 4, '0000-00-00 00:00:00'),
(358, '17101188', 'B1FNhdU74t', 1, 4, '0000-00-00 00:00:00'),
(359, '17103052', 'LmcCP00syj', 1, 4, '0000-00-00 00:00:00'),
(360, '17104010', 'acW4sshh2p', 1, 4, '0000-00-00 00:00:00'),
(361, '17101186', 'T81zSt316t', 1, 4, '0000-00-00 00:00:00'),
(362, '17103050', 'grRw70Y69C', 1, 4, '0000-00-00 00:00:00'),
(363, '17102087', 'h0ky1It709', 1, 4, '0000-00-00 00:00:00'),
(364, '17101190', 'GXhM9di7lW', 1, 4, '0000-00-00 00:00:00'),
(365, '17102088', '6f63S5Jr6Z', 1, 4, '0000-00-00 00:00:00'),
(366, '17101225', 'Uz0m7ifbuo', 1, 4, '0000-00-00 00:00:00'),
(367, '17101217', 'bf8x414Gye', 1, 4, '0000-00-00 00:00:00'),
(368, '17101216', 'GUOBxxqS9N', 1, 4, '0000-00-00 00:00:00'),
(369, '17101210', '0220llbDJb', 1, 4, '0000-00-00 00:00:00'),
(370, '17101223', '3uPr7H1NU8', 1, 4, '0000-00-00 00:00:00'),
(371, '17101221', 'X08b2Ip2Nu', 1, 4, '0000-00-00 00:00:00'),
(372, '17101219', 'vnglX3Yy7J', 1, 4, '0000-00-00 00:00:00'),
(373, '17101226', '933mB5O418', 1, 4, '0000-00-00 00:00:00'),
(374, '17101220', '7mXnH7C21c', 1, 4, '0000-00-00 00:00:00'),
(375, '17102095', 'ckWB861Wae', 1, 4, '0000-00-00 00:00:00'),
(376, '17101208', '8QU2b95x7p', 1, 4, '0000-00-00 00:00:00'),
(377, '17103053', '2p61FIKd0B', 1, 4, '0000-00-00 00:00:00'),
(378, '17102091', 't5983NX9T5', 1, 4, '0000-00-00 00:00:00'),
(379, '17103057', '33HTs6v3JI', 1, 4, '0000-00-00 00:00:00'),
(380, '17101204', '8n3439oU13', 1, 4, '0000-00-00 00:00:00'),
(381, '17101212', 'Hom093au5X', 1, 4, '0000-00-00 00:00:00'),
(382, '17101211', '1SLP8Ni472', 1, 4, '0000-00-00 00:00:00'),
(383, '17102093', 'U7HMW84Une', 1, 4, '0000-00-00 00:00:00'),
(384, '17101233', 'icz4pOU3J0', 1, 4, '0000-00-00 00:00:00'),
(385, '17101195', 'lyo163274s', 1, 4, '0000-00-00 00:00:00'),
(386, '17101203', 'q51T27l4jt', 1, 4, '0000-00-00 00:00:00'),
(387, '17101193', 'RkTIfB58mz', 1, 4, '0000-00-00 00:00:00'),
(388, '17101192', '9xZK4NIvPJ', 1, 4, '0000-00-00 00:00:00'),
(389, '17101207', '30nd428XJL', 1, 4, '0000-00-00 00:00:00'),
(390, '17102090', 'N593FZ1HnI', 1, 4, '0000-00-00 00:00:00'),
(391, '17101227', 'm5vl3i8c5T', 1, 4, '0000-00-00 00:00:00'),
(392, '17101229', 'd11LkA934F', 1, 4, '0000-00-00 00:00:00'),
(393, '17102094', '3i58ItleG5', 1, 4, '0000-00-00 00:00:00'),
(394, '17101214', 'bo74v1h89Y', 1, 4, '0000-00-00 00:00:00'),
(395, '17103060', '9cV5R05H2C', 1, 4, '0000-00-00 00:00:00'),
(396, '17101228', '5HA6b637kB', 1, 4, '0000-00-00 00:00:00'),
(397, '17103061', 'vO8Mbba4R1', 1, 4, '0000-00-00 00:00:00'),
(398, '17101231', 'wL0nleObKf', 1, 4, '0000-00-00 00:00:00'),
(399, '17101230', '00SCD0El0p', 1, 4, '0000-00-00 00:00:00'),
(400, '17101209', 'N2VYo64zC0', 1, 4, '0000-00-00 00:00:00'),
(401, '17103054', 'O6st5vzU5R', 1, 4, '0000-00-00 00:00:00'),
(402, '17101218', '298Fo57ftx', 1, 4, '0000-00-00 00:00:00'),
(403, '17101222', 'EaL7b842iV', 1, 4, '0000-00-00 00:00:00'),
(404, '17103056', 'FMfbDy14cI', 1, 4, '0000-00-00 00:00:00'),
(405, '17102092', 'RRNP41w034', 1, 4, '0000-00-00 00:00:00'),
(406, '17104011', '8qMh7D3MAy', 1, 4, '0000-00-00 00:00:00'),
(407, '17101224', '2vfoGTFA7Y', 1, 4, '0000-00-00 00:00:00'),
(408, '17103055', '3J0hq9nmdc', 1, 4, '0000-00-00 00:00:00'),
(409, '17103059', '32B1CE18r5', 1, 4, '0000-00-00 00:00:00'),
(410, '17101232', 'l047sMisxE', 1, 4, '0000-00-00 00:00:00'),
(411, '17101206', 's67030KKSV', 1, 4, '0000-00-00 00:00:00'),
(412, '17101215', '1Ul7uw47P6', 1, 4, '0000-00-00 00:00:00'),
(413, '17103058', '0q517O7JeH', 1, 4, '0000-00-00 00:00:00'),
(414, '17101205', '6d42t0h4y4', 1, 4, '0000-00-00 00:00:00'),
(415, '17101213', 'IHUE747lco', 1, 4, '0000-00-00 00:00:00'),
(416, '17101194', 'E1p7Z76W0V', 1, 4, '0000-00-00 00:00:00'),
(417, '17102089', '9834KM6H2e', 1, 4, '0000-00-00 00:00:00'),
(418, '17103062', '56WwdY5rx3', 1, 4, '0000-00-00 00:00:00'),
(419, '17103051', '7FgZ91c1J9', 1, 4, '0000-00-00 00:00:00'),
(420, 'hamid', 'hamid123', 0, 3, '0000-00-00 00:00:00'),
(421, 'akbar', 'akbar123', 0, 3, '0000-00-00 00:00:00'),
(423, 'alvin', 'alvin123', 0, 3, '0000-00-00 00:00:00'),
(424, 'dina', 'dina123', 0, 3, '0000-00-00 00:00:00'),
(425, 'fuadatul', 'fuadatul123', 0, 3, '0000-00-00 00:00:00'),
(426, 'hikmah', 'hikmah123', 0, 3, '0000-00-00 00:00:00'),
(427, 'lilik', 'lilik123', 0, 3, '0000-00-00 00:00:00'),
(428, 'lina', 'lina123', 0, 3, '0000-00-00 00:00:00'),
(429, 'rabia', 'rabia123', 0, 3, '0000-00-00 00:00:00'),
(430, 'rajab', 'rajab123', 0, 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur untuk view `data_calonbinaan`
--
DROP TABLE IF EXISTS `data_calonbinaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_calonbinaan`  AS  select `m`.`id_user` AS `id_user`,`m`.`id_mahasiswa` AS `id_mahasiswa`,`m`.`nim` AS `nim`,`m`.`nama` AS `nama`,`m`.`j_kelamin` AS `j_kelamin` from `mahasiswa` `m` where (not(`m`.`id_mahasiswa` in (select `m_binaan`.`id_mahasiswa` from `m_binaan`))) order by `m`.`nama` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `data_mahasiswa`
--
DROP TABLE IF EXISTS `data_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_mahasiswa`  AS  select `mahasiswa`.`nama` AS `nama`,`mahasiswa`.`nim` AS `nim`,`mahasiswa`.`id_mahasiswa` AS `id_mahasiswa`,`mahasiswa`.`id_user` AS `id_user`,`mahasiswa`.`j_kelamin` AS `j_kelamin`,`users`.`last_login` AS `last_login`,`users`.`password` AS `password` from (`users` join `mahasiswa` on((`mahasiswa`.`id_user` = `users`.`id_user`))) order by `mahasiswa`.`nama` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `data_user`
--
DROP TABLE IF EXISTS `data_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_user`  AS  select `users`.`id_user` AS `id_user`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`password_default` AS `password_default`,`users`.`level` AS `level`,`users`.`last_login` AS `last_login` from `users` order by `users`.`level` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `adminmatrik`
--
ALTER TABLE `adminmatrik`
  ADD PRIMARY KEY (`id_adminmatrik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `m_binaan`
--
ALTER TABLE `m_binaan`
  ADD PRIMARY KEY (`id_mhsbinaan`),
  ADD KEY `id_pembina` (`id_pembina`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `paksi`
--
ALTER TABLE `paksi`
  ADD PRIMARY KEY (`id_paksi`),
  ADD KEY `id_pbentuk` (`id_pbentuk`);

--
-- Indexes for table `pbentuk`
--
ALTER TABLE `pbentuk`
  ADD PRIMARY KEY (`id_pbentuk`);

--
-- Indexes for table `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`id_pembina`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `planjut`
--
ALTER TABLE `planjut`
  ADD PRIMARY KEY (`id_planjut`),
  ADD KEY `id_psanksi` (`id_psanksi`);

--
-- Indexes for table `pmain`
--
ALTER TABLE `pmain`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `id_mhsbinaan` (`id_mhsbinaan`),
  ADD KEY `id_pbentuk` (`id_pbentuk`),
  ADD KEY `id_paksi` (`id_paksi`),
  ADD KEY `id_psanksi` (`id_psanksi`),
  ADD KEY `id_planjut` (`id_planjut`);

--
-- Indexes for table `psanksi`
--
ALTER TABLE `psanksi`
  ADD PRIMARY KEY (`id_psanksi`);

--
-- Indexes for table `shalat`
--
ALTER TABLE `shalat`
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `adminmatrik`
--
ALTER TABLE `adminmatrik`
  MODIFY `id_adminmatrik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_binaan`
--
ALTER TABLE `m_binaan`
  MODIFY `id_mhsbinaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;
--
-- AUTO_INCREMENT for table `paksi`
--
ALTER TABLE `paksi`
  MODIFY `id_paksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pbentuk`
--
ALTER TABLE `pbentuk`
  MODIFY `id_pbentuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pembina`
--
ALTER TABLE `pembina`
  MODIFY `id_pembina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `planjut`
--
ALTER TABLE `planjut`
  MODIFY `id_planjut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pmain`
--
ALTER TABLE `pmain`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `psanksi`
--
ALTER TABLE `psanksi`
  MODIFY `id_psanksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `adminmatrik`
--
ALTER TABLE `adminmatrik`
  ADD CONSTRAINT `adminmatrik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `m_binaan`
--
ALTER TABLE `m_binaan`
  ADD CONSTRAINT `m_binaan_ibfk_1` FOREIGN KEY (`id_pembina`) REFERENCES `pembina` (`id_pembina`),
  ADD CONSTRAINT `m_binaan_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);

--
-- Ketidakleluasaan untuk tabel `paksi`
--
ALTER TABLE `paksi`
  ADD CONSTRAINT `paksi_ibfk_1` FOREIGN KEY (`id_pbentuk`) REFERENCES `pbentuk` (`id_pbentuk`);

--
-- Ketidakleluasaan untuk tabel `pembina`
--
ALTER TABLE `pembina`
  ADD CONSTRAINT `pembina_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD CONSTRAINT `pimpinan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `planjut`
--
ALTER TABLE `planjut`
  ADD CONSTRAINT `planjut_ibfk_1` FOREIGN KEY (`id_psanksi`) REFERENCES `psanksi` (`id_psanksi`);

--
-- Ketidakleluasaan untuk tabel `pmain`
--
ALTER TABLE `pmain`
  ADD CONSTRAINT `pmain_ibfk_1` FOREIGN KEY (`id_mhsbinaan`) REFERENCES `m_binaan` (`id_mhsbinaan`),
  ADD CONSTRAINT `pmain_ibfk_2` FOREIGN KEY (`id_pbentuk`) REFERENCES `pbentuk` (`id_pbentuk`),
  ADD CONSTRAINT `pmain_ibfk_3` FOREIGN KEY (`id_paksi`) REFERENCES `paksi` (`id_paksi`),
  ADD CONSTRAINT `pmain_ibfk_4` FOREIGN KEY (`id_psanksi`) REFERENCES `psanksi` (`id_psanksi`),
  ADD CONSTRAINT `pmain_ibfk_5` FOREIGN KEY (`id_planjut`) REFERENCES `planjut` (`id_planjut`);

--
-- Ketidakleluasaan untuk tabel `shalat`
--
ALTER TABLE `shalat`
  ADD CONSTRAINT `shalat_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
