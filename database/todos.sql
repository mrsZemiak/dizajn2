-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 16.Dec 2020, 18:22
-- Verzia serveru: 10.4.11-MariaDB
-- Verzia PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `todos`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `path` varchar(150) NOT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `logged_in` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `menu`
--

INSERT INTO `menu` (`id`, `name`, `path`, `icon`, `logged_in`) VALUES
(1, 'Welcome', '#intro', ' fa-home', 0),
(2, 'Sign in', '#one', 'fa-sign-in-alt', 0),
(3, 'Sign Up', '#two', 'fa-user-plus', 0),
(4, 'About project', '#three', 'fa-atom', 0),
(5, 'Your ToDo Lists', '#todos', 'far fa-list-alt', 1),
(9, 'Logout', 'logout.php', 'fas fa-arrow-alt-circle-left', 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `task` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NULL DEFAULT current_timestamp(),
  `checked` int(1) NOT NULL,
  `id_todo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `tasks`
--

INSERT INTO `tasks` (`id_task`, `task`, `created`, `updated`, `checked`, `id_todo`) VALUES
(35, 'zemiak', '2020-11-15 15:21:47', '2020-11-15 15:21:47', 0, 43),
(36, 'zemiak', '2020-11-15 15:23:48', '2020-11-15 15:23:48', 0, 43),
(37, 'zemiak', '2020-11-15 15:37:41', '2020-11-15 15:37:41', 0, 43),
(38, 'zemiak', '2020-11-15 15:38:02', '2020-11-15 15:38:02', 0, 43),
(39, 'zemiak', '2020-11-15 16:33:36', '2020-11-15 16:33:36', 0, 43),
(45, 'make a coffee', '2020-11-28 15:55:49', '2020-11-28 15:55:49', 0, 42),
(46, 'make coffee', '2020-12-10 13:40:34', '2020-12-10 13:40:34', 0, 107),
(49, 'make coffee', '2020-12-10 13:53:35', '2020-12-10 13:53:35', 0, 108),
(50, 'lalalalalalalal', '2020-12-10 13:53:38', '2020-12-10 13:53:38', 0, 108);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `todolists`
--

CREATE TABLE `todolists` (
  `idtodo` int(11) NOT NULL,
  `title` text NOT NULL,
  `idusers` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `todolists`
--

INSERT INTO `todolists` (`idtodo`, `title`, `idusers`, `created_at`, `updated_at`) VALUES
(42, 'Coffee Shop', 9, '2020-11-14 22:01:48', '2020-11-14 22:01:48'),
(43, 'Shop', 9, '2020-11-14 22:07:20', '2020-11-14 22:07:20'),
(107, 'lalalalala', 9, '2020-12-10 13:40:30', '2020-12-10 13:40:30'),
(108, 'todolist', 9, '2020-12-10 13:53:08', '2020-12-10 13:53:08');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `meno` varchar(45) NOT NULL,
  `priezvisko` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`idusers`, `meno`, `priezvisko`, `email`, `password`) VALUES
(6, 'Jana', 'Malá', 'janamala@gmail.com', '$2y$10$Xz4.BcjdwXUryaE2c0EFjuwqDYNGCU/fpmAa4B/UoW/928do3WuwC'),
(9, 'Jana', 'Zmetená', 'janaz@gmail.com', '$2y$10$ldPQvU7vtU35hUlpE3dNVu7dDsJkZEnLI9B5JPtXngtY91fjorlZi');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `todo` (`id_todo`);

--
-- Indexy pre tabuľku `todolists`
--
ALTER TABLE `todolists`
  ADD PRIMARY KEY (`idtodo`),
  ADD KEY `test` (`idusers`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pre tabuľku `todolists`
--
ALTER TABLE `todolists`
  MODIFY `idtodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `todo` FOREIGN KEY (`id_todo`) REFERENCES `todolists` (`idtodo`);

--
-- Obmedzenie pre tabuľku `todolists`
--
ALTER TABLE `todolists`
  ADD CONSTRAINT `test` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
