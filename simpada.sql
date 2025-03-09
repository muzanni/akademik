-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2025 pada 19.18
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
-- Database: `simpada`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_menu`
--

INSERT INTO `tabel_menu` (`id`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'Data Siswa', 'siswa', 'fa fa-users', 0),
(2, 'Data Guru', 'guru', 'fa fa-user-circle', 0),
(3, 'Data Master', '#', 'fa fa-bars', 0),
(4, 'Mata Pelajaran', 'mapel', 'fa fa-book', 3),
(5, 'Ruangan Kelas', 'ruangan', 'fa fa-building', 3),
(6, 'Tingkatan Kelas', 'tingkatan', 'fa fa-sitemap', 3),
(7, 'Jurusan', 'jurusan', 'fa fa-th-large', 3),
(8, 'Tahun Akademik', 'tahunakademik', 'fa fa-calendar-check-o', 3),
(9, 'Kelas', 'kelas', 'fa fa-cubes', 3),
(10, 'Kurikulum', 'kurikulum', 'fa fa-list', 3),
(11, 'Jadwal Pelajaran', 'jadwal', 'fa fa-calendar-plus-o', 0),
(12, 'Peserta Didik', 'siswa/siswa_aktif', 'fa fa-users', 0),
(13, 'Walikelas', 'walikelas', 'fa fa-user-plus', 0),
(14, 'Pengguna Sistem', 'user', 'fa fa-id-badge', 0),
(15, 'Menu', 'menu', 'fa fa-list', 0),
(16, 'Form Pembayaran', 'pembayaran', 'fa fa-dollar', 0),
(17, 'Nilai', 'nilai', 'fa fa-archive', 0),
(18, 'Laporan Nilai', 'laporan_nilai', 'fa fa-file-pdf-o', 0),
(19, 'Data Karyawan', 'karyawan', 'fa fa-user-circle', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aset`
--

CREATE TABLE `tbl_aset` (
  `id_aset` int(11) NOT NULL,
  `kd_aset` varchar(50) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jumlah` int(2) NOT NULL,
  `harga` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `kondisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `kd_kk` varchar(5) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `kd_mapel` varchar(5) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `kd_ruangan` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_tahun_akademik`, `semester`, `kd_kk`, `kd_tingkatan`, `kd_kelas`, `kd_mapel`, `id_guru`, `jam`, `kd_ruangan`, `hari`) VALUES
(13, 11, 'Genap', 'AK', 'X', 'X-AK', 'BID-1', 17, '07.00', 'R2', 'Senin'),
(14, 11, 'Genap', 'AK', 'X', 'X-AK', 'BID-1', 17, '07.00', 'R2', 'Selasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nuptk` varchar(11) NOT NULL,
  `nama_karyawan` varchar(40) NOT NULL,
  `gender` enum('P','L') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status_nikah` enum('M','B') NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `gol_darah` varchar(5) NOT NULL,
  `tmt` date NOT NULL,
  `foto` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nuptk`, `nama_karyawan`, `gender`, `tempat_lahir`, `tgl_lahir`, `alamat`, `status_nikah`, `telepon`, `email`, `jabatan`, `gol_darah`, `tmt`, `foto`, `username`, `password`) VALUES
