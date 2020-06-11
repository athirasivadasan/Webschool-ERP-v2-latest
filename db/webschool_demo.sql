-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2020 at 07:40 AM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webschool_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `academicid` int NOT NULL,
  `academic_startyear` varchar(45) DEFAULT NULL,
  `academic_endyear` varchar(45) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `academic_startmonth` varchar(30) DEFAULT NULL,
  `academic_endmonth` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batchid` int NOT NULL,
  `institutionid` int DEFAULT NULL,
  `courseid` int DEFAULT NULL,
  `batch_name` varchar(45) DEFAULT NULL,
  `batch_startdate` datetime DEFAULT NULL,
  `batch_enddate` datetime DEFAULT NULL,
  `max_no_of_students` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `venue` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int NOT NULL,
  `course_name` varchar(60) DEFAULT NULL,
  `course_description` varchar(256) DEFAULT NULL,
  `course_code` varchar(45) DEFAULT NULL,
  `minimumattendance` varchar(45) DEFAULT NULL,
  `attendancetype` int NOT NULL DEFAULT '0' COMMENT '0=>daily,1=>subjectwise',
  `totalworkingdays` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `guardian_id` int NOT NULL,
  `guardian_name` varchar(256) DEFAULT NULL,
  `guardian_phone` varchar(45) DEFAULT NULL,
  `guardian_address` varchar(256) DEFAULT NULL,
  `guardian_city` varchar(45) DEFAULT NULL,
  `guardian_state` varchar(45) DEFAULT NULL,
  `guardian_country` varchar(45) DEFAULT NULL,
  `guardian_email` varchar(60) DEFAULT NULL,
  `guardian_photo` varchar(256) DEFAULT NULL,
  `guardian_mobile` varchar(45) DEFAULT NULL,
  `guardian_relation` varchar(60) DEFAULT NULL,
  `guardian_education` varchar(45) DEFAULT NULL,
  `guardian_occupation` varchar(60) DEFAULT NULL,
  `guardian_income` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `institution_id` int NOT NULL,
  `institution_name` varchar(256) DEFAULT NULL,
  `institution_contactperson` varchar(256) DEFAULT NULL,
  `institution_contactemail` varchar(256) DEFAULT NULL,
  `institution_phone` varchar(256) DEFAULT NULL,
  `institution_address` varchar(256) DEFAULT NULL,
  `institution_fax` varchar(256) DEFAULT NULL,
  `institution_mobile` varchar(256) DEFAULT NULL,
  `institution_created_on` datetime DEFAULT NULL,
  `institution_updated_on` datetime DEFAULT NULL,
  `institution_language` varchar(45) DEFAULT NULL,
  `institution_timezone` varchar(256) DEFAULT NULL,
  `institution_logo` varchar(45) DEFAULT NULL,
  `institution_country` varchar(45) DEFAULT NULL,
  `institution_currency_type` varchar(45) DEFAULT NULL,
  `institution_liscencestatus` varchar(45) DEFAULT NULL,
  `institution_groupid` int DEFAULT NULL,
  `institution_code` varchar(45) DEFAULT NULL,
  `isautogeneration` int NOT NULL,
  `institution_facebookurl` varchar(250) DEFAULT NULL,
  `institution_youtubeurl` varchar(250) DEFAULT NULL,
  `institution_twitterurl` varchar(250) DEFAULT NULL,
  `institution_website` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institution_group`
--

