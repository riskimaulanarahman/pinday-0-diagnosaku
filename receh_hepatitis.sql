/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : receh_hepatitis

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 27/07/2023 15:07:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for diagnosa_questions
-- ----------------------------
DROP TABLE IF EXISTS `diagnosa_questions`;
CREATE TABLE `diagnosa_questions`  (
  `diagnosa_question_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `yes_to` int NULL DEFAULT NULL,
  `no_to` int NULL DEFAULT NULL,
  `yes_diagnosa` int NULL DEFAULT NULL,
  `no_diagnosa` int NULL DEFAULT NULL,
  PRIMARY KEY (`diagnosa_question_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of diagnosa_questions
-- ----------------------------
INSERT INTO `diagnosa_questions` VALUES (1, 'Anti HAV Positif', 'Anti HAV Positif', 0, 2, 1, 0);
INSERT INTO `diagnosa_questions` VALUES (2, 'Nyeri Perut', 'Nyeri Perut', 0, 3, 2, 0);
INSERT INTO `diagnosa_questions` VALUES (3, 'HBsAG Positif', 'HBsAG Positif', 0, 4, 2, 0);
INSERT INTO `diagnosa_questions` VALUES (4, 'Diare', 'Diare', 0, 5, 1, 0);
INSERT INTO `diagnosa_questions` VALUES (5, 'Malaise', 'Malaise', 0, 6, 3, 0);
INSERT INTO `diagnosa_questions` VALUES (6, 'Sakit Tenggorokan', 'Sakit Tenggorokan', 7, 0, 0, 2);
INSERT INTO `diagnosa_questions` VALUES (7, 'Pusing Kepala', 'Pusing Kepala', 8, 0, 0, 2);
INSERT INTO `diagnosa_questions` VALUES (8, 'Anti HCV Positif', 'Anti HCV Positif', 0, 0, 3, 2);

-- ----------------------------
-- Table structure for diagnosa_results
-- ----------------------------
DROP TABLE IF EXISTS `diagnosa_results`;
CREATE TABLE `diagnosa_results`  (
  `diagnosa_result_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NULL DEFAULT NULL,
  `disease_id` int NULL DEFAULT NULL,
  `answer_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `answer_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `answer_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `answer_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `answer_5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `answer_6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `answer_7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `answer_8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `suggestion_doctor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`diagnosa_result_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of diagnosa_results
-- ----------------------------

-- ----------------------------
-- Table structure for diseases
-- ----------------------------
DROP TABLE IF EXISTS `diseases`;
CREATE TABLE `diseases`  (
  `disease_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `suggestion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`disease_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of diseases
-- ----------------------------
INSERT INTO `diseases` VALUES (1, 'Hepatitis A', '<h3>\r\n   <strong>Penjelasan Hepatitis A</strong>\r\n </h3>\r\n<p>\r\n  Hepatitis A adalah peradangan pada organ hati yang disebabkan oleh infeksi virus hepatitis A. Infeksi yang mengganggu kerja hati ini dapat menular dengan mudah melalui makanan atau minuman yang terkontaminasi virus tersebut.\r\n</p>\r\n<p>\r\n  Hepatitis A jarang berakibat fatal, tetapi pada kasus yang jarang terjadi,\r\n  kondisi ini bisa menyebabkan gagal fungsi hati. Sedangkan pada ibu hamil,\r\n  hepatitis A dapat memicu kelahiran prematur dan kerusakan hati pada bayi.\r\n</p>\r\n<h3>\r\n  <strong>Gejala </strong><strong>dan Faktor Risiko </strong\r\n  ><strong>Hepatitis A</strong>\r\n</h3>\r\n<p>\r\n  Gejala hepatitis A muncul beberapa minggu setelah virus masuk ke dalam tubuh.\r\n  Keluhan yang timbul akibat hepatitis A antara lain penyakit kuning, demam,\r\n  lemas, serta mual dan muntah.\r\n</p>\r\n<p>\r\n  Seseorang lebih berisiko terserang hepatitis A jika berkunjung atau tinggal di\r\n  daerah yang terdapat banyak kasus hepatitis A. Orang yang berhubungan seksual\r\n  dengan penderita hepatitis A juga dapat terkena penyakit yang sama.\r\n</p>\r\n', '<h3>\r\n  <strong>Pengobatan </strong><strong>dan Pencegahan </strong\r\n  ><strong>Hepatitis A</strong>\r\n</h3>\r\n<p>\r\n  Hepatitis A akan sembuh dengan sendirinya karena sistem kekebalan tubuh\r\n  penderita akan membunuh virus tersebut. Pengobatan yang diberikan hanya untuk\r\n  meringankan gejala sambil menunggu penyakit sembuh.\r\n</p>\r\n<p>\r\n  Menjaga kebersihan diri dan lingkungan, serta memastikan makanan\r\n  dan minuman yang diminum sudah dimasak dengan matang.\r\n</p>', 'https://sexualhealth.gov.mt/sites/default/files/Hepititis_A_Symptoms.jpg');
INSERT INTO `diseases` VALUES (2, 'Hepatitis B', '<h3><strong>Penjelasan Hepatitis B</strong></h3>\r\n<p>Hepatitis B adalah peradangan pada organ hati yang disebabkan oleh virus hepatitis B. Virus ini dapat menular melalui hubungan seksual atau berbagi jarum suntik.</p>\r\n   <p>Infeksi hepatitis B umumnya tidak bertahan lama dalam tubuh penderita dan dapat sembuh dengan sendirinya tanpa diobati. Kondisi ini disebut infeksi hepatitis akut</a> atau hepatitis B akut. Namun, infeksi hepatitis B juga bisa menetap dan bertahan dalam tubuh seseorang atau menjadi kronis.</p>\r\n   <p>Infeksi hepatitis B kronis dapat menimbulkan komplikasi berbahaya, seperti sirosis atau kanker hati. Oleh karena itu, penderita hepatitis B kronis perlu melakukan kontrol secara berkala ke dokter untuk mendapatkan penanganan dan deteksi dini bila terjadi komplikasi.</p>\r\n   <p>Hepatitis B masih banyak ditemukan di Indonesia dengan angka kasus yang kian meningkat. Namun, penyakit ini dapat dicegah melalui vaksinasi hepatitis B.</p>\r\n   <h3><strong>Penyebab dan Gejala Hepatitis B</strong></h3>\r\n   <p>Hepatitis B menular melalui hubungan seksual tanpa kondom dan berbagi jarum suntik dengan penderita hepatitis B. Hal ini karena virus hepatitis B berada di dalam darah dan cairan tubuh, seperti sperma atau cairan vagina. Selain itu, hepatitis B juga dapat menular dari ibu hamil ke bayi yang dikandungnya.</p>\r\n   <p>Hepatitis B sering kali tidak menimbulkan gejala sehingga penderitanya tidak menyadari bahwa dirinya telah terinfeksi. Meski demikian, gejala tetap bisa muncul 1-5 bulan setelah terpapar virus. Gejala yang bisa muncul antara lain demam, sakit kepala, mual, muntah, lemas, serta penyakit kuning.</p>\r\n   <h3><strong>Pengobatan Hepatitis B</strong></h3>\r\n   <p>Tidak ada metode khusus untuk mengatasi hepatitis B akut, karena akan sembuh dengan sendirinya. Penanganan hanya bertujuan untuk meredakan gejala yang muncul. Sementara itu, pengobatan pada hepatitis B kronis adalah dengan obat antivirus, misalnya tenofovir.</p>\r\n   <p>Pasien hepatitis B kronis perlu rutin kontrol ke dokter agar efektivitas pengobatan dan perkembangan penyakit dapat diketahui. Hal tersebut karena hepatitis B kronis dapat menyebabkan kerusakan organ hati. Jika kerusakan hati cukup parah, dokter mungkin akan menganjurkan prosedur transplantasi hati.</p>\r\n   <p>Dengan penanganan yang tepat dan gaya hidup sehat, penderita hepatitis B dapat hidup normal.</p>\r\n   <h3><strong>Vaksinasi dan Pencegahan Hepatitis B</strong></h3>\r\n   <p>Langkah utama untuk mencegah hepatitis B adalah melalui pemberian vaksin hepatitis B. Vaksin ini wajib diberikan kepada anak-anak, tetapi karena efeknya tidak bertahan seumur hidup, vaksinasi perlu diulang saat dewasa.</p>\r\n   <p>Selain vaksinasi, ada upaya lain yang perlu dilakukan untuk menurunkan risiko terkena hepatitis B, yaitu berhubungan seksual secara aman dan menjauhi penyalahgunaan NAPZA.</p>', '<h3><strong>Vaksinasi dan Pencegahan Hepatitis B</strong></h3>\r\n   <p>Langkah utama untuk mencegah hepatitis B adalah melalui pemberian vaksin hepatitis B. Vaksin ini wajib diberikan kepada anak-anak, tetapi karena efeknya tidak bertahan seumur hidup, vaksinasi perlu diulang saat dewasa.</p>\r\n   <p>Selain vaksinasi, ada upaya lain yang perlu dilakukan untuk menurunkan risiko terkena hepatitis B, yaitu berhubungan seksual secara aman dan menjauhi penyalahgunaan NAPZA.</p>', 'https://sexualhealth.gov.mt/sites/default/files/Hepititis_B_Symptoms.jpg');
INSERT INTO `diseases` VALUES (3, 'Hepatitis C', '<h3><strong>Penjelasan Hepatitis C</strong></h3>\r\n<p>\r\n  Hepatitis C adalah\r\n  peradangan pada hati akibat infeksi virus hepatisis C. Jika berlangsung lama, hepatitis C dapat menyebabkan penyakit hati\r\n    kronis, gagal hati, hingga kanker hati.\r\n</p>\r\n<p>\r\n  Istilah hepatitis digunakan untuk semua jenis peradangan pada hati. Ada\r\n  beberapa jenis hepatitis, tetapi yang paling umum terjadi adalah hepatitis\r\n  yang disebabkan oleh virus (<em>viral hepatitis</em>). Hepatitis akibat virus\r\n  ini dibagi lagi menjadi lima, salah satunya hepatitis C.\r\n</p>\r\n<h3><strong>Penyebab dan Gejala Hepatitis C</strong></h3>\r\n<p>\r\n  Virus hepatitis C menular melalui darah. Hal ini bisa terjadi lewat transfusi\r\n  darah atau penggunaan jarum suntik bersama. Virus hepatitis C juga dapat\r\n  menular melalui hubungan seks tanpa kondom dengan penderita.\r\n</p>\r\n<p>Hepatitis C\r\n  tidak menimbulkan gejala pada tahap awal. Gejala kondisi ini umumnya muncul\r\n  bila infeksi sudah berlangsung lama dan menimbulkan kerusakan pada hati.\r\n  Gejala yang dapat muncul adalah lemas, tidak nafsu makan, dan\r\n  penyakit kuning.\r\n</p>', '<h3><strong>Pengobatan dan Pencegahan Hepatitis C</strong></h3>\r\n<p>\r\n  Hepatitis C umumnya dapat sembuh\r\n  dengan sendirinya. Namun, pada sebagian kasus, hepatitis C bisa berkembang\r\n  dalam jangka panjang (kronis). Pada kondisi tersebut, dokter dapat memberikan obat antivirus, atau menyarankan prosedur\r\n  transplantasi hati jika sudah timbul komplikasi.\r\n</p>\r\n<p>\r\n  Belum ada vaksin khusus untuk mencegah hepatitis C. Oleh sebab itu, pencegahan\r\n  penyakit ini adalah dengan menghindari risiko infeksi virus hepatitis C, yaitu\r\n  dengan:\r\n</p>\r\n<ul>\r\n  <li>Tidak berbagi penggunaan barang pribadi dengan orang lain</li>\r\n  <li>Tidak bergonta-ganti pasangan seksual</li>\r\n  <li>Tidak menyalahgunakan NAPZA atau berbagi jarum suntik</li>\r\n</ul>', 'https://sexualhealth.gov.mt/sites/default/files/Hepititis_C_Symptoms.jpg');

-- ----------------------------
-- Table structure for doctors
-- ----------------------------
DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors`  (
  `doctor_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `contact_person` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `specialist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`doctor_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctors
-- ----------------------------
INSERT INTO `doctors` VALUES (1, 2, 'Dr. Samsul Bahri (Aamiin)', 'L', 'Jl Flamboyan', '6281277057373', 'Dokter Ahli Hepatologi');

-- ----------------------------
-- Table structure for patients
-- ----------------------------
DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients`  (
  `patient_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`patient_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patients
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'doctor@gmail.com', '$2y$10$tHEFhapd0ozWZEybfGh1nObERbZUFilyyyN4tacFPKJA2qn8gr4ce', 'doctor');

SET FOREIGN_KEY_CHECKS = 1;
