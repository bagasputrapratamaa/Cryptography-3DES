-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 11:33 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kripto`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `file_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `file_name_source` varchar(255) NOT NULL,
  `file_name_finish` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `file_size` float NOT NULL,
  `password` varchar(40) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `username`, `file_name_source`, `file_name_finish`, `file_url`, `file_size`, `password`, `tgl_upload`, `status`, `keterangan`) VALUES
(1, 'admin', '13260-bilangan-acak.pdf', '72190-bilangan-acak.rda', 'file_encrypt/72190-bilangan-acak.rda', 170.016, 'd033e22ae348aeb5660fc2140aec35850c4da997', '2020-08-03 15:01:10', 1, '123qwe'),
(4, 'admin', '23312-jawaban-seni-musik---eliyana.docx', '18493-jawaban-seni-musik---eliyana.rda', 'file_encrypt/18493-jawaban-seni-musik---eliyana.rda', 65.1348, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-08-03 16:32:05', 1, 'penting'),
(5, 'admin', '2018-@kode-item.txt', '85855-@kode-item.rda', 'file_encrypt/85855-@kode-item.rda', 2.26953, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-08-03 16:32:05', 1, 'lolo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `job_title` varchar(40) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin 2:manajer 3:pimpinan 4:karyawan'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `job_title`, `level`) VALUES
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Bagas Putra', 'Administrator', 1),
(4, 'manajer', 'a13fb40490e7d01a1a6ad6da8dab0fd4daff6d0d', 'Eliyana', 'Manajer', 2),
(5, 'bagasskuy', '2eb1f23c0a62562588d4c9e3ff42884cfbd84c14', 'Bagaslah', 'Pimpinan', 3),
(15, 'karyawan', 'c53255317bb11707d0f614696b3ce6f221d0e2f2', 'saidil', 'Karyawan', 4),
(16, 'pakong', '5cbefb5cbcee09ff7c1954b0b007d5f48e84c309', 'pakongskuy', 'Karyawan', 4),
(17, 'user89', 'c53255317bb11707d0f614696b3ce6f221d0e2f2', 'userx', 'Karyawan', 4),
(18, 'bagazlah', 'c53255317bb11707d0f614696b3ce6f221d0e2f2', 'bagazlah', 'Karyawan', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
