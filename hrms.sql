-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 05:17 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `mobile_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `user_id`, `address`, `country`, `mobile_number`) VALUES
(1, 7, '13221 chegutu', 'zimbabwe', '0778795010'),
(2, 4, '30194 rifle range chegutu', 'zimbabwe', '0716161028');

-- --------------------------------------------------------

--
-- Table structure for table `emp_qualifications`
--

CREATE TABLE `emp_qualifications` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `highest_level` text NOT NULL,
  `year_graduated` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `docs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_qualifications`
--

INSERT INTO `emp_qualifications` (`id`, `user_id`, `highest_level`, `year_graduated`, `experience`, `docs`) VALUES
(2, 4, 'Ordinary Level', '2012', 'Above 2 Years', 'http://localhost/hrm/uploads/2018_08_26_16_10_Office_Lens3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `notice` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `description`, `notice`, `added`) VALUES
(2, 'article on cholera', 'please exercise cleanliness', '2018-10-28 07:34:52'),
(3, 'vbnm', 'qwerdtfyghjkl;''wsdnkml,;.''/#wertyuiop[]dfghjkl;''#ehjkl;''', '2018-10-28 07:54:06'),
(4, 'vbnmdfghjk', 'qwerdtfyghjkl;''wsdnkml,;.''/#wertyuiop[]dfghjkl;''#ehjkl;''', '2018-10-28 07:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `personal_detail`
--

CREATE TABLE `personal_detail` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `emp_role_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_detail`
--

INSERT INTO `personal_detail` (`id`, `user_id`, `emp_role_id`, `name`, `surname`, `username`, `gender`, `nationality`, `marital_status`, `dob`, `avatar`) VALUES
(2, 5, 2, 'tino lee', 'billiat', 'tbilliat26@yahoo.com', 'Male', 'zimbabwean', 'Married', '2018-10-01', 'http://localhost/hrm/uploads/1514(2)3.png'),
(3, 7, 2, 'lee', 'billiat', 'lee@gmail.com', 'Male', 'malawian', 'Single', '2018-10-17', 'http://localhost/hrm/uploads/1516(2).png'),
(4, 5, 2, 'tino lee', 'billiat', 'tbilliat26@yahoo.com', 'Male', 'zimbabwean', 'Divorced', '0000-00-00', 'http://localhost/hrm/uploads/2018_08_26_16_10_Office_Lens.jpg'),
(5, 4, 2, 'tinotenda lisrel', 'billiat', 'tbilliat26@gmail.com', 'Male', 'zimbabwean', 'Married', '2018-10-01', 'http://localhost/hrm/uploads/rat.png');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `notes` text NOT NULL,
  `assigned_to` text NOT NULL,
  `due_date` date NOT NULL,
  `priority` varchar(50) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `description`, `notes`, `assigned_to`, `due_date`, `priority`, `added`) VALUES
(1, 'article on cholera', 'causes\r\npictures\r\naffected areas\r\nwhat has been done ', 'Tinotenda Lisrel', '2018-10-31', 'urgent', '2018-10-25 07:23:39'),
(2, 'vbnm', 'fdghjk', 'deo', '2018-10-27', 'urgent', '2018-10-25 07:30:51'),
(3, 'article on cholera', 'gbnm', 'Tinotenda ', '2018-10-27', 'urgent', '2018-10-25 07:33:23'),
(4, 'wsdfghj', 'sdfghjkl', 'kuna', '2018-10-31', 'normal', '2018-10-28 07:58:16'),
(5, 'wsdfghj', 'sdfg', 'Tinotenda Lisrel', '2018-10-31', 'Choose Priority', '2018-10-28 08:01:28'),
(6, 'sdfghjkl;', 'sdfghjk', 'Tinotenda ', '2018-10-10', 'normal', '2018-10-30 16:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_role_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `user_role_id`) VALUES
(1, 'tyno', 'tyno@gmail.com', 'admin', 1),
(4, 'Tinotenda Lisrel', 'tbilliat26@gmail.com', 'longfella', 2),
(5, 'Tinotenda ', 'tbilliat26@yahoo.com', 'admin', 2),
(6, 'Tinotenda ', 't@yahoo.com', 'admin', 2),
(7, 'Tinotenda ', 'lee@gmail.com', 'longfella', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(50) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `work_done`
--

CREATE TABLE `work_done` (
  `id` int(11) NOT NULL,
  `task_name` text NOT NULL,
  `docs` text NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_done`
--

INSERT INTO `work_done` (`id`, `task_name`, `docs`, `date_uploaded`) VALUES
(1, 'map', 'http://localhost/hrm/uploads/1(2).png', '2018-10-29 10:55:06'),
(2, 'asdfghj', 'http://localhost/hrm/uploads/3.png', '2018-10-29 13:43:04'),
(3, 'ythgrfdsfdh', 'http://localhost/hrm/uploads/avatar92.jpg', '2018-10-30 16:12:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_qualifications`
--
ALTER TABLE `emp_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_detail`
--
ALTER TABLE `personal_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_done`
--
ALTER TABLE `work_done`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `emp_qualifications`
--
ALTER TABLE `emp_qualifications`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `personal_detail`
--
ALTER TABLE `personal_detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `work_done`
--
ALTER TABLE `work_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
