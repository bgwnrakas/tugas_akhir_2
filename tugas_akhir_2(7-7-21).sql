-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 03:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
  `id_bonus` int(11) NOT NULL,
  `jumlah_bonus` int(11) NOT NULL,
  `batas_nilai_yi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `NIK` varchar(16) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`NIK`, `nama_karyawan`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jabatan`, `status`) VALUES
('1671145809910002', 'DEVI SEPTIANI', 'P', 'Palembang', '2000-12-08', 'Alamat5', 'Kepala Regu', 'Dinilai'),
('3175092308900003', 'RUHUL JIHAD', 'L', 'Cimahi', '2000-07-14', 'Alamat3', 'Mekanik', 'Dinilai'),
('3201371511910002', 'MAM PRATOMO BUDI SANTOSO', 'L', 'Sumedang', '1995-04-13', 'Alamat9', 'Mekanik', 'Dinilai'),
('3203044709900009', 'HANA FARADILA', 'P', 'Surabaya', '1997-08-19', 'Alamat6', 'Kepala Shift', 'Dinilai'),
('3217021210870001', 'MUHAMMAD BERNALDY', 'L', 'Cianjur', '2000-01-06', 'Alamat10', 'Operator', 'Belum'),
('3271025806900007', 'ARSYANNISA RAHM', 'P', 'Bandung', '1998-09-09', 'Alamat8', 'Operator', 'Dinilai'),
('3271046504930002', 'INDAH RATNA FURI', 'P', 'Bandung', '2000-11-07', 'Alamat1', 'Kepala Shift', 'Dinilai'),
('3273061711870003', 'HENDOKO SATRIATAMA', 'L', 'Cimahi', '1997-01-01', 'Alamat11', 'Mekanik', 'Dinilai'),
('3276024907900002', 'ELIS ANITA SARI', 'P', 'Cimahi', '2000-07-01', 'Alamat7', 'Kepala Regu', 'Belum'),
('3276046501920003', 'MUTIFANY CHAIRIN', 'P', 'Bandung', '1999-07-07', 'Alamat2', 'Kepala Regu', 'Belum'),
('5102082206920002', 'I  KADEK AMERTA CANDRA ERDIKA', 'L', 'Bali', '2001-02-26', 'Alamat4', 'Operator', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` int(11) NOT NULL,
  `jenis_kriteria` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `jenis_kriteria`) VALUES
(1, 'Kepala Shift', 5, 'Jabatan'),
(2, 'Kepala Regu', 4, 'Jabatan'),
(3, 'Mekanik', 3, 'Jabatan'),
(4, 'Operator', 2, 'Jabatan'),
(5, 'Sangat Baik', 5, 'Kepribadian'),
(6, 'Baik', 4, 'Kepribadian'),
(7, 'Cukup', 3, 'Kepribadian'),
(8, 'Sangat Kurang', 1, 'Kepribadian'),
(9, 'Sangat Baik', 5, 'Tanggung Jawab'),
(10, 'Baik', 4, 'Tanggung Jawab'),
(11, 'Cukup', 3, 'Tanggung Jawab'),
(12, 'Kurang', 2, 'Tanggung Jawab'),
(13, 'Sangat Baik', 5, 'Kerja Sama'),
(14, 'Baik', 4, 'Kerja Sama'),
(15, 'Cukup', 3, 'Kerja Sama'),
(16, 'Kurang', 2, 'Kerja Sama'),
(17, 'Sangat Kurang', 1, 'Kerja Sama'),
(18, 'Sangat Baik', 5, 'Hasil Pekerjaan'),
(19, 'Baik', 4, 'Hasil Pekerjaan'),
(20, 'Cukup', 3, 'Hasil Pekerjaan'),
(21, 'Kurang', 3, 'Hasil Pekerjaan'),
(22, 'Sangat Kurang', 1, 'Hasil Pekerjaan'),
(23, '>= 4 Hari', 5, 'Absensi'),
(24, '3 Hari', 4, 'Absensi'),
(25, '2 Hari', 3, 'Absensi'),
(26, '1 Hari', 2, 'Absensi'),
(27, '0 Hari', 1, 'Absensi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `NIK`, `id_kriteria`) VALUES
(1, '1671145809910002', 2),
(2, '1671145809910002', 5),
(3, '1671145809910002', 10),
(4, '1671145809910002', 15),
(5, '1671145809910002', 19),
(6, '1671145809910002', 25),
(7, '3175092308900003', 3),
(8, '3175092308900003', 5),
(9, '3175092308900003', 9),
(10, '3175092308900003', 13),
(11, '3175092308900003', 18),
(12, '3175092308900003', 26),
(13, '3203044709900009', 1),
(14, '3203044709900009', 6),
(15, '3203044709900009', 11),
(16, '3203044709900009', 14),
(17, '3203044709900009', 19),
(18, '3203044709900009', 25),
(19, '3201371511910002', 3),
(20, '3201371511910002', 5),
(21, '3201371511910002', 9),
(22, '3201371511910002', 13),
(23, '3201371511910002', 18),
(24, '3201371511910002', 27),
(25, '3271025806900007', 4),
(26, '3271025806900007', 6),
(27, '3271025806900007', 11),
(28, '3271025806900007', 16),
(29, '3271025806900007', 21),
(30, '3271025806900007', 24),
(31, '3271046504930002', 1),
(32, '3271046504930002', 6),
(33, '3271046504930002', 11),
(34, '3271046504930002', 14),
(35, '3271046504930002', 20),
(36, '3271046504930002', 25),
(37, '3273061711870003', 3),
(38, '3273061711870003', 5),
(39, '3273061711870003', 10),
(40, '3273061711870003', 15),
(41, '3273061711870003', 19),
(42, '3273061711870003', 25);

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
(18, 'HRD Malakasari', 'hrd@gmail.com', 'default.jpg', '$2y$10$D4XCgZPb/5YrfB.DZ9lHaO/UxFbM64O6/4FCPaFayHGMELoqlzwUy', 1, 1, 1625339231),
(19, 'Pimpinan', 'pimpinan@gmail.com', 'default.jpg', '$2y$10$XKsiqTTiSHFHN/QIlPuLyuSHKcT444yXnWTYTndpu4G1XokhtJPUi', 2, 1, 1625342262),
(21, 'Kepala Bagian', 'kabag@gmail.com', 'default.jpg', '$2y$10$k0OsVm2sJQ4ArmJ8R.8ZtOkq76qyl/Cr13HDh/fTILQLk9ibpNL3G', 3, 1, 1625346533);

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
(3, 'Kabag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bonus`
--
ALTER TABLE `tb_bonus`
  ADD PRIMARY KEY (`id_bonus`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`NIK`);

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
  ADD KEY `id_karyawan` (`NIK`),
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
  MODIFY `id_bonus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD CONSTRAINT `tb_penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_ibfk_2` FOREIGN KEY (`NIK`) REFERENCES `tb_karyawan` (`NIK`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
