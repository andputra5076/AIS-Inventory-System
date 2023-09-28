-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Jul 2023 pada 18.51
-- Versi server: 5.7.24
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ais`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_alatac`
--

CREATE TABLE `aset_alatac` (
  `id_alatac` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_alatac` varchar(255) NOT NULL,
  `merek_alatac` varchar(255) NOT NULL,
  `tipe_alatac` varchar(255) NOT NULL,
  `spesifikasi_alatac` varchar(255) NOT NULL,
  `jenis_alatac` varchar(255) NOT NULL,
  `kode_alatac` varchar(255) DEFAULT '09',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_alatkantor`
--

CREATE TABLE `aset_alatkantor` (
  `id_alatkantor` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_alatkantor` varchar(255) NOT NULL,
  `merek_alatkantor` varchar(255) NOT NULL,
  `tipe_alatkantor` varchar(255) NOT NULL,
  `spesifikasi_alatkantor` varchar(255) NOT NULL,
  `jenis_alatkantor` varchar(255) NOT NULL,
  `kode_alatkantor` varchar(255) DEFAULT '05',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_alatlift`
--

CREATE TABLE `aset_alatlift` (
  `id_alatlift` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_alatlift` varchar(255) NOT NULL,
  `merek_alatlift` varchar(255) NOT NULL,
  `tipe_alatlift` varchar(255) NOT NULL,
  `spesifikasi_alatlift` varchar(255) NOT NULL,
  `jenis_alatlift` varchar(255) NOT NULL,
  `kode_alatlift` varchar(255) DEFAULT '10',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_alatlistrik`
--

CREATE TABLE `aset_alatlistrik` (
  `id_alatlistrik` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_alatlistrik` varchar(255) NOT NULL,
  `merek_alatlistrik` varchar(255) NOT NULL,
  `tipe_alatlistrik` varchar(255) NOT NULL,
  `spesifikasi_alatlistrik` varchar(255) NOT NULL,
  `jenis_alatlistrik` varchar(255) NOT NULL,
  `kode_alatlistrik` varchar(255) DEFAULT '07',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_alatmedis`
--

CREATE TABLE `aset_alatmedis` (
  `id_alatmedis` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_alatmedis` varchar(255) NOT NULL,
  `merek_alatmedis` varchar(255) NOT NULL,
  `tipe_alatmedis` varchar(255) NOT NULL,
  `spesifikasi_alatmedis` varchar(255) NOT NULL,
  `jenis_alatmedis` varchar(255) NOT NULL,
  `kode_alatmedis` varchar(255) DEFAULT '11',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_alatmekanik`
--

CREATE TABLE `aset_alatmekanik` (
  `id_alatmekanik` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_alatmekanik` varchar(255) NOT NULL,
  `merek_alatmekanik` varchar(255) NOT NULL,
  `tipe_alatmekanik` varchar(255) NOT NULL,
  `spesifikasi_alatmekanik` varchar(255) NOT NULL,
  `jenis_alatmekanik` varchar(255) NOT NULL,
  `kode_alatmekanik` varchar(255) DEFAULT '08',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_alattelekomunikasi`
--

CREATE TABLE `aset_alattelekomunikasi` (
  `id_alattelekomunikasi` int(255) NOT NULL,
  `no_aset` int(255) DEFAULT NULL,
  `nama_alattelekomunikasi` varchar(255) NOT NULL,
  `merek_alattelekomunikasi` varchar(255) NOT NULL,
  `tipe_alattelekomunikasi` varchar(255) NOT NULL,
  `spesifikasi_alattelekomunikasi` text NOT NULL,
  `jenis_alattelekomunikasi` varchar(255) NOT NULL,
  `kode_alattelekomunikasi` varchar(255) DEFAULT '04',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_gedungdanbangunan`
--

CREATE TABLE `aset_gedungdanbangunan` (
  `id_gedungdanbangunan` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_gedungdanbangunan` varchar(255) NOT NULL,
  `nama_objek` varchar(255) NOT NULL,
  `jenis_gedungdanbangunan` varchar(255) NOT NULL,
  `kode_aset_gedungdanbangunan` varchar(255) DEFAULT '02',
  `kondisi` text NOT NULL,
  `luas_gedungdanbangunan` varchar(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `sertifikat_kepemilikan` varchar(255) NOT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_kendaraandanambulance`
--

CREATE TABLE `aset_kendaraandanambulance` (
  `id_kendaraandanambulance` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_kendaraandanambulance` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `merek_kendaraan` varchar(255) NOT NULL,
  `kode_aset_kendaraandanambulance` varchar(255) DEFAULT '03',
  `nopol` varchar(255) NOT NULL,
  `norangka` varchar(255) NOT NULL,
  `nomesin` varchar(255) NOT NULL,
  `nobpkb` varchar(255) NOT NULL,
  `kepemilikan_stnk` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_komputer`
--

CREATE TABLE `aset_komputer` (
  `id_komputer` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_komputer` varchar(255) NOT NULL,
  `merek_komputer` varchar(255) NOT NULL,
  `tipe_komputer` varchar(255) NOT NULL,
  `spesifikasi_komputer` text NOT NULL,
  `jenis_komputer` varchar(255) NOT NULL,
  `kode_komputer` varchar(255) DEFAULT '06',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_tanah`
--

CREATE TABLE `aset_tanah` (
  `id_tanah` int(255) NOT NULL,
  `no_aset` int(255) NOT NULL,
  `nama_tanah` varchar(255) NOT NULL,
  `nama_objek` varchar(255) NOT NULL,
  `jenis_tanah` varchar(255) DEFAULT NULL,
  `kode_aset_tanah` varchar(255) DEFAULT '01',
  `kondisi` text NOT NULL,
  `luas_tanah` varchar(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `sertifikat_kepemilikan` varchar(255) NOT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aset_tanah`
--

INSERT INTO `aset_tanah` (`id_tanah`, `no_aset`, `nama_tanah`, `nama_objek`, `jenis_tanah`, `kode_aset_tanah`, `kondisi`, `luas_tanah`, `satuan`, `nilaiperolehan`, `sertifikat_kepemilikan`, `tanggal_aset`, `image`, `alamat`, `lat`, `long`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_bidang`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`) VALUES
(1, 5000001, 'Aset Tetap Tanah', 'Tanah Lapangan Tenis', 'Tanah Inseptisol', '01', 'Baik', '72000 m²', 'Ha/m²', '980000000', 'Aamir Sejahtera', '1987-02-10', 'tanah.png', 'Jl. Bedadung No.2, Kp. Using, Jemberlor, Kec. Patrang, Kabupaten Jember, Jawa Timur 68118', '-8.180220692260333', '113.67523883050224', 'PT. Rolas Nusantara Medika', 5, 5, 128, 44, 19, '23,Lalu Ahmad Syahrul Rasyid', 'Tanah akan digunakan sarana olahraga', '2023-07-10 01:21:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `id_unit_usaha` int(255) DEFAULT NULL,
  `id_unit_kerja` int(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id`, `id_unit_usaha`, `id_unit_kerja`, `name`) VALUES
(43, 5, 128, 'Audit Finance & Development'),
(44, 5, 93, 'Audit Operation & Legal'),
(45, 5, 123, 'Legal & Compliance'),
(46, 5, 94, 'Stake Holder Relation & BOD - BOC Support'),
(47, 5, 98, 'Corporate Communication'),
(48, 5, 82, 'Supply Chain'),
(49, 5, 98, 'Operational'),
(50, 5, 95, 'Medical & Nursing'),
(51, 5, 96, 'HSSE & Quality assurance'),
(61, 5, 93, 'Managed Care'),
(66, 3, 69, 'Audit Finance & Development'),
(67, 3, 68, 'Audit Operation & Legal'),
(68, 3, 72, 'Legal & Compliance'),
(69, 3, 102, 'Stake Holder Relation & BOD - BOC Support'),
(70, 3, 69, 'Corporate Communication'),
(71, 3, 102, 'Supply Chain'),
(72, 3, 65, 'Operational'),
(73, 3, 118, 'Medical & Nursing'),
(74, 3, 71, 'HSSE & Quality assurance'),
(75, 3, 69, 'Managed Care'),
(76, 4, 80, 'Audit Finance & Development'),
(77, 4, 80, 'Audit Operation & Legal'),
(78, 4, 80, 'Legal & Compliance'),
(79, 4, 81, 'Stake Holder Relation & BOD - BOC Support'),
(80, 4, 75, 'Corporate Communication'),
(81, 4, 83, 'Supply Chain'),
(82, 4, 81, 'Operational'),
(83, 4, 75, 'Medical & Nursing'),
(84, 4, 79, 'HSSE & Quality assurance'),
(85, 4, 76, 'Managed Care'),
(86, 4, 80, 'Business Development and Marketing'),
(87, 4, 53, 'Corporate Planing, Invesment & Risk Management'),
(88, 4, 53, 'Services Procurement'),
(89, 4, 75, 'Material Procurement'),
(90, 4, 79, 'Financing'),
(91, 3, 109, 'Business Development and Marketing'),
(92, 3, 66, 'Corporate Planing, Invesment & Risk Management'),
(93, 3, 68, 'Services Procurement'),
(94, 3, 67, 'Material Procurement'),
(95, 3, 105, 'Financing'),
(96, 3, 65, 'Taxation, AR & AP'),
(97, 3, 109, 'Finance Accounting Reporting & Asset'),
(98, 3, 111, 'Budgeting And Forecasting'),
(99, 3, 112, 'IT'),
(100, 3, 69, 'Strategic HR & People Management'),
(101, 3, 66, 'HR Operation & GA'),
(102, 3, 66, 'Operation'),
(103, 3, 104, 'HSE & Managed Cae'),
(104, 3, 69, 'Businees Development and Marketing'),
(105, 3, 67, 'Corporate Planing, Invesment & Risk Management'),
(106, 3, 67, 'Services Procurement'),
(107, 3, 71, 'Material Procurement'),
(108, 3, 67, 'Financing'),
(109, 3, 67, 'Taxation, AR & AP'),
(110, 3, 71, 'Finance Accounting Reporting & Asset'),
(111, 3, 66, 'Budgeting And Forecasting'),
(112, 3, 71, 'IT'),
(113, 3, 110, 'Strategic HR'),
(114, 5, 92, 'Business Development and Marketing'),
(115, 5, 94, 'Corporate Planing, Invesment & Risk Management'),
(116, 5, 93, 'Services Procurement'),
(117, 5, 93, 'Material Procurement'),
(118, 5, 135, 'Financing'),
(119, 5, 94, 'Taxation, AR & AP'),
(120, 5, 128, 'Finance Accounting Reporting & Asset'),
(121, 5, 93, 'Budgeting And Forecasting'),
(122, 5, 138, 'IT'),
(123, 5, 95, 'Strategic HR & People Management'),
(124, 5, 98, 'HR Operation & GA'),
(125, 5, 91, 'Operation'),
(126, 5, 123, 'HSE & Managed Care'),
(127, 5, 92, 'Businees Development and Marketing'),
(128, 5, 93, 'Corporate Planing, Invesment & Risk Management'),
(129, 5, 91, 'Services Procurement'),
(130, 5, 100, 'Material Procurement'),
(131, 5, 99, 'Financing'),
(132, 5, 93, 'Taxation, AR & AP'),
(133, 5, 128, 'Finance Accounting Reporting & Asset'),
(134, 5, 93, 'Budgeting And Forecasting'),
(135, 5, 96, 'IT'),
(136, 5, 99, 'Strategic HR'),
(137, 2, 57, 'Audit Finance & Development'),
(138, 2, 56, 'Audit Operation & Legal'),
(139, 2, 58, 'Legal & Compliance'),
(140, 2, 64, 'Stake Holder Relation & BOD - BOC Support'),
(141, 2, 64, 'Corporate Communication'),
(142, 2, 61, 'Supply Chain'),
(143, 2, 61, 'Operational'),
(144, 2, 63, 'Medical & Nursing'),
(145, 2, 59, 'HSSE & Quality assurance'),
(146, 2, 64, 'Managed Care'),
(147, 3, 68, 'People Management'),
(148, 3, 71, 'HC Operation'),
(149, 3, 70, 'General Affairs'),
(150, 3, 69, 'Emergency Installation'),
(151, 3, 112, 'Surgery & Anesthesia'),
(152, 3, 69, 'Intensif care'),
(153, 3, 69, 'Inpatient'),
(154, 3, 68, 'Outpatient Clinic'),
(155, 3, 68, 'Hemodialysis'),
(156, 3, 68, 'Perinatology'),
(157, 3, 67, 'Pharmacy Installation'),
(158, 3, 68, 'Nutrient Installation'),
(159, 3, 68, 'Laboratory'),
(160, 3, 69, 'PHYSICAL MEDIC & REHABILITATION'),
(161, 3, 67, 'Medical Record'),
(162, 3, 70, 'CSSD'),
(163, 3, 68, 'Inpatient Room A'),
(164, 3, 66, 'Inpatient Room B'),
(165, 3, 68, 'Inpatient Room C'),
(166, 3, 66, 'Maternity room'),
(167, 3, 66, 'Legal & secretary'),
(168, 3, 68, 'Human Capital & General Affairs'),
(169, 3, 66, 'Technical services'),
(170, 3, 139, 'HSSE'),
(171, 3, 120, 'Receivable'),
(172, 3, 69, 'Controller'),
(174, 3, 74, 'JKN & Insurance Services'),
(175, 3, 69, 'Networking Infrastructure'),
(176, 3, 72, 'Klinik Rolas Medika Jember'),
(177, 3, 102, 'Klinik Rolas Medika Banjarsari'),
(178, 3, 71, 'Klinik Rolas Medika Kalikempit'),
(179, 3, 69, 'Klinik Rolas Medika Siliragung'),
(180, 3, 70, 'DPP Kalibaru'),
(181, 3, 101, 'Gudang 1'),
(182, 3, 70, 'Gudang 2'),
(183, 3, 70, 'Driver'),
(185, 5, 93, 'People Management'),
(186, 5, 98, 'HC Operation'),
(187, 5, 131, 'General Affairs'),
(188, 5, 93, 'Emergency Installation'),
(189, 5, 95, 'Surgery & Anesthesia'),
(190, 5, 96, 'Intensif care'),
(191, 5, 93, 'Inpatient'),
(192, 5, 97, 'Outpatient Clinic'),
(193, 5, 95, 'Hemodialysis'),
(194, 5, 95, 'Perinatology'),
(195, 5, 93, 'Pharmacy Installation'),
(196, 5, 95, 'Nutrient Installation'),
(197, 5, 125, 'Laboratory'),
(198, 5, 99, 'PHYSICAL MEDIC & REHABILITATION'),
(199, 5, 98, 'Medical Record'),
(200, 5, 96, 'CSSD'),
(201, 5, 98, 'Inpatient Room A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris_kendaraan`
--

CREATE TABLE `inventaris_kendaraan` (
  `id_kendaraan` int(255) NOT NULL,
  `no_inventaris` int(255) DEFAULT NULL,
  `nama_barang_kendaraan` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `merek_kendaraan` varchar(255) NOT NULL,
  `kode_barang_kendaraan` varchar(255) DEFAULT 'KD',
  `nopol` varchar(255) NOT NULL,
  `norangka` varchar(255) NOT NULL,
  `nomesin` varchar(255) NOT NULL,
  `nobpkb` varchar(255) NOT NULL,
  `kepemilikan_stnk` varchar(255) NOT NULL,
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventaris_kendaraan`
--

INSERT INTO `inventaris_kendaraan` (`id_kendaraan`, `no_inventaris`, `nama_barang_kendaraan`, `jenis_kendaraan`, `merek_kendaraan`, `kode_barang_kendaraan`, `nopol`, `norangka`, `nomesin`, `nobpkb`, `kepemilikan_stnk`, `kondisi`, `jumlah`, `satuan`, `nilaiperolehan`, `tanggal_barang`, `image`, `alamat`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_bidang`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`) VALUES
(13, 5000001, 'Ambulance Grup Klinik', 'Mobil', 'Toyota Hiace', 'KD', 'P 9120 AB', 'MH1MC4110JK090PTA', 'MH1MC4110JK098HUS', 'US76C4110JK4K0002', 'Adrian Bhakti Purnomo', 'Baik', 1, 'Unit', '200000000', '1983-01-10', 'ambulans-Toyota-Hiace-.jpg', 'Jl. Bedadung No.2, Kp. Using, Jemberlor, Kec. Patrang, Kabupaten Jember, Jawa Timur 68118', 'PT. Rolas Nusantara Medika', 5, 5, 92, 191, 19, NULL, 'Ambulance untuk mengangkut jenazah', '2023-07-10 01:14:27', NULL),
(14, 5000002, 'Ambulance Grup Klinik', 'Mobil', 'Hiace', 'KD', 'P 5076 BAA', 'MH1MC4110JK076TRD', 'MH1MC4110JK095076', 'US76C4110JK4K0001', 'Andhika Permana', 'Baik', 1, 'Unit', '250000000', '2004-02-10', 'ambulans-Toyota-Hiace-.jpg', 'Jl. Bedadung No.2, Kp. Using, Jemberlor, Kec. Patrang, Kabupaten Jember, Jawa Timur 68118', 'PT. Rolas Nusantara Medika', 5, 5, 127, 122, 42, '23,Lalu Ahmad Syahrul Rasyid', 'Ambulance untuk Ibu melahirkan', '2023-07-10 01:15:41', NULL),
(15, 5000003, 'Ambulance Grup Klinik', 'Mobil', 'Mercedes Benz Sprinter', 'KD', 'P 1 AND', 'MH1MC4110JK076TRD', 'MH1MC4110JK87YHSG', 'US76C4110JK4Kxsd0', 'Tyasrini', 'Baik', 1, 'Unit', '12000000000', '2023-07-10', 'ambulans-mercedes-sprinter-.jpg', 'Jl. Bedadung No.2, Kp. Using, Jemberlor, Kec. Patrang, Kabupaten Jember, Jawa Timur 68118', 'PT. Rolas Nusantara Medika', 5, 5, 93, 44, 23, '42,Andira Permatasari', 'Ambulance ini akan digunakan untuk mengangkut korban/jenazah bencana alam', '2023-07-10 01:20:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris_peralatanac`
--

CREATE TABLE `inventaris_peralatanac` (
  `id_peralatanac` int(255) NOT NULL,
  `no_inventaris` int(255) NOT NULL,
  `nama_peralatanac` varchar(255) NOT NULL,
  `merek_peralatanac` varchar(255) NOT NULL,
  `tipe_peralatanac` varchar(255) NOT NULL,
  `spesifikasi_peralatanac` varchar(255) NOT NULL,
  `jenis_peralatanac` varchar(255) NOT NULL,
  `kode_peralatanac` varchar(255) DEFAULT 'AC',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris_peralatankantor`
--

CREATE TABLE `inventaris_peralatankantor` (
  `id_peralatankantor` int(255) NOT NULL,
  `no_inventaris` int(255) NOT NULL,
  `nama_peralatankantor` varchar(255) NOT NULL,
  `merek_peralatankantor` varchar(255) NOT NULL,
  `tipe_peralatankantor` varchar(255) NOT NULL,
  `spesifikasi_peralatankantor` varchar(255) NOT NULL,
  `jenis_peralatankantor` varchar(255) NOT NULL,
  `kode_peralatankantor` varchar(255) DEFAULT 'PK',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris_peralatanlift`
--

CREATE TABLE `inventaris_peralatanlift` (
  `id_peralatanlift` int(255) NOT NULL,
  `no_inventaris` int(255) NOT NULL,
  `nama_peralatanlift` varchar(255) NOT NULL,
  `merek_peralatanlift` varchar(255) NOT NULL,
  `tipe_peralatanlift` varchar(255) NOT NULL,
  `spesifikasi_peralatanlift` varchar(255) NOT NULL,
  `jenis_peralatanlift` varchar(255) NOT NULL,
  `kode_peralatanlift` varchar(255) DEFAULT 'LT',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris_peralatanmedis`
--

CREATE TABLE `inventaris_peralatanmedis` (
  `id_peralatanmedis` int(255) NOT NULL,
  `no_inventaris` int(255) NOT NULL,
  `nama_peralatanmedis` varchar(255) NOT NULL,
  `merek_peralatanmedis` varchar(255) NOT NULL,
  `tipe_peralatanmedis` varchar(255) NOT NULL,
  `spesifikasi_peralatanmedis` varchar(255) NOT NULL,
  `jenis_peralatanmedis` varchar(255) NOT NULL,
  `kode_peralatanmedis` varchar(255) DEFAULT 'MD',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris_peralatanteknikinformatika`
--

CREATE TABLE `inventaris_peralatanteknikinformatika` (
  `id_peralatanteknikinformatika` int(255) NOT NULL,
  `no_inventaris` int(255) NOT NULL,
  `nama_peralatanteknikinformatika` varchar(255) NOT NULL,
  `merek_peralatanteknikinformatika` varchar(255) NOT NULL,
  `tipe_peralatanteknikinformatika` varchar(255) NOT NULL,
  `spesifikasi_peralatanteknikinformatika` text NOT NULL,
  `jenis_peralatanteknikinformatika` varchar(255) NOT NULL,
  `kode_peralatanteknikinformatika` varchar(255) DEFAULT 'TI',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris_peralatantekniklistrikdanmekanik`
--

CREATE TABLE `inventaris_peralatantekniklistrikdanmekanik` (
  `id_peralatantekniklistrikdanmekanik` int(255) NOT NULL,
  `no_inventaris` int(255) NOT NULL,
  `nama_peralatantekniklistrikdanmekanik` varchar(255) NOT NULL,
  `merek_peralatantekniklistrikdanmekanik` varchar(255) NOT NULL,
  `tipe_peralatantekniklistrikdanmekanik` varchar(255) NOT NULL,
  `spesifikasi_peralatantekniklistrikdanmekanik` varchar(255) NOT NULL,
  `jenis_peralatantekniklistrikdanmekanik` varchar(255) NOT NULL,
  `kode_peralatantekniklistrikdanmekanik` varchar(255) DEFAULT 'LM',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris_peralatantelekomunikasi`
--

CREATE TABLE `inventaris_peralatantelekomunikasi` (
  `id_peralatantelekomunikasi` int(255) NOT NULL,
  `no_inventaris` int(255) DEFAULT NULL,
  `nama_peralatantelekomunikasi` varchar(255) NOT NULL,
  `merek_peralatantelekomunikasi` varchar(255) NOT NULL,
  `tipe_peralatantelekomunikasi` varchar(255) NOT NULL,
  `spesifikasi_peralatantelekomunikasi` text NOT NULL,
  `jenis_peralatantelekomunikasi` varchar(255) NOT NULL,
  `kode_peralatantelekomunikasi` varchar(255) DEFAULT 'TE',
  `kondisi` text NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int(255) NOT NULL,
  `kuasa_pengguna_barang` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `id_petugas1` int(255) NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_unit_usaha` int(255) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_unit_kerja` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `name`, `id_unit_usaha`, `id_bidang`, `id_unit_kerja`) VALUES
(19, 'Fadhilah Nuraini', 5, 45, 94),
(23, 'Lalu Ahmad Syahrul Rasyid', 5, 133, 93),
(26, 'Hartono S', 3, 157, 107),
(28, 'Usman Fatta', 3, 72, 74),
(31, 'Diah Hesti Nurulhuda', 5, 49, 136),
(33, 'Adam Hussein', 4, 77, 80),
(34, 'Ronald Robi Supandi', 4, 76, 81),
(35, 'Andika Pratama', 3, 182, 68),
(37, 'Roger Yunaida', 2, 146, 156),
(38, 'Poli Andrian', 2, 140, 60),
(39, 'Bagaskara P', 2, 146, 156),
(42, 'Andira Permatasari', 5, 46, 94);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` int(11) NOT NULL,
  `id_unit_usaha` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `id_unit_usaha`, `name`) VALUES
(53, '4', 'Audit Finance & Development'),
(55, '2', 'Audit Finance & Development'),
(56, '2', 'Audit Operation & Legal'),
(57, '2', 'Legal & Compliance'),
(58, '2', 'Corporate Communication'),
(59, '2', 'Stake Holder Relation & BOD - BOC Support'),
(60, '2', 'Treasury & Financing'),
(61, '2', 'Controller'),
(62, '2', 'Information Technology (IT)'),
(63, '2', 'Strategic HR & People Management'),
(64, '2', 'HR Operation & GA'),
(65, '3', 'Audit Finance & Development'),
(66, '3', 'Audit Operation & Legal'),
(67, '3', 'Legal & Compliance'),
(68, '3', 'Corporate Communication'),
(69, '3', 'Stake Holder Relation & BOD - BOC Support'),
(70, '3', 'Treasury & Financing'),
(71, '3', 'Controller'),
(72, '3', 'Information Technology (IT)'),
(73, '3', 'Strategic HR & People Management'),
(74, '3', 'HR Operation & GA'),
(75, '4', 'Audit Operation & Legal'),
(76, '4', 'Legal & Compliance'),
(77, '4', 'Corporate Communication'),
(78, '4', 'Stake Holder Relation & BOD - BOC Support'),
(79, '4', 'Treasury & Financing'),
(80, '4', 'Controller'),
(81, '4', 'Information Technology (IT)'),
(82, '4', 'Strategic HR & People Management'),
(83, '4', 'HR Operation & GA'),
(91, '5', 'Audit Finance & Development'),
(92, '5', 'Audit Operation & Legal'),
(93, '5', 'Legal & Compliance'),
(94, '5', 'Corporate Communication'),
(95, '5', 'Stake Holder Relation & BOD - BOC Support'),
(96, '5', 'Treasury & Financing'),
(97, '5', 'Controller'),
(98, '5', 'Information Technology (IT)'),
(99, '5', 'Strategic HR & People Management'),
(100, '5', 'HR Operation & GA'),
(101, '3', 'Operation'),
(102, '3', 'HSE & Managed Car'),
(103, '3', 'Businees Development and Marketing'),
(104, '3', 'Corporate Planing, Invesment & Risk Management'),
(105, '3', 'Procurement'),
(106, '3', 'Medic'),
(107, '3', 'Nursing'),
(108, '3', 'HC & GA'),
(109, '3', 'Finance'),
(110, '3', 'Operational Klinik'),
(111, '3', 'Finance Klinik'),
(112, '3', 'Head Of Internal Audit'),
(118, '3', 'Business Support'),
(119, '3', 'Operation'),
(120, '3', 'Corporate Secretary'),
(121, '3', 'Gudang 1'),
(123, '5', 'Operation'),
(124, '5', 'HSE & Managed Care'),
(125, '5', 'Businees Development and Marketing'),
(126, '5', 'Corporate Planing, Invesment & Risk Management'),
(127, '5', 'Procurement'),
(128, '5', 'Medic'),
(129, '5', 'Nursing'),
(130, '5', 'HC & GA'),
(131, '5', 'Finance'),
(132, '5', 'Operational Klinik'),
(133, '5', 'Finance Klinik'),
(134, '5', 'Head Of Internal Audit'),
(135, '5', 'Business Support'),
(136, '5', 'Operation'),
(137, '5', 'Corporate Secretary'),
(138, '5', 'Gudang 1'),
(139, '3', 'Gudang 2'),
(140, '5', 'Gudang 2'),
(141, '2', 'Operation'),
(142, '2', 'HSE & Managed Care'),
(143, '2', 'Businees Development and Marketing'),
(144, '2', 'Corporate Planing, Invesment & Risk Management'),
(145, '2', 'Procurement'),
(146, '2', 'Medic'),
(147, '2', 'Nursing'),
(148, '2', 'HC & GA'),
(149, '2', 'Finance'),
(150, '2', 'Operational Klinik'),
(151, '2', 'Finance Klinik'),
(152, '2', 'Head Of Internal Audit'),
(153, '2', 'Business Support'),
(154, '2', 'Operation'),
(155, '2', 'Corporate Secretary'),
(156, '2', 'Gudang 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Corporation','Head Office','RSU Kaliwates','RSU Bhakti Husada','Grup Klinik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `kode`, `image`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Corporation', '', 'avatar-4.jpg', 'corporation', '086c740eb282cdf4b4c9a94d5982277f', 'Corporation', '', '2023-03-20 17:00:00', '2023-03-20 17:00:00'),
(2, 'Head Office', 'HO', 'avatar-5.jpg', 'headoffice', 'ba67c848e591f04e0ac1a53fc10971bb', 'Head Office', NULL, '2023-03-20 17:00:00', '2023-03-20 17:00:00'),
(3, 'RSU Kaliwates', 'RSUK', 'avatar-7.jpg', 'rsukaliwates', 'bf48b4d3cfcde01f76e5fe1a20bb8d8b', 'RSU Kaliwates', NULL, '2023-03-20 17:00:00', '2023-03-27 17:00:00'),
(4, 'RSU Bhakti Husada', 'RSUBH', 'avatar-10.jpg', 'rsubhaktihusada', '066c8aa96a8eb6848ee9106be2b38491', 'RSU Bhakti Husada', NULL, '2023-03-20 17:00:00', '2023-04-15 17:00:00'),
(5, 'Grup Klinik', 'GK', 'avatar-8.jpg', 'grupklinik', 'e1a2cb1a89b1dd37e057ae8eae56d0ed', 'Grup Klinik', NULL, '2023-03-20 17:00:00', '2023-04-15 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aset_alatac`
--
ALTER TABLE `aset_alatac`
  ADD PRIMARY KEY (`id_alatac`);

--
-- Indeks untuk tabel `aset_alatkantor`
--
ALTER TABLE `aset_alatkantor`
  ADD PRIMARY KEY (`id_alatkantor`);

--
-- Indeks untuk tabel `aset_alatlift`
--
ALTER TABLE `aset_alatlift`
  ADD PRIMARY KEY (`id_alatlift`);

--
-- Indeks untuk tabel `aset_alatlistrik`
--
ALTER TABLE `aset_alatlistrik`
  ADD PRIMARY KEY (`id_alatlistrik`);

--
-- Indeks untuk tabel `aset_alatmedis`
--
ALTER TABLE `aset_alatmedis`
  ADD PRIMARY KEY (`id_alatmedis`);

--
-- Indeks untuk tabel `aset_alatmekanik`
--
ALTER TABLE `aset_alatmekanik`
  ADD PRIMARY KEY (`id_alatmekanik`);

--
-- Indeks untuk tabel `aset_alattelekomunikasi`
--
ALTER TABLE `aset_alattelekomunikasi`
  ADD PRIMARY KEY (`id_alattelekomunikasi`);

--
-- Indeks untuk tabel `aset_gedungdanbangunan`
--
ALTER TABLE `aset_gedungdanbangunan`
  ADD PRIMARY KEY (`id_gedungdanbangunan`);

--
-- Indeks untuk tabel `aset_kendaraandanambulance`
--
ALTER TABLE `aset_kendaraandanambulance`
  ADD PRIMARY KEY (`id_kendaraandanambulance`);

--
-- Indeks untuk tabel `aset_komputer`
--
ALTER TABLE `aset_komputer`
  ADD PRIMARY KEY (`id_komputer`);

--
-- Indeks untuk tabel `aset_tanah`
--
ALTER TABLE `aset_tanah`
  ADD PRIMARY KEY (`id_tanah`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventaris_kendaraan`
--
ALTER TABLE `inventaris_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `inventaris_peralatanac`
--
ALTER TABLE `inventaris_peralatanac`
  ADD PRIMARY KEY (`id_peralatanac`);

--
-- Indeks untuk tabel `inventaris_peralatankantor`
--
ALTER TABLE `inventaris_peralatankantor`
  ADD PRIMARY KEY (`id_peralatankantor`);

--
-- Indeks untuk tabel `inventaris_peralatanlift`
--
ALTER TABLE `inventaris_peralatanlift`
  ADD PRIMARY KEY (`id_peralatanlift`);

--
-- Indeks untuk tabel `inventaris_peralatanmedis`
--
ALTER TABLE `inventaris_peralatanmedis`
  ADD PRIMARY KEY (`id_peralatanmedis`);

--
-- Indeks untuk tabel `inventaris_peralatanteknikinformatika`
--
ALTER TABLE `inventaris_peralatanteknikinformatika`
  ADD PRIMARY KEY (`id_peralatanteknikinformatika`);

--
-- Indeks untuk tabel `inventaris_peralatantekniklistrikdanmekanik`
--
ALTER TABLE `inventaris_peralatantekniklistrikdanmekanik`
  ADD PRIMARY KEY (`id_peralatantekniklistrikdanmekanik`);

--
-- Indeks untuk tabel `inventaris_peralatantelekomunikasi`
--
ALTER TABLE `inventaris_peralatantelekomunikasi`
  ADD PRIMARY KEY (`id_peralatantelekomunikasi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset_alatac`
--
ALTER TABLE `aset_alatac`
  MODIFY `id_alatac` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `aset_alatkantor`
--
ALTER TABLE `aset_alatkantor`
  MODIFY `id_alatkantor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `aset_alatlift`
--
ALTER TABLE `aset_alatlift`
  MODIFY `id_alatlift` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `aset_alatlistrik`
--
ALTER TABLE `aset_alatlistrik`
  MODIFY `id_alatlistrik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `aset_alatmedis`
--
ALTER TABLE `aset_alatmedis`
  MODIFY `id_alatmedis` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `aset_alatmekanik`
--
ALTER TABLE `aset_alatmekanik`
  MODIFY `id_alatmekanik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `aset_alattelekomunikasi`
--
ALTER TABLE `aset_alattelekomunikasi`
  MODIFY `id_alattelekomunikasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `aset_gedungdanbangunan`
--
ALTER TABLE `aset_gedungdanbangunan`
  MODIFY `id_gedungdanbangunan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `aset_kendaraandanambulance`
--
ALTER TABLE `aset_kendaraandanambulance`
  MODIFY `id_kendaraandanambulance` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `aset_komputer`
--
ALTER TABLE `aset_komputer`
  MODIFY `id_komputer` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `aset_tanah`
--
ALTER TABLE `aset_tanah`
  MODIFY `id_tanah` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris_kendaraan`
--
ALTER TABLE `inventaris_kendaraan`
  MODIFY `id_kendaraan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `inventaris_peralatanac`
--
ALTER TABLE `inventaris_peralatanac`
  MODIFY `id_peralatanac` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris_peralatankantor`
--
ALTER TABLE `inventaris_peralatankantor`
  MODIFY `id_peralatankantor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `inventaris_peralatanlift`
--
ALTER TABLE `inventaris_peralatanlift`
  MODIFY `id_peralatanlift` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris_peralatanmedis`
--
ALTER TABLE `inventaris_peralatanmedis`
  MODIFY `id_peralatanmedis` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris_peralatanteknikinformatika`
--
ALTER TABLE `inventaris_peralatanteknikinformatika`
  MODIFY `id_peralatanteknikinformatika` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris_peralatantekniklistrikdanmekanik`
--
ALTER TABLE `inventaris_peralatantekniklistrikdanmekanik`
  MODIFY `id_peralatantekniklistrikdanmekanik` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris_peralatantelekomunikasi`
--
ALTER TABLE `inventaris_peralatantelekomunikasi`
  MODIFY `id_peralatantelekomunikasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
