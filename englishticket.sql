-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Чрв 12 2018 р., 12:25
-- Версія сервера: 5.7.22-0ubuntu0.16.04.1
-- Версія PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `englishticket`
--

-- --------------------------------------------------------

--
-- Структура таблиці `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `text`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@gmail.com', 'fsdf', 'hgf hfg h fg', '2018-06-05 10:26:29', '2018-06-05 10:26:29'),
(2, 'test143', 'te4st434@gmail.com', 'gfh fg hgf', 'ggggggggggggggggggggg', '2018-06-05 13:54:37', '2018-06-05 13:54:37'),
(3, 'test143', 'te4st434@gmail.com', 'gfh fg hgf', 'ggggggggggggggggggggg', '2018-06-05 13:55:00', '2018-06-05 13:55:00'),
(4, 'test6y6', 'test654564@gmail.com', 'hg', 'jjjjjjjjjjjjjjjj', '2018-06-05 13:55:20', '2018-06-05 13:55:20'),
(5, 'test132', 'test3234@gmail.com', 'пвап', 'рпарапр', '2018-06-05 14:00:50', '2018-06-05 14:00:50'),
(6, 'вфів', 'itsani3nho@gmail.com', 'redfsfsd', 'аві аві а', '2018-06-06 16:36:34', '2018-06-06 16:36:34');

-- --------------------------------------------------------

--
-- Структура таблиці `english`
--

CREATE TABLE `english` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word` int(11) NOT NULL,
  `phrases` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `quastion` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `english`
--

INSERT INTO `english` (`id`, `name`, `word`, `phrases`, `theme_id`, `quastion`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'hi', 1, 0, 1, 0, 0, NULL, NULL),
(2, 'hello', 1, 0, 0, 0, 0, NULL, NULL),
(3, 'work', 1, 0, 0, 0, 0, NULL, NULL),
(4, 'do you speak English?', 0, 1, 2, 1, 0, NULL, NULL),
(5, 'what\'s your name?', 0, 1, 2, 1, 0, NULL, NULL),
(6, 'school', 1, 0, 1, 0, 1, '2018-06-08 21:54:08', '2018-06-08 21:54:08'),
(7, 'I', 1, 0, 1, 0, 1, '2018-06-08 22:12:51', '2018-06-08 22:12:51'),
(8, 'you', 1, 0, 1, 0, 1, '2018-06-08 22:19:24', '2018-06-08 22:19:24'),
(9, 'they', 1, 0, 1, 0, 1, '2018-06-08 22:27:45', '2018-06-08 22:27:45'),
(14, 'my', 1, 0, 1, 0, 1, '2018-06-08 23:12:20', '2018-06-08 23:12:20');

-- --------------------------------------------------------

--
-- Структура таблиці `english_study`
--

CREATE TABLE `english_study` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `english_id` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `english_study`
--

