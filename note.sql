-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 22, 2024 at 08:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `note`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sno` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `title`, `description`, `date`) VALUES
(1, 'Study', 'You have to complete this project within 2 days', '2024-07-13 13:30:11'),
(2, 'Study for Math Exam', 'Review chapters 5 to 8 and complete practice problems. Focus on understanding key concepts and formulas, and take practice tests to gauge your readiness.\r\n', '2024-07-13 13:32:36'),
(3, 'Complete Science Project', 'Finalize the research and prepare the presentation for the science project. Ensure all experiments are documented, and create visual aids to support your findings.', '2024-07-13 13:32:53'),
(4, 'Group Study Session', 'Organize a study session with classmates to review for the upcoming physics test. Prepare a list of topics to cover and gather study materials to share with the group.', '2024-07-13 13:33:26'),
(5, 'hashshhshs', 'akjhsadhsadk;hsa', '2024-07-13 13:58:40'),
(6, 'Play Cricke', 'Cricket 07 in pc22222', '0000-00-00 00:00:00'),
(7, 'Play foot ball', 'Cricket 07ss', '0000-00-00 00:00:00'),
(9, 'Submit History Essay', 'Write and proofread the history essay on the topic of the Industrial Revolution. Make sure to include all required references and submit it by the due date.', '0000-00-00 00:00:00'),
(10, 'Submit History Essay', 'Write and proofread the history essay on the topic of the Industrial Revolution. Make sure to include all required references and submit it by the due date.', '0000-00-00 00:00:00'),
(11, 'Prepare for Oral Presentation', 'Create slides and practice for the oral presentation on the Civil War. Focus on key events and their impact, and prepare to answer potential questions.\r\n', '0000-00-00 00:00:00'),
(12, 'Attend Club Meeting', 'Join the weekly meeting of the Robotics Club. Participate in the discussion about the upcoming competition and contribute ideas for the project.', '0000-00-00 00:00:00'),
(13, 'Revise Literature Notes', 'Review and organize notes from literature class. Highlight important themes and prepare for the upcoming quiz on classic novels.', '0000-00-00 00:00:00'),
(15, 'Play with ball', 'I plays with bal', '0000-00-00 00:00:00'),
(17, 'HTML Structure', 'The script is wrapped in a basic HTML structure.', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
