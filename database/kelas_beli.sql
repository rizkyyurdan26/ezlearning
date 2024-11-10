-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2024 pada 07.18
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
(8, 'Smart Com', 'Color Grading', 50000.00, 'uploads/unsplash_4qmEVifU124.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-19 12:32:41', 2147483647, 'agus', 'https://youtu.be/K0Q5nfo2eeU?si=tJfA_MpjXbtIhPg-'),
(11, 'Smart Com', 'Color Grading', 50000.00, 'uploads/unsplash_4qmEVifU124.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-21 09:28:08', 2147483647, 'nana', 'https://youtu.be/K0Q5nfo2eeU?si=tJfA_MpjXbtIhPg-'),
(12, 'Creative Digital', 'UI/UX Designer', 50000.00, 'uploads/unsplash__xhZcNsqPhQ.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-21 09:28:45', 2147483647, 'bejo', 'https://youtu.be/_A_Jpr9HkGA?si=2WeMG-Ji8EHczcsk'),
(13, 'Smart Com', 'Color Grading', 50000.00, 'uploads/unsplash_4qmEVifU124.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-21 09:43:39', 2147483647, 'nana', 'https://youtu.be/K0Q5nfo2eeU?si=tJfA_MpjXbtIhPg-'),
(14, 'Smart_Music', 'Vocal Beginner', 50000.00, 'uploads/unsplash_Y20JJ_ddy9M.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-21 10:00:42', 2147483647, 'agus', 'https://youtu.be/3eT2NoTYwNA?si=M6r34I_tODpY1m2-'),
(15, 'Smart_Music', 'Vocal Beginner', 50000.00, 'uploads/unsplash_Y20JJ_ddy9M.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-24 04:41:57', 2147483647, 'nana', 'https://youtu.be/3eT2NoTYwNA?si=M6r34I_tODpY1m2-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas_beli`
--
ALTER TABLE `kelas_beli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas_beli`
--
ALTER TABLE `kelas_beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
