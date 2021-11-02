-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Nov 2021 pada 10.29
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `harga` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `email`, `harga`, `penerbit`, `gambar`) VALUES
(1, 'Problem Solving 101', 'Ken Watanabe', 'ken_watanabe@outlook.com', 'Rp 30.000', 'Elex Media Komputindo', '5dc18b87e0112.jpg'),
(2, 'Sebuah Seni untuk Bersikap Bodo Amat', 'Mark Manson', 'mark_manson@gmail.com', 'Rp 53.600', 'Gramedia Widiasarana Indonesia', 'sebuah-seni-untuk-bersikap-bodo-amat.jpg'),
(3, 'Filosofi Teras', 'Henry Manampiring', 'henry_manampiring@yahoo.com', 'Rp 70.560', 'Penerbit Buku Kompas', 'filosofi-teras.jpg'),
(4, 'Sapiens', 'Yuval Noah Harari', 'yuvalnoah@rocketmail.com', 'Rp 82.800', 'Kepustakaan Populer Gramedia', 'homo-sapiens.jpg'),
(5, 'Homo Deus', 'Yuval Noah Harari', 'yuvalnoah@rocketmail.com', 'Rp 110.000', 'Pustaka Alvabet Pt / Lisawa Mitra Utama Cv', 'homo-deus.jpg'),
(32, 'Madilog', 'Tan Malaka', 'tanmalaka@gmail.com', 'Rp 110.000', 'Gramedia', '5dc1867046761.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'JDJ5JDEwJEVEUTA3RmxzUjV2QkJINFBVWC8vME9LWThES05tV0tCck5mL2dzMVRLR2tZOTBINzdXcXEy'),
(2, 'lifz', '$2y$10$G/UxO7EXcW3./L6iP2rHZ.oj.GrzvBE8pDhCwTIL7mBYsKOo56H9y'),
(3, 'sec', '$2y$10$IVpbO1SY/LRrBT0Q85w6Seu3NjClw/xRUgI2XFSJ/479OKVF9qza.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
