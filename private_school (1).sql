-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 08:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `private_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'test', '123');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassID` int(11) NOT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `RoomID` int(11) NOT NULL,
  `Schedule` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassID`, `CourseID`, `DoctorID`, `RoomID`, `Schedule`) VALUES
(2, 1, 2, 3, '2024-05-04T21:59');

-- --------------------------------------------------------

--
-- Table structure for table `contracttypes`
--

CREATE TABLE `contracttypes` (
  `ContractTypeID` int(11) NOT NULL,
  `ContractTypeName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contracttypes`
--

INSERT INTO `contracttypes` (`ContractTypeID`, `ContractTypeName`) VALUES
(1, 'hourly'),
(2, 'monthly');

-- --------------------------------------------------------

--
-- Table structure for table `courserates`
--

CREATE TABLE `courserates` (
  `RateID` int(11) NOT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `RateAmountPerHour` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courserates`
--

INSERT INTO `courserates` (`RateID`, `CourseID`, `RateAmountPerHour`) VALUES
(1, 1, '12.00'),
(4, 8, '234.00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(255) DEFAULT NULL,
  `CourseDescription` text DEFAULT NULL,
  `CreditHours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseName`, `CourseDescription`, `CreditHours`) VALUES
(1, 'hayssam', 'test course', 12),
(8, 'hayssamasdwqeqwe', 'qwe', 324);

-- --------------------------------------------------------

--
-- Table structure for table `doctorpayments`
--

CREATE TABLE `doctorpayments` (
  `PaymentID` int(11) NOT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `HoursTaught` decimal(5,2) DEFAULT NULL,
  `PaymentAmount` decimal(10,2) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorpayments`
--

INSERT INTO `doctorpayments` (`PaymentID`, `DoctorID`, `CourseID`, `HoursTaught`, `PaymentAmount`, `PaymentDate`, `paid`) VALUES
(1, 2, 1, '1.00', '0.00', '2024-05-08', 1),
(2, 2, 1, '100.00', '1200.00', '2024-05-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `ContractTypeID` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorID`, `FirstName`, `LastName`, `Email`, `Phone`, `Address`, `ContractTypeID`, `username`, `password`) VALUES
(2, 'Hayssam', 'al mawla', 'mawlahayssam411@gmail.com', '76834019', 'hamra', NULL, 'asd', '$2y$10$r2d7XpUI3wlpk89ybO3LcO3sfs490vGV2lr7BhHq5vEgB8V0pyQkK'),
(3, 'Hayssam', 'al mawla', 'mawlahayssam4111@gmail.com', '76834019', 'hamra', NULL, 'mawlahayssam4111@gmail.com', '$2y$10$mePYrii8DUNZIOXX0bRX/u70VaUKkwG0Fgoo71ZAAXwpo3Dniph6e');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `RoomID` int(11) NOT NULL,
  `RoomName` varchar(255) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`RoomID`, `RoomName`, `Capacity`) VALUES
(3, 'ads', 2);

-- --------------------------------------------------------

--
-- Table structure for table `studentbilling`
--

CREATE TABLE `studentbilling` (
  `BillingID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `HoursAttended` decimal(5,2) DEFAULT NULL,
  `AmountDue` decimal(10,2) DEFAULT NULL,
  `BillingDueDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentbilling`
--

INSERT INTO `studentbilling` (`BillingID`, `StudentID`, `CourseID`, `HoursAttended`, `AmountDue`, `BillingDueDate`) VALUES
(3, 2, 1, '1.00', '100.00', '2024-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `studentpayments`
--

CREATE TABLE `studentpayments` (
  `PaymentID` int(11) NOT NULL,
  `BillingID` int(11) DEFAULT NULL,
  `PaymentAmount` decimal(10,2) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentpayments`
--

INSERT INTO `studentpayments` (`PaymentID`, `BillingID`, `PaymentAmount`, `PaymentDate`) VALUES
(1, 3, '100.00', '2024-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `FirstName`, `LastName`, `Email`, `Phone`, `Address`, `username`, `password`) VALUES
(2, 'Hayssam', 'al mawla', 'mawlahayssam411@gmail.com', '76834019', 'hamra', 'mawlahayssam411@gmail.com', '$2y$10$eqCwIkf/ghnah874sXvR1e85X7.rFVvQuzkOgJN.77wDFyUlzx5u2');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(11) NOT NULL,
  `student_ID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `student_ID`, `ClassID`) VALUES
(2, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `contracttypes`
--
ALTER TABLE `contracttypes`
  ADD PRIMARY KEY (`ContractTypeID`);

--
-- Indexes for table `courserates`
--
ALTER TABLE `courserates`
  ADD PRIMARY KEY (`RateID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `doctorpayments`
--
ALTER TABLE `doctorpayments`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `studentbilling`
--
ALTER TABLE `studentbilling`
  ADD PRIMARY KEY (`BillingID`);

--
-- Indexes for table `studentpayments`
--
ALTER TABLE `studentpayments`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contracttypes`
--
ALTER TABLE `contracttypes`
  MODIFY `ContractTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courserates`
--
ALTER TABLE `courserates`
  MODIFY `RateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctorpayments`
--
ALTER TABLE `doctorpayments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentbilling`
--
ALTER TABLE `studentbilling`
  MODIFY `BillingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentpayments`
--
ALTER TABLE `studentpayments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
