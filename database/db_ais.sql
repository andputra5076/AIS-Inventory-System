-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2024 at 09:03 AM
-- Server version: 8.0.36
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `aset_alatac`
--

CREATE TABLE `aset_alatac` (
  `id_alatac` int NOT NULL,
  `no_aset` int NOT NULL,
  `nama_alatac` varchar(255) NOT NULL,
  `merek_alatac` varchar(255) NOT NULL,
  `tipe_alatac` varchar(255) NOT NULL,
  `spesifikasi_alatac` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_alatac` varchar(255) NOT NULL,
  `kode_alatac` varchar(255) DEFAULT '09',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `aset_alatac`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan11` BEFORE UPDATE ON `aset_alatac` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_alatkantor`
--

CREATE TABLE `aset_alatkantor` (
  `id_alatkantor` int NOT NULL,
  `no_aset` int NOT NULL,
  `nama_alatkantor` varchar(255) NOT NULL,
  `merek_alatkantor` varchar(255) NOT NULL,
  `tipe_alatkantor` varchar(255) NOT NULL,
  `spesifikasi_alatkantor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_alatkantor` varchar(255) NOT NULL,
  `kode_alatkantor` varchar(255) DEFAULT '05',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aset_alatkantor`
--

INSERT INTO `aset_alatkantor` (`id_alatkantor`, `no_aset`, `nama_alatkantor`, `merek_alatkantor`, `tipe_alatkantor`, `spesifikasi_alatkantor`, `jenis_alatkantor`, `kode_alatkantor`, `kondisi`, `jumlah`, `satuan`, `nilaiperolehan`, `nilai_residu`, `tanggal_aset`, `masa_manfaat`, `penyusutan`, `image`, `alamat`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_ruangan`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`, `deleted_at`) VALUES
(3, 4000001, 'Komputer', 'zmxcnioas', 'jkhzxcpp', '9081476czx', 'jaskdjh', '05', 'sadsadasd', 1241, 'zxczx', '500000', 5000, '2024-05-21', 2, 247500, 'dispenduk.jpg', 'Jl. Merdeka No. 10', 'PT. Rolas Nusantara Medika', 4, 4, 83, 239, 93, ',undefined', '-', '2024-05-21 15:22:39', '2024-05-21 15:44:10', NULL);

--
-- Triggers `aset_alatkantor`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan10` BEFORE UPDATE ON `aset_alatkantor` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_alatlift`
--

CREATE TABLE `aset_alatlift` (
  `id_alatlift` int NOT NULL,
  `no_aset` int NOT NULL,
  `nama_alatlift` varchar(255) NOT NULL,
  `merek_alatlift` varchar(255) NOT NULL,
  `tipe_alatlift` varchar(255) NOT NULL,
  `spesifikasi_alatlift` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_alatlift` varchar(255) NOT NULL,
  `kode_alatlift` varchar(255) DEFAULT '10',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `aset_alatlift`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan9` BEFORE UPDATE ON `aset_alatlift` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_alatlistrik`
--

CREATE TABLE `aset_alatlistrik` (
  `id_alatlistrik` int NOT NULL,
  `no_aset` int NOT NULL,
  `nama_alatlistrik` varchar(255) NOT NULL,
  `merek_alatlistrik` varchar(255) NOT NULL,
  `tipe_alatlistrik` varchar(255) NOT NULL,
  `spesifikasi_alatlistrik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_alatlistrik` varchar(255) NOT NULL,
  `kode_alatlistrik` varchar(255) DEFAULT '07',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aset_alatlistrik`
--

INSERT INTO `aset_alatlistrik` (`id_alatlistrik`, `no_aset`, `nama_alatlistrik`, `merek_alatlistrik`, `tipe_alatlistrik`, `spesifikasi_alatlistrik`, `jenis_alatlistrik`, `kode_alatlistrik`, `kondisi`, `jumlah`, `satuan`, `nilaiperolehan`, `nilai_residu`, `tanggal_aset`, `masa_manfaat`, `penyusutan`, `image`, `alamat`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_ruangan`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`, `deleted_at`) VALUES
(3, 4000001, 'asdas', 'oimm', 'poieu', 'zxcsda', 'nm,zbxc', '07', 'Baik', 2, 'unit', '5000', 300, '2024-05-21', 5, 940, 'FOTO20230131154543pm.jpeg', 'Jln pepaya no 12 Bali', 'PT. Rolas Nusantara Medika', 4, 4, 83, 237, 93, ',undefined', '-', '2024-05-21 15:50:26', '2024-05-21 15:51:28', NULL);

--
-- Triggers `aset_alatlistrik`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan8` BEFORE UPDATE ON `aset_alatlistrik` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_alatmedis`
--

CREATE TABLE `aset_alatmedis` (
  `id_alatmedis` int NOT NULL,
  `no_aset` int NOT NULL,
  `nama_alatmedis` varchar(255) NOT NULL,
  `merek_alatmedis` varchar(255) NOT NULL,
  `tipe_alatmedis` varchar(255) NOT NULL,
  `spesifikasi_alatmedis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_alatmedis` varchar(255) NOT NULL,
  `kode_alatmedis` varchar(255) DEFAULT '11',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `aset_alatmedis`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan7` BEFORE UPDATE ON `aset_alatmedis` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_alatmekanik`
--

CREATE TABLE `aset_alatmekanik` (
  `id_alatmekanik` int NOT NULL,
  `no_aset` int NOT NULL,
  `nama_alatmekanik` varchar(255) NOT NULL,
  `merek_alatmekanik` varchar(255) NOT NULL,
  `tipe_alatmekanik` varchar(255) NOT NULL,
  `spesifikasi_alatmekanik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_alatmekanik` varchar(255) NOT NULL,
  `kode_alatmekanik` varchar(255) DEFAULT '08',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aset_alatmekanik`
--

INSERT INTO `aset_alatmekanik` (`id_alatmekanik`, `no_aset`, `nama_alatmekanik`, `merek_alatmekanik`, `tipe_alatmekanik`, `spesifikasi_alatmekanik`, `jenis_alatmekanik`, `kode_alatmekanik`, `kondisi`, `jumlah`, `satuan`, `nilaiperolehan`, `nilai_residu`, `tanggal_aset`, `masa_manfaat`, `penyusutan`, `image`, `alamat`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_ruangan`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`, `deleted_at`) VALUES
(10, 4000001, 'asd', 'asd', 'sad1', 'zxczx', 'asdasd', '08', '123', 1, 'Unit', '14000', 4000, '2024-05-21', 8, 1250, 'Logo_unej.png', 'Jln pepaya no 12 Bali', 'PT. Rolas Nusantara Medika', 4, 4, 83, 237, 93, '93,Subandi Jayaputra', '-', '2024-05-21 15:58:05', '2024-05-21 15:59:00', NULL);

--
-- Triggers `aset_alatmekanik`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan6` BEFORE UPDATE ON `aset_alatmekanik` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_alattelekomunikasi`
--

CREATE TABLE `aset_alattelekomunikasi` (
  `id_alattelekomunikasi` int NOT NULL,
  `no_aset` int DEFAULT NULL,
  `nama_alattelekomunikasi` varchar(255) NOT NULL,
  `merek_alattelekomunikasi` varchar(255) NOT NULL,
  `tipe_alattelekomunikasi` varchar(255) NOT NULL,
  `imei1_alattelekomunikasi` int DEFAULT NULL,
  `imei2_alattelekomunikasi` int DEFAULT NULL,
  `spesifikasi_alattelekomunikasi` text NOT NULL,
  `jenis_alattelekomunikasi` varchar(255) NOT NULL,
  `kode_alattelekomunikasi` varchar(255) DEFAULT '04',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aset_alattelekomunikasi`
--

INSERT INTO `aset_alattelekomunikasi` (`id_alattelekomunikasi`, `no_aset`, `nama_alattelekomunikasi`, `merek_alattelekomunikasi`, `tipe_alattelekomunikasi`, `imei1_alattelekomunikasi`, `imei2_alattelekomunikasi`, `spesifikasi_alattelekomunikasi`, `jenis_alattelekomunikasi`, `kode_alattelekomunikasi`, `kondisi`, `jumlah`, `satuan`, `nilaiperolehan`, `nilai_residu`, `tanggal_aset`, `masa_manfaat`, `penyusutan`, `image`, `alamat`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_ruangan`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`, `deleted_at`) VALUES
(3, 4000001, 'Hp', 'Samsung', 'S412', 2131238, 87183213, 'preosad', 'Smartphone', '04', 'asd', 1, 'Unit', '50000', 60000, '2024-05-21', 3, -3333, 'Picture1.png', 'Jalan kelapa muda no 21', 'PT. Rolas Nusantara Medika', 4, 4, 83, 237, 93, '93,Subandi Jayaputra', 'Baik', '2024-05-21 14:07:57', '2024-05-21 14:40:34', NULL),
(4, 4000002, 'Hp', 'Samsung', 'S412', 554345, 12312, 'adsa', 'Smartphone', '04', 'zxc', 1, 'Unit', '50000', NULL, '2024-05-21', NULL, NULL, 'Class Diagram.drawio (1).png', 'Jalan kelapa muda no 21', 'PT. Rolas Nusantara Medika', 4, 4, 83, 239, 93, '93,Subandi Jayaputra', 'asdas', '2024-05-21 14:41:12', NULL, NULL),
(5, 4000003, 'Hp', 'Samsung', 'S412', NULL, NULL, 'hkasdh', 'Smartphone', '04', 'asd', 1, 'Unit', '50000', 10000000, '2024-05-21', 5, -1990000, 'rolas.png', '123 Main Street', 'PT. Rolas Nusantara Medika', 4, 4, 83, 238, 93, '93,Subandi Jayaputra', '-', '2024-05-21 14:52:21', '2024-05-21 15:15:39', NULL),
(6, 4000004, 'Hp', 'Samsung', 'S412', 123123, 123123, 'zxcasd', 'Smartphone', '04', 'Biak', 1, 'Unit', '50000', 450000, '2024-05-21', 3, -133333, 'dinas sosial.jpeg', 'Jalan kelapa muda no 21', 'PT. Rolas Nusantara Medika', 4, 4, 83, 238, 93, '93,Subandi Jayaputra', 'Diasnzxc', '2024-05-21 14:58:31', '2024-05-21 14:59:05', NULL);

--
-- Triggers `aset_alattelekomunikasi`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan5` BEFORE UPDATE ON `aset_alattelekomunikasi` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_gedungdanbangunan`
--

CREATE TABLE `aset_gedungdanbangunan` (
  `id_gedungdanbangunan` int NOT NULL,
  `no_aset` int NOT NULL,
  `nama_gedungdanbangunan` varchar(255) NOT NULL,
  `nama_objek` varchar(255) NOT NULL,
  `jenis_gedungdanbangunan` varchar(255) NOT NULL,
  `kode_aset_gedungdanbangunan` varchar(255) DEFAULT '02',
  `kondisi` text NOT NULL,
  `luas_gedungdanbangunan` varchar(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `sertifikat_kepemilikan` varchar(255) NOT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aset_gedungdanbangunan`
--

INSERT INTO `aset_gedungdanbangunan` (`id_gedungdanbangunan`, `no_aset`, `nama_gedungdanbangunan`, `nama_objek`, `jenis_gedungdanbangunan`, `kode_aset_gedungdanbangunan`, `kondisi`, `luas_gedungdanbangunan`, `satuan`, `nilaiperolehan`, `nilai_residu`, `sertifikat_kepemilikan`, `tanggal_aset`, `masa_manfaat`, `penyusutan`, `image`, `alamat`, `lat`, `long`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_ruangan`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`, `deleted_at`) VALUES
(7, 3000001, 'Aset Tetap Gedung dan Bangunan', 'Tanah Lap Tennis', 'Bata Merah', '02', 'Baik', '123', 'm²', '500000', 35000, '123', '2024-05-07', 5, 93000, 'dinas pemadam.jpeg', 'Jl. Merdeka No. 10', '-3123', '-12038974', 'PT. Rolas Nusantara Medika', 3, 3, 157, 248, 95, '95,Saifullah', '-', '2024-05-07 14:17:05', '2024-05-07 14:25:59', NULL),
(8, 4000001, 'Aset Tetap Gedung dan Bangunan', 'Tanah Lap Tennis', 'Bata Merah', '02', 'Baik', '123', 'm²', '123', NULL, '123', '2024-05-21', NULL, NULL, 'f534f_pipiet-wibawanto.jpg', 'Jalan kelapa muda no 21', '-3123', '-12038974', 'PT. Rolas Nusantara Medika', 4, 4, 83, 239, 93, '93,Subandi Jayaputra', 'okey', '2024-05-21 13:54:23', NULL, NULL);

--
-- Triggers `aset_gedungdanbangunan`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan4` BEFORE UPDATE ON `aset_gedungdanbangunan` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_kendaraandanambulance`
--

CREATE TABLE `aset_kendaraandanambulance` (
  `id_kendaraandanambulance` int NOT NULL,
  `no_aset` int NOT NULL,
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
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aset_kendaraandanambulance`
--

INSERT INTO `aset_kendaraandanambulance` (`id_kendaraandanambulance`, `no_aset`, `nama_kendaraandanambulance`, `jenis_kendaraan`, `merek_kendaraan`, `kode_aset_kendaraandanambulance`, `nopol`, `norangka`, `nomesin`, `nobpkb`, `kepemilikan_stnk`, `kondisi`, `jumlah`, `satuan`, `nilaiperolehan`, `nilai_residu`, `tanggal_aset`, `masa_manfaat`, `penyusutan`, `image`, `alamat`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_ruangan`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`, `deleted_at`) VALUES
(4, 4000001, 'Ambulance', 'Mobil', 'Hyundai', '03', 'asd213', 'asd123', 'dsad123', 'zxc213', 'asdzxc', 'baik', 1, 'Unit', '1000', 500000, '2024-05-21', 3, -166333, 'satpol pp.jpeg', 'Jalan kelapa muda no 21', 'PT. Rolas Nusantara Medika', 4, 4, 83, 239, 93, '93,Subandi Jayaputra', '-', '2024-05-21 13:44:34', '2024-05-21 13:53:29', NULL);

--
-- Triggers `aset_kendaraandanambulance`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan3` BEFORE UPDATE ON `aset_kendaraandanambulance` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_komputer`
--

CREATE TABLE `aset_komputer` (
  `id_komputer` int NOT NULL,
  `no_aset` int NOT NULL,
  `nama_komputer` varchar(255) NOT NULL,
  `merek_komputer` varchar(255) NOT NULL,
  `tipe_komputer` varchar(255) NOT NULL,
  `spesifikasi_komputer` text NOT NULL,
  `jenis_komputer` varchar(255) NOT NULL,
  `kode_komputer` varchar(255) DEFAULT '06',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aset_komputer`
--

INSERT INTO `aset_komputer` (`id_komputer`, `no_aset`, `nama_komputer`, `merek_komputer`, `tipe_komputer`, `spesifikasi_komputer`, `jenis_komputer`, `kode_komputer`, `kondisi`, `jumlah`, `satuan`, `nilaiperolehan`, `nilai_residu`, `tanggal_aset`, `masa_manfaat`, `penyusutan`, `image`, `alamat`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_ruangan`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`, `deleted_at`) VALUES
(3, 4000001, 'jalsdk', 'm,sdo', '09p;zxc', 'Baik', 'ozxcn', '06', 'kokmxcz', 4, 'Unit', '50000', 20000, '2024-05-21', 3, 10000, 'zaitaku-iyada-5_11.png', 'Jln pepaya no 12 Bali', 'PT. Rolas Nusantara Medika', 4, 4, 83, 239, 93, '93,Subandi Jayaputra', '-', '2024-05-21 15:28:47', '2024-05-21 15:44:40', NULL);

--
-- Triggers `aset_komputer`
--
DELIMITER $$
CREATE TRIGGER `tambah_penyusutan2` BEFORE UPDATE ON `aset_komputer` FOR EACH ROW BEGIN
    SET NEW.penyusutan = (NEW.nilaiperolehan - NEW.nilai_residu) / NEW.masa_manfaat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset_tanah`
--

CREATE TABLE `aset_tanah` (
  `id_tanah` int NOT NULL,
  `no_aset` int NOT NULL,
  `nama_tanah` varchar(255) NOT NULL,
  `nama_objek` varchar(255) NOT NULL,
  `jenis_tanah` varchar(255) DEFAULT NULL,
  `kode_aset_tanah` varchar(255) DEFAULT '01',
  `kondisi` text NOT NULL,
  `luas_tanah` varchar(255) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `nilai_residu` int DEFAULT NULL,
  `sertifikat_kepemilikan` varchar(255) NOT NULL,
  `tanggal_aset` date DEFAULT NULL,
  `masa_manfaat` int DEFAULT NULL,
  `penyusutan` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_kendaraan`
--

CREATE TABLE `inventaris_kendaraan` (
  `id_kendaraan` int NOT NULL,
  `no_inventaris` int DEFAULT NULL,
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
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_peralatanac`
--

CREATE TABLE `inventaris_peralatanac` (
  `id_peralatanac` int NOT NULL,
  `no_inventaris` int NOT NULL,
  `nama_peralatanac` varchar(255) NOT NULL,
  `merek_peralatanac` varchar(255) NOT NULL,
  `tipe_peralatanac` varchar(255) NOT NULL,
  `spesifikasi_peralatanac` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_peralatanac` varchar(255) NOT NULL,
  `kode_peralatanac` varchar(255) DEFAULT 'AC',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_peralatankantor`
--

CREATE TABLE `inventaris_peralatankantor` (
  `id_peralatankantor` int NOT NULL,
  `no_inventaris` int NOT NULL,
  `nama_peralatankantor` varchar(255) NOT NULL,
  `merek_peralatankantor` varchar(255) NOT NULL,
  `tipe_peralatankantor` varchar(255) NOT NULL,
  `spesifikasi_peralatankantor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_peralatankantor` varchar(255) NOT NULL,
  `kode_peralatankantor` varchar(255) DEFAULT 'PK',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_peralatanlift`
--

CREATE TABLE `inventaris_peralatanlift` (
  `id_peralatanlift` int NOT NULL,
  `no_inventaris` int NOT NULL,
  `nama_peralatanlift` varchar(255) NOT NULL,
  `merek_peralatanlift` varchar(255) NOT NULL,
  `tipe_peralatanlift` varchar(255) NOT NULL,
  `spesifikasi_peralatanlift` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_peralatanlift` varchar(255) NOT NULL,
  `kode_peralatanlift` varchar(255) DEFAULT 'LT',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_peralatanmedis`
--

CREATE TABLE `inventaris_peralatanmedis` (
  `id_peralatanmedis` int NOT NULL,
  `no_inventaris` int NOT NULL,
  `nama_peralatanmedis` varchar(255) NOT NULL,
  `merek_peralatanmedis` varchar(255) NOT NULL,
  `tipe_peralatanmedis` varchar(255) NOT NULL,
  `spesifikasi_peralatanmedis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_peralatanmedis` varchar(255) NOT NULL,
  `kode_peralatanmedis` varchar(255) DEFAULT 'MD',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_peralatanteknikinformatika`
--

CREATE TABLE `inventaris_peralatanteknikinformatika` (
  `id_peralatanteknikinformatika` int NOT NULL,
  `no_inventaris` int NOT NULL,
  `nama_peralatanteknikinformatika` varchar(255) NOT NULL,
  `merek_peralatanteknikinformatika` varchar(255) NOT NULL,
  `tipe_peralatanteknikinformatika` varchar(255) NOT NULL,
  `spesifikasi_peralatanteknikinformatika` text NOT NULL,
  `jenis_peralatanteknikinformatika` varchar(255) NOT NULL,
  `kode_peralatanteknikinformatika` varchar(255) DEFAULT 'TI',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_peralatantekniklistrikdanmekanik`
--

CREATE TABLE `inventaris_peralatantekniklistrikdanmekanik` (
  `id_peralatantekniklistrikdanmekanik` int NOT NULL,
  `no_inventaris` int NOT NULL,
  `nama_peralatantekniklistrikdanmekanik` varchar(255) NOT NULL,
  `merek_peralatantekniklistrikdanmekanik` varchar(255) NOT NULL,
  `tipe_peralatantekniklistrikdanmekanik` varchar(255) NOT NULL,
  `spesifikasi_peralatantekniklistrikdanmekanik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_peralatantekniklistrikdanmekanik` varchar(255) NOT NULL,
  `kode_peralatantekniklistrikdanmekanik` varchar(255) DEFAULT 'LM',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_peralatantelekomunikasi`
--

CREATE TABLE `inventaris_peralatantelekomunikasi` (
  `id_peralatantelekomunikasi` int NOT NULL,
  `no_inventaris` int DEFAULT NULL,
  `nama_peralatantelekomunikasi` varchar(255) NOT NULL,
  `merek_peralatantelekomunikasi` varchar(255) NOT NULL,
  `tipe_peralatantelekomunikasi` varchar(255) NOT NULL,
  `imei1_peralatantelekomunikasi` int DEFAULT NULL,
  `imei2_peralatantelekomunikasi` int DEFAULT NULL,
  `spesifikasi_peralatantelekomunikasi` text NOT NULL,
  `jenis_peralatantelekomunikasi` varchar(255) NOT NULL,
  `kode_peralatantelekomunikasi` varchar(255) DEFAULT 'TE',
  `kondisi` text NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `nilaiperolehan` varchar(255) DEFAULT NULL,
  `tanggal_barang` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengelola_barang` varchar(255) DEFAULT 'PT. Rolas Nusantara Medika',
  `pengguna_barang` int NOT NULL,
  `kuasa_pengguna_barang` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_petugas1` int NOT NULL,
  `id_petugas2` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventaris_peralatantelekomunikasi`
--

INSERT INTO `inventaris_peralatantelekomunikasi` (`id_peralatantelekomunikasi`, `no_inventaris`, `nama_peralatantelekomunikasi`, `merek_peralatantelekomunikasi`, `tipe_peralatantelekomunikasi`, `imei1_peralatantelekomunikasi`, `imei2_peralatantelekomunikasi`, `spesifikasi_peralatantelekomunikasi`, `jenis_peralatantelekomunikasi`, `kode_peralatantelekomunikasi`, `kondisi`, `jumlah`, `satuan`, `nilaiperolehan`, `tanggal_barang`, `image`, `alamat`, `pengelola_barang`, `pengguna_barang`, `kuasa_pengguna_barang`, `id_unit_kerja`, `id_ruangan`, `id_petugas1`, `id_petugas2`, `keterangan`, `date_created`, `date_updated`, `deleted_at`) VALUES
(7, 4000001, 'baisdk', 'mnasdio', '1231', 141231, 2087, 'asdasd', 'm,asnd', 'TE', 'Baik', 2, 'unit', '200000', '2024-05-21', 'dinas pemadam.jpeg', '123 Main Street', 'PT. Rolas Nusantara Medika', 4, 4, 83, 239, 93, ',undefined', '-', '2024-05-21 15:38:33', '2024-05-21 15:42:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_unit_usaha` int DEFAULT NULL,
  `id_ruangan` int DEFAULT NULL,
  `id_unit_kerja` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `name`, `id_unit_usaha`, `id_ruangan`, `id_unit_kerja`) VALUES
(92, 'Erwin Wahyu S', 2, 228, 62),
(93, 'Subandi Jayaputra', 4, 238, 83),
(94, 'Erwin Wahyu S', 5, 246, 129),
(95, 'Saifullah', 3, 245, 158),
(96, 'Ani Susanti', 2, 230, 62);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int NOT NULL,
  `id_unit_usaha` int DEFAULT NULL,
  `id_unit_kerja` int DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `id_unit_usaha`, `id_unit_kerja`, `name`) VALUES
(228, 2, 62, 'Ruang Medis'),
(229, 2, 60, 'Ruang Rapat'),
(230, 2, 62, 'Ruang Operasi'),
(232, 5, 129, 'Ruang Operasi'),
(237, 4, 83, 'Ruang Rapat'),
(238, 4, 83, 'Ruang Kerja'),
(239, 4, 83, 'Ruang Operational'),
(244, 3, 157, 'Ruang Medis'),
(245, 3, 158, 'Ruang Asuransi Kesehatan'),
(246, 5, 129, 'Ruang Kesehatan'),
(247, 5, 128, 'Poli Gigi'),
(248, 3, 157, 'Ruang Administrasi');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` int NOT NULL,
  `id_unit_usaha` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `id_unit_usaha`, `name`) VALUES
(53, '4', 'Audit Finance & Development'),
(57, '2', 'SEVP Operational'),
(58, '2', 'SEVP Business Support'),
(59, '2', 'Corporate Secretary'),
(60, '2', 'Head Of Internal Audit'),
(61, '2', 'VP Operasi'),
(62, '2', 'VP Medis'),
(63, '2', 'VP Human Capital & General Affairs'),
(64, '2', 'VP Finance & Risk Management'),
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
(95, '5', 'Stake'),
(96, '5', 'Treasury & Financing'),
(97, '5', 'Controller 5'),
(98, '5', 'Information Technology (IT)'),
(99, '5', 'Strategic HR & People Management'),
(100, '5', 'HR Operation & GA'),
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
(157, '3', 'HSSE & Quality assurance'),
(158, '3', 'Treasury & Financing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Corporation','Head Office','RSU Kaliwates','RSU Bhakti Husada','Grup Klinik') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `kode`, `image`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Corporation', '', '6539682a2e2c3.jpg', 'corporation', '086c740eb282cdf4b4c9a94d5982277f', 'Corporation', '', '2023-03-20 17:00:00', '2023-03-20 17:00:00'),
(2, 'Head Office', 'HO', '660fc144e67b1.png', 'headoffice', 'ba67c848e591f04e0ac1a53fc10971bb', 'Head Office', NULL, '2023-03-20 17:00:00', '2023-03-20 17:00:00'),
(3, 'RSU Kaliwates', 'RSUK', '653beac9c618a.jpg', 'rsukaliwates', 'bf48b4d3cfcde01f76e5fe1a20bb8d8b', 'RSU Kaliwates', NULL, '2023-03-20 17:00:00', '2023-03-27 17:00:00'),
(4, 'RSU Bhakti Husada', 'RSUBH', 'avatar-10.jpg', 'rsubhaktihusada', '066c8aa96a8eb6848ee9106be2b38491', 'RSU Bhakti Husada', NULL, '2023-03-20 17:00:00', '2023-04-15 17:00:00'),
(5, 'Grup Klinik', 'GK', '6628400436c7f.png', 'grupklinik', 'e1a2cb1a89b1dd37e057ae8eae56d0ed', 'Grup Klinik', NULL, '2023-03-20 17:00:00', '2023-04-15 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset_alatac`
--
ALTER TABLE `aset_alatac`
  ADD PRIMARY KEY (`id_alatac`);

--
-- Indexes for table `aset_alatkantor`
--
ALTER TABLE `aset_alatkantor`
  ADD PRIMARY KEY (`id_alatkantor`);

--
-- Indexes for table `aset_alatlift`
--
ALTER TABLE `aset_alatlift`
  ADD PRIMARY KEY (`id_alatlift`);

--
-- Indexes for table `aset_alatlistrik`
--
ALTER TABLE `aset_alatlistrik`
  ADD PRIMARY KEY (`id_alatlistrik`);

--
-- Indexes for table `aset_alatmedis`
--
ALTER TABLE `aset_alatmedis`
  ADD PRIMARY KEY (`id_alatmedis`);

--
-- Indexes for table `aset_alatmekanik`
--
ALTER TABLE `aset_alatmekanik`
  ADD PRIMARY KEY (`id_alatmekanik`);

--
-- Indexes for table `aset_alattelekomunikasi`
--
ALTER TABLE `aset_alattelekomunikasi`
  ADD PRIMARY KEY (`id_alattelekomunikasi`);

--
-- Indexes for table `aset_gedungdanbangunan`
--
ALTER TABLE `aset_gedungdanbangunan`
  ADD PRIMARY KEY (`id_gedungdanbangunan`);

--
-- Indexes for table `aset_kendaraandanambulance`
--
ALTER TABLE `aset_kendaraandanambulance`
  ADD PRIMARY KEY (`id_kendaraandanambulance`);

--
-- Indexes for table `aset_komputer`
--
ALTER TABLE `aset_komputer`
  ADD PRIMARY KEY (`id_komputer`);

--
-- Indexes for table `aset_tanah`
--
ALTER TABLE `aset_tanah`
  ADD PRIMARY KEY (`id_tanah`);

--
-- Indexes for table `inventaris_kendaraan`
--
ALTER TABLE `inventaris_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `inventaris_peralatanac`
--
ALTER TABLE `inventaris_peralatanac`
  ADD PRIMARY KEY (`id_peralatanac`);

--
-- Indexes for table `inventaris_peralatankantor`
--
ALTER TABLE `inventaris_peralatankantor`
  ADD PRIMARY KEY (`id_peralatankantor`);

--
-- Indexes for table `inventaris_peralatanlift`
--
ALTER TABLE `inventaris_peralatanlift`
  ADD PRIMARY KEY (`id_peralatanlift`);

--
-- Indexes for table `inventaris_peralatanmedis`
--
ALTER TABLE `inventaris_peralatanmedis`
  ADD PRIMARY KEY (`id_peralatanmedis`);

--
-- Indexes for table `inventaris_peralatanteknikinformatika`
--
ALTER TABLE `inventaris_peralatanteknikinformatika`
  ADD PRIMARY KEY (`id_peralatanteknikinformatika`);

--
-- Indexes for table `inventaris_peralatantekniklistrikdanmekanik`
--
ALTER TABLE `inventaris_peralatantekniklistrikdanmekanik`
  ADD PRIMARY KEY (`id_peralatantekniklistrikdanmekanik`);

--
-- Indexes for table `inventaris_peralatantelekomunikasi`
--
ALTER TABLE `inventaris_peralatantelekomunikasi`
  ADD PRIMARY KEY (`id_peralatantelekomunikasi`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
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
-- AUTO_INCREMENT for table `aset_alatac`
--
ALTER TABLE `aset_alatac`
  MODIFY `id_alatac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aset_alatkantor`
--
ALTER TABLE `aset_alatkantor`
  MODIFY `id_alatkantor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aset_alatlift`
--
ALTER TABLE `aset_alatlift`
  MODIFY `id_alatlift` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aset_alatlistrik`
--
ALTER TABLE `aset_alatlistrik`
  MODIFY `id_alatlistrik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aset_alatmedis`
--
ALTER TABLE `aset_alatmedis`
  MODIFY `id_alatmedis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aset_alatmekanik`
--
ALTER TABLE `aset_alatmekanik`
  MODIFY `id_alatmekanik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `aset_alattelekomunikasi`
--
ALTER TABLE `aset_alattelekomunikasi`
  MODIFY `id_alattelekomunikasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aset_gedungdanbangunan`
--
ALTER TABLE `aset_gedungdanbangunan`
  MODIFY `id_gedungdanbangunan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `aset_kendaraandanambulance`
--
ALTER TABLE `aset_kendaraandanambulance`
  MODIFY `id_kendaraandanambulance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aset_komputer`
--
ALTER TABLE `aset_komputer`
  MODIFY `id_komputer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aset_tanah`
--
ALTER TABLE `aset_tanah`
  MODIFY `id_tanah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventaris_kendaraan`
--
ALTER TABLE `inventaris_kendaraan`
  MODIFY `id_kendaraan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `inventaris_peralatanac`
--
ALTER TABLE `inventaris_peralatanac`
  MODIFY `id_peralatanac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventaris_peralatankantor`
--
ALTER TABLE `inventaris_peralatankantor`
  MODIFY `id_peralatankantor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventaris_peralatanlift`
--
ALTER TABLE `inventaris_peralatanlift`
  MODIFY `id_peralatanlift` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_peralatanmedis`
--
ALTER TABLE `inventaris_peralatanmedis`
  MODIFY `id_peralatanmedis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventaris_peralatanteknikinformatika`
--
ALTER TABLE `inventaris_peralatanteknikinformatika`
  MODIFY `id_peralatanteknikinformatika` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventaris_peralatantekniklistrikdanmekanik`
--
ALTER TABLE `inventaris_peralatantekniklistrikdanmekanik`
  MODIFY `id_peralatantekniklistrikdanmekanik` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_peralatantelekomunikasi`
--
ALTER TABLE `inventaris_peralatantelekomunikasi`
  MODIFY `id_peralatantelekomunikasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
