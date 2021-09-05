-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 07:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `alogin`
--

CREATE TABLE `alogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `Department` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `dp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alogin`
--

INSERT INTO `alogin` (`id`, `name`, `email`, `password`, `Department`, `type`, `code`, `status`, `dp`) VALUES
(1, 'kartik', 'kartik.cde@gmail.com', '$2y$11$X.9dDz9HR2q0w6Tymt3d9OtfzOlZ61NCGq39U5yYmFr5IpAFIpcI2', 'ALL', 'superadmin', 144213, NULL, 'Dhanashree.JPEG'),
(2, 'vinayak', 'vinayak.cde@gmail.com', '$2y$11$kV5x./hpCOloZmC46E7ueuEvEYaLnxP9qGtkOBLfZh4FABWmPC9XK', 'Web Development', 'admin', NULL, NULL, 'Vinayak.jpeg'),
(3, 'Renu', 'renu.cde@gmail.com', '$2y$11$TqkhN1N8.i5BcYDSKlVxi.yruhO7Vt.qGeFrNfR1jGpg02Q63IxRC', 'HR', 'admin', NULL, NULL, 'renu.jpeg'),
(8, 'Jaya', 'jaya.cde@gmail.com', '$2y$11$5P7HlTfKC5U0y6GG7wN20.wZxbecKxO/C9rhz8UrecEd2UJI1WmAS', 'HR', 'Admin', NULL, NULL, 'jaya.jpeg'),
(9, 'Riya', 'riya3.cde@gmail.com', '$2y$11$GpdQXF03UqXw3gKiMyGtQu0Vfcpp41KTJf9R2Qy4e5ldVkEK6Nko.', 'HR', 'Admin', NULL, NULL, NULL),
(10, 'Riya', 'riya.cde@gmail.com', '$2y$11$t3qZhIIi4.QjbjMkUmXa/e2r4bW4uc1zE2mvu.vl9ZKRhrEFHUsVi', 'Web Development', 'Admin', NULL, NULL, 'riya jain.PNG'),
(12, 'vrandha', 'vrandha.cde@gmail.com', '$2y$11$U23cKIkN5/UIEPtSjZinfOecpUVE4gNLrfZDeblRAOmi06q7P8Qye', 'Marketing', 'Admin', NULL, NULL, NULL),
(16, 'vinayak', 'vinayak1.cde@gmail.com', '$2y$11$gEPqBAok4ir4cV1W5uPS6eHQKGwsViqR4YjcYDDpn4DrxO4hD/kAS', 'Marketing', 'Admin', NULL, NULL, NULL),
(17, 'Shailesh', 'shailesh.cde@gmail.com', '$2y$11$WSrrow8ET0z2GF0lGWZ0deJ5nbhp18Iza3tVrEOE9ktQq7IwIZtfm', 'Marketing', 'Admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `totaldays` int(11) DEFAULT NULL,
  `present` int(11) DEFAULT 0,
  `absent` int(11) DEFAULT 0,
  `email` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `name`, `totaldays`, `present`, `absent`, `email`, `dept`, `status`) VALUES
(20, 'ankur', 90, 9, 6, 'ankur.cde@gmail.com', 'HR', 'Active'),
(21, 'Dhanashree', 90, 2, 0, 'dans.cde@gmail.com', 'Web Development', 'Active'),
(22, 'rupali', 90, 1, 2, 'rupa.cde@gmail.com', 'Web Development', 'Active'),
(23, 'swarup', 90, 2, 0, 'swarup.cde@gmail.com', 'Finance', 'Active'),
(24, 'ansh', 90, 1, 3, 'ansh.cde@gmail.com', 'Marketing', 'Active'),
(25, 'gita', 90, 0, 0, 'gita.cde@gmail.com', 'HR', 'Active'),
(26, 'rihan', 90, 0, 0, 'rihan.cde@gmail.com', 'Marketing', 'Active'),
(27, 'Dhanashree', 90, 0, 0, 'dsgodase22@gmail.com', 'Web Development', 'Active'),
(28, 'neelakshi', 90, 0, 0, 'neelakshi.cde@gmail.com', 'Web Development', 'Active'),
(29, 'neelakshi', 90, 0, 0, 'neelakshi.cde@gmail.com', 'Web Development', 'Active'),
(30, 'neelakshi', 90, 0, 0, 'neelakshi.cde@gmail.com', 'Web Development', 'Active'),
(31, 'pratiksha', 90, 1, 0, 'pratiksha.cde@gmail.com', 'Web Development', 'Active'),
(32, 'neelakshi', 90, 0, 0, 'neelakshi.cde@gmail.com', 'HR', 'Active'),
(34, 'Dhanashree', 43, 0, 0, 'dsgodase22@gmail.com', 'Marketing', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `idate` date NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `email`, `dept`, `name`, `cname`, `idate`, `image`) VALUES
(2, 'aamir.cde@gmail.com', 'Web Development', '  aamir  ', '  very good  ', '2021-02-17', 'about.jpg'),
(3, 'deeksha.cde@gmail.com', 'Marketing', 'Deeksha', 'excellent', '2021-02-17', NULL),
(18, 'gita.cde@gmail.com', 'Web Development', 'gita', 'very good', '2021-02-11', 'features.jpg'),
(19, 'gita.cde@gmail.com', 'Web Development', ' gita ', '  Nice performance  ', '2021-02-18', 'features (6).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `curricular`
--

CREATE TABLE `curricular` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `initimatecall` varchar(100) NOT NULL,
  `interviewcall` varchar(100) NOT NULL,
  `confirmcall` varchar(100) NOT NULL,
  `mailing` varchar(100) NOT NULL,
  `databasehandle` varchar(100) NOT NULL,
  `postermake` varchar(100) NOT NULL,
  `videomake` varchar(100) NOT NULL,
  `graphicdesign` varchar(100) NOT NULL,
  `inductionmeet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curricular`
--

INSERT INTO `curricular` (`id`, `name`, `email`, `department`, `initimatecall`, `interviewcall`, `confirmcall`, `mailing`, `databasehandle`, `postermake`, `videomake`, `graphicdesign`, `inductionmeet`) VALUES
(4, 'riya', 'riya.cde@gmail.com', 'Web Development', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(5, 'karan', 'karan.cde@gmail.com', 'Web Development', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `birthday` varchar(40) NOT NULL,
  `joindate` varchar(100) NOT NULL,
  `enddate` varchar(100) NOT NULL,
  `totaldays` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `college` varchar(40) NOT NULL,
  `refrence` varchar(10) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `head` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dp` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `birthday`, `joindate`, `enddate`, `totaldays`, `gender`, `contact`, `whatsapp`, `college`, `refrence`, `dept`, `degree`, `head`, `city`, `state`, `status`, `dp`) VALUES
