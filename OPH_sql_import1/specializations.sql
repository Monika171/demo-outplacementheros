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
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `specialization`, `created_at`, `updated_at`) VALUES
(1, 'Advertising/Mass Communication', NULL, NULL),
(2, 'Aerospace & Mechanical Engineering', NULL, NULL),
(3, 'Agriculture', NULL, NULL),
(4, 'Anaesthesiology', NULL, NULL),
(5, 'Anatomy', NULL, NULL),
(6, 'Animation Film Design', NULL, NULL),
(7, 'Anthropology', NULL, NULL),
(8, 'Apparel Design', NULL, NULL),
(9, 'Architecture', NULL, NULL),
(10, 'Art History', NULL, NULL),
(11, 'Arts  & Humanities', NULL, NULL),
(12, 'Astronautical Engineering', NULL, NULL),
(13, 'Astrophysics', NULL, NULL),
(14, 'Automobile', NULL, NULL),
(15, 'Aviation', NULL, NULL),
(16, 'Aviation Medicine/Aerospace Medicine', NULL, NULL),
(17, 'Ayurveda', NULL, NULL),
(18, 'Bio-Chemistry', NULL, NULL),
(19, 'Bio-Chemistry/Bio-Technology', NULL, NULL),
(20, 'Biology', NULL, NULL),
(21, 'Biomedical', NULL, NULL),
(22, 'Biophysics', NULL, NULL),
(23, 'Biotechnology', NULL, NULL),
(24, 'Blood Banking & Immuno. Haem/Imm. Haem. & Blood Trans.', NULL, NULL),
(25, 'Botany', NULL, NULL),
(26, 'Burns & Plastic Surgery', NULL, NULL),
(27, 'CA', NULL, NULL),
(28, 'Cardiac-Anes', NULL, NULL),
(29, 'Cardio Thoracic and Vascular Surgery', NULL, NULL),
(30, 'Cardio Thoracic Surgery', NULL, NULL),
(31, 'Cardiology', NULL, NULL),
(32, 'CCM', NULL, NULL),
(33, 'Ceramic & Glass Design', NULL, NULL),
(34, 'Ceramics', NULL, NULL),
(35, 'Chemical', NULL, NULL),
(36, 'Chemical Engineering & Materials Science', NULL, NULL),
(37, 'Chemistry', NULL, NULL),
(38, 'Child & Adolescent Psychiatry', NULL, NULL),
(39, 'Civil', NULL, NULL),
(40, 'Clinical Haematology', NULL, NULL),
(41, 'Clinical Immunology', NULL, NULL),
(42, 'Clinical Pharmacology', NULL, NULL),
(43, 'Commerce', NULL, NULL),
(44, 'Communication', NULL, NULL),
(45, 'Computers', NULL, NULL),
(46, 'Computers and Management', NULL, NULL),
(47, 'Critical Care Medicine', NULL, NULL),
(48, 'CS', NULL, NULL),
(49, 'Cyber Security Engineering', NULL, NULL),
(50, 'Dairy Technology', NULL, NULL),
(51, 'Dentistry', NULL, NULL),
(52, 'Dermatology', NULL, NULL),
(53, 'Design for Retail Experience', NULL, NULL),
(54, 'Digital Game Design', NULL, NULL),
(55, 'Economics', NULL, NULL),
(56, 'Education', NULL, NULL),
(57, 'Electrical', NULL, NULL),
(58, 'Electronics', NULL, NULL),
(59, 'Electronics & Embedded Technology', NULL, NULL),
(60, 'Electronics/communication', NULL, NULL),
(61, 'Electronics/Telecommunication', NULL, NULL),
(62, 'Elementary Education', NULL, NULL),
(63, 'Endocrine Surgery', NULL, NULL),
(64, 'Endocrinology', NULL, NULL),
(65, 'Energy', NULL, NULL),
(66, 'Engineering', NULL, NULL),
(67, 'English', NULL, NULL),
(68, 'ENT', NULL, NULL),
(69, 'Environmental', NULL, NULL),
(70, 'Environmental Science', NULL, NULL),
(71, 'Exhibition Design', NULL, NULL),
(72, 'Export/Import', NULL, NULL),
(73, 'Fashion Designing/Other Designing', NULL, NULL),
(74, 'Film', NULL, NULL),
(75, 'Film and Video Communication', NULL, NULL),
(76, 'Finance', NULL, NULL),
(77, 'Fine Arts', NULL, NULL),
(79, 'Food Technology', NULL, NULL),
(80, 'Forensic Medicine/Forensic Medicine & Toxicology', NULL, NULL),
(81, 'Furniture Design', NULL, NULL),
(82, 'Gastroenterology', NULL, NULL),
(83, 'General', NULL, NULL),
(84, 'General Practitioner', NULL, NULL),
(85, 'General Surgery', NULL, NULL),
(86, 'Genetics', NULL, NULL),
(87, 'Geology', NULL, NULL),
(88, 'Geriatic Mental Health', NULL, NULL),
(89, 'Geriatrics', NULL, NULL),
(90, 'Graphic Design', NULL, NULL),
(91, 'Graphic/Web Designing', NULL, NULL),
(92, 'Gynaecological Oncology', NULL, NULL),
(93, 'Haematology Pathology', NULL, NULL),
(94, 'Hand & Micro  Surgery', NULL, NULL),
(95, 'Hand Surgery', NULL, NULL),
(96, 'Health Administration', NULL, NULL),
(97, 'Hepato Pancreato Biliary Surgery', NULL, NULL),
(98, 'Hepatology', NULL, NULL),
(99, 'Hindi', NULL, NULL),
(100, 'History', NULL, NULL),
(101, 'Home Science', NULL, NULL),
(102, 'Homeopathy', NULL, NULL),
(103, 'Hospital Adminstration', NULL, NULL),
(104, 'Hospitality and Hotel Management', NULL, NULL),
(105, 'Hospitality Management', NULL, NULL),
(106, 'Hotel Management', NULL, NULL),
(107, 'HR/Industrial Relations', NULL, NULL),
(108, 'ICWA(CMA)', NULL, NULL),
(109, 'Immunology', NULL, NULL),
(110, 'Industrial & Systems Engineering', NULL, NULL),
(111, 'Infectious Diseases', NULL, NULL),
(112, 'Information Design', NULL, NULL),
(113, 'Instrumentation', NULL, NULL),
(114, 'Insurance', NULL, NULL),
(115, 'Interaction Design', NULL, NULL),
(116, 'International Business', NULL, NULL),
(117, 'Journalism', NULL, NULL),
(118, 'Journalism/Mass Communication', NULL, NULL),
(119, 'Lab Medicine', NULL, NULL),
(120, 'Law', NULL, NULL),
(121, 'Lifestyle Accessory Design', NULL, NULL),
(122, 'Linguistics', NULL, NULL),
(123, 'Literature', NULL, NULL),
(124, 'Management', NULL, NULL),
(125, 'Marine', NULL, NULL),
(126, 'Marine', NULL, NULL),
(127, 'Marketing', NULL, NULL),
(128, 'Maternity & Child Health', NULL, NULL),
(129, 'Maths', NULL, NULL),
(130, 'Mechanical', NULL, NULL),
(131, 'Mechatronics', NULL, NULL),
(132, 'Medical Genetics', NULL, NULL),
(133, 'Medicine', NULL, NULL),
(134, 'Metallurgy', NULL, NULL),
(135, 'Microbiology', NULL, NULL),
(136, 'Mineral', NULL, NULL),
(137, 'Mining', NULL, NULL),
(138, 'Music', NULL, NULL),
(139, 'Neonatal', NULL, NULL),
(140, 'Neonatology', NULL, NULL),
(141, 'Nephrology', NULL, NULL),
(142, 'Neuro Anaesthesia', NULL, NULL),
(143, 'Neuro Radiology', NULL, NULL),
(144, 'Neuro Surgery', NULL, NULL),
(145, 'Neurology', NULL, NULL),
(146, 'New Media Design', NULL, NULL),
(147, 'Nuclear', NULL, NULL),
(148, 'Nursing', NULL, NULL),
(149, 'Obstetrics', NULL, NULL),
(150, 'Oncology', NULL, NULL),
(151, 'Operations', NULL, NULL),
(152, 'Optometry', NULL, NULL),
(153, 'Organ Transplant Anasthesia & Critical Care', NULL, NULL),
(154, 'Organic Chemistry', NULL, NULL),
(155, 'Orthopaedic', NULL, NULL),
(156, 'P.S.M', NULL, NULL),
(157, 'Paint/Oil', NULL, NULL),
(158, 'Painting', NULL, NULL),
(159, 'Palliative Medicine', NULL, NULL),
(160, 'Pathology', NULL, NULL),
(161, 'Pediatric Cardio-Thoracic Vascular Surgery', NULL, NULL),
(162, 'Pediatric Surgery', NULL, NULL),
(163, 'Pediatrics', NULL, NULL),
(164, 'Pedriactic Oncology', NULL, NULL),
(165, 'Pedriatic  Cardiology', NULL, NULL),
(166, 'Pedriatic Anaesthesia', NULL, NULL),
(167, 'Pedriatic Gastroenterology', NULL, NULL),
(168, 'Pedriatic Hepatology', NULL, NULL),
(169, 'Petroleum', NULL, NULL),
(170, 'Pharmacology', NULL, NULL),
(171, 'Pharmacy', NULL, NULL),
(172, 'Philosophy', NULL, NULL),
(173, 'Photography Design', NULL, NULL),
(174, 'Physical Education', NULL, NULL),
(175, 'Physical Medicine & Rehabiliation', NULL, NULL),
(176, 'Physics', NULL, NULL),
(177, 'Plastic & Reconstructive Surgery', NULL, NULL),
(178, 'Plastic Surgery', NULL, NULL),
(179, 'Plastics', NULL, NULL),
(180, 'Pulmonary Med. & Critical Care Med.', NULL, NULL),
(181, 'Political Science', NULL, NULL),
(182, 'PR/Advertising', NULL, NULL),
(183, 'Printmaking', NULL, NULL),
(184, 'Product Design', NULL, NULL),
(185, 'Production/Industrial', NULL, NULL),
(186, 'Psychiatry', NULL, NULL),
(187, 'Psychology', NULL, NULL),
(188, 'Public Health(Epidemiology)', NULL, NULL),
(189, 'Pulmonary Medicine', NULL, NULL),
(190, 'Pursuing', NULL, NULL),
(191, 'R&D', NULL, NULL),
(192, 'Radiology', NULL, NULL),
(193, 'Radiotherapy', NULL, NULL),
(194, 'Reproductive Medicine', NULL, NULL),
(195, 'Rheumatology', NULL, NULL),
(196, 'Sanskrit', NULL, NULL),
(197, 'Sculpture', NULL, NULL),
(198, 'Social & Preventive Medicine/ Community Medicine', NULL, NULL),
(199, 'Sociology', NULL, NULL),
(200, 'Special Education', NULL, NULL),
(201, 'Sports Medicine', NULL, NULL),
(202, 'Statistics', NULL, NULL),
(203, 'Strategic Design Management', NULL, NULL),
(204, 'Surgical Gastroenteerology/G.I. Surgery', NULL, NULL),
(205, 'Surgical Oncology', NULL, NULL),
(206, 'Systems', NULL, NULL),
(207, 'Systems Architecting and Engineering', NULL, NULL),
(208, 'Textile', NULL, NULL),
(209, 'Textile Design', NULL, NULL),
(210, 'Thoracic Surgery', NULL, NULL),
(211, 'Tourism', NULL, NULL),
(212, 'Toy & Game Design', NULL, NULL),
(213, 'Transportation & Automobile Design', NULL, NULL),
(214, 'Traumatology and Surgery', NULL, NULL),
(215, 'Tropical Medicine', NULL, NULL),
(216, 'Tuberculosis & Respiratory Diseases/ Pulmonary Medicine', NULL, NULL),
(217, 'Unani', NULL, NULL),
(218, 'Unani Medicine', NULL, NULL),
(219, 'Universal Design', NULL, NULL),
(220, 'Urology', NULL, NULL),
(221, 'Urology/Genito-Urinary Surgery', NULL, NULL),
(222, 'Vascular Surgery', NULL, NULL),
(223, 'Venereology', NULL, NULL),
(224, 'Veterinary Science', NULL, NULL),
(225, 'Virology', NULL, NULL),
(226, 'Visual Arts', NULL, NULL),
(227, 'Visual Communication', NULL, NULL),
(228, 'Vocational Course', NULL, NULL),
(229, 'Zoology', NULL, NULL),
(230, 'Science', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
