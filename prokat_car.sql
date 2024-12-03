-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 04 2024 г., 00:31
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `prokat car`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `CarID` int NOT NULL COMMENT 'ID Машины',
  `Brand` varchar(50) NOT NULL COMMENT 'Марка автомобиля',
  `Model` varchar(50) NOT NULL COMMENT 'Модель автомобиля',
  `Year` year NOT NULL COMMENT 'Год выпуска автомобиля',
  `KPP` varchar(20) NOT NULL COMMENT 'Трансмиссия',
  `Plate` varchar(20) NOT NULL COMMENT 'Номерной знак автомобиля',
  `Category` varchar(20) NOT NULL COMMENT 'Класс автомобиля',
  `Status` varchar(20) NOT NULL COMMENT 'Статут автомобиля',
  `Price` decimal(10,2) NOT NULL COMMENT 'Цена аренды ',
  `image` varchar(255) NOT NULL COMMENT 'изображение'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Информация автомобиля ';

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`CarID`, `Brand`, `Model`, `Year`, `KPP`, `Plate`, `Category`, `Status`, `Price`, `image`) VALUES
(1, 'Mercedes Benz', 'e220', 1995, 'Автоматическая', '001abc01', 'Премиум', 'Свободен', '10000.00', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRT825Hxtf8qA_7JmtcwjkBdwXNMWUuMyFLGg&s'),
(2, 'Ford', 'focus', 2004, 'Механическая', '002abc01', 'Эконом', 'Свободен', '5000.00', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgRcnMjv3o_3aJYdAZNcwBli05voeqShevsw&s'),
(3, 'Toyota', 'Camry', 2008, 'Автоматическая', '003abc01', 'бизнес', 'Свободен', '8000.00', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYWAzTgILLFVta1PnuhwDPx0hIvPgpQyvoJg&s'),
(4, 'BMW', 'X5', 2015, 'Автоматическая', '003ADC01', 'Премиум', 'Свободен', '9000.00', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRavqSsrQGhMfJdtPXzxCw5ChDe35amcmv4Dg&s');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int NOT NULL COMMENT 'Id клиента ',
  `FirstName` varchar(50) NOT NULL COMMENT 'Имя',
  `LastName` varchar(50) NOT NULL COMMENT 'Фамилия',
  `IIN` varchar(12) NOT NULL COMMENT 'ИИН',
  `PhoneNumber` varchar(15) NOT NULL COMMENT 'Номер телефона ',
  `Email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Почта клиента'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Информация о клиентах';

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `IIN`, `PhoneNumber`, `Email`) VALUES
(1, 'Джеймс', 'Сазерленд', '000055550000', '12312345612', 'proverka@gmail.com'),
(2, 'Фрэнк', 'Вудс', '000011110000', '12312345611', 'proverka2@gmail.com'),
(3, 'Дэвид', 'Мейсон', '000022220000', '12312345613', 'proverka3@gmail.com'),
(4, 'джеки', 'сандерс', '000099990000', '87005544410', 'proverka4@gmail.com'),
(6, 'Натан', 'Дрейк', '000077770000', '87090003030', 'proverka5@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `rent`
--

CREATE TABLE `rent` (
  `RentID` int NOT NULL COMMENT 'ID Аренды',
  `CustomerID` int NOT NULL COMMENT 'Id Клиента',
  `FirstName` varchar(50) NOT NULL COMMENT 'Имя',
  `Lastname` varchar(50) NOT NULL COMMENT 'Фамилия',
  `CarID` int NOT NULL COMMENT 'Id Машины',
  `Brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Марка',
  `Model` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Модель',
  `Start` date NOT NULL COMMENT 'Дата начала аренды',
  `End` date NOT NULL COMMENT 'Дата окончания аренды',
  `TotalAmount` decimal(10,0) NOT NULL COMMENT 'Итоговая сумма аренды',
  `Status` varchar(20) NOT NULL COMMENT 'Статус аренды '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `rent`
--

INSERT INTO `rent` (`RentID`, `CustomerID`, `FirstName`, `Lastname`, `CarID`, `Brand`, `Model`, `Start`, `End`, `TotalAmount`, `Status`) VALUES
(3, 1, 'Джеймс', 'Сазерленд', 1, 'Mercedes Benz', 'e220', '2024-12-01', '2024-12-02', '10000', 'Завершена'),
(4, 3, 'Дэвид', 'Мейсон', 3, 'Toyota', 'Camry', '2024-12-01', '2024-12-05', '25000', 'Продолжается'),
(5, 2, 'Фрэнк', 'Вудс', 2, 'Ford', 'focus', '2024-12-01', '2024-12-05', '25000', 'Просрочена'),
(6, 6, 'Натан', 'Дрейк', 1, 'Mercedes Benz', 'e220', '2024-12-04', '2024-12-05', '10000', 'Завершена');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`CarID`,`Brand`,`Model`) USING BTREE;

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`,`FirstName`,`LastName`) USING BTREE,
  ADD UNIQUE KEY `IIN` (`IIN`);

--
-- Индексы таблицы `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`RentID`),
  ADD KEY `CarID` (`CarID`,`Brand`,`Model`) USING BTREE,
  ADD KEY `CustomerID` (`CustomerID`,`FirstName`,`Lastname`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `CarID` int NOT NULL AUTO_INCREMENT COMMENT 'ID Машины', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int NOT NULL AUTO_INCREMENT COMMENT 'Id клиента ', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `rent`
--
ALTER TABLE `rent`
  MODIFY `RentID` int NOT NULL AUTO_INCREMENT COMMENT 'ID Аренды', AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_3` FOREIGN KEY (`CarID`,`Brand`,`Model`) REFERENCES `cars` (`CarID`, `Brand`, `Model`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `rent_ibfk_4` FOREIGN KEY (`CustomerID`,`FirstName`,`Lastname`) REFERENCES `customer` (`CustomerID`, `FirstName`, `LastName`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
