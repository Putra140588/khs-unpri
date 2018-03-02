/*
Navicat MySQL Data Transfer

Source Server         : achmad-chariry
Source Server Version : 50626
Source Host           : 127.0.0.1:3306
Source Database       : unpri

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2015-09-28 18:23:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Achmad Chariry');

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id_dosen` int(10) NOT NULL AUTO_INCREMENT,
  `nik` int(10) DEFAULT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES ('1', '1', 'Amanda Nasution', 'Laki-laki', 'Islam', 'XXX');
INSERT INTO `dosen` VALUES ('2', '2', 'Syahril', 'Laki-laki', 'Islam', '0857XXX');
INSERT INTO `dosen` VALUES ('3', '3', 'Ratih', 'Perempuan', 'Katholik', '0859XXX');
INSERT INTO `dosen` VALUES ('4', '4', 'Andri', 'Laki-laki', 'Protestan', '0859XXX');
INSERT INTO `dosen` VALUES ('5', '5', 'Handi', 'Laki-laki', 'Hindu', '0856XXX');
INSERT INTO `dosen` VALUES ('6', '6', 'Suandi', 'Laki-laki', 'Islam', '0852XXX');
INSERT INTO `dosen` VALUES ('7', '7', 'Prety', 'Perempuan', 'Katholik', '0877XXX');
INSERT INTO `dosen` VALUES ('8', '8', 'Hardiyanti', 'Perempuan', 'Islam', '0878XXX');
INSERT INTO `dosen` VALUES ('9', '9', 'Hana', 'Perempuan', 'Islam', '0877XXX');
INSERT INTO `dosen` VALUES ('10', '10', 'Susilo Bambang', 'Laki-laki', 'Protestan', 'XXX');
INSERT INTO `dosen` VALUES ('11', '11', 'Andri Kosasih', 'Laki-laki', 'Islam', 'XXX');

-- ----------------------------
-- Table structure for fakultas
-- ----------------------------
DROP TABLE IF EXISTS `fakultas`;
CREATE TABLE `fakultas` (
  `kd_fakultas` varchar(10) NOT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `id_dosen` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd_fakultas`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fakultas
-- ----------------------------
INSERT INTO `fakultas` VALUES ('FE', 'Ekonomi', '5');
INSERT INTO `fakultas` VALUES ('FS', 'Sosial dan Politik', '2');
INSERT INTO `fakultas` VALUES ('FT', 'Teknik', '3');

-- ----------------------------
-- Table structure for jadwal_mata_kuliah
-- ----------------------------
DROP TABLE IF EXISTS `jadwal_mata_kuliah`;
CREATE TABLE `jadwal_mata_kuliah` (
  `kd_jadwal` int(10) NOT NULL AUTO_INCREMENT,
  `kd_mata_kuliah` varchar(10) DEFAULT NULL,
  `id_dosen` int(10) DEFAULT NULL,
  `kd_fakultas` varchar(10) DEFAULT NULL,
  `kd_jurusan` varchar(10) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `kd_kelas_program` varchar(10) DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `waktu_mulai` varchar(10) DEFAULT NULL,
  `waktu_selesai` varchar(10) DEFAULT NULL,
  `ruang` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kd_jadwal`),
  KEY `kd_kelas_program` (`kd_kelas_program`),
  KEY `kd_mata_kuliah` (`kd_mata_kuliah`),
  KEY `id_dosen` (`id_dosen`),
  KEY `kd_fakultas` (`kd_fakultas`),
  KEY `kd_jurusan` (`kd_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jadwal_mata_kuliah
-- ----------------------------
INSERT INTO `jadwal_mata_kuliah` VALUES ('7', 'UAA002', '5', 'FT', 'FTI', '1', 'K02', '2015/2016', 'Senin', '19:00', '20:00', '1.1');
INSERT INTO `jadwal_mata_kuliah` VALUES ('8', 'FT101', '8', 'FT', 'FTI', '1', 'K02', '2015/2016', 'Kamis', '20:00', '22:00', '2.1');

-- ----------------------------
-- Table structure for jenjang
-- ----------------------------
DROP TABLE IF EXISTS `jenjang`;
CREATE TABLE `jenjang` (
  `kd_jenjang` varchar(10) NOT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_jenjang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenjang
-- ----------------------------
INSERT INTO `jenjang` VALUES ('D3', 'Diploma');
INSERT INTO `jenjang` VALUES ('S1', 'Sarjana Strata 1');
INSERT INTO `jenjang` VALUES ('S2', 'Sarjana Strata 2');

-- ----------------------------
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `kd_jurusan` varchar(10) NOT NULL,
  `kd_fakultas` varchar(10) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `singkatan` varchar(10) DEFAULT NULL,
  `id_dosen` int(10) DEFAULT NULL,
  `akreditasi` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kd_jurusan`),
  KEY `kd_fakultas` (`kd_fakultas`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
INSERT INTO `jurusan` VALUES ('FEM', 'FE', 'Managemen', 'EM', '5', 'B');
INSERT INTO `jurusan` VALUES ('FEP', 'FE', 'Perbankan', 'EP', '3', 'C');
INSERT INTO `jurusan` VALUES ('FSK', 'FS', 'Komunikasi', 'SPK', '7', 'B');
INSERT INTO `jurusan` VALUES ('FSP', 'FS', 'Pemerintahan', 'SPP', '10', 'A');
INSERT INTO `jurusan` VALUES ('FTE', 'FT', 'Elektro', 'TE', '8', 'B');
INSERT INTO `jurusan` VALUES ('FTI', 'FT', 'Informatika', 'TI', '9', 'C');
INSERT INTO `jurusan` VALUES ('FTM', 'FT', 'Mesin', 'TM', '4', 'B');

-- ----------------------------
-- Table structure for kelas_program
-- ----------------------------
DROP TABLE IF EXISTS `kelas_program`;
CREATE TABLE `kelas_program` (
  `kd_kelas_program` varchar(10) NOT NULL,
  `kelas_program` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_kelas_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelas_program
-- ----------------------------
INSERT INTO `kelas_program` VALUES ('K01', 'Karyawan');
INSERT INTO `kelas_program` VALUES ('K02', 'Reguler Malam');
INSERT INTO `kelas_program` VALUES ('K03', 'Reguler Pagi');

-- ----------------------------
-- Table structure for khs
-- ----------------------------
DROP TABLE IF EXISTS `khs`;
CREATE TABLE `khs` (
  `kd_khs` int(10) NOT NULL AUTO_INCREMENT,
  `kd_krs` int(10) DEFAULT NULL,
  `kd_nilai_absensi` int(10) DEFAULT NULL,
  `kd_nilai_tugas` int(10) DEFAULT NULL,
  `kd_nilai_uts` int(10) DEFAULT NULL,
  `kd_nilai_uas` int(10) DEFAULT NULL,
  `kd_mutu` varchar(10) DEFAULT NULL,
  `ips` int(10) DEFAULT NULL,
  `total_sks` int(10) DEFAULT NULL,
  `sks_diambil` int(10) DEFAULT NULL,
  `sks_ditempuh` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd_khs`),
  KEY `kd_krs` (`kd_krs`),
  KEY `kd_nilai_absensi` (`kd_nilai_absensi`),
  KEY `kd_nilai_tugas` (`kd_nilai_tugas`),
  KEY `kd_nilai_uts` (`kd_nilai_uts`),
  KEY `kd_nilai_uas` (`kd_nilai_uas`),
  KEY `kd_mutu` (`kd_mutu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of khs
-- ----------------------------
INSERT INTO `khs` VALUES ('1', '20', '13', '13', '5', '4', null, null, '144', null, null);

-- ----------------------------
-- Table structure for krs
-- ----------------------------
DROP TABLE IF EXISTS `krs`;
CREATE TABLE `krs` (
  `kd_krs` int(10) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(10) DEFAULT NULL,
  `kd_mata_kuliah` varchar(10) DEFAULT NULL,
  `total_sks` int(2) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `tahun_ajaran` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_krs`),
  KEY `id_mahasiswa` (`id_mahasiswa`),
  KEY `kd_mata_kuliah` (`kd_mata_kuliah`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of krs
-- ----------------------------
INSERT INTO `krs` VALUES ('20', '13', 'TI102', '0', '1', '2010/2011');
INSERT INTO `krs` VALUES ('21', '13', 'TI101', '0', '1', '2010/2011');
INSERT INTO `krs` VALUES ('24', '16', 'UAA002', '0', '1', '2011/2012');
INSERT INTO `krs` VALUES ('25', '13', 'UAA002', '0', '1', '2010/2011');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT,
  `nim` int(10) DEFAULT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `kd_fakultas` varchar(10) DEFAULT NULL,
  `kd_jurusan` varchar(10) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `kd_kelas_program` varchar(10) DEFAULT NULL,
  `kd_jenjang` varchar(10) DEFAULT NULL,
  `tahun_ajaran` varchar(50) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  KEY `kd_fakultas` (`kd_fakultas`),
  KEY `kd_jurusan` (`kd_jurusan`),
  KEY `kd_kelas_program` (`kd_kelas_program`),
  KEY `kd_jenjang` (`kd_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('5', '112161020', 'Andi Setiawan', 'Laki-laki', 'Islam', 'FT', 'FTI', '8', 'K02', 'S1', '2011/2012', 'XXX');
INSERT INTO `mahasiswa` VALUES ('6', '112161021', 'Andi Syaputra', 'Laki-laki', 'Islam', 'FE', 'FEP', '8', 'K02', 'S2', '2011/2012', 'XXX');
INSERT INTO `mahasiswa` VALUES ('7', '112161022', 'Ahmad Syahrudin', 'Laki-laki', 'Islam', 'FS', 'FSK', '8', 'K01', 'D3', '2011/2012', 'XXX');
INSERT INTO `mahasiswa` VALUES ('8', '112161023', 'Ardi Ardiansyah', 'Laki-laki', 'Islam', 'FS', 'FSP', '8', 'K01', 'S1', '2011/2012', 'XXX');
INSERT INTO `mahasiswa` VALUES ('9', '112161025', 'Arie Fernanda', 'Laki-laki', 'Islam', 'FE', 'FEM', '8', 'K03', 'S1', '2011/2012', 'XXX');
INSERT INTO `mahasiswa` VALUES ('10', '112161024', 'Feri Nurohman', 'Laki-laki', 'Protestan', 'FT', 'FTE', '7', 'K01', 'D3', '2012/2013', 'XXX');
INSERT INTO `mahasiswa` VALUES ('12', '112161027', 'Alleta Ling', 'Perempuan', 'Budha', 'FT', 'FTM', '8', 'K03', 'S1', '2011/2012', 'XXX');
INSERT INTO `mahasiswa` VALUES ('13', '112161028', 'Achmad Chariry', 'Laki-laki', 'Islam', 'FT', 'FTI', '8', 'K02', 'S1', '2011/2012', '0859XXX');
INSERT INTO `mahasiswa` VALUES ('14', '112161029', 'Huzair MIqdad', 'Laki-laki', 'Islam', 'FS', 'FSP', '8', 'K02', 'S1', '2011/2012', 'XXX');
INSERT INTO `mahasiswa` VALUES ('16', '234', 'Norman', 'Laki-laki', 'Islam', 'FT', 'FTI', '8', 'K02', 'S1', '2016/2017', 'XXX');

-- ----------------------------
-- Table structure for mata_kuliah
-- ----------------------------
DROP TABLE IF EXISTS `mata_kuliah`;
CREATE TABLE `mata_kuliah` (
  `kd_mata_kuliah` varchar(10) NOT NULL,
  `mata_kuliah` varchar(100) DEFAULT NULL,
  `sks` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kd_mata_kuliah`),
  KEY `mata_kuliah` (`mata_kuliah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mata_kuliah
-- ----------------------------
INSERT INTO `mata_kuliah` VALUES ('FT101', 'Kalkulus I', '3');
INSERT INTO `mata_kuliah` VALUES ('FT102', 'Fisika', '2');
INSERT INTO `mata_kuliah` VALUES ('TI101', 'Komputer dan Masyarakat', '3');
INSERT INTO `mata_kuliah` VALUES ('TI102', 'Pengantar Teknologi Informasi', '3');
INSERT INTO `mata_kuliah` VALUES ('TI103', 'Algoritma dan Pemrograman', '2');
INSERT INTO `mata_kuliah` VALUES ('TI104', 'Praktikum Algoritma dan Pemrograman', '1');
INSERT INTO `mata_kuliah` VALUES ('UAA002', 'Pendidikan Pancasila', '2');
INSERT INTO `mata_kuliah` VALUES ('UAA004', 'Bahasa Indonesia I', '2');
INSERT INTO `mata_kuliah` VALUES ('UAA007', 'Bahasa Inggris I', '2');

-- ----------------------------
-- Table structure for mutu
-- ----------------------------
DROP TABLE IF EXISTS `mutu`;
CREATE TABLE `mutu` (
  `kd_mutu` varchar(10) NOT NULL,
  `simbol_mutu` varchar(10) DEFAULT NULL,
  `angka_mutu` varchar(100) DEFAULT NULL,
  `huruf_mutu` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_mutu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mutu
-- ----------------------------
INSERT INTO `mutu` VALUES ('A', 'A', '85 - 100', 'Istimewa');
INSERT INTO `mutu` VALUES ('B', 'B', '71 - 77', 'Baik');
INSERT INTO `mutu` VALUES ('BB', 'B+', '78 - 84', 'Baik Sekali');
INSERT INTO `mutu` VALUES ('C', 'C', '57 - 63', 'Cukup');
INSERT INTO `mutu` VALUES ('CC', 'C+', '64 - 70', 'Cukup Sekali');
INSERT INTO `mutu` VALUES ('D', 'D', '50 -56', 'Kurang');
INSERT INTO `mutu` VALUES ('E', 'E', '0 - 49', 'Kurang Sekali');

-- ----------------------------
-- Table structure for nilai_absensi
-- ----------------------------
DROP TABLE IF EXISTS `nilai_absensi`;
CREATE TABLE `nilai_absensi` (
  `kd_nilai_absensi` int(10) NOT NULL AUTO_INCREMENT,
  `kd_krs` int(10) DEFAULT NULL,
  `id_dosen` int(10) DEFAULT NULL,
  `jumlah_pertemuan` varchar(10) DEFAULT NULL,
  `jumlah_kehadiran` varchar(10) DEFAULT NULL,
  `nilai` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd_nilai_absensi`),
  KEY `kd_mutu` (`nilai`),
  KEY `kd_krs` (`kd_krs`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nilai_absensi
-- ----------------------------
INSERT INTO `nilai_absensi` VALUES ('12', '21', '10', null, null, '0');
INSERT INTO `nilai_absensi` VALUES ('13', '20', '5', null, null, '0');

-- ----------------------------
-- Table structure for nilai_tugas
-- ----------------------------
DROP TABLE IF EXISTS `nilai_tugas`;
CREATE TABLE `nilai_tugas` (
  `kd_nilai_tugas` int(10) NOT NULL AUTO_INCREMENT,
  `kd_krs` int(10) DEFAULT NULL,
  `id_dosen` int(10) DEFAULT NULL,
  `tugas1` int(10) DEFAULT NULL,
  `tugas2` int(10) DEFAULT NULL,
  `tugas3` int(10) DEFAULT NULL,
  `tugas4` int(10) DEFAULT NULL,
  `nilai` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd_nilai_tugas`),
  KEY `kd_krs` (`kd_krs`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nilai_tugas
-- ----------------------------
INSERT INTO `nilai_tugas` VALUES ('13', '20', '10', null, null, null, null, '0');
INSERT INTO `nilai_tugas` VALUES ('14', '21', '5', null, null, null, null, '0');

-- ----------------------------
-- Table structure for nilai_uas
-- ----------------------------
DROP TABLE IF EXISTS `nilai_uas`;
CREATE TABLE `nilai_uas` (
  `kd_nilai_uas` int(10) NOT NULL AUTO_INCREMENT,
  `kd_krs` int(10) DEFAULT NULL,
  `id_dosen` int(10) DEFAULT NULL,
  `nilai` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd_nilai_uas`),
  KEY `kd_mutu` (`nilai`),
  KEY `id_dosen` (`id_dosen`),
  KEY `kd_krs` (`kd_krs`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nilai_uas
-- ----------------------------
INSERT INTO `nilai_uas` VALUES ('4', '20', '5', '0');
INSERT INTO `nilai_uas` VALUES ('5', '21', '10', '0');

-- ----------------------------
-- Table structure for nilai_uts
-- ----------------------------
DROP TABLE IF EXISTS `nilai_uts`;
CREATE TABLE `nilai_uts` (
  `kd_nilai_uts` int(10) NOT NULL AUTO_INCREMENT,
  `kd_krs` int(10) DEFAULT NULL,
  `id_dosen` int(10) DEFAULT NULL,
  `nilai` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd_nilai_uts`),
  KEY `kd_mutu` (`nilai`),
  KEY `id_dosen` (`id_dosen`),
  KEY `kd_krs` (`kd_krs`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nilai_uts
-- ----------------------------
INSERT INTO `nilai_uts` VALUES ('5', '21', '10', '0');
INSERT INTO `nilai_uts` VALUES ('6', '20', '5', '0');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `kd_status` varchar(10) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('S01', 'Dosen');
INSERT INTO `status` VALUES ('S02', 'Mahasiswa');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `kd_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `kd_status` (`kd_status`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('7', 'achmad', 'achmad', 'Achmad Chariry', 'S02');
INSERT INTO `user` VALUES ('8', 'syahril', 'syahril', 'Syahril', 'S02');
INSERT INTO `user` VALUES ('9', 'manorang', 'manorang', 'Manorang Sihotang', 'S01');
INSERT INTO `user` VALUES ('10', 'tjahyanto', 'tjahyanto', 'Tjahyanto', 'S01');
INSERT INTO `user` VALUES ('11', 'dian', 'dian', 'Dian Ardiyansyah', 'S02');
INSERT INTO `user` VALUES ('12', 'arie', 'arie', 'Arie Fernanda', 'S02');
INSERT INTO `user` VALUES ('13', 'eko', 'eko', 'Eko Anggoro Putra', 'S01');
INSERT INTO `user` VALUES ('14', 'norman', 'norman', 'Norman Cesnandika', 'S01');
INSERT INTO `user` VALUES ('15', 'rizal', 'rizal', 'MUhammad Rizal', 'S02');
INSERT INTO `user` VALUES ('16', 'inka', 'inka', 'Inka Toto Krismono', 'S02');
INSERT INTO `user` VALUES ('17', 'ahmad', 'ahmad', 'Ahmad Syahrudin', 'S02');
INSERT INTO `user` VALUES ('18', 'miqdad', 'miqdad', 'Huzair MIqdad', 'S02');
INSERT INTO `user` VALUES ('19', 'amanda', 'amanda', 'Amanda Nasution', 'S01');

-- ----------------------------
-- View structure for absensi
-- ----------------------------
DROP VIEW IF EXISTS `absensi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `absensi` AS SELECT
nilai_absensi.kd_nilai_absensi,
mahasiswa.nim,
mahasiswa.nama_mahasiswa,
mata_kuliah.mata_kuliah,
dosen.nama_dosen,
nilai_absensi.jumlah_pertemuan,
nilai_absensi.jumlah_kehadiran,
nilai_absensi.nilai
FROM
nilai_absensi
INNER JOIN krs ON nilai_absensi.kd_krs = krs.kd_krs
INNER JOIN dosen ON nilai_absensi.id_dosen = dosen.id_dosen
INNER JOIN mahasiswa ON krs.id_mahasiswa = mahasiswa.id_mahasiswa
INNER JOIN mata_kuliah ON krs.kd_mata_kuliah = mata_kuliah.kd_mata_kuliah ;

-- ----------------------------
-- View structure for khs_2
-- ----------------------------
DROP VIEW IF EXISTS `khs_2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `khs_2` AS SELECT
khs.kd_khs,
mahasiswa.nim,
mahasiswa.nama_mahasiswa,
fakultas.fakultas,
jurusan.jurusan,
jenjang.jenjang,
mahasiswa.semester,
mahasiswa.tahun_ajaran
FROM
khs
INNER JOIN krs ON khs.kd_krs = krs.kd_krs
INNER JOIN mahasiswa ON krs.id_mahasiswa = mahasiswa.id_mahasiswa
INNER JOIN fakultas ON mahasiswa.kd_fakultas = fakultas.kd_fakultas
INNER JOIN jurusan ON mahasiswa.kd_jurusan = jurusan.kd_jurusan
INNER JOIN jenjang ON mahasiswa.kd_jenjang = jenjang.kd_jenjang ;

-- ----------------------------
-- View structure for tugas
-- ----------------------------
DROP VIEW IF EXISTS `tugas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `tugas` AS SELECT
nilai_tugas.kd_nilai_tugas,
mahasiswa.nim,
mata_kuliah.mata_kuliah,
dosen.nama_dosen,
nilai_tugas.nilai
FROM
nilai_tugas
INNER JOIN krs ON nilai_tugas.kd_krs = krs.kd_krs
INNER JOIN dosen ON nilai_tugas.id_dosen = dosen.id_dosen
INNER JOIN mahasiswa ON krs.id_mahasiswa = mahasiswa.id_mahasiswa
INNER JOIN mata_kuliah ON krs.kd_mata_kuliah = mata_kuliah.kd_mata_kuliah ;

-- ----------------------------
-- View structure for uas
-- ----------------------------
DROP VIEW IF EXISTS `uas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `uas` AS SELECT
nilai_uas.kd_nilai_uas,
mahasiswa.nim,
mahasiswa.nama_mahasiswa,
mata_kuliah.mata_kuliah,
dosen.nama_dosen,
nilai_uas.nilai
FROM
nilai_uas
INNER JOIN krs ON nilai_uas.kd_krs = krs.kd_krs
INNER JOIN dosen ON nilai_uas.id_dosen = dosen.id_dosen
INNER JOIN mahasiswa ON krs.id_mahasiswa = mahasiswa.id_mahasiswa
INNER JOIN mata_kuliah ON krs.kd_mata_kuliah = mata_kuliah.kd_mata_kuliah ;

-- ----------------------------
-- View structure for uts
-- ----------------------------
DROP VIEW IF EXISTS `uts`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `uts` AS SELECT
nilai_uts.kd_nilai_uts,
mahasiswa.nim,
mahasiswa.nama_mahasiswa,
mata_kuliah.mata_kuliah,
dosen.nama_dosen,
nilai_uts.nilai
FROM
nilai_uts
INNER JOIN krs ON nilai_uts.kd_krs = krs.kd_krs
INNER JOIN dosen ON nilai_uts.id_dosen = dosen.id_dosen
INNER JOIN mahasiswa ON krs.id_mahasiswa = mahasiswa.id_mahasiswa
INNER JOIN mata_kuliah ON krs.kd_mata_kuliah = mata_kuliah.kd_mata_kuliah ;
