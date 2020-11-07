-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 04:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oph`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `created_at`, `updated_at`) VALUES
(1, 'B.A', NULL, NULL),
(2, 'B.Arch', NULL, NULL),
(3, 'B.B.A/B.M.S', NULL, NULL),
(4, 'B.Com', NULL, NULL),
(5, 'B.Des.', NULL, NULL),
(6, 'B.Ed', NULL, NULL),
(7, 'B.El.Ed', NULL, NULL),
(8, 'B.P.Ed', NULL, NULL),
(9, 'B.Pharma', NULL, NULL),
(10, 'B.Sc.', NULL, NULL),
(11, 'B.Tech/B.E.', NULL, NULL),
(12, 'B.U.M.S', NULL, NULL),
(13, 'BAMS', NULL, NULL),
(14, 'BCA', NULL, NULL),
(15, 'BDS', NULL, NULL),
(16, 'BFA', NULL, NULL),
(17, 'BHM', NULL, NULL),
(18, 'BHMS', NULL, NULL),
(19, 'BVSC', NULL, NULL),
(20, 'Diploma', NULL, NULL),
(21, 'LLB', NULL, NULL),
(22, 'MBBS', NULL, NULL),
(23, 'CA', NULL, NULL),
(24, 'CS', NULL, NULL),
(25, 'DM', NULL, NULL),
(26, 'ICWA (CMA)', NULL, NULL),
(27, 'Integrated PG', NULL, NULL),
(28, 'LLM', NULL, NULL),
(29, 'M.A', NULL, NULL),
(30, 'M.Arch', NULL, NULL),
(31, 'M.Ch', NULL, NULL),
(32, 'M.Com', NULL, NULL),
(33, 'M.Des', NULL, NULL),
(34, 'M.Ed', NULL, NULL),
(35, 'M.Pharma', NULL, NULL),
(36, 'MS/M.Sc(Science)', NULL, NULL),
(37, 'M.Tech', NULL, NULL),
(38, 'MBA/PGDM', NULL, NULL),
(39, 'MCA', NULL, NULL),
(41, 'MCM', NULL, NULL),
(42, 'MDS', NULL, NULL),
(43, 'MFA', NULL, NULL),
(44, 'Medical-MS/MD', NULL, NULL),
(45, 'MVSC', NULL, NULL),
(46, 'PG Diploma', NULL, NULL),
(47, 'Ph.D/Doctorate', NULL, NULL),
(48, 'MPHIL', NULL, NULL),
(49, '12th', NULL, NULL),
(50, '10th', NULL, NULL),
(51, 'Below 10th', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
