-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 10:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dik`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL,
  `id_penulis` varchar(2) DEFAULT NULL,
  `id_kategori` varchar(3) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `tgl`, `id_penulis`, `id_kategori`, `gambar`) VALUES
(3, 'Bayayaysu', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc a suscipit lectus. In hac habitasse platea dictumst. Phasellus luctus eleifend ipsum, vitae consequat sem sagittis commodo. Donec hendrerit eu orci et sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean ut convallis leo. Curabitur erat tortor, vestibulum et orci quis, vehicula gravida magna. Suspendisse potenti. Curabitur tortor turpis, posuere eget finibus id, sagittis id lorem. Pellentesque varius mi lacus, non aliquet diam hendrerit at. Sed nec velit vel leo eleifend sagittis. Aliquam in libero quis turpis mattis auctor eu at enim. Sed tempor finibus est, quis posuere elit faucibus sed. Cras elementum, massa at elementum viverra, nibh leo viverra purus, quis convallis lacus enim id justo. Vivamus molestie risus in egestas mollis. Suspendisse condimentum gravida accumsan.\r\n\r\nNam congue purus a neque tempor sodales. Curabitur non turpis at ligula iaculis facilisis sed vitae erat. Quisque at justo maximus, consectetur nunc in, lobortis mi. Etiam efficitur felis sem, a volutpat odio facilisis sit amet. Cras lobortis pellentesque mauris non dictum. Aliquam aliquet bibendum justo, at dictum felis tincidunt vel. Pellentesque nunc tellus, efficitur nec lorem sit amet, bibendum porttitor risus. Fusce sed massa finibus, placerat tortor vel, egestas justo. Nullam ac tellus quis dolor blandit dictum. Vivamus sit amet fringilla risus, vel aliquet felis. Quisque nulla turpis, efficitur ut ultricies nec, imperdiet eget neque. Quisque at egestas elit.\r\n\r\nMauris vestibulum, enim vel ornare convallis, tortor nunc fermentum orci, ac bibendum purus mauris quis lectus. Sed risus eros, varius vel sollicitudin sit amet, hendrerit nec urna. Quisque placerat, turpis a convallis viverra, ante turpis fermentum ligula, ac luctus ipsum arcu commodo felis. Pellentesque quis consequat ante, sit amet sagittis eros. Donec congue egestas ipsum pharetra sollicitudin. Nullam vitae urna enim. Aenean sagittis interdum orci vel lacinia.\r\n\r\nMorbi varius consequat faucibus. Vivamus nisi quam, imperdiet at metus in, suscipit tincidunt felis. Cras volutpat sapien elit, vel pretium turpis bibendum ac. Morbi porta leo ac eros molestie scelerisque. In hac habitasse platea dictumst. Donec dictum iaculis nibh, quis gravida mi ultricies ut. Donec sed vestibulum massa. Duis nec justo ligula. Curabitur vel est libero. Maecenas ac tempor massa. Ut magna metus, dignissim et scelerisque imperdiet, blandit et mi. Proin euismod magna eu mauris fringilla consequat. Donec sit amet ornare ipsum. Proin tempor lectus ipsum, et elementum sem tempus et. ', '2024-07-03', 'MX', 'GAM', 'bc99ecfa2cb96daf8a486ca47c18ecfea705f902_s2_n2.png'),
(5, 'Games terbaik', 'game terbaik yang pernah ada pnifnaisnfianifbaibfisbafibasbfpa', '2024-07-03', 'BD', 'FLM', 'uwp3780693.jpeg'),
(6, 'Spiderman', 'ncjxjabdvjbdjvb', '2024-07-03', 'BD', 'FLM', 'eb83316c2e9e8b61b662724f1bed0f7ddbc2407b_s2_n2.png'),
(7, 'Jussiea', 'Doianonfa', '2024-07-03', 'BD', 'ENT', 'Screenshot (46).png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(3) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('ENT', 'Entertainment'),
('FLM', 'Film and TV Shows'),
('GAM', 'Game');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` varchar(2) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama`, `tgl_lahir`, `alamat`) VALUES
('BD', 'Badi', '2024-07-03', 'ajfnoansfoiabfouabf'),
('MX', 'Man man', '2024-07-02', 'Kirby');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penulis` (`id_penulis`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
