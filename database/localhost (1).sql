-- Adminer 4.2.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomer` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_id` int(10) unsigned NOT NULL,
  `asal_surat` int(10) unsigned NOT NULL,
  `tujuan_surat` int(10) unsigned NOT NULL,
  `sap_po` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sap_kpp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tembusan_surat_1` int(10) unsigned NOT NULL,
  `tembusan_surat_2` int(10) unsigned NOT NULL,
  `tembusan_surat_3` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `dokumen_nomer_unique` (`nomer`),
  KEY `dokumen_jenis_id_foreign` (`jenis_id`),
  KEY `dokumen_asal_surat_foreign` (`asal_surat`),
  KEY `dokumen_tujuan_surat_foreign` (`tujuan_surat`),
  KEY `dokumen_tembusan_surat_1_foreign` (`tembusan_surat_1`),
  KEY `dokumen_tembusan_surat_2_foreign` (`tembusan_surat_2`),
  KEY `dokumen_tembusan_surat_3_foreign` (`tembusan_surat_3`),
  KEY `dokumen_created_by_foreign` (`created_by`),
  CONSTRAINT `dokumen_asal_surat_foreign` FOREIGN KEY (`asal_surat`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokumen_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokumen_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_dokumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokumen_tujuan_surat_foreign` FOREIGN KEY (`tujuan_surat`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `jenis_dokumen`;
CREATE TABLE `jenis_dokumen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `singkatan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `jenis_dokumen` (`id`, `nama`, `singkatan`, `created_at`, `updated_at`) VALUES
(1,	'Korin Pengadaan',	'KPP',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'Porcuser Requisision',	'PR',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_01_14_030504_create_users_table',	1),
('2016_01_14_030827_create_personils_table',	1),
('2016_01_14_030837_create_units_table',	1),
('2016_01_14_030846_create_posisis_table',	1),
('2016_01_14_030924_update_forein_key',	1),
('2016_01_14_033536_role_user',	1),
('2016_01_14_033639_update_forein_user',	1),
('2016_01_14_053409_update_posisi_table',	1),
('2016_01_14_105717_create_dokumens_table',	1),
('2016_01_14_125727_role_dokumen',	1),
('2016_01_14_125743_jenis_dokumen',	1),
('2016_01_14_130730_sap_tabel',	1),
('2016_01_14_132456_forein_key_dokumen',	1),
('2016_01_14_132942_upload_role',	1),
('2016_01_14_133046_forein_key_upload_role',	1),
('2016_01_14_164707_update_jenis_dokumen',	1),
('2016_01_15_002955_create_table_tembusan',	1);

DROP TABLE IF EXISTS `personil`;
CREATE TABLE `personil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `singkatan` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `posisi_id` int(10) unsigned DEFAULT NULL,
  `unit_id` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `personil_posisi_id_foreign` (`posisi_id`),
  KEY `personil_unit_id_foreign` (`unit_id`),
  KEY `personil_created_by_foreign` (`created_by`),
  CONSTRAINT `personil_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `personil_posisi_id_foreign` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `personil_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `personil` (`id`, `nik`, `nama`, `singkatan`, `email`, `gmail`, `posisi_id`, `unit_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1,	'',	'Wandri Eka Putra',	'wep',	'wandri.putra@semenindonesia.com',	'wandri.putra@gmail.com',	9,	4,	NULL,	'2016-01-15 00:55:22',	'2016-01-15 00:55:22');

DROP TABLE IF EXISTS `posisi`;
CREATE TABLE `posisi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `singkatan` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `posisi` (`id`, `nama`, `created_at`, `updated_at`, `singkatan`) VALUES
(1,	'Kepala Proyek Indarung VI',	'2016-01-15 00:55:22',	'2016-01-15 00:55:22',	''),
(2,	'General Manager',	'2016-01-15 00:55:22',	'2016-01-15 00:55:22',	'GM'),
(3,	'Staff DPD',	'2016-01-15 00:55:22',	'2016-01-15 00:55:22',	''),
(4,	'Senior Manager',	'2016-01-15 00:55:22',	'2016-01-15 00:55:22',	'SM'),
(5,	'Manager',	'2016-01-15 00:55:22',	'2016-01-15 00:55:22',	'MGR'),
(6,	'Kepala Urusan',	'2016-01-15 00:55:22',	'2016-01-15 00:55:22',	'KAUR'),
(7,	'Karyawan',	'2016-01-15 00:55:22',	'2016-01-15 00:55:22',	''),
(8,	'PKWT Profesional',	'2016-01-15 00:55:22',	'2016-01-15 00:55:22',	''),
(9,	'PKWT Biasa',	'2016-01-15 00:55:22',	'2016-01-15 00:55:22',	'');

DROP TABLE IF EXISTS `role_dokumen`;
CREATE TABLE `role_dokumen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `role_user` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1,	'Administrator',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'Uploader Unit',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(3,	'Audit',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(4,	'Manager',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(5,	'Senior Manager',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(6,	'General Manager',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(7,	'Uploader HRGA',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `tabel_sap`;
CREATE TABLE `tabel_sap` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `po` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kpp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wbs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tembusan`;
CREATE TABLE `tembusan` (
  `dokumen_id` int(10) unsigned NOT NULL,
  `unit_id` int(10) unsigned NOT NULL,
  KEY `tembusan_dokumen_id_foreign` (`dokumen_id`),
  KEY `tembusan_unit_id_foreign` (`unit_id`),
  CONSTRAINT `tembusan_dokumen_id_foreign` FOREIGN KEY (`dokumen_id`) REFERENCES `dokumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tembusan_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `singkatan` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `unit_created_by_foreign` (`created_by`),
  CONSTRAINT `unit_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `unit` (`id`, `nama`, `singkatan`, `created_by`, `created_at`, `updated_at`) VALUES
(1,	'Deputy Project Director',	'DPD',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'Engineering and Construction',	'ENC',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(3,	'Procurement and Supporting Function',	'PSF',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(4,	'Accounting, Finance and Information System',	'AFIS',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(5,	'Civil Construction',	'CC',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(6,	'Civil Engineering',	'CE',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(7,	'Electrical and Instrument Engineering',	'EIE',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(8,	'Electrical and Instrument Construction',	'EIC',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(9,	'Human Resource and General Affair',	'HRGA',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(10,	'Logistic and Warehouse',	'LOGWH',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(11,	'Mechanical Construction',	'MC',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(12,	'Mechanical Engineering',	'ME',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(13,	'Offsite Dispatch',	'OD',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(14,	'Offsite Mining',	'OM',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(15,	'Project Control and Risk Management',	'PCRM',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(16,	'Process Engineering',	'PE',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(17,	'Process Engineering and Operation Preparation',	'PEOP',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(18,	'Procurement',	'PROC',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(19,	'Safety, Health, Environment and Security',	'SHES',	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `upload_role`;
CREATE TABLE `upload_role` (
  `jenis_id` int(10) unsigned NOT NULL,
  `unit_id` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  KEY `upload_role_jenis_id_foreign` (`jenis_id`),
  KEY `upload_role_unit_id_foreign` (`unit_id`),
  KEY `upload_role_created_by_foreign` (`created_by`),
  CONSTRAINT `upload_role_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `upload_role_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_dokumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `upload_role_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `role_user_id` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `personil_id` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username_unique` (`username`),
  KEY `user_personil_id_foreign` (`personil_id`),
  KEY `user_created_by_foreign` (`created_by`),
  KEY `user_role_user_id_foreign` (`role_user_id`),
  CONSTRAINT `user_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_personil_id_foreign` FOREIGN KEY (`personil_id`) REFERENCES `personil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`role_user_id`) REFERENCES `role_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `username`, `password`, `status`, `role_user_id`, `created_by`, `personil_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'root',	'$2y$10$z.3etL5uZmy3NFxuuA1I7Oz58fv1hPR.H9JHL2cg5ojsnKH2w3YUi',	'A',	1,	NULL,	1,	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'admin',	'$2y$10$CO8/mZJ.V2ZIAPM/ucBlGeJwTuX2PUJN2WyL1vvbJWnzT4oBtsgJS',	'N',	1,	NULL,	1,	NULL,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00');

-- 2016-01-15 13:25:30
