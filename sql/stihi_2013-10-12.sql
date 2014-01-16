# ************************************************************
# Sequel Pro SQL dump
# Версия 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Адрес: 127.0.0.1 (MySQL 5.6.13)
# Схема: stihi
# Время создания: 2013-10-12 18:31:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы photo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photo`;

CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `url_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_min` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;

INSERT INTO `photo` (`id`, `pid`, `url_full`, `url_min`, `main`)
VALUES
	(10,3,'2full.JPG','2min.JPG',0),
	(9,3,'1full.JPG','1min.JPG',0),
	(8,3,'0full.JPG','0min.JPG',0),
	(11,3,'3full.JPG','3min.JPG',0),
	(12,3,'4full.JPG','4min.JPG',0),
	(13,1,'0full.jpg','0min.jpg',0),
	(14,2,'0full.jpg','0min.jpg',0),
	(15,2,'1full.jpg','1min.jpg',1),
	(16,1,'1full.jpg','1min.jpg',1),
	(17,4,'0full.jpg','0min.jpg',1),
	(18,3,'5full.jpg','5min.jpg',0),
	(19,3,'6full.jpg','6min.jpg',1),
	(20,17,'0full.jpg','0min.jpg',1),
	(21,5,'0full.jpg','0min.jpg',1);

/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы poet
# ------------------------------------------------------------

DROP TABLE IF EXISTS `poet`;

CREATE TABLE `poet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `short_text` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `poet` WRITE;
/*!40000 ALTER TABLE `poet` DISABLE KEYS */;

INSERT INTO `poet` (`id`, `photo_id`, `name`, `views`, `start_date`, `end_date`, `short_text`, `text`, `time`, `enabled`)
VALUES
	(1,'16','Александр Блок',12,'1880-10-16','1921-08-07','БЛОК Александр Александрович (1880–1921) — поэт, один из самых выдающихся представителей русского символизма.','БЛОК Александр Александрович (1880–1921) — поэт, один из самых выдающихся представителей русского символизма. По отцу, профессору-юристу, потомок обрусевшего выходца из Германии, придворного врача (въехал в Россию в середине XVIII в.). По матери — из русской дворянской семьи Бекетовых. Потомки врача Блока принадлежали к состоятельному, но со временем оскудевшему служилому дворянству. Прадед по матери был «большим барином и очень богатым помещиком», к старости потерявшим почти все свое состояние. Со стороны обоих родителей Блок унаследовал интеллектуальную одаренность, склонность к занятиям литературой, искусством, наукой, но наряду с этим и несомненную психическую отягощенность: дед по отцу умер в психиатрической больнице; характер отца отличался странностями, стоявшими на грани душевного заболевания, а иногда и переступавшими за нее. Это вынудило мать поэта вскоре после его рождения покинуть мужа; последняя сама неоднократно лечилась в лечебнице для душевнобольных; наконец и у самого Блока к концу жизни развилось особое тяжелое нервно-психическое состояние — психостения; за месяц до смерти его рассудок начал омрачаться. Раннее детство Блока прошло в семье деда по матери, известного ботаника, общественного деятеля и поборника женского образования, ректора Петербургского университета А. Н. Бекетова. Зиму маленький Б. проводил в «ректорском доме», в Петербурге, лето — «в старом парке дедов», «в благоуханной глуши маленькой усадьбы» — подмосковном имении деда, сельце Шахматове. После вторичного выхода матери замуж за офицера, Ф. Ф. Кублицкого-Пиоттух, девятилетний Блок вместе с матерью переехал на квартиру отчима, в казармы, расположенные в фабричном районе. По окончании гимназии, отталкивавшей Блока от себя, по его собственным словам, своим «страшным плебейством», не соответствующим его «мыслям, манерам и чувствам», Блок поступил на юридический факультет Петербургского университета; с третьего курса перешел на историко-филологический факультет, который окончил в 1906.','2013-07-21 21:22:44',1),
	(2,'15','Пушкин Александр',19,'1880-10-16','1921-08-07','Пушкин Александр','Пушкин Александр\r\nПушкин Александр\r\nПушкин Александр','2013-08-27 21:34:51',1),
	(3,'19','Марина Цветаева',1,'2013-04-01','2013-04-30','Марина Цветаева','Марина Цветаева','2013-07-20 18:33:42',1),
	(4,'17','Роберт Рождественский',13,'2013-06-01','2013-06-29','Велики поет','Велики поет','2013-09-22 15:24:12',1),
	(5,'21','Сергей Есенин',0,'2013-06-01','2013-06-29','Сергей Есенин','Сергей Есенин','2013-06-12 10:57:00',1),
	(7,'0','Эдуард Асадов',0,'2013-06-01','2013-06-20','Эдуард Асадов','Эдуард Асадов','2013-06-12 10:57:41',1),
	(17,'20','Владимир Маяковский',2,'1893-07-19','1930-04-14','<p>Владимир Маяковский<br></p>','<p>Владимир Маяковский<br></p>','2013-07-20 23:09:40',1);

/*!40000 ALTER TABLE `poet` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы stih_tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stih_tags`;

