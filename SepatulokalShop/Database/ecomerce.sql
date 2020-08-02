-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2020 pada 05.26
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(11) NOT NULL,
  `nama_category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `nama_category`) VALUES
(1, 'Casual'),
(2, 'Asesoris men'),
(3, 'Perlengkapan Bayi'),
(4, 'Nike'),
(6, 'Adidas'),
(7, 'Robek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_user` varchar(20) NOT NULL,
  `id_product` varchar(20) NOT NULL,
  `qty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id_user`, `id_product`, `qty`) VALUES
('12344', '3', ''),
('12344', '4', ''),
('12344', '4', ''),
('191104103137', '1', ''),
('191104102519', '1', ''),
('191104102519', '1', ''),
('191104102519', '6', ''),
('191104103137', '1', ''),
('191104103137', '4', ''),
('191104103137', '4', ''),
('191104103137', '1', ''),
('191104103137', '3', ''),
('12345', '5', '1'),
('12345', '5', '1'),
('12345', '1', '3'),
('12345', '5', '1'),
('12345', '3', '2'),
('191104103137', '6', '1'),
('191104103137', '1', '3'),
('12344', '3', '2'),
('191212072333', '6', '2'),
('12345', '5', '1'),
('12345', '3', '1'),
('12345', '3', '1'),
('12345', '3', '2'),
('191212072333', '1', '2'),
('12345', '5', '1'),
('12345', '9', '1'),
('12345', '10', '1'),
('12345', '10', '2'),
('191212072333', '5', '1'),
('191212072333', '21', '1'),
('191212072333', '1', '2'),
('191212072333', '6', '1'),
('191212072333', '28', '1'),
('191212072333', '26', '1'),
('200115062414', '27', '2'),
('200115062414', '29', '1'),
('191227030902', '29', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemesan`
--

CREATE TABLE `tbl_pemesan` (
  `id_pemesan` varchar(50) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kab_kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `kodepos` varchar(50) DEFAULT NULL,
  `subtotal` varchar(50) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `jasa` varchar(30) NOT NULL,
  `ongkir` varchar(30) NOT NULL,
  `status_pesanan` varchar(100) NOT NULL,
  `buktitf` varchar(100) NOT NULL,
  `tglterima` varchar(50) DEFAULT NULL,
  `no_resi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pemesan`
--

INSERT INTO `tbl_pemesan` (`id_pemesan`, `id_user`, `nama_penerima`, `no_hp`, `tgl`, `alamat`, `provinsi`, `kab_kota`, `kecamatan`, `desa`, `kodepos`, `subtotal`, `pembayaran`, `jasa`, `ongkir`, `status_pesanan`, `buktitf`, `tglterima`, `no_resi`) VALUES
('20191130073011', '191104103137', 'Ica sayang', '083824413480', '30 Nov 2019', 'Cikapundung', 'Jawa Barat', 'Kab.Bandung', 'Banjaran', 'Mekarjaya', '40377', '395000', 'Pembayaran', '', '', '2', '', NULL, 'w'),
('20191130073453', '191104103137', 'Ica sayang', '083824413480', '30 Nov 2019', 'Cikapundung', 'Jawa Barat', 'Kab.Bandung', 'Banjaran', 'Mekarjaya', '40377', '395000', 'Transfer Bank', 'J&T', '20000', '0', '', NULL, ''),
('20191130073723', '191104103137', 'Ica sayang', '083824413480', '30 Nov 2019', 'Cikapundung', 'Jawa Barat', 'Kab.Bandung', 'Banjaran', 'Mekarjaya', '40377', '395000', 'Transfer Bank', 'J&T', '20000', '3', '', NULL, ''),
('20191130080933', '191104103137', 'Dendi Nurmahmudi', '083824413480', '30 Nov 2019', 'da', 'Jawa Barat', 'Kab.Bandung', 'Banjaran', 'Mekarjaya', '40377', '395000', 'Transfer Bank', 'J&E', '20000', '0', '', NULL, ''),
('20191202053507', '191104103137', 'Dendi Nurmahmudi', '08976754563786', '02 Dec 2019', 'Ciapus', 'Jawa Barat', 'Bandung', 'Banjaran', 'Mekarjaya', '40377', '395000', 'Transfer Bank', 'J&E', '20000', '2', '', NULL, ''),
('20191215015838', '12345', '', '', '15 Dec 2019', '', '', '', '', '', '', '1195000', 'Pembayaran', 'Jasa Ekspedisi', '', '2', '', NULL, ''),
('191224015343', '191212072333', 'Dendi Nurmahmudi', '00987654321', '24 Dec 2019', 'Cihideung', 'Jawa Barat', 'Kab.Bandung', 'Banjaran, ', 'Mekarjaya', '40377', '30000', '', 'J&T', '10000', '4', '', '08 Jan 2020', ''),
('191224015807', '191212072333', 'owqe', '2', '24 Dec 2019', 'iuhg', 'jh', 'jh', 'jh, ', 'jh', 'jh', '35000', '', 'J&T', '10000', '3', '', NULL, ''),
('191227022015', '191212072333', 'Adi Beuteng', '08976754563786', '27 Dec 2019', 'Bukit', 'Jawa Barat', 'Kab.Bandung', 'Banjaran, ', 'Mekarjaya', '40377', '70000', '', 'J&E', '20000', '1', 'Picture_002.jpg', NULL, ''),
('191227024124', '191212072333', 'Damin', '08976754563786', '27 Dec 2019', 'kkk', 'Jawa Barat', 'Kab.Bandung', 'Banjaran, ', 'mkad', '40377', '30000', '', 'J&T', '10000', '1', 'scanner_20190822_110415-picsay.jpg', NULL, ''),
('191227025901', '191222073948', 'Cahyadi Anwar', '08976754563786', '27 Dec 2019', 'Cibuntu', 'Jawa Barat', 'Kab.Bandung', 'Banjaran, ', 'Mekarjaya', '40377', '110000', 'Transfer Bank', 'J&E', '90000', '3', 'scanner_20190822_111055-picsay.jpg', NULL, '1'),
('191227030419', '191222073948', 'Adi Beuteng', '08976754563786', '27 Dec 2019', 'Ci', 'Jawa Barat', 'Kab.Bandung', 'Banjaran, ', 'Mekarjaya', '40377', '110000', 'Transfer Bank', 'J&E', '20000', '3', 'scanner_20190822_111942-picsay.jpg', NULL, 'JP09872345677654RT'),
('191227031001', '191227030902', 'Maman', '09876543', '27 Dec 2019', 'Cihideung', 'Jawa Barat', 'Kab.Bandung', 'banjaran, ', 'Mekarjaya', '40377', '50000', 'Transfer Bank', 'J&T', '10000', '4', 'scanner_20190822_111942-picsay1.jpg', '28 Dec 2019', ''),
('191227054339', '191227030902', 'q', '7', '27 Dec 2019', 's', 'w', 'w', 'w, ', 'w', 'w', '150023', 'Jasa pembayaran', 'Jasa Ekspedisi', '23', '1', 'Picture_0024.jpg', NULL, ''),
('191228073117', '191227030902', 'w', '8', '28 Dec 2019', 'u', 'u', 'u', 'u, ', 'u', 'u', '50010', 'Transfer Bank', 'J&T', '10', '4', 'scanner_20190822_111055-picsay1.jpg', NULL, ''),
('191228073215', '191227030902', 'Mahmud', '000987654', '28 Dec 2019', 'i', 'j', 'j', 'j, ', 'j', 'j', '135000', 'Jasa pembayaran', 'Ninja Express', '10000', '3', 'Picture_0025.jpg', NULL, ''),
('191228083909', '191227030902', 'ada', '8', '28 Dec 2019', 'u', 'u', 'u', 'u, ', 'u', 'u', '60000', 'Jasa pembayaran', 'Jasa Ekspedisi', ' 10000', '1', 'Picture_0026.jpg', NULL, ''),
('191228084102', '191227030902', 'adau', '8', '28 Dec 2019', 'u', 'u', 'u', 'u, ', 'u', 'u', '110000', 'Jasa pembayaran', 'J&E', '10000', '3', 'Picture_0027.jpg', NULL, ''),
('191228084102', '191227030902', 'adau', '8', '28 Dec 2019', 'u', 'u', 'u', 'u, ', 'u', 'u', '110000', 'Jasa pembayaran', 'J&E', '10000', '3', 'Picture_0028.jpg', NULL, ''),
('191228084541', '191227030902', 'ua', '8', '28 Dec 2019', 'u', 'u', 'u', 'u, ', 'u', 'u', '135000', 'Jasa pembayaran', 'J&T', '10000', '4', 'Picture_0029.jpg', '28 Dec 2019', ''),
('191228084641', '191227030902', 'ka', '0', '28 Dec 2019', 'k', 'k', 'k', 'k, ', 'k', 'k', '35000', 'Transfer Bank', 'Ninja Express', '10000', '4', 'scanner_20190822_111942-picsay2.jpg', NULL, ''),
('200104103625', '191227030902', 'Dendi Nurmahmudi', '8988880', '04 Jan 2020', 'Jl petukangan', '10', '49', ', ', '', '', '271000', 'Transfer Bank', 'jne', '21000', '1', 'logolikelok.png', NULL, ''),
('200104010151', '191227030902', 'Dadang', '09876543', '04 Jan 2020', 'jljas', '10', '163', '', '', NULL, '39000', 'Transfer Bank', 'tiki', '19000', '1', 'vlcsnap-2018-08-21-09h33m11s575.png', NULL, ''),
('200104012211', '191227030902', 'Maman', '099876543', '04 Jan 2020', 're', '9', '22', '', '', NULL, '28000', 'Transfer Bank', 'jne', '8000', '4', 'likelok2.png', '06 Jan 2020', ''),
('200105054847', '191227030902', 'Manisan', '098765432', '05 Jan 2020', 'Jl burangrang', '9', '23', '', '', NULL, '508000', 'Transfer Bank', 'jne', '8000', '1', 'Baby_Bottle_48px.png', NULL, ''),
('200105062144', '191227030902', 'po', '0987', '05 Jan 2020', 'iuy', '9', '34', '', '', NULL, '714000', 'Transfer Bank', 'pos', '14000', '4', 'Baby_Bottle_48px1.png', '08 Jan 2020', ''),
('200105075450', '191212072333', 'Dendi Nurmahmudi', '089765432', '05 Jan 2020', 'Jl pesanggrahan', '10', '163', '', '', NULL, '36000', 'Transfer Bank', 'jne', '16000', '2', 'vlcsnap-2018-06-21-12h39m47s219.png', NULL, ''),
('200106053716', '191212072333', 'Dendi Nurmahmudi', '9', '06 Jan 2020', 'a', '9', '22', '', '', NULL, '358000', 'Transfer Bank', 'tiki', '8000', '1', '881f024398b34d7779316bde0c47e0c7.jpg', NULL, ''),
('200106100027', '191212072333', 'Dendi Nurmahmudi', '089765543565', '06 Jan 2020', 'jl ', '10', '163', '', '', NULL, '616000', 'Transfer Bank', 'jne', '16000', '4', 'socer.jpg', '06 Jan 2020', ''),
('200107061802', '191227030902', 'Dendi Nurmahmudi', '2', '07 Jan 2020', 'sa', '', '', '', '', NULL, '300000', 'Jasa pembayaran', '', '', '1', 'rel.jpg', NULL, ''),
('200110094114', '191227030902', 'we1', '1', '10 Jan 2020', '2', '18', '21', ', ', NULL, '', '214000', 'pembayaran', 'pos', '19000', '1', '881f024398b34d7779316bde0c47e0c73.jpg', NULL, ''),
('200110094114', '191227030902', 'we1', '1', '10 Jan 2020', '2', '18', '21', ', ', NULL, '', '214000', 'pembayaran', 'pos', '19000', '1', '881f024398b34d7779316bde0c47e0c74.jpg', NULL, ''),
('200110094449', '191227030902', 'mamih muda', '09987654321', '10 Jan 2020', 'jl randa', '17', '172', ', ', NULL, '', '238000', 'Transfer Bank', 'jne', '43000', '1', 'alone.jpg', NULL, ''),
('200110094449', '191227030902', 'mamih muda', '09987654321', '10 Jan 2020', 'jl randa', '17', '172', ', ', NULL, '', '238000', 'Transfer Bank', 'jne', '43000', '1', 'alone1.jpg', NULL, ''),
('200110094449', '191227030902', 'mamih muda', '09987654321', '10 Jan 2020', 'jl randa', '17', '172', ', ', NULL, '', '238000', 'Transfer Bank', 'jne', '43000', '1', 'alone2.jpg', NULL, ''),
('200110094449', '191227030902', 'mamih muda', '09987654321', '10 Jan 2020', 'jl randa', '17', '172', ', ', NULL, '', '238000', 'Transfer Bank', 'jne', '43000', '1', 'alone3.jpg', NULL, ''),
('200110094449', '191227030902', 'mamih muda', '09987654321', '10 Jan 2020', 'jl randa', '17', '172', ', ', NULL, '', '238000', 'Transfer Bank', 'jne', '43000', '1', 'alone4.jpg', NULL, ''),
('200110102509', '191227030902', 'maman', '098765432', '10 Jan 2020', 'qw', '4', '64', ', ', NULL, '', '237000', 'pembayaran', 'jne', '42000', '1', 'alone5.jpg', NULL, ''),
('200110103224', '191227030902', 'op', '0', '10 Jan 2020', 'wq', '2', '28', ', ', NULL, '', '233000', 'pembayaran', 'jne', '38000', '1', 'buble.jpg', NULL, ''),
('200110104328', '191227030902', 'mamin', '0789', '10 Jan 2020', 'qw', '2', '29', ', ', NULL, '', '233000', 'pembayaran', 'jne', '38000', '1', 'hiking.jpg', NULL, ''),
('200110104328', '191227030902', 'mamin', '0789', '10 Jan 2020', 'qw', '2', '29', ', ', NULL, '', '233000', 'pembayaran', 'jne', '38000', '1', 'hiking1.jpg', NULL, ''),
('200110105244', '191227030902', 'mamah tua', '809876543', '10 Jan 2020', 'io', '2', '28', ', ', NULL, '', '233000', 'pembayaran', 'jne', '38000', '4', 'car.jpg', '20 Jan 2020', '223123'),
('200111020619', '200109055731', 'Icih', '089876543', '11 Jan 2020', 'Jl kenangan', '6', '151', ', ', NULL, '', '640000', 'Transfer Bank', 'jne', '10000', '2', '881f024398b34d7779316bde0c47e0c75.jpg', NULL, ''),
('200111020619', '200109055731', 'Icih', '089876543', '11 Jan 2020', 'Jl kenangan', '6', '151', ', ', NULL, '', '640000', 'Transfer Bank', 'jne', '10000', '2', '881f024398b34d7779316bde0c47e0c76.jpg', NULL, ''),
('200111023637', '200109055731', 'mamihnya icih', '12345678', '11 Jan 2020', 'uih', '10', '37', NULL, NULL, NULL, '646000', 'Bayar Di tempat', 'jne', '16000', '4', 'Likelok1.png', '12 Jan 2020', ''),
('200118052951', '200109055731', 'Idah', '099876543', '18 Jan 2020', 'Jl martapura', '19', '14', '', '', NULL, '96000', 'Transfer Bank', 'jne', '76000', '2', 'buble3.jpg', NULL, ''),
('200118053135', '200109055731', 'Dadang modif', '08987654321', '18 Jan 2020', 'Langkung sae', '18', '21', NULL, NULL, NULL, '159000', 'Transfer Bank', 'pos', '19000', '2', 'brown.jpg', NULL, ''),
('200118073506', '200118073336', 'Anisa Dwi', '08987654321', '18 Jan 2020', 'Jl antasari ashar no 11 desa mekarjaya kecamatan banjaran kabupaten bandung 40377', '18', '496', '', '', NULL, '54500', 'Transfer Bank', 'tiki', '24500', '3', 'alone6.jpg', NULL, '2'),
('200118073646', '200118073336', 'Anisa Dwi', '0898765432', '18 Jan 2020', 'jl asmara', '19', '14', NULL, NULL, NULL, '4095000', 'Transfer Bank', 'pos', '80000', '4', 'anak.jpg', '18 Jan 2020', ''),
('200120050523', '191227030902', 'Dendi Nurmahmudi', '3342', '20 Jan 2020', 'aaaaaaaaa', '9', '22', '', '', NULL, '358000', 'Jasa pembayaran', 'jne', '8000', '4', 'brown1.jpg', '20 Jan 2020', ''),
('200120103519', '191222073948', 'Maman iuh', '090987654321', '20 Jan 2020', 'Jl cimahi', '19', '14', '', '', NULL, '276000', 'Transfer Bank', 'jne', '76000', '4', 'car1.jpg', '20 Jan 2020', 'JP00930231'),
('200120104247', '191227030902', 'Dendi Nurmahmudi', '90987654', '20 Jan 2020', 'uih', '9', '22', NULL, NULL, NULL, '203000', 'Transfer Bank', 'jne', '8000', '3', 'baby.jpg', NULL, '12'),
('200121083421', '200109055731', 'Samsul', '09098765432', '21 Jan 2020', 'Jl kujangianikahsj ', '9', '23', '', '', NULL, '33000', 'Transfer Bank', 'jne', '8000', '4', 'vlcsnap-2018-06-21-11h59m18s174.png', '21 Jan 2020', 'JP09873645623'),
('200122062126', '191227030902', 'Luthfi', '08373', '22 Jan 2020', 'jln snsnsn', '6', '151', '', '', NULL, '260000', 'Transfer Bank', 'jne', '10000', '4', 'anak1.jpg', '22 Jan 2020', '333333'),
('200122062956', '191227030902', 'kamal', '8399', '22 Jan 2020', 'jln aa', '9', '126', '', '', NULL, '29000', 'Transfer Bank', 'tiki', '9000', '3', 'anak2.jpg', NULL, 'JP2201931280239DN'),
('200801062213', '191227030902', 'Dendi Nurmahmudi', '08976754563', '01 Aug 2020', 'jl marga', '2', '27', NULL, NULL, NULL, '258000', 'Transfer Bank', 'jne', '38000', '4', '881f024398b34d7779316bde0c47e0c77.jpg', '01 Aug 2020', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` varchar(50) NOT NULL,
  `id_userpesan` varchar(50) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `jumlahcheck` varchar(40) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `subtotal` varchar(50) NOT NULL,
  `jumlahxharga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_userpesan`, `id_barang`, `jumlahcheck`, `harga`, `subtotal`, `jumlahxharga`) VALUES