(10, 'nooriya', 'nooriya.cde@gmail.com', '$2y$11$ihg9mZ2TERu1Aw9UBBEiteRlPGwcMc1c9ubfSf7BB38RE.2Wle4ey', '1998-01-01', '2020-12-25', '2021-02-09', '46', 'Female', '9876543211', '9632587410', 'Bhushan Chand College', 'Aamir', 'Web Development', 'BCA', 'False', 'Bihar', 'Bihar', 'Active', ''),
(20, 'ankur', 'ankur.cde@gmail.com', 'hello', '2006-02-01', '2021-02-01', '2021-03-06', '33', 'Male', '8975677477', '8975677477', 'NIT', 'vinayk', 'Web Development', 'btech', 'True', 'pune', 'maharashtra', 'Active', NULL),
(21, 'dhanashree', 'dans.cde@gmail.com', '$2y$11$9O0vgxpbVtPzhI5iPpa1wuc.z3jYSCNqrwuRmhCTRGl/6OWkKZsGa', '1998-08-15', '2021-02-24', '2021-04-16', '51', 'Female', '8975677477', '8975677477', 'NIT', 'vinayk', 'Web Development', 'BCA', 'False', 'pune', 'maharashtra', 'Active', NULL),
(22, 'rupali', 'rupa.cde@gmail.com', '$2y$11$DxDyQFr9bkvz6o/ycCYte.PuhW3z8d2KjJFhS7IUiDuYUPp6tU3Aq', '2006-02-01', '2021-02-24', '2021-05-21', '86', 'Female', '8975677477', '8975677477', 'NIT', 'riya', 'Web Development', 'btech', 'False', 'pune', 'maharashtra', 'Active', NULL),
(23, 'swarup', 'swarup.cde@gmail.com', '$2y$11$8Zo1rfcBSYnS4LuOKLdMOu3ZWlRoXWltEWNGrs/NXYjMuCNCaitRO', '2006-02-01', '2021-02-28', '2021-05-21', '82', 'Male', '8975677477', '8975677477', 'NIT', 'riya', 'Finance', 'btech', 'False', 'pune', 'maharashtra', 'Active', NULL),
(24, 'ansh', 'ansh.cde@gmail.com', '$2y$11$s4aBdT7uzreP6MMEvaurfuxe254tjVnC2KcxhsTVo9NyMVwNpKW7e', '2006-02-01', '2021-02-28', '2021-06-11', '103', 'Male', '8975677477', '8975677477', 'NIT', 'riya', 'Marketing', 'btech', 'True', 'pune', 'maharashtra', 'Active', NULL),
(25, 'gita', 'gita.cde@gmail.com', '$2y$11$6RShuVhF61ojbccn5942MeIR3MV0dMpF3fBDy6/SLGl4tQiJQ8HFq', '2006-02-01', '2021-03-28', '2021-06-26', '90', 'Male', '8975677477', '8975677477', 'NIT', 'riya', 'HR', 'btech', 'True', 'pune', 'maharashtra', 'Active', 'daniel-apodaca-MlFJ5hKJCj4-unsplash.jpg'),
(26, 'rihan', 'rihan.cde@gmail.com', '$2y$11$OAWGin.hrxajzD3nE9gdHOlmkLnbb1fTHPIDYWQ8BT7EwYWB3FVoW', '1997-02-15', '2021-01-18', '2021-02-18', '31', 'Male', '9876543211', '9632587411', 'NIT Kurushetra', 'Riya', 'Marketing', 'MCA', 'True', 'Chandigarh', 'Chandigarh', 'Active', NULL),
(31, 'pratiksha', 'pratiksha.cde@gmail.com', '$2y$11$tDg3fgLetu.98tTSEHiXh.YSBtzs0rBCvwBiCMZK3ASx3eRxIn/Ja', '2021-02-19', '2021-02-01', '2021-03-15', '42', 'Male', '8976546789', '94567896543', 'p.k. College', 'vinayk', 'Web Development', 'BCA', 'True', 'panipat', 'haryana', 'Active', NULL),
(32, 'neelakshi', 'neelakshi.cde@gmail.com', '$2y$11$jYdqnquEqTYDv4J.EHNnnOJWKkr3TdKg/TnhCXz4.q5jTSnkogAqS', '2021-02-06', '2021-03-28', '2021-06-26', '90', 'Female', '786543489', '9876545678', 'Chitkara University', 'jaya', 'HR', 'BCA', 'False', 'Satara', 'Maharashtra', 'Active', 'l9.jpg'),
(34, 'Dhanashree', 'dsgodase22@gmail.com', '$2y$11$56NKTdLdli.l0cH14BPepuYBjg8MLcbvxvK8lnw2HX/EvCbj1FNsq', '2002-01-17', '2021-08-13', '2021-09-25', '43', 'Female', '8975677477', '8975677477', 'mitwpu', 'riya', 'Marketing', 'btech', 'False', 'Satara', 'Maharashtra', 'Active', 'PicsArt_11-21-05.25.09 (1).jpg');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `add_to_attendace` AFTER INSERT ON `employee` FOR EACH ROW BEGIN
    
        INSERT INTO attendance(Id,name,totaldays,email,dept,status)
        VALUES(new.id, new.name,new.totaldays,new.email,new.dept,new.status);
   
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_emp_update` AFTER UPDATE ON `employee` FOR EACH ROW BEGIN
    IF OLD.status <> new.status THEN
        update attendance set status=
         new.status;
    END IF;
    
     IF OLD.totaldays <> new.totaldays THEN
        update attendance set totaldays=
         new.totaldays;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `emp_delete` AFTER DELETE ON `employee` FOR EACH ROW BEGIN
DELETE FROM attendance
    WHERE attendance.id = old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `name` varchar(70) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `applydate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`id`, `email`, `dept`, `name`, `reason`, `start`, `end`, `status`, `applydate`) VALUES
