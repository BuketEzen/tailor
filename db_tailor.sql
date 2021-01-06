-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Tem 2020, 19:23:58
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `db_tailor`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `remove` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`category_id`, `title`, `description`, `image`, `level`, `remove`, `active`) VALUES
(1, 'Erkek', '<p>Erkek Ürünlerini İnceleyebilirsiniz. Hepsi Çok Güzel ve Ucuz.</p>', 'img/category/kategori2.jpg', 0, 1, 1),
(2, 'Spor Ceket', 'Spor Ceket Ürünlerimizi buradan inceleyebilirsiniz.', 'img/category/ceket.jpg', 1, 1, 1),
(3, 'Ayakkabı', 'Ayakkabı Ürünlerimizi İnceleyebilirsiniz.', 'img/category/ayakkabi.jpg', 1, 1, 1),
(4, 'Kadın', '<p>Kadın Kategorisindeki Ürünlerimiz.</p>', 'img/category/kategori1.jpg', 0, 1, 1),
(5, 'Ceket', 'Ceket Ürünlerimiz', 'img/category/kadin_ceket.jpg', 4, 1, 1),
(6, 'Bebek', 'Bebek Ürünleri', 'img/category/bebek.jpg', 0, 1, 1),
(7, 'Tshirt', '<p>Erkek Tshirt modellerimizi inceleyebilirsiniz.</p>', 'img/category/hakkimizda.jpg', 1, 1, 1),
(8, 'Aksesuar', '<p>Aksesuar Ürünlerini İnceleyin Çok Güzeller.</p>', 'img/category/kategori3.jpg', 0, 1, 1),
(9, 'Kaban', '', 'img/category/', 4, 1, 1),
(10, 'Etek', '', 'img/category/', 4, 1, 1),
(11, 'Çizme', '', 'img/category/', 4, 1, 1),
(12, 'Spor Ayakkabı', '', 'img/category/', 1, 1, 1),
(13, 'Atlet', '', 'img/category/', 1, 1, 1),
(14, 'Tayt', '', 'img/category/', 4, 1, 1),
(15, 'Tekstil', '', 'img/category/', 0, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `coordinate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`contact_id`, `address`, `telephone`, `fax`, `mail`, `coordinate`) VALUES
(2, 'İakademini adresini ezbere bilmiyorum', '0505 363 25 04', '0232 232 2322', 'info@tailorstudio.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3125.225458148933!2d27.140126315634998!3d38.43626097964441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbd85bbcaa3be9%3A0xc002feef388baca8!2zxLAtQWthZGVtaSBFxJ9pdGltIHZlIERhbsSxxZ9tYW5sxLFr!5e0!3m2!1str!2str!4v1585159574482!5m2!1str!2str');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contactform`
--

CREATE TABLE `contactform` (
  `form_id` int(11) NOT NULL,
  `namesurname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `remove` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `contactform`
--

INSERT INTO `contactform` (`form_id`, `namesurname`, `email`, `address`, `city`, `message`, `remove`) VALUES
(1, 'Kıvanç ÖNCEL', 'kivanconcel@hotmail.com', 'İakademi Adres', 'İzmir', 'test', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `remove` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `content`
--

INSERT INTO `content` (`content_id`, `title`, `description`, `image`, `remove`) VALUES
(1, 'Hakkımızda', '<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</strong> Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img/urun-detay.jpg', 1),
(2, 'Sözleşmeler', 'Bu bir sözleşme sayfasıdır.', '', 0),
(3, 'test', 'test', 'img/', 0),
(4, 'test2', 'test2', 'img/', 0),
(5, 'test', 'test', 'img/kategori1.jpg', 0),
(6, 'test', 'test', 'img/indir.jpg', 0),
(7, 'test', 'test', 'img/indir.jpg', 0),
(8, 'test', 'test', 'img/indir.jpg', 0),
(9, 'test', 'test', 'img/indir.jpg', 0),
(10, 'test', 'test', 'img/indir.jpg', 0),
(11, 'test', 'test', 'img/indir.jpg', 0),
(12, 'test', 'test', 'img/indir.jpg', 0),
(13, 'test', 'test', 'img/indir.jpg', 0),
(14, 'test', 'test', 'img/indir.jpg', 0),
(15, 'test', 'test', 'img/rhino-1364514.jpg', 0),
(16, 'test', 'test', 'img/rhino-1364514.jpg', 0),
(17, 'test5', 'test5', 'img/depo.jpg', 0),
(18, 'test', 'test', 'img/balikesir.jpg', 0),
(19, 'Sözleşmeler', '<p>Sözleşme sayfası metni.</p>', 'img/urun1 kopya.jpg', 1),
(20, 'İade Koşulları', '<p>İade Koşulları Sayfasının Metni</p>', 'img/balikesir.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sale_choose` text NOT NULL,
  `return_condition` text NOT NULL,
  `delivery` text NOT NULL,
  `new_item` int(11) NOT NULL DEFAULT 1,
  `sale_item` int(11) NOT NULL DEFAULT 0,
  `sale_price` int(11) NOT NULL,
  `cargo` int(11) NOT NULL DEFAULT 1,
  `have_sale` int(11) NOT NULL DEFAULT 1,
  `stock` int(11) NOT NULL,
  `remove` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`product_id`, `title`, `image`, `price`, `vat`, `level`, `brand`, `color`, `size`, `description`, `sale_choose`, `return_condition`, `delivery`, `new_item`, `sale_item`, `sale_price`, `cargo`, `have_sale`, `stock`, `remove`, `active`) VALUES
(1, 'Siyah Fermuarlı Mont', 'img/product/Trefoil_Tisort_Kirmizi_FM3791_21_model.jpg', 1000, 18, 5, 'Adidas', 'Siyah', 'Small', '<p>Batik desen, gitar soloları ve barış şarkılarını anımsatan 70ler ruhu, bu fermuarlı üstle geri dönüyor. Arşivlerden ilham alan 3 bant tasarımı ve Trefoil logosuna sahip model, sık dokuma kumaşı ile şıktır.</p>', '<p>Axess 12 Taksit</p>', '<p>Sitemiz, tüketici haklarını korumayı en öncelikli kuralları arasında tutmaktadır. Bu anlamda, Sitemizde alışverişleriniz sırasında yaşadığınız ürün ve servis kaynaklı her türlü sorun titizlikle değerlendirilmekte ve en kısa sürede çözüme kavuşturulmaktadır. Unutulmamalıdır ki, “Malın tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf malzemelerine ilişkin sözleşmeler” cayma hakkı kapsamı dışındadır. Ancak, yukarıdaki madde kapsamı dışında kalan ürünler için; İade Süresi (Cayma Hakkı) Kaç Gündür? Alıcı; mal satışına ilişkin mesafeli sözleşmelerde, malı teslim aldığı tarihten itibaren on dört gün içerisinde hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı reddederek sözleşmeden cayma hakkına sahiptir. Hizmet sunumuna ilişkin mesafeli sözleşmelerde ise, bu süre sözleşmenin imzalandığı tarihte başlar. Sözleşmede, hizmetin ifasının on dört günlük süre dolmadan yapılması kararlaştırılmışsa, tüketici ifanın başlayacağı tarihe kadar cayma hakkını kullanabilir. Cayma hakkının kullanımından kaynaklanan masraflar satıcıya aittir. Cayma hakkının kullanılması için Alıcı tarafından on dört günlük süre içinde Satıcıya yukarıda bildirilen faks, telefon veya elektronik posta ile bildirimde bulunulması ve mal/hizmetin Mesafeli Satış Sözleşmesi’nin 4. Madde hükümleri çerçevesinde ve işbu Sözleşmenin ayrılmaz parçası olan ve www.hukukfuar.com web sitesinde yayınlanmış olan önbilgiler gereğince, ambalaj ve içeriğinin hasar görmemiş olması ve Satıcı tarafından tekrar satışa arz edilebilir nitelikte olması şarttır. Cayma Hakkı kapsamında yer alan iade usulleri Mesafeli Satış Sözleşmesinde yer almaktadır. Bu hakkın kullanılması halinde, 3. kişiye veya Alıcıya teslim edilen mal/hizmete ilişkin fatura aslının iadesi zorunludur. Cayma hakkına ilişkin ihbarın ulaşmasını takip eden en geç 14 (on dört) gün içinde mal/hizmet bedeli ve teslimat masrafları Alıcıya iade edilir ve 10 (on) günlük süre içinde mal/hizmeti alıcı iade etmekle mükelleftir. Fatura aslı gönderilmezse Alıcıya KDV ve varsa diğer yasal yükümlülükler iade edilemez. Alıcının kusurundan kaynaklanan bir nedenle malın değerinde bir azalma olursa veya iade imkânsızlaşırsa Alıcı kusur oranında Satıcının zararını tazmin etmekle yükümlüdür. Ödemeler kredi kartı, EFT veya havale yöntemlerinden birisi kullanılarak yapılabilir.</p>', '<p>Banka Havalesi veya EFT (Elektronik Fon Transferi) yaparak, sitede bulunan banka hesaplarımızdan (TL) herhangi birine yapabilirsiniz. Sitemiz üzerinden kredi kartlarınız ile, Her türlü kredi kartınıza online tek ödeme ya da online taksit imkanlarından yararlanabilirsiniz. Online ödemelerinizde siparişiniz sonunda kredi kartınızdan tutar çekim işlemi gerçekleşecektir. Talepleriniz sipariş sonunda teslimata hazırlanmak üzere işleme alınır. Siparişiniz onaylandıktan sonra en geç 5 (beş) iş günü sonunda kargo firmasına teslim edilir. Stokta bulunmayan ürünler için teslimat süresi 6 – 8 hafta olacaktır. Kargonuzun durumu siparişinizin sonucunda size verilecek kargo takip numarası ile izlenebilir. Sözleşme konusunu oluşturan ürünler SATICI’nın belirleyeceği kargo firması tarafından ALICI’ya teslim edilir. Kargo ücreti ve varsa kargo sigorta ücreti fatura bedeline eklenir. ALICI bu bedelleri ödemeyi de peşinen kabul ve taahhüt eder. Ödeme işlemi yapıldıktan sonra sözleşme konusu ürünlerin yurtiçi kargoların teslim etme süresi ortalama 1 gün ila 2 hafta sürmektedir. Ön sipariş sistemi yapılan işlemlerde, teslimat ürüne ait satış sayfasında ilan edilen satış tarihinden itibaren başlayacak olup, işbu satış tarihinde tedarikçi firma kaynaklı gecikmeler yaşanabilir. İşbu halde SATICI ALICI’yı öncesinde yazılı olarak bilgilendirecektir.</p>', 0, 0, 0, 1, 1, 100, 1, 1),
(2, 'Siyah V Yaka Tshirt', 'img/product/urun-detay.jpg', 120, 18, 7, 'Adidas', 'Siyah', 'XXl', '<p>Çok güzel mutlaka al</p>', '<p>Axess 12 Taksit</p>', '<p>Geri almıyoruz</p>', '<p>Göndermiyoruz</p>', 1, 1, 90, 1, 1, 100, 1, 1),
(3, 'Kırmızı Adidas Tshirt', 'img/product/Trefoil_Tisort_Kirmizi_FM3791_21_model.jpg', 150, 18, 7, 'Adidas', 'Kırmızı', 'XL', '<p>Ürün kırmızı ve tshirt</p>', '<p>Axess 12 Taksit</p>', '<p>3 gün içinde iade etmeniz gerekir.</p>', '<p>3 gün sonra teslim ediyoruz</p>', 1, 0, 0, 1, 1, 100, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `remove` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `title`, `image`, `remove`) VALUES
(2, 'Tailor Stüdyo Sonbahar Kreasyonu Yeni Modelleri ile Karşınızda!', 'img/slider/slider1.jpg', 1),
(3, 'Tailor Studio Yaz Kreasyonu İle Karşınızda!', 'img/slider/maxresdefault.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `remove` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `active`, `remove`) VALUES
(1, 'admin', '123', 1, 1),
(2, 'root', '12345', 1, 1),
(4, 'kivanc', 'abc', 1, 1),
(5, 'iakademi', 'qwerty', 1, 1),
(6, 'ahmet', '123', 1, 1),
(7, 'veli', '123', 1, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`form_id`);

--
-- Tablo için indeksler `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `contactform`
--
ALTER TABLE `contactform`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
