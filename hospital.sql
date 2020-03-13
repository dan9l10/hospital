-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 13 2020 г., 18:18
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hospital`
--

-- --------------------------------------------------------

--
-- Структура таблицы `patient`
--

CREATE TABLE `patient` (
  `id` int(11) DEFAULT NULL,
  `FilePath` text DEFAULT NULL,
  `Fluorography` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`id`, `FilePath`, `Fluorography`) VALUES
(26, 'data/Сверидов Антон Александрович .txt', NULL),
(27, 'data/krasnyi Danylo Aleksando .txt', NULL),
(28, 'data/krasnyi danylo alexandr .txt', NULL),
(29, 'data/user user user .txt', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `first_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `first_name`, `middle_name`, `last_name`, `DOB`, `email`, `status`, `avatar`) VALUES
(26, 'antoha228', 'b245dcd110a49b3e7ab5b35ae977388e', 'Антон', 'Александрович', 'Сверидов', '2000-01-01', 'antoha228@gmail.com', 'user', 'img/1584041463'),
(27, 'dan9l10', '729144f3edb69a6dc7dcea5746f96b9d', 'admin', 'adminovich', 'adminskiy', '1998-08-28', '434@gmail.com', 'admin', 'img/1584047794'),
(28, 'dan9l1010', '729144f3edb69a6dc7dcea5746f96b9d', 'doctor', 'doctorovich', 'antonov', '2000-01-01', 'gag@gmail.com', 'doctor', 'img/1584102197'),
(29, 'dan9l101010', '729144f3edb69a6dc7dcea5746f96b9d', 'user', 'user', 'user', '2000-01-01', 'fgfdf@gmail.com', 'user', 'img/1584103595favicon.ico');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `patient`
--
ALTER TABLE `patient`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
