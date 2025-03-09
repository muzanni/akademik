-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2025 pada 19.17
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatan`
--

CREATE TABLE `angkatan` (
  `angkatan_id` int(11) NOT NULL,
  `angkatan_nama` varchar(255) NOT NULL,
  `angkatan_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angkatan`
--

INSERT INTO `angkatan` (`angkatan_id`, `angkatan_nama`, `angkatan_spp`) VALUES
(1, '2024/2025', 150000),
(3, '2005/2026', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `jurusan_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_nama`) VALUES
(1, 'Teknik Komputer Jaringan'),
(2, 'Desain Komunikasi Visual'),
(3, 'Akuntansi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(255) NOT NULL,
  `kelas_tingkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`, `kelas_tingkat`) VALUES
(1, '1 TKJ 1', 10),
(2, '1 TKJ 2', 10),
(3, '2 TKJ 1', 11),
(4, '2 TKJ 2', 11),
(5, '3 TKJ 1', 12),
(6, '3 TKJ 2', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `pembayaran_no` int(11) NOT NULL,
  `pembayaran_tanggal` date NOT NULL,
  `pembayaran_siswa` int(11) NOT NULL,
  `pembayaran_bulan` int(11) NOT NULL,
  `pembayaran_tahun` year(4) NOT NULL,
  `pembayaran_angkatan` int(11) NOT NULL,
  `pembayaran_kelas` int(11) NOT NULL,
  `pembayaran_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `pembayaran_no`, `pembayaran_tanggal`, `pembayaran_siswa`, `pembayaran_bulan`, `pembayaran_tahun`, `pembayaran_angkatan`, `pembayaran_kelas`, `pembayaran_jumlah`) VALUES
(1, 625626245, '2024-10-12', 3, 7, 2024, 1, 1, 150000),
(2, 1877889338, '2024-10-12', 3, 8, 2024, 1, 1, 150000),
(4, 2116129190, '2024-10-12', 3, 9, 2024, 1, 1, 150000),
(9, 1116593639, '2024-10-12', 11, 7, 2024, 1, 1, 150000),
(10, 1691883790, '2024-10-12', 11, 8, 2024, 1, 1, 150000),
(11, 2007299962, '2024-10-12', 11, 9, 2024, 1, 1, 150000),
(12, 391229281, '2024-10-12', 11, 10, 2024, 1, 1, 150000),
(13, 1305498203, '2024-10-12', 11, 11, 2024, 1, 1, 150000),
(14, 544027149, '2024-10-12', 11, 12, 2024, 1, 1, 150000),
(15, 548950186, '2024-10-12', 11, 1, 2025, 1, 1, 150000),
(16, 743826960, '2024-10-12', 11, 2, 2025, 1, 1, 150000),
(17, 2113368248, '2024-10-12', 11, 3, 2025, 1, 1, 150000),
(18, 122674195, '2024-10-12', 11, 4, 2025, 1, 1, 150000),
(19, 921320541, '2024-10-12', 11, 5, 2025, 1, 1, 150000),
(20, 2045031154, '2024-10-12', 11, 6, 2025, 1, 1, 150000),
(25, 465831813, '2024-10-16', 3, 10, 2024, 1, 1, 150000),
(26, 229872545, '2024-10-16', 3, 11, 2024, 1, 1, 150000),
(28, 1173979021, '2024-10-16', 3, 12, 2024, 1, 1, 150000),
(29, 2053308211, '2024-10-16', 3, 1, 2025, 1, 1, 150000),
(30, 1191736463, '2024-10-16', 3, 2, 2025, 1, 1, 150000),
(31, 719215856, '2024-10-16', 3, 3, 2025, 1, 1, 150000),
(32, 1152260917, '2024-10-16', 3, 4, 2025, 1, 1, 150000),
(33, 1183636603, '2024-10-16', 3, 5, 2025, 1, 1, 150000),
(34, 550697119, '2024-10-16', 3, 6, 2025, 1, 1, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setoran`
--

CREATE TABLE `setoran` (
  `setoran_id` int(11) NOT NULL,
  `setoran_tanggal` date NOT NULL,
  `setoran_siswa` int(11) NOT NULL,
  `setoran_bulan` int(11) NOT NULL,
  `setoran_tahun` year(4) NOT NULL,
  `setoran_angkatan` int(11) NOT NULL,
  `setoran_kelas` int(11) NOT NULL,
  `setoran_jumlah` int(11) NOT NULL,
  `setoran_status` int(11) NOT NULL,
  `setoran_bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setoran`
--

INSERT INTO `setoran` (`setoran_id`, `setoran_tanggal`, `setoran_siswa`, `setoran_bulan`, `setoran_tahun`, `setoran_angkatan`, `setoran_kelas`, `setoran_jumlah`, `setoran_status`, `setoran_bukti`) VALUES
(2, '2024-10-16', 3, 10, 2024, 1, 1, 150000, 2, '809ff4a50d75d263cb6360333993c28c.jpg'),
(5, '2024-10-16', 3, 11, 2024, 1, 1, 150000, 1, '1e436a77e7d426d30b4776937d9aaa22.jpg'),
(6, '2024-10-16', 3, 12, 2024, 1, 1, 150000, 2, 'd2bfa74eee63d25d55124bf49e35141f.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nama` varchar(255) NOT NULL,
  `siswa_nisn` varchar(20) NOT NULL,
  `siswa_jk` varchar(10) NOT NULL,
  `siswa_tgl_lahir` date NOT NULL,
  `siswa_tempat_lahir` varchar(50) NOT NULL,
  `siswa_angkatan` int(11) NOT NULL,
  `siswa_jurusan` int(11) NOT NULL,
  `siswa_kelas` int(11) NOT NULL,
  `siswa_agama` varchar(50) NOT NULL,
  `siswa_alamat` text NOT NULL,
  `siswa_hp` varchar(20) NOT NULL,
  `siswa_username` varchar(255) NOT NULL,
  `siswa_password` varchar(255) NOT NULL,
  `siswa_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nama`, `siswa_nisn`, `siswa_jk`, `siswa_tgl_lahir`, `siswa_tempat_lahir`, `siswa_angkatan`, `siswa_jurusan`, `siswa_kelas`, `siswa_agama`, `siswa_alamat`, `siswa_hp`, `siswa_username`, `siswa_password`, `siswa_status`) VALUES
(3, 'Siti Aminah', '1234567891', 'Perempuan', '2001-02-15', 'Jakarta', 3, 1, 3, 'Islam', 'Jl. Merdeka No.5', '081234567891', 'siswa1', 'bcd724d15cde8c47650fda962968f102', 'Aktif'),
(4, 'Ahmad Fauzan', '1234567892', 'Laki-laki', '2002-03-10', 'Surabaya', 1, 1, 1, 'Islam', 'Jl. Soekarno No.2', '081234567892', 'siswa2', 'bcd724d15cde8c47650fda962968f102', 'Aktif'),
(5, 'Maria Natalia', '1234567893', 'Perempuan', '2000-07-23', 'Yogyakarta', 1, 1, 1, 'Islam', 'Jl. Malioboro No.10', '081234567893', 'siswa3', 'bcd724d15cde8c47650fda962968f102', 'Aktif'),
(6, 'Budi Santoso', '1234567894', 'Laki-laki', '1999-11-12', 'Bandung', 1, 1, 1, 'Kristen', 'Jl. Pasteur No.6', '081234567894', 'siswa4', 'bcd724d15cde8c47650fda962968f102', 'Aktif'),
(7, 'Fitri Nurul', '1234567895', 'Perempuan', '2001-04-20', 'Semarang', 1, 1, 1, 'Islam', 'Jl. Pandanaran No.7', '081234567895', 'siswa5', 'bcd724d15cde8c47650fda962968f102', 'Aktif'),
(8, 'Teguh Prakoso', '1234567896', 'Laki-laki', '2002-09-14', 'Medan', 1, 1, 1, 'Islam', 'Jl. Gatot Subroto No.8', '081234567896', 'siswa6', 'bcd724d15cde8c47650fda962968f102', 'Aktif'),
(9, 'Lina Hartati', '1234567897', 'Perempuan', '2000-05-30', 'Bandar Lampung', 1, 1, 1, 'Buddha', 'Jl. Pahlawan No.3', '081234567897', 'siswa7', 'bcd724d15cde8c47650fda962968f102', 'Aktif'),
(10, 'Rian Saputra', '1234567898', 'Laki-laki', '2001-06-22', 'Makassar', 1, 1, 1, 'Islam', 'Jl. Pettarani No.9', '081234567898', 'siswa8', 'bcd724d15cde8c47650fda962968f102', 'Aktif'),
(11, 'Citra Dewi', '1234567899', 'Perempuan', '1999-08-05', 'Denpasar', 1, 1, 1, 'Islam', 'Jl. Legian No.4', '081234567899', 'siswa9', 'bcd724d15cde8c47650fda962968f102', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `sk_id` int(11) NOT NULL,
  `sk_angkatan` int(11) NOT NULL,
  `sk_siswa` int(11) NOT NULL,
  `sk_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`sk_id`, `sk_angkatan`, `sk_siswa`, `sk_kelas`) VALUES
(10, 1, 3, 1),
(11, 1, 4, 1),
(12, 1, 5, 1),
(13, 1, 6, 1),
(14, 1, 7, 1),
(15, 1, 8, 1),
(16, 1, 9, 1),
(17, 1, 10, 1),
(18, 1, 11, 1),
(20, 3, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_level` enum('Admin','Kepala Sekolah','Operator','') NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_level`, `admin_foto`) VALUES
(1, 'Ahmad Jhony', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', ''),
(11, 'Ipsa non cillum exc', 'admin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 'Kepala Sekolah', ''),
(14, 'Veniam earum exerci', 'admin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 'Kepala Sekolah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nuptk` varchar(11) NOT NULL,
  `nama_guru` varchar(40) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `status_nikah` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `gol_darah` varchar(5) NOT NULL,
  `tmt` date NOT NULL,
  `foto` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `tgl_pensiun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nuptk`, `nama_guru`, `gender`, `agama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `status_nikah`, `telepon`, `email`, `jabatan`, `gol_darah`, `tmt`, `foto`, `username`, `password`, `tgl_pensiun`) VALUES
(16, '12346', 'Anggit Nurochman, S.Pd, M.Pd.', 'L', 'Islam', 'Bantul', '2025-02-14', 'Peni Palbapang Bantul', 'M', '081324526787', 'anggit@gmail.com', 'ks', 'b', '2025-02-14', 'user28.png', '', '', '2085-02-14'),
(17, '-', 'Cahya Wijayati, S.Pd.', 'P', 'Islam', 'Bantul', '2025-02-14', 'Pundong Pundong Bantul', 'M', '081324526787', 'cahya@gmail.com', 'wk', 'o', '2025-02-14', 'user36.png', '', '', '2085-02-14'),
(18, '-', 'Endah Wuri Utami, S.Pd.', 'P', '0', 'Bantul', '2025-02-14', 'Celep Celep Bantul', 'M', '081324526787', 'endah@gmail.com', 'wh', 'o', '2025-02-14', 'user5.png', '', '', '0000-00-00'),
(19, '-', 'Tiva Kurnia Putri Indah Cahyani, S.Pd.', 'P', '0', 'Bantul', '2025-02-14', 'Punduhan Kretek Bantul', 'M', '081324526787', 'tiva@gmail.com', 'wki', 'o', '2025-02-14', 'user7.png', '', '', '0000-00-00'),
(20, '-', 'Farid Al Hadi, A.Md.', 'L', '0', 'Bantul', '2025-02-14', 'Gondangan Tirtohargo Kretek Bantul', 'M', '081324526787', 'farid@gmail.com', 'gm', 'o', '2025-02-14', 'user8.png', '', '', '0000-00-00'),
(21, '-', 'Riana Heri Pratiwi, S.Pd.', 'P', '0', 'Bantul', '2025-02-14', 'Blawong Imogiri', 'B', '081324526787', 'riana@gmail.com', 'gm', 'o', '2025-02-14', 'user9.png', '', '', '0000-00-00'),
(22, '-', 'Uning Suciasih, S.Pd.', 'P', '0', 'Bantul', '2025-02-14', 'Kretek Bantul', 'M', '081324526787', 'uning@gmail.com', 'gm', 'o', '2025-02-14', 'user10.png', '', '', '0000-00-00'),
(23, '-', 'Ariyanto, S.H.I', 'L', '0', 'Bantul', '2025-02-14', 'Mriyan Donotirto Kretek', 'M', '081324526787', 'ariyanto@gmail.com', 'gm', 'o', '2025-02-14', 'user11.png', '', '', '0000-00-00'),
(24, '-', 'Imalia Damayanti, S.H.', 'P', '0', 'Bantul', '2025-02-14', 'Palbapang Bantul', 'M', '081324526787', 'imalia@gmail.com', 'gm', 'o', '2025-02-14', 'user12.png', '', '', '0000-00-00'),
(25, '-', 'Awal Fitriyana, S.Pd.', 'L', '0', 'Bantul', '2025-02-14', 'Grogol 7 Parangtritis Kretek Bantul', 'M', '081324526787', 'awal@gmail.com', 'gm', 'o', '2025-02-14', 'user13.png', '', '', '0000-00-00'),
(28, '-', 'Nikma Syuh Baranti, S.Pd.', 'P', '0', 'Bantul', '2025-02-14', 'Kalinampu Seloharjo Pundong Bantul', 'M', '081324526787', 'nikma@gmai.com', 'gm', 'o', '2025-02-14', 'user22.png', '', '', '0000-00-00'),
(29, '20300987', 'Indra Setya Purwaka, S.Pd.', 'L', '0', 'Bantul', '2025-02-14', 'Kuwon Bambanglipuro', 'M', '09876543212', '22bimaandhika@gmail.com', 'gm', 'o', '2025-02-14', 'user23.png', '', '', '2085-02-14'),
(30, '-', 'Cindy Anjarwati, S.Pd.', 'P', 'Islam', 'Bantul', '2025-02-16', 'Kretek Bantul', 'M', '081324526787', 'cindy@gmail.com', 'gm', 'a', '2025-02-16', 'user37.png', '', '', '2085-02-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `id_tingkatan` int(5) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kd_kelas`, `nama_kelas`, `id_tingkatan`, `kd_jurusan`) VALUES
(1, 'X-AK', 'X Akuntansi', 1, 'AK'),
(2, 'X-RPL', 'X RPL', 1, 'RPL'),
(3, 'X-TSM', 'X TSM', 1, 'TSM'),
(4, 'XI-AK', 'XI Akuntansi', 2, 'AK'),
(5, 'XI-RPL', 'XI Rekayasa Perangkat Lunak', 2, 'RPL'),
(6, 'XI-TSM', 'XI Teknik Sepeda Motor', 2, 'TSM'),
(7, 'XII-AK', 'XII Akuntasi', 3, 'AK'),
(8, 'XII-RPL', 'XII Rekayasa Perangkat Lunak', 3, 'RPL'),
(9, 'XII-TSM', 'XII Teknik Sepeda Motor', 3, 'TSM'),
(10, 'Nobis ipsa', 'Eu optio qui accusa', 3, 'ksm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kurikulum`
--

CREATE TABLE `tbl_kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(30) NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kurikulum`
--

INSERT INTO `tbl_kurikulum` (`id_kurikulum`, `nama_kurikulum`, `is_aktif`) VALUES
(4, 'Merdeka', 'Y'),
(5, 'K13', 'N'),
(0, 'sdasd', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kurikulum_detail`
--

CREATE TABLE `tbl_kurikulum_detail` (
  `id_kurikulum_detail` int(11) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `kd_mapel` varchar(5) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kurikulum_detail`
--

INSERT INTO `tbl_kurikulum_detail` (`id_kurikulum_detail`, `id_kurikulum`, `kd_mapel`, `kd_jurusan`, `kd_tingkatan`) VALUES
(1, 1, 'BID1', 'IPA', '7'),
(2, 1, 'BID2', 'IPA', '8'),
(3, 1, 'BID3', 'IPA', '9'),
(4, 1, 'BIO1', 'IPA', '7'),
(5, 1, 'BIO2', 'IPA', '8'),
(6, 1, 'BIO3', 'IPA', '9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `kd_kelas` varchar(5) DEFAULT NULL,
  `kewarganegaraan` varchar(35) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `asal_sekolah` varchar(35) NOT NULL,
  `no_ijazah_smp` varchar(30) NOT NULL,
  `tgl_ijazah_smp` date NOT NULL,
  `lama_belajar` varchar(2) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `thn_masuk` year(4) NOT NULL,
  `thn_lulus` year(4) DEFAULT NULL,
  `no_ijazah_smk` varchar(35) DEFAULT NULL,
  `tgl_ijazah_smk` date DEFAULT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `agama_ayah` varchar(20) NOT NULL,
  `agama_ibu` varchar(20) NOT NULL,
  `pdk_ayah` varchar(5) NOT NULL,
  `pdk_ibu` varchar(5) NOT NULL,
  `kerja_ayah` varchar(25) NOT NULL,
  `kerja_ibu` varchar(25) NOT NULL,
  `hasil_ayah` varchar(15) NOT NULL,
  `hasil_ibu` varchar(15) NOT NULL,
  `alamat_ortu` varchar(50) NOT NULL,
  `status_ayah` varchar(20) NOT NULL,
  `status_ibu` varchar(20) NOT NULL,
  `status_siswa` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama`, `gender`, `tempat_lahir`, `tanggal_lahir`, `agama`, `foto`, `kd_kelas`, `kewarganegaraan`, `alamat`, `telepon`, `asal_sekolah`, `no_ijazah_smp`, `tgl_ijazah_smp`, `lama_belajar`, `tgl_diterima`, `thn_masuk`, `thn_lulus`, `no_ijazah_smk`, `tgl_ijazah_smk`, `nama_ayah`, `nama_ibu`, `tgl_lahir_ayah`, `tgl_lahir_ibu`, `agama_ayah`, `agama_ibu`, `pdk_ayah`, `pdk_ibu`, `kerja_ayah`, `kerja_ibu`, `hasil_ayah`, `hasil_ibu`, `alamat_ortu`, `status_ayah`, `status_ibu`, `status_siswa`) VALUES
(9, '1234', 'Sartono', 'L', 'Bantul', '2025-02-20', 'Islam', 'user68.png', NULL, 'indo', 'Kretek Bantul', '081324526787', 'smp', '123', '2025-02-20', '3', '2025-02-20', 2000, NULL, NULL, NULL, 'ayah', 'ibu', '2025-02-20', '2025-02-19', 'Islam', 'Islam', 'SD', 'SD', 'Petani', 'Petani', '1000', '1000', 'kretek', 'Masih Hidup', 'Masih Hidup', 'Akt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tingkatan_kelas`
--

CREATE TABLE `tbl_tingkatan_kelas` (
  `id_tingkatan` int(11) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL,
  `nama_tingkatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tingkatan_kelas`
--

INSERT INTO `tbl_tingkatan_kelas` (`id_tingkatan`, `kd_tingkatan`, `nama_tingkatan`) VALUES
(1, 'X', 'Sepuluh'),
(2, 'XI', 'Sebelas'),
(3, 'XII', 'Dua belas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`angkatan_id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `pembayaran_siswa` (`pembayaran_siswa`),
  ADD KEY `pembayaran_angkatan` (`pembayaran_angkatan`),
  ADD KEY `pembayaran_kelas` (`pembayaran_kelas`);

--
-- Indeks untuk tabel `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`setoran_id`),
  ADD KEY `setoran_siswa` (`setoran_siswa`),
  ADD KEY `setoran_angkatan` (`setoran_angkatan`),
  ADD KEY `setoran_kelas` (`setoran_kelas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `siswa_jurusan` (`siswa_jurusan`),
  ADD KEY `siswa_angkatan` (`siswa_angkatan`),
  ADD KEY `siswa_kelas` (`siswa_kelas`);

--
-- Indeks untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`sk_id`),
  ADD KEY `sk_angkatan` (`sk_angkatan`),
  ADD KEY `sk_siswa` (`sk_siswa`),
  ADD KEY `sk_kelas` (`sk_kelas`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_id_tingkatan` (`id_tingkatan`);

--
-- Indeks untuk tabel `tbl_tingkatan_kelas`
--
ALTER TABLE `tbl_tingkatan_kelas`
  ADD PRIMARY KEY (`id_tingkatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `angkatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `setoran`
--
ALTER TABLE `setoran`
  MODIFY `setoran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `sk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_tingkatan_kelas`
--
ALTER TABLE `tbl_tingkatan_kelas`
  MODIFY `id_tingkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`pembayaran_siswa`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`pembayaran_angkatan`) REFERENCES `angkatan` (`angkatan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`pembayaran_kelas`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `setoran`
--
ALTER TABLE `setoran`
  ADD CONSTRAINT `setoran_ibfk_1` FOREIGN KEY (`setoran_siswa`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `setoran_ibfk_2` FOREIGN KEY (`setoran_angkatan`) REFERENCES `angkatan` (`angkatan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `setoran_ibfk_3` FOREIGN KEY (`setoran_kelas`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`siswa_jurusan`) REFERENCES `jurusan` (`jurusan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`siswa_angkatan`) REFERENCES `angkatan` (`angkatan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_4` FOREIGN KEY (`siswa_kelas`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD CONSTRAINT `siswa_kelas_ibfk_1` FOREIGN KEY (`sk_angkatan`) REFERENCES `angkatan` (`angkatan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_kelas_ibfk_2` FOREIGN KEY (`sk_siswa`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_kelas_ibfk_3` FOREIGN KEY (`sk_kelas`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD CONSTRAINT `fk_id_tingkatan` FOREIGN KEY (`id_tingkatan`) REFERENCES `tbl_tingkatan_kelas` (`id_tingkatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