(2, 'shubham.cde@gmail.com', 'HR', 'shubham', 'interview', '2021-01-16', '2021-01-17', 'Approved', '2021-01-16 18:30:00'),
(4, 'shubham.cde@gmail.com', 'Marketing Intern', 'Shubham Sharma', 'fever', '2021-01-16', '2021-01-17', 'approved', '2021-01-16 18:30:00'),
(5, 'aman.cde@gmail.com', NULL, 'Aman ', 'injury ', '2021-01-28', '2021-01-29', 'rejected', '2021-01-16 18:30:00'),
(6, 'karan.cde@gmail.com', NULL, 'karan', 'headache', '2021-01-01', '2021-01-07', 'approved', '2021-01-16 18:30:00'),
(7, 'shubham.cde@gmail.com', NULL, 'Shubham Sharma', 'sick', '2021-01-14', '2021-01-15', 'Rejected', '2021-01-16 18:30:00'),
(15, 'riya.cde@gmail.com', 'HR', 'riya', 'backpain', '2021-02-26', '2021-02-28', 'Rejected', '2021-01-20 18:30:00'),
(16, 'riya.cde@gmail.com', 'HR', 'riya', 'travelling', '2021-01-20', '2021-01-22', 'Approved', '2021-01-20 18:30:00'),
(17, 'neelakshi.cde@gmail.com', NULL, 'neelakshi', 'exam', '2021-02-17', '2021-02-18', 'Approved', '2021-02-04 07:02:45'),
(18, 'kartik.cde@gmail.com', NULL, 'neelakshi', 'exam', '2021-02-05', '2021-02-12', 'Approved', '2021-02-04 07:06:45'),
(19, 'kartik.cde@gmail.com', NULL, 'neelakshi', 'exam', '2021-02-05', '2021-02-12', 'Approved', '2021-02-04 07:06:52'),
(20, 'neelakshi.cde@gmail.com', NULL, 'neelakshi', 'exam', '2021-02-16', '2021-02-26', 'Approved', '2021-02-04 07:09:50'),
(21, 'neelakshi.cde@gmail.com', '', 'neelakshi', 'Gate exam', '2021-02-17', '2021-02-17', 'Approved', '2021-02-04 08:45:11'),
(22, 'neelakshi.cde@gmail.com', 'Web Development', 'neelakshi', 'Gate exam', '2021-02-17', '2021-02-17', 'Approved', '2021-02-04 08:47:58'),
(23, 'dans.cde@gmail.com', 'Web Development', 'Dhanshree', 'Sick', '2021-02-12', '2021-02-14', 'Approved', '2021-02-09 20:05:07'),
(24, 'dans.cde@gmail.com', 'Web Development', 'Dhanshree', 'Family Function', '2021-02-16', '2021-02-18', 'Rejected', '2021-02-09 20:06:46'),
(25, 'dans.cde@gmail.com', 'Web Development', 'Dhanshree', 'Family Function', '2021-02-20', '2021-02-22', 'Rejected', '2021-02-09 20:07:18'),
(26, 'gita.cde@gmail.com', 'Web Development', 'Gita', 'Gate exam', '2021-02-19', '2021-02-24', 'Approved', '2021-02-14 13:47:07'),
(27, 'gita.cde@gmail.com', 'Web Development', 'gita', 'Gate exam', '2021-02-19', '2021-02-26', 'Approved', '2021-02-15 14:28:52'),
(28, 'neelakshi.cde@gmail.com', 'HR', 'neelakshi', 'Gate exam', '2021-02-13', '2021-02-20', 'on progress', '2021-02-15 14:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `poster` varchar(250) DEFAULT NULL,
  `posterimg` varchar(250) DEFAULT NULL,
  `link` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `start`, `end`, `status`, `poster`, `posterimg`, `link`) VALUES