CREATE TABLE `stih_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `stih_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `stih_tags` WRITE;
/*!40000 ALTER TABLE `stih_tags` DISABLE KEYS */;

INSERT INTO `stih_tags` (`id`, `tag_id`, `stih_id`)
VALUES
	(30,1,7);

/*!40000 ALTER TABLE `stih_tags` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы stihi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stihi`;

CREATE TABLE `stihi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poet_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` bigint(20) NOT NULL,
  `views` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `stihi` WRITE;
/*!40000 ALTER TABLE `stihi` DISABLE KEYS */;

INSERT INTO `stihi` (`id`, `poet_id`, `name`, `date`, `text`, `tags`, `views`, `time`)
VALUES
	(7,2,'Я помню чудное мгновенье','0000-00-00','Я помню чудное мгновенье:<br>\r\n    Передо мной явилась ты,<br>\r\n    Как мимолетное виденье,<br>\r\n    Как гений чистой красоты.<br>\r\n    <br>\r\n    В томленьях грусти безнадежной<br>\r\n    В тревогах шумной суеты,<br>\r\n    Звучал мне долго голос нежный<br>\r\n    И снились милые черты.<br>\r\n    <br>\r\n    Шли годы. Бурь порыв мятежный<br>\r\n    Рассеял прежние мечты,<br>\r\n    И я забыл твой голос нежный,<br>\r\n    Твой небесные черты.<br>\r\n    <br>\r\n    В глуши, во мраке заточенья<br>\r\n    Тянулись тихо дни мои<br>\r\n    Без божества, без вдохновенья,<br>\r\n    Без слез, без жизни, без любви.<br>\r\n    <br>\r\n    Душе настало пробужденье:<br>\r\n    И вот опять явилась ты,<br>\r\n    Как мимолетное виденье,<br>\r\n    Как гений чистой красоты.<br>\r\n    <br>\r\n    И сердце бьется в упоенье,<br>\r\n    И для него воскресли вновь<br>\r\n    И божество, и вдохновенье,<br>\r\n    И жизнь, и слезы, и любовь.',0,0,'2013-06-17 11:59:54'),
	(6,2,'Рассвет','0000-00-00','Я встал и трижды поднял руки.\r\nКо мне по воздуху неслись\r\nЗари торжественные звуки,\r\nБагрянцем одевая высь.\r\n\r\nКазалось, женщина вставала,\r\nМолилась, отходя во храм,\r\nИ розовой рукой бросала\r\nЗерно послушным голубям.\r\n\r\nОни белели где-то выше,\r\nБелея, вытянулись в нить\r\nИ скоро пасмурные крыши\r\nКрылами стали золотить.\r\n\r\nНад позолотой их заемной,\r\nВысоко стоя на окне,\r\nЯ вдруг увидел шар огромный,\r\nПлывущий в красной тишине.',0,0,'2013-06-16 19:42:27');

/*!40000 ALTER TABLE `stihi` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `title`, `type`)
VALUES
	(1,'О любви',1),
	(2,'О родине',1),
	(3,'Гражданская лирика',1),
	(4,'Пейзажная лирика',1),
	(5,'Природа',1),
	(6,'19 век',2),
	(7,'20 век',2),
	(8,'шестидесятники',2);

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы tbl_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
