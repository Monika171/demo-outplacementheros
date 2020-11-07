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
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industry`, `created_at`, `updated_at`) VALUES
(1, 'Accounting/Finance', NULL, NULL),
(2, 'Airlines/Aviation', NULL, NULL),
(3, 'Alternative Dispute Resolution', NULL, NULL),
(4, 'Alternative Medicine', NULL, NULL),
(5, 'Animation/Gaming', NULL, NULL),
(6, 'Apparel/Fashion', NULL, NULL),
(7, 'Architecture/Planning/Interior Design', NULL, NULL),
(8, 'Arts/Crafts', NULL, NULL),
(9, 'Automotive', NULL, NULL),
(10, 'Aviation/Aerospace', NULL, NULL),
(11, 'Banking/Financial Services/ Mortgage', NULL, NULL),
(12, 'Biotechnology/Greentech', NULL, NULL),
(13, 'Broadcast Media', NULL, NULL),
(14, 'Building Materials', NULL, NULL),
(15, 'Business Supplies/Equipment', NULL, NULL),
(16, 'Capital Markets/Hedge Fund/Private Equity', NULL, NULL),
(17, 'Chemicals/PetroChemical/Plastic/Rubber', NULL, NULL),
(18, 'Civic/Social Organization', NULL, NULL),
(19, 'Civil Engineering', NULL, NULL),
(20, 'Commercial Real Estate', NULL, NULL),
(21, 'Computer Games', NULL, NULL),
(22, 'Computer Hardware', NULL, NULL),
(23, 'Computer Networking', NULL, NULL),
(24, 'Computer/Software Engineering', NULL, NULL),
(25, 'Computer/Network Security', NULL, NULL),
(26, 'Construction/Engineering/Cement/Metals', NULL, NULL),
(27, 'Consumer Electronics/Appliances/Durables', NULL, NULL),
(28, 'Consumer Goods', NULL, NULL),
(29, 'Consumer Services', NULL, NULL),
(30, 'Cosmetics', NULL, NULL),
(31, 'Dairy', NULL, NULL),
(32, 'Defense/Space', NULL, NULL),
(33, 'Design', NULL, NULL),
(34, 'E-Learning', NULL, NULL),
(35, 'Education Management', NULL, NULL),
(36, 'Electrical/Electronic Manufacturing', NULL, NULL),
(37, 'Entertainment/Movie Production', NULL, NULL),
(38, 'Environmental Services', NULL, NULL),
(39, 'Events Services', NULL, NULL),
(40, 'Executive Office', NULL, NULL),
(41, 'Facilities Services', NULL, NULL),
(42, 'Farming', NULL, NULL),
(43, 'Financial Services', NULL, NULL),
(44, 'Fine Art', NULL, NULL),
(45, 'Fishery', NULL, NULL),
(46, 'Food Production', NULL, NULL),
(47, 'Food/Beverages/FMCG', NULL, NULL),
(48, 'Fundraising', NULL, NULL),
(49, 'Furniture', NULL, NULL),
(50, 'Gambling/Casinos', NULL, NULL),
(51, 'Glass/Ceramics/Concrete', NULL, NULL),
(52, 'Government Administration', NULL, NULL),
(53, 'Government Relations', NULL, NULL),
(54, 'Graphic Design/Web Design', NULL, NULL),
(55, 'Health/Fitness', NULL, NULL),
(56, 'Higher Education/Academia', NULL, NULL),
(57, 'Hospital/Health Care', NULL, NULL),
(58, 'Hospitality', NULL, NULL),
(59, 'Human Resources/HR', NULL, NULL),
(60, 'Import/Export', NULL, NULL),
(61, 'Individual/Family Services', NULL, NULL),
(62, 'Industrial Automation', NULL, NULL),
(63, 'Information Services', NULL, NULL),
(64, 'Information Technology/IT', NULL, NULL),
(65, 'Insurance', NULL, NULL),
(66, 'International Affairs', NULL, NULL),
(67, 'International Trade/Development', NULL, NULL),
(68, 'Internet/Ecommerce', NULL, NULL),
(69, 'Investment Banking/Venture', NULL, NULL),
(70, 'Investment Management/Hedge Fund/Private Equity', NULL, NULL),
(71, 'Judiciary', NULL, NULL),
(72, 'Law Enforcement', NULL, NULL),
(73, 'Law Practice/Law Firms', NULL, NULL),
(74, 'Legal Services', NULL, NULL),
(75, 'Legislative Office', NULL, NULL),
(76, 'Leisure/Travel', NULL, NULL),
(77, 'Library', NULL, NULL),
(78, 'Logistics/Procurement', NULL, NULL),
(79, 'Luxury Goods/Jewelry', NULL, NULL),
(80, 'Machinery', NULL, NULL),
(81, 'Management Consulting', NULL, NULL),
(82, 'Maritime', NULL, NULL),
(83, 'Market Research', NULL, NULL),
(84, 'Marketing/Advertising/Sales', NULL, NULL),
(85, 'Mechanical or Industrial Engineering', NULL, NULL),
(86, 'Media Production', NULL, NULL),
(87, 'Medical Equipment', NULL, NULL),
(88, 'Medical Practice', NULL, NULL),
(89, 'Mental Health Care', NULL, NULL),
(90, 'Military Industry', NULL, NULL),
(91, 'Mining/Metals', NULL, NULL),
(92, 'Motion Pictures/Film', NULL, NULL),
(93, 'Museums/Institutions', NULL, NULL),
(94, 'Music', NULL, NULL),
(95, 'Nanotechnology', NULL, NULL),
(96, 'Newspapers/Journalism', NULL, NULL),
(97, 'Non-Profit/Volunteering', NULL, NULL),
(98, 'Oil/Energy/Solar/Greentech', NULL, NULL),
(99, 'Online Publishing', NULL, NULL),
(101, 'Outsourcing/Offshoring', NULL, NULL),
(102, 'Package/Freight Delivery', NULL, NULL),
(103, 'Packaging/Containers', NULL, NULL),
(104, 'Paper/Forest Products', NULL, NULL),
(105, 'Performing Arts', NULL, NULL),
(106, 'Pharmaceuticals', NULL, NULL),
(107, 'Philanthropy', NULL, NULL),
(108, 'Photography', NULL, NULL),
(109, 'Plastics', NULL, NULL),
(110, 'Political Organization', NULL, NULL),
(111, 'Primary/Secondary Education', NULL, NULL),
(112, 'Printing', NULL, NULL),
(113, 'Professional Training', NULL, NULL),
(114, 'Program Development', NULL, NULL),
(115, 'Public Relations/PR', NULL, NULL),
(116, 'Public Safety', NULL, NULL),
(117, 'Publishing Industry', NULL, NULL),
(118, 'Railroad Manufacture', NULL, NULL),
(119, 'Ranching', NULL, NULL),
(120, 'Real Estate/Mortgage', NULL, NULL),
(121, 'Recreational Facilities/Services', NULL, NULL),
(122, 'Religious Institutions', NULL, NULL),
(123, 'Renewables/Environment', NULL, NULL),
(124, 'Research Industry', NULL, NULL),
(125, 'Restaurants', NULL, NULL),
(126, 'Retail Industry', NULL, NULL),
(127, 'Security/Investigations', NULL, NULL),
(128, 'Semiconductors', NULL, NULL),
(129, 'Shipbuilding', NULL, NULL),
(130, 'Sporting Goods', NULL, NULL),
(131, 'Sports', NULL, NULL),
(132, 'Staffing/Recruiting', NULL, NULL),
(133, 'Supermarkets', NULL, NULL),
(134, 'Telecommunications', NULL, NULL),
(135, 'Textiles', NULL, NULL),
(136, 'Think Tanks', NULL, NULL),
(137, 'Tobacco', NULL, NULL),
(138, 'Translation/Localization', NULL, NULL),
(139, 'Transportation', NULL, NULL),
(140, 'Utilities', NULL, NULL),
(141, 'Venture Capital/VC', NULL, NULL),
(142, 'Veterinary', NULL, NULL),
(143, 'Warehousing', NULL, NULL),
(144, 'Wholesale', NULL, NULL),
(145, 'Wine/Spirits', NULL, NULL),
(146, 'Wireless', NULL, NULL),
(147, 'Writing/Editing', NULL, NULL),
(148, 'Advertising / PR / MR / Event Management', NULL, NULL),
(149, 'Agriculture / Dairy', NULL, NULL),
(150, 'utomobile / Auto Anciliary / Auto Components', NULL, NULL),
(151, 'BPO / Call Centre / ITES', NULL, NULL),
(152, 'Brewery / Distillery', NULL, NULL),
(153, 'Ceramics / Sanitary ware', NULL, NULL),
(154, 'Courier / Transportation / Freight / Warehousing', NULL, NULL),
(155, 'Electricals / Switchgears', NULL, NULL),
(156, 'Export / Import', NULL, NULL),
(157, 'Facility Management', NULL, NULL),
(158, 'Food Processing', NULL, NULL),
(159, 'Food Production', NULL, NULL),
(160, 'Gems / Jewellery', NULL, NULL),
(161, 'Government / Defence', NULL, NULL),
(162, 'Heat Ventilation / Air Conditioning', NULL, NULL),
(163, 'Industrial Products / Heavy Machinery', NULL, NULL),
(164, 'IT-Hardware & Networking', NULL, NULL),
(165, 'IT-Software / Software Services', NULL, NULL),
(166, 'KPO / Research / Analytics', NULL, NULL),
(167, 'Media / Entertainment / Internet', NULL, NULL),
(168, 'Office Equipment / Automation', NULL, NULL),
(169, 'Outsourcing/Offshoring', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
