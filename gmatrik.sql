-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 05:57 AM
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
-- Database: `gmatrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmatrikulasi`
--

CREATE TABLE `adminmatrikulasi` (
  `id_adminmatrikulasi` int(5) NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmatrikulasi`
--

INSERT INTO `adminmatrikulasi` (`id_adminmatrikulasi`, `id_user`, `nama`, `gender`) VALUES
(1, 1, 'Derry', 'Ikhwan');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pulang`
--

CREATE TABLE `jadwal_pulang` (
  `id_pekan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `shubuh` int(1) NOT NULL,
  `dzuhur` int(1) NOT NULL,
  `ashar` int(1) NOT NULL,
  `maghrib` int(1) NOT NULL,
  `isya` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(8) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_pembina` int(5) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `angkatan` int(2) NOT NULL,
  `kota_asal` varchar(25) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_user`, `id_pembina`, `nama`, `gender`, `angkatan`, `kota_asal`, `telepon`, `aktif`) VALUES
(18101001, 375, NULL, 'Tia Nurafifah Handayani', NULL, 18, NULL, NULL, 1),
(18101002, 28, NULL, 'Adam Abdurrohman', NULL, 18, NULL, NULL, 1),
(18101003, 357, NULL, 'Shofya Tarafrafat', NULL, 18, NULL, NULL, 1),
(18101004, 220, NULL, 'Mochammad Rifat Bhyrul', NULL, 18, NULL, NULL, 1),
(18101005, 70, NULL, 'Ananda Noor Shifa', NULL, 18, NULL, NULL, 1),
(18101006, 217, NULL, 'Maharani Qanita Hendray', NULL, 18, NULL, NULL, 1),
(18101007, 183, NULL, 'Ilhaam Prayudi Satriopr', NULL, 18, NULL, NULL, 1),
(18101008, 371, NULL, 'Tasya Nindya Mardatilla', NULL, 18, NULL, NULL, 1),
(18101009, 362, 3, 'Suhardam Ikarupan', 'Ikhwan', 18, 'Bogor', '08964589625', 1),
(18101012, 37, 6, 'Agim Muhammad Irsyad De', 'Ikhwan', 18, 'Jakarta', '0893587463', 1),
(18101015, 229, NULL, 'Muhammad Abdullah Faqih', NULL, 18, NULL, NULL, 1),
(18101017, 125, 5, 'Dzaki Bustami', 'Ikhwan', 18, 'Malang', '08956784753', 1),
(18101018, 53, 4, 'Alfasha Naufal Kurniawa', 'Ikhwan', 18, 'Malang', '08578956423', 1),
(18101019, 129, NULL, 'Erika Juliani', NULL, 18, NULL, NULL, 1),
(18101020, 233, NULL, 'Muhammad Ala Zuhair', NULL, 18, NULL, NULL, 1),
(18101021, 321, NULL, 'Riska Ervina', NULL, 18, NULL, NULL, 1),
(18101022, 130, NULL, 'Erina Cahya Dewi', NULL, 18, NULL, NULL, 1),
(18101023, 108, NULL, 'Daffa Febrian Putra Ram', NULL, 18, NULL, NULL, 1),
(18101024, 250, NULL, 'Muhammad Iqbal', NULL, 18, NULL, NULL, 1),
(18101025, 282, NULL, 'Naufal Ismail', NULL, 18, NULL, NULL, 1),
(18101026, 102, NULL, 'Baiq Warikatul Hafizah', NULL, 18, NULL, NULL, 1),
(18101027, 360, NULL, 'Siti Fatimah Azzahro', NULL, 18, NULL, NULL, 1),
(18101028, 198, 4, 'Khoir Hermansyah', 'Ikhwan', 18, 'Bogor', '08578963251', 1),
(18101029, 56, NULL, 'Alif Muliawan', NULL, 18, NULL, NULL, 1),
(18101030, 393, NULL, 'Yudha Agustiardito Sapu', NULL, 18, NULL, NULL, 1),
(18101031, 201, NULL, 'Laili Salma Lathifah', NULL, 18, NULL, NULL, 1),
(18101032, 237, NULL, 'Muhammad Azmi Al Khawar', NULL, 18, NULL, NULL, 1),
(18101033, 259, NULL, 'Muhammad Rauf Hidayatul', NULL, 18, NULL, NULL, 1),
(18101034, 269, NULL, 'Mylla Kusuma', NULL, 18, NULL, NULL, 1),
(18101035, 156, NULL, 'Firsta Nur Fadilla Wija', NULL, 18, NULL, NULL, 1),
(18101036, 380, 3, 'Tubagus Hasan Fauzi', 'Ikhwan', 18, 'Depok', '08574589627', 1),
(18101037, 143, NULL, 'Farhan', NULL, 18, NULL, NULL, 1),
(18101038, 132, NULL, 'Fachru Rahmatullah', NULL, 18, NULL, NULL, 1),
(18101039, 155, NULL, 'Firman Ali Haydar Eka P', NULL, 18, NULL, NULL, 1),
(18101040, 116, NULL, 'Dian Alifah Salsabila', NULL, 18, NULL, NULL, 1),
(18101041, 394, NULL, 'Yusuf Ahmad En', NULL, 18, NULL, NULL, 1),
(18101042, 83, NULL, 'Aqilla Ratu Pertiwi', NULL, 18, NULL, NULL, 1),
(18101043, 236, NULL, 'Muhammad Assegaf Gatot', NULL, 18, NULL, NULL, 1),
(18101044, 279, NULL, 'Najmah Nurul Izzaty', NULL, 18, NULL, NULL, 1),
(18101045, 177, NULL, 'Hilmi Askariah', NULL, 18, NULL, NULL, 1),
(18101046, 120, 7, 'Dimas Rizky Satria', 'Ikhwan', 18, 'Bandung', '081838749583', 1),
(18101047, 135, 4, 'Fadhlullah Akmal Makari', 'Ikhwan', 18, 'Banten', '085789564258', 1),
(18101049, 137, NULL, 'Fahmi Syaputra', NULL, 18, NULL, NULL, 1),
(18101050, 119, NULL, 'Dimas Muhammad Hilman', NULL, 18, NULL, NULL, 1),
(18101051, 235, NULL, 'Muhammad Ash Shiddiqi', NULL, 18, NULL, NULL, 1),
(18101052, 82, 2, 'Apritasari', 'Akhwat', 18, 'Jakarta', '08968965235', 1),
(18101053, 146, NULL, 'Fathan Wiyoko', NULL, 18, NULL, NULL, 1),
(18101054, 328, 3, 'Rizkhy Derio Putra', 'Ikhwan', 18, 'Jakarta', '085786746878', 1),
(18101055, 209, 7, 'M Fadila Arsalan', 'Ikhwan', 18, 'Sukabumi', '08185684683', 1),
(18101056, 359, NULL, 'Siti Elawati', NULL, 18, NULL, NULL, 1),
(18101057, 303, NULL, 'Rahmi Shafa Zahira', NULL, 18, NULL, NULL, 1),
(18101058, 165, 7, 'Hafizh Muhammad Fiqri', 'Ikhwan', 18, 'Solo', '0895687494', 1),
(18101059, 134, NULL, 'Fadhilah Putri', NULL, 18, NULL, NULL, 1),
(18101060, 361, NULL, 'Suci Ariyanti', NULL, 18, NULL, NULL, 1),
(18101061, 358, NULL, 'Shusuka Nilta Salsabila', NULL, 18, NULL, NULL, 1),
(18101062, 289, NULL, 'Nuraviva Azzahra', NULL, 18, NULL, NULL, 1),
(18101064, 105, 2, 'Billahi Alfa Aqsama', 'Akhwat', 18, 'Malang', '08968963514', 1),
(18101066, 159, NULL, 'Ghaissani Nursabrina Wi', NULL, 18, NULL, NULL, 1),
(18101067, 61, 2, 'Alya Dita Luthfiyah', 'Akhwat', 18, 'Bekasi', '089612569854', 1),
(18101068, 306, NULL, 'Ratu Shofa Salsabila Pu', NULL, 18, NULL, NULL, 1),
(18101069, 243, NULL, 'Muhammad Farras', NULL, 18, NULL, NULL, 1),
(18101070, 45, NULL, 'Aina Salsabilla', NULL, 18, NULL, NULL, 1),
(18101071, 98, NULL, 'Azhara Rabbaniah', NULL, 18, NULL, NULL, 1),
(18101072, 69, 5, 'Ammarruh Jihad', 'Ikhwan', 18, 'Bandung', '08574398743', 1),
(18101073, 297, 2, 'Nurul Wafa', 'Akhwat', 18, 'Tegal', '08549895425', 1),
(18101074, 139, 6, 'Fakhri Fathurahman Kusu', 'Ikhwan', 18, 'Sukabumi', '089643958743', 1),
(18101075, 355, 2, 'Shofiatasya Qonitatussa', 'Akhwat', 18, 'Surabaya', '089635438743', 1),
(18101077, 63, NULL, 'Alya Shabrina Zata Aman', NULL, 18, NULL, NULL, 1),
(18101078, 218, NULL, 'Maulidisya Aulia Fahmi', NULL, 18, NULL, NULL, 1),
(18101079, 178, NULL, 'Hudayatul\' Aini', NULL, 18, NULL, NULL, 1),
(18101080, 299, NULL, 'Putria Ninda Hanifa', NULL, 18, NULL, NULL, 1),
(18101081, 339, 5, 'Salim Husein', 'Ikhwan', 18, 'Bogor', '085458746825', 1),
(18101082, 154, 6, 'Firman Abdoel Syahril', 'Ikhwan', 18, 'Malang', '081848974326', 1),
(18101083, 320, NULL, 'Risha Mulya Putri', NULL, 18, NULL, NULL, 1),
(18101084, 32, NULL, 'Adentiya Yelita Wiyanta', NULL, 18, NULL, NULL, 1),
(18101085, 81, NULL, 'Aprilia Nabela Kesuma', NULL, 18, NULL, NULL, 1),
(18101086, 171, NULL, 'Hanifa Qotrunnada Hayyi', NULL, 18, NULL, NULL, 1),
(18101087, 78, NULL, 'Annisa Putri Rahayu Nin', NULL, 18, NULL, NULL, 1),
(18101088, 341, NULL, 'Salsabila Imtinan Syami', NULL, 18, NULL, NULL, 1),
(18101089, 222, NULL, 'Mohammad Syarofi Dauman', NULL, 18, NULL, NULL, 1),
(18101090, 31, NULL, 'Adelina Azzahra Nabila', NULL, 18, NULL, NULL, 1),
(18101091, 325, NULL, 'Rivelda Rizky Calista M', NULL, 18, NULL, NULL, 1),
(18101092, 40, 3, 'Ahmad Furqon', 'Ikhwan', 18, 'Gorontalo', '08966874847', 1),
(18101093, 353, NULL, 'Sherina Ramadhani', NULL, 18, NULL, NULL, 1),
(18101094, 315, NULL, 'Rifatul Akmaliyah Rachm', NULL, 18, NULL, NULL, 1),
(18101095, 253, NULL, 'Muhammad Nafis Rizkians', NULL, 18, NULL, NULL, 1),
(18101096, 152, NULL, 'Fidi Fadilah', NULL, 18, NULL, NULL, 1),
(18101097, 331, NULL, 'Rofi Fakhridhina', NULL, 18, NULL, NULL, 1),
(18101098, 117, NULL, 'Dilla Vindi Jhelvita', NULL, 18, NULL, NULL, 1),
(18101099, 195, 5, 'Izzudin Hikmatyar Almad', 'Ikhwan', 18, 'Bogor', '089587548566', 1),
(18101100, 128, NULL, 'Elvira Apriyani Suparma', NULL, 18, NULL, NULL, 1),
(18101101, 216, 7, 'M. Azizi Yanuar', 'Ikhwan', 18, 'Bogor', '08966877894', 1),
(18101102, 225, NULL, 'Muhamad Fahreza Harvian', NULL, 18, NULL, NULL, 1),
(18101103, 396, NULL, 'Zahran Hanawa', NULL, 18, NULL, NULL, 1),
(18101104, 385, NULL, 'Wahlul Hidayat', NULL, 18, NULL, NULL, 1),
(18101105, 267, 3, 'Muhammad Zidan Ghazali', 'Ikhwan', 18, 'Bogor', '0857894546', 1),
(18101106, 39, NULL, 'Agung Pratama', NULL, 18, NULL, NULL, 1),
(18101107, 230, NULL, 'Muhammad Afif Yasykur', NULL, 18, NULL, NULL, 1),
(18101108, 103, NULL, 'Bakhitah Hisanah Lindi', NULL, 18, NULL, NULL, 1),
(18101109, 166, NULL, 'Hafizha Nadhira', NULL, 18, NULL, NULL, 1),
(18101110, 244, NULL, 'Muhammad Fathi Mustaghf', NULL, 18, NULL, NULL, 1),
(18101111, 376, NULL, 'Tia Sri Wahyuni', NULL, 18, NULL, NULL, 1),
(18101112, 265, NULL, 'Muhammad Taqy Shandyka', NULL, 18, NULL, NULL, 1),
(18101114, 390, NULL, 'Windasari', NULL, 18, NULL, NULL, 1),
(18101115, 305, NULL, 'Rama Aqila Fauzan', NULL, 18, NULL, NULL, 1),
(18101116, 238, 5, 'Muhammad Azzam Lubis', 'Ikhwan', 18, 'Bogor', '08956854715', 1),
(18101117, 288, 6, 'Nur Rachmadi Zul Fahmi', 'Ikhwan', 18, 'Jakarta', '085725745835', 1),
(18101118, 64, NULL, 'Amanda Dwi Noviyanti', NULL, 18, NULL, NULL, 1),
(18101119, 239, 4, 'Muhammad Baijury', 'Ikhwan', 18, 'BandunMalang', '8966874825', 1),
(18101120, 142, NULL, 'Farelya Olanie Paramith', NULL, 18, NULL, NULL, 1),
(18101121, 93, NULL, 'Auliya Tasya Annida', NULL, 18, NULL, NULL, 1),
(18101122, 87, NULL, 'Arramaisa Deyacha', NULL, 18, NULL, NULL, 1),
(18101123, 144, NULL, 'Fariza Hadiyati', NULL, 18, NULL, NULL, 1),
(18101124, 180, NULL, 'Ikbal Sanusi', NULL, 18, NULL, NULL, 1),
(18101125, 55, 3, 'Alif Dzakwan Abdurrahma', 'Ikhwan', 18, 'Bogor', '0818569555', 1),
(18101126, 115, NULL, 'Diah Rachmah Palupining', NULL, 18, NULL, NULL, 1),
(18101127, 48, NULL, 'Aisyah Hana Bashirah', NULL, 18, NULL, NULL, 1),
(18101128, 313, NULL, 'Ricka Krisnawati', NULL, 18, NULL, NULL, 1),
(18101129, 332, NULL, 'Rosita Sariu', NULL, 18, NULL, NULL, 1),
(18101130, 296, NULL, 'Nurul Khofifah', NULL, 18, NULL, NULL, 1),
(18101131, 397, 2, 'Zahratun Nisa', 'Akhwat', 18, 'Depok', '08578674658', 1),
(18101132, 389, NULL, 'Wimala Hermitasari P', NULL, 18, NULL, NULL, 1),
(18101133, 167, 5, 'Haikal Malik Zulfan', 'Ikhwan', 18, 'Tegal', '08578574323', 1),
(18101134, 41, 3, 'Ahmad Muhaimin', 'Ikhwan', 18, 'Medan', '08025878598', 1),
(18101135, 374, NULL, 'Tazkiyah Delya Faiza Us', NULL, 18, NULL, NULL, 1),
(18101136, 213, NULL, 'M Inggi Pratama', NULL, 18, NULL, NULL, 1),
(18101137, 99, 3, 'Bachremi Fananda', 'Ikhwan', 18, 'Bogor', '08966874823', 1),
(18101138, 263, NULL, 'Muhammad Syafiq Hulaimi', NULL, 18, NULL, NULL, 1),
(18101139, 212, NULL, 'M Habibullah Harahap', NULL, 18, NULL, NULL, 1),
(18101140, 174, NULL, 'Hasna Salsabila', NULL, 18, NULL, NULL, 1),
(18101141, 392, NULL, 'Yahya Ayasyi Muhammad', NULL, 18, NULL, NULL, 1),
(18101142, 260, NULL, 'Muhammad Redzky Kemal S', NULL, 18, NULL, NULL, 1),
(18101143, 193, NULL, 'Ishmah Azzahra', NULL, 18, NULL, NULL, 1),
(18101144, 43, 3, 'Ahmad Zulhamsyah', 'Ikhwan', 18, 'Bandung', '08574698735', 1),
(18101145, 60, NULL, 'Alvy Nur \'salimah', NULL, 18, NULL, NULL, 1),
(18101146, 241, NULL, 'Muhammad Faraghy Hasan', NULL, 18, NULL, NULL, 1),
(18101147, 33, 3, 'Aditya Zuhal Pratama', 'Ikhwan', 18, 'Bogor', '08963543687', 1),
(18101148, 234, NULL, 'Muhammad Ammar', NULL, 18, NULL, NULL, 1),
(18101149, 23, 5, 'Abdillah Pasha Alrizq', 'Ikhwan', 18, 'Jakarta', '0896564534', 1),
(18101150, 342, 5, 'Samun Al-ghozi', 'Ikhwan', 18, 'Depok', '08185286957', 1),
(18101151, 308, 4, 'Redha Fauzannur', 'Ikhwan', 18, 'Bogor', '0857147852', 1),
(18101152, 281, NULL, 'Nasrul Azhar', NULL, 18, NULL, NULL, 1),
(18101153, 249, 5, 'Muhammad Ihsan Muttaqi', 'Ikhwan', 18, 'Malang', '08953548587', 1),
(18101157, 202, NULL, 'Lalu Mifta Respati R', NULL, 18, NULL, NULL, 1),
(18101160, 127, NULL, 'Elpan Handriansyah', NULL, 18, NULL, NULL, 1),
(18101161, 150, 4, 'Febrian Andira Bakti', 'Ikhwan', 18, 'Jakarta', '895876986', 1),
(18101162, 223, NULL, 'Mufti Izzi Hawari', NULL, 18, NULL, NULL, 1),
(18101163, 111, NULL, 'Dessy Ramdani', NULL, 18, NULL, NULL, 1),
(18101164, 214, NULL, 'M Iqbal Y K', NULL, 18, NULL, NULL, 1),
(18101165, 200, 4, 'Kresna Bayu Rizki', 'Ikhwan', 18, 'Bandung', '08578965455', 1),
(18101166, 391, 4, 'Wira Prasetya', 'Ikhwan', 18, 'Malang', '089527927852', 1),
(18101167, 52, 6, 'Aldi Gunawan', 'Ikhwan', 18, 'Bekasi', '08935785875', 1),
(18101168, 322, NULL, 'Riski Agung Saputra', NULL, 18, NULL, NULL, 1),
(18101169, 327, 5, 'Rizcky Ilham Erlansyah', 'Ikhwan', 18, 'Malang', '0895358748', 1),
(18101170, 251, NULL, 'Muhammad Irvalino', NULL, 18, NULL, NULL, 1),
(18101171, 160, 7, 'Gian Adit Putra', 'Ikhwan', 18, 'Jakarta', '08966889954', 1),
(18101172, 330, NULL, 'Robby Habib Mulyawan Lu', NULL, 18, NULL, NULL, 1),
(18101173, 348, 2, 'Savira Khoirunnisa', 'Akhwat', 18, 'Banten', '08964638745', 1),
(18101174, 91, 2, 'Ati', 'Akhwat', 18, 'Banten', '08966873895', 1),
(18101175, 302, 2, 'Rahmawati', 'Akhwat', 18, 'Kediri', '08542638376', 1),
(18101176, 242, NULL, 'Muhammad Farhan Rabbani', NULL, 18, NULL, NULL, 1),
(18101177, 158, NULL, 'Gede Dimas Harikusuma', NULL, 18, NULL, NULL, 1),
(18101178, 274, NULL, 'Nadia Salsabila', NULL, 18, NULL, NULL, 1),
(18101179, 261, 4, 'Muhammad Rifqi Saepuroh', 'Ikhwan', 18, 'Depok', '08575693285', 1),
(18101180, 107, NULL, 'Clyvzmaxter Azhzhahir P', NULL, 18, NULL, NULL, 1),
(18101181, 145, 7, 'Farras Nurkamal', 'Ikhwan', 18, 'Bogor', '08966875896', 1),
(18101182, 172, NULL, 'Hanifah', NULL, 18, NULL, NULL, 1),
(18101183, 68, 6, 'Ammar Fariqi Syafitra', 'Ikhwan', 18, 'Depok', '08187389732', 1),
(18101184, 367, NULL, 'Susi Anggraeni', NULL, 18, NULL, NULL, 1),
(18101185, 182, 5, 'Ikhsan Fitrah Mahendra', 'Ikhwan', 18, 'Jakarta', '0818743258', 1),
(18101186, 161, 5, 'Gilang Gunawan', 'Ikhwan', 18, 'Bogor', '008954698746', 1),
(18101187, 316, NULL, 'Rifda Fauzia Novianti', NULL, 18, NULL, NULL, 1),
(18101188, 27, NULL, 'Ach Rizalul Fitri', NULL, 18, NULL, NULL, 1),
(18101189, 153, NULL, 'Fina Rizkia Hasibuan', NULL, 18, NULL, NULL, 1),
(18101190, 164, NULL, 'Haekal Farros', NULL, 18, NULL, NULL, 1),
(18101192, 73, 6, 'Andi Baso Ridho M B', 'Ikhwan', 18, 'Bandung', '08578754658', 1),
(18101193, 366, 4, 'Sulthan M Rezka Abdul', 'Ikhwan', 18, 'Jakarta', '085754698546', 1),
(18101194, 26, 7, 'Abdullah Difa', 'Ikhwan', 18, 'Bogor', '08952735838', 1),
(18101195, 340, NULL, 'Salsabila Dwiayu Fajria', NULL, 18, NULL, NULL, 1),
(18101196, 141, 6, 'Fakhrie Jihadi Arsyad A', 'Ikhwan', 18, 'Jakarta', '08573857445', 1),
(18101197, 377, NULL, 'Tiara Rahmat Rahim', NULL, 18, NULL, NULL, 1),
(18101199, 354, NULL, 'Sherly Novianti', NULL, 18, NULL, NULL, 1),
(18101200, 192, NULL, 'Irwansyah', NULL, 18, NULL, NULL, 1),
(18101201, 226, NULL, 'Muhamad Idris', NULL, 18, NULL, NULL, 1),
(18101202, 309, 2, 'Reska Lestiana', 'Akhwat', 18, 'Depok', '08578679053', 1),
(18101203, 208, 4, 'Logi Afima', 'Ikhwan', 18, 'Bandung', '08577412369', 1),
(18101204, 140, 4, 'Fakhri Febry', 'Ikhwan', 18, 'Depok', '08549865217', 1),
(18101205, 383, NULL, 'Umi Faridhotam Mahfuzah', NULL, 18, NULL, NULL, 1),
(18101206, 187, NULL, 'Intan Anggraeni', NULL, 18, NULL, NULL, 1),
(18101207, 254, 6, 'Muhammad Naufal Irfan', 'Ikhwan', 18, 'Bandung', '08398749565', 1),
(18101208, 356, 6, 'Shofiyullah', 'Ikhwan', 18, 'Banten', '08185847632', 1),
(18101209, 231, NULL, 'Muhammad Agung Perkasa', NULL, 18, NULL, NULL, 1),
(18101210, 205, NULL, 'Lela Nurmayanti', NULL, 18, NULL, NULL, 1),
(18101211, 86, NULL, 'Arnita', NULL, 18, NULL, NULL, 1),
(18101212, 245, 3, 'Muhammad Fatih Ulwan', 'Ikhwan', 18, 'Makasar', '08185467899', 1),
(18101213, 384, NULL, 'Uswatun Hasanah', NULL, 18, NULL, NULL, 1),
(18101214, 138, NULL, 'Faisal Ardiansyah', NULL, 18, NULL, NULL, 1),
(18101215, 126, NULL, 'Elisa Imamil Islah', NULL, 18, NULL, NULL, 1),
(18101223, 318, NULL, 'Riki Ardinata', NULL, 18, NULL, NULL, 1),
(18102001, 264, NULL, 'Muhammad Syamsul Bahri', NULL, 18, NULL, NULL, 1),
(18102002, 89, NULL, 'Asfa Asfia', NULL, 18, NULL, NULL, 1),
(18102003, 110, NULL, 'Derry Drajat Firdaus', NULL, 18, NULL, NULL, 1),
(18102004, 72, 5, 'Andhika Galih Hartono', 'Ikhwan', 18, 'Jakarta', '0895873698', 1),
(18102005, 51, NULL, 'Alan Zakaria Putra', NULL, 18, NULL, NULL, 1),
(18102006, 79, NULL, 'Annisa Salsabila Fitri', NULL, 18, NULL, NULL, 1),
(18102007, 246, NULL, 'Muhammad Fevriensyah Ra', NULL, 18, NULL, NULL, 1),
(18102009, 62, NULL, 'Alya Hanifah', NULL, 18, NULL, NULL, 1),
(18102010, 88, NULL, 'Arsita Octi Purnamasari', NULL, 18, NULL, NULL, 1),
(18102011, 310, NULL, 'Reynalda Adara Putri Ri', NULL, 18, NULL, NULL, 1),
(18102012, 131, NULL, 'Evania Herindar', NULL, 18, NULL, NULL, 1),
(18102013, 382, NULL, 'Ulandari', NULL, 18, NULL, NULL, 1),
(18102014, 66, NULL, 'Amirah Nabilla', NULL, 18, NULL, NULL, 1),
(18102015, 94, NULL, 'Aura Yusti Rahmawati', NULL, 18, NULL, NULL, 1),
(18102016, 256, NULL, 'Muhammad Raihan', NULL, 18, NULL, NULL, 1),
(18102017, 90, NULL, 'Athfali Muhamad Rahman', NULL, 18, NULL, NULL, 1),
(18102018, 54, NULL, 'Alfi Nugraha Pratama', NULL, 18, NULL, NULL, 1),
(18102019, 219, 7, 'Mochammad Aufa Shafly', 'Ikhwan', 18, 'Jakarta', '08574586543', 1),
(18102020, 350, NULL, 'Selly Oktarahmah', NULL, 18, NULL, NULL, 1),
(18102021, 199, NULL, 'Kirana Putri Nadia Maha', NULL, 18, NULL, NULL, 1),
(18102022, 76, 2, 'Anisatul Muslikhah', 'Akhwat', 18, 'Solo', '08967896524', 1),
(18102023, 271, NULL, 'Nabila Fauziah', NULL, 18, NULL, NULL, 1),
(18102024, 329, NULL, 'Rizky Syafara Zulfa', NULL, 18, NULL, NULL, 1),
(18102025, 123, 2, 'Dwi Kuswanti', 'Akhwat', 18, 'Jakarta', '0818596354', 1),
(18102026, 373, NULL, 'Taufiq Atthallah Rifqi', NULL, 18, NULL, NULL, 1),
(18102027, 74, NULL, 'Andini Eka Putri', NULL, 18, NULL, NULL, 1),
(18102028, 121, NULL, 'Dinda Nur Azkiya', NULL, 18, NULL, NULL, 1),
(18102029, 112, NULL, 'Desy Endah Sundari', NULL, 18, NULL, NULL, 1),
(18102030, 101, NULL, 'Baiq Raisya Putri Noval', NULL, 18, NULL, NULL, 1),
(18102031, 47, NULL, 'Aisya Putri Asthari', NULL, 18, NULL, NULL, 1),
(18102034, 272, NULL, 'Nada Nisrina Marahaini', NULL, 18, NULL, NULL, 1),
(18102036, 395, 2, 'Zahira Qathrun Nada', 'Akhwat', 18, 'Malang', '08965876253', 1),
(18102037, 184, 4, 'Imam Mustofa Zia Ul Haq', 'Ikhwan', 18, 'Banten', '08578695482', 1),
(18102038, 170, 2, 'Hamidah Farras Samaah', 'Akhwat', 18, 'Bogor', '0818569355', 1),
(18102039, 36, NULL, 'Afifatus Salma', NULL, 18, NULL, NULL, 1),
(18102040, 29, 3, 'Adam Ridhoansyah Sileuw', 'Ikhwan', 18, 'Bandung', '08966874823', 1),
(18102041, 211, NULL, 'M Fitrah Syawal Anny', NULL, 18, NULL, NULL, 1),
(18102042, 50, 7, 'Akbar Kurnia Reqil', 'Ikhwan', 18, 'Bandung', '08185874325', 1),
(18102043, 378, NULL, 'Tiara Widiyanti', NULL, 18, NULL, NULL, 1),
(18102044, 278, NULL, 'Nafisatul Hidayah', NULL, 18, NULL, NULL, 1),
(18102045, 35, NULL, 'Afifa Rahmadiani P', NULL, 18, NULL, NULL, 1),
(18102046, 203, NULL, 'Larasma Mutiara Putri', NULL, 18, NULL, NULL, 1),
(18102047, 301, 5, 'Rabih Huraibi', 'Ikhwan', 18, 'Depok', '0857852473', 1),
(18102048, 147, NULL, 'Fatimah Amirah Sayiva', NULL, 18, NULL, NULL, 1),
(18102049, 176, 3, 'Hernando Maulana Pratam', 'Ikhwan', 18, 'Depok', '8964595835', 1),
(18102050, 215, NULL, 'M Novan Rizki Ananda', NULL, 18, NULL, NULL, 1),
(18102052, 42, 6, 'Ahmad Rizaldi Maulidan', 'Ikhwan', 18, 'Banten', '0895325435', 1),
(18102053, 114, 6, 'Dhiya Urrahman Al Fatih', 'Ikhwan', 18, 'Kediri', '0895654689', 1),
(18102054, 210, 6, 'M Faris Naufal Hilmi', 'Ikhwan', 18, 'Jakarta', '08953743258', 1),
(18102055, 283, NULL, 'Naufal Rizqullah Al B', NULL, 18, NULL, NULL, 1),
(18102056, 401, NULL, 'Zulva Skandinaniva Kiet', NULL, 18, NULL, NULL, 1),
(18102057, 337, NULL, 'Saiful Huda', NULL, 18, NULL, NULL, 1),
(18102058, 227, NULL, 'Muhamad Padli', NULL, 18, NULL, NULL, 1),
(18102059, 255, NULL, 'Muhammad Rafli Ferdians', NULL, 18, NULL, NULL, 1),
(18102060, 298, NULL, 'Nury Ilmi', NULL, 18, NULL, NULL, 1),
(18102061, 369, NULL, 'Syifa Nurul Maulani', NULL, 18, NULL, NULL, 1),
(18102062, 351, 2, 'Seriwahyuni', 'Akhwat', 18, 'Riau', '08547652875', 1),
(18102063, 85, NULL, 'Arjuna Ikhsanul Qudsi', NULL, 18, NULL, NULL, 1),
(18102064, 247, NULL, 'Muhammad Habiburrahman', NULL, 18, NULL, NULL, 1),
(18102065, 49, NULL, 'Aisyah Suci', NULL, 18, NULL, NULL, 1),
(18102067, 58, NULL, 'Alvianty', NULL, 18, NULL, NULL, 1),
(18102068, 295, 2, 'Nurul Chaeroh', 'Akhwat', 18, 'Malang', '08185368745', 1),
(18102069, 326, NULL, 'Riyon Maranto', NULL, 18, NULL, NULL, 1),
(18102070, 344, 4, 'Sardiansyah', 'Ikhwan', 18, 'Tegal', '0895827413', 1),
(18102071, 343, NULL, 'Sapwan Hadi', NULL, 18, NULL, NULL, 1),
(18102072, 188, NULL, 'Intan Maylinda', NULL, 18, NULL, NULL, 1),
(18102073, 179, NULL, 'Ika Hardianti', NULL, 18, NULL, NULL, 1),
(18102074, 133, NULL, 'Fadhilah Istiqamah', NULL, 18, NULL, NULL, 1),
(18102084, 317, NULL, 'Rika Wulansari', NULL, 18, NULL, NULL, 1),
(18102085, 96, NULL, 'Ayu Istiqomah', NULL, 18, NULL, NULL, 1),
(18103001, 118, NULL, 'Dimas Fadjri Kurniawan', NULL, 18, NULL, NULL, 1),
(18103002, 80, NULL, 'Annur Athasya Pradnya W', NULL, 18, NULL, NULL, 1),
(18103003, 387, NULL, 'Widya Nurul Fatiha', NULL, 18, NULL, NULL, 1),
(18103004, 71, NULL, 'Anas Saifulloh Fatah', NULL, 18, NULL, NULL, 1),
(18103005, 24, 7, 'Abdul Rozak Sidiq', 'Ikhwan', 18, 'Malang', '08966825874', 1),
(18103006, 277, NULL, 'Nafisah Rahma Novanti', NULL, 18, NULL, NULL, 1),
(18103007, 92, 7, 'Aulia Raihan Hafiz', 'Ikhwan', 18, 'Malang', '08575473587', 1),
(18103008, 276, NULL, 'Naffa Afifah Adrita', NULL, 18, NULL, NULL, 1),
(18103009, 333, NULL, 'Rosyida Nur Azis', NULL, 18, NULL, NULL, 1),
(18103010, 196, NULL, 'Khairunnisa', NULL, 18, NULL, NULL, 1),
(18103011, 280, NULL, 'Najmi Farah Adiba', NULL, 18, NULL, NULL, 1),
(18103012, 97, NULL, 'Ayu Sulistiani', NULL, 18, NULL, NULL, 1),
(18103013, 38, 7, 'Agisni Abimanyu', 'Ikhwan', 18, 'Banten', '0818875648', 1),
(18103014, 44, NULL, 'Ahmat Parizi', NULL, 18, NULL, NULL, 1),
(18103015, 372, NULL, 'Tatial Maulida Putri', NULL, 18, NULL, NULL, 1),
(18103016, 149, NULL, 'Fauzi Herman', NULL, 18, NULL, NULL, 1),
(18103017, 324, NULL, 'Risya Amelia Wibowo', NULL, 18, NULL, NULL, 1),
(18103018, 388, 3, 'Willy Asyraf Ramadhan', 'Ikhwan', 18, 'Banten', '08578935465', 1),
(18103019, 190, 4, 'Iqomuddien Muhammad', 'Ikhwan', 18, 'Depok', '0857896321', 1),
(18103020, 304, NULL, 'Raihan Yahya Ismail', NULL, 18, NULL, NULL, 1),
(18103021, 352, NULL, 'Sherena Sholarita Nugra', NULL, 18, NULL, NULL, 1),
(18103022, 386, NULL, 'Wahyuni', NULL, 18, NULL, NULL, 1),
(18103023, 124, NULL, 'Dwi Sintia Wiranti', NULL, 18, NULL, NULL, 1),
(18103024, 370, NULL, 'Tasya Arviannisa', NULL, 18, NULL, NULL, 1),
(18103025, 100, 2, 'Baiq Nisa Fida Amelin', 'Akhwat', 18, 'Medan', '085789363225', 1),
(18103026, 185, 2, 'Imtiyaz Amani', 'Akhwat', 18, 'Bandung', '08957864835', 1),
(18103027, 197, NULL, 'Khofifah Pirda Utami', NULL, 18, NULL, NULL, 1),
(18103028, 189, NULL, 'Intan Noor Savitri', NULL, 18, NULL, NULL, 1),
(18103029, 287, NULL, 'Nur Humairah Alulu', NULL, 18, NULL, NULL, 1),
(18103030, 194, NULL, 'Izanatun Najiha', NULL, 18, NULL, NULL, 1),
(18103031, 363, NULL, 'Suhendra', NULL, 18, NULL, NULL, 1),
(18103032, 34, NULL, 'Afida Hatta Tazkia', NULL, 18, NULL, NULL, 1),
(18103033, 30, NULL, 'Ade Nurul Hita Alfiani', NULL, 18, NULL, NULL, 1),
(18103034, 262, 6, 'Muhammad Rijal Anshorul', 'Ikhwan', 18, 'Bandung', '0896386746', 1),
(18103035, 104, NULL, 'Bashir Ammar Hakim', NULL, 18, NULL, NULL, 1),
(18103036, 221, 6, 'Mohammad Ilham Shiddiq', 'Ikhwan', 18, 'Jogjakarta', '089668754876', 1),
(18103037, 349, 3, 'Sayyid Ibadurrahman', 'Ikhwan', 18, 'Bandung', '082574638974', 1),
(18103038, 232, 5, 'Muhammad Akbar Rezaldi', 'Ikhwan', 18, 'Banten', '089535847685', 1),
(18103039, 46, 2, 'Aisha Putri S', 'Akhwat', 18, 'Bogor', '896687482745', 1),
(18103040, 252, NULL, 'Muhammad Mirza Alhafiiz', NULL, 18, NULL, NULL, 1),
(18103041, 240, 5, 'Muhammad Faiq Abdullah', 'Ikhwan', 18, 'Bogor', '08954358743', 1),
(18103042, 266, 3, 'Muhammad Tegar Iman', 'Ikhwan', 18, 'Medan', '08185496746', 1),
(18103043, 191, 4, 'Irfan Hanif Ibrahim', 'Ikhwan', 18, 'Bandung', '08187896321', 1),
(18103044, 136, NULL, 'Fadli Hamdi', NULL, 18, NULL, NULL, 1),
(18103045, 175, NULL, 'Helmi Munadhiya Aziz', NULL, 18, NULL, NULL, 1),
(18103046, 300, NULL, 'Qorin Fariha Basya', NULL, 18, NULL, NULL, 1),
(18103047, 323, NULL, 'Risno Faharuddin', NULL, 18, NULL, NULL, 1),
(18103048, 335, 3, 'Sahlan Abbas', 'Ikhwan', 18, 'Jakarta', '08578746976', 1),
(18103049, 257, 5, 'Muhammad Raihan Gunawan', 'Ikhwan', 18, 'Jakarta', '089573958974', 1),
(18103055, 311, NULL, 'Rezali Saputra', NULL, 18, NULL, NULL, 1),
(18103056, 151, 4, 'Ferdiansyah', 'Ikhwan', 18, 'Malang', '0857896354', 1),
(18103059, 173, NULL, 'Hasna Hanifah', NULL, 18, NULL, NULL, 1),
(18103062, 319, 2, 'Rini Sundari', 'Akhwat', 18, 'Bandung', '089443687438', 1),
(18103068, 399, NULL, 'Zulfan Andillah', NULL, 18, NULL, NULL, 1),
(18103070, 181, NULL, 'Ikha Nur Syamsiah', NULL, 18, NULL, NULL, 1),
(18103071, 204, NULL, 'Latifa', NULL, 18, NULL, NULL, 1),
(18103072, 365, NULL, 'Sulistina', NULL, 18, NULL, NULL, 1),
(18103073, 206, NULL, 'Lisa Monika', NULL, 18, NULL, NULL, 1),
(18103074, 284, NULL, 'Nova Yunita', NULL, 18, NULL, NULL, 1),
(18103075, 364, NULL, 'Suhendri', NULL, 18, NULL, NULL, 1),
(18103076, 248, NULL, 'Muhammad Hanafi', NULL, 18, NULL, NULL, 1),
(18103085, 268, NULL, 'Muslim', NULL, 18, NULL, NULL, 1),
(18104001, 84, NULL, 'Ari Dezan Alfarishi', NULL, 18, NULL, NULL, 1),
(18104002, 270, NULL, 'Nabila Azzahra', NULL, 18, NULL, NULL, 1),
(18104003, 25, NULL, 'Abdullah Bayu Taufiq', NULL, 18, NULL, NULL, 1),
(18104004, 148, NULL, 'Fauzan Azhima', NULL, 18, NULL, NULL, 1),
(18104005, 275, NULL, 'Nadiyah Muadzah', NULL, 18, NULL, NULL, 1),
(18104006, 228, 5, 'Muhamad Romadhani', 'Ikhwan', 18, 'Bandung', '08285769825', 1),
(18104007, 258, 4, 'Muhammad Raihan Naufal', 'Ikhwan', 18, 'Bogor', '08961893257', 1),
(18104011, 347, NULL, 'Sastri Fitria N', NULL, 18, NULL, NULL, 1),
(18104012, 338, 4, 'Sajidin', 'Ikhwan', 18, 'Makasar', '0857789655', 1),
(18104013, 122, NULL, 'Dwi Fatonah', NULL, 18, NULL, NULL, 1),
(18104014, 400, NULL, 'Zulkifli Zainudin', NULL, 18, NULL, NULL, 1),
(18104015, 57, NULL, 'Alifah Ramadhani', NULL, 18, NULL, NULL, 1),
(18104018, 186, 2, 'Indri Okta Rinda', 'Akhwat', 18, 'Banten', '08963687468', 1),
(18104019, 162, NULL, 'Gira Arinta', NULL, 18, NULL, NULL, 1),
(18104020, 157, NULL, 'Firza Andini', NULL, 18, NULL, NULL, 1),
(18104021, 207, NULL, 'Listia Fitriani Lestari', NULL, 18, NULL, NULL, 1),
(18104022, 168, NULL, 'Halifah', NULL, 18, NULL, NULL, 1),
(18104023, 77, NULL, 'Anjelita Purnasika', NULL, 18, NULL, NULL, 1),
(18104024, 368, 6, 'Susilo Ahmad Efendi', 'Ikhwan', 18, 'Bekasi', '089257432854', 1),
(18104033, 67, NULL, 'Amita', NULL, 18, NULL, NULL, 1),
(18108001, 292, 5, 'Nurjayadi', 'Ikhwan', 18, 'Jakarta', '08954397845', 1),
(18108002, 59, NULL, 'Alvianur Ramdani', NULL, 18, NULL, NULL, 1),
(18108003, 381, 3, 'Ujang Rahmat Mokan', 'Ikhwan', 18, 'Depok', '08549687524', 1),
(18108005, 314, NULL, 'Rifaldi S Kandar', NULL, 18, NULL, NULL, 1),
(18108006, 113, NULL, 'Dewi Sartika Wokanubun', NULL, 18, NULL, NULL, 1),
(18108007, 109, 6, 'Darwin Iriwanas', 'Ikhwan', 18, 'Solo', '085728793645', 1),
(18108009, 398, NULL, 'Zainudin Mau', NULL, 18, NULL, NULL, 1),
(18108011, 224, 5, 'Muh Sofyan Meram', 'Ikhwan', 18, 'Bogor', '0895395874', 1),
(18108012, 307, NULL, 'Raudatul Jannah Lie', NULL, 18, NULL, NULL, 1),
(18108013, 106, NULL, 'Burhan Rumfaran', NULL, 18, NULL, NULL, 1),
(18108014, 65, 6, 'Amin Bauw', 'Ikhwan', 18, 'Bogor', '08953974359', 1),
(18108016, 163, 7, 'Gunawan Idrus', 'Ikhwan', 18, 'Depok', '0989569538', 1),
(18108017, 291, NULL, 'Nurhasana Puarada', NULL, 18, NULL, NULL, 1),
(18108019, 336, NULL, 'Sahra Rabbo', NULL, 18, NULL, NULL, 1),
(18108020, 334, 3, 'Sahdan Rabo', 'Ikhwan', 18, 'Jakarta', '084568258745', 1),
(18108021, 95, NULL, 'Ayu Astiani', NULL, 18, NULL, NULL, 1),
(18108022, 285, NULL, 'Novianti La Daera', NULL, 18, NULL, NULL, 1),
(18108023, 75, NULL, 'Anisa Iriwanas', NULL, 18, NULL, NULL, 1),
(18108024, 294, NULL, 'Nursia Rumain', NULL, 18, NULL, NULL, 1),
(18108025, 290, NULL, 'Nurhabibah Werfete', NULL, 18, NULL, NULL, 1),
(18108026, 345, NULL, 'Sarifat.rumbouw', NULL, 18, NULL, NULL, 1),
(18108027, 379, NULL, 'Titi Dalila Keliobas', NULL, 18, NULL, NULL, 1),
(18108028, 273, NULL, 'Nadia Harun', NULL, 18, NULL, NULL, 1),
(18108029, 346, NULL, 'Sarina Rumain', NULL, 18, NULL, NULL, 1),
(18108030, 312, NULL, 'Rianti Patiran', NULL, 18, NULL, NULL, 1),
(18108031, 169, NULL, 'Hamida Rumakat', NULL, 18, NULL, NULL, 1),
(18108032, 293, 2, 'Nurmina Mansur', 'Akhwat', 18, 'Medan', '0818596325', 1),
(181040017, 286, NULL, 'Nur Hafizah', NULL, 18, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekan`
--

CREATE TABLE `pekan` (
  `id_pekan` int(5) NOT NULL,
  `id_semester` int(1) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembina_mahasiswa`
--

CREATE TABLE `pembina_mahasiswa` (
  `id_pembina` int(5) NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gelar` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `kota_asal` varchar(25) NOT NULL,
  `telepon` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembina_mahasiswa`
--

INSERT INTO `pembina_mahasiswa` (`id_pembina`, `id_user`, `nama`, `gelar`, `gender`, `kota_asal`, `telepon`) VALUES
(2, 5, 'Ismi Khumaedah', 'S.E.I', 'Akhwat', 'Banten', '0857385214'),
(3, 6, 'Arfin Imanullah', 'S.H', 'Ikhwan', 'Bogor', '08953467273'),
(4, 7, 'Alaudin Naufal Assiraj', 'S.E.I', 'Ikhwan', 'Tegal', '08966512754'),
(5, 8, 'Akbar', 'S.E.I', 'Ikhwan', 'Solo', '08966851492'),
(6, 9, 'Abdul Hamid', 'Lc', 'Ikhwan', 'Bogor', '08966512726'),
(7, 10, 'Moh. Bintang Pamuncak', 'S.E.I', 'Ikhwan', 'Jakarta', '08966512735'),
(8, 11, 'Rizki Akbar Choirullah', 'S.E.I', 'Ikhwan', 'Bandung', '08966510872'),
(9, 12, 'Putri Rizki Istiqomah', 'S.Akun', 'Akhwat', 'Bekasi', '08953466724'),
(10, 13, 'Adita Dyah Asokawati', 'S.E.I', 'Akhwat', 'Malang', '08966515678'),
(11, 14, 'Alfrida Yulistia', 'S.E', 'Akhwat', 'Lampung', '08966987654'),
(12, 15, 'Sitty Rabia Mutia Amalia', 'S.H', 'Akhwat', 'Bandung', '08966874823'),
(13, 16, 'Lilik Hardianti', 'S.Si', 'Akhwat', 'Bogor', '08966517243'),
(14, 17, 'Dzikrina Fikrotus Salma', 'S.E', 'Akhwat', 'Jakarta', '08966517964'),
(15, 18, 'Dina Maharani', 'S.Akun', 'Akhwat', 'Bogor', '089665127263'),
(16, 19, 'Rian Alfiansyah', 'S.E.I', 'Ikhwan', 'Jakarta', '085738521454'),
(17, 20, 'Riyan Aryandi', 'S.Pd', 'Ikhwan', 'Bogor', '085738521409'),
(18, 21, 'M. Sirril Wafa', 'S.H', 'Ikhwan', 'Bandung', '085738521424'),
(19, 22, 'Fahmi Al Hadi', 'S.Ak', 'Ikhwan', 'Bandung', '085738521253');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(5) NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `id_user`, `nama`, `gender`) VALUES
(1, 4, 'Hasan Ishaq', 'Ikhwan');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_shalat`
--

CREATE TABLE `presensi_shalat` (
  `nim` int(8) NOT NULL,
  `id_pekan` int(4) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `shubuh` int(1) DEFAULT NULL,
  `dzuhur` int(1) DEFAULT NULL,
  `ashar` int(1) DEFAULT NULL,
  `maghrib` int(1) DEFAULT NULL,
  `isya` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi_shalat`
--

INSERT INTO `presensi_shalat` (`nim`, `id_pekan`, `tanggal`, `shubuh`, `dzuhur`, `ashar`, `maghrib`, `isya`) VALUES
(18103001, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103001, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101002, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101002, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101004, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101004, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101007, NULL, '2018-11-16', 1, 1, 0, 0, 0),
(18101009, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101009, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101012, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101012, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102004, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102004, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101015, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101015, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101020, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101020, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102005, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18102007, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102007, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101023, NULL, '2018-11-16', 1, 1, 0, 0, 0),
(18101025, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101025, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101024, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101024, NULL, '2018-11-17', 1, 0, 1, 1, 1),
(18103004, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18103004, NULL, '2018-11-17', 1, 1, 0, 1, 0),
(18101028, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101028, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102017, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18102017, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103005, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103005, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101030, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101030, NULL, '2018-11-17', 1, 0, 1, 1, 0),
(18101032, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101032, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101036, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101036, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101033, NULL, '2018-11-16', 1, 1, 0, 0, 1),
(18108001, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108001, NULL, '2018-11-17', 1, 1, 1, 0, 0),
(18101037, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101037, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101038, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101038, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101041, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101041, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101043, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101043, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102016, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102016, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101039, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101039, NULL, '2018-11-17', 1, 0, 0, 0, 1),
(18101047, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101047, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101045, NULL, '2018-11-16', 1, 1, 0, 0, 0),
(18101029, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101029, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103007, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101049, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101049, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101051, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101051, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101050, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101050, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102018, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102018, NULL, '2018-11-17', 1, 1, 1, 1, 0),
(18101053, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101053, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101054, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101054, NULL, '2018-11-17', 1, 1, 1, 1, 0),
(18101058, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101058, NULL, '2018-11-17', 1, 0, 1, 1, 0),
(18103016, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103016, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102001, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102001, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101082, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101074, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101074, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103018, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103018, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102019, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18104001, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104001, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101072, NULL, '2018-11-16', 1, 1, 0, 1, 0),
(18101072, NULL, '2018-11-17', 1, 1, 0, 1, 1),
(18101092, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101092, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103014, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103014, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101089, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101089, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101099, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101099, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101097, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101097, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101110, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101110, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101105, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101104, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101104, NULL, '2018-11-17', 1, 0, 1, 1, 1),
(18101112, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101107, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101081, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101081, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101095, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101095, NULL, '2018-11-17', 1, 0, 0, 1, 1),
(18101101, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101101, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101116, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101116, NULL, '2018-11-17', 1, 0, 1, 1, 1),
(18103020, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103020, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101117, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101117, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103031, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103031, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102042, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102042, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102026, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102026, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101119, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101119, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101103, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101103, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101115, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101115, NULL, '2018-11-17', 1, 1, 0, 1, 0),
(18102040, NULL, '2018-11-16', 1, 1, 1, 0, 1),
(18102040, NULL, '2018-11-17', 1, 1, 0, 1, 1),
(18103019, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103019, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101141, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101141, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101134, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101134, NULL, '2018-11-17', 1, 1, 1, 1, 0),
(18103036, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103036, NULL, '2018-11-17', 1, 0, 1, 1, 1),
(18101133, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101133, NULL, '2018-11-17', 1, 0, 0, 1, 1),
(18103037, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103037, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101138, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101138, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101124, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101124, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101142, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101142, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101102, NULL, '2018-11-16', 1, 0, 0, 1, 1),
(18101102, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101137, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101106, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101106, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103013, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103013, NULL, '2018-11-17', 1, 0, 0, 1, 1),
(18103035, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103035, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101153, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101153, NULL, '2018-11-17', 1, 1, 0, 0, 1),
(18102049, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102049, NULL, '2018-11-17', 1, 1, 0, 1, 1),
(18101125, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101160, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101160, NULL, '2018-11-17', 1, 1, 1, 0, 1),
(18101148, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101148, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103040, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103040, NULL, '2018-11-17', 1, 0, 1, 1, 1),
(18103041, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103041, NULL, '2018-11-17', 1, 0, 0, 0, 1),
(18102047, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102047, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101146, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101146, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103043, NULL, '2018-11-16', 1, 1, 0, 0, 1),
(18104004, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103038, NULL, '2018-11-16', 1, 1, 1, 0, 1),
(18101136, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101136, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101149, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102050, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102050, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101152, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101152, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101168, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101168, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102057, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102057, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103055, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103055, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101166, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101166, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18108020, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18102058, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102058, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103049, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103049, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103056, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103056, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18104012, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104012, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101171, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101171, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101169, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102059, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102059, NULL, '2018-11-17', 1, 1, 1, 0, 1),
(18103042, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103042, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103034, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103034, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101181, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101181, NULL, '2018-11-17', 1, 0, 0, 0, 1),
(18101172, NULL, '2018-11-16', 1, 0, 0, 0, 0),
(18101183, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101144, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101144, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101167, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101167, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101176, NULL, '2018-11-16', 1, 1, 0, 0, 0),
(18101170, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101170, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18108013, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108013, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102037, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101179, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101179, NULL, '2018-11-17', 1, 1, 1, 0, 0),
(18101180, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101165, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101165, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101147, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101147, NULL, '2018-11-17', 1, 0, 0, 1, 1),
(18101185, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101185, NULL, '2018-11-17', 1, 0, 0, 0, 1),
(18104014, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104014, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102064, NULL, '2018-11-16', 1, 1, 1, 0, 1),
(18102064, NULL, '2018-11-17', 1, 0, 1, 0, 1),
(18101184, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101184, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101186, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101186, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18108003, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108003, NULL, '2018-11-17', 1, 1, 1, 0, 1),
(18108009, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108009, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101161, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101161, NULL, '2018-11-17', 1, 0, 0, 0, 1),
(18101157, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101157, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18104007, NULL, '2018-11-16', 1, 1, 1, 0, 1),
(18104007, NULL, '2018-11-17', 1, 0, 0, 1, 1),
(18108007, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108007, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101139, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101139, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102055, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102055, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101162, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101162, NULL, '2018-11-17', 1, 1, 0, 0, 1),
(18103045, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102052, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102052, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18108016, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108016, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101164, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102053, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102053, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102054, NULL, '2018-11-17', 1, 1, 0, 1, 1),
(18102002, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102002, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101003, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101003, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101005, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101006, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101006, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101008, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103003, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103003, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101026, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102012, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102012, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102010, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102010, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101078, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101078, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101040, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101040, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103009, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103009, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102013, NULL, '2018-11-16', 1, 0, 0, 1, 0),
(18102013, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102015, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102015, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103008, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103008, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103010, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103010, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103006, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103006, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101056, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101060, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103012, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101109, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101109, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102014, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102014, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101052, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101052, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103011, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103011, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101070, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101070, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102025, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18102025, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101080, NULL, '2018-11-16', 1, 0, 0, 0, 0),
(18101088, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101088, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102020, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102020, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101093, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101093, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103017, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103017, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101086, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18108002, NULL, '2018-11-16', 1, 0, 0, 0, 0),
(18101084, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101084, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103023, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103023, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101077, NULL, '2018-11-16', 1, 0, 0, 0, 0),
(18101100, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101100, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103021, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103021, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101094, NULL, '2018-11-16', 1, 0, 1, 1, 1),
(18101094, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101098, NULL, '2018-11-16', 1, 0, 0, 1, 1),
(18101098, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101111, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101111, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102028, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102028, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101042, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101042, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103024, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103024, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101085, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101085, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101059, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101059, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101034, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103029, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103022, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103022, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103025, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102034, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102034, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102031, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102031, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101126, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101126, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101035, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101035, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102045, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102045, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101129, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101129, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101135, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101135, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18104002, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104002, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103030, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103030, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101114, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101114, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101122, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101122, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103028, NULL, '2018-11-16', 1, 0, 1, 1, 1),
(18101120, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101120, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18103027, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103027, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102039, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18104005, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18104011, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104011, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102048, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102048, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108006, NULL, '2018-11-16', 1, 0, 1, 1, 1),
(18108006, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108012, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108012, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102029, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102029, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108017, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108017, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108019, NULL, '2018-11-16', 1, 1, 1, 0, 1),
(18101108, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101108, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102044, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102044, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101178, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101178, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18104013, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104013, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101182, NULL, '2018-11-16', 1, 0, 1, 1, 1),
(18101182, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101175, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101175, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108029, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108024, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108024, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102061, NULL, '2018-11-16', 1, 0, 1, 1, 1),
(18102061, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18108030, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108030, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108023, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108025, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108025, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108031, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102038, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102038, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18108028, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108027, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108027, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108021, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18108021, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103062, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103062, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103059, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103059, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101174, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101174, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18108032, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103039, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102041, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102041, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101188, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101188, NULL, '2018-11-17', 1, 1, 1, 1, 0),
(18101190, NULL, '2018-11-16', 1, 1, 1, 0, 1),
(18101196, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101196, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101192, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101192, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103068, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101194, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101194, NULL, '2018-11-17', 1, 0, 1, 0, 0),
(181040017, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103070, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103070, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103071, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103071, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101195, NULL, '2018-11-16', 1, 0, 0, 0, 0),
(18102067, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102067, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18101189, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18101189, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102068, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102068, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101199, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101199, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101202, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101202, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103073, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103073, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101205, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101205, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18104021, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104021, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101206, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101206, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18103074, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103074, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101210, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101210, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18104022, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104022, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18104023, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101201, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101201, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101200, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101200, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101203, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101203, NULL, '2018-11-17', 1, 1, 0, 1, 1),
(18101204, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101204, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18104020, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104020, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102069, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102069, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101207, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101207, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101208, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101208, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101209, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101209, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18102070, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102070, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18103075, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18103075, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18104024, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18104024, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101212, NULL, '2018-11-16', 1, 1, 0, 1, 1),
(18103076, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102071, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102071, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101214, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18101214, NULL, '2018-11-17', 1, 1, 1, 1, 1),
(18101213, NULL, '2018-11-16', 1, 1, 1, 0, 0),
(18102072, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102072, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18102073, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102073, NULL, '2018-11-17', 1, 0, 0, 0, 0),
(18102074, NULL, '2018-11-16', 1, 1, 1, 1, 1),
(18102074, NULL, '2018-11-17', 1, 1, 0, 0, 0),
(18101140, NULL, '2018-11-17', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `presensi_tahsin`
--

CREATE TABLE `presensi_tahsin` (
  `id_tahsin` int(5) NOT NULL,
  `nim` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presensi_talim`
--

CREATE TABLE `presensi_talim` (
  `id_talim` int(5) NOT NULL,
  `nim` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(3) NOT NULL,
  `angkatan` int(2) NOT NULL,
  `semester` int(1) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahsin`
--

CREATE TABLE `tahsin` (
  `id_tahsin` int(5) NOT NULL,
  `id_pekan` int(5) NOT NULL,
  `id_pembina` int(5) NOT NULL,
  `tahsin` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `talim`
--

CREATE TABLE `talim` (
  `id_talim` int(5) NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `id_pembina` int(5) NOT NULL,
  `talim` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udzur_shalat`
--

CREATE TABLE `udzur_shalat` (
  `id_udzur` int(8) NOT NULL,
  `nim` int(8) NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_shalat` varchar(7) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL,
  `direview` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udzur_tahsin`
--

CREATE TABLE `udzur_tahsin` (
  `id_udzur` int(8) NOT NULL,
  `id_tahsin` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL,
  `direview` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udzur_talim`
--

CREATE TABLE `udzur_talim` (
  `id_udzur` int(8) NOT NULL,
  `id_talim` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL,
  `direview` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_default` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `terakhir_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `password_default`, `level`, `terakhir_login`) VALUES
(1, 'adminmatrik', 'bismillah', 0, 1, NULL),
(2, 'hamid', 'hamid123', 0, 2, NULL),
(3, '18000372', 'mahasiswa123', 0, 3, NULL),
(4, 'hasan', 'hasan123', 0, 4, NULL),
(5, 'ismi', 'd96AxT0DyT', 1, 2, NULL),
(6, 'Arfin', 'Ymd5t517g4', 1, 2, NULL),
(7, 'Alaudin', 'ard0YW507S', 1, 2, NULL),
(8, 'Akbar', 'n5Zag5G3Ti', 1, 2, NULL),
(9, 'Abdul', '03AJZl31eo', 1, 2, NULL),
(10, 'Bintang', 'On7jdxNL7J', 1, 2, NULL),
(11, 'Rizki', 'aE8T82k5A7', 1, 2, NULL),
(12, 'Putri', 'mbSG2X7o3E', 1, 2, NULL),
(13, 'Adita', '300iR65MOI', 1, 2, NULL),
(14, 'Alfrida', 'fu5Pw00wQY', 1, 2, NULL),
(15, 'Sitty', 'FF8sS4aFpR', 1, 2, NULL),
(16, 'Lilik', 'ODMo4IddVT', 1, 2, NULL),
(17, 'Dzikrina', 'xzhDNDO8C0', 1, 2, NULL),
(18, 'Dina', 'SHA6z0QBpD', 1, 2, NULL),
(19, 'Rian', 'u6v8aT68ob', 1, 2, NULL),
(20, 'Riyan', 'zkaX0k548M', 1, 2, NULL),
(21, 'Sirril', 'IEaKj6J9cH', 1, 2, NULL),
(22, 'Fahmi', 'f7CG7yDUl3', 1, 2, NULL),
(23, '18101149', 'Fz1t8Q2J7D', 1, 3, NULL),
(24, '18103005', 'jVDD9568nl', 1, 3, NULL),
(25, '18104003', 'b0zc1W1LQK', 1, 3, NULL),
(26, '18101194', '39IejNY0kq', 1, 3, NULL),
(27, '18101188', '2oj301n8zv', 1, 3, NULL),
(28, '18101002', '8HfDf7d294', 1, 3, NULL),
(29, '18102040', 'PSh9aQD087', 1, 3, NULL),
(30, '18103033', '802l94FVUt', 1, 3, NULL),
(31, '18101090', 'UHH75huDyJ', 1, 3, NULL),
(32, '18101084', 'b5kJ3k89jK', 1, 3, NULL),
(33, '18101147', 'zzBEExLVyz', 1, 3, NULL),
(34, '18103032', '87A7Tx9O0V', 1, 3, NULL),
(35, '18102045', 'yNJ84DJw8n', 1, 3, NULL),
(36, '18102039', 'z675NRUQOA', 1, 3, NULL),
(37, '18101012', 'l0d08Gv5RV', 1, 3, NULL),
(38, '18103013', 'pPw1XREMme', 1, 3, NULL),
(39, '18101106', '24929M57uf', 1, 3, NULL),
(40, '18101092', 'V8944P3i98', 1, 3, NULL),
(41, '18101134', '0P7F9dC433', 1, 3, NULL),
(42, '18102052', 'HFKsKs4mXf', 1, 3, NULL),
(43, '18101144', 'r66W7Zt3EX', 1, 3, NULL),
(44, '18103014', '8Gi6X14i6c', 1, 3, NULL),
(45, '18101070', '6Os7Q6Uexy', 1, 3, NULL),
(46, '18103039', 'gAr80g5i6W', 1, 3, NULL),
(47, '18102031', '12xvR7538U', 1, 3, NULL),
(48, '18101127', '32vEyy17b1', 1, 3, NULL),
(49, '18102065', 'YL2lifwbkO', 1, 3, NULL),
(50, '18102042', '100hIQYyLz', 1, 3, NULL),
(51, '18102005', 'GRh16miJ04', 1, 3, NULL),
(52, '18101167', 'I5okD9WtE8', 1, 3, NULL),
(53, '18101018', 'IHTwbPB8v6', 1, 3, NULL),
(54, '18102018', 'TA4qnom2i8', 1, 3, NULL),
(55, '18101125', '3YNzX9Z9SU', 1, 3, NULL),
(56, '18101029', 'F4JWhv4y6x', 1, 3, NULL),
(57, '18104015', '0FamZni5sC', 1, 3, NULL),
(58, '18102067', 'Jj3u9EV8RZ', 1, 3, NULL),
(59, '18108002', '0wHUT1nHc2', 1, 3, NULL),
(60, '18101145', '5Dp8pKywVt', 1, 3, NULL),
(61, '18101067', 'v3Z7V4Xn58', 1, 3, NULL),
(62, '18102009', 'eAx5P6C8RW', 1, 3, NULL),
(63, '18101077', 'KsX7ZT6HE5', 1, 3, NULL),
(64, '18101118', '5v22Nv208J', 1, 3, NULL),
(65, '18108014', '10go8i6uhu', 1, 3, NULL),
(66, '18102014', 'DbRST9J40w', 1, 3, NULL),
(67, '18104033', 'LWKBY814HN', 1, 3, NULL),
(68, '18101183', 'S60pth3687', 1, 3, NULL),
(69, '18101072', '0VeuGuvo30', 1, 3, NULL),
(70, '18101005', '3w9HSX0r68', 1, 3, NULL),
(71, '18103004', 'Xa5It67440', 1, 3, NULL),
(72, '18102004', '131BxHG092', 1, 3, NULL),
(73, '18101192', 'q2GPs3vzy4', 1, 3, NULL),
(74, '18102027', 'd191MOXVg6', 1, 3, NULL),
(75, '18108023', 'C1Sq89We38', 1, 3, NULL),
(76, '18102022', 'ktt4a9z26U', 1, 3, NULL),
(77, '18104023', '3K0rOEN6Xh', 1, 3, NULL),
(78, '18101087', 'gNc05pgKsy', 1, 3, NULL),
(79, '18102006', '1dRT8g55pL', 1, 3, NULL),
(80, '18103002', '5xiU3fG1A6', 1, 3, NULL),
(81, '18101085', 'DvJV2Kf56T', 1, 3, NULL),
(82, '18101052', 'Ss31kRl6K4', 1, 3, NULL),
(83, '18101042', 'Z57QXW1mU2', 1, 3, NULL),
(84, '18104001', '8M3303OD89', 1, 3, NULL),
(85, '18102063', 'dJ0Ebk7GV1', 1, 3, NULL),
(86, '18101211', '9vw9UJP174', 1, 3, NULL),
(87, '18101122', 'p7n4l9j86o', 1, 3, NULL),
(88, '18102010', '75iUnI3p1P', 1, 3, NULL),
(89, '18102002', 'hY59zE12Oq', 1, 3, NULL),
(90, '18102017', 'dzVub7u04C', 1, 3, NULL),
(91, '18101174', 'ac7s0L8G2d', 1, 3, NULL),
(92, '18103007', 'JW13awB5JB', 1, 3, NULL),
(93, '18101121', 'xbUPJ6Qi73', 1, 3, NULL),
(94, '18102015', '7GUXvh4g8s', 1, 3, NULL),
(95, '18108021', '26XEGr3XBn', 1, 3, NULL),
(96, '18102085', 'Hk9K312037', 1, 3, NULL),
(97, '18103012', '78y4f0d186', 1, 3, NULL),
(98, '18101071', 'WYsl820944', 1, 3, NULL),
(99, '18101137', 'pgGw14x961', 1, 3, NULL),
(100, '18103025', 'na4b7qFZ63', 1, 3, NULL),
(101, '18102030', '5AIJRq67X3', 1, 3, NULL),
(102, '18101026', 'XbC49p90T2', 1, 3, NULL),
(103, '18101108', 'Behcn8z5EZ', 1, 3, NULL),
(104, '18103035', 'x4KiCLIE8o', 1, 3, NULL),
(105, '18101064', 'Z0dWnIXlvr', 1, 3, NULL),
(106, '18108013', 'Zv5pWbHzNf', 1, 3, NULL),
(107, '18101180', '07jafThS7O', 1, 3, NULL),
(108, '18101023', 'vNIwc0P5FG', 1, 3, NULL),
(109, '18108007', 'qBX24638eI', 1, 3, NULL),
(110, '18102003', 'oVSTGqFI5o', 1, 3, NULL),
(111, '18101163', 'y70LdO9G5e', 1, 3, NULL),
(112, '18102029', '0jZGi9xQd8', 1, 3, NULL),
(113, '18108006', 'u001gi64sV', 1, 3, NULL),
(114, '18102053', '3S6C69EZ9z', 1, 3, NULL),
(115, '18101126', 'sTGzB4u8qK', 1, 3, NULL),
(116, '18101040', 'J816W0jz50', 1, 3, NULL),
(117, '18101098', 'SM9JF80JQ7', 1, 3, NULL),
(118, '18103001', '9BW6y05MVB', 1, 3, NULL),
(119, '18101050', 'EwN3GG107h', 1, 3, NULL),
(120, '18101046', '9J9QM4320f', 1, 3, NULL),
(121, '18102028', '0BgEmiJZrv', 1, 3, NULL),
(122, '18104013', 'uvCr0wUHoo', 1, 3, NULL),
(123, '18102025', 'dpV3uB2602', 1, 3, NULL),
(124, '18103023', 'I2p5X8R5Xw', 1, 3, NULL),
(125, '18101017', 'rTZct53qFw', 1, 3, NULL),
(126, '18101215', 'E4giU90z33', 1, 3, NULL),
(127, '18101160', 'O380Kl9qC2', 1, 3, NULL),
(128, '18101100', 'LTSS3C5G8I', 1, 3, NULL),
(129, '18101019', '6J9MVQ0P0B', 1, 3, NULL),
(130, '18101022', 'j0aHWwI01z', 1, 3, NULL),
(131, '18102012', '584s96I7rb', 1, 3, NULL),
(132, '18101038', '6lJWUlDWcU', 1, 3, NULL),
(133, '18102074', 'fH8YLL5aKe', 1, 3, NULL),
(134, '18101059', '15563A3EZQ', 1, 3, NULL),
(135, '18101047', '7b8yR6i3ZB', 1, 3, NULL),
(136, '18103044', 'tI8Zkh3w4X', 1, 3, NULL),
(137, '18101049', 'LQ9I5469yg', 1, 3, NULL),
(138, '18101214', 'B5V633J109', 1, 3, NULL),
(139, '18101074', '3Hfo33UQ36', 1, 3, NULL),
(140, '18101204', '7lTD4aXKMl', 1, 3, NULL),
(141, '18101196', '5sA1CulwsE', 1, 3, NULL),
(142, '18101120', 'p2A891FwL7', 1, 3, NULL),
(143, '18101037', '2gz0093je8', 1, 3, NULL),
(144, '18101123', 'x5iq2o98Pk', 1, 3, NULL),
(145, '18101181', 'b1ltrtev28', 1, 3, NULL),
(146, '18101053', '5Lh0iY35I8', 1, 3, NULL),
(147, '18102048', 'XqgJ6wBuCZ', 1, 3, NULL),
(148, '18104004', 'Blps8tS3v6', 1, 3, NULL),
(149, '18103016', '6W9N8qfzgk', 1, 3, NULL),
(150, '18101161', 'eiANrn0kPh', 1, 3, NULL),
(151, '18103056', '0sEBpO4SiM', 1, 3, NULL),
(152, '18101096', 'Qcaq992i47', 1, 3, NULL),
(153, '18101189', 'VV6VT2oTF6', 1, 3, NULL),
(154, '18101082', 'ImfM90NdO2', 1, 3, NULL),
(155, '18101039', 'l4w700ylQg', 1, 3, NULL),
(156, '18101035', 'd75RFjI9O9', 1, 3, NULL),
(157, '18104020', '0IVG09Ak87', 1, 3, NULL),
(158, '18101177', '58KUc6gkH0', 1, 3, NULL),
(159, '18101066', 'c9c0k93901', 1, 3, NULL),
(160, '18101171', 'hZh7YVLQqI', 1, 3, NULL),
(161, '18101186', 'y7ZL0Q6648', 1, 3, NULL),
(162, '18104019', 'DPo42Hax7H', 1, 3, NULL),
(163, '18108016', 'z9onKWYiwW', 1, 3, NULL),
(164, '18101190', 'aCyV8pisIj', 1, 3, NULL),
(165, '18101058', 'vy1XqTSb77', 1, 3, NULL),
(166, '18101109', '9oA0jod620', 1, 3, NULL),
(167, '18101133', '19HARe2qrZ', 1, 3, NULL),
(168, '18104022', 'HJSR3v451U', 1, 3, NULL),
(169, '18108031', 'hz4uzgSNtn', 1, 3, NULL),
(170, '18102038', '1996VdU4Z1', 1, 3, NULL),
(171, '18101086', 'G4En7XxpSX', 1, 3, NULL),
(172, '18101182', '3VJh68c15j', 1, 3, NULL),
(173, '18103059', 'v33ln2xjm1', 1, 3, NULL),
(174, '18101140', 'E53AHR5Tj8', 1, 3, NULL),
(175, '18103045', 'wK8uD900Br', 1, 3, NULL),
(176, '18102049', 'JYL85V9Y42', 1, 3, NULL),
(177, '18101045', '9XY10At49F', 1, 3, NULL),
(178, '18101079', 'eu3CE1J5K3', 1, 3, NULL),
(179, '18102073', 'Iqs88PzJ69', 1, 3, NULL),
(180, '18101124', 'yaey6AHIsq', 1, 3, NULL),
(181, '18103070', 'y1wm4yTsxt', 1, 3, NULL),
(182, '18101185', 'ZW1707SV04', 1, 3, NULL),
(183, '18101007', '954dj1NXod', 1, 3, NULL),
(184, '18102037', 'E8gC0i1HRs', 1, 3, NULL),
(185, '18103026', 'TezJK27PmI', 1, 3, NULL),
(186, '18104018', 'uZ63l3VF3C', 1, 3, NULL),
(187, '18101206', 'AFr20cEB16', 1, 3, NULL),
(188, '18102072', 'Fw1OzCNPky', 1, 3, NULL),
(189, '18103028', 'I3wVBUF07K', 1, 3, NULL),
(190, '18103019', 'wV8A2RE0WC', 1, 3, NULL),
(191, '18103043', '3WgP3Bc38m', 1, 3, NULL),
(192, '18101200', 'NW51Hx0022', 1, 3, NULL),
(193, '18101143', 'FsLHckA330', 1, 3, NULL),
(194, '18103030', '0r0mZLK4r1', 1, 3, NULL),
(195, '18101099', '1JJ0odhvSg', 1, 3, NULL),
(196, '18103010', '9YpV2VbD6X', 1, 3, NULL),
(197, '18103027', 'bLGCHp49Ns', 1, 3, NULL),
(198, '18101028', '53VeL6bgdI', 1, 3, NULL),
(199, '18102021', '124Eh2F6UB', 1, 3, NULL),
(200, '18101165', '0Ii1vc5uED', 1, 3, NULL),
(201, '18101031', '6V3pv0oTG7', 1, 3, NULL),
(202, '18101157', 'I48Y9d9744', 1, 3, NULL),
(203, '18102046', 'K9bjqnX0i2', 1, 3, NULL),
(204, '18103071', '1cjPOvielW', 1, 3, NULL),
(205, '18101210', '0yH64r66O7', 1, 3, NULL),
(206, '18103073', 'SdVgCna1b0', 1, 3, NULL),
(207, '18104021', '8r2i4Azy17', 1, 3, NULL),
(208, '18101203', '5q0w9X8T2z', 1, 3, NULL),
(209, '18101055', 'rhJi1799eZ', 1, 3, NULL),
(210, '18102054', 'J1rOVM3182', 1, 3, NULL),
(211, '18102041', '9e300V3Rxq', 1, 3, NULL),
(212, '18101139', 'RiAQ1cfEUx', 1, 3, NULL),
(213, '18101136', '291xQ1I6xV', 1, 3, NULL),
(214, '18101164', 'RfQ7negqK4', 1, 3, NULL),
(215, '18102050', 'ALfN91D3Y3', 1, 3, NULL),
(216, '18101101', 'Pn6oqPDeCy', 1, 3, NULL),
(217, '18101006', 'aC7xD0m9Y4', 1, 3, NULL),
(218, '18101078', 'Fi28E7SI1u', 1, 3, NULL),
(219, '18102019', '5Ji76296uk', 1, 3, NULL),
(220, '18101004', '0Uf854cRoA', 1, 3, NULL),
(221, '18103036', 'Qtv1U90zE1', 1, 3, NULL),
(222, '18101089', '04vR3q1nbr', 1, 3, NULL),
(223, '18101162', 'rMX0z2HnaU', 1, 3, NULL),
(224, '18108011', '0Asx2aP5c5', 1, 3, NULL),
(225, '18101102', '5W3f626Sz7', 1, 3, NULL),
(226, '18101201', 'z9A4RQUGfO', 1, 3, NULL),
(227, '18102058', '9Ban6AaWy3', 1, 3, NULL),
(228, '18104006', 'x4yw4egbFa', 1, 3, NULL),
(229, '18101015', 'B7viB23b6S', 1, 3, NULL),
(230, '18101107', 'FPi6CuWA1U', 1, 3, NULL),
(231, '18101209', 'pVrO1l20s9', 1, 3, NULL),
(232, '18103038', 't49mTD7Qso', 1, 3, NULL),
(233, '18101020', 'tMd9N7Ma00', 1, 3, NULL),
(234, '18101148', 'n0v57yH5p1', 1, 3, NULL),
(235, '18101051', 'Dy0e4Jh20c', 1, 3, NULL),
(236, '18101043', 'GBT6WiV0r9', 1, 3, NULL),
(237, '18101032', 'lakIo0FF7x', 1, 3, NULL),
(238, '18101116', '4J3KoBVGr0', 1, 3, NULL),
(239, '18101119', '8ZgS932n6x', 1, 3, NULL),
(240, '18103041', '0275XUgTuY', 1, 3, NULL),
(241, '18101146', 'G2TmLiSZTh', 1, 3, NULL),
(242, '18101176', 'h8dyDfkfo1', 1, 3, NULL),
(243, '18101069', '4Fl5MtX989', 1, 3, NULL),
(244, '18101110', '3J77j9K6r7', 1, 3, NULL),
(245, '18101212', '0Sq023xp3d', 1, 3, NULL),
(246, '18102007', 'bd3OtK2GI7', 1, 3, NULL),
(247, '18102064', 'WczmbI1qVT', 1, 3, NULL),
(248, '18103076', 'C3H5966fdm', 1, 3, NULL),
(249, '18101153', '84xGXb6lRg', 1, 3, NULL),
(250, '18101024', '3YNpB3XsW1', 1, 3, NULL),
(251, '18101170', 'UZuFMeGFfA', 1, 3, NULL),
(252, '18103040', '7eDz7N3isN', 1, 3, NULL),
(253, '18101095', 'E3Q87I71u4', 1, 3, NULL),
(254, '18101207', 'fsCrWdQ4ci', 1, 3, NULL),
(255, '18102059', 'n3Ku65W135', 1, 3, NULL),
(256, '18102016', 'TAOfn7sRxh', 1, 3, NULL),
(257, '18103049', 'gA5391I5f2', 1, 3, NULL),
(258, '18104007', '94VUHay69d', 1, 3, NULL),
(259, '18101033', '1NMat7o560', 1, 3, NULL),
(260, '18101142', '8cP9Lv2I40', 1, 3, NULL),
(261, '18101179', 'I3XfTKu7ay', 1, 3, NULL),
(262, '18103034', 'gDOnJpXvi9', 1, 3, NULL),
(263, '18101138', 'xo91pH0B5w', 1, 3, NULL),
(264, '18102001', '1tp797Cxow', 1, 3, NULL),
(265, '18101112', '6Ub5EUK6b7', 1, 3, NULL),
(266, '18103042', 'iRAyo7HQzM', 1, 3, NULL),
(267, '18101105', '1clamy94Ai', 1, 3, NULL),
(268, '18103085', 'J6Ci787a6B', 1, 3, NULL),
(269, '18101034', 'xpaPQix1Ss', 1, 3, NULL),
(270, '18104002', 'pg5HceCpzz', 1, 3, NULL),
(271, '18102023', '8pDI75AViZ', 1, 3, NULL),
(272, '18102034', '131yFjpI9A', 1, 3, NULL),
(273, '18108028', 'G8pxIxHHwA', 1, 3, NULL),
(274, '18101178', 'ZQw7JIux6l', 1, 3, NULL),
(275, '18104005', 'FMO0vkVvDT', 1, 3, NULL),
(276, '18103008', '17k3752apD', 1, 3, NULL),
(277, '18103006', 'j91NOeunU7', 1, 3, NULL),
(278, '18102044', 'B3Gkm9n7Eu', 1, 3, NULL),
(279, '18101044', '0uZ90K7cXF', 1, 3, NULL),
(280, '18103011', '15SQj5F8L4', 1, 3, NULL),
(281, '18101152', '4jk265O003', 1, 3, NULL),
(282, '18101025', 'wZFp95y5Z0', 1, 3, NULL),
(283, '18102055', 'I950B5Uj81', 1, 3, NULL),
(284, '18103074', 'XD2G6AuDj3', 1, 3, NULL),
(285, '18108022', 'ATPe0Y0Vsq', 1, 3, NULL),
(286, '181040017', '8hAF36RLOQ', 1, 3, NULL),
(287, '18103029', 'LGfvDmba72', 1, 3, NULL),
(288, '18101117', 'xWYy1l8zA9', 1, 3, NULL),
(289, '18101062', '2SqGxy7HIu', 1, 3, NULL),
(290, '18108025', 'y9DKGpWy8V', 1, 3, NULL),
(291, '18108017', 'ixf3g25KLX', 1, 3, NULL),
(292, '18108001', 'GuEb6cAO8c', 1, 3, NULL),
(293, '18108032', 'O3Y9Pg55am', 1, 3, NULL),
(294, '18108024', 'RyMr3vGSat', 1, 3, NULL),
(295, '18102068', 'H76TQL69JZ', 1, 3, NULL),
(296, '18101130', 'x7ANoUER4b', 1, 3, NULL),
(297, '18101073', '8H9xTq8801', 1, 3, NULL),
(298, '18102060', 'z732Ky0Fah', 1, 3, NULL),
(299, '18101080', '7rq82Xg2uU', 1, 3, NULL),
(300, '18103046', 'q5DflPa2Av', 1, 3, NULL),
(301, '18102047', 'nJ2Re22J7v', 1, 3, NULL),
(302, '18101175', 'Q7zUyIWi8k', 1, 3, NULL),
(303, '18101057', 'yk1Z0Y2RCh', 1, 3, NULL),
(304, '18103020', 'P92m8Xdc4K', 1, 3, NULL),
(305, '18101115', 'W8q8hkUED9', 1, 3, NULL),
(306, '18101068', 'k1BKae2x0d', 1, 3, NULL),
(307, '18108012', '9i1hxX3tLM', 1, 3, NULL),
(308, '18101151', 'vK9J6ouUg0', 1, 3, NULL),
(309, '18101202', 'TSvQ5X65ho', 1, 3, NULL),
(310, '18102011', 'OPVY3BW225', 1, 3, NULL),
(311, '18103055', 'qNd3V26t3u', 1, 3, NULL),
(312, '18108030', '2O7u1301ie', 1, 3, NULL),
(313, '18101128', '10hxvW82f6', 1, 3, NULL),
(314, '18108005', 'Vx3r1Q1qtF', 1, 3, NULL),
(315, '18101094', 'e10312Gc7d', 1, 3, NULL),
(316, '18101187', 'Y2jwH1X7SH', 1, 3, NULL),
(317, '18102084', '75t9lt89GM', 1, 3, NULL),
(318, '18101223', '4VDci7t07d', 1, 3, NULL),
(319, '18103062', 'dFYJKvB1QQ', 1, 3, NULL),
(320, '18101083', 'c3SPp5fH9o', 1, 3, NULL),
(321, '18101021', 'heUb0pTA42', 1, 3, NULL),
(322, '18101168', '4lmN62OjOt', 1, 3, NULL),
(323, '18103047', 'oh2H2691vn', 1, 3, NULL),
(324, '18103017', '7vRzD5ek7B', 1, 3, NULL),
(325, '18101091', 'HOJT9i8jLc', 1, 3, NULL),
(326, '18102069', '56NMRvB9pu', 1, 3, NULL),
(327, '18101169', '266GQsolT6', 1, 3, NULL),
(328, '18101054', 'sKX8kgSn2C', 1, 3, NULL),
(329, '18102024', 'Jt0cWOFvsU', 1, 3, NULL),
(330, '18101172', '982I67cQmG', 1, 3, NULL),
(331, '18101097', 'Hwi42rz1Rr', 1, 3, NULL),
(332, '18101129', 'n4lxV1mX6V', 1, 3, NULL),
(333, '18103009', 'PHXgocQEof', 1, 3, NULL),
(334, '18108020', 'Bd85045r1o', 1, 3, NULL),
(335, '18103048', 'IPAt1Ul9AD', 1, 3, NULL),
(336, '18108019', 'QA9MGle94R', 1, 3, NULL),
(337, '18102057', 'N13eJTsWJ1', 1, 3, NULL),
(338, '18104012', 'anWM7K6Vxp', 1, 3, NULL),
(339, '18101081', '4n8lBtNoR3', 1, 3, NULL),
(340, '18101195', '90j9Z7fJDb', 1, 3, NULL),
(341, '18101088', '3v5q8dI92S', 1, 3, NULL),
(342, '18101150', '46ljT8pMC6', 1, 3, NULL),
(343, '18102071', 'k6zI0Sz64g', 1, 3, NULL),
(344, '18102070', 'fZd8F5wMU6', 1, 3, NULL),
(345, '18108026', 'V3bRs4l4o0', 1, 3, NULL),
(346, '18108029', 'S1JI3q12XW', 1, 3, NULL),
(347, '18104011', '0SG19LH9v4', 1, 3, NULL),
(348, '18101173', 'R04u8k0933', 1, 3, NULL),
(349, '18103037', 'VCdO84aYf0', 1, 3, NULL),
(350, '18102020', 'n4uZWUBswv', 1, 3, NULL),
(351, '18102062', '0qfAc5zQiz', 1, 3, NULL),
(352, '18103021', '9Md7QE93JX', 1, 3, NULL),
(353, '18101093', 'pW712uqCgc', 1, 3, NULL),
(354, '18101199', 'mK5eX86tL5', 1, 3, NULL),
(355, '18101075', 'w3kPVkoWu7', 1, 3, NULL),
(356, '18101208', '9nCZk2r56D', 1, 3, NULL),
(357, '18101003', 'An0Y0p6oIk', 1, 3, NULL),
(358, '18101061', 'Qz4Zr6Ec09', 1, 3, NULL),
(359, '18101056', '7C8x2e4sF6', 1, 3, NULL),
(360, '18101027', 'vfQSup1N61', 1, 3, NULL),
(361, '18101060', '9hfZZb2dKv', 1, 3, NULL),
(362, '18101009', 'pJE3Vxf4dK', 1, 3, NULL),
(363, '18103031', 'my4539pyGq', 1, 3, NULL),
(364, '18103075', '8O2YuyFHk1', 1, 3, NULL),
(365, '18103072', '4sBnXqp23d', 1, 3, NULL),
(366, '18101193', '6DTu79HoZ2', 1, 3, NULL),
(367, '18101184', 'Y23828fuLw', 1, 3, NULL),
(368, '18104024', '5zrsfrelJ4', 1, 3, NULL),
(369, '18102061', 'R08E5ZoD7r', 1, 3, NULL),
(370, '18103024', '8ZqxrDnq5J', 1, 3, NULL),
(371, '18101008', 'ixe01c4eh1', 1, 3, NULL),
(372, '18103015', 'zJ1aw2dO30', 1, 3, NULL),
(373, '18102026', '79sOS79WMG', 1, 3, NULL),
(374, '18101135', 'LhVAMsvQMj', 1, 3, NULL),
(375, '18101001', 'R75obhKivZ', 1, 3, NULL),
(376, '18101111', 'lw3v4a88M6', 1, 3, NULL),
(377, '18101197', 'NS7ehmOFkO', 1, 3, NULL),
(378, '18102043', 'B50h79M6M9', 1, 3, NULL),
(379, '18108027', '8bUueawp2v', 1, 3, NULL),
(380, '18101036', '080ZxSSI2Y', 1, 3, NULL),
(381, '18108003', 'TE3xQ4uA5J', 1, 3, NULL),
(382, '18102013', 'vfILnVK8Xy', 1, 3, NULL),
(383, '18101205', 'q20SXllZsO', 1, 3, NULL),
(384, '18101213', 'Bpm7sp1Zym', 1, 3, NULL),
(385, '18101104', 'ZArC4wx4Wq', 1, 3, NULL),
(386, '18103022', 'Maq52c6FJG', 1, 3, NULL),
(387, '18103003', 'GvewE5Z1Lz', 1, 3, NULL),
(388, '18103018', '5B40g54PW9', 1, 3, NULL),
(389, '18101132', 'jO6Yi36ACT', 1, 3, NULL),
(390, '18101114', '815LRoyxk9', 1, 3, NULL),
(391, '18101166', 'KmhG6b1f57', 1, 3, NULL),
(392, '18101141', '847fh10m08', 1, 3, NULL),
(393, '18101030', 'SMOU98M248', 1, 3, NULL),
(394, '18101041', '5Dr26i6LV9', 1, 3, NULL),
(395, '18102036', 'aJRmr3ZZI8', 1, 3, NULL),
(396, '18101103', '6JJz9E36zd', 1, 3, NULL),
(397, '18101131', '9pCPjjvY23', 1, 3, NULL),
(398, '18108009', 'xJ3RJqU0cD', 1, 3, NULL),
(399, '18103068', 'aDaX5F03L1', 1, 3, NULL),
(400, '18104014', '160O9X6hF3', 1, 3, NULL),
(401, '18102056', '3wS409o1Ye', 1, 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmatrikulasi`
--
ALTER TABLE `adminmatrikulasi`
  ADD PRIMARY KEY (`id_adminmatrikulasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jadwal_pulang`
--
ALTER TABLE `jadwal_pulang`
  ADD KEY `id_pekan` (`id_pekan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pembina` (`id_pembina`);

--
-- Indexes for table `pekan`
--
ALTER TABLE `pekan`
  ADD PRIMARY KEY (`id_pekan`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indexes for table `pembina_mahasiswa`
--
ALTER TABLE `pembina_mahasiswa`
  ADD PRIMARY KEY (`id_pembina`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `presensi_shalat`
--
ALTER TABLE `presensi_shalat`
  ADD KEY `nim` (`nim`),
  ADD KEY `id_pekan` (`id_pekan`);

--
-- Indexes for table `presensi_tahsin`
--
ALTER TABLE `presensi_tahsin`
  ADD KEY `id_tahsin` (`id_tahsin`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `presensi_talim`
--
ALTER TABLE `presensi_talim`
  ADD KEY `id_talim` (`id_talim`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tahsin`
--
ALTER TABLE `tahsin`
  ADD PRIMARY KEY (`id_tahsin`),
  ADD KEY `id_pekan` (`id_pekan`),
  ADD KEY `id_pembina` (`id_pembina`);

--
-- Indexes for table `talim`
--
ALTER TABLE `talim`
  ADD PRIMARY KEY (`id_talim`),
  ADD KEY `id_pekan` (`id_pekan`),
  ADD KEY `id_pembina` (`id_pembina`);

--
-- Indexes for table `udzur_shalat`
--
ALTER TABLE `udzur_shalat`
  ADD PRIMARY KEY (`id_udzur`),
  ADD KEY `id_pekan` (`id_pekan`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `udzur_tahsin`
--
ALTER TABLE `udzur_tahsin`
  ADD PRIMARY KEY (`id_udzur`),
  ADD KEY `id_tahsin` (`id_tahsin`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `udzur_talim`
--
ALTER TABLE `udzur_talim`
  ADD PRIMARY KEY (`id_udzur`),
  ADD KEY `id_talim` (`id_talim`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmatrikulasi`
--
ALTER TABLE `adminmatrikulasi`
  MODIFY `id_adminmatrikulasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pekan`
--
ALTER TABLE `pekan`
  MODIFY `id_pekan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembina_mahasiswa`
--
ALTER TABLE `pembina_mahasiswa`
  MODIFY `id_pembina` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_pimpinan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tahsin`
--
ALTER TABLE `tahsin`
  MODIFY `id_tahsin` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talim`
--
ALTER TABLE `talim`
  MODIFY `id_talim` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `udzur_shalat`
--
ALTER TABLE `udzur_shalat`
  MODIFY `id_udzur` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `udzur_tahsin`
--
ALTER TABLE `udzur_tahsin`
  MODIFY `id_udzur` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `udzur_talim`
--
ALTER TABLE `udzur_talim`
  MODIFY `id_udzur` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminmatrikulasi`
--
ALTER TABLE `adminmatrikulasi`
  ADD CONSTRAINT `adminmatrikulasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `jadwal_pulang`
--
ALTER TABLE `jadwal_pulang`
  ADD CONSTRAINT `jadwal_pulang_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_pembina`) REFERENCES `pembina_mahasiswa` (`id_pembina`);

--
-- Constraints for table `pekan`
--
ALTER TABLE `pekan`
  ADD CONSTRAINT `pekan_ibfk_1` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`);

--
-- Constraints for table `pembina_mahasiswa`
--
ALTER TABLE `pembina_mahasiswa`
  ADD CONSTRAINT `pembina_mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD CONSTRAINT `pimpinan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `presensi_shalat`
--
ALTER TABLE `presensi_shalat`
  ADD CONSTRAINT `presensi_shalat_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `presensi_shalat_ibfk_2` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`);

--
-- Constraints for table `presensi_tahsin`
--
ALTER TABLE `presensi_tahsin`
  ADD CONSTRAINT `presensi_tahsin_ibfk_1` FOREIGN KEY (`id_tahsin`) REFERENCES `tahsin` (`id_tahsin`),
  ADD CONSTRAINT `presensi_tahsin_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `presensi_talim`
--
ALTER TABLE `presensi_talim`
  ADD CONSTRAINT `presensi_talim_ibfk_1` FOREIGN KEY (`id_talim`) REFERENCES `talim` (`id_talim`),
  ADD CONSTRAINT `presensi_talim_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `tahsin`
--
ALTER TABLE `tahsin`
  ADD CONSTRAINT `tahsin_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`),
  ADD CONSTRAINT `tahsin_ibfk_2` FOREIGN KEY (`id_pembina`) REFERENCES `pembina_mahasiswa` (`id_pembina`);

--
-- Constraints for table `talim`
--
ALTER TABLE `talim`
  ADD CONSTRAINT `talim_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`),
  ADD CONSTRAINT `talim_ibfk_2` FOREIGN KEY (`id_pembina`) REFERENCES `pembina_mahasiswa` (`id_pembina`);

--
-- Constraints for table `udzur_shalat`
--
ALTER TABLE `udzur_shalat`
  ADD CONSTRAINT `udzur_shalat_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`),
  ADD CONSTRAINT `udzur_shalat_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `udzur_tahsin`
--
ALTER TABLE `udzur_tahsin`
  ADD CONSTRAINT `udzur_tahsin_ibfk_1` FOREIGN KEY (`id_tahsin`) REFERENCES `tahsin` (`id_tahsin`),
  ADD CONSTRAINT `udzur_tahsin_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `udzur_talim`
--
ALTER TABLE `udzur_talim`
  ADD CONSTRAINT `udzur_talim_ibfk_1` FOREIGN KEY (`id_talim`) REFERENCES `talim` (`id_talim`),
  ADD CONSTRAINT `udzur_talim_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
