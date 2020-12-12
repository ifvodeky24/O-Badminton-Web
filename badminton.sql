-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 09:09 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badminton`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_gor`
--

CREATE TABLE `tb_gor` (
  `id_gor` int(11) NOT NULL,
  `nama_gor` varchar(50) NOT NULL,
  `alamat_gor` varchar(100) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `jumlah_lapangan` int(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `fasilitas` varchar(30) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia','','') NOT NULL,
  `id_pengelola` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gor`
--

INSERT INTO `tb_gor` (`id_gor`, `nama_gor`, `alamat_gor`, `longitude`, `latitude`, `deskripsi`, `jumlah_lapangan`, `foto`, `fasilitas`, `status`, `id_pengelola`, `createdAt`, `updatedAt`) VALUES
(1, 'Panam Jaya', 'JL. HR. Soebrantas Panam Gg. Jihad No.5, Tuah Karya, Kec. Tampan, Kota Pekanbaru, Riau 28293', 101.447779, 0.507068, 'Bisnis penyewaan fasilitas untuk olahraga Badminton.', 3, 'gor_20200223_164018.jpg', 'Kamar Mandi, Kantin', 'Tersedia', 1, '2020-01-27 21:15:33', '2020-01-27 21:15:33'),
(2, 'Gor Panam Raya Square', 'Jalan HR. Soebrantas, Simpang Baru, Pekanbaru, Kota Pekanbaru, Riau 28293', 102.559966, -0.372684, 'Bisnis penyewaan fasilitas untuk olahraga Badminton.', 3, 'gor-2.jpg', 'Kantin, Kamar Mandi', 'Tidak Tersedia', 1, '2020-01-27 21:15:33', '2020-01-27 21:15:33'),
(3, 'Gor Arya Cipta', 'Sidomulyo Bar., Kec. Tampan, Kota Pekanbaru, Riau 28294', 101.379932, 0.463383, 'Bisnis penyewaan fasilitas untuk olahraga Badminton.', 2, 'gor-1.jpg', 'Kamar Mandi, Kantin', 'Tersedia', 1, '2020-01-27 21:15:33', '2020-01-27 21:15:33'),
(4, 'Gor Permata Hati', 'Jl. Kutilang Sakti No.55, Simpang Baru, Kec. Tampan, Kota Pekanbaru, Riau 28292', 101.392007, 0.473979, 'Bisnis penyewaan fasilitas untuk olahraga Badminton.', 3, 'gor-1.jpg', 'Kamar Mandi, Kantin', 'Tersedia', 1, '2020-01-27 21:15:33', '2020-01-27 21:15:33'),
(5, 'Gor Nailah', 'Jl. Swakarya, Tuah Karya, Kec. Tampan, Kota Pekanbaru, Riau 28293', 101.378998, 0.446955, 'Bisnis penyewaan fasilitas untuk olahraga Badminton.', 2, 'gor-1.jpg', 'Kantin, Kamar Mandi', 'Tersedia', 1, '2020-01-27 21:15:33', '2020-01-27 21:15:33'),
(6, 'Arfa Jaya', 'Sidomulyo Bar., Kec. Tampan, Kota Pekanbaru, Riau 28294', 101.39436, 0.436422, 'Gedung Olahraga Penyedia jasa penyewaan lapangan Badminton', 2, 'gor-1.jpg', 'Kamar Mandi, Kantin', 'Tidak Tersedia', 1, '2020-01-27 21:15:33', '2020-01-27 21:15:33'),
(8, 'Gor Kabeta', 'Jl. Amal Mulia No.12, Labuh Baru Tim., Kec. Payung Sekaki, Kota Pekanbaru, Riau 28292', 101.424272, 0.504676, 'Jasa Penyewaan Lapangan Badminton', 2, 'gor-1.jpg', 'Kamar Mandi, Kantin', 'Tidak Tersedia', 1, '2020-01-27 21:15:33', '2020-01-27 21:15:33'),
(9, 'Gor Beringin Indah', 'Jl. Muslimin V, RT.02/RW.08, Sidomulyo Tim., Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28289', 101.420967, 0.451871, 'Jasa Penyewaan Lapangan Badminton', 2, 'gor-1.jpg', 'Kamar Mandi, Kantin', 'Tidak Tersedia', 1, '2020-01-27 21:15:33', '2020-01-27 21:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam` varchar(50) NOT NULL,
  `status` enum('Tersedia','Booking','','') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_lapangan`, `hari`, `jam`, `status`, `createdAt`, `updatedAt`) VALUES
(3, 3, 'Senin', '11.00', 'Tersedia', '2020-01-27 21:16:06', '2020-01-27 21:16:06'),
(4, 4, 'Rabu', '10:00', 'Tersedia', '2020-01-27 21:16:06', '2020-01-27 21:16:06'),
(5, 5, 'Kamis', '19:00', 'Tersedia', '2020-01-27 21:16:06', '2020-01-27 21:16:06'),
(6, 3, 'Senin', '08:00', 'Tersedia', '2020-01-27 21:16:06', '2020-01-27 21:16:06'),
(7, 3, 'Senin', '07.00', 'Tersedia', '2020-04-26 16:18:44', '2020-04-26 16:18:44'),
(8, 1, 'Senin', '07.00', 'Tersedia', '2020-04-26 16:39:33', '2020-04-26 16:39:33'),
(9, 6, 'Senin', '10.00', 'Tersedia', '2020-04-26 16:39:47', '2020-04-26 16:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapangan`
--

CREATE TABLE `tb_lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `id_gor` int(11) NOT NULL,
  `nomor_lapangan` int(10) NOT NULL,
  `harga` int(30) NOT NULL,
  `jenis` enum('Sintetis','Semen') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lapangan`
--

INSERT INTO `tb_lapangan` (`id_lapangan`, `id_gor`, `nomor_lapangan`, `harga`, `jenis`, `createdAt`, `updatedAt`) VALUES
(1, 1, 2, 45000, 'Sintetis', '2020-01-27 21:17:45', '2020-01-27 21:17:45'),
(2, 2, 1, 35000, 'Sintetis', '2020-01-27 21:17:45', '2020-01-27 21:17:45'),
(3, 3, 1, 30000, 'Semen', '2020-01-27 21:17:45', '2020-01-27 21:17:45'),
(4, 4, 1, 30000, 'Semen', '2020-01-27 21:17:45', '2020-01-27 21:17:45'),
(5, 5, 1, 35000, 'Semen', '2020-01-27 21:17:45', '2020-01-27 21:17:45'),
(6, 3, 1, 30000, 'Semen', '2020-01-27 21:17:45', '2020-01-27 21:17:45'),
(7, 3, 2, 30000, 'Semen', '2020-01-27 21:17:45', '2020-01-27 21:17:45'),
(8, 3, 2, 30000, 'Semen', '2020-01-27 21:17:45', '2020-01-27 21:17:45'),
(9, 3, 1, 30000, 'Semen', '2020-01-27 21:17:45', '2020-01-27 21:17:45'),
(12, 1, 3, 40000, 'Sintetis', '2020-02-22 21:35:15', '2020-02-22 21:35:15'),
(13, 1, 4, 50000, 'Semen', '2020-02-27 09:19:46', '2020-02-27 09:19:46'),
(14, 2, 5, 20000, 'Sintetis', '2020-05-14 10:13:28', '2020-05-14 10:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `status` enum('Menunggu Konfirmasi','Sedang Memesan','Selesai','Batal') NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_pengguna`, `id_lapangan`, `status`, `id_jadwal`, `createdAt`, `updatedAt`) VALUES
(21, 12, 1, 'Batal', 9, '2020-05-14 10:23:08', '2020-05-14 10:23:08'),
(22, 12, 1, 'Batal', 8, '2020-11-25 14:42:07', '2020-11-25 14:42:07'),
(23, 12, 1, 'Batal', 8, '2020-11-25 14:42:30', '2020-11-25 14:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengelola`
--

CREATE TABLE `tb_pengelola` (
  `id_pengelola` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengelola`
--

INSERT INTO `tb_pengelola` (`id_pengelola`, `username`, `email`, `nama_lengkap`, `password`, `alamat`, `no_hp`, `foto`, `createdAt`, `updatedAt`) VALUES
(1, 'supria', 'supriadi@gmail.com', 'supriadi aja', '1234567', 'jalan galau', '08213132324', 'pengelola_20200217_104756.jpg', '2020-01-27 21:18:56', '2020-01-27 21:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `total_saldo` varchar(50) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `nama_lengkap`, `password`, `email`, `alamat`, `no_hp`, `foto`, `no_rekening`, `nama_bank`, `total_saldo`, `createdAt`, `updatedAt`) VALUES
(12, 'zhafif wira', 'apip', '123456', 'apip@gmail.com', 'jalan galau', '082349761346', 'pengguna_20200217_103709.jpg', '61838929', 'BNI', '100000', '2020-01-30 14:26:52', '2020-01-30 14:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_topup`
--

CREATE TABLE `tb_topup` (
  `id_topup` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `status` enum('Pending','Konfirmasi','Batal') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `authKey` varchar(30) NOT NULL,
  `accesToken` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `nama_lengkap`, `password`, `alamat`, `no_hp`, `authKey`, `accesToken`, `foto`, `createdAt`, `updatedAt`) VALUES
(1, 'admin', 'admin1', '123', 'jl.satria', '082345342354', '12qwaszx', '12qwaszx', 'hei.jpg', '2020-01-27 21:19:57', '2020-01-27 21:19:57'),
(2, 'admin2', 'admin2', 'admin12345', 'jl.kapuas', '098232712312', 'zxasqw123', 'zxasqw123', '2.jpg', '2020-01-27 21:19:57', '2020-01-27 21:19:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gor`
--
ALTER TABLE `tb_gor`
  ADD PRIMARY KEY (`id_gor`),
  ADD KEY `id_pengelola` (`id_pengelola`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  ADD PRIMARY KEY (`id_lapangan`),
  ADD KEY `id_gor` (`id_gor`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_lapangan` (`id_lapangan`),
  ADD KEY `tb_pemesanan_ibfk_3` (`id_jadwal`);

--
-- Indexes for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD PRIMARY KEY (`id_pengelola`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_topup`
--
ALTER TABLE `tb_topup`
  ADD PRIMARY KEY (`id_topup`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gor`
--
ALTER TABLE `tb_gor`
  MODIFY `id_gor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  MODIFY `id_pengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_topup`
--
ALTER TABLE `tb_topup`
  MODIFY `id_topup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_gor`
--
ALTER TABLE `tb_gor`
  ADD CONSTRAINT `tb_gor_ibfk_1` FOREIGN KEY (`id_pengelola`) REFERENCES `tb_pengelola` (`id_pengelola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `tb_lapangan` (`id_lapangan`);

--
-- Constraints for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  ADD CONSTRAINT `tb_lapangan_ibfk_1` FOREIGN KEY (`id_gor`) REFERENCES `tb_gor` (`id_gor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `tb_pemesanan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemesanan_ibfk_2` FOREIGN KEY (`id_lapangan`) REFERENCES `tb_lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemesanan_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_topup`
--
ALTER TABLE `tb_topup`
  ADD CONSTRAINT `tb_topup_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
