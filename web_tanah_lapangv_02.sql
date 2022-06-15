-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 04:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_tanah_lapangv.02`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL,
  `author` varchar(1000) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `judul`, `tanggal`, `author`, `isi`, `foto`) VALUES
(1, 'Hot News', '2022-05-18', 'admin2', 'hot', 'posyandu.jpg'),
(3, 'ASN Diajak Berkontribusi Ramaikan Objek Wisata dan Tingkatkan Daya Beli Produk UMKM!', '2022-05-26', 'LDKOM', 'Aparatur Sipil Negara (ASN) di Sawahlunto, Sumatera Barat (Sumbar), diajak untuk berkontribusi meramaikan objek wisata dan meningkatkan daya beli produk lokal UMKM pada momen libur lebaran.\r\n\r\nDemikian disampaikan oleh Sekretaris Daerah (Sedka) Kota Sawahlunto, Ambun Kadri, melansir Antara, Jumat (29/4/2022).\r\n\r\n\"Dalam semangat memulihkan dan meramaikan objek wisata Sawahlunto, kami mengajak ASN agar mengajak teman dan keluarga termasuk yang pulang dari rantau untuk mengunjungi objek wisata kita,\" kata Ambun.\r\n\r\nDirinya juga mengajak ASN untuk menggunakan produk-produk yang dibuat oleh para pelaku UMKM.\r\n\r\n\"Mari bersama kita memprioritaskan untuk membeli produk dari UMKM Sawahlunto, sebagai wujud partisipasi dalam mendukung ekonomi produktif masyarakat,\" ujar dia mengajak.\r\n\r\nProduk lokal Sawahlunto saat ini sudah banyak dan kualitasnya pun tidak kalah dengan produk luar.\r\n\r\n\"Produk UMKM Sawahlunto juga sudah mulai banyak yang go digital, jadi lebih mudah dalam menemukan dan memesannya secara online. Ini salah satu keunggulan yang bisa menjadi pertimbangan kita untuk memilih produk lokal,\" jelasnya', '35314-sekretaris-daerah-sedka-kota-sawahlunto-ambun-kadri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `det_dom`
--

CREATE TABLE `det_dom` (
  `id_penduduk` int(11) NOT NULL,
  `id_status1` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `det_dom`
--

INSERT INTO `det_dom` (`id_penduduk`, `id_status1`, `tgl`) VALUES
(13, 1, '2022-05-15'),
(21, 2, '2022-05-16'),
(22, 2, '2022-05-25'),
(23, 1, '2022-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `det_hidup`
--

CREATE TABLE `det_hidup` (
  `id_penduduk` int(11) NOT NULL,
  `id_status2` int(11) NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `det_hidup`
--

INSERT INTO `det_hidup` (`id_penduduk`, `id_status2`, `tgl`) VALUES
(13, 3, '2022-05-15'),
(21, 2, '2022-05-16'),
(22, 3, '2022-05-25'),
(23, 1, '2022-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `id_jenis`, `alamat`, `foto`) VALUES
(7, 'Mushalla Surau Tengah', 2, 'Tangsi Baru RT 03 RW 02', 'masjid-agung-karanganyar-1.jpg'),
(8, 'Masjid Nurul Ikhlas', 2, 'Gang 7 RT 02 RW 01', '28e4d773-8344-4eaf-bcdd-ef207a2bb242_169.jpeg'),
(9, 'Gereja Katolik', 2, 'RT 01 RW 01', 'download.JPG'),
(10, 'SD N 10 Tanah Lapang', 3, 'Gang 1 RT 01 RW 01', 'sd10.jpg'),
(11, 'SDIT Ishalul Ummah', 1, 'Tangsi Baru RT 03 RW 02', 'sdit.jpg'),
(12, 'Posyandu Wistayonger', 1, 'Tangsi Baru RT 04 RW 02', 'posyandu.png'),
(13, 'Posyandu Melati', 1, 'RT 02 RW 01', 'posyandu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_fasilitas`
--

