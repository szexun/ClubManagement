-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2022 at 06:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp website`
--

-- --------------------------------------------------------

--
-- Table structure for table `club details`
--

CREATE TABLE `club details` (
  `id` int(11) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `club_description` varchar(1000) NOT NULL,
  `club_picture` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club details`
--

INSERT INTO `club details` (`id`, `club_name`, `club_description`, `club_picture`) VALUES
(1, 'Badminton', 'badminton is a racquet sport played using racquets to hit a shuttlecock across a net. Although it may be played with larger teams, the most common forms of the game are ', 'https://t4.ftcdn.net/jpg/03/09/65/31/360_F_309653162_nz53HXwSccR5xSEI6L7PNbAtmdCOSP15.jpg'),
(2, 'Basketball', 'Basketball is a team sport in which two teams, most commonly of five players each, opposing one another on a rectangular court, compete with the primary objective of shooting a basketball through the defender\'s hoop.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZNpm1MLjCRipUn8E1kjXfzJY8CTuauR1eEA&usqp=CAU'),
(3, 'Volleyball', 'Volleyball is a team sport in which two teams of six players are separated by a net. Each team tries to score points by grounding a ball on the other team\'s court under organized rules. It has been a part of the official program of the Summer Olympic Games since Tokyo 1964.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmLZ3VwsnG1FQYMRcXboaO5NxqCejJLHsYLQ&usqp=CAU'),
(4, 'Swimming', 'Swimming is an individual or team racing sport that requires the use of one\'s entire body to move through water. The sport takes place in pools or open water.', 'https://img.freepik.com/free-vector/swimming-logo-template_530822-189.jpg?w=2000');

-- --------------------------------------------------------

--
-- Table structure for table `event details`
--

