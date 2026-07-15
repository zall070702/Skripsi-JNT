-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2021 pada 02.02
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daily`
--

CREATE TABLE `daily` (
  `id_daily` int(11) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `isu` text NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `device` varchar(30) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daily`
--

INSERT INTO `daily` (`id_daily`, `dept`, `isu`, `kategori`, `device`, `tgl_lapor`, `waktu`, `tgl_selesai`, `status`, `keterangan`, `solusi`) VALUES
(0, 'Plant', 'Hold', '', 'Printer', '0000-00-00', '3 Bari', '0000-00-00', '', 'Tinta', 'Penggantian tinta');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id_daily`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
