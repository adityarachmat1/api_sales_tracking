-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jun 2019 pada 07.08
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_tracking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_aktivitas`
--

CREATE TABLE `data_aktivitas` (
  `id` int(10) NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `hasil_aktivitas` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `type_aktivitas` varchar(10) NOT NULL,
  `date_record` varchar(100) NOT NULL,
  `assign_by` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `type_transfer` varchar(100) NOT NULL,
  `akun_bank` varchar(100) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `tanggal_transfer` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `type_account` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` varchar(25) NOT NULL,
  `nomor_hanphone` varchar(16) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(16) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `cabang`, `email`, `password`, `jenis_kelamin`, `type_account`, `nama`, `alamat`, `tgl_lahir`, `nomor_hanphone`, `type`, `status`, `create_at`) VALUES
(1, 'JAKARTA', 'Aditrachmat1@gmail.com', '123456', 'Pria', '1', 'Aditya Rachmat Djauhari', 'JAKARTA Timur', '04-07-1994', '08923424226', 'Admin', '', '2019-06-18 04:41:36'),
(2, '', 'Ole@gmail.com', '', 'Pria', '2', 'Donatur uhuy', 'Jalan Jakarta ', '28-10-1992', '08767777777', 'Donatur', '', '2019-06-22 05:08:03'),
(3, '', 'kilom@gmail.com', '', 'Pria', '2', 'Kilomanjaro', 'Jakarta selatan', '', '087877622222', 'Donatur', '', '2019-06-19 08:04:02'),
(4, '', 'mop@gmail.com', '', 'Perempuan', '2', 'Marsha Kimberly', 'Jakarta Pusat', '', '085623423111', 'Donatur', '', '2019-06-22 05:08:09'),
(5, 'Bandung', 'sales@gmail.com', '123456', 'pria', '3', 'Sales Account', 'Jakarta', '07-05-1889', '0899999', 'Sales Marketing', '', '2019-06-17 07:40:00'),
(6, 'jakarta', 'admin@gmail.com', '123456', 'pria', '1', 'admin aplikasi', 'Jakarta', '08 juni 2016', '0899999', 'Admin', '', '2019-06-17 07:40:00'),
(7, '', 'syae@gmail.com', '', 'Pria', '2', 'Syaefullah', 'Kalimantan', '03-02-1972', '08552321564', 'Donatur', '', '2019-06-22 05:08:13'),
(8, '', 'gerry@gmail.com', '', 'Pria', '2', 'Gerry Salut', 'Bandung', '29-06-1989', '08569584774', 'Donatur', '', '2019-06-22 05:08:15'),
(9, 'Bekasi', 'ferr@gmail.com', '123456', 'Pria', '3', 'Ferry Hukir', 'Bekasi', '28-02-1982', '08562315487', 'Sales Marketing', '', '2019-06-17 08:11:22'),
(12, 'admin', 'admin', '123456', 'Pria', '1', 'admin', 'admin', '17-06-2019', '08956522222', 'Admin', '', '2019-06-19 03:13:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_aktivitas`
--
ALTER TABLE `data_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_aktivitas`
--
ALTER TABLE `data_aktivitas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
