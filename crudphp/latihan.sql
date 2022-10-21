-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 05:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_diri1`
--

CREATE TABLE `data_diri1` (
  `id_utama` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jeniskelamain` enum('laki-laki','perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_diri1`
--

INSERT INTO `data_diri1` (`id_utama`, `nama`, `jeniskelamain`, `tanggal_lahir`, `alamat`, `agama`, `email`, `no_telp`, `gambar`) VALUES
(225, 'Ahmad Faruk', 'laki-laki', '2005-08-27', 'jl. mawar', 'islam', 'faruk@gmail.com', '085234678345', '63217e2f4d4b7.jpg'),
(242, 'Moch Sigit', 'laki-laki', '2004-03-22', 'jl. melati', 'islam', 'sigit@gmail.com', '085234678345', '63217b000e66d.jpg'),
(247, 'Intan Fajril', 'perempuan', '2005-10-31', 'jl. pantura', 'islam', 'intan@gmail.com', '085234678345', '63217a7483507.jpg'),
(250, 'Anis Badriyah', 'perempuan', '2022-12-31', 'jl. pantura', 'islam', 'anis@gmail.com', '0586702276', '63217ae06b38d.jpg'),
(251, 'lailatul koderiyah', 'perempuan', '2005-06-07', 'jl.  Anggrek', 'islam', 'lail@gmail.com', '0586702276', '63217933771b5.jpg'),
(252, 'Hermanto', 'laki-laki', '2022-12-31', 'jl. merpati', 'islam', 'herman@gmail.com', '085234678345', '63218c8624698.jpg'),
(253, 'Husnawiyah', 'perempuan', '2003-02-27', 'jl. salak', 'islam', 'husna@gmail.com', '0586702276', '632960e456369.jpg'),
(256, 'Khoiruddina', 'perempuan', '2005-07-21', 'jl. pantura', 'islam', 'dina@gmail.com', '088805938806', '63293ded35506.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id` int(11) NOT NULL,
  `id_utama` int(11) DEFAULT NULL,
  `bidang` varchar(75) DEFAULT NULL,
  `program` varchar(75) DEFAULT NULL,
  `kompetensi` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id`, `id_utama`, `bidang`, `program`, `kompetensi`) VALUES
(189, 225, 'Agribisnis ', 'Agribisnis Produksi Ternak Sapi', 'Agribi'),
(190, 225, 'Kerajinan Dan Pariwisata', 'Pariwisata', 'Usaha Perjalanan Wisata'),
(499, 242, 'Teknologi Informasi', 'Teknik Telekomunikasi', 'Teknik Transmisi Telekomunikasi'),
(500, 242, 'Agribisnis ', 'Agribisnis Produksi Ternak ', 'Agribisnis Ternak Ruminansia'),
(515, 251, 'Bisnis dan Manajemen', 'Akuntansi dan Keuangan', 'Perbankan dan Keuangan Mikro'),
(518, 252, 'Instalasi Listrik kuat', 'Pegawai Listrik Negara', 'kreatif'),
(519, 253, 'Kesehatan dan Pekerjaan Sosial', 'Keperawatan', 'Asisten Keperawatan'),
(540, 256, 'Teknik Komputer dan Informatika', 'Teknologi Informasi dan Komunikasi', 'Rekayasa Perangkat Lunak'),
(549, 250, 'Melukis', 'Seni Rupa', ' Desain Interior dan Teknik Furnitur'),
(555, 247, 'Instalasi Listrik', 'Pegawai Listrik Negara', 'cakap'),
(560, 250, 'Menari', 'Seni tari', ' Penataan Tari'),
(563, 251, 'Instalasi Listrik kuat', 'Pegawai Listrik Negara', 'cakap'),
(569, 252, 'memasak', 'tata boga', 'inovatif'),
(570, 253, 'memasak', 'tata boga', 'inovatif'),
(573, 225, 'Instalasi Listrik', 'Pegawai Listrik Negara', 'cakap'),
(574, 250, 'Menyanyi', 'Seni musik', 'Seni Musik Klasik');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pelajar` int(11) NOT NULL,
  `id_utama` int(11) NOT NULL,
  `riwayat_pendidikan` varchar(50) DEFAULT NULL,
  `nama_pendidikan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pelajar`, `id_utama`, `riwayat_pendidikan`, `nama_pendidikan`) VALUES
(11, 225, 'tk Nusa', 'Nusa '),
(12, 225, 'sd', 'melati'),
(13, 225, 'smp', 'Bayu'),
(14, 225, 'sma', 'mandala'),
(15, 225, 'Universitas', 'panca marga'),
(69, 242, 'tk', 'Nusa '),
(70, 242, 'sd', 'melati'),
(71, 242, 'smp', 'Bayu'),
(72, 242, 'sma', 'mandala'),
(88, 247, 'TK', 'Nusa Indah'),
(89, 247, 'SD', 'Sumberkare 1'),
(90, 247, 'Mts', 'Roubin'),
(97, 250, 'TK', 'Nusa Indah'),
(98, 250, 'SD', 'Sumberkare 1'),
(99, 250, 'SMP', 'Bayu'),
(100, 251, 'TK', 'Nusa Indah'),
(101, 251, 'SD', 'melati'),
(102, 251, 'smp', 'Bayu'),
(103, 252, 'TK', 'Nusa Indah'),
(104, 252, 'sd', 'melati'),
(105, 252, 'smp', 'Bayu'),
(106, 252, 'sma', 'mandala'),
(107, 253, 'tk', 'Nusa '),
(116, 256, 'TK', 'Nusa Indah'),
(117, 256, 'SDN', 'Sumberkare 1'),
(118, 256, 'MTS', 'Roubin'),
(119, 256, 'SMKN', 'Sumberasih 1'),
(120, 253, 'sd', 'melati'),
(121, 253, 'smp', 'Bayu Biru'),
(122, 253, 'sma', 'mandala'),
(127, 247, 'MA', 'Wahasyi'),
(129, 251, 'sma', 'mandala'),
(133, 250, 'SMK', 'Mandala');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'dina', '$2y$10$qFa6b4bp9XYPQ2LdNPB/0.8KulwbU5nfJkCphDd5cRGYW65AePXpu'),
(2, 'admin', '$2y$10$b6oEbh7oGk7oll2QZB7wkOqLYhIoUhRD48fWhtB5HrTy15nUAUCSO'),
(3, 'khoiruddina', '$2y$10$Quyh.jUhs9RueR6sw7riguwdfMVC.IZ8qpnk1aKq2iHa3LyqRWwfi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_diri1`
--
ALTER TABLE `data_diri1`
  ADD PRIMARY KEY (`id_utama`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utama` (`id_utama`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pelajar`),
  ADD KEY `id_utama` (`id_utama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_diri1`
--
ALTER TABLE `data_diri1`
  MODIFY `id_utama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `keahlian_ibfk_1` FOREIGN KEY (`id_utama`) REFERENCES `data_diri1` (`id_utama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`id_utama`) REFERENCES `data_diri1` (`id_utama`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
