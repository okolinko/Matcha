-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 08 2019 г., 10:58
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
(1, 1, '2,3'),
(2, 2, '3,1'),
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

--
-- Дамп данных таблицы `massege`
--

INSERT INTO `massege` (`id`, `chat_id`, `user_id`, `text`, `time`, `date`, `status`) VALUES
(1, 12, 1, 'Hello', '15:30:00', '2019-06-20', 1),
(2, 12, 2, 'hihi', '13:53:29', '2019-06-20', 1),
(30, 12, 1, '2\n', '18:17:14', '2019-06-21', 1),
(32, 12, 1, '2212', '11:27:26', '2019-06-21', 1),
(33, 12, 1, 'првагш\n', '15:53:33', '2019-06-22', 1),
(34, 12, 1, 'gfidhgu', '15:57:25', '2019-06-22', 1),
(35, 12, 2, 'lol\r\n', '16:56:28', '2019-06-22', 1),
(37, 13, 1, '1', '15:09:45', '2019-06-26', 1),
(38, 12, 1, 'test 555', '15:55:09', '2019-06-26', 1),
(60, 13, 3, 'ewe', '12:30:38', '2019-06-29', 0),
(61, 12, 2, '12121', '15:17:56', '2019-07-06', 1),
(62, 12, 2, 'helolo', '15:22:04', '2019-07-06', 1),
(75, 12, 1, 'helo', '18:24:47', '2019-07-06', 0);

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
(6, 'foto1_2', 1, 'foto1_2.png'),
(9, 'foto1_1', 1, 'foto1_1.png'),
(10, 'foto2_2', 2, 'foto2_2.png'),
(11, 'foto3_2', 3, 'foto3_2.png'),
(12, 'foto1_5', 1, 'foto1_5.png'),
(14, 'foto1_3', 1, 'foto1_3.png'),
(15, 'foto2_5', 2, 'foto2_5.png'),
(16, 'foto2_4', 2, 'foto2_4.png'),
(17, 'foto2_3', 2, 'foto2_3.png'),
(18, 'foto2_1', 2, 'foto2_1.png'),
(19, 'foto1_4', 1, 'foto1_4.png'),
(20, 'foto4_4', 4, 'foto4_4.png'),
(21, 'foto5_5', 5, 'foto5_5.png'),
(22, 'foto6_1', 6, 'foto6_1.png'),
(23, 'foto7_2', 7, 'foto7_2.png');

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
(6, 1, 'Sania', 'male', 'heterosexual', '50.4705 30.4642', '27', 'Kyiv', '#Блондин #люблю гулять  #путешествувать'),
(7, 2, 'User', 'male', 'heterosexual', '50.4705 30.4642', '28', 'Chernihiv', '#hello #bo #skaydaiving'),
(8, 3, 'User2', 'male', 'heterosexual', '50.4705 30.4642', '30', 'Vishorod', '#skaydaiving #ewtrwet'),
(9, 4, 'holop', 'female', 'heterosexual', '50.4705 30.4642', '25', 'Kiev', '#sky'),
(10, 5, 'Ania', 'female', 'heterosexual', '50.4705 30.4642', '26', 'Donetsk', '#sky'),
(11, 6, 'Yaroslava', 'female', 'heterosexual', '50.4705 30.4642', '21', 'Lviv', '#sky'),
(12, 7, 'Lola', 'female', 'heterosexual', '50.4705 30.4642', '18', 'Odesa', '#sky');

-- --------------------------------------------------------

--
-- Структура таблицы `trackvisit`
--

CREATE TABLE `trackvisit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trackvisit`
--

INSERT INTO `trackvisit` (`id`, `user_id`, `user_visit`) VALUES
(5, 1, 2),
(7, 2, 3),
(8, 3, 2),
(15, 1, 3),
(17, 3, 1),
(19, 4, 1),
(20, 7, 1);

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
(1, 'Admin', 'cf09c171997917f5271ac2af9205e9d89333e127fcadfecf434399e9e127b645778bd0c36b8661f395af73b2b904d2f25287ec800e404c8e4118bc31521757de', 1, 1, 'virussania@gmail.com', '61547a0d', 1),
(2, 'User', 'cf09c171997917f5271ac2af9205e9d89333e127fcadfecf434399e9e127b645778bd0c36b8661f395af73b2b904d2f25287ec800e404c8e4118bc31521757de', 0, 1, 'test@gmail.com', '15116114114', 1),
(3, 'Qwerty', '3188bb70545482bc5ae2f9fe69ce5c883e39c26fa6066192181549119c224007543f867e6c70282d74915b414246763f48959ade839d7b23ff3a236d297c54eb', 0, 1, 'beloh@click-email.com', 'b1aab3884250a9e9b7cbbb9c0e715f7fe85eeb367ebfcc1c8f33a11dcf6f2568146d1df7d3bd277ec4559807397ef8fa9a52d875ffc0f4545d4f473edc575542', 1),
(6, 'Sania123', 'e58e7af344db4cedaae80b77b1743906453ea2e83b76a42d0d333ae3fc118f8051f20f3d7ea482c22a89477a6139a7c49ac70b8c58be8dc349f0c57b39fc1074', 0, 0, 'igjreioj@iojhio.com', 'b488b3e46596f7539dbe12892b582bcc4c3f1fa2cacdcb6e2880aa190914d191b752d3e35613f0f8f5d362596afd458421d79f856a940aa6e2021482471e8524', 0),
(7, 'Sania2222', '6254142511e0df6b85953cc8da207169684f79f81fab40dc547068a603349f96cfe0ca0b03faee6eeec255ecbeafad05a0aa8062a6ba96f8d7acd98bce662b07', 0, 0, 'Vi0rgj@gjior.com', 'a490b96c76d3ed08b0b31d0153620f624f5178fb11ea12aededbff82015a0edcc5661a82e7bafde5918def099eec6366432403cf8139496568a3472215d729b1', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `like_users`
--
ALTER TABLE `like_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `massege`
--
ALTER TABLE `massege`
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
-- Индексы таблицы `trackvisit`
--
ALTER TABLE `trackvisit`
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
-- AUTO_INCREMENT для таблицы `like_users`
--
ALTER TABLE `like_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `massege`
--
ALTER TABLE `massege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `questionary`
--
ALTER TABLE `questionary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `trackvisit`
--
ALTER TABLE `trackvisit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