(4, 'Technical Writing', '2020-12-16', '2021-02-11', 'Completed', NULL, 'WhatsApp Image 2021-02-14 at 7.28.47 PM.jpeg', NULL),
(8, 'postermaking', '2021-02-10', '2021-02-18', 'Active', NULL, 'e1.jpg', NULL),
(12, 'career advancement in technology', '2021-02-14', '2021-02-21', 'Active', NULL, 'WhatsApp Image 2021-02-14 at 7.28.47 PM.jpeg', NULL),
(13, 'https://forms.gle/8k6wrPrap7pscn9D7', '2021-02-12', '2021-02-12', 'Active', NULL, 'WhatsApp Image 2021-02-14 at 7.28.47 PM.jpeg', NULL),
(14, 'checking', '2021-02-11', '2021-02-20', 'Active', NULL, 'about.jpg', 'https://www.google.com/search?q=www.scholarships.gov.in&rlz=1C1CHBF_enIN911IN911&oq=www&aqs=chrome.2.69i60j69i57j35i39j69i60l5.4229j0j7&sourceid=chrome&ie=UTF-8'),
(15, 'txt', '2021-02-12', '2021-02-24', 'Active', NULL, 'features (6) (2).jpg', 'https://www.google.com/search?q=www.scholarships.gov.in&rlz=1C1CHBF_enIN911IN911&oq=www&aqs=chrome.2.69i60j69i57j35i39j69i60l5.4229j0j7&sourceid=chrome&ie=UTF-8');

