-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 03 2017 г., 12:23
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `uh347272_med24`
--

-- --------------------------------------------------------

--
-- Структура таблицы `med_actual_location`
--

CREATE TABLE `med_actual_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `actual_location` varchar(100) NOT NULL,
  `locality_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_actual_location`
--

INSERT INTO `med_actual_location` (`id`, `actual_location`, `locality_fk`) VALUES
(1, 'пров. лісозахисний', 1),
(2, 'вул. петропавлівська', 3),
(3, 'вул. солом\'янська, 17, київська клінічна лікарня №4, корп. №1, в рентгенвідділі', 1),
(4, 'вул. саксаганського, 88', 1),
(5, 'вул. чистяківська, 2-а, 2-й поверх', 1),
(6, 'вул. андрея малышко, 2, 3-й поверх', 1),
(7, 'вул. городецька, 44', 2),
(8, 'вул. лермонтова, 31', 4),
(9, 'вул. театральна (воровського), 34, каб. 8', 5),
(10, 'вул. гагаріна, 25, 2-й поверх', 6),
(11, 'пер. нестеровський, 13/19, поліклініка київської областної лікарні №2, 3 пов., к. 301', 1),
(12, 'пр. лобановського, 17, клініка \"медбуд\"', 1),
(13, 'пр. к. комарова, 3, кор. 5 (лікарня «медмістечко»)', 1),
(14, 'вул. боженка, будинок 86-г', 1),
(15, 'вул. васильківська, 45, корп. 4.', 1),
(16, 'вул. васильківська, 28', 1),
(17, 'пр. перемоги, 119-121, корпус №5', 1),
(18, 'вул. шолуденка , будинок 6в', 7),
(19, 'вул. верховина, 69\r\n(на території онкологічного центру)', 1),
(20, 'вул. павлова, 2.', 5),
(21, 'вул. ближня, 31', 8),
(22, 'пл. соборна, 14', 8),
(23, 'вул. сєдова, 3, каб. 14-а', 9),
(24, 'вул. київська, 78-г (на території обласної лікарні)', 10),
(25, 'вул. троїцька, 48', 11),
(26, 'вул. мєндєлєєва, 7 (на території онкологічного центру)', 12),
(27, 'вул. валі котика, 85', 13),
(28, 'вул. червоного хреста, будинок 3\r\n', 14),
(29, 'проспект університетський, будинок 2/5', 15),
(30, 'вул. пушкінська, 82', 16),
(31, 'пров. будівельників, будинок 4', 1),
(32, 'вул. ризька, 1', 1),
(33, 'вул. баггавутівська, будинок 1', 1),
(34, 'вул. сагайдачного/ігорівська, 10/5 літера «б»', 1),
(35, 'вул. платона майбороди, будинок 8', 1),
(36, 'вул. княжий затон, 9', 1),
(37, 'вул. микільсько-слобідська, 2б', 1),
(38, 'вул. лайоша гавро, 22', 1),
(39, 'пр. свободи, 22', 1),
(40, 'вул. данила щербаковського, 70 (вул. щербакова)', 1),
(41, 'вул. петра запорожця, 26 а', 1),
(42, 'вул.кургузова,1 (на території црл, стаціонар,1 пов)', 7),
(43, 'вул. соборна, 78', 18),
(44, 'вул. стрітенська, 42', 19),
(45, 'пр. перемоги, 8/вул. карла маркса, 34', 20),
(46, 'вул. ватутіна, 20, (цмл, жіноча консультація, 1 пов.)', 21),
(47, 'пр. ломоносова, 101, (поліклініка мл №5, каб. 11)', 22),
(48, 'вул. орджонікідзе, 31, (територія цмб, в приміщенні аптеки «лекарь») ', 23),
(49, 'вул. руднєва, 73 црл, дитяче відділення', 24),
(50, 'вул. незалежності, 64 (вул. фрунзе), црл 1 пов.', 25),
(51, 'вул. чапаєва, 36 а, (ніі травматології, 2 пов.)', 25),
(52, 'пр. миру, 80 (бувш. пр. леніну, біля мл №3)', 26),
(53, 'пр. перемоги, 77 (лівий берег)', 26),
(54, 'вул. карла маркса, 10 (будинок побуту, 1 пов.)', 27),
(55, 'вул. вокзальна, 16 (вул. свердлова), (мшвд, 1 пов.)', 28),
(56, 'вул. молодіжна, 19, (цмл, центр здоров\'я, 1 пов.)', 29),
(57, 'вул. соборна ,29 (вул. леніна) цмл, корп. № 3', 30),
(58, 'м-н молодіжний, 6а (поліклініка, к. 32а, 2 пов.)', 31),
(59, 'проспект перемоги, будинок 119', 1),
(60, 'вул. вишгородська, 69', 1),
(61, 'вул. митрополита андрія шептицького, 5', 1),
(62, 'вул. микільсько-слобідська, будинок 6-д, офіс 6', 1),
(63, 'вул. політехнічна, 25/29', 1),
(64, 'вул. маршала тимошенко, 14', 1),
(65, 'вул. вишгородська, 54-а', 1),
(66, 'вул. петра запорожця, 26', 1),
(67, 'вул. т. шевченко, 13, оф. 1.', 17),
(68, 'вул. микільсько-слобідська, будинок 6-в', 1),
(69, 'вул. анни ахматової, будинок 31', 1),
(70, 'вул. грибоєдова, будинок 3, приміщення 323', 32),
(71, 'вул. авіаконструктора антонова, будинок 13 літера \"а\"', 1),
(72, 'вул. машинобудівна, 37', 1),
(73, 'вул. дегтярівська, 17-в, (територія медсанчастини заводу \"артем\")', 1),
(74, 'вул. народного ополчення, 5', 1),
(75, 'вул. червоноармійська, будинок 67/7 літера \"а\"', 1),
(76, 'вул. петра запорожця, 26 (київська міська клінічна лікарня №3)', 1),
(77, 'вул. марини раскової, будинок 2-а,  3 поверх', 1),
(78, 'вул. л.толстого, будинок 23/1, літ. а', 1),
(79, 'дніпровська набережна, 25б', 1),
(80, 'вул. герцена, 6, пов. 2', 1),
(81, 'вул. паньківська, будинок 27/78, офіс 82', 1),
(82, 'вул. старокиївська, 9', 1),
(83, 'вул. виборзька, 70а', 1),
(84, 'вул. олександра мішуги, 12', 1),
(85, 'пр. бажана, 12а, праве крило, 5 поверх (у будівлі клініки «борис»)', 1),
(86, 'пер. бехтеревський, 8', 1),
(87, 'оболонська набережна, 3,\r\nкор. 3, сек. 2', 1),
(88, 'вул. пушкінська, будинок 11', 1),
(89, 'вул. леонтовича, 6а', 1),
(90, 'пр. маяковського, 6', 1),
(91, 'вул. червоноармійська (велика васильківська), 92', 1),
(92, 'вул. микільсько-слобідська, 4д', 1),
(93, 'вул. княжий затон, 14-в', 1),
(94, 'вул. михайлівська, 24/11-13в', 1),
(95, 'вул. сумська, 13', 16),
(96, 'вул. воскресенська, 1а', 8),
(97, 'пр. соборний, 46', 9),
(98, 'вул. велика арнаутська, 62', 33),
(99, 'вул. гуданова, 9\\11', 16),
(100, 'пр. гагаріна, 137,2 пов, жіноча консультація, каб. №36', 16),
(101, 'вул.ш.руставелі, 14, каб. №94', 16),
(102, 'пр-т ільїча 90, каб. №83', 16),
(103, 'проспект леніна, будинок 40', 16),
(104, 'вул. державинська, 38', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `med_composite_locality_actual_location`
--

CREATE TABLE `med_composite_locality_actual_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `locality_fk` int(10) UNSIGNED NOT NULL,
  `actual_location_fk` int(10) UNSIGNED NOT NULL,
  `district_city_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_composite_locality_actual_location`
--