(3, '20300988', 'Winardi', 'L', 'Bantul', '1990-02-13', 'Semampir Srihardono Pundong Bantul', 'M', '09876543212', '22bimaandhika@gmail.com', 'bend', 'o', '2025-02-13', '294412978_718061129611160_4514876272077277002_n-removebg-preview.png', '', ''),
(4, '-', 'Ditta Permatasari, S.Kom.', 'P', 'Bantul', '2025-02-14', 'Kretek Bantul', 'B', '081324526787', 'ditta@gmail.com', 'ktu', 'o', '2025-02-14', 'user16.png', '', ''),
(5, '-', 'Min Kurniati, A.Md.', 'L', 'Bantul', '2025-02-14', 'Gadingharjo Donotirto Kretek Bantul', 'M', '081324526787', 'minkurniati@gmailcom', 'peg', 'o', '2025-02-14', 'user17.png', '', ''),
(6, '-', 'Sukamsiyah, S.Pd.', 'P', 'Bantul', '2025-02-14', 'Jelapan Seloharjo Pundong Bantul', 'M', '081324526787', 'sukamsiyah@gmai.com', 'peg', 'o', '2025-02-14', 'user18.png', '', ''),
(7, '-', 'Kiswanto', 'L', 'Bantul', '2025-02-14', 'Mersan Donotirto Kretek Bantul', 'B', '081324526787', 'kiswanto@gmail.com', 'ksr', 'o', '2025-02-14', 'user19.png', '', ''),
(8, '-', 'Kastowo', 'L', 'Bantul', '2025-02-14', 'Mersan Donotirto Kretek Bantul', 'M', '081324526787', 'kastowo@gmail.com', 'peg', 'o', '2025-02-14', 'user20.png', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kd_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kd_kelas`, `nama_kelas`, `kd_tingkatan`, `kd_jurusan`) VALUES
('X-AK', 'X Akuntansi', 'X', 'AK'),
('X-RPL', 'X RPL', 'X', 'RPL'),
('X-TSM', 'X TSM', 'X', 'TSM'),
('XI-AK', 'XI Akuntansi', 'XI', 'AK'),
('XI-RPL', 'XI Rekayasa Perangkat Lunak', 'XI', 'RPL'),
('XI-TSM', 'XI Teknik Sepeda Motor', 'XI', 'TSM'),
('XII-AK', 'XII Akuntasi', 'XII', 'AK'),
('XII-RPL', 'XII Rekayasa Perangkat Lunak', 'XII', 'RPL'),
('XII-TSM', 'XII Teknik Sepeda Motor', 'XII', 'TSM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kk`
--

CREATE TABLE `tbl_kk` (
  `kd_kk` varchar(5) NOT NULL,
  `nama_kk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kk`
--

INSERT INTO `tbl_kk` (`kd_kk`, `nama_kk`) VALUES
('AK', 'Akuntansi'),
('RPL', 'Rekayasa Perangkat Lunak'),
('TSM', 'Teknik Sepeda Motor');

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
(5, 'K13', 'N');

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
-- Struktur dari tabel `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Walikelas'),
(3, 'Guru'),
(4, 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `kkm` varchar(3) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `des` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `kd_mapel`, `nama_mapel`, `kkm`, `id_guru`, `id_siswa`, `des`) VALUES
(1, 'BID-1', 'Bahasa Indonesia-1', '70', 21, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_kelas`
--

CREATE TABLE `tbl_riwayat_kelas` (
  `id_riwayat` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_riwayat_kelas`
--

INSERT INTO `tbl_riwayat_kelas` (`id_riwayat`, `kd_kelas`, `nim`, `id_tahun_akademik`) VALUES
(1, '7-A1', '18SI1000', 1),
(2, '7-A1', '18SI1001', 1),
(3, '7-A1', '18SI1002', 1),
(4, '7-A1', '18SI1003', 1),
(5, '7-A1', '18TI2000', 1),
(6, '7-A1', '18TI2001', 1),
(7, '7-A1', '18TI2002', 1),
(8, '7-A1', '18TI2003', 1),
(9, '7-A1', '', 1),
(10, '8-A1', '14.12.8199', 1),
(11, '8-B1', '14.12.8198', 1),
(12, 'XIA1', '2241', 6),
(13, 'XIT1', '2217', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `kd_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`kd_ruangan`, `nama_ruangan`) VALUES
('MU', 'Mushola'),
('R1', 'Ruang Lab RPL'),
('R2', 'Ruang 2'),
('R3', 'Ruang 3'),
('R4', 'Ruang 4'),
('R5', 'Ruang 5'),
('R6', 'Ruang 6'),
('R7', 'Ruang 7'),
('R8', 'Ruang 8'),
('RB', 'Ruang Bengkel'),
('RBK', 'Ruang Bimbingan Konseling'),
('RKS', 'Ruang Kepala Sekolah'),
('RLA', 'Ruang Lab. Akuntansi'),
('RP', 'Ruang Perpustakaan'),
('RTA', 'Ruang Teori Akuntansi'),
('RUKS', 'Ruang UKS'),
('RWK', 'Ruang Wakil Kepala Sekolah');

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
-- Struktur dari tabel `tbl_tahun_akademik`
--

CREATE TABLE `tbl_tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tahun_akademik`
--

INSERT INTO `tbl_tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `is_aktif`, `semester`) VALUES
(6, '2024/20251', '', ''),
(11, '2024/20252', 'Y', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tingkatan_kelas`
--

CREATE TABLE `tbl_tingkatan_kelas` (
  `kd_tingkatan` varchar(5) NOT NULL,
  `nama_tingkatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tingkatan_kelas`
--

INSERT INTO `tbl_tingkatan_kelas` (`kd_tingkatan`, `nama_tingkatan`) VALUES
('X', 'Sepuluh'),
('XI', 'Sebelas'),
('XII', 'Dua belas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level_user` enum('Administrator','Kepala Sekolah','Guru') NOT NULL,
  `id_level_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `level_user`, `id_level_user`) VALUES
(1, 'Wahyu', 'Wahyu', 'fcea920f7412b5da7be0cf42b8c93759', 'Administrator', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_rule`
--

CREATE TABLE `tbl_user_rule` (
  `id_rule` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_rule`
--

INSERT INTO `tbl_user_rule` (`id_rule`, `id_menu`, `id_level_user`) VALUES
(1, 16, 4),
(2, 1, 1),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(6, 5, 1),
(7, 7, 1),
(8, 8, 1),
(9, 11, 1),
(10, 6, 1),
(11, 14, 1),
(12, 15, 1),
(13, 13, 1),
(14, 12, 1),
(15, 10, 1),
(16, 9, 1),
(17, 11, 3),
(19, 17, 3),
(20, 18, 3),
(21, 12, 3),
(22, 16, 1),
(23, 17, 1),
(24, 18, 1),
(25, 19, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_walikelas`
--

CREATE TABLE `tbl_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_walikelas`
--

INSERT INTO `tbl_walikelas` (`id_walikelas`, `id_guru`, `id_tahun_akademik`, `kd_kelas`) VALUES
(40, 7, 6, 'XAK1'),
(42, 24, 6, 'XAK1'),
(43, 24, 11, 'X-AK'),
(44, 28, 6, 'X-RPL'),
(45, 25, 6, 'X-TSM'),
(46, 22, 6, 'XI-AK'),
(47, 24, 6, 'XI-RP'),
(48, 20, 6, 'XI-RP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_walimurid`
--

CREATE TABLE `tbl_walimurid` (
  `id_walimurid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_walimurid`
--

INSERT INTO `tbl_walimurid` (`id_walimurid`, `nama`, `alamat`, `telepon`, `id_siswa`) VALUES
(1, 'Wahyu', 'Jelapan', '081326135167', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `view_walikelas`
--

CREATE TABLE `view_walikelas` (
  `nama_guru` varchar(40) DEFAULT NULL,
  `nama_kelas` varchar(30) DEFAULT NULL,
  `id_walikelas` int(11) DEFAULT NULL,
  `id_tahun_akademik` int(11) DEFAULT NULL,
  `nama_jurusan` varchar(30) DEFAULT NULL,
  `nama_tingkatan` varchar(30) DEFAULT NULL,
  `tahun_akademik` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
