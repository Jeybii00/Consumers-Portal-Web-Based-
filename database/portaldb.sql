-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 04:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `asurname` varchar(255) NOT NULL,
  `ausername` varchar(255) NOT NULL,
  `apassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `asurname`, `ausername`, `apassword`) VALUES
(2, 'Trial', 'Admin', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`id`, `type`, `details`, `date`) VALUES
(136, 'Activity', '𝗖𝗢𝗢𝗣 𝗠𝗔𝗜𝗡𝗧𝗘𝗡𝗔𝗡𝗖𝗘 𝗔𝗖𝗧𝗜𝗩𝗜𝗧𝗜𝗘𝗦 We are always doing reliability-centered maintenance and repairs on our distribution lines to ensure quality, reliable and cost effective electric service to Member-Consumer-Owners. On November 18, 2022, we conducted the following at Brgy Igcabugao, Igbaras: <br>\n📌Replacement of wood pole to steel pole <br>\n📌Correction of low clearance primary line <br>\n📌Clearing of trees under power lines For any technical concerns, you may contact our Technical Services Department thru (033) 511-7822 to 25 local 109 or CWDO 0917-314-4006 from Monday to Friday, 8am to 5pm. <br>\nFor emergency situations, you may contact our 24/7 customer care hotline 0917-314-4410 or (033) 511-8138. <br>\n<br>\n<br>\n#coopkopalanggako #karikamoupodkitaatonini\"', '2022-11-28 03:30:32'),
(137, 'Announcement', '𝗖𝗢𝗢𝗣 𝗠𝗔𝗜𝗡𝗧𝗘𝗡𝗔𝗡𝗖𝗘 𝗔𝗖𝗧𝗜𝗩𝗜𝗧𝗜𝗘𝗦 We are always doing reliability-centered maintenance and repairs on our distribution lines to ensure quality, reliable and cost effective electric service to Member-Consumer-Owners. On November 18, 2022, we conducted the following at Brgy Igcabugao, Igbaras: <br><br>\n📌Replacement of wood pole to steel pole <br><br>\n📌Correction of low clearance primary line <br><br>\n📌Clearing of trees under power lines For any technical concerns, you may contact our Technical Services Department thru (033) 511-7822 to 25 local 109 or CWDO 0917-314-4006 from Monday to Friday, 8am to 5pm. <br>\n<br>\nFor emergency situations, you may contact our 24/7 customer care hotline 0917-314-4410 or (033) 511-8138. <br>\n<br>\n#coopkopalanggako #karikamoupodkitaatonini\"', '2022-11-28 03:41:41'),
(138, 'Activity', '𝗖𝗢𝗢𝗣 𝗠𝗔𝗜𝗡𝗧𝗘𝗡𝗔𝗡𝗖𝗘 𝗔𝗖𝗧𝗜𝗩𝗜𝗧𝗜𝗘𝗦 We are always doing reliability-centered maintenance and repairs on our distribution lines to ensure quality, reliable and cost effective electric service to Member-Consumer-Owners. On November 18, 2022, we conducted the following at Brgy Igcabugao, Igbaras: <br>\n📌Replacement of wood pole to steel pole <br>\n📌Correction of low clearance primary line <br>\n📌Clearing of trees under power lines For any technical concerns, you may contact our Technical Services Department thru (033) 511-7822 to 25 local 109 or CWDO 0917-314-4006 from Monday to Friday, 8am to 5pm. <br>\n<br>\nFor emergency situations, you may contact our 24/7 customer care hotline 0917-314-4410 or (033) 511-8138. <br>\n<br>\n#coopkopalanggako #karikamoupodkitaatonini\"', '2022-11-28 03:42:30'),
(140, 'Activity', '𝗖𝗢𝗢𝗣 𝗠𝗔𝗜𝗡𝗧𝗘𝗡𝗔𝗡𝗖𝗘 𝗔𝗖𝗧𝗜𝗩𝗜𝗧𝗜𝗘𝗦 We are always doing reliability-centered maintenance and repairs on our distribution lines to ensure quality, reliable and cost effective electric service to Member-Consumer-Owners. On November 18, 2022, we conducted the following at Brgy Igcabugao, Igbaras: <br>\n<br>\n📌Replacement of wood pole to steel pole <br>\n📌Correction of low clearance primary line <br>\n📌Clearing of trees under power lines For any technical concerns, you may contact our Technical Services Department thru (033) 511-7822 to 25 local 109 or CWDO 0917-314-4006 from Monday to Friday, 8am to 5pm. <br>\n<br>\nFor emergency situations, you may contact our 24/7 customer care hotline 0917-314-4410 or (033) 511-8138. <br>\n<br>\n#coopkopalanggako #karikamoupodkitaatonini\"', '2022-12-02 06:25:04'),
(141, 'Activity', '𝗖𝗢𝗢𝗣 𝗠𝗔𝗜𝗡𝗧𝗘𝗡𝗔𝗡𝗖𝗘 𝗔𝗖𝗧𝗜𝗩𝗜𝗧𝗜𝗘𝗦 We are always doing reliability-centered maintenance and repairs on our distribution lines to ensure quality, reliable and cost effective electric service to Member-Consumer-Owners. On November 18, 2022, we conducted the following at Oton, Iloilo: <br>\n<br>\n📌Replacement of wood pole to steel pole <br>\n📌Correction of low clearance primary line <br>\n📌Clearing of trees under power lines For any technical concerns, you may contact our Technical Services Department thru (033) 511-7822 to 25 local 109 or CWDO 0917-314-4006 from Monday to Friday, 8am to 5pm. <br>\n<br>\nFor emergency situations, you may contact our 24/7 customer care hotline 0917-314-4410 or (033) 511-8138. <br>\n<br>\n#coopkopalanggako #karikamoupodkitaatonini\"', '2022-12-02 06:27:30'),
(143, 'Announcement', '𝗖𝗢𝗢𝗣 𝗠𝗔𝗜𝗡𝗧𝗘𝗡𝗔𝗡𝗖𝗘 𝗔𝗖𝗧𝗜𝗩𝗜𝗧𝗜𝗘𝗦<br>\n<br>\nWe are always doing reliability-centered maintenance and repairs on our distribution lines to ensure quality, reliable and cost effective electric service to Member-Consumer-Owners. On December 3, 2022, we conducted the following at Brgy 15, San Miguel St., San Miguel:<br>\n <br>\n📌Replacement and relocation of rotten pole <br>\n📌Meter Clustering <br>\n📌Correction of low clearance primary line<br>\n<br>\nFor any technical concerns, you may contact our Technical Services Department thru (033) 511-7822 to 25 local 109 or CWDO 0917-314-4006 from Monday to Friday, 8am to 5pm. <br>\nFor emergency situations, you may contact our 24/7 customer care hotline 0917-314-4410 or (033) 511-8138.<br>\n<br>\n#coopkopalanggako<br>\n#karikamoupodkitaatonini', '2023-06-03 19:52:46'),
(144, 'Activity', '𝗖𝗢𝗢𝗣 𝗠𝗔𝗜𝗡𝗧𝗘𝗡𝗔𝗡𝗖𝗘 𝗔𝗖𝗧𝗜𝗩𝗜𝗧𝗜𝗘𝗦 <br>\nWe are always doing reliability-centered maintenance and repairs on our distribution lines to ensure quality, reliable and cost effective electric service to Member-Consumer-Owners. On December 3, 2022, we conducted the following at Brgy. Mat-y, Miagao:<br>\n <br>\n📌Massive clearing of trees near power lines <br>\n📌Replacement and relocation of rotten pole <br>\n📌Correction of low clearance primary line <br>\n<br>\nFor any technical concerns, you may contact our Technical Services Department thru (033) 511-7822 to 25 local 109 or CWDO 0917-314-4006 from Monday to Friday, 8am to 5pm. <br>\nFor emergency situations, you may contact our 24/7 customer care hotline 0917-314-4410 or (033) 511-8138.<br>\n<br>\n#coopkopalanggako<br>\n#karikamoupodkitaatonini', '2023-06-03 19:58:42'),
(145, 'Announcement', '𝗡𝗢𝗧𝗜𝗖𝗘 𝗢𝗙 𝗦𝗖𝗛𝗘𝗗𝗨𝗟𝗘𝗗 𝗣𝗢𝗪𝗘𝗥 𝗜𝗡𝗧𝗘𝗥𝗥𝗨𝗣𝗧𝗜𝗢𝗡<br>\n🗓️𝗗𝗘𝗖𝗘𝗠𝗕𝗘𝗥 𝟳, 𝟮𝟬𝟮𝟮, 𝗪𝗘𝗗𝗡𝗘𝗦𝗗𝗔𝗬<br>\n🕒 𝗧𝗜𝗠𝗘: 𝟵:𝟬𝟬 𝗔.𝗠. 𝗧𝗢 𝟰:𝟬𝟬 𝗣𝗠 (𝟳 𝗵𝗼𝘂𝗿𝘀)<br>\n<br>\n🚧 REASON: To conduct replacement of rotten pole at Brgy. Sambaludan, Oton.<br>\n<br>\n📌AFFECTED AREAS:<br>\n𝗣𝗢𝗥𝗧𝗜𝗢𝗡 𝗢𝗙 𝗢𝗧𝗢𝗡:<br>\n&nbsp;&nbsp;&nbsp;&nbsp;1. Sambaludan<br>\n𝗣𝗢𝗥𝗧𝗜𝗢𝗡 𝗢𝗙 𝗧𝗜𝗚𝗕𝗔𝗨𝗔𝗡:<br>\n&nbsp;&nbsp; 1. Bankal<br>\n&nbsp;&nbsp; 2. Bantud<br>\n&nbsp;&nbsp; 3. Napnapan Sitio Nasuli<br>\n&nbsp;&nbsp; 4.&nbsp;&nbsp;Olo Barroc<br>\n<br>\nWe humbly ask for your understanding on this scheduled power interruption.<br>\n⚠️ Power may be restored earlier than or as scheduled, so please consider all lines and equipment energized at all time.', '2023-06-03 20:08:49'),
(146, 'Activity', '𝗖𝗢𝗢𝗣 𝗠𝗔𝗜𝗡𝗧𝗘𝗡𝗔𝗡𝗖𝗘 𝗔𝗖𝗧𝗜𝗩𝗜𝗧𝗜𝗘𝗦 We are always doing reliability-centered maintenance and repairs on our distribution lines to ensure quality, reliable and cost effective electric service to Member-Consumer-Owners. On November 18, 2022, we conducted the following at Brgy Igcabugao, Igbaras: <br>\r\n📌Replacement of wood pole to steel pole <br>\r\n📌Correction of low clearance primary line <br>\r\n📌Clearing of trees under power lines For any technical concerns, you may contact our Technical Services Department thru (033) 511-7822 to 25 local 109 or CWDO 0917-314-4006 from Monday to Friday, 8am to 5pm. <br>\r\nFor emergency situations, you may contact our 24/7 customer care hotline 0917-314-4410 or (033) 511-8138. <br>\r\n<br>\r\n<br>\r\n#coopkopalanggako #karikamoupodkitaatonini\"', '2024-08-20 04:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(10) NOT NULL,
  `account_number` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `feedback_msg` longtext NOT NULL,
  `date_submission` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `account_number` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `bill_img` blob NOT NULL,
  `month_period` varchar(255) NOT NULL,
  `generated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concerns`
--

CREATE TABLE `concerns` (
  `id` int(50) NOT NULL,
  `account_number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `feedback_msg` longtext NOT NULL,
  `date_submission` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heir_form`
--

CREATE TABLE `heir_form` (
  `id` int(50) NOT NULL,
  `account_number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `asc_esc_img` blob NOT NULL,
  `notarized_waiver` blob NOT NULL,
  `valid_id` blob NOT NULL,
  `death_certificate` blob NOT NULL,
  `cenomar_img` blob NOT NULL,
  `valid_signature` blob NOT NULL,
  `2x2_id` blob NOT NULL,
  `date_submission` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reconnection_form`
--

CREATE TABLE `reconnection_form` (
  `id` int(50) NOT NULL,
  `account_number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `inspection_report` blob NOT NULL,
  `id_copy` blob NOT NULL,
  `authorization_copy` blob NOT NULL,
  `unpaid_bills_copy` blob NOT NULL,
  `previous_payment` blob NOT NULL,
  `date_submission` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spouse_form`
--

CREATE TABLE `spouse_form` (
  `id` int(50) NOT NULL,
  `account_number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `marriage_contract` blob NOT NULL,
  `death_certificate` blob NOT NULL,
  `valid_id` blob NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `account_number` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `profile_image` blob NOT NULL,
  `otp` int(4) NOT NULL,
  `verification_status` varchar(20) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Account_Created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waiver_form`
--

CREATE TABLE `waiver_form` (
  `id` int(11) NOT NULL,
  `account_number` int(10) NOT NULL,
  `email` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `resident_address` varchar(50) NOT NULL,
  `favor_name` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `witness_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `witness_address` varchar(50) NOT NULL,
  `e_signature` blob NOT NULL,
  `printed_name` varchar(50) NOT NULL,
  `witness1` varchar(50) NOT NULL,
  `witness2` varchar(50) NOT NULL,
  `before_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `person_address` varchar(50) NOT NULL,
  `Date_of_Submission` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concerns`
--
ALTER TABLE `concerns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heir_form`
--
ALTER TABLE `heir_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reconnection_form`
--
ALTER TABLE `reconnection_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spouse_form`
--
ALTER TABLE `spouse_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waiver_form`
--
ALTER TABLE `waiver_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11093;

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `concerns`
--
ALTER TABLE `concerns`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `heir_form`
--
ALTER TABLE `heir_form`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reconnection_form`
--
ALTER TABLE `reconnection_form`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spouse_form`
--
ALTER TABLE `spouse_form`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10022;

--
-- AUTO_INCREMENT for table `waiver_form`
--
ALTER TABLE `waiver_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
