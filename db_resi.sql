-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2021 pada 11.06
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_resi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resi`
--

CREATE TABLE `tb_resi` (
  `id_resi` int(255) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `tgl_penerimaan` varchar(10) NOT NULL,
  `no_pelanggan` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_resi`
--

INSERT INTO `tb_resi` (`id_resi`, `pengirim`, `penerima`, `tgl_penerimaan`, `no_pelanggan`, `status`) VALUES
(3, 'umar', 'umar', '20-20-2002', '23fd3gdd', 1),
(6, 'umar', 'umar', '20-20-2002', '23fd3gdd', 1),
(7, 'umar', 'umar', '20-20-2002', '23fd3gdd', 0),
(8, '8992772315128', '8992772315128', '8992772315', '8992772315128', 0),
(9, 'pengirim', 'penerima', 'tgl_peneri', 'no_pelanggan', 0),
(10, 'pengirim', 'penerima', 'tgl_peneri', 'no_pelanggan', 0),
(11, 'Aceh Barat Daya', 'Cek Paketan', 'Aceh Jaya', 'Aceh Selatan', 0),
(12, 'Aceh Barat Daya', 'Cek Paketan', 'Aceh Jaya', 'Aceh Selatan', 0),
(13, 'Aceh Barat Daya', 'Cek Paketan', 'Aceh Jaya', 'Aceh Selatan', 0),
(14, 'Aceh Barat Daya', 'Cek Paketan', 'Aceh Jaya', 'Aceh Selatan', 0),
(30, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(31, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(32, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(33, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(34, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(35, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(36, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(37, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(38, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(39, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(40, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(41, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(42, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(43, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(44, 'Aceh Barat Daya', 'Fatkul Umar', '2021-01-13', 'Aceh Selatan', 0),
(45, 'Aceh Barat Daya', 'Cek Paketan', '15-01-2021', 'Aceh Selatan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `aktivasi` int(1) NOT NULL DEFAULT 0,
  `url_short` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `password`, `name`, `foto`, `aktivasi`, `url_short`) VALUES
(15, 'fatkulumar@gmail.com', '$2y$10$hbWvfxZT.fBuLUXzYwQEhuMf3k8iFdhTYJ8XX662o7U65jhd05wS6', 'Fatkul Umar', '', 0, 'pEjble1pfx$bp1CKtsZ2bfk2Vq5/J$TvsSUNt$uyFCI1Ey3oi0nyu77fZrBb'),
(16, 'fatkulumar@gmail.com', '$2y$10$Q2n/2hpS1zDFErCznThayehpP4lgEyCEWFqah18UeBoWTGo2sgfxy', 'Fatkul Umar', '', 0, 'v0eN$2DwMye8TDqz$l5TZIR1.SaTVhs$bp2fD3gc.IgOyvl82fLxnq1rtJHp');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_resi`
--
ALTER TABLE `tb_resi`
  ADD PRIMARY KEY (`id_resi`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_resi`
--
ALTER TABLE `tb_resi`
  MODIFY `id_resi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