CREATE TABLE `event details` (
  `eventID` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_picture` varchar(10000) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `approval` varchar(255) NOT NULL DEFAULT 'No Approve'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event details`
--

INSERT INTO `event details` (`eventID`, `event_name`, `event_picture`, `event_description`, `event_venue`, `event_date`, `club_name`, `approval`) VALUES
(1, 'Badminton Lesson', 'https://cdn4.vectorstock.com/i/1000x1000/86/33/badminton-poster-vector-4058633.jpg', 'This is a badminton lesson for all club members.', 'Stadium Bukit Jalil', '2022-05-26 12:47:00', 'Badminton', 'Approve'),
(2, 'Basketball 3 v 3', 'https://img.lovepik.com/free-template/01/65/02/484pIkbEsT6Bz.jpg_master.jpg!detail808', 'This is a basketball competition of 3 versus 3.', 'Stadium Bukit Jalil', '2022-05-30 12:30:00', 'Basketball', 'Approve'),
(3, 'Volleyball Lessons', 'https://i.pinimg.com/736x/2f/6e/21/2f6e21e60734a67a3dfe0e7ec2a944eb.jpg', 'This is a volleyball lesson to teach about volleyball.', 'Stadium Bukit Jalil', '2022-05-24 14:50:00', 'Volleyball', 'Approve'),
(4, 'Swimming Competition', 'https://en.pimg.jp/066/631/021/1/66631021.jpg', 'This is a swimming competition for all club members.', 'Stadium Bukit Jalil', '2022-05-26 12:49:00', 'Swimming', 'No Approve');

-- --------------------------------------------------------

--
-- Table structure for table `event participants`
--

CREATE TABLE `event participants` (
  `participantID` int(11) NOT NULL,
  `participantName` varchar(255) NOT NULL,
  `participantEmail` varchar(255) NOT NULL,
  `participantGender` varchar(255) NOT NULL,
  `eventID` int(11) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventPicture` varchar(10000) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event participants`
--

INSERT INTO `event participants` (`participantID`, `participantName`, `participantEmail`, `participantGender`, `eventID`, `eventName`, `eventPicture`, `userID`) VALUES
(1, 'test', 'test@gmail.com', 'male', 1, 'Badminton Lesson', 'https://cdn4.vectorstock.com/i/1000x1000/86/33/badminton-poster-vector-4058633.jpg', 3),
(2, 'test', 'test@gmail.com', 'male', 3, 'Volleyball Lessons', 'https://i.pinimg.com/736x/2f/6e/21/2f6e21e60734a67a3dfe0e7ec2a944eb.jpg', 3),
(3, 'szexun', 'sxunyung@gmail.com', 'male', 1, 'Badminton Lesson', 'https://cdn4.vectorstock.com/i/1000x1000/86/33/badminton-poster-vector-4058633.jpg', 4),
(4, 'szexun', 'sxunyung@gmail.com', 'male', 2, 'Basketball 3 v 3', 'https://img.lovepik.com/free-template/01/65/02/484pIkbEsT6Bz.jpg_master.jpg!detail808', 4),
(5, 'szexun', 'sxunyung@gmail.com', 'male', 3, 'Volleyball Lessons', 'https://i.pinimg.com/736x/2f/6e/21/2f6e21e60734a67a3dfe0e7ec2a944eb.jpg', 4),
(6, 'szexun', 'sxunyung@gmail.com', 'male', 4, 'Swimming Competition', 'https://en.pimg.jp/066/631/021/1/66631021.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackID` int(11) NOT NULL,
  `feedbackContent` varchar(1000) NOT NULL,
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `eventID` int(11) NOT NULL,
  `eventName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedbackID`, `feedbackContent`, `userID`, `userName`, `eventID`, `eventName`) VALUES
(1, 'Nice event', 3, 'test', 3, 'Volleyball Lessons'),
(2, 'Not bad', 3, 'test', 1, 'Badminton Lesson');

-- --------------------------------------------------------

--
-- Table structure for table `member list`
--

CREATE TABLE `member list` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_gender` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `club_picture` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member list`
--

INSERT INTO `member list` (`member_id`, `member_name`, `member_email`, `member_gender`, `user_id`, `club_id`, `club_name`, `club_picture`) VALUES
(1, 'test', 'test@gmail.com', 'male', 3, 1, 'Badminton', 'https://t4.ftcdn.net/jpg/03/09/65/31/360_F_309653162_nz53HXwSccR5xSEI6L7PNbAtmdCOSP15.jpg'),
(2, 'test', 'test@gmail.com', 'male', 3, 3, 'Volleyball', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmLZ3VwsnG1FQYMRcXboaO5NxqCejJLHsYLQ&usqp=CAU'),
(3, 'szexun', 'sxunyung@gmail.com', 'male', 4, 1, 'Badminton', 'https://t4.ftcdn.net/jpg/03/09/65/31/360_F_309653162_nz53HXwSccR5xSEI6L7PNbAtmdCOSP15.jpg'),
(4, 'szexun', 'sxunyung@gmail.com', 'male', 4, 2, 'Basketball', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZNpm1MLjCRipUn8E1kjXfzJY8CTuauR1eEA&usqp=CAU'),
(5, 'szexun', 'sxunyung@gmail.com', 'male', 4, 4, 'Swimming', 'https://img.freepik.com/free-vector/swimming-logo-template_530822-189.jpg?w=2000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `gender`, `user_role`) VALUES
(1, 'admin', 'pass', 'admin@gmail.com', 'male', 0),
(2, 'committee', 'committee', 'committee@gmail.com', 'female', 2),
(3, 'test', 'test', 'test@gmail.com', 'female', 1),
(4, 'szexun', 'szexun', 'sxunyung@gmail.com', 'male', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club details`
--
ALTER TABLE `club details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event details`
--
ALTER TABLE `event details`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `event participants`
--
ALTER TABLE `event participants`
  ADD PRIMARY KEY (`participantID`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `member list`
--
ALTER TABLE `member list`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club details`
--
ALTER TABLE `club details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event details`
--
ALTER TABLE `event details`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event participants`
--
ALTER TABLE `event participants`
  MODIFY `participantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member list`
--
ALTER TABLE `member list`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
