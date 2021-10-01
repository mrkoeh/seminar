/*
Navicat MySQL Data Transfer

Source Server         : xampp D
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : pri_seminar

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-10-11 10:30:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `galeri`
-- ----------------------------
DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri` (
  `KodeGaleri` int(11) NOT NULL AUTO_INCREMENT,
  `KodeKategori` int(11) DEFAULT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`KodeGaleri`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of galeri
-- ----------------------------
INSERT INTO `galeri` VALUES ('2', '2', 'Tes Ubah Data lagi', 'Chrysanthemum.jpg', '1', '2014-08-13 03:08:42');
INSERT INTO `galeri` VALUES ('3', '2', 'rubahdede', 'Hydrangeas.jpg', '1', '2014-08-13 03:08:53');
INSERT INTO `galeri` VALUES ('4', '2', 'a', 'Tulips.jpg', '1', '2014-08-13 04:08:21');
INSERT INTO `galeri` VALUES ('5', '2', 'asasas', 'Penguins.jpg', '1', '2014-08-13 04:08:15');
INSERT INTO `galeri` VALUES ('6', '2', 'eee', 'Lighthouse.jpg', '1', '2014-08-13 04:08:25');

-- ----------------------------
-- Table structure for `katgaleri`
-- ----------------------------
DROP TABLE IF EXISTS `katgaleri`;
CREATE TABLE `katgaleri` (
  `KodeKategori` int(11) NOT NULL AUTO_INCREMENT,
  `Kategori` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KodeKategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of katgaleri
-- ----------------------------
INSERT INTO `katgaleri` VALUES ('2', 'Tes', 'Tes');

-- ----------------------------
-- Table structure for `konfirmasi`
-- ----------------------------
DROP TABLE IF EXISTS `konfirmasi`;
CREATE TABLE `konfirmasi` (
  `KodeKonfirmasi` varchar(15) NOT NULL,
  `KodeRegistrasi` varchar(15) DEFAULT NULL,
  `KodeSeminar` varchar(10) DEFAULT NULL,
  `TanggalPembayaran` datetime DEFAULT NULL,
  `BankPengirim` varchar(20) DEFAULT NULL,
  `NamaPemilikRekening` varchar(50) DEFAULT NULL,
  `BuktiPembayaran` varchar(50) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`KodeKonfirmasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of konfirmasi
-- ----------------------------
INSERT INTO `konfirmasi` VALUES ('20140722K0', '', 'Kode01', '2014-07-22 00:00:00', 'BNI', 'Kukuh Nugroho', 'Byy8vDJK.png', '2014-07-22 06:07:24');
INSERT INTO `konfirmasi` VALUES ('20140722K0141', '20140716R0002', 'SM0001', '2014-07-22 00:00:00', 'Mandiri', 'Soraya Pratiwi', 'images.jpg', '2014-07-22 06:07:31');
INSERT INTO `konfirmasi` VALUES ('20141011K14073', '20140716R0001', 'Kode01', '2014-10-11 00:00:00', 'aa', 'aa', 'Desert.jpg', '2014-10-11 05:10:31');
INSERT INTO `konfirmasi` VALUES ('20141011K14102', 'RG14073', 'Kode02', '2014-10-18 00:00:00', 'aa', 'aa', 'Lighthouse.jpg', '2014-10-11 05:10:41');

-- ----------------------------
-- Table structure for `kontak`
-- ----------------------------
DROP TABLE IF EXISTS `kontak`;
CREATE TABLE `kontak` (
  `KodeKontak` varchar(10) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Pesan` longtext,
  `CreateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`KodeKontak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kontak
-- ----------------------------
INSERT INTO `kontak` VALUES ('20140717C0', 'Kukuh', 'mrkoeh@gmail.com', 'Tes saja', '2014-07-17 08:07:27');
INSERT INTO `kontak` VALUES ('20140910C1', 'aaa', 'mrkoeh@gmail.com', 'aaa', '2014-09-10 03:09:16');

-- ----------------------------
-- Table structure for `registrasi`
-- ----------------------------
DROP TABLE IF EXISTS `registrasi`;
CREATE TABLE `registrasi` (
  `KodeRegistrasi` varchar(15) NOT NULL,
  `KodeSeminar` varchar(10) DEFAULT NULL,
  `NoIdentitas` varchar(16) NOT NULL,
  `NamaLengkap` varchar(50) NOT NULL,
  `Institusi` varchar(50) DEFAULT NULL,
  `AlamatInstitusi` varchar(100) DEFAULT NULL,
  `TempatLahir` varchar(20) DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `JenisKelamin` varchar(10) DEFAULT NULL,
  `Pekerjaan` varchar(20) DEFAULT NULL,
  `Agama` varchar(10) DEFAULT NULL,
  `AlamatLengkap` varchar(100) DEFAULT NULL,
  `Telp` varchar(12) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `Absensi` int(11) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`KodeRegistrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of registrasi
-- ----------------------------
INSERT INTO `registrasi` VALUES ('20140716R0001', 'Kode01', '03423433', 'Kukuh Nugroho', 'SIMRS', 'Banyumas', 'Banyumas', '1991-09-09', 'Laki-laki', 'Swasta', 'Islam', 'Banyumas', '089680033932', 'mrkoeh@gmail.com', 'Desert.jpg', '2', '1', '2014-07-16 08:07:09');
INSERT INTO `registrasi` VALUES ('20140716R0002', 'Kode02', '23235325', 'Soraya Pratiwi', null, null, null, null, null, null, null, null, null, 'kuqoeh_only@yahoo.co.id', 'Hydrangeas.jpg', '2', '1', null);
INSERT INTO `registrasi` VALUES ('20140716R0003', 'Kode01', '34533463', 'Sany Nurul', null, null, null, null, null, null, null, null, null, null, 'Jellyfish.jpg', '1', '0', null);
INSERT INTO `registrasi` VALUES ('20140717R0004', 'Kode01', '123', 'aa', 'aa', 'aa', 'aa', '2014-07-17', 'Laki-laki', 'aa', 'Islam', 'aa', '11', 'aa@gmail.com', 'Koala.jpg', '1', '0', '2014-07-17 06:07:44');
INSERT INTO `registrasi` VALUES ('20140717R0005', 'Kode02', '5', 'd', 'd', 'd', 'd', '2014-07-09', 'Laki-laki', 'd', 'Islam', 'd', '4', 'mrkoeh@gmail.com', 'Lighthouse.jpg', '1', '0', '2014-07-17 09:07:41');
INSERT INTO `registrasi` VALUES ('20140717R0141', 'Kode02', '3302190909910002', 'sasa', 'Sasa', 'sasa', 'sasa', '2014-07-02', 'Perempuan', 'saas', 'Hindu', 'sasa', '12', 'koehdownload@gmail.com', 'Hydrangeas.jpg', '2', '1', '2014-07-17 09:07:19');
INSERT INTO `registrasi` VALUES ('RG14072', 'Kode01', '3302190909910002', 'Kukuh Nugroho', 'SIMRS', 'Banyumas', 'Banyumas', '1991-09-09', 'Laki-laki', 'Swasta', 'Islam', 'Banyumas', '089680033932', 'kuqoeh_only@yahoo.co.id', 'Ay3.jpg', '1', '0', '2014-08-25 08:08:34');
INSERT INTO `registrasi` VALUES ('RG14073', 'Kode02', '3302190909910003', 'Galuh Pangestrika', 'PNS', 'Bandung', 'Bandung', '2014-07-02', 'Laki-laki', 'PNS', 'Islam', 'Bandung', '089680033932', 'kuqoeh_only@yahoo.co.id', 'Ay2.jpg', '2', '0', '2014-08-25 08:08:50');

-- ----------------------------
-- Table structure for `reminder_seminar`
-- ----------------------------
DROP TABLE IF EXISTS `reminder_seminar`;
CREATE TABLE `reminder_seminar` (
  `Id` int(3) NOT NULL AUTO_INCREMENT,
  `NoIdentitas` varchar(16) DEFAULT NULL,
  `KodeRegistrasi` varchar(10) DEFAULT NULL,
  `KodeSeminar` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Kode` varchar(100) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reminder_seminar
-- ----------------------------
INSERT INTO `reminder_seminar` VALUES ('1', '', '', 'Kode02', '', '3db03d1bfe2018e73947dbefb30ccd9c', '0000-00-00 00:00:00');
INSERT INTO `reminder_seminar` VALUES ('2', '', '', 'Kode02', '', '5dea84b6757711c7a373bd979849efa3', '0000-00-00 00:00:00');
INSERT INTO `reminder_seminar` VALUES ('3', '', '', 'Kode02', '', 'bb730586ad1d721c21c2de806e7adb44', '0000-00-00 00:00:00');
INSERT INTO `reminder_seminar` VALUES ('4', '23235325', '20140716R0', 'Kode02', 'kuqoeh_only@yahoo.co.id', '294d705847f7bdc9e753fcf37771a3d7', '2014-08-25 09:45:13');
INSERT INTO `reminder_seminar` VALUES ('5', '3302190909910002', '20140717R0', 'Kode02', 'koehdownload@gmail.com', '7d40d8357e98f862bf7a158c90dbe952', '2014-08-25 09:45:18');
INSERT INTO `reminder_seminar` VALUES ('6', '23235325', '20140716R0', 'Kode02', 'kuqoeh_only@yahoo.co.id', '962d33ee3e1d31d2f9467e4ee629f6f7', '2014-08-25 09:45:44');
INSERT INTO `reminder_seminar` VALUES ('7', '3302190909910002', '20140717R0', 'Kode02', 'koehdownload@gmail.com', '31b224de3a4ba98c31b661ccef8eddc7', '2014-08-25 09:45:50');
INSERT INTO `reminder_seminar` VALUES ('8', '23235325', '20140716R0', 'Kode02', 'kuqoeh_only@yahoo.co.id', '5cb89bd5556a4ba040d6d3020ad59fc0', '2014-08-25 09:49:24');
INSERT INTO `reminder_seminar` VALUES ('9', '3302190909910002', '20140717R0', 'Kode02', 'koehdownload@gmail.com', 'ab9bddbf13d2194679b711c4e9791163', '2014-08-25 09:49:32');

-- ----------------------------
-- Table structure for `seminar`
-- ----------------------------
DROP TABLE IF EXISTS `seminar`;
CREATE TABLE `seminar` (
  `KodeSeminar` varchar(10) NOT NULL DEFAULT '',
  `TemaSeminar` varchar(100) DEFAULT NULL,
  `Penyelenggara` varchar(100) DEFAULT NULL,
  `TanggalPelaksanaan` datetime DEFAULT NULL,
  `Tempat` varchar(50) DEFAULT NULL,
  `Biaya` double DEFAULT NULL,
  `Kapasitas` int(11) DEFAULT NULL,
  `Pengisi` varchar(100) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`KodeSeminar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of seminar
-- ----------------------------
INSERT INTO `seminar` VALUES ('Kode01', 'Percobaan', 'SIMRS', '2014-11-02 12:00:00', 'Purwokerto', '125000', '120', null, '2014-07-15 10:07:37');
INSERT INTO `seminar` VALUES ('Kode02', 'test', 'test', '2014-09-03 12:00:00', 'test', '125000', '21000', 'test', '2014-07-21 04:07:42');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `KodeUser` varchar(10) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Level` int(1) DEFAULT NULL,
  `NamaLengkap` varchar(50) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`KodeUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('U0001', 'sany', 'sany', '1', 'Sany Nurul Fadila', 'sanynurulfadyla@gmai', '1', '2014-07-13 08:20:58');

-- ----------------------------
-- Table structure for `verifikasi_pendaftaran`
-- ----------------------------
DROP TABLE IF EXISTS `verifikasi_pendaftaran`;
CREATE TABLE `verifikasi_pendaftaran` (
  `Id` int(3) NOT NULL AUTO_INCREMENT,
  `NoIdentitas` varchar(16) DEFAULT NULL,
  `KodeSeminar` varchar(10) DEFAULT NULL,
  `KodeRegistrasi` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Kode` varchar(100) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of verifikasi_pendaftaran
-- ----------------------------
INSERT INTO `verifikasi_pendaftaran` VALUES ('1', '3302190909910002', 'Kode01', 'RG14072', 'kuqoeh_only@yahoo.co.id', '64d3efc77606bde8c902451a8361388b', '2014-08-25 08:08:34');
INSERT INTO `verifikasi_pendaftaran` VALUES ('2', '3302190909910003', 'Kode02', 'RG14073', 'kuqoeh_only@yahoo.co.id', '0ba3fcae6aaf554f0ecc157b9a537a23', '2014-08-25 08:08:50');

-- ----------------------------
-- Table structure for `web`
-- ----------------------------
DROP TABLE IF EXISTS `web`;
CREATE TABLE `web` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `KodeMenu` int(11) DEFAULT NULL,
  `Judul` text,
  `Deskripsi` longtext,
  `Status` int(11) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of web
-- ----------------------------
INSERT INTO `web` VALUES ('1', '1', 'Efektif', 'lebih mengutamakan pada pencapaian apa yang menjadi tujuan dan sasaran dari visi-misi.', '1', null);
INSERT INTO `web` VALUES ('2', '1', 'Efisien', 'pelayanan dibatasi pada hal-hal yang berkaitan langsung dengan tetap memperhatikan keterpaduan antara persyaratan dan produk pelayanan', '1', null);
INSERT INTO `web` VALUES ('3', '1', 'Terpercaya', 'Peserta bisa mengetahui seluruh informasi yang mereka butuhkan secara mudah dan gamblang.', '1', null);
INSERT INTO `web` VALUES ('4', '1', 'Registrasi', 'Mengisi data lengkap pada form yang telah disediakan ', '1', null);
INSERT INTO `web` VALUES ('5', '1', 'Konfirmasi', 'Melakukan konfirmasi pembayaran pendaftaran seminar.', '1', null);
INSERT INTO `web` VALUES ('6', '1', 'Absensi', 'Datang tepat waktu pada tempat dan waktu yang sudah ditentukan.', '1', null);
INSERT INTO `web` VALUES ('7', '2', 'Tentang Kami', 'Langkah Production adalah sebuah team professional yang begerak dalam bidang jasa event organizer di Jakarta dan Indonesia. Kami membantu dalam perencanaan sebuah event/acara yang luar biasa, mulai dari menyusun konsep desain event, sampai jasa produksi baik untuk event perusahaan maupun perorangan.\r\n\r\nKami ahli dalam merancang sebuah event yang menampilkan suasana dan ide-ide yang segar serta mengkombinasikan dengan berbagai aspek yang mengaduk-aduk emosi didalamnya.\r\n\r\nKami fokus pada kualitas, bukan kuantitas, mengaplikasikan setiap detail dari konsep event yang telah disepakati sehingga menghasilkan event yang sangat terorganisir special dan luar biasa untuk semua klien kami.\r\n\r\nLangkah Production didukung personal-personal di dalam team yang selalu bekerja total dan memiliki berpengalaman serta handal dan professional di bidangnya masing-masing. Siap menjadikan hal-hal yang tidak mungkin pada awalnya menjadi event yang mengagumkan dan luar biasa, berbagai macam event telah kami organisir seperti launching product, wedding organizer, outbound activity, company / family gathering, seminar event, school reuni party, dll.', '1', '2014-09-10 10:24:17');
INSERT INTO `web` VALUES ('8', '3', 'Bagaimana cara mengikuti seminar??', 'Anda hanya perlu melakukan registrasi dengan mengisi informasi data pribadi dengan lengkap pada form yang sudah disediakan, kemudian akan ada email masuk yang berisi kode registrasi yang diperlukan saat melakukan konfirmasi pembayaran biaya seminar.', '1', null);
INSERT INTO `web` VALUES ('9', '3', 'Bagaimana cara melakukan pembayaran seminar??', 'Anda melakukan pembayaran melalui transfer bank ke rekening yang sudah ditentukan, kemudian lakukanlah konfirmasi pembayaran dengan mengisi form yang sudah disediakan.', '1', null);
INSERT INTO `web` VALUES ('10', '3', 'Apakah ada pemberitahuan tentang seminar yang akan dilaksanakan?', 'YA, kami akan memberikan notifikasi tentang seminar yang akan dilaksanakan melalui email anda.', '1', null);
INSERT INTO `web` VALUES ('11', '3', 'Pembatalan seminar', 'Pembatalan seminar tidak mengembalikan uang pendaftaran, hal ini dikarenakan uang pendaftaran sudah dialokasikan oleh panitia untuk memenuhi akomodasi peserta selama seminar', '1', null);
INSERT INTO `web` VALUES ('12', '3', 'Pelaksanaan Seminar', 'Peserta diwajibkan datang 1 jam sebelum acara seminar dimulai. Peserta akan melakukan konfirmasi / daftar ulang di tempat dimana acara seminar dilaksanakan dengan memberikan kode registrasi yang sudah di dapat.', '1', '2014-10-08 10:10:45');
