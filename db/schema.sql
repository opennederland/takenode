CREATE TABLE `certificates` (
  `id` varchar(36) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `file_hash` varchar(64) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_verified_at` int unsigned DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int unsigned NOT NULL,
  `updated_at` int unsigned NOT NULL,
  `deleted_at` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3
