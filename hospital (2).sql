-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 18 2020 г., 00:01
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

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

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateSchedule` (IN `InMonth` INT, IN `InYear` INT)  NO SQL
BEGIN
	
	DECLARE CountDoctor int;
    DECLARE CountTime int;
    DECLARE CountDay int;
    DECLARE NumDate int DEFAULT 1;
    DECLARE NumTime int DEFAULT 1;
    DECLARE NumDoctor int DEFAULT 1;
    DECLARE iddoctors int;
    DECLARE id_time time;

    DECLARE CurrentDate date;
    DECLARE InDate date;
    DECLARE cur_doctors CURSOR FOR SELECT id FROM doctors;
    DECLARE cur_time CURSOR FOR SELECT idtime FROM timetable;
   	DELETE FROM test;
    SELECT COUNT(*) INTO CountTime FROM timetable ;
    SELECT COUNT(id) INTO CountDoctor FROM doctors ;
    
     INSERT INTO test(test) VALUES (CountTime);
    SET InDate = STR_TO_DATE(
        CONCAT(InYear,',',InMonth,',','1'),
        '%Y,%m,%d');
	SET CurrentDate= NOW();
    SET CountDay=DAY(LAST_DAY(InDate));
	
    INSERT INTO test(test) VALUES
    (CONCAT(CountTime,'-Time-',
            '-Doctors-',CountDoctor,
            '-Day-',CountDay));
    INSERT INTO test(test) VALUES ('---');
    
    
	label_date:WHILE NumDate<=CountDay DO
    	SET NumDoctor=1;
        OPEN cur_doctors ;
        label_doctor:WHILE NumDoctor<=CountDoctor DO
        	OPEN cur_time ;
            SET NumTime=1;
            FETCH cur_doctors INTO iddoctors;
            label_time:WHILE NumTime<=CountTime DO
                FETCH cur_time INTO id_time;
                INSERT IGNORE INTO schedules SET
                	iddoctor = iddoctors,
                    idpatient = NULL,
                    thetime = id_time,
                    thedate = InDate; 
                SET NumTime=NumTime+1;
            END WHILE label_time;
            CLOSE cur_time;
            SET NumDoctor=NumDoctor+1;
        END WHILE label_doctor;
     CLOSE cur_doctors;
     SET NumDate=NumDate+1;
     SET InDate=adddate(InDate,1);
     END WHILE label_date;
     


	
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) DEFAULT NULL,
  `Specialization` text DEFAULT NULL,
  `cabinet` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `Specialization`, `cabinet`) VALUES
(31, 'ggwp', '33z');

-- --------------------------------------------------------

--
-- Структура таблицы `patient`
--

CREATE TABLE `patient` (
  `id` int(11) DEFAULT NULL,
  `FilePath` text DEFAULT NULL,
  `Plurography` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`id`, `FilePath`, `Plurography`) VALUES
(29, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `schedules`
--

CREATE TABLE `schedules` (
  `iddoctor` int(11) DEFAULT NULL,
  `idpatient` int(11) DEFAULT NULL,
  `thetime` int(11) DEFAULT NULL,
  `thedate` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `recored` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `test` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`test`) VALUES
('27'),
('27-Time--Doctors-1-Day-31'),
('---');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `idtime` int(11) NOT NULL,
  `thetime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`idtime`, `thetime`) VALUES
(1, '07:00:00'),
(2, '07:30:00'),
(3, '08:00:00'),
(4, '08:30:00'),
(5, '09:00:00'),
(6, '09:30:00'),
(7, '10:00:00'),
(8, '10:30:00'),
(9, '11:00:00'),
(10, '11:30:00'),
(11, '12:00:00'),
(12, '12:30:00'),
(13, '13:00:00'),
(14, '13:30:00'),
(15, '14:00:00'),
(16, '14:30:00'),
(17, '15:00:00'),
(18, '15:30:00'),
(19, '16:00:00'),
(20, '16:30:00'),
(21, '17:00:00'),
(22, '17:30:00'),
(23, '18:00:00'),
(24, '18:30:00'),
(25, '19:00:00'),
(26, '19:30:00'),
(27, '20:00:00');

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
  `DOB` date DEFAULT NULL,
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
(29, 'dan9l101010', '729144f3edb69a6dc7dcea5746f96b9d', 'user', 'user', 'user', '2000-01-01', 'fgfdf@gmail.com', 'user', 'img/1584103595favicon.ico'),
(31, 'doctor1', '123123123', 'doctor1', 'doctor1', 'doctor1', NULL, '', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `patient`
--
ALTER TABLE `patient`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `schedules`
--
ALTER TABLE `schedules`
  ADD UNIQUE KEY `Uniq_DATA` (`iddoctor`,`thetime`,`thedate`) USING BTREE,
  ADD KEY `iddoctor` (`iddoctor`),
  ADD KEY `idpatient` (`idpatient`),
  ADD KEY `thetime` (`thetime`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`idtime`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `idtime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`iddoctor`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `schedules_ibfk_3` FOREIGN KEY (`thetime`) REFERENCES `timetable` (`idtime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
