-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 06:51 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bonus`
--

CREATE TABLE `tb_bonus` (
  `id` int(11) NOT NULL,
  `jumlah_bonus` varchar(128) NOT NULL,
  `min_nilai_yi` double NOT NULL,
  `max_nilai_yi` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bonus`
--

INSERT INTO `tb_bonus` (`id`, `jumlah_bonus`, `min_nilai_yi`, `max_nilai_yi`, `id_user`, `email`) VALUES
(4, '10000', 0, 0.27, 19, 'pimpinan@gmail.com'),
(5, '20000', 0.3, 1.5, 19, 'pimpinan@gmail.com'),
(6, '30000', 1.6, 2, 19, 'pimpinan@gmail.com'),
(7, '40000', 2.1, 2.5, 19, 'pimpinan@gmail.com'),
(8, '50000', 2.6, 3, 19, 'pimpinan@gmail.com'),
(9, '60000', 3.1, 3.5, 19, 'pimpinan@gmail.com'),
(10, '70000', 3.6, 4, 19, 'pimpinan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `no_ktp` varchar(28) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `departemen` varchar(20) NOT NULL,
  `posisi` varchar(15) NOT NULL,
  `status` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `no_ktp`, `nama_karyawan`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `departemen`, `posisi`, `status`) VALUES
