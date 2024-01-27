-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2024 pada 13.12
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bimbel`
--

CREATE TABLE `tb_bimbel` (
  `id_bimbel` int(11) NOT NULL,
  `nama_bimbel` varchar(150) NOT NULL,
  `cabang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bimbel`
--

INSERT INTO `tb_bimbel` (`id_bimbel`, `nama_bimbel`, `cabang`) VALUES
(1, 'Primalmagna', 'Jakpus'),
(4, 'Garudamedia', 'Jogja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id`, `nama_role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bimbel` int(11) NOT NULL,
  `nominal` float NOT NULL,
  `jatuh_tempo` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `id_bimbel` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'user.png',
  `is_active` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `username`, `password`, `nama_lengkap`, `id_bimbel`, `id_role`, `image`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$j1DUadXW3FpeYAtRab7YXOmxdQSETLN7Pvza/ay3P9CX0TFi4KBzm', 'admin', 1, 1, 'user.png', 1, NULL, NULL, NULL),
(2, 'member@gmail.com', 'member', '$2y$10$j1DUadXW3FpeYAtRab7YXOmxdQSETLN7Pvza/ay3P9CX0TFi4KBzm', 'member', 1, 2, 'user.png', 1, NULL, '2024-01-26 16:23:24', NULL),
(3, 'udin@admin.com', 'udin', '$2y$10$RNXfXRqlTb3vg2/l4CIEZ.iYRGa4MckAWGUMTJoS7E7WbGkg4Fjoq', 'udin', 1, 1, 'user.png', 1, '2024-01-26 17:09:08', '2024-01-27 12:09:47', '2024-01-27 12:09:47'),
(4, 'jono@jono.com', 'jono', '$2y$10$CHzM9JeZPQvj0S8usbIraeBvVaqIQhIn8/LZ.VIDjxyw8zmRJoLGS', 'jono', 1, 2, 'user.png', 1, '2024-01-27 12:31:10', '2024-01-27 12:31:10', NULL),
(5, 'edi@edi.com', 'edi', '$2y$10$QkFiVBsbpiSsTx5MKmMLVOH.M0IPTgsV5dRPgmY1wbLvuDxzFgP76', 'edi', 4, 2, 'user.png', 1, '2024-01-27 12:32:19', '2024-01-27 18:17:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bimbel`
--
ALTER TABLE `tb_bimbel`
  ADD PRIMARY KEY (`id_bimbel`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `spp_user` (`id_user`),
  ADD KEY `spp_bimbel` (`id_bimbel`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_bimbel` (`id_bimbel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bimbel`
--
ALTER TABLE `tb_bimbel`
  MODIFY `id_bimbel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD CONSTRAINT `spp_bimbel` FOREIGN KEY (`id_bimbel`) REFERENCES `tb_bimbel` (`id_bimbel`),
  ADD CONSTRAINT `spp_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_bimbel`) REFERENCES `tb_bimbel` (`id_bimbel`),
  ADD CONSTRAINT `user_role_id` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
