-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2022 pada 06.46
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_inovam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_telp` varchar(15) NOT NULL,
  `admin_alamat` text NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_telp`, `admin_alamat`, `admin_username`, `admin_password`, `admin_created`) VALUES
(1, 'Roki Prasetyo Adi', '089608560667', 'Sempusari, Jember', 'roxx', 'c4ca4238a0b923820dcc509a6f75849b', '2022-02-09 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_transaksi_obat`
--

CREATE TABLE `dtl_transaksi_obat` (
  `dtl_obat_id` int(10) NOT NULL,
  `dtl_obat_transaksi_id` int(10) NOT NULL,
  `dtl_obat_obat_id` int(3) NOT NULL,
  `dtl_obat_jumlah` int(3) NOT NULL,
  `dtl_obat_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `dtl_transaksi_obat`
--
DELIMITER $$
CREATE TRIGGER `subtotal_obat_add` AFTER INSERT ON `dtl_transaksi_obat` FOR EACH ROW BEGIN
	UPDATE transaksi SET transaksi.transaksi_subtotal= transaksi.transaksi_subtotal + NEW.dtl_obat_subtotal
    WHERE transaksi.transaksi_id = NEW.dtl_obat_transaksi_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subtotal_obat_del` AFTER DELETE ON `dtl_transaksi_obat` FOR EACH ROW BEGIN
	UPDATE transaksi SET transaksi.transaksi_subtotal= transaksi.transaksi_subtotal - OLD.dtl_obat_subtotal
    WHERE transaksi.transaksi_id = OLD.dtl_obat_transaksi_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_transaksi_tindakan`
--

CREATE TABLE `dtl_transaksi_tindakan` (
  `dtl_tindakan_id` int(10) NOT NULL,
  `dtl_tindakan_transaksi_id` int(10) NOT NULL,
  `dtl_tindakan_tindakan_id` int(5) NOT NULL,
  `dtl_tindakan_jumlah` int(3) NOT NULL,
  `dtl_tindakan_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dtl_transaksi_tindakan`
--

INSERT INTO `dtl_transaksi_tindakan` (`dtl_tindakan_id`, `dtl_tindakan_transaksi_id`, `dtl_tindakan_tindakan_id`, `dtl_tindakan_jumlah`, `dtl_tindakan_subtotal`) VALUES
(23, 13, 3, 1, 500000);

--
-- Trigger `dtl_transaksi_tindakan`
--
DELIMITER $$
CREATE TRIGGER `subtotal_tindakan_add` AFTER INSERT ON `dtl_transaksi_tindakan` FOR EACH ROW BEGIN
	UPDATE transaksi SET transaksi.transaksi_subtotal= transaksi.transaksi_subtotal + NEW.dtl_tindakan_subtotal
    WHERE transaksi.transaksi_id = NEW.dtl_tindakan_transaksi_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subtotal_tindakan_del` AFTER DELETE ON `dtl_transaksi_tindakan` FOR EACH ROW BEGIN
	UPDATE transaksi SET transaksi.transaksi_subtotal= transaksi.transaksi_subtotal - OLD.dtl_tindakan_subtotal
    WHERE transaksi.transaksi_id = OLD.dtl_tindakan_transaksi_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `obat_id` int(3) NOT NULL,
  `obat_nama` varchar(50) NOT NULL,
  `obat_deskripsi` text NOT NULL,
  `obat_harga` int(10) NOT NULL,
  `obat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `obat_created_by` varchar(50) NOT NULL,
  `obat_updated` datetime NOT NULL,
  `obat_updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`obat_id`, `obat_nama`, `obat_deskripsi`, `obat_harga`, `obat_created`, `obat_created_by`, `obat_updated`, `obat_updated_by`) VALUES
(5, 'Aspirin', 'Obat Pusing', 3000, '2022-02-11 12:01:59', 'obat_created_by', '0000-00-00 00:00:00', ''),
(6, 'Actifed', 'Actifed adalah obat yang bermanfaat untuk meringankan gejala akibat batuk pilek, flu, atau rhinitis alergi. Obat ini tersedia dalam bentuk sirop dengan tiga varian, yaitu Actifed kuning, Actifed hijau, dan Actifed merah.', 5000, '2022-02-11 12:03:14', 'obat_created_by', '2022-02-11 12:05:24', 'Roki Prasetyo Adi'),
(7, 'Acyclovir Topikal', 'Acyclovir topikal adalah obat yang digunakan untuk mengatasi luka lepuh di kulit, termasuk pada bibir dan kelamin, yang disebabkan oleh virus herpes simpleks. Obat ini hanya boleh digunakan berdasarkan resep dokter.', 10000, '2022-02-11 12:05:10', 'obat_created_by', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(3) NOT NULL,
  `pegawai_nama` varchar(50) NOT NULL,
  `pegawai_spesialis` varchar(50) NOT NULL,
  `pegawai_telp` varchar(13) NOT NULL,
  `pegawai_email` text NOT NULL,
  `pegawai_username` varchar(30) NOT NULL,
  `pegawai_password` text NOT NULL,
  `pegawai_created` datetime NOT NULL DEFAULT current_timestamp(),
  `pegawai_created_by` varchar(50) NOT NULL,
  `pegawai_updated` datetime NOT NULL,
  `pegawai_updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_spesialis`, `pegawai_telp`, `pegawai_email`, `pegawai_username`, `pegawai_password`, `pegawai_created`, `pegawai_created_by`, `pegawai_updated`, `pegawai_updated_by`) VALUES
(7, 'dr. Amelia Suganda, Sp.OG', 'Dokter Kandungan', '08123456789', 'pegawai_email', 'amelia', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-11 20:44:36', 'Roki Prasetyo Adi', '0000-00-00 00:00:00', ''),
(8, 'dr. Indra, M.Kes, Sp.A', 'Dokter Anak', '081234765198', 'pegawai_email', 'indra', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-11 20:46:48', 'Roki Prasetyo Adi', '0000-00-00 00:00:00', ''),
(9, 'dr. Christopher Warouw, Sp.T.H.T.K.L', 'Dokter THT', '085654987321', 'pegawai_email', 'christopher', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-11 20:47:45', 'Roki Prasetyo Adi', '0000-00-00 00:00:00', ''),
(10, 'dr. Vonny Indriati Widjojo, Sp.KK', 'Dokter Kulit', '081459786321', 'pegawai_email', 'vonny', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-11 20:48:46', 'Roki Prasetyo Adi', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_pasien`
--

CREATE TABLE `pendaftaran_pasien` (
  `pp_id` int(5) NOT NULL,
  `pp_user_id` int(5) NOT NULL,
  `pp_keluhan` text NOT NULL,
  `pp_tgl` datetime NOT NULL,
  `pp_status` enum('Pendaftaran Terkirim','Pendaftaran Diterima','Pendaftaran Dibatalkan','Pendaftaran Ditolak') NOT NULL DEFAULT 'Pendaftaran Terkirim',
  `pp_tgl_pertemuan` datetime NOT NULL,
  `pp_poli` varchar(50) NOT NULL,
  `pp_pegawai_id` int(3) NOT NULL,
  `pp_admin_by` varchar(50) NOT NULL,
  `pp_admin_updated` datetime NOT NULL,
  `pp_user_created` datetime NOT NULL DEFAULT current_timestamp(),
  `pp_user_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran_pasien`
--

INSERT INTO `pendaftaran_pasien` (`pp_id`, `pp_user_id`, `pp_keluhan`, `pp_tgl`, `pp_status`, `pp_tgl_pertemuan`, `pp_poli`, `pp_pegawai_id`, `pp_admin_by`, `pp_admin_updated`, `pp_user_created`, `pp_user_updated`) VALUES
(6, 11, 'Sakit tenggorokan', '2022-02-11 00:50:00', 'Pendaftaran Diterima', '2022-02-25 00:00:00', 'MATA', 7, 'Roki Prasetyo Adi', '0000-00-00 00:00:00', '2022-02-11 22:47:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `tindakan_id` int(5) NOT NULL,
  `tindakan_nama` varchar(50) NOT NULL,
  `tindakan_deskripsi` text NOT NULL,
  `tindakan_harga` int(10) NOT NULL,
  `tindakan_created` datetime NOT NULL DEFAULT current_timestamp(),
  `tindakan_created_by` varchar(50) NOT NULL,
  `tindakan_updated` datetime NOT NULL,
  `tindakan_updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`tindakan_id`, `tindakan_nama`, `tindakan_deskripsi`, `tindakan_harga`, `tindakan_created`, `tindakan_created_by`, `tindakan_updated`, `tindakan_updated_by`) VALUES
(3, 'Asuhan Persalinan Normal', 'Asuhan persalinan normal adalah tindakan mengeluarkan janin yang sudah cukup usia kehamilan, dan berlangsung spontan tanpa intervensi alat.', 500000, '2022-02-11 12:06:44', 'tindakan_created_by', '0000-00-00 00:00:00', ''),
(4, 'Audiometri', 'Audiometri adalah teknik pemeriksaan yang dilakukan oleh seorang audiolog untuk mengukur derajat, tipe, dan konfigurasi dari gangguan pendengaran, seperti pada tuli konduktif dan tuli sensorineural. Prinsip pemeriksaan audiometri adalah dengan menilai fungsi dari telinga tengah, koklea, dan saraf pendengaran pada otak.', 200000, '2022-02-11 12:08:06', 'tindakan_created_by', '2022-02-11 12:08:07', 'Roki Prasetyo Adi'),
(5, 'Drainase hematoma aurikula', 'Drainase hematoma aurikula merupakan prosedur untuk mengevakuasi hematoma pada area telinga akibat trauma dan mencegah rekurensi untuk menghindari terjadinya destruksi kartilago yang berujung pada deformitas cauliflower ear. Tindakan ini dapat dilakukan di ruang operasi maupun di ruang periksa biasa.', 1000000, '2022-02-11 12:08:40', 'tindakan_created_by', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(10) NOT NULL,
  `transaksi_user_id` int(5) NOT NULL,
  `transaksi_pegawai_id` int(3) NOT NULL,
  `transaksi_keluhan` text NOT NULL,
  `transaksi_tgl` datetime NOT NULL,
  `transaksi_poli` varchar(50) NOT NULL,
  `transaksi_deposit` double NOT NULL,
  `transaksi_subtotal` double NOT NULL,
  `transaksi_admin_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_user_id`, `transaksi_pegawai_id`, `transaksi_keluhan`, `transaksi_tgl`, `transaksi_poli`, `transaksi_deposit`, `transaksi_subtotal`, `transaksi_admin_by`) VALUES
(13, 11, 7, 'Sakit tenggorokan', '2022-02-25 00:00:00', 'MATA', 50000, 500000, 'Roki Prasetyo Adi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `user_ktp_id` varchar(16) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_jenkel` varchar(1) NOT NULL,
  `user_tgl_lahir` date NOT NULL,
  `user_telp` varchar(13) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_wilayah_id` int(3) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` text NOT NULL,
  `user_created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_updated` datetime NOT NULL,
  `user_updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_ktp_id`, `user_nama`, `user_jenkel`, `user_tgl_lahir`, `user_telp`, `user_alamat`, `user_wilayah_id`, `user_username`, `user_password`, `user_created`, `user_updated`, `user_updated_by`) VALUES
(10, '3509190510970001', 'Doni Firdaus', 'L', '1997-10-05', '089563215664', 'Sempusari', 2, 'roxx', 'c4ca4238a0b923820dcc509a6f75849b', '2022-02-11 22:04:10', '0000-00-00 00:00:00', ''),
(11, '3509190501980002', 'Sauqi Ahmad', 'L', '1998-01-05', '085123685945', 'Ajung', 9, 'sauqie', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-11 22:05:02', '0000-00-00 00:00:00', ''),
(12, '3509192205100001', 'Muis mughini', 'L', '1998-06-11', '089652378563', 'Balung', 7, 'muis', 'c56d0e9a7ccec67b4ea131655038d604', '2022-02-11 22:41:43', '2022-02-11 22:41:49', 'Roki Prasetyo Adi'),
(13, '3509190512320008', 'roy', 'L', '2022-02-12', '089650652321', 'sempusari', 2, 'roy', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-12 10:54:07', '0000-00-00 00:00:00', ''),
(14, '3509190562120008', 'rey', 'L', '2022-02-12', '089652325623', 'frgfdg', 9, 'rey', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-12 10:55:26', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `wilayah_id` int(3) NOT NULL,
  `wilayah_kecamatan` varchar(50) NOT NULL,
  `wilayah_created` datetime NOT NULL DEFAULT current_timestamp(),
  `wilayah_created_by` varchar(50) NOT NULL,
  `wilayah_updated` datetime NOT NULL,
  `wilayah_updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`wilayah_id`, `wilayah_kecamatan`, `wilayah_created`, `wilayah_created_by`, `wilayah_updated`, `wilayah_updated_by`) VALUES
(1, 'Asemrowo', '2022-02-11 11:40:04', '', '0000-00-00 00:00:00', ''),
(2, 'Benowo', '2022-02-11 11:40:04', '', '0000-00-00 00:00:00', ''),
(3, 'Lakarsantri', '2022-02-11 11:40:04', '', '0000-00-00 00:00:00', ''),
(4, 'Pakal', '2022-02-11 11:40:04', '', '0000-00-00 00:00:00', ''),
(5, 'Sambikerep', '2022-02-11 11:40:04', '', '0000-00-00 00:00:00', ''),
(6, 'Suko Manunggal', '2022-02-11 11:40:04', '', '0000-00-00 00:00:00', ''),
(7, 'Tandes', '2022-02-11 11:40:04', '', '2022-02-11 11:52:44', 'Roki Prasetyo Adi'),
(8, 'Dukuh Pakis', '2022-02-11 11:40:04', '', '0000-00-00 00:00:00', ''),
(9, 'Gayungan', '2022-02-11 11:49:17', 'wilayah_created_by', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `dtl_transaksi_obat`
--
ALTER TABLE `dtl_transaksi_obat`
  ADD PRIMARY KEY (`dtl_obat_id`);

--
-- Indeks untuk tabel `dtl_transaksi_tindakan`
--
ALTER TABLE `dtl_transaksi_tindakan`
  ADD PRIMARY KEY (`dtl_tindakan_id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`obat_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indeks untuk tabel `pendaftaran_pasien`
--
ALTER TABLE `pendaftaran_pasien`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`tindakan_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`wilayah_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dtl_transaksi_obat`
--
ALTER TABLE `dtl_transaksi_obat`
  MODIFY `dtl_obat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dtl_transaksi_tindakan`
--
ALTER TABLE `dtl_transaksi_tindakan`
  MODIFY `dtl_tindakan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `obat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_pasien`
--
ALTER TABLE `pendaftaran_pasien`
  MODIFY `pp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `tindakan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `wilayah_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
