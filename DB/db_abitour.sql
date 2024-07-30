-- Adminer 4.8.0 MySQL 10.6.18-MariaDB-cll-lve dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
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


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'0001_01_01_000000_create_users_table',	1),
(2,	'0001_01_01_000001_create_cache_table',	1),
(3,	'0001_01_01_000002_create_jobs_table',	1),
(4,	'2024_07_17_011820_create_vas_table',	2),
(5,	'2024_07_17_033448_create_personal_access_tokens_table',	3);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
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


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0Byc5jijVNAZjibVXK4IgETZNFNI5boqOFxfTdyV',	NULL,	'191.96.103.88',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnE3T1EwRnJHZHkwZ1IwZEZWVVJaTWtyaXN1VXRUSjlxYW9pMElQeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268210),
('0h7imy0WCN6COuZJNzjFGL5M2nNhRBgCSFlC7gif',	NULL,	'181.215.176.62',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnpYcVRBZVFBa0I2YVdiZWw0TTlmcDdlaW5WOXhWVXJQV3VHMGk1bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317532),
('1kCZZHkNmQ5nziT8I6Q5RkEPIQnDV52j9RSEMuha',	NULL,	'138.199.39.3',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXBIYm0xQTJSbXc5RVU2Y2E4bk5vanpySWhXdFJWZFRJcTZDWlZVYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268225),
('7lWZ1AKBjisyoxXXtTqIudm91JAJhUD7wXaQRCbi',	NULL,	'98.159.43.152',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnFEaHFDUjh3NVk3M05NWmVlSW1QUjZraUZzYlB4ZnlicWlZQnYwcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268226),
('8BppNWuofpdyAdSLC8S8HCmLqCwEGSEFlIxd9qMC',	NULL,	'77.81.142.83',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazhpQkRZQ0xIbXJWR3lTQ2F6cHI2bUFCMkFueVh0RWFVQXFzY1VkVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268225),
('8hdA3jjqTzqzAkN7etUZbmTABnNIQNtCPrSxPJbK',	NULL,	'138.199.39.3',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkdzb1F0OE56Wk9sVEY0VlFXMXd3SlVhenVkN0xJWVYwUHN2ZmFrWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317532),
('8OU56eYeMH2bdbMOIZoxEobkEkDNxFwNtCzu0Nm5',	NULL,	'156.146.63.174',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmVDTjRkZ1pvdEIxb1o3Y1Ztb3BZM2Y1UWFSQnJjRUdoN2ZvdWZLMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268228),
('AXzdESBriZKJTSCW6BmWsRCBx9sbHiB4tDGo4qXX',	NULL,	'191.96.103.88',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlA5b2g3RnNpNkt4WnMzOUtTU0VNTUFqbTFabkpnUUFPaFJ4YTBLWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268210),
('B6POQiyylxQq4JcCfFTsgV8Dm6H8f2sxT3g8NQwy',	NULL,	'104.166.80.220',	'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGdick5FQTZJQmNxUmRHdWdSY1VjZE5LcmVlNHQ0SFYzR0J6RnNySCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmFiaXRvdXIuc2liYWcudXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',	1722323169),
('bQKC7jEyWIc69mH70Pk8No6YfXuXEvCAoaCsDdjX',	NULL,	'85.203.15.71',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFNwT0xNbkZaNGRmTFlVS1paTXJWT092bGdEejhwMXVJNE81cW5iUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268210),
('bt38U4pX0E3TSq6X6oGSC48ARVujvod0BVRT6kPT',	NULL,	'191.96.103.88',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmZ6WmphUDVrUFhEYld5ZkNMOEFyMFZPdXRTaThtVVRLZFI0SmNJaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317532),
('bVhcN93TYtWWk7ZrxRdiP8SPqt7Eed9HMUIVyCi9',	NULL,	'45.92.229.140',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2NYd21vcndzNm5wZHNYMTlBc0FUZXdvek9sOVJWdEpkM3FzNFNpUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722304907),
('bvI6Y8ib6T5g4efIOsRl96k506n7BDeFSl9stzAb',	NULL,	'185.94.190.202',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzI2SDJrcUdCV0FqRGk5R3dCQnNpMTBUWVNXcDU1R0UxeFVaY25kaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722304908),
('Cb6dCYweBKGJzQLDvDd8Tw9MhDJQPtwb9374JJYz',	NULL,	'185.192.69.114',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjA1TG1ueHJRUWJBS3Mwck5ZRW5hTlUzaUo3ZlhhbWQ3OHhLWHNHQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268210),
('d3auxEuQgXk53bqkVNTDkfmZF9RrTS1cFFKOhdmr',	NULL,	'181.215.176.62',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekc2M1JHTW03YklIcVdZbDhuMGJheVFGRmJGTjBkeE5wT2R5YUxxNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267617),
('DzPw1Abp1WdiDPvAvio4n6hHxUVNMTFSDkeecqEs',	NULL,	'98.159.43.144',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEZlSEdnM3NUQkRvbFdQMEo1bDAwNmJVSG9rNzR0S0w0eW8xOFppZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9hYml0b3VyLnNpYmFnLnVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',	1722267587),
('E8E3SxiXRWOu4XUa2gVDLkKWTawXjyDOV0iwRle3',	NULL,	'77.81.142.83',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnNHdzJFejZLeUROQWFaSDJ2UlB3SHIzRmJLaFhJbUpJbGRSajhZUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317538),
('EAwGIjGHpx0lOYtPACxRxR6ZzPF8kpnxIYSmlREB',	NULL,	'191.96.103.88',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiakdpTGtKcDdvRzJ6bmpmY3cyd0dkRUpXRzVyc3FrRUw4RFBWUElJRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267582),
('EdquafXMOkvxy4d5bnf0nfXCfilsMfkAAT4HfLub',	NULL,	'104.166.80.85',	'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXBRQ2JScWduQTVVNm1KeEV2TFFxSWVic01aaGZwRzJ1TllzUTdScCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmFiaXRvdXIuc2liYWcudXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',	1722286422),
('EL4k9geWZVJ9sSpmukbDXCfYbyX54Rt1EFYiy7nb',	NULL,	'138.199.39.3',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZU9wT2JZQjlFaGh3NnpodGdySTVRRTlhSG1lVHZ3MGhzQjRESW42dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722304907),
('FMXRdxXQZpCOPfUvv8z7eMXfI3QW3tXgCXRQbBzz',	NULL,	'185.94.190.202',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejFwTk5lR2RqalFDVExaOUxlY3hyTGhvM2t0UHZvcG5NVFhtbEN2MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317538),
('FvYPOZsF9YhtyfoSVhKeTAYWay9rpqm33snJNCZn',	NULL,	'191.96.103.88',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzFZbTZCemZWVUN6WmFaN0lHTTB4cWdWTWVWUWdYblRpQ1NaUjNFYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267582),
('fzPaOYmMs4Ghj8Q36KmjrevAuIYgB0eocX6JsMbs',	NULL,	'156.146.63.174',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVZsWmt2NmRZcnZZVjdrY3lJUkxaOGluVDlKV2k3RHR5TVJ2M21VUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267617),
('gEZU5FKrghnyhEa431PMhhWuWLiJ8udPuCmlPvUB',	NULL,	'185.192.69.103',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWVZY0dMdWp0QnNaU1BuV2tiZ0RqYjBIUGNmM3ZMdGtsVmUzeDhObCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722304907),
('GrMIJx7aXutMYV4HaQ01F40UPNEcffcU50AvhH2b',	NULL,	'191.96.103.88',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFFIeFJic3UzUlZCcHRmVjdWRk5KdWFDUXQzN2haUzB4TU1nSlZVZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268226),
('GWEyUtdWkbNKT8Xs80QmP6cjyhh6AOJw7w21TWQe',	NULL,	'167.172.20.151',	'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTNwN1VkY0txbktuZGlvTHZka3JYeVFtdDJKM2lXZHNhVDdPakpUeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmFiaXRvdXIuc2liYWcudXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',	1722302836),
('hNBtBRVQBCxmsZPPbNSoD7tjzmigrY18IfU2FAhe',	NULL,	'45.92.229.142',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0h6MUROTkRSQThwWUlxdHdtaXZCdjZsVHg3eXlnVHNjaWlnYUNBUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268226),
('HNuzh0BWFNmbQ3v660mpnmoXs0t9RJzBJFUeNilO',	NULL,	'84.247.59.39',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVB6dmkxdnZzakFBVHBLcWVYa3NlMEdpbWpYRUpCUDJraUNiWTNHUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317540),
('JEqhLlgtwfOPVQKNxYtRJcFZBVMxV20HDvVmVBIo',	NULL,	'156.146.63.174',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWlXNGxsUEk1SnF5Vm5ZcVZHcWE1VWpka1Jmbkt6bnZ1UHdyNUtmTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722304907),
('kBgIcT1NlqnS3qcV8Qfwk0RG6ESxixUiVXwQO7mX',	NULL,	'84.247.59.36',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoieG5rdm1FOXhOZ0FlakdDd2J5STJ2RnRISjFBTHhYQVM5bTd4RnZHQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317532),
('KwOgYKdAiPPGsc1BnEQYL3EEtMmUvRjIDPGZ1dF6',	NULL,	'191.101.157.138',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmZ6cjlrM2xDclcwSmpVY0trNm9tN1lCMWtjRzZmalFoa0sxYVNXMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267617),
('LmZ3WoDibH8FFASzx1Wn1liITp2CoodU0y860Qyz',	1,	'103.139.25.77',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRHVtQTRmMDdQS0RpN3RVeFBPeUZ0WEYwRWZCMHBmMTEzbFNjNkpvbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cy90YWdpaGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',	1722306507),
('lTClCUx0WLtws2MZyiApv0VLqbi2qPWDtIK1xZtx',	NULL,	'45.89.242.24',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGxKalZuQ3JCelRlYU5NbW16QmYwQ2t6a3dTMjRtOXBUUHdTcFBmaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317538),
('LYkaxA6olkoJgRfHM8KQmurwqibOe44Frk3VLm7I',	NULL,	'45.92.229.152',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1RFeFNwODd3cVFIVW00dGF3c3dQdW04RUVzVmtsbXM1SkFYVkRzRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317538),
('MErTV6sfrIIZDqJOYrjgUdybV6PWWxZFqwt1AdiT',	NULL,	'98.159.43.163',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjc4QU5qVHBwVW44c2RyS3U2V0ZBNGhqNWJiVzFjSmY5dXpuaTJnOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722304907),
('mmDxT2YicJVPfVjbPKWD7ik0PhVebZW6Gj2qj8Rz',	NULL,	'77.81.142.83',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUcyamJiT01PR3hMdzc2b2dWR0ZKS1Q5SUVoMVljNG5ud1Jkcmc1ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268210),
('mOPK0XgcPrcaYQ6M14z98iUZ2d7TnmkvY8rM9Kgn',	NULL,	'138.199.39.3',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1h6YndKeTFKcGtXNmtDYkptaENLM05rdm55b3BFS1V4bWJKYVh2dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268210),
('MYr1nDKmTLXSOx4OgVTbcQWK7Jz3VFrkfCXV0eSf',	NULL,	'138.199.39.3',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEdMTjN3QW9RVmY2ZzRHTkNsNlkyd0E1QTVPVE1zUmVwVDNXRTVXNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267582),
('mZ9KtpNeLyigOLI5wJ9mDE7MiQDBrlJUtKym24DB',	NULL,	'3.236.149.38',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaU9rOTVPMDBzZ0R4b0diSHJWblZ2WHJ2UHpZMlZJOGVhRmU3MjQwTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317544),
('nD5A0aS7zJSN8LQY8mdjCwkxizv8Whiymk1Dwyly',	NULL,	'77.81.142.83',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTk1IcGNEYmJJQjF1SEZIMUIyVlBJcG9tM3JHOGc1c3lvY0d1SUtFdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267616),
('nfGjyIUVN74ywgrrRQYVezehbmHIGdWaIZWeucAU',	NULL,	'45.92.229.149',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQndQOHBPaTdhdjNLVHdEbEx4bXF1VTByU1BMdUppcVdObkhUUkhvQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267616),
('NHomp6rBg12J4tZEK2eREVehdwB6hOuSZlMe9xlV',	NULL,	'77.81.142.83',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnpNNWFEZFZmQXBvalFCTWE3WUpHZ3prYjBLeU5JUjA0MUsyV1VqWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267583),
('nxWpkqKJJEGlRIpXImzKU6IuoH9JVy8kfpd2mgux',	NULL,	'45.92.229.147',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTQ3UXRXaEhOWGhkbW4wcGwyWHZVbmo3RTIxRVNhRkRQVWVNSGRzMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722304907),
('Obns2cNG4xn9viaZmfQOcLLDNDU5jRI4dYEBBRK0',	NULL,	'45.92.229.156',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnczVzY0UlNBa3djVGV5R0VSMGpMSHFkNjdlSnNNTXJoaGVBckF4ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267622),
('ofXLJameMDzDDsL5PQeYlsjkn0ru1xcc3r7mJZqv',	NULL,	'77.81.142.83',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzRvOE5KMFNOaXBCMjJKWGQzZktZdzFib2JtRGlBbTcwd3N2RkY4WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722304907),
('OUn3HklmTJvD8h3vczK0b2qdHrkgr3mRJHnZnhPP',	NULL,	'138.199.39.3',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGJ6MGZYbnhFcnBUNzBlcEw1THZycDlVUGV6V1oxOURieERGeE5YYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317538),
('pjIZCXFtA1DNIvE14Kxv9CCscYejbB0pFubdR9BX',	NULL,	'191.101.157.138',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVhEOFBZVnZJNXpnc0NMQnBtV1BsOUk0S2RZYTlJV0VyNE1FeVM2RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267582),
('pnodo6esemvbfHRfYiZiaD3DgTpS4PXmhsySZrxd',	NULL,	'138.199.39.3',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2FTWGdjM3dYSHJHSXo4WUI0N3o1VjV2Z0xnOFZlb20yR1N6UmthOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267616),
('qaIShKyrmeNmrMYCrCYIprwz6YpYj0nXyekSqdqK',	NULL,	'167.172.20.151',	'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODVDdUZ2TDhUcThENUVBazJLNWo2OWZDZk9NY0lQYXhSWEtBUk1HaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722302835),
('qcJHTsq4Vx8n8FZRF3XO11bGcHclLdqfoth8QOIB',	NULL,	'3.226.251.200',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHM3YjQ0MWpqUnlKZXBnVGlQZUtQSmc1WElVOUVQNG5GMHZlamg1ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267627),
('qK39jBoaz9KS3uHHwyPJUUzEMN6vW3uinCg373MO',	NULL,	'181.215.176.62',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3BkUjRwSm1NTUR1dFdpQXY0NXdSOFBWQmlnUlNmd2NvcGNLRVBYRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267582),
('r2OBjeKkCIov25X3NoNLzYlCYy2eTfcbmmlbBA9S',	NULL,	'185.94.190.202',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUJTd2g4YXRkOWNjRlNvb0NZMmNMdWdCaEhLSnZlNmVSR0NuVHN3VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317532),
('REYE3LgLZWNsDDTnd0dYzXjQ8jgAhv913db5pywX',	NULL,	'191.96.103.88',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHBseGxXOExxNTN0b3N3T0ZPc3lteUY5OHI5eWVzNnRQenA1UUR0eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317532),
('rfhkRO5kja3eaLaiLGqjclGYUlrOIkaExqJBz3tq',	NULL,	'191.101.157.138',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmJDdUVVR09udzNuWG5xUW9JcktZRURHdzZjUXhGeVZyMG96M1M2VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268226),
('RPmlZFDn5e0YNcWMeCI0K025ywzXeoU5lzil63gH',	NULL,	'3.238.181.253',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTE1YSkFQTFhuckpldDFVQ0pYOVRkMHp2SmNRakFYYjRaZVRQTTQ0QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268237),
('RuOmWWzDKiDniGbEFtGCa1nt8mX1NRZW9x0NVcMT',	NULL,	'156.146.63.174',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOG1ock8wN3Nkb3Q4djhJd2ExNUE4NDlVWDFaSGNVWDJQOElZYVRTViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317532),
('t2y5w5x4NUYECYJCgo7Muo8L0dhkTDlL7xTL2RXN',	NULL,	'156.146.63.174',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejNweUhneGttbllHNW1HNkR0Tk41bHQxUVhqWDd2UGoyczBmUVVBRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267583),
('tjJ0BZYgl0UGHpQpS2WQz40QftRPzHT541jRQ1Gh',	NULL,	'77.81.142.83',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1NKaHhZc3A1RlhORURJVWhtcGVJWEw3NVFaYkpFZnF1eHZETEJpTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317532),
('uq19OummtZ12bqGMwZLXsl3mlaVBIJyocDHGfhMf',	NULL,	'98.159.43.154',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzRsMVpKUDJDRnNJS0R3bnl5eXg0OTk1dmVTRjExOGx3eFhGeHQ5WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267617),
('WGh7jayQfwGWTzZKy2QP3JbZngYEWSrgKyTd1016',	NULL,	'104.166.80.60',	'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoicU1JS1N3djBYblJEeElYQVB5RXRWQ0VNc2FmZnhjZDJDNVM3cHlFdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722285948),
('Wi8qbGepUFVSGniaswO7lTIMb8PqXXLilIowMEGb',	NULL,	'156.146.63.174',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3o2UkpEZVFBSGtQbmZRUXFTTmtKWVhKU1BWSzdtWUE3YWlZZDZoZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317538),
('wu0XiL2O4xDVhIvRvS1chXuqkz0RD2nbw0Xo4NSN',	NULL,	'138.199.39.3',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVN3RElJMkRnVlpNNFZoUzJvcktzRFc3eU0xS1E4cFdFRmY0RkhYbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268232),
('XvfryABceqC8kjZcrHq4f5Pl0qN9kTOE6Aci4qZ6',	NULL,	'156.146.63.174',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWVmZ2xoQVo5SUFXVkMzSVdVcm1uOUtmbXBFUHZJWWhDeWg1ZUdwdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268210),
('XxLolIkF3gRzpH9vmeeLottjyAqH7vPXJr9iD52i',	NULL,	'185.192.69.113',	'Mozilla/5.0 (Linux; U; Android 2.2) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRDR5SEFsRnROTG5zNGdnREN3RzlsSmJXN2M5d05QSlVzUnpBSHZHMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722268225),
('XZ5Pg1HHlX6JXPIVvYJiDAtaErz0NtJIzrtVJbpb',	NULL,	'45.92.229.153',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2I1dkFOSWxJanptYVVXWTY4aWxrekhVelBqcXJXNkZhdFlFbDVXTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722267616),
('YK81Ol5ZshsTePKOsXX3a8HFlwRacL5Ps7OsYIG9',	NULL,	'104.166.80.194',	'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1AzdTRZZnp3eFlSUUNMcjJXak5KUWhlYUw0bnJ1NThxNUJxTm15MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722323343),
('ZDvgRLJ8Uy5dECgIE23EFd88tgKWtbfGsa2f0krc',	1,	'103.139.25.77',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibENUcmdQN0c3YXBCRGR6aUU0b2w5SGtiRElFcVhZMWdFZ0hMaWlrdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cy90YWdpaGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',	1722328121),
('zQBldUFOo2wcH53VsVfvzwERe3pxmZaHXYycguml',	NULL,	'45.92.229.151',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmgzWlV5NGtMZE5OWmlMZGROR2lxZERxSm40M0Z1cWd0M0FEZHFXRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWJpdG91ci5zaWJhZy51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1722317538);

DROP TABLE IF EXISTS `tagihan_pembayaran`;
CREATE TABLE `tagihan_pembayaran` (
  `id_invoice` varchar(100) NOT NULL,
  `tanggal_invoice` date NOT NULL,
  `nomor_siswa` varchar(12) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nominal_tagihan` int(11) NOT NULL,
  `informasi` varchar(60) NOT NULL,
  `nomor_jurnal_pembukuan` varchar(100) DEFAULT NULL,
  `waktu_transaksi` datetime DEFAULT NULL,
  `channel_pembayaran` varchar(20) DEFAULT NULL,
  `status_pembayaran` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_invoice`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `tagihan_pembayaran` (`id_invoice`, `tanggal_invoice`, `nomor_siswa`, `nik`, `nama`, `nominal_tagihan`, `informasi`, `nomor_jurnal_pembukuan`, `waktu_transaksi`, `channel_pembayaran`, `status_pembayaran`, `updated_at`, `created_at`) VALUES
('127',	'2021-07-16',	'191213',	'333333',	'Bayu Anggara',	5000,	'Infaq ',	'9639250717065732000451',	'2024-07-17 13:57:33',	'FLAGGING',	'SUKSES',	NULL,	NULL),
('128',	'2021-07-16',	'481482',	'12345679',	'M rijaluddin',	10000,	'Tes Ting Abi tour',	'1980920716083847000451',	'2024-07-16 15:38:49',	'MBANK',	'SUKSES',	NULL,	NULL),
('129',	'2024-07-18',	'1230987',	'3515100000330003',	'M Bayu Put',	10000,	'Pembaruan data pembayaran',	NULL,	NULL,	NULL,	NULL,	'2024-07-18 04:27:56',	'2024-07-18 04:27:56'),
('130',	'2024-07-18',	'12309878',	'3515100000330003',	'M Bayu Put',	10000,	'Pembaruan data pembayaran',	NULL,	NULL,	NULL,	NULL,	'2024-07-24 11:56:48',	'2024-07-24 11:56:48'),
('131',	'2024-07-18',	'12309871',	'35151000003300032',	'M Bayu Pa',	10000,	'Pembaruan data pembayaran',	NULL,	NULL,	NULL,	NULL,	'2024-07-24 12:02:53',	'2024-07-24 12:01:53'),
('132',	'2024-07-26',	'707519',	'324234234234234214',	'2321',	150000,	'5654',	NULL,	NULL,	NULL,	NULL,	'2024-07-26 02:12:49',	'2024-07-26 02:10:36');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'admin@admin.com',	NULL,	'$2y$12$kAatyMWX8bDq.aL5KKs2ieyoWTIgdEvJUVo8ozbC2ruB/G.evqdfO',	NULL,	NULL,	NULL),
(2,	'dd',	'danu@gmail.com',	NULL,	'$2y$12$4AvyUIkQaULl5UFXsv1YeO0zdzd3eMgyAXvt8ZYtc3ldT8Rc72Rf.',	NULL,	'2024-07-27 06:57:06',	'2024-07-27 10:12:43'),
(3,	'abababab',	'sibagus@gmail.com',	NULL,	'$2y$12$7ht4p3Py7/EmQylNS.nmRe.89pA3JEuVn0cxj0p2sHAjOU94vfXWm',	NULL,	'2024-07-27 08:51:13',	'2024-07-27 08:51:13');

-- 2024-07-30 08:34:29