INSERT INTO `med_composite_locality_actual_location` (`id`, `locality_fk`, `actual_location_fk`, `district_city_fk`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 2),
(3, 1, 4, 3),
(4, 1, 5, 4),
(5, 1, 6, 5),
(6, 2, 7, 2),
(7, 1, 14, 7),
(8, 1, 11, 3),
(9, 1, 12, 2),
(10, 1, 13, 2),
(11, 1, 15, 7),
(12, 1, 16, 7),
(13, 1, 17, 4),
(14, 1, 19, 4),
(15, 14, 28, 13),
(16, 15, 29, 12),
(17, 1, 31, 5),
(18, 1, 32, 3),
(19, 1, 33, 3),
(20, 1, 34, 1),
(21, 1, 35, 3),
(22, 1, 36, 8),
(23, 1, 37, 5),
(24, 1, 38, 14),
(25, 1, 39, 1),
(26, 1, 40, 3),
(27, 1, 41, 5),
(28, 1, 59, 4),
(29, 1, 60, 14),
(30, 1, 61, 5),
(31, 1, 62, 5),
(32, 1, 63, 2),
(33, 1, 64, 14),
(34, 1, 65, 14),
(35, 1, 66, 5),
(36, 1, 68, 5),
(37, 1, 69, 8),
(38, 32, 70, 11),
(39, 1, 71, 2),
(40, 1, 72, 2),
(41, 1, 73, 3),
(42, 1, 74, 2),
(43, 1, 75, 15),
(44, 1, 76, 5),
(45, 1, 77, 5),
(46, 1, 78, 7),
(47, 1, 79, 5),
(48, 1, 80, 3),
(49, 1, 81, 7),
(50, 1, 82, 3),
(51, 1, 83, 2),
(52, 1, 84, 8),
(53, 1, 85, 8),
(54, 1, 86, 3),
(55, 1, 87, 14),
(56, 1, 88, 3),
(57, 1, 89, 3),
(58, 1, 90, 9),
(59, 1, 91, 7),
(60, 1, 92, 5),
(61, 1, 93, 8),
(62, 1, 94, 3),
(63, 16, 103, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `med_day_work`
--

CREATE TABLE `med_day_work` (
  `id` int(10) UNSIGNED NOT NULL,
  `monday_fk` int(10) UNSIGNED NOT NULL,
  `tuesday_fk` int(10) UNSIGNED NOT NULL,
  `wednesday_fk` int(10) UNSIGNED NOT NULL,
  `thursday_fk` int(10) UNSIGNED NOT NULL,
  `friday_fk` int(10) UNSIGNED NOT NULL,
  `saturday_fk` int(10) UNSIGNED NOT NULL,
  `sunday_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_day_work`
--

INSERT INTO `med_day_work` (`id`, `monday_fk`, `tuesday_fk`, `wednesday_fk`, `thursday_fk`, `friday_fk`, `saturday_fk`, `sunday_fk`) VALUES
(1, 1, 1, 1, 1, 1, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `med_district_city`
--

CREATE TABLE `med_district_city` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `locality_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_district_city`
--

INSERT INTO `med_district_city` (`id`, `district_city`, `locality_fk`) VALUES
(1, 'Подільський', 1),
(2, 'Солом\'янський', 1),
(3, 'Шевченківський', 1),
(4, 'Святошинський', 1),
(5, 'Дніпровський', 1),
(6, 'Галицький', 2),
(7, 'Голосіївський', 1),
(8, 'Дарницький', 1),
(9, 'Деснянський', 1),
(10, 'Дзержинський', 16),
(11, 'Замостянський', 32),
(12, 'Кіровський', 15),
(13, 'Корольовський', 14),
(14, 'Оболонський', 1),
(15, 'Печерський', 1),
(16, 'Святошинський', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `med_district_region`
--

CREATE TABLE `med_district_region` (
  `id` int(10) UNSIGNED NOT NULL,
  `district` varchar(50) NOT NULL,
  `region_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_district_region`
--

INSERT INTO `med_district_region` (`id`, `district`, `region_fk`) VALUES
(1, 'Києво-Святошинський', 6),
(2, 'Галицький', 8),
(3, 'Криворізький', 2),
(4, 'Кременчуцький', 10),
(5, 'Білоцерківський', 6),
(6, 'Вишгородський', 6),
(7, 'Дніпровський', 2),
(8, 'Запорізький', 5),
(9, 'Рівненський', 11),
(10, 'Сумський', 12),
(11, 'Черкаський', 15),
(12, 'Шепетівський', 14),
(13, 'Житомирський', 4),
(14, 'Кіровоградський', 7),
(15, 'Харківський', 13),
(16, 'Броварський', 6),
(18, 'Полтавський', 10),
(19, 'Бербянський', 5),
(20, 'Покровський', 3),
(21, 'Костянтинівський', 3),
(22, 'Слов\'янський', 3),
(24, 'Лиманський', 3),
(25, 'Мангушський', 3),
(27, 'Ма́р\'їнський', 3),
(28, 'Добропільський', 3),
(29, 'Вінницький', 1),
(30, 'Овідіопольський', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `med_home`
--

CREATE TABLE `med_home` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_home` varchar(50) NOT NULL,
  `actual_location_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_home`
--

INSERT INTO `med_home` (`id`, `number_home`, `actual_location_fk`) VALUES
(1, '5', 1),
(2, '14-д', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `med_insurance_companies`
--

CREATE TABLE `med_insurance_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `usk` int(11) UNSIGNED DEFAULT NULL,
  `aska` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_insurance_companies`
--

INSERT INTO `med_insurance_companies` (`id`, `usk`, `aska`) VALUES
(1, 1, 1),
(2, 1, NULL),
(3, NULL, 1),
(4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `med_locality`
--

CREATE TABLE `med_locality` (
  `id` int(10) UNSIGNED NOT NULL,
  `locality` varchar(50) NOT NULL,
  `type_locality_fk` int(10) UNSIGNED NOT NULL,
  `district_region_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_locality`
--

INSERT INTO `med_locality` (`id`, `locality`, `type_locality_fk`, `district_region_fk`) VALUES
(1, 'Київ', 1, 1),
(2, 'Львів', 1, 2),
(3, 'Петропавлівська Борщагівка', 2, 1),
(4, 'Кривий Ріг', 1, 3),
(5, 'Кременчуг', 1, 4),
(6, 'Біла Церква', 1, 5),
(7, 'Вишгород', 1, 6),
(8, 'Дніпро', 1, 7),
(9, 'Запоріжжя', 1, 8),
(10, 'Рівне', 1, 9),
(11, 'Суми', 1, 10),
(12, 'Черкаси', 1, 11),
(13, 'Шепетівка', 1, 12),
(14, 'Житомир', 1, 13),
(15, 'Кропивницький', 1, 14),
(16, 'Харків', 1, 15),
(17, 'Бровари', 1, 16),
(18, 'Нові Петрівці', 2, 6),
(19, 'Полтава', 1, 18),
(20, 'Бердянськ', 1, 19),
(21, 'Димитров', 1, 20),
(22, 'Костянтинівка', 1, 21),
(23, 'Краматорськ', 1, 22),
(24, 'Покровськ', 1, 20),
(25, 'Лиман', 1, 24),
(26, 'Маріуполь', 1, 25),
(27, 'Селідове', 1, 20),
(28, 'Славянськ', 1, 22),
(29, 'Вугледар', 1, 27),
(30, 'Дружківка', 1, 21),
(31, 'Добропілля', 1, 28),
(32, 'Вінниця', 1, 29),
(33, 'Одеса', 1, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `med_organization`
--

CREATE TABLE `med_organization` (
  `id` int(10) UNSIGNED NOT NULL,
  `short_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_ownership_fk` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `edrpou_code` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_organization`
--

INSERT INTO `med_organization` (`id`, `short_name`, `type_ownership_fk`, `name`, `edrpou_code`) VALUES
(1, NULL, 1, 'ТОВ \"МЕДИЧНА БІОТЕХНОЛОГІЧНА КОМПАНІЯ \"ГЕМАФОНД\"', NULL),
(2, 'Медокс', 1, 'СПЕЦІАЛІЗОВАНИЙ МЕДИКО-ДІАГНОСТИЧНИЙ ЦЕНТР \"АЦМД\"', NULL),
(3, NULL, 1, 'ПП \"ВІТАКОМ ДІАГНОСТИКА\"', NULL),
(4, 'БЕТТЕРТОН', 1, 'ТОВ \"БЕТТЕРТОН\"', 37013392),
(5, 'ДІАГНОСТ КТ', 1, 'ТОВ \"ДІАГНОСТ КТ\"', NULL),
(6, 'ДОКТОР ФІЛІН', 1, 'ТОВ \"ДОКТОР ФІЛІН\"', 36484040),
(7, 'Євроскан', 1, 'ТОВ \"ЄВРОСКАН ДІАГНОСТИКА\"', NULL),
(8, NULL, 1, 'ТОВ \"ІННОВАЦІЙНА ДІАГНОСТИКА\"\r\n', NULL),
(9, NULL, 1, 'ТОВ \"ЛАБМЕД\"', 40231389),
(10, 'Експерт', 1, 'ТОВ \"МДЦ ЕКСПЕРТ\"', 36407043),
(11, 'Експерт', 1, 'ТОВ \"МДЦ ЕКСПЕРТ-ЖИТОМИР\"', NULL),
(12, 'Експерт', 1, 'ТОВ \"МДЦ ЕКСПЕРТ-КІРОВОГРАД\"', NULL),
(13, 'Експерт', 1, 'ТОВ \"МДЦ ЕКСПЕРТ-ХАРКІВ\"', NULL),
(14, NULL, 1, 'ТОВ \"МЕДДІАГНОСТИКА\"', NULL),
(15, NULL, 1, 'ТОВ \"МЕДИКО-ФАРМАКОЛОГІЧНА КОМПАНІЯ\"', NULL),
(16, NULL, 1, 'ТОВ \"МЕДІСКАН ГРУП\"', NULL),
(17, NULL, 1, 'ТОВ \"МРТ-ЦЕНТР КИЇВМЕД\"', 38322382),
(18, NULL, 1, 'ТОВ \"НЕОМЕДІК\"', 39975478),
(19, 'НОВА ДІАГНОСТИКА', 1, 'ТОВ \"НОВА ДІАГНОСТИКА\"', 33221953),
(20, NULL, 1, 'ТОВ \"ОЛЕКСАНДРІВСЬКИЙ КОНСУЛЬТАТИВНО-ДІАГНОСТИЧНИЙ ЦЕНТР\"', NULL),
(21, NULL, 1, 'ТОВ \"СМАРТ ДІАГНОСТИКА\"', 38260028),
(22, NULL, 1, 'ТЗОВ \"Т-ЕКСПЕРТ\"', 36248779),
(23, 'УЛДЦ', 1, 'ТОВ \"УЛДЦ\"', 21657610),
(24, 'Візіум', 1, 'ТОВ \"ЦЕНТР ДІАГНОСТИКИ ЗОРУ-К\"', NULL),
(25, NULL, 1, 'ПП \"МЕДІСКАН\"', NULL),
(26, NULL, 1, 'ТОВ \"ДЦ\"МЕДЕКС\"', NULL),
(27, NULL, 1, 'ТОВ \"ДІАГНОСТИЧНИЙ ЦЕНТР МРТ\"', NULL),
(28, 'СДС', 1, 'ТОВ \"СУЧАСНІ ДІАГНОСТИЧНІ СИСТЕМИ\"', NULL),
(29, '', 1, 'ТОВ \"ТЕЛЕКАРДІО\"', NULL),
(30, NULL, 1, 'ТОВ \"УНК\"', 20048842),
(31, NULL, 1, 'ТОВ\"ЄВРОКОСМЕТИКС\"', NULL),
(32, NULL, 1, 'ТОВ \"МЕДЕСТЕТЦЕНТР ПЛЮС\"', 39870609),
(33, NULL, 1, 'ТОВ \"МЕДІПРОФ ЕСТЕТ\"', 36547084),
(34, NULL, 1, 'ТОВ \"МІЛАМЕДАС\"', NULL),
(35, NULL, 1, 'ТОВ \"СІАМ ЦЕНТР\"', NULL),
(36, 'Валерія', 1, 'ТОВ \"МЕДИЧНА КЛІНІКА-ВАЛЕРІЯ\"', NULL),
(37, 'Валерія', 1, 'ТОВ \"МЕДИЧНИЙ ЗАКЛАД-ВАЛЕРІЯ\"', 34696021),
(38, 'аілаз', 1, 'ТОВ \"АІЛАЗ\"', NULL),
(39, NULL, 1, 'ТОВ \"ЕДІТ-БЬЮТІ\"', NULL),
(40, NULL, 1, 'ТОВ \"ЕСТЕТИК ЛАЙФ\"', NULL),
(41, NULL, 1, 'ТОВ \"КЛІНІКА \"ЛІНЛАЙН\"', 39042137),
(42, 'ЛАЗЕРХАУЗ', 1, 'ТОВ \"ЛАЗЕРХАУЗ\"', 36521553),
(43, 'МИЛЛЕНИУМ', 1, 'ПП \"ЛАБОРАТОРІЯ \"МИЛЛЕНИУМ\"', NULL),
(44, NULL, 1, 'ТОВ \"ЕКОДЕНТ\"', 30237782),
(45, NULL, 1, 'ТОВ \"НВП \"МРТ-ЦЕНТР\"', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `med_phone`
--

CREATE TABLE `med_phone` (
  `id` int(10) UNSIGNED NOT NULL,
  `summary_table_fk` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_phone`
--

INSERT INTO `med_phone` (`id`, `summary_table_fk`, `phone`) VALUES
(1, 1, '0444960926'),
(2, 1, '0984960926'),
(3, 2, '0443930930'),
(4, 2, '0443930931'),
(5, 2, '0443930933'),
(6, 2, '0672302432'),
(7, 2, '0503323339'),
(8, 3, '0442277092'),
(9, 3, '0993441121'),
(10, 3, '0676754385'),
(11, 4, '0442228802'),
(12, 4, '0504441575'),
(13, 4, '0672396918'),
(14, 5, '0442228807'),
(15, 5, '0664472747'),
(16, 5, '0966344848'),
(17, 6, '0442227656'),
(18, 6, '0500358717'),
(19, 6, '0965452435'),
(20, 7, '0322536965'),
(21, 7, '0676708747'),
(22, 7, '0504333757'),
(23, 8, '0564430030'),
(24, 8, '0987446013'),
(25, 8, '0502572072'),
(26, 9, '0536700612'),
(27, 9, '0975554818'),
(28, 9, '0994308515'),
(29, 10, '0456309969'),
(30, 10, '0664093062'),
(31, 10, '0672348988'),
(32, 11, '0442723451'),
(33, 11, '0991731115'),
(34, 11, '0960111443'),
(35, 12, '0442750797'),
(36, 12, '0734138559'),
(37, 13, '0442371343'),
(38, 13, '0443511434'),
(39, 14, '0442371343'),
(40, 14, '0443511434'),
(41, 15, '0443382023'),
(42, 15, '0932677782'),
(43, 15, '0951302096'),
(44, 15, '0686704088'),
(45, 16, '0980333968'),
(46, 16, '0668344848'),
(47, 16, '0636344848'),
(48, 16, '0442597800'),
(49, 17, '0442298979'),
(50, 17, '0678282959'),
(51, 19, '0443320405'),
(52, 19, '0675076470'),
(53, 20, '0567850405'),
(54, 20, '0503028985'),
(55, 20, '0631549409'),
(56, 20, '0674617902'),
(57, 20, '0674688254'),
(58, 21, '0567319192'),
(59, 22, '0612891468'),
(60, 22, '0987005594'),
(61, 23, '0536700405'),
(62, 23, '0948800405'),
(63, 24, '0362454770'),
(64, 24, '0997788577'),
(65, 24, '0987788577'),
(66, 24, '0737788577'),
(67, 25, '0674623518'),
(68, 25, '0504061771'),
(69, 25, '0542665899'),
(70, 26, '0472385775'),
(71, 27, '0970683500'),
(72, 27, '0500229590'),
(73, 27, '0980555290'),
(74, 28, '0412437515'),
(75, 28, '0412468661'),
(76, 28, '0674110824'),
(77, 29, '0966590305'),
(78, 29, '0994867454'),
(79, 30, '0577284262'),
(80, 30, '0957405748'),
(81, 31, '0445595400'),
(82, 31, '0442921796'),
(83, 31, '0442921854'),
(84, 31, '0961992581'),
(85, 31, '0939033620'),
(86, 32, '0459441515'),
(87, 33, '0443377851'),
(88, 33, '0666055507'),
(89, 33, '0965663355'),
(90, 34, '0443603442'),
(91, 34, '0992296945'),
(92, 34, '0981289932'),
(93, 35, '0444516388'),
(94, 35, '0948516388'),
(95, 36, '0673257506'),
(96, 37, '0673278057'),
(97, 38, '0678281926'),
(98, 39, '0678282956'),
(99, 40, '0673257504'),
(100, 41, '0678232475'),
(101, 42, '0673257521'),
(102, 43, '0676762356'),
(103, 44, '0503379060'),
(104, 44, '0673257355'),
(105, 45, '0504731648'),
(106, 46, '0504204256'),
(107, 47, '0503476928'),
(108, 48, '0503481856'),
(109, 49, '0504728158'),
(110, 50, '0504728206'),
(111, 52, '0503481764'),
(112, 53, '0504713984'),
(113, 54, '0504717295'),
(114, 55, '0503481727'),
(115, 61, '0503481552'),
(116, 62, '0504044335'),
(117, 63, '0504714179'),
(118, 64, '0442273134'),
(119, 64, '0442273137'),
(120, 64, '0930404103'),
(121, 64, '0931942711'),
(122, 64, '0975744225'),
(123, 64, '0969392703'),
(124, 65, '0443838877'),
(125, 65, '0444307733'),
(126, 65, '0986788787'),
(127, 65, '0635748787'),
(128, 66, '0443603731'),
(129, 66, '0688835353'),
(130, 66, '0954704840'),
(131, 67, '0444923484'),
(132, 68, '0444923484'),
(133, 68, '0442773354'),
(134, 69, '0444923484'),
(135, 69, '0444850494'),
(136, 70, '0444923484'),
(137, 70, '0444851332'),
(138, 71, '0444923484'),
(139, 71, '0445420084'),
(140, 77, '0459469693'),
(141, 77, '0444923480'),
(142, 78, '0444923484'),
(143, 78, '0444923480'),
(144, 79, '0445691655'),
(145, 80, '0432696262'),
(146, 80, '0674309433'),
(147, 81, '0443923393'),
(148, 81, '0672190276'),
(149, 81, '0931700499'),
(150, 81, '0674407703'),
(151, 82, '0979482279'),
(152, 82, '0443371083'),
(153, 82, '0443321774'),
(154, 83, '0443607939'),
(155, 83, '0963113399'),
(156, 83, '0994372878'),
(157, 84, '0442703958'),
(158, 84, '0442497941'),
(159, 85, '0999635989'),
(160, 86, '0443607929'),
(161, 86, '0985371221'),
(162, 86, '0995401221'),
(163, 87, '0443838998'),
(164, 88, '0442342545'),
(165, 88, '0503307338'),
(166, 88, '0442341535'),
(167, 89, '0443613306'),
(168, 90, '0442065347'),
(169, 90, '0678240055'),
(170, 91, '0445696353'),
(171, 91, '0442302354'),
(172, 91, '0504101534'),
(173, 91, '0504622354'),
(174, 92, '0444951495'),
(175, 92, '0444892201'),
(176, 93, '0444951495'),
(177, 93, '0445949693'),
(178, 94, '0444999891'),
(179, 95, '0444999876'),
(180, 96, '0443649902'),
(181, 96, '0989282646'),
(182, 96, '0991679987'),
(183, 96, '0631903775'),
(184, 97, '0444850110'),
(185, 97, '0672426259'),
(186, 98, '0445995555'),
(187, 99, '0445857007'),
(188, 99, '0931771611'),
(189, 100, '0445857007'),
(190, 100, '0931771611'),
(191, 101, '0445857007'),
(192, 101, '0931771611'),
(193, 102, '0445857007'),
(194, 102, '0931771611'),
(195, 103, '0445857007'),
(196, 103, '0931771611'),
(197, 104, '0445857007'),
(198, 104, '0931771611'),
(199, 105, '0577667017'),
(200, 105, '0931771612'),
(201, 106, '0931771591'),
(202, 106, '0567912700'),
(203, 107, '0931771609'),
(204, 107, '0612807017'),
(205, 108, '0487009107'),
(206, 108, '0931771642'),
(207, 109, '0577003296'),
(208, 110, '0577003296'),
(209, 111, '0577003296'),
(210, 112, '0577003296'),
(211, 113, '0577509181'),
(212, 113, '0577586147'),
(213, 113, '0938781190'),
(214, 114, '0577377177'),
(215, 114, '0503270037');

-- --------------------------------------------------------

--
-- Структура таблицы `med_region`
--

CREATE TABLE `med_region` (
  `id` int(10) UNSIGNED NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_region`
--

INSERT INTO `med_region` (`id`, `region`) VALUES
(1, 'Вінницька'),
(2, 'Дніпропетровська'),
(3, 'Донецька'),
(4, 'Житомирська'),
(5, 'Запорізька'),
(6, 'Київська'),
(7, 'Кіровоградська'),
(8, 'Львівська'),
(9, 'Одеська'),
(10, 'Полтавська'),
(11, 'Рівненська'),
(12, 'Сумська'),
(13, 'Харківська'),
(14, 'Хмельницька'),
(15, 'Черкаська');

-- --------------------------------------------------------

--
-- Структура таблицы `med_services`
--

CREATE TABLE `med_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `dentistry` tinyint(1) DEFAULT NULL,
  `childrens_dentistry` tinyint(1) DEFAULT NULL,
  `therapeutic_dentistry` tinyint(1) DEFAULT NULL,
  `aesthetic_dentistry` tinyint(1) DEFAULT NULL,
  `orthodontics` tinyint(1) DEFAULT NULL,
  `dental _othopedics` tinyint(1) DEFAULT NULL,
  `dental_surgery` tinyint(1) DEFAULT NULL,
  `dental_Implantology` tinyint(1) DEFAULT NULL,
  `periodontology` tinyint(1) DEFAULT NULL,
  `dental_prophylaxis` tinyint(1) DEFAULT NULL,
  `dentistry_pregnant_women` tinyint(1) DEFAULT NULL,
  `tooth_whitening` tinyint(1) DEFAULT NULL,
  `gnathology` tinyint(1) DEFAULT NULL,
  `dental_bone_plastics` tinyint(1) DEFAULT NULL,
  `dentistry_at_home` tinyint(1) DEFAULT NULL,
  `allergy` tinyint(1) DEFAULT NULL,
  `alcoholism` tinyint(1) DEFAULT NULL,
  `gastroenterology` tinyint(1) DEFAULT NULL,
  `childrens_consultation` tinyint(1) DEFAULT NULL,
  `ecg` tinyint(1) DEFAULT NULL,
  `ct` tinyint(1) DEFAULT NULL,
  `mammography` tinyint(1) DEFAULT NULL,
  `mri` tinyint(1) DEFAULT NULL,
  `oncology` tinyint(1) DEFAULT NULL,
  `wounded` tinyint(1) DEFAULT NULL,
  `otorhinolaryngology` tinyint(1) DEFAULT NULL,
  `radiology` tinyint(1) DEFAULT NULL,
  `sports_medicine` tinyint(1) DEFAULT NULL,
  `surgery` tinyint(1) DEFAULT NULL,
  `ultrasound_diagnosis` tinyint(1) DEFAULT NULL,
  `call_doctor_home` tinyint(1) DEFAULT NULL,
  `family_medicine` tinyint(1) DEFAULT NULL,
  `timpanometry` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_services`
--

INSERT INTO `med_services` (`id`, `dentistry`, `childrens_dentistry`, `therapeutic_dentistry`, `aesthetic_dentistry`, `orthodontics`, `dental _othopedics`, `dental_surgery`, `dental_Implantology`, `periodontology`, `dental_prophylaxis`, `dentistry_pregnant_women`, `tooth_whitening`, `gnathology`, `dental_bone_plastics`, `dentistry_at_home`, `allergy`, `alcoholism`, `gastroenterology`, `childrens_consultation`, `ecg`, `ct`, `mammography`, `mri`, `oncology`, `wounded`, `otorhinolaryngology`, `radiology`, `sports_medicine`, `surgery`, `ultrasound_diagnosis`, `call_doctor_home`, `family_medicine`, `timpanometry`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 1, 1, 1, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, 1),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(13, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, 1, NULL, 1, NULL, 1, NULL, 1, 1, NULL, NULL),
(14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 1, NULL, NULL, NULL),
(16, 1, NULL, 1, 1, 1, 1, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `med_summary_table`
--

CREATE TABLE `med_summary_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `actual_location_fk` int(10) UNSIGNED DEFAULT NULL,
  `organization_fk` int(10) UNSIGNED NOT NULL,
  `type_works_fk` int(10) UNSIGNED DEFAULT NULL,
  `type_institution_fk` int(10) UNSIGNED NOT NULL,
  `day_work_fk` int(10) UNSIGNED NOT NULL,
  `insurance_companies_fk` int(10) UNSIGNED DEFAULT NULL,
  `services_fk` int(10) UNSIGNED DEFAULT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_summary_table`
--

INSERT INTO `med_summary_table` (`id`, `actual_location_fk`, `organization_fk`, `type_works_fk`, `type_institution_fk`, `day_work_fk`, `insurance_companies_fk`, `services_fk`, `state`) VALUES
(1, 1, 1, NULL, 5, 1, NULL, 1, 0),
(2, 2, 2, 1, 1, 1, NULL, 2, 0),
(3, 3, 3, 1, 1, 1, NULL, 3, 0),
(4, 4, 4, 4, 1, 1, NULL, 4, 0),
(5, 5, 4, 4, 1, 1, NULL, 4, 0),
(6, 6, 4, 4, 1, 1, NULL, 4, 0),
(7, 7, 4, 4, 1, 1, NULL, 4, 0),
(8, 8, 4, 4, 1, 1, NULL, 4, 0),
(9, 9, 4, 4, 1, 1, NULL, 4, 0),
(10, 10, 4, 4, 1, 1, NULL, 4, 0),
(11, 11, 5, 1, 1, 1, NULL, 5, 0),
(12, 12, 5, 1, 1, 1, NULL, 5, 0),
(13, 13, 6, 1, 1, 1, NULL, 5, 0),
(14, 14, 6, 1, 1, 1, NULL, 5, 0),
(15, 15, 7, 1, 1, 1, NULL, 5, 0),
(16, 16, 8, 1, 1, 1, NULL, 6, 0),
(17, 17, 8, 1, 1, 1, NULL, 1, 0),
(18, 18, 9, 1, 1, 1, NULL, 1, 0),
(19, 19, 10, 1, 1, 1, NULL, 5, 0),
(20, 21, 10, 1, 1, 1, NULL, 7, 0),
(21, 22, 10, 1, 1, 1, NULL, 5, 0),
(22, 23, 10, 1, 1, 1, NULL, 5, 0),
(23, 20, 10, 1, 1, 1, NULL, 5, 0),
(24, 24, 10, 1, 1, 1, NULL, 5, 0),
(25, 25, 10, 1, 1, 1, NULL, 6, 0),
(26, 26, 10, 1, 1, 1, NULL, 8, 0),
(27, 27, 10, 1, 1, 1, NULL, 8, 0),
(28, 28, 11, 1, 1, 1, NULL, 7, 0),
(29, 29, 12, 1, 1, 1, NULL, 8, 0),
(30, 30, 13, 1, 1, 1, NULL, 8, 0),
(31, 31, 14, NULL, 7, 1, NULL, 9, 0),
(32, NULL, 15, 1, 1, 1, NULL, 1, 0),
(33, 32, 16, 1, 1, 1, NULL, 10, 0),
(34, 33, 17, 1, 1, 1, NULL, 6, 0),
(35, 34, 18, 1, 1, 1, NULL, 11, 0),
(36, 35, 19, 1, 1, 1, NULL, 1, 0),
(37, 36, 19, 1, 1, 1, NULL, 1, 0),
(38, 37, 19, 1, 1, 1, NULL, 1, 0),
(39, 38, 19, 1, 1, 1, NULL, 1, 0),
(40, 39, 19, 1, 1, 1, NULL, 1, 0),
(41, 40, 19, 1, 1, 1, NULL, 1, 0),
(42, 41, 19, 1, 1, 1, NULL, 1, 0),
(43, 43, 19, 1, 1, 1, NULL, 1, 0),
(44, 44, 19, 1, 1, 1, NULL, 1, 0),
(45, 45, 19, 1, 1, 1, NULL, 1, 0),
(46, 46, 19, 1, 1, 1, NULL, 1, 0),
(47, 47, 19, 1, 1, 1, NULL, 1, 0),
(48, 48, 19, 1, 1, 1, NULL, 1, 0),
(49, 49, 19, 1, 1, 1, NULL, 1, 0),
(50, 50, 19, 1, 1, 1, NULL, 1, 0),
(51, 51, 19, 1, 1, 1, NULL, 1, 0),
(52, 52, 19, 1, 1, 1, NULL, 1, 0),
(53, 53, 19, 1, 1, 1, NULL, 1, 0),
(54, 54, 19, 1, 1, 1, NULL, 1, 0),
(55, 55, 19, 1, 1, 1, NULL, 1, 0),
(61, 56, 19, 1, 1, 1, NULL, 1, 0),
(62, 57, 19, 1, 1, 1, NULL, 1, 0),
(63, 58, 19, 1, 1, 1, NULL, 1, 0),
(64, 59, 20, 1, 1, 1, NULL, 10, 0),
(65, 60, 21, 1, 1, 1, NULL, 6, 0),
(66, 61, 22, 1, 1, 1, NULL, 5, 0),
(67, 62, 23, 1, 1, 1, NULL, 1, 0),
(68, 63, 23, 1, 1, 1, NULL, 1, 0),
(69, 64, 23, 1, 1, 1, NULL, 1, 0),
(70, 65, 23, 1, 1, 1, NULL, 1, 0),
(71, 66, 23, 1, 1, 1, NULL, 1, 0),
(77, 67, 23, 1, 1, 1, NULL, 1, 0),
(78, 68, 23, 1, 1, 1, NULL, 1, 0),
(79, 69, 24, 1, 1, 1, NULL, 1, 0),
(80, 70, 25, 1, 1, 1, NULL, 5, 0),
(81, 71, 26, 1, 1, 1, NULL, 6, 0),
(82, 72, 27, 1, 1, 1, NULL, 6, 0),
(83, 73, 28, 1, 1, 1, NULL, 6, 0),
(84, 74, 29, 1, 1, 1, NULL, 12, 0),
(85, 75, 30, 3, 7, 1, NULL, 13, 0),
(86, 76, 28, 1, 1, 1, NULL, 6, 0),
(87, 77, 31, NULL, 2, 1, NULL, 14, 0),
(88, 78, 32, NULL, 2, 1, NULL, 1, 0),
(89, 79, 33, NULL, 2, 1, NULL, 1, 0),
(90, 80, 34, NULL, 2, 1, NULL, 1, 0),
(91, 81, 35, NULL, 2, 1, NULL, 1, 0),
(92, 82, 36, 2, 3, 1, NULL, 15, 0),
(93, 83, 37, 2, 3, 1, NULL, 15, 0),
(94, 84, 38, 5, 4, 1, NULL, 1, 0),
(95, 85, 38, NULL, 7, 1, NULL, 1, 0),
(96, 86, 39, 5, 4, 1, NULL, 1, 0),
(97, 87, 40, 5, 4, 1, NULL, 1, 0),
(98, 88, 41, 5, 4, 1, NULL, 1, 0),
(99, 89, 42, 5, 4, 1, NULL, 1, 0),
(100, 90, 42, 5, 4, 1, NULL, 1, 0),
(101, 91, 42, 5, 4, 1, NULL, 1, 0),
(102, 92, 42, 5, 4, 1, NULL, 1, 0),
(103, 93, 42, 5, 4, 1, NULL, 1, 0),
(104, 94, 42, 5, 4, 1, NULL, 1, 0),
(105, 95, 42, 5, 4, 1, NULL, 1, 0),
(106, 96, 42, 5, 4, 1, NULL, 1, 0),
(107, 97, 42, 5, 4, 1, NULL, 1, 0),
(108, 98, 42, 5, 4, 1, NULL, 1, 0),
(109, 99, 43, 1, 6, 1, NULL, 1, 0),
(110, 100, 43, 1, 6, 1, NULL, 1, 0),
(111, 101, 43, 1, 6, 1, NULL, 1, 0),
(112, 102, 43, 1, 6, 1, NULL, 1, 0),
(113, 103, 44, NULL, 8, 1, NULL, 16, 0),
(114, 104, 45, 1, 1, 1, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `med_time_work`
--

CREATE TABLE `med_time_work` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_work` datetime DEFAULT NULL,
  `end_work` datetime DEFAULT NULL,
  `weekend` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_time_work`
--

INSERT INTO `med_time_work` (`id`, `start_work`, `end_work`, `weekend`) VALUES
(1, '1970-01-01 07:00:00', '1970-01-01 19:00:00', 0),
(2, '1970-01-01 08:00:00', '1970-01-01 20:00:00', 0),
(3, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `med_type_institution`
--

CREATE TABLE `med_type_institution` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_description` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_type_institution`
--

INSERT INTO `med_type_institution` (`id`, `type_description`) VALUES
(1, 'Діагностичний центр'),
(2, 'Естетичний центр'),
(3, 'Клініка'),
(4, 'Косметична клініка'),
(5, 'Кріобанк'),
(6, 'Лабораторія'),
(7, 'Медичний центр'),
(8, 'Стоматологія');

-- --------------------------------------------------------

--
-- Структура таблицы `med_type_locality`
--

CREATE TABLE `med_type_locality` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_locality` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_type_locality`
--

INSERT INTO `med_type_locality` (`id`, `type_locality`) VALUES
(1, 'місто'),
(2, 'селище'),
(3, 'cелище міського типу');

-- --------------------------------------------------------

--
-- Структура таблицы `med_type_ownership`
--

CREATE TABLE `med_type_ownership` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_ownership` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_type_ownership`
--

INSERT INTO `med_type_ownership` (`id`, `type_ownership`) VALUES
(1, 'пр');

-- --------------------------------------------------------

--
-- Структура таблицы `med_type_works`
--

CREATE TABLE `med_type_works` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_works` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_type_works`
--

INSERT INTO `med_type_works` (`id`, `type_works`) VALUES
(1, 'Діагностика'),
(2, 'Діагностика-Лікування'),
(3, 'Діагностика-Лікування-Реабілітація '),
(4, 'Діагностика-Реабілітація'),
(5, 'Лікування');

-- --------------------------------------------------------

--
-- Структура таблицы `med_users`
--

CREATE TABLE `med_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `user_category` varchar(20) NOT NULL,
  `summary_table_fk` int(10) UNSIGNED DEFAULT NULL,
  `image_logo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `med_users`
--

INSERT INTO `med_users` (`id`, `login`, `password`, `hash`, `user_category`, `summary_table_fk`, `image_logo`) VALUES
(1, 'qwe', 'qwe', '123123', 'organization', 4, NULL),
(2, 'zxc', 'zxc', '123123', 'client', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(2, 24, 'admin', 'paffen.web@gmail.com', '', '82.117.232.132', '2016-10-24 10:11:21', '2016-10-24 09:11:21', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . Lorem ipsum dolor', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '', 0, 1),
(3, 24, 'admin', 'paffen.web@gmail.com', '', '82.117.232.132', '2016-10-24 10:11:48', '2016-10-24 09:11:48', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '', 0, 1),
(4, 24, 'admin', 'paffen.web@gmail.com', '', '82.117.232.132', '2016-10-24 10:11:59', '2016-10-24 09:11:59', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '', 0, 1),
(5, 24, 'admin', 'paffen.web@gmail.com', '', '82.117.232.132', '2016-10-24 10:12:13', '2016-10-24 09:12:13', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '', 0, 1),
(6, 24, 'admin', 'paffen.web@gmail.com', '', '82.117.232.132', '2016-10-24 10:12:22', '2016-10-24 09:12:22', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '', 0, 1),
(7, 24, 'Alex', 'yas.php@ya.ru', '', '82.117.232.132', '2016-10-24 10:15:00', '2016-10-24 09:15:00', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.59 Safari/537.36', '', 0, 0),
(8, 24, 'admin', 'paffen.web@gmail.com', '', '82.117.232.132', '2016-10-24 11:53:55', '2016-10-24 10:53:55', '3645654946465465 роарпаол лоп лопмолмп', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '', 0, 1),
(9, 24, 'testName', 'testEmail@t.com', 'http://testSite', '77.222.149.54', '2016-11-08 13:29:36', '2016-11-08 13:29:36', 'test', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36', '', 0, 0),
(10, 138, 'admin', 'paffen.web@gmail.com', '', '77.222.149.54', '2016-11-21 10:45:51', '2016-11-21 10:45:51', 'тест комментарий', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '', 0, 1),
(11, 22, 'Иван Иванов', 'yakovenko_sss@mail.ru', '', '82.117.235.36', '2017-01-31 18:45:10', '2017-01-31 16:45:10', 'Тест тест', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', '', 0, 2),
(12, 22, 'Иван Иванов', 'yakovenko_sss@mail.ru', '', '82.117.235.36', '2017-01-31 18:45:40', '2017-01-31 16:45:40', 'Тест  тест тест', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', '', 0, 2),
(13, 20, 'fdsfs', 'sdffdsd@teasas.com', 'http://sdfsd', '31.43.45.56', '2017-02-04 20:37:17', '2017-02-04 18:37:17', 'dsfsdasdas', 0, '1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '', 0, 0),
(14, 20, 'fdsfs', 'sdffdsd@teasas.com', 'http://sdfsd', '31.43.45.56', '2017-02-04 20:38:42', '2017-02-04 18:38:42', 'dsfsdsdsfsd', 0, '1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://medservice24.pirise.com', 'yes'),
(2, 'home', 'http://medservice24.pirise.com', 'yes'),
(3, 'blogname', 'MedService24', 'yes'),
(4, 'blogdescription', '', 'yes'),
(5, 'users_can_register', '1', 'yes'),
(6, 'admin_email', 'paffen.web@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '3', 'yes'),
(23, 'date_format', 'jS F Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'jS F Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:231:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:18:\"health_facility/?$\";s:35:\"index.php?post_type=health_facility\";s:48:\"health_facility/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?post_type=health_facility&feed=$matches[1]\";s:43:\"health_facility/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?post_type=health_facility&feed=$matches[1]\";s:35:\"health_facility/page/([0-9]{1,})/?$\";s:53:\"index.php?post_type=health_facility&paged=$matches[1]\";s:11:\"pharmacy/?$\";s:28:\"index.php?post_type=pharmacy\";s:41:\"pharmacy/feed/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?post_type=pharmacy&feed=$matches[1]\";s:36:\"pharmacy/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?post_type=pharmacy&feed=$matches[1]\";s:28:\"pharmacy/page/([0-9]{1,})/?$\";s:46:\"index.php?post_type=pharmacy&paged=$matches[1]\";s:9:\"doctor/?$\";s:26:\"index.php?post_type=doctor\";s:39:\"doctor/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?post_type=doctor&feed=$matches[1]\";s:34:\"doctor/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?post_type=doctor&feed=$matches[1]\";s:26:\"doctor/page/([0-9]{1,})/?$\";s:44:\"index.php?post_type=doctor&paged=$matches[1]\";s:9:\"shares/?$\";s:26:\"index.php?post_type=shares\";s:39:\"shares/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?post_type=shares&feed=$matches[1]\";s:34:\"shares/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?post_type=shares&feed=$matches[1]\";s:26:\"shares/page/([0-9]{1,})/?$\";s:44:\"index.php?post_type=shares&paged=$matches[1]\";s:6:\"ads/?$\";s:23:\"index.php?post_type=ads\";s:36:\"ads/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?post_type=ads&feed=$matches[1]\";s:31:\"ads/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?post_type=ads&feed=$matches[1]\";s:23:\"ads/page/([0-9]{1,})/?$\";s:41:\"index.php?post_type=ads&paged=$matches[1]\";s:13:\"obyavlenia/?$\";s:30:\"index.php?post_type=obyavlenia\";s:43:\"obyavlenia/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?post_type=obyavlenia&feed=$matches[1]\";s:38:\"obyavlenia/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?post_type=obyavlenia&feed=$matches[1]\";s:30:\"obyavlenia/page/([0-9]{1,})/?$\";s:48:\"index.php?post_type=obyavlenia&paged=$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:43:\"health_facility/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:53:\"health_facility/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:73:\"health_facility/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:68:\"health_facility/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:68:\"health_facility/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:49:\"health_facility/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:32:\"health_facility/([^/]+)/embed/?$\";s:48:\"index.php?health_facility=$matches[1]&embed=true\";s:36:\"health_facility/([^/]+)/trackback/?$\";s:42:\"index.php?health_facility=$matches[1]&tb=1\";s:56:\"health_facility/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:54:\"index.php?health_facility=$matches[1]&feed=$matches[2]\";s:51:\"health_facility/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:54:\"index.php?health_facility=$matches[1]&feed=$matches[2]\";s:44:\"health_facility/([^/]+)/page/?([0-9]{1,})/?$\";s:55:\"index.php?health_facility=$matches[1]&paged=$matches[2]\";s:51:\"health_facility/([^/]+)/comment-page-([0-9]{1,})/?$\";s:55:\"index.php?health_facility=$matches[1]&cpage=$matches[2]\";s:40:\"health_facility/([^/]+)(?:/([0-9]+))?/?$\";s:54:\"index.php?health_facility=$matches[1]&page=$matches[2]\";s:32:\"health_facility/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:42:\"health_facility/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:62:\"health_facility/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:57:\"health_facility/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:57:\"health_facility/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:38:\"health_facility/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:36:\"pharmacy/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:46:\"pharmacy/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:66:\"pharmacy/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"pharmacy/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"pharmacy/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:42:\"pharmacy/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:25:\"pharmacy/([^/]+)/embed/?$\";s:41:\"index.php?pharmacy=$matches[1]&embed=true\";s:29:\"pharmacy/([^/]+)/trackback/?$\";s:35:\"index.php?pharmacy=$matches[1]&tb=1\";s:49:\"pharmacy/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pharmacy=$matches[1]&feed=$matches[2]\";s:44:\"pharmacy/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pharmacy=$matches[1]&feed=$matches[2]\";s:37:\"pharmacy/([^/]+)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pharmacy=$matches[1]&paged=$matches[2]\";s:44:\"pharmacy/([^/]+)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pharmacy=$matches[1]&cpage=$matches[2]\";s:33:\"pharmacy/([^/]+)(?:/([0-9]+))?/?$\";s:47:\"index.php?pharmacy=$matches[1]&page=$matches[2]\";s:25:\"pharmacy/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:35:\"pharmacy/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:55:\"pharmacy/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:50:\"pharmacy/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:50:\"pharmacy/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:31:\"pharmacy/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:34:\"doctor/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:44:\"doctor/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:64:\"doctor/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:59:\"doctor/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:59:\"doctor/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:40:\"doctor/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:23:\"doctor/([^/]+)/embed/?$\";s:39:\"index.php?doctor=$matches[1]&embed=true\";s:27:\"doctor/([^/]+)/trackback/?$\";s:33:\"index.php?doctor=$matches[1]&tb=1\";s:47:\"doctor/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?doctor=$matches[1]&feed=$matches[2]\";s:42:\"doctor/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?doctor=$matches[1]&feed=$matches[2]\";s:35:\"doctor/([^/]+)/page/?([0-9]{1,})/?$\";s:46:\"index.php?doctor=$matches[1]&paged=$matches[2]\";s:42:\"doctor/([^/]+)/comment-page-([0-9]{1,})/?$\";s:46:\"index.php?doctor=$matches[1]&cpage=$matches[2]\";s:31:\"doctor/([^/]+)(?:/([0-9]+))?/?$\";s:45:\"index.php?doctor=$matches[1]&page=$matches[2]\";s:23:\"doctor/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:33:\"doctor/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:53:\"doctor/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:48:\"doctor/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:48:\"doctor/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:29:\"doctor/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"location_geo/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:51:\"index.php?location_geo=$matches[1]&feed=$matches[2]\";s:48:\"location_geo/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:51:\"index.php?location_geo=$matches[1]&feed=$matches[2]\";s:29:\"location_geo/([^/]+)/embed/?$\";s:45:\"index.php?location_geo=$matches[1]&embed=true\";s:41:\"location_geo/([^/]+)/page/?([0-9]{1,})/?$\";s:52:\"index.php?location_geo=$matches[1]&paged=$matches[2]\";s:23:\"location_geo/([^/]+)/?$\";s:34:\"index.php?location_geo=$matches[1]\";s:34:\"shares/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:44:\"shares/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:64:\"shares/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:59:\"shares/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:59:\"shares/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:40:\"shares/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:23:\"shares/([^/]+)/embed/?$\";s:39:\"index.php?shares=$matches[1]&embed=true\";s:27:\"shares/([^/]+)/trackback/?$\";s:33:\"index.php?shares=$matches[1]&tb=1\";s:47:\"shares/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?shares=$matches[1]&feed=$matches[2]\";s:42:\"shares/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?shares=$matches[1]&feed=$matches[2]\";s:35:\"shares/([^/]+)/page/?([0-9]{1,})/?$\";s:46:\"index.php?shares=$matches[1]&paged=$matches[2]\";s:42:\"shares/([^/]+)/comment-page-([0-9]{1,})/?$\";s:46:\"index.php?shares=$matches[1]&cpage=$matches[2]\";s:31:\"shares/([^/]+)(?:/([0-9]+))?/?$\";s:45:\"index.php?shares=$matches[1]&page=$matches[2]\";s:23:\"shares/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:33:\"shares/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:53:\"shares/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:48:\"shares/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:48:\"shares/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:29:\"shares/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:31:\"ads/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:41:\"ads/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:61:\"ads/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\"ads/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\"ads/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:37:\"ads/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:20:\"ads/([^/]+)/embed/?$\";s:36:\"index.php?ads=$matches[1]&embed=true\";s:24:\"ads/([^/]+)/trackback/?$\";s:30:\"index.php?ads=$matches[1]&tb=1\";s:44:\"ads/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?ads=$matches[1]&feed=$matches[2]\";s:39:\"ads/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?ads=$matches[1]&feed=$matches[2]\";s:32:\"ads/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?ads=$matches[1]&paged=$matches[2]\";s:39:\"ads/([^/]+)/comment-page-([0-9]{1,})/?$\";s:43:\"index.php?ads=$matches[1]&cpage=$matches[2]\";s:28:\"ads/([^/]+)(?:/([0-9]+))?/?$\";s:42:\"index.php?ads=$matches[1]&page=$matches[2]\";s:20:\"ads/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:30:\"ads/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:50:\"ads/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:45:\"ads/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:45:\"ads/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:26:\"ads/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:38:\"obyavlenia/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:48:\"obyavlenia/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:68:\"obyavlenia/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:63:\"obyavlenia/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:63:\"obyavlenia/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:44:\"obyavlenia/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:27:\"obyavlenia/([^/]+)/embed/?$\";s:43:\"index.php?obyavlenia=$matches[1]&embed=true\";s:31:\"obyavlenia/([^/]+)/trackback/?$\";s:37:\"index.php?obyavlenia=$matches[1]&tb=1\";s:51:\"obyavlenia/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?obyavlenia=$matches[1]&feed=$matches[2]\";s:46:\"obyavlenia/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?obyavlenia=$matches[1]&feed=$matches[2]\";s:39:\"obyavlenia/([^/]+)/page/?([0-9]{1,})/?$\";s:50:\"index.php?obyavlenia=$matches[1]&paged=$matches[2]\";s:46:\"obyavlenia/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?obyavlenia=$matches[1]&cpage=$matches[2]\";s:35:\"obyavlenia/([^/]+)(?:/([0-9]+))?/?$\";s:49:\"index.php?obyavlenia=$matches[1]&page=$matches[2]\";s:27:\"obyavlenia/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"obyavlenia/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"obyavlenia/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"obyavlenia/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"obyavlenia/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"obyavlenia/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:38:\"index.php?&page_id=5&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"([^/]+)/embed/?$\";s:37:\"index.php?name=$matches[1]&embed=true\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:24:\"([^/]+)(?:/([0-9]+))?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:22:\"[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:13:{i:0;s:45:\"acf-flexible-content/acf-flexible-content.php\";i:1;s:27:\"acf-gallery/acf-gallery.php\";i:2;s:37:\"acf-options-page/acf-options-page.php\";i:3;s:29:\"acf-repeater/acf-repeater.php\";i:4;s:30:\"advanced-custom-fields/acf.php\";i:5;s:36:\"contact-form-7/wp-contact-form-7.php\";i:6;s:38:\"post-duplicator/m4c-postduplicator.php\";i:7;s:47:\"regenerate-thumbnails/regenerate-thumbnails.php\";i:8;s:25:\"subscribe2/subscribe2.php\";i:9;s:27:\"wp-pagenavi/wp-pagenavi.php\";i:10;s:21:\"wp-polls/wp-polls.php\";i:11;s:33:\"wp-postratings/wp-postratings.php\";i:12;s:33:\"zm-ajax-login-register/plugin.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', 'a:4:{i:0;s:111:\"/home/uh347272/domains/pirise.com/public_html/medservice24/wp-content/plugins/zm-ajax-login-register/plugin.php\";i:1;s:108:\"/home/uh347272/domains/pirise.com/public_html/medservice24/wp-content/plugins/advanced-custom-fields/acf.php\";i:2;s:99:\"/home/uh347272/domains/pirise.com/public_html/medservice24/wp-content/themes/medservice24/style.css\";i:3;s:0:\"\";}', 'no'),
(40, 'template', 'medservice24', 'yes'),
(41, 'stylesheet', 'medservice24', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '38590', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'page', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:1:{s:27:\"wp-pagenavi/wp-pagenavi.php\";s:14:\"__return_false\";}', 'no'),
(82, 'timezone_string', 'Europe/Kiev', 'yes'),
(83, 'page_for_posts', '119', 'yes'),
(84, 'page_on_front', '5', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'initial_db_version', '37965', 'yes'),
(92, 'wp_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:73:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:18:\"theme_options_view\";b:1;s:20:\"wpgmp_admin_overview\";b:1;s:19:\"wpgmp_form_location\";b:1;s:21:\"wpgmp_manage_location\";b:1;s:14:\"wpgmp_form_map\";b:1;s:16:\"wpgmp_manage_map\";b:1;s:20:\"wpgmp_form_group_map\";b:1;s:22:\"wpgmp_manage_group_map\";b:1;s:21:\"wpgmp_manage_settings\";b:1;s:10:\"copy_posts\";b:1;s:12:\"manage_polls\";b:1;s:14:\"manage_ratings\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:35:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:10:\"copy_posts\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'yes'),
(93, 'WPLANG', 'ru_RU', 'yes'),
(94, 'widget_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(95, 'widget_recent-posts', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(96, 'widget_recent-comments', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(97, 'widget_archives', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(364, 'ajax_login_register_plugin_notice_shown', 'true', 'yes'),
(98, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'sidebars_widgets', 'a:5:{s:19:\"wp_inactive_widgets\";a:0:{}s:15:\"default-sidebar\";a:0:{}s:22:\"sidebar-subscribe-home\";a:1:{i:0;s:16:\"s2_form_widget-2\";}s:18:\"sidebar-polls-home\";a:1:{i:0;s:14:\"polls-widget-2\";}s:13:\"array_version\";i:3;}', 'yes'),
(184, 'widget_recent-posts-from-category', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(102, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(103, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(104, 'cron', 'a:5:{i:1502900891;a:1:{s:10:\"polls_cron\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1502932931;a:3:{s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1502976139;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1502976185;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}', 'yes'),
(456, 'options_contact_footer_2_phone', '<a href=\"tel:0969885566\">(096) 988 55 66</a>', 'no'),
(4351, '_transient_timeout_feed_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1502754254', 'no'),
(4352, '_transient_timeout_feed_mod_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1502754254', 'no'),
(4353, '_transient_feed_mod_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1502711054', 'no'),
(253, 'geoip-detect-source', 'hostinfo', 'yes'),
(254, 'geoip-detect-disable_pagecache', '1', 'yes'),
(255, 'geoip-detect-plugin_version', '2.6.0', 'yes'),
(4371, '_site_transient_timeout_theme_roots', '1502895284', 'no'),
(4372, '_site_transient_theme_roots', 'a:2:{s:12:\"medservice24\";s:7:\"/themes\";s:13:\"twentyfifteen\";s:7:\"/themes\";}', 'no'),
(4360, '_transient_timeout_plugin_slugs', '1502797725', 'no'),
(4361, '_transient_plugin_slugs', 'a:14:{i:0;s:30:\"advanced-custom-fields/acf.php\";i:1;s:45:\"acf-flexible-content/acf-flexible-content.php\";i:2;s:27:\"acf-gallery/acf-gallery.php\";i:3;s:37:\"acf-options-page/acf-options-page.php\";i:4;s:29:\"acf-repeater/acf-repeater.php\";i:5;s:36:\"contact-form-7/wp-contact-form-7.php\";i:6;s:33:\"duplicate-post/duplicate-post.php\";i:7;s:38:\"post-duplicator/m4c-postduplicator.php\";i:8;s:47:\"regenerate-thumbnails/regenerate-thumbnails.php\";i:9;s:25:\"subscribe2/subscribe2.php\";i:10;s:27:\"wp-pagenavi/wp-pagenavi.php\";i:11;s:21:\"wp-polls/wp-polls.php\";i:12;s:33:\"wp-postratings/wp-postratings.php\";i:13;s:33:\"zm-ajax-login-register/plugin.php\";}', 'no'),
(125, 'recently_activated', 'a:0:{}', 'yes'),
(4357, '_transient_timeout_feed_b9388c83948825c1edaef0d856b7b109', '1502754259', 'no'),
(4358, '_transient_timeout_feed_mod_b9388c83948825c1edaef0d856b7b109', '1502754259', 'no'),
(4359, '_transient_feed_mod_b9388c83948825c1edaef0d856b7b109', '1502711059', 'no'),
(4362, '_transient_timeout_dash_f69de0bbfe7eaa113146875f40c02000', '1502754259', 'no'),
(4363, '_transient_dash_f69de0bbfe7eaa113146875f40c02000', '<div class=\"rss-widget\"><ul><li><a class=\'rsswidget\' href=\'https://wordpress.org/news/2017/08/wordpress-4-8-1-maintenance-release/\'>WordPress 4.8.1 Maintenance Release</a> <span class=\"rss-date\">2nd Август 2017</span><div class=\"rssSummary\">After over 13 million downloads of WordPress 4.8, we are pleased to announce the immediate availability of WordPress 4.8.1, a maintenance release. This release contains 29 maintenance fixes and enhancements, chief among them are fixes to the rich Text widget and the introduction of the Custom HTML widget. For a full list of changes, consult the release [&hellip;]</div></li></ul></div><div class=\"rss-widget\"><ul><li><a class=\'rsswidget\' href=\'https://wptavern.com/early-results-from-nrkbetas-comment-quiz-plugin-show-readers-enjoy-the-quiz-but-rarely-leave-a-comment\'>WPTavern: Early Results from NRKbeta’s Comment Quiz Plugin Show Readers Enjoy the Quiz but Rarely Leave a Comment</a></li><li><a class=\'rsswidget\' href=\'https://wptavern.com/in-case-you-missed-it-issue-23\'>WPTavern: In Case You Missed It – Issue 23</a></li><li><a class=\'rsswidget\' href=\'https://wptavern.com/wordpress-4-9-to-focus-on-code-editing-and-customization-improvements-targeted-for-november-14\'>WPTavern: WordPress 4.9 to Focus on Code Editing and Customization Improvements, Targeted for November 14</a></li></ul></div><div class=\"rss-widget\"><ul><li class=\"dashboard-news-plugin\"><span>Популярный плагин:</span> WordPress Importer&nbsp;<a href=\"plugin-install.php?tab=plugin-information&amp;plugin=wordpress-importer&amp;_wpnonce=1abb995899&amp;TB_iframe=true&amp;width=600&amp;height=800\" class=\"thickbox open-plugin-details-modal\" aria-label=\"Установить WordPress Importer\">(Установить)</a></li></ul></div>', 'no'),
(2713, '_site_transient_timeout_browser_754cdcc1e6416d7a56262cf3d275472d', '1491311628', 'no'),
(2714, '_site_transient_browser_754cdcc1e6416d7a56262cf3d275472d', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"56.0.2924.87\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no'),
(3360, '_site_transient_browser_879d478c3faf161a652d4329309fc3d3', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"58.0.3029.96\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no'),
(3359, '_site_transient_timeout_browser_879d478c3faf161a652d4329309fc3d3', '1495534729', 'no'),
(1813, '_transient_timeout_dash_5f25301ca0145abac6dfc3a0899dc43b', '1484880431', 'no'),
(1814, '_transient_dash_5f25301ca0145abac6dfc3a0899dc43b', '<div class=\"rss-widget\"><ul><li><a class=\'rsswidget\' href=\'https://wordpress.org/news/2017/01/wordpress-4-7-1-security-and-maintenance-release/\'>WordPress 4.7.1 Security and Maintenance Release</a> <span class=\"rss-date\">11th January 2017</span><div class=\"rssSummary\">WordPress 4.7 has been downloaded over 10 million times since its release on December 6, 2016 and we are pleased to announce the immediate availability of WordPress 4.7.1. This is a security release for all previous versions and we strongly encourage you to update your sites immediately. WordPress versions 4.7 and earlier are affected by eight security issues: [&hellip;]</div></li></ul></div><div class=\"rss-widget\"><ul><li><a class=\'rsswidget\' href=\'https://poststatus.com/shaping-success-wordcamps/\'>Post Status: Shaping a vision of success</a></li><li><a class=\'rsswidget\' href=\'https://wptavern.com/jetpack-4-5-expands-monetization-with-wordads-integration\'>WPTavern: Jetpack 4.5 Expands Monetization with WordAds Integration</a></li><li><a class=\'rsswidget\' href=\'https://wptavern.com/wpweekly-episode-260-siteground-affiliate-summit-recap-and-new-security-czar\'>WPTavern: WPWeekly Episode 260 – SiteGround, Affiliate Summit Recap, and New Security Czar</a></li></ul></div><div class=\"rss-widget\"><ul><li class=\"dashboard-news-plugin\"><span>Popular Plugin:</span> Google Analytics Dashboard for WP&nbsp;<a href=\"plugin-install.php?tab=plugin-information&amp;plugin=google-analytics-dashboard-for-wp&amp;_wpnonce=3484cc8e02&amp;TB_iframe=true&amp;width=600&amp;height=800\" class=\"thickbox open-plugin-details-modal\" aria-label=\"Install Google Analytics Dashboard for WP\">(Install)</a></li></ul></div>', 'no'),
(1773, '_site_transient_timeout_browser_624a74c077a47cf0aab8606325ccd24d', '1485364933', 'no'),
(1774, '_site_transient_browser_624a74c077a47cf0aab8606325ccd24d', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:7:\"Firefox\";s:7:\"version\";s:4:\"50.0\";s:10:\"update_url\";s:23:\"http://www.firefox.com/\";s:7:\"img_src\";s:50:\"http://s.wordpress.org/images/browsers/firefox.png\";s:11:\"img_src_ssl\";s:49:\"https://wordpress.org/images/browsers/firefox.png\";s:15:\"current_version\";s:2:\"16\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no'),
(448, 'options_service_footer', '<h3>Сервис</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>', 'no'),
(449, '_options_service_footer', 'field_5809d50cbd09b', 'no'),
(450, 'options_patient_footer', '<h3>Пациенту</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>', 'no'),
(451, '_options_patient_footer', 'field_5809d52abd09c', 'no'),
(452, 'options_contact_footer_0_phone', '<a href=\"tel:0969885566\">(096) 988 55 66</a>', 'no'),
(453, '_options_contact_footer_0_phone', 'field_5809d5c4d50e7', 'no'),
(454, 'options_contact_footer_1_phone', '<a href=\"tel:0969885566\">(096) 988 55 66</a>', 'no'),
(455, '_options_contact_footer_1_phone', 'field_5809d5c4d50e7', 'no'),
(132, 'acf_version', '4.4.11', 'yes'),
(134, 'theme_mods_twentyfifteen', 'a:1:{s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1476105827;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(135, 'current_theme', 'MedService24', 'yes'),
(136, 'theme_mods_medservice24', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:7:\"primary\";i:17;}s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(137, 'theme_switched', '', 'yes'),
(365, 'zm_alr', 'a:9:{s:25:\"zm_alr_design_form_layout\";s:21:\"zm_alr_design_default\";s:24:\"zm_alr_misc_login_handle\";s:0:\"\";s:27:\"zm_alr_misc_register_handle\";s:0:\"\";s:32:\"zm_alr_misc_force_check_password\";s:14:\"zm_alr_misc_no\";s:26:\"zm_alr_misc_pre_load_forms\";s:23:\"zm_alr_misc_pre_load_no\";s:40:\"zm_alr_redirect_redirect_after_login_url\";s:1:\"5\";s:35:\"zm_alr_social_facebook_login_button\";s:111:\"http://medservice24.pirise.com/wp-content/plugins/zm-ajax-login-register/assets/images/facebook-screen-grab.png\";s:31:\"zm_alr_design_additonal_styling\";s:0:\"\";s:29:\"zm_alr_social_facebook_app_id\";s:0:\"\";}', 'yes'),
(377, 'duplicate_post_copytitle', '1', 'yes'),
(378, 'duplicate_post_copydate', '0', 'yes'),
(379, 'duplicate_post_copystatus', '0', 'yes'),
(380, 'duplicate_post_copyslug', '1', 'yes'),
(381, 'duplicate_post_copyexcerpt', '1', 'yes'),
(382, 'duplicate_post_copycontent', '1', 'yes'),
(383, 'duplicate_post_copypassword', '0', 'yes'),
(384, 'duplicate_post_copyattachments', '0', 'yes'),
(385, 'duplicate_post_copychildren', '0', 'yes'),
(386, 'duplicate_post_copycomments', '0', 'yes'),
(387, 'duplicate_post_taxonomies_blacklist', 'a:0:{}', 'yes'),
(388, 'duplicate_post_blacklist', '', 'yes'),
(389, 'duplicate_post_types_enabled', 'a:2:{i:0;s:4:\"post\";i:1;s:4:\"page\";}', 'yes'),
(390, 'duplicate_post_show_row', '1', 'yes'),
(391, 'duplicate_post_show_adminbar', '1', 'yes'),
(392, 'duplicate_post_show_submitbox', '1', 'yes'),
(393, 'duplicate_post_version', '3.0.2', 'yes'),
(411, 'category_children', 'a:0:{}', 'yes'),
(419, 'mtphr_post_duplicator_settings', '', 'yes'),
(431, 'wpcf7', 'a:2:{s:7:\"version\";s:3:\"4.6\";s:13:\"bulk_validate\";a:4:{s:9:\"timestamp\";d:1476980020;s:7:\"version\";s:5:\"4.5.1\";s:11:\"count_valid\";i:1;s:13:\"count_invalid\";i:0;}}', 'yes'),
(424, 'subscribe2_options', 'a:40:{s:7:\"autosub\";s:2:\"no\";s:15:\"newreg_override\";s:2:\"no\";s:8:\"wpregdef\";s:2:\"no\";s:10:\"autoformat\";s:4:\"post\";s:12:\"show_autosub\";s:3:\"yes\";s:11:\"autosub_def\";s:3:\"yes\";s:12:\"comment_subs\";s:2:\"no\";s:11:\"comment_def\";s:2:\"no\";s:17:\"one_click_profile\";s:2:\"no\";s:8:\"bcclimit\";i:1;s:11:\"admin_email\";s:4:\"subs\";s:8:\"tracking\";s:0:\"\";s:6:\"s2page\";i:0;s:10:\"stylesheet\";s:3:\"yes\";s:5:\"pages\";s:2:\"no\";s:8:\"password\";s:2:\"no\";s:8:\"stickies\";s:2:\"no\";s:7:\"private\";s:2:\"no\";s:10:\"email_freq\";s:5:\"never\";s:10:\"cron_order\";s:4:\"desc\";s:10:\"compulsory\";s:0:\"\";s:7:\"exclude\";s:0:\"\";s:6:\"sender\";s:8:\"blogname\";s:12:\"reg_override\";s:1:\"1\";s:9:\"show_meta\";s:1:\"0\";s:11:\"show_button\";s:1:\"1\";s:4:\"ajax\";s:1:\"0\";s:6:\"widget\";s:1:\"1\";s:13:\"counterwidget\";s:1:\"0\";s:14:\"s2meta_default\";s:1:\"0\";s:7:\"entries\";i:25;s:6:\"barred\";s:0:\"\";s:15:\"exclude_formats\";s:0:\"\";s:8:\"mailtext\";s:215:\"{BLOGNAME} has posted a new item, \'{TITLE}\'\n\n{POST}\n\nYou may view the latest post at\n{PERMALINK}\n\nYou received this e-mail because you asked to be notified when new updates are posted.\nBest regards,\n{MYNAME}\n{EMAIL}\";s:20:\"notification_subject\";s:20:\"[{BLOGNAME}] {TITLE}\";s:13:\"confirm_email\";s:229:\"{BLOGNAME} has received a request to {ACTION} for this email address. To complete your request please click on the link below:\n\n{LINK}\n\nIf you did not request this, please feel free to disregard this notice!\n\nThank you,\n{MYNAME}.\";s:15:\"confirm_subject\";s:40:\"[{BLOGNAME}] Please confirm your request\";s:12:\"remind_email\";s:348:\"This email address was subscribed for notifications at {BLOGNAME} ({BLOGLINK}) but the subscription remains incomplete.\n\nIf you wish to complete your subscription please click on the link below:\n\n{LINK}\n\nIf you do not wish to complete your subscription please ignore this email and your address will be removed from our database.\n\nRegards,\n{MYNAME}\";s:14:\"remind_subject\";s:34:\"[{BLOGNAME}] Subscription Reminder\";s:7:\"version\";s:5:\"10.21\";}', 'yes'),
(425, 'widget_s2_form_widget', 'a:2:{i:2;a:10:{s:5:\"title\";s:0:\"\";s:3:\"div\";s:14:\"subscribe-form\";s:16:\"widgetprecontent\";s:63:\"<h3>ПОДПИШИТЕСЬ  НА НАШУ РАССЫЛКУ</h3>\";s:17:\"widgetpostcontent\";s:0:\"\";s:4:\"size\";i:20;s:10:\"hidebutton\";s:11:\"unsubscribe\";s:6:\"postto\";s:4:\"home\";s:2:\"js\";s:0:\"\";s:10:\"noantispam\";s:4:\"true\";s:6:\"nowrap\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(457, '_options_contact_footer_2_phone', 'field_5809d5c4d50e7', 'no'),
(458, 'options_contact_footer', '3', 'no'),
(459, '_options_contact_footer', 'field_5809d5acd50e6', 'no'),
(462, 'options_email_footer', 'medinfo@gmail.com', 'no'),
(463, '_options_email_footer', 'field_5809d6558983a', 'no'),
(464, 'options_social_0_link', '#', 'no'),
(465, '_options_social_0_link', 'field_580a00d5aa259', 'no'),
(466, 'options_social_1_link', '#', 'no'),
(467, '_options_social_1_link', 'field_580a00d5aa259', 'no'),
(468, 'options_social_2_link', '#', 'no'),
(469, '_options_social_2_link', 'field_580a00d5aa259', 'no'),
(470, 'options_social', '3', 'no'),
(471, '_options_social', 'field_580a00bcaa258', 'no'),
(472, 'options_social_0_class', 'twitter', 'no'),
(473, '_options_social_0_class', 'field_580a014fb61fc', 'no'),
(474, 'options_social_1_class', 'linkedIn', 'no'),
(475, '_options_social_1_class', 'field_580a014fb61fc', 'no'),
(476, 'options_social_2_class', 'googleplus', 'no'),
(477, '_options_social_2_class', 'field_580a014fb61fc', 'no'),
(478, 'options_social_0_icon', '95', 'no'),
(479, '_options_social_0_icon', 'field_580a024b0c275', 'no'),
(480, 'options_social_1_icon', '94', 'no'),
(481, '_options_social_1_icon', 'field_580a024b0c275', 'no'),
(482, 'options_social_2_icon', '93', 'no'),
(483, '_options_social_2_icon', 'field_580a024b0c275', 'no'),
(490, 'poll_template_voteheader', '<p style=\\\"text-align: center;\\\"><strong>%POLL_QUESTION%</strong></p><div id=\\\"polls-%POLL_ID%-ans\\\" class=\\\"wp-polls-ans\\\">\r\n<ul class=\\\"wp-polls-ul\\\">', 'yes'),
(491, 'poll_template_votebody', '<li><input type=\\\"%POLL_CHECKBOX_RADIO%\\\" id=\\\"poll-answer-%POLL_ANSWER_ID%\\\" name=\\\"poll_%POLL_ID%\\\" value=\\\"%POLL_ANSWER_ID%\\\" /> <label for=\\\"poll-answer-%POLL_ANSWER_ID%\\\">%POLL_ANSWER%</label></li>', 'yes'),
(492, 'poll_template_votefooter', '</ul><p style=\\\"text-align: center;\\\"><input type=\\\"button\\\" name=\\\"vote\\\" value=\\\"   Голосовать   \\\" class=\\\"Buttons\\\" onclick=\\\"poll_vote(%POLL_ID%);\\\" /></p><p style=\\\"text-align: center;\\\"><a href=\\\"#ViewPollResults\\\" onclick=\\\"poll_result(%POLL_ID%); return false;\\\" title=\\\"View Results Of This Poll\\\">Посмотреть Результаты</a></p></div>', 'yes'),
(493, 'poll_template_resultheader', '<p style=\\\"text-align: center;\\\"><strong>%POLL_QUESTION%</strong></p><div id=\\\"polls-%POLL_ID%-ans\\\" class=\\\"wp-polls-ans\\\"><ul class=\\\"wp-polls-ul\\\">', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(494, 'poll_template_resultbody', '<li>%POLL_ANSWER% <small>(%POLL_ANSWER_PERCENTAGE%%, %POLL_ANSWER_VOTES% Votes)</small><div class=\\\"pollbar\\\" style=\\\"width: %POLL_ANSWER_IMAGEWIDTH%%;\\\" title=\\\"%POLL_ANSWER_TEXT% (%POLL_ANSWER_PERCENTAGE%% | %POLL_ANSWER_VOTES% Votes)\\\"></div></li>', 'yes'),
(495, 'poll_template_resultbody2', '<li><strong><i>%POLL_ANSWER% <small>(%POLL_ANSWER_PERCENTAGE%%, %POLL_ANSWER_VOTES% Votes)</small></i></strong><div class=\\\"pollbar\\\" style=\\\"width: %POLL_ANSWER_IMAGEWIDTH%%;\\\" title=\\\"You Have Voted For This Choice - %POLL_ANSWER_TEXT% (%POLL_ANSWER_PERCENTAGE%% | %POLL_ANSWER_VOTES% Votes)\\\"></div></li>', 'yes'),
(496, 'poll_template_resultfooter', '</ul></div>', 'yes'),
(497, 'poll_template_resultfooter2', '</ul><p style=\\\"text-align: center;\\\"><a href=\\\"#VotePoll\\\" onclick=\\\"poll_booth(%POLL_ID%); return false;\\\" title=\\\"Vote For This Poll\\\">Голосовать</a></p></div>', 'yes'),
(498, 'poll_template_disable', 'Sorry, there are no polls available at the moment.', 'yes'),
(499, 'poll_template_error', 'An error has occurred when processing your poll.', 'yes'),
(500, 'poll_currentpoll', '0', 'yes'),
(501, 'poll_latestpoll', '1', 'yes'),
(502, 'poll_archive_perpage', '5', 'yes'),
(503, 'poll_ans_sortby', 'polla_aid', 'yes'),
(504, 'poll_ans_sortorder', 'asc', 'yes'),
(505, 'poll_ans_result_sortby', 'polla_votes', 'yes'),
(506, 'poll_ans_result_sortorder', 'desc', 'yes'),
(507, 'poll_logging_method', '0', 'yes'),
(508, 'poll_allowtovote', '2', 'yes'),
(509, 'poll_archive_url', 'http://medservice24.pirise.com/pollsarchive', 'yes'),
(510, 'poll_bar', 'a:4:{s:5:\"style\";s:16:\"default_gradient\";s:10:\"background\";s:6:\"d8e1eb\";s:6:\"border\";s:6:\"c8c8c8\";s:6:\"height\";i:10;}', 'yes'),
(511, 'poll_close', '1', 'yes'),
(512, 'poll_ajax_style', 'a:2:{s:7:\"loading\";i:1;s:6:\"fading\";i:1;}', 'yes'),
(513, 'poll_template_pollarchivelink', '<ul><li><a href=\\\"%POLL_ARCHIVE_URL%\\\">Polls Archive</a></li></ul>', 'yes'),
(514, 'poll_archive_displaypoll', '2', 'yes'),
(515, 'poll_template_pollarchiveheader', '', 'yes'),
(516, 'poll_template_pollarchivefooter', '<p>Start Date: %POLL_START_DATE%<br />End Date: %POLL_END_DATE%</p>', 'yes'),
(517, 'poll_cookielog_expiry', '0', 'yes'),
(518, 'poll_template_pollarchivepagingheader', '', 'yes'),
(519, 'poll_template_pollarchivepagingfooter', '', 'yes'),
(520, 'widget_polls-widget', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:7:\"poll_id\";i:1;s:19:\"display_pollarchive\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(565, 'postratings_image', 'stars', 'yes'),
(566, 'postratings_max', '5', 'yes'),
(567, 'postratings_template_vote', '<span>%RATINGS_AVERAGE%</span>%RATINGS_IMAGES_VOTE%', 'yes'),
(3667, '_site_transient_timeout_available_translations', '1497274394', 'no'),
(568, 'postratings_template_text', '<em><strong>%RATINGS_USERS%</strong> votes, average: <strong>%RATINGS_AVERAGE%</strong> out of %RATINGS_MAX%, <strong>rated</strong></em>\r\n%RATINGS_IMAGES%', 'yes'),
(569, 'postratings_template_none', 'No Ratings Yet <br />%RATINGS_IMAGES_VOTE% <br />%RATINGS_TEXT%', 'yes'),
(570, 'postratings_logging_method', '0', 'yes'),
(571, 'postratings_allowtorate', '2', 'yes'),
(572, 'postratings_ratingstext', 'a:5:{i:0;s:6:\"1 Star\";i:1;s:7:\"2 Stars\";i:2;s:7:\"3 Stars\";i:3;s:7:\"4 Stars\";i:4;s:7:\"5 Stars\";}', 'yes'),
(573, 'postratings_template_highestrated', '<li><a href=\\\"%POST_URL%\\\" title=\\\"%POST_TITLE%\\\">%POST_TITLE%</a> %RATINGS_IMAGES% (%RATINGS_AVERAGE% out of %RATINGS_MAX%)</li>', 'yes'),
(574, 'postratings_ajax_style', 'a:2:{s:7:\"loading\";i:1;s:6:\"fading\";i:1;}', 'yes'),
(575, 'postratings_ratingsvalue', 'a:5:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;}', 'yes'),
(576, 'postratings_customrating', '0', 'yes'),
(577, 'postratings_template_permission', '%RATINGS_IMAGES% (<em><strong>%RATINGS_USERS%</strong> votes, average: <strong>%RATINGS_AVERAGE%</strong> out of %RATINGS_MAX%</em>)<br /><em>You need to be a registered member to rate this post.</em>', 'yes'),
(578, 'postratings_template_mostrated', '<li><a href=\\\"%POST_URL%\\\"  title=\\\"%POST_TITLE%\\\">%POST_TITLE%</a> - %RATINGS_USERS% votes</li>', 'yes'),
(579, 'widget_ratings-widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(580, 'postratings_options', 'a:1:{s:11:\"richsnippet\";i:0;}', 'yes'),
(151, 'wpgmza_temp_api', 'AIzaSyChPphumyabdfggISDNBuGOlGVBgEvZnGE', 'yes'),
(260, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes'),
(261, 'options_logo', '52', 'no'),
(262, '_options_logo', 'field_57fb9b4bf775c', 'no'),
(148, 'widget_wpgmp_google_map_widget_class', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(152, 'wpgmza_xml_location', '{uploads_dir}/wp-google-maps/', 'yes'),
(153, 'wpgmza_xml_url', '{uploads_url}/wp-google-maps/', 'yes'),
(154, 'wpgmza_db_version', '6.3.19', 'yes'),
(155, 'wpgmaps_current_version', '6.3.19', 'yes'),
(156, 'widget_wpgmza_map_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(157, 'WPGMZA_OTHER_SETTINGS', 'a:1:{s:27:\"wpgmza_settings_marker_pull\";s:1:\"0\";}', 'yes'),
(158, 'WPGMZA_FIRST_TIME', '6.3.19', 'yes'),
(159, 'wpgmza_stats', 'a:1:{s:15:\"list_maps_basic\";a:3:{s:5:\"views\";i:1;s:13:\"last_accessed\";s:19:\"2016-10-10 15:25:01\";s:14:\"first_accessed\";s:19:\"2016-10-10 15:25:01\";}}', 'yes'),
(363, 'zm_alr_version', '2.0.2', 'yes'),
(162, 'widget_gmp_map_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(334, 'location_geo_children', 'a:4:{i:2;a:4:{i:0;i:7;i:1;i:9;i:2;i:10;i:3;i:11;}i:3;a:2:{i:0;i:8;i:1;i:19;}i:7;a:4:{i:0;i:12;i:1;i:13;i:2;i:14;i:3;i:15;}i:6;a:1:{i:0;i:16;}}', 'yes'),
(263, 'options_title_block_search', 'Поиск клиник и врачей по Украине', 'no'),
(264, '_options_title_block_search', 'field_57ff59cc184a3', 'no'),
(1882, 'fresh_site', '0', 'yes'),
(621, 'pagenavi_options', 'a:15:{s:10:\"pages_text\";s:36:\"Page %CURRENT_PAGE% of %TOTAL_PAGES%\";s:12:\"current_text\";s:13:\"%PAGE_NUMBER%\";s:9:\"page_text\";s:13:\"%PAGE_NUMBER%\";s:10:\"first_text\";s:13:\"&laquo; First\";s:9:\"last_text\";s:12:\"Last &raquo;\";s:9:\"prev_text\";s:7:\"&laquo;\";s:9:\"next_text\";s:7:\"&raquo;\";s:12:\"dotleft_text\";s:3:\"...\";s:13:\"dotright_text\";s:3:\"...\";s:9:\"num_pages\";i:5;s:23:\"num_larger_page_numbers\";i:3;s:28:\"larger_page_numbers_multiple\";i:10;s:11:\"always_show\";b:0;s:16:\"use_pagenavi_css\";b:1;s:5:\"style\";i:1;}', 'yes'),
(2019, '_site_transient_browser_f731f7616ab74b84eb6e37a4dee2a379', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:7:\"Firefox\";s:7:\"version\";s:4:\"51.0\";s:10:\"update_url\";s:23:\"http://www.firefox.com/\";s:7:\"img_src\";s:50:\"http://s.wordpress.org/images/browsers/firefox.png\";s:11:\"img_src_ssl\";s:49:\"https://wordpress.org/images/browsers/firefox.png\";s:15:\"current_version\";s:2:\"16\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no'),
(4374, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1502893490;s:7:\"checked\";a:2:{s:12:\"medservice24\";s:1:\"1\";s:13:\"twentyfifteen\";s:3:\"1.6\";}s:8:\"response\";a:1:{s:13:\"twentyfifteen\";a:4:{s:5:\"theme\";s:13:\"twentyfifteen\";s:11:\"new_version\";s:3:\"1.8\";s:3:\"url\";s:43:\"https://wordpress.org/themes/twentyfifteen/\";s:7:\"package\";s:59:\"https://downloads.wordpress.org/theme/twentyfifteen.1.8.zip\";}}s:12:\"translations\";a:0:{}}', 'no'),
(4375, '_site_transient_update_plugins', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1502893492;s:8:\"response\";a:5:{s:36:\"contact-form-7/wp-contact-form-7.php\";O:8:\"stdClass\":8:{s:2:\"id\";s:28:\"w.org/plugins/contact-form-7\";s:4:\"slug\";s:14:\"contact-form-7\";s:6:\"plugin\";s:36:\"contact-form-7/wp-contact-form-7.php\";s:11:\"new_version\";s:5:\"4.8.1\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/contact-form-7/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/contact-form-7.4.8.1.zip\";s:6:\"tested\";s:5:\"4.8.1\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}s:33:\"duplicate-post/duplicate-post.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/duplicate-post\";s:4:\"slug\";s:14:\"duplicate-post\";s:6:\"plugin\";s:33:\"duplicate-post/duplicate-post.php\";s:11:\"new_version\";s:3:\"3.2\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/duplicate-post/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/plugin/duplicate-post.3.2.zip\";s:14:\"upgrade_notice\";s:55:\"<p>new website + WPML compatibility + various fixes</p>\";s:6:\"tested\";s:3:\"4.8\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}s:38:\"post-duplicator/m4c-postduplicator.php\";O:8:\"stdClass\":8:{s:2:\"id\";s:29:\"w.org/plugins/post-duplicator\";s:4:\"slug\";s:15:\"post-duplicator\";s:6:\"plugin\";s:38:\"post-duplicator/m4c-postduplicator.php\";s:11:\"new_version\";s:4:\"2.20\";s:3:\"url\";s:46:\"https://wordpress.org/plugins/post-duplicator/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/post-duplicator.zip\";s:6:\"tested\";s:5:\"4.7.2\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}s:27:\"wp-pagenavi/wp-pagenavi.php\";O:8:\"stdClass\":8:{s:2:\"id\";s:25:\"w.org/plugins/wp-pagenavi\";s:4:\"slug\";s:11:\"wp-pagenavi\";s:6:\"plugin\";s:27:\"wp-pagenavi/wp-pagenavi.php\";s:11:\"new_version\";s:4:\"2.92\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/wp-pagenavi/\";s:7:\"package\";s:59:\"https://downloads.wordpress.org/plugin/wp-pagenavi.2.92.zip\";s:6:\"tested\";s:3:\"4.8\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}s:21:\"wp-polls/wp-polls.php\";O:8:\"stdClass\":8:{s:2:\"id\";s:22:\"w.org/plugins/wp-polls\";s:4:\"slug\";s:8:\"wp-polls\";s:6:\"plugin\";s:21:\"wp-polls/wp-polls.php\";s:11:\"new_version\";s:6:\"2.73.7\";s:3:\"url\";s:39:\"https://wordpress.org/plugins/wp-polls/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/wp-polls.2.73.7.zip\";s:6:\"tested\";s:3:\"4.8\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:5:{s:30:\"advanced-custom-fields/acf.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:36:\"w.org/plugins/advanced-custom-fields\";s:4:\"slug\";s:22:\"advanced-custom-fields\";s:6:\"plugin\";s:30:\"advanced-custom-fields/acf.php\";s:11:\"new_version\";s:6:\"4.4.11\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/advanced-custom-fields/\";s:7:\"package\";s:72:\"https://downloads.wordpress.org/plugin/advanced-custom-fields.4.4.11.zip\";}s:47:\"regenerate-thumbnails/regenerate-thumbnails.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:35:\"w.org/plugins/regenerate-thumbnails\";s:4:\"slug\";s:21:\"regenerate-thumbnails\";s:6:\"plugin\";s:47:\"regenerate-thumbnails/regenerate-thumbnails.php\";s:11:\"new_version\";s:5:\"2.2.6\";s:3:\"url\";s:52:\"https://wordpress.org/plugins/regenerate-thumbnails/\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip\";}s:25:\"subscribe2/subscribe2.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:24:\"w.org/plugins/subscribe2\";s:4:\"slug\";s:10:\"subscribe2\";s:6:\"plugin\";s:25:\"subscribe2/subscribe2.php\";s:11:\"new_version\";s:5:\"10.21\";s:3:\"url\";s:41:\"https://wordpress.org/plugins/subscribe2/\";s:7:\"package\";s:59:\"https://downloads.wordpress.org/plugin/subscribe2.10.21.zip\";}s:33:\"wp-postratings/wp-postratings.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:28:\"w.org/plugins/wp-postratings\";s:4:\"slug\";s:14:\"wp-postratings\";s:6:\"plugin\";s:33:\"wp-postratings/wp-postratings.php\";s:11:\"new_version\";s:6:\"1.84.1\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/wp-postratings/\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/plugin/wp-postratings.1.84.1.zip\";}s:33:\"zm-ajax-login-register/plugin.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:36:\"w.org/plugins/zm-ajax-login-register\";s:4:\"slug\";s:22:\"zm-ajax-login-register\";s:6:\"plugin\";s:33:\"zm-ajax-login-register/plugin.php\";s:11:\"new_version\";s:5:\"2.0.2\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/zm-ajax-login-register/\";s:7:\"package\";s:65:\"https://downloads.wordpress.org/plugin/zm-ajax-login-register.zip\";}}}', 'no'),
(3229, '_site_transient_timeout_browser_1112e7da2c1e2ca5eb7e4651881e05db', '1494585539', 'no'),
(3230, '_site_transient_browser_1112e7da2c1e2ca5eb7e4651881e05db', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:13:\"57.0.2987.133\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no'),
(1837, 'can_compress_scripts', '0', 'no'),
(4354, '_transient_timeout_feed_d117b5738fbd35bd8c0391cda1f2b5d9', '1502754255', 'no'),
(4355, '_transient_timeout_feed_mod_d117b5738fbd35bd8c0391cda1f2b5d9', '1502754255', 'no'),
(4356, '_transient_feed_mod_d117b5738fbd35bd8c0391cda1f2b5d9', '1502711055', 'no'),
(4291, '_site_transient_timeout_browser_a20bf01b2b2ad45e00b27c9709ca80f3', '1502875882', 'no'),
(4292, '_site_transient_browser_a20bf01b2b2ad45e00b27c9709ca80f3', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"60.0.3112.78\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no'),
(4349, '_site_transient_timeout_browser_8f2e608537f9aee410499886546e6edb', '1503315848', 'no'),
(4350, '_site_transient_browser_8f2e608537f9aee410499886546e6edb', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"60.0.3112.90\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no'),
(4221, '_site_transient_timeout_browser_650e5e85cbc98626a594c903a225a578', '1502280374', 'no'),
(4222, '_site_transient_browser_650e5e85cbc98626a594c903a225a578', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"60.0.3112.78\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(3668, '_site_transient_available_translations', 'a:108:{s:2:\"af\";a:8:{s:8:\"language\";s:2:\"af\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-03-27 04:32:49\";s:12:\"english_name\";s:9:\"Afrikaans\";s:11:\"native_name\";s:9:\"Afrikaans\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/af.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"af\";i:2;s:3:\"afr\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"Gaan voort\";}}s:3:\"ary\";a:8:{s:8:\"language\";s:3:\"ary\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:42:35\";s:12:\"english_name\";s:15:\"Moroccan Arabic\";s:11:\"native_name\";s:31:\"العربية المغربية\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.5/ary.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ar\";i:3;s:3:\"ary\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:16:\"المتابعة\";}}s:2:\"ar\";a:8:{s:8:\"language\";s:2:\"ar\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:49:08\";s:12:\"english_name\";s:6:\"Arabic\";s:11:\"native_name\";s:14:\"العربية\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/ar.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ar\";i:2;s:3:\"ara\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:16:\"المتابعة\";}}s:2:\"as\";a:8:{s:8:\"language\";s:2:\"as\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-11-22 18:59:07\";s:12:\"english_name\";s:8:\"Assamese\";s:11:\"native_name\";s:21:\"অসমীয়া\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/as.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"as\";i:2;s:3:\"asm\";i:3;s:3:\"asm\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:0:\"\";}}s:3:\"azb\";a:8:{s:8:\"language\";s:3:\"azb\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-09-12 20:34:31\";s:12:\"english_name\";s:17:\"South Azerbaijani\";s:11:\"native_name\";s:29:\"گؤنئی آذربایجان\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/azb.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"az\";i:3;s:3:\"azb\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:2:\"az\";a:8:{s:8:\"language\";s:2:\"az\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-11-06 00:09:27\";s:12:\"english_name\";s:11:\"Azerbaijani\";s:11:\"native_name\";s:16:\"Azərbaycan dili\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/az.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"az\";i:2;s:3:\"aze\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:5:\"Davam\";}}s:3:\"bel\";a:8:{s:8:\"language\";s:3:\"bel\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-09 11:39:31\";s:12:\"english_name\";s:10:\"Belarusian\";s:11:\"native_name\";s:29:\"Беларуская мова\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.5/bel.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"be\";i:2;s:3:\"bel\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:20:\"Працягнуць\";}}s:5:\"bg_BG\";a:8:{s:8:\"language\";s:5:\"bg_BG\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-16 13:06:08\";s:12:\"english_name\";s:9:\"Bulgarian\";s:11:\"native_name\";s:18:\"Български\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/bg_BG.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"bg\";i:2;s:3:\"bul\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"Напред\";}}s:5:\"bn_BD\";a:8:{s:8:\"language\";s:5:\"bn_BD\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-04 16:58:43\";s:12:\"english_name\";s:7:\"Bengali\";s:11:\"native_name\";s:15:\"বাংলা\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/bn_BD.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"bn\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:23:\"এগিয়ে চল.\";}}s:2:\"bo\";a:8:{s:8:\"language\";s:2:\"bo\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-09-05 09:44:12\";s:12:\"english_name\";s:7:\"Tibetan\";s:11:\"native_name\";s:21:\"བོད་ཡིག\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/bo.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"bo\";i:2;s:3:\"tib\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:24:\"མུ་མཐུད།\";}}s:5:\"bs_BA\";a:8:{s:8:\"language\";s:5:\"bs_BA\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-09-04 20:20:28\";s:12:\"english_name\";s:7:\"Bosnian\";s:11:\"native_name\";s:8:\"Bosanski\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/bs_BA.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"bs\";i:2;s:3:\"bos\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:7:\"Nastavi\";}}s:2:\"ca\";a:8:{s:8:\"language\";s:2:\"ca\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-21 20:41:02\";s:12:\"english_name\";s:7:\"Catalan\";s:11:\"native_name\";s:7:\"Català\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/ca.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ca\";i:2;s:3:\"cat\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continua\";}}s:3:\"ceb\";a:8:{s:8:\"language\";s:3:\"ceb\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-03-02 17:25:51\";s:12:\"english_name\";s:7:\"Cebuano\";s:11:\"native_name\";s:7:\"Cebuano\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/ceb.zip\";s:3:\"iso\";a:2:{i:2;s:3:\"ceb\";i:3;s:3:\"ceb\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:7:\"Padayun\";}}s:5:\"cs_CZ\";a:8:{s:8:\"language\";s:5:\"cs_CZ\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-12 08:46:26\";s:12:\"english_name\";s:5:\"Czech\";s:11:\"native_name\";s:12:\"Čeština‎\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/cs_CZ.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"cs\";i:2;s:3:\"ces\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:11:\"Pokračovat\";}}s:2:\"cy\";a:8:{s:8:\"language\";s:2:\"cy\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:49:29\";s:12:\"english_name\";s:5:\"Welsh\";s:11:\"native_name\";s:7:\"Cymraeg\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/cy.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"cy\";i:2;s:3:\"cym\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Parhau\";}}s:5:\"da_DK\";a:8:{s:8:\"language\";s:5:\"da_DK\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-05 09:50:06\";s:12:\"english_name\";s:6:\"Danish\";s:11:\"native_name\";s:5:\"Dansk\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/da_DK.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"da\";i:2;s:3:\"dan\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Fortsæt\";}}s:5:\"de_CH\";a:8:{s:8:\"language\";s:5:\"de_CH\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:40:03\";s:12:\"english_name\";s:20:\"German (Switzerland)\";s:11:\"native_name\";s:17:\"Deutsch (Schweiz)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/de_CH.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"de\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Weiter\";}}s:14:\"de_CH_informal\";a:8:{s:8:\"language\";s:14:\"de_CH_informal\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:39:59\";s:12:\"english_name\";s:30:\"German (Switzerland, Informal)\";s:11:\"native_name\";s:21:\"Deutsch (Schweiz, Du)\";s:7:\"package\";s:73:\"https://downloads.wordpress.org/translation/core/4.7.5/de_CH_informal.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"de\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Weiter\";}}s:5:\"de_DE\";a:8:{s:8:\"language\";s:5:\"de_DE\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-24 13:44:35\";s:12:\"english_name\";s:6:\"German\";s:11:\"native_name\";s:7:\"Deutsch\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/de_DE.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"de\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Weiter\";}}s:12:\"de_DE_formal\";a:8:{s:8:\"language\";s:12:\"de_DE_formal\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-24 13:44:46\";s:12:\"english_name\";s:15:\"German (Formal)\";s:11:\"native_name\";s:13:\"Deutsch (Sie)\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/translation/core/4.7.5/de_DE_formal.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"de\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Weiter\";}}s:3:\"dzo\";a:8:{s:8:\"language\";s:3:\"dzo\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-06-29 08:59:03\";s:12:\"english_name\";s:8:\"Dzongkha\";s:11:\"native_name\";s:18:\"རྫོང་ཁ\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/dzo.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"dz\";i:2;s:3:\"dzo\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:0:\"\";}}s:2:\"el\";a:8:{s:8:\"language\";s:2:\"el\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-08 16:17:30\";s:12:\"english_name\";s:5:\"Greek\";s:11:\"native_name\";s:16:\"Ελληνικά\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/el.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"el\";i:2;s:3:\"ell\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:16:\"Συνέχεια\";}}s:5:\"en_NZ\";a:8:{s:8:\"language\";s:5:\"en_NZ\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:54:30\";s:12:\"english_name\";s:21:\"English (New Zealand)\";s:11:\"native_name\";s:21:\"English (New Zealand)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/en_NZ.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:5:\"en_CA\";a:8:{s:8:\"language\";s:5:\"en_CA\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:49:34\";s:12:\"english_name\";s:16:\"English (Canada)\";s:11:\"native_name\";s:16:\"English (Canada)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/en_CA.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:5:\"en_AU\";a:8:{s:8:\"language\";s:5:\"en_AU\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-27 00:40:28\";s:12:\"english_name\";s:19:\"English (Australia)\";s:11:\"native_name\";s:19:\"English (Australia)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/en_AU.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:5:\"en_ZA\";a:8:{s:8:\"language\";s:5:\"en_ZA\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:53:43\";s:12:\"english_name\";s:22:\"English (South Africa)\";s:11:\"native_name\";s:22:\"English (South Africa)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/en_ZA.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:5:\"en_GB\";a:8:{s:8:\"language\";s:5:\"en_GB\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-28 03:10:25\";s:12:\"english_name\";s:12:\"English (UK)\";s:11:\"native_name\";s:12:\"English (UK)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/en_GB.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:2:\"eo\";a:8:{s:8:\"language\";s:2:\"eo\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-04 18:08:49\";s:12:\"english_name\";s:9:\"Esperanto\";s:11:\"native_name\";s:9:\"Esperanto\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/eo.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"eo\";i:2;s:3:\"epo\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Daŭrigi\";}}s:5:\"es_MX\";a:8:{s:8:\"language\";s:5:\"es_MX\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:42:28\";s:12:\"english_name\";s:16:\"Spanish (Mexico)\";s:11:\"native_name\";s:19:\"Español de México\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/es_MX.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_GT\";a:8:{s:8:\"language\";s:5:\"es_GT\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:54:37\";s:12:\"english_name\";s:19:\"Spanish (Guatemala)\";s:11:\"native_name\";s:21:\"Español de Guatemala\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/es_GT.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_VE\";a:8:{s:8:\"language\";s:5:\"es_VE\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-23 23:02:31\";s:12:\"english_name\";s:19:\"Spanish (Venezuela)\";s:11:\"native_name\";s:21:\"Español de Venezuela\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/es_VE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_CO\";a:8:{s:8:\"language\";s:5:\"es_CO\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:54:37\";s:12:\"english_name\";s:18:\"Spanish (Colombia)\";s:11:\"native_name\";s:20:\"Español de Colombia\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/es_CO.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_CL\";a:8:{s:8:\"language\";s:5:\"es_CL\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-11-28 20:09:49\";s:12:\"english_name\";s:15:\"Spanish (Chile)\";s:11:\"native_name\";s:17:\"Español de Chile\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/es_CL.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_PE\";a:8:{s:8:\"language\";s:5:\"es_PE\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-09-09 09:36:22\";s:12:\"english_name\";s:14:\"Spanish (Peru)\";s:11:\"native_name\";s:17:\"Español de Perú\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/es_PE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_AR\";a:8:{s:8:\"language\";s:5:\"es_AR\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:41:31\";s:12:\"english_name\";s:19:\"Spanish (Argentina)\";s:11:\"native_name\";s:21:\"Español de Argentina\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/es_AR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_ES\";a:8:{s:8:\"language\";s:5:\"es_ES\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-10 16:26:52\";s:12:\"english_name\";s:15:\"Spanish (Spain)\";s:11:\"native_name\";s:8:\"Español\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/es_ES.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"es\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:2:\"et\";a:8:{s:8:\"language\";s:2:\"et\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-27 16:37:11\";s:12:\"english_name\";s:8:\"Estonian\";s:11:\"native_name\";s:5:\"Eesti\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/et.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"et\";i:2;s:3:\"est\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Jätka\";}}s:2:\"eu\";a:8:{s:8:\"language\";s:2:\"eu\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-12 06:40:28\";s:12:\"english_name\";s:6:\"Basque\";s:11:\"native_name\";s:7:\"Euskara\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/eu.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"eu\";i:2;s:3:\"eus\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Jarraitu\";}}s:5:\"fa_IR\";a:8:{s:8:\"language\";s:5:\"fa_IR\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-02-02 15:21:03\";s:12:\"english_name\";s:7:\"Persian\";s:11:\"native_name\";s:10:\"فارسی\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/fa_IR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"fa\";i:2;s:3:\"fas\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"ادامه\";}}s:2:\"fi\";a:8:{s:8:\"language\";s:2:\"fi\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:42:25\";s:12:\"english_name\";s:7:\"Finnish\";s:11:\"native_name\";s:5:\"Suomi\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/fi.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"fi\";i:2;s:3:\"fin\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:5:\"Jatka\";}}s:5:\"fr_BE\";a:8:{s:8:\"language\";s:5:\"fr_BE\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:40:32\";s:12:\"english_name\";s:16:\"French (Belgium)\";s:11:\"native_name\";s:21:\"Français de Belgique\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/fr_BE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"fr\";i:2;s:3:\"fra\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuer\";}}s:5:\"fr_FR\";a:8:{s:8:\"language\";s:5:\"fr_FR\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-05 12:10:24\";s:12:\"english_name\";s:15:\"French (France)\";s:11:\"native_name\";s:9:\"Français\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/fr_FR.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"fr\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuer\";}}s:5:\"fr_CA\";a:8:{s:8:\"language\";s:5:\"fr_CA\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-02-03 21:08:25\";s:12:\"english_name\";s:15:\"French (Canada)\";s:11:\"native_name\";s:19:\"Français du Canada\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/fr_CA.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"fr\";i:2;s:3:\"fra\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuer\";}}s:2:\"gd\";a:8:{s:8:\"language\";s:2:\"gd\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-08-23 17:41:37\";s:12:\"english_name\";s:15:\"Scottish Gaelic\";s:11:\"native_name\";s:9:\"Gàidhlig\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/gd.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"gd\";i:2;s:3:\"gla\";i:3;s:3:\"gla\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:15:\"Lean air adhart\";}}s:5:\"gl_ES\";a:8:{s:8:\"language\";s:5:\"gl_ES\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-09 08:05:00\";s:12:\"english_name\";s:8:\"Galician\";s:11:\"native_name\";s:6:\"Galego\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/gl_ES.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"gl\";i:2;s:3:\"glg\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:2:\"gu\";a:8:{s:8:\"language\";s:2:\"gu\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-11 12:30:31\";s:12:\"english_name\";s:8:\"Gujarati\";s:11:\"native_name\";s:21:\"ગુજરાતી\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/gu.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"gu\";i:2;s:3:\"guj\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:31:\"ચાલુ રાખવું\";}}s:3:\"haz\";a:8:{s:8:\"language\";s:3:\"haz\";s:7:\"version\";s:5:\"4.4.2\";s:7:\"updated\";s:19:\"2015-12-05 00:59:09\";s:12:\"english_name\";s:8:\"Hazaragi\";s:11:\"native_name\";s:15:\"هزاره گی\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.4.2/haz.zip\";s:3:\"iso\";a:1:{i:3;s:3:\"haz\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"ادامه\";}}s:5:\"he_IL\";a:8:{s:8:\"language\";s:5:\"he_IL\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-29 21:21:10\";s:12:\"english_name\";s:6:\"Hebrew\";s:11:\"native_name\";s:16:\"עִבְרִית\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/he_IL.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"he\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"המשך\";}}s:5:\"hi_IN\";a:8:{s:8:\"language\";s:5:\"hi_IN\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-17 06:35:04\";s:12:\"english_name\";s:5:\"Hindi\";s:11:\"native_name\";s:18:\"हिन्दी\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/hi_IN.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"hi\";i:2;s:3:\"hin\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"जारी\";}}s:2:\"hr\";a:8:{s:8:\"language\";s:2:\"hr\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-03-28 13:34:22\";s:12:\"english_name\";s:8:\"Croatian\";s:11:\"native_name\";s:8:\"Hrvatski\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/hr.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"hr\";i:2;s:3:\"hrv\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:7:\"Nastavi\";}}s:5:\"hu_HU\";a:8:{s:8:\"language\";s:5:\"hu_HU\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-26 15:48:39\";s:12:\"english_name\";s:9:\"Hungarian\";s:11:\"native_name\";s:6:\"Magyar\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/hu_HU.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"hu\";i:2;s:3:\"hun\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"Folytatás\";}}s:2:\"hy\";a:8:{s:8:\"language\";s:2:\"hy\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-12-03 16:21:10\";s:12:\"english_name\";s:8:\"Armenian\";s:11:\"native_name\";s:14:\"Հայերեն\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/hy.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"hy\";i:2;s:3:\"hye\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:20:\"Շարունակել\";}}s:5:\"id_ID\";a:8:{s:8:\"language\";s:5:\"id_ID\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-02 14:01:52\";s:12:\"english_name\";s:10:\"Indonesian\";s:11:\"native_name\";s:16:\"Bahasa Indonesia\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/id_ID.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"id\";i:2;s:3:\"ind\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Lanjutkan\";}}s:5:\"is_IS\";a:8:{s:8:\"language\";s:5:\"is_IS\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-13 13:55:54\";s:12:\"english_name\";s:9:\"Icelandic\";s:11:\"native_name\";s:9:\"Íslenska\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/is_IS.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"is\";i:2;s:3:\"isl\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Áfram\";}}s:5:\"it_IT\";a:8:{s:8:\"language\";s:5:\"it_IT\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-11 10:12:38\";s:12:\"english_name\";s:7:\"Italian\";s:11:\"native_name\";s:8:\"Italiano\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/it_IT.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"it\";i:2;s:3:\"ita\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continua\";}}s:2:\"ja\";a:8:{s:8:\"language\";s:2:\"ja\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-03 15:15:18\";s:12:\"english_name\";s:8:\"Japanese\";s:11:\"native_name\";s:9:\"日本語\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/ja.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"ja\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"続ける\";}}s:5:\"ka_GE\";a:8:{s:8:\"language\";s:5:\"ka_GE\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-05 06:17:00\";s:12:\"english_name\";s:8:\"Georgian\";s:11:\"native_name\";s:21:\"ქართული\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/ka_GE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ka\";i:2;s:3:\"kat\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:30:\"გაგრძელება\";}}s:3:\"kab\";a:8:{s:8:\"language\";s:3:\"kab\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-26 15:39:13\";s:12:\"english_name\";s:6:\"Kabyle\";s:11:\"native_name\";s:9:\"Taqbaylit\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/kab.zip\";s:3:\"iso\";a:2:{i:2;s:3:\"kab\";i:3;s:3:\"kab\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Kemmel\";}}s:2:\"km\";a:8:{s:8:\"language\";s:2:\"km\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-12-07 02:07:59\";s:12:\"english_name\";s:5:\"Khmer\";s:11:\"native_name\";s:27:\"ភាសាខ្មែរ\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/km.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"km\";i:2;s:3:\"khm\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"បន្ត\";}}s:5:\"ko_KR\";a:8:{s:8:\"language\";s:5:\"ko_KR\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-07 11:10:31\";s:12:\"english_name\";s:6:\"Korean\";s:11:\"native_name\";s:9:\"한국어\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/ko_KR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ko\";i:2;s:3:\"kor\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"계속\";}}s:3:\"ckb\";a:8:{s:8:\"language\";s:3:\"ckb\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-26 15:48:25\";s:12:\"english_name\";s:16:\"Kurdish (Sorani)\";s:11:\"native_name\";s:13:\"كوردی‎\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/ckb.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ku\";i:3;s:3:\"ckb\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:30:\"به‌رده‌وام به‌\";}}s:2:\"lo\";a:8:{s:8:\"language\";s:2:\"lo\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-11-12 09:59:23\";s:12:\"english_name\";s:3:\"Lao\";s:11:\"native_name\";s:21:\"ພາສາລາວ\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/lo.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"lo\";i:2;s:3:\"lao\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:18:\"ຕໍ່​ໄປ\";}}s:5:\"lt_LT\";a:8:{s:8:\"language\";s:5:\"lt_LT\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-03-30 09:46:13\";s:12:\"english_name\";s:10:\"Lithuanian\";s:11:\"native_name\";s:15:\"Lietuvių kalba\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/lt_LT.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"lt\";i:2;s:3:\"lit\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Tęsti\";}}s:2:\"lv\";a:8:{s:8:\"language\";s:2:\"lv\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-03-17 20:40:40\";s:12:\"english_name\";s:7:\"Latvian\";s:11:\"native_name\";s:16:\"Latviešu valoda\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/lv.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"lv\";i:2;s:3:\"lav\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Turpināt\";}}s:5:\"mk_MK\";a:8:{s:8:\"language\";s:5:\"mk_MK\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:54:41\";s:12:\"english_name\";s:10:\"Macedonian\";s:11:\"native_name\";s:31:\"Македонски јазик\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/mk_MK.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"mk\";i:2;s:3:\"mkd\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:16:\"Продолжи\";}}s:5:\"ml_IN\";a:8:{s:8:\"language\";s:5:\"ml_IN\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-27 03:43:32\";s:12:\"english_name\";s:9:\"Malayalam\";s:11:\"native_name\";s:18:\"മലയാളം\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/ml_IN.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ml\";i:2;s:3:\"mal\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:18:\"തുടരുക\";}}s:2:\"mn\";a:8:{s:8:\"language\";s:2:\"mn\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-12 07:29:35\";s:12:\"english_name\";s:9:\"Mongolian\";s:11:\"native_name\";s:12:\"Монгол\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/mn.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"mn\";i:2;s:3:\"mon\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:24:\"Үргэлжлүүлэх\";}}s:2:\"mr\";a:8:{s:8:\"language\";s:2:\"mr\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-03-24 06:52:11\";s:12:\"english_name\";s:7:\"Marathi\";s:11:\"native_name\";s:15:\"मराठी\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/mr.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"mr\";i:2;s:3:\"mar\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:25:\"सुरु ठेवा\";}}s:5:\"ms_MY\";a:8:{s:8:\"language\";s:5:\"ms_MY\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-03-05 09:45:10\";s:12:\"english_name\";s:5:\"Malay\";s:11:\"native_name\";s:13:\"Bahasa Melayu\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/ms_MY.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ms\";i:2;s:3:\"msa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Teruskan\";}}s:5:\"my_MM\";a:8:{s:8:\"language\";s:5:\"my_MM\";s:7:\"version\";s:6:\"4.1.18\";s:7:\"updated\";s:19:\"2015-03-26 15:57:42\";s:12:\"english_name\";s:17:\"Myanmar (Burmese)\";s:11:\"native_name\";s:15:\"ဗမာစာ\";s:7:\"package\";s:65:\"https://downloads.wordpress.org/translation/core/4.1.18/my_MM.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"my\";i:2;s:3:\"mya\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:54:\"ဆက်လက်လုပ်ဆောင်ပါ။\";}}s:5:\"nb_NO\";a:8:{s:8:\"language\";s:5:\"nb_NO\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:42:31\";s:12:\"english_name\";s:19:\"Norwegian (Bokmål)\";s:11:\"native_name\";s:13:\"Norsk bokmål\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/nb_NO.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"nb\";i:2;s:3:\"nob\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Fortsett\";}}s:5:\"ne_NP\";a:8:{s:8:\"language\";s:5:\"ne_NP\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-02 10:59:56\";s:12:\"english_name\";s:6:\"Nepali\";s:11:\"native_name\";s:18:\"नेपाली\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/ne_NP.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ne\";i:2;s:3:\"nep\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:43:\"जारी राख्नुहोस्\";}}s:12:\"nl_NL_formal\";a:8:{s:8:\"language\";s:12:\"nl_NL_formal\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-02-16 13:24:21\";s:12:\"english_name\";s:14:\"Dutch (Formal)\";s:11:\"native_name\";s:20:\"Nederlands (Formeel)\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/translation/core/4.7.5/nl_NL_formal.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"nl\";i:2;s:3:\"nld\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Doorgaan\";}}s:5:\"nl_BE\";a:8:{s:8:\"language\";s:5:\"nl_BE\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-07 17:23:35\";s:12:\"english_name\";s:15:\"Dutch (Belgium)\";s:11:\"native_name\";s:20:\"Nederlands (België)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/nl_BE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"nl\";i:2;s:3:\"nld\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Doorgaan\";}}s:5:\"nl_NL\";a:8:{s:8:\"language\";s:5:\"nl_NL\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-11 15:57:29\";s:12:\"english_name\";s:5:\"Dutch\";s:11:\"native_name\";s:10:\"Nederlands\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/nl_NL.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"nl\";i:2;s:3:\"nld\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Doorgaan\";}}s:5:\"nn_NO\";a:8:{s:8:\"language\";s:5:\"nn_NO\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:40:57\";s:12:\"english_name\";s:19:\"Norwegian (Nynorsk)\";s:11:\"native_name\";s:13:\"Norsk nynorsk\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/nn_NO.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"nn\";i:2;s:3:\"nno\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Hald fram\";}}s:3:\"oci\";a:8:{s:8:\"language\";s:3:\"oci\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-02 13:47:38\";s:12:\"english_name\";s:7:\"Occitan\";s:11:\"native_name\";s:7:\"Occitan\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/oci.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"oc\";i:2;s:3:\"oci\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Contunhar\";}}s:5:\"pa_IN\";a:8:{s:8:\"language\";s:5:\"pa_IN\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-16 05:19:43\";s:12:\"english_name\";s:7:\"Punjabi\";s:11:\"native_name\";s:18:\"ਪੰਜਾਬੀ\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/pa_IN.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"pa\";i:2;s:3:\"pan\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:25:\"ਜਾਰੀ ਰੱਖੋ\";}}s:5:\"pl_PL\";a:8:{s:8:\"language\";s:5:\"pl_PL\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-23 09:31:28\";s:12:\"english_name\";s:6:\"Polish\";s:11:\"native_name\";s:6:\"Polski\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/pl_PL.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"pl\";i:2;s:3:\"pol\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Kontynuuj\";}}s:2:\"ps\";a:8:{s:8:\"language\";s:2:\"ps\";s:7:\"version\";s:6:\"4.1.18\";s:7:\"updated\";s:19:\"2015-03-29 22:19:48\";s:12:\"english_name\";s:6:\"Pashto\";s:11:\"native_name\";s:8:\"پښتو\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.1.18/ps.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ps\";i:2;s:3:\"pus\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:19:\"دوام ورکړه\";}}s:5:\"pt_BR\";a:8:{s:8:\"language\";s:5:\"pt_BR\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-17 15:02:48\";s:12:\"english_name\";s:19:\"Portuguese (Brazil)\";s:11:\"native_name\";s:20:\"Português do Brasil\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/pt_BR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"pt\";i:2;s:3:\"por\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"pt_PT\";a:8:{s:8:\"language\";s:5:\"pt_PT\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-09 15:25:20\";s:12:\"english_name\";s:21:\"Portuguese (Portugal)\";s:11:\"native_name\";s:10:\"Português\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/pt_PT.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"pt\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:3:\"rhg\";a:8:{s:8:\"language\";s:3:\"rhg\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-03-16 13:03:18\";s:12:\"english_name\";s:8:\"Rohingya\";s:11:\"native_name\";s:8:\"Ruáinga\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/rhg.zip\";s:3:\"iso\";a:1:{i:3;s:3:\"rhg\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:0:\"\";}}s:5:\"ro_RO\";a:8:{s:8:\"language\";s:5:\"ro_RO\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-28 08:15:40\";s:12:\"english_name\";s:8:\"Romanian\";s:11:\"native_name\";s:8:\"Română\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/ro_RO.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ro\";i:2;s:3:\"ron\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuă\";}}s:5:\"ru_RU\";a:8:{s:8:\"language\";s:5:\"ru_RU\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-20 10:13:53\";s:12:\"english_name\";s:7:\"Russian\";s:11:\"native_name\";s:14:\"Русский\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/ru_RU.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ru\";i:2;s:3:\"rus\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:20:\"Продолжить\";}}s:3:\"sah\";a:8:{s:8:\"language\";s:3:\"sah\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-21 02:06:41\";s:12:\"english_name\";s:5:\"Sakha\";s:11:\"native_name\";s:14:\"Сахалыы\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/sah.zip\";s:3:\"iso\";a:2:{i:2;s:3:\"sah\";i:3;s:3:\"sah\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"Салҕаа\";}}s:5:\"si_LK\";a:8:{s:8:\"language\";s:5:\"si_LK\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-11-12 06:00:52\";s:12:\"english_name\";s:7:\"Sinhala\";s:11:\"native_name\";s:15:\"සිංහල\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/si_LK.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"si\";i:2;s:3:\"sin\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:44:\"දිගටම කරගෙන යන්න\";}}s:5:\"sk_SK\";a:8:{s:8:\"language\";s:5:\"sk_SK\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-10 13:48:29\";s:12:\"english_name\";s:6:\"Slovak\";s:11:\"native_name\";s:11:\"Slovenčina\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/sk_SK.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sk\";i:2;s:3:\"slk\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"Pokračovať\";}}s:5:\"sl_SI\";a:8:{s:8:\"language\";s:5:\"sl_SI\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-02-08 17:57:45\";s:12:\"english_name\";s:9:\"Slovenian\";s:11:\"native_name\";s:13:\"Slovenščina\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/sl_SI.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sl\";i:2;s:3:\"slv\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Nadaljuj\";}}s:2:\"sq\";a:8:{s:8:\"language\";s:2:\"sq\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-24 08:35:30\";s:12:\"english_name\";s:8:\"Albanian\";s:11:\"native_name\";s:5:\"Shqip\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/sq.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sq\";i:2;s:3:\"sqi\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Vazhdo\";}}s:5:\"sr_RS\";a:8:{s:8:\"language\";s:5:\"sr_RS\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:41:03\";s:12:\"english_name\";s:7:\"Serbian\";s:11:\"native_name\";s:23:\"Српски језик\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/sr_RS.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sr\";i:2;s:3:\"srp\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:14:\"Настави\";}}s:5:\"sv_SE\";a:8:{s:8:\"language\";s:5:\"sv_SE\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-03 00:34:10\";s:12:\"english_name\";s:7:\"Swedish\";s:11:\"native_name\";s:7:\"Svenska\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/sv_SE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sv\";i:2;s:3:\"swe\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Fortsätt\";}}s:3:\"szl\";a:8:{s:8:\"language\";s:3:\"szl\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-09-24 19:58:14\";s:12:\"english_name\";s:8:\"Silesian\";s:11:\"native_name\";s:17:\"Ślōnskŏ gŏdka\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/szl.zip\";s:3:\"iso\";a:1:{i:3;s:3:\"szl\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:13:\"Kōntynuować\";}}s:5:\"ta_IN\";a:8:{s:8:\"language\";s:5:\"ta_IN\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-27 03:22:47\";s:12:\"english_name\";s:5:\"Tamil\";s:11:\"native_name\";s:15:\"தமிழ்\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/ta_IN.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ta\";i:2;s:3:\"tam\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:24:\"தொடரவும்\";}}s:2:\"te\";a:8:{s:8:\"language\";s:2:\"te\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-26 15:47:39\";s:12:\"english_name\";s:6:\"Telugu\";s:11:\"native_name\";s:18:\"తెలుగు\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/te.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"te\";i:2;s:3:\"tel\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:30:\"కొనసాగించు\";}}s:2:\"th\";a:8:{s:8:\"language\";s:2:\"th\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2017-01-26 15:48:43\";s:12:\"english_name\";s:4:\"Thai\";s:11:\"native_name\";s:9:\"ไทย\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/th.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"th\";i:2;s:3:\"tha\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:15:\"ต่อไป\";}}s:2:\"tl\";a:8:{s:8:\"language\";s:2:\"tl\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-12-30 02:38:08\";s:12:\"english_name\";s:7:\"Tagalog\";s:11:\"native_name\";s:7:\"Tagalog\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.2/tl.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"tl\";i:2;s:3:\"tgl\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"Magpatuloy\";}}s:5:\"tr_TR\";a:8:{s:8:\"language\";s:5:\"tr_TR\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-04-15 09:03:35\";s:12:\"english_name\";s:7:\"Turkish\";s:11:\"native_name\";s:8:\"Türkçe\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/tr_TR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"tr\";i:2;s:3:\"tur\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:5:\"Devam\";}}s:5:\"tt_RU\";a:8:{s:8:\"language\";s:5:\"tt_RU\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-11-20 20:20:50\";s:12:\"english_name\";s:5:\"Tatar\";s:11:\"native_name\";s:19:\"Татар теле\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/tt_RU.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"tt\";i:2;s:3:\"tat\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:17:\"дәвам итү\";}}s:3:\"tah\";a:8:{s:8:\"language\";s:3:\"tah\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-03-06 18:39:39\";s:12:\"english_name\";s:8:\"Tahitian\";s:11:\"native_name\";s:10:\"Reo Tahiti\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.7.2/tah.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"ty\";i:2;s:3:\"tah\";i:3;s:3:\"tah\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:0:\"\";}}s:5:\"ug_CN\";a:8:{s:8:\"language\";s:5:\"ug_CN\";s:7:\"version\";s:5:\"4.7.2\";s:7:\"updated\";s:19:\"2016-12-05 09:23:39\";s:12:\"english_name\";s:6:\"Uighur\";s:11:\"native_name\";s:9:\"Uyƣurqə\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.2/ug_CN.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ug\";i:2;s:3:\"uig\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:26:\"داۋاملاشتۇرۇش\";}}s:2:\"uk\";a:8:{s:8:\"language\";s:2:\"uk\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-17 03:13:31\";s:12:\"english_name\";s:9:\"Ukrainian\";s:11:\"native_name\";s:20:\"Українська\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/uk.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"uk\";i:2;s:3:\"ukr\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:20:\"Продовжити\";}}s:2:\"ur\";a:8:{s:8:\"language\";s:2:\"ur\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-03-27 07:08:07\";s:12:\"english_name\";s:4:\"Urdu\";s:11:\"native_name\";s:8:\"اردو\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/ur.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ur\";i:2;s:3:\"urd\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:19:\"جاری رکھیں\";}}s:5:\"uz_UZ\";a:8:{s:8:\"language\";s:5:\"uz_UZ\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-13 09:55:38\";s:12:\"english_name\";s:5:\"Uzbek\";s:11:\"native_name\";s:11:\"O‘zbekcha\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/uz_UZ.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"uz\";i:2;s:3:\"uzb\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:11:\"Davom etish\";}}s:2:\"vi\";a:8:{s:8:\"language\";s:2:\"vi\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-06-09 09:41:25\";s:12:\"english_name\";s:10:\"Vietnamese\";s:11:\"native_name\";s:14:\"Tiếng Việt\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.7.5/vi.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"vi\";i:2;s:3:\"vie\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"Tiếp tục\";}}s:5:\"zh_TW\";a:8:{s:8:\"language\";s:5:\"zh_TW\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-08 04:16:08\";s:12:\"english_name\";s:16:\"Chinese (Taiwan)\";s:11:\"native_name\";s:12:\"繁體中文\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/zh_TW.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"zh\";i:2;s:3:\"zho\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"繼續\";}}s:5:\"zh_HK\";a:8:{s:8:\"language\";s:5:\"zh_HK\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-05-23 02:18:07\";s:12:\"english_name\";s:19:\"Chinese (Hong Kong)\";s:11:\"native_name\";s:16:\"香港中文版	\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/zh_HK.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"zh\";i:2;s:3:\"zho\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"繼續\";}}s:5:\"zh_CN\";a:8:{s:8:\"language\";s:5:\"zh_CN\";s:7:\"version\";s:5:\"4.7.5\";s:7:\"updated\";s:19:\"2017-01-26 15:54:45\";s:12:\"english_name\";s:15:\"Chinese (China)\";s:11:\"native_name\";s:12:\"简体中文\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.5/zh_CN.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"zh\";i:2;s:3:\"zho\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"继续\";}}}', 'no'),
(2018, '_site_transient_timeout_browser_f731f7616ab74b84eb6e37a4dee2a379', '1486485556', 'no'),
(1705, 'auto_core_update_notified', 'a:4:{s:4:\"type\";s:7:\"success\";s:5:\"email\";s:20:\"paffen.web@gmail.com\";s:7:\"version\";s:5:\"4.7.5\";s:9:\"timestamp\";i:1494975166;}', 'no'),
(1831, 'db_upgraded', '', 'yes'),
(3670, '_site_transient_browser_047d9b1fecfa842fce24f4144ec85db4', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"59.0.3071.86\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no'),
(3669, '_site_transient_timeout_browser_047d9b1fecfa842fce24f4144ec85db4', '1497868570', 'no'),
(3387, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:3:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/ru_RU/wordpress-4.8.1.zip\";s:6:\"locale\";s:5:\"ru_RU\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/ru_RU/wordpress-4.8.1.zip\";s:10:\"no_content\";b:0;s:11:\"new_bundled\";b:0;s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.8.1\";s:7:\"version\";s:5:\"4.8.1\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:0:\"\";}i:1;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.8.1.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.8.1.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.8.1-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-4.8.1-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.8.1\";s:7:\"version\";s:5:\"4.8.1\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:0:\"\";}i:2;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.8.1.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.8.1.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.8.1-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-4.8.1-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.8.1\";s:7:\"version\";s:5:\"4.8.1\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}}s:12:\"last_checked\";i:1502893487;s:15:\"version_checked\";s:5:\"4.7.5\";s:12:\"translations\";a:0:{}}', 'no');

-- --------------------------------------------------------

--
-- Структура таблицы `wp_pollsa`
--

CREATE TABLE `wp_pollsa` (
  `polla_aid` int(10) NOT NULL,
  `polla_qid` int(10) NOT NULL DEFAULT '0',
  `polla_answers` varchar(200) NOT NULL DEFAULT '',
  `polla_votes` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_pollsa`
--

INSERT INTO `wp_pollsa` (`polla_aid`, `polla_qid`, `polla_answers`, `polla_votes`) VALUES
(1, 1, 'Good', 14),
(2, 1, 'Excellent', 6),
(3, 1, 'Bad', 7),
(4, 1, 'Can Be Improved', 6),
(5, 1, 'No Comments', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_pollsip`
--

CREATE TABLE `wp_pollsip` (
  `pollip_id` int(10) NOT NULL,
  `pollip_qid` varchar(10) NOT NULL DEFAULT '',
  `pollip_aid` varchar(10) NOT NULL DEFAULT '',
  `pollip_ip` varchar(100) NOT NULL DEFAULT '',
  `pollip_host` varchar(200) NOT NULL DEFAULT '',
  `pollip_timestamp` varchar(20) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pollip_user` tinytext NOT NULL,
  `pollip_userid` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_pollsip`
--

INSERT INTO `wp_pollsip` (`pollip_id`, `pollip_qid`, `pollip_aid`, `pollip_ip`, `pollip_host`, `pollip_timestamp`, `pollip_user`, `pollip_userid`) VALUES
(1, '1', '3', '77.222.149.54', '77.222.149.54', '1477060792', 'admin', 1),
(2, '1', '1', '77.122.1.16', '77-122-1-16.dynamic-FTTB.kharkov.volia.com', '1477466746', 'Guest', 0),
(3, '1', '1', '77.122.1.16', '77-122-1-16.dynamic-FTTB.kharkov.volia.com', '1477485077', 'admin', 1),
(4, '1', '2', '77.122.1.16', '77-122-1-16.dynamic-FTTB.kharkov.volia.com', '1477485127', 'admin', 1),
(5, '1', '4', '77.222.149.54', '77.222.149.54', '1478530530', 'Guest', 0),
(6, '1', '4', '77.222.149.54', '77.222.149.54', '1478530548', 'Guest', 0),
(7, '1', '1', '77.222.149.54', '77.222.149.54', '1478598125', 'Guest', 0),
(8, '1', '3', '77.222.149.54', '77.222.149.54', '1478613070', 'Guest', 0),
(9, '1', '1', '77.222.149.54', '77.222.149.54', '1478613543', 'Guest', 0),
(10, '1', '5', '77.222.149.54', '77.222.149.54', '1478704804', 'Guest', 0),
(11, '1', '1', '77.122.1.231', '77-122-1-231.dynamic-FTTB.kharkov.volia.com', '1478811054', 'Guest', 0),
(12, '1', '5', '77.122.1.231', '77-122-1-231.dynamic-FTTB.kharkov.volia.com', '1478811198', 'Guest', 0),
(13, '1', '1', '77.122.1.231', '77-122-1-231.dynamic-FTTB.kharkov.volia.com', '1478811225', 'Guest', 0),
(14, '1', '2', '77.122.1.231', '77-122-1-231.dynamic-FTTB.kharkov.volia.com', '1478811250', 'Guest', 0),
(15, '1', '2', '77.122.1.231', '77-122-1-231.dynamic-FTTB.kharkov.volia.com', '1478811258', 'Guest', 0),
(16, '1', '2', '77.122.1.231', '77-122-1-231.dynamic-FTTB.kharkov.volia.com', '1478811269', 'Guest', 0),
(17, '1', '3', '77.122.1.231', '77-122-1-231.dynamic-FTTB.kharkov.volia.com', '1478811278', 'Guest', 0),
(18, '1', '1', '77.122.1.231', '77-122-1-231.dynamic-FTTB.kharkov.volia.com', '1478811294', 'Guest', 0),
(19, '1', '1', '77.122.1.231', '77-122-1-231.dynamic-FTTB.kharkov.volia.com', '1478811386', 'Guest', 0),
(20, '1', '5', '77.222.149.54', '77.222.149.54', '1478878927', 'Guest', 0),
(21, '1', '3', '77.222.149.54', '77.222.149.54', '1479205765', 'Guest', 0),
(22, '1', '5', '79.125.15.87', 'ec2-79-125-15-87.eu-west-1.compute.amazonaws.com', '1479207171', 'Guest', 0),
(23, '1', '2', '77.222.149.54', '77.222.149.54', '1479217696', 'Guest', 0),
(24, '1', '1', '77.122.98.154', '77-122-98-154.dynamic-FTTB.kharkov.volia.com', '1479678367', 'Guest', 0),
(25, '1', '5', '77.222.149.54', '77.222.149.54', '1479742374', 'testName', 0),
(26, '1', '3', '77.222.149.54', '77.222.149.54', '1479742643', 'Guest', 0),
(27, '1', '3', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1481710868', 'Guest', 0),
(28, '1', '2', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482332768', 'Guest', 0),
(29, '1', '4', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482332873', 'Guest', 0),
(30, '1', '1', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482344377', 'Guest', 0),
(31, '1', '1', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482406877', 'Guest', 0),
(32, '1', '1', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482482428', 'Guest', 0),
(33, '1', '5', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482484842', 'Guest', 0),
(34, '1', '5', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482485684', 'Guest', 0),
(35, '1', '3', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482485725', 'Guest', 0),
(36, '1', '5', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482485787', 'Guest', 0),
(37, '1', '4', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1482491662', 'Guest', 0),
(38, '1', '5', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', '1484926939', 'Гость', 0),
(39, '1', '4', '82.117.232.238', '82-117-232-238.gpon.sta.kh.velton.ua', '1490876641', 'Иван Иванов', 2),
(40, '1', '1', '82.117.232.238', '82-117-232-238.gpon.sta.kh.velton.ua', '1494857273', 'Гость', 0),
(41, '1', '1', '188.163.84.34', '188-163-84-34.broadband.kyivstar.net', '1498140336', 'Гость', 0),
(42, '1', '4', '178.150.235.40', '40.235.150.178.triolan.net', '1498480073', 'Гость', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_pollsq`
--

CREATE TABLE `wp_pollsq` (
  `pollq_id` int(10) NOT NULL,
  `pollq_question` varchar(200) NOT NULL DEFAULT '',
  `pollq_timestamp` varchar(20) NOT NULL DEFAULT '',
  `pollq_totalvotes` int(10) NOT NULL DEFAULT '0',
  `pollq_active` tinyint(1) NOT NULL DEFAULT '1',
  `pollq_expiry` varchar(20) NOT NULL DEFAULT '',
  `pollq_multiple` tinyint(3) NOT NULL DEFAULT '0',
  `pollq_totalvoters` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_pollsq`
--

INSERT INTO `wp_pollsq` (`pollq_id`, `pollq_question`, `pollq_timestamp`, `pollq_totalvotes`, `pollq_active`, `pollq_expiry`, `pollq_multiple`, `pollq_totalvoters`) VALUES
(1, 'How Is My Site?', '1477059625', 42, 1, '', 0, 42);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(66, 25, '_edit_lock', '1479214373:1'),
(67, 25, '_wp_page_template', 'pages/template-search.php'),
(65, 25, '_edit_last', '1'),
(5, 5, '_edit_last', '1'),
(6, 5, '_edit_lock', '1486416231:1'),
(7, 5, '_wp_page_template', 'pages/template-home.php'),
(8, 10, '_edit_last', '1'),
(1298, 163, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(1297, 163, '_description_shares', 'field_5808d04702235'),
(1292, 163, 'news', 'a:5:{i:0;s:2:\"60\";i:1;s:2:\"62\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(1293, 163, '_news', 'field_5808bd9cf8895'),
(1294, 163, 'title_shares', 'Акции'),
(1295, 163, '_title_shares', 'field_5808d03202234'),
(1296, 163, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(1301, 163, '_title_polls', 'field_580a18f61a418'),
(1300, 163, 'title_polls', 'Опрос'),
(582, 10, 'rule', 'a:5:{s:5:\"param\";s:12:\"options_page\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:25:\"acf-options-theme-options\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}'),
(12, 10, 'position', 'normal'),
(13, 10, 'layout', 'no_box'),
(14, 10, 'hide_on_screen', ''),
(15, 10, '_edit_lock', '1477051502:1'),
(244, 47, 'field_58049409862a4', 'a:11:{s:3:\"key\";s:19:\"field_58049409862a4\";s:5:\"label\";s:22:\"Направления\";s:4:\"name\";s:17:\"directions_doctor\";s:4:\"type\";s:8:\"checkbox\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:7:\"choices\";a:5:{s:22:\"Пульмонолог\";s:22:\"Пульмонолог\";s:20:\"Стоматолог\";s:20:\"Стоматолог\";s:18:\"Кардиолог\";s:18:\"Кардиолог\";s:20:\"Аллерголог\";s:20:\"Аллерголог\";s:16:\"Терапевт\";s:16:\"Терапевт\";}s:13:\"default_value\";s:0:\"\";s:6:\"layout\";s:10:\"horizontal\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}'),
(303, 52, '_wp_attached_file', '2016/10/logo.png'),
(304, 52, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:160;s:6:\"height\";i:56;s:4:\"file\";s:16:\"2016/10/logo.png\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:15:\"logo-150x56.png\";s:5:\"width\";i:150;s:6:\"height\";i:56;s:9:\"mime-type\";s:9:\"image/png\";}s:14:\"post-thumbnail\";a:4:{s:4:\"file\";s:14:\"logo-50x50.png\";s:5:\"width\";i:50;s:6:\"height\";i:50;s:9:\"mime-type\";s:9:\"image/png\";}s:15:\"thumbnail_85x85\";a:4:{s:4:\"file\";s:14:\"logo-85x56.png\";s:5:\"width\";i:85;s:6:\"height\";i:56;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(1299, 163, '_post_shares', 'field_5808d07d02236'),
(42, 10, 'field_57fb9b4bf775c', 'a:11:{s:3:\"key\";s:19:\"field_57fb9b4bf775c\";s:5:\"label\";s:4:\"Logo\";s:4:\"name\";s:4:\"logo\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:11:\"save_format\";s:6:\"object\";s:12:\"preview_size\";s:9:\"thumbnail\";s:7:\"library\";s:3:\"all\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:19:\"field_57fb98bf635b8\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}'),
(44, 10, 'field_57fb9b5b38f3e', 'a:8:{s:3:\"key\";s:19:\"field_57fb9b5b38f3e\";s:5:\"label\";s:6:\"Header\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:19:\"field_57fb98bf635b8\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}'),
(47, 20, '_edit_last', '1'),
(48, 20, '_edit_lock', '1486243084:1'),
(49, 20, 'geo_location', 'a:3:{s:7:\"address\";s:57:\"Харьков, площадь Конституции, 14\";s:3:\"lat\";s:10:\"49.9901677\";s:3:\"lng\";s:17:\"36.23325669999997\";}'),
(50, 20, '_geo_location', 'field_57fb999352112'),
(51, 21, '_edit_last', '1'),
(52, 21, '_edit_lock', '1484837193:1'),
(53, 21, 'geo_location', 'a:3:{s:7:\"address\";s:51:\"Харьков, Пушкинская улица, 14\";s:3:\"lat\";s:10:\"49.9930891\";s:3:\"lng\";s:17:\"36.23458040000003\";}'),
(54, 21, '_geo_location', 'field_57fb999352112'),
(55, 22, '_edit_last', '1'),
(56, 22, '_edit_lock', '1493993110:1'),
(57, 20, '_wp_old_slug', '%d0%b1%d0%be%d0%bb%d1%8c%d0%bd%d0%b8%d1%86%d0%b0-1'),
(58, 21, '_wp_old_slug', '%d0%b1%d0%be%d0%bb%d1%8c%d0%bd%d0%b8%d1%86%d0%b0-2'),
(59, 20, '_wp_old_slug', '%d0%bc%d0%b5%d0%b4%d0%b8%d1%86%d0%b8%d0%bd%d1%81%d0%ba%d0%b8%d0%b9-%d1%86%d0%b5%d0%bd%d1%82%d1%80-leo'),
(60, 24, '_edit_last', '1'),
(61, 24, '_edit_lock', '1484837197:1'),
(62, 24, 'geo_location', 'a:3:{s:7:\"address\";s:57:\"Харків, вулиця Мироносицька, 58/5\";s:3:\"lat\";s:9:\"50.008138\";s:3:\"lng\";s:10:\"36.2409414\";}'),
(63, 24, '_geo_location', 'field_57fb999352112'),
(64, 24, '_wp_old_slug', 'all-medservices'),
(75, 20, 'gmp_arr', 'a:11:{s:8:\"gmp_long\";s:9:\"36.240856\";s:7:\"gmp_lat\";s:9:\"50.008169\";s:12:\"gmp_address1\";s:19:\"58/5Myronosytska St\";s:12:\"gmp_address2\";s:0:\"\";s:8:\"gmp_city\";s:7:\"Kharkiv\";s:9:\"gmp_state\";s:2:\"UA\";s:7:\"gmp_zip\";s:0:\"\";s:10:\"gmp_marker\";s:8:\"blue.png\";s:9:\"gmp_title\";s:0:\"\";s:15:\"gmp_description\";s:0:\"\";s:13:\"gmp_desc_show\";s:2:\"on\";}'),
(76, 21, 'gmp_arr', 'a:11:{s:8:\"gmp_long\";s:9:\"36.243377\";s:7:\"gmp_lat\";s:9:\"50.010481\";s:12:\"gmp_address1\";s:17:\"76Myronosytska St\";s:12:\"gmp_address2\";s:0:\"\";s:8:\"gmp_city\";s:7:\"Kharkiv\";s:9:\"gmp_state\";s:2:\"UA\";s:7:\"gmp_zip\";s:0:\"\";s:10:\"gmp_marker\";s:8:\"blue.png\";s:9:\"gmp_title\";s:0:\"\";s:15:\"gmp_description\";s:0:\"\";s:13:\"gmp_desc_show\";s:2:\"on\";}'),
(78, 24, 'gmp_arr', 'a:11:{s:8:\"gmp_long\";s:9:\"35.944106\";s:7:\"gmp_lat\";s:9:\"49.942920\";s:12:\"gmp_address1\";s:43:\"вулиця НоводорожняLiubotyn\";s:12:\"gmp_address2\";s:0:\"\";s:8:\"gmp_city\";s:14:\"Kharkiv Oblast\";s:9:\"gmp_state\";s:0:\"\";s:7:\"gmp_zip\";s:0:\"\";s:10:\"gmp_marker\";s:8:\"blue.png\";s:9:\"gmp_title\";s:0:\"\";s:15:\"gmp_description\";s:0:\"\";s:13:\"gmp_desc_show\";s:2:\"on\";}'),
(243, 47, '_edit_last', '1'),
(82, 30, '_edit_last', '1'),
(83, 30, 'field_57fe2943ac2fa', 'a:8:{s:3:\"key\";s:19:\"field_57fe2943ac2fa\";s:5:\"label\";s:10:\"Адрес\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:2;}'),
(84, 30, 'field_57fe294fac2fb', 'a:12:{s:3:\"key\";s:19:\"field_57fe294fac2fb\";s:5:\"label\";s:10:\"Адрес\";s:4:\"name\";s:16:\"location_address\";s:4:\"type\";s:10:\"google_map\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"center_lat\";s:0:\"\";s:10:\"center_lng\";s:0:\"\";s:4:\"zoom\";s:0:\"\";s:6:\"height\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:3;}'),
(906, 30, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:6:\"doctor\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}'),
(907, 30, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:15:\"health_facility\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:1;}'),
(908, 30, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:8:\"pharmacy\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:2;}'),
(88, 30, 'position', 'normal'),
(89, 30, 'layout', 'no_box'),
(90, 30, 'hide_on_screen', ''),
(91, 30, '_edit_lock', '1478602747:1'),
(1290, 163, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(1289, 163, '_title_news', 'field_5808be1be63e8'),
(93, 30, 'field_57fe298c54c92', 'a:8:{s:3:\"key\";s:19:\"field_57fe298c54c92\";s:5:\"label\";s:14:\"Телефон\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}'),
(104, 30, 'field_57fe29beb7f4b', 'a:13:{s:3:\"key\";s:19:\"field_57fe29beb7f4b\";s:5:\"label\";s:14:\"Телефон\";s:4:\"name\";s:5:\"phone\";s:4:\"type\";s:8:\"repeater\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"sub_fields\";a:1:{i:0;a:15:{s:3:\"key\";s:19:\"field_57fe29d2b7f4c\";s:5:\"label\";s:14:\"Телефон\";s:4:\"name\";s:6:\"number\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}}s:7:\"row_min\";s:0:\"\";s:9:\"row_limit\";s:0:\"\";s:6:\"layout\";s:5:\"table\";s:12:\"button_label\";s:7:\"Add Row\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}'),
(1291, 163, '_info_news', 'field_5808bdeb76f89'),
(100, 30, 'field_57fe29b188217', 'a:8:{s:3:\"key\";s:19:\"field_57fe29b188217\";s:5:\"label\";s:23:\"Режим работы\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:4;}'),
(1288, 163, 'title_news', 'Новости'),
(1320, 165, '_edit_lock', '1486416152:1'),
(1321, 165, '_edit_last', '1'),
(1322, 166, '_edit_lock', '1486416295:1'),
(1323, 166, '_edit_last', '1'),
(1324, 167, '_edit_lock', '1486416081:1'),
(1325, 167, '_edit_last', '1'),
(1326, 167, '_wp_old_slug', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-5-copy-copy-copy-copy'),
(1327, 166, '_wp_old_slug', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-5-copy-copy-copy'),
(1328, 165, '_wp_old_slug', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-5-copy-copy'),
(1329, 164, '_wp_old_slug', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-5-copy'),
(1330, 164, '_wp_old_slug', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-2-2'),
(1331, 169, '_menu_item_type', 'post_type_archive'),
(1332, 169, '_menu_item_menu_item_parent', '0'),
(1333, 169, '_menu_item_object_id', '-75'),
(1334, 169, '_menu_item_object', 'obyavlenia'),
(1335, 169, '_menu_item_target', ''),
(1336, 169, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(1337, 169, '_menu_item_xfn', ''),
(1338, 169, '_menu_item_url', ''),
(1345, 170, '_news', 'field_5808bd9cf8895'),
(1271, 162, '_edit_last', '1'),
(1270, 162, '_edit_lock', '1486415970:1'),
(1355, 170, '_description_polls', 'field_580a1b2e15683'),
(1356, 170, 'title_ads', 'Объявления'),
(1357, 170, '_title_ads', 'field_5808d5a359e9a'),
(1358, 170, 'description_ads', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(1344, 170, 'news', 'a:5:{i:0;s:2:\"60\";i:1;s:2:\"62\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(1342, 170, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(1341, 170, '_title_news', 'field_5808be1be63e8'),
(941, 124, '_menu_item_type', 'post_type'),
(940, 122, '_edit_lock', '1479214425:1'),
(939, 122, 'ratings_average', '0'),
(938, 122, 'ratings_score', '0'),
(937, 122, 'ratings_users', '0'),
(936, 122, '_wp_page_template', 'default'),
(935, 122, '_edit_last', '1'),
(766, 109, 'field_580e151fb0e18', 'a:14:{s:3:\"key\";s:19:\"field_580e151fb0e18\";s:5:\"label\";s:12:\"Статус\";s:4:\"name\";s:18:\"status_institution\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}'),
(765, 109, '_edit_last', '1'),
(972, 131, 'title_news', 'Новости'),
(964, 62, '_s2mail', 'yes'),
(963, 62, 'ratings_average', '0'),
(962, 62, 'ratings_score', '0'),
(961, 62, 'ratings_users', '0'),
(971, 5, 'ratings_average', '0'),
(970, 5, 'ratings_score', '0'),
(238, 10, 'field_57ff59cc184a3', 'a:13:{s:3:\"key\";s:19:\"field_57ff59cc184a3\";s:5:\"label\";s:42:\"Заголовок Блока Поиска\";s:4:\"name\";s:18:\"title_block_search\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:2;}'),
(246, 47, 'position', 'normal'),
(247, 47, 'layout', 'no_box'),
(248, 47, 'hide_on_screen', ''),
(249, 47, '_edit_lock', '1477576613:1'),
(266, 48, '_edit_last', '1'),
(267, 48, 'field_5804958083baf', 'a:11:{s:3:\"key\";s:19:\"field_5804958083baf\";s:5:\"label\";s:22:\"Направления\";s:4:\"name\";s:28:\"directions_health_facilities\";s:4:\"type\";s:8:\"checkbox\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:7:\"choices\";a:4:{s:26:\"Пульмонология\";s:26:\"Пульмонология\";s:22:\"Кардиология\";s:22:\"Кардиология\";s:24:\"Стоматология\";s:24:\"Стоматология\";s:24:\"Аллергология\";s:24:\"Аллергология\";}s:13:\"default_value\";s:0:\"\";s:6:\"layout\";s:10:\"horizontal\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}'),
(274, 48, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:15:\"health_facility\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}'),
(269, 48, 'position', 'normal'),
(270, 48, 'layout', 'no_box'),
(271, 48, 'hide_on_screen', ''),
(272, 48, '_edit_lock', '1477576463:1'),
(275, 24, 'directions_health_facilities', 'a:3:{i:0;s:26:\"Пульмонология\";i:1;s:22:\"Кардиология\";i:2;s:24:\"Стоматология\";}'),
(276, 24, '_directions_health_facilities', 'field_5804958083baf'),
(277, 24, 'phone', '2'),
(278, 24, '_phone', 'field_57fe29beb7f4b'),
(279, 24, 'location_address', 'a:3:{s:7:\"address\";s:47:\"вулиця Сумская  69, Харьков\";s:3:\"lat\";s:10:\"50.0105763\";s:3:\"lng\";s:17:\"36.24075560000006\";}'),
(280, 24, '_location_address', 'field_57fe294fac2fb'),
(281, 22, 'directions_doctor', 'a:1:{i:0;s:16:\"Терапевт\";}'),
(282, 22, '_directions_doctor', 'field_58049409862a4'),
(283, 22, 'phone', '0'),
(284, 22, '_phone', 'field_57fe29beb7f4b'),
(285, 22, 'location_address', 'a:3:{s:7:\"address\";s:39:\"Пушкинская 21, Харьков\";s:3:\"lat\";s:10:\"49.9993244\";s:3:\"lng\";s:18:\"36.241806699999984\";}'),
(286, 22, '_location_address', 'field_57fe294fac2fb'),
(287, 21, 'directions_health_facilities', 'a:1:{i:0;s:26:\"Пульмонология\";}'),
(288, 21, '_directions_health_facilities', 'field_5804958083baf'),
(289, 21, 'phone', '1'),
(290, 21, '_phone', 'field_57fe29beb7f4b'),
(291, 21, 'location_address', 'a:3:{s:7:\"address\";s:34:\"ул.Лесная 4 Харьков\";s:3:\"lat\";s:10:\"50.0276905\";s:3:\"lng\";s:17:\"36.17590100000007\";}'),
(292, 21, '_location_address', 'field_57fe294fac2fb'),
(293, 20, 'directions_health_facilities', 'a:2:{i:0;s:22:\"Кардиология\";i:1;s:24:\"Аллергология\";}'),
(294, 20, '_directions_health_facilities', 'field_5804958083baf'),
(295, 20, 'phone', '0'),
(296, 20, '_phone', 'field_57fe29beb7f4b'),
(297, 20, 'location_address', 'a:3:{s:7:\"address\";s:71:\"вулиця Олеся Гончара, 53-55, Київ, Украина\";s:3:\"lat\";s:17:\"50.45048256729059\";s:3:\"lng\";s:18:\"30.504173925781288\";}'),
(298, 20, '_location_address', 'field_57fe294fac2fb'),
(305, 52, '_wp_attachment_image_alt', 'Медсоветник'),
(310, 53, '_edit_last', '1'),
(311, 53, '_edit_lock', '1476971904:1'),
(312, 54, '_wp_attached_file', '2016/10/news-pills.jpg'),
(313, 54, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:226;s:6:\"height\";i:113;s:4:\"file\";s:22:\"2016/10/news-pills.jpg\";s:5:\"sizes\";a:4:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"news-pills-150x113.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:113;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"post-thumbnail\";a:4:{s:4:\"file\";s:20:\"news-pills-50x50.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"thumbnail_201x154\";a:4:{s:4:\"file\";s:22:\"news-pills-201x113.jpg\";s:5:\"width\";i:201;s:6:\"height\";i:113;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:15:\"thumbnail_85x85\";a:4:{s:4:\"file\";s:20:\"news-pills-85x85.jpg\";s:5:\"width\";i:85;s:6:\"height\";i:85;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(314, 53, '_thumbnail_id', '54'),
(317, 56, '_thumbnail_id', '54'),
(318, 56, '_dp_original', '53'),
(319, 56, '_edit_lock', '1476971756:1'),
(320, 56, '_edit_last', '1'),
(323, 58, '_thumbnail_id', '54'),
(325, 58, '_dp_original', '56'),
(326, 58, '_edit_lock', '1476971670:1'),
(327, 58, '_edit_last', '1'),
(330, 60, '_thumbnail_id', '54'),
(332, 60, '_dp_original', '58'),
(333, 60, '_edit_lock', '1476971634:1'),
(334, 60, '_edit_last', '1'),
(337, 62, '_thumbnail_id', '54'),
(339, 62, '_dp_original', '60'),
(340, 62, '_edit_lock', '1494930301:1'),
(341, 62, '_edit_last', '1'),
(344, 64, '_edit_last', '1'),
(1275, 64, 'rule', 'a:5:{s:5:\"param\";s:13:\"page_template\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:23:\"pages/template-home.php\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}'),
(346, 64, 'position', 'normal'),
(347, 64, 'layout', 'no_box'),
(348, 64, 'hide_on_screen', ''),
(349, 64, '_edit_lock', '1486416079:1'),
(350, 64, 'field_5808bd91f8894', 'a:8:{s:3:\"key\";s:19:\"field_5808bd91f8894\";s:5:\"label\";s:14:\"Новости\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}'),
(351, 64, 'field_5808bd9cf8895', 'a:14:{s:3:\"key\";s:19:\"field_5808bd9cf8895\";s:5:\"label\";s:14:\"Новости\";s:4:\"name\";s:4:\"news\";s:4:\"type\";s:12:\"relationship\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"return_format\";s:6:\"object\";s:9:\"post_type\";a:1:{i:0;s:4:\"post\";}s:8:\"taxonomy\";a:1:{i:0;s:3:\"all\";}s:7:\"filters\";a:1:{i:0;s:6:\"search\";}s:15:\"result_elements\";a:1:{i:0;s:9:\"post_type\";}s:3:\"max\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:3;}'),
(353, 65, 'news', 'a:5:{i:0;s:2:\"53\";i:1;s:2:\"58\";i:2;s:2:\"56\";i:3;s:2:\"60\";i:4;s:2:\"62\";}'),
(354, 65, '_news', 'field_5808bd9cf8895'),
(355, 5, 'news', 'a:5:{i:0;s:2:\"60\";i:1;s:2:\"62\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(356, 5, '_news', 'field_5808bd9cf8895'),
(357, 64, 'field_5808bdeb76f89', 'a:13:{s:3:\"key\";s:19:\"field_5808bdeb76f89\";s:5:\"label\";s:35:\"Информация Новости\";s:4:\"name\";s:9:\"info_news\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:2;}'),
(359, 64, 'field_5808be1be63e8', 'a:14:{s:3:\"key\";s:19:\"field_5808be1be63e8\";s:5:\"label\";s:18:\"Заголовок\";s:4:\"name\";s:10:\"title_news\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}'),
(363, 66, 'title_news', 'Новости'),
(364, 66, '_title_news', 'field_5808be1be63e8'),
(365, 66, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(366, 66, '_info_news', 'field_5808bdeb76f89'),
(367, 66, 'news', 'a:5:{i:0;s:2:\"53\";i:1;s:2:\"58\";i:2;s:2:\"56\";i:3;s:2:\"60\";i:4;s:2:\"62\";}'),
(368, 66, '_news', 'field_5808bd9cf8895'),
(369, 5, 'title_news', 'Новости'),
(370, 5, '_title_news', 'field_5808be1be63e8'),
(371, 5, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(372, 5, '_info_news', 'field_5808bdeb76f89'),
(373, 64, 'field_5808be5d42e25', 'a:8:{s:3:\"key\";s:19:\"field_5808be5d42e25\";s:5:\"label\";s:10:\"Акции\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:4;}'),
(374, 64, 'field_5808be6a42e26', 'a:8:{s:3:\"key\";s:19:\"field_5808be6a42e26\";s:5:\"label\";s:10:\"Опрос\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:8;}'),
(375, 64, 'field_5808be7342e27', 'a:8:{s:3:\"key\";s:19:\"field_5808be7342e27\";s:5:\"label\";s:20:\"Объявления\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:11;}'),
(381, 69, 'title_news', 'Новости'),
(382, 69, '_title_news', 'field_5808be1be63e8'),
(383, 69, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(384, 69, '_info_news', 'field_5808bdeb76f89'),
(385, 69, 'news', 'a:5:{i:0;s:2:\"62\";i:1;s:2:\"60\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(386, 69, '_news', 'field_5808bd9cf8895'),
(394, 74, '_edit_lock', '1486414855:1'),
(393, 74, '_edit_last', '1'),
(395, 75, '_wp_attached_file', '2016/10/stock-img.jpg'),
(396, 75, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:228;s:6:\"height\";i:175;s:4:\"file\";s:21:\"2016/10/stock-img.jpg\";s:5:\"sizes\";a:6:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:21:\"stock-img-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"post-thumbnail\";a:4:{s:4:\"file\";s:19:\"stock-img-50x50.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"thumbnail_230x115\";a:4:{s:4:\"file\";s:21:\"stock-img-228x115.jpg\";s:5:\"width\";i:228;s:6:\"height\";i:115;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"thumbnail_201x154\";a:4:{s:4:\"file\";s:21:\"stock-img-201x154.jpg\";s:5:\"width\";i:201;s:6:\"height\";i:154;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:18:\"thumbnail_1170x130\";a:4:{s:4:\"file\";s:21:\"stock-img-228x130.jpg\";s:5:\"width\";i:228;s:6:\"height\";i:130;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:15:\"thumbnail_85x85\";a:4:{s:4:\"file\";s:19:\"stock-img-85x85.jpg\";s:5:\"width\";i:85;s:6:\"height\";i:85;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(397, 74, '_thumbnail_id', '75'),
(398, 76, '_edit_last', '1'),
(399, 76, '_edit_lock', '1486414853:1'),
(400, 76, '_thumbnail_id', '75'),
(401, 76, '_wp_old_slug', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-copy'),
(402, 77, '_edit_last', '1'),
(403, 77, '_edit_lock', '1486414709:1'),
(404, 77, '_thumbnail_id', '75'),
(405, 77, '_wp_old_slug', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-copy'),
(406, 78, '_edit_last', '1'),
(407, 78, '_edit_lock', '1486414708:1'),
(408, 78, '_thumbnail_id', '75'),
(409, 78, '_wp_old_slug', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-copy'),
(410, 79, '_edit_last', '1'),
(411, 79, '_edit_lock', '1486414664:1'),
(412, 79, '_thumbnail_id', '75'),
(413, 79, '_wp_old_slug', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-copy'),
(414, 80, '_edit_last', '1'),
(415, 80, '_edit_lock', '1486414707:1'),
(416, 80, '_thumbnail_id', '75'),
(417, 80, '_wp_old_slug', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-copy'),
(418, 77, '_wp_old_slug', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-1-copy'),
(419, 78, '_wp_old_slug', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-1-copy-copy'),
(420, 79, '_wp_old_slug', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-1-copy-copy-copy'),
(421, 80, '_wp_old_slug', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-1-copy-copy-copy-copy'),
(422, 64, 'field_5808d03202234', 'a:14:{s:3:\"key\";s:19:\"field_5808d03202234\";s:5:\"label\";s:18:\"Заголовок\";s:4:\"name\";s:12:\"title_shares\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:5;}'),
(423, 64, 'field_5808d04702235', 'a:13:{s:3:\"key\";s:19:\"field_5808d04702235\";s:5:\"label\";s:31:\"Инфармация Акции\";s:4:\"name\";s:18:\"description_shares\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:6;}'),
(424, 64, 'field_5808d07d02236', 'a:14:{s:3:\"key\";s:19:\"field_5808d07d02236\";s:5:\"label\";s:10:\"Акции\";s:4:\"name\";s:11:\"post_shares\";s:4:\"type\";s:12:\"relationship\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"return_format\";s:6:\"object\";s:9:\"post_type\";a:1:{i:0;s:6:\"shares\";}s:8:\"taxonomy\";a:1:{i:0;s:3:\"all\";}s:7:\"filters\";a:1:{i:0;s:6:\"search\";}s:15:\"result_elements\";a:1:{i:0;s:9:\"post_type\";}s:3:\"max\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:7;}'),
(427, 82, 'title_news', 'Новости'),
(428, 82, '_title_news', 'field_5808be1be63e8'),
(429, 82, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(430, 82, '_info_news', 'field_5808bdeb76f89'),
(431, 82, 'news', 'a:5:{i:0;s:2:\"62\";i:1;s:2:\"60\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(432, 82, '_news', 'field_5808bd9cf8895'),
(433, 82, 'title_shares', 'Акции'),
(434, 82, '_title_shares', 'field_5808d03202234'),
(435, 82, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(436, 82, '_description_shares', 'field_5808d04702235'),
(437, 82, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(438, 82, '_post_shares', 'field_5808d07d02236'),
(439, 5, 'title_shares', 'Акции'),
(440, 5, '_title_shares', 'field_5808d03202234'),
(441, 5, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(442, 5, '_description_shares', 'field_5808d04702235'),
(443, 5, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(444, 5, '_post_shares', 'field_5808d07d02236'),
(445, 64, 'field_5808d5a359e9a', 'a:14:{s:3:\"key\";s:19:\"field_5808d5a359e9a\";s:5:\"label\";s:18:\"Заголовок\";s:4:\"name\";s:9:\"title_ads\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:12;}'),
(446, 64, 'field_5808d5b059e9b', 'a:13:{s:3:\"key\";s:19:\"field_5808d5b059e9b\";s:5:\"label\";s:41:\"Информация Объявления\";s:4:\"name\";s:15:\"description_ads\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:13;}'),
(447, 64, 'field_5808d5c959e9c', 'a:14:{s:3:\"key\";s:19:\"field_5808d5c959e9c\";s:5:\"label\";s:20:\"Объявления\";s:4:\"name\";s:8:\"post_ads\";s:4:\"type\";s:12:\"relationship\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"return_format\";s:6:\"object\";s:9:\"post_type\";a:1:{i:0;s:10:\"obyavlenia\";}s:8:\"taxonomy\";a:1:{i:0;s:3:\"all\";}s:7:\"filters\";a:1:{i:0;s:6:\"search\";}s:15:\"result_elements\";a:1:{i:0;s:9:\"post_type\";}s:3:\"max\";s:1:\"6\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:14;}'),
(1319, 164, '_edit_last', '1'),
(1318, 164, '_edit_lock', '1486416175:1'),
(1351, 170, '_post_shares', 'field_5808d07d02236'),
(1352, 170, 'title_polls', 'Опрос'),
(1353, 170, '_title_polls', 'field_580a18f61a418'),
(1354, 170, 'description_polls', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>'),
(1346, 170, 'title_shares', 'Акции'),
(1347, 170, '_title_shares', 'field_5808d03202234'),
(1348, 170, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(1349, 170, '_description_shares', 'field_5808d04702235'),
(1350, 170, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(467, 89, 'title_news', 'Новости'),
(468, 89, '_title_news', 'field_5808be1be63e8'),
(469, 89, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(470, 89, '_info_news', 'field_5808bdeb76f89'),
(471, 89, 'news', 'a:5:{i:0;s:2:\"62\";i:1;s:2:\"60\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(472, 89, '_news', 'field_5808bd9cf8895'),
(473, 89, 'title_shares', 'Акции'),
(474, 89, '_title_shares', 'field_5808d03202234'),
(475, 89, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(476, 89, '_description_shares', 'field_5808d04702235'),
(477, 89, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(478, 89, '_post_shares', 'field_5808d07d02236'),
(479, 89, 'title_ads', 'Объявления'),
(480, 89, '_title_ads', 'field_5808d5a359e9a'),
(481, 89, 'description_ads', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(482, 89, '_description_ads', 'field_5808d5b059e9b'),
(483, 89, 'post_ads', 'a:6:{i:0;s:2:\"85\";i:1;s:2:\"86\";i:2;s:2:\"87\";i:3;s:2:\"84\";i:4;s:2:\"83\";i:5;s:2:\"88\";}'),
(484, 89, '_post_ads', 'field_5808d5c959e9c'),
(485, 5, 'title_ads', 'Объявления'),
(486, 5, '_title_ads', 'field_5808d5a359e9a'),
(487, 5, 'description_ads', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(488, 5, '_description_ads', 'field_5808d5b059e9b'),
(489, 5, 'post_ads', 'a:5:{i:0;s:3:\"162\";i:1;s:3:\"166\";i:2;s:3:\"165\";i:3;s:3:\"164\";i:4;s:3:\"167\";}'),
(490, 5, '_post_ads', 'field_5808d5c959e9c'),
(491, 90, '_form', '<div class=\"col-75\">\n<label for=\"input-coop\" class=\"req\">Имя</label>[text* your-name] \n</div>\n<div class=\"col-75\">\n<label for=\"input-coop2\">Компания</label>[text your-company]\n</div>\n<div class=\"col-75\">\n<label for=\"input-coop3\" class=\"req\">Телефон</label>[tel* your-tel] \n</div>\n<div class=\"col-75\">\n<label for=\"input-coop4\">Сообщение</label>[textarea your-message] \n</div>\n<div class=\"col-100\">\n<span class=\"add\"> <span class=\"red\">*</span> обязательны для заполнения</span>[submit \"Отправить\"]\n</div>'),
(492, 90, '_mail', 'a:8:{s:7:\"subject\";s:26:\"MedService24 \"[your-name]\"\";s:6:\"sender\";s:50:\"[your-name] <medservice24@medservice24.pirise.com>\";s:4:\"body\";s:204:\"From: [your-name]\n\nКомпания:[your-company]\nТелефон:[your-tel]\nСообщение:[your-message]\n\n--\nThis e-mail was sent from a contact form on MedService24 (http://medservice24.pirise.com)\";s:9:\"recipient\";s:20:\"paffen.web@gmail.com\";s:18:\"additional_headers\";s:0:\"\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";b:0;s:13:\"exclude_blank\";b:0;}'),
(493, 90, '_mail_2', 'a:9:{s:6:\"active\";b:0;s:7:\"subject\";s:29:\"MedService24 \"[your-subject]\"\";s:6:\"sender\";s:48:\"MedService24 <wordpress@medservice24.pirise.com>\";s:4:\"body\";s:122:\"Message Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form on MedService24 (http://medservice24.pirise.com)\";s:9:\"recipient\";s:12:\"[your-email]\";s:18:\"additional_headers\";s:30:\"Reply-To: paffen.web@gmail.com\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";b:0;s:13:\"exclude_blank\";b:0;}'),
(494, 90, '_messages', 'a:23:{s:12:\"mail_sent_ok\";s:45:\"Thank you for your message. It has been sent.\";s:12:\"mail_sent_ng\";s:148:\"Был ошибка при попытке отправить сообщение. Пожалуйста, повторите попытку позже.\";s:16:\"validation_error\";s:146:\"Одно или несколько полей имеют ошибку. Пожалуйста проверьте и попробуйте снова.\";s:4:\"spam\";s:148:\"Был ошибка при попытке отправить сообщение. Пожалуйста, повторите попытку позже.\";s:12:\"accept_terms\";s:97:\"Вы должны принять условия перед отправкой сообщения.\";s:16:\"invalid_required\";s:28:\"требуется поле.\";s:16:\"invalid_too_long\";s:35:\"Поле слишком долго.\";s:17:\"invalid_too_short\";s:58:\"Поле является слишком коротким.\";s:12:\"invalid_date\";s:37:\"Формат даты неверно.\";s:14:\"date_too_early\";s:44:\"The date is before the earliest one allowed.\";s:13:\"date_too_late\";s:41:\"The date is after the latest one allowed.\";s:13:\"upload_failed\";s:46:\"There was an unknown error uploading the file.\";s:24:\"upload_file_type_invalid\";s:49:\"You are not allowed to upload files of this type.\";s:21:\"upload_file_too_large\";s:20:\"The file is too big.\";s:23:\"upload_failed_php_error\";s:38:\"There was an error uploading the file.\";s:14:\"invalid_number\";s:29:\"The number format is invalid.\";s:16:\"number_too_small\";s:47:\"The number is smaller than the minimum allowed.\";s:16:\"number_too_large\";s:70:\"Число больше максимально допустимого.\";s:23:\"quiz_answer_not_correct\";s:36:\"The answer to the quiz is incorrect.\";s:17:\"captcha_not_match\";s:31:\"Your entered code is incorrect.\";s:13:\"invalid_email\";s:73:\"Адрес электронной почты введен неверно.\";s:11:\"invalid_url\";s:19:\"The URL is invalid.\";s:11:\"invalid_tel\";s:78:\"Номер телефона является недействительным.\";}'),
(495, 90, '_additional_settings', ''),
(496, 90, '_locale', 'en_GB'),
(497, 64, 'field_5808e0c95a97b', 'a:8:{s:3:\"key\";s:19:\"field_5808e0c95a97b\";s:5:\"label\";s:38:\"Форма обратной связи\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:15;}'),
(498, 64, 'field_5808e0d85a97c', 'a:14:{s:3:\"key\";s:19:\"field_5808e0d85a97c\";s:5:\"label\";s:18:\"Заголовок\";s:4:\"name\";s:23:\"title_home_form_contact\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:16;}'),
(499, 64, 'field_5808e10c5a97d', 'a:14:{s:3:\"key\";s:19:\"field_5808e10c5a97d\";s:5:\"label\";s:14:\"Телефон\";s:4:\"name\";s:23:\"phone_home_form_contact\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:17;}'),
(500, 64, 'field_5808e12c5a97e', 'a:12:{s:3:\"key\";s:19:\"field_5808e12c5a97e\";s:5:\"label\";s:5:\"Email\";s:4:\"name\";s:23:\"email_home_form_contact\";s:4:\"type\";s:5:\"email\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:18;}'),
(502, 64, 'field_5808e15eeaea7', 'a:14:{s:3:\"key\";s:19:\"field_5808e15eeaea7\";s:5:\"label\";s:38:\"Форма обратной связи\";s:4:\"name\";s:25:\"display_home_form_contact\";s:4:\"type\";s:12:\"relationship\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"return_format\";s:2:\"id\";s:9:\"post_type\";a:1:{i:0;s:18:\"wpcf7_contact_form\";}s:8:\"taxonomy\";a:1:{i:0;s:3:\"all\";}s:7:\"filters\";a:1:{i:0;s:6:\"search\";}s:15:\"result_elements\";a:1:{i:0;s:9:\"post_type\";}s:3:\"max\";s:1:\"1\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:19;}'),
(505, 91, 'title_news', 'Новости'),
(506, 91, '_title_news', 'field_5808be1be63e8'),
(507, 91, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(508, 91, '_info_news', 'field_5808bdeb76f89'),
(509, 91, 'news', 'a:5:{i:0;s:2:\"62\";i:1;s:2:\"60\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(510, 91, '_news', 'field_5808bd9cf8895'),
(511, 91, 'title_shares', 'Акции'),
(512, 91, '_title_shares', 'field_5808d03202234'),
(513, 91, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(514, 91, '_description_shares', 'field_5808d04702235'),
(515, 91, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(516, 91, '_post_shares', 'field_5808d07d02236'),
(517, 91, 'title_ads', 'Объявления'),
(518, 91, '_title_ads', 'field_5808d5a359e9a'),
(519, 91, 'description_ads', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(520, 91, '_description_ads', 'field_5808d5b059e9b'),
(521, 91, 'post_ads', 'a:6:{i:0;s:2:\"85\";i:1;s:2:\"86\";i:2;s:2:\"87\";i:3;s:2:\"84\";i:4;s:2:\"83\";i:5;s:2:\"88\";}'),
(522, 91, '_post_ads', 'field_5808d5c959e9c'),
(523, 91, 'title_home_form_contact', 'по вопросам  сотрудничества обращайтесь'),
(524, 91, '_title_home_form_contact', 'field_5808e0d85a97c'),
(525, 91, 'phone_home_form_contact', '+096 999 99 99'),
(526, 91, '_phone_home_form_contact', 'field_5808e10c5a97d'),
(527, 91, 'email_home_form_contact', 'mail@mail.com'),
(528, 91, '_email_home_form_contact', 'field_5808e12c5a97e'),
(529, 91, 'display_home_form_contact', ''),
(530, 91, '_display_home_form_contact', 'field_5808e15eeaea7'),
(531, 5, 'title_home_form_contact', 'по вопросам  сотрудничества обращайтесь'),
(532, 5, '_title_home_form_contact', 'field_5808e0d85a97c'),
(533, 5, 'phone_home_form_contact', '+096 999 99 99'),
(534, 5, '_phone_home_form_contact', 'field_5808e10c5a97d'),
(535, 5, 'email_home_form_contact', 'mail@mail.com'),
(536, 5, '_email_home_form_contact', 'field_5808e12c5a97e'),
(537, 5, 'display_home_form_contact', 'a:1:{i:0;s:2:\"90\";}'),
(538, 5, '_display_home_form_contact', 'field_5808e15eeaea7'),
(901, 30, 'field_58120625c5f5e', 'a:12:{s:3:\"key\";s:19:\"field_58120625c5f5e\";s:5:\"label\";s:5:\"Email\";s:4:\"name\";s:5:\"email\";s:4:\"type\";s:5:\"email\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:7;}'),
(540, 92, 'title_news', 'Новости'),
(541, 92, '_title_news', 'field_5808be1be63e8'),
(542, 92, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(543, 92, '_info_news', 'field_5808bdeb76f89'),
(544, 92, 'news', 'a:5:{i:0;s:2:\"62\";i:1;s:2:\"60\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(545, 92, '_news', 'field_5808bd9cf8895'),
(546, 92, 'title_shares', 'Акции'),
(547, 92, '_title_shares', 'field_5808d03202234'),
(548, 92, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(549, 92, '_description_shares', 'field_5808d04702235'),
(550, 92, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(551, 92, '_post_shares', 'field_5808d07d02236'),
(552, 92, 'title_ads', 'Объявления'),
(553, 92, '_title_ads', 'field_5808d5a359e9a'),
(554, 92, 'description_ads', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(555, 92, '_description_ads', 'field_5808d5b059e9b'),
(556, 92, 'post_ads', 'a:6:{i:0;s:2:\"85\";i:1;s:2:\"86\";i:2;s:2:\"87\";i:3;s:2:\"84\";i:4;s:2:\"83\";i:5;s:2:\"88\";}'),
(557, 92, '_post_ads', 'field_5808d5c959e9c'),
(558, 92, 'title_home_form_contact', 'по вопросам  сотрудничества обращайтесь'),
(559, 92, '_title_home_form_contact', 'field_5808e0d85a97c'),
(560, 92, 'phone_home_form_contact', '+096 999 99 99'),
(561, 92, '_phone_home_form_contact', 'field_5808e10c5a97d'),
(562, 92, 'email_home_form_contact', 'mail@mail.com'),
(563, 92, '_email_home_form_contact', 'field_5808e12c5a97e'),
(564, 92, 'display_home_form_contact', 'a:1:{i:0;s:2:\"90\";}'),
(565, 92, '_display_home_form_contact', 'field_5808e15eeaea7'),
(570, 10, 'field_5809d4fce63cc', 'a:8:{s:3:\"key\";s:19:\"field_5809d4fce63cc\";s:5:\"label\";s:6:\"Footer\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:3;}'),
(572, 10, 'field_5809d50cbd09b', 'a:13:{s:3:\"key\";s:19:\"field_5809d50cbd09b\";s:5:\"label\";s:12:\"Сервис\";s:4:\"name\";s:14:\"service_footer\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:4;}'),
(573, 10, 'field_5809d52abd09c', 'a:13:{s:3:\"key\";s:19:\"field_5809d52abd09c\";s:5:\"label\";s:16:\"Пациенту\";s:4:\"name\";s:14:\"patient_footer\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:5;}'),
(575, 10, 'field_5809d5acd50e6', 'a:13:{s:3:\"key\";s:19:\"field_5809d5acd50e6\";s:5:\"label\";s:16:\"Контакты\";s:4:\"name\";s:14:\"contact_footer\";s:4:\"type\";s:8:\"repeater\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"sub_fields\";a:1:{i:0;a:15:{s:3:\"key\";s:19:\"field_5809d5c4d50e7\";s:5:\"label\";s:14:\"Телефон\";s:4:\"name\";s:5:\"phone\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}}s:7:\"row_min\";s:0:\"\";s:9:\"row_limit\";s:0:\"\";s:6:\"layout\";s:5:\"table\";s:12:\"button_label\";s:7:\"Add Row\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:6;}');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(577, 10, 'field_5809d6558983a', 'a:12:{s:3:\"key\";s:19:\"field_5809d6558983a\";s:5:\"label\";s:5:\"Email\";s:4:\"name\";s:12:\"email_footer\";s:4:\"type\";s:5:\"email\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:7;}'),
(579, 10, 'field_580a00bcaa258', 'a:13:{s:3:\"key\";s:19:\"field_580a00bcaa258\";s:5:\"label\";s:16:\"Соц. Сети\";s:4:\"name\";s:6:\"social\";s:4:\"type\";s:8:\"repeater\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"sub_fields\";a:3:{i:0;a:15:{s:3:\"key\";s:19:\"field_580a00d5aa259\";s:5:\"label\";s:4:\"Link\";s:4:\"name\";s:4:\"link\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}i:1;a:13:{s:3:\"key\";s:19:\"field_580a014fb61fc\";s:5:\"label\";s:5:\"Class\";s:4:\"name\";s:5:\"class\";s:4:\"type\";s:6:\"select\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:12:\"column_width\";s:0:\"\";s:7:\"choices\";a:3:{s:7:\"twitter\";s:7:\"twitter\";s:8:\"linkedIn\";s:8:\"linkedIn\";s:10:\"googleplus\";s:10:\"googleplus\";}s:13:\"default_value\";s:0:\"\";s:10:\"allow_null\";s:1:\"0\";s:8:\"multiple\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}i:2;a:12:{s:3:\"key\";s:19:\"field_580a024b0c275\";s:5:\"label\";s:4:\"icon\";s:4:\"name\";s:4:\"icon\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:12:\"column_width\";s:0:\"\";s:11:\"save_format\";s:6:\"object\";s:12:\"preview_size\";s:9:\"thumbnail\";s:7:\"library\";s:3:\"all\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:19:\"field_580a014fb61fc\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:7:\"twitter\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:2;}}s:7:\"row_min\";s:0:\"\";s:9:\"row_limit\";s:0:\"\";s:6:\"layout\";s:5:\"table\";s:12:\"button_label\";s:7:\"Add Row\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:8;}'),
(583, 93, '_wp_attached_file', '2016/10/g.png'),
(584, 93, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:48;s:6:\"height\";i:48;s:4:\"file\";s:13:\"2016/10/g.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(585, 94, '_wp_attached_file', '2016/10/ln.png'),
(586, 94, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:48;s:6:\"height\";i:48;s:4:\"file\";s:14:\"2016/10/ln.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(587, 95, '_wp_attached_file', '2016/10/twitter.png'),
(588, 95, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:48;s:6:\"height\";i:48;s:4:\"file\";s:19:\"2016/10/twitter.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(589, 64, 'field_580a18f61a418', 'a:14:{s:3:\"key\";s:19:\"field_580a18f61a418\";s:5:\"label\";s:18:\"Заголовок\";s:4:\"name\";s:11:\"title_polls\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:9;}'),
(592, 64, 'field_580a1b2e15683', 'a:13:{s:3:\"key\";s:19:\"field_580a1b2e15683\";s:5:\"label\";s:37:\"Информация Опросник\";s:4:\"name\";s:17:\"description_polls\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:10;}'),
(595, 96, 'title_news', 'Новости'),
(596, 96, '_title_news', 'field_5808be1be63e8'),
(597, 96, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(598, 96, '_info_news', 'field_5808bdeb76f89'),
(599, 96, 'news', 'a:5:{i:0;s:2:\"62\";i:1;s:2:\"60\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(600, 96, '_news', 'field_5808bd9cf8895'),
(601, 96, 'title_shares', 'Акции'),
(602, 96, '_title_shares', 'field_5808d03202234'),
(603, 96, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(604, 96, '_description_shares', 'field_5808d04702235'),
(605, 96, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(606, 96, '_post_shares', 'field_5808d07d02236'),
(607, 96, 'title_polls', 'Опрос'),
(608, 96, '_title_polls', 'field_580a18f61a418'),
(609, 96, 'description_polls', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>'),
(610, 96, '_description_polls', 'field_580a1b2e15683'),
(611, 96, 'title_ads', 'Объявления'),
(612, 96, '_title_ads', 'field_5808d5a359e9a'),
(613, 96, 'description_ads', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(614, 96, '_description_ads', 'field_5808d5b059e9b'),
(615, 96, 'post_ads', 'a:6:{i:0;s:2:\"85\";i:1;s:2:\"86\";i:2;s:2:\"87\";i:3;s:2:\"84\";i:4;s:2:\"83\";i:5;s:2:\"88\";}'),
(616, 96, '_post_ads', 'field_5808d5c959e9c'),
(617, 96, 'title_home_form_contact', 'по вопросам  сотрудничества обращайтесь'),
(618, 96, '_title_home_form_contact', 'field_5808e0d85a97c'),
(619, 96, 'phone_home_form_contact', '+096 999 99 99'),
(620, 96, '_phone_home_form_contact', 'field_5808e10c5a97d'),
(621, 96, 'email_home_form_contact', 'mail@mail.com'),
(622, 96, '_email_home_form_contact', 'field_5808e12c5a97e'),
(623, 96, 'display_home_form_contact', 'a:1:{i:0;s:2:\"90\";}'),
(624, 96, '_display_home_form_contact', 'field_5808e15eeaea7'),
(625, 5, 'title_polls', 'Опрос'),
(626, 5, '_title_polls', 'field_580a18f61a418'),
(627, 5, 'description_polls', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>'),
(628, 5, '_description_polls', 'field_580a1b2e15683'),
(629, 97, '_edit_last', '1'),
(630, 97, '_edit_lock', '1502711008:1'),
(631, 97, 'phone', '3'),
(632, 97, '_phone', 'field_57fe29beb7f4b'),
(633, 97, 'location_address', 'a:3:{s:7:\"address\";s:64:\"вулиця Полтавський Шлях, 55, Харьков\";s:3:\"lat\";s:17:\"49.98681759999999\";s:3:\"lng\";s:17:\"36.20953910000003\";}'),
(634, 97, '_location_address', 'field_57fe294fac2fb'),
(635, 30, 'field_580a2a3720da0', 'a:8:{s:3:\"key\";s:19:\"field_580a2a3720da0\";s:5:\"label\";s:49:\"Дополнительная информация\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:6;}'),
(636, 30, 'field_580a2a4e20da1', 'a:11:{s:3:\"key\";s:19:\"field_580a2a4e20da1\";s:5:\"label\";s:4:\"Logo\";s:4:\"name\";s:4:\"logo\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:11:\"save_format\";s:6:\"object\";s:12:\"preview_size\";s:9:\"thumbnail\";s:7:\"library\";s:3:\"all\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:8;}'),
(646, 30, 'field_580a2c610b8b1', 'a:11:{s:3:\"key\";s:19:\"field_580a2c610b8b1\";s:5:\"label\";s:37:\"Фоновое изображение\";s:4:\"name\";s:8:\"bg-image\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:11:\"save_format\";s:6:\"object\";s:12:\"preview_size\";s:9:\"thumbnail\";s:7:\"library\";s:3:\"all\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:9;}'),
(642, 99, '_wp_attached_file', '2016/10/logo-clinic.jpg'),
(643, 99, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:151;s:6:\"height\";i:144;s:4:\"file\";s:23:\"2016/10/logo-clinic.jpg\";s:5:\"sizes\";a:5:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:23:\"logo-clinic-150x144.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:144;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"post-thumbnail\";a:4:{s:4:\"file\";s:21:\"logo-clinic-50x50.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"thumbnail_230x115\";a:4:{s:4:\"file\";s:23:\"logo-clinic-151x115.jpg\";s:5:\"width\";i:151;s:6:\"height\";i:115;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:18:\"thumbnail_1170x130\";a:4:{s:4:\"file\";s:23:\"logo-clinic-151x130.jpg\";s:5:\"width\";i:151;s:6:\"height\";i:130;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:15:\"thumbnail_85x85\";a:4:{s:4:\"file\";s:21:\"logo-clinic-85x85.jpg\";s:5:\"width\";i:85;s:6:\"height\";i:85;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(644, 24, 'logo', '99'),
(645, 24, '_logo', 'field_580a2a4e20da1'),
(657, 102, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1170;s:6:\"height\";i:130;s:4:\"file\";s:21:\"2016/10/bg-clinic.jpg\";s:5:\"sizes\";a:9:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:21:\"bg-clinic-150x130.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:130;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"bg-clinic-300x33.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:33;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:20:\"bg-clinic-768x85.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:85;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:22:\"bg-clinic-1024x114.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:114;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"post-thumbnail\";a:4:{s:4:\"file\";s:19:\"bg-clinic-50x50.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:18:\"thumbnail_400x9999\";a:4:{s:4:\"file\";s:21:\"bg-clinic-400x130.jpg\";s:5:\"width\";i:400;s:6:\"height\";i:130;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"thumbnail_230x115\";a:4:{s:4:\"file\";s:21:\"bg-clinic-230x115.jpg\";s:5:\"width\";i:230;s:6:\"height\";i:115;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"thumbnail_201x154\";a:4:{s:4:\"file\";s:21:\"bg-clinic-201x130.jpg\";s:5:\"width\";i:201;s:6:\"height\";i:130;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:15:\"thumbnail_85x85\";a:4:{s:4:\"file\";s:19:\"bg-clinic-85x85.jpg\";s:5:\"width\";i:85;s:6:\"height\";i:85;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(652, 24, 'bg-image', '102'),
(653, 24, '_bg-image', 'field_580a2c610b8b1'),
(656, 102, '_wp_attached_file', '2016/10/bg-clinic.jpg'),
(658, 24, 'phone_0_number', '0967778899'),
(659, 24, '_phone_0_number', 'field_57fe29d2b7f4c'),
(660, 24, 'phone_1_number', '0967778899'),
(661, 24, '_phone_1_number', 'field_57fe29d2b7f4c'),
(662, 22, 'logo', ''),
(663, 22, '_logo', 'field_580a2a4e20da1'),
(664, 22, 'bg-image', ''),
(665, 22, '_bg-image', 'field_580a2c610b8b1'),
(666, 22, '_wp_old_slug', '%d0%b8%d0%b2%d0%b0%d0%bd-%d0%b8%d0%b2%d0%b0%d0%bd%d0%be%d0%b2'),
(667, 30, 'field_580dc1f074691', 'a:8:{s:3:\"key\";s:19:\"field_580dc1f074691\";s:5:\"label\";s:14:\"Новости\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:10;}'),
(668, 30, 'field_580dc1f974692', 'a:8:{s:3:\"key\";s:19:\"field_580dc1f974692\";s:5:\"label\";s:10:\"Акции\";s:4:\"name\";s:0:\"\";s:4:\"type\";s:3:\"tab\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:12;}'),
(669, 30, 'field_580dc20274693', 'a:13:{s:3:\"key\";s:19:\"field_580dc20274693\";s:5:\"label\";s:14:\"Новости\";s:4:\"name\";s:9:\"news_post\";s:4:\"type\";s:8:\"repeater\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"sub_fields\";a:2:{i:0;a:15:{s:3:\"key\";s:19:\"field_580dc21174694\";s:5:\"label\";s:5:\"Title\";s:4:\"name\";s:5:\"title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}i:1;a:12:{s:3:\"key\";s:19:\"field_580dc21974695\";s:5:\"label\";s:11:\"Description\";s:4:\"name\";s:11:\"description\";s:4:\"type\";s:7:\"wysiwyg\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:7:\"toolbar\";s:4:\"full\";s:12:\"media_upload\";s:3:\"yes\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}}s:7:\"row_min\";s:0:\"\";s:9:\"row_limit\";s:0:\"\";s:6:\"layout\";s:5:\"table\";s:12:\"button_label\";s:7:\"Add Row\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:11;}'),
(673, 30, 'field_580dc2369eeee', 'a:13:{s:3:\"key\";s:19:\"field_580dc2369eeee\";s:5:\"label\";s:10:\"Акции\";s:4:\"name\";s:11:\"shares_post\";s:4:\"type\";s:8:\"repeater\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"sub_fields\";a:2:{i:0;a:15:{s:3:\"key\";s:19:\"field_580dc2579eeef\";s:5:\"label\";s:5:\"Title\";s:4:\"name\";s:5:\"title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}i:1;a:12:{s:3:\"key\";s:19:\"field_580dc25f9eef0\";s:5:\"label\";s:11:\"Description\";s:4:\"name\";s:11:\"description\";s:4:\"type\";s:7:\"wysiwyg\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:7:\"toolbar\";s:4:\"full\";s:12:\"media_upload\";s:3:\"yes\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}}s:7:\"row_min\";s:0:\"\";s:9:\"row_limit\";s:0:\"\";s:6:\"layout\";s:5:\"table\";s:12:\"button_label\";s:7:\"Add Row\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:13;}'),
(677, 24, 'news_post_0_title', ''),
(678, 24, '_news_post_0_title', 'field_580dc21174694'),
(679, 24, 'news_post_0_description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe non nam deserunt sint ullam animi dolorem quasi perferendis ea accusantium error suscipit vero totam ex laudantium, quidem quae explicabo laborum!'),
(680, 24, '_news_post_0_description', 'field_580dc21974695'),
(681, 24, 'news_post', '1'),
(682, 24, '_news_post', 'field_580dc20274693'),
(683, 24, 'shares_post_0_title', ''),
(684, 24, '_shares_post_0_title', 'field_580dc2579eeef'),
(685, 24, 'shares_post_0_description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe non nam deserunt sint ullam animi dolorem quasi perferendis ea accusantium error suscipit vero totam ex laudantium, quidem quae explicabo laborum!'),
(686, 24, '_shares_post_0_description', 'field_580dc25f9eef0'),
(687, 24, 'shares_post', '1'),
(688, 24, '_shares_post', 'field_580dc2369eeee'),
(689, 30, 'field_580dc43f52beb', 'a:11:{s:3:\"key\";s:19:\"field_580dc43f52beb\";s:5:\"label\";s:23:\"Режим работы\";s:4:\"name\";s:14:\"schedule_works\";s:4:\"type\";s:7:\"wysiwyg\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:7:\"toolbar\";s:4:\"full\";s:12:\"media_upload\";s:3:\"yes\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:5;}'),
(709, 24, 'schedule_works', '<ul>\r\n 	<li><b>пн-пт 9<sup>00</sup>-19<sup>00</sup></b></li>\r\n 	<li><b>сб. 10<sup>00</sup>-16<sup>00</sup></b></li>\r\n</ul>'),
(696, 21, 'schedule_works', '<ul>\r\n 	<li><b>пн-пт 9<sup>00</sup>-19<sup>00</sup></b></li>\r\n 	<li><b>сб. 10<sup>00</sup>-16<sup>00</sup></b></li>\r\n</ul>'),
(895, 114, 'phone_0_number', '0508888111'),
(697, 21, '_schedule_works', 'field_580dc43f52beb'),
(698, 21, 'logo', ''),
(699, 21, '_logo', 'field_580a2a4e20da1'),
(700, 21, 'bg-image', ''),
(701, 21, '_bg-image', 'field_580a2c610b8b1'),
(702, 21, 'news_post', '0'),
(703, 21, '_news_post', 'field_580dc20274693'),
(704, 21, 'shares_post', '0'),
(705, 21, '_shares_post', 'field_580dc2369eeee'),
(710, 24, '_schedule_works', 'field_580dc43f52beb'),
(711, 20, 'schedule_works', '<ul>\r\n 	<li><b>пн-пт 9<sup>00</sup>-19<sup>00</sup></b></li>\r\n 	<li><b>сб. 10<sup>00</sup>-16<sup>00</sup></b></li>\r\n</ul>'),
(712, 20, '_schedule_works', 'field_580dc43f52beb'),
(713, 20, 'logo', ''),
(714, 20, '_logo', 'field_580a2a4e20da1'),
(715, 20, 'bg-image', ''),
(716, 20, '_bg-image', 'field_580a2c610b8b1'),
(717, 20, 'news_post', '0'),
(718, 20, '_news_post', 'field_580dc20274693'),
(719, 20, 'shares_post', '0'),
(720, 20, '_shares_post', 'field_580dc2369eeee'),
(721, 24, 'ratings_users', '8'),
(722, 24, 'ratings_score', '27'),
(723, 24, 'ratings_average', '3.38'),
(724, 22, 'ratings_users', '4'),
(725, 22, 'ratings_score', '17'),
(726, 22, 'ratings_average', '4.25'),
(727, 103, '_edit_last', '1'),
(728, 103, 'field_580df80138767', 'a:14:{s:3:\"key\";s:19:\"field_580df80138767\";s:5:\"label\";s:6:\"Имя\";s:4:\"name\";s:4:\"name\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}'),
(729, 103, 'field_580df81d38768', 'a:14:{s:3:\"key\";s:19:\"field_580df81d38768\";s:5:\"label\";s:16:\"Отчество\";s:4:\"name\";s:11:\"middle_name\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:2;}'),
(730, 103, 'field_580df82e38769', 'a:14:{s:3:\"key\";s:19:\"field_580df82e38769\";s:5:\"label\";s:14:\"Фамилия\";s:4:\"name\";s:7:\"surname\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}'),
(917, 103, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:6:\"doctor\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}'),
(732, 103, 'position', 'acf_after_title'),
(733, 103, 'layout', 'default'),
(734, 103, 'hide_on_screen', ''),
(735, 103, '_edit_lock', '1477586550:1'),
(738, 22, 'name', 'Иван'),
(739, 22, '_name', 'field_580df80138767'),
(740, 22, 'middle_name', 'Иванович'),
(741, 22, '_middle_name', 'field_580df81d38768'),
(742, 22, 'surname', 'Иванов'),
(743, 22, '_surname', 'field_580df82e38769'),
(744, 22, 'schedule_works', ''),
(745, 22, '_schedule_works', 'field_580dc43f52beb'),
(746, 22, 'news_post', '2'),
(747, 22, '_news_post', 'field_580dc20274693'),
(748, 22, 'shares_post', '3'),
(749, 22, '_shares_post', 'field_580dc2369eeee'),
(750, 105, '_edit_last', '1'),
(751, 105, '_wp_page_template', 'default'),
(752, 105, 'ratings_users', '0'),
(753, 105, 'ratings_score', '0'),
(754, 105, 'ratings_average', '0'),
(755, 105, '_edit_lock', '1477311045:1'),
(756, 108, '_menu_item_type', 'post_type'),
(757, 108, '_menu_item_menu_item_parent', '0'),
(758, 108, '_menu_item_object_id', '105'),
(759, 108, '_menu_item_object', 'page'),
(760, 108, '_menu_item_target', ''),
(761, 108, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(762, 108, '_menu_item_xfn', ''),
(763, 108, '_menu_item_url', ''),
(776, 109, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:8:\"pharmacy\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:1;}'),
(769, 109, 'position', 'normal'),
(770, 109, 'layout', 'no_box'),
(771, 109, 'hide_on_screen', ''),
(772, 109, '_edit_lock', '1477566929:1'),
(775, 109, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:15:\"health_facility\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}'),
(777, 24, 'status_institution', 'Закрыт на ремонт'),
(778, 24, '_status_institution', 'field_580e151fb0e18'),
(909, 30, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:8:\"pharmacy\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:3;}'),
(783, 97, 'status_institution', ''),
(784, 97, '_status_institution', 'field_580e151fb0e18'),
(785, 97, 'phone_0_number', '0508888111'),
(786, 97, '_phone_0_number', 'field_57fe29d2b7f4c'),
(787, 97, 'phone_1_number', '0674444111'),
(788, 97, '_phone_1_number', 'field_57fe29d2b7f4c'),
(789, 97, 'phone_2_number', '0635555111'),
(790, 97, '_phone_2_number', 'field_57fe29d2b7f4c'),
(791, 97, 'schedule_works', '<ul>\r\n 	<li><b> пн-пт 9 <sup>00</sup> -19 <sup>00</sup> </b></li>\r\n 	<li><b> сб. 10 <sup>00</sup> -16 <sup>00</sup> </b></li>\r\n</ul>'),
(792, 97, '_schedule_works', 'field_580dc43f52beb'),
(793, 97, 'logo', ''),
(794, 97, '_logo', 'field_580a2a4e20da1'),
(795, 97, 'bg-image', ''),
(796, 97, '_bg-image', 'field_580a2c610b8b1'),
(797, 97, 'news_post', '0'),
(798, 97, '_news_post', 'field_580dc20274693'),
(799, 97, 'shares_post', '0'),
(800, 97, '_shares_post', 'field_580dc2369eeee'),
(801, 110, '_edit_last', '1'),
(802, 110, 'field_580e28ae3b59a', 'a:12:{s:3:\"key\";s:19:\"field_580e28ae3b59a\";s:5:\"label\";s:35:\"Страховые компании\";s:4:\"name\";s:19:\"insurance_companies\";s:4:\"type\";s:6:\"select\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"1\";s:7:\"choices\";a:3:{s:12:\"Другая\";s:12:\"Другая\";s:8:\"Акса\";s:8:\"Акса\";s:12:\"Оранта\";s:12:\"Оранта\";}s:13:\"default_value\";s:0:\"\";s:10:\"allow_null\";s:1:\"0\";s:8:\"multiple\";s:1:\"1\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}'),
(890, 110, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:15:\"health_facility\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:2;}'),
(889, 110, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:6:\"doctor\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:1;}'),
(806, 110, 'position', 'side'),
(807, 110, 'layout', 'no_box'),
(808, 110, 'hide_on_screen', ''),
(809, 110, '_edit_lock', '1477404643:1'),
(888, 110, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:8:\"pharmacy\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}'),
(816, 97, 'insurance_companies', 'a:1:{i:0;s:8:\"Акса\";}'),
(817, 97, '_insurance_companies', 'field_580e28ae3b59a'),
(818, 24, 'insurance_companies', 'a:2:{i:0;s:8:\"Акса\";i:1;s:12:\"Оранта\";}'),
(819, 24, '_insurance_companies', 'field_580e28ae3b59a'),
(820, 22, 'insurance_companies', 'a:1:{i:0;s:12:\"Оранта\";}'),
(821, 22, '_insurance_companies', 'field_580e28ae3b59a'),
(822, 20, 'ratings_users', '3'),
(823, 20, 'ratings_score', '13'),
(824, 20, 'ratings_average', '4.33'),
(825, 21, 'ratings_users', '2'),
(826, 21, 'ratings_score', '9'),
(827, 21, 'ratings_average', '4.5'),
(828, 97, 'ratings_users', '1'),
(829, 97, 'ratings_score', '4'),
(830, 97, 'ratings_average', '4'),
(831, 113, '_edit_last', '1'),
(832, 113, '_edit_lock', '1477395414:1'),
(833, 113, 'phone', '3'),
(834, 113, '_phone', 'field_57fe29beb7f4b'),
(835, 113, 'location_address', 'a:3:{s:7:\"address\";s:64:\"вулиця Полтавський Шлях, 55, Харьков\";s:3:\"lat\";s:17:\"49.98681759999999\";s:3:\"lng\";s:17:\"36.20953910000003\";}'),
(836, 113, '_location_address', 'field_57fe294fac2fb'),
(837, 113, 'status_institution', ''),
(838, 113, '_status_institution', 'field_580e151fb0e18'),
(839, 113, 'phone_0_number', '0508888111'),
(840, 113, '_phone_0_number', 'field_57fe29d2b7f4c'),
(841, 113, 'phone_1_number', '0674444111'),
(842, 113, '_phone_1_number', 'field_57fe29d2b7f4c'),
(843, 113, 'phone_2_number', '0635555111'),
(844, 113, '_phone_2_number', 'field_57fe29d2b7f4c'),
(845, 113, 'schedule_works', '<ul>\r\n 	<li><b> пн-пт 9 <sup>00</sup> -19 <sup>00</sup> </b></li>\r\n 	<li><b> сб. 10 <sup>00</sup> -16 <sup>00</sup> </b></li>\r\n</ul>'),
(846, 113, '_schedule_works', 'field_580dc43f52beb'),
(847, 113, 'logo', ''),
(848, 113, '_logo', 'field_580a2a4e20da1'),
(849, 113, 'bg-image', ''),
(850, 113, '_bg-image', 'field_580a2c610b8b1'),
(851, 113, 'news_post', '0'),
(852, 113, '_news_post', 'field_580dc20274693'),
(853, 113, 'shares_post', '0'),
(854, 113, '_shares_post', 'field_580dc2369eeee'),
(855, 113, 'insurance_companies', 'a:1:{i:0;s:8:\"Акса\";}'),
(856, 113, '_insurance_companies', 'field_580e28ae3b59a'),
(857, 113, 'ratings_users', '1'),
(858, 113, 'ratings_score', '4'),
(859, 113, 'ratings_average', '4'),
(860, 113, '_wp_old_slug', '%d0%b0%d0%bf%d1%82%d0%b5%d0%ba%d0%b0-1-copy'),
(861, 114, '_edit_last', '1'),
(862, 114, '_edit_lock', '1502270971:1'),
(863, 114, 'insurance_companies', 'a:1:{i:0;s:12:\"Оранта\";}'),
(864, 114, '_insurance_companies', 'field_580e28ae3b59a'),
(865, 114, 'status_institution', ''),
(866, 114, '_status_institution', 'field_580e151fb0e18'),
(867, 114, 'phone', '3'),
(868, 114, '_phone', 'field_57fe29beb7f4b'),
(869, 114, 'location_address', 'a:3:{s:7:\"address\";s:38:\"харьков пушкинская 20\";s:3:\"lat\";s:10:\"49.9993405\";s:3:\"lng\";s:10:\"36.2418285\";}'),
(870, 114, '_location_address', 'field_57fe294fac2fb'),
(871, 114, 'schedule_works', '<ul>\r\n 	<li><b> пн-пт 9 <sup>00</sup> -19 <sup>00</sup> </b></li>\r\n 	<li><b> сб. 10 <sup>00</sup> -16 <sup>00</sup> </b></li>\r\n</ul>'),
(872, 114, '_schedule_works', 'field_580dc43f52beb'),
(873, 114, 'logo', '99'),
(874, 114, '_logo', 'field_580a2a4e20da1'),
(875, 114, 'bg-image', ''),
(876, 114, '_bg-image', 'field_580a2c610b8b1'),
(877, 114, 'news_post', '0'),
(878, 114, '_news_post', 'field_580dc20274693'),
(879, 114, 'shares_post', '0'),
(880, 114, '_shares_post', 'field_580dc2369eeee'),
(881, 20, 'insurance_companies', 'a:1:{i:0;s:12:\"Оранта\";}'),
(882, 20, '_insurance_companies', 'field_580e28ae3b59a'),
(883, 20, 'status_institution', ''),
(884, 20, '_status_institution', 'field_580e151fb0e18'),
(885, 114, 'ratings_users', '2'),
(886, 114, 'ratings_score', '8'),
(887, 114, 'ratings_average', '4'),
(891, 21, 'insurance_companies', 'a:1:{i:0;s:12:\"Другая\";}'),
(892, 21, '_insurance_companies', 'field_580e28ae3b59a'),
(893, 21, 'status_institution', ''),
(894, 21, '_status_institution', 'field_580e151fb0e18'),
(896, 114, '_phone_0_number', 'field_57fe29d2b7f4c'),
(897, 114, 'phone_1_number', '0674444111'),
(898, 114, '_phone_1_number', 'field_57fe29d2b7f4c'),
(899, 114, 'phone_2_number', '0635555111'),
(900, 114, '_phone_2_number', 'field_57fe29d2b7f4c'),
(912, 47, 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:6:\"doctor\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}'),
(913, 21, 'email', ''),
(914, 21, '_email', 'field_58120625c5f5e'),
(915, 21, 'phone_0_number', '09711122288'),
(916, 21, '_phone_0_number', 'field_57fe29d2b7f4c'),
(918, 114, 'email', 'paffen.web@gmail.com'),
(919, 114, '_email', 'field_58120625c5f5e'),
(920, 119, '_edit_last', '1'),
(921, 119, '_wp_page_template', 'default'),
(922, 119, 'ratings_users', '0'),
(923, 119, 'ratings_score', '0'),
(924, 119, 'ratings_average', '0'),
(925, 119, '_edit_lock', '1479216176:1'),
(926, 121, '_menu_item_type', 'post_type'),
(927, 121, '_menu_item_menu_item_parent', '0'),
(928, 121, '_menu_item_object_id', '119'),
(929, 121, '_menu_item_object', 'page'),
(930, 121, '_menu_item_target', ''),
(931, 121, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(932, 121, '_menu_item_xfn', ''),
(933, 121, '_menu_item_url', ''),
(942, 124, '_menu_item_menu_item_parent', '0'),
(943, 124, '_menu_item_object_id', '122'),
(944, 124, '_menu_item_object', 'page'),
(945, 124, '_menu_item_target', ''),
(946, 124, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(947, 124, '_menu_item_xfn', ''),
(948, 124, '_menu_item_url', ''),
(1343, 170, '_info_news', 'field_5808bdeb76f89'),
(1340, 170, 'title_news', 'Новости'),
(969, 5, 'ratings_users', '0'),
(973, 131, '_title_news', 'field_5808be1be63e8'),
(974, 131, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(975, 131, '_info_news', 'field_5808bdeb76f89'),
(976, 131, 'news', 'a:5:{i:0;s:2:\"60\";i:1;s:2:\"56\";i:2;s:2:\"58\";i:3;s:2:\"53\";i:4;s:2:\"62\";}'),
(977, 131, '_news', 'field_5808bd9cf8895'),
(978, 131, 'title_shares', 'Акции'),
(979, 131, '_title_shares', 'field_5808d03202234'),
(980, 131, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(981, 131, '_description_shares', 'field_5808d04702235'),
(982, 131, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(983, 131, '_post_shares', 'field_5808d07d02236'),
(984, 131, 'title_polls', 'Опрос'),
(985, 131, '_title_polls', 'field_580a18f61a418'),
(986, 131, 'description_polls', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>'),
(987, 131, '_description_polls', 'field_580a1b2e15683'),
(988, 131, 'title_ads', 'Объявления'),
(989, 131, '_title_ads', 'field_5808d5a359e9a'),
(990, 131, 'description_ads', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(991, 131, '_description_ads', 'field_5808d5b059e9b'),
(992, 131, 'post_ads', 'a:6:{i:0;s:2:\"85\";i:1;s:2:\"86\";i:2;s:2:\"87\";i:3;s:2:\"84\";i:4;s:2:\"83\";i:5;s:2:\"88\";}'),
(993, 131, '_post_ads', 'field_5808d5c959e9c'),
(994, 131, 'title_home_form_contact', 'по вопросам  сотрудничества обращайтесь'),
(995, 131, '_title_home_form_contact', 'field_5808e0d85a97c'),
(996, 131, 'phone_home_form_contact', '+096 999 99 99'),
(997, 131, '_phone_home_form_contact', 'field_5808e10c5a97d'),
(998, 131, 'email_home_form_contact', 'mail@mail.com'),
(999, 131, '_email_home_form_contact', 'field_5808e12c5a97e'),
(1000, 131, 'display_home_form_contact', 'a:1:{i:0;s:2:\"90\";}'),
(1001, 131, '_display_home_form_contact', 'field_5808e15eeaea7'),
(1002, 132, 'title_news', 'Новости'),
(1003, 132, '_title_news', 'field_5808be1be63e8'),
(1004, 132, 'info_news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis'),
(1005, 132, '_info_news', 'field_5808bdeb76f89'),
(1006, 132, 'news', 'a:5:{i:0;s:2:\"60\";i:1;s:2:\"62\";i:2;s:2:\"56\";i:3;s:2:\"58\";i:4;s:2:\"53\";}'),
(1007, 132, '_news', 'field_5808bd9cf8895'),
(1008, 132, 'title_shares', 'Акции'),
(1009, 132, '_title_shares', 'field_5808d03202234'),
(1010, 132, 'description_shares', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(1011, 132, '_description_shares', 'field_5808d04702235'),
(1012, 132, 'post_shares', 'a:6:{i:0;s:2:\"80\";i:1;s:2:\"79\";i:2;s:2:\"78\";i:3;s:2:\"77\";i:4;s:2:\"76\";i:5;s:2:\"74\";}'),
(1013, 132, '_post_shares', 'field_5808d07d02236'),
(1014, 132, 'title_polls', 'Опрос'),
(1015, 132, '_title_polls', 'field_580a18f61a418'),
(1016, 132, 'description_polls', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>'),
(1017, 132, '_description_polls', 'field_580a1b2e15683'),
(1018, 132, 'title_ads', 'Объявления'),
(1019, 132, '_title_ads', 'field_5808d5a359e9a'),
(1020, 132, 'description_ads', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(1021, 132, '_description_ads', 'field_5808d5b059e9b'),
(1022, 132, 'post_ads', 'a:6:{i:0;s:2:\"85\";i:1;s:2:\"86\";i:2;s:2:\"87\";i:3;s:2:\"84\";i:4;s:2:\"83\";i:5;s:2:\"88\";}'),
(1023, 132, '_post_ads', 'field_5808d5c959e9c'),
(1024, 132, 'title_home_form_contact', 'по вопросам  сотрудничества обращайтесь'),
(1025, 132, '_title_home_form_contact', 'field_5808e0d85a97c'),
(1026, 132, 'phone_home_form_contact', '+096 999 99 99'),
(1027, 132, '_phone_home_form_contact', 'field_5808e10c5a97d'),
(1028, 132, 'email_home_form_contact', 'mail@mail.com'),
(1029, 132, '_email_home_form_contact', 'field_5808e12c5a97e'),
(1030, 132, 'display_home_form_contact', 'a:1:{i:0;s:2:\"90\";}'),
(1031, 132, '_display_home_form_contact', 'field_5808e15eeaea7'),
(1037, 136, '_edit_lock', '1484840881:1'),
(1036, 136, '_edit_last', '1'),
(1038, 136, 'geo_location', 'a:3:{s:7:\"address\";s:57:\"Харьков, площадь Конституции, 14\";s:3:\"lat\";s:10:\"49.9901677\";s:3:\"lng\";s:17:\"36.23325669999997\";}'),
(1039, 136, '_geo_location', 'field_57fb999352112'),
(1040, 136, '_wp_old_slug', '%d0%b1%d0%be%d0%bb%d1%8c%d0%bd%d0%b8%d1%86%d0%b0-1'),
(1041, 136, '_wp_old_slug', '%d0%bc%d0%b5%d0%b4%d0%b8%d1%86%d0%b8%d0%bd%d1%81%d0%ba%d0%b8%d0%b9-%d1%86%d0%b5%d0%bd%d1%82%d1%80-leo'),
(1042, 136, 'gmp_arr', 'a:11:{s:8:\"gmp_long\";s:9:\"36.240856\";s:7:\"gmp_lat\";s:9:\"50.008169\";s:12:\"gmp_address1\";s:19:\"58/5Myronosytska St\";s:12:\"gmp_address2\";s:0:\"\";s:8:\"gmp_city\";s:7:\"Kharkiv\";s:9:\"gmp_state\";s:2:\"UA\";s:7:\"gmp_zip\";s:0:\"\";s:10:\"gmp_marker\";s:8:\"blue.png\";s:9:\"gmp_title\";s:0:\"\";s:15:\"gmp_description\";s:0:\"\";s:13:\"gmp_desc_show\";s:2:\"on\";}'),
(1043, 136, 'directions_health_facilities', 'a:2:{i:0;s:22:\"Кардиология\";i:1;s:24:\"Аллергология\";}'),
(1044, 136, '_directions_health_facilities', 'field_5804958083baf'),
(1045, 136, 'phone', '0'),
(1046, 136, '_phone', 'field_57fe29beb7f4b'),
(1047, 136, 'location_address', 'a:3:{s:7:\"address\";s:46:\"Харків, вулиця Культури, 5\";s:3:\"lat\";s:10:\"50.0107814\";s:3:\"lng\";s:18:\"36.236574099999984\";}'),
(1048, 136, '_location_address', 'field_57fe294fac2fb'),
(1049, 136, 'schedule_works', '<ul>\r\n 	<li><b>пн-пт 9<sup>00</sup>-19<sup>00</sup></b></li>\r\n 	<li><b>сб. 10<sup>00</sup>-16<sup>00</sup></b></li>\r\n</ul>'),
(1050, 136, '_schedule_works', 'field_580dc43f52beb'),
(1051, 136, 'logo', ''),
(1052, 136, '_logo', 'field_580a2a4e20da1'),
(1053, 136, 'bg-image', ''),
(1054, 136, '_bg-image', 'field_580a2c610b8b1'),
(1055, 136, 'news_post', '0'),
(1056, 136, '_news_post', 'field_580dc20274693'),
(1057, 136, 'shares_post', '0'),
(1058, 136, '_shares_post', 'field_580dc2369eeee'),
(1059, 136, 'ratings_users', '1'),
(1060, 136, 'ratings_score', '4'),
(1061, 136, 'ratings_average', '4'),
(1062, 136, 'insurance_companies', 'a:1:{i:0;s:12:\"Оранта\";}'),
(1063, 136, '_insurance_companies', 'field_580e28ae3b59a'),
(1064, 136, 'status_institution', ''),
(1065, 136, '_status_institution', 'field_580e151fb0e18'),
(1066, 137, '_edit_last', '1'),
(1067, 137, '_edit_lock', '1484841607:1'),
(1068, 137, 'insurance_companies', 'a:1:{i:0;s:8:\"Акса\";}'),
(1069, 137, '_insurance_companies', 'field_580e28ae3b59a'),
(1070, 137, 'directions_health_facilities', 'a:4:{i:0;s:26:\"Пульмонология\";i:1;s:22:\"Кардиология\";i:2;s:24:\"Стоматология\";i:3;s:24:\"Аллергология\";}'),
(1071, 137, '_directions_health_facilities', 'field_5804958083baf'),
(1072, 137, 'status_institution', ''),
(1073, 137, '_status_institution', 'field_580e151fb0e18'),
(1074, 137, 'phone', '0'),
(1075, 137, '_phone', 'field_57fe29beb7f4b'),
(1076, 137, 'location_address', 'a:3:{s:7:\"address\";s:58:\"Харьков, Московский проспект, 153\";s:3:\"lat\";s:10:\"49.9862075\";s:3:\"lng\";s:17:\"36.27501050000001\";}'),
(1187, 153, '_edit_last', '1'),
(1077, 137, '_location_address', 'field_57fe294fac2fb'),
(1078, 137, 'schedule_works', ''),
(1079, 137, '_schedule_works', 'field_580dc43f52beb'),
(1080, 137, 'email', ''),
(1081, 137, '_email', 'field_58120625c5f5e'),
(1082, 137, 'logo', ''),
(1083, 137, '_logo', 'field_580a2a4e20da1'),
(1084, 137, 'bg-image', ''),
(1085, 137, '_bg-image', 'field_580a2c610b8b1'),
(1086, 137, 'news_post', '0'),
(1087, 137, '_news_post', 'field_580dc20274693'),
(1088, 137, 'shares_post', '0'),
(1089, 137, '_shares_post', 'field_580dc2369eeee'),
(1090, 136, 'email', ''),
(1091, 136, '_email', 'field_58120625c5f5e'),
(1188, 153, 'field_58821da0c92c7', 'a:12:{s:3:\"key\";s:19:\"field_58821da0c92c7\";s:5:\"label\";s:9:\"My office\";s:4:\"name\";s:9:\"my_office\";s:4:\"type\";s:11:\"post_object\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:9:\"post_type\";a:3:{i:0;s:15:\"health_facility\";i:1;s:8:\"pharmacy\";i:2;s:6:\"doctor\";}s:8:\"taxonomy\";a:1:{i:0;s:3:\"all\";}s:10:\"allow_null\";s:1:\"1\";s:8:\"multiple\";s:1:\"0\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}'),
(1092, 138, '_edit_last', '1'),
(1093, 138, '_edit_lock', '1484846245:1'),
(1094, 138, 'surname', 'Тест'),
(1095, 138, '_surname', 'field_580df82e38769'),
(1096, 138, 'name', 'Тест'),
(1097, 138, '_name', 'field_580df80138767'),
(1098, 138, 'middle_name', 'Тест'),
(1099, 138, '_middle_name', 'field_580df81d38768'),
(1100, 138, 'insurance_companies', 'a:1:{i:0;s:12:\"Другая\";}'),
(1101, 138, '_insurance_companies', 'field_580e28ae3b59a'),
(1102, 138, 'directions_doctor', 'a:5:{i:0;s:22:\"Пульмонолог\";i:1;s:20:\"Стоматолог\";i:2;s:18:\"Кардиолог\";i:3;s:20:\"Аллерголог\";i:4;s:16:\"Терапевт\";}'),
(1103, 138, '_directions_doctor', 'field_58049409862a4'),
(1104, 138, 'phone', '0'),
(1105, 138, '_phone', 'field_57fe29beb7f4b'),
(1106, 138, 'location_address', 'a:3:{s:7:\"address\";s:101:\"вулиця 5-го Вересня, Мерефа, Харківська область, Украина\";s:3:\"lat\";s:18:\"49.816017499800864\";s:3:\"lng\";s:17:\"36.05661392211914\";}'),
(1107, 138, '_location_address', 'field_57fe294fac2fb'),
(1108, 138, 'schedule_works', '01-11'),
(1109, 138, '_schedule_works', 'field_580dc43f52beb'),
(1110, 138, 'email', 'paffen.web@gmail.com'),
(1111, 138, '_email', 'field_58120625c5f5e'),
(1112, 138, 'logo', ''),
(1113, 138, '_logo', 'field_580a2a4e20da1'),
(1114, 138, 'bg-image', ''),
(1115, 138, '_bg-image', 'field_580a2c610b8b1'),
(1116, 138, 'news_post', '2'),
(1117, 138, '_news_post', 'field_580dc20274693'),
(1118, 138, 'shares_post', '1'),
(1119, 138, '_shares_post', 'field_580dc2369eeee'),
(1120, 139, '_edit_last', '1'),
(1121, 139, '_edit_lock', '1493981037:1'),
(1122, 139, 'directions_doctor', 'a:5:{i:0;s:22:\"Пульмонолог\";i:1;s:20:\"Стоматолог\";i:2;s:18:\"Кардиолог\";i:3;s:20:\"Аллерголог\";i:4;s:16:\"Терапевт\";}'),
(1123, 139, '_directions_doctor', 'field_58049409862a4'),
(1124, 139, 'phone', '0'),
(1125, 139, '_phone', 'field_57fe29beb7f4b'),
(1126, 139, 'location_address', 'a:3:{s:7:\"address\";s:102:\"Нетечинська вулиця, Мерефа, Харківська область, Украина\";s:3:\"lat\";s:17:\"49.80675955543669\";s:3:\"lng\";s:17:\"36.06009006500244\";}'),
(1127, 139, '_location_address', 'field_57fe294fac2fb'),
(1128, 139, 'logo', ''),
(1129, 139, '_logo', 'field_580a2a4e20da1'),
(1130, 139, 'bg-image', ''),
(1131, 139, '_bg-image', 'field_580a2c610b8b1'),
(1132, 139, '_wp_old_slug', '%d0%b8%d0%b2%d0%b0%d0%bd-%d0%b8%d0%b2%d0%b0%d0%bd%d0%be%d0%b2'),
(1133, 139, 'ratings_users', '2'),
(1134, 139, 'ratings_score', '9'),
(1135, 139, 'ratings_average', '4.5'),
(1136, 139, 'name', 'Иван'),
(1137, 139, '_name', 'field_580df80138767'),
(1138, 139, 'middle_name', 'Иванович'),
(1139, 139, '_middle_name', 'field_580df81d38768'),
(1140, 139, 'surname', 'Иванов'),
(1141, 139, '_surname', 'field_580df82e38769'),
(1142, 139, 'schedule_works', ''),
(1143, 139, '_schedule_works', 'field_580dc43f52beb'),
(1144, 139, 'news_post', '0'),
(1145, 139, '_news_post', 'field_580dc20274693'),
(1146, 139, 'shares_post', '0'),
(1147, 139, '_shares_post', 'field_580dc2369eeee'),
(1148, 139, 'insurance_companies', 'a:1:{i:0;s:12:\"Оранта\";}'),
(1149, 139, '_insurance_companies', 'field_580e28ae3b59a'),
(1150, 139, 'email', 'yakovenko.as@ya.ru'),
(1151, 139, '_email', 'field_58120625c5f5e'),
(1152, 138, 'ratings_users', '1'),
(1153, 138, 'ratings_score', '5'),
(1154, 138, 'ratings_average', '5'),
(1155, 138, 'shares_post_0_title', 'testEvent'),
(1156, 138, '_shares_post_0_title', 'field_580dc2579eeef'),
(1157, 138, 'shares_post_0_description', 'Існує багато варіацій уривків з Lorem Ipsum, але більшість з них зазнала певних змін на кшталт жартівливих вставок або змішування слів, які навіть не виглядають правдоподібно. Якщо ви збираєтесь використовувати Lorem Ipsum, ви маєте упевнитись в тому, що всередині тексту не приховано нічого, що могло б викликати у читача конфуз. Більшість відомих генераторів Lorem Ipsum в Мережі генерують текст шляхом повторення наперед заданих послідовностей Lorem Ipsum. Принципова відмінність цього генератора робить його першим справжнім генератором Lorem Ipsum. Він використовує словник з більш як 200 слів латини та цілий набір моделей речень - це дозволяє генерувати Lorem Ipsum, який виглядає осмислено. Таким чином, згенерований Lorem Ipsum не міститиме повторів, жартів, нехарактерних для латини слів і т.ін'),
(1158, 138, '_shares_post_0_description', 'field_580dc25f9eef0'),
(1159, 138, 'news_post_0_title', 'testNews'),
(1160, 138, '_news_post_0_title', 'field_580dc21174694'),
(1161, 138, 'news_post_0_description', 'Існує багато варіацій уривків з Lorem Ipsum, але більшість з них зазнала певних змін на кшталт жартівливих вставок або змішування слів, які навіть не виглядають правдоподібно. Якщо ви збираєтесь використовувати Lorem Ipsum, ви маєте упевнитись в тому, що всередині тексту не приховано нічого, що могло б викликати у читача конфуз. Більшість відомих генераторів Lorem Ipsum в Мережі генерують текст шляхом повторення наперед заданих послідовностей Lorem Ipsum. Принципова відмінність цього генератора робить його першим справжнім генератором Lorem Ipsum. Він використовує словник з більш як 200 слів латини та цілий набір моделей речень - це дозволяє генерувати Lorem Ipsum, який виглядає осмислено. Таким чином, згенерований Lorem Ipsum не міститиме повторів, жартів, нехарактерних для латини слів і т.ін'),
(1162, 138, '_news_post_0_description', 'field_580dc21974695'),
(1163, 138, 'news_post_1_title', 'testNews'),
(1164, 138, '_news_post_1_title', 'field_580dc21174694'),
(1165, 138, 'news_post_1_description', 'Існує багато варіацій уривків з Lorem Ipsum, але більшість з них зазнала певних змін на кшталт жартівливих вставок або змішування слів, які навіть не виглядають правдоподібно. Якщо ви збираєтесь використовувати Lorem Ipsum, ви маєте упевнитись в тому, що всередині тексту не приховано нічого, що могло б викликати у читача конфуз. Більшість відомих генераторів Lorem Ipsum в Мережі генерують текст шляхом повторення наперед заданих послідовностей Lorem Ipsum. Принципова відмінність цього генератора робить його першим справжнім генератором Lorem Ipsum. Він використовує словник з більш як 200 слів латини та цілий набір моделей речень - це дозволяє генерувати Lorem Ipsum, який виглядає осмислено. Таким чином, згенерований Lorem Ipsum не міститиме повторів, жартів, нехарактерних для латини слів і т.ін'),
(1166, 138, '_news_post_1_description', 'field_580dc21974695'),
(1167, 22, 'email', 'yakovenko.as@ya.ru'),
(1168, 22, '_email', 'field_58120625c5f5e'),
(1169, 24, 'email', 'yakovenko.as@ya.ru'),
(1170, 24, '_email', 'field_58120625c5f5e'),
(1171, 20, 'email', ''),
(1172, 20, '_email', 'field_58120625c5f5e'),
(1173, 137, 'ratings_users', '1'),
(1174, 137, 'ratings_score', '4'),
(1175, 137, 'ratings_average', '4'),
(1178, 150, '_edit_last', '1'),
(1179, 150, '_edit_lock', '1484760075:1'),
(1180, 150, '_wp_page_template', 'pages/template-map-search.php'),
(1181, 150, 'ratings_users', '0'),
(1182, 150, 'ratings_score', '0'),
(1183, 150, 'ratings_average', '0'),
(1189, 153, 'rule', 'a:5:{s:5:\"param\";s:7:\"ef_user\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:10:\"subscriber\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}'),
(1190, 153, 'position', 'normal'),
(1191, 153, 'layout', 'no_box'),
(1192, 153, 'hide_on_screen', ''),
(1193, 153, '_edit_lock', '1485263496:1'),
(1194, 154, '_edit_last', '1'),
(1195, 154, '_wp_page_template', 'pages/template-user-profile.php'),
(1196, 154, 'ratings_users', '0'),
(1197, 154, 'ratings_score', '0'),
(1198, 154, 'ratings_average', '0'),
(1199, 154, '_edit_lock', '1484925308:1'),
(1200, 156, '_form', '<label> Ваше имя (обязательно)\n    [text* your-name] </label>\n\n<label> Ваш e-mail (обязательно)\n    [email* your-email] </label>\n\n<label> Адрес\n    [text your-address] </label>\n\n<label> Время работы\n    [textarea your-time-work] </label>\n\n<label> Новости\n    [textarea your-news] </label>\n\n<label> Акции\n    [textarea your-stock] </label>\n\n<label> Описание\n    [textarea your-description] </label>\n\n<label> Другое\n    [textarea your-other] </label>\n\n[submit \"Отправить\"]');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1201, 156, '_mail', 'a:8:{s:7:\"subject\";s:84:\"MedService24 Изменение информации личного кабинета\";s:6:\"sender\";s:47:\"[your-name] <wordpress@medservice24.pirise.com>\";s:4:\"body\";s:331:\"От: [your-name] <[your-email]>\n\nАдрес: [your-address]\nВремя работы: [your-time-work]\nНовости:\n[your-news]\nАкции:\n[your-stock]\nОписание:\n[your-description]\nДругое:\n[your-other]\n\n\n--\nЭто сообщение отправлено с сайта MedService24 (http://medservice24.pirise.com)\";s:9:\"recipient\";s:20:\"paffen.web@gmail.com\";s:18:\"additional_headers\";s:22:\"Reply-To: [your-email]\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";b:0;s:13:\"exclude_blank\";b:0;}'),
(1202, 156, '_mail_2', 'a:9:{s:6:\"active\";b:0;s:7:\"subject\";s:29:\"MedService24 \"[your-subject]\"\";s:6:\"sender\";s:48:\"MedService24 <wordpress@medservice24.pirise.com>\";s:4:\"body\";s:145:\"Сообщение:\n[your-message]\n\n--\nЭто сообщение отправлено с сайта MedService24 (http://medservice24.pirise.com)\";s:9:\"recipient\";s:12:\"[your-email]\";s:18:\"additional_headers\";s:30:\"Reply-To: paffen.web@gmail.com\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";b:0;s:13:\"exclude_blank\";b:0;}'),
(1203, 156, '_messages', 'a:23:{s:12:\"mail_sent_ok\";s:188:\"Спасибо за внесенные изменения. Данные отправлены администратору на модерацию. Время обработку 24 часа\";s:12:\"mail_sent_ng\";s:169:\"Произошла ошибка при попытке отправить Ваше сообщение. Пожалуйста попробуйте ещё раз позже.\";s:16:\"validation_error\";s:179:\"Одно или несколько полей содержат ошибочные данные. Пожалуйста проверьте их и попробуйте ещё раз.\";s:4:\"spam\";s:169:\"Произошла ошибка при попытке отправить Ваше сообщение. Пожалуйста попробуйте ещё раз позже.\";s:12:\"accept_terms\";s:145:\"Вы должны принять условия и положения перед тем, как отправлять Ваше сообщение.\";s:16:\"invalid_required\";s:32:\"Поле обязательно.\";s:16:\"invalid_too_long\";s:39:\"Поле слишком длинное.\";s:17:\"invalid_too_short\";s:41:\"Поле слишком короткое.\";s:12:\"invalid_date\";s:45:\"Формат даты некорректен.\";s:14:\"date_too_early\";s:74:\"Введённая дата слишком далеко в прошлом.\";s:13:\"date_too_late\";s:74:\"Введённая дата слишком далеко в будущем.\";s:13:\"upload_failed\";s:90:\"При загрузке файла произошла неизвестная ошибка.\";s:24:\"upload_file_type_invalid\";s:81:\"Вам не разрешено загружать файлы этого типа.\";s:21:\"upload_file_too_large\";s:39:\"Файл слишком большой.\";s:23:\"upload_failed_php_error\";s:67:\"При загрузке файла произошла ошибка.\";s:14:\"invalid_number\";s:47:\"Формат числа некорректен.\";s:16:\"number_too_small\";s:68:\"Число меньше минимально допустимого.\";s:16:\"number_too_large\";s:70:\"Число больше максимально допустимого.\";s:23:\"quiz_answer_not_correct\";s:46:\"Ответ на задачку неверен.\";s:17:\"captcha_not_match\";s:35:\"Код введен неверно.\";s:13:\"invalid_email\";s:68:\"Введённый электронный адрес неверен.\";s:11:\"invalid_url\";s:39:\"Адрес ссылки неверен.\";s:11:\"invalid_tel\";s:43:\"Номер телефона неверен.\";}'),
(1204, 156, '_additional_settings', ''),
(1205, 156, '_locale', 'ru_RU'),
(1206, 157, '_edit_last', '1'),
(1207, 157, '_edit_lock', '1502711180:1'),
(1208, 157, 'geo_location', 'a:3:{s:7:\"address\";s:57:\"Харьков, площадь Конституции, 14\";s:3:\"lat\";s:10:\"49.9901677\";s:3:\"lng\";s:17:\"36.23325669999997\";}'),
(1209, 157, '_geo_location', 'field_57fb999352112'),
(1210, 157, '_wp_old_slug', '%d0%b1%d0%be%d0%bb%d1%8c%d0%bd%d0%b8%d1%86%d0%b0-1'),
(1211, 157, '_wp_old_slug', '%d0%bc%d0%b5%d0%b4%d0%b8%d1%86%d0%b8%d0%bd%d1%81%d0%ba%d0%b8%d0%b9-%d1%86%d0%b5%d0%bd%d1%82%d1%80-leo'),
(1212, 157, 'gmp_arr', 'a:11:{s:8:\"gmp_long\";s:9:\"36.240856\";s:7:\"gmp_lat\";s:9:\"50.008169\";s:12:\"gmp_address1\";s:19:\"58/5Myronosytska St\";s:12:\"gmp_address2\";s:0:\"\";s:8:\"gmp_city\";s:7:\"Kharkiv\";s:9:\"gmp_state\";s:2:\"UA\";s:7:\"gmp_zip\";s:0:\"\";s:10:\"gmp_marker\";s:8:\"blue.png\";s:9:\"gmp_title\";s:0:\"\";s:15:\"gmp_description\";s:0:\"\";s:13:\"gmp_desc_show\";s:2:\"on\";}'),
(1213, 157, 'directions_health_facilities', 'a:2:{i:0;s:22:\"Кардиология\";i:1;s:24:\"Аллергология\";}'),
(1214, 157, '_directions_health_facilities', 'field_5804958083baf'),
(1215, 157, 'phone', '0'),
(1216, 157, '_phone', 'field_57fe29beb7f4b'),
(1217, 157, 'location_address', 'a:3:{s:7:\"address\";s:59:\"Харьков, проспект Любви Малой, 2а\";s:3:\"lat\";s:10:\"49.9733729\";s:3:\"lng\";s:17:\"36.19067749999999\";}'),
(1218, 157, '_location_address', 'field_57fe294fac2fb'),
(1219, 157, 'schedule_works', '<ul>\r\n 	<li><b>пн-пт 9<sup>00</sup>-19<sup>00</sup></b></li>\r\n 	<li><b>сб. 10<sup>00</sup>-16<sup>00</sup></b></li>\r\n</ul>'),
(1220, 157, '_schedule_works', 'field_580dc43f52beb'),
(1221, 157, 'logo', ''),
(1222, 157, '_logo', 'field_580a2a4e20da1'),
(1223, 157, 'bg-image', ''),
(1224, 157, '_bg-image', 'field_580a2c610b8b1'),
(1225, 157, 'news_post', '0'),
(1226, 157, '_news_post', 'field_580dc20274693'),
(1227, 157, 'shares_post', '0'),
(1228, 157, '_shares_post', 'field_580dc2369eeee'),
(1229, 157, 'ratings_users', '4'),
(1230, 157, 'ratings_score', '16'),
(1231, 157, 'ratings_average', '4'),
(1232, 157, 'insurance_companies', 'a:1:{i:0;s:12:\"Оранта\";}'),
(1233, 157, '_insurance_companies', 'field_580e28ae3b59a'),
(1234, 157, 'status_institution', ''),
(1235, 157, '_status_institution', 'field_580e151fb0e18'),
(1236, 157, 'email', ''),
(1237, 157, '_email', 'field_58120625c5f5e'),
(1238, 22, 'news_post_0_title', 'News'),
(1239, 22, '_news_post_0_title', 'field_580dc21174694'),
(1240, 22, 'news_post_0_description', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(1241, 22, '_news_post_0_description', 'field_580dc21974695'),
(1242, 22, 'news_post_1_title', 'News2'),
(1243, 22, '_news_post_1_title', 'field_580dc21174694'),
(1244, 22, 'news_post_1_description', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(1245, 22, '_news_post_1_description', 'field_580dc21974695'),
(1246, 22, 'shares_post_0_title', 'Акция 1'),
(1247, 22, '_shares_post_0_title', 'field_580dc2579eeef'),
(1248, 22, 'shares_post_0_description', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(1249, 22, '_shares_post_0_description', 'field_580dc25f9eef0'),
(1250, 22, 'shares_post_1_title', 'Акция 2'),
(1251, 22, '_shares_post_1_title', 'field_580dc2579eeef'),
(1252, 22, 'shares_post_1_description', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(1253, 22, '_shares_post_1_description', 'field_580dc25f9eef0'),
(1254, 22, 'shares_post_2_title', 'Акция 3'),
(1255, 22, '_shares_post_2_title', 'field_580dc2579eeef'),
(1256, 22, 'shares_post_2_description', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(1257, 22, '_shares_post_2_description', 'field_580dc25f9eef0'),
(1302, 163, 'description_polls', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>'),
(1303, 163, '_description_polls', 'field_580a1b2e15683'),
(1304, 163, 'title_ads', 'Объявления'),
(1305, 163, '_title_ads', 'field_5808d5a359e9a'),
(1306, 163, 'description_ads', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis '),
(1307, 163, '_description_ads', 'field_5808d5b059e9b'),
(1308, 163, 'post_ads', 'a:1:{i:0;s:3:\"162\";}'),
(1309, 163, '_post_ads', 'field_5808d5c959e9c'),
(1310, 163, 'title_home_form_contact', 'по вопросам  сотрудничества обращайтесь'),
(1311, 163, '_title_home_form_contact', 'field_5808e0d85a97c'),
(1312, 163, 'phone_home_form_contact', '+096 999 99 99'),
(1313, 163, '_phone_home_form_contact', 'field_5808e10c5a97d'),
(1314, 163, 'email_home_form_contact', 'mail@mail.com'),
(1315, 163, '_email_home_form_contact', 'field_5808e12c5a97e'),
(1316, 163, 'display_home_form_contact', 'a:1:{i:0;s:2:\"90\";}'),
(1317, 163, '_display_home_form_contact', 'field_5808e15eeaea7'),
(1359, 170, '_description_ads', 'field_5808d5b059e9b'),
(1360, 170, 'post_ads', 'a:5:{i:0;s:3:\"162\";i:1;s:3:\"166\";i:2;s:3:\"165\";i:3;s:3:\"164\";i:4;s:3:\"167\";}'),
(1361, 170, '_post_ads', 'field_5808d5c959e9c'),
(1362, 170, 'title_home_form_contact', 'по вопросам  сотрудничества обращайтесь'),
(1363, 170, '_title_home_form_contact', 'field_5808e0d85a97c'),
(1364, 170, 'phone_home_form_contact', '+096 999 99 99'),
(1365, 170, '_phone_home_form_contact', 'field_5808e10c5a97d'),
(1366, 170, 'email_home_form_contact', 'mail@mail.com'),
(1367, 170, '_email_home_form_contact', 'field_5808e12c5a97e'),
(1368, 170, 'display_home_form_contact', 'a:1:{i:0;s:2:\"90\";}'),
(1369, 170, '_display_home_form_contact', 'field_5808e15eeaea7');

-- --------------------------------------------------------

--
-- Структура таблицы `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(52, 1, '2016-10-20 12:41:05', '2016-10-20 11:41:05', '', 'logo', '', 'inherit', 'open', 'closed', '', 'logo', '', '', '2016-10-20 12:41:13', '2016-10-20 11:41:13', '', 0, 'http://medservice24.pirise.com/wp-content/uploads/2016/10/logo.png', 0, 'attachment', 'image/png', 0),
(25, 1, '2016-10-10 15:17:37', '2016-10-10 14:17:37', '', 'Search', '', 'publish', 'closed', 'closed', '', 'search', '', '', '2016-10-11 14:08:03', '2016-10-11 13:08:03', '', 0, 'http://medservice24.pirise.com/?page_id=25', 0, 'page', '', 0),
(26, 1, '2016-10-10 15:17:37', '2016-10-10 14:17:37', '', 'Search', '', 'inherit', 'closed', 'closed', '', '25-revision-v1', '', '', '2016-10-10 15:17:37', '2016-10-10 14:17:37', '', 25, 'http://medservice24.pirise.com/2016/10/10/25-revision-v1/', 0, 'revision', '', 0),
(30, 1, '2016-10-12 13:15:36', '2016-10-12 12:15:36', '', 'Set Fields', '', 'publish', 'closed', 'closed', '', 'acf_set-fields', '', '', '2016-10-27 14:50:53', '2016-10-27 13:50:53', '', 0, 'http://medservice24.pirise.com/?post_type=acf&#038;p=30', 2, 'acf', '', 0),
(145, 1, '2016-12-21 18:28:32', '2016-12-21 18:28:32', '', 'Военный Госпиталь', '', 'inherit', 'closed', 'closed', '', '136-autosave-v1', '', '', '2016-12-21 18:28:32', '2016-12-21 18:28:32', '', 136, 'http://medservice24.pirise.com/136-autosave-v1/', 0, 'revision', '', 0),
(5, 1, '2016-10-10 14:23:13', '2016-10-10 13:23:13', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2017-02-06 23:26:06', '2017-02-06 21:26:06', '', 0, 'http://medservice24.pirise.com/?page_id=5', 0, 'page', '', 0),
(6, 1, '2016-10-10 14:23:13', '2016-10-10 13:23:13', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-10-10 14:23:13', '2016-10-10 13:23:13', '', 5, 'http://medservice24.pirise.com/2016/10/10/5-revision-v1/', 0, 'revision', '', 0),
(10, 1, '2016-10-10 14:34:09', '2016-10-10 13:34:09', '', 'Theme Option', '', 'publish', 'closed', 'closed', '', 'acf_theme-option', '', '', '2016-10-21 12:56:08', '2016-10-21 11:56:08', '', 0, 'http://medservice24.pirise.com/?post_type=acf&#038;p=10', 0, 'acf', '', 0),
(109, 1, '2016-10-24 15:05:44', '2016-10-24 14:05:44', '', 'Статус Учреждения', '', 'publish', 'closed', 'closed', '', 'acf_%d1%81%d1%82%d0%b0%d1%82%d1%83%d1%81-%d1%83%d1%87%d1%80%d0%b5%d0%b6%d0%b4%d0%b5%d0%bd%d0%b8%d1%8f', '', '', '2016-10-24 15:06:34', '2016-10-24 14:06:34', '', 0, 'http://medservice24.pirise.com/?post_type=acf&#038;p=109', 1, 'acf', '', 0),
(47, 1, '2016-10-17 10:05:57', '2016-10-17 09:05:57', '', 'Врачи', '', 'publish', 'closed', 'closed', '', 'acf_%d0%b2%d1%80%d0%b0%d1%87%d0%b8', '', '', '2016-10-27 14:57:39', '2016-10-27 13:57:39', '', 0, 'http://medservice24.pirise.com/?post_type=acf&#038;p=47', 1, 'acf', '', 0),
(54, 1, '2016-10-20 13:44:16', '2016-10-20 12:44:16', '', 'news-pills', '', 'inherit', 'open', 'closed', '', 'news-pills', '', '', '2016-10-20 13:44:16', '2016-10-20 12:44:16', '', 53, 'http://medservice24.pirise.com/wp-content/uploads/2016/10/news-pills.jpg', 0, 'attachment', 'image/jpeg', 0),
(72, 1, '2016-10-20 14:58:32', '2016-10-20 13:58:32', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'inherit', 'closed', 'closed', '', '53-revision-v1', '', '', '2016-10-20 14:58:32', '2016-10-20 13:58:32', '', 53, 'http://medservice24.pirise.com/53-revision-v1/', 0, 'revision', '', 0),
(55, 1, '2016-10-20 13:44:20', '2016-10-20 12:44:20', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of ty', 'inherit', 'closed', 'closed', '', '53-revision-v1', '', '', '2016-10-20 13:44:20', '2016-10-20 12:44:20', '', 53, 'http://medservice24.pirise.com/53-revision-v1/', 0, 'revision', '', 0),
(53, 1, '2016-10-20 13:44:20', '2016-10-20 12:44:20', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'publish', 'open', 'open', '', 'lorem-ipsum', '', '', '2016-10-20 14:58:32', '2016-10-20 13:58:32', '', 0, 'http://medservice24.pirise.com/?p=53', 0, 'post', '', 0),
(20, 1, '2016-10-10 14:54:37', '2016-10-10 13:54:37', '', 'Научно-исследовательский институт терапии им. Л.Т. Малой', '', 'publish', 'open', 'closed', '', 'leo-med', '', '', '2017-01-24 15:30:15', '2017-01-24 13:30:15', '', 0, 'http://medservice24.pirise.com/?post_type=health_facility&#038;p=20', 0, 'health_facility', '', 2),
(21, 1, '2016-10-10 14:55:22', '2016-10-10 13:55:22', '', '4-ая Больница Неотложной Помощи', '', 'publish', 'open', 'closed', '', '%d0%bb%d0%be%d1%80-%d1%81%d0%b5%d1%80%d0%b2%d0%b8%d1%81', '', '', '2016-12-21 18:29:41', '2016-12-21 18:29:41', '', 0, 'http://medservice24.pirise.com/?post_type=health_facility&#038;p=21', 0, 'health_facility', '', 0),
(22, 1, '2016-10-10 15:04:17', '2016-10-10 14:04:17', 'Lorem1 ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . Lorem ipsum dolor', 'Иван Иванов', '', 'publish', 'open', 'closed', '', 'ivan-ivanov', '', '', '2017-05-05 13:45:16', '2017-05-05 10:45:16', '', 0, 'http://medservice24.pirise.com/?post_type=doctor&#038;p=22', 0, 'doctor', '', 2),
(24, 1, '2016-10-10 15:10:51', '2016-10-10 14:10:51', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Больница №1', '', 'publish', 'open', 'closed', '', 'medservices', '', '', '2016-12-21 18:27:20', '2016-12-21 18:27:20', '', 0, 'http://medservice24.pirise.com/?post_type=health_facility&#038;p=24', 0, 'health_facility', '', 8),
(110, 1, '2016-10-24 16:30:33', '2016-10-24 15:30:33', '', 'Страховые компании', '', 'publish', 'closed', 'closed', '', 'acf_%d1%81%d1%82%d1%80%d0%b0%d1%85%d0%be%d0%b2%d1%8b%d0%b5-%d0%ba%d0%be%d0%bc%d0%bf%d0%b0%d0%bd%d0%b8%d0%b8', '', '', '2016-10-25 15:13:04', '2016-10-25 14:13:04', '', 0, 'http://medservice24.pirise.com/?post_type=acf&#038;p=110', 0, 'acf', '', 0),
(170, 1, '2017-02-06 23:26:06', '2017-02-06 21:26:06', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2017-02-06 23:26:06', '2017-02-06 21:26:06', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(122, 1, '2016-11-08 15:18:30', '2016-11-08 15:18:30', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Сотрудничество', '', 'publish', 'closed', 'closed', '', '%d1%81%d0%be%d1%82%d1%80%d1%83%d0%b4%d0%bd%d0%b8%d1%87%d0%b5%d1%81%d1%82%d0%b2%d0%be', '', '', '2016-11-08 15:18:30', '2016-11-08 15:18:30', '', 0, 'http://medservice24.pirise.com/?page_id=122', 0, 'page', '', 0),
(48, 1, '2016-10-17 10:12:57', '2016-10-17 09:12:57', '', 'Медучреждение', '', 'publish', 'closed', 'closed', '', 'acf_%d0%bc%d0%b5%d0%b4%d1%83%d1%87%d1%80%d0%b5%d0%b6%d0%b4%d0%b5%d0%bd%d0%b8%d0%b5', '', '', '2016-10-17 10:13:28', '2016-10-17 09:13:28', '', 0, 'http://medservice24.pirise.com/?post_type=acf&#038;p=48', 1, 'acf', '', 0),
(56, 1, '2016-10-20 13:46:22', '2016-10-20 12:46:22', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'publish', 'open', 'open', '', 'lorem-ipsum-2', '', '', '2016-10-20 14:57:31', '2016-10-20 13:57:31', '', 0, 'http://medservice24.pirise.com/?p=56', 0, 'post', '', 0),
(71, 1, '2016-10-20 14:57:31', '2016-10-20 13:57:31', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'inherit', 'closed', 'closed', '', '56-revision-v1', '', '', '2016-10-20 14:57:31', '2016-10-20 13:57:31', '', 56, 'http://medservice24.pirise.com/56-revision-v1/', 0, 'revision', '', 0),
(57, 1, '2016-10-20 13:46:22', '2016-10-20 12:46:22', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of ty', 'inherit', 'closed', 'closed', '', '56-revision-v1', '', '', '2016-10-20 13:46:22', '2016-10-20 12:46:22', '', 56, 'http://medservice24.pirise.com/56-revision-v1/', 0, 'revision', '', 0),
(58, 1, '2016-10-20 13:46:40', '2016-10-20 12:46:40', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'publish', 'open', 'open', '', 'lorem-ipsum-3', '', '', '2016-10-20 14:56:34', '2016-10-20 13:56:34', '', 0, 'http://medservice24.pirise.com/?p=58', 0, 'post', '', 0),
(70, 1, '2016-10-20 14:56:34', '2016-10-20 13:56:34', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'inherit', 'closed', 'closed', '', '58-revision-v1', '', '', '2016-10-20 14:56:34', '2016-10-20 13:56:34', '', 58, 'http://medservice24.pirise.com/58-revision-v1/', 0, 'revision', '', 0),
(59, 1, '2016-10-20 13:46:40', '2016-10-20 12:46:40', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of ty', 'inherit', 'closed', 'closed', '', '58-revision-v1', '', '', '2016-10-20 13:46:40', '2016-10-20 12:46:40', '', 58, 'http://medservice24.pirise.com/58-revision-v1/', 0, 'revision', '', 0),
(60, 1, '2016-10-20 13:46:51', '2016-10-20 12:46:51', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'publish', 'open', 'open', '', 'lorem-ipsum-4', '', '', '2016-10-20 14:55:57', '2016-10-20 13:55:57', '', 0, 'http://medservice24.pirise.com/?p=60', 0, 'post', '', 0),
(68, 1, '2016-10-20 14:55:57', '2016-10-20 13:55:57', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'inherit', 'closed', 'closed', '', '60-revision-v1', '', '', '2016-10-20 14:55:57', '2016-10-20 13:55:57', '', 60, 'http://medservice24.pirise.com/60-revision-v1/', 0, 'revision', '', 0),
(61, 1, '2016-10-20 13:46:51', '2016-10-20 12:46:51', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of ty', 'inherit', 'closed', 'closed', '', '60-revision-v1', '', '', '2016-10-20 13:46:51', '2016-10-20 12:46:51', '', 60, 'http://medservice24.pirise.com/60-revision-v1/', 0, 'revision', '', 0),
(62, 1, '2016-10-20 13:47:12', '2016-10-20 12:47:12', '<img src=\"http://medservice24.pirise.com/wp-content/uploads/2016/10/news-pills.jpg\" alt=\"\" width=\"226\" height=\"113\" class=\"alignnone size-full wp-image-54\" />\r\n<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'publish', 'open', 'open', '', 'lorem-ipsum-5', '', '', '2017-05-16 13:20:07', '2017-05-16 10:20:07', '', 0, 'http://medservice24.pirise.com/?p=62', 0, 'post', '', 0),
(67, 1, '2016-10-20 14:55:22', '2016-10-20 13:55:22', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'inherit', 'closed', 'closed', '', '62-revision-v1', '', '', '2016-10-20 14:55:22', '2016-10-20 13:55:22', '', 62, 'http://medservice24.pirise.com/62-revision-v1/', 0, 'revision', '', 0),
(63, 1, '2016-10-20 13:47:12', '2016-10-20 12:47:12', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of ty', 'inherit', 'closed', 'closed', '', '62-revision-v1', '', '', '2016-10-20 13:47:12', '2016-10-20 12:47:12', '', 62, 'http://medservice24.pirise.com/62-revision-v1/', 0, 'revision', '', 0),
(64, 1, '2016-10-20 13:50:26', '2016-10-20 12:50:26', '', 'Home Page', '', 'publish', 'closed', 'closed', '', 'acf_home-page', '', '', '2017-02-06 23:19:04', '2017-02-06 21:19:04', '', 0, 'http://medservice24.pirise.com/?post_type=acf&#038;p=64', 0, 'acf', '', 0),
(65, 1, '2016-10-20 13:51:31', '2016-10-20 12:51:31', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-10-20 13:51:31', '2016-10-20 12:51:31', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(66, 1, '2016-10-20 13:53:28', '2016-10-20 12:53:28', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-10-20 13:53:28', '2016-10-20 12:53:28', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(69, 1, '2016-10-20 14:56:14', '2016-10-20 13:56:14', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-10-20 14:56:14', '2016-10-20 13:56:14', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(121, 1, '2016-11-08 15:17:11', '2016-11-08 15:17:11', ' ', '', '', 'publish', 'closed', 'closed', '', '121', '', '', '2017-02-06 23:25:39', '2017-02-06 21:25:39', '', 0, 'http://medservice24.pirise.com/?p=121', 2, 'nav_menu_item', '', 0),
(74, 1, '2016-10-20 15:02:07', '2016-10-20 14:02:07', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Заголовок', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do', 'publish', 'open', 'closed', '', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba', '', '', '2017-02-06 23:00:23', '2017-02-06 21:00:23', '', 0, 'http://medservice24.pirise.com/?post_type=shares&#038;p=74', 0, 'shares', '', 0),
(75, 1, '2016-10-20 15:02:51', '2016-10-20 14:02:51', '', 'stock-img', '', 'inherit', 'open', 'closed', '', 'stock-img', '', '', '2016-10-20 15:02:51', '2016-10-20 14:02:51', '', 74, 'http://medservice24.pirise.com/wp-content/uploads/2016/10/stock-img.jpg', 0, 'attachment', 'image/jpeg', 0),
(76, 1, '2016-10-20 15:07:56', '2016-10-20 14:07:56', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Заголовок 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do', 'publish', 'open', 'closed', '', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-1', '', '', '2017-02-06 23:00:20', '2017-02-06 21:00:20', '', 0, 'http://medservice24.pirise.com/shares/%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-copy/', 0, 'shares', '', 0),
(77, 1, '2016-10-20 15:08:36', '2016-10-20 14:08:36', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Заголовок 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do', 'publish', 'open', 'closed', '', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-2', '', '', '2017-02-06 23:00:17', '2017-02-06 21:00:17', '', 0, 'http://medservice24.pirise.com/shares/%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-1-copy/', 0, 'shares', '', 0),
(78, 1, '2016-10-20 15:08:40', '2016-10-20 14:08:40', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Заголовок 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do', 'publish', 'open', 'closed', '', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-3', '', '', '2017-02-06 23:00:14', '2017-02-06 21:00:14', '', 0, 'http://medservice24.pirise.com/shares/%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-1-copy-copy/', 0, 'shares', '', 0),
(79, 1, '2016-10-20 15:08:43', '2016-10-20 14:08:43', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Заголовок 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do', 'publish', 'open', 'closed', '', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-4', '', '', '2017-02-06 22:59:42', '2017-02-06 20:59:42', '', 0, 'http://medservice24.pirise.com/shares/%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-1-copy-copy-copy/', 0, 'shares', '', 0),
(80, 1, '2016-10-20 15:08:49', '2016-10-20 14:08:49', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Заголовок 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ', 'publish', 'open', 'closed', '', '%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-5', '', '', '2017-02-06 23:00:06', '2017-02-06 21:00:06', '', 0, 'http://medservice24.pirise.com/shares/%d0%b7%d0%b0%d0%b3%d0%be%d0%bb%d0%be%d0%b2%d0%be%d0%ba-1-copy-copy-copy-copy/', 0, 'shares', '', 0),
(81, 1, '2016-10-20 15:09:14', '2016-10-20 14:09:14', '', 'Заголовок 1 Copy Copy', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do', 'inherit', 'closed', 'closed', '', '78-autosave-v1', '', '', '2016-10-20 15:09:14', '2016-10-20 14:09:14', '', 78, 'http://medservice24.pirise.com/78-autosave-v1/', 0, 'revision', '', 0),
(82, 1, '2016-10-20 15:12:31', '2016-10-20 14:12:31', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-10-20 15:12:31', '2016-10-20 14:12:31', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(165, 1, '2017-02-06 23:22:17', '2017-02-06 21:22:17', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Объявления 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', 'publish', 'open', 'closed', '', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-3', '', '', '2017-02-06 23:24:26', '2017-02-06 21:24:26', '', 0, 'http://medservice24.pirise.com/obyavlenia/%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-5-copy-copy/', 0, 'obyavlenia', '', 0),
(166, 1, '2017-02-06 23:22:24', '2017-02-06 21:22:24', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Объявления 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', 'publish', 'open', 'closed', '', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-2', '', '', '2017-02-06 23:24:19', '2017-02-06 21:24:19', '', 0, 'http://medservice24.pirise.com/obyavlenia/%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-5-copy-copy-copy/', 0, 'obyavlenia', '', 0),
(167, 1, '2017-02-06 23:22:31', '2017-02-06 21:22:31', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Объявления 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', 'publish', 'open', 'closed', '', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-1', '', '', '2017-02-06 23:23:36', '2017-02-06 21:23:36', '', 0, 'http://medservice24.pirise.com/obyavlenia/%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-5-copy-copy-copy-copy/', 0, 'obyavlenia', '', 0),
(168, 1, '2017-02-06 23:24:10', '2017-02-06 21:24:10', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Объявления 5 Copy Copy Copy', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', 'inherit', 'closed', 'closed', '', '166-autosave-v1', '', '', '2017-02-06 23:24:10', '2017-02-06 21:24:10', '', 166, 'http://medservice24.pirise.com/166-autosave-v1/', 0, 'revision', '', 0),
(169, 1, '2017-02-06 23:25:39', '2017-02-06 21:25:39', 'Contains Объявления', 'Объявления', '', 'publish', 'closed', 'closed', '', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-2', '', '', '2017-02-06 23:25:39', '2017-02-06 21:25:39', '', 0, 'http://medservice24.pirise.com/?p=169', 4, 'nav_menu_item', '', 0),
(173, 1, '2017-05-16 13:20:07', '2017-05-16 10:20:07', '<img src=\"http://medservice24.pirise.com/wp-content/uploads/2016/10/news-pills.jpg\" alt=\"\" width=\"226\" height=\"113\" class=\"alignnone size-full wp-image-54\" />\r\n<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'inherit', 'closed', 'closed', '', '62-revision-v1', '', '', '2017-05-16 13:20:07', '2017-05-16 10:20:07', '', 62, 'http://medservice24.pirise.com/62-revision-v1/', 0, 'revision', '', 0),
(89, 1, '2016-10-20 15:37:52', '2016-10-20 14:37:52', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-10-20 15:37:52', '2016-10-20 14:37:52', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(90, 1, '2016-10-20 16:13:40', '2016-10-20 15:13:40', '<div class=\"col-75\">\r\n<label for=\"input-coop\" class=\"req\">Имя</label>[text* your-name] \r\n</div>\r\n<div class=\"col-75\">\r\n<label for=\"input-coop2\">Компания</label>[text your-company]\r\n</div>\r\n<div class=\"col-75\">\r\n<label for=\"input-coop3\" class=\"req\">Телефон</label>[tel* your-tel] \r\n</div>\r\n<div class=\"col-75\">\r\n<label for=\"input-coop4\">Сообщение</label>[textarea your-message] \r\n</div>\r\n<div class=\"col-100\">\r\n<span class=\"add\"> <span class=\"red\">*</span> обязательны для заполнения</span>[submit \"Отправить\"]\r\n</div>\nMedService24 \"[your-name]\"\n[your-name] <medservice24@medservice24.pirise.com>\nFrom: [your-name]\r\n\r\nКомпания:[your-company]\r\nТелефон:[your-tel]\r\nСообщение:[your-message]\r\n\r\n--\r\nThis e-mail was sent from a contact form on MedService24 (http://medservice24.pirise.com)\npaffen.web@gmail.com\n\n\n\n\n\nMedService24 \"[your-subject]\"\nMedService24 <wordpress@medservice24.pirise.com>\nMessage Body:\r\n[your-message]\r\n\r\n--\r\nThis e-mail was sent from a contact form on MedService24 (http://medservice24.pirise.com)\n[your-email]\nReply-To: paffen.web@gmail.com\n\n\n\nThank you for your message. It has been sent.\nБыл ошибка при попытке отправить сообщение. Пожалуйста, повторите попытку позже.\nОдно или несколько полей имеют ошибку. Пожалуйста проверьте и попробуйте снова.\nБыл ошибка при попытке отправить сообщение. Пожалуйста, повторите попытку позже.\nВы должны принять условия перед отправкой сообщения.\nтребуется поле.\nПоле слишком долго.\nПоле является слишком коротким.\nФормат даты неверно.\nThe date is before the earliest one allowed.\nThe date is after the latest one allowed.\nThere was an unknown error uploading the file.\nYou are not allowed to upload files of this type.\nThe file is too big.\nThere was an error uploading the file.\nThe number format is invalid.\nThe number is smaller than the minimum allowed.\nЧисло больше максимально допустимого.\nThe answer to the quiz is incorrect.\nYour entered code is incorrect.\nАдрес электронной почты введен неверно.\nThe URL is invalid.\nНомер телефона является недействительным.', 'Contact form Home', '', 'publish', 'closed', 'closed', '', 'contact-form-1', '', '', '2017-02-06 22:37:46', '2017-02-06 20:37:46', '', 0, 'http://medservice24.pirise.com/?post_type=wpcf7_contact_form&#038;p=90', 0, 'wpcf7_contact_form', '', 0),
(91, 1, '2016-10-21 09:20:56', '2016-10-21 08:20:56', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-10-21 09:20:56', '2016-10-21 08:20:56', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(92, 1, '2016-10-21 09:30:41', '2016-10-21 08:30:41', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-10-21 09:30:41', '2016-10-21 08:30:41', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(93, 1, '2016-10-21 12:56:42', '2016-10-21 11:56:42', '', 'g', '', 'inherit', 'open', 'closed', '', 'g', '', '', '2016-10-21 12:56:42', '2016-10-21 11:56:42', '', 0, 'http://medservice24.pirise.com/wp-content/uploads/2016/10/g.png', 0, 'attachment', 'image/png', 0),
(94, 1, '2016-10-21 12:56:42', '2016-10-21 11:56:42', '', 'ln', '', 'inherit', 'open', 'closed', '', 'ln', '', '', '2016-10-21 12:56:42', '2016-10-21 11:56:42', '', 0, 'http://medservice24.pirise.com/wp-content/uploads/2016/10/ln.png', 0, 'attachment', 'image/png', 0),
(95, 1, '2016-10-21 12:56:43', '2016-10-21 11:56:43', '', 'twitter', '', 'inherit', 'open', 'closed', '', 'twitter', '', '', '2016-10-21 12:56:43', '2016-10-21 11:56:43', '', 0, 'http://medservice24.pirise.com/wp-content/uploads/2016/10/twitter.png', 0, 'attachment', 'image/png', 0),
(96, 1, '2016-10-21 14:43:56', '2016-10-21 13:43:56', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-10-21 14:43:56', '2016-10-21 13:43:56', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(97, 1, '2016-10-21 15:07:21', '2016-10-21 14:07:21', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Аптека 1', '', 'publish', 'open', 'closed', '', '%d0%b0%d0%bf%d1%82%d0%b5%d0%ba%d0%b0-1', '', '', '2016-10-27 09:39:13', '2016-10-27 08:39:13', '', 0, 'http://medservice24.pirise.com/?post_type=pharmacy&#038;p=97', 0, 'pharmacy', '', 0),
(99, 1, '2016-10-21 15:55:12', '2016-10-21 14:55:12', '', 'logo-clinic', '', 'inherit', 'open', 'closed', '', 'logo-clinic', '', '', '2016-10-21 15:55:12', '2016-10-21 14:55:12', '', 24, 'http://medservice24.pirise.com/wp-content/uploads/2016/10/logo-clinic.jpg', 0, 'attachment', 'image/jpeg', 0),
(102, 1, '2016-10-21 15:59:55', '2016-10-21 14:59:55', '', 'bg-clinic', '', 'inherit', 'open', 'closed', '', 'bg-clinic', '', '', '2016-10-21 15:59:55', '2016-10-21 14:59:55', '', 24, 'http://medservice24.pirise.com/wp-content/uploads/2016/10/bg-clinic.jpg', 0, 'attachment', 'image/jpeg', 0),
(103, 1, '2016-10-24 13:02:16', '2016-10-24 12:02:16', '', 'ФИО(Врача)', '', 'publish', 'closed', 'closed', '', 'acf_%d1%84%d0%b8%d0%be%d0%b2%d1%80%d0%b0%d1%87%d0%b0', '', '', '2016-10-27 17:36:54', '2016-10-27 16:36:54', '', 0, 'http://medservice24.pirise.com/?post_type=acf&#038;p=103', 0, 'acf', '', 0),
(105, 1, '2016-10-24 13:12:43', '2016-10-24 12:12:43', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Контакты', '', 'publish', 'closed', 'closed', '', '%d0%ba%d0%be%d0%bd%d1%82%d0%b0%d0%ba%d1%82%d1%8b', '', '', '2016-10-24 13:13:00', '2016-10-24 12:13:00', '', 0, 'http://medservice24.pirise.com/?page_id=105', 0, 'page', '', 0),
(106, 1, '2016-10-24 13:12:43', '2016-10-24 12:12:43', '', 'Контакты', '', 'inherit', 'closed', 'closed', '', '105-revision-v1', '', '', '2016-10-24 13:12:43', '2016-10-24 12:12:43', '', 105, 'http://medservice24.pirise.com/105-revision-v1/', 0, 'revision', '', 0),
(107, 1, '2016-10-24 13:13:00', '2016-10-24 12:13:00', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Контакты', '', 'inherit', 'closed', 'closed', '', '105-revision-v1', '', '', '2016-10-24 13:13:00', '2016-10-24 12:13:00', '', 105, 'http://medservice24.pirise.com/105-revision-v1/', 0, 'revision', '', 0),
(108, 1, '2016-10-24 13:13:21', '2016-10-24 12:13:21', ' ', '', '', 'publish', 'closed', 'closed', '', '108', '', '', '2017-02-06 23:25:39', '2017-02-06 21:25:39', '', 0, 'http://medservice24.pirise.com/?p=108', 3, 'nav_menu_item', '', 0),
(111, 1, '2016-10-24 16:32:16', '2016-10-24 15:32:16', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'MedServices', '', 'inherit', 'closed', 'closed', '', '24-autosave-v1', '', '', '2016-10-24 16:32:16', '2016-10-24 15:32:16', '', 24, 'http://medservice24.pirise.com/24-autosave-v1/', 0, 'revision', '', 0),
(119, 1, '2016-11-08 15:16:52', '2016-11-08 15:16:52', '', 'Новости', '', 'publish', 'closed', 'closed', '', '%d0%bd%d0%be%d0%b2%d0%be%d1%81%d1%82%d0%b8', '', '', '2016-11-08 15:16:52', '2016-11-08 15:16:52', '', 0, 'http://medservice24.pirise.com/?page_id=119', 0, 'page', '', 0),
(113, 1, '2016-10-25 09:00:58', '2016-10-25 08:00:58', '', 'Аптека 2', '', 'publish', 'open', 'closed', '', '%d0%b0%d0%bf%d1%82%d0%b5%d0%ba%d0%b0-2', '', '', '2016-10-25 09:01:14', '2016-10-25 08:01:14', '', 0, 'http://medservice24.pirise.com/pharmacy/%d0%b0%d0%bf%d1%82%d0%b5%d0%ba%d0%b0-1-copy/', 0, 'pharmacy', '', 0),
(114, 1, '2016-10-25 09:02:07', '2016-10-25 08:02:07', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Аптека 3', '', 'publish', 'open', 'closed', '', '%d0%b0%d0%bf%d1%82%d0%b5%d0%ba%d0%b0-3', '', '', '2016-10-28 08:37:27', '2016-10-28 07:37:27', '', 0, 'http://medservice24.pirise.com/?post_type=pharmacy&#038;p=114', 0, 'pharmacy', '', 0),
(117, 1, '2016-10-27 09:38:52', '2016-10-27 08:38:52', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Аптека 1', '', 'inherit', 'closed', 'closed', '', '97-autosave-v1', '', '', '2016-10-27 09:38:52', '2016-10-27 08:38:52', '', 97, 'http://medservice24.pirise.com/97-autosave-v1/', 0, 'revision', '', 0),
(120, 1, '2016-11-08 15:16:52', '2016-11-08 15:16:52', '', 'Новости', '', 'inherit', 'closed', 'closed', '', '119-revision-v1', '', '', '2016-11-08 15:16:52', '2016-11-08 15:16:52', '', 119, 'http://medservice24.pirise.com/119-revision-v1/', 0, 'revision', '', 0),
(123, 1, '2016-11-08 15:18:30', '2016-11-08 15:18:30', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Сотрудничество', '', 'inherit', 'closed', 'closed', '', '122-revision-v1', '', '', '2016-11-08 15:18:30', '2016-11-08 15:18:30', '', 122, 'http://medservice24.pirise.com/122-revision-v1/', 0, 'revision', '', 0),
(124, 1, '2016-11-08 15:18:59', '2016-11-08 15:18:59', ' ', '', '', 'publish', 'closed', 'closed', '', '124', '', '', '2017-02-06 23:25:39', '2017-02-06 21:25:39', '', 0, 'http://medservice24.pirise.com/?p=124', 1, 'nav_menu_item', '', 0),
(134, 1, '2016-11-15 13:31:10', '2016-11-15 13:31:10', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'inherit', 'closed', 'closed', '', '62-revision-v1', '', '', '2016-11-15 13:31:10', '2016-11-15 13:31:10', '', 62, 'http://medservice24.pirise.com/62-revision-v1/', 0, 'revision', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(133, 1, '2016-11-15 13:29:45', '2016-11-15 13:29:45', '<strong>Lorem Ipsum</strong> 11111111111 1111111111111111111 11111111 is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 5', 'Lorem Ipsum test  test test test test test test test test test test test test test test  test is simply dummy text of the printing and typesetting industry', 'inherit', 'closed', 'closed', '', '62-revision-v1', '', '', '2016-11-15 13:29:45', '2016-11-15 13:29:45', '', 62, 'http://medservice24.pirise.com/62-revision-v1/', 0, 'revision', '', 0),
(128, 1, '2016-11-15 13:21:45', '2016-11-15 13:21:45', '<strong>Lorem Ipsum</strong> 11111 is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'inherit', 'closed', 'closed', '', '62-revision-v1', '', '', '2016-11-15 13:21:45', '2016-11-15 13:21:45', '', 62, 'http://medservice24.pirise.com/62-revision-v1/', 0, 'revision', '', 0),
(129, 1, '2016-11-15 13:22:49', '2016-11-15 13:22:49', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'inherit', 'closed', 'closed', '', '62-revision-v1', '', '', '2016-11-15 13:22:49', '2016-11-15 13:22:49', '', 62, 'http://medservice24.pirise.com/62-revision-v1/', 0, 'revision', '', 0),
(130, 1, '2016-11-15 13:25:59', '2016-11-15 13:25:59', '<strong>Lorem Ipsum</strong> 11111111111 1111111111111111111 11111111 is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'inherit', 'closed', 'closed', '', '62-revision-v1', '', '', '2016-11-15 13:25:59', '2016-11-15 13:25:59', '', 62, 'http://medservice24.pirise.com/62-revision-v1/', 0, 'revision', '', 0),
(131, 1, '2016-11-15 13:26:07', '2016-11-15 13:26:07', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-11-15 13:26:07', '2016-11-15 13:26:07', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(132, 1, '2016-11-15 13:28:15', '2016-11-15 13:28:15', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-11-15 13:28:15', '2016-11-15 13:28:15', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0),
(136, 1, '2016-11-21 09:53:03', '2016-11-21 09:53:03', '', 'Военно-Медицинский Клинический центр Северного Региона', '', 'publish', 'open', 'closed', '', 'leo-med-copy', '', '', '2017-01-19 14:49:31', '2017-01-19 14:49:31', '', 0, 'http://medservice24.pirise.com/health_facility/leo-med-copy/', 0, 'health_facility', '', 0),
(137, 1, '2016-11-21 10:00:25', '2016-11-21 10:00:25', 'TEST servise 1', '10-я Городская Поликлиника', '', 'publish', 'open', 'closed', '', 'testservise1', '', '', '2017-01-19 14:50:52', '2017-01-19 14:50:52', '', 0, 'http://medservice24.pirise.com/?post_type=health_facility&#038;p=137', 0, 'health_facility', '', 0),
(138, 1, '2016-11-21 10:43:41', '2016-11-21 10:43:41', 'Тестовый врач', 'Тест', '', 'publish', 'open', 'closed', '', '%d1%82%d0%b5%d1%81%d1%82', '', '', '2016-12-14 16:22:09', '2016-12-14 16:22:09', '', 0, 'http://medservice24.pirise.com/?post_type=doctor&#038;p=138', 0, 'doctor', '', 1),
(139, 1, '2016-11-21 13:33:41', '2016-11-21 13:33:41', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . Lorem ipsum dolor', 'Иван Иванов Copy', '', 'publish', 'open', 'closed', '', 'ivan-ivanov-copy', '', '', '2016-11-24 09:35:32', '2016-11-24 09:35:32', '', 0, 'http://medservice24.pirise.com/doctor/ivan-ivanov-copy/', 0, 'doctor', '', 0),
(150, 1, '2017-01-18 17:23:10', '2017-01-18 17:23:10', '', 'map-search', '', 'publish', 'closed', 'closed', '', 'map-search', '', '', '2017-01-18 17:23:10', '2017-01-18 17:23:10', '', 0, 'http://medservice24.pirise.com/?page_id=150', 0, 'page', '', 0),
(175, 1, '2017-08-14 14:44:08', '0000-00-00 00:00:00', '', 'Черновик', '', 'auto-draft', 'open', 'open', '', '', '', '', '2017-08-14 14:44:08', '0000-00-00 00:00:00', '', 0, 'http://medservice24.pirise.com/?p=175', 0, 'post', '', 0),
(151, 1, '2017-01-18 17:23:10', '2017-01-18 17:23:10', '', 'map-search', '', 'inherit', 'closed', 'closed', '', '150-revision-v1', '', '', '2017-01-18 17:23:10', '2017-01-18 17:23:10', '', 150, 'http://medservice24.pirise.com/150-revision-v1/', 0, 'revision', '', 0),
(152, 1, '2017-01-19 14:48:50', '2017-01-19 14:48:50', '', '4-ая Больница Неотложной Помощи', '', 'inherit', 'closed', 'closed', '', '21-autosave-v1', '', '', '2017-01-19 14:48:50', '2017-01-19 14:48:50', '', 21, 'http://medservice24.pirise.com/21-autosave-v1/', 0, 'revision', '', 0),
(153, 1, '2017-01-20 16:25:35', '2017-01-20 14:25:35', '', 'User', '', 'publish', 'closed', 'closed', '', 'acf_user', '', '', '2017-01-20 16:25:35', '2017-01-20 14:25:35', '', 0, 'http://medservice24.pirise.com/?post_type=acf&#038;p=153', 0, 'acf', '', 0),
(154, 1, '2017-01-20 17:13:29', '2017-01-20 15:13:29', '', 'My Account', '', 'publish', 'closed', 'closed', '', 'my-account', '', '', '2017-01-20 17:14:23', '2017-01-20 15:14:23', '', 0, 'http://medservice24.pirise.com/?page_id=154', 0, 'page', '', 0),
(155, 1, '2017-01-20 17:13:29', '2017-01-20 15:13:29', '', 'My Account', '', 'inherit', 'closed', 'closed', '', '154-revision-v1', '', '', '2017-01-20 17:13:29', '2017-01-20 15:13:29', '', 154, 'http://medservice24.pirise.com/154-revision-v1/', 0, 'revision', '', 0),
(156, 1, '2017-01-24 15:19:44', '2017-01-24 13:19:44', '<label> Ваше имя (обязательно)\r\n    [text* your-name] </label>\r\n\r\n<label> Ваш e-mail (обязательно)\r\n    [email* your-email] </label>\r\n\r\n<label> Адрес\r\n    [text your-address] </label>\r\n\r\n<label> Время работы\r\n    [textarea your-time-work] </label>\r\n\r\n<label> Новости\r\n    [textarea your-news] </label>\r\n\r\n<label> Акции\r\n    [textarea your-stock] </label>\r\n\r\n<label> Описание\r\n    [textarea your-description] </label>\r\n\r\n<label> Другое\r\n    [textarea your-other] </label>\r\n\r\n[submit \"Отправить\"]\nMedService24 Изменение информации личного кабинета\n[your-name] <wordpress@medservice24.pirise.com>\nОт: [your-name] <[your-email]>\r\n\r\nАдрес: [your-address]\r\nВремя работы: [your-time-work]\r\nНовости:\r\n[your-news]\r\nАкции:\r\n[your-stock]\r\nОписание:\r\n[your-description]\r\nДругое:\r\n[your-other]\r\n\r\n\r\n--\r\nЭто сообщение отправлено с сайта MedService24 (http://medservice24.pirise.com)\npaffen.web@gmail.com\nReply-To: [your-email]\n\n\n\n\nMedService24 \"[your-subject]\"\nMedService24 <wordpress@medservice24.pirise.com>\nСообщение:\r\n[your-message]\r\n\r\n--\r\nЭто сообщение отправлено с сайта MedService24 (http://medservice24.pirise.com)\n[your-email]\nReply-To: paffen.web@gmail.com\n\n\n\nСпасибо за внесенные изменения. Данные отправлены администратору на модерацию. Время обработку 24 часа\nПроизошла ошибка при попытке отправить Ваше сообщение. Пожалуйста попробуйте ещё раз позже.\nОдно или несколько полей содержат ошибочные данные. Пожалуйста проверьте их и попробуйте ещё раз.\nПроизошла ошибка при попытке отправить Ваше сообщение. Пожалуйста попробуйте ещё раз позже.\nВы должны принять условия и положения перед тем, как отправлять Ваше сообщение.\nПоле обязательно.\nПоле слишком длинное.\nПоле слишком короткое.\nФормат даты некорректен.\nВведённая дата слишком далеко в прошлом.\nВведённая дата слишком далеко в будущем.\nПри загрузке файла произошла неизвестная ошибка.\nВам не разрешено загружать файлы этого типа.\nФайл слишком большой.\nПри загрузке файла произошла ошибка.\nФормат числа некорректен.\nЧисло меньше минимально допустимого.\nЧисло больше максимально допустимого.\nОтвет на задачку неверен.\nКод введен неверно.\nВведённый электронный адрес неверен.\nАдрес ссылки неверен.\nНомер телефона неверен.', 'Updates form Cabinet', '', 'publish', 'closed', 'closed', '', 'updates-form-cabinet', '', '', '2017-01-31 18:45:12', '2017-01-31 16:45:12', '', 0, 'http://medservice24.pirise.com/?post_type=wpcf7_contact_form&#038;p=156', 0, 'wpcf7_contact_form', '', 0),
(157, 1, '2017-01-24 15:29:36', '2017-01-24 13:29:36', '', 'Научно-исследовательский институт терапии им. Л.Т. Малой Copy', '', 'publish', 'open', 'closed', '', 'leo-med-copy-2', '', '', '2017-01-24 15:29:36', '2017-01-24 13:29:36', '', 0, 'http://medservice24.pirise.com/health_facility/leo-med-copy-2/', 0, 'health_facility', '', 0),
(161, 1, '2017-02-06 23:00:04', '2017-02-06 21:00:04', '', 'Заголовок 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ', 'inherit', 'closed', 'closed', '', '80-autosave-v1', '', '', '2017-02-06 23:00:04', '2017-02-06 21:00:04', '', 80, 'http://medservice24.pirise.com/80-autosave-v1/', 0, 'revision', '', 0),
(162, 1, '2017-02-06 23:17:43', '2017-02-06 21:17:43', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Объявления 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', 'publish', 'open', 'closed', '', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-5', '', '', '2017-02-06 23:17:43', '2017-02-06 21:17:43', '', 0, 'http://medservice24.pirise.com/?post_type=obyavlenia&#038;p=162', 0, 'obyavlenia', '', 0),
(164, 1, '2017-02-06 23:22:09', '2017-02-06 21:22:09', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Объявления 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', 'publish', 'open', 'closed', '', '%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-4', '', '', '2017-02-06 23:25:06', '2017-02-06 21:25:06', '', 0, 'http://medservice24.pirise.com/obyavlenia/%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f-5-copy/', 0, 'obyavlenia', '', 0),
(163, 1, '2017-02-06 23:19:59', '2017-02-06 21:19:59', '', 'Home', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2017-02-06 23:19:59', '2017-02-06 21:19:59', '', 5, 'http://medservice24.pirise.com/5-revision-v1/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_ratings`
--

CREATE TABLE `wp_ratings` (
  `rating_id` int(11) NOT NULL,
  `rating_postid` int(11) NOT NULL,
  `rating_posttitle` text NOT NULL,
  `rating_rating` int(2) NOT NULL,
  `rating_timestamp` varchar(15) NOT NULL,
  `rating_ip` varchar(40) NOT NULL,
  `rating_host` varchar(200) NOT NULL,
  `rating_username` varchar(50) NOT NULL,
  `rating_userid` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `wp_ratings`
--

INSERT INTO `wp_ratings` (`rating_id`, `rating_postid`, `rating_posttitle`, `rating_rating`, `rating_timestamp`, `rating_ip`, `rating_host`, `rating_username`, `rating_userid`) VALUES
(1, 24, 'MedServices', 5, '1477302135', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', 'admin', 1),
(2, 24, 'MedServices', 3, '1477302188', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', 'admin', 1),
(3, 24, 'MedServices', 2, '1477302194', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', 'admin', 1),
(4, 22, 'Иван Иванов', 4, '1477302593', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', 'admin', 1),
(5, 22, 'Иван Иванов', 5, '1477302651', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', 'admin', 1),
(6, 20, 'Leo Med', 4, '1477384023', '77.222.149.54', '77.222.149.54', 'admin', 1),
(7, 21, 'Лор Сервис', 4, '1477384996', '77.222.149.54', '77.222.149.54', 'admin', 1),
(8, 97, 'Аптека 1', 4, '1477385026', '77.222.149.54', '77.222.149.54', 'admin', 1),
(9, 114, 'Аптека 3', 5, '1477390316', '77.222.149.54', '77.222.149.54', 'admin', 1),
(10, 138, 'Тест', 5, '1479739524', '77.222.149.54', '77.222.149.54', 'admin', 1),
(11, 137, '10-я Городская Поликлиника', 4, '1482345165', '82.117.232.132', '82-117-232-132.gpon.sta.kh.velton.ua', 'admin', 1),
(12, 22, 'Иван Иванов', 3, '1485888539', '82.117.235.36', 'khm.net.ua', 'Иван Иванов', 2),
(13, 20, 'Научно-исследовательский институт терапии им. Л.Т. Малой', 5, '1485954581', '5.1.17.160', '5-1-17-160-dynamic.retail.datagroup.ua', 'Гость', 0),
(14, 157, 'Научно-исследовательский институт терапии им. Л.Т. Малой Copy', 5, '1485970616', '77.122.7.138', '77-122-7-138.dynamic-FTTB.kharkov.volia.com', 'Иван Иванов', 2),
(15, 22, 'Иван Иванов', 5, '1485970649', '77.122.7.138', '77-122-7-138.dynamic-FTTB.kharkov.volia.com', 'Иван Иванов', 2),
(16, 24, 'Больница №1', 5, '1485970702', '77.122.7.138', '77-122-7-138.dynamic-FTTB.kharkov.volia.com', 'Иван Иванов', 2),
(17, 20, 'Научно-исследовательский институт терапии им. Л.Т. Малой', 4, '1486240431', '31.43.45.56', '31.43.45.56', 'Гость', 0),
(18, 157, 'Научно-исследовательский институт терапии им. Л.Т. Малой Copy', 4, '1486241254', '31.43.45.56', '31.43.45.56', 'fdsfs', 0),
(19, 24, 'Больница №1', 1, '1488982293', '82.117.232.238', '82-117-232-238.gpon.sta.kh.velton.ua', 'Гость', 0),
(20, 24, 'Больница №1', 4, '1490796975', '82.117.232.238', '82-117-232-238.gpon.sta.kh.velton.ua', 'Иван Иванов', 2),
(21, 24, 'Больница №1', 5, '1490797481', '82.117.232.238', '82-117-232-238.gpon.sta.kh.velton.ua', 'Иван Иванов', 2),
(22, 114, 'Аптека 3', 3, '1492186665', '82.117.232.238', '82-117-232-238.gpon.sta.kh.velton.ua', 'Гость', 0),
(23, 157, 'Научно-исследовательский институт терапии им. Л.Т. Малой Copy', 3, '1492692722', '82.117.232.238', '82-117-232-238.gpon.sta.kh.velton.ua', 'Гость', 0),
(24, 24, 'Больница №1', 2, '1492709544', '82.117.232.238', '82-117-232-238.gpon.sta.kh.velton.ua', 'Гость', 0),
(25, 21, '4-ая Больница Неотложной Помощи', 5, '1497393025', '80.77.43.240', '80.77.43.240', 'Гость', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_subscribe2`
--

CREATE TABLE `wp_subscribe2` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL DEFAULT '',
  `active` tinyint(1) DEFAULT '0',
  `date` date NOT NULL DEFAULT '2016-10-20',
  `time` time NOT NULL DEFAULT '00:00:00',
  `ip` char(64) NOT NULL DEFAULT 'admin',
  `conf_date` date DEFAULT NULL,
  `conf_time` time DEFAULT NULL,
  `conf_ip` char(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorised', 'uncategorised', 0),
(2, 'Харьковская область', '%d1%85%d0%b0%d1%80%d1%8c%d0%ba%d0%be%d0%b2%d1%81%d0%ba%d0%b0%d1%8f-%d0%be%d0%b1%d0%bb', 0),
(3, 'Киевская область', '%d0%ba%d0%b8%d0%b5%d0%b2%d1%81%d0%ba%d0%b0%d1%8f-%d0%be%d0%b1%d0%bb', 0),
(4, 'Полтавская обл.', '%d0%bf%d0%be%d0%bb%d1%82%d0%b0%d0%b2%d1%81%d0%ba%d0%b0%d1%8f-%d0%be%d0%b1%d0%bb', 0),
(5, 'Сумская обл.', '%d1%81%d1%83%d0%bc%d1%81%d0%ba%d0%b0%d1%8f-%d0%be%d0%b1%d0%bb', 0),
(6, 'Львовская обл.', '%d0%bb%d1%8c%d0%b2%d0%be%d0%b2%d1%81%d0%ba%d0%b0%d1%8f-%d0%be%d0%b1%d0%bb', 0),
(7, 'Харьков', 'kharkiv', 0),
(8, 'Киев', '%d0%ba%d0%b8%d0%b5%d0%b2', 0),
(9, 'Купянск', '%d0%ba%d1%83%d0%bf%d1%8f%d0%bd%d1%81%d0%ba', 0),
(10, 'Мерефа', '%d0%bc%d0%b5%d1%80%d0%b5%d1%84%d0%b0', 0),
(11, 'Богодухов', '%d0%b1%d0%be%d0%b3%d0%be%d0%b4%d1%83%d1%85%d0%be%d0%b2', 0),
(12, 'Киевский район', '%d0%ba%d0%b8%d0%b5%d0%b2%d1%81%d0%ba%d0%b8%d0%b9-%d1%80%d0%b0%d0%b9%d0%be%d0%bd', 0),
(13, 'Холодногорский район', '%d1%85%d0%be%d0%bb%d0%be%d0%b4%d0%bd%d0%be%d0%b3%d0%be%d1%80%d1%81%d0%ba%d0%b8%d0%b9-%d1%80%d0%b0%d0%b9%d0%be%d0%bd', 0),
(14, 'Московский район', '%d0%bc%d0%be%d1%81%d0%ba%d0%be%d0%b2%d1%81%d0%ba%d0%b8%d0%b9-%d1%80%d0%b0%d0%b9%d0%be%d0%bd', 0),
(15, 'Шевченковский район', '%d1%88%d0%b5%d0%b2%d1%87%d0%b5%d0%bd%d0%ba%d0%be%d0%b2%d1%81%d0%ba%d0%b8%d0%b9-%d1%80%d0%b0%d0%b9%d0%be%d0%bd', 0),
(16, 'Львов', '%d0%bb%d1%8c%d0%b2%d0%be%d0%b2', 0),
(17, 'Menu 1', 'menu-1', 0),
(18, 'Сумская область', '%d1%81%d1%83%d0%bc%d1%81%d0%ba%d0%b0%d1%8f-%d0%be%d0%b1%d0%bb%d0%b0%d1%81%d1%82%d1%8c', 0),
(19, 'Буча', '%d0%b1%d1%83%d1%87%d0%b0', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(53, 1, 0),
(24, 2, 0),
(24, 7, 0),
(24, 12, 0),
(21, 2, 0),
(21, 7, 0),
(21, 13, 0),
(157, 7, 0),
(20, 3, 0),
(157, 13, 0),
(24, 11, 0),
(24, 9, 0),
(24, 10, 0),
(22, 2, 0),
(22, 7, 0),
(22, 14, 0),
(157, 2, 0),
(124, 17, 0),
(113, 7, 0),
(136, 14, 0),
(169, 17, 0),
(56, 1, 0),
(58, 1, 0),
(60, 1, 0),
(62, 1, 0),
(97, 2, 0),
(97, 7, 0),
(97, 13, 0),
(108, 17, 0),
(113, 2, 0),
(113, 13, 0),
(114, 2, 0),
(114, 7, 0),
(114, 14, 0),
(121, 17, 0),
(136, 7, 0),
(136, 2, 0),
(136, 15, 0),
(139, 10, 0),
(137, 7, 0),
(20, 8, 0),
(137, 13, 0),
(138, 10, 0),
(139, 2, 0),
(138, 2, 0),
(137, 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 5),
(2, 2, 'location_geo', '', 0, 11),
(3, 3, 'location_geo', '', 0, 1),
(4, 4, 'location_geo', '', 0, 0),
(5, 5, 'location_geo', '', 0, 0),
(6, 6, 'location_geo', '', 0, 0),
(7, 7, 'location_geo', '', 2, 9),
(8, 8, 'location_geo', '', 3, 1),
(9, 9, 'location_geo', '', 2, 1),
(10, 10, 'location_geo', '', 2, 3),
(11, 11, 'location_geo', '', 2, 1),
(12, 12, 'location_geo', '', 7, 1),
(13, 13, 'location_geo', '', 7, 5),
(14, 14, 'location_geo', '', 7, 3),
(15, 15, 'location_geo', '', 7, 1),
(16, 16, 'location_geo', '', 6, 0),
(17, 17, 'nav_menu', '', 0, 4),
(18, 18, 'location_geo', '', 0, 0),
(19, 19, 'location_geo', '', 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(11, 1, 'wp_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', ''),
(13, 1, 'show_welcome_panel', '1'),
(15, 1, 'wp_dashboard_quick_press_last_post_id', '175'),
(16, 1, 'closedpostboxes_pharmacy', 'a:1:{i:0;s:11:\"commentsdiv\";}'),
(17, 1, 'metaboxhidden_pharmacy', 'a:7:{i:0;s:6:\"acf_64\";i:1;s:6:\"acf_10\";i:2;s:6:\"acf_47\";i:3;s:6:\"acf_48\";i:4;s:16:\"commentstatusdiv\";i:5;s:11:\"commentsdiv\";i:6;s:7:\"slugdiv\";}'),
(18, 1, 'closedpostboxes_health_facility', 'a:0:{}'),
(19, 1, 'metaboxhidden_health_facility', 'a:7:{i:0;s:7:\"acf_103\";i:1;s:6:\"acf_64\";i:2;s:6:\"acf_10\";i:3;s:6:\"acf_47\";i:4;s:16:\"commentstatusdiv\";i:5;s:11:\"commentsdiv\";i:6;s:7:\"slugdiv\";}'),
(36, 1, 'nav_menu_recently_edited', '17'),
(20, 1, 'closedpostboxes_doctor', 'a:0:{}'),
(21, 1, 'metaboxhidden_doctor', 'a:6:{i:0;s:6:\"acf_64\";i:1;s:6:\"acf_10\";i:2;s:6:\"acf_48\";i:3;s:7:\"acf_109\";i:4;s:16:\"commentstatusdiv\";i:5;s:7:\"slugdiv\";}'),
(22, 1, 'closedpostboxes_post', 'a:0:{}'),
(23, 1, 'metaboxhidden_post', 'a:9:{i:0;s:6:\"acf_10\";i:1;s:6:\"acf_47\";i:2;s:6:\"acf_48\";i:3;s:6:\"acf_30\";i:4;s:13:\"trackbacksdiv\";i:5;s:10:\"postcustom\";i:6;s:16:\"commentstatusdiv\";i:7;s:7:\"slugdiv\";i:8;s:9:\"authordiv\";}'),
(28, 1, 'closedpostboxes_shares', 'a:0:{}'),
(29, 1, 'metaboxhidden_shares', 'a:11:{i:0;s:7:\"acf_103\";i:1;s:7:\"acf_110\";i:2;s:6:\"acf_64\";i:3;s:6:\"acf_10\";i:4;s:6:\"acf_47\";i:5;s:6:\"acf_48\";i:6;s:7:\"acf_109\";i:7;s:6:\"acf_30\";i:8;s:16:\"commentstatusdiv\";i:9;s:11:\"commentsdiv\";i:10;s:7:\"slugdiv\";}'),
(30, 1, 'closedpostboxes_ads', 'a:0:{}'),
(31, 1, 'metaboxhidden_ads', 'a:7:{i:0;s:6:\"acf_64\";i:1;s:6:\"acf_10\";i:2;s:6:\"acf_47\";i:3;s:6:\"acf_48\";i:4;s:6:\"acf_30\";i:5;s:16:\"commentstatusdiv\";i:6;s:7:\"slugdiv\";}'),
(24, 1, 'wp_user-settings', 'editor=html&libraryContent=browse&hidetb=1'),
(25, 1, 'wp_user-settings-time', '1479735204'),
(26, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),
(27, 1, 'metaboxhidden_nav-menus', 'a:5:{i:0;s:29:\"add-post-type-health_facility\";i:1;s:22:\"add-post-type-pharmacy\";i:2;s:20:\"add-post-type-doctor\";i:3;s:12:\"add-post_tag\";i:4;s:16:\"add-location_geo\";}'),
(32, 1, 's2_format', 'excerpt'),
(33, 1, 's2_autosub', NULL),
(34, 1, 's2_authors', ''),
(39, 1, 'session_tokens', 'a:1:{s:64:\"4014cd4d85257f417df55a3921b313d6d0bc0551c455b85ae77eb20d2963e5c7\";a:4:{s:10:\"expiration\";i:1502883845;s:2:\"ip\";s:12:\"94.179.92.92\";s:2:\"ua\";s:113:\"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36\";s:5:\"login\";i:1502711045;}}');

-- --------------------------------------------------------

--
-- Структура таблицы `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BdCUC1ibNOKB2fCxzqGFB6u1gqMIJm1', 'admin', 'admin@albiondigitalaction.com', '', '2016-10-10 13:22:10', '', 0, 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `med_actual_location`
--
ALTER TABLE `med_actual_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locality_fk` (`locality_fk`);

--
-- Индексы таблицы `med_composite_locality_actual_location`
--
ALTER TABLE `med_composite_locality_actual_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locality_fk` (`locality_fk`,`actual_location_fk`),
  ADD KEY `district_city_fk` (`district_city_fk`),
  ADD KEY `locality_fk_2` (`locality_fk`),
  ADD KEY `locality_fk_3` (`locality_fk`),
  ADD KEY `actual_location_fk` (`actual_location_fk`),
  ADD KEY `locality_fk_4` (`locality_fk`),
  ADD KEY `actual_location_fk_2` (`actual_location_fk`);

--
-- Индексы таблицы `med_day_work`
--
ALTER TABLE `med_day_work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monday_fk` (`monday_fk`),
  ADD KEY `tuesday_fk` (`tuesday_fk`),
  ADD KEY `wednesday_fk` (`wednesday_fk`),
  ADD KEY `thursday_fk` (`thursday_fk`),
  ADD KEY `friday_fk` (`friday_fk`),
  ADD KEY `saturday_fk` (`saturday_fk`),
  ADD KEY `sunday_fk` (`sunday_fk`);

--
-- Индексы таблицы `med_district_city`
--
ALTER TABLE `med_district_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locality_fk` (`locality_fk`);

--
-- Индексы таблицы `med_district_region`
--
ALTER TABLE `med_district_region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_region_fk` (`region_fk`);

--
-- Индексы таблицы `med_home`
--
ALTER TABLE `med_home`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actual_location` (`actual_location_fk`);

--
-- Индексы таблицы `med_insurance_companies`
--
ALTER TABLE `med_insurance_companies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `med_locality`
--
ALTER TABLE `med_locality`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_of_locality_fk` (`type_locality_fk`),
  ADD KEY `district_region_fk` (`district_region_fk`);

--
-- Индексы таблицы `med_organization`
--
ALTER TABLE `med_organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_ownership` (`type_ownership_fk`);

--
-- Индексы таблицы `med_phone`
--
ALTER TABLE `med_phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_organization` (`summary_table_fk`);

--
-- Индексы таблицы `med_region`
--
ALTER TABLE `med_region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `med_services`
--
ALTER TABLE `med_services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `med_summary_table`
--
ALTER TABLE `med_summary_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actual_location_fk` (`actual_location_fk`),
  ADD KEY `organization_fk` (`organization_fk`),
  ADD KEY `type_works_fk` (`type_works_fk`),
  ADD KEY `type_institution_fk` (`type_institution_fk`),
  ADD KEY `services_fk` (`services_fk`),
  ADD KEY `insurance_companies_fk` (`insurance_companies_fk`),
  ADD KEY `day_work_fk` (`day_work_fk`);

--
-- Индексы таблицы `med_time_work`
--
ALTER TABLE `med_time_work`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `med_type_institution`
--
ALTER TABLE `med_type_institution`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `med_type_locality`
--
ALTER TABLE `med_type_locality`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `med_type_ownership`
--
ALTER TABLE `med_type_ownership`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `med_type_works`
--
ALTER TABLE `med_type_works`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `med_users`
--
ALTER TABLE `med_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `med_users_ibfk_1` (`summary_table_fk`);

--
-- Индексы таблицы `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Индексы таблицы `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Индексы таблицы `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Индексы таблицы `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Индексы таблицы `wp_pollsa`
--
ALTER TABLE `wp_pollsa`
  ADD PRIMARY KEY (`polla_aid`);

--
-- Индексы таблицы `wp_pollsip`
--
ALTER TABLE `wp_pollsip`
  ADD PRIMARY KEY (`pollip_id`),
  ADD KEY `pollip_ip` (`pollip_ip`),
  ADD KEY `pollip_qid` (`pollip_qid`),
  ADD KEY `pollip_ip_qid_aid` (`pollip_ip`,`pollip_qid`,`pollip_aid`);

--
-- Индексы таблицы `wp_pollsq`
--
ALTER TABLE `wp_pollsq`
  ADD PRIMARY KEY (`pollq_id`);

--
-- Индексы таблицы `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Индексы таблицы `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Индексы таблицы `wp_ratings`
--
ALTER TABLE `wp_ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Индексы таблицы `wp_subscribe2`
--
ALTER TABLE `wp_subscribe2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Индексы таблицы `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Индексы таблицы `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Индексы таблицы `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Индексы таблицы `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Индексы таблицы `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `med_actual_location`
--
ALTER TABLE `med_actual_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT для таблицы `med_composite_locality_actual_location`
--
ALTER TABLE `med_composite_locality_actual_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT для таблицы `med_day_work`
--
ALTER TABLE `med_day_work`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `med_district_city`
--
ALTER TABLE `med_district_city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `med_district_region`
--
ALTER TABLE `med_district_region`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `med_home`
--
ALTER TABLE `med_home`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `med_insurance_companies`
--
ALTER TABLE `med_insurance_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `med_locality`
--
ALTER TABLE `med_locality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `med_organization`
--
ALTER TABLE `med_organization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT для таблицы `med_phone`
--
ALTER TABLE `med_phone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT для таблицы `med_region`
--
ALTER TABLE `med_region`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `med_services`
--
ALTER TABLE `med_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `med_summary_table`
--
ALTER TABLE `med_summary_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT для таблицы `med_time_work`
--
ALTER TABLE `med_time_work`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `med_type_institution`
--
ALTER TABLE `med_type_institution`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `med_type_locality`
--
ALTER TABLE `med_type_locality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `med_type_ownership`
--
ALTER TABLE `med_type_ownership`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `med_type_works`
--
ALTER TABLE `med_type_works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `med_users`
--
ALTER TABLE `med_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4376;
--
-- AUTO_INCREMENT для таблицы `wp_pollsa`
--
ALTER TABLE `wp_pollsa`
  MODIFY `polla_aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `wp_pollsip`
--
ALTER TABLE `wp_pollsip`
  MODIFY `pollip_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблицы `wp_pollsq`
--
ALTER TABLE `wp_pollsq`
  MODIFY `pollq_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1372;
--
-- AUTO_INCREMENT для таблицы `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT для таблицы `wp_ratings`
--
ALTER TABLE `wp_ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `wp_subscribe2`
--
ALTER TABLE `wp_subscribe2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT для таблицы `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `med_actual_location`
--
ALTER TABLE `med_actual_location`
  ADD CONSTRAINT `med_actual_location_ibfk_1` FOREIGN KEY (`locality_fk`) REFERENCES `med_locality` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_composite_locality_actual_location`
--
ALTER TABLE `med_composite_locality_actual_location`
  ADD CONSTRAINT `med_composite_locality_actual_location_ibfk_1` FOREIGN KEY (`locality_fk`) REFERENCES `med_locality` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_composite_locality_actual_location_ibfk_2` FOREIGN KEY (`actual_location_fk`) REFERENCES `med_actual_location` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_composite_locality_actual_location_ibfk_3` FOREIGN KEY (`district_city_fk`) REFERENCES `med_district_city` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_day_work`
--
ALTER TABLE `med_day_work`
  ADD CONSTRAINT `med_day_work_ibfk_1` FOREIGN KEY (`monday_fk`) REFERENCES `med_time_work` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_day_work_ibfk_2` FOREIGN KEY (`tuesday_fk`) REFERENCES `med_time_work` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_day_work_ibfk_3` FOREIGN KEY (`thursday_fk`) REFERENCES `med_time_work` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_day_work_ibfk_4` FOREIGN KEY (`wednesday_fk`) REFERENCES `med_time_work` (`id`),
  ADD CONSTRAINT `med_day_work_ibfk_5` FOREIGN KEY (`friday_fk`) REFERENCES `med_time_work` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_day_work_ibfk_6` FOREIGN KEY (`sunday_fk`) REFERENCES `med_time_work` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_day_work_ibfk_7` FOREIGN KEY (`saturday_fk`) REFERENCES `med_time_work` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_district_city`
--
ALTER TABLE `med_district_city`
  ADD CONSTRAINT `med_district_city_ibfk_1` FOREIGN KEY (`locality_fk`) REFERENCES `med_locality` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_district_region`
--
ALTER TABLE `med_district_region`
  ADD CONSTRAINT `med_district_region_ibfk_1` FOREIGN KEY (`region_fk`) REFERENCES `med_region` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_home`
--
ALTER TABLE `med_home`
  ADD CONSTRAINT `med_home_ibfk_1` FOREIGN KEY (`actual_location_fk`) REFERENCES `med_actual_location` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_locality`
--
ALTER TABLE `med_locality`
  ADD CONSTRAINT `med_locality_ibfk_1` FOREIGN KEY (`type_locality_fk`) REFERENCES `med_type_locality` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_locality_ibfk_2` FOREIGN KEY (`district_region_fk`) REFERENCES `med_district_region` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_organization`
--
ALTER TABLE `med_organization`
  ADD CONSTRAINT `med_organization_ibfk_1` FOREIGN KEY (`type_ownership_fk`) REFERENCES `med_type_ownership` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_phone`
--
ALTER TABLE `med_phone`
  ADD CONSTRAINT `med_phone_ibfk_1` FOREIGN KEY (`summary_table_fk`) REFERENCES `med_summary_table` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_summary_table`
--
ALTER TABLE `med_summary_table`
  ADD CONSTRAINT `med_summary_table_ibfk_1` FOREIGN KEY (`actual_location_fk`) REFERENCES `med_actual_location` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_summary_table_ibfk_10` FOREIGN KEY (`insurance_companies_fk`) REFERENCES `med_insurance_companies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_summary_table_ibfk_11` FOREIGN KEY (`day_work_fk`) REFERENCES `med_day_work` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_summary_table_ibfk_2` FOREIGN KEY (`organization_fk`) REFERENCES `med_organization` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_summary_table_ibfk_3` FOREIGN KEY (`type_works_fk`) REFERENCES `med_type_works` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_summary_table_ibfk_5` FOREIGN KEY (`type_institution_fk`) REFERENCES `med_type_institution` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `med_summary_table_ibfk_9` FOREIGN KEY (`services_fk`) REFERENCES `med_services` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `med_users`
--
ALTER TABLE `med_users`
  ADD CONSTRAINT `med_users_ibfk_1` FOREIGN KEY (`summary_table_fk`) REFERENCES `med_summary_table` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
