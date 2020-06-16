-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2020 pada 08.19
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id_event` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tempat` varchar(225) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`id_event`, `no_surat`, `tempat`, `start_event`, `end_event`) VALUES
(17, 'ui/122', '', '2020-06-05 10:25:00', '2020-06-06 09:29:00'),
(18, '100/BAGPEM/008/20208000', 'ballrom hotel', '2020-06-13 01:00:00', '2020-06-13 01:30:00'),
(19, '100/arb/66www', 'ballro hotel mastin', '2020-06-12 12:22:00', '2020-06-17 22:04:00'),
(20, '1112', 'lapangan bola', '2020-06-12 01:02:00', '2020-06-16 01:02:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id_ds` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `penerima` varchar(25) NOT NULL,
  `catatan` varchar(225) NOT NULL,
  `tgl` datetime NOT NULL,
  `status_ds` varchar(225) NOT NULL,
  `tgl_dibaca` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id_ds`, `no_surat`, `penerima`, `catatan`, `tgl`, `status_ds`, `tgl_dibaca`) VALUES
(24, 'ui/122', 'admin', 'hahah', '2020-06-03 21:21:17', '1', '2020-06-05 06:50:37'),
(27, '100/arb/66', 'admin', 'admin saja', '2020-06-03 21:25:15', '1', '2020-06-05 06:50:46'),
(28, 'tes/11', 'kabag', 'Kepada saya', '2020-06-04 10:56:07', '1', '2020-06-04 10:56:20'),
(30, '100/BAGPEM/008/20208000', 'admin', 'ikut rapat dengan saya', '2020-06-04 14:47:03', '1', '2020-06-05 06:50:49'),
(31, '100/BAGPEM/008/20208000', 'kabag', 'ikut rapat dengan saya', '2020-06-04 14:47:03', '1', '2020-06-04 20:10:37'),
(32, '100/arb/66jklm', 'kabag', 'saya hadir', '2020-06-04 15:31:48', '1', '2020-06-11 09:30:26'),
(37, 'h/900', 'admin', 'saya koordinasikan dengan lembaga keuangan', '2020-06-04 19:57:35', '1', '2020-06-05 06:50:51'),
(39, 'taylorotwell', 'kabag', 'saya menghadiri', '2020-06-04 20:13:00', '1', '2020-06-11 09:30:24'),
(40, '122sd', 'kasubag otda', 'korrdinasikan dengan andi', '2020-06-05 07:01:32', '0', '0000-00-00 00:00:00'),
(41, 'jsd22', 'admin', 'teruskan kpd dinas sosial', '2020-06-05 07:01:52', '1', '2020-06-11 08:53:03'),
(42, '12333', 'kasubag kecamatan', 'survey tempat pelaksanaan sekitar jam 10:00', '2020-06-05 07:02:22', '0', '0000-00-00 00:00:00'),
(43, '12333', 'kasubag kerjasama', 'survey tempat pelaksanaan sekitar jam 10:00', '2020-06-05 07:02:22', '1', '2020-06-10 12:56:35'),
(44, '100/arb/66ill', 'kabag', 'saya yang hadir', '2020-06-10 12:05:08', '1', '2020-06-11 09:30:21'),
(45, '11/loio/12', 'kabag', 'hadirilah', '2020-06-12 18:59:13', '1', '2020-06-12 18:59:19'),
(46, 'bakeuda/2020/009', 'admin', 'Verifikasi bersama bagian keuangan bagpem ', '2020-06-16 11:33:23', '0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nama_file` varchar(225) NOT NULL,
  `tgl_masuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `no_surat`, `nama_file`, `tgl_masuk`) VALUES
(1, '100/arb/66', '(03_06_20_2159) naskah.pdf', '2020-06-03 21:16:59'),
(2, 'ui/122', '(03_06_20_2119) kkk.pdf', '2020-06-03 21:19:19'),
(3, 'h/900', '(03_06_20_2157) kkk.pdf', '2020-06-03 21:35:57'),
(4, 'tes/11', '(03_06_20_2128) naskah serah terima.pdf', '2020-06-03 21:37:28'),
(5, '100/BAGPEM/008/20208000', '(04_06_20_1406) naskah.pdf', '2020-06-13 08:47:15'),
(6, '100/arb/66jklm', '(04_06_20_1443) no 1.pdf', '2020-06-04 14:57:43'),
(7, '12333', '(04_06_20_1915) print1.pdf', '2020-06-04 19:46:15'),
(8, 'jsd22', '(04_06_20_1913) print1.pdf', '2020-06-04 19:49:13'),
(9, '122sd', '(04_06_20_1913) kkk.pdf', '2020-06-04 19:51:13'),
(10, 'taylorotwell', '(04_06_20_1945) kkk.pdf', '2020-06-04 19:52:45'),
(11, 'bakeuda/2020/009', '(05_06_20_0711) print1.pdf', '2020-06-05 07:25:11'),
(12, '100/arb/66ill', '(06_06_20_1021) kkk.pdf', '2020-06-06 10:18:21'),
(13, '11/loio/12', '(10_06_20_1209) kkk.pdf', '2020-06-10 12:48:09'),
(14, '100/arb/66www', '(13_06_20_0848) naskah.pdf', '2020-06-13 08:58:48'),
(15, '1112', '(13_06_20_0955) naskah.pdf', '2020-06-13 09:01:55'),
(16, '199/109/YZF', '(16_06_20_1158) naskah.pdf', '2020-06-16 11:37:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_sk` int(11) NOT NULL,
  `pembuat` varchar(225) NOT NULL,
  `no_surat` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(225) NOT NULL,
  `penerima` text NOT NULL,
  `isi` longtext NOT NULL,
  `sifat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_sk`, `pembuat`, `no_surat`, `tanggal`, `perihal`, `penerima`, `isi`, `sifat`) VALUES
