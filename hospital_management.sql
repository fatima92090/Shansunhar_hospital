-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 08:12 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `departmet`
--

CREATE TABLE `departmet` (
  `id` int(11) NOT NULL,
  `departmet_name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departmet`
--

INSERT INTO `departmet` (`id`, `departmet_name`, `description`) VALUES
(1, 'Medicine', 'Hospital Family Medicine doctor provides comprehensive, compassionate, and continuous care to patients and their family members. Family Medicine doctors can assume responsibility for the health care needs of the individual and family, including medical'),
(2, 'Pediatrics', NULL),
(3, 'Gynaecology', NULL),
(5, 'Cardiology', 'Pediatrics (also spelled Paediatrics) is a branch of medicine that deals with the medical care of infants, children, and adolescents. This department comprises of very prominent & distinguished physicians who are dedicated to the health and well-being of '),
(6, 'Dietetics And Nutrition', 'A balanced diet is a diet containing adequate energy and all essential nutrients that cannot be synthesized in sufficient quantities by the body, in amounts adequate for growth, energy needs, nitrogen equilibrium, repair and maintenance of normal health.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_list`
--

CREATE TABLE `doctor_list` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `department` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `specialist` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `sort_biography` varchar(255) DEFAULT NULL,
  `available_time` varchar(255) DEFAULT NULL,
  `Unavailable_days` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor_list`
--

INSERT INTO `doctor_list` (`id`, `first_name`, `last_name`, `email`, `gender`, `designation`, `department`, `address`, `specialist`, `mobile`, `image_path`, `sort_biography`, `available_time`, `Unavailable_days`) VALUES
(22, 'Dr. Nazrul', ' Islam', 'nazrul@gmail.com', 0, 'Consultent', '1', 'Azompur, Uttara, Dhaka', 'MBBS, MSc in Nephrology (UK)', '01874565421', 'doctor.jpg', ' Dr. Nazrul Islam graduated from Rangpur Medical College and after his Internship year, he worked as Medical Officer in Dhaka Renal Centre & General Hospital. Later he joined as Assistant Registrar (Nephrology) in Medical College for Women and Hospital, U', '1', 'FriDay'),
(24, 'Dr. Rownak ', 'Jahan', 'Jahan@yahoo.com', 1, 'Consultent', '2', 'Dhanmondhi, Dhaka', 'MBBS, MSc in Chilid (UK)', '01785269542', 'doctor3.jpg', '', '1', 'FriDay'),
(25, 'Dr. Jannatul ', 'Ferdousi', 'Ferdousi@gmail.com', 1, 'Consultent', '3', 'Azompur, Uttara, Dhaka', 'MBBS, MSc in Gynaecology (UK)', '0175869548', 'doctor4.jpg', 'Dr. Jannatul graduated from Sher-e-Bangla Medical College.  He obtained MD (Internal Medicine) and DEM (Diploma in Endocrinology & Metabolism) from Bangabandhu Sheikh Mujib Medical University (BSMMU) respectively through BIRDEM Academy. He accomplished tr', '2', 'Thusday'),
(26, 'Dr. Mozibar', 'Rahman', 'mozibar@gmail.com', 0, 'Consaltant', '1', 'Azimpur, Dhaka- 1230', 'Medicine MD,USA ', '0147586958', 'doctor6.jpg', NULL, '4', 'Thusday'),
(28, 'Dr Rabeya', 'Rahman', 'rabeya@gmial.com', 1, 'Consultant', '3', 'Azompur, Uttara, Dhaka', 'MBBS, MSc in Gynaecology (DU)', '+880 1685-435367', 'doctorf.png', ' Brigham Young University Family Nurse Practitioner (FNP) Program; University of Utah Bachelors Science in Nursing (BSN). Pediatric Care; The Orthopedic Specialty Hospital.', '2', 'FriDay'),
(29, 'Dr. Abdullah', 'Raji', 'Raji@gmail.com', 0, 'Consultant', '5', 'Azimpur, Dhaka-1230', 'MBBS, MSc in  Cardiology (DU)', '+880 1685-435367', 'doctor2.png', 'Dr. Abdullah started serving Hospitals Ltd. since 2008. He has wide experience in different modalities of Renal Replacement Therapy. He was awarded MMedSci in Cardiology from the University of Dhaka, Bangladesh in 2010. Dr. Abdullah has a good number of p', '4', 'SunDay'),
(30, 'Dr. Quder', 'Ahmed', 'quader@gmail.com', 0, 'Consultent', '6', 'Dhanmondhi, Dhaka', 'MBBS, MSc in Nutrition(DU)', '+880 1685-435367', 'doctor7.jpg', 'Dr. Qader graduated from Sylhet MAG Osmani Medical College, Sylhet. After graduation, he has started his Pediatric training in Sylhet MAG Osmani Medical College Hospital. In the year 2010, he has joined in the Department of Pediatric Nephrology, Bangaband', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_pataints`
--

CREATE TABLE `doctor_pataints` (
  `id` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `pataint_id` int(11) NOT NULL,
  `pataint_name` varchar(50) NOT NULL,
  `appointment_date` varchar(50) NOT NULL,
  `pataint_checked` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor_pataints`
--

INSERT INTO `doctor_pataints` (`id`, `serial_no`, `doctor_id`, `pataint_id`, `pataint_name`, `appointment_date`, `pataint_checked`) VALUES
(1, 1, 29, 12, 'test', '2019-05-05', 'yes'),
(2, 2, 29, 13, 'test4', '2019-05-05', NULL),
(3, 1, 22, 14, 'test', '2019-05-03', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `pataint_info`
--

CREATE TABLE `pataint_info` (
  `id` int(11) NOT NULL,
  `pataint_name` varchar(50) NOT NULL,
  `pataint_mobile` varchar(50) NOT NULL,
  `pataint_age` float NOT NULL,
  `appointment_date` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pataint_info`
--

INSERT INTO `pataint_info` (`id`, `pataint_name`, `pataint_mobile`, `pataint_age`, `appointment_date`, `doctor_id`, `doctor_department_id`) VALUES
(12, 'test', '0123456789', 10, '2019-04-03', 29, 3),
(13, 'test4', '01235644', 22, '2019-04-03', 29, 3),
(14, 'test', '012345678', 10, '2019-04-03', 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `id` int(11) NOT NULL,
  `time_duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`id`, `time_duration`) VALUES
(1, '10.00AM - 1.00PM'),
(2, '4.00PM - 9.00PM'),
(3, '6.00PM - 10.00PM'),
(4, '9.00AM - 12.00PM');

-- --------------------------------------------------------

--
-- Table structure for table `user_admins`
--

CREATE TABLE `user_admins` (
  `user_type` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_admins`
--

INSERT INTO `user_admins` (`user_type`, `email`, `pass`, `full_name`) VALUES
('AD', 'admin@gmail.com', '123456', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_doctor`
--

CREATE TABLE `user_doctor` (
  `doctor_id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_doctor`
--

INSERT INTO `user_doctor` (`doctor_id`, `user_type`, `email`, `pass`) VALUES
(24, 'DC', 'Jahan@yahoo.com', '1234'),
(29, 'DC', 'Raji@gmail.com', '8388'),
(30, 'DC', 'quader@gmail.com', '4183');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departmet`
--
ALTER TABLE `departmet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_list`
--
ALTER TABLE `doctor_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_pataints`
--
ALTER TABLE `doctor_pataints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pataint_id` (`pataint_id`);

--
-- Indexes for table `pataint_info`
--
ALTER TABLE `pataint_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departmet`
--
ALTER TABLE `departmet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor_list`
--
ALTER TABLE `doctor_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `doctor_pataints`
--
ALTER TABLE `doctor_pataints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pataint_info`
--
ALTER TABLE `pataint_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_pataints`
--
ALTER TABLE `doctor_pataints`
  ADD CONSTRAINT `doctor_pataints_ibfk_1` FOREIGN KEY (`pataint_id`) REFERENCES `pataint_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
