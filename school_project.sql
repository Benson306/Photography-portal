-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 09:35 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_id` int(11) NOT NULL,
  `post_id` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bid_id`, `post_id`, `email`) VALUES
(1, '3', 'bnkimtai@gmail.com'),
(2, '3', 'abu@gmail.com'),
(3, '5', 'bnkimtai@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `c_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `phone_number` text NOT NULL,
  `address` text NOT NULL,
  `location` text NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`c_id`, `email`, `username`, `phone_number`, `address`, `location`, `image`) VALUES
(1, 'bnkimtai@gmail.com', 'Ben306', '0707357071', 'Kitale', 'Nairobi', 0x556e7469746c65642e706e67),
(2, 'abu1998@gmail.com', 'Abu1997', '0707357072', 'Kitale', 'Nairobi', 0x494d472d32303139303532342d5741303031342e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `client_users`
--

CREATE TABLE `client_users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_users`
--

INSERT INTO `client_users` (`id`, `email`, `username`, `password`) VALUES
(2, 'bnkimtai@gmail.com', 'Ben306', '$2y$10$gQrRwLU24psHZu7aAHBqSu9DFuS574z36Lc4T0zxy/MAayQBq9xP6'),
(3, 'abu1998@gmail.com', 'Abu1997', '$2y$10$/zYkLYuu1pLORlGKSA0X3OhPZPTK8lRqeOsRT/5iwfzVMcrDuy3AW');

-- --------------------------------------------------------

--
-- Table structure for table `photographer_details`
--

CREATE TABLE `photographer_details` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `p_type` text NOT NULL,
  `max_price` text NOT NULL,
  `phone_number` text NOT NULL,
  `address` text NOT NULL,
  `location` text NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographer_details`
--

INSERT INTO `photographer_details` (`id`, `email`, `name`, `p_type`, `max_price`, `phone_number`, `address`, `location`, `image`) VALUES
(10, 'benndiwa81@yahoo.com', 'Benson Ndiwa', 'Wildlife Photography', '2000', '0707357072', 'Nairobi', 'Nairobi', 0x494d472d32303139303532392d5741303031342e6a7067),
(11, 'mwalimu1@gmail.com', 'Benson Ndiwa beniee', 'Landscape Photography', '3000', '', 'Nairobi', 'Kitale', 0x494d472d32303139303532342d5741303031342e6a7067),
(12, 'bnkimtai@gmail.com', 'beniee', 'Landscape Photography', '1500', '0707357072', 'Kitale', 'Kitale', 0x70686f746f5f323032302d31312d31365f32312d33362d34362e6a7067),
(13, 'abu@gmail.com', 'beniee', 'Landscape Photography', '1600', '0707357072', 'Nairobi', 'Nairobi', 0x436170747572652e4a5047),
(14, 'mwash@gmail.com', 'mwash', 'Wildlife Photography', '1400', '0707357072', 'Nairobi', 'Kitale', 0x556e7469746c65642e706e67),
(15, 'abu1998@gmail.com', 'Abu1997', 'Landscape Photography', '1300', '0707357072', 'Kitale', 'Nairobi', 0x556e7469746c65642e706e67),
(17, 'beni@gmail.com', 'beni', 'Landscape Photography', '3700', '0707357072', 'Kitale', 'Nairobi', 0x6c6f676f372e706e67),
(18, 'raphile@gmail.com', 'raphile', 'Wildlife Photography', '3700', '0715439887', '0715439887', 'macha', 0x436170747572652e4a5047);

-- --------------------------------------------------------

--
-- Table structure for table `photographer_post`
--

CREATE TABLE `photographer_post` (
  `p_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `preview1` blob NOT NULL,
  `preview2` blob NOT NULL,
  `preview3` blob NOT NULL,
  `preview4` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographer_post`
--

INSERT INTO `photographer_post` (`p_id`, `email`, `preview1`, `preview2`, `preview3`, `preview4`) VALUES
(2, 'bnkimtai@gmail.com', 0x646f776e6c6f61642e6a7067, 0x6c6f676f372e706e67, 0x70686f746f5f323032302d31312d31365f32312d33362d34362e6a7067, 0x556e7469746c65642e706e67),
(3, 'mwalimu1@gmail.com', 0x494d472d32303139303532392d5741303031342e6a7067, 0x494d472d32303139303532392d5741303031342e6a7067, 0x494d472d32303139303532392d5741303031342e6a7067, 0x494d472d32303139303532392d5741303031342e6a7067),
(4, 'benndiwa81@yahoo.com', 0x494d472d32303139303532342d5741303031342e6a7067, 0x494d472d32303139303532392d5741303031342e6a7067, 0x494d472d32303139303532392d5741303031342e6a7067, 0x494d472d32303139303532342d5741303031342e6a7067),
(5, 'mwash@gmail.com', 0x6c6f676f2e504e47, 0x494d472d32303139303532392d5741303031342e6a7067, 0x6c6f676f372e706e67, 0x556e7469746c65642e706e67),
(6, 'abu@gmail.com', 0x6c6f676f2e504e47, 0x494d472d32303139303532342d5741303031342e6a7067, 0x6c6f676f2e504e47, 0x696d616765312e6a7067),
(7, 'raphile@gmail.com', 0x646f776e6c6f61642e6a7067, 0x3131363837323933395f3132333537393137323737363839395f333939303532373234323533303830323432315f6e2e6a7067, 0x6c6f676f372e706e67, 0x70686f746f5f323032302d31312d31365f32312d33362d34362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `photographer_users`
--

CREATE TABLE `photographer_users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographer_users`
--

INSERT INTO `photographer_users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(12, 'bnkimtai@gmail.com', 'Beniee', '$2y$10$0ZpbbqH6eJynyvHDQodv4.V19//Lr1JLhBPIcboHAKRR1M5koC8qm', '2020-03-11 23:07:12'),
(18, 'abu@gmail.com', 'abu', '$2y$10$LPbHjGojXrNDaUclVnIGjOez1pFQsDuEu37gq5BqLHNGzqIIt0NG6', '2020-03-12 00:45:38'),
(19, 'benndiwa81@yahoo.com', 'Benson Ndiwa', '$2y$10$ahrHMaiTxMWzof./ranJyOF6GLufNn/nrrLoDYH7S68jSsqtm9JdO', '2020-03-12 09:52:12'),
(20, 'benso@gmail.com', 'ben20', '$2y$10$OPb7hAhbQa82A6G8DnZZB.sE0c/nLjvBF/SyJjUIDRja1Ww.QMEn2', '2020-03-12 10:00:51'),
(21, 'mwalimu1@gmail.com', 'Benson Ndiwa beniee', '$2y$10$ZvIOR9ScfxDPdlbV5ZqdbOU0pOmnMlmXwWq38cK2kF7wUCal51Yvu', '2020-03-12 10:04:22'),
(22, 'mwash@gmail.com', 'mwash', '$2y$10$RYjqrp58awFEo54PauUx6eoj5b.0.PDQkAdqT7hHnP6yiEp6G1fYK', '2020-03-14 00:35:35'),
(23, 'abu1998@gmail.com', 'Abu1997', '$2y$10$EwtywjE.oywRKQUkJwE/Sey3WteixtjynDWF4BbrXM/WuVOtGP5NW', '2020-03-15 18:09:09'),
(24, 'beni@gmail.com', 'beni', '$2y$10$7WWGF6bgaFA0dhy6O5hziOq09.Mq5V7.ecQZqYBOIipXy8eBuWoee', '2020-03-15 18:43:01'),
(25, 'raphile@gmail.com', 'raphile', '$2y$10$SOTahbGhx5.AhjpN.9X6bei7IqWLW.1uSdhWvi3JYEBgCjk5.0tVe', '2020-11-27 15:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `job_name` text NOT NULL,
  `p_type` text NOT NULL,
  `phone_number` text NOT NULL,
  `description` text NOT NULL,
  `pricing` text NOT NULL,
  `deadline` date NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `email`, `job_name`, `p_type`, `phone_number`, `description`, `pricing`, `deadline`, `location`) VALUES
(3, 'bnkimtai@gmail.com', 'Outdoor', 'Landscape Photography', '0707357071', 'Well', '4000', '2020-03-27', 'Nairobi'),
(4, 'bnkimtai@gmail.com', 'Indoor', 'Wildlife Photography', '0707357071', 'good', '13000', '2020-03-27', 'Nairobi'),
(5, 'bnkimtai@gmail.com', 'Outdoor', 'Landscape Photography', '0707357071', 'well', '4000', '2020-10-02', 'Nairobi'),
(6, 'bnkimtai@gmail.com', 'it', 'Event Photography', '0707357071', 'opji', '4000', '2020-10-30', 'Kitale');

-- --------------------------------------------------------

--
-- Table structure for table `private_message`
--

CREATE TABLE `private_message` (
  `id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `time_sent` datetime NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `opened` enum('0','1') NOT NULL,
  `receipientDelete` enum('0','1') NOT NULL,
  `senderDelete` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `client_users`
--
ALTER TABLE `client_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photographer_details`
--
ALTER TABLE `photographer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photographer_post`
--
ALTER TABLE `photographer_post`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `photographer_users`
--
ALTER TABLE `photographer_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `private_message`
--
ALTER TABLE `private_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_users`
--
ALTER TABLE `client_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photographer_details`
--
ALTER TABLE `photographer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `photographer_post`
--
ALTER TABLE `photographer_post`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `photographer_users`
--
ALTER TABLE `photographer_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `private_message`
--
ALTER TABLE `private_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
