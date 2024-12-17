-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-12-17 09:57
-- 서버 버전: 10.4.32-MariaDB
-- PHP 버전: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `testphp`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_icon` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `create_at` datetime NOT NULL,
  `login_dt` datetime DEFAULT NULL,
  `level` tinyint(3) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `id`, `pw`, `name`, `user_icon`, `phone`, `create_at`, `login_dt`, `level`) VALUES
(9, 'good', '$2y$10$lrQRBbMf6jTt9Bw2Evxvpemz4OHcJ/T8T2xQppRi7ncGtlZZWLxbm', '관리자', 'good.png', '01232', '2024-12-16 16:54:58', '2024-12-17 16:56:30', 10),
(10, 'asdasd', '$2y$10$9FRmy/7SIPw4bOZYWIsVBONRhC1ifpdrFvDM1S2R9xDiLBpFZnRSC', 'asdasd', 'asdasd.jpg', 'asdasd', '2024-12-17 13:31:23', NULL, 1),
(13, 'test', '$2y$10$DVlleAcpAobbFo2//xP5UOcFLt.xqLqRxUy7Dp1gO0Xc8EGqyPx7i', '테스트형', 'test.png', '010222211111', '2024-12-17 16:43:01', '2024-12-17 16:43:11', 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