(1, 'admin', '100/BAGPEM/001/2020', '2020-05-17', 'Surat Undangan Rapat', '<ol>\r\n	<li>Bakeuda</li>\r\n	<li>Direktur Duta Mall</li>\r\n	<li>Dinas Sosial</li>\r\n</ol>\r\n', '<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Menindaklanjuti rencana dan kegasama pembangunan Pusat Daur Ulang (PDU) di Kota Banjarmasin dengan EKONID Tahun 2020 yang dirancanakan akan melaksanakan pertemuan dengan Walikota Banjarmasin pada tanggal 20 Juli&nbsp;2020.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Adapun lokasi yang diusulkan adalah pada kelurahan Sungai Andai seberang Soto Bang Amat tempat penumpukan enceng gondok daÅ„ hasil pembersihan sungai. Berkenaan dengan hal tersebut di atas maka perlu dilaksanakan Rapat Koordinasi dan Visitasi lokasi PDU dimaksud pada :</span></span></p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><strong><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Hari/Tanggal&nbsp;&nbsp; &nbsp;: Selasa, 25&nbsp;Juli 2020 Pukul&nbsp;09.00 Wita s/d selesai<br />\r\nTempat&nbsp;&nbsp; &nbsp;: Barenlitbangda Kota Banjarmasin Gedung C Lt 3. JI. RE. Martadinata No 1</span></span></strong></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Sehubungan dengan hal tersebut di atas dimohonkan agar dapat menugaskan pejabat pada masing-masing SKPD.<br />\r\nDemikian disampaikan, atas perhatian dan kehadirannya diucapkan terima kasih.</span></span></p>\r\n', 'Surat Undangan'),
(2, 'admin', '100/BAGPEM/002/2020', '2020-05-19', 'Surat Perjalanan Dinas an Reza', '<p style=\"margin-left:40px\">-</p>\r\n', '<table border=\"3\" cellspacing=\"0\" class=\"TableNormal1\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:32px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">1</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #747474; border-left:none; border-right:1px solid gray; border-top:2px solid #b8b8b8; height:34px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pejabat benwenang yang memberi perintah</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #747474; border-left:none; border-right:1px solid #777777; border-top:2px solid #b8b8b8; height:34px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:4px\"><strong><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">KEPALA BAGIAN PEMERINTAHAN</span></span></span></strong></p>\r\n\r\n			<p style=\"margin-left:4px\"><strong><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Drs. DOLLY SYAHBANA, MM</span></span></span></strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:32px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">2</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid gray; border-top:none; height:32px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Nama Pegawai&nbsp;yang diperintahkan</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid #777777; border-top:none; height:32px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:4px\"><strong><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">MUHAMMAD REZA</span></span></span></strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:83px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">3</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid gray; border-top:none; height:83px; vertical-align:top; width:292px\">\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pangkat/Gol.Ruang</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Jabatan</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Gaji&nbsp;Pokok</span></span></span></p>\r\n				</li>\r\n			</ol>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #777777; border-top:none; height:83px; vertical-align:top; width:334px\">\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pranata Muda, III/a</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p>&nbsp;</p>\r\n				</li>\r\n				<li>\r\n				<p>&nbsp;</p>\r\n				</li>\r\n			</ol>\r\n\r\n			<p style=\"margin-left:3px\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:67px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">4</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid gray; border-top:none; height:67px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:12px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Maksud Perjalanan Dinas</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #777777; border-top:none; height:67px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Melaksanankan Rapat Pleno Tahunan Provinsi 2020.</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:34px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">5</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid gray; border-top:none; height:34px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Alat Transportasi</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid #777777; border-top:none; height:34px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Mobil</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #747474; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:40px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">6</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #747474; border-left:none; border-right:1px solid gray; border-top:none; height:40px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:27px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">a. Tempat berangkat</span></span></span></p>\r\n\r\n			<p style=\"margin-left:28px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">b.&nbsp;Tempat Tujuan</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #747474; border-left:none; border-right:1px solid #777777; border-top:none; height:40px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:3px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">a. Banjarmasin</span></span></span></p>\r\n\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">b.&nbsp;Palangkaraya</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #838383; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:67px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">7</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #838383; border-left:none; border-right:1px solid gray; border-top:none; height:67px; vertical-align:top; width:292px\">\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Lama&nbsp;Perjalanan Dinas</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Tanggal&nbsp;berangkat</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Tanggal Harus Kembali</span></span></span></p>\r\n				</li>\r\n			</ol>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #838383; border-left:none; border-right:1px solid #777777; border-top:none; height:67px; vertical-align:top; width:334px\">\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">3 Hari</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">20 Juli&nbsp;2020</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">23&nbsp;Juli&nbsp;2020</span></span></span></p>\r\n				</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:68px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">8</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid gray; border-top:none; height:68px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pengikut:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama</span></span></span></p>\r\n\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">1.</span></span></span></p>\r\n\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">2.</span></span></span></p>\r\n\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">3.</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #909090; border-top:none; height:68px; vertical-align:top; width:128px\">\r\n			<p style=\"margin-left:1px; text-align:center\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Umur</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #777777; border-top:none; height:68px; vertical-align:top; width:206px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Keterangan</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:83px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">9</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid gray; border-top:none; height:83px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pembebanan Anggaran :</span></span></span></p>\r\n\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">lnstansi:</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Mata anggaran</span></span></span></p>\r\n				</li>\r\n			</ol>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid #777777; border-top:none; height:83px; vertical-align:top; width:334px\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p style=\"margin-left:27px; margin-right:150px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">a. Pemerintah Kota</span></span></span></p>\r\n\r\n			<p style=\"margin-left:27px; margin-right:150px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">b.</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #545454; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:32px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">10</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #545454; border-left:none; border-right:1px solid gray; border-top:none; height:32px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Keterangan lain-lain</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #545454; border-left:none; border-right:1px solid #777777; border-top:none; height:32px; vertical-align:top; width:334px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'Surat Perjalanan Dinas'),
(3, 'kabag', '100/BAGPEM/003/2020', '2020-05-19', 'Surat  penarikan buku rekening', '<ol>\r\n	<li>Bank Kalsel</li>\r\n</ol>\r\n', '<p>Melakukan Penarikan buku rekening koran</p>\r\n', 'Surat Biasa'),
(4, 'kabag', '100/BAGPEM/004/2020', '2020-05-19', 'Surat Perintah Kerja reza', '<p style=\"margin-left:40px\">-</p>\r\n', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">Dasar :&nbsp; Sehubungan dengan Surat Badan Keuangan da Aset Daerah Nomor : 005/392/BAKEUDA-III/2020 Tanggal 02 Mei 2020, </span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">Perihal : Monitoring Aplikasi Palui Online. Maka dengan ini Kepala Bagian Pemerintahan Sekretariat Daerah Kota Banjarmasin :</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\"><strong>MENUGASKAN :</strong></span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">Kepada :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Muhammad Reza</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 16630460</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Pangkat/Gol. Ruang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : -</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Teknisi Jaringan</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Abdurrahman Siddiq</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 122222</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Pangkat/Gol. Ruang&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;: -</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;: Programer</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">Untuk :&nbsp;&nbsp;&nbsp;1. Menghadiri acara dimaksud, yang akan dilaksanakan pada :</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Senin</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tanggal&nbsp;&nbsp;&nbsp;&nbsp; : 20 Juli 2020</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tempat &nbsp;&nbsp;&nbsp; &nbsp;: Kantor Badan Keuangan dan Aset Daerah</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2. Mempersiapkan bahan-bahan yang diperlukan untuk hal dimaksud.</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3. Berangkat pada tanggal 20&nbsp;Juli&nbsp;2020, tanggal harus kembali 20&nbsp;Juli&nbsp;2020</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4. Melaporkan hasil pelaksanaan tugas kepada Kepala Bagian Pemerintahan Sekretariat Daerah Kota Banjarmasin. </span></span><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">&nbsp; </span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">Demikian Surat Perintah Tugas ini diperbuat, untuk dapat dilaksanakan dengan penuh tanggung jawab.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>\r\n', 'Surat Perintah Kerja'),
(5, 'kabag', '100/BAGPEM/005/2020', '2020-05-19', 'Surat Permohonan Cuti reza', '<p style=\"margin-left:30px\">Kepala Bagian Umum Pememrintahan Kota Banjarmasin</p>\r\n', '<p>Yang bertanda tangan dibawah ini :</p>\r\n\r\n<p style=\"margin-left:40px\">Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; Muhammad Reza</p>\r\n\r\n<p style=\"margin-left:40px\">NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; 16630460</p>\r\n\r\n<p style=\"margin-left:40px\">Pangkat/Gol&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; &nbsp; Pranata Muda III/a</p>\r\n\r\n<p style=\"margin-left:40px\">Jabatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;-</p>\r\n\r\n<p style=\"margin-left:40px\">Satuan Organisasi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; Bagian Pemerintah Kota Banjarmasin</p>\r\n\r\n<p>Dengan ini mangajukan permohonan cuti tahunan untuk tahun 2020 selama 3(hari) kerja, terhitung mulai tanggal 20 Juli 2020 s/d 23 Juli 2020.</p>\r\n\r\n<p>Selama Menjalankan cuti alamat saya adalah di Banjarmasin.</p>\r\n\r\n<p style=\"margin-left:40px\">Demikian permintaan ini saya buat untuk dapat dipertimbangkan sebagaimana mestinya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Surat Permohonan Cuti'),
(6, 'admin', '100/BAGPEM/006/2020', '2020-06-06', 'Surat Permohonan Cuti Reza Muhammad', '<p style=\"margin-left:30px\">Kepala Bagian Umum Pememrintahan Kota Banjarmasin</p>\r\n', '<p>Yang bertanda tangan dibawah ini :</p>\r\n\r\n<p style=\"margin-left:40px\">Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; Muhammad Reza</p>\r\n\r\n<p style=\"margin-left:40px\">NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; 16630460</p>\r\n\r\n<p style=\"margin-left:40px\">Pangkat/Gol&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; &nbsp; Dandim 001</p>\r\n\r\n<p style=\"margin-left:40px\">Jabatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;-</p>\r\n\r\n<p style=\"margin-left:40px\">Satuan Organisasi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; Bagian Pemerintah Kota Banjarmasin</p>\r\n\r\n<p>Dengan ini mangajukan permohonan cuti tahunan untuk tahun 2020 selama 3(hari) kerja, terhitung mulai tanggal 01&nbsp;Juli 2020 s/d 03&nbsp;Juli 2020 dan masuk bekerja kembali pada tanggal 04 Juli 2020.</p>\r\n\r\n<p>Selama Menjalankan cuti alamat saya adalah di Banjarmasin.</p>\r\n\r\n<p style=\"margin-left:40px\">Demikian permintaan ini saya buat untuk dapat dipertimbangkan sebagaimana mestinya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Surat Permohonan Cuti'),
(7, 'admin', '100/BAGPEM/007/2020', '2020-06-06', 'Surat Undangan bjj', '<ol>\r\n	<li>gg</li>\r\n	<li>nn</li>\r\n	<li>gg</li>\r\n</ol>\r\n', '<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Menindaklanjuti rencana dan kegasama pembangunan Pusat Daur Ulang (PDU) di Kota Banjarmasin dengan EKONID Tahun 2020 yang dirancanakan akan melaksanakan pertemuan dengan Walikota Banjarmasin pada tanggal 20 Juli&nbsp;2020.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Adapun lokasi yang diusulkan adalah pada kelurahan Sungai Andai seberang Soto Bang Amat tempat penumpukan enceng gondok daÅ„ hasil pembersihan sungai. Berkenaan dengan hal tersebut di atas maka perlu dilaksanakan Rapat Koordinasi dan Visitasi lokasi PDU dimaksud pada :</span></span></p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><strong><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Hari/Tanggal&nbsp;&nbsp; &nbsp;: Selasa, 25&nbsp;Juli 2020 Pukul&nbsp;09.00 Wita s/d selesai<br />\r\nTempat&nbsp;&nbsp; &nbsp;: Barenlitbangda Kota Banjarmasin Gedung C Lt 3. JI. RE. Martadinata No 1</span></span></strong></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Sehubungan dengan hal tersebut di atas dimohonkan agar dapat menugaskan pejabat pada masing-masing SKPD.<br />\r\nDemikian disampaikan, atas perhatian dan kehadirannya diucapkan terima kasih.</span></span></p>\r\n', 'Surat Undangan'),
(8, 'admin', '100/BAGPEM/008/2020', '2020-06-06', 'Surat Undangan Dinsos', '<ol>\r\n	<li>dd</li>\r\n	<li>a</li>\r\n	<li>d</li>\r\n</ol>\r\n', '<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Menindaklanjuti rencana dan kegasama pembangunan Pusat Daur Ulang (PDU) di Kota Banjarmasin dengan EKONID Tahun 2020 yang dirancanakan akan melaksanakan pertemuan dengan Walikota Banjarmasin pada tanggal 20 Juli&nbsp;2020.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Adapun lokasi yang diusulkan adalah pada kelurahan Sungai Andai seberang Soto Bang Amat tempat penumpukan enceng gondok daÅ„ hasil pembersihan sungai. Berkenaan dengan hal tersebut di atas maka perlu dilaksanakan Rapat Koordinasi dan Visitasi lokasi PDU dimaksud pada :</span></span></p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><strong><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Hari/Tanggal&nbsp;&nbsp; &nbsp;: Selasa, 25&nbsp;Juli 2020 Pukul&nbsp;09.00 Wita s/d selesai<br />\r\nTempat&nbsp;&nbsp; &nbsp;: Barenlitbangda Kota Banjarmasin Gedung C Lt 3. JI. RE. Martadinata No 1</span></span></strong></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Sehubungan dengan hal tersebut di atas dimohonkan agar dapat menugaskan pejabat pada masing-masing SKPD.<br />\r\nDemikian disampaikan, atas perhatian dan kehadirannya diucapkan terima kasih.</span></span></p>\r\n', 'Surat Undangan'),
(9, 'admin', '100/BAGPEM/009/2020', '2020-06-06', 'Suratxd', '<ol>\r\n	<li>d</li>\r\n	<li>d</li>\r\n	<li>ff</li>\r\n</ol>\r\n', '<p>Isi Text</p>\r\n', 'Surat Biasa'),
(10, 'admin', '100/BAGPEM/010/2020', '2020-06-06', 'Surat  fdgsdfg', '<ol>\r\n	<li>f</li>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n', '<p>Isi Text</p>\r\n', 'Surat Biasa'),
(11, 'admin', '100/BAGPEM/011/2020', '2020-06-06', 'Surat  ddsdsd', '<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n', '<p>Isi Text</p>\r\n', 'Surat Biasa'),
(12, 'admin', '100/BAGPEM/012/2020', '2020-06-06', 'Surat  dd', '<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n', '<p>Isi Text</p>\r\n', 'Surat Biasa'),
(13, 'admin', '100/BAGPEM/013/2020', '2020-06-06', 'Surat  sfsf', '<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n', '<p>Isi Text</p>\r\n', 'Surat Biasa'),
(14, 'kabag', '100/BAGPEM/014/2020', '2020-06-10', 'Surat Undangan ddd', '<ol>\r\n	<li>Bkd</li>\r\n	<li>Dinsos</li>\r\n	<li>Perkim</li>\r\n</ol>\r\n', '<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Menindaklanjuti rencana dan kegasama pembangunan Pusat Daur Ulang (PDU) di Kota Banjarmasin dengan EKONID Tahun 2020 yang dirancanakan akan melaksanakan pertemuan dengan Walikota Banjarmasin pada tanggal 20 Juli&nbsp;2020.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Adapun lokasi yang diusulkan adalah pada kelurahan Sungai Andai seberang Soto Bang Amat tempat penumpukan enceng gondok daÅ„ hasil pembersihan sungai. Berkenaan dengan hal tersebut di atas maka perlu dilaksanakan Rapat Koordinasi dan Visitasi lokasi PDU dimaksud pada :</span></span></p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><strong><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Hari/Tanggal&nbsp;&nbsp; &nbsp;: Selasa, 25&nbsp;Juli 2020 Pukul&nbsp;09.00 Wita s/d selesai<br />\r\nTempat&nbsp;&nbsp; &nbsp;: Barenlitbangda Kota Banjarmasin Gedung C Lt 3. JI. RE. Martadinata No 1</span></span></strong></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:14px\">Sehubungan dengan hal tersebut di atas dimohonkan agar dapat menugaskan pejabat pada masing-masing SKPD.<br />\r\nDemikian disampaikan, atas perhatian dan kehadirannya diucapkan terima kasih.</span></span></p>\r\n', 'Surat Undangan'),
(15, 'kabag', '100/BAGPEM/015/2020', '2020-06-15', 'Surat Permohonan Cuti kabag', '<p style=\"margin-left:30px\">Bagian Umum Pemerintahan Kota Banjarmasin</p>\r\n', '<p>Yang bertanda tangan dibawah ini :</p>\r\n\r\n<p style=\"margin-left:40px\">Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; Drs. H. Dolly Syahbana, MM</p>\r\n\r\n<p style=\"margin-left:40px\">NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; 19660601 198602 1 009</p>\r\n\r\n<p style=\"margin-left:40px\">Pangkat/Gol&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; &nbsp; Pranata Muda III/a</p>\r\n\r\n<p style=\"margin-left:40px\">Jabatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;-</p>\r\n\r\n<p style=\"margin-left:40px\">Satuan Organisasi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; Bagian Pemerintah Kota Banjarmasin</p>\r\n\r\n<p>Dengan ini mangajukan permohonan cuti tahunan untuk tahun 2020 selama 3(hari) kerja, terhitung mulai tanggal 20 Juli 2020 s/d 23 Juli 2020.</p>\r\n\r\n<p>Selama Menjalankan cuti alamat saya adalah di Banjarmasin.</p>\r\n\r\n<p style=\"margin-left:40px\">Demikian permintaan ini saya buat untuk dapat dipertimbangkan sebagaimana mestinya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Surat Permohonan Cuti'),
(16, 'kabag', '100/BAGPEM/016/2020', '2020-06-15', 'Surat Perjalanan Dinas an muhammad reza dari kabag', '<p style=\"margin-left:40px\">-</p>\r\n', '<table border=\"3\" cellspacing=\"0\" class=\"TableNormal1\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:32px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">1</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #747474; border-left:none; border-right:1px solid gray; border-top:2px solid #b8b8b8; height:34px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pejabat benwenang yang memberi perintah</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #747474; border-left:none; border-right:1px solid #777777; border-top:2px solid #b8b8b8; height:34px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:4px\"><strong><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">KEPALA BAGIAN PEMERINTAHAN</span></span></span></strong></p>\r\n\r\n			<p style=\"margin-left:4px\"><strong><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Drs. DOLLY SYAHBANA, MM</span></span></span></strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:32px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">2</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid gray; border-top:none; height:32px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Nama Pegawai&nbsp;yang diperintahkan</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid #777777; border-top:none; height:32px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:4px\"><strong><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">MUHAMMAD REZA</span></span></span></strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:75px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">3</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid gray; border-top:none; height:83px; vertical-align:top; width:292px\">\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pangkat/Gol.Ruang</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Jabatan</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Gaji&nbsp;Pokok</span></span></span></p>\r\n				</li>\r\n			</ol>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #777777; border-top:none; height:83px; vertical-align:top; width:334px\">\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pranata Muda, III/a</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p>&nbsp;</p>\r\n				</li>\r\n				<li>\r\n				<p>&nbsp;</p>\r\n				</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:67px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">4</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid gray; border-top:none; height:67px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:12px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Maksud Perjalanan Dinas</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #777777; border-top:none; height:67px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Melaksanankan Rapat Pleno Tahunan Provinsi 2020.</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:34px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">5</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid gray; border-top:none; height:34px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Alat Transportasi</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid #777777; border-top:none; height:34px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Mobil</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #747474; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:40px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">6</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #747474; border-left:none; border-right:1px solid gray; border-top:none; height:40px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:27px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">a. Tempat berangkat</span></span></span></p>\r\n\r\n			<p style=\"margin-left:28px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">b.&nbsp;Tempat Tujuan</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #747474; border-left:none; border-right:1px solid #777777; border-top:none; height:40px; vertical-align:top; width:334px\">\r\n			<p style=\"margin-left:3px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">a. Banjarmasin</span></span></span></p>\r\n\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">b.&nbsp;Palangkaraya</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #838383; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:67px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">7</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #838383; border-left:none; border-right:1px solid gray; border-top:none; height:67px; vertical-align:top; width:292px\">\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Lama&nbsp;Perjalanan Dinas</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Tanggal&nbsp;berangkat</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Tanggal Harus Kembali</span></span></span></p>\r\n				</li>\r\n			</ol>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #838383; border-left:none; border-right:1px solid #777777; border-top:none; height:67px; vertical-align:top; width:334px\">\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">3 Hari</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">20 Juli&nbsp;2020</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">23&nbsp;Juli&nbsp;2020</span></span></span></p>\r\n				</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:68px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">8</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid gray; border-top:none; height:68px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pengikut:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama</span></span></span></p>\r\n\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">1.</span></span></span></p>\r\n\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">2.</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #909090; border-top:none; height:68px; vertical-align:top; width:128px\">\r\n			<p style=\"margin-left:1px; text-align:center\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Umur</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:2px solid #a8a8a8; border-left:none; border-right:1px solid #777777; border-top:none; height:68px; vertical-align:top; width:206px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Keterangan</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:83px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:4px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">9</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid gray; border-top:none; height:83px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Pembebanan Anggaran :</span></span></span></p>\r\n\r\n			<ol style=\"list-style-type:lower-alpha\">\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">lnstansi:</span></span></span></p>\r\n				</li>\r\n				<li>\r\n				<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Mata anggaran</span></span></span></p>\r\n				</li>\r\n			</ol>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #646464; border-left:none; border-right:1px solid #777777; border-top:none; height:83px; vertical-align:top; width:334px\">\r\n			<p>&nbsp;</p>\r\n\r\n			<p style=\"margin-left:27px; margin-right:150px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">a. Pemerintah Kota</span></span></span></p>\r\n\r\n			<p style=\"margin-left:27px; margin-right:150px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">b.</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid #545454; border-left:1px solid #777777; border-right:1px solid #a3a3a3; border-top:none; height:32px; vertical-align:top; width:28px\">\r\n			<p style=\"margin-left:6px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">10</span></span></span></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid #545454; border-left:none; border-right:1px solid gray; border-top:none; height:32px; vertical-align:top; width:292px\">\r\n			<p style=\"margin-left:7px\"><span style=\"font-size:16px\"><span style=\"color:#000000\"><span style=\"font-family:Times New Roman,Times,serif\">Keterangan lain-lain</span></span></span></p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"border-bottom:1px solid #545454; border-left:none; border-right:1px solid #777777; border-top:none; height:32px; vertical-align:top; width:334px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'Surat Perjalanan Dinas'),
(17, 'kabag', '100/BAGPEM/017/2020', '2020-06-15', 'Surat  penarikan buku rekening instansi bagian pemerintahan kota banjarmasin', '<ol>\r\n	<li>Bank kalsel cabang banjarmasin barat</li>\r\n</ol>\r\n', '<p>Dengan ini ingin melakukan penarikan buku rekening per bulan januari 2020 s/d januari 2021.</p>\r\n\r\n<p>Terimakasih.</p>\r\n', 'Surat Biasa');
INSERT INTO `surat_keluar` (`id_sk`, `pembuat`, `no_surat`, `tanggal`, `perihal`, `penerima`, `isi`, `sifat`) VALUES
(18, 'kasubag kerjasama', '100/BAGPEM/018/2020', '2020-06-16', 'Surat Permohonan Cuti kasubag kerjasama', '<p style=\"margin-left:30px\">Bagian Umum Pemerintahan Kota Banjarmasin</p>\r\n', '<p>Yang bertanda tangan dibawah ini :</p>\r\n\r\n<p style=\"margin-left:40px\">Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; Aminur Nisa, MM</p>\r\n\r\n<p style=\"margin-left:40px\">NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; 19190704 193605 1 001</p>\r\n\r\n<p style=\"margin-left:40px\">Pangkat/Gol&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; &nbsp; Aselon&nbsp;III/a</p>\r\n\r\n<p style=\"margin-left:40px\">Jabatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;-</p>\r\n\r\n<p style=\"margin-left:40px\">Satuan Organisasi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; Bagian Pemerintah Kota Banjarmasin</p>\r\n\r\n<p>Dengan ini mangajukan permohonan cuti tahunan untuk tahun 2020 selama 3(hari) kerja, terhitung mulai tanggal 20 Juli 2020 s/d 23 Juli 2020.</p>\r\n\r\n<p>Selama Menjalankan cuti alamat saya adalah di Banjarmasin.</p>\r\n\r\n<p style=\"margin-left:40px\">Demikian permintaan ini saya buat untuk dapat dipertimbangkan sebagaimana mestinya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Surat Permohonan Cuti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `pengirim` varchar(225) NOT NULL,
  `perihal` varchar(225) NOT NULL,
  `type_surat` varchar(25) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_sm`, `no_surat`, `tgl_surat`, `pengirim`, `perihal`, `type_surat`, `status`) VALUES
(1, '100/arb/66', '2020-06-03', 'tes 123', 'ini pemberitahuan', 'pemberitahuan', '1'),
(2, 'ui/122', '2020-06-03', 'pt sinar as bintang kejora', 'data slip gaji', 'undangan', '1'),
(3, 'h/900', '2020-06-03', 'bakueda', 'slip gaji asn', 'pemberitahuan', '1'),
(4, 'tes/11', '2020-06-03', 'halo', '123', 'pemberitahuan', '1'),
(5, '100/BAGPEM/008/20208000', '2020-06-04', 'bkd diklat', 'rapat pelantikan Pejabat Daerah', 'undangan', '1'),
(6, '100/arb/66jklm', '2020-06-04', 'opqrs', 'tupwx', 'pemberitahuan', '1'),
(7, '12333', '2020-06-04', 'jkl', 'netnet', 'pemberitahuan', '1'),
(8, 'jsd22', '2020-06-04', 'crazy', 'save me', 'pemberitahuan', '1'),
(9, '122sd', '2020-06-04', 'bakueda', 'ooo', 'pemberitahuan', '1'),
(10, 'taylorotwell', '2020-06-04', 'oop', 'js', 'pemberitahuan', '1'),
(11, 'bakeuda/2020/009', '2020-06-05', 'bakueda', 'Tunjangan gaji periode juni 2020', 'pemberitahuan', '1'),
(12, '100/arb/66ill', '2020-06-06', 'bakueda', 'undangn rapat pelantikan', 'pemberitahuan', '1'),
(13, '11/loio/12', '2020-06-03', 'kamis', 'bin rabu', 'pemberitahuan', '1'),
(14, '100/arb/66www', '2020-06-13', 'eee', '333', 'undangan', '0'),
(15, '1112', '2020-06-13', 'bakuedaww', 'eeq', 'undangan', '0'),
(16, '199/109/YZF', '2020-06-16', 'Dinas Pangan dan Peternakan', 'Laporan Data Asn pada Dinas Pangan dan Peternakan', 'pemberitahuan', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_telegram` int(25) NOT NULL,
  `status_user` varchar(11) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `nama`, `nip`, `jabatan`, `id_telegram`, `status_user`, `online`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Muhammad Reza Abdullah', '16630460', 'admin', 1173998866, 'aktif', 0),
(2, 'kabag', '21232f297a57a5a743894a0e4a801fc3', 'Drs. H. Dolly Syahbana, MM', '19660601 198602 1 009', 'kabag', 1167960150, 'cuti', 0),
(3, 'kasubag otda', '21232f297a57a5a743894a0e4a801fc3', 'Dian Abdi W, S.STP', '19660702 196606 1 001', 'kasubag otonomi daerah', 0, 'bekerja', 0),
(4, 'kasubag kecamatan', '21232f297a57a5a743894a0e4a801fc3', 'Faisal Anshory, S.STP', '19350501 197704 1 003', 'kasubag kecamatan', 0, 'bekerja', 0),
(5, 'kasubag kerjasama ', '21232f297a57a5a743894a0e4a801fc3', 'Aminur Nisa, MM ', '19190704 193605 1 001', 'kasubag kerjasama', 0, 'bekerja', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `no_surat` (`no_surat`);

--
-- Indeks untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_ds`),
  ADD KEY `no_surat` (`no_surat`),
  ADD KEY `penerima` (`penerima`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `no_surat` (`no_surat`),
  ADD KEY `nama_file` (`nama_file`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `pembuat` (`pembuat`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_sm`),
  ADD KEY `no_surat` (`no_surat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acara`
--
ALTER TABLE `acara`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_ds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD CONSTRAINT `acara_ibfk_1` FOREIGN KEY (`no_surat`) REFERENCES `surat_masuk` (`no_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`no_surat`) REFERENCES `surat_masuk` (`no_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`penerima`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`no_surat`) REFERENCES `surat_masuk` (`no_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`pembuat`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
