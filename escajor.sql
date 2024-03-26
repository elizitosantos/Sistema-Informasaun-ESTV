-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2022 pada 14.03
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escajor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `mestre_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `turma` varchar(25) NOT NULL,
  `naran_classe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `classe`
--

INSERT INTO `classe` (`id_classe`, `mestre_id`, `materia_id`, `turma`, `naran_classe`) VALUES
(5, 15, 7, 'D', '11 Ano'),
(6, 15, 7, 'A', '12 ano'),
(7, 15, 8, 'B', '10 Ano');

-- --------------------------------------------------------

--
-- Struktur dari tabel `estatuto_funcional`
--

CREATE TABLE `estatuto_funcional` (
  `id_estatuto_funcional` int(11) NOT NULL,
  `kodigu_esfuncional` varchar(15) NOT NULL,
  `naran_est_funcional` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `estatuto_funcional`
--

INSERT INTO `estatuto_funcional` (`id_estatuto_funcional`, `kodigu_esfuncional`, `naran_est_funcional`) VALUES
(8, 'P-24022189', 'Permanentes'),
(9, 'V-210419', 'volunatario');

-- --------------------------------------------------------

--
-- Struktur dari tabel `estudante`
--

CREATE TABLE `estudante` (
  `id` int(11) NOT NULL,
  `no_emis` int(15) NOT NULL,
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
-- Dumping data untuk tabel `estudante`
--

INSERT INTO `estudante` (`id`, `no_emis`, `naran_kompletu`, `sexo`, `data_moris`, `fatin_moris`, `pg_estudo_id`, `classe_id`, `turma`, `akademik_id`, `inan`, `aman`, `image`) VALUES
(45, 433541, 'Antonio', 'Mane', '2022-08-10', 'Aileu', 10, 5, 'A', 1, 'Domingas', 'Anto', '1661472520_fc17bb39fef90275db27.jpg'),
(46, 9484398, 'Afonso Pereira', 'Mane', '2022-08-15', 'Ainaru', 12, 5, 'C', 1, 'Franselina', 'Mariano', NULL),
(47, 9484398, 'Silvino', 'Mane', '0000-00-00', 'Aile', 10, 5, 'B', 1, 'Domingas de Jesus', 'Antonio Albano', NULL),
(48, 32323, 'Marfilho Alves', 'Mane', '2022-08-05', '', 12, 7, 'C', 3, 'Franselina', 'Anto', '1661473190_23ebfa674085af03de8f.png'),
(49, 1783627, 'Apeu Albano', 'Mane', '2022-08-20', 'Aile', 12, 5, 'A', 4, 'Domingas de Jesus', 'Antonio Albano', '1661473248_2d384bd752b12c8f062c.jpg'),
(50, 433541, 'Jona Santos', 'Feto', '0000-00-00', 'Aileu', 10, 6, 'A', 2, 'Domingas', 'Antonino', '1661473344_909f75fee8474bca08b7.jpg'),
(51, 243434, 'Afonso Pereira', 'Mane', '2022-08-09', 'Ainaru', 10, 6, 'A', 2, 'Joana de jesus', 'Mariano Silva', '1661473421_af9c21f993c7982f69e4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `naran_materia` varchar(50) NOT NULL,
  `id_pg_estudo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materia`
--

INSERT INTO `materia` (`id_materia`, `naran_materia`, `id_pg_estudo`) VALUES
(7, 'Geografia', 10),
(8, 'Biologia', 12),
(9, 'Fisiaka', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mestre`
--

CREATE TABLE `mestre` (
  `id_mestre` int(11) NOT NULL,
  `pmis` int(11) NOT NULL,
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
-- Dumping data untuk tabel `mestre`
--

INSERT INTO `mestre` (`id_mestre`, `pmis`, `naran_kompletu`, `sexo`, `data_moris`, `habilitasaun_literaria`, `estatuto_funcional_id`, `especialidade`, `data_inicio_ensino`, `image`) VALUES
(15, 7325656, 'Martino de Jesus', 'Mane', '2022-08-23', 'S1', 8, 'Tecnologia Multimedia', '2022-08-09', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-06-18-005419', 'App\\Database\\Migrations\\Authentication', 'default', 'App', 1662510981, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `programa_estudo`
--

CREATE TABLE `programa_estudo` (
  `id_pg` int(11) NOT NULL,
  `kode_pe` varchar(15) NOT NULL,
  `programa_estudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `programa_estudo`
--

INSERT INTO `programa_estudo` (`id_pg`, `kode_pe`, `programa_estudo`) VALUES
(10, 'CH', 'Ciencia Humanidades'),
(12, 'CT', 'Ciencia Tecnologia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tinan_akademik`
--

CREATE TABLE `tinan_akademik` (
  `id_akademik` int(11) NOT NULL,
  `tinan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tinan_akademik`
--

INSERT INTO `tinan_akademik` (`id_akademik`, `tinan`) VALUES
(1, 2019),
(2, 2020),
(3, 2021),
(4, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `salt` char(50) NOT NULL,
  `role` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `role`) VALUES
(6, 'admin12345', '7488e331b8b64e5794da3fa4eb10ad5d630ac84577dce5.54418885', '630ac84577dce5.54418885', 1),
(7, 'user12345', '80ec08504af83331911f5882349af59d630acd634e8779.48894517', '630acd634e8779.48894517', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `type`, `recovery_question`, `recovery_answer`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', '$2y$10$q4NPaZHpmX4GfkD91ZtHZueUNjJE97aB/cnQStfXqKUQBr4ArU44S', 1, 1, NULL, NULL, NULL, '2022-09-07 09:36:48', '2022-09-07 09:36:48'),
(2, 'Silvino de Jesus Albano', 'itsilvinoalbano@gmail.com', '$2y$10$QQL55FbUrePWkJoGkq/rFOHQOMSXyL3P1JOKRLHeoShS6biVP5Jqe', 1, 2, NULL, NULL, NULL, '2022-09-07 09:43:07', '2022-09-07 09:46:19'),
(3, 'admin', 'apeu@gmail.com', '0192023a7bbd73250516f069df18b500', 1, 1, 'admin', NULL, '2022-10-31 13:22:38', '2022-10-31 21:23:16', '2022-10-31 21:35:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `mestre_id` (`mestre_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indeks untuk tabel `estatuto_funcional`
--
ALTER TABLE `estatuto_funcional`
  ADD PRIMARY KEY (`id_estatuto_funcional`);

--
-- Indeks untuk tabel `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pg_estudo_id` (`pg_estudo_id`),
  ADD KEY `classe_id` (`classe_id`),
  ADD KEY `akademik_id` (`akademik_id`);

--
-- Indeks untuk tabel `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_pg_estudo` (`id_pg_estudo`);

--
-- Indeks untuk tabel `mestre`
--
ALTER TABLE `mestre`
  ADD PRIMARY KEY (`id_mestre`),
  ADD UNIQUE KEY `pmis` (`pmis`),
  ADD UNIQUE KEY `estatuto_funcional_id` (`estatuto_funcional_id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `programa_estudo`
--
ALTER TABLE `programa_estudo`
  ADD PRIMARY KEY (`id_pg`);

--
-- Indeks untuk tabel `tinan_akademik`
--
ALTER TABLE `tinan_akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `estatuto_funcional`
--
ALTER TABLE `estatuto_funcional`
  MODIFY `id_estatuto_funcional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `estudante`
--
ALTER TABLE `estudante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mestre`
--
ALTER TABLE `mestre`
  MODIFY `id_mestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `programa_estudo`
--
ALTER TABLE `programa_estudo`
  MODIFY `id_pg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tinan_akademik`
--
ALTER TABLE `tinan_akademik`
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `estudante`
--
ALTER TABLE `estudante`
  ADD CONSTRAINT `estudante_ibfk_1` FOREIGN KEY (`pg_estudo_id`) REFERENCES `programa_estudo` (`id_pg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudante_ibfk_2` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudante_ibfk_3` FOREIGN KEY (`akademik_id`) REFERENCES `tinan_akademik` (`id_akademik`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_pg_estudo`) REFERENCES `programa_estudo` (`id_pg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mestre`
--
ALTER TABLE `mestre`
  ADD CONSTRAINT `mestre_ibfk_1` FOREIGN KEY (`estatuto_funcional_id`) REFERENCES `estatuto_funcional` (`id_estatuto_funcional`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
