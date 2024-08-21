-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2024 pada 09.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `gambar_kelas` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `harga` decimal(10,2) DEFAULT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_toko`, `nama_kelas`, `gambar_kelas`, `created_at`, `harga`, `deskripsi`, `link`) VALUES
(8, 'EzCom', 'Graphic Desain', 'uploads/unsplash_csJt89dL9pE.jpg', '2024-08-19 01:40:16', 100000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/_A_Jpr9HkGA?si=2WeMG-Ji8EHczcsk'),
(13, 'Smart_Com', 'Pemrograman Dasar', 'uploads/unsplash_lYFERR5dTG4 (1).jpg', '2024-08-19 03:51:53', 100000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/fWjsdhR3z3c?si=8-MilsnyLXZmDyk-'),
(14, 'Creative Digital', 'UI/UX Designer', 'uploads/unsplash__xhZcNsqPhQ.jpg', '2024-08-19 07:23:29', 50000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/_A_Jpr9HkGA?si=2WeMG-Ji8EHczcsk'),
(15, 'Creative Studio', 'Guitar Tutorial', 'uploads/unsplash_2UuhMZEChdc.jpg', '2024-08-19 07:24:20', 100000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/3F8JlsOG2hE?si=odcHgnv6ef8wugg1'),
(16, 'Music_Co', 'Disc Jockey', 'uploads/unsplash_YrtFlrLo2DQ.jpg', '2024-08-19 07:25:00', 200000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/O-pdaMnOJBQ?si=JQBwRnF0tYKjYir3'),
(17, 'EzCom', 'Javascript', 'uploads/unsplash_lYFERR5dTG4.jpg', '2024-08-19 07:25:32', 50000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/fWjsdhR3z3c?si=8-MilsnyLXZmDyk-'),
(18, 'Smart Com', 'Color Grading', 'uploads/unsplash_4qmEVifU124.jpg', '2024-08-19 07:26:43', 50000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/K0Q5nfo2eeU?si=tJfA_MpjXbtIhPg-'),
(19, 'Smart_Music', 'Vocal Beginner', 'uploads/unsplash_Y20JJ_ddy9M.jpg', '2024-08-19 07:27:24', 50000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/3eT2NoTYwNA?si=M6r34I_tODpY1m2-'),
(20, 'EzCom', 'Pemrograman', 'uploads/unsplash_lYFERR5dTG4 (1).jpg', '2024-08-19 07:50:24', 500000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/fWjsdhR3z3c?si=8-MilsnyLXZmDyk-'),
(21, 'Smart_Com', 'Pemrograman Python', 'uploads/unsplash_lYFERR5dTG4.jpg', '2024-08-19 11:48:40', 500000.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://youtu.be/fWjsdhR3z3c?si=8-MilsnyLXZmDyk-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_beli`
--

CREATE TABLE `kelas_beli` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar_kelas` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nomor_akun` int(50) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas_beli`
--

INSERT INTO `kelas_beli` (`id`, `nama_toko`, `nama_kelas`, `harga`, `gambar_kelas`, `deskripsi`, `created_at`, `nomor_akun`, `nama_akun`, `link`) VALUES
(7, 'EzCom', 'Graphic Desain', 100000.00, 'uploads/unsplash_csJt89dL9pE.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-19 12:08:11', 2147483647, 'bejo', 'https://youtu.be/27MUp4RaHiw?si=f63rCp7mkdB0tV3W'),
(8, 'Smart Com', 'Color Grading', 50000.00, 'uploads/unsplash_4qmEVifU124.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-19 12:32:41', 2147483647, 'agus', 'https://youtu.be/K0Q5nfo2eeU?si=tJfA_MpjXbtIhPg-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'ezlearning', 'ezlearning@gmail.com', '$2y$10$v9w8xh/yKG0GMgBwoO4BfeM8Wk/xMHV3wLTCkoRrpoZbiVeTFqtjK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_beli`
--
ALTER TABLE `kelas_beli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kelas_beli`
--
ALTER TABLE `kelas_beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
