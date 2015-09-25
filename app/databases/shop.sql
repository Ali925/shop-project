/*
Navicat MySQL Data Transfer

Source Server         : MyDB
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-09-21 21:34:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Компьютеры');
INSERT INTO `categories` VALUES ('2', 'Ноутбуки');
INSERT INTO `categories` VALUES ('3', 'Смартфоны');
INSERT INTO `categories` VALUES ('4', 'Планшетные компьютеры');
INSERT INTO `categories` VALUES ('5', 'Электронные книги');
INSERT INTO `categories` VALUES ('6', 'Планшеты');
INSERT INTO `categories` VALUES ('7', 'Цифровые плееры');
INSERT INTO `categories` VALUES ('8', 'Игровые приставки');
INSERT INTO `categories` VALUES ('9', 'Проводные гарнитуры');
INSERT INTO `categories` VALUES ('10', 'Электронные часы');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `User orders` (`id_user`),
  CONSTRAINT `User orders` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '2', 'Завершён', '2015-01-20 22:26:19');
INSERT INTO `orders` VALUES ('2', '5', 'Завершён', '2015-02-28 11:12:48');
INSERT INTO `orders` VALUES ('3', '5', 'Завершён', '2015-03-02 18:09:21');
INSERT INTO `orders` VALUES ('4', '8', 'Завершён', '2015-03-20 20:19:22');
INSERT INTO `orders` VALUES ('5', '9', 'Завершён', '2015-03-26 13:08:51');
INSERT INTO `orders` VALUES ('6', '11', 'Завершён', '2015-05-03 18:49:23');
INSERT INTO `orders` VALUES ('7', '8', 'Завершён', '2015-05-03 20:15:25');
INSERT INTO `orders` VALUES ('8', '12', 'Завершён', '2015-05-22 12:24:52');
INSERT INTO `orders` VALUES ('9', '13', 'Завершён', '2015-05-23 14:09:25');
INSERT INTO `orders` VALUES ('10', '13', 'Завершён', '2015-05-25 15:22:27');
INSERT INTO `orders` VALUES ('11', '13', 'Завершён', '2015-05-24 15:30:54');
INSERT INTO `orders` VALUES ('12', '14', 'Завершён', '2015-05-28 11:12:55');
INSERT INTO `orders` VALUES ('13', '16', 'Завершён', '2015-05-30 13:09:28');
INSERT INTO `orders` VALUES ('14', '17', 'Завершён', '2015-05-30 05:25:28');
INSERT INTO `orders` VALUES ('15', '18', 'Завершён', '2015-06-03 21:12:39');
INSERT INTO `orders` VALUES ('16', '18', 'Отменён', '2015-06-03 23:28:40');
INSERT INTO `orders` VALUES ('17', '19', 'Завершён', '2015-06-15 12:57:56');
INSERT INTO `orders` VALUES ('18', '18', 'Завершён', '2015-06-18 13:45:58');
INSERT INTO `orders` VALUES ('19', '20', 'Отменён', '2015-06-28 23:09:41');
INSERT INTO `orders` VALUES ('20', '21', 'Завершён', '2015-07-04 15:58:59');
INSERT INTO `orders` VALUES ('21', '24', 'Завершён', '2015-07-20 17:43:00');
INSERT INTO `orders` VALUES ('22', '26', 'Завершён', '2015-08-05 22:09:01');
INSERT INTO `orders` VALUES ('23', '2', 'Завершён', '2015-08-08 23:10:00');
INSERT INTO `orders` VALUES ('24', '8', 'Отменён', '2015-08-12 15:09:02');
INSERT INTO `orders` VALUES ('25', '20', 'Завершён', '2015-08-11 11:09:04');
INSERT INTO `orders` VALUES ('26', '28', 'Завершён', '2015-08-14 20:19:01');
INSERT INTO `orders` VALUES ('27', '16', 'Завершён', '2015-08-15 18:10:02');
INSERT INTO `orders` VALUES ('28', '14', 'В обработке', '2015-08-25 19:45:05');
INSERT INTO `orders` VALUES ('29', '5', 'В обработке', '2015-08-25 23:15:33');
INSERT INTO `orders` VALUES ('30', '30', 'В обработке', '2015-08-26 13:09:06');

-- ----------------------------
-- Table structure for order_property
-- ----------------------------
DROP TABLE IF EXISTS `order_property`;
CREATE TABLE `order_property` (
  `id_order` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `price` float NOT NULL,
  `count` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id_order`),
  KEY `Products` (`id_product`),
  CONSTRAINT `Order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_property
-- ----------------------------
INSERT INTO `order_property` VALUES ('1', '5', '880.99', '1');
INSERT INTO `order_property` VALUES ('2', '55', '4050.99', '1');
INSERT INTO `order_property` VALUES ('3', '42', '549.99', '1');
INSERT INTO `order_property` VALUES ('4', '32', '451', '1');
INSERT INTO `order_property` VALUES ('5', '15', '659.99', '1');
INSERT INTO `order_property` VALUES ('6', '24', '1859.99', '1');
INSERT INTO `order_property` VALUES ('7', '36', '109.99', '2');
INSERT INTO `order_property` VALUES ('8', '68', '45.99', '1');
INSERT INTO `order_property` VALUES ('9', '75', '473.99', '1');
INSERT INTO `order_property` VALUES ('10', '13', '509.99', '1');
INSERT INTO `order_property` VALUES ('11', '8', '2430.99', '1');
INSERT INTO `order_property` VALUES ('12', '4', '1350.99', '1');
INSERT INTO `order_property` VALUES ('13', '28', '319', '1');
INSERT INTO `order_property` VALUES ('14', '78', '248.99', '1');
INSERT INTO `order_property` VALUES ('15', '43', '675.99', '1');
INSERT INTO `order_property` VALUES ('16', '27', '249', '2');
INSERT INTO `order_property` VALUES ('17', '15', '659.99', '1');
INSERT INTO `order_property` VALUES ('18', '9', '2565.99', '1');
INSERT INTO `order_property` VALUES ('19', '1', '540.99', '1');
INSERT INTO `order_property` VALUES ('20', '56', '216.99', '2');
INSERT INTO `order_property` VALUES ('21', '48', '216.99', '1');
INSERT INTO `order_property` VALUES ('22', '71', '122.99', '1');
INSERT INTO `order_property` VALUES ('23', '35', '899', '1');
INSERT INTO `order_property` VALUES ('24', '25', '2025.99', '1');
INSERT INTO `order_property` VALUES ('25', '24', '1859.99', '1');
INSERT INTO `order_property` VALUES ('26', '18', '945.99', '1');
INSERT INTO `order_property` VALUES ('27', '66', '15.99', '4');
INSERT INTO `order_property` VALUES ('28', '42', '549.99', '1');
INSERT INTO `order_property` VALUES ('29', '14', '608.99', '1');
INSERT INTO `order_property` VALUES ('30', '33', '762', '1');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mark` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_catalog` mediumint(8) unsigned NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Catalogs` (`id_catalog`),
  CONSTRAINT `Catalogs` FOREIGN KEY (`id_catalog`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Компьютер HP HP Pro 3500 Microtower', 'HP', '10', '540.99', 'Intel® Core™ i3-2120 (3,30 ГГц, 2 ядра), 2 ГБ DDR3 SDRAM, 500 ГБ (SATA, 7200 об/мин), DVD SATA SuperMulti writer, Intel HD Graphics, Realtek RTL8171E Gigabit Ethernet, 10 портов USB 2.0', '1', '../../img/content/items/1.jpg');
INSERT INTO `products` VALUES ('2', 'Компьютер HP 500B', 'HP', '12', '675.99', 'HP S2031A (20-дюймов, 1600 x 900), Intel® Pentium® E5800 3,20 ГГц, 4 ГБ DDR3 SDRAM, 500 ГБ (SATA, 7200 об/мин), DVD-привод SATA SuperMulti LightScribe, Intel Graphics Media Accelerator 4500MHD, Realtek RTL8103EL 10/100 Ethernet, 6 портов USB 2.0, устройство чтения карт памяти 22 в 1', '1', '../../img/content/items/2.jpg');
INSERT INTO `products` VALUES ('3', 'Компьютер HP P3130M', 'HP', '5', '810.99', 'HP S2031A (20-дюймов, 1600 x 900), Intel Core i3-550 3.2 ГГц, 4 ГБ DDR3 SDRAM, 320 ГБ (SATA, 7200 об/мин), DVD-привод SATA SuperMulti LightScribe, Intel Graphics Media Accelerator 4500MHD, Realtek 8111DL Gigabit Ethernet, 8 портов USB 2.0, устройство чтения карт памяти 22 в 1', '1', '../../img/content/items/3.jpg');
INSERT INTO `products` VALUES ('4', 'Компьютер Sony VAIO Tap 20', 'Sony', '7', '1350.99', 'ПК-моноблок, 20 дюймов, 1600 x 900 пкс, Intel® Core™ i5-3337U (1.8-2.7 ГГц с Turbo Boost, 2 ядра) , 4 ГБ DDR3 SDRAM, 750 Гб (SATA, 5400 об/мин), Intel HD 4000, 1.3 МПкс Exmor® HD, 10/100/1000, 2 порта USB 3.0, SD, SD HC, MMC, MS, MS Pro', '1', '../../img/content/items/4.jpg');
INSERT INTO `products` VALUES ('5', 'Компьютер ASUS ET2323I', 'ASUS', '3', '880.99', 'Процессор Intel Core i7-5500U (Broadwell), производительная видеокарта NVIDIA GeForce 840M и приличное количество оперативной памяти - 16 Гбайт.', '1', '../../img/content/items/5.jpg');
INSERT INTO `products` VALUES ('6', 'Компьютер HP P3130M', 'HP', '0', '1485.99', 'Intel Core i7 2.93 ГГц, 6 Гб DDR3, 750 ГБ (SATA, 7200 об/мин), DVD-привод SATA SuperMulti LightScribe, Nvidia GeForce GT 420, 2 Гб, Gigabit Ethernet, 8 портов USB 2.0', '1', '../../img/content/items/6.jpg');
INSERT INTO `products` VALUES ('7', 'Компьютер Apple iMac ME086', 'Apple', '4', '1836.99', 'ПК-моноблок, 21,5-дюйма, 1920x1080 пкс, Intel Core i5 2.7 ГГц, 8 ГБ DDR3 SDRAM (2 модуля SO-DIMM по 4 ГБ), 1Тб (SATA, 5400 об/мин), Intel Iris Pro Graphics, Камера FaceTime HD, 10/100/1000BASE-T (Gigabit), 4 порта USB 3.0, Разъём для карт SDXC', '1', '../../img/content/items/7.jpg');
INSERT INTO `products` VALUES ('8', 'Компьютер Apple iMac MD095', 'Apple', '2', '2430.99', 'ПК-моноблок, 27-дюймов, 2560x1440 пкс, Intel® Core™ i5 2.9ГГц (3.60 ГГц с Turbo Boost) , 8 ГБ DDR3 SDRAM (2 модуля SO-DIMM по 4 ГБ), 1Тб (SATA, 7200 об/мин), NVIDIA GeForce GT 660M, 512Mb памяти GDDR5, Камера FaceTime HD, 10/100/1000BASE-T (Gigabit), 4 порта USB 3.0, Разъём для карт SDXC', '1', '../../img/content/items/8.jpg');
INSERT INTO `products` VALUES ('9', 'Компьютер Apple iMac ME088', 'Apple', '3', '2565.99', 'ПК-моноблок, 27-дюймов, 2560x1440 пкс, Intel® Core™ i5 3.2ГГц (3.60 ГГц с Turbo Boost) , 8 ГБ DDR3 SDRAM (2 модуля SO-DIMM по 4 ГБ), 1Тб (SATA, 7200 об/мин), NVIDIA GeForce GT 775MX, 1Gb памяти GDDR5, Камера FaceTime HD, 10/100/1000BASE-T (Gigabit), 4 порта USB 3.0, Разъём для карт SDXC', '1', '../../img/content/items/9.jpg');
INSERT INTO `products` VALUES ('10', 'Компьютер Apple iMac ME089', 'Apple', '1', '2795.99', 'ПК-моноблок, 27-дюймов, 2560x1440 пкс, Intel® Core™ i5 3.4ГГц (3.8 ГГц с Turbo Boost) , 8 ГБ DDR3 SDRAM (2 модуля SO-DIMM по 4 ГБ), 1Тб (SATA, 7200 об/мин), NVIDIA GeForce GT 775MX, 2Gb памяти GDDR5, Камера FaceTime HD, 10/100/1000BASE-T (Gigabit), 4 порта USB 3.0, Разъём для карт SDXC', '1', '../../img/content/items/10.jpg');
INSERT INTO `products` VALUES ('11', 'Notebook Dell Inspiron 3531', 'Dell', '20', '299.99', '15.6 дюймов, 1366 x 768, Intel® Celeron®, N2830, 2.16 Ггц, 4Gb, 500Gb, Интегрированная Intel, HD Graphics, Вебкамера 0.3 Мпкс, 10/100 Mbit, WiFi (802.11b/g/n), Bluetooth 4.0, SD, SDHC, SDXC, 2xUSB 2.0, 1xHDMI, Windows 8.1 (64-bit), 38.1 x 25.9 x 2.54 см, 2.6 кг', '2', '../../img/content/items/11.jpg');
INSERT INTO `products` VALUES ('12', 'Notebook ASUS X200M', 'ASUS', '15', '389.99', '11.6 дюймов сенсорный MultiTouch, 1366 x 768, Intel® Bay Trail-M, N2830, 2.16 Ггц, 4Gb, 500Gb, Интегрированная Intel, HD Graphics, Вебкамера 720p HD, WiFi (802.11b/g/n), SD, MMC, 2xUSB 2.0, 1xUSB 3.0, 1xHDMI, 1xVGA(D-SUB), Windows 8.1 (64-bit), 1.4 кг', '2', '../../img/content/items/12.jpg');
INSERT INTO `products` VALUES ('13', 'Notebook Lenovo G580', 'Lenovo', '18', '509.99', '15.6 дюймов, 1366 x 768, Intel® Pentium® dual-core, B960, 2.2 Ггц, 4Gb, 500Gb, DVD Super Multi Drive (Double Layer), Внешняя nVidia, GeForce® GT 710M, 1Gb, Вебкамера 0.3 Мпкс, 10/100 Mbit, WiFi (802.11b/g/n), Bluetooth 2.1 , SD, SDHC, SDHD, MMC, MS Pro, MS, XD, 2xUSB 3.0, 1xUSB 2.0, 1xHDMI, 1xVGA(D-SUB), FreeDOS, 2.6 кг\n', '2', '../../img/content/items/13.jpg');
INSERT INTO `products` VALUES ('14', 'Notebook Acer Aspire E1-570G', 'Acer', '23', '608.99', '15.6 дюймов, 1366 x 768, Intel® Core™ i3, 3217U, 1.8 Ггц, 4Gb, 500Gb, DVDRW SuperMulti c Labelflash, Внешняя nVidia, GeForce® GT 720M, 1Gb, Вебкамера 720p HD, 10/100/1000 Mbit, WiFi (802.11b/g/n), Bluetooth 4.0, SD, MMC, MS Pro, MS, 3xUSB 2.0, 1xHDMI, 1xe-SATA, 1xVGA(D-SUB), FreeDOS, 38.2 x 25.3 x 2.3 см, 2.3 кг\n', '2', '../../img/content/items/14.jpg');
INSERT INTO `products` VALUES ('15', 'Notebook Samsung NP300E5X', 'Samsung', '11', '659.99', '15.6 дюймов, 1366 x 768, Intel® Core™ i3, 3110M, 2.4 Ггц, 4Gb, 500Gb, Интегрированная Intel, HD Graphics 4000, до 1696Мб, Вебкамера 1.3 Мпкс, 10/100 Mbit, WiFi (802.11a/b/g), Bluetooth 2.1 , SD, SDHC, SDXC, 3xUSB 2.0, 1 x micro HDMI, 1xVGA(D-SUB), FreeDOS, 381 x 255 x 37 мм, 2.5 кг\n', '2', '../../img/content/items/15.jpg');
INSERT INTO `products` VALUES ('16', 'Notebook HP ProBook 4540s ', 'HP', '17', '756.99', '15.6 дюймов, 1366 x 768, Intel® Core™ i3, 3110M, 2.4 Ггц, 4Gb, 320Gb, DVDRW SuperMulti c Labelflash, Интегрированная Intel, HD Graphics 4000, до 1696Мб, Вебкамера 720p HD, 10/100/1000 Mbit, WiFi (802.11b/g/n), SD, MMC, MS Pro, MS, 2xUSB 2.0, 2xUSB 3.0, 1xHDMI, 1xe-SATA, 1xVGA(D-SUB), Windows 8 (64-bit), 37.5 x 25.6 x 2.8 см, 2.35 кг', '2', '../../img/content/items/16.jpg');
INSERT INTO `products` VALUES ('17', 'Notebook Toshiba Satellite U845W', 'Toshiba', '6', '849.99', '14.4 дюймов, 1792 x 768, Intel® Core™ i7, 3517U, 1.9 Ггц ( 3.0 Ггц Turbo Boost), 6Gb, 256Гб SSD, Интегрированная Intel, HD Graphics 4000, до 1696Мб, Вебкамера 0.3 Мпкс, 10/100 Mbit, WiFi (802.11a/b/g/n), Bluetooth 4.0, 3xUSB 3.0, 1xHDMI, Windows 7 Home Premium (64 bit), 34.2 x 23.4 x 2.3 см , 2.39 кг\n', '2', '../../img/content/items/17.jpg');
INSERT INTO `products` VALUES ('18', 'Notebook Sony VAIO VPC-EA36FX/L', 'Sony', '14', '945.99', '14 дюймов, 1366 x 768, Intel® Core™ i3, 370M, 2.4 Ггц, 4Gb, 500Gb, Blu-ray DVD+/-RW, Интегрированная Intel, HD Graphics, Вебкамера 0.3 Мпкс, 10/100/1000 Mbit, WiFi (802.11a/b/g/n), Bluetooth 2.1 + EDR, SD, MMC, MS Pro, MS, 3xUSB 2.0, 1xHDMI, 1xe-SATA, 1xVGA(D-SUB), Windows 7 Home Premium (64 bit)', '2', '../../img/content/items/18.jpg');
INSERT INTO `products` VALUES ('19', 'Notebook Dell 15Z-4801SLV', 'Dell', '0', '1029.99', '15.6 дюймов, 1366 x 768, Intel® Core™ i7, 3537U, 2 Ггц ( 3.1 Ггц Turbo Boost), 8Gb, 500Gb, 32Гб SSD, DVD+-RW/+-R DL/RAM, Интегрированная Intel, HD Graphics 4000, до 1696Мб, Вебкамера 1 Мпкс (HD), 10/100/1000 Mbit, WiFi (802.11b/g/n), Bluetooth 4.0, SD, SDHC, SDXC, 4xUSB 3.0, 1xHDMI, Windows 8 (64-bit), 2.18 кг', '2', '../../img/content/items/19.jpg');
INSERT INTO `products` VALUES ('20', 'Notebook Toshiba Satellite L50-A666', 'Toshiba', '10', '1148.99', '15.6 дюймов, 1366 x 768, Intel® Core™ i7, 4700MQ, 2.4 ГГц ( 3.4 Ггц Turbo Boost), 8Gb, 1000Gb, DVD+-RW/+-R DL/RAM, Внешняя nVidia, GeForce® GT 740M, 2Gb, Вебкамера 0.9 Мпкс, 10/100 Mbit, WiFi (802.11b/g/n), Bluetooth 4.0, SD, miniSD, microSD, SDHC, SDXC, MMC, 2xUSB 3.0, 1xUSB 2.0, 1xHDMI, 1xe-SATA, 1xVGA(D-SUB), FreeDOS, 38 x 3.3 x 24 см, 2.3 кг', '2', '../../img/content/items/20.jpg');
INSERT INTO `products` VALUES ('21', 'Notebook Sony SVF15A16CXB', 'Sony', '3', '1283.99', '15.5 дюймов сенсорный MultiTouch, 1920 x 1080, Intel® Core™ i7, 3537U, 2 Ггц ( 3.1 Ггц Turbo Boost), 8Gb, 1000Gb, 8Гб SSD, DVD+-RW/+-R DL/RAM, Интегрированная Intel, HD Graphics 4000, до 1696Мб, Вебкамера 1.3 Мпкс, 10/100/1000 Mbit, WiFi (802.11a/b/g/n), Bluetooth 4.0, SD, miniSD, microSD, SDHC, SDXC, MMC, 3xUSB 2.0, 1xUSB 3.0, 1xHDMI, 1xe-SATA, 1xVGA(D-SUB), Windows 8 (64-bit), 34.1 x 24.5 x 2.24 см, 2.3 кг', '2', '../../img/content/items/21.jpg');
INSERT INTO `products` VALUES ('22', 'Notebook Apple MacBook Pro (MD101LL/A)', 'Apple', '7', '1403.99', '13.3 дюйма, 1280 x 800, Intel® Core™ i5, 2.5 ГГц ( 3.1 Ггц Turbo Boost), 4Gb, 500Gb, Superdrive (8x, (DVD±R DL/DVD±RW/ CD-RW)), Интегрированная Intel, HD Graphics 4000, 384 МБ , Вебкамера FaceTime (1.3 Мпкс), 10/100/1000 Mbit, WiFi (802.11a/b/g), Bluetooth 4.0, SD, SDHC, SDXC, 2xUSB 3.0, 1xIEE1394 (FireWire), 1 x Thunderbolt, OS X Lion, 32.5 x 2.41 x 22.7 см, 2.04 кг', '2', '../../img/content/items/22.jpg');
INSERT INTO `products` VALUES ('23', 'Notebook ASUS G750JS-RS71', 'ASUS', '5', '1539.99', '17.3 дюймов, 1920 x 1080, Intel® Core™ i7, 4700HQ, 2.4 ГГц ( 3.4 Ггц Turbo Boost), 12Gb, 750Gb, DVDRW SuperMulti c Labelflash, Внешняя nVidia, GeForce® GTX 870M, 3Гб GDDR5, Вебкамера 1.3 Мпкс, 10/100/1000 Mbit, WiFi (802.11b/g/n), Bluetooth 4.0, SD, MMC, 4xUSB 3.0, 1xHDMI, 1xMini DisplayPort, 1xVGA(D-SUB), 1 x Thunderbolt, Windows 8.1 (64-bit), 41 x 31.8 x 1.7 см, 4.4 кг', '2', '../../img/content/items/23.jpg');
INSERT INTO `products` VALUES ('24', 'Notebook Toshiba Qosmio (X75-A7180)', 'Toshiba', '12', '1859.99', '17.3 дюймов, 1920 x 1080, Intel® Core™ i7, 4700MQ, 2.4 ГГц ( 3.4 Ггц Turbo Boost), 16Gb, 1000Gb (2x500Gb), Blu-ray DVD+/-RW, Интегрированная nVidia, GeForce® GTX 770M, 3Гб GDDR5, Вебкамера 1080p HD (30 fps), 10/100/1000 Mbit, WiFi (802.11a/b/g/n/ac), Bluetooth 4.0, Intel WiDi, SD, SDHC, SDXC, 4xUSB 3.0, 1xHDMI, 1xVGA(D-SUB), Windows 8.1 (64-bit), 41.91 x 27.18 x 4.3 см, 3.4 кг', '2', '../../img/content/items/24.jpg');
INSERT INTO `products` VALUES ('25', 'Notebook Apple MacBook Pro 13\" Retina ME865', 'Apple', '8', '2025.99', '13.3 дюйма, 2560 x 1600, Intel® Core™ i5, 2.4 Ггц ( 2.9 Ггц Turbo Boost), 8Gb, 256Гб SSD , Интегрированная Intel, Intel Iris Pro Graphics, Вебкамера 1 Мпкс (HD), 10/100/1000 Mbit, WiFi (802.11a/b/g/n), Bluetooth 4.0, SD, MMC, 2xUSB 3.0, 1xHDMI, 2 x Thunderbolt, OS X Mavericks, 31.4 x 21.9 x 1.9 см, 1.61 кг', '2', '../../img/content/items/25.jpg');
INSERT INTO `products` VALUES ('26', 'Смартфон Nokia XL Dual', 'Nokia', '0', '212', 'Android 4.1 (Jelly Bean), Nokia X platform 1.0 UI, Черный, Qualcomm MSM8225 Snapdragon S4 Play Cortex-A5, 1 ГГц, 4 Гб, 5-дюймовый, MultiTouch сенсорный экран, IPS LCD, 480 x 800 пкс, microUSB, WiFi (802.11b/g/n), Bluetooth 3.0, A2DP, A-GPS, GLONASS , Камера 5 Мпкс, 800 × 480 пкс, FM радио, microSD (до 32 Гб), Li-ION аккумулятор (2000 мАч), 141.4 x 77.7 x 10.9 мм, 190 г.', '3', '../../img/content/items/26.jpg');
INSERT INTO `products` VALUES ('27', 'Смартфон Samsung Galaxy Grand Prime Duos', 'Samsung', '12', '249', 'Android 4.4 (KitKat), TouchWiz UI, Белый, Qualcomm Snapdragon 410, 1.2 ГГц, 8 Гб, 5-дюймовый, MultiTouch сенсорный экран, TFT , 540 X 960 пкс, microUSB, WiFi (802.11b/g/n), Bluetooth 4.0, A2DP, A-GPS, GLONASS , Камера 8 Мпкс, HD видео (1080p), FM радио, microSD (до 64 Гб), Li-Po аккумулятор (2600 мАч) , 144.8 x 72.1 x 8.6 мм, 156 г.', '3', '../../img/content/items/27.jpg');
INSERT INTO `products` VALUES ('28', 'Смартфон Sony Xperia M2', 'Sony', '15', '319', 'Android 4.3 (Jelly Bean), Sony Timescape UI, Черный, Qualcomm MSM8226 Snapdragon 400, 1.2 ГГц, 8 Гб, 4.8-дюймовый, MultiTouch сенсорный экран, TFT , 540 X 960 пкс, microUSB, Wi-Fi (802.11a/b/g/n), Bluetooth 4.0, A2DP, A-GPS, GLONASS , Камера 8 Мпкс, HD видео (1080p), FM радио (поддержка RDS), DLNA, microSD (до 32 Гб), Li-ION аккумулятор (2300 мАч), 139.7 x 71.1 x 8.6 мм, 148 г', '3', '../../img/content/items/28.jpg');
INSERT INTO `products` VALUES ('29', 'Смартфон HTC 8X Windows Phone', 'HTC', '24', '357', 'Windows Phone 8, HTC Sense, Черный, Qualcomm MSM8960 Snapdragon, 1.5 ГГц, 16 Гб, 4.3-дюймовый, MultiTouch сенсорный экран, Super LCD2, 720 x 1280 пкс, microUSB, Wi-Fi (802.11a/b/g/n), Bluetooth 2.1 + EDR, A2DP, A-GPS, GLONASS , Камера 8 Мпкс, HD видео (1080p), Li-ION аккумулятор (1800 мАч), 66.2 x 132.35 x 10.12 мм, 130 г.', '3', '../../img/content/items/29.jpg');
INSERT INTO `products` VALUES ('30', 'Смартфон Samsung Galaxy S4', 'Samsung', '19', '399', 'Android 4.2 (Jelly Bean), TouchWiz UI, Черный, Qualcomm APQ8064T Snapdragon 600, 1.9 ГГц, 16 Гб, 5-дюймовый, MultiTouch сенсорный экран, Super AMOLED, 1920 x 1080 пкс, microUSB, Wi-Fi (802.11 a/b/g/n/ac), Bluetooth 4.0, A2DP, A-GPS, GLONASS , Камера 13 Мпкс, HD видео (1080p), DLNA, HDMI (MHL), microSD (до 64 Гб), Li-ION аккумулятор (2600 мАч), 136.6 x 69.8 x 7.9 мм, 130 г.', '3', '../../img/content/items/30.jpg');
INSERT INTO `products` VALUES ('31', 'Смартфон LG Optimus G2 D802', 'LG', '7', '446', 'Android 4.2 (Jelly Bean), Черный, Qualcomm MSM8974 Snapdragon 800, 2.2 ГГц, 32 Гб, 5.2-дюймовый, MultiTouch сенсорный экран, FULL HD IPS, 1920 x 1080 пкс, microUSB, Wi-Fi (802.11 a/b/g/n/ac), Bluetooth 4.0, A2DP, A-GPS, GLONASS , Камера 13 Мпкс, HD видео (1080p), FM радио (поддержка RDS), DLNA, Li-ION аккумулятор (3000 мАч), 138.5 x 70.9 x 8.9 мм, 143 г.', '3', '../../img/content/items/31.jpg');
INSERT INTO `products` VALUES ('32', 'Смартфон BlackBerry Bold 9900', 'BlackBerry', '10', '451', 'BlackBerry OS 7, Белый, 1.2 ГГц, 8 Гб, 2.8-дюймовый, MultiTouch сенсорный экран, TFT , 480 x 640 пкс, microUSB, Встроенная QWERTY-клавиатура, Wi-Fi (802.11a/b/g/n), Bluetooth 2.1 + EDR, A2DP, GPS + A-GPS , Камера 5 Мпкс, HD видео (720p), microSD HC, microSD , Li-ION аккумулятор (1230 мАч), 66 x 115 x 10.5 мм, 133 г', '3', '../../img/content/items/32.jpg');
INSERT INTO `products` VALUES ('33', 'Смартфон HTC One Dual SIM', 'HTC', '5', '762', 'Android 4.1 (Jelly Bean), HTC Sense UI v5, Черный, Qualcomm APQ8064T Snapdragon 600, 1.7 ГГц, 32 Гб, 4.7-дюймовый, MultiTouch сенсорный экран, Super LCD3, 1920 x 1080 пкс, microUSB, microHDMI, Wi-Fi (802.11 a/ac/b/g/n), Bluetooth 4.0, A2DP, A-GPS, GLONASS , Камера 4 Мпкс ( 2.0 микрометра, размер сенсора 1/3\'), HD видео (1080p), FM радио (поддержка RDS), DLNA, HDMI (MHL), microSD (до 64 Гб), Li-Po аккумулятор (2300 мАч) , 137.4 x 68.2 x 9.3 мм, 156 г.', '3', '../../img/content/items/33.jpg');
INSERT INTO `products` VALUES ('34', 'Смартфон Samsung Galaxy S6 SM-G920', 'Samsung', '18', '799', 'Android 5.0 (Lolipop), TouchWiz UI, Черный, Quad-core Cortex-A53 & Quad-core GHz Cortex-A57, 1.5 и 2.1 Ггц , 32 Гб, 5.1-дюймовый, MultiTouch сенсорный экран, Super AMOLED, 2560 x 1440 пкс, microUSB, Wi-Fi (802.11 a/b/g/n/ac), Bluetooth® v4.1, A2DP, LE, apt-X, A-GPS, GLONASS , Камера 16 Мпкс, (2160p) 30кадр/сек, (1080p) 60 кадр/сек, (720p) 240 кадр/сек, HDMI (MHL), Li-ION аккумулятор (2550 мАч) , 143.4 x 70.5 x 6.8 мм, 138 г.', '3', '../../img/content/items/34.jpg');
INSERT INTO `products` VALUES ('35', 'Смартфон Apple iPhone 6 16 Gb', 'Apple', '13', '899', 'iOS 8, Золотой, Apple A8, 1.4 ГГц, 16 Гб, 4.7-дюймовый, MultiTouch сенсорный экран, IPS LCD, 750 x 1334 пкс, порт Lightning, Wi-Fi (802.11 a/b/g/n/ac), Bluetooth 4.0 LE, A2DP, A-GPS, GLONASS , Камера 8 Мпкс, Full HD видео (1080p) 60 кадр/сек, HD видео (720p) 240 кадр/сек, 138.1 x 67 x 6.9 мм, 129 г.', '3', '../../img/content/items/35.jpg');
INSERT INTO `products` VALUES ('36', 'Планшетный компьютер ASUS MeMo Pad 7', 'ASUS', '9', '109.99', '7 дюймов, IPS, мультитач, 1280 x 800, Intel Atom, 1.2 ГГц, ZenUI, Android, 4.3, 1Гб, 16 Гб , MicroSD, до 64 Гб, Wi-Fi 802.11 b/g/n, Bluetooth 4.0, ГЛОНАСС, 0.3 МПкс, 2 МПкс, встроенный аккумулятор Li-polymer 3910мАч', '4', '../../img/content/items/36.jpg');
INSERT INTO `products` VALUES ('37', 'Планшетный компьютер Amazon Kindle Fire HD', 'Amazon', '4', '216.99', '7 дюймов, мультитач, 1280 x 800, Cortex A9, 1.2 ГГц, Android, 4.0 , 1Гб, 16 Гб , Wi-Fi 802.11a/b/g/n, Bluetooth 4.0, 1.3 МПкс', '4', '../../img/content/items/37.jpg');
INSERT INTO `products` VALUES ('38', 'Планшетный компьютер Dell Venue 8 Pro', 'Dell', '0', '249.99', '8 дюймов, TFT, мультитач, 1280 x 800, Intel Atom, 1.8 ГГц, Windows 8, 2Гб, 32 Гб, microSD до 128 Гб, Wi-Fi 802.11n, Bluetooth 4.0, 1.2 МПкс, 5 МПкс, Док-клавиатура (опционально), встроенный аккумулятор Li-polymer 4830мАч', '4', '../../img/content/items/38.jpg');
INSERT INTO `products` VALUES ('39', 'Планшетный компьютер Samsung Galaxy Tab 4 10.1', 'Samsung', '7', '368.99', '10.1 дюйма, TFT, мультитач, 1280 x 800, Qualcomm Snapdragon 400, 1.2 ГГц, Samsung TouchWiz UX UI, Android, 4.4, 1.5 Гб, 16 Гб , MicroSD, до 64 Гб, Wi-Fi 802.11a/b/g/n, Bluetooth 4.0, GSM 850/900/1800/1900, 3G HSDPA 850/900/1900/2100, micro SIM, A-GPS, ГЛОНАСС, 1.3 МПкс, 3.15 МПкс, встроенный аккумулятор Li-Ion 6800мАч', '4', '../../img/content/items/39.jpg');
INSERT INTO `products` VALUES ('40', 'Планшетный компьютер Apple iPad Air 32Gb', 'Apple', '15', '418.99', '9.7 дюймов, IPS, мультитач, 2048 x 1536, Apple A7, 1.3 ГГц, iOS, 7, 1Гб, 32 Гб, Wi-Fi 802.11a/b/g/n, Bluetooth 4.0, A-GPS, ГЛОНАСС, 1.2 МПкс, 5 МПкс, встроенный аккумулятор Li-Polymer 8820мАч', '4', '../../img/content/items/40.jpg');
INSERT INTO `products` VALUES ('41', 'Планшетный компьютер Acer Iconia Tab W3-810', 'Acer', '2', '540.99', '8.1 дюймов, TFT, мультитач, 1280 x 800, Intel Atom, 1.5 ГГц, Windows 8, 2Гб, 32 Гб, SDHC, до 64 Гб, Wi-Fi 802.11n, Bluetooth 4.0, 2 МПкс, 2 МПкс, Док-клавиатура (опционально), встроенный аккумулятор Li-polymer 6800мАч', '4', '../../img/content/items/41.jpg');
INSERT INTO `products` VALUES ('42', 'Планшетный компьютер Sony Xperia Tablet Z', 'Sony', '8', '549.99', '10.1 дюйма, TFT, мультитач, 1920 x 1200, Qualcomm , 1.5 ГГц, Android, 4.1, 2Гб, 16 Гб , MicroSD, до 64 Гб, Wi-Fi 802.11a/b/g/n, Bluetooth 4.0, 4G LTE, 3G, EDGE, HSDPA, HSUPA, GPRS, GSM900/1800/1900, micro SIM, A-GPS, 2.2 МПкс, 8.1 МПкс , встроенный аккумулятор Li-Polymer 6000 мАч\nИспытайте все лучшее от Sony в новом планшете', '4', '../../img/content/items/42.jpg');
INSERT INTO `products` VALUES ('43', 'Планшетный компьютер Lenovo IdeaPad Miix', 'Lenovo', '5', '675.99', '10.1 дюйма, TFT, мультитач, 1366 x 768, Intel Atom, 1.8 ГГц, Windows 8, 2Гб, 64 Гб, microSD, Wi-Fi 802.11 b/g/n, Bluetooth 4.0, есть, 3G, GPRS, EDGE, micro SIM, A-GPS, ГЛОНАСС, 1 МПкс, Док-клавиатура, встроенный аккумулятор Li-polymer 6800мАч', '4', '../../img/content/items/43.jpg');
INSERT INTO `products` VALUES ('44', 'Планшетный компьютер Samsung GALAXY Note 10.1', 'Samsung', '8', '797.99', '10.1 дюйма, сенсорный, 2560 x 1600, Qualcomm Snapdragon, 1.9 ГГц + 1.3 ГГц, Samsung TouchWiz UI, Android, 4.3, 3 Гб, 32 Гб, MicroSD, до 64 Гб, Wi-Fi 802.11 a/b/g/n/ac, Bluetooth 4.0, есть, 3G, GPRS, EDGE, micro SIM, A-GPS, ГЛОНАСС, 2 МПкс, 8 МПкс , встроенный аккумулятор Li-Polymer 8220мАч\nВсё в твоих руках', '4', '../../img/content/items/44.jpg');
INSERT INTO `products` VALUES ('45', 'Планшетный компьютер Apple iPad Air 2 (Wi-Fi + 4G) 64 Gb', 'Apple', '10', '849.99', '9.7 дюймов, IPS, мультитач, Apple A8X, 1.5 ГГц, iOS, 2Гб, 64 Гб, Wi-Fi 802.11 a/b/g/n/ac, Bluetooth 4.0, GSM 850/900/1800/1900, HSDPA 850/900/1700/1900/2100, 4G 700/800/850/900/1800/1900/2100/2600, nano SIM, 1.2 МПкс, 8 МПкс , встроенный LiPo аккумулятор (27.3 ватт/час)\n', '4', '../../img/content/items/45.jpg');
INSERT INTO `products` VALUES ('46', 'Электронная Книга Sony PRS-T3S', 'Sony', '4', '109.99', '6-дюймов, сенсорный, E Ink® Pearl , 758 x 1024, TXT, PDF, fb2, ePub, SD, SDHC, Wi-Fi 802.11n, поддержка русского языка', '5', '../../img/content/items/46.jpg');
INSERT INTO `products` VALUES ('47', 'Электронная Книга Sony Reader Wi-Fi PRS-T2', 'Sony', '6', '216.99', '6-дюймов, сенсорный, E Ink® Pearl , 800 x 600, TXT, PDF, fb2, ePub, SD, SDHC, Wi-Fi, поддержка русского языка', '5', '../../img/content/items/47.jpg');
INSERT INTO `products` VALUES ('48', 'Электронная Книга Sony PRS-T3', 'Sony', '7', '216.99', '6-дюймов, сенсорный, E Ink® Pearl , 758 x 1024, TXT, PDF, fb2, ePub, SD, SDHC, Wi-Fi 802.11n, поддержка русского языка\n', '5', '../../img/content/items/48.jpg');
INSERT INTO `products` VALUES ('49', 'Электронная книга PocketBook 515', 'PocketBook', '1', '69.99', 'Linux, 5\"/600x800 пикс., 5 \" E-INK Pearl, Монохромный дисплей, Встроенная память (ROM) 4 ГБ (В*Ш*Г) 143*100*8 мм, 131 г\n', '5', '../../img/content/items/49.jpg');
INSERT INTO `products` VALUES ('50', 'Электронная книга Bookeen Cybook Muse FrontLight ', 'Bookeen', '5', '119.99', 'Linux, 6\"/758х1024 пикс., E-INK Pearl HD, Монохромный дисплей, 4 ГБ, microSD, microSDHC, 1900 мАч, 155*116*8 мм, 190 г', '5', '../../img/content/items/50.jpg');
INSERT INTO `products` VALUES ('51', 'Планшет Wacom Bamboo Pad Wireless CTH300K ', 'Wacom', '4', '122.99', '4-Finger Multi-Touch, Wireless Kit, 508 линий на дюйм, 14.14 x 16.65 x 1.57 см', '6', '../../img/content/items/51.jpg');
INSERT INTO `products` VALUES ('52', 'Планшет Wacom Intuos5 S Touch ', 'Wacom', '3', '378.99', 'Новый Intuos5 мог бы впечатлить своим ультра-тонким дизайном, но всё внимание пользователя будет устремлено туда, где зарождается творческая работа: на экран. Ведь этот планшет вновь выводит творчество на новый качественный уровень, позволяя полностью сконцентрироваться на процессе работы.', '6', '../../img/content/items/52.jpg');
INSERT INTO `products` VALUES ('53', 'Планшет Wacom Cintiq 13HD ', 'Wacom', '2', '1553.99', 'Cintiq 13HD — это интерактивный перьевой дисплей, позволяющий творить прямо на 13,3-дюймовом HD-дисплее', '6', '../../img/content/items/53.jpg');
INSERT INTO `products` VALUES ('54', 'Планшет Wacom Cintiq 22HD touch ', 'Wacom', '0', '3645.99', 'Расширьте диапазон чувств – проникнитесь точностью цифрового изображения, создаваемого с помощью Cintiq 22HD touch', '6', '../../img/content/items/54.jpg');
INSERT INTO `products` VALUES ('55', 'Планшет Wacom Cintiq 24HD touch ', 'Wacom', '1', '4050.99', 'Cintiq 24HD touch: яркие цвета в одно касание', '6', '../../img/content/items/55.jpg');
INSERT INTO `products` VALUES ('56', 'Цифровой плеер Apple iPod nano 7G 16Gb', 'Apple', '14', '216.99', '16Гб, 2.5-дюймов Multi-Touch , 240x432, AAC, HE-AAC, MP3, MP3 VBR, Audible, Apple Lossless, AIFF, WAV, FM радио', '7', '../../img/content/items/56.jpg');
INSERT INTO `products` VALUES ('57', 'Цифровой плеер FIIO X3 Music Player', 'FIIO', '3', '270.99', '8Гб (+ слот для microSD/TF Card (до 128 Гб)), 2.4-дюймов LCD, 320x240, MP3, WMA, OGG, AAC, FLAC, APE, WAV', '7', '../../img/content/items/57.jpg');
INSERT INTO `products` VALUES ('58', 'Цифровой плеер Apple iPod touch 5G 32Gb', 'Apple', '15', '358.99', '4 дюйма Multi-Touch , 1136x640, 1.2 Мпкс, 5 Мпикс, с возм. записи видео 1080p , AAC, HE-AAC, MP3, MP3 VBR, Audible, Apple Lossless, AIFF, WAV, Видео H.264, 640х480 пикселей, видео MPEG-4, разрешение 640x480 пикселей, стереозвук в формате .m4v, .mp4 и .mov, Wi-Fi 802.11n, Bluetooth 4.0', '7', '../../img/content/items/58.jpg');
INSERT INTO `products` VALUES ('59', 'Цифровой плеер FIIO X5 Digital Music Player', 'FIIO', '2', '446.99', 'Fiio OS, Черный, Ingenics 4760B, 2.4-дюймов LCD, 400x360, MP3, WMA, OGG, AAC, FLAC, APE, Apple Lossless, WAV', '7', '../../img/content/items/59.jpg');
INSERT INTO `products` VALUES ('60', 'Игровая консоль Sony PS VITA Wi-Fi 3G', 'Sony', '5', '338.99', '3G, Wi-Fi 802.11n, Bluetooth 2.1 + EDR', '8', '../../img/content/items/60.jpg');
INSERT INTO `products` VALUES ('61', 'Игровая консоль Sony Playstation 3 (Slim 500Gb)', 'Sony', '7', '405.99', 'Playstation 3 Slim, 3.60, Черный, 500Gb, 10/100/1000 Mbit, Wi-Fi IEEE 802.11 b/g, Bluetooth 2.1 + EDR, 480i, 480p, 720p, 1080i, 1080p; 1 x HDMI (HDMI); 2 x AV Multi Out; 1 x цифровой оптический Digital Out (Optical)', '8', '../../img/content/items/61.jpg');
INSERT INTO `products` VALUES ('62', 'Игровая консоль Microsoft XBOX 360', 'Microsoft', '5', '513.99', 'Kinect XBOX 360 Slim, Черный, 250GB, 10/100/1000 Mbit, Wi-Fi IEEE 802.11 b/g, 720p (1280x720 пикс), 1080i (1920x1080 пикс), 1080p (1920x1080 пикс)', '8', '../../img/content/items/62.jpg');
INSERT INTO `products` VALUES ('63', 'Игровая консоль Sony PlayStation 4', 'Sony', '9', '569.99', '500Gb, 10/100/1000 Mbit, Wi-Fi IEEE 802.11 b/g/n, Bluetooth 2.1 + EDR, HDMI, цифровой выход (оптический)', '8', '../../img/content/items/63.jpg');
INSERT INTO `products` VALUES ('64', 'Игровая консоль Microsoft XBOX 360S', 'Microsoft', '4', '621.99', 'XBOX 360 Slim, Черный, 250GB, 10/100/1000 Mbit, Wi-Fi IEEE 802.11 b/g, 720p (1280x720 пикс), 1080i (1920x1080 пикс), 1080p (1920x1080 пикс)', '8', '../../img/content/items/64.jpg');
INSERT INTO `products` VALUES ('65', 'Игровая консоль Microsoft Xbox One', 'Microsoft', '2', '810.99', '500Gb, 10/100/1000 Mbit, Wi-Fi IEEE 802.11 a/b/g/n/ac, 2 x HDMI (вход и выход)', '8', '../../img/content/items/65.jpg');
INSERT INTO `products` VALUES ('66', 'Наушники A4Tech HS-7P ', 'A4Tech', '35', '15.99', 'Удобное оголовье и мягкие амбушюры гарнитуры A4Tech HS-7P обеспечивают абсолютный комфорт при длительном прослушивании музыки, переговорах и многочасовых играх. ', '9', '../../img/content/items/66.jpg');
INSERT INTO `products` VALUES ('67', 'Наушники Sony MH410 ', 'Sony', '24', '21.99', 'Откройте для себя мини-гарнитуру MH410. Она изготовлена с использованием прецизионных акустических компонентов, гарантирующих качественный стереозвук. К гарнитуре прилагаются удобные наушники. Они отлично сидят.', '9', '../../img/content/items/67.jpg');
INSERT INTO `products` VALUES ('68', 'Наушники Apple EarPods MD827FE/A ', 'Apple', '20', '45.99', 'Ухо каждого человека уникально — так же, как и отпечатки пальцев. Поэтому наушники-капли подходят не всем. При разработке новых наушников дизайнеры и инженеры Apple решили взять за основу не конструкцию динамика, а устройство человеческого уха. Они опробовали более ста прототипов дизайна, в тестировании которых приняли участие сотни людей. Основная задача состояла в том, чтобы создать удобные наушники, которые будут легко размещаться в ушах и не выпадать. При этом требовалось сохранить высокое качество звука. В результате появились революционные наушники Apple EarPods. Таких вы ещё не видели. И не слышали.', '9', '../../img/content/items/68.jpg');
INSERT INTO `products` VALUES ('69', 'Гарнитура Jabra SPORT Corded', 'Jabra', '15', '81.99', 'Высокое качество звука и непревзойденный комфорт - специально для занятий спортом ', '9', '../../img/content/items/69.jpg');
INSERT INTO `products` VALUES ('70', 'Наушники Aerial7 TANK SHADE ', 'Aerial7', '12', '110.99', 'Хотите окунуться в громоподобные басы и кристально чистый звук, которые увлекут вас в новые высоты? Послушайте TANK! Эти головные наушники оснащены массивными амбушюрами и мягким оголовьем с регулируемыми чашками для удобной фиксации на голове. Также предусмотрены два типа шнуров – один витой, а другой с встроенным микрофоном. ', '9', '../../img/content/items/70.jpg');
INSERT INTO `products` VALUES ('71', 'Наушники Beats by Dr. Dre Diddybeats', 'Beats', '16', '122.99', 'Обернутые с внешней стороны кожей, а так же спортивной полированной крышкой, Diddybeats — это изящный аксессуар для любого случая.', '9', '../../img/content/items/71.jpg');
INSERT INTO `products` VALUES ('72', 'Наушники Sennheiser PX 685i White', 'Sennheiser', '8', '129.99', 'Гибкое регулируемое оголовье гарнитуры PX 685i SPORTS обеспечивает идеальную настройку и комфорт при посадке наушников. ', '9', '../../img/content/items/72.jpg');
INSERT INTO `products` VALUES ('73', 'Наушники JBL Synchros S300 I Black ', 'JBL', '10', '270.99', 'Компактные наушники с революционным звуком теперь и в вашей жизни. Новая модель JBL Synchros S300 имеет совершенно новый, неклассический дизайн. Легкие и прочные наушники S300 имеют стальной ободок и кожаные амбушюры, что делает их комфортными для многочасового прослушивания звука профессионального качества.\n', '9', '../../img/content/items/73.jpg');
INSERT INTO `products` VALUES ('74', 'Наушники Bose Sound True Black ', 'Bose', '7', '338.99', 'Новое поколение охватывающих наушников BOSE приобрело яркие расцветки. Теперь гарнитура и пульт управления – стандартная комплектация. Новая модель сохранила свои главные преимущества – великолепное звучание, комфорт и надежность.', '9', '../../img/content/items/74.jpg');
INSERT INTO `products` VALUES ('75', 'Наушники Beats by Dr. Dre New Studio', 'Beats', '3', '473.99', 'Точный звук, адаптивное шумоподавление и 20-часовой аккумулятор.', '9', '../../img/content/items/75.jpg');
INSERT INTO `products` VALUES ('76', 'Часы Samsung Gear Fit (SM-R350) ', 'Samsung', '8', '229.99', 'Samsung Gear Fit - первое интеллектуальное носимое устройство с изогнутым Super AMOLED-дисплеем, созданное специально для занятий фитнесом и спортом.', '10', '../../img/content/items/76.jpg');
INSERT INTO `products` VALUES ('77', 'Часы Sony SmartWatch 2 SW2', 'Sony', '5', '243.99', 'Первый в мире наручный дисплей SmartWatch на базе ОС Android с функцией одного касания NFC', '10', '../../img/content/items/77.jpg');
INSERT INTO `products` VALUES ('78', 'Часы Samsung GALAXY Gear (SM-V700)', 'Samsung', '7', '248.99', 'Высококачественный ремешок часов Samsung GALAXY Gear комфортно сидит на руке. В них предусмотрен квадратный сенсорный дисплей, позволяющий быстро посмотреть время, входящие сообщения, управлять воспроизведением музыки и другими функциями. На выбор доступны различные цвета, среди которых найдется тот, который лучше подойдет вашему стилю. Рамка дисплея на элегантных часах Samsung GALAXY Gear сделана из нержавеющей стали, подчеркивающей роскошный вид.', '10', '../../img/content/items/78.jpg');
INSERT INTO `products` VALUES ('79', 'Часы Pebble Steel (401SLR)', 'Pebble', '3', '338.99', 'Pebble Steel – это новая Premium-версия уникальных часов, ярко отражающих тенденции развития современных высоких технологий.', '10', '../../img/content/items/79.jpg');
INSERT INTO `products` VALUES ('80', 'Часы Apple Watch 38mm', 'Apple', '6', '1309.99', 'Watch OS, Apple S1, 512 Мб, 1.33-дюймовый IPS LCD дисплей (272x340), 343 ppi, 8 Гб, Bluetooth 4.0, NFC, WiFi, До 18 часов в активном режиме, до 72 часов в режиме ожидания', '10', '../../img/content/items/80.jpg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `birthday` date NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`) KEY_BLOCK_SIZE=20
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Мария', 'Таманаева', '1956-02-24', 'mariya_tamaneva@list.ru', 'bb440d1516bfdcbaa9291150b26821a3', '0', '2015-01-06 02:07:07', '2015-01-06 02:07:07');
INSERT INTO `users` VALUES ('2', 'Юрий', 'Никитин', '1948-07-26', 'yuri_nikitin@bk.ru', '5fe28415cd9a25edf7edf195d22c201b', '1', '2015-01-19 23:17:03', '2015-01-19 23:17:03');
INSERT INTO `users` VALUES ('3', 'Ирина', 'Жигульская', '1965-08-17', 'irina_jigulskaya@inbox.ru', '443a3ae86d6e84100cef795990348fa8', '0', '2015-01-21 16:03:04', '2015-01-21 16:03:04');
INSERT INTO `users` VALUES ('4', 'Виктор', 'Журавлев', '1965-03-24', 'viktor_juravlev@mail.ru', 'b9f69b2e5d53364785dd67483589b263', '0', '2015-02-21 18:08:03', '2015-02-21 18:08:03');
INSERT INTO `users` VALUES ('5', 'Максим', 'Липовик', '1978-12-15', 'maksim_lipovik@bk.ru', '764cc32b989d49c0d12cade13311e1d0', '1', '2015-02-26 20:03:44', '2015-02-26 20:03:44');
INSERT INTO `users` VALUES ('6', 'Роман', 'Костюченко', '1989-12-15', 'roman_kostyuchenko@list.ru', 'd26f87b30e2600724f63fd3f4569c022', '0', '2015-02-28 19:17:43', '2015-02-28 19:17:43');
INSERT INTO `users` VALUES ('7', 'Евгений', 'Скрыпников', '1954-09-30', 'evgeniy_skripnikov@mail.ru', '386fb3dd746bb7cbfab2e9c04ebf79bf', '0', '2015-03-13 07:19:37', '2015-03-13 07:19:37');
INSERT INTO `users` VALUES ('8', 'Дмитрий', 'Сокольцов', '1975-01-13', 'dmitri_sokolcov@inbox.ru', '1cd67667b4f0aba3218acd70fe175476', '1', '2015-03-18 21:35:29', '2015-03-18 21:35:29');
INSERT INTO `users` VALUES ('9', 'Дмитрий', 'Гололобов', '1986-08-23', 'dmitri_qolobov@bk.ru', '4c24990c0615c80d403e60dbbb52bf2e', '1', '2015-03-23 10:06:45', '2015-03-23 10:06:45');
INSERT INTO `users` VALUES ('10', 'Владимир', 'Киселев', '1990-08-05', 'vladimir_kiselev@mail.ru', 'f605c15a4e289ceec990e9ef82dfbe98', '0', '2015-04-22 02:46:36', '2015-04-22 02:46:36');
INSERT INTO `users` VALUES ('11', 'Константин', 'Добецкий', '1988-09-12', 'konstantin_dobeckiy@bk.ru', '7a7b1c49a304253571924e798ff70786', '1', '2015-04-30 12:09:23', '2015-04-30 12:09:23');
INSERT INTO `users` VALUES ('12', 'Сергей', 'Терешков', '1993-05-15', 'sergey_tereshkov@bk.ru', '6155e99add2a568458c7df84972421a7', '1', '2015-05-15 18:03:24', '2015-05-15 18:03:24');
INSERT INTO `users` VALUES ('13', 'Андрей', 'Бобрышов', '1975-10-23', 'andrey_bobrishov@mail.ru', 'a3c7c47ece6bac9b1219054f1b888521', '1', '2015-05-22 17:04:29', '2015-05-22 17:04:29');
INSERT INTO `users` VALUES ('14', 'Александр', 'Бондаренко', '1981-12-17', 'aleksandr_bondarenko@list.ru', 'd793546dc638d3fb356df9535e3b67ca', '1', '2015-05-22 22:07:38', '2015-05-22 22:07:38');
INSERT INTO `users` VALUES ('15', 'Роман', 'Карпов', '1968-10-29', 'roman_karpov@mail.ru', 'b3a376ec376573f8a8b8a080443803f9', '0', '2015-05-24 14:19:17', '2015-05-24 14:19:17');
INSERT INTO `users` VALUES ('16', 'Денис', 'Назаров', '1989-10-10', 'denis_nazarov@inbox.ru', '8c52ff1adaf1fdeacef3c58172743a2e', '1', '2015-05-25 04:10:52', '2015-05-25 04:10:52');
INSERT INTO `users` VALUES ('17', 'Алексей', 'Буквин', '1992-05-17', 'aleksey_bukvin@mail.ru', '84f004e2de46b05d147cd853fa5c1e88', '1', '2015-05-25 18:22:41', '2015-05-25 18:22:41');
INSERT INTO `users` VALUES ('18', 'Александр', 'Хрюков', '1980-06-23', 'aleksandr_xrukov@bk.ru', 'de85fc8b0cd0f78da93dcf684ba8fea6', '1', '2015-06-01 13:25:06', '2015-06-01 13:25:06');
INSERT INTO `users` VALUES ('19', 'Алексей', 'Минжуков', '1951-10-05', 'aleksey_minjukov@inbox.ru', 'a46da4a5a0b193fcdf5d7a6fa4817c49', '1', '2015-06-14 19:35:35', '2015-06-14 19:35:35');
INSERT INTO `users` VALUES ('20', 'Полина', 'Данилина', '1990-11-15', 'polina_danilina@mail.ru', '815a2e988dbbdcba6c5dad45d70bb82f', '1', '2015-06-26 12:02:04', '2015-06-26 12:02:04');
INSERT INTO `users` VALUES ('21', 'Антон', 'Мясников', '1970-04-01', 'anton_myasnikov@bk.ru', '1b5fab1d1b205d192d575ee5326d5e0b', '1', '2015-07-02 23:10:34', '2015-07-02 23:10:34');
INSERT INTO `users` VALUES ('22', 'Ярослав', 'Чуйков', '1989-04-02', 'yaroslav_chuykov@list.ru', '72c95aee2b2ccd7e9bf694764ecace84', '0', '2015-07-04 22:08:12', '2015-07-04 22:08:12');
INSERT INTO `users` VALUES ('23', 'Фанис', 'Ганиев', '1985-07-18', 'fanis_qaniyev@mail.ru', 'dc129da84eabe536db59912dee0a8f21', '0', '2015-07-16 11:39:51', '2015-07-16 11:39:51');
INSERT INTO `users` VALUES ('24', 'Вадим', 'Черемисин', '1991-05-25', 'vadim_cheremisin@list.ru', '414d1aeb3684f4b36a04fd7f31b3072c', '1', '2015-07-19 12:58:12', '2015-07-19 12:58:12');
INSERT INTO `users` VALUES ('25', 'Константин', 'Сальников', '1966-03-21', 'konstantin_salnikov@bk.ru', 'a2ba4b83f9458cb8882bae5ee4a686fe', '0', '2015-07-27 19:25:03', '2015-07-27 19:25:03');
INSERT INTO `users` VALUES ('26', 'Анна', 'Колмакова', '1954-05-25', 'anna_kolmakova@list.ru', 'f7b17dc0f47d1e8ba075e8fdeb300960', '1', '2015-08-05 15:02:29', '2015-08-05 15:02:29');
INSERT INTO `users` VALUES ('27', 'Александр', 'Танаев', '1982-11-04', 'aleksandr_tanaev@mail.ru', 'e8e32e350fe9af4c96f6d8b61edb0543', '0', '2015-08-09 15:14:50', '2015-08-09 15:14:50');
INSERT INTO `users` VALUES ('28', 'Сергей', 'Егоров', '1991-10-12', 'sergey_eqorov@inbox.ru', '79942ef5f99a251a2222cff2b27e7714', '1', '2015-08-12 11:23:11', '2015-08-12 11:23:11');
INSERT INTO `users` VALUES ('29', 'Владислав', 'Николаев', '1992-10-05', 'vladislav_nikolayev@mail.ru', 'c7a8d374cf93af8824ff8a55b562ca1c', '0', '2015-08-18 14:46:43', '2015-08-18 14:46:43');
INSERT INTO `users` VALUES ('30', 'Артём', 'Курзяков', '1985-02-28', 'artyom_kurzyakov@list.ru', '17fc658145ddf7e88c22f403d12dd329', '1', '2015-08-25 04:15:34', '2015-08-25 04:15:34');
INSERT INTO `users` VALUES ('35', 'Jason', 'Statham', '2015-09-01', 'statham@jason.ru', 'f691cfd62d4075e532fe17630f9e65b4', '0', '2015-09-19 00:00:00', '2015-09-19 00:00:00');
shopproducts