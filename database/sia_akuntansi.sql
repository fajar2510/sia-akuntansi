-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 06:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_akuntansi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(10) NOT NULL,
  `kode_akun` varchar(10) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `status` enum('Debit','Kredit') NOT NULL,
  `posisi` enum('Aktiva','Pasiva','-') NOT NULL,
  `laba_rugi` enum('N','T','B') NOT NULL,
  `pm` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `kode_akun`, `nama_akun`, `status`, `posisi`, `laba_rugi`, `pm`) VALUES
(24, 'AL-K', 'Kas', 'Debit', 'Aktiva', 'N', '0'),
(25, 'M-M', 'Modal', 'Kredit', 'Pasiva', 'N', '1'),
(26, 'AL-PK', 'Perlengkapan', 'Debit', 'Aktiva', 'N', '0'),
(29, 'AL-PB', 'Pembelian', 'Debit', 'Aktiva', 'N', '0'),
(30, 'P-PD', 'Pendapatan', 'Kredit', '-', 'T', '0'),
(31, 'KW-HD', 'Hutang dagang', 'Kredit', 'Pasiva', 'N', '0'),
(32, 'AL-PU', 'Piutang', 'Debit', 'Aktiva', 'N', '0'),
(33, 'M-PV', 'Prive', 'Debit', '-', 'N', '1'),
(37, 'BB1', 'Beban Gaji', 'Debit', '-', 'B', '0'),
(38, 'BB2', 'Beban LTA', 'Debit', '-', 'B', '0'),
(39, 'BB3', 'Beban serbi-serbi', 'Debit', '-', 'B', '0'),
(40, 'BB4', 'Beban Pajak', 'Debit', '-', 'B', '0');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `keuntungan`, `foto`) VALUES
(0, '', '', 0, 0, 0, ''),
(12, 'B0005', 'Meteran', 62000, 70000, 8000, 'meteran.jpg'),
(13, 'B0006', 'semen', 40000, 50000, 10000, 'semen.gresik.png'),
(14, 'B0007', 'asbes', 40000, 48500, 8500, 'asbes.png'),
(16, 'B0009', 'besi', 45000, 60000, 15000, 'besi_tulangan.png'),
(17, 'B0010', 'cat', 88000, 103000, 15000, 'cat_avian.jpg'),
(18, 'B0011', 'bendrat', 10000, 13500, 3500, 'bendrat.jpg'),
(19, 'B0012', 'pasir 1 truk', 1300000, 1560000, 260000, 'Truck-Pasir.png'),
(20, 'B0013', 'pasir 1 pick up', 450000, 522000, 72000, 'pasir_pickup.png'),
(21, 'B0014', 'coral (7 m3)', 2000000, 2380000, 380000, 'Batu-Koral-hujau.jpg'),
(22, 'B0015', 'paku (30 pcs)', 16000, 20000, 4000, 'paku.jpg'),
(24, 'B0017', 'lem', 13000, 16000, 3000, 'lem-kayu.jpg'),
(26, 'B0018', 'skrop', 58000, 65000, 7000, 'sekrup.jpg'),
(27, 'B0019', 'cetok', 25000, 28000, 3000, 'cetok.jpg'),
(28, 'B0020', 'palu', 42000, 58000, 16000, 'palu.jpg'),
(29, 'B0021', 'gerobak dorong', 500000, 535000, 35000, 'angkong.jpg'),
(30, 'B0022', 'timbo cor', 4000, 6000, 2000, 'timbor_cor.jpg'),
(31, 'B0023', 'obeng', 22000, 30000, 8000, 'obeng.jpg'),
(32, 'B0024', 'gergaji', 30000, 35000, 5000, 'gergaji.png'),
(33, 'B0025', 'selang 1 roll', 110000, 127000, 17000, 'selang-roll.png'),
(34, 'B0026', 'selang per meter', 2500, 4000, 1500, 'selang-meter.png'),
(35, 'B0027', 'waterpass', 47000, 55000, 8000, 'waterpass.png'),
(36, 'B0028', 'tatah', 29000, 32500, 3500, 'tatah.png'),
(37, 'B0029', 'ungkal', 25000, 30000, 5000, 'ungkal.png'),
(38, 'B0030', 'lot', 20000, 25000, 5000, 'lot.png'),
(39, 'F0031', 'engsel', 25000, 30000, 5000, 'engsel.jpg'),
(40, 'F0032', 'tarikan pintu', 49000, 55000, 6000, 'tarikan-pintu.jpg'),
(41, 'F0033', 'pitingan lampu', 6500, 8000, 1500, 'pitngan-lampu.jpg'),
(42, 'F0034', 'klem kabel', 3500, 5000, 1500, 'klem-kabel.png'),
(43, 'F0035', 'kabel 1 roll', 196000, 219000, 23000, 'kabel_gulung_kris.jpg'),
(44, 'F0036', 'kabel per meter', 4000, 5500, 1500, 'kabel-meter.jpg'),
(45, 'B0037', 'kuas tembok', 12000, 16500, 4500, 'kuas-tembok.jpg'),
(46, 'B0038', 'coral (m3)', 290000, 340000, 50000, 'koral-split-palu-perlengkapan-industri-13456685.jpg'),
(47, 'B0039', 'paku (15pcs)', 8000, 10000, 2000, 'Nails.jpg'),
(48, 'B0040', 'bolpoin', 1800, 2500, 700, 'bolpoin-ae7.jpg'),
(49, 'B0041', 'paku  (120pcs)', 64000, 80000, 16000, 'paku-ripet.jpg'),
(50, 'F0042', 'Tang Jepit', 7500, 8500, 1000, 'tang.jpg'),
(51, 'F0043', 'Sipat ukur tinta', 32500, 34000, 1500, 'sipat-tinta.jpg'),
(52, 'F0044', 'Tali senar warna', 26700, 28500, 1800, 'tali-senar.jpg'),
(53, 'F0045', 'Pensil Tukang', 3500, 4000, 500, 'PENSIL_TUKANG_KAYU___PENSIL_BANGUNAN_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `id_beban` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_beban` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`id_beban`, `id_akun`, `tanggal`, `kode_beban`, `keterangan`, `nominal`, `jumlah`, `total`) VALUES
(17, 37, '2019-01-03', 'L0001', 'Pembayaran Gaji Karyawan 2 orang', 1500000, 2, 3000000),
(18, 38, '2019-01-19', 'L0002', 'pembayaran Listrik , telepon , dan air ', 400000, 1, 400000),
(19, 40, '2019-01-31', 'L0003', 'Pembayaran Pajak', 500000, 1, 500000),
(20, 39, '2019-01-31', 'L0004', 'Beban pengiriman', 200000, 1, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `hutang_dagang`
--

CREATE TABLE `hutang_dagang` (
  `id_hutang_dagang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_hutang_dagang` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang_dagang`
--

INSERT INTO `hutang_dagang` (`id_hutang_dagang`, `id_barang`, `tanggal`, `kode_hutang_dagang`, `keterangan`, `harga`, `jumlah`, `total`) VALUES
(2, 13, '2019-01-29', 'P0032', 'Pembelian Barang DHONO JOYO  ', 40000, 300, 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_umum`
--

CREATE TABLE `jurnal_umum` (
  `id_jurnal` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_jurnal` varchar(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `debit` int(20) NOT NULL,
  `kredit` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_umum`
--

INSERT INTO `jurnal_umum` (`id_jurnal`, `id_akun`, `id_barang`, `tanggal`, `no_jurnal`, `keterangan`, `debit`, `kredit`) VALUES
(1119, 29, 13, '2019-01-01', 'P0001', 'Pembelian Barang DHONO JOYO  ', 12800000, 0),
(1120, 24, 13, '2019-01-01', 'P0001', 'Pembelian Barang DHONO JOYO  ', 0, 12800000),
(1121, 29, 19, '2019-01-02', 'P0002', 'Pembelian Barang DHONO JOYO  ', 2600000, 0),
(1122, 24, 19, '2019-01-02', 'P0002', 'Pembelian Barang DHONO JOYO  ', 0, 2600000),
(1123, 29, 21, '2019-01-02', 'P0003', 'Pembelian Barang DHONO JOYO  ', 2000000, 0),
(1124, 24, 21, '2019-01-02', 'P0003', 'Pembelian Barang DHONO JOYO  ', 0, 2000000),
(1125, 29, 22, '2019-01-02', 'P0004', 'Pembelian Barang DHONO JOYO  ', 64000, 0),
(1126, 24, 22, '2019-01-02', 'P0004', 'Pembelian Barang DHONO JOYO  ', 0, 64000),
(1127, 29, 39, '2019-01-03', 'P0005', 'Pembelian Barang DHONO JOYO  ', 750000, 0),
(1128, 24, 39, '2019-01-03', 'P0005', 'Pembelian Barang DHONO JOYO  ', 0, 750000),
(1129, 29, 30, '2019-01-03', 'P0006', 'Pembelian Barang DHONO JOYO  ', 200000, 0),
(1130, 24, 30, '2019-01-03', 'P0006', 'Pembelian Barang DHONO JOYO  ', 0, 200000),
(1131, 29, 12, '2019-01-03', 'P0007', 'Pembelian Barang DHONO JOYO  ', 1240000, 0),
(1132, 24, 12, '2019-01-03', 'P0007', 'Pembelian Barang DHONO JOYO  ', 0, 1240000),
(1133, 29, 39, '2019-01-03', 'P0008', 'Pembelian Barang DHONO JOYO  ', 750000, 0),
(1134, 24, 39, '2019-01-03', 'P0008', 'Pembelian Barang DHONO JOYO  ', 0, 750000),
(1135, 29, 14, '2019-01-06', 'P0009', 'Pembelian Barang DHONO JOYO  ', 2000000, 0),
(1136, 24, 14, '2019-01-06', 'P0009', 'Pembelian Barang DHONO JOYO  ', 0, 2000000),
(1137, 29, 16, '2019-01-06', 'P0010', 'Pembelian Barang DHONO JOYO  ', 2250000, 0),
(1138, 24, 16, '2019-01-06', 'P0010', 'Pembelian Barang DHONO JOYO  ', 0, 2250000),
(1139, 29, 43, '2019-01-06', 'P0011', 'Pembelian Barang DHONO JOYO  ', 980000, 0),
(1140, 24, 43, '2019-01-06', 'P0011', 'Pembelian Barang DHONO JOYO  ', 0, 980000),
(1141, 29, 45, '2019-01-06', 'P0012', 'Pembelian Barang DHONO JOYO  ', 24000, 0),
(1142, 24, 45, '2019-01-06', 'P0012', 'Pembelian Barang DHONO JOYO  ', 0, 24000),
(1143, 29, 17, '2019-01-11', 'P0013', 'Pembelian Barang DHONO JOYO  ', 2640000, 0),
(1144, 24, 17, '2019-01-11', 'P0013', 'Pembelian Barang DHONO JOYO  ', 0, 2640000),
(1145, 29, 18, '2019-01-11', 'P0014', 'Pembelian Barang DHONO JOYO  ', 100000, 0),
(1146, 24, 18, '2019-01-11', 'P0014', 'Pembelian Barang DHONO JOYO  ', 0, 100000),
(1147, 29, 24, '2019-01-11', 'P0015', 'Pembelian Barang DHONO JOYO  ', 1300000, 0),
(1148, 24, 24, '2019-01-11', 'P0015', 'Pembelian Barang DHONO JOYO  ', 0, 1300000),
(1149, 29, 26, '2019-01-11', 'P0016', 'Pembelian Barang DHONO JOYO  ', 696000, 0),
(1150, 24, 26, '2019-01-11', 'P0016', 'Pembelian Barang DHONO JOYO  ', 0, 696000),
(1151, 29, 26, '2019-01-14', 'P0017', 'Pembelian Barang DHONO JOYO  ', 1740000, 0),
(1152, 24, 26, '2019-01-14', 'P0017', 'Pembelian Barang DHONO JOYO  ', 0, 1740000),
(1153, 29, 27, '2019-01-14', 'P0018', 'Pembelian Barang DHONO JOYO  ', 750000, 0),
(1154, 24, 27, '2019-01-14', 'P0018', 'Pembelian Barang DHONO JOYO  ', 0, 750000),
(1155, 29, 28, '2019-01-14', 'P0019', 'Pembelian Barang DHONO JOYO  ', 1260000, 0),
(1156, 24, 28, '2019-01-14', 'P0019', 'Pembelian Barang DHONO JOYO  ', 0, 1260000),
(1157, 29, 29, '2019-01-15', 'P0020', 'Pembelian Barang DHONO JOYO  ', 2000000, 0),
(1158, 24, 29, '2019-01-15', 'P0020', 'Pembelian Barang DHONO JOYO  ', 0, 2000000),
(1159, 29, 31, '2019-01-15', 'P0021', 'Pembelian Barang DHONO JOYO  ', 1100000, 0),
(1160, 24, 31, '2019-01-15', 'P0021', 'Pembelian Barang DHONO JOYO  ', 0, 1100000),
(1161, 29, 32, '2019-01-15', 'P0022', 'Pembelian Barang DHONO JOYO  ', 900000, 0),
(1162, 24, 32, '2019-01-15', 'P0022', 'Pembelian Barang DHONO JOYO  ', 0, 900000),
(1163, 29, 34, '2019-01-15', 'P0023', 'Pembelian Barang DHONO JOYO  ', 250000, 0),
(1164, 24, 34, '2019-01-15', 'P0023', 'Pembelian Barang DHONO JOYO  ', 0, 250000),
(1165, 29, 35, '2019-01-15', 'P0024', 'Pembelian Barang DHONO JOYO  ', 1410000, 0),
(1166, 24, 35, '2019-01-15', 'P0024', 'Pembelian Barang DHONO JOYO  ', 0, 1410000),
(1167, 29, 35, '2019-01-20', 'P0025', 'Pembelian Barang DHONO JOYO  ', 1410000, 0),
(1168, 24, 35, '2019-01-20', 'P0025', 'Pembelian Barang DHONO JOYO  ', 0, 1410000),
(1169, 29, 36, '2019-01-20', 'P0026', 'Pembelian Barang DHONO JOYO  ', 870000, 0),
(1170, 24, 36, '2019-01-20', 'P0026', 'Pembelian Barang DHONO JOYO  ', 0, 870000),
(1171, 29, 38, '2019-01-20', 'P0027', 'Pembelian Barang DHONO JOYO  ', 600000, 0),
(1172, 24, 38, '2019-01-20', 'P0027', 'Pembelian Barang DHONO JOYO  ', 0, 600000),
(1175, 29, 41, '2019-01-24', 'P0029', 'Pembelian Barang DHONO JOYO  ', 325000, 0),
(1176, 24, 41, '2019-01-24', 'P0029', 'Pembelian Barang DHONO JOYO  ', 0, 325000),
(1177, 29, 42, '2019-01-24', 'P0030', 'Pembelian Barang DHONO JOYO  ', 105000, 0),
(1178, 24, 42, '2019-01-24', 'P0030', 'Pembelian Barang DHONO JOYO  ', 0, 105000),
(1179, 29, 45, '2019-01-24', 'P0031', 'Pembelian Barang DHONO JOYO  ', 600000, 0),
(1180, 24, 45, '2019-01-24', 'P0031', 'Pembelian Barang DHONO JOYO  ', 0, 600000),
(1181, 29, 13, '2019-01-29', 'P0032', 'Pembelian Barang DHONO JOYO  ', 12000000, 0),
(1182, 31, 13, '2019-01-29', 'P0032', 'Pembelian Barang DHONO JOYO  ', 0, 12000000),
(1183, 30, 17, '2019-01-01', 'J0001', 'Penjualan Barang DHONO JOYO  ', 0, 618000),
(1184, 24, 17, '2019-01-01', 'J0001', 'Penjualan Barang DHONO JOYO  ', 618000, 0),
(1185, 30, 31, '2019-01-01', 'J0002', 'Penjualan Barang DHONO JOYO  ', 0, 30000),
(1186, 24, 31, '2019-01-01', 'J0002', 'Penjualan Barang DHONO JOYO  ', 30000, 0),
(1187, 30, 45, '2019-01-01', 'J0003', 'Penjualan Barang DHONO JOYO  ', 0, 33000),
(1188, 24, 45, '2019-01-01', 'J0003', 'Penjualan Barang DHONO JOYO  ', 33000, 0),
(1189, 30, 34, '2019-01-01', 'J0004', 'Penjualan Barang DHONO JOYO  ', 0, 40000),
(1190, 24, 34, '2019-01-01', 'J0004', 'Penjualan Barang DHONO JOYO  ', 40000, 0),
(1191, 25, 0, '2019-01-01', 'A0001', 'Setoran Pemilik', 0, 50000000),
(1192, 24, 0, '2019-01-01', 'A0001', 'Setoran Pemilik', 50000000, 0),
(1193, 30, 13, '2019-01-01', 'J0005', 'Penjualan Barang DHONO JOYO  ', 0, 150000),
(1194, 24, 13, '2019-01-01', 'J0005', 'Penjualan Barang DHONO JOYO  ', 150000, 0),
(1195, 30, 32, '2019-01-02', 'J0006', 'Penjualan Barang DHONO JOYO  ', 0, 70000),
(1196, 24, 32, '2019-01-02', 'J0006', 'Penjualan Barang DHONO JOYO  ', 70000, 0),
(1197, 30, 16, '2019-01-02', 'J0007', 'Penjualan Barang DHONO JOYO  ', 0, 600000),
(1198, 24, 16, '2019-01-02', 'J0007', 'Penjualan Barang DHONO JOYO  ', 600000, 0),
(1199, 30, 22, '2019-01-02', 'J0008', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1200, 24, 22, '2019-01-02', 'J0008', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1201, 30, 38, '2019-01-02', 'J0009', 'Penjualan Barang DHONO JOYO  ', 0, 25000),
(1202, 24, 38, '2019-01-02', 'J0009', 'Penjualan Barang DHONO JOYO  ', 25000, 0),
(1203, 30, 14, '2019-01-03', 'J0010', 'Penjualan Barang DHONO JOYO  ', 0, 485000),
(1204, 24, 14, '2019-01-03', 'J0010', 'Penjualan Barang DHONO JOYO  ', 485000, 0),
(1205, 30, 29, '2019-01-03', 'J0011', 'Penjualan Barang DHONO JOYO  ', 0, 535000),
(1206, 24, 29, '2019-01-03', 'J0011', 'Penjualan Barang DHONO JOYO  ', 535000, 0),
(1207, 30, 42, '2019-01-03', 'J0012', 'Penjualan Barang DHONO JOYO  ', 0, 10000),
(1208, 24, 42, '2019-01-03', 'J0012', 'Penjualan Barang DHONO JOYO  ', 10000, 0),
(1209, 30, 26, '2019-01-03', 'J0013', 'Penjualan Barang DHONO JOYO  ', 0, 195000),
(1210, 24, 26, '2019-01-03', 'J0013', 'Penjualan Barang DHONO JOYO  ', 195000, 0),
(1211, 30, 48, '2019-01-03', 'J0014', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1212, 24, 48, '2019-01-03', 'J0014', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1215, 30, 24, '2019-01-05', 'J0016', 'Penjualan Barang DHONO JOYO  ', 0, 160000),
(1216, 24, 24, '2019-01-05', 'J0016', 'Penjualan Barang DHONO JOYO  ', 160000, 0),
(1217, 30, 20, '2019-01-05', 'J0017', 'Penjualan Barang DHONO JOYO  ', 0, 522000),
(1218, 24, 20, '2019-01-05', 'J0017', 'Penjualan Barang DHONO JOYO  ', 522000, 0),
(1219, 30, 46, '2019-01-05', 'J0018', 'Penjualan Barang DHONO JOYO  ', 0, 340000),
(1220, 24, 46, '2019-01-05', 'J0018', 'Penjualan Barang DHONO JOYO  ', 340000, 0),
(1221, 30, 36, '2019-01-05', 'J0019', 'Penjualan Barang DHONO JOYO  ', 0, 162500),
(1222, 24, 36, '2019-01-05', 'J0019', 'Penjualan Barang DHONO JOYO  ', 162500, 0),
(1223, 30, 48, '2019-01-05', 'J0020', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1224, 24, 48, '2019-01-05', 'J0020', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1225, 30, 35, '2019-01-06', 'J0021', 'Penjualan Barang DHONO JOYO  ', 0, 55000),
(1226, 24, 35, '2019-01-06', 'J0021', 'Penjualan Barang DHONO JOYO  ', 55000, 0),
(1227, 30, 28, '2019-01-06', 'J0022', 'Penjualan Barang DHONO JOYO  ', 0, 58000),
(1228, 24, 28, '2019-01-06', 'J0022', 'Penjualan Barang DHONO JOYO  ', 58000, 0),
(1229, 30, 27, '2019-01-06', 'J0023', 'Penjualan Barang DHONO JOYO  ', 0, 28000),
(1230, 24, 27, '2019-01-06', 'J0023', 'Penjualan Barang DHONO JOYO  ', 28000, 0),
(1231, 30, 18, '2019-01-06', 'J0024', 'Penjualan Barang DHONO JOYO  ', 0, 13500),
(1232, 24, 18, '2019-01-06', 'J0024', 'Penjualan Barang DHONO JOYO  ', 13500, 0),
(1233, 30, 37, '2019-01-07', 'J0025', 'Penjualan Barang DHONO JOYO  ', 0, 30000),
(1234, 24, 37, '2019-01-07', 'J0025', 'Penjualan Barang DHONO JOYO  ', 30000, 0),
(1235, 30, 44, '2019-01-07', 'J0026', 'Penjualan Barang DHONO JOYO  ', 0, 44000),
(1236, 24, 44, '2019-01-07', 'J0026', 'Penjualan Barang DHONO JOYO  ', 44000, 0),
(1237, 30, 39, '2019-01-07', 'J0027', 'Penjualan Barang DHONO JOYO  ', 0, 60000),
(1238, 24, 39, '2019-01-07', 'J0027', 'Penjualan Barang DHONO JOYO  ', 60000, 0),
(1239, 30, 24, '2019-01-07', 'J0028', 'Penjualan Barang DHONO JOYO  ', 0, 48000),
(1240, 24, 24, '2019-01-07', 'J0028', 'Penjualan Barang DHONO JOYO  ', 48000, 0),
(1241, 30, 41, '2019-01-07', 'J0029', 'Penjualan Barang DHONO JOYO  ', 0, 24000),
(1242, 24, 41, '2019-01-07', 'J0029', 'Penjualan Barang DHONO JOYO  ', 24000, 0),
(1243, 30, 31, '2019-01-07', 'J0030', 'Penjualan Barang DHONO JOYO  ', 0, 150000),
(1244, 24, 31, '2019-01-07', 'J0030', 'Penjualan Barang DHONO JOYO  ', 150000, 0),
(1245, 30, 38, '2019-01-08', 'J0031', 'Penjualan Barang DHONO JOYO  ', 0, 100000),
(1246, 24, 38, '2019-01-08', 'J0031', 'Penjualan Barang DHONO JOYO  ', 100000, 0),
(1247, 30, 17, '2019-01-08', 'J0032', 'Penjualan Barang DHONO JOYO  ', 0, 206000),
(1248, 24, 17, '2019-01-08', 'J0032', 'Penjualan Barang DHONO JOYO  ', 206000, 0),
(1249, 30, 34, '2019-01-08', 'J0033', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1250, 24, 34, '2019-01-08', 'J0033', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1251, 30, 12, '2019-01-08', 'J0034', 'Penjualan Barang DHONO JOYO  ', 0, 70000),
(1252, 24, 12, '2019-01-08', 'J0034', 'Penjualan Barang DHONO JOYO  ', 70000, 0),
(1253, 30, 36, '2019-01-08', 'J0035', 'Penjualan Barang DHONO JOYO  ', 0, 65000),
(1254, 24, 36, '2019-01-08', 'J0035', 'Penjualan Barang DHONO JOYO  ', 65000, 0),
(1255, 30, 26, '2019-01-09', 'J0036', 'Penjualan Barang DHONO JOYO  ', 0, 65000),
(1256, 24, 26, '2019-01-09', 'J0036', 'Penjualan Barang DHONO JOYO  ', 65000, 0),
(1257, 30, 27, '2019-01-09', 'J0037', 'Penjualan Barang DHONO JOYO  ', 0, 28000),
(1258, 24, 27, '2019-01-09', 'J0037', 'Penjualan Barang DHONO JOYO  ', 28000, 0),
(1259, 30, 28, '2019-01-09', 'J0038', 'Penjualan Barang DHONO JOYO  ', 0, 58000),
(1260, 24, 28, '2019-01-09', 'J0038', 'Penjualan Barang DHONO JOYO  ', 58000, 0),
(1261, 30, 13, '2019-01-10', 'J0039', 'Penjualan Barang DHONO JOYO  ', 0, 600000),
(1262, 24, 13, '2019-01-10', 'J0039', 'Penjualan Barang DHONO JOYO  ', 600000, 0),
(1265, 30, 20, '2019-01-10', 'J0041', 'Penjualan Barang DHONO JOYO  ', 0, 522000),
(1266, 24, 20, '2019-01-10', 'J0041', 'Penjualan Barang DHONO JOYO  ', 522000, 0),
(1267, 30, 46, '2019-01-10', 'J0042', 'Penjualan Barang DHONO JOYO  ', 0, 1020000),
(1268, 24, 46, '2019-01-10', 'J0042', 'Penjualan Barang DHONO JOYO  ', 1020000, 0),
(1269, 30, 16, '2019-01-10', 'J0043', 'Penjualan Barang DHONO JOYO  ', 0, 600000),
(1270, 24, 16, '2019-01-10', 'J0043', 'Penjualan Barang DHONO JOYO  ', 600000, 0),
(1271, 30, 14, '2019-01-10', 'J0044', 'Penjualan Barang DHONO JOYO  ', 0, 388000),
(1272, 24, 14, '2019-01-10', 'J0044', 'Penjualan Barang DHONO JOYO  ', 388000, 0),
(1273, 30, 48, '2019-01-10', 'J0045', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1274, 24, 48, '2019-01-10', 'J0045', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1275, 30, 32, '2019-01-11', 'J0046', 'Penjualan Barang DHONO JOYO  ', 0, 35000),
(1276, 24, 32, '2019-01-11', 'J0046', 'Penjualan Barang DHONO JOYO  ', 35000, 0),
(1277, 30, 30, '2019-01-11', 'J0047', 'Penjualan Barang DHONO JOYO  ', 0, 24000),
(1278, 24, 30, '2019-01-11', 'J0047', 'Penjualan Barang DHONO JOYO  ', 24000, 0),
(1279, 30, 22, '2019-01-11', 'J0048', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1280, 24, 22, '2019-01-11', 'J0048', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1281, 30, 35, '2019-01-12', 'J0049', 'Penjualan Barang DHONO JOYO  ', 0, 55000),
(1282, 24, 35, '2019-01-12', 'J0049', 'Penjualan Barang DHONO JOYO  ', 55000, 0),
(1283, 30, 37, '2019-01-12', 'J0050', 'Penjualan Barang DHONO JOYO  ', 0, 30000),
(1284, 24, 37, '2019-01-12', 'J0050', 'Penjualan Barang DHONO JOYO  ', 30000, 0),
(1285, 30, 39, '2019-01-13', 'J0051', 'Penjualan Barang DHONO JOYO  ', 0, 120000),
(1286, 24, 39, '2019-01-13', 'J0051', 'Penjualan Barang DHONO JOYO  ', 120000, 0),
(1289, 30, 40, '2019-01-13', 'J0052', 'Penjualan Barang DHONO JOYO  ', 0, 110000),
(1290, 24, 40, '2019-01-13', 'J0052', 'Penjualan Barang DHONO JOYO  ', 110000, 0),
(1291, 30, 41, '2019-01-14', 'J0053', 'Penjualan Barang DHONO JOYO  ', 0, 16000),
(1292, 24, 41, '2019-01-14', 'J0053', 'Penjualan Barang DHONO JOYO  ', 16000, 0),
(1293, 30, 42, '2019-01-14', 'J0054', 'Penjualan Barang DHONO JOYO  ', 0, 10000),
(1294, 24, 42, '2019-01-14', 'J0054', 'Penjualan Barang DHONO JOYO  ', 10000, 0),
(1297, 30, 44, '2019-01-14', 'J0056', 'Penjualan Barang DHONO JOYO  ', 0, 33000),
(1298, 24, 44, '2019-01-14', 'J0056', 'Penjualan Barang DHONO JOYO  ', 33000, 0),
(1299, 30, 44, '2019-01-15', 'J0057', 'Penjualan Barang DHONO JOYO  ', 0, 22000),
(1300, 24, 44, '2019-01-15', 'J0057', 'Penjualan Barang DHONO JOYO  ', 22000, 0),
(1301, 30, 20, '2019-01-15', 'J0058', 'Penjualan Barang DHONO JOYO  ', 0, 1044000),
(1302, 24, 20, '2019-01-15', 'J0058', 'Penjualan Barang DHONO JOYO  ', 1044000, 0),
(1303, 30, 17, '2019-01-15', 'J0059', 'Penjualan Barang DHONO JOYO  ', 0, 515000),
(1304, 24, 17, '2019-01-15', 'J0059', 'Penjualan Barang DHONO JOYO  ', 515000, 0),
(1305, 30, 22, '2019-01-15', 'J0060', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1306, 24, 22, '2019-01-15', 'J0060', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1307, 30, 24, '2019-01-15', 'J0061', 'Penjualan Barang DHONO JOYO  ', 0, 32000),
(1308, 24, 24, '2019-01-15', 'J0061', 'Penjualan Barang DHONO JOYO  ', 32000, 0),
(1309, 30, 13, '2019-01-16', 'J0062', 'Penjualan Barang DHONO JOYO  ', 0, 350000),
(1310, 24, 13, '2019-01-16', 'J0062', 'Penjualan Barang DHONO JOYO  ', 350000, 0),
(1311, 30, 46, '2019-01-16', 'J0063', 'Penjualan Barang DHONO JOYO  ', 0, 680000),
(1312, 24, 46, '2019-01-16', 'J0063', 'Penjualan Barang DHONO JOYO  ', 680000, 0),
(1313, 30, 14, '2019-01-16', 'J0064', 'Penjualan Barang DHONO JOYO  ', 0, 485000),
(1314, 24, 14, '2019-01-16', 'J0064', 'Penjualan Barang DHONO JOYO  ', 485000, 0),
(1315, 30, 16, '2019-01-16', 'J0065', 'Penjualan Barang DHONO JOYO  ', 0, 600000),
(1316, 24, 16, '2019-01-16', 'J0065', 'Penjualan Barang DHONO JOYO  ', 600000, 0),
(1317, 30, 18, '2019-01-16', 'J0066', 'Penjualan Barang DHONO JOYO  ', 0, 27000),
(1318, 24, 18, '2019-01-16', 'J0066', 'Penjualan Barang DHONO JOYO  ', 27000, 0),
(1319, 30, 48, '2019-01-16', 'J0067', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1320, 24, 48, '2019-01-16', 'J0067', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1321, 30, 26, '2019-01-17', 'J0068', 'Penjualan Barang DHONO JOYO  ', 0, 195000),
(1322, 24, 26, '2019-01-17', 'J0068', 'Penjualan Barang DHONO JOYO  ', 195000, 0),
(1323, 30, 45, '2019-01-17', 'J0069', 'Penjualan Barang DHONO JOYO  ', 0, 16500),
(1324, 24, 45, '2019-01-17', 'J0069', 'Penjualan Barang DHONO JOYO  ', 16500, 0),
(1325, 30, 41, '2019-01-17', 'J0070', 'Penjualan Barang DHONO JOYO  ', 0, 16000),
(1326, 24, 41, '2019-01-17', 'J0070', 'Penjualan Barang DHONO JOYO  ', 16000, 0),
(1327, 30, 39, '2019-01-17', 'J0071', 'Penjualan Barang DHONO JOYO  ', 0, 60000),
(1328, 24, 39, '2019-01-17', 'J0071', 'Penjualan Barang DHONO JOYO  ', 60000, 0),
(1329, 30, 38, '2019-01-17', 'J0072', 'Penjualan Barang DHONO JOYO  ', 0, 75000),
(1330, 24, 38, '2019-01-17', 'J0072', 'Penjualan Barang DHONO JOYO  ', 75000, 0),
(1331, 30, 16, '2019-01-18', 'J0073', 'Penjualan Barang DHONO JOYO  ', 0, 360000),
(1332, 24, 16, '2019-01-18', 'J0073', 'Penjualan Barang DHONO JOYO  ', 360000, 0),
(1333, 30, 17, '2019-01-18', 'J0074', 'Penjualan Barang DHONO JOYO  ', 0, 309000),
(1334, 24, 17, '2019-01-18', 'J0074', 'Penjualan Barang DHONO JOYO  ', 309000, 0),
(1335, 30, 31, '2019-01-19', 'J0075', 'Penjualan Barang DHONO JOYO  ', 0, 60000),
(1336, 24, 31, '2019-01-19', 'J0075', 'Penjualan Barang DHONO JOYO  ', 60000, 0),
(1337, 30, 12, '2019-01-19', 'J0076', 'Penjualan Barang DHONO JOYO  ', 0, 70000),
(1338, 24, 12, '2019-01-19', 'J0076', 'Penjualan Barang DHONO JOYO  ', 70000, 0),
(1339, 30, 34, '2019-01-19', 'J0077', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1340, 24, 34, '2019-01-19', 'J0077', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1341, 30, 44, '2019-01-19', 'J0078', 'Penjualan Barang DHONO JOYO  ', 0, 110000),
(1342, 24, 44, '2019-01-19', 'J0078', 'Penjualan Barang DHONO JOYO  ', 110000, 0),
(1343, 30, 44, '2019-01-20', 'J0079', 'Penjualan Barang DHONO JOYO  ', 0, 55000),
(1344, 24, 44, '2019-01-20', 'J0079', 'Penjualan Barang DHONO JOYO  ', 55000, 0),
(1345, 30, 42, '2019-01-20', 'J0080', 'Penjualan Barang DHONO JOYO  ', 0, 5000),
(1346, 24, 42, '2019-01-20', 'J0080', 'Penjualan Barang DHONO JOYO  ', 5000, 0),
(1347, 30, 40, '2019-01-20', 'J0081', 'Penjualan Barang DHONO JOYO  ', 0, 110000),
(1348, 24, 40, '2019-01-20', 'J0081', 'Penjualan Barang DHONO JOYO  ', 110000, 0),
(1349, 30, 36, '2019-01-20', 'J0082', 'Penjualan Barang DHONO JOYO  ', 0, 32500),
(1350, 24, 36, '2019-01-20', 'J0082', 'Penjualan Barang DHONO JOYO  ', 32500, 0),
(1351, 30, 27, '2019-01-21', 'J0083', 'Penjualan Barang DHONO JOYO  ', 0, 28000),
(1352, 24, 27, '2019-01-21', 'J0083', 'Penjualan Barang DHONO JOYO  ', 28000, 0),
(1353, 30, 28, '2019-01-21', 'J0084', 'Penjualan Barang DHONO JOYO  ', 0, 174000),
(1354, 24, 28, '2019-01-21', 'J0084', 'Penjualan Barang DHONO JOYO  ', 174000, 0),
(1355, 30, 35, '2019-01-21', 'J0085', 'Penjualan Barang DHONO JOYO  ', 0, 110000),
(1356, 24, 35, '2019-01-21', 'J0085', 'Penjualan Barang DHONO JOYO  ', 110000, 0),
(1357, 30, 20, '2019-01-22', 'J0086', 'Penjualan Barang DHONO JOYO  ', 0, 1044000),
(1358, 24, 20, '2019-01-22', 'J0086', 'Penjualan Barang DHONO JOYO  ', 1044000, 0),
(1359, 30, 24, '2019-01-22', 'J0087', 'Penjualan Barang DHONO JOYO  ', 0, 32000),
(1360, 24, 24, '2019-01-22', 'J0087', 'Penjualan Barang DHONO JOYO  ', 32000, 0),
(1361, 30, 48, '2019-01-22', 'J0088', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1362, 24, 48, '2019-01-22', 'J0088', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1363, 30, 46, '2019-01-23', 'J0089', 'Penjualan Barang DHONO JOYO  ', 0, 1020000),
(1364, 24, 46, '2019-01-23', 'J0089', 'Penjualan Barang DHONO JOYO  ', 1020000, 0),
(1365, 30, 29, '2019-01-23', 'J0090', 'Penjualan Barang DHONO JOYO  ', 0, 535000),
(1366, 24, 29, '2019-01-23', 'J0090', 'Penjualan Barang DHONO JOYO  ', 535000, 0),
(1367, 30, 17, '2019-01-23', 'J0091', 'Penjualan Barang DHONO JOYO  ', 0, 412000),
(1368, 24, 17, '2019-01-23', 'J0091', 'Penjualan Barang DHONO JOYO  ', 412000, 0),
(1369, 30, 48, '2019-01-23', 'J0092', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1370, 24, 48, '2019-01-23', 'J0092', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1371, 30, 30, '2019-01-24', 'J0093', 'Penjualan Barang DHONO JOYO  ', 0, 72000),
(1372, 24, 30, '2019-01-24', 'J0093', 'Penjualan Barang DHONO JOYO  ', 72000, 0),
(1373, 30, 12, '2019-01-24', 'J0094', 'Penjualan Barang DHONO JOYO  ', 0, 140000),
(1374, 24, 12, '2019-01-24', 'J0094', 'Penjualan Barang DHONO JOYO  ', 140000, 0),
(1375, 30, 31, '2019-01-24', 'J0095', 'Penjualan Barang DHONO JOYO  ', 0, 30000),
(1376, 24, 31, '2019-01-24', 'J0095', 'Penjualan Barang DHONO JOYO  ', 30000, 0),
(1379, 30, 13, '2019-01-25', 'J0096', 'Penjualan Barang DHONO JOYO  ', 0, 7500000),
(1380, 32, 13, '2019-01-25', 'J0096', 'Penjualan Barang DHONO JOYO  ', 7500000, 0),
(1381, 30, 48, '2019-01-25', 'J0097', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1382, 24, 48, '2019-01-25', 'J0097', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1383, 30, 38, '2019-01-26', 'J0098', 'Penjualan Barang DHONO JOYO  ', 0, 25000),
(1384, 24, 38, '2019-01-26', 'J0098', 'Penjualan Barang DHONO JOYO  ', 25000, 0),
(1385, 30, 45, '2019-01-26', 'J0099', 'Penjualan Barang DHONO JOYO  ', 0, 33000),
(1386, 24, 45, '2019-01-26', 'J0099', 'Penjualan Barang DHONO JOYO  ', 33000, 0),
(1387, 30, 34, '2019-01-26', 'J0100', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1388, 24, 34, '2019-01-26', 'J0100', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1389, 30, 28, '2019-01-26', 'J0101', 'Penjualan Barang DHONO JOYO  ', 0, 58000),
(1390, 24, 28, '2019-01-26', 'J0101', 'Penjualan Barang DHONO JOYO  ', 58000, 0),
(1393, 30, 27, '2019-01-27', 'J0103', 'Penjualan Barang DHONO JOYO  ', 0, 56000),
(1394, 24, 27, '2019-01-27', 'J0103', 'Penjualan Barang DHONO JOYO  ', 56000, 0),
(1395, 30, 47, '2019-01-27', 'J0104', 'Penjualan Barang DHONO JOYO  ', 0, 10000),
(1396, 24, 47, '2019-01-27', 'J0104', 'Penjualan Barang DHONO JOYO  ', 10000, 0),
(1397, 30, 13, '2019-01-27', 'J0105', 'Penjualan Barang DHONO JOYO  ', 0, 250000),
(1398, 24, 13, '2019-01-27', 'J0105', 'Penjualan Barang DHONO JOYO  ', 250000, 0),
(1399, 30, 13, '2019-01-28', 'J0106', 'Penjualan Barang DHONO JOYO  ', 0, 250000),
(1400, 24, 13, '2019-01-28', 'J0106', 'Penjualan Barang DHONO JOYO  ', 250000, 0),
(1401, 30, 18, '2019-01-28', 'J0107', 'Penjualan Barang DHONO JOYO  ', 0, 40500),
(1402, 24, 18, '2019-01-28', 'J0107', 'Penjualan Barang DHONO JOYO  ', 40500, 0),
(1403, 30, 44, '2019-01-28', 'J0108', 'Penjualan Barang DHONO JOYO  ', 0, 55000),
(1404, 24, 44, '2019-01-28', 'J0108', 'Penjualan Barang DHONO JOYO  ', 55000, 0),
(1405, 30, 17, '2019-01-28', 'J0109', 'Penjualan Barang DHONO JOYO  ', 0, 206000),
(1406, 24, 17, '2019-01-28', 'J0109', 'Penjualan Barang DHONO JOYO  ', 206000, 0),
(1407, 30, 13, '2019-01-29', 'J0110', 'Penjualan Barang DHONO JOYO  ', 0, 10000000),
(1408, 24, 13, '2019-01-29', 'J0110', 'Penjualan Barang DHONO JOYO  ', 10000000, 0),
(1409, 30, 48, '2019-01-29', 'J0111', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1410, 24, 48, '2019-01-29', 'J0111', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1413, 30, 36, '2019-01-30', 'J0113', 'Penjualan Barang DHONO JOYO  ', 0, 65000),
(1414, 24, 36, '2019-01-30', 'J0113', 'Penjualan Barang DHONO JOYO  ', 65000, 0),
(1415, 30, 27, '2019-01-30', 'J0114', 'Penjualan Barang DHONO JOYO  ', 0, 56000),
(1416, 24, 27, '2019-01-30', 'J0114', 'Penjualan Barang DHONO JOYO  ', 56000, 0),
(1417, 30, 34, '2019-01-30', 'J0115', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1418, 24, 34, '2019-01-30', 'J0115', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1419, 30, 14, '2019-01-31', 'J0116', 'Penjualan Barang DHONO JOYO  ', 0, 970000),
(1420, 24, 14, '2019-01-31', 'J0116', 'Penjualan Barang DHONO JOYO  ', 970000, 0),
(1421, 30, 16, '2019-01-31', 'J0117', 'Penjualan Barang DHONO JOYO  ', 0, 1200000),
(1422, 24, 16, '2019-01-31', 'J0117', 'Penjualan Barang DHONO JOYO  ', 1200000, 0),
(1423, 30, 48, '2019-01-31', 'J0118', 'Penjualan Barang DHONO JOYO  ', 0, 20000),
(1424, 24, 48, '2019-01-31', 'J0118', 'Penjualan Barang DHONO JOYO  ', 20000, 0),
(1425, 26, 0, '2019-01-10', 'K0001', 'pembelian kantong plastik', 200000, 0),
(1426, 24, 0, '2019-01-10', 'K0001', 'pembelian kantong plastik', 0, 200000),
(1427, 26, 0, '2019-01-11', 'K0002', 'pembelian nota dan ATK', 50000, 0),
(1428, 24, 0, '2019-01-11', 'K0002', 'pembelian nota dan ATK', 0, 50000),
(1429, 37, 0, '2019-01-03', 'L0001', 'Pembayaran Gaji Karyawan 2 orang', 3000000, 0),
(1430, 24, 0, '2019-01-03', 'L0001', 'Pembayaran Gaji Karyawan 2 orang', 0, 3000000),
(1431, 38, 0, '2019-01-19', 'L0002', 'pembayaran Listrik , telepon , dan air ', 400000, 0),
(1432, 24, 0, '2019-01-19', 'L0002', 'pembayaran Listrik , telepon , dan air ', 0, 400000),
(1433, 40, 0, '2019-01-31', 'L0003', 'Pembayaran Pajak', 500000, 0),
(1434, 24, 0, '2019-01-31', 'L0003', 'Pembayaran Pajak', 0, 500000),
(1435, 39, 0, '2019-01-31', 'L0004', 'Beban pengiriman', 200000, 0),
(1436, 24, 0, '2019-01-31', 'L0004', 'Beban pengiriman', 0, 200000),
(1437, 33, 0, '2019-01-15', 'PR0001', 'Pembayaran SPP sekolah', 500000, 0),
(1438, 24, 0, '2019-01-15', 'PR0001', 'Pembayaran SPP sekolah', 0, 500000),
(1439, 33, 0, '2019-01-27', 'PR0001', 'pembayaran berobat', 300000, 0),
(1440, 24, 0, '2019-01-27', 'PR0001', 'pembayaran berobat', 0, 300000),
(1441, 30, 40, '2019-01-04', 'J0119', 'Penjualan Barang DHONO JOYO  ', 0, 55000),
(1442, 24, 40, '2019-01-04', 'J0119', 'Penjualan Barang DHONO JOYO  ', 55000, 0),
(1443, 30, 45, '2019-01-14', 'J0120', 'Penjualan Barang DHONO JOYO  ', 0, 33000),
(1444, 24, 45, '2019-01-14', 'J0120', 'Penjualan Barang DHONO JOYO  ', 33000, 0),
(1445, 29, 40, '2019-01-20', 'P0033', 'Pembelian Barang DHONO JOYO  ', 1470000, 0),
(1446, 24, 40, '2019-01-20', 'P0033', 'Pembelian Barang DHONO JOYO  ', 0, 1470000),
(1447, 30, 32, '2019-01-26', 'J0121', 'Penjualan Barang DHONO JOYO  ', 0, 35000),
(1448, 24, 32, '2019-01-26', 'J0121', 'Penjualan Barang DHONO JOYO  ', 35000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `id_modal` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `kode_modal` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan_kas` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`id_modal`, `id_akun`, `kode_modal`, `tanggal`, `keterangan_kas`, `nominal`) VALUES
(34, 25, 'A0001', '2019-01-01', 'Setoran Pemilik', 50000000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `kode_transaksi_pembelian` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `harga_beli` int(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status_beli` enum('Tunai','Kredit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_barang`, `id_akun`, `id_supplier`, `kode_transaksi_pembelian`, `tanggal`, `keterangan`, `harga_beli`, `jumlah`, `total`, `status_beli`) VALUES
(156, 13, 29, 6, 'P0001', '2019-01-01', 'Pembelian Barang DHONO JOYO  ', 40000, 320, 12800000, 'Tunai'),
(157, 19, 29, 9, 'P0002', '2019-01-02', 'Pembelian Barang DHONO JOYO  ', 1300000, 2, 2600000, 'Tunai'),
(158, 21, 29, 10, 'P0003', '2019-01-02', 'Pembelian Barang DHONO JOYO  ', 2000000, 1, 2000000, 'Tunai'),
(159, 22, 29, 12, 'P0004', '2019-01-02', 'Pembelian Barang DHONO JOYO  ', 16000, 4, 64000, 'Tunai'),
(160, 39, 29, 25, 'P0005', '2019-01-03', 'Pembelian Barang DHONO JOYO  ', 25000, 30, 750000, 'Tunai'),
(161, 30, 29, 19, 'P0006', '2019-01-03', 'Pembelian Barang DHONO JOYO  ', 4000, 50, 200000, 'Tunai'),
(162, 12, 29, 16, 'P0007', '2019-01-03', 'Pembelian Barang DHONO JOYO  ', 62000, 20, 1240000, 'Tunai'),
(163, 39, 29, 16, 'P0008', '2019-01-03', 'Pembelian Barang DHONO JOYO  ', 25000, 30, 750000, 'Tunai'),
(164, 14, 29, 7, 'P0009', '2019-01-06', 'Pembelian Barang DHONO JOYO  ', 40000, 50, 2000000, 'Tunai'),
(165, 16, 29, 8, 'P0010', '2019-01-06', 'Pembelian Barang DHONO JOYO  ', 45000, 50, 2250000, 'Tunai'),
(166, 43, 29, 29, 'P0011', '2019-01-06', 'Pembelian Barang DHONO JOYO  ', 196000, 5, 980000, 'Tunai'),
(167, 45, 29, 30, 'P0012', '2019-01-06', 'Pembelian Barang DHONO JOYO  ', 12000, 2, 24000, 'Tunai'),
(168, 17, 29, 11, 'P0013', '2019-01-11', 'Pembelian Barang DHONO JOYO  ', 88000, 30, 2640000, 'Tunai'),
(169, 18, 29, 13, 'P0014', '2019-01-11', 'Pembelian Barang DHONO JOYO  ', 10000, 10, 100000, 'Tunai'),
(170, 24, 29, 14, 'P0015', '2019-01-11', 'Pembelian Barang DHONO JOYO  ', 13000, 100, 1300000, 'Tunai'),
(171, 26, 29, 15, 'P0016', '2019-01-11', 'Pembelian Barang DHONO JOYO  ', 58000, 12, 696000, 'Tunai'),
(172, 26, 29, 15, 'P0017', '2019-01-14', 'Pembelian Barang DHONO JOYO  ', 58000, 30, 1740000, 'Tunai'),
(173, 27, 29, 16, 'P0018', '2019-01-14', 'Pembelian Barang DHONO JOYO  ', 25000, 30, 750000, 'Tunai'),
(174, 28, 29, 17, 'P0019', '2019-01-14', 'Pembelian Barang DHONO JOYO  ', 42000, 30, 1260000, 'Tunai'),
(175, 29, 29, 18, 'P0020', '2019-01-15', 'Pembelian Barang DHONO JOYO  ', 500000, 4, 2000000, 'Tunai'),
(176, 31, 29, 20, 'P0021', '2019-01-15', 'Pembelian Barang DHONO JOYO  ', 22000, 50, 1100000, 'Tunai'),
(177, 32, 29, 21, 'P0022', '2019-01-15', 'Pembelian Barang DHONO JOYO  ', 30000, 30, 900000, 'Tunai'),
(178, 34, 29, 22, 'P0023', '2019-01-15', 'Pembelian Barang DHONO JOYO  ', 2500, 100, 250000, 'Tunai'),
(179, 35, 29, 23, 'P0024', '2019-01-15', 'Pembelian Barang DHONO JOYO  ', 47000, 30, 1410000, 'Tunai'),
(180, 35, 29, 23, 'P0025', '2019-01-20', 'Pembelian Barang DHONO JOYO  ', 47000, 30, 1410000, 'Tunai'),
(181, 36, 29, 16, 'P0026', '2019-01-20', 'Pembelian Barang DHONO JOYO  ', 29000, 30, 870000, 'Tunai'),
(182, 38, 29, 24, 'P0027', '2019-01-20', 'Pembelian Barang DHONO JOYO  ', 20000, 30, 600000, 'Tunai'),
(184, 41, 29, 27, 'P0029', '2019-01-24', 'Pembelian Barang DHONO JOYO  ', 6500, 50, 325000, 'Tunai'),
(185, 42, 29, 28, 'P0030', '2019-01-24', 'Pembelian Barang DHONO JOYO  ', 3500, 30, 105000, 'Tunai'),
(186, 45, 29, 30, 'P0031', '2019-01-24', 'Pembelian Barang DHONO JOYO  ', 12000, 50, 600000, 'Tunai'),
(187, 13, 29, 6, 'P0032', '2019-01-29', 'Pembelian Barang DHONO JOYO  ', 40000, 300, 12000000, 'Kredit'),
(188, 40, 29, 26, 'P0033', '2019-01-20', 'Pembelian Barang DHONO JOYO  ', 49000, 30, 1470000, 'Tunai');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `kode_transaksi_penjualan` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `pembeli` varchar(100) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status_jual` enum('Tunai','Kredit','-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_akun`, `kode_transaksi_penjualan`, `tanggal`, `pembeli`, `harga_jual`, `jumlah`, `total`, `status_jual`) VALUES
(311, 17, 30, 'J0001', '2019-01-01', 'silmi khashaish', 103000, 6, 618000, 'Tunai'),
(312, 31, 30, 'J0002', '2019-01-01', 'silmi khashaish', 30000, 1, 30000, 'Tunai'),
(313, 45, 30, 'J0003', '2019-01-01', 'silmi khashaish', 16500, 2, 33000, 'Tunai'),
(314, 34, 30, 'J0004', '2019-01-01', '-', 4000, 10, 40000, 'Tunai'),
(315, 13, 30, 'J0005', '2019-01-01', '-', 50000, 3, 150000, 'Tunai'),
(316, 32, 30, 'J0006', '2019-01-02', '-', 35000, 2, 70000, 'Tunai'),
(317, 16, 30, 'J0007', '2019-01-02', 'Eko Priyono', 60000, 10, 600000, 'Tunai'),
(318, 22, 30, 'J0008', '2019-01-02', '-', 20000, 1, 20000, 'Tunai'),
(319, 38, 30, 'J0009', '2019-01-02', '-', 25000, 1, 25000, 'Tunai'),
(320, 14, 30, 'J0010', '2019-01-03', 'Kevin Satria M', 48500, 10, 485000, 'Tunai'),
(321, 29, 30, 'J0011', '2019-01-03', 'Kevin Satria M', 535000, 1, 535000, 'Tunai'),
(322, 42, 30, 'J0012', '2019-01-03', '-', 5000, 2, 10000, 'Tunai'),
(323, 26, 30, 'J0013', '2019-01-03', '-', 65000, 3, 195000, 'Tunai'),
(324, 48, 30, 'J0014', '2019-01-03', 'Kevin Satria M', 20000, 1, 20000, 'Tunai'),
(326, 24, 30, 'J0016', '2019-01-05', '-', 16000, 10, 160000, 'Tunai'),
(327, 20, 30, 'J0017', '2019-01-05', 'Bpk Gunawan Atmaja', 522000, 1, 522000, 'Tunai'),
(328, 46, 30, 'J0018', '2019-01-05', 'Bpk Gunawan Atmaja', 340000, 1, 340000, 'Tunai'),
(329, 36, 30, 'J0019', '2019-01-05', '-', 32500, 5, 162500, 'Tunai'),
(330, 48, 30, 'J0020', '2019-01-05', 'Bpk Gunawan Atmaja', 20000, 1, 20000, 'Tunai'),
(331, 35, 30, 'J0021', '2019-01-06', '-', 55000, 1, 55000, 'Tunai'),
(332, 28, 30, 'J0022', '2019-01-06', '-', 58000, 1, 58000, 'Tunai'),
(333, 27, 30, 'J0023', '2019-01-06', '-', 28000, 1, 28000, 'Tunai'),
(334, 18, 30, 'J0024', '2019-01-06', '-', 13500, 1, 13500, 'Tunai'),
(335, 37, 30, 'J0025', '2019-01-07', '-', 30000, 1, 30000, 'Tunai'),
(336, 44, 30, 'J0026', '2019-01-07', '-', 5500, 8, 44000, 'Tunai'),
(337, 39, 30, 'J0027', '2019-01-07', '-', 30000, 2, 60000, 'Tunai'),
(338, 24, 30, 'J0028', '2019-01-07', '-', 16000, 3, 48000, 'Tunai'),
(339, 41, 30, 'J0029', '2019-01-07', '-', 8000, 3, 24000, 'Tunai'),
(340, 31, 30, 'J0030', '2019-01-07', '-', 30000, 5, 150000, 'Tunai'),
(341, 38, 30, 'J0031', '2019-01-08', '-', 25000, 4, 100000, 'Tunai'),
(342, 17, 30, 'J0032', '2019-01-08', 'Aldi Naufal', 103000, 2, 206000, 'Tunai'),
(343, 34, 30, 'J0033', '2019-01-08', '-', 4000, 5, 20000, 'Tunai'),
(344, 12, 30, 'J0034', '2019-01-08', '-', 70000, 1, 70000, 'Tunai'),
(345, 36, 30, 'J0035', '2019-01-08', '-', 32500, 2, 65000, 'Tunai'),
(346, 26, 30, 'J0036', '2019-01-09', '-', 65000, 1, 65000, 'Tunai'),
(347, 27, 30, 'J0037', '2019-01-09', '-', 28000, 1, 28000, 'Tunai'),
(348, 28, 30, 'J0038', '2019-01-09', '-', 58000, 1, 58000, 'Tunai'),
(349, 13, 30, 'J0039', '2019-01-10', 'silmi khashaish', 50000, 12, 600000, 'Tunai'),
(351, 20, 30, 'J0041', '2019-01-10', 'silmi khashaish', 522000, 1, 522000, 'Tunai'),
(352, 46, 30, 'J0042', '2019-01-10', 'silmi khashaish', 340000, 3, 1020000, 'Tunai'),
(353, 16, 30, 'J0043', '2019-01-10', 'silmi khashaish', 60000, 10, 600000, 'Tunai'),
(354, 14, 30, 'J0044', '2019-01-10', 'silmi khashaish', 48500, 8, 388000, 'Tunai'),
(355, 48, 30, 'J0045', '2019-01-10', 'silmi khashaish', 20000, 1, 20000, 'Tunai'),
(356, 32, 30, 'J0046', '2019-01-11', '-', 35000, 1, 35000, 'Tunai'),
(357, 30, 30, 'J0047', '2019-01-11', '-', 6000, 4, 24000, 'Tunai'),
(358, 22, 30, 'J0048', '2019-01-11', '-', 20000, 1, 20000, 'Tunai'),
(359, 35, 30, 'J0049', '2019-01-12', '-', 55000, 1, 55000, 'Tunai'),
(360, 37, 30, 'J0050', '2019-01-12', '-', 30000, 1, 30000, 'Tunai'),
(361, 39, 30, 'J0051', '2019-01-13', '-', 30000, 4, 120000, 'Tunai'),
(363, 40, 30, 'J0052', '2019-01-13', '-', 55000, 2, 110000, 'Tunai'),
(364, 41, 30, 'J0053', '2019-01-14', '-', 8000, 2, 16000, 'Tunai'),
(365, 42, 30, 'J0054', '2019-01-14', '-', 5000, 2, 10000, 'Tunai'),
(367, 44, 30, 'J0056', '2019-01-14', '-', 5500, 6, 33000, 'Tunai'),
(368, 44, 30, 'J0057', '2019-01-15', '-', 5500, 4, 22000, 'Tunai'),
(369, 20, 30, 'J0058', '2019-01-15', 'Raniar Haristyarini', 522000, 2, 1044000, 'Tunai'),
(370, 17, 30, 'J0059', '2019-01-15', 'Eko Priyono', 103000, 5, 515000, 'Tunai'),
(371, 22, 30, 'J0060', '2019-01-15', '-', 20000, 1, 20000, 'Tunai'),
(372, 24, 30, 'J0061', '2019-01-15', '-', 16000, 2, 32000, 'Tunai'),
(373, 13, 30, 'J0062', '2019-01-16', 'Gunawan Atmaja S', 50000, 7, 350000, 'Tunai'),
(374, 46, 30, 'J0063', '2019-01-16', 'Gunawan Atmaja S', 340000, 2, 680000, 'Tunai'),
(375, 14, 30, 'J0064', '2019-01-16', 'Gunawan Atmaja S', 48500, 10, 485000, 'Tunai'),
(376, 16, 30, 'J0065', '2019-01-16', 'hillah al ayubi', 60000, 10, 600000, 'Tunai'),
(377, 18, 30, 'J0066', '0009-01-16', '-', 13500, 2, 27000, 'Tunai'),
(378, 48, 30, 'J0067', '2019-01-16', 'Gunawan Atmaja S', 20000, 1, 20000, 'Tunai'),
(379, 26, 30, 'J0068', '2019-01-17', '-', 65000, 3, 195000, 'Tunai'),
(380, 45, 30, 'J0069', '2019-01-17', '-', 16500, 1, 16500, 'Tunai'),
(381, 41, 30, 'J0070', '2019-01-17', '-', 8000, 2, 16000, 'Tunai'),
(382, 39, 30, 'J0071', '2019-01-17', '-', 30000, 2, 60000, 'Tunai'),
(383, 38, 30, 'J0072', '2019-01-17', '-', 25000, 3, 75000, 'Tunai'),
(384, 16, 30, 'J0073', '2019-01-18', 'subhan', 60000, 6, 360000, 'Tunai'),
(385, 17, 30, 'J0074', '2019-01-18', 'Rezky Dwi', 103000, 3, 309000, 'Tunai'),
(386, 31, 30, 'J0075', '2019-01-19', '-', 30000, 2, 60000, 'Tunai'),
(387, 12, 30, 'J0076', '2019-01-19', '-', 70000, 1, 70000, 'Tunai'),
(388, 34, 30, 'J0077', '2019-01-19', '-', 4000, 5, 20000, 'Tunai'),
(389, 44, 30, 'J0078', '2019-01-19', '-', 5500, 20, 110000, 'Tunai'),
(390, 44, 30, 'J0079', '2019-01-20', '-', 5500, 10, 55000, 'Tunai'),
(391, 42, 30, 'J0080', '2019-01-20', '-', 5000, 1, 5000, 'Tunai'),
(392, 40, 30, 'J0081', '2019-01-20', '-', 55000, 2, 110000, 'Tunai'),
(393, 36, 30, 'J0082', '2019-01-20', '-', 32500, 1, 32500, 'Tunai'),
(394, 27, 30, 'J0083', '2019-01-21', '-', 28000, 1, 28000, 'Tunai'),
(395, 28, 30, 'J0084', '2019-01-21', 'Hernawan', 58000, 3, 174000, 'Tunai'),
(396, 35, 30, 'J0085', '2019-01-21', 'rozein', 55000, 2, 110000, 'Tunai'),
(397, 20, 30, 'J0086', '2019-01-22', 'kivlan zein', 522000, 2, 1044000, 'Tunai'),
(398, 24, 30, 'J0087', '2019-01-22', '-', 16000, 2, 32000, 'Tunai'),
(399, 48, 30, 'J0088', '2019-01-22', 'kivlan zein', 20000, 1, 20000, 'Tunai'),
(400, 46, 30, 'J0089', '2019-01-23', 'didin', 340000, 3, 1020000, 'Tunai'),
(401, 29, 30, 'J0090', '2019-01-23', 'didin', 535000, 1, 535000, 'Tunai'),
(402, 17, 30, 'J0091', '2019-01-23', 'alfian', 103000, 4, 412000, 'Tunai'),
(403, 48, 30, 'J0092', '2019-01-23', 'didin', 20000, 1, 20000, 'Tunai'),
(404, 30, 30, 'J0093', '2019-01-24', '-', 6000, 12, 72000, 'Tunai'),
(405, 12, 30, 'J0094', '2019-01-24', '-', 70000, 2, 140000, 'Tunai'),
(406, 31, 30, 'J0095', '2019-01-24', '-', 30000, 1, 30000, 'Tunai'),
(408, 13, 30, 'J0096', '2019-01-25', 'rakha', 50000, 150, 7500000, 'Kredit'),
(409, 48, 30, 'J0097', '2019-01-25', 'rakha', 20000, 1, 20000, 'Tunai'),
(410, 38, 30, 'J0098', '2019-01-26', '-', 25000, 1, 25000, 'Tunai'),
(411, 45, 30, 'J0099', '2019-01-26', '-', 16500, 2, 33000, 'Tunai'),
(412, 34, 30, 'J0100', '2019-01-26', '-', 4000, 5, 20000, 'Tunai'),
(413, 28, 30, 'J0101', '2019-01-26', '-', 58000, 1, 58000, 'Tunai'),
(415, 27, 30, 'J0103', '2019-01-27', '-', 28000, 2, 56000, 'Tunai'),
(416, 47, 30, 'J0104', '2019-01-27', '-', 10000, 1, 10000, 'Tunai'),
(417, 13, 30, 'J0105', '2019-01-27', 'Teddy Ferdian', 50000, 5, 250000, 'Tunai'),
(418, 13, 30, 'J0106', '2019-01-28', 'dedy', 50000, 5, 250000, 'Tunai'),
(419, 18, 30, 'J0107', '2019-01-28', '-', 13500, 3, 40500, 'Tunai'),
(420, 44, 30, 'J0108', '2019-01-28', '-', 5500, 10, 55000, 'Tunai'),
(421, 17, 30, 'J0109', '2019-01-28', 'syaiful', 103000, 2, 206000, 'Tunai'),
(422, 13, 30, 'J0110', '2019-01-29', 'irza', 50000, 200, 10000000, 'Tunai'),
(423, 48, 30, 'J0111', '2019-01-29', 'irza', 20000, 1, 20000, 'Tunai'),
(425, 36, 30, 'J0113', '2019-01-30', '-', 32500, 2, 65000, 'Tunai'),
(426, 27, 30, 'J0114', '2019-01-30', '-', 28000, 2, 56000, 'Tunai'),
(427, 34, 30, 'J0115', '2019-01-30', '-', 4000, 5, 20000, 'Tunai'),
(428, 14, 30, 'J0116', '2019-01-31', 'rizky', 48500, 20, 970000, 'Tunai'),
(429, 16, 30, 'J0117', '2019-01-31', 'rizky', 60000, 20, 1200000, 'Tunai'),
(430, 48, 30, 'J0118', '2019-01-31', 'rizky', 20000, 1, 20000, 'Tunai'),
(431, 40, 30, 'J0119', '2019-01-04', '-', 55000, 1, 55000, 'Tunai'),
(432, 45, 30, 'J0120', '2019-01-14', '-', 16500, 2, 33000, 'Tunai'),
(433, 32, 30, 'J0121', '2019-01-26', 'Aldi Naufal', 35000, 1, 35000, 'Tunai');

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `id_perlengkapan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_perlengkapan` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perlengkapan`
--

INSERT INTO `perlengkapan` (`id_perlengkapan`, `id_akun`, `tanggal`, `kode_perlengkapan`, `keterangan`, `harga`, `jumlah`, `total`) VALUES
(3, 26, '2019-01-10', 'K0001', 'pembelian kantong plastik', 0, 0, 200000),
(4, 26, '2019-01-11', 'K0002', 'pembelian nota dan ATK', 0, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id_piutang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_piutang` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`id_piutang`, `id_barang`, `tanggal`, `kode_piutang`, `keterangan`, `harga`, `jumlah`, `total`) VALUES
(1, 13, '2019-01-25', 'J0096', 'Penjualan Barang DHONO JOYO  ', 50000, 150, 7500000);

-- --------------------------------------------------------

--
-- Table structure for table `prive`
--

CREATE TABLE `prive` (
  `id_prive` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_prive` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prive`
--

INSERT INTO `prive` (`id_prive`, `id_akun`, `tanggal`, `kode_prive`, `keterangan`, `nominal`) VALUES
(3, 33, '2019-01-15', 'PR0001', 'Pembayaran SPP sekolah', 500000),
(4, 33, '2019-01-27', 'PR0001', 'pembayaran berobat', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(5) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `level`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(20) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `kontak`, `alamat`) VALUES
(6, 'PT. Artha Nugraha (semen)', '(031) 8411157', 'Jl. Jemursari VIII No.102, Jemur Wonosari, Wonocolo, Kota SBY, Jawa Timur 60237'),
(7, ' CV. CIPTA PRIMA PERKASA (asbes)', '031-8073203', 'Perum Permata Candiloka Blok Y/03 RT.08 RW.04, Desa Balonggabus, Kecamatan Candi, Sidoarjo'),
(8, 'PT. Sahabat Ana Grup (besi)', ' 0811-3666-411', ' Depan Kimia Farma, Jl. Banyu Urip No.53, Banyu Urip, Kec. Sawahan, Kota SBY, Jawa Timur 60254'),
(9, 'CV. ABJM (pasir)', ' 0821-4090-0900', 'No.45 Blok ND, Jl. Baruk Utara XII, Kedung Baruk, Rungkut, Kota SBY, Jawa Timur 60298'),
(10, 'CV. Eka Alam (batu koral)', ' 0812-3553-2012', 'Jl. Keputih Tegal Timur No.80, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111'),
(11, 'PT. Jotun Indonesia Branch Office & Warehouse (cat', '(031) 8430649', 'Jl. Rungkut Industri IV No.40, Rungkut Tengah, Gn. Anyar, Kota SBY, Jawa Timur 60293'),
(12, 'CV. Sinar Kencana Jaya (paku)', ' (+62) 315018231', ' JL. Raya Ngagel 207 Sby Surabaya, Jawa Timur - Indonesia'),
(13, 'CV. Dua Putra Petir (bendrat)', '(+62) 317406677', 'Bukit Palma C5/33 Citraland Utara Surabaya 60185, Jawa Timur Indonesia Surabaya, Jawa Timur - Indone'),
(14, 'PT. Mikatasa Agung (lem)', ' (031) 8438427', 'Jl. Raya Rungkut Industri II No.2-4, Tenggilis Mejoyo, Kota SBY, Jawa Timur 60293'),
(15, 'PT. SINAR LAUT MANDIRI (skrop)', '(021) 625-3030', 'Jalan Mangga Besar 1 No.78 Tamansari, Jakarta Barat 11180 INDONESIA'),
(16, 'CV. Gajah Mapan (cetok, meteran, tatah, ungkal)', '081230153052', 'Jl.Rungkut Mapan Tengah II/DB.07  Surabaya.'),
(17, ' UD. Berkah Fajar Abadi (palu)', '(031) 8487351', 'Bumi prtama asri no. A11, Surabaya, Jawa Timur, Indonesia'),
(18, 'PT. Restu Anugerah Sejahtera (gerobak dorong)', '031-7349878', 'Ruko Satelit Town Square A34  Surabaya. 60188.'),
(19, 'UD. Selatan Jaya (timbo cor)', '0313520648', 'Songoyudan 31B, Surabaya, Jawa Timur , Indonesia'),
(20, 'UD. Humi Jaya Teknik (obeng)', '(031) 5934508', 'Jl. Bhaskara Selatan D No.22, Kalisari, Mulyorejo, Kota SBY, Jawa Timur 60112'),
(21, 'PT. Alpha Utama Mandiri (gergaji)', '(031) 3531718', 'Jl. Kebon Rojo No.2AA - 2BB, Krembangan Sel., Krembangan, Kota SBY, Jawa Timur 60175'),
(22, 'CV. AGUNG JAYA MANDIRI (selang)', ' (031) 8539345', 'Jalan Bungurasih Timur No. 14 RT.01 / RW.01, Kasian, Bungurasih, Waru, Kabupaten Sidoarjo, Jawa Timu'),
(23, 'PT. Adijaya Makmur Abadi (waterpass)', '0355329723', 'JL. Pangeran Diponegoro no. 92, Tulungagung  Jawa Timur , Indonesia'),
(24, 'CV. Globalindo Internusa (lot)', ' (+62) 318680367', ' Jl. Rambutan 8/ 47 Komplek Perumahan Pondok Candra Indah, Waru - Sidoarjo Sidoarjo, Jawa Timur - In'),
(25, 'UD. Fajar Gemilang (engsel)', ' (031) 3898585', 'Jl. Kalijudan No.186, Kalijudan, Mulyorejo, Kota SBY, Jawa Timur 60114'),
(26, 'CV. Gerai Kunci (tarikan pintu)', '031-5964312', 'Jl. Panglima Polim Raya, No. 87B Jakarta Selatan, Jakarta Selatan  DKI Jakarta , Indonesia'),
(27, 'PT SURYAMAS LUMISINDO DWIDAYA (pitingan lampu)', '02142880671', 'Gedung Indra Sentral blok AE-AG, Jl Letjend Suprapto no 60, Jakarta Pusat  DKI Jakarta , Indonesia'),
(28, 'CV. KHARISMA MEGA PERKASA (klem kabel)', '( 031) 3957580', 'Jl. Ruby VII No. 15 PPS Suci Manyar Gresik - Jawa Timur - Indonesia 61151'),
(29, 'PT. Central Wire Industrial (kabel)', ' (031) 8438446', 'Jl. Rungkut Industri Raya No.17A, Rungkut Kidul, Rungkut, Kota SBY, Jawa Timur 60293'),
(30, 'PT. Boelan Oetama Mandiri (kuas tembok)', '02129093911', 'Ruko Pallazo, Villa Mutiara Cikarang Blok V3 No. 19, Cikarang Selatan, Cikarang  Jawa Barat , Indone');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `Nama`, `Username`, `Password`, `gender`, `foto`) VALUES
(8, 1, 'Fajar Abdurrohman', 'fajar', '1234', 'Laki-laki', 'user-male.jpg'),
(9, 3, 'Eva Istianah', 'eva', '1234', 'Perempuan', 'user-female2.png'),
(10, 2, 'Raniar Haristyarini', 'rista', '1234', 'Perempuan', 'user-female.jpg'),
(11, 2, 'Savhira Indah', 'vhira', '1234', 'Perempuan', 'user-rs.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`id_beban`);

--
-- Indexes for table `hutang_dagang`
--
ALTER TABLE `hutang_dagang`
  ADD PRIMARY KEY (`id_hutang_dagang`);

--
-- Indexes for table `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id_modal`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`id_perlengkapan`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id_piutang`);

--
-- Indexes for table `prive`
--
ALTER TABLE `prive`
  ADD PRIMARY KEY (`id_prive`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
  MODIFY `id_beban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hutang_dagang`
--
ALTER TABLE `hutang_dagang`
  MODIFY `id_hutang_dagang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1449;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id_modal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  MODIFY `id_perlengkapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prive`
--
ALTER TABLE `prive`
  MODIFY `id_prive` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
