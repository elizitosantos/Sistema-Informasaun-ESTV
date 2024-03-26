-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 01:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `mestre_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `turma` varchar(25) NOT NULL,
  `naran_classe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id_classe`, `mestre_id`, `materia_id`, `turma`, `naran_classe`) VALUES
(5, 15, 7, 'D', '11 Ano'),
(6, 15, 8, 'B', '10 Ano'),
(7, 15, 7, 'C', '12 ano');

-- --------------------------------------------------------

--
-- Table structure for table `estatuto_funcional`
--

CREATE TABLE `estatuto_funcional` (
  `id_estatuto_funcional` int(11) NOT NULL,
  `kodigu_esfuncional` varchar(15) NOT NULL,
  `naran_est_funcional` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estatuto_funcional`
--

INSERT INTO `estatuto_funcional` (`id_estatuto_funcional`, `kodigu_esfuncional`, `naran_est_funcional`) VALUES
(8, 'P-24022189', 'Permanentes'),
(10, 'V-23052017', 'Voluntariu');

-- --------------------------------------------------------

--
-- Table structure for table `estudante`
--

CREATE TABLE `estudante` (
  `id` int(11) NOT NULL,
  `no_emis` int(6) NOT NULL,
  `naran_kompletu` varchar(50) NOT NULL,
  `sexo` enum('Mane','Feto') NOT NULL,
  `data_moris` date NOT NULL,
  `fatin_moris` varchar(25) NOT NULL,
  `pg_estudo_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `turma` varchar(10) NOT NULL,
  `akademik_id` int(4) NOT NULL,
  `inan` varchar(50) NOT NULL,
  `aman` varchar(50) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estudante`
--

INSERT INTO `estudante` (`id`, `no_emis`, `naran_kompletu`, `sexo`, `data_moris`, `fatin_moris`, `pg_estudo_id`, `classe_id`, `turma`, `akademik_id`, `inan`, `aman`, `image`) VALUES
(45, 3234, 'Martino Albano', 'Mane', '2022-08-23', 'Remexio', 10, 5, 'A', 2, 'Ana Maculada', 'Joao Afonso', '1661432497_86f71cc087c9e548ae69.jpg'),
(46, 3432, 'Silvino', 'Mane', '2022-08-17', 'Remexio', 10, 5, 'A', 3, 'Domigas de Jesus', 'Antonio Albano', '1661693021_b63eca1412b75154dfd4.png'),
(47, 343221, 'Asamu de Jesu', 'Mane', '2022-09-12', 'Remexio', 10, 7, 'A', 2, 'Zelia da Costa', 'Abilio de Jesus', '1662742653_c19288345f6d1ba61014.jpg'),
(48, 8213, 'Adrianos', 'Mane', '2022-08-24', 'Remexio', 10, 5, 'B', 2, 'Domigas de Jesus', 'Joao Afonso', '1662200173_c55b3687a804f342616f.jpg'),
(49, 323490, 'Joana', 'Feto', '2022-09-19', 'Remexio', 10, 5, 'A', 2, 'Ana', 'Joao Afonso', '1662296299_9c2764bfe46d01d92d71.jpg'),
(50, 325, 'Adrianos', 'Feto', '2022-09-20', 'Remexio', 10, 5, 'C', 4, 'Domigas de Jesus', 'Antonio Albano', '1662425068_15927a3efd59639d51a4.jpg'),
(51, 3432, 'Silvino', 'Mane', '2022-09-19', 'Remexio', 12, 5, 'A', 1, 'Domigas de Jesus', 'Joao Afonso', '1662743076_5ec0745041af127a3ec8.jpg'),
(52, 12411, 'Mario Joseferino', 'Mane', '2022-10-06', 'Manatutu Vila', 10, 5, 'C', 2, 'Ana', 'Joao Afonso', '1662743026_b4da86764be1127099d4.jpg'),
(53, 534541, 'Joana Sarmento', 'Feto', '2022-09-01', 'Manatutu Vila', 12, 7, 'B', 4, 'Josefa Soares', 'Manuel Costa', '1662742975_729926b9291fcd6500a5.jpg'),
(54, 895480, 'Ana MAria', 'Feto', '2022-09-28', 'Aleu vila', 10, 5, 'A', 1, 'Nana Da Costa', 'Januario Boavida', '1662742903_772f9520c5637e913b0d.jpg'),
(55, 325213, 'Teresa Saldanhaa', 'Feto', '2022-09-21', 'Remexio', 12, 5, 'C', 1, 'Mariana ', 'Alexandre', '1662742828_9567e2fe3552fd436a16.png'),
(56, 854957, 'Mariana Soares', 'Feto', '2022-09-15', 'Remexio', 12, 6, 'B', 3, 'Maia de Jesus', 'Agosto Berleto', '1662742758_11573ce740f1b3d4500e.png'),
(57, 854957, 'Silvino Soares', 'Mane', '2022-09-29', 'Remexio', 10, 7, 'B', 3, 'Domigas de Jesus', 'Antonio Albano', '1662742695_57084ff79712e56abdfe.jpg'),
(58, 854984, 'Abraun da Costa', 'Mane', '2022-09-06', '', 10, 5, 'B', 1, '', '', '1662741618_41cfd7dcac249b4d56de.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `naran_materia` varchar(50) NOT NULL,
  `id_pg_estudo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id_materia`, `naran_materia`, `id_pg_estudo`) VALUES
(7, 'Geografia', 10),
(8, 'Biologia', 12),
(9, 'Fisiaka', 12);

-- --------------------------------------------------------

--
-- Table structure for table `mestre`
--

CREATE TABLE `mestre` (
  `id_mestre` int(11) NOT NULL,
  `pmis` varchar(7) NOT NULL,
  `naran_kompletu` varchar(50) NOT NULL,
  `sexo` enum('Mane','Feto') NOT NULL,
  `data_moris` date NOT NULL,
  `habilitasaun_literaria` varchar(50) NOT NULL,
  `estatuto_funcional_id` int(11) NOT NULL,
  `especialidade` varchar(50) NOT NULL,
  `data_inicio_ensino` date NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mestre`
--

INSERT INTO `mestre` (`id_mestre`, `pmis`, `naran_kompletu`, `sexo`, `data_moris`, `habilitasaun_literaria`, `estatuto_funcional_id`, `especialidade`, `data_inicio_ensino`, `image`) VALUES
(15, '7325656', 'Martino de Jesus', 'Mane', '2022-08-23', 'S1', 8, 'Tecnologia Multimedia', '2022-08-09', ''),
(20, '45679-1', 'Quintaun Tilman', 'Mane', '2022-09-28', 'Licenciatura Eng', 10, 'Matematica', '2022-09-27', ''),
(27, '12345-6', 'Joao Tilman', 'Mane', '0000-00-00', 'Licenciadu', 8, 'Fisica', '2022-09-13', ''),
(28, '7568-9', 'Joao Da Costa', 'Mane', '2022-08-31', 'S1', 8, 'Matematica', '2022-09-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `programa_estudo`
--

CREATE TABLE `programa_estudo` (
  `id_pg` int(11) NOT NULL,
  `kode_pe` varchar(15) NOT NULL,
  `programa_estudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programa_estudo`
--

INSERT INTO `programa_estudo` (`id_pg`, `kode_pe`, `programa_estudo`) VALUES
(10, 'CH', 'Ciencia Humanidades'),
(12, 'CT', 'Ciencia Tecnologia');

-- --------------------------------------------------------

--
-- Table structure for table `tinan_akademik`
--

CREATE TABLE `tinan_akademik` (
  `id_akademik` int(11) NOT NULL,
  `tinan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinan_akademik`
--

INSERT INTO `tinan_akademik` (`id_akademik`, `tinan`) VALUES
(1, 2019),
(2, 2020),
(3, 2021),
(4, 2022),
(5, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `type` tinyint(1) NOT NULL,
  `recovery_question` text DEFAULT NULL,
  `recovery_answer` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `type`, `recovery_question`, `recovery_answer`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', '$2y$10$q4NPaZHpmX4GfkD91ZtHZueUNjJE97aB/cnQStfXqKUQBr4ArU44S', 1, 1, NULL, NULL, NULL, '2022-09-07 09:36:48', '2022-09-07 09:36:48'),
(2, 'Silvino de Jesus Albano', 'itsilvinoalbano@gmail.com', '$2y$10$QQL55FbUrePWkJoGkq/rFOHQOMSXyL3P1JOKRLHeoShS6biVP5Jqe', 1, 2, NULL, NULL, NULL, '2022-09-07 09:43:07', '2022-09-07 09:46:19'),
(3, 'Asala', 'asala@gmail.com', '$2y$10$Uj5vz2kaqyJzAaKjuLW9UORHF6Kyt9Y0lJIi0TUP8Y7xEpZH8TwoW', 1, 2, NULL, NULL, NULL, '2022-09-08 00:09:56', '2022-09-08 00:33:08'),
(4, 'Asamu da Costa', 'asamu@gmail.com', '$2y$10$T4SzU3g5tqhki1NXP6LRDuKls.ZJ81IzGcVbZc9jXIulOlER1wxCm', 0, 2, NULL, NULL, NULL, '2022-09-08 00:15:03', '2022-09-08 00:15:03'),
(5, 'MArio Joseferino', 'mario@gmail.com', '$2y$10$DFR3KLZm.UzeKkR6K67I1OKpL7EQRjPsMPG/fsRZOwCmH3jdQEzTe', 2, 2, NULL, NULL, NULL, '2022-09-08 00:27:07', '2022-09-08 01:49:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `mestre_id` (`mestre_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indexes for table `estatuto_funcional`
--
ALTER TABLE `estatuto_funcional`
  ADD PRIMARY KEY (`id_estatuto_funcional`);

--
-- Indexes for table `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pg_estudo_id` (`pg_estudo_id`),
  ADD KEY `classe_id` (`classe_id`),
  ADD KEY `akademik_id` (`akademik_id`),
  ADD KEY `no_emis` (`no_emis`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_pg_estudo` (`id_pg_estudo`);

--
-- Indexes for table `mestre`
--
ALTER TABLE `mestre`
  ADD PRIMARY KEY (`id_mestre`),
  ADD UNIQUE KEY `pmis` (`pmis`),
  ADD KEY `estatuto_funcional_id` (`estatuto_funcional_id`);

--
-- Indexes for table `programa_estudo`
--
ALTER TABLE `programa_estudo`
  ADD PRIMARY KEY (`id_pg`);

--
-- Indexes for table `tinan_akademik`
--
ALTER TABLE `tinan_akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `estatuto_funcional`
--
ALTER TABLE `estatuto_funcional`
  MODIFY `id_estatuto_funcional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `estudante`
--
ALTER TABLE `estudante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mestre`
--
ALTER TABLE `mestre`
  MODIFY `id_mestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `programa_estudo`
--
ALTER TABLE `programa_estudo`
  MODIFY `id_pg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tinan_akademik`
--
ALTER TABLE `tinan_akademik`
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estudante`
--
ALTER TABLE `estudante`
  ADD CONSTRAINT `estudante_ibfk_1` FOREIGN KEY (`pg_estudo_id`) REFERENCES `programa_estudo` (`id_pg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudante_ibfk_2` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudante_ibfk_3` FOREIGN KEY (`akademik_id`) REFERENCES `tinan_akademik` (`id_akademik`) ON DELETE NO ACTION;

--
-- Constraints for table `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_pg_estudo`) REFERENCES `programa_estudo` (`id_pg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mestre`
--
ALTER TABLE `mestre`
  ADD CONSTRAINT `mestre_ibfk_1` FOREIGN KEY (`estatuto_funcional_id`) REFERENCES `estatuto_funcional` (`id_estatuto_funcional`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
