-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 07:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `expertise` text NOT NULL,
  `occupation` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`_id`, `user_id`, `title`, `description`, `country`, `city`, `expertise`, `occupation`, `date`) VALUES
(7, 5, 'Ηλεκτρολόγος / Μηχανολόγος Μηχανικός', 'Ζητείται πτυχιούχος Ηλεκτρολόγος/ Μηχανολόγος Μηχανικός (ΑΕΙ/ΤΕΙ) από εταιρεία με έδρα στον Εύοσμο Θεσσαλονίκης και κύριο αντικείμενο τις μελέτες δικτύων διανομής και έργων ΑΠΕ για την Θεσσαλονίκη.', 'Greece', 'Θεσσαλονίκη', 'Ηλεκτρολόγος', 'full-time', '2021/06/15 06:20:05pm'),
(8, 5, 'Ζητείται Μάγειρας', 'Από εστιατόριο της Αθήνας ζητείται επαγγελματίας μάγειρας, με εμπειρία τουλάχιστον 5 χρόνια, σε όλα τα πόστα της κουζίνας και στο πόστο του ψήστη.', 'Greece', 'Αθήνα', 'Μάγειρας', 'full-time', '2021/06/15 06:21:42pm'),
(9, 2, 'Γραφίστρια (άριστη γνώση Coreldraw)', '• Δημιουργία Λογότυπου, μακέτας για έντυπο (κάρτα, φυλλάδιο, κατάλογος, αφίσα κλπ)\r\n• Μακέτα σε συστήματα διαφημιστικής προβολής όπως αυτοκίνητο, επιγραφή\r\n• Χειρισμός εκτυπωτικών μηχανημάτων', 'Greece', 'Πάτρα', 'Γραφίστας', 'part-time', '2021/06/15 06:25:10pm'),
(10, 2, 'Ζητείται Driver', 'Ζητείται Οδηγός Δ κατηγορίας Τουριστικού Λεωφορείου.\r\n\r\nΘέση μόνιμης εργασίας πλήρους απασχόλησης.\r\nлогистика', 'Greece', 'Λάρισα', 'Οδηγός Λεωφορείου', 'full-time', '2021/06/15 06:28:56pm');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`_id`, `country_id`, `name`) VALUES
(1, 1, 'Αθήνα'),
(2, 1, 'Θεσσαλονίκη'),
(3, 1, 'Πάτρα'),
(4, 1, 'Λάρισα'),
(5, 1, 'Βόλος'),
(6, 1, 'Σέρρες'),
(7, 1, 'Έδεσσα');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`_id`, `name`) VALUES
(1, 'Greece');

-- --------------------------------------------------------

--
-- Table structure for table `expertises`
--

CREATE TABLE `expertises` (
  `_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expertises`
--

INSERT INTO `expertises` (`_id`, `name`) VALUES
(1, 'Information technology'),
(2, 'Μάγειρας'),
(3, 'Ηλεκτρολόγος'),
(4, 'Μηχανικός Αυτοκινήτων'),
(5, 'Νοσηλευτής'),
(6, 'Τυπογράφος'),
(7, 'Οδηγός Λεωφορείου'),
(8, 'Γραφίστας');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `pwd` text NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `country` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `cv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `username`, `email`, `pwd`, `name`, `date`, `country`, `phoneNumber`, `cv`) VALUES
(2, 'george', 'george@gmail.com', '$2y$10$cLwzjgd2rcW44IYgnrYSLuDk6FWFtq9QPqxiQISJax6LvOdDMFzX6', 'GeorgeGiantsios', '2021-06-10', 'Greece', '6984565656', 'Well...'),
(5, 'aggelos', 'aggelos@gmail.com', '$2y$10$t2F8WJD4NQ4tMoJ..jT26Ow9KtZ5e70wZRfXWWbplpZR61Vr0x4Ry', 'AggelosMat', '2000-01-31', 'Greece', '6984578349', 'Έμπειρος χρήστης τηλακατευθηνόμενου πυραύλου.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `expertises`
--
ALTER TABLE `expertises`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adds`
--
ALTER TABLE `adds`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expertises`
--
ALTER TABLE `expertises`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
