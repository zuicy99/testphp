-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-12-12 23:08
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
-- 데이터베이스: `phpsite`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `add_member`
--

CREATE TABLE `add_member` (
  `id` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `add_member`
--

INSERT INTO `add_member` (`id`, `pw`, `name`, `number`) VALUES
('', '', '', 0),
('ㅁㄴㅇㅁㄴㅇ', 'asdasd', 'asdasd', 0),
('ㅁㄴㅇㅁㄴㅇ', 'asdasd', 'asdasd', 0),
('ㅁㄴㅇㅁㄴㅇ', 'asdasd', 'asdasd', 0),
('ㅁㄴㅇㅁㄴㅇ', 'asdasd', 'asdasd', 0),
('ㅁㄴㅇㅁㄴㅇ', 'asdasd', 'asdasd', 0),
('ㅁㄴㅇㅁㄴㅇ', 'asdasd', 'asdasd', 0),
('ㅁㄴㅇㅁㄴㅇ', 'asdasd', 'asdasd', 0),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('asd', 'asdasd', '', 0),
('asd', 'asd', '', 0),
('asdasd', 'asdasd', '', 0),
('asdasd', 'asdasd', '', 0),
('', '', '', 0),
('test02', '0202', '테스트요', 1011112222),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('', '', '', 0),
('asd', 'asd', '', 0),
('asd', 'asd', '', 0),
('asd', 'asd', '', 0),
('ㅁㄴㅇ', 'asd', '', 0),
('test02', '0202', '', 0),
('test02', '0202', '', 0),
('', '', '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