CREATE TABLE `institution_group` (
  `institutiongroup_id` int NOT NULL,
  `institutiongroup_name` varchar(256) DEFAULT NULL,
  `institutiongroup_address` varchar(256) DEFAULT NULL,
  `institutiongroup_email` varchar(256) DEFAULT NULL,
  `institutiongroup_phone` varchar(45) DEFAULT NULL,
  `institutiongroup_contactperson` varchar(45) DEFAULT NULL,
  `roleid` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_details`
--

CREATE TABLE `parent_details` (
  `parentdetailsid` int NOT NULL,
  `father_name` varchar(60) NOT NULL,
  `father_mobile` varchar(60) NOT NULL,
  `father_job` varchar(60) NOT NULL,
  `faadharno` varchar(30) NOT NULL,
  `maadharno` varchar(30) NOT NULL,
  `mother_name` varchar(60) NOT NULL,
  `mother_mobile` varchar(60) NOT NULL,
  `mother_job` varchar(60) NOT NULL,
  `studentid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `previous_qualification`
--

CREATE TABLE `previous_qualification` (
  `previousqualification_id` int NOT NULL,
  `qualification` varchar(60) DEFAULT NULL,
  `previousqualification_schoolname` varchar(256) DEFAULT NULL,
  `previousqualification_address` varchar(256) DEFAULT NULL,
  `score` int NOT NULL,
  `online_enquiryid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int NOT NULL,
  `student_admissionno` varchar(45) DEFAULT NULL,
  `student_admissiondate` datetime DEFAULT NULL,
  `student_firstname` varchar(45) DEFAULT NULL,
  `student_middlename` varchar(45) DEFAULT NULL,
  `student_lastname` varchar(45) DEFAULT NULL,
  `student_dob` datetime DEFAULT NULL,
  `courseid` int DEFAULT NULL,
  `batchid` int DEFAULT '0',
  `student_gender` varchar(45) DEFAULT NULL,
  `student_bloodgroup` varchar(45) DEFAULT NULL,
  `student_birthplace` varchar(45) DEFAULT NULL,
  `student_nationality` varchar(45) DEFAULT NULL,
  `student_mothertoung` varchar(45) DEFAULT NULL,
  `studentcategory_id` int DEFAULT NULL,
  `student_religion` varchar(45) DEFAULT NULL,
  `student_caste` varchar(45) DEFAULT NULL,
  `student_address1` varchar(256) DEFAULT NULL,
  `student_address2` varchar(256) DEFAULT NULL,
  `student_city` varchar(45) DEFAULT NULL,
  `student_previousqualification_id` int NOT NULL,
  `student_state` varchar(45) DEFAULT NULL,
  `student_pincode` varchar(45) DEFAULT NULL,
  `student_country` varchar(45) DEFAULT NULL,
  `student_phone` varchar(45) DEFAULT NULL,
  `student_mobile` varchar(45) DEFAULT NULL,
  `student_email` varchar(256) DEFAULT NULL,
  `student_photo` varchar(256) DEFAULT NULL,
  `institution_id` int DEFAULT NULL,
  `guardian_id` int DEFAULT NULL,
  `student_idcardissuedate` datetime DEFAULT NULL,
  `student_rollno` int DEFAULT NULL,
  `student_aadhar` varchar(45) NOT NULL,
  `student_abilities` varchar(256) DEFAULT NULL,
  `student_hobbies` varchar(256) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '2=>alumni,0=>existing ,1=>promoted,3=>withdrawal',
  `academicyear` varchar(45) NOT NULL DEFAULT '0',
  `withdrawdate` date DEFAULT NULL,
  `academicid` int DEFAULT NULL,
  `studenthouseid` int NOT NULL,
  `documenttypeid` varchar(45) DEFAULT NULL,
  `student_regno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activkey` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `superuser` int DEFAULT NULL,
  `usertypeid` int DEFAULT NULL,
  `userid` int NOT NULL,
  `institutionid` int DEFAULT NULL,
  `otp` int NOT NULL,
  `linked` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `userroleid` tinyint UNSIGNED NOT NULL,
  `institutionid` int DEFAULT NULL,
  `rolename` varchar(30) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertypeid` int NOT NULL,
  `usertype_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`academicid`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batchid`),
  ADD KEY `batch_institution_id` (`institutionid`) USING BTREE,
  ADD KEY `batch_course_id` (`courseid`) USING BTREE;

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`guardian_id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`institution_id`),
  ADD KEY `institution_groupid` (`institution_groupid`);

--
-- Indexes for table `institution_group`
--
ALTER TABLE `institution_group`
  ADD PRIMARY KEY (`institutiongroup_id`) USING BTREE,
  ADD KEY `institutiongroup_role2` (`roleid`) USING BTREE;

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `parent_details`
--
ALTER TABLE `parent_details`
  ADD PRIMARY KEY (`parentdetailsid`);

--
-- Indexes for table `previous_qualification`
--
ALTER TABLE `previous_qualification`
  ADD PRIMARY KEY (`previousqualification_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD KEY `courseid` (`courseid`),
  ADD KEY `batchid` (`batchid`),
  ADD KEY `previousqualificationid` (`student_previousqualification_id`),
  ADD KEY `student_institution_id` (`institution_id`) USING BTREE,
  ADD KEY `student_guardian_id` (`guardian_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `superuserIndex` (`superuser`),
  ADD KEY `usertype_id` (`usertypeid`),
  ADD KEY `institutionid` (`institutionid`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`userroleid`),
  ADD UNIQUE KEY `userroleid_unique` (`userroleid`),
  ADD KEY `userrole_rolename` (`rolename`),
  ADD KEY `fk_userrole_institution1_idx` (`institutionid`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `academicid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batchid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `guardian_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `institution_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institution_group`
--
ALTER TABLE `institution_group`
  MODIFY `institutiongroup_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_details`
--
ALTER TABLE `parent_details`
  MODIFY `parentdetailsid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `previous_qualification`
--
ALTER TABLE `previous_qualification`
  MODIFY `previousqualification_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertypeid` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `fk_ batch_institution_id` FOREIGN KEY (`institutionid`) REFERENCES `institution` (`institution_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_batch_course_id` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `institution`
--
ALTER TABLE `institution`
  ADD CONSTRAINT `fk_institution_groupid` FOREIGN KEY (`institution_groupid`) REFERENCES `institution_group` (`institutiongroup_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_batch_id` FOREIGN KEY (`batchid`) REFERENCES `batch` (`batchid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_courseid` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_guardian_id` FOREIGN KEY (`guardian_id`) REFERENCES `guardian` (`guardian_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_institution_id` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`institution_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_previousqualification_id` FOREIGN KEY (`student_previousqualification_id`) REFERENCES `previous_qualification` (`previousqualification_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
