-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2020 pada 11.36
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_auth`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`) VALUES
(1, 'admin', '2020-03-23 19:53:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgotten_password_token` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `active` int(2) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(60) NOT NULL,
  `login_attemps` int(11) NOT NULL,
  `image` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `forgotten_password_token`, `forgotten_password_time`, `active`, `last_login`, `ip_address`, `login_attemps`, `image`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$11$TCd2EV0YPzdCZfQj3j7a2.Y/4rYw69CJQfBUojwbto6uPGjC95GqC', NULL, 1584945071, NULL, '2020-03-30 08:27:06', '::1', 2, 'default.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_on_role`
--

CREATE TABLE `users_on_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_on_role`
--

INSERT INTO `users_on_role` (`id`, `role_id`, `user_id`, `created_at`) VALUES
(1, 1, 1, '2020-03-23 19:22:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_on_role`
--
ALTER TABLE `users_on_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users_on_role`
--
ALTER TABLE `users_on_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
