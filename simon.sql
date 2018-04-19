-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 10:12 AM
-- Server version: 10.1.25-MariaDB
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
-- Table structure for table `administrator`
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
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_admin`, `nama`, `j_kelamin`, `tgl_lahir`, `email`, `telp`, `avatar`, `id_user`) VALUES
(1, 'Yodi Yanwar', 'Laki-laki', '1994-12-13', 'yodi.yanwar@tazkia.ac.id', '0816616350', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminmatrik`
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
-- Dumping data for table `adminmatrik`
--

INSERT INTO `adminmatrik` (`id_adminmatrik`, `nama`, `telp`, `email`, `j_kelamin`, `tgl_lahir`, `id_user`, `avatar`) VALUES
(2, 'Derry', '085637242', 'derry@tazkia.ac.id', 'Laki-laki', '1987-01-02', 2, 'color-combinatioin-black.jpg'),
(3, 'Hasan Ishaq', '081265484', 'hasan@tazkia.ac.id', 'Laki-laki', '2017-11-11', 23, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_mahasiswa`
-- (See below for the actual view)
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
-- Table structure for table `mahasiswa`
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
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `angkatan`, `j_kelamin`, `asalkota`, `email`, `telp`, `avatar`, `tgl_lahir`, `id_user`) VALUES
(1174, 17101003, 'Hanapi Muslim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33),
(1175, 17102002, 'Ibnu Hibban Hartono', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34),
(1176, 17101004, 'Salma Dliya Fuady', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35),
(1177, 17101005, 'Hilwa Fitri Millenia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36),
(1178, 17102003, 'Mas Ichsan Nurhayati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 37),
(1179, 17104002, 'Aisyah As-salafiyah', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 38),
(1180, 17101006, 'Luthfia Luhuringkania', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 39),
(1181, 17101007, 'Regina Zahra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40),
(1182, 17101008, 'Faizah Taufik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41),
(1183, 17101010, 'Nur Jamilah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42),
(1184, 17102004, 'Salma Nabilah Salsabil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 43),
(1185, 17102005, 'Wardatul Fadhilah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 44),
(1186, 17103001, 'Meilisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45),
(1187, 17103002, 'Zahra Shafira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46),
(1188, 17101009, 'Muyassaroh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 47),
(1189, 17101011, 'Zafarina Zati Hulwani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48),
(1190, 17101012, 'Putri Ananda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49),
(1191, 17102006, 'Rasyifa Salsabilla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50),
(1192, 17102007, 'Nurma Hermila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 51),
(1193, 17102008, 'Melati Hasna Abidah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52),
(1194, 17102009, 'Salsabila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53),
(1195, 17102010, 'Sakinah Zahra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54),
(1196, 17102011, 'Fannia Mauludiyah Fachru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55),
(1197, 17103003, 'Adila Nur Islamiaty', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 56),
(1198, 17101013, 'Ella Wandania', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57),
(1199, 17101014, 'Nur Kintan Maharani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58),
(1200, 17101015, 'Asri Nurazhari Putrimant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 59),
(1201, 17101016, 'Mala Mareta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60),
(1202, 17102012, 'Maulida Nur Safitri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 61),
(1203, 17102013, 'Tasya Aulia Damayanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 62),
(1204, 17102014, 'Fajriati Noer Hidayah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 63),
(1205, 17102015, 'Mutya Nurya Ningsih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 64),
(1206, 17101017, 'Atika Sundari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 65),
(1207, 17101018, 'Asphia Sahiba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66),
(1208, 17101019, 'Salsabila Putri Sekar Ut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 67),
(1209, 17101020, 'Sabrina Elsa Firdatul Ja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 68),
(1210, 17101021, 'Rahmi Muflihah Abroni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 69),
(1211, 17101022, 'Sintia Monica', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 70),
(1212, 17101023, 'Anisah Afifah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 71),
(1213, 17101024, 'Dinda Nur Maulidah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 72),
(1214, 17101025, 'Syanindita Ananda Riana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 73),
(1215, 17101026, 'Zahidah Rahmah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 74),
(1216, 17101027, 'Rika Ra\'idah Dwicahyani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75),
(1217, 17101028, 'Wahyuni Utami', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 76),
(1218, 17101029, 'Nabila Kinanty Aqilla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 77),
(1219, 17101030, 'Maida Fitri Yani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 78),
(1220, 17101031, 'Syifa Qolbi Amalia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79),
(1221, 17101032, 'Nurul \'Izzah Addiini', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 80),
(1222, 17101033, 'Nur Halimah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81),
(1223, 17101034, 'Mutiara Lailla Ramadhini', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 82),
(1224, 17101035, 'Sausan Raniah Asy Syahid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 83),
(1225, 17101036, 'Nafira Fitri Ayu Widadar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 84),
(1226, 17101037, 'Hanifah Salsabilla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 85),
(1227, 17102016, 'Fatimah Tuzzahroh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86),
(1228, 17102017, 'Sekar Rizky Amalia Suher', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 87),
(1229, 17102018, 'Dara Ayu Kusuma Ningrum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88),
(1230, 17102019, 'Eka Nursyahfitri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 89),
(1231, 17103004, 'Ayu Dini Hastuti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 90),
(1232, 17103005, 'Nur Azizah Pulungan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 91),
(1233, 17103006, 'Syahila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 92),
(1234, 17101044, 'Alma Widiyanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 93),
(1235, 17101043, 'Hana Raisa Fahira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 94),
(1236, 17102022, 'Adinda Salsabila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 95),
(1237, 17102023, 'Luthfiah Khairunisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 96),
(1238, 17104003, 'Naimatul Kurniah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 97),
(1239, 17102021, 'Arda Prawi Agustanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 98),
(1240, 17101041, 'Felia Rizkiana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 99),
(1241, 17101042, 'Ghina Lintang Azizah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100),
(1242, 17103007, 'Lisa Anita Pratiwi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 101),
(1243, 17101040, 'Alin Duani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 102),
(1244, 17103008, 'Syara Nur Fatimah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 103),
(1245, 17102020, 'Dwika Noviana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 104),
(1246, 17101039, 'Nurul Ramdhany', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 105),
(1247, 17101038, 'Assyifa Nur Aziza', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 106),
(1248, 17103010, 'Rahmaiola Raissa Aziza', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 107),
(1249, 17101055, 'Rossdinna Nurul Rizqi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 108),
(1250, 17101054, 'Fiki Hijjatun Nada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 109),
(1251, 17102027, 'Adilia Nurul Zahra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 110),
(1252, 17101052, 'Haanii Haritsa Yuzen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 111),
(1253, 17101053, 'Hilga Hanistya Saputri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 112),
(1254, 17101050, 'Jenny Ananda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 113),
(1255, 17104005, 'Fifi Afiah Luqman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 114),
(1256, 17101051, 'Mufidah Amalia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 115),
(1257, 17101049, 'Rihaadatul Aisyi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 116),
(1258, 17102026, 'Desy Norma Safira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 117),
(1259, 17104004, 'Annastasha Wahyuningtyas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 118),
(1260, 17101048, 'Rhifa Azzahra Salsabila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 119),
(1261, 17102025, 'Indah Alfiarna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 120),
(1262, 17101047, 'Aulia Nur Asyifa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 121),
(1263, 17101046, 'Fitria Novianti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 122),
(1264, 17101045, 'Zakia Chairani Ayudia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 123),
(1265, 17102024, 'Syifa Aini Puspaning Dew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 124),
(1266, 17103013, 'Rufatulalawiah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 125),
(1267, 17102030, 'Nur Ihsannisaa Riyadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 126),
(1268, 17101056, 'Nawarendra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 127),
(1269, 17103014, 'Nur Laila Madinatul Qoir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 128),
(1270, 17103012, 'Cita Rizki Ananda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 129),
(1271, 17102029, 'Azifatul Hasanah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 130),
(1272, 17103009, 'Suci Fauziah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 131),
(1273, 17103011, 'Ummu Kaltsum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 132),
(1274, 17102028, 'Salma Rahiimi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 133),
(1275, 17103018, 'Jihan Noer Evian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 134),
(1276, 17102035, 'Nabila Ramadiana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 135),
(1277, 17101070, 'Ashilah Raihanah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 136),
(1278, 17101072, 'Maulida Jihan Aulia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 137),
(1279, 17101071, 'Hana Nur Ratih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 138),
(1280, 17101069, 'Nabilah Ghalisani Fildza', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 139),
(1281, 17102034, 'Rihadatul Aisyi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 140),
(1282, 17103017, 'Afta Rizky Amalia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 141),
(1283, 17103016, 'Wening Tyas Nur Anissa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 142),
(1284, 17101068, 'Farah Hafizhatun Nisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 143),
(1285, 17103015, 'Aidatul Afifah Isra', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 144),
(1286, 17101067, 'Hasna Luthfi Khairunnisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145),
(1287, 17101065, 'Salma Shafira Salsabila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 146),
(1288, 17102033, 'Dias Hanifa Ardhanariswa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 147),
(1289, 17101066, 'Afifa Rahmi Ihsana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 148),
(1290, 17104006, 'Adilah Lulu Aprilia Kusu', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 149),
(1291, 17102032, 'Safana Ishlah Madani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 150),
(1292, 17101064, 'Hana Azahra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 151),
(1293, 17101061, 'Amalia Hanifah Latief', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 152),
(1294, 17101063, 'Luthfiah Siti Sarah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 153),
(1295, 17101062, 'Salma Qurrata A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 154),
(1296, 17101060, 'Irma Rahmani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 155),
(1297, 17101059, 'Hilda Hidayatul Muwafaqo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 156),
(1298, 17102031, 'Firyal Arina Salsabila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 157),
(1299, 17101058, 'Tiara Fatihah Ramadhanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 158),
(1300, 17101057, 'Annisa Mutia Ruza', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 159),
(1301, 17101077, 'Hidayatul Azqia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 160),
(1302, 17101075, 'Aryawati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 161),
(1303, 17101074, 'Aulia Azka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 162),
(1304, 17101073, 'Irena Siti Dzahrah Putri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 163),
(1305, 17103022, 'Anisa Nanda Faisjal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 164),
(1306, 17102037, 'Yunita Surya Pratiwi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 165),
(1307, 17102038, 'Mayang Nirwana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 166),
(1308, 17103021, 'Raehan Fadila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 167),
(1309, 17103020, 'Annisa Syahidah Mujahida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 168),
(1310, 17101079, 'Nila Hidayatunnisak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 169),
(1311, 17102036, 'Hani Khairo Amalia N.a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 170),
(1312, 17103019, 'Ririn Riani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 171),
(1313, 17102040, 'Nandya Ahlus Sanah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 172),
(1314, 17102039, 'Tia Anggraeni Nurdiana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 173),
(1315, 17101080, 'Mawatu Shalihah Kaily', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 174),
(1316, 17101081, 'Baiq Damayanti Azhar Put', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 175),
(1317, 17102047, 'Anisa Irma Suryani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 176),
(1318, 17103025, 'Indah Oktaviola', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 177),
(1319, 17102046, 'Umulia Safitri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 178),
(1320, 17101086, 'Leli Irma Suryani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 179),
(1321, 17101088, 'Salma Fatimah Az-zahra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 180),
(1322, 17102045, 'Ania Iqrima Azalia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 181),
(1323, 17101087, 'Isnafauziahbiljannah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 182),
(1324, 17103024, 'Nurul Hakim Dwi Yanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 183),
(1325, 17102044, 'Riyadotul Mustamiah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 184),
(1326, 17101085, 'Afini Dwina Andarini', NULL, 'Akhwat', NULL, NULL, NULL, NULL, NULL, 185),
(1327, 17101083, 'Riqotu Fuadatuddiniyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 186),
(1328, 17102043, 'Aulia Salsabila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 187),
(1329, 17101084, 'Dea Nabilah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 188),
(1330, 17102042, 'Sofiya Nadhifah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 189),
(1331, 17102041, 'Baiq Fathia Zulfahmia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 190),
(1332, 17103023, 'Muti\'ah Azizah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 191),
(1333, 17101082, 'Solehah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 192),
(1334, 17104007, 'Shofi Luthfiana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 193),
(1335, 17103028, 'Farah Alia Intania Kamil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 194),
(1336, 17102051, 'Utsman Abdul Hakim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 195),
(1337, 17101089, 'Izzati Luthfiyya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 196),
(1338, 17102050, 'Rukiyah Hasibuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 197),
(1339, 17102049, 'Novia Lestari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 198),
(1340, 17101091, 'Vira Asriani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 199),
(1341, 17103026, 'Leniari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200),
(1342, 17101076, 'Baiq Putri Nabila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 201),
(1343, 17102048, 'Nur Khodijah Khairani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 202),
(1344, 17102053, 'Ismah Choirunnisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 203),
(1345, 17101090, 'Dini Khoerunisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 204),
(1346, 17101095, 'Mustova Karim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 205),
(1347, 17103030, 'Jougie Maulana Triadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 206),
(1348, 17101093, 'Haikal Fernanda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 207),
(1349, 17103029, 'Muhammad Rouman Affan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 208),
(1350, 17101092, 'Firza Faadhilah Arifian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 209),
(1351, 17102054, 'Aulia Zahra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 210),
(1352, 17101103, 'Farid Hidayatullah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 211),
(1353, 17102052, 'Defender Khoufarobbi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 212),
(1354, 17101102, 'Ridwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 213),
(1355, 17101098, 'Muhamad Rizky Maulana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 214),
(1356, 17101101, 'Arland Pratama Wijaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 215),
(1357, 17101099, 'Affa\' Mahdi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 216),
(1358, 17101100, 'M Haekal Fajrul Falah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 217),
(1359, 17101097, 'Abyan Rakhman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 218),
(1360, 17101094, 'Aza Priambada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 219),
(1361, 17101096, 'Fauzan Hanif Sukma Pramo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 220),
(1362, 17101106, 'Muhammad Syahri Ramadani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 221),
(1363, 17101104, 'Imaduddin Dwi Hananto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 222),
(1364, 17101118, 'Fahmi Marjuki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 223),
(1365, 17101117, 'Zubeir Abdul Wahid Chan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 224),
(1366, 17102060, 'Ghulam Hadi Al Fatah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 225),
(1367, 17103033, 'Syafii Bin Kadaryono Haf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 226),
(1368, 17101116, 'Muhamad Lutfi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 227),
(1369, 17102058, 'Aziz Rachmadji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 228),
(1370, 17101115, 'Noviyandi Difa Pratama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 229),
(1371, 17103032, 'Eki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 230),
(1372, 17101113, 'Sesa Afrian Yahya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 231),
(1373, 17101111, 'Muhamad Solehudin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 232),
(1374, 17102057, 'Muh Fathul Mubaraq Ss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 233),
(1375, 17101114, 'Yody Nur Rachmat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 234),
(1376, 17101112, 'Zahid Ahmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 235),
(1377, 17101109, 'Arta Saiful Hilmi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 236),
(1378, 17101110, 'Muhammad Rafi\' Firdaus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 237),
(1379, 17102055, 'Poltak Fathirisi Nurlam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 238),
(1380, 17102056, 'Yazid Azam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 239),
(1381, 17103031, 'Luqman Aulia Rizky', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 240),
(1382, 17101108, 'Aziz Guntur Purnamaputra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 241),
(1383, 17101107, 'Wildan Maulid Hanafi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 242),
(1384, 17101105, 'Arman Fadil Maulana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 243),
(1385, 17102062, 'Ramadhani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 244),
(1386, 17102063, 'Fuadhli Rahman Katam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 245),
(1387, 17102059, 'Lalu Arya Pringgadani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 246),
(1388, 17102061, 'Agung Prasetyo Wibowo', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 247),
(1389, 17101127, 'Hanif Dwi Putra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 248),
(1390, 17101128, 'Zulfitra Hadianto Palwam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 249),
(1391, 17101124, 'Lalu Rizky Adriansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250),
(1392, 17101126, 'Difan Nurhafidzar Juanda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 251),
(1393, 17103037, 'Muhammad Syihabudin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 252),
(1394, 17103036, 'Miftah Azmi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 253),
(1395, 17101123, 'Farras Mubasysyirsyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 254),
(1396, 17102065, 'Muhammad Islam Assidiq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 255),
(1397, 17101122, 'Ahlam Nabila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 256),
(1398, 17101119, 'Fikri Abdurrohman Maajid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 257),
(1399, 17103035, 'Asril Suwandi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 258),
(1400, 17101121, 'Khalel Mohammed Amar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 259),
(1401, 17103034, 'Taufik Nur Maarif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 260),
(1402, 17101120, 'Alif Limka Firdaus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 261),
(1403, 17102064, 'Naufal Al Baqir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 262),
(1404, 17101135, 'Ibnu Rasyid Hamidi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 263),
(1405, 17103040, 'Ganang Abi Rafianto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 264),
(1406, 17103039, 'Muhammad Abdillah Dhafaq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 265),
(1407, 17101133, 'Naufal Ahmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 266),
(1408, 17101134, 'Muhammad Zacky Makarim S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 267),
(1409, 17101132, 'Muhammad Fathan Farizan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 268),
(1410, 17101130, 'L. M. Cahya Kurnia Harma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 269),
(1411, 17102068, 'Muhammad Ismail', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 270),
(1412, 17101131, 'Labib Ulwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 271),
(1413, 17102067, 'Muhammad Raihan Alfathi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 272),
(1414, 17102066, 'Muhammad Fadlil Kirom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 273),
(1415, 17101125, 'Edo Abdulrahim Fattah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 274),
(1416, 17101129, 'Moh Ala Furqoni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 275),
(1417, 17103038, 'Muh. Rifky Irsyadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 276),
(1418, 17102078, 'Putra Muhammad Riawan Pa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 277),
(1419, 17103046, 'Ghaznawie Ihyamukti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 278),
(1420, 17101157, 'Naufal Raditya Krisna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 279),
(1421, 17101154, 'Faatihan Aulia Azwin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 280),
(1422, 17102077, 'Khalid Syaifulhaq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 281),
(1423, 17104008, 'Hilmi Taqiyyudin Aufa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 282),
(1424, 17101156, 'Hafisz Maulana Rasjid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 283),
(1425, 17101155, 'Muhammad Haniful Amin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 284),
(1426, 17101153, 'Hilmy Fikri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 285),
(1427, 17102076, 'Rakha Aditama Iskandar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 286),
(1428, 17101152, 'Miftah Faruq Nugraha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 287),
(1429, 17103044, 'Tariq Mukhlisin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 288),
(1430, 17102075, 'Muhammad Bukhari Muslim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 289),
(1431, 17101151, 'Irvan Riyansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 290),
(1432, 17102074, 'Abdul Latif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 291),
(1433, 17103045, 'Ghazi Ahmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 292),
(1434, 17101148, 'Abdullah Haidar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 293),
(1435, 17102073, 'Farhan Anshori', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 294),
(1436, 17101150, 'Muhammad Puji Pangestu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 295),
(1437, 17101149, 'Muhammad Rizki Sinar Ila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 296),
(1438, 17101147, 'Falah Ageng Pakerti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 297),
(1439, 17101146, 'Iza Fais Saputra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 298),
(1440, 17102072, 'Muhammad Ivan Firmansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 299),
(1441, 17101145, 'Muhammad Angga Abdullah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300),
(1442, 17103043, 'Abdurrahman Kholish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 301),
(1443, 17101142, 'Reynaldi Wahab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 302),
(1444, 17102071, 'Rafi\' Muttaqin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 303),
(1445, 17101144, 'Muhammad Ananda Fajar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 304),
(1446, 17101143, 'Moch. Lukmannul Hakim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 305),
(1447, 17101141, 'Ramadhana Devandani Enti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 306),
(1448, 17101140, 'Adam Nurdiansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 307),
(1449, 17102069, 'Muhammad Zain Ghojali', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 308),
(1450, 17103041, 'Ilham Akbar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 309),
(1451, 17101139, 'Juan Fadri Ramdhani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 310),
(1452, 17101138, 'Herdy Almadiptha Rahman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 311),
(1453, 17103042, 'Ilham Zulkarami Aslam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 312),
(1454, 17102070, 'Maulana Rizky Septiaji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 313),
(1455, 17101137, 'Muhammad Denito Bastian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 314),
(1456, 17101136, 'Muhammad Faisal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 315),
(1457, 17101166, 'Nurrahman Wira Aji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 316),
(1458, 17101165, 'Zuhdi Anjari Tigara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 317),
(1459, 17101164, 'Muhammad.daffa As-syauqi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 318),
(1460, 17101163, 'Billy Muhammad Fadilah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 319),
(1461, 17103048, 'Ahmad Kariim Robbani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 320),
(1462, 17101162, 'Hariz Ilmam Husnan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 321),
(1463, 17102081, 'Yonasya Esa Kautsarizki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 322),
(1464, 17102080, 'Perdana Priambudi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 323),
(1465, 17101161, 'Baso Ratulangi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 324),
(1466, 17103047, 'Lalu Satria Prayuda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 325),
(1467, 17102079, 'M. Angga Haryadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 326),
(1468, 17101159, 'Ridwan Hasyim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 327),
(1469, 17101160, 'Rizal Muhammad Fauzan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 328),
(1470, 17104009, 'Ahmad Atiq Abqari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 329),
(1471, 17101158, 'Muhammad Nasyith Sholahu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 330),
(1472, 17101176, 'Muhammad Fadhil Mujahid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 331),
(1473, 17101175, 'Rayhan Pasa Aryandra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 332),
(1474, 17102083, 'Tedy Zainul Muttaqin Ibn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 333),
(1475, 17102082, 'Mochamad Ridho Fahlefi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 334),
(1476, 17101174, 'Muhammad Fitriana Hasan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 335),
(1477, 17101171, 'Ferdi Wijaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 336),
(1478, 17101172, 'Risang Muhammad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 337),
(1479, 17101173, 'Muahmmad Hafidz Fathoni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 338),
(1480, 17101167, 'Moh.yanis Yosfiah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 339),
(1481, 17101170, 'Azmi Syahid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 340),
(1482, 17101169, 'Indra Wijaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 341),
(1483, 17101168, 'Ilham Akbar Ramadhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 342),
(1484, 17101180, 'Dimas Adektama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 343),
(1485, 17101179, 'Adi Pahlevi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 344),
(1486, 17102085, 'Nanda Wahyu Noerkamal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 345),
(1487, 17101178, 'M. Ridwan Saufi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 346),
(1488, 17102084, 'Abid Rahmatullah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 347),
(1489, 17103049, 'Reno Meizanggi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 348),
(1490, 17101177, 'Muhammad Diaz Advani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 349),
(1491, 17101182, 'Renaldi Septiawan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 350),
(1492, 17101183, 'Ilham Muhammad Ghifari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 351),
(1493, 17102086, 'Orde Leo Al Fathur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 352),
(1494, 17101181, 'M.farid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 353),
(1495, 17101184, 'Ramadan Arudi Satyagraha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 354),
(1496, 17101185, 'Muhammad Iqbal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 355),
(1497, 17101187, 'Ahmad Hilmi Jamaludin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 356),
(1498, 17101189, 'Muhammad Farhan Maulana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 357),
(1499, 17101188, 'Azka Muharam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 358),
(1500, 17103052, 'Zidan Muhammad Qushay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 359),
(1501, 17104010, 'Taufiq Ismail', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 360),
(1502, 17101186, 'Nabil Nur Salsabil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 361),
(1503, 17103050, 'Akmal Mahira Setiawan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 362),
(1504, 17102087, 'Muhammad Faishal Hilman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 363),
(1505, 17101190, 'Muhammad Rasyid Ridha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 364),
(2010, 17102088, 'Faliza Hafidhotul F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365),
(2029, 17101225, 'Afka Qoriyanto', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 366),
(2030, 17101217, 'Alfariq Riansyah', NULL, 'Ikhwan', NULL, NULL, NULL, NULL, NULL, 367),
(2031, 17101216, 'Anto Wijaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 368),
(2032, 17101210, 'Eko Saputra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 369),
(2033, 17101223, 'Fahri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 370),
(2034, 17101221, 'Febby Kurniawan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 371),
(2035, 17101219, 'Holili', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 372),
(2036, 17101226, 'Imam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 373),
(2037, 17101220, 'Jodi Prasetyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 374),
(2038, 17102095, 'M Rizal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 375),
(2039, 17101208, 'Muhamad Arjum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 376),
(2040, 17103053, 'Rahmanda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 377),
(2041, 17102091, 'Rangga Wijaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 378),
(2042, 17103057, 'Rayzandy Gunawan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 379),
(2043, 17101204, 'Renaldi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 380),
(2044, 17101212, 'Riyan Erwinsyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 381),
(2045, 17101211, 'Robi Permana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 382),
(2046, 17102093, 'Saptiadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 383),
(2047, 17101233, 'Qomardiansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 384),
(2048, 17101195, 'Mikal Mufid Asdika', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 385),
(2049, 17101203, 'Jihad Nabil Rafif Mahdi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 386),
(2051, 17101193, 'Feydhul Qodir Muwaffaq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 387),
(2052, 17101192, 'Rangga Adithiya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 388),
(2053, 17101207, 'Ashmita Merry Anggreini', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 389),
(2054, 17102090, 'Asih Purminta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 390),
(2055, 17101227, 'Ayu Lestari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 391),
(2056, 17101229, 'Dessy Kurnia Ramadhanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 392),
(2057, 17102094, 'Dwi Eldia Oktaviani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 393),
(2058, 17101214, 'Eka Pratiwi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 394),
(2059, 17103060, 'Fitri Nursari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 395),
(2060, 17101228, 'Gressy Aurellia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 396),
(2061, 17103061, 'Holmi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 397),
(2062, 17101231, 'Ismi Yati Azis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 398),
(2063, 17101230, 'Kana Nurrohma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 399),
(2064, 17101209, 'Kirana Dewi Nouriand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 400),
(2065, 17103054, 'Lilis Diana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 401),
(2066, 17101218, 'Maemunah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 402),
(2067, 17101222, 'Omiyuka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 403),
(2068, 17103056, 'Ovi Tri Astuti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 404),
(2069, 17102092, 'Putri Faradiba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 405),
(2070, 17104011, 'Rana Wulandari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 406),
(2071, 17101224, 'Rini Anggreni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 407),
(2072, 17103055, 'Riska Wijayanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 408),
(2073, 17103059, 'Sifa Aprilia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 409),
(2074, 17101232, 'Silvia Afri Wulanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 410),
(2075, 17101206, 'Sumaria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 411),
(2076, 17101215, 'Surni Meiyanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 412),
(2077, 17103058, 'Tina Fitasari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 413),
(2078, 17101205, 'Yulisandri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 414),
(2079, 17101213, 'Yusriyanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 415),
(2080, 17101194, 'Elisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 416),
(2081, 17102089, 'Nabila Farha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 417),
(2082, 17103062, 'Sella Septiani K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 418),
(2083, 17103051, 'Juheri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 419);

-- --------------------------------------------------------

--
-- Table structure for table `m_binaan`
--

CREATE TABLE `m_binaan` (
  `id_mhsbinaan` int(11) NOT NULL,
  `id_pembina` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_binaan`
--

INSERT INTO `m_binaan` (`id_mhsbinaan`, `id_pembina`, `id_mahasiswa`) VALUES
(1, 22, 1197),
(2, 22, 1290),
(3, 22, 1251),
(4, 26, 1326),
(5, 26, 1285),
(6, 26, 1179),
(7, 20, 2029),
(8, 20, 1388),
(9, 20, 2030);

-- --------------------------------------------------------

--
-- Table structure for table `paksi`
--

CREATE TABLE `paksi` (
  `id_paksi` int(11) NOT NULL,
  `id_pbentuk` int(11) DEFAULT NULL,
  `nama_aksi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paksi`
--

INSERT INTO `paksi` (`id_paksi`, `id_pbentuk`, `nama_aksi`) VALUES
(3, 1, 'mencuri'),
(4, 1, 'miras'),
(5, 1, 'narkoba'),
(6, 1, 'pornografi'),
(7, 1, 'pornoaksi'),
(8, 1, 'zina'),
(9, 3, 'merokok'),
(10, 3, 'membawa rokok');

-- --------------------------------------------------------

--
-- Table structure for table `pbentuk`
--

CREATE TABLE `pbentuk` (
  `id_pbentuk` int(11) NOT NULL,
  `nama_bentuk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pbentuk`
--

INSERT INTO `pbentuk` (`id_pbentuk`, `nama_bentuk`) VALUES
(1, 'Melakukan perbuatan maksiat yang dapat mencemarkan nama baik pribadi dan\r\natau STEI TAZKIA'),
(2, 'Berkhalwat'),
(3, 'merokok'),
(4, 'Rokok');

-- --------------------------------------------------------

--
-- Table structure for table `pembina`
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
-- Dumping data for table `pembina`
--

INSERT INTO `pembina` (`id_pembina`, `nama`, `j_kelamin`, `tgl_lahir`, `gelar`, `asalkota`, `email`, `telp`, `avatar`, `id_user`) VALUES
(18, 'Bintang Pamuncak', 'Ikhwan', '2017-11-10', 'S.Ei', 'Semarang', 'bintang@tazkia.ac.id', '0859473235', NULL, 21),
(19, 'Hayatul Mujadidah', 'Akhwat', '2017-11-14', 'S.Ei', 'Sukabumi', 'aya@tazkia.ac.id', '081654812', NULL, 22),
(20, 'Rizky Akbar Cholilullah', 'Ikhwan', '2017-12-13', 'S.Ei', 'Pekalongan', 'rizky_akbar@tazkia.ac.id', '0816384924', NULL, 24),
(21, 'Rian Alfiansyah', 'Ikhwan', '2017-12-20', 'S.Ei', 'Tasikmalaya', 'rian@tazkia.ac.id', '0856483922', NULL, 25),
(22, 'Adita Dyah Asokawati', 'Akhwat', '2017-12-28', 'S.E', 'Bogor', 'adita@tazkia.ac.id', '08127384924', NULL, 26),
(23, 'Riyan Ariyandi', 'Ikhwan', '2017-12-08', 'S.Pd', 'Riau', 'riyan.ariyandi@tazkia.ac.id', '0812474829', NULL, 27),
(24, 'Rizqan Abadi', 'Ikhwan', '2017-12-22', 'S.Pd', 'Lombok', 'rizqan@tazkia.ac.id', '0857382844', NULL, 28),
(25, 'Sofi', 'Akhwat', '2017-12-11', 'S.Pd', 'Palembang', 'sofi@tazkia.ac.id', '0896473824', NULL, 29),
(26, 'Diva Azka Karimah', 'Akhwat', '2017-12-13', 'S.E', 'Jakarta', 'diva@tazkia.ac.id', '0812758382', NULL, 30),
(27, 'Nashrudin Al-Huda', 'Ikhwan', '2017-12-20', 'S.E', 'Semarang', 'huda@tazkia.ac.id', '0856738232', NULL, 31),
(28, 'Alfin', 'Ikhwan', '2017-12-16', 'S.E', 'Banten', 'alfin@tazkia.ac.id', '0856738283', NULL, 32);

-- --------------------------------------------------------

--
-- Table structure for table `planjut`
--

CREATE TABLE `planjut` (
  `id_planjut` int(11) NOT NULL,
  `id_psanksi` int(11) DEFAULT NULL,
  `nama_tindaklanjut` varchar(50) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planjut`
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
-- Table structure for table `pmain`
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

--
-- Dumping data for table `pmain`
--

INSERT INTO `pmain` (`id_pelanggaran`, `id_mhsbinaan`, `id_pbentuk`, `id_paksi`, `id_psanksi`, `id_planjut`, `deskripsi`, `tanggal`) VALUES
(1, 1, 1, 5, 3, 8, 'test', '2018-04-15'),
(2, 4, 2, 8, 3, 10, 'test', '2018-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `psanksi`
--

CREATE TABLE `psanksi` (
  `id_psanksi` int(11) NOT NULL,
  `nama_sanksi` varchar(5) DEFAULT NULL,
  `bobot` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psanksi`
--

INSERT INTO `psanksi` (`id_psanksi`, `nama_sanksi`, `bobot`) VALUES
(1, 'SP 1', 'Ringan'),
(2, 'SP 2', 'Menengah'),
(3, 'SP 3', 'Berat');

-- --------------------------------------------------------

--
-- Table structure for table `shalat`
--

CREATE TABLE `shalat` (
  `id_mahasiswa` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `wkt_tapping` time DEFAULT NULL,
  `wkt_shalat` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `password_default`, `level`, `last_login`) VALUES
(1, 'admin', 'admin', 0, 0, '2018-03-12 08:11:33'),
(2, 'derry', 'derry123', 0, 2, '2018-04-17 14:34:59'),
(21, 'bintang', 'bintang123', 0, 3, '2018-03-12 08:11:09'),
(22, 'aya', 'aya123', 0, 3, '2017-12-02 16:23:35'),
(23, 'hasan', 'hasan123', 0, 2, '2017-11-30 17:06:08'),
(24, 'rizky@tazkia.ac.id', 'rizy123', 0, 3, '0000-00-00 00:00:00'),
(25, 'rian', 'rian123', 0, 3, '2018-03-12 08:09:33'),
(26, 'adita', 'adita123', 0, 3, '0000-00-00 00:00:00'),
(27, 'riyan', 'riyan123', 0, 3, '2018-03-12 08:10:45'),
(28, 'rizqan', 'rizqan123', 0, 3, '0000-00-00 00:00:00'),
(29, 'sofi', 'sofi123', 0, 3, '2017-12-02 21:28:17'),
(30, 'diva', 'diva123', 0, 3, '0000-00-00 00:00:00'),
(31, 'huda', 'huda123', 0, 3, '2017-12-02 21:27:39'),
(32, 'alfin', 'alfin123', 0, 3, '0000-00-00 00:00:00'),
(33, '17101003', 'hmQ9vft019', 1, 4, '2018-04-04 11:24:13'),
(34, '17102002', 'eshhU2Nd41', 1, 4, '0000-00-00 00:00:00'),
(35, '17101004', 'r9uP6s8ixZ', 1, 4, '0000-00-00 00:00:00'),
(36, '17101005', 'W245eiU9ua', 1, 4, '0000-00-00 00:00:00'),
(37, '17102003', 'H1S4sT9D3c', 1, 4, '0000-00-00 00:00:00'),
(38, '17104002', '3F80U1xE0G', 1, 4, '0000-00-00 00:00:00'),
(39, '17101006', 'Bot0T8lcwF', 1, 4, '0000-00-00 00:00:00'),
(40, '17101007', 'JS8RktgH3j', 1, 4, '0000-00-00 00:00:00'),
(41, '17101008', 'f9TD974QfZ', 1, 4, '0000-00-00 00:00:00'),
(42, '17101010', 'pwGY418U2q', 1, 4, '0000-00-00 00:00:00'),
(43, '17102004', 'W00E218vAy', 1, 4, '0000-00-00 00:00:00'),
(44, '17102005', 'N8kpg62wxZ', 1, 4, '0000-00-00 00:00:00'),
(45, '17103001', '7U60Fi3HyI', 1, 4, '0000-00-00 00:00:00'),
(46, '17103002', '1gDh5Od5m9', 1, 4, '0000-00-00 00:00:00'),
(47, '17101009', 'hLt4YqM6e7', 1, 4, '0000-00-00 00:00:00'),
(48, '17101011', 'AWW8LTdX3M', 1, 4, '0000-00-00 00:00:00'),
(49, '17101012', 'V05KnGa74C', 1, 4, '0000-00-00 00:00:00'),
(50, '17102006', 'Rak55oiNKv', 1, 4, '0000-00-00 00:00:00'),
(51, '17102007', '9o793rsY2r', 1, 4, '0000-00-00 00:00:00'),
(52, '17102008', 'Q8Jg7RgAeg', 1, 4, '0000-00-00 00:00:00'),
(53, '17102009', 'mA8y9pwECN', 1, 4, '0000-00-00 00:00:00'),
(54, '17102010', 'cN5zRjhZzW', 1, 4, '0000-00-00 00:00:00'),
(55, '17102011', 'ebHUE2fe53', 1, 4, '0000-00-00 00:00:00'),
(56, '17103003', '17kX07jcgx', 1, 4, '0000-00-00 00:00:00'),
(57, '17101013', 'U53Y3525eh', 1, 4, '0000-00-00 00:00:00'),
(58, '17101014', 'PM8Oj1eXYK', 1, 4, '0000-00-00 00:00:00'),
(59, '17101015', 'ATTE6l9H3k', 1, 4, '0000-00-00 00:00:00'),
(60, '17101016', 't86Ce5F040', 1, 4, '0000-00-00 00:00:00'),
(61, '17102012', 'C08t12zl5i', 1, 4, '0000-00-00 00:00:00'),
(62, '17102013', '566jgBw8fO', 1, 4, '0000-00-00 00:00:00'),
(63, '17102014', '437LvaCDYn', 1, 4, '0000-00-00 00:00:00'),
(64, '17102015', 'BHzTL3TpJO', 1, 4, '0000-00-00 00:00:00'),
(65, '17101017', 'p5qb108X1U', 1, 4, '0000-00-00 00:00:00'),
(66, '17101018', 'NNoS033CzR', 1, 4, '0000-00-00 00:00:00'),
(67, '17101019', 'K8VHoLBijO', 1, 4, '0000-00-00 00:00:00'),
(68, '17101020', 'uNU3Lxa6kB', 1, 4, '0000-00-00 00:00:00'),
(69, '17101021', '30e1j6A9t4', 1, 4, '0000-00-00 00:00:00'),
(70, '17101022', '0y3Upgc4lE', 1, 4, '0000-00-00 00:00:00'),
(71, '17101023', '7HH9c3Y5LY', 1, 4, '0000-00-00 00:00:00'),
(72, '17101024', '9Dg19o8jpf', 1, 4, '0000-00-00 00:00:00'),
(73, '17101025', 'Hvo73009iF', 1, 4, '0000-00-00 00:00:00'),
(74, '17101026', '0I9H6eNt4V', 1, 4, '0000-00-00 00:00:00'),
(75, '17101027', 'R6bss2olr4', 1, 4, '0000-00-00 00:00:00'),
(76, '17101028', 'q45u8SGc7n', 1, 4, '0000-00-00 00:00:00'),
(77, '17101029', 'gTvvphtBrV', 1, 4, '0000-00-00 00:00:00'),
(78, '17101030', 'ztCwGjDnm4', 1, 4, '0000-00-00 00:00:00'),
(79, '17101031', 'btMt76j56t', 1, 4, '0000-00-00 00:00:00'),
(80, '17101032', '0j2MS35V00', 1, 4, '0000-00-00 00:00:00'),
(81, '17101033', '38XPWA491F', 1, 4, '0000-00-00 00:00:00'),
(82, '17101034', '6aEvELLrj5', 1, 4, '0000-00-00 00:00:00'),
(83, '17101035', 'wjb46K7E4n', 1, 4, '0000-00-00 00:00:00'),
(84, '17101036', '3MJ9bFin6F', 1, 4, '0000-00-00 00:00:00'),
(85, '17101037', '69c439EBe7', 1, 4, '0000-00-00 00:00:00'),
(86, '17102016', '55SPC43KO8', 1, 4, '0000-00-00 00:00:00'),
(87, '17102017', '1ud4TOOApq', 1, 4, '0000-00-00 00:00:00'),
(88, '17102018', 'jU5aXG6Or9', 1, 4, '0000-00-00 00:00:00'),
(89, '17102019', 'Mq6Ma6wWwB', 1, 4, '0000-00-00 00:00:00'),
(90, '17103004', '2tM5P9936c', 1, 4, '0000-00-00 00:00:00'),
(91, '17103005', '21gu9Ed2Qm', 1, 4, '0000-00-00 00:00:00'),
(92, '17103006', 'meR9be5d86', 1, 4, '0000-00-00 00:00:00'),
(93, '17101044', 'vV2P4PXxbB', 1, 4, '0000-00-00 00:00:00'),
(94, '17101043', 'N7VjX10e2g', 1, 4, '0000-00-00 00:00:00'),
(95, '17102022', 'yC3eyHP6DF', 1, 4, '0000-00-00 00:00:00'),
(96, '17102023', '9xhDAXrAq2', 1, 4, '0000-00-00 00:00:00'),
(97, '17104003', '04241palwa', 1, 4, '0000-00-00 00:00:00'),
(98, '17102021', 'm9EYj255Ug', 1, 4, '0000-00-00 00:00:00'),
(99, '17101041', '40NTgc64Hz', 1, 4, '0000-00-00 00:00:00'),
(100, '17101042', 'YC4wJ8MrDJ', 1, 4, '0000-00-00 00:00:00'),
(101, '17103007', '25zI13v6Ch', 1, 4, '0000-00-00 00:00:00'),
(102, '17101040', 'O5X85NNKEZ', 1, 4, '0000-00-00 00:00:00'),
(103, '17103008', 'q8dR9CFGo0', 1, 4, '0000-00-00 00:00:00'),
(104, '17102020', 'Xoj60Rhp7W', 1, 4, '0000-00-00 00:00:00'),
(105, '17101039', '33cV0S5683', 1, 4, '0000-00-00 00:00:00'),
(106, '17101038', 'HSB6zW13H4', 1, 4, '0000-00-00 00:00:00'),
(107, '17103010', 'C0cm8QBio5', 1, 4, '0000-00-00 00:00:00'),
(108, '17101055', '9Evz0OIk44', 1, 4, '0000-00-00 00:00:00'),
(109, '17101054', '68M05072D2', 1, 4, '0000-00-00 00:00:00'),
(110, '17102027', 'HrnKa7H1GY', 1, 4, '0000-00-00 00:00:00'),
(111, '17101052', 'A1G49bFjg0', 1, 4, '0000-00-00 00:00:00'),
(112, '17101053', 'hBe4kgFzq7', 1, 4, '0000-00-00 00:00:00'),
(113, '17101050', '3m95iOxkDt', 1, 4, '0000-00-00 00:00:00'),
(114, '17104005', 'ckTiJ1173w', 1, 4, '0000-00-00 00:00:00'),
(115, '17101051', 't170kWlw48', 1, 4, '0000-00-00 00:00:00'),
(116, '17101049', 'RkvpifOhR4', 1, 4, '0000-00-00 00:00:00'),
(117, '17102026', 'EZo51zQx70', 1, 4, '0000-00-00 00:00:00'),
(118, '17104004', 'JUFpRj7ylT', 1, 4, '0000-00-00 00:00:00'),
(119, '17101048', 'QXgIRhXYb7', 1, 4, '0000-00-00 00:00:00'),
(120, '17102025', '6lj8W97wjs', 1, 4, '0000-00-00 00:00:00'),
(121, '17101047', 'G4xZxz6QVu', 1, 4, '0000-00-00 00:00:00'),
(122, '17101046', 'A602k519LS', 1, 4, '0000-00-00 00:00:00'),
(123, '17101045', 'hth5U3KdUG', 1, 4, '0000-00-00 00:00:00'),
(124, '17102024', '2U767Aw12X', 1, 4, '0000-00-00 00:00:00'),
(125, '17103013', 'lHKBe5XX2E', 1, 4, '0000-00-00 00:00:00'),
(126, '17102030', 'bDz1Q14744', 1, 4, '0000-00-00 00:00:00'),
(127, '17101056', 'Or7zsvX2As', 1, 4, '0000-00-00 00:00:00'),
(128, '17103014', '48jZWXkY28', 1, 4, '0000-00-00 00:00:00'),
(129, '17103012', 'Fc43CpW9vh', 1, 4, '0000-00-00 00:00:00'),
(130, '17102029', 'JBHbwL2M8k', 1, 4, '0000-00-00 00:00:00'),
(131, '17103009', 'TVM2G2NgPT', 1, 4, '0000-00-00 00:00:00'),
(132, '17103011', 'T92xa604lL', 1, 4, '0000-00-00 00:00:00'),
(133, '17102028', '4NNA7Pzl0N', 1, 4, '0000-00-00 00:00:00'),
(134, '17103018', 'M651B9JrPF', 1, 4, '0000-00-00 00:00:00'),
(135, '17102035', 'Xw7YQT69jp', 1, 4, '0000-00-00 00:00:00'),
(136, '17101070', 'aBmd1Ky89A', 1, 4, '0000-00-00 00:00:00'),
(137, '17101072', '63a968lK9F', 1, 4, '0000-00-00 00:00:00'),
(138, '17101071', '28maDTSqsL', 1, 4, '0000-00-00 00:00:00'),
(139, '17101069', '64wiwm16aa', 1, 4, '0000-00-00 00:00:00'),
(140, '17102034', '4AtfD1WXYh', 1, 4, '0000-00-00 00:00:00'),
(141, '17103017', '2R6AaQNgnV', 1, 4, '0000-00-00 00:00:00'),
(142, '17103016', '5xprHw5P2R', 1, 4, '0000-00-00 00:00:00'),
(143, '17101068', 'hsv7e40CY7', 1, 4, '0000-00-00 00:00:00'),
(144, '17103015', '801Ltq4yYI', 1, 4, '0000-00-00 00:00:00'),
(145, '17101067', 'Fo0icY00Un', 1, 4, '0000-00-00 00:00:00'),
(146, '17101065', '721HG6495K', 1, 4, '0000-00-00 00:00:00'),
(147, '17102033', 'xb9tu9gZE9', 1, 4, '0000-00-00 00:00:00'),
(148, '17101066', '9R3Z28OZAH', 1, 4, '0000-00-00 00:00:00'),
(149, '17104006', 'sS21F9VLI6', 1, 4, '0000-00-00 00:00:00'),
(150, '17102032', '2R2E78lmf6', 1, 4, '0000-00-00 00:00:00'),
(151, '17101064', 'AhIZ3HSreB', 1, 4, '0000-00-00 00:00:00'),
(152, '17101061', '4Y6J2qe75B', 1, 4, '0000-00-00 00:00:00'),
(153, '17101063', '8pb369i137', 1, 4, '0000-00-00 00:00:00'),
(154, '17101062', 'm5ZFK7kE76', 1, 4, '0000-00-00 00:00:00'),
(155, '17101060', '95660495M9', 1, 4, '0000-00-00 00:00:00'),
(156, '17101059', '2SUbs45fZ3', 1, 4, '0000-00-00 00:00:00'),
(157, '17102031', 'Q2gOCX3gxy', 1, 4, '0000-00-00 00:00:00'),
(158, '17101058', '6jA93f6L2l', 1, 4, '0000-00-00 00:00:00'),
(159, '17101057', 'n1ZPc87ERJ', 1, 4, '0000-00-00 00:00:00'),
(160, '17101077', '7VBfKg21AE', 1, 4, '0000-00-00 00:00:00'),
(161, '17101075', 'Nqs1wX4Ka8', 1, 4, '0000-00-00 00:00:00'),
(162, '17101074', '04YkalP6o4', 1, 4, '0000-00-00 00:00:00'),
(163, '17101073', 'BvWeGX0zOp', 1, 4, '0000-00-00 00:00:00'),
(164, '17103022', 'g8X3m0dCot', 1, 4, '0000-00-00 00:00:00'),
(165, '17102037', '5lr32CJpPb', 1, 4, '0000-00-00 00:00:00'),
(166, '17102038', 'T9Q13mC41C', 1, 4, '0000-00-00 00:00:00'),
(167, '17103021', 'dM970qH8XR', 1, 4, '0000-00-00 00:00:00'),
(168, '17103020', 'UVi2bsEjlW', 1, 4, '0000-00-00 00:00:00'),
(169, '17101079', '3SxXGKwsn4', 1, 4, '0000-00-00 00:00:00'),
(170, '17102036', 'k993cP79C2', 1, 4, '0000-00-00 00:00:00'),
(171, '17103019', '29xlO5dL37', 1, 4, '0000-00-00 00:00:00'),
(172, '17102040', '7DMZQs0qSE', 1, 4, '0000-00-00 00:00:00'),
(173, '17102039', 'JIfm07gSiM', 1, 4, '0000-00-00 00:00:00'),
(174, '17101080', 'n083aH785y', 1, 4, '0000-00-00 00:00:00'),
(175, '17101081', 'RS1Y49O2En', 1, 4, '0000-00-00 00:00:00'),
(176, '17102047', 'JA4a980xjv', 1, 4, '0000-00-00 00:00:00'),
(177, '17103025', '4iHRok1675', 1, 4, '0000-00-00 00:00:00'),
(178, '17102046', 'h25l45382v', 1, 4, '0000-00-00 00:00:00'),
(179, '17101086', 'ssyF2E11K7', 1, 4, '0000-00-00 00:00:00'),
(180, '17101088', 'O5VB19IdBi', 1, 4, '0000-00-00 00:00:00'),
(181, '17102045', 'Tw19a7ztSH', 1, 4, '0000-00-00 00:00:00'),
(182, '17101087', '4TG3Y26LPq', 1, 4, '0000-00-00 00:00:00'),
(183, '17103024', 'DH40NMaOPU', 1, 4, '0000-00-00 00:00:00'),
(184, '17102044', '5T9MRu9qw2', 1, 4, '0000-00-00 00:00:00'),
(185, '17101085', 'hsf0fw2BEq', 1, 4, '0000-00-00 00:00:00'),
(186, '17101083', '195Y7I8LJ5', 1, 4, '0000-00-00 00:00:00'),
(187, '17102043', 'XV52h99D95', 1, 4, '0000-00-00 00:00:00'),
(188, '17101084', '4Hg8O92102', 1, 4, '0000-00-00 00:00:00'),
(189, '17102042', '7h52sXMQzg', 1, 4, '0000-00-00 00:00:00'),
(190, '17102041', '43x1R7aHL1', 1, 4, '0000-00-00 00:00:00'),
(191, '17103023', 'u5DHnR5n5K', 1, 4, '0000-00-00 00:00:00'),
(192, '17101082', '0eFR1bnee6', 1, 4, '0000-00-00 00:00:00'),
(193, '17104007', 'Vw9p3a74zi', 1, 4, '0000-00-00 00:00:00'),
(194, '17103028', '30d8PM0z39', 1, 4, '0000-00-00 00:00:00'),
(195, '17102051', 'S5rpZFM9K1', 1, 4, '0000-00-00 00:00:00'),
(196, '17101089', 're316d1l87', 1, 4, '0000-00-00 00:00:00'),
(197, '17102050', 'gGJ6zxy6sB', 1, 4, '0000-00-00 00:00:00'),
(198, '17102049', 'xyWvzJ5rn7', 1, 4, '0000-00-00 00:00:00'),
(199, '17101091', 'zFi8302E2o', 1, 4, '0000-00-00 00:00:00'),
(200, '17103026', '5L1Prhn0ak', 1, 4, '0000-00-00 00:00:00'),
(201, '17101076', '089e14C0Uz', 1, 4, '0000-00-00 00:00:00'),
(202, '17102048', '3sy55sPEuw', 1, 4, '0000-00-00 00:00:00'),
(203, '17102053', 'I06rb145v9', 1, 4, '0000-00-00 00:00:00'),
(204, '17101090', '1u60oM75fG', 1, 4, '0000-00-00 00:00:00'),
(205, '17101095', 'hp2LloNn9Y', 1, 4, '0000-00-00 00:00:00'),
(206, '17103030', 't2Hk191ib0', 1, 4, '0000-00-00 00:00:00'),
(207, '17101093', 'skeie9800g', 1, 4, '0000-00-00 00:00:00'),
(208, '17103029', 'd05J4EdTlS', 1, 4, '0000-00-00 00:00:00'),
(209, '17101092', 'vkm7x50N2s', 1, 4, '0000-00-00 00:00:00'),
(210, '17102054', 'c7oaAii31k', 1, 4, '0000-00-00 00:00:00'),
(211, '17101103', 'n98v414Q9H', 1, 4, '0000-00-00 00:00:00'),
(212, '17102052', 'nq69vzbSoQ', 1, 4, '0000-00-00 00:00:00'),
(213, '17101102', 'X4D4Y8gn7m', 1, 4, '0000-00-00 00:00:00'),
(214, '17101098', 'Y3Oibk5qZM', 1, 4, '0000-00-00 00:00:00'),
(215, '17101101', '79X2Hm5ahc', 1, 4, '0000-00-00 00:00:00'),
(216, '17101099', 'qgSg4JI9tI', 1, 4, '0000-00-00 00:00:00'),
(217, '17101100', 'k3T2UO4FuB', 1, 4, '0000-00-00 00:00:00'),
(218, '17101097', '4IM01i3qf9', 1, 4, '0000-00-00 00:00:00'),
(219, '17101094', 'hRa8LFyT56', 1, 4, '0000-00-00 00:00:00'),
(220, '17101096', '8Zz5mv6Do5', 1, 4, '0000-00-00 00:00:00'),
(221, '17101106', 'ejLlnvvx5q', 1, 4, '0000-00-00 00:00:00'),
(222, '17101104', 'o8OQt1v6aj', 1, 4, '0000-00-00 00:00:00'),
(223, '17101118', 'C1YFD5O79L', 1, 4, '0000-00-00 00:00:00'),
(224, '17101117', '9Ck900E0MB', 1, 4, '0000-00-00 00:00:00'),
(225, '17102060', '74FqAnrl84', 1, 4, '0000-00-00 00:00:00'),
(226, '17103033', 'p71d5f2600', 1, 4, '0000-00-00 00:00:00'),
(227, '17101116', 'yO547j8JaN', 1, 4, '0000-00-00 00:00:00'),
(228, '17102058', 'o0jc3cCB7S', 1, 4, '0000-00-00 00:00:00'),
(229, '17101115', 'zv9Z2SRuY5', 1, 4, '0000-00-00 00:00:00'),
(230, '17103032', '1qh0p3dLr2', 1, 4, '0000-00-00 00:00:00'),
(231, '17101113', 'ubbQ9lNhE2', 1, 4, '0000-00-00 00:00:00'),
(232, '17101111', 'w8uH85UiK2', 1, 4, '0000-00-00 00:00:00'),
(233, '17102057', '03nm0XUlZv', 1, 4, '0000-00-00 00:00:00'),
(234, '17101114', '6J7a74jLbQ', 1, 4, '0000-00-00 00:00:00'),
(235, '17101112', 'VRIuXYEe6z', 1, 4, '0000-00-00 00:00:00'),
(236, '17101109', 'eh2wM3bRf0', 1, 4, '0000-00-00 00:00:00'),
(237, '17101110', 'K8I2yP84eL', 1, 4, '0000-00-00 00:00:00'),
(238, '17102055', 'J7Xkj2SUn9', 1, 4, '0000-00-00 00:00:00'),
(239, '17102056', 'Sfu3yj1jUO', 1, 4, '0000-00-00 00:00:00'),
(240, '17103031', 'n2L3j1rZ2e', 1, 4, '0000-00-00 00:00:00'),
(241, '17101108', 'ACb128Tc0R', 1, 4, '0000-00-00 00:00:00'),
(242, '17101107', '4BeFru9JkV', 1, 4, '0000-00-00 00:00:00'),
(243, '17101105', '6Fr9gI4Hg1', 1, 4, '0000-00-00 00:00:00'),
(244, '17102062', 'CpXS92z65b', 1, 4, '0000-00-00 00:00:00'),
(245, '17102063', 'xCqK789k5C', 1, 4, '0000-00-00 00:00:00'),
(246, '17102059', 'Vyb17ymlk3', 1, 4, '0000-00-00 00:00:00'),
(247, '17102061', '872W113mYw', 1, 4, '0000-00-00 00:00:00'),
(248, '17101127', 'k7lkVw6n26', 1, 4, '0000-00-00 00:00:00'),
(249, '17101128', '08U8MPvYI9', 1, 4, '0000-00-00 00:00:00'),
(250, '17101124', 'aRAbos8055', 1, 4, '0000-00-00 00:00:00'),
(251, '17101126', 'U33tu13X43', 1, 4, '0000-00-00 00:00:00'),
(252, '17103037', 'C5VR823TW8', 1, 4, '0000-00-00 00:00:00'),
(253, '17103036', 'G9xT03gx7a', 1, 4, '0000-00-00 00:00:00'),
(254, '17101123', 'l21ROkMnV3', 1, 4, '0000-00-00 00:00:00'),
(255, '17102065', 'bFvp3uwxn8', 1, 4, '0000-00-00 00:00:00'),
(256, '17101122', '0DO5hRy5Q3', 1, 4, '0000-00-00 00:00:00'),
(257, '17101119', 'zsid3Le2uB', 1, 4, '0000-00-00 00:00:00'),
(258, '17103035', 'rp3OzGA48a', 1, 4, '0000-00-00 00:00:00'),
(259, '17101121', '9H96p1OitT', 1, 4, '0000-00-00 00:00:00'),
(260, '17103034', '0Br5600u88', 1, 4, '0000-00-00 00:00:00'),
(261, '17101120', 'bGoMcl8E8r', 1, 4, '0000-00-00 00:00:00'),
(262, '17102064', 'C151aa245c', 1, 4, '0000-00-00 00:00:00'),
(263, '17101135', '8L5id418Ro', 1, 4, '0000-00-00 00:00:00'),
(264, '17103040', 'V4wO96e1v1', 1, 4, '0000-00-00 00:00:00'),
(265, '17103039', '9121iu90j9', 1, 4, '0000-00-00 00:00:00'),
(266, '17101133', '4q1a3aq81g', 1, 4, '0000-00-00 00:00:00'),
(267, '17101134', 'EvzJvDjCvn', 1, 4, '0000-00-00 00:00:00'),
(268, '17101132', 'LY4G72FD4x', 1, 4, '0000-00-00 00:00:00'),
(269, '17101130', 'L0nf61UqKB', 1, 4, '0000-00-00 00:00:00'),
(270, '17102068', 'pAW10th605', 1, 4, '0000-00-00 00:00:00'),
(271, '17101131', 'emYE9eukJL', 1, 4, '0000-00-00 00:00:00'),
(272, '17102067', '048fxykzgA', 1, 4, '0000-00-00 00:00:00'),
(273, '17102066', 'uRWJ9Z4tNy', 1, 4, '0000-00-00 00:00:00'),
(274, '17101125', '4a8sR4JPsf', 1, 4, '0000-00-00 00:00:00'),
(275, '17101129', 'Oj9zNo8er1', 1, 4, '0000-00-00 00:00:00'),
(276, '17103038', 'Ep4l1pT4UR', 1, 4, '0000-00-00 00:00:00'),
(277, '17102078', '65s7iuWU3S', 1, 4, '0000-00-00 00:00:00'),
(278, '17103046', 'zy13IwSAJe', 1, 4, '0000-00-00 00:00:00'),
(279, '17101157', 'AoIyy42gqp', 1, 4, '0000-00-00 00:00:00'),
(280, '17101154', '59tRi9T6xM', 1, 4, '0000-00-00 00:00:00'),
(281, '17102077', 'LEu9gCZJnZ', 1, 4, '0000-00-00 00:00:00'),
(282, '17104008', 'ZmiyuEjdSF', 1, 4, '0000-00-00 00:00:00'),
(283, '17101156', '6UN19XbQ65', 1, 4, '0000-00-00 00:00:00'),
(284, '17101155', 'I0jN229D4v', 1, 4, '0000-00-00 00:00:00'),
(285, '17101153', '9Zy7EdDOPh', 1, 4, '0000-00-00 00:00:00'),
(286, '17102076', 'n0xRaaOy1E', 1, 4, '0000-00-00 00:00:00'),
(287, '17101152', 'O585Js4VIg', 1, 4, '0000-00-00 00:00:00'),
(288, '17103044', 'yGA5u3eObY', 1, 4, '0000-00-00 00:00:00'),
(289, '17102075', 'C1zHUDlK1j', 1, 4, '0000-00-00 00:00:00'),
(290, '17101151', 'nJ7g3V20ad', 1, 4, '0000-00-00 00:00:00'),
(291, '17102074', 'g1UP14EuLq', 1, 4, '0000-00-00 00:00:00'),
(292, '17103045', 'aG4O4PsDc9', 1, 4, '0000-00-00 00:00:00'),
(293, '17101148', 'eE8sDp4aw3', 1, 4, '0000-00-00 00:00:00'),
(294, '17102073', '5v1t7Lm35a', 1, 4, '0000-00-00 00:00:00'),
(295, '17101150', '2nDNxAeYh7', 1, 4, '0000-00-00 00:00:00'),
(296, '17101149', 'X12on8ll00', 1, 4, '0000-00-00 00:00:00'),
(297, '17101147', 'cNu9N8MK6n', 1, 4, '0000-00-00 00:00:00'),
(298, '17101146', '10A6vWzc7l', 1, 4, '0000-00-00 00:00:00'),
(299, '17102072', '6rj81EjGlq', 1, 4, '0000-00-00 00:00:00'),
(300, '17101145', '040vBI85K1', 1, 4, '0000-00-00 00:00:00'),
(301, '17103043', 't85q6Hs7d7', 1, 4, '0000-00-00 00:00:00'),
(302, '17101142', '0xpZ0rszi7', 1, 4, '0000-00-00 00:00:00'),
(303, '17102071', 'QgTBt6n69F', 1, 4, '0000-00-00 00:00:00'),
(304, '17101144', '3Zt3g8K4K9', 1, 4, '0000-00-00 00:00:00'),
(305, '17101143', '8832G91uIp', 1, 4, '0000-00-00 00:00:00'),
(306, '17101141', 'AW12l5zJAN', 1, 4, '0000-00-00 00:00:00'),
(307, '17101140', 'YDB50D1805', 1, 4, '0000-00-00 00:00:00'),
(308, '17102069', '7z7a4Us9Cw', 1, 4, '0000-00-00 00:00:00'),
(309, '17103041', 'GX4CiBKdQ3', 1, 4, '0000-00-00 00:00:00'),
(310, '17101139', 'yI98uY9Oqv', 1, 4, '0000-00-00 00:00:00'),
(311, '17101138', '10L7m4XAN7', 1, 4, '0000-00-00 00:00:00'),
(312, '17103042', '105AYGmZq5', 1, 4, '0000-00-00 00:00:00'),
(313, '17102070', 'bQVmQD4PDp', 1, 4, '0000-00-00 00:00:00'),
(314, '17101137', 'P8tZmSq7YN', 1, 4, '0000-00-00 00:00:00'),
(315, '17101136', 'lgfU4vTyEj', 1, 4, '0000-00-00 00:00:00'),
(316, '17101166', 'Gzcq55No1R', 1, 4, '0000-00-00 00:00:00'),
(317, '17101165', '5Sxl9UR2pb', 1, 4, '0000-00-00 00:00:00'),
(318, '17101164', 'A49JXoRreF', 1, 4, '0000-00-00 00:00:00'),
(319, '17101163', 'IMWNKnGx61', 1, 4, '0000-00-00 00:00:00'),
(320, '17103048', '2WpFV1o9h7', 1, 4, '0000-00-00 00:00:00'),
(321, '17101162', 'tq9R2a6F9h', 1, 4, '0000-00-00 00:00:00'),
(322, '17102081', 'hKBK710PL0', 1, 4, '0000-00-00 00:00:00'),
(323, '17102080', 'soTkLSW86t', 1, 4, '0000-00-00 00:00:00'),
(324, '17101161', 'NrYH3XoeES', 1, 4, '0000-00-00 00:00:00'),
(325, '17103047', 'YTYc63aSX1', 1, 4, '0000-00-00 00:00:00'),
(326, '17102079', '6pMk14EvH5', 1, 4, '0000-00-00 00:00:00'),
(327, '17101159', 'AY3B3cYfDx', 1, 4, '0000-00-00 00:00:00'),
(328, '17101160', 'w2Fm9kIw7k', 1, 4, '0000-00-00 00:00:00'),
(329, '17104009', 'Uh10B4UfNT', 1, 4, '0000-00-00 00:00:00'),
(330, '17101158', '4tNyy5F9Cj', 1, 4, '0000-00-00 00:00:00'),
(331, '17101176', 'lx64FC33w5', 1, 4, '0000-00-00 00:00:00'),
(332, '17101175', 'D81JDcIo7j', 1, 4, '0000-00-00 00:00:00'),
(333, '17102083', 'L00229f5Ce', 1, 4, '0000-00-00 00:00:00'),
(334, '17102082', 'U59IHulHi7', 1, 4, '0000-00-00 00:00:00'),
(335, '17101174', 'PHH12je959', 1, 4, '0000-00-00 00:00:00'),
(336, '17101171', 'WP503P7pv2', 1, 4, '0000-00-00 00:00:00'),
(337, '17101172', 'B44ziWLXLr', 1, 4, '0000-00-00 00:00:00'),
(338, '17101173', 'FG98oHwh5w', 1, 4, '0000-00-00 00:00:00'),
(339, '17101167', 'ItD4G2lgHg', 1, 4, '0000-00-00 00:00:00'),
(340, '17101170', 'NwLy7phyrt', 1, 4, '0000-00-00 00:00:00'),
(341, '17101169', 'T342b57CLc', 1, 4, '0000-00-00 00:00:00'),
(342, '17101168', 'cD4nFF5Wg7', 1, 4, '0000-00-00 00:00:00'),
(343, '17101180', 'loi06K71cy', 1, 4, '0000-00-00 00:00:00'),
(344, '17101179', 'zAuhyPHwDZ', 1, 4, '0000-00-00 00:00:00'),
(345, '17102085', '4vkYYV8xso', 1, 4, '0000-00-00 00:00:00'),
(346, '17101178', 'QnPsgApkxd', 1, 4, '0000-00-00 00:00:00'),
(347, '17102084', '84S3ptQ6PW', 1, 4, '0000-00-00 00:00:00'),
(348, '17103049', 'xG616On192', 1, 4, '0000-00-00 00:00:00'),
(349, '17101177', '3d5I70EyS3', 1, 4, '0000-00-00 00:00:00'),
(350, '17101182', 'zSAIhV7PH5', 1, 4, '0000-00-00 00:00:00'),
(351, '17101183', 'hd8nI132mw', 1, 4, '0000-00-00 00:00:00'),
(352, '17102086', '071mFf18v8', 1, 4, '0000-00-00 00:00:00'),
(353, '17101181', '9o6UngPfhZ', 1, 4, '0000-00-00 00:00:00'),
(354, '17101184', '80UlVLTHCF', 1, 4, '0000-00-00 00:00:00'),
(355, '17101185', '0Wn104GjCv', 1, 4, '0000-00-00 00:00:00'),
(356, '17101187', 'MhLb9kX8U7', 1, 4, '0000-00-00 00:00:00'),
(357, '17101189', 'k621nEZxBi', 1, 4, '0000-00-00 00:00:00'),
(358, '17101188', '61Mb0CQ9EI', 1, 4, '0000-00-00 00:00:00'),
(359, '17103052', '4O0B4036Ff', 1, 4, '0000-00-00 00:00:00'),
(360, '17104010', '5hhmk22tM0', 1, 4, '0000-00-00 00:00:00'),
(361, '17101186', 'eX3H0A1Nk2', 1, 4, '0000-00-00 00:00:00'),
(362, '17103050', 'r17RU1MqHS', 1, 4, '0000-00-00 00:00:00'),
(363, '17102087', 'e5q2gt672y', 1, 4, '0000-00-00 00:00:00'),
(364, '17101190', '35Wq1Q2R6g', 1, 4, '0000-00-00 00:00:00'),
(365, '17102088', 'D9B675nC9J', 1, 4, '0000-00-00 00:00:00'),
(366, '17101225', '28U5zkVWxE', 1, 4, '0000-00-00 00:00:00'),
(367, '17101217', '3e2NJj0279', 1, 4, '0000-00-00 00:00:00'),
(368, '17101216', 'O65d8SE8pN', 1, 4, '0000-00-00 00:00:00'),
(369, '17101210', 'j9Mebba05a', 1, 4, '0000-00-00 00:00:00'),
(370, '17101223', 'btG5368BD9', 1, 4, '0000-00-00 00:00:00'),
(371, '17101221', '7I01J57Qfw', 1, 4, '0000-00-00 00:00:00'),
(372, '17101219', 'VM48289WSG', 1, 4, '0000-00-00 00:00:00'),
(373, '17101226', 'ZidaV8m2g7', 1, 4, '0000-00-00 00:00:00'),
(374, '17101220', '473UYi8L75', 1, 4, '0000-00-00 00:00:00'),
(375, '17102095', 'aaL2WgbIN6', 1, 4, '0000-00-00 00:00:00'),
(376, '17101208', '6qA37xK7g4', 1, 4, '0000-00-00 00:00:00'),
(377, '17103053', 'rF95wAa5S8', 1, 4, '0000-00-00 00:00:00'),
(378, '17102091', 'W0BbjF3Z46', 1, 4, '0000-00-00 00:00:00'),
(379, '17103057', 'zg19QENMNy', 1, 4, '0000-00-00 00:00:00'),
(380, '17101204', 'E2zFYJ6ABT', 1, 4, '0000-00-00 00:00:00'),
(381, '17101212', '41h950s0u1', 1, 4, '0000-00-00 00:00:00'),
(382, '17101211', '2NKI2Yt9Cy', 1, 4, '0000-00-00 00:00:00'),
(383, '17102093', 'Q73r32rZe7', 1, 4, '0000-00-00 00:00:00'),
(384, '17101233', 'TmY0Lj3c48', 1, 4, '0000-00-00 00:00:00'),
(385, '17101195', '48Azk2a0zz', 1, 4, '0000-00-00 00:00:00'),
(386, '17101203', '58FQOigO50', 1, 4, '0000-00-00 00:00:00'),
(387, '17101193', 'Kwlkcnh6Bn', 1, 4, '0000-00-00 00:00:00'),
(388, '17101192', '1521OBuDe7', 1, 4, '0000-00-00 00:00:00'),
(389, '17101207', 'phvk9Y06VP', 1, 4, '0000-00-00 00:00:00'),
(390, '17102090', 'O7YD2UX7ts', 1, 4, '0000-00-00 00:00:00'),
(391, '17101227', 'uj39UctuDg', 1, 4, '0000-00-00 00:00:00'),
(392, '17101229', 'q2bSG92073', 1, 4, '0000-00-00 00:00:00'),
(393, '17102094', 'fs6nu6eb7G', 1, 4, '0000-00-00 00:00:00'),
(394, '17101214', '1O4AGaS1EO', 1, 4, '0000-00-00 00:00:00'),
(395, '17103060', '7Yl373vJS5', 1, 4, '0000-00-00 00:00:00'),
(396, '17101228', 'VFaSQP9bdU', 1, 4, '0000-00-00 00:00:00'),
(397, '17103061', '77Rd34qYSY', 1, 4, '0000-00-00 00:00:00'),
(398, '17101231', '54PT29N8CT', 1, 4, '0000-00-00 00:00:00'),
(399, '17101230', '14jkKj301f', 1, 4, '0000-00-00 00:00:00'),
(400, '17101209', '393NXWCQ3h', 1, 4, '0000-00-00 00:00:00'),
(401, '17103054', 'iG3H1o5kD4', 1, 4, '0000-00-00 00:00:00'),
(402, '17101218', 'EJ5VbL528u', 1, 4, '0000-00-00 00:00:00'),
(403, '17101222', '33fGRXQEP0', 1, 4, '0000-00-00 00:00:00'),
(404, '17103056', 'n1R56fVVD9', 1, 4, '0000-00-00 00:00:00'),
(405, '17102092', '55eTjXCWL0', 1, 4, '0000-00-00 00:00:00'),
(406, '17104011', 'Ew5ft7wOEH', 1, 4, '0000-00-00 00:00:00'),
(407, '17101224', 'tY9HXpI25E', 1, 4, '0000-00-00 00:00:00'),
(408, '17103055', '2sx62AR28e', 1, 4, '0000-00-00 00:00:00'),
(409, '17103059', '19TsaTB0BR', 1, 4, '0000-00-00 00:00:00'),
(410, '17101232', '9qebc7ajY8', 1, 4, '0000-00-00 00:00:00'),
(411, '17101206', '42pO821c09', 1, 4, '0000-00-00 00:00:00'),
(412, '17101215', 'hg5I5ZTfK1', 1, 4, '0000-00-00 00:00:00'),
(413, '17103058', 'f74yA007iu', 1, 4, '0000-00-00 00:00:00'),
(414, '17101205', 'VGF1o9rc34', 1, 4, '0000-00-00 00:00:00'),
(415, '17101213', 'lU8512sn92', 1, 4, '0000-00-00 00:00:00'),
(416, '17101194', 'B3rme7X0Ts', 1, 4, '0000-00-00 00:00:00'),
(417, '17102089', '36g0k5pcTl', 1, 4, '0000-00-00 00:00:00'),
(418, '17103062', '81Yyh6Vk70', 1, 4, '0000-00-00 00:00:00'),
(419, '17103051', 'c39oz4J9Mv', 1, 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure for view `data_mahasiswa`
--
DROP TABLE IF EXISTS `data_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_mahasiswa`  AS  select `mahasiswa`.`nama` AS `nama`,`mahasiswa`.`nim` AS `nim`,`mahasiswa`.`id_mahasiswa` AS `id_mahasiswa`,`mahasiswa`.`id_user` AS `id_user`,`mahasiswa`.`j_kelamin` AS `j_kelamin`,`users`.`last_login` AS `last_login`,`users`.`password` AS `password` from (`users` join `mahasiswa` on((`mahasiswa`.`id_user` = `users`.`id_user`))) order by `mahasiswa`.`nama` ;

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
  ADD PRIMARY KEY (`id_user`);

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
  MODIFY `id_adminmatrik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_binaan`
--
ALTER TABLE `m_binaan`
  MODIFY `id_mhsbinaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `paksi`
--
ALTER TABLE `paksi`
  MODIFY `id_paksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pbentuk`
--
ALTER TABLE `pbentuk`
  MODIFY `id_pbentuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembina`
--
ALTER TABLE `pembina`
  MODIFY `id_pembina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `planjut`
--
ALTER TABLE `planjut`
  MODIFY `id_planjut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pmain`
--
ALTER TABLE `pmain`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `psanksi`
--
ALTER TABLE `psanksi`
  MODIFY `id_psanksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `adminmatrik`
--
ALTER TABLE `adminmatrik`
  ADD CONSTRAINT `adminmatrik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `m_binaan`
--
ALTER TABLE `m_binaan`
  ADD CONSTRAINT `m_binaan_ibfk_1` FOREIGN KEY (`id_pembina`) REFERENCES `pembina` (`id_pembina`),
  ADD CONSTRAINT `m_binaan_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `paksi`
--
ALTER TABLE `paksi`
  ADD CONSTRAINT `paksi_ibfk_1` FOREIGN KEY (`id_pbentuk`) REFERENCES `pbentuk` (`id_pbentuk`);

--
-- Constraints for table `pembina`
--
ALTER TABLE `pembina`
  ADD CONSTRAINT `pembina_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `planjut`
--
ALTER TABLE `planjut`
  ADD CONSTRAINT `planjut_ibfk_1` FOREIGN KEY (`id_psanksi`) REFERENCES `psanksi` (`id_psanksi`);

--
-- Constraints for table `pmain`
--
ALTER TABLE `pmain`
  ADD CONSTRAINT `pmain_ibfk_1` FOREIGN KEY (`id_mhsbinaan`) REFERENCES `m_binaan` (`id_mhsbinaan`),
  ADD CONSTRAINT `pmain_ibfk_2` FOREIGN KEY (`id_pbentuk`) REFERENCES `pbentuk` (`id_pbentuk`),
  ADD CONSTRAINT `pmain_ibfk_3` FOREIGN KEY (`id_paksi`) REFERENCES `paksi` (`id_paksi`),
  ADD CONSTRAINT `pmain_ibfk_4` FOREIGN KEY (`id_psanksi`) REFERENCES `psanksi` (`id_psanksi`),
  ADD CONSTRAINT `pmain_ibfk_5` FOREIGN KEY (`id_planjut`) REFERENCES `planjut` (`id_planjut`);

--
-- Constraints for table `shalat`
--
ALTER TABLE `shalat`
  ADD CONSTRAINT `shalat_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
