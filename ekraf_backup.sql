/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.3-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ekraf
-- ------------------------------------------------------
-- Server version	11.8.3-MariaDB-0+deb13u1 from Debian

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `artikels`
--

DROP TABLE IF EXISTS `artikels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `artikels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikels`
--

LOCK TABLES `artikels` WRITE;
/*!40000 ALTER TABLE `artikels` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `artikels` VALUES
(1,'Festival Kreatif Sumedang 2025 Resmi Dibuka','Admin','artikel/Uwor6fnE8qUgg5tMDe4fF2L14fOSnJ9kEJHk0aua.jpg','Festival Kreatif Sumedang 2025 resmi dibuka dengan menampilkan karya seni, musik, dan kuliner lokal. Acara ini dihadiri oleh pelaku ekonomi kreatif dari berbagai kecamatan.','2025-11-02 03:19:03','2025-11-02 10:30:23'),
(2,'Pelatihan Digital Marketing untuk Pelaku UMKM','Admin',NULL,'Dinas Pariwisata dan Ekonomi Kreatif menggelar pelatihan digital marketing guna meningkatkan kemampuan promosi online bagi pelaku usaha lokal.','2025-11-02 03:19:03','2025-11-02 03:19:03'),
(3,'Kompetisi Desain Logo Ekraf Sumedang','Admin',NULL,'Kompetisi desain logo ini terbuka untuk umum dengan tujuan menemukan identitas visual baru bagi Ekraf Sumedang. Pemenang akan mendapatkan penghargaan dan hadiah menarik.','2025-11-02 03:19:03','2025-11-02 03:19:03'),
(4,'Kolaborasi Seniman Lokal Ciptakan Pameran Seni Rupa','Admin',NULL,'Para seniman muda di Sumedang berkolaborasi dalam pameran bertajuk \"Warna dari Tanah Sunda\". Karya yang ditampilkan mencerminkan budaya dan kehidupan masyarakat modern.','2025-11-02 03:19:03','2025-11-02 03:19:03'),
(5,'Inovasi Kuliner Tradisional Jadi Daya Tarik Baru Wisatawan','Admin',NULL,'Pelaku kuliner di Sumedang mulai memadukan resep tradisional dengan sentuhan modern. Inovasi ini diharapkan dapat menarik lebih banyak wisatawan ke daerah tersebut.','2025-11-02 03:19:03','2025-11-02 03:19:03');
/*!40000 ALTER TABLE `artikels` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `desas`
--

DROP TABLE IF EXISTS `desas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `desas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan_id` bigint(20) unsigned NOT NULL,
  `kd_kelurahan` varchar(255) NOT NULL,
  `nama_kelurahan` varchar(255) NOT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `desas_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `desas_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=278 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desas`
--

LOCK TABLES `desas` WRITE;
/*!40000 ALTER TABLE `desas` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `desas` VALUES
(1,11,'1','Cimanggung','45364','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(2,12,'2','Hegarmanah','45360','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(3,1,'1','Jayamekar','45375','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(4,25,'6','Kirisik','45376','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(5,26,'16','Ranggon','45372','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(6,25,'4','Sarimekar','45376','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(7,11,'5','Sindanggalih','45364','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(8,11,'4','Sindulang','45364','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(9,24,'11','Sukapura','45373','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(10,1,'6','Tamansari','45375','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(11,25,'2','Tarikolot','45376','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(12,11,'3','Tegalmanggung','45364','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(13,25,'8','Cipeundeuy','45376','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(14,14,'8','Citengah','45311','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(15,24,'4','Cikareo Selatan','45373','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(16,24,'2','Ganjaresik','45373','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(17,24,'3','Cilengkrang','45373','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(18,24,'1','Cimungkal','45373','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(19,1,'5','Cipasang','45375','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(20,1,'7','Jayamandiri','45375','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(21,24,'7','Mulyajaya','45373','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(22,1,'3','Cibugel','45375','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(23,24,'9','Sukajadi','45373','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(24,1,'4','Sukaraja','45375','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(25,26,'2','Darmajaya','45372','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(26,12,'10','Jatiroke','45360','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(27,26,'13','Neglasari','45372','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(28,25,'1','Sirnasari','45376','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(29,26,'3','Sukamenak','45372','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(30,19,'9','Mandalaherang','45353','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(31,8,'6','Margajaya','45362','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(32,8,'4','Margaluyu','45362','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(33,3,'3','Mekarmulya','45371','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(34,21,'10','Mekarwangi','45382','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(35,17,'4','Mulyamekar','45354','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(36,15,'5','Mulyasari','45321','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(37,4,'11','Narimbang','45391','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(38,13,'1','Nagarawangi','45361','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(39,7,'6','Nagrak','45392','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(40,19,'4','Naluk','45353','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(41,6,'9','Nanjung Wangi','45393','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(42,19,'5','Nyalindung','45353','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(43,19,'13','Padasari','45353','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(44,2,'3','Pajagan','45363','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(45,26,'11','Pakualam','45372','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(46,22,'2','Palabuan','45383','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(47,22,'3','Palasari','45383','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(48,13,'6','Pamekaran','45361','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(49,6,'3','Pamekarsari','45393','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(50,10,'3','Pamulihan','45365','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(51,7,'10','Panyindangan','45392','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(52,5,'2','Paseh Kaler','45381','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(53,5,'1','Pasehkidul','45381','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(54,5,'7','Pasirreungit','45381','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(55,26,'15','Tarunajaya','45372','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(56,15,'13','Rancamulya','45321','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(57,6,'8','Ranggasari','45393','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(58,14,'3','Regolwetan','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(59,7,'8','Sekarwangi','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(60,19,'12','Serang','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(61,3,'2','Situraja','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(62,15,'9','Sirnamulya','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(63,15,'2','Situ','45323','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(64,2,'2','Situmekar','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(65,14,'5','Sukagalih','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(66,16,'4','Sukaluyu','45356','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(67,17,'1','Sukamantri','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(68,18,'7','Sukamukti','45352','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(69,9,'7','Sukarapih','45366','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(70,3,'14','Sukatali','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(71,16,'5','Sukawening','45356','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(72,6,'7','Suriamedal','45393','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(73,6,'6','Suriamukti','45393','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(74,8,'2','Tanjungsari','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(75,15,'3','Talun','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(76,6,'4','Tanjung','45393','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(77,18,'9','Tanjung Medar','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(78,16,'6','Tanjunghurip','45356','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(79,17,'10','Tanjungmulya','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(80,18,'6','Tanjungwangi','45352','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(81,22,'1','Ujungjaya','45383','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(82,21,'2','Tolengas','45382','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(83,19,'6','Trunamanggala','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(84,6,'2','Wanajaya','45393','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(85,6,'1','Wanasari','45393','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(86,14,'6','Baginda','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(87,4,'10','Cacaban','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(88,20,'4','Bantarmara','45355','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(89,7,'12','Bojongloa','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(90,5,'5','Bongkok','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(91,7,'1','Buahdua','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(92,2,'10','Cinangsi','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(93,4,'4','Cibeureuyeuh','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(94,7,'7','Cibitung','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(95,13,'9','Cibungur','45361','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(96,17,'8','Cigentur','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(97,2,'4','Cigintung','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(98,5,'8','Cijambe','45381','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(99,3,'11','Cijati','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(100,3,'8','Cijeler','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(101,3,'4','Cikadu','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(102,19,'7','Cikole','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(103,18,'1','Cikaramas','45352','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(104,26,'6','Cikeusi','45372','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(105,16,'7','Cikondang','45356','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(106,16,'3','Cikoneng','45356','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(107,16,'8','Cikonengkulon','45356','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(108,7,'11','Cilangkap','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(109,19,'1','Cimalaka','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(110,20,'3','Cimara','45355','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(111,19,'14','Cimuja','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(112,4,'3','Cipamekar','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(113,20,'5','Cipandanwangi','45355','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(114,10,'10','Ciptasari','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(115,2,'1','Cisitu','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(116,5,'10','Citepok','45381','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(117,10,'11','Citali','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(118,19,'11','Citimun','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(119,4,'2','Conggeang Wetan','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(120,21,'3','Darmawangi','45382','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(121,16,'2','Dayeuhluhur','45356','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(122,19,'2','Galudra','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(123,16,'1','Ganeas','45356','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(124,17,'3','Gunturmekar','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(125,7,'2','Hariang','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(126,5,'9','Haurkuning','45381','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(127,4,'5','Jambu','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(128,15,'11','Jatihurip','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(129,15,'12','Jatimulya','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(130,8,'3','Jatisari','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(131,23,'12','Kadu','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(132,23,'2','Kadujaya','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(133,3,'6','Kaduwulung','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(134,7,'3','Karangbungur','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(135,3,'7','Karangheuleut','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(136,26,'10','Karangpakuan','45372','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(137,22,'4','Keboncau','45383','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(138,15,'10','Kebonjati','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(139,17,'7','Kertaharja','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(140,17,'6','Kertamekar','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(141,15,'1','Kotakaler','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(142,14,'2','Kotakulon','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(143,22,'6','Kudangwangi','45383','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(144,5,'4','Legok Kaler','45381','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(145,5,'3','Legok Kidul','45381','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(146,19,'10','Licin','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(147,3,'5','Bangbayang','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(148,12,'3','Cibeusi','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(149,26,'9','Cieunteung','45372','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(150,10,'5','Cilembu','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(151,2,'9','Cimarga','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(152,8,'12','Cinanjung','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(153,14,'7','Cipancar','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(154,26,'1','Darmaraja','45372','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(155,8,'10','Gunungmanik','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(156,10,'4','Haurgombong','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(157,26,'5','Sukaratu','45372','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(158,8,'5','Kutamandiri','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(159,8,'7','Raharja','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(160,9,'3','Banyuresmi','45366','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(161,9,'2','Genteng','45366','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(162,9,'4','Nanggerang','45366','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(163,9,'6','Sindangsari','45366','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(164,25,'5','Banjarsari','45376','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(165,11,'10','Cihanjuang','45364','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(166,11,'7','Cikahuripan','45364','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(167,12,'1','Cikeruh','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(168,12,'7','Cintamulya','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(169,12,'4','Cipacing','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(170,12,'9','Cisempur','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(171,12,'8','Jatimukti','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(172,12,'6','Mekargalih','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(173,11,'9','Mangunarga','45364','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(174,11,'8','Sukadana','45364','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(175,11,'11','Pasirnanjung','45364','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(176,25,'3','Pawenang','45376','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(177,11,'6','Sawahdadap','45364','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(178,24,'6','Wado','45373','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(179,12,'5','Sayang','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(180,25,'7','Sukamanah','45376','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(181,24,'5','Cikareo Utara','45373','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(182,1,'2','Buanamekar','45375','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(183,11,'2','Sindangpakuon','45364','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(184,26,'7','Cipeuteuy','45372','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(185,24,'10','Cisurat','45373','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(186,15,'7','Mekarjaya','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(187,7,'4','Mekarmukti','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(188,21,'4','Marongge','45382','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(189,3,'13','Malaka','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(190,14,'13','Margalaksana','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(191,15,'8','Margamukti','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(192,14,'14','Mekar Rahayu','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(193,9,'5','Mekarsari','45366','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(194,4,'7','Padaasih','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(195,5,'6','Padanan','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(196,15,'4','Padasuka','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(197,3,'12','Pamulihan','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(198,13,'3','Pangadegan','45361','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(199,14,'1','Pasanggrahan Baru','45313','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(200,13,'10','Pasirbiru','45361','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(201,8,'9','Pasigaran','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(202,13,'7','Rancakalong','45361','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(203,22,'5','Sakurjaya','45383','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(204,2,'7','Ranjeng','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(205,3,'1','Situraja Utara','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(206,2,'5','Sundamekar','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(207,13,'4','Sukahayu','45361','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(208,13,'5','Sukamaju','45361','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(209,22,'7','Sukamulya','45383','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(210,9,'1','Sukasari','45366','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(211,13,'8','Sukasirnarasa','45361','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(212,18,'8','Sukatani','45352','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(213,10,'9','Sukawangi','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(214,6,'5','Surian','45393','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(215,17,'9','Tanjungmekar','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(216,21,'1','Tomo','45382','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(217,4,'8','Ungkal','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(218,18,'2','Wargaluyu','45352','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(219,4,'6','Babakan Asem','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(220,21,'6','Bugel','45382','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(221,3,'9','Ambit','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(222,17,'12','Awilega','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(223,17,'5','Banyuasih','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(224,17,'11','Boros','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(225,2,'8','Cilopang','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(226,23,'4','Cintajaya','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(227,7,'14','Ciawitali','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(228,19,'8','Cibeureum Wetan','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(229,19,'3','Cibeureum Kulon','45353','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(230,3,'15','Cicarimanah','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(231,4,'12','Cibubuan','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(232,22,'9','Cibuluh','45383','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(233,13,'2','Cibunar','45361','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(234,10,'1','Cigendel','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(235,14,'12','Ciherang','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(236,8,'8','Cijambu','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(237,10,'2','Cijeruk','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(238,23,'1','Cijeungjing','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(239,7,'13','Cikurubuk','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(240,12,'12','Cilayung','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(241,4,'1','Conggeang Kulon','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(242,14,'4','Cipameungpeuk','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(243,17,'2','Cipanas','45354','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(244,22,'8','Cipelang','45383','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(245,21,'7','Cipeles','45382','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(246,23,'5','Cipicung','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(247,20,'6','Cisalak','45355','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(248,23,'9','Cisampih','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(249,20,'1','Cisarua','45355','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(250,7,'5','Citaleus','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(251,20,'2','Ciuyah','45355','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(252,7,'9','Gendereh','45392','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(253,15,'6','Girimukti','45321','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(254,8,'1','Gudang','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(255,14,'9','Gunasari','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(256,14,'10','Sukajaya','45314','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(257,3,'10','Jatimekar','45371','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(258,23,'10','Jemah','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(259,21,'5','Jembarwangi','45382','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(260,18,'4','Kamal','45352','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(261,18,'3','Jingkang','45352','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(262,8,'11','Kadakajaya','45362','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(263,4,'9','Karang Layung','45391','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(264,23,'11','Karedok','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(265,21,'8','Karyamukti','45382','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(266,20,'7','Kebonkalapa','45355','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(267,18,'5','Kertamukti','45352','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(268,23,'3','Lebaksiuh','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(269,2,'6','Linggajaya','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(270,12,'11','Cileles','45360','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(271,25,'9','Cimanintin','45376','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(272,10,'6','Cimarias','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(273,10,'7','Cinanggerang','45365','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(274,23,'8','Ciranggem','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(275,14,'11','Margamekar','45311','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(276,23,'6','Mekarasih','45377','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(277,10,'8','Mekarbakti','45365','2025-11-02 03:19:02','2025-11-02 03:19:02');
/*!40000 ALTER TABLE `desas` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `kecamatans`
--

DROP TABLE IF EXISTS `kecamatans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `kecamatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kd_kecamatan` varchar(255) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kecamatans_kd_kecamatan_unique` (`kd_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatans`
--

LOCK TABLES `kecamatans` WRITE;
/*!40000 ALTER TABLE `kecamatans` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `kecamatans` VALUES
(1,'004','Cibugel','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(2,'005','Cisitu','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(3,'006','Situraja','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(4,'007','Conggeang','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(5,'008','Paseh','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(6,'009','Surian','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(7,'010','Buahdua','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(8,'011','Tanjungsari','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(9,'012','Sukasari','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(10,'013','Pamulihan','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(11,'014','Cimanggung','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(12,'015','Jatinangor','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(13,'016','Rancakalong','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(14,'017','Sumedang Selatan','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(15,'018','Sumedang Utara','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(16,'019','Ganeas','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(17,'020','Tanjungkerta','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(18,'021','Tanjungmedar','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(19,'022','Cimalaka','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(20,'023','Cisarua','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(21,'024','Tomo','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(22,'025','Ujungjaya','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(23,'026','Jatigede','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(24,'001','Wado','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(25,'002','Jatinunggal','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(26,'003','Darmaraja','2025-11-02 03:19:01','2025-11-02 03:19:01');
/*!40000 ALTER TABLE `kecamatans` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `kontaks`
--

DROP TABLE IF EXISTS `kontaks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `kontaks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon1` varchar(255) DEFAULT NULL,
  `telepon2` varchar(255) DEFAULT NULL,
  `telepon3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontaks`
