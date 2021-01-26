-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2021 pada 20.22
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_a121806055`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `npp` varchar(16) NOT NULL,
  `nama_dosen` char(30) NOT NULL,
  `homebase` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`npp`, `nama_dosen`, `homebase`) VALUES
('0686.11.1991.011', 'Aris Nurhindarto, M.kom', 'A12'),
('0686.11.1992.026', 'Florentina Esti Nilawati, SH,', 'A12'),
('0686.11.1993.03', 'Sasono Wibowo, SE, M.Kom', 'A12'),
('0686.11.1996.080', 'Asih Rohmani, M.kom', 'A12'),
('0686.11.1997.108', 'Budi WIdjajanto', 'A12'),
('0686.11.1997.128', 'Lalang Erawan, M.kom', 'A12'),
('0686.11.1997.136', 'Acun Kardianawati, M.Kom', 'A12'),
('0686.11.1997.138', 'Dr. Pujiono, S.Si., M.Kom	', 'A12'),
('0686.11.1998.152', 'MY. Teguh Sulistyono, M.Kom	', 'A12'),
('0686.11.2014.584', 'Ramadhan Rakhmat Sani M.Kom', 'A12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kultawar`
--

CREATE TABLE `kultawar` (
  `idkultawar` int(11) NOT NULL,
  `id_matkul` char(10) DEFAULT NULL,
  `npp` char(16) DEFAULT NULL,
  `klp` varchar(10) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jamkul` char(11) DEFAULT NULL,
  `ruang` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kultawar`
--

INSERT INTO `kultawar` (`idkultawar`, `id_matkul`, `npp`, `klp`, `hari`, `jamkul`, `ruang`) VALUES
(2, 'A12.A12', '0686.11.1997.128', '', 'Senin', '', ''),
(13, 'A12.56201', '0686.11.1997.136', 'A12.6204', 'Senin', '07.00-08.40', 'H.4.3'),
(14, 'A12.56501', '0686.11.1996.080', 'A12.6505', 'Kamis', '12.30-14.10', 'H.5.2'),
(16, 'A12.56201', '0686.11.1997.136', 'A12.6201', 'Senin', '07.00-08.40', 'H.4.4'),
(17, 'A12.56705', '0686.11.1998.152', 'A12.6706', 'Jumat', '14.10-16.20', 'H.5.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makul`
--

CREATE TABLE `makul` (
  `id_matkul` char(10) NOT NULL,
  `nama_matkul` varchar(50) DEFAULT NULL,
  `sks` int(2) DEFAULT NULL,
  `jenis` char(3) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makul`
--

INSERT INTO `makul` (`id_matkul`, `nama_matkul`, `sks`, `jenis`, `semester`) VALUES
('A12.56101', 'Matematika Diskrit', 3, 'T', '1'),
('A12.56102', 'Pengantar Teknologi Informasi', 4, 'T/P', '1'),
('A12.56103', 'Sistem Informasi', 3, 'T', '1'),
('A12.56104', 'Pengantar Manajemen', 2, 'T', '1'),
('A12.56105', 'Ketrampilan Interpersonal', 2, 'T', '1'),
('A12.56106', 'Bahasa Inggris I', 2, 'T', '1'),
('A12.56107', 'Dasar Akuntansi', 3, 'T', '1'),
('A12.56201', 'Algoritma dan Pemrograman I', 4, 'T/P', '2'),
('A12.56202', 'Sistem Informasi Akuntansi', 3, 'T', '2'),
('A12.56203', 'Pendidikan Agama', 2, 'T', '2'),
('A12.56204', 'Bahasa Inggris II', 2, 'T', '2'),
('A12.56205', 'Pengantar Bisnis', 2, 'T', '2'),
('A12.56206', 'Matematika Bisnis', 3, 'T', '2'),
('A12.56207', 'Sistem Informasi Manajemen', 3, 'T', '2'),
('A12.56301', 'Analisa Proses Bisnis', 3, 'T', '3'),
('A12.56302', 'Algoritma dan Pemrograman II', 4, 'T/P', '3'),
('A12.56303', 'Pemrograman Web', 4, 'T/P', '3'),
('A12.56304', 'Sistem Operasi', 3, 'T', '3'),
('A12.56305', 'Jaringan Komputer', 4, 'T', '3'),
('A12.56401', 'Basis Data', 3, 'T', '4'),
('A12.56402', 'Pemrograman Berorientasi Obyek', 4, 'T/P', '4'),
('A12.56403', 'Pemrograman Web Lanjut', 2, 'P', '4'),
('A12.56404', 'Analisa dan Perancangan Sistem Informasi I', 3, 'T', '4'),
('A12.56406', 'Konsep e-Bisnis', 4, 'T', '4'),
('A12.56501', 'Analisa dan Perancangan Sistem Informasi II', 3, 'T', '5'),
('A12.56502', 'Kewirausahaan', 2, 'T', '5'),
('A12.56503', 'Analisa dan Perancangan Sistem Informasi II', 3, 'T', '5'),
('A12.56504', 'Manajemen Sains', 3, 'T', '5'),
('A12.56505', 'Sistem Basis Data', 3, 'T', '5'),
('A12.56506', 'Interaksi Manusia dan Komputer', 2, 'T', '5'),
('A12.56507', 'Pengelolaan Hubungan Pelanggan', 3, 'T', '5'),
('A12.56601', 'Data Mining dan Data Warehouse', 3, 'T', '6'),
('A12.56602', 'Analisa Kinerja Sistem', 3, 'T', '6'),
('A12.56603', 'Sistem Pendukung Keputusan', 3, 'T', '6'),
('A12.56604', 'Perencanaan Strategis Sistem Informasi', 2, 'T', '6'),
('A12.56606', 'Perencanaan Sumber Daya Perusahaan', 3, 'T', '6'),
('A12.56607', 'Bisnis Cerdas', 4, 'T', '5'),
('A12.56608', 'Perancangan dan Pengembangan Sistem Informasi', 4, 'T', '5'),
('A12.56701', 'Pendidikan Kewarganegaraan', 2, 'T', '7'),
('A12.56702', 'Metodologi Penelitian', 2, 'T', '7'),
('A12.56703', 'Manajemen Rantai Pasok', 3, 'T', '7'),
('A12.56704', 'Manajemen Proyek', 3, 'T', '7'),
('A12.56705', 'Proteksi Aset Informasi', 3, 'T', '7'),
('A12.56706', 'Kerja Praktek', 2, 'T', '7'),
('A12.56707', 'Aplikasi e-Bisnis', 4, 'T', '7'),
('A12.56708', 'Tata Kelola dan Audit Sistem Informasi', 4, 'T', '7'),
('A12.56801', 'Bahasa Indonesia', 2, 'T', '8'),
('A12.56802', 'Etika Profesi', 2, 'T', '8'),
('A12.56803', 'Bimbingan Karir', 2, 'T', '8'),
('A12.56804', 'Tugas Akhir', 6, 'T', '8'),
('A12.A12.56', 'Implementasi dan Pengujian Sistem', 2, 'T', '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

CREATE TABLE `mhs` (
  `id` int(11) NOT NULL,
  `nim` char(14) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`id`, `nim`, `nama`, `email`, `foto`) VALUES
(21, 'A12.2018.06055', 'Wahyu Febriyantno Utomo', 'wahyufebri69@gmail.com', 'Screenshot 2021-01-02 010845.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`npp`);

--
-- Indeks untuk tabel `kultawar`
--
ALTER TABLE `kultawar`
  ADD PRIMARY KEY (`idkultawar`);

--
-- Indeks untuk tabel `makul`
--
ALTER TABLE `makul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `mhs`
--
ALTER TABLE `mhs`
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
-- AUTO_INCREMENT untuk tabel `kultawar`
--
ALTER TABLE `kultawar`
  MODIFY `idkultawar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