CREATE TABLE `jenis_fasilitas` (
  `idf` int(11) NOT NULL,
  `jenis` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_fasilitas`
--

INSERT INTO `jenis_fasilitas` (`idf`, `jenis`) VALUES
(1, 'Bangunan Pemerintah'),
(2, 'Tempat Ibadah'),
(3, 'Gedung Sekolah'),
(4, 'Fasilitas Umum');

-- --------------------------------------------------------

--
-- Table structure for table `jk`
--

CREATE TABLE `jk` (
  `id_jk` int(11) NOT NULL,
  `jenis` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jk`
--

INSERT INTO `jk` (`id_jk`, `jenis`) VALUES
(1, 'Perempuan'),
(2, 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `ketua` varchar(1000) NOT NULL,
  `bidang` varchar(1000) NOT NULL,
  `nohp` varchar(1000) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `foto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id`, `nama`, `ketua`, `bidang`, `nohp`, `deskripsi`, `foto`) VALUES
(1, 'KUDA KEPANG HARAPAN JAYA', 'aku', '', '', '    Kuda lumping/ Kuda Kepang adalah seni tari yang dimainkan dengan properti berupa kuda tiruan, yang terbuat dari anyaman bambu atau bahan lainnya dengan dihiasi rambut tiruan dari tali plastik atau sejenisnya yang di gelung atau di kepang, sehingga pada masyarakat jawa sering disebut sebagai jaran kepang. Tidak satupun catatan sejarah mampu menjelaskan asal mula tarian ini, hanya riwayat verbal yang diturunkan dari satu generasi ke generasi berikutnya. Konon, tari kuda lumping adalah tari kesurupan. \r\n     Ada pula versi yang menyebutkan, bahwa tari kuda lumping menggambarkan kisah seorang pasukan pemuda cantik bergelar Jathil penunggang kuda putih berambut emas, berekor emas, serta memiliki sayap emas yang membantu pertempuran kerajaan bantarangin melawan pasukan penunggang babi hutan dari kerajaan lodaya pada serial legenda reog abad ke 11. Terlepas dari asal usul dan nilai historisnya, tari kuda lumping merefleksikan semangat heroisme dan aspek kemiliteran sebuah pasukan berkuda atau kavaleri. Hal ini terlihat dari gerakan-gerakan ritmis, dinamis, dan agresif, melalui kibasan anyaman bambu, menirukan gerakan layaknya seekor kuda di tengah peperangan. \r\n     Seringkali dalam pertunjukan tari kuda lumping, juga menampilkan atraksi yang mempertontonkan kekuatan supranatural berbau magis, seperti atraksi mengunyah kaca, menyayat lengan dengan golok, membakar diri, berjalan di atas pecahan kaca, dan lain-lain. Mungkin, atraksi ini merefleksikan kekuatan supranatural yang pada zaman dahulu berkembang di lingkungan Kerajaan Jawa, dan merupakan aspek non militer yang dipergunakan untuk melawan pasukan Belanda.', 'kudakepang.JPG'),
(2, 'KERONCONG SETIA ABADI', '-', '', '', 'Keroncong adalah aliran musik di Indonesia yang memadukan antara musik daerah dan musik kolonial dari masa Portugia dan Belanda. Keroncong ditandai dengan penggunaan alat musik ukulele (sejenis gitar kecil), gitar, biola, piano dan seruling. Keroncong berawal dari musik yang dibawa pedagang dan pelaut Portugus, ketika mereka tiba di Nusantara mulai abad ke 16 M (tahun 1500an). Musik keroncong ini dikembangkan dari musik ini, terutama terlihat dari pengaruh ukulele dan gitar yang berasal dari alat musik Portugis yang diaebut braquinha. Awalnya musik ini dinainkan oleh kalanga bawah, seperti para budak dan buruh yang bekerja pada orang Portugis. Perkembangan keroncong ini bisa terlihat dari pusat keroncong di wilayah Tugu, Jakarta. Penduduk wikayah ini dulunya kebanyakan adalah orang Mardijker, yaitu keturunan budak Portugis yang banyak mengadaptasi budaya Portugis. Keroncong Tugu menjadi jenis keroncong yang sangat populer pada masa penjajahan. Lama kelamaan musik keroncong kaum kalangan atas seperti para penjajah Belanda dan orang Indo (campuran Belanda dan Indonesia). Keroncong juga dahulu popular di kalangan penduduk asli Indonesia. Di kalangan priyayo, keroncong yang popular adalah yang menggabungkan pengaruh musik gamelan, yang disebut dengan keroncong Langgam Jawa. Namun kepopuleran keroncong mulai meredum sejak tahun 1960an, seiring dengan masuknya pengaruh musik barat kontemporer seperti pop dan rock. Alat musik yang dipakai di keroncong meliputi seruling, biola, cello, contrabass, cuk (ukulele dengan senar nilon), cak (Ukulele dengan senar logam), gitar, dan vokalis. Keroncong versi modern bisa menambahkan instrumen lain seperti saksofon keyboard', 'keroncongsetia.JPG'),
(3, 'SANGGAR GALANG MAIMBAU', '-', '', '', '-', 'sanggargalang.JPG'),
(4, 'KINANTAN KIM', '-', '', '', '-', 'kinantankim.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `pariwisata`
--

CREATE TABLE `pariwisata` (
  `id` int(11) NOT NULL,
  `nama_wisata` varchar(500) NOT NULL,
  `tempat` varchar(1000) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pariwisata`
--

INSERT INTO `pariwisata` (`id`, `nama_wisata`, `tempat`, `keterangan`) VALUES
(12, 'LUBANG MBAH SOERO', 'TANGSI BARU RT 03 RW 02', 'Sawahlunto adalah situs tambang batu bara tertua di Asia Tenggara. Terletak di lembah sempit di sepanjang pegunungan Bukit Barisan, kota Sawahlunto dikeliling beberapa bukit seperti Bukit Polan, Bukit Pari, dan Bukit Mato. Di Sawahlunto tedapat sebuah lubang bekas tambang batu bara. Lubang tersebut menyimpan sejarah kelam tentang orang rantai. Salah satunya adalah Mbah Suro yang menjadi mandor para orang rantai di Sawahlunto. Nama Mbah Suro dijadikan nama salah satu lubang utama bekas tambang yang adi di Tangsi Baru, Kelurahan Tanah Lapang, Kecamatan Lembah Segar. Orang rantai adalah sebutan bagi para pekerja tambang di Sawahlunto. Mereka dikirim dari berbagai daerah di Hindia Belanda termasuk Batavia. Mereka adalah pesakitan yakni tahanan kriminal atau politik dari wilayah Jawa dan Sumatra. Mereka dibawa ke Sawahlunto dengan kaki, tangan, dan leher diikat rantai. Mereka dipaksa bekerja sebagai kuli tambang batu bara dengan kondisi kaki, tangan, dan leher yang masih dirantai. Dalam bahasa Belanda, para kuli disebut ketingganger atau orang rantai. Mereka dipekerjakan hingga tahun 1898. Mbah Suro adalah seorang mandor orang rantai. Pria yang memilki nama\r\nlemhak Soerono dikenal memiliki ilmu kebatinan yang tinggi dan menjadi panutan serta disegani oleh warga sekitar. Mbah Suro memiliki lima anak dengan 13 cucu. Istrinya adalah seorang dukun beranak. Mbah Suro meninggal sebelum tahun 1930 dan ia dimakamkan di pemakaman orang rantai yakni di Tanjung Sari, Kota Sawahlunto. Diceritakan jumlah orang rantai yang bekerja di lubang tersebut berjumlah ratusan orang. Mereka diberlakukan dengan tidak manusiawi dan bekerja siang hingga malam serta tidak mendapatkan '),
(13, 'MUSEUM GUDANG RANSOEM', 'TANGSI BARU RT 04 RW 02', 'Kawasan sejarah gudang ransum ini terdiri dari sejumlah bangunan, bangunan utama adalah tempat memasak, kemudian ada sejumlah\r\ngudang, ada menara asap sebagai sumber energi (stema generataor, peralatan yang cukup luas mengelilingi bangunan tersebut). Kawasan\r\ngudang ransum ini kemudian disulap menjadi Museum Gudang Ransum dan diresmikan tahun 20005 oleh Wakil Presiden RI Jusuf Kalla. Gudang ransum kemudian direnovasi untuk dikembalikan bentuknya seperti semula atau memunculkan kembali nilai-nilai yang dipunyainya. Melalui gudang ransum ini pemerintah kota mengumpulkan sisa-sia artefak yang berhubungan dengan fungsi awalnya seperti periuk besar, pemanas air dan benda-benda yang lain, yang berhubungan dengan alat masak. untuk memperkaya khasanah museum, dibuatlah reproduksi foto-foto lama tentang kehidupan di Goedang Ransoem dan Kota Sawahlunto dan ada sebuah ruangan multi-media, disana para pengunjung museum dapat menonton film dokumenter tentang kehidupan yang ada di Goedang Ransoem dan Sawahlunto pada masa lalu. Museum Goedang Ransoem dapat dianggap sebagai sebuah mata rantai sejarah Kota Sawahlunto, yang cukup penting yang sebagian besar sejarah peninggalannya masih\r\ndilacak ( Andi Asoka dkk 2015) Pada mulanya, Gudang Ransoem ini memiliki 24 ketel (periuk) ukuran besar. Sekarang terdapat dua tipe periuk yang dimiliki oleh Gudang Ransoem yaitu, periuk untuk memasak sayur dan periuk untuk memasak nasi. Periuk untuk memasak sayur ini terdiri dari tiga bagian yaitu periuk lapisan luar, periuk lapisan dalam, dan tutup periuk yang berdiameter 148\r\nsentimeter, dan tinggi 70 sentimeter, serta memiliki ketebalan 1,2\r\nsentimeter. Periuk lapisan luar terbuat dari besi sedangkan periuk lapisan dalam, dan tutup periuk terbuat dari bahan nikel.Sedangkan Periuk untuk memasak nasi terdiri dari empat lapisan, yaitu lapisan luar, lapisan dalam, langsang dan tutup periuk. Periuk lapisan luar terbuat dari besi dan memiliki dua buah lubang pada bagian dinding sebagai lubang saluran uap. Sedangkan pada bagian bawah periuk terdapat lubang keran untuk membuang sisa air di dalam periuk Periuk lapisan dalam terbuat dari bahan nikel dan pada bagian atas periuk terdapat enam buah kuping baut yang berfungsi untuk mengunci tutup periuk. Langsang periuk juga terbuat dari bahan nikel. Pada bagian tengah langsang terdapat kerucut, dan pada bagian atas langsang terdapat tiga buah kuping sebagai cantolan untuk mengangkat langsang.\r\nMuseum gudang ransum merupakan bekas dapur umum yang dibangun pada tahun 1918, dimasa penjajahan Belanda dapur umum ini dilengkapi dua buah gudang besar dan tungku pembakaran untuk memasak 3900 kg beras setiap harinya untuk pekerja tambang , orang rantai, pasien rumah sakit dan keluarga pekerja tambang. Banyaknya beras yang dimasak bisa mengindikasikan berapa banyak orang-orang tambang yang dieksploitasi tubuhnya dan dirampas haknya oleh kolonial Belanda. Sebagai ujung tombak pertambangan, pihak kolonial setidaknya berusaha memenuhi kebutuhan makan para buruh. Alat masak ini masih bisa dilihat dan terpajang di Gudang Ransum sampai saat ini, namun sudah tidak beroperasi lagi, Gudang ransum menjadi salah satu ikon wisata sejarah yang menyajikan kembali kenangan perih buruh-buruh paksa masa kolonial. Setelah Kemedekaan bangunan ini mengalami beberapa peralihan fungsi\r\nantara lain. Sejak tahun 1945 Dapur Umum tidak lagi efektif sebagai\r\npenyedia kebutuhan makanan bagi pegawai tambang. Pada tahun tersebut tempat itu diambil alih oleh tentara pada masa pendudukan Jepang di Indonesia. Dapur Umum digunakan untuk memasak makanan yang diperuntukkan bagi Tentara Kedaulatan Republik Indonesia (TKRI). Kemudian pada tahun 1948 Dapur Umum kembali beralih fungsi. Seiring kedatangan kembali Belanda ke Indonesia, dapur umum dipergunakan untuk memasak makanan bagi tentara Belanda pada agresi militer II, setelah Indonesia merdeka secara penuh dengan berakhirnya masa mempertahankan kemerdekaan sejak tahun 1950 hingga 1960 dapur umum ini digunakan sebagai kantor ketika penyelenggaraan administrasi perusahaan Tambang Batu Bara Ombilin. Seiring perkembangan waktu, Gudang Ransum beralih fungsi. tahun 1960 hingga 1970 bangunan ini di gunakan untuk sekolah formal setingkat Sekolah Menengah Pertama (SMP) Ombilin namun hal itu hanya bertahan selama sepuluh tahun pada tahun 1970 higga 1980 Gudang Ransum kembali beralih fungsi sebagai hunian karyawan Tambang Batu Bara Ombilin dan yang pada awalnya hanya sebagai hunian karyawan tambang batu bara ombilin, Gudang Ransum menjadi lebih terbuka hingga tahun 1980 hingga 2004 bangunan ini berfungsi sebagai tempat hunian Karyawan Tambang Batu Bara Ombilin dan masyarakat umum Fungsi yang terus berubah tidak merubah bentuk dari bangunan Gudang Ransum ini, bangunan ini tetap kokoh berdiri dengan berbagai cerita yang\r\ntersimpan dari dalam tubuhnya, pada tahun 2000 merupakan keterpurukan sekaligus kebangkitan bagi Sawahlunto, menjelang tahun 2000 sudah tersiar kabar jika kandungan batubara dalam perut kota ini semakin menipis. Kota tambang yang awalnya hiruk- pikuk terhenti dan berubah menjadi kota sunyi, Menipisnya batu bara dalam perut Sawahlunto berdampak pada ekonomi masyarakat, ekonomi terhisap kedasar, sampai akhirnya masalah inilah yang melecut Sawahlunto dengan slogan menjadi kota tambang yang berbudaya. Kota yang sudah mulai ditinggalkan penduduknya mulai dibangun kembali. Pada tahun 2000an kota ini dijuluki sebagai kota hantu, prediket menyeramkan itu berusaha dirubah dengan berbagai cara hingga akhirnya menjadi kota heritage, menyatukan semua\r\nsejarah yang terserak, menghidupkannya kembali dalam bangunan- banguna kuno yang menyimpan banyak peristiwa salah satunya Gudang Ransum, Gudang Ransum merupakan salah satu museum andalan kota Sawahlunto untuk menarik pengunjung untuk menandatangi kota ini.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pariwisata_gambar`
--

CREATE TABLE `pariwisata_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_pariwisata` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `image_createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pariwisata_gambar`
--

INSERT INTO `pariwisata_gambar` (`id_gambar`, `id_pariwisata`, `gambar`, `image_createtime`) VALUES
(19, 12, 'mbah.JPG', '2022-06-08 12:16:08'),
(20, 12, 'mbah1.jpeg', '2022-06-08 12:16:08'),
(21, 12, 'mbah2.jpeg', '2022-06-08 12:16:08'),
(22, 12, 'mbah3.jpeg', '2022-06-08 12:16:09'),
(23, 12, 'mbah4.jpeg', '2022-06-08 12:16:09'),
(24, 12, 'mbah5.jpeg', '2022-06-08 12:16:09'),
(25, 13, 'gudang.JPG', '2022-06-08 12:19:05'),
(26, 13, 'gudang1.jpeg', '2022-06-08 12:19:05'),
(27, 13, 'gudang2.jpeg', '2022-06-08 12:19:05'),
(28, 13, 'gudang3.jpeg', '2022-06-08 12:19:05'),
(29, 13, 'gudang4.jpeg', '2022-06-08 12:19:05'),
(30, 13, 'gudang5.jpeg', '2022-06-08 12:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `nik` varchar(1000) NOT NULL,
  `tgl_kk` date DEFAULT NULL,
  `nokk` varchar(1000) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `id_jk` int(11) NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` varchar(1000) DEFAULT NULL,
  `id_rt` int(11) NOT NULL,
  `id_rw` int(11) NOT NULL,
  `pekerjaan` varchar(1000) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama`, `nik`, `tgl_kk`, `nokk`, `tgl_lahir`, `id_jk`, `umur`, `alamat`, `id_rt`, `id_rw`, `pekerjaan`, `foto`, `created`) VALUES
(7, 'Camilla Cabello', '321123', '0000-00-00', '111111', '1976-02-11', 2, 46, 'Los Angeles', 2, 2, 'Penyanyi', '5cdbdd4ca09eaa439b01d1bf_What-Does-A-Help-Desk-Technician-Do.jpg', NULL),
(9, 'Justin Bieber', '34343434', '0000-00-00', '87777', '2022-05-01', 2, 0, 'Australia', 4, 1, 'Artis', '5-aturan-ketenagakerjaan-yang-wajib-diketahui-wanita.jpg', NULL),
(13, 'Bella', '012', '0000-00-00', '23333', '1995-04-02', 1, 27, 'Padang', 1, 2, 'Kucing', 'iii.png', NULL),
(21, 'Putri', '4545454545454', '0000-00-00', '', '2020-03-11', 1, 2, 'Los Angeles', 1, 2, 'Kucing', 'Captdddure.JPG', NULL),
(22, 'Nana', '209020209', '2022-05-25', '30003', '2022-05-04', 1, 0, 'Komp. Rivera Garden Blok C.6', 3, 2, 'Pedagang', '5-aturan-ketenagakerjaan-yang-wajib-diketahui-wanita.jpg', '2022-05-25'),
(23, 'Puty Syalima', '13710261110000081', '2022-05-26', '1371026111000008', '2000-11-21', 2, 21, 'Komp. Rivera Garden Blok C.6', 1, 1, 'Pelajar', 'png-clipart-labor-skill-economics-job-management-thinking-man-miscellaneous-company_(22).jpg', '2022-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `alamat` varchar(1000) DEFAULT NULL,
  `nohp` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `whatsapp` varchar(1000) DEFAULT NULL,
  `desk` longtext DEFAULT NULL,
  `visi` longtext DEFAULT NULL,
  `misi` longtext DEFAULT NULL,
  `sejarah` longtext DEFAULT NULL,
  `struktur` varchar(1000) DEFAULT NULL,
  `foto_lurah` varchar(1000) DEFAULT NULL,
  `foto_sekre` varchar(1000) DEFAULT NULL,
  `foto_bend` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `alamat`, `nohp`, `email`, `whatsapp`, `desk`, `visi`, `misi`, `sejarah`, `struktur`, `foto_lurah`, `foto_sekre`, `foto_bend`) VALUES
(1, 'Kecamatan Lembah Segar, Kota Sawahlunto, Sumatra Barat, Indonesia.', '08126668281', 'tanahlapang@gmail.com', '081267878787', 'Kelurahan Tanah Lapang merupakan salah satu kelurahan yang terdapat pada Kecamatan Lembah Segar, Kota Sawahlunto. Kelurahan ini diberi nama Tanah Lapang karena daerahnya sangat luas atau disebut juga dengan Tanah Luas.', '“Dengan Kebersamaan Kita Wujudkan Kelurahan Tanah Lapang Sebagai Destinasi Wisata yang Kreatif, Inovatif, Unggul, Bermartabat, Berkeadilan dan Sejahtera”\r\n', '1.  Menciptakan Kehidupan Beragama dan Budaya yang Semakin Baik\r\n2.  Meningkatkan Kesejahteraan Masyarakat dan Pengembangan Ekonomi Kerakyatan Berbasis Ekonomi Kreatif serta Mengadakan Pelatihan Melalu BLK\r\n3.  Mewujudkan Pendidikan yang Berkualitas untuk Menghasilkan Sumber Daya Manusia yang Beriman, Kreatif dan Berdaya Saing (dengan memberikan Beasiswa)\r\n', '     Kelurahan Tanah Lapang merupakan salah satu kelurahan yang terdapat pada Kecamatan Lembah Segar, Kota Sawahlunto. Kelurahan ini diberi nama Tanah Lapang karena daerahnya sangat luas atau disebut juga dengan Tanah Luas. Selain itu, Tanah Lapang ini disebut juga sebagai kelurahan yang tidak kekurangan di Kecamatan Lembah Segar. Bagaimana tidak? Pada kelurahan ini banyak tersimpan tempat-tempat wisata terkenal di Sawahlunto seperti Lubang Mbah Soero. Lalu, juga terdapat keanekaragaman budaya yang selalu dilestarikan masyarakat setempat. \r\n      Kota Sawahlunto sendiri dijadikan sebagai kota pada tahun 1888, tepatnya pada tanggal 1 Desember, semenjak pemerintah Hindia Belanda mulai merencanakan pembangunan sarana dan prasarana yang dapat memudahkan eksploitasi batu bara di Sawahlunto pada tahun 1870.', 'image.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `id_rt` int(11) NOT NULL,
  `rt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`id_rt`, `rt`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rw`
--

CREATE TABLE `rw` (
  `id_rw` int(11) NOT NULL,
  `rw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rw`
--

INSERT INTO `rw` (`id_rw`, `rw`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_domisili`
--

CREATE TABLE `status_domisili` (
  `id1` int(11) NOT NULL,
  `status1` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_domisili`
--

INSERT INTO `status_domisili` (`id1`, `status1`) VALUES
(1, 'Menetap'),
(2, 'Pindah'),
(3, 'Pendatang');

-- --------------------------------------------------------

--
-- Table structure for table `status_hidup`
--

CREATE TABLE `status_hidup` (
  `id2` int(11) NOT NULL,
  `status2` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_hidup`
--

INSERT INTO `status_hidup` (`id2`, `status2`) VALUES
(1, 'Hidup'),
(2, 'Meninggal'),
(3, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `uname` varchar(1000) NOT NULL,
  `pass` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `nip` int(100) NOT NULL,
  `jabatan` varchar(1000) NOT NULL,
  `nohp` varchar(1000) DEFAULT NULL,
  `alamat` varchar(1000) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `pass`, `role`, `nama`, `nip`, `jabatan`, `nohp`, `alamat`, `foto`) VALUES
(51, 'adminldkom', 'adminbaru', 'admin', 'admin baruwww', 2147483647, 'aaaaaapaseh', '091210292', 'eee', 'Capture.png'),
(53, 'ldkomadmin', '$2y$10$0g1JQzKA9BKr.nkMnWTVmu1DdJk1M4/F0CBoahsU7NW2fprnz6ZCq', 'admin', 'LDKOM', 123321, 'Lab', '08129876858', 'Unand', 'download.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `det_dom`
--
ALTER TABLE `det_dom`
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_status1` (`id_status1`);

--
-- Indexes for table `det_hidup`
--
ALTER TABLE `det_hidup`
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_status2` (`id_status2`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `jenis_fasilitas`
--
ALTER TABLE `jenis_fasilitas`
  ADD PRIMARY KEY (`idf`);

--
-- Indexes for table `jk`
--
ALTER TABLE `jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pariwisata_gambar`
--
ALTER TABLE `pariwisata_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_pariwisata` (`id_pariwisata`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`) USING HASH,
  ADD KEY `id_jk` (`id_jk`),
  ADD KEY `id_rt` (`id_rt`),
  ADD KEY `id_rw` (`id_rw`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indexes for table `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`id_rw`);

--
-- Indexes for table `status_domisili`
--
ALTER TABLE `status_domisili`
  ADD PRIMARY KEY (`id1`);

--
-- Indexes for table `status_hidup`
--
ALTER TABLE `status_hidup`
  ADD PRIMARY KEY (`id2`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `uname` (`uname`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jenis_fasilitas`
--
ALTER TABLE `jenis_fasilitas`
  MODIFY `idf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jk`
--
ALTER TABLE `jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pariwisata`
--
ALTER TABLE `pariwisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pariwisata_gambar`
--
ALTER TABLE `pariwisata_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `id_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rw`
--
ALTER TABLE `rw`
  MODIFY `id_rw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_domisili`
--
ALTER TABLE `status_domisili`
  MODIFY `id1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_hidup`
--
ALTER TABLE `status_hidup`
  MODIFY `id2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `det_dom`
--
ALTER TABLE `det_dom`
  ADD CONSTRAINT `det_dom_ibfk_2` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `det_dom_ibfk_3` FOREIGN KEY (`id_status1`) REFERENCES `status_domisili` (`id1`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `det_hidup`
--
ALTER TABLE `det_hidup`
  ADD CONSTRAINT `det_hidup_ibfk_2` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `det_hidup_ibfk_3` FOREIGN KEY (`id_status2`) REFERENCES `status_hidup` (`id2`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_fasilitas` (`idf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pariwisata_gambar`
--
ALTER TABLE `pariwisata_gambar`
  ADD CONSTRAINT `pariwisata_gambar_ibfk_1` FOREIGN KEY (`id_pariwisata`) REFERENCES `pariwisata` (`id`);

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_ibfk_1` FOREIGN KEY (`id_jk`) REFERENCES `jk` (`id_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penduduk_ibfk_2` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penduduk_ibfk_3` FOREIGN KEY (`id_rw`) REFERENCES `rw` (`id_rw`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
