SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `iek_usrs`
--
-- Table structure for table `usrs`
--

CREATE TABLE `usrs` (
  `id` int(11) NOT NULL,
  `usr` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usrs`
--

INSERT INTO `usrs` (`id`, `usr`, `pass`) VALUES
(1, 'admin', '$2y$10$Lhtq3SEROIFQE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usrs`
--
ALTER TABLE `usrs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usr` (`usr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usrs`
--
ALTER TABLE `usrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
