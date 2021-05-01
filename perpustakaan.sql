-- Adminer 4.8.0 MySQL 8.0.23-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kategori_id` int NOT NULL,
  `judul` varchar(50) NOT NULL,
  `cover` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stok` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `denda`;
CREATE TABLE `denda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) NOT NULL,
  `biaya` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `kategori_buku`;
CREATE TABLE `kategori_buku` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


SET NAMES utf8mb4;

INSERT INTO `keys` (`id`, `key`) VALUES
(1,	'f99aecef3d12e02dcbb6260bbdd35189c89e6e73');

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE `peminjaman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) NOT NULL,
  `petugas_id` int NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_batas_kembali` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKpeminjaman212020` (`nim`),
  KEY `FKpeminjaman186144` (`petugas_id`),
  CONSTRAINT `FKpeminjaman186144` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`),
  CONSTRAINT `FKpeminjaman212020` FOREIGN KEY (`nim`) REFERENCES `anggota` (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `peminjaman_buku`;
CREATE TABLE `peminjaman_buku` (
  `id` int NOT NULL AUTO_INCREMENT,
  `peminjaman_id` int NOT NULL,
  `buku_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `peminjaman_id_buku_id` (`peminjaman_id`,`buku_id`),
  KEY `FKpeminjaman210373` (`peminjaman_id`),
  KEY `FKpeminjaman870930` (`buku_id`),
  CONSTRAINT `FKpeminjaman210373` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`),
  CONSTRAINT `FKpeminjaman870930` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE `pengembalian` (
  `peminjaman_id` int NOT NULL,
  `petugas_id` int NOT NULL,
  `tanggal_kembali` date NOT NULL,
  PRIMARY KEY (`peminjaman_id`),
  KEY `petugas_id` (`petugas_id`),
  CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pengembalian_buku`;
CREATE TABLE `pengembalian_buku` (
  `peminjaman_id` int NOT NULL,
  `buku_id` int NOT NULL,
  `buku_rusak` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`peminjaman_id`,`buku_id`),
  KEY `peminjaman_id` (`peminjaman_id`),
  KEY `buku_id` (`buku_id`),
  CONSTRAINT `pengembalian_buku_ibfk_1` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`),
  CONSTRAINT `pengembalian_buku_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pengembalian_denda`;
CREATE TABLE `pengembalian_denda` (
  `peminjaman_id` int NOT NULL,
  `denda_id` int NOT NULL,
  `qty` double NOT NULL,
  `nominal` double NOT NULL,
  PRIMARY KEY (`peminjaman_id`,`denda_id`),
  KEY `denda_id` (`denda_id`),
  CONSTRAINT `pengembalian_denda_ibfk_1` FOREIGN KEY (`denda_id`) REFERENCES `denda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `expired` datetime NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `petugas_id` int DEFAULT NULL,
  `nim` int DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2021-05-01 02:50:42
