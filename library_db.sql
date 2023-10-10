-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Eki 2023, 15:40:25
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `library_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adresses`
--

CREATE TABLE `adresses` (
  `id` int(11) NOT NULL,
  `country_id` int(100) NOT NULL,
  `cistrict_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `publishing_house_id` int(100) NOT NULL,
  `writer_id` int(100) NOT NULL,
  `book_status` varchar(50) DEFAULT NULL,
  `number_of_page` int(50) DEFAULT NULL,
  `release_date` int(20) DEFAULT NULL,
  `material_id` int(10) DEFAULT NULL,
  `category_id` int(50) DEFAULT NULL,
  `img_id` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `books`
--

INSERT INTO `books` (`id`, `name`, `publishing_house_id`, `writer_id`, `book_status`, `number_of_page`, `release_date`, `material_id`, `category_id`, `img_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Crime and Punishment', 1, 1, 'rented', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(2, 'Anna Karenina', 2, 2, 'rented', NULL, NULL, NULL, 2, 2, NULL, NULL, NULL),
(3, 'mamut', 1, 1, NULL, 1, 0, 0, NULL, 9, NULL, NULL, NULL),
(4, 'Desiree Estes', 0, 0, NULL, 4, 0, 0, NULL, 0, NULL, NULL, NULL),
(5, 'test5', 0, 0, NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL),
(6, 'test6', 0, 0, NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL),
(7, 'test7', 0, 0, NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL),
(8, 'test8', 0, 0, NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL),
(9, 'test9', 0, 0, NULL, 0, 0, 0, NULL, 0, NULL, NULL, NULL),
(10, 'Wynne Mayo', 0, 0, NULL, 785, 0, 0, NULL, 0, NULL, NULL, NULL),
(11, 'klmkmlkmk', 1, 1, NULL, 1, 1, 0, NULL, 0, NULL, NULL, NULL),
(12, 'fggf', 11, 1, NULL, 1, 1, 0, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `commets`
--

CREATE TABLE `commets` (
  `id` int(11) NOT NULL,
  `User_id` int(100) NOT NULL,
  `Writer_id` int(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Created_at` date NOT NULL,
  `Updated_at` date NOT NULL,
  `Deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `creat_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `genders`
--

INSERT INTO `genders` (`id`, `name`, `status`, `creat_at`, `update_at`, `delete_at`) VALUES
(3, 'male', 1, NULL, NULL, NULL),
(4, 'female', 1, NULL, NULL, NULL),
(5, 'other', 1, NULL, NULL, NULL),
(42, 'test', 0, NULL, NULL, NULL),
(43, 'Zoe Noel', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(20) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `image_url`) VALUES
(1, '16965941682021-12-08 (6).png'),
(2, '16965941172021-12-08 (6).png'),
(8, '16965943012021-12-08 (6).png'),
(9, '1696686979Ekran görüntüsü 2023-09-27 202202.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `material`
--

INSERT INTO `material` (`id`, `name`, `create_at`, `update_at`, `delete_at`) VALUES
(1, 'plastic', NULL, NULL, NULL),
(2, 'paper', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `publishing_houses`
--

CREATE TABLE `publishing_houses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `publish_date` date NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adress_id` int(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `publishing_houses`
--

INSERT INTO `publishing_houses` (`id`, `name`, `publish_date`, `phone`, `email`, `adress_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Harper Collins', '2023-01-01', 123456789, 'harperCollins@gmail.com', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `identification_number` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` int(20) NOT NULL,
  `adress_id` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender_id` tinyint(4) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `first_name`, `second_name`, `last_name`, `identification_number`, `email`, `phone`, `adress_id`, `password`, `gender_id`, `is_admin`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 'Magee', 'Hendrix', 'Schmidt', 753, 'balurila@mailinator.com', 93, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL),
(29, 'Ali', 'Çağrı', 'Çağlar', 111, 'ali@gmail.com', 123456, NULL, NULL, 3, 0, 1, NULL, NULL, NULL),
(30, 'Mehmet', 'Çağ', 'Çağlar', 112, 'mehmet@gmail.com', 123457, NULL, NULL, 3, 0, 1, NULL, NULL, NULL),
(31, 'Devrim', '', 'Çağlar', 113, 'devrim@gmail.com', 123458, NULL, NULL, 3, 0, 1, NULL, NULL, NULL),
(32, 'huseyin', 'Çağrı', 'Çağlar', 111, 'ali@gmail.com', 123456, NULL, NULL, 3, 0, 1, NULL, NULL, NULL),
(33, 'ısıl', '', 'Çağlar', 113, 'devrim@gmail.com', 123458, NULL, NULL, 3, 0, 1, NULL, NULL, NULL),
(34, 'Ahmet', 'Çağrı', 'Çağlar', 111, 'ali@gmail.com', 123456, NULL, NULL, 3, 0, 1, NULL, NULL, NULL),
(35, 'Murat', 'Çağrı', 'Çağlar', 111, 'ali@gmail.com', 123456, NULL, NULL, 3, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users_book`
--

CREATE TABLE `users_book` (
  `user_id` int(11) NOT NULL,
  `book_id` int(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender_id` int(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `writers`
--

INSERT INTO `writers` (`id`, `first_name`, `second_name`, `last_name`, `gender_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lev', 'Tolstoy', 'Nikolayevich', 3, NULL, NULL, NULL),
(2, 'Fyodor ', 'Dostoevsky', 'Mikhailovich', 3, NULL, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `commets`
--
ALTER TABLE `commets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `publishing_houses`
--
ALTER TABLE `publishing_houses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users_book`
--
ALTER TABLE `users_book`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `commets`
--
ALTER TABLE `commets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `publishing_houses`
--
ALTER TABLE `publishing_houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `users_book`
--
ALTER TABLE `users_book`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
