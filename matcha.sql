-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 20 2019 г., 03:48
-- Версия сервера: 5.7.24
-- Версия PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `matcha`
--

-- --------------------------------------------------------

--
-- Структура таблицы `like_users`
--

CREATE TABLE `like_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `likeUsers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `like_users`
--

INSERT INTO `like_users` (`id`, `user_id`, `likeUsers`) VALUES
(1, 1, '3,2'),
(2, 2, '1,3'),
(4, 3, '1,2');

-- --------------------------------------------------------

--
-- Структура таблицы `massege`
--

CREATE TABLE `massege` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `name`, `user_id`, `img`) VALUES
(4, 'foto1_4', 1, 'foto1_4.png'),
(6, 'foto1_2', 1, 'foto1_2.png'),
(9, 'foto1_1', 1, 'foto1_1.png'),
(10, 'foto2_2', 2, 'foto2_2.png'),
(11, 'foto3_2', 3, 'foto3_2.png');

-- --------------------------------------------------------

--
-- Структура таблицы `questionary`
--

CREATE TABLE `questionary` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `orientation` varchar(20) NOT NULL,
  `location` varchar(25) NOT NULL,
  `age` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questionary`
--

INSERT INTO `questionary` (`id`, `id_user`, `name`, `gender`, `orientation`, `location`, `age`, `city`, `info`) VALUES
(6, 1, 'Sania', 'male', 'heterosexual', '50.4705 30.4642', '27', 'Kyiv', 'Блондин, люблю гулять и путешествувать) Веду активный образ жизни'),
(7, 2, 'User', 'male', 'heterosexual', '50.5125 30.4507', '28', 'Chernihiv', 'ewufh'),
(8, 3, 'User2', 'male', 'heterosexual', '50.4048 30.6568', '30', 'Vishorod', '1111');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `act_email` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash_email` varchar(255) NOT NULL,
  `notification` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `admin`, `act_email`, `email`, `hash_email`, `notification`) VALUES
(1, 'Admin', 'cf09c171997917f5271ac2af9205e9d89333e127fcadfecf434399e9e127b645778bd0c36b8661f395af73b2b904d2f25287ec800e404c8e4118bc31521757de', 1, 1, 'virussania@gmail.com', '61547a0d', 1);

--
-- Индексы сохранённых таблиц
--
--
-- Индексы таблицы `massege`
--
ALTER TABLE `massege`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `like_users`
--
ALTER TABLE `like_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questionary`
--
ALTER TABLE `questionary`
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
-- AUTO_INCREMENT для таблицы `massege`
--
ALTER TABLE `massege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- AUTO_INCREMENT для таблицы `like_users`
--
ALTER TABLE `like_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `questionary`
--
ALTER TABLE `questionary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
