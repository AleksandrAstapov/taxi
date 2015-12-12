-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               5.5.39 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных taxi
CREATE DATABASE IF NOT EXISTS `taxi` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `taxi`;


-- Дамп структуры для таблица taxi.access
CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы taxi.access: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
INSERT INTO `access` (`id`, `name`, `permission`) VALUES
	(1, 'admin', 1),
	(2, 'admin2', 2),
	(3, 'user', 3);
/*!40000 ALTER TABLE `access` ENABLE KEYS */;


-- Дамп структуры для таблица taxi.acces_users
CREATE TABLE IF NOT EXISTS `acces_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `access_id` (`access_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `acces_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `acces_users_ibfk_2` FOREIGN KEY (`access_id`) REFERENCES `access` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы taxi.acces_users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `acces_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `acces_users` ENABLE KEYS */;


-- Дамп структуры для таблица taxi.session
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `date_session` date NOT NULL,
  `end_register` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы taxi.session: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;


-- Дамп структуры для таблица taxi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(32) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `patronymic` varchar(32) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `comment` text,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `access` varchar(32) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `e-mail` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы taxi.users: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `surname`, `name`, `patronymic`, `email`, `phone`, `comment`, `login`, `password`, `access`, `register_date`) VALUES
	(1, 'Astapov', 'Aleksandr', 'NULL', 'aleksandrastapov87@gmail.com', '', '', 'Sanu4', 'a3680c6e501817ba33a063289a47bd63', 'admin', '2015-12-10 14:19:21'),
	(2, '', '', '', 'gggg@ggg.gg', '', '          ', 'gggggg', '9cafeef08db2dd477098a0293e71f90a', 'user', '2015-12-10 14:23:23'),
	(3, '', '', '', 'ssss@sss.ss', '', '          ', 'ssssss', 'af15d5fdacd5fdfea300e88a8e253e82', 'user', '2015-12-12 03:02:23'),
	(4, '', '', '', 'sanu4_ast@mail.ru', '', '          ', 'Aleksandr', '3f230640b78d7e71ac5514e57935eb69', 'user', '2015-12-12 03:02:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
