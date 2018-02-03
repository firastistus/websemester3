-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Feb 2018 pada 19.25
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penduduk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `deleted` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `deleted`, `created_at`) VALUES
(1, 'Superadmin', 'Untuk superadmin', 'active', '2017-05-20'),
(2, 'Dosen', 'Untuk dosen', 'active', '2017-05-14'),
(3, 'pegawai', 'Untuk bagian administrasi', 'active', '2017-05-21'),
(4, 'cleaning', 'Untuk bagian CS', 'active', '2017-05-21'),
(5, 'Admin', 'untuk bagian admin         ', 'active', '2017-05-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `encrypted_password` varchar(100) NOT NULL DEFAULT '',
  `re_encrypted_password` varchar(100) NOT NULL DEFAULT '',
  `fullname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `phone` varchar(15) NOT NULL DEFAULT '',
  `address` text NOT NULL,
  `nik` int(16) DEFAULT NULL,
  `city` varchar(20) NOT NULL DEFAULT '',
  `gender` varchar(20) NOT NULL DEFAULT '',
  `photo` varchar(50) NOT NULL DEFAULT '',
  `role_id` int(2) NOT NULL DEFAULT '0',
  `reset_password_token` varchar(50) NOT NULL DEFAULT '',
  `confirmation_token` varchar(50) NOT NULL DEFAULT '',
  `authentication_token` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `encrypted_password`, `re_encrypted_password`, `fullname`, `birthday`, `phone`, `address`, `nik`, `city`, `gender`, `photo`, `role_id`, `reset_password_token`, `confirmation_token`, `authentication_token`, `status`, `deleted`, `created_at`) VALUES
(1, 'superadmin', 'baztamlho@gmail.com', 'admin', '', 'Superadmin', '1986-06-03', '087822734455', 'cihampelas ', 11223344, '', '', '1', 1, '', '', '', 1, 'deleted', '2017-05-21'),
(2, 'Sarino', 'firastus@gmail.com', 'ahmadjufri', '', 'Sari Noviyani adania', '1998-10-10', '08993882991', 'Cimahi, Rt 005/ 004, Kelurahan Cimahi Selatan', 2147483647, '', 'P', '1', 3, '', '', '', 0, 'active', '2018-02-03'),
(3, 'maulanayusuf', 'maulanamitha@gmail.c', 'maulanayusuf', '', 'Maulana Yusuf', '1992-09-11', '087822214775', 'Kp. Ciburuy, RT/01 RW/05, Desa Cintakarya, Kec. Sindangkerta, Kabupaten Bandung Barat', 12520493, '1', '', '', 3, '', '', '', 0, 'deleted', '2017-05-22'),
(4, 'REDTRUSHa', 'redtrush@gmal.com', '123459', '', 'ASEP BUDIARSA', '1969-02-22', '08122183254', 'lorem ipsum', 111, '', '', '1', 1, '', '', '', 0, 'deleted', '2017-05-28'),
(5, 'sherryl', 'lestarisherry@ymail.', '12345', '', 'sherry lestari', '1993-08-02', '085320047928', 'jl.pasar cililin no.34 cililin bandung barat', 0, '', '', '1', 2, '', '', '', 0, 'deleted', '2017-05-22'),
(6, 'firas2', 'firas@gmail.com', 'firas', '', 'Ahmad Jaelani', '1980-12-16', '083820926796', 'Gunung Batu', 2147483647, '', 'L', '1', 3, '', '', '', 0, 'active', '2018-02-03'),
(7, 'ahmadsofian2', 'ujangsupriatna@gmail.com', 'firas', '', 'Ujang Supriatna', '1988-11-15', '08388212292', 'Babakan Cianjur', 2147483647, '', 'L', '1', 3, '', '', '', 0, 'active', '2018-02-01'),
(8, 'namaku', 'nama@gmail.com', 'anama', '', 'Angelina Jollie', '1987-11-15', '09388291838', 'Pegangsaan Timur No. 10 Jakarta Selatan', 2147483647, 'Jakarta', 'P', '1', 3, '', '', '', 0, 'deleted', '2017-12-16'),
(9, 'ridwan2', 'ridwanridwan@gmail.com', 'RIDWAN', '', 'ahmad ridwan', '1997-01-19', '0889', 'alamat', 2147483647, 'Bogor', 'NaN', '1', 3, '', '', '', 0, 'active', '2018-01-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