(1, '00100400106', '3217062711770011', 'Ahmad Muhamad', 'L', 'Bandung', '1977-11-29', 'Kp. Bunisari RT04/RW11 Ds. Gadobangkong Kec. Ngamp', 'Spinning', 'Operator', '2021'),
(4, '001.004.00108\r\n', '3217061610740005\r\n', 'Ateng Nyansi Dinata\r\n', 'L', 'Bandung', '1996-07-15', 'Graha Bukit Raya 3 Blok A9 No 1 RT01/RW25 Cilame Ngamprah Bandung Barat\r\n', 'Spinning', 'Operator', '2021'),
(5, '001.004.00128', '3217081511660005', 'Cece Sunarli', 'L', 'Bandung', '1996-06-02', 'Kp. Cikurutug RT02/RW07 Ds. Tagogapu Kec. Padalarang Kab. Bandung Barat\r\n', 'Spinning', 'Operator', '2021'),
(6, '001.004.00138', '3217090202790033', 'Toto Juharta', 'L', 'Majalengka', '1996-06-21', 'Puri Indah Lestari Blok C4 No.6 Ds. Batujajar RT/02/16 KBB\r\n', 'Weaving', 'Operator', ''),
(8, '001.044.00169', '3277021504620002', 'Remigius Didi Sunardi', 'L', 'Kuningan', '1978-08-09', 'Pondok Ranca Belut Block A15 RT01/11 Kel. Padasuka Kec. Cimahi Tengah', 'Weaving', 'Operator', ''),
(11, '001.004.00167', '3217081005740042', 'Muhamad Imam Taofik', 'L', 'Magelang', '1974-05-10', 'Kp. Cipadangmanah RT02/16 Padalarang', 'Spinning', 'Operator', '2021'),
(13, '001.004.00174', '3217041607780006', 'Hery Kuswanto', 'L', 'Bandung', '1978-07-16', 'Kp. Cikalong Kolot RT04/08 Ds. Cikalong Kec. Cikalong Wetan', 'Spinning', 'Operator', '2021'),
(14, '001.004.00177', '3277020304800024', 'Kusnadi', 'L', 'Purworejo', '1980-04-03', 'Kp. Tangkil RT 06/07 Cigugur Tengah Cimahi Tengah', 'Spinning', 'Operator', '2021'),
(15, '001.004.00180', '3273061111770007', 'Rully Santosa', 'L', 'Bandung', '1977-11-06', 'Jl. Gg Saleh No. 175/66 RT05/06 Kel. Arjuna Kec. Cicendo-Bandung', 'Spinning', 'Operator', '2021'),
(16, '001.004.00197', '3171082409630001', 'Supat', 'L', 'Bandung', '1963-09-24', 'Jl Johar Baru utara No 11 RT 14/03 Ds Johar Baru Kec Johar Baru', 'Spinning', 'Operator', '2021'),
(17, '001.004.00198', '3277022006600019', 'Poltak Simanjuntak', 'L', 'Medan', '1960-05-20', 'Jl. Sriwijaya Raya H-14 Cimahi RT06/01 Karang Mekar Cimahi Tengah', 'Spinning', 'Operator', '2021'),
(18, '001.004.00327', '3217081310630006', 'Ahmad Haryanto', 'L', 'Bandung', '1963-10-13', 'PPI Jl Nakula Blok G3/4 RT 05/27 Padalarang', 'Spinning', 'Operator', '2021'),
(19, '001.004.00329', '3217060702560007', 'Aso Acong', 'L', 'Bandung', '1956-02-07', 'Kp Cikalong kolot RT 02/08 Ds Cikalong Kec Cikalong wetan', 'Spinning', 'Operator', '2021'),
(20, '001.004.00531', '3217060703760015', 'Darwita', 'L', 'Bandung', '1976-03-07', 'Cikalang RT 03/10 Ds Bojongkoneng Kec Ngamprah', 'Spinning', 'Operator', '2021'),
(241, '001.051.00386', '3277022509920014', 'Yudi Maulana', 'L', 'Cimahi', '1992-09-25', 'Jln Kebon Manggu RT 002/ RW 004 Kel Padasuka Kec Cimahi Tengah', 'Weaving', 'Operator', ''),
(242, '001.051.00387', '3217061907890008', 'Adi Supriadi', 'L', 'Serang', '1989-07-19', 'Jl Baros Pasar RT 02/01 Ds Lewigajah kec Cimahi Selatan', 'Weaving', 'Operator', ''),
(243, '001.051.00388', '3217062602920005', 'Rian Sopian', 'L', 'Bandung', '1992-02-26', 'Ngamprah kidul RT 04/02 Ds Ngamprah Kec Ngamprah', 'Weaving', 'Operator', ''),
(244, '001.052.00110', '3217060503660002', 'Cece Saepudin', 'L', 'Bandung', '1966-03-05', 'Jl. Haji Gofur 66 Karya Bhakti IV RT02/02', 'Weaving', 'Operator', ''),
(245, '001.052.00283', '3217060911760011', 'Asep Saripudin', 'L', 'Cimahi', '1976-11-09', 'Kp. Ciloa RT02/02 Ds. Mekar Sari KBB', 'Weaving', 'Operator', ''),
(246, '001.052.00284', '3203092209850005', 'Dodi Abdul Supriadi', 'L', 'Serang', '1985-09-22', 'Kp. Ciodeng RT01/07 Ds. Selajambe Kec. Sukaluyu Kab. Cianjur', 'Weaving', 'Operator', ''),
(247, '001.052.00285', '3217071601910002', 'Yogi Hamzah', 'L', 'Bandung', '1991-01-16', 'Kp. Cipicung RT01/03 Ds. Sumur Bandung Kec. Cipatat', 'Weaving', 'Operator', ''),
(248, '001.052.00437', '3277030408710012', 'Nana Suryana', 'L', 'Bandung', '1971-08-04', 'Kp Tegal Kawung No. 39 RT 03/05 Ds Cipageran, Kec Cimahi Utara', 'Weaving', 'Operator', ''),
(249, '001.052.00438', '3217102111790014', 'Hasan Basri', 'L', 'Bandung', '1979-11-21', 'Kp Awilarangan RT 003/ RW 008 Desa Mekar Mukti Kec Cihampelas, Bandung Barat', 'Weaving', 'Operator', ''),
(250, '001.052.00439', '3217101211810013', 'Ade Sopandi', 'L', 'Cimahi', '1981-11-12', 'Kp Cilutung RT 003/ RW 002 Kel Singajaya Kec Cihampelas', 'Weaving', 'Operator', ''),
(421, '001.061.00630', '3217092111911001', 'Ari Purnama', 'L', 'Karawang', '1991-11-21', 'Kp Cibodas RT 04/07 Ds Pangauban Kec Batujajar', 'Dyeing', 'Operator', ''),
(422, '001.061.00631', '3217042303880001', 'Firman Hidayat', 'L', 'Bandung', '1988-03-23', 'Kp Pasir malang RT 03/04 Ds Cipada Kec Cikalong Wetan Kab Bandung Barat', 'Dyeing', 'Operator', ''),
(423, '001.061.00632', '3217060506890021', 'Nana Sumpena', 'L', 'Majalengka', '1989-06-05', 'Kp Kebon Kalapa RT 002/ RW 002 Kel Tanimulya Kec Ngamprah', 'Dyeing', 'Operator', ''),
(424, '001.061.00633', '3273032701920001', 'Atang Hidayat', 'L', 'Bandung', '1992-01-27', 'Kp Babakan RT 03/ RW 06 Kel Babakan Kec Babakan Ciparay', 'Dyeing', 'Operator', ''),
(425, '001.061.00634', '3217070608890006', 'Alip Saepuloh', 'L', 'Bandung', '1989-08-06', 'Kp Warungjambe RT 002/ RW 010 Kel Rajamandala Kulon Kec Cipatat', 'Dyeing', 'Operator', ''),
(426, '001.061.00635', '3217161008910004', 'Saepudin', 'L', 'Bandung', '1991-08-10', 'Kp Cileuer RT 001/ RW 007 Desa Cikande Kec Saguling', 'Dyeing', 'Operator', ''),
(427, '001.063.00159', '3217061802630004', 'Rohman Turo', 'L', 'Bandung', '1963-02-18', 'Kp. Caringin Ds Margajaya RT01/01 Ngamprah', 'Dyeing', 'Operator', ''),
(428, '001.063.00228', '3204050309800002', 'Wawan Setiawan', 'L', 'Bandung', '1980-09-03', 'Kp. Andir RT001/016 Cileunyi Wetan Kec. Cileunyi KBB', 'Dyeing', 'Operator', ''),
(429, '001.063.00292', '3217082204840002', 'Hendra Kusnaya', 'L', 'Bandung', '1984-04-22', 'Kp. Andir Padalarang Kel. Padalarang Kec. Padalarang', 'Dyeing', 'Operator', ''),
(430, '001.063.00293', '3277011102860012', 'Eman Sulaeman', 'L', 'Sumedang', '1986-02-11', 'Cibeber RT01/04 Cimahi Selatan', 'Dyeing', 'Operator', ''),
(560, '002.017.00113', '3217080105870013', 'Yudi Purnomo', 'L', 'Bandung', '1987-05-02', 'Kp Warung Awi RT 001/007 Ds Bojongkoneng Kec Ngamprah', 'Celup', 'Operator', ''),
(561, '002.017.00114', '3217120204820054', 'Taufik Baidilah', 'L', 'Majalengka', '1982-04-02', 'Kp. Cipereng RT02/RW01 Ds. Citalem Kec. Cipongkor Kab. Bandung Barat', 'Celup', 'Operator', ''),
(562, '002.017.00115', '3217040107900302', 'Rifki Maulana', 'L', 'Tegal', '1989-02-19', 'Kp. Cikalong Wetan RT04/RW12 Ds. Mandala Mukti', 'Celup', 'Operator', ''),
(563, '002.017.00724', '3211132705620002', 'Aan', 'L', 'Bandung', '1962-05-27', 'Rancemekar RT 02/01 Ds Haurngombong Kec Pamulihan', 'Celup', 'Operator', ''),
(564, '002.017.00725', '3217031210880005', 'Mulyana', 'L', 'Bandung', '1972-04-28', 'Kp Andir RT 08/02 Ds Gadobangkong Kec Padalarang', 'Celup', 'Operator', ''),
(565, '002.017.00777', '3273051512790001', 'David Setiadi', 'L', 'Bandung', '1979-12-15', 'Jl Budiman No. 4/23 Kel Andir Kec Ciroyom Kota Bandung', 'Celup', 'Operator', ''),
(566, '002.018.00004', '3217062206830012', 'Budi Hadian', 'L', 'Bandung', '1983-06-22', 'Kp Ciharshas RT 01/05 Ds Margajaya Kec Ngamprah Bandung Barat', 'Celup', 'Operator', ''),
(567, '002.018.00006', '3205040705860001', 'Feri Junaedi', 'L', 'Bandung', '1986-05-07', 'Kp Tanjung RT 01/013 Des Pasawahan Kec Tarogong Kaler', 'Celup', 'Operator', ''),
(568, '002.018.00007', '3277022804870009', 'Doni Aprianto', 'L', 'Bandung', '1986-04-28', 'Jl Kalidam No. 15 RT 01/09 Kec Karang Mekar Cimahi Tengah', 'Celup', 'Operator', ''),
(569, '002.018.00012', '3217060805810017', 'Andi Suherman', 'L', 'Bandung', '1981-05-08', 'Cimareme RT 04/01 Ds Cimareme, Kec Ngamprah', 'Celup', 'Operator', ''),
(711, '999.017.01560', '3204081601920001', 'Fajar Ginanjar', 'L', 'Bandung', '1992-01-16', 'Bojongsoang RT. 06/02 Desa. Bojongsoang, Kec. Bojongsoang', 'Finishing', 'Operator', ''),
(712, '999.017.01655', '3217040711870004', 'Riki Ardian', 'L', 'Karawang', '1987-11-07', 'Kp Pasarlama Rt004/002 desa Ciptagumati Kec Cikalongwetan Kab Bandung Barat', 'Finishing', 'Operator', ''),
(713, '999.017.01663', '3217072405950003', 'Rizky Suratman', 'L', 'Bandung', '1992-05-24', 'Kp Cibonteng Rt002/001 DesaSumurbandung Kec Cipatat Kab bandung barat', 'Finishing', 'Operator', ''),
(714, '999.017.01691', '3217080707930001', 'Ujang Nurdin', 'L', 'Majalengka', '1993-07-07', 'Ciluncat Hilir Rt002/010 Desa Cimareang Kec Padalarang Kab Bandung Barat', 'Finishing', 'Operator', ''),
(715, '999.017.01705', '3217062507930008', 'Yudi Fadillah', 'L', 'Tegal', '1994-05-25', 'Kp Lebakgede Mekar Rt001/019 Desa Bojongkoneng Kec Ngamprah', 'Finishing', 'Operator', ''),
(716, '999.017.01825', '3217080706760002', 'Suheryana', 'L', 'Tegal', '1976-06-07', 'Cipeundeuy RT 006/ RW 002 Kel Cipeundeuy Kec Padalarang', 'Finishing', 'Operator', ''),
(717, '999.017.01826', '3217080208720016', 'Wahyudin', 'L', 'Majalengka', '1972-08-02', 'Kp Babakan Cikurutug RT 001/ RW 007 Kel Tagog Apu Kec Padalarang', 'Finishing', 'Operator', ''),
(718, '999.017.01827', '3217101008740023', 'Dadan Supriatna', 'L', 'Cilacap', '1974-08-10', 'Kp Babakan RT 004/ RW 001 Kel Cipatik Kec Cihampelas', 'Finishing', 'Operator', ''),
(719, '999.017.01828', '3217090901600001', 'Jajat Sudrajat', 'L', 'Bandung', '1960-01-09', 'Blok SMP No 32 RT 003/ RW 004, Batujajar Barat, Batujajar', 'Finishing', 'Operator', ''),
(720, '999.017.01829', '3205112402720001', 'Alo Rohandi', 'L', 'Bandung', '1972-02-24', 'Kp Cikokosan RT 003/ RW 002 Desa Kertamukti, Kec Cipatat', 'Finishing', 'Operator', ''),
(871, '999.999.00647', '3209391206830013', 'Rahmat', 'L', 'Bandung', '1983-06-12', 'Blok Kecitran Lor RT 03/02 Ds Purwawinangun Kec Suranenggara', 'Utility', 'Operator', ''),
(872, '999.999.00648', '3209200706930011', 'Abdul Hadi', 'L', 'Sumedang', '1992-07-09', 'Jl Cideng Jaya RT 18/04 Ds Kertawinangun Kec Kedawung', 'Utility', 'Operator', ''),
(873, '999.999.00649', '3327142908930001', 'Muhamad Farisin', 'L', 'Malang', '1993-08-29', 'Dusun pagembrongam RT 24/05 Ds Mereng Kec Warungpiring', 'Utility', 'Operator', ''),
(874, '999.999.00650', '3274020807800001', 'Zaenal Arifin', 'L', 'Bandung', '1990-03-08', 'Kp. Kesunean Selatan No. 138 RT 04/09 Ds Kesepuhan Kec lemahwungkuk', 'Utility', 'Operator', ''),
(875, '999.999.00651', '3274012501900005', 'Choironi', 'L', 'Cirebon', '1990-01-25', 'Jl Sukapura I Tanggul  RT 03/01 Ds Sukapura Kec Kejaksaan', 'Utility', 'Operator', ''),
(876, '999.999.00652', '3209162504700004', 'Mulyono', 'L', 'Cirebon', '1970-04-25', 'Dukumalang RT 04/01 Ds dukupuntang kec dukupuntang', 'Utility', 'Operator', ''),
(877, '999.999.00653', '3209201903720009', 'Rudi Kurnia', 'L', 'Cirebon', '1972-03-19', 'Jl Cideng Jaya Blok karang Mingkrik 14/04 Ds kertawinangung Kec Kedawung', 'Utility', 'Operator', ''),
(878, '999.999.00654', '3209202106950005', 'Komarudin', 'L', 'Cirebon', '1995-06-21', 'Blok silombang RT 03/03 Ds tuk Kec Kedawung', 'Utility', 'Operator', ''),
(879, '999.999.00655', '3209211505750016', 'Siswanto', 'L', 'Tegal', '1975-05-15', 'Gang tanjung No. 93 RT 02/01 Ds Adidharma Kec Gunungjati', 'Utility', 'Operator', ''),
(880, '999.999.00656', '3274036409640005', 'Irmawati Suhendro', 'P', 'Bandung', '1964-09-24', 'Gang tanjung No. 93 RT 02/01 Ds Adidharma Kec Gunungjati', 'Utility', 'Operator', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `jenis_kriteria` varchar(15) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `jenis_kriteria`, `tahun`) VALUES
(39, 'Tanggung jawab', 1.2, 'Benefit', '2021'),
(40, 'Kepribadian', 1.5, 'Benefit', '2021'),
(41, 'Absensi', 1, 'Cost', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_sub_kriteria` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `id_karyawan`, `id_sub_kriteria`, `tahun`) VALUES
(259, 1, 29, '2021'),
(260, 1, 31, '2021'),
(261, 1, 33, '2021'),
(262, 5, 28, '2021'),
(263, 5, 31, '2021'),
(264, 5, 33, '2021'),
(265, 11, 28, '2021'),
(266, 11, 30, '2021'),
(267, 11, 33, '2021'),
(268, 4, 28, '2021'),
(269, 4, 32, '2021'),
(270, 4, 33, '2021'),
(271, 13, 27, '2021'),
(272, 13, 30, '2021'),
(273, 13, 35, '2021'),
(274, 15, 29, '2021'),
(275, 15, 30, '2021'),
(276, 15, 35, '2021'),
(277, 14, 29, '2021'),
(278, 14, 32, '2021'),
(279, 14, 35, '2021'),
(280, 17, 29, '2021'),
(281, 17, 31, '2021'),
(282, 17, 33, '2021'),
(283, 18, 28, '2021'),
(284, 18, 31, '2021'),
(285, 18, 35, '2021'),
(286, 19, 29, '2021'),
(287, 19, 31, '2021'),
(288, 19, 33, '2021'),
(289, 16, 28, '2021'),
(290, 16, 30, '2021'),
(291, 16, 33, '2021'),
(292, 20, 27, '2021'),
(293, 20, 30, '2021'),
(294, 20, 33, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ranking`
--

CREATE TABLE `tb_ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai_yi` double NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ranking`
--

INSERT INTO `tb_ranking` (`id_ranking`, `id_karyawan`, `nilai_yi`, `tahun`) VALUES
(79, 13, 0.48264, '2021'),
(80, 18, 0.34022, '2021'),
(81, 15, 0.31341, '2021'),
(82, 20, 0.22152, '2021'),
(83, 14, 0.1978, '2021'),
(84, 11, 0.13691, '2021'),
(85, 16, 0.13691, '2021'),
(86, 5, 0.0791, '2021'),
(87, 4, 0.0213, '2021'),
(88, 1, -0.00551, '2021'),
(89, 17, -0.00551, '2021'),
(90, 19, -0.00551, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kriteria`
--

CREATE TABLE `tb_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_sub_kriteria` varchar(30) NOT NULL,
  `nilai_sub_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_kriteria`
--

INSERT INTO `tb_sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `nama_sub_kriteria`, `nilai_sub_kriteria`) VALUES
(27, 39, 'Sangat Baik', 4),
(28, 39, 'Baik', 3),
(29, 39, 'Cukup', 2),
(30, 40, 'Sangat Baik', 4),
(31, 40, 'Baik', 3),
(32, 40, 'Cukup', 2),
(33, 41, '> 3', 4),
(35, 41, '< 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(512) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(19, 'Pimpinan', 'pimpinan@gmail.com', 'default.jpg', '$2y$10$XKsiqTTiSHFHN/QIlPuLyuSHKcT444yXnWTYTndpu4G1XokhtJPUi', 2, 1, 1625342262),
(21, 'Kepala Bagian Spinning', 'kabag@gmail.com', 'default.jpg', '$2y$10$k0OsVm2sJQ4ArmJ8R.8ZtOkq76qyl/Cr13HDh/fTILQLk9ibpNL3G', 3, 1, 1625346533),
(23, 'Kepala Weaving', 'kabag2@gmail.com', 'default.jpg', '$2y$10$GgoE6rv3Dh0KsD1MZfNdeOG/.prg04we8k94fFQAQv0oREajenqPC', 4, 1, 1626163803),
(24, 'Kepala Bagian Celup', 'kabag3@gmail.com', 'default.jpg', '$2y$10$DA2PF5RMJQuP2amB/rtCAue4md/iYCsw6KMyth8vIWp87VkOJkI1m', 5, 1, 1626163832),
(25, 'Kepala Bagian Dyeing', 'kabag4@gmail.com', 'default.jpg', '$2y$10$g1njeYlxDCtYkJ3LoUkUmuNdjjL6a9eWneFhJj6JTCUgqQLUAy2qu', 6, 1, 1626163869),
(26, 'Kepala Bagian Finnishing', 'kabag5@gmail.com', 'default.jpg', '$2y$10$1fbXD1hS/VnrJkU7stqWa.0qMyiMu/nyVP7doQTdvMOGPT0n1FMuK', 7, 1, 1626163900),
(29, 'HRD Malakasari', 'hrd@gmail.com', 'default.jpg', '$2y$10$KnYpS5cPbn/X390SYjQvW.In2BSVuhIRDnHzINfF57hQBBoxlBI1e', 1, 1, 1626921977),
(31, 'Kepala Bagian Utility', 'kabag6@gmail.com', 'default.jpg', '$2y$10$JaOVl6Uv56kYi3odbWxdx.oyyayXoISvyrKpahrJr5.6jzDf0h.JO', 8, 1, 1627576047);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Hrd'),
(2, 'Pimpinan'),
(3, 'Kabag Spinning'),
(4, 'Kabag Weaving'),
(5, 'Kabag Celup'),
(6, 'Kabag Dyeing'),
(7, 'Kabag Finnishing'),
(8, 'Kabag Utility');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bonus`
--
ALTER TABLE `tb_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_kriteria` (`id_sub_kriteria`);

--
-- Indexes for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  ADD PRIMARY KEY (`id_ranking`);

--
-- Indexes for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bonus`
--
ALTER TABLE `tb_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=882;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD CONSTRAINT `tb_penilaian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_ibfk_2` FOREIGN KEY (`id_sub_kriteria`) REFERENCES `tb_sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  ADD CONSTRAINT `tb_sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
