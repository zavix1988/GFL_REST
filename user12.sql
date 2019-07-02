-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 02 2019 г., 17:03
-- Версия сервера: 10.1.40-MariaDB-0ubuntu0.18.04.1
-- Версия PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user12`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ashop_brands`
--

CREATE TABLE `ashop_brands` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ashop_brands`
--

INSERT INTO `ashop_brands` (`id`, `name`) VALUES
(1, 'Toyota'),
(2, 'Ford'),
(3, 'Mazda'),
(4, 'Skoda'),
(5, 'Volkswagen'),
(6, 'Mitsubishi'),
(7, 'TAZ');

-- --------------------------------------------------------

--
-- Структура таблицы `ashop_cars`
--

CREATE TABLE `ashop_cars` (
  `id` int(255) NOT NULL,
  `brand_id` int(255) NOT NULL,
  `model` varchar(64) NOT NULL,
  `year` int(10) NOT NULL,
  `displacement` float NOT NULL,
  `color` varchar(64) NOT NULL,
  `max_speed` int(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ashop_cars`
--

INSERT INTO `ashop_cars` (`id`, `brand_id`, `model`, `year`, `displacement`, `color`, `max_speed`, `price`) VALUES
(1, 2, 'Fiesta', 2008, 1.25, 'green', 170, 5000),
(2, 4, 'Octavia', 2008, 1.6, 'gray', 210, 7900),
(3, 5, 'Golf', 2004, 1.6, 'black', 210, 5999),
(4, 4, 'Rapid', 2017, 1.2, 'white', 190, 14370),
(5, 6, 'Outlander', 2008, 2.4, 'black', 240, 11700),
(6, 6, 'Pajero Wagon', 2011, 3.2, 'gray', 220, 19900);

-- --------------------------------------------------------

--
-- Структура таблицы `ashop_orders`
--

CREATE TABLE `ashop_orders` (
  `id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `payment` enum('credit_cart','cash','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `ashop_rorders`
--

CREATE TABLE `ashop_rorders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `time` int(255) NOT NULL,
  `payment` enum('credit_cart','cash','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `ashop_users`
--

CREATE TABLE `ashop_users` (
  `id` int(10) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ashop_brands`
--
ALTER TABLE `ashop_brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ashop_cars`
--
ALTER TABLE `ashop_cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ashop_orders`
--
ALTER TABLE `ashop_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ashop_rorders`
--
ALTER TABLE `ashop_rorders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ashop_users`
--
ALTER TABLE `ashop_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ashop_brands`
--
ALTER TABLE `ashop_brands`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `ashop_cars`
--
ALTER TABLE `ashop_cars`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `ashop_orders`
--
ALTER TABLE `ashop_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT для таблицы `ashop_rorders`
--
ALTER TABLE `ashop_rorders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT для таблицы `ashop_users`
--
ALTER TABLE `ashop_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
