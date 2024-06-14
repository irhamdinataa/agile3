-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.11.3-MariaDB-1:10.11.3+maria~ubu2204 - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table packing.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table packing.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table packing.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table packing.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_06_13_232847_pengadaan_barangs', 1),
	(6, '2024_06_13_232924_pesanan_customers', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table packing.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table packing.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table packing.pengadaan_barangs
CREATE TABLE IF NOT EXISTS `pengadaan_barangs` (
  `id` varchar(255) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table packing.pengadaan_barangs: ~2 rows (approximately)
/*!40000 ALTER TABLE `pengadaan_barangs` DISABLE KEYS */;
INSERT INTO `pengadaan_barangs` (`id`, `namabarang`, `jumlah`, `penanggung_jawab`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	('6b487267-6f3e-47d6-9ad0-c2e0901b8931', 'Plastik Roti', 23, 'Orang 2', 'done', NULL, '2024-06-13 23:42:40', '2024-06-13 23:42:40'),
	('caf3346c-ae83-4c9b-8c09-677d3e8b5f34', 'Kertas Roti', 13, 'Orang 1', '-', NULL, '2024-06-13 23:42:40', '2024-06-13 23:42:40');
/*!40000 ALTER TABLE `pengadaan_barangs` ENABLE KEYS */;

-- Dumping structure for table packing.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table packing.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table packing.pesanan_customers
CREATE TABLE IF NOT EXISTS `pesanan_customers` (
  `id` varchar(255) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `kebutuhan` int(11) NOT NULL,
  `done` int(11) NOT NULL,
  `todo` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table packing.pesanan_customers: ~2 rows (approximately)
/*!40000 ALTER TABLE `pesanan_customers` DISABLE KEYS */;
INSERT INTO `pesanan_customers` (`id`, `namabarang`, `kebutuhan`, `done`, `todo`, `remember_token`, `created_at`, `updated_at`) VALUES
	('55a7ab6b-acea-4dd8-8f04-1c8768dc6aeb', 'Roti Kering A Butter', 53, 20, 30, NULL, '2024-06-13 23:42:40', '2024-06-13 23:42:40'),
	('eb5edd95-0dbc-4550-bfaa-57b13ba630cf', 'Roti Kering B Butter', 53, 53, 0, NULL, '2024-06-13 23:42:40', '2024-06-13 23:42:40');
/*!40000 ALTER TABLE `pesanan_customers` ENABLE KEYS */;

-- Dumping structure for table packing.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `foto_profile` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table packing.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `foto_profile`, `remember_token`, `created_at`, `updated_at`) VALUES
	('7c75716d-9f79-4e0f-a727-e99d0081543a', 'admin1', 'admin1@gmail.com', '$2y$10$vPRhL4C19RMuB.sCTkyKh.RdCexNBasttl64mQrvAkc5lAhfLbRm6', 'admin', NULL, 'LNgrwPL7fIkMbm5L0VXnk7c2dOr5WzfktN31xHBdsrviq2CBPFC9V8MiOAPt', '2024-06-13 23:42:40', '2024-06-14 11:14:48'),
	('885f4995-3e88-4171-a2bf-a07e3d1f0c73', 'produksi1', 'produksi1@gmail.com', '$2y$10$BVA1nT/vAGw1qRtJ62PbAe.txpys8GjkIFpGuHGTwTkLh3iqFjYl2', 'produksi', NULL, 's8PgT9XYPwYXeHpETSUj40eUDl2HbozbR5eep0vtgUNvYWlxYfsp2uND6mQW', '2024-06-13 23:42:40', '2024-06-14 10:57:09'),
	('ee8ce309-dbe1-47bb-a769-22068a429691', 'pengadaan1', 'pengadaan1@gmail.com', '$2y$10$GtcmCLFnN4SUtxkjWmTLOuViLiCOvIx75lwrhQmY9wQm3VY8951CS', 'pengadaan', NULL, '2aq8vsF2As0CgIK2TyDhqcbJ8R9yr7hoVNWKxt8SnCFfLHCsSXft5abnlKr0', '2024-06-13 23:42:40', '2024-06-14 11:08:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
