-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 04:56 AM
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
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Accounts receivable/payable specialist', '0000-00-00', '0000-00-00'),
(2, 'Assessor', '0000-00-00', '0000-00-00'),
(3, 'Auditor', '0000-00-00', '0000-00-00'),
(4, 'Bookkeeper', '0000-00-00', '0000-00-00'),
(5, 'Budget analyst', '0000-00-00', '0000-00-00'),
(6, 'Cash manager', '0000-00-00', '0000-00-00'),
(7, 'Chief financial officer', '0000-00-00', '0000-00-00'),
(8, 'Controller', '0000-00-00', '0000-00-00'),
(9, 'Credit manager', '0000-00-00', '0000-00-00'),
(10, 'Tax specialist', '0000-00-00', '0000-00-00'),
(11, 'Treasurer', '0000-00-00', '0000-00-00'),
(12, 'Benefits officer', '0000-00-00', '0000-00-00'),
(13, 'Compensation analyst', '0000-00-00', '0000-00-00'),
(14, 'Employee relations specialist', '0000-00-00', '0000-00-00'),
(15, 'HR coordinator', '0000-00-00', '0000-00-00'),
(16, 'HR specialist', '0000-00-00', '0000-00-00'),
(17, 'Retirement plan counselor', '0000-00-00', '0000-00-00'),
(18, 'Staffing consultant', '0000-00-00', '0000-00-00'),
(19, 'Union organizer', '0000-00-00', '0000-00-00'),
(20, 'Certified financial planner', '0000-00-00', '0000-00-00'),
(21, 'Chartered wealth manager', '0000-00-00', '0000-00-00'),
(22, 'Credit analyst', '0000-00-00', '0000-00-00'),
(23, 'Credit manager', '0000-00-00', '0000-00-00'),
(24, 'Financial analyst', '0000-00-00', '0000-00-00'),
(25, 'Hedge fund manager', '0000-00-00', '0000-00-00'),
(26, 'Hedge fund principal', '0000-00-00', '0000-00-00'),
(27, 'Hedge fund trader', '0000-00-00', '0000-00-00'),
(28, 'Investment advisor', '0000-00-00', '0000-00-00'),
(29, 'Investment banker', '0000-00-00', '0000-00-00'),
(30, 'Investor relations officer', '0000-00-00', '0000-00-00'),
(31, 'Leveraged buyout investor', '0000-00-00', '0000-00-00'),
(32, 'Loan officer', '0000-00-00', '0000-00-00'),
(33, 'Mortgage banker', '0000-00-00', '0000-00-00'),
(34, 'Mutual fund analyst', '0000-00-00', '0000-00-00'),
(35, 'Portfolio management marketing', '0000-00-00', '0000-00-00'),
(36, 'Portfolio manager', '0000-00-00', '0000-00-00'),
(37, 'Ratings analyst', '0000-00-00', '0000-00-00'),
(38, 'Stockbroker', '0000-00-00', '0000-00-00'),
(39, 'Trust officer', '0000-00-00', '0000-00-00'),
(40, 'Business systems analyst', '0000-00-00', '0000-00-00'),
(41, 'Content manager', '0000-00-00', '0000-00-00'),
(42, 'Content strategist', '0000-00-00', '0000-00-00'),
(43, 'Database administrator', '0000-00-00', '0000-00-00'),
(44, 'Digital marketing manager', '0000-00-00', '0000-00-00'),
(45, 'Full stack developer', '0000-00-00', '0000-00-00'),
(46, 'Information architect', '0000-00-00', '0000-00-00'),
(47, 'Marketing technologist', '0000-00-00', '0000-00-00'),
(48, 'Mobile developer', '0000-00-00', '0000-00-00'),
(49, 'Project manager', '0000-00-00', '0000-00-00'),
(50, 'Social media manager', '0000-00-00', '0000-00-00'),
(51, 'Software engineer', '0000-00-00', '0000-00-00'),
(52, 'Systems engineer', '0000-00-00', '0000-00-00'),
(53, 'Software developer', '0000-00-00', '0000-00-00'),
(54, 'Systems administrator', '0000-00-00', '0000-00-00'),
(55, 'User interface specialist', '0000-00-00', '0000-00-00'),
(56, 'Web analytics developer', '0000-00-00', '0000-00-00'),
(57, 'Web developer', '0000-00-00', '0000-00-00'),
(58, 'Webmaster', '0000-00-00', '0000-00-00'),
(59, 'Actuary', '0000-00-00', '0000-00-00'),
(60, 'Claims adjuster', '0000-00-00', '0000-00-00'),
(61, 'Damage appraiser', '0000-00-00', '0000-00-00'),
(62, 'Insurance adjuster', '0000-00-00', '0000-00-00'),
(63, 'Insurance agent', '0000-00-00', '0000-00-00'),
(64, 'Insurance appraiser', '0000-00-00', '0000-00-00'),
(65, 'Insurance broker', '0000-00-00', '0000-00-00'),
(66, 'Insurance claims examiner', '0000-00-00', '0000-00-00'),
(67, 'Insurance investigator', '0000-00-00', '0000-00-00'),
(68, 'Loss control specialist', '0000-00-00', '0000-00-00'),
(69, 'Underwriter', '0000-00-00', '0000-00-00'),
(70, 'Business broker', '0000-00-00', '0000-00-00'),
(71, 'Business transfer agent', '0000-00-00', '0000-00-00'),
(72, 'Commercial appraiser', '0000-00-00', '0000-00-00'),
(73, 'Commercial real estate agent', '0000-00-00', '0000-00-00'),
(74, 'Commercial real estate broker', '0000-00-00', '0000-00-00'),
(75, 'Real estate appraiser', '0000-00-00', '0000-00-00'),
(76, 'Real estate officer', '0000-00-00', '0000-00-00'),
(77, 'Residential appraiser', '0000-00-00', '0000-00-00'),
(78, 'Residential real estate agent', '0000-00-00', '0000-00-00'),
(79, 'Residential real estate broker', '0000-00-00', '0000-00-00'),
(80, '. Net Developer - ASP/ C#', '0000-00-00', '0000-00-00'),
(81, 'Javascript Developer', '0000-00-00', '0000-00-00'),
(82, '.NET - Software Development Engineer', '0000-00-00', '0000-00-00'),
(83, 'Account Manager', '0000-00-00', '0000-00-00'),
(84, 'Academic Counselor', '0000-00-00', '0000-00-00'),
(85, 'Active Directory Professional', '0000-00-00', '0000-00-00'),
(86, 'Ad Sales Manager', '0000-00-00', '0000-00-00'),
(87, 'Adavanced Analytics - Sas/spss/r', '0000-00-00', '0000-00-00'),
(88, 'Admin Executive', '0000-00-00', '0000-00-00'),
(89, 'Administration Head', '0000-00-00', '0000-00-00'),
(90, 'Adobe Architect', '0000-00-00', '0000-00-00'),
(91, 'Analyst', '0000-00-00', '0000-00-00'),
(92, 'Android Developer', '0000-00-00', '0000-00-00'),
(93, 'Android Engineer', '0000-00-00', '0000-00-00'),
(94, 'Angular JS Developer', '0000-00-00', '0000-00-00'),
(95, 'Architect', '0000-00-00', '0000-00-00'),
(96, 'Area Manager', '0000-00-00', '0000-00-00'),
(97, 'Backend Developer', '0000-00-00', '0000-00-00'),
(98, 'Bar Manager', '0000-00-00', '0000-00-00'),
(99, 'Big Data Developer', '0000-00-00', '0000-00-00'),
(100, 'Big Data Hadoop Developer', '0000-00-00', '0000-00-00'),
(101, 'Brand Manager', '0000-00-00', '0000-00-00'),
(102, 'Business Development Executives', '0000-00-00', '0000-00-00'),
(103, 'CAD Engineer', '0000-00-00', '0000-00-00'),
(104, 'Career Consultant', '0000-00-00', '0000-00-00'),
(105, 'Manager Sales', '0000-00-00', '0000-00-00'),
(106, 'Media Sales Manager', '0000-00-00', '0000-00-00'),
(107, 'Open Source Developer', '0000-00-00', '0000-00-00'),
(108, 'Wordpress Developer', '0000-00-00', '0000-00-00'),
(111, 'Graphic Designer', '0000-00-00', '0000-00-00'),
(112, 'Teacher', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
