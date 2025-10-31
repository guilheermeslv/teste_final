-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.42 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sabor_do_brasil
CREATE DATABASE IF NOT EXISTS `sabor_do_brasil` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sabor_do_brasil`;

-- Copiando estrutura para tabela sabor_do_brasil.avaliacao
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `like` tinyint(1) DEFAULT '0',
  `dislike` tinyint(1) DEFAULT '0',
  `publicacao_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`publicacao_id`,`user_id`) USING BTREE,
  KEY `publicacao_id` (`publicacao_id`) USING BTREE,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sabor_do_brasil.avaliacao: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sabor_do_brasil.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sabor_do_brasil.cache: ~2 rows (aproximadamente)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-guilherme@gmail.com|127.0.0.1', 'i:2;', 1761737127),
	('laravel-cache-guilherme@gmail.com|127.0.0.1:timer', 'i:1761737127;', 1761737127);

-- Copiando estrutura para tabela sabor_do_brasil.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sabor_do_brasil.cache_locks: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sabor_do_brasil.curtida
CREATE TABLE IF NOT EXISTS `curtida` (
  `id` int NOT NULL AUTO_INCREMENT,
  `likes` tinyint(1) DEFAULT '0',
  `user_id` int NOT NULL,
  `publicacao_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `publicacao_id` (`publicacao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sabor_do_brasil.curtida: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sabor_do_brasil.descurtida
CREATE TABLE IF NOT EXISTS `descurtida` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dislikes` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `publicacao_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `publicacao_id` (`publicacao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sabor_do_brasil.descurtida: ~0 rows (aproximadamente)
INSERT INTO `descurtida` (`id`, `dislikes`, `user_id`, `publicacao_id`) VALUES
	(2, 1, 1, 1),
	(3, 1, 3, 1);

-- Copiando estrutura para tabela sabor_do_brasil.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sabor_do_brasil.empresa: ~0 rows (aproximadamente)
INSERT INTO `empresa` (`id`, `nome`, `logo`, `createdAt`, `updatedAt`) VALUES
	(1, 'Sabor do Brasil', 'logo_sabor_do_brasil.png', '2023-11-23 10:49:17', '2021-02-22 09:13:55');

-- Copiando estrutura para tabela sabor_do_brasil.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sabor_do_brasil.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sabor_do_brasil.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sabor_do_brasil.jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sabor_do_brasil.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sabor_do_brasil.job_batches: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sabor_do_brasil.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sabor_do_brasil.migrations: ~2 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1);

-- Copiando estrutura para tabela sabor_do_brasil.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sabor_do_brasil.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sabor_do_brasil.publicacao
CREATE TABLE IF NOT EXISTS `publicacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) NOT NULL,
  `titulo_prato` varchar(255) NOT NULL,
  `local` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `empresa_id` int DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `publicacao_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela sabor_do_brasil.publicacao: ~3 rows (aproximadamente)
INSERT INTO `publicacao` (`id`, `foto`, `titulo_prato`, `local`, `cidade`, `empresa_id`, `createdAt`, `updatedAt`) VALUES
	(1, 'publicacao01.png', 'Peixe grelhado', 'Vale do Paraíso', 'Teresópolis-RJ', 1, '2023-02-22 09:15:55', '2023-09-22 09:18:55'),
	(2, 'publicacao02.png', 'Cuscuz paulista', 'Canão', 'São Paulo-SP', 1, '2023-02-22 09:10:55', '2023-02-22 09:16:55'),
	(3, 'publicacao03.png', 'Frango com batatas assadas', 'Promorar', 'Teresina-PI', 1, '2023-05-22 09:13:55', '2023-02-22 09:15:55');

-- Copiando estrutura para tabela sabor_do_brasil.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sabor_do_brasil.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('Y5X0HSPA4uR3CYzWped5KYngUfn6mEQAdewUUxnx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXZaeExqUTlaeGV1c1RTdHNISnhZeHhwWEJzV1lBYVR1Qk41dERWaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1761915621);

-- Copiando estrutura para tabela sabor_do_brasil.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sabor_do_brasil.users: ~3 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nickname`, `foto`) VALUES
	(1, 'usuario01', 'usuario01@usuario.com', NULL, '$2y$12$ilCfWSIHVoAkon1ah7AWVOGkt7QuIqbtL5f09h6363xPHXd7sW1xW', NULL, '2025-10-22 16:47:21', '2025-10-22 16:47:21', 'usuario_01', 'usuario_01.jpg'),
	(2, 'usuario02', 'usuario02@usuario.com', NULL, '$2y$12$3w.mzf.klgU/Ec0YTDLVr.8f/AcloPBsbsMO3YpNKUVTiLyyNsbCW', NULL, '2025-10-30 17:48:03', '2025-10-30 17:48:03', 'usuario_02', 'usuario_02.jpg'),
	(3, 'usuario03', 'usuario03@usuario.com', NULL, '$2y$12$o/iOXZqFaiXle6tLbAeaDOL.boFZ.EhhKg7Yfd3NHS2.H8Xc62Qp6', NULL, '2025-10-30 17:52:27', '2025-10-30 17:52:27', 'usuario_03', 'usuario_03.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