--

LOCK TABLES `kontaks` WRITE;
/*!40000 ALTER TABLE `kontaks` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `kontaks` VALUES
(1,'Jl. Prabu Geusan Ulun No.36, Regol Wetan, Sumedang Selatan, Kabupaten Sumedang, Jawa Barat 45311','disparbudporasumedang@gmail.com','0812-206-6291','0852-2259-2016','0858-7178-6613','2025-11-02 03:19:02','2025-11-02 03:19:02');
/*!40000 ALTER TABLE `kontaks` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2025_10_23_022407_create_profiles_table',1),
(5,'2025_10_23_024954_create_artikels_table',1),
(6,'2025_10_23_030246_create_subsektors_table',1),
(7,'2025_10_23_032753_create_kecamatans_table',1),
(8,'2025_10_23_032807_create_desas_table',1),
(9,'2025_10_23_032916_create_usahas_table',1),
(10,'2025_10_23_053536_create_kontaks_table',1),
(11,'2025_10_23_072641_create_sliders_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `program` text DEFAULT NULL,
  `penjelasan` text DEFAULT NULL,
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `profiles` VALUES
(1,'Tentang Ekonomi Kreatif','Membangun masyarakat kreatif, inovatif, dan berdaya saing tinggi.','1. Mendorong kolaborasi antar pelaku ekonomi kreatif.\r\n                              2. Memberikan pelatihan dan pendampingan usaha mikro.\r\n                              3. Mengembangkan potensi lokal berbasis digital.','Pelatihan kewirausahaan, inkubasi bisnis, promosi produk lokal, dan digitalisasi UMKM.','Ekonomi kreatif merupakan sektor unggulan dalam membangun kemandirian masyarakat\r\n                              serta meningkatkan perekonomian daerah melalui inovasi dan komunikasi',NULL,NULL,NULL,'2025-11-02 03:19:02','2025-11-02 10:28:45');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `sessions` VALUES
('Eod88hXThqLijVzdBWvmQMAxTA7lXYt1IwaxLac1',2,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:140.0) Gecko/20100101 Firefox/140.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoibXJWVjBUNWRrb3Y1bzNOR3VUQTY0N2tXZ3ZVVkhjYWdoQnJ3MDFtcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wZXR1Z2FzL2FydGlrZWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvcGV0dWdhcy9hcnRpa2VsIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9',1762748568),
('Hc8s0R2nDbwHJ9ycwjiokypwSSlG5bdQfhhd9Pup',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:140.0) Gecko/20100101 Firefox/140.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMm1iVmY3aWxJeVNmdUFsUTlHaVAxYTlBaEhDcXNyVkJCT2FBUHJYMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXR1Z2FzL2FydGlrZWwvaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1762748701);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `sliders` VALUES
(1,'ekraf','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','sliders/mICFgCg1VDVpSfcXG5JqhTdNMGjKKezHiwfrVetx.jpg',1,'2025-11-02 03:27:39','2025-11-02 03:27:39'),
(2,'Lomba Digital','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','sliders/tgKw6Lga6mLbB5fwQamPKLiBVEjGiz5g0yRlRZaE.jpg',1,'2025-11-02 03:29:25','2025-11-02 03:29:25');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `subsektors`
--

DROP TABLE IF EXISTS `subsektors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `subsektors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `ikon` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subsektors`
--

LOCK TABLES `subsektors` WRITE;
/*!40000 ALTER TABLE `subsektors` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `subsektors` VALUES
(1,'Seni Pertunjukan','fa-solid fa-theater-masks',NULL,'2025-11-02 03:19:02','2025-11-02 03:19:02'),
(2,'Musik','fa-solid fa-music',NULL,'2025-11-02 03:19:02','2025-11-02 03:19:02'),
(3,'Kriya','fa-solid fa-hands',NULL,'2025-11-02 03:19:02','2025-11-02 03:19:02'),
(4,'Kuliner','fa-solid fa-utensils',NULL,'2025-11-02 03:19:02','2025-11-02 03:19:02'),
(5,'Seni Rupa','fa-solid fa-palette',NULL,'2025-11-02 03:19:02','2025-11-02 03:19:02'),
(6,'Fashion','fa-solid fa-shirt',NULL,'2025-11-02 03:19:02','2025-11-02 03:19:02'),
(7,'Film, Video dan Animasi','fa-solid fa-film',NULL,'2025-11-02 03:19:02','2025-11-02 03:19:02'),
(8,'Fotografi','fa-solid fa-camera',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03'),
(9,'Aplikasi','fa-solid fa-mobile-screen-button',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03'),
(10,'Desain Produk','fa-solid fa-cube',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03'),
(11,'Desain Komunikasi Visual','fa-solid fa-pen-nib',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03'),
(12,'Pengembangan Permainan','fa-solid fa-gamepad',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03'),
(13,'Penerbitan','fa-solid fa-book',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03'),
(14,'Desain Interior','fa-solid fa-couch',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03'),
(15,'Periklanan','fa-solid fa-bullhorn',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03'),
(16,'Arsitektur','fa-solid fa-drafting-compass',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03'),
(17,'Radio dan Televisi','fa-solid fa-tower-broadcast',NULL,'2025-11-02 03:19:03','2025-11-02 03:19:03');
/*!40000 ALTER TABLE `subsektors` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `usahas`
--

DROP TABLE IF EXISTS `usahas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `usahas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `merk_usaha` varchar(255) NOT NULL,
  `akun_sosial_media` varchar(255) DEFAULT NULL,
  `jenis_usaha` varchar(255) DEFAULT NULL,
  `url_website` varchar(255) DEFAULT NULL,
  `status_usaha` enum('Tidak Berbadan Usaha','Perusahaan Perorangan','Sanggar atau Perkumpulan','CV','Perseroan Terbatas (PT)','Firma','Koperasi','Yayasan') DEFAULT NULL,
  `url_ecommerce` varchar(255) DEFAULT NULL,
  `jumlah_tenaga_kerja` int(11) DEFAULT NULL,
  `deskripsi_kegiatan` text DEFAULT NULL,
  `lingkup_pemasaran` varchar(255) DEFAULT NULL,
  `asal_bahan` varchar(255) DEFAULT NULL,
  `pendapatan_per_bulan` decimal(15,2) DEFAULT NULL,
  `subsektor_id` bigint(20) unsigned DEFAULT NULL,
  `kecamatan_id` bigint(20) unsigned DEFAULT NULL,
  `desa_id` bigint(20) unsigned DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usahas_subsektor_id_foreign` (`subsektor_id`),
  KEY `usahas_kecamatan_id_foreign` (`kecamatan_id`),
  KEY `usahas_desa_id_foreign` (`desa_id`),
  CONSTRAINT `usahas_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE SET NULL,
  CONSTRAINT `usahas_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE SET NULL,
  CONSTRAINT `usahas_subsektor_id_foreign` FOREIGN KEY (`subsektor_id`) REFERENCES `subsektors` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usahas`
--

LOCK TABLES `usahas` WRITE;
/*!40000 ALTER TABLE `usahas` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `usahas` VALUES
(1,'Yani Suryani','3276016701010001','081234567890','1980-01-01','yani@example.com','P','Warung Nasi Bu Yani','@warungyani','Kuliner',NULL,'Perusahaan Perorangan',NULL,3,'Menyediakan makanan tradisional khas Sunda.','Lokal','Lokal',7500000.00,1,20,266,'Jl. Utama No. 32, Kebonkalapa','45355','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(2,'Budi Rahmat','3276012306010002','082134567891','1985-06-23','budi@example.com','L','Toko Pakaian Sejahtera','@pakaiansejahtera','Fashion','https://tokosejahtera.id','Tidak Berbadan Usaha','https://shopee.co.id/sejahtera',2,'Menjual pakaian dan perlengkapan muslim.','Kabupaten','Lokal',5000000.00,1,25,13,'Jl. Utama No. 84, Cipeundeuy','45376','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(3,'Ahmad Fikri','3276011507920003','081322445566','1979-07-15','fikri@example.com','L','CV Maju Jaya','@cvmajubersama','Manufaktur','https://cvmajubersama.com','CV',NULL,15,'Produksi peralatan rumah tangga dari logam.','Nasional','Lokal dan impor',85000000.00,1,2,206,'Jl. Utama No. 15, Sundamekar','45363','2025-11-02 03:19:02','2025-11-02 03:19:02'),
(4,'bayu','1234567890123456','08976568','2000-12-09','bayuf2124@gmail.com','L','bayu store','@bayuStore','perorang',NULL,'CV','http://bayu.com',100,'membuat website','lokal','lokal',1000000.00,9,4,127,'jl jambu batu','45391','2025-11-10 08:07:05','2025-11-10 08:07:05');
/*!40000 ALTER TABLE `usahas` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas') NOT NULL DEFAULT 'petugas',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'ekraf','ekraf@sumedang.com','2025-11-02 03:19:00','$2y$12$ffvjXF9FP2z5vqDyJmkO5eNUGHyNb4975KbS5BaE3K0FD/rJ139P.','admin','v3CYpzFVUK2pjdbzhxrO6Hz2TOw4GbunqIXbzd4ieNJyY7ruRDTanjYtaUzp','2025-11-02 03:19:01','2025-11-02 03:19:01'),
(2,'bayu','bayu@example.com',NULL,'$2y$12$FKlyoTIkRYSJ4oA7.6pDBe7nvjbsiRjrO9n7kJbgmaZCh3qUM3etC','petugas',NULL,'2025-11-10 08:41:45','2025-11-10 08:41:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-11-09 23:35:12
