-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2024 pada 17.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bakat`
--

CREATE TABLE `bakat` (
  `id_bakat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `klerikal` float NOT NULL,
  `spasial` float NOT NULL,
  `mekanik` float NOT NULL,
  `bahasa` float NOT NULL,
  `verbal` float NOT NULL,
  `kuantitatif` float NOT NULL,
  `penalaran` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bakat`
--

INSERT INTO `bakat` (`id_bakat`, `id_user`, `klerikal`, `spasial`, `mekanik`, `bahasa`, `verbal`, `kuantitatif`, `penalaran`) VALUES
(1, 2, 63, 35, 43, 40, 51, 35, 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_bakat`
--

CREATE TABLE `b_bakat` (
  `id_batas` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `klerikal` float NOT NULL,
  `spasial` float NOT NULL,
  `mekanik` float NOT NULL,
  `bahasa` float NOT NULL,
  `verbal` float NOT NULL,
  `kuantitatif` float NOT NULL,
  `penalaran` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `b_bakat`
--

INSERT INTO `b_bakat` (`id_batas`, `kode`, `klerikal`, `spasial`, `mekanik`, `bahasa`, `verbal`, `kuantitatif`, `penalaran`) VALUES
(1, 'r1', 50, 70, 90, 50, 20, 80, 30),
(2, 'r2', 20, 60, 50, 60, 50, 80, 30),
(3, 'r3', 50, 10, 30, 80, 80, 70, 40),
(4, 'r4', 70, 30, 50, 80, 80, 70, 70),
(5, 'r5', 70, 10, 30, 60, 80, 40, 90),
(6, 'r6', 20, 10, 30, 60, 30, 20, 90),
(7, 'r7', 20, 10, 30, 20, 80, 70, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_raport`
--

CREATE TABLE `b_raport` (
  `id_batas` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `bahasa` float NOT NULL,
  `logika` float NOT NULL,
  `sains` float NOT NULL,
  `praktek` float NOT NULL,
  `sosial` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `b_raport`
--

INSERT INTO `b_raport` (`id_batas`, `kode`, `bahasa`, `logika`, `sains`, `praktek`, `sosial`) VALUES
(1, 'r1', 60, 80, 80, 80, 60),
(2, 'r2', 70, 0, 80, 70, 60),
(3, 'r3', 70, 80, 60, 70, 80),
(4, 'r4', 80, 80, 60, 70, 80),
(5, 'r5', 80, 70, 60, 60, 80),
(6, 'r6', 80, 60, 60, 70, 80),
(7, 'r7', 75, 75, 70, 60, 75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `kode`, `fakultas`) VALUES
(1, 'r1', 'Teknik'),
(2, 'r2', 'Matematika dan Sains'),
(3, 'r3', 'Ekonomi/Manajemen'),
(4, 'r4', 'Psikologi '),
(5, 'r5', 'Sospol/Hukum/Komunikasi (FISIP)'),
(6, 'r6', 'Sastra/Seni/Budaya'),
(7, 'r7', 'Administrasi/Sekretaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Manajemen Perkantoran'),
(2, 'Akuntansi'),
(3, 'Bisnis Digital'),
(4, 'Desain dan Produksi Busana'),
(5, 'Seni Tari'),
(6, 'Tata Kecantikan Kulit dan Rambut'),
(8, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterampilan`
--

CREATE TABLE `keterampilan` (
  `id_keterampilan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bahasa` float NOT NULL,
  `logika` float NOT NULL,
  `sains` float NOT NULL,
  `praktek` float NOT NULL,
  `sosial` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keterampilan`
--

INSERT INTO `keterampilan` (`id_keterampilan`, `id_user`, `bahasa`, `logika`, `sains`, `praktek`, `sosial`) VALUES
(1, 2, 83, 81, 81, 85, 86);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akhir`
--

CREATE TABLE `nilai_akhir` (
  `id_akhir` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `n_pengetahuan` float NOT NULL,
  `n_keterampilan` float NOT NULL,
  `n_bakat` float NOT NULL,
  `n_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_akhir`
--

INSERT INTO `nilai_akhir` (`id_akhir`, `id_user`, `id_jurusan`, `id_fakultas`, `n_pengetahuan`, `n_keterampilan`, `n_bakat`, `n_akhir`) VALUES
(1, 2, 1, 1, 5.22222, 5.22222, 3.43333, 14.3778),
(2, 2, 1, 2, 3.5, 3.5, 3.77778, 11.0278),
(3, 2, 1, 3, 5.44444, 5.44444, 3.75, 15.1389),
(4, 2, 1, 4, 5.38889, 5.38889, 3.75, 14.7778),
(5, 2, 1, 5, 5.33333, 5.33333, 3.72222, 14.8889),
(6, 2, 1, 6, 5.33333, 5.33333, 3.03333, 14.2),
(7, 2, 1, 7, 5.16667, 5.16667, 3.13333, 14.9667);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id_pengetahuan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `bahasa` float DEFAULT NULL,
  `logika` float DEFAULT NULL,
  `sains` float DEFAULT NULL,
  `praktek` float DEFAULT NULL,
  `sosial` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`id_pengetahuan`, `id_user`, `bahasa`, `logika`, `sains`, `praktek`, `sosial`) VALUES
(1, 2, 84, 80, 80, 85, 86);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_jurusan` int(10) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `nisn`, `jenis_kelamin`, `tanggal_lahir`, `id_jurusan`, `sekolah`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0', 'Laki-laki', '2024-08-03', 8, '-', 1),
(2, 'siswa', 'bcd724d15cde8c47650fda962968f102', 'siswa', '0', 'Laki-laki', '2024-08-03', 1, '-', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bakat`
--
ALTER TABLE `bakat`
  ADD PRIMARY KEY (`id_bakat`);

--
-- Indeks untuk tabel `b_bakat`
--
ALTER TABLE `b_bakat`
  ADD PRIMARY KEY (`id_batas`);

--
-- Indeks untuk tabel `b_raport`
--
ALTER TABLE `b_raport`
  ADD PRIMARY KEY (`id_batas`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `keterampilan`
--
ALTER TABLE `keterampilan`
  ADD PRIMARY KEY (`id_keterampilan`);

--
-- Indeks untuk tabel `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD PRIMARY KEY (`id_akhir`);

--
-- Indeks untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bakat`
--
ALTER TABLE `bakat`
  MODIFY `id_bakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `b_bakat`
--
ALTER TABLE `b_bakat`
  MODIFY `id_batas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `b_raport`
--
ALTER TABLE `b_raport`
  MODIFY `id_batas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `keterampilan`
--
ALTER TABLE `keterampilan`
  MODIFY `id_keterampilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  MODIFY `id_akhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
