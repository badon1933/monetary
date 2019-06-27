-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2019 pada 14.52
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paketlebaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_paket`
--

CREATE TABLE `jenis_paket` (
  `id` int(11) NOT NULL,
  `jenis_paket` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_paket`
--

INSERT INTO `jenis_paket` (`id`, `jenis_paket`) VALUES
(1, 'Paket Anak'),
(2, 'Paket 1'),
(3, 'Paket 2'),
(4, 'Paket 3'),
(5, 'Paket 4'),
(6, 'Paket 5'),
(7, 'Paket 6'),
(8, 'Paket Daging 1'),
(9, 'Paket Daging 2'),
(10, 'Paket Daging 3'),
(11, 'Paket Daging 4'),
(12, 'Paket Daging 5'),
(13, 'Paket Emas 1'),
(14, 'Paket Emas 2'),
(15, 'Paket Emas 3'),
(16, 'Paket Emas 4'),
(17, 'Paket Emas 5'),
(18, 'Paket Emas 6'),
(19, 'Paket Emas 7'),
(20, 'Paket Emas 8'),
(21, 'Paket Emas 9'),
(22, 'Paket Emas 10'),
(23, 'Paket Nabung 1RB'),
(24, 'Paket Nabung 2RB'),
(25, 'Paket Nabung 3RB'),
(26, 'Paket Nabung 4RB'),
(27, 'Paket Nabung 5RB'),
(28, 'Paket Nabung 6RB'),
(29, 'Paket Nabung 7RB'),
(30, 'Paket Nabung 8RB'),
(31, 'Paket Nabung 9RB'),
(32, 'Paket Nabung 10RB'),
(33, 'Paket Nabung 11RB'),
(34, 'Paket Nabung 12RB'),
(35, 'Paket Nabung 13RB'),
(36, 'Paket Nabung 14RB'),
(37, 'Paket Nabung 15RB'),
(38, 'Paket Nabung 20RB'),
(39, 'Paket Nabung 25RB'),
(40, 'Paket Nabung 50RB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kolektor`
--

CREATE TABLE `kolektor` (
  `id` int(11) NOT NULL,
  `nama_kolektor` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kolektor`
--

INSERT INTO `kolektor` (`id`, `nama_kolektor`, `alamat`) VALUES
(12, 'Pak Gomber', 'Tegal Junti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama_peserta` varchar(128) NOT NULL,
  `jenis_paket` varchar(128) NOT NULL,
  `kolektor` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nama_peserta`, `jenis_paket`, `kolektor`, `alamat`) VALUES
(34, 'Mas gomber', '1', '12', 'Tegal Junti'),
(35, 'Dek Gomber', '1', '12', 'Tegal Junti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `jenis_paket` int(11) NOT NULL,
  `jumlah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `jenis_paket`, `jumlah`) VALUES
(1, 'Fanta', 1, '1btl'),
(2, 'Coca-Cola', 1, '1btl'),
(3, 'Sprite', 1, '1btl'),
(4, 'Pocari Sweat', 1, '1btl'),
(5, 'Susu Ultra', 1, '1bh'),
(6, 'Susu Bendera', 1, '1bh'),
(7, 'Buavita', 1, '1bh'),
(8, 'Freshtea', 1, '1bh'),
(9, 'Fruitea', 1, '1bh'),
(10, 'Milo', 1, '1bh'),
(11, 'Nutrisari', 1, '1bh'),
(12, 'Coco Crunch', 1, '1bh'),
(13, 'Tango', 1, '1bh'),
(14, 'Trenz', 1, '1bh'),
(15, 'Goodtime', 1, '1bh'),
(16, 'Genji', 1, '1bh'),
(17, 'Lemonia', 1, '1bh'),
(18, 'Oreo', 1, '1bh'),
(19, 'Ritz', 1, '1bh'),
(20, 'Potabee', 1, '1h'),
(21, 'Taro', 1, '1bh'),
(22, 'Qtela', 1, '1bh'),
(23, 'Smax', 1, '1bh'),
(24, 'Serena Snack', 1, '1bh'),
(25, 'Fox', 1, '1klg'),
(26, 'Silverqueen', 1, '1bh'),
(27, 'Karanata de Coco', 1, '1bh'),
(28, 'Wong Coco Jelly', 1, '1bh'),
(29, 'Popmie', 1, '1bh'),
(30, 'Uang', 1, 'Rp. 50.000'),
(31, 'Daging Sapi', 2, '3,5kg'),
(32, 'Monde Besar', 2, '1klg'),
(33, 'Nissin Yellow', 2, '1klg'),
(34, 'Serena Roll Mini', 2, '1klg'),
(35, 'Kacang Kupas', 2, '2bks'),
(36, 'ABC Special', 2, '1btl'),
(37, 'ABC Orange', 2, '1btl'),
(38, 'Kecap ABC Refill', 2, '600ml'),
(39, 'Minyak Goreng', 2, '2ltr'),
(40, 'Fanta', 2, '1,5ltr'),
(41, 'Coca-Cola', 2, '1,5ltr'),
(42, 'Kentang', 2, '2kg'),
(43, 'Kerupuk Udang', 2, '1bks'),
(44, 'Uang', 2, 'Rp. 2.000.000'),
(45, 'Daging Sapi', 3, '2,5kg'),
(46, 'Monde Besar', 3, '1klg'),
(47, 'Nissin Yellow', 3, '1klg'),
(48, 'Serena Roll Mini', 3, '1klg'),
(49, 'Kacang Kupas', 3, '2bks'),
(50, 'ABC Special', 3, '1btl'),
(51, 'ABC Orange', 3, '1btl'),
(52, 'Kecap ABC Refill', 3, '600ml'),
(53, 'Minyak Goreng', 3, '2ltr'),
(54, 'Fanta', 3, '1,5ltr'),
(55, 'Coca-Cola', 3, '1,5ltr'),
(56, 'Kentang', 3, '2kg'),
(57, 'Kerupuk Udang', 3, '1bks'),
(58, 'Uang', 3, 'Rp. 1.000.000'),
(59, 'Daging Sapi', 4, '2,5kg'),
(60, 'Monde Besar', 4, '1klg'),
(61, 'Nissin Yellow', 4, '1klg'),
(62, 'Serena Roll Mini', 4, '1klg'),
(63, 'Kacang Kupas', 4, '2bks'),
(64, 'ABC Special', 4, '1btl'),
(65, 'ABC Orange', 4, '1btl'),
(66, 'Kecap ABC Refill', 4, '600ml'),
(67, 'Minyak Goreng', 4, '2ltr'),
(68, 'Fanta', 4, '1,5ltr'),
(69, 'Coca-Cola', 4, '1,5ltr'),
(70, 'Kentang', 4, '2kg'),
(71, 'Kerupuk Udang', 4, '1bks'),
(72, 'Uang', 4, 'Rp. 700.000'),
(73, 'Daging Sapi', 5, '2kg'),
(74, 'Monde Besar', 5, '1klg'),
(75, 'Serena Roll Mini', 5, '1klg'),
(76, 'Kacang Kupas', 5, '2bks'),
(77, 'ABC Special', 5, '1btl'),
(78, 'ABC Orange', 5, '1btl'),
(79, 'Minyak Goreng', 5, '2ltr'),
(80, 'Kecap Bango Refill', 5, '600ml'),
(81, 'Fanta', 5, '1,5ltr'),
(82, 'Coca-Cola', 5, '1,5ltr'),
(83, 'Sprite', 5, '1,5ltr'),
(84, 'Kerupuk Udang', 5, '1bks'),
(85, 'Emping', 5, '1/4kg'),
(86, 'Terigu', 5, '2kg'),
(87, 'Gula Putih', 5, '2kg'),
(88, 'Blueband', 5, '4bks'),
(89, 'Beras', 5, '4ltr'),
(90, 'Susu Bendera', 5, '1klg'),
(91, 'Uang', 5, 'Rp. 150.000'),
(92, 'Daging Sapi', 6, '2,5kg'),
(93, 'Monde Besar', 6, '1klg'),
(94, 'Nissin Yellow', 6, '1klg'),
(96, 'Kacang Kupas', 6, '2bks'),
(97, 'ABC Special', 6, '1btl'),
(98, 'ABC Orange', 6, '1btl'),
(99, 'Minyak Goreng', 6, '2ltr'),
(100, 'Kecap ABC Refill', 6, '600ml'),
(101, 'Fanta', 6, '1,5ltr'),
(102, 'Sprite', 6, '1,5ltr'),
(103, 'Coca-Cola', 6, '1,5ltr'),
(104, 'Kerupuk Udang', 6, '1bks'),
(105, 'Kentang', 6, '2kg'),
(106, 'Uang', 6, 'Rp. 100.000'),
(107, 'Daging Sapi', 7, '2kg'),
(108, 'Khongguan Besar', 7, '1klg'),
(109, 'Nissin Yellow', 7, '1klg'),
(110, 'Fanta', 7, '1,5ltr'),
(111, 'Sprite', 7, '1,5ltr'),
(112, 'ABC Special', 7, '1btl'),
(113, 'ABC Orange', 7, '1btl'),
(114, 'Kecap ABC Refill', 7, '600ml'),
(115, 'Kerupuk Udang', 7, '1bks'),
(116, 'Mie Kuning', 7, '1pack'),
(117, 'Kentang', 7, '2kg'),
(118, 'Kacang Kupas', 7, '2bks'),
(119, 'Minyak Goreng', 7, '2ltr'),
(120, 'Uang', 7, 'Rp. 50.000'),
(121, 'Daging Sapi', 8, '2kg'),
(122, 'Emas', 9, '1gram');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setoran`
--

CREATE TABLE `setoran` (
  `id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `setoran` int(128) NOT NULL,
  `total_setoran` int(128) NOT NULL,
  `tanggal_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setoran`
--

INSERT INTO `setoran` (`id`, `id_peserta`, `setoran`, `total_setoran`, `tanggal_update`) VALUES
(51, 34, 5000, 5000, 1561384339),
(52, 34, 5000, 10000, 1561384550),
(53, 35, 5000, 5000, 1561384647),
(54, 35, 5000, 10000, 1561384657),
(55, 34, 5000, 15000, 1561387621),
(56, 35, 2000, 12000, 1561387509),
(57, 34, 2000, 17000, 1561387639);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(4, 'Muhammad Ramadhan Firdaus', '15523049@students.uii.ac.id', '$2y$10$1VzMVXr6wRL0kEIQ9pOiZ.VQxIrPGdS1DYB7UtsizuqXVuEBOOIs.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_paket`
--
ALTER TABLE `jenis_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kolektor`
--
ALTER TABLE `kolektor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_paket`
--
ALTER TABLE `jenis_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `kolektor`
--
ALTER TABLE `kolektor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `setoran`
--
ALTER TABLE `setoran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
