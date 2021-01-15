-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 14 2021 г., 09:40
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wallet`
--

-- --------------------------------------------------------

--
-- Структура таблицы `save_users`
--

CREATE TABLE `save_users` (
  `id` int(15) NOT NULL,
  `user_search` varchar(200) NOT NULL,
  `user_filter` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `save_users`
--

INSERT INTO `save_users` (`id`, `user_search`, `user_filter`) VALUES
(1, '_2_8_5_', ''),
(2, '_4_6_', ''),
(3, '_3_3_', ''),
(4, '_2_7_', ''),
(6, '', '_age_18_35_,_gender_male_female_,_wallet_150_400_'),
(7, '', '_age_17_55_,_gender_male_'),
(8, '', '_age_5_5_,_gender_male_'),
(9, '', '_age_14_25_,_gender_female_,_wallet_200_220_'),
(10, '_9_1_9_', ''),
(11, '_4_5_10_7_', ''),
(12, '', '_age_10_20_,_gender_female_,_wallet_10_200_'),
(13, '_1_8_', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `wallet_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `age`, `gender`, `wallet_amount`) VALUES
(1, 'artur', 'sagsyan', 30, 'male', 200),
(2, 'ashot', 'poxosyan', 30, 'male', 280),
(3, 'anjela', 'poxosyan', 25, 'female', 210),
(4, 'susan', 'arakelyan', 27, 'female', 470),
(5, 'sasun', 'hovhanisyan', 20, 'male', 140),
(6, 'azat', 'poxosyan', 21, 'male', 870),
(7, 'poxos', 'hakobyan', 67, 'male', 410),
(8, 'anush', 'soxomonyan', 18, 'female', 310),
(9, 'jora', 'hovakimyan', 14, 'male', 230),
(10, 'seto', 'arakelyan', 5, 'male', 30);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `save_users`
--
ALTER TABLE `save_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `save_users`
--
ALTER TABLE `save_users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
