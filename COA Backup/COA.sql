-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_inventory_percetakan
DROP DATABASE IF EXISTS `db_inventory_percetakan`;
CREATE DATABASE IF NOT EXISTS `db_inventory_percetakan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_inventory_percetakan`;

-- Dumping structure for table db_inventory_percetakan.tb_chart_akun
DROP TABLE IF EXISTS `tb_chart_akun`;
CREATE TABLE IF NOT EXISTS `tb_chart_akun` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_tipeakun` bigint unsigned NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `saldo_awal` decimal(15,2) NOT NULL DEFAULT '0.00',
  `tanggal_saldo_awal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `saldo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tb_chart_akun_kode_unique` (`kode`),
  KEY `tb_chart_akun_id_tipeakun_foreign` (`id_tipeakun`),
  CONSTRAINT `tb_chart_akun_id_tipeakun_foreign` FOREIGN KEY (`id_tipeakun`) REFERENCES `tb_tipeakun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=987 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_inventory_percetakan.tb_chart_akun: ~21 rows (approximately)
DELETE FROM `tb_chart_akun`;
INSERT INTO `tb_chart_akun` (`id`, `id_tipeakun`, `kode`, `nama`, `keterangan`, `saldo_awal`, `tanggal_saldo_awal`, `created_at`, `updated_at`, `saldo`) VALUES
	(75, 21, '6881', 'Beban Penyusutan & Amortisasi', 'Expense', 0.00, '2025-11-04', '2025-11-04 11:57:58', '2025-11-04 11:57:58', '0'),
	(118, 8, '9046', 'Hutang Deposit Pelanggan', 'Liability', 0.00, '2025-11-04', '2025-11-04 11:49:39', '2025-11-04 11:49:39', '0'),
	(136, 8, '3511', 'Hutang Usaha Belum Ditagihkan', 'Liability', 0.00, '2025-11-04', '2025-11-04 11:47:52', '2025-11-04 11:47:52', '0'),
	(162, 4, '2739', 'Aset Lancar Lainnya', 'Asset', 0.00, '2025-11-04', '2025-11-04 12:07:30', '2025-11-04 12:07:30', '0'),
	(187, 16, '2929', 'Pendapatan Usaha', 'Income', 0.00, '2025-11-04', '2025-11-04 12:12:15', '2025-11-04 12:12:15', '0'),
	(220, 22, '7315', 'Kerugian Aset', 'Expense', 0.00, '2025-11-04', '2025-11-04 12:13:40', '2025-11-04 12:13:40', '0'),
	(250, 2, '8159', 'Piutang Rekanan', 'Asset', 0.00, '2025-11-04', '2025-11-04 11:44:56', '2025-11-04 11:44:56', '0'),
	(259, 13, '7201', 'Laba Ditahan', 'Equity', 0.00, '2025-11-04', '2025-11-04 12:11:31', '2025-11-04 12:11:31', '0'),
	(285, 15, '5804', 'Saldo Awal', 'Equity', 0.00, '2025-11-04', '2025-11-04 12:04:47', '2025-11-04 12:04:47', '0'),
	(290, 11, '9409', 'Kewajiban Jangka Panjang', 'Liability', 0.00, '2025-11-04', '2025-11-04 12:11:11', '2025-11-04 12:11:11', '0'),
	(335, 1, '9765', 'Bank BCA', 'Asset', 0.00, '2025-11-04', '2025-11-04 11:38:40', '2025-11-04 11:38:40', '0'),
	(360, 19, '7350', 'Beban Gaji Karyawan', 'Expense', 0.00, '2025-11-04', '2025-11-04 11:56:41', '2025-11-04 11:56:41', '0'),
	(363, 7, '5964', 'Aset Lainnya', 'Asset', 0.00, '2025-11-04', '2025-11-04 12:10:01', '2025-11-04 12:10:01', '0'),
	(364, 18, '2453', 'Harga Pokok Penjualan', 'Expense', 0.00, '2025-11-04', '2025-11-04 12:12:51', '2025-11-04 12:12:51', '0'),
	(528, 5, '8497', 'Aset Tetap', 'Asset', 0.00, '2025-11-04', '2025-11-04 12:07:55', '2025-11-04 12:07:55', '0'),
	(637, 6, '180', 'Akumulasi Depresiasi', 'Asset', 0.00, '2025-11-04', '2025-11-04 12:09:20', '2025-11-04 12:09:20', '0'),
	(652, 12, '3338', 'Modal Pemilik', 'Equity', 0.00, '2025-11-04', '2025-11-04 12:05:15', '2025-11-04 12:05:15', '0'),
	(711, 19, '3257', 'Beban Operasional', 'Expense', 0.00, '2025-11-04', '2025-11-04 11:52:08', '2025-11-04 11:52:08', '0'),
	(716, 10, '5609', 'Kewajiban Lancar Lainnya', 'Liability', 0.00, '2025-11-04', '2025-11-04 12:10:45', '2025-11-04 12:10:45', '0'),
	(735, 14, '8754', 'Prive Pemilik', 'Equity', 0.00, '2025-11-04', '2025-11-04 12:11:46', '2025-11-04 12:11:46', '0'),
	(864, 9, '5299', 'Kartu Kredit', 'Liability', 0.00, '2025-11-04', '2025-11-04 12:10:21', '2025-11-04 12:10:21', '0'),
	(928, 17, '9329', 'Pendapatan Lainnya', 'Income', 0.00, '2025-11-04', '2025-11-04 12:12:31', '2025-11-04 12:12:31', '0'),
	(972, 20, '947', 'Beban Lainnya', 'Expense', 0.00, '2025-11-04', '2025-11-04 11:55:57', '2025-11-04 11:55:57', '0'),
	(986, 3, '8045', 'Persediaan Asset', 'Asset', 0.00, '2025-11-04', '2025-11-04 12:05:48', '2025-11-04 12:05:48', '0');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