INSERT INTO `english_study` (`id`, `user_id`, `english_id`, `view`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2018-06-08 16:48:22', '2018-06-08 16:48:22'),
(2, 1, 2, 4, '2018-06-08 16:48:22', '2018-06-08 16:48:22'),
(3, 1, 3, 1, '2018-06-08 16:45:01', '2018-06-08 16:45:01'),
(4, 1, 4, 1, '2018-06-08 16:48:06', '2018-06-08 16:48:06'),
(5, 1, 14, 1, '2018-06-08 23:12:28', '2018-06-08 23:12:28');

-- --------------------------------------------------------

--
-- Структура таблиці `english_top`
--

CREATE TABLE `english_top` (
  `id` int(10) UNSIGNED NOT NULL,
  `english_id` int(11) NOT NULL,
  `word` int(11) NOT NULL,
  `top1000` int(11) NOT NULL DEFAULT '0',
  `top5000` int(11) NOT NULL DEFAULT '0',
  `top10000` int(11) NOT NULL DEFAULT '0',
  `other` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `english_top`
--

INSERT INTO `english_top` (`id`, `english_id`, `word`, `top1000`, `top5000`, `top10000`, `other`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(2, 2, 1, 1, 1, 1, 1, NULL, NULL),
(3, 3, 1, 1, 1, 1, 1, NULL, NULL),
(4, 4, 0, 0, 0, 0, 1, NULL, NULL),
(5, 5, 0, 0, 0, 0, 1, NULL, NULL),
(6, 6, 1, 1, 1, 1, 1, NULL, NULL),
(7, 7, 1, 1, 1, 1, 1, NULL, NULL),
(8, 8, 1, 1, 1, 1, 1, '2018-06-08 22:19:24', '2018-06-08 22:19:24'),
(10, 9, 1, 1, 1, 1, 1, '2018-06-08 22:27:45', '2018-06-08 22:27:45'),
(14, 14, 1, 1, 1, 1, 1, '2018-06-08 23:12:22', '2018-06-08 23:12:22');

-- --------------------------------------------------------

--
-- Структура таблиці `english_ukraine`
--

CREATE TABLE `english_ukraine` (
  `english_id` int(11) NOT NULL,
  `ukraine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `english_ukraine`
--

INSERT INTO `english_ukraine` (`english_id`, `ukraine_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 6),
(5, 7),
(6, 8),
(7, 9),
(8, 10),
(9, 11),
(13, 12),
(14, 13),
(14, 14),
(14, 15),
(14, 16);

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_28_175426_create_contact_table', 1),
(5, '2018_05_28_181217_create_top_table', 1),
(12, '2018_05_29_082824_create_themetitle_table', 1),
(14, '2018_06_07_130832_create_rols_table', 3),
(16, '2018_06_08_162415_create_english_table', 4),
(18, '2018_06_08_162505_create_english_ukraine_table', 4),
(19, '2018_06_08_165231_create_english_study_table', 4),
(20, '2018_06_08_174157_create_english_top_table', 5),
(21, '2018_06_08_162440_create_ukraine_table', 6);

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `rols`
--

CREATE TABLE `rols` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `administrator` int(11) NOT NULL DEFAULT '0',
  `moderator` int(11) NOT NULL DEFAULT '0',
  `content_manager` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `rols`
--

INSERT INTO `rols` (`id`, `user_id`, `administrator`, `moderator`, `content_manager`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `themetitle`
--

CREATE TABLE `themetitle` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `themetitle`
--

INSERT INTO `themetitle` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Other conversations', NULL, NULL),
(2, 'At acquaintance', NULL, NULL),
(3, 'On a walk', NULL, NULL),
(4, 'In the shop', NULL, NULL),
(5, 'At the airport', NULL, NULL),
(6, 'In the restaurant', NULL, NULL),
(7, 'At the hotel', NULL, NULL),
(8, 'At the hospital', NULL, NULL),
(9, 'In the educational institution', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `ukraine`
--

CREATE TABLE `ukraine` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word` int(11) NOT NULL,
  `phrases` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `quastion` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `ukraine`
--

INSERT INTO `ukraine` (`id`, `name`, `word`, `phrases`, `theme_id`, `quastion`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'привіт', 1, 0, 0, 0, 0, NULL, NULL),
(2, 'здрастуйте', 1, 0, 0, 0, 0, NULL, NULL),
(3, 'робота', 1, 0, 0, 0, 0, NULL, NULL),
(4, 'труд', 1, 0, 0, 0, 0, NULL, NULL),
(5, 'працювати', 1, 0, 0, 0, 0, NULL, NULL),
(6, 'ви розмовляєте англійською?', 0, 1, 2, 1, 0, NULL, NULL),
(7, 'як Вас звати?', 0, 1, 2, 1, 0, NULL, NULL),
(8, 'школа', 1, 0, 1, 0, 0, NULL, NULL),
(9, 'я', 1, 0, 1, 0, 0, NULL, NULL),
(10, 'Ви', 1, 0, 1, 0, 0, NULL, NULL),
(11, 'вони', 1, 0, 1, 0, 0, NULL, NULL),
(13, 'мій', 1, 0, 1, 0, 1, '2018-06-08 23:12:20', '2018-06-08 23:12:20'),
(14, 'моє', 1, 0, 1, 0, 1, '2018-06-08 23:12:21', '2018-06-08 23:12:21'),
(15, 'мої', 1, 0, 1, 0, 1, '2018-06-08 23:12:21', '2018-06-08 23:12:21'),
(16, 'моя', 1, 0, 1, 0, 1, '2018-06-08 23:12:21', '2018-06-08 23:12:21');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sani', 'itsaninho@gmail.com', '$2y$10$2ZjQvEb7AW1jjze3.AMjyucJ5BSYPX.T/he0cWz/o4Apv72awdHhm', 'Z6ncuiEvXCnYFkZETA6yZmUVdqDNTJWKfknVcc1fn51OlERlflGEgJxXDUrG', '2018-06-06 08:46:17', '2018-06-06 08:46:17');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `english`
--
ALTER TABLE `english`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `english_name_unique` (`name`);

--
-- Індекси таблиці `english_study`
--
ALTER TABLE `english_study`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `english_top`
--
ALTER TABLE `english_top`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Індекси таблиці `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `themetitle`
--
ALTER TABLE `themetitle`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `ukraine`
--
ALTER TABLE `ukraine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ukraine_name_unique` (`name`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `english`
--
ALTER TABLE `english`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблиці `english_study`
--
ALTER TABLE `english_study`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `english_top`
--
ALTER TABLE `english_top`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблиці `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `themetitle`
--
ALTER TABLE `themetitle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблиці `ukraine`
--
ALTER TABLE `ukraine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