('20191130073011', '191104103137', '1', '3', '15000', '395000', '45000'),
('20191130073011', '191104103137', '3', '0', '25000', '395000', '0'),
('20191130073011', '191104103137', '4', '0', '20000', '395000', '0'),
('20191130073011', '191104103137', '6', '1', '350000', '395000', '350000'),
('20191130073453', '191104103137', '1', '3', '15000', '395000', '45000'),
('20191130073453', '191104103137', '3', '0', '25000', '395000', '0'),
('20191130073453', '191104103137', '4', '0', '20000', '395000', '0'),
('20191130073453', '191104103137', '6', '1', '350000', '395000', '350000'),
('20191130073723', '191104103137', '1', '3', '15000', '395000', '45000'),
('20191130073723', '191104103137', '3', '0', '25000', '395000', '0'),
('20191130073723', '191104103137', '4', '0', '20000', '395000', '0'),
('20191130073723', '191104103137', '6', '1', '350000', '395000', '350000'),
('20191130080933', '191104103137', '1', '3', '15000', '395000', '45000'),
('20191130080933', '191104103137', '3', '0', '25000', '395000', '0'),
('20191130080933', '191104103137', '4', '0', '20000', '395000', '0'),
('20191130080933', '191104103137', '6', '1', '350000', '395000', '350000'),
('20191202053507', '191104103137', '1', '3', '15000', '395000', '45000'),
('20191202053507', '191104103137', '3', '0', '25000', '395000', '0'),
('20191202053507', '191104103137', '4', '0', '20000', '395000', '0'),
('20191202053507', '191104103137', '6', '1', '350000', '395000', '350000'),
('20191215015838', '12345', '1', '3', '15000', '1195000', '45000'),
('20191215015838', '12345', '3', '6', '25000', '1195000', '150000'),
('20191215015838', '12345', '5', '4', '250000', '1195000', '1000000'),
('191224015343', '191212072333', '10', '00987654321', '20000', '20000', '30000'),
('191224015807', '191212072333', '3', '2', '25000', '25000', '35000'),
('191227022015', '191212072333', '3', '08976754563786', '25000', '50000', '70000'),
('191227024124', '191212072333', '11', '08976754563786', '20000', '20000', '30000'),
('191227025901', '191222073948', '10', '08976754563786', '20000', '20000', '110000'),
('191227030419', '191222073948', '23', '1', '90000', '90000', '110000'),
('191227031001', '191227030902', '22', '2', '20000', '40000', '50000'),
('191227054339', '191227030902', '1', '10', '15000', '150000', '150023'),
('191228073117', '191227030902', '3', '2', '25000', '50000', '50010'),
('191228073215', '191227030902', '3', '5', '25000', '125000', '135000'),
('191228083909', '191227030902', '3', '2', '25000', '50000', '60000'),
('191228084102', '191227030902', '3', '4', '25000', '100000', '110000'),
('191228084541', '191227030902', '3', '5', '25000', '125000', '135000'),
('191228084641', '191227030902', '3', '1', '25000', '25000', '35000'),
('200104103625', '191227030902', '5', '1', '250000', '250000', '271000'),
('200104010151', '191227030902', '25', '1', '20000', '20000', '39000'),
('200104012211', '191227030902', '11', '1', '20000', '20000', '28000'),
('200105054847', '191227030902', '5', '2', '250000', '500000', '508000'),
('200105062144', '191227030902', '6', '2', '350000', '700000', '714000'),
('200105075450', '191212072333', '11', '1', '20000', '20000', '36000'),
('200106053716', '191212072333', '6', '1', '350000', '350000', '358000'),
('200106100027', '191212072333', '28', '2', '300000', '600000', '616000'),
('200107061802', '191227030902', '28', '1', '300000', '300000', '300000'),
('', '1', '26', '2', '( Rp.60,000.- )', '', '2'),
('', '9', '4', '3', '( Rp.25,000.- )', '', '3'),
('200110104328', '191227030902', '26', '2', '( Rp.60,000.- )', '233000', ''),
('200110104328', '191227030902', '4', '3', '( Rp.25,000.- )', '233000', ''),
('200110105244', '191227030902', '26', '2', '60000', '233000', '120000'),
('200110105244', '191227030902', '4', '3', '25000', '233000', '75000'),
('200111020619', '200109055731', '1', '2', '15000', '640000', '30000'),
('200111020619', '200109055731', '28', '2', '300000', '640000', '600000'),
('200111023637', '200109055731', '1', '2', '15000', '646000', '30000'),
('200111023637', '200109055731', '28', '2', '300000', '646000', '600000'),
('200118052951', '200109055731', '25', '1', '20000', '20000', '96000'),
('200118053135', '200109055731', '25', '1', '20000', '159000', '20000'),
('200118053135', '200109055731', '26', '2', '60000', '159000', '120000'),
('200118073506', '200118073336', '29', '1', '30000', '30000', '54500'),
('200118073646', '200118073336', '1', '1', '15000', '4095000', '15000'),
('200118073646', '200118073336', '20', '2', '2000000', '4095000', '4000000'),
('200120050523', '191227030902', '6', '1', '350000', '350000', '358000'),
('200120103519', '191222073948', '27', '1', '200000', '200000', '276000'),
('200120104247', '191227030902', '26', '2', '60000', '203000', '120000'),
('200120104247', '191227030902', '4', '3', '25000', '203000', '75000'),
('200121083421', '200109055731', '4', '1', '25000', '25000', '33000'),
('200122062126', '191227030902', '5', '1', '250000', '250000', '260000'),
('200122062956', '191227030902', '25', '1', '20000', '20000', '29000'),
('200801062213', '191227030902', '25', '2', '20000', '258000', '40000'),
('200801062213', '191227030902', '26', '3', '60000', '258000', '180000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `stok` varchar(15) NOT NULL,
  `id_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `nama_product`, `foto`, `deskripsi`, `status`, `harga`, `category`, `stok`, `id_user`) VALUES
(1, 'jam', 's-p1.jpg', 'Dibuat dari bahan metalik dan kuat', 'on', '15000', '1', '2', '191104102519'),
(4, 'Nike Speed', 'c3.jpg', 'Terbuat dari singkong pilihan', 'on', '25000', '1', '1', ''),
(5, 'Sepatu nike', 'c2.jpg', 'Dijamin mulus', 'on', '250000', '2', '1', ''),
(6, 'Sepatu nike', 'c4.jpg', 'Dijamin genaheun', 'on', '350000', '2', '1', ''),
(10, 'Pentopel', 'brown.jpg', 'membuat anda lebih segar dan nikmat', 'on', '20000', '2', '5', '191104102519'),
(20, 'Jejak kaki', 'hiking.jpg', 'Bagus', 'on', '2000000', '2', '3', ''),
(23, 'Sepatu anak', 'shoe.jpg', 'Untuk anak', 'on', '90000', '3', '5', ''),
(25, 'Sepatu Rajut', 'baby.jpg', 'adaan', 'on', '20000', '4', '24', ''),
(26, 'Hiking', 'car.jpg', 'bapa maneh', 'on', '60000', '4', '5', ''),
(27, 'Nike', 'rel.jpg', 'Nike asli', 'on', '200000', '4', '14', ''),
(28, 'Adidas', 'alone.jpg', 'Adidas asli', 'on', '300000', '6', '18', ''),
(29, 'Sepatu lari', 'horse.jpg', 'Membuat kaki anda aman', 'on', '30000', '4', '19', ''),
(30, 'Sepatu Model 2', 'default1.png', 'Dibuat langsung dari pabrik dan di distribusikan melalui proses cuality control yang ketat', 'on', '300000', '2', '100', ''),
(38, 'Sepatu cv', 'legs-434918.jpg', '', 'on', '100000', '2', '90', ''),
(39, 'Sepatu', 'gambardefault.png', 'ada', 'on', '200000', '4', '10', ''),
(40, 'wq', 'rel1.jpg', 'qw', 'on', '8', '2', '9', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `norek` varchar(30) NOT NULL,
  `an` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`norek`, `an`, `level`) VALUES
('kamingsun', 'kamingsun', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `id_user` varchar(50) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_testimoni`
--

INSERT INTO `tbl_testimoni` (`id_user`, `id_barang`, `rating`, `deskripsi`, `foto`, `tgl`) VALUES
('191212072333', '28', '5', 'Bagus', NULL, '08 Jan 2020'),
('191212072333', '28', '5', 'wakwaw', NULL, '08 Jan 2020'),
('191212072333', '28', '5', 'ini bagus tapi ada buble nya', 'buble.jpg', '08 Jan 2020'),
('191212072333', '6', '3', 'Alus pisan euy pengiriman cepat', 'anak.jpg', '09 Jan 2020'),
('191227030902', '6', '2', 'Butut', NULL, '10 Jan 2020'),
('200109055731', '28', '2', 'Jam dan adidas', 'horse.jpg', '12 Jan 2020'),
('200109055731', '28', '1', 'butut', NULL, '12 Jan 2020'),
('200109055731', '1', '2', 'Beda sama gambar', 'anak.jpg', '12 Jan 2020'),
('191227030902', '6', '3', 'ararateul', NULL, '16 Jan 2020'),
('191227030902', '6', '5', 'butut', NULL, '16 Jan 2020'),
('191227030902', '6', '1', 'bagus sih tapiiii......', 'alone.jpg', '17 Jan 2020'),
('200118073336', '20', '5', 'Bagus pengiriman cepat barang OK', 'hiking.jpg', '18 Jan 2020'),
('191222073948', '27', '4', 'Bagussss', NULL, '20 Jan 2020'),
('200109055731', '4', '3', 'Waw', NULL, '21 Jan 2020'),
('191227030902', '5', '4', 'aaaaa', NULL, '22 Jan 2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nama` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `photos` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notlp` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `level` varchar(30) NOT NULL,
  `status_aktif` varchar(10) NOT NULL,
  `id_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`nama`, `password`, `username`, `photos`, `email`, `notlp`, `alamat`, `level`, `status_aktif`, `id_user`) VALUES
('Dendi Mahmud', '$2y$10$LsC/KSiAf3fGmGy3e3YHruFjrO8XNJtzc8PYv8hk3dXUXT7E2b/aS', 'dendinurmahmudi', 'IMG_20171226_061642_3443.jpg', 'dendinurmahmudi3@gmail.com', '083824413480', 'Kp. Cibaribis rt 01', '2', '1', '12345'),
('Dendi Mahmud', '$2y$10$seMcAj0A6It72Fug3NsOyuPPqM4Kg1oIA3kW9YBewJC.90MDNzfDm', 'mahmud', 'IMG_20171226_061642_34431.jpg', 'hadiana@gmail.com', '', '', '1', '1', '191212072333'),
('Dadang', '$2y$10$WrEN.fi7XIOIn7FGa1eiAeuZgVrL26t8ZkE1OsehhA6nIRmiRDuQG', 'dadang01', 'default.png', 'dadang20@gmail.com', '', '', '1', '1', '191222073948'),
('Nurmahmudi', '$2y$10$0VvAv.BAjxK1f5oP0uTObeDqyf0.YLmhq97t4ltfW1ohNKLOVS8Rq', 'nurmahmudi', 'default.png', 'mamaniroh@gmail.com', '', '', '1', '1', '191227030902'),
('Luthfi', '$2y$10$H6x6YcrE8XiokQIuPFzuwOAoxZxmsXCONqjclo75GerAW.aD8Q3.y', 'hm', 'default.png', 'kamal@gmail.com', '', '', '1', '1', '200106054313'),
('Mahmud', '$2y$10$cooYQU7Y4Sv1eJbo6XsiGOj3vCYWnCSiJPOh0gYL/Ojt5mDTiybu6', 'mahmud1', 'Picture_00231.jpg', 'mahmud@gmail.com', '', '', '1', '1', '200109055731'),
('ashfa', '$2y$10$BGWgcJXyQ/oU/4tM1waIceHlPwGz9UzkD6bqy8JoMFg6W9zpuf4t2', 'ashfa', 'default.png', 'ashfa@gmail.com', '', '', '2', '1', '200114040206'),
('Dzul', '$2y$10$V2b5VKePWOPtsv8EsYGYWeuaX48ORni0aLrGo9OjRC.gS.53/WxIi', 'taufiqdzul', 'default.png', 'taufiq@dzul.com', '', '', '1', '1', '200115062414'),
('Anisa Dwi', '$2y$10$m4PAlRnVNki8CrQQDQcjnenx326BHOg4xXdezotTaNgvziSBOL6EW', 'anisa', 'default.png', 'anisa@Gmail.com', '', '', '1', '1', '200118073336'),
('ajang', '$2y$10$NHBHQQTveGuAyZ1lMf.0ieoSarf5Og9G4RDledImu95Ah8FXwtHiS', 'ajang', 'default.png', 'hmbr@gmail.com', '', '', '1', '1', '200120044235'),
('ilham', '$2y$10$4ew5PiI6OPc7L3gU35dWiuAUIrSwJzk1ITIDf12eAwLR8w0vMuvJS', 'ilham', 'default.png', 'mrableh01@gmail.com', '', '', '2', '1', '200121074322');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