-- --------------------------------------------------------

--
-- Table structure for table `internshipextend`
--

CREATE TABLE `internshipextend` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(70) NOT NULL,
  `extenddays` int(70) NOT NULL,
  `dept` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internshipextend`
--

INSERT INTO `internshipextend` (`id`, `email`, `name`, `extenddays`, `dept`) VALUES
(10, 'gita.cde@gmail.com', 'gita', 180, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dept` varchar(200) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `month` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `name`, `email`, `dept`, `amount`, `year`, `month`, `status`, `date`) VALUES
(1, '  ankit  ', 'ankit@gmail.com', 'Marketing', 1500, 2020, 'September', 'On Progress', '2021-01-12 15:35:53'),
(2, '  kanishk  ', 'kanishk@gmail.com', 'HR', 2100, 2021, 'January', 'Not Paid', '2021-01-12 16:30:24'),
(3, ' Riya ', 'riya.cde@gmail.com', 'Web Development', 2900, 2021, 'January', 'On Progress', '2021-01-13 13:40:05'),
(5, ' sanya ', 'sanya@gmail.com', 'Finance', 3500, 2019, 'July', 'Paid', '2021-01-12 16:26:31'),
(6, 'Shubham', 'shubham@gmail.com', 'Web Development', 1000, 2021, 'January', 'On Progress', '2021-01-12 16:43:57'),
(7, 'gita', 'gita.cde@gmail.com', 'Web Development', 5000, 2021, 'January', 'Paid', '2021-02-14 13:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `taskname` varchar(100) NOT NULL,
  `assdate` date NOT NULL,
  `deadline` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `email`, `name`, `dept`, `taskname`, `assdate`, `deadline`, `status`) VALUES
(2, 'shubham.cde@gmail.com', 'shubham', 'Web Development', 'blog project', '2021-01-01', '2021-01-02', 'completed'),
(4, 'amit.cde@gmail.com', ' amit ', 'Finance', 'Login System', '2020-02-15', '2020-02-17', 'Not Completed'),
(12, 'gita.cde@gmail.com', 'gita', 'Web Development', 'Ecommerce website', '2021-02-23', '2021-02-27', 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alogin`
--
ALTER TABLE `alogin`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curricular`
--
ALTER TABLE `curricular`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `internshipextend`
--
ALTER TABLE `internshipextend`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alogin`
--
ALTER TABLE `alogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `curricular`
--
ALTER TABLE `curricular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `internshipextend`
--
ALTER TABLE `internshipextend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
