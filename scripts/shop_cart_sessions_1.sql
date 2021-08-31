-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 03:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop_cart_sessions_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  'brand' varchar(50) NOT NULL,    -- new
  'scent' varchar(50) NOT NULL,    -- new
  'volume' decimal(2,1) NOT NULL, -- new
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='products that can be added to cart' AUTO_INCREMENT=41 ;


--
-- Dumping data for table `products`
--

--
-- SR 03-07-2021 11:30 Essential Oil products w/timestamp
--
INSERT INTO `products`
(`id`, 'brand', 'scent', 'volume', `name`, `description`, `price`, `created`, `modified`) VALUES
(1, 'Handcraft', 'Lavender', 4.0, 'Handcraft Lavender Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Lavender.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 'Handcraft', 'Basil', 4.0, 'Handcraft Basil Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Basil.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(3, 'Handcraft', 'Eucalyptus', 4.0, 'Handcraft Eucalyptus Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Eucalyptus.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(4, 'Handcraft', 'Frankincense', 4.0, 'Handcraft Frankincense Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Frankincense.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(5, 'Handcraft', 'Lemon', 4.0, 'Handcraft Lemon Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Lemon.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(6, 'Handcraft', 'Lemongrass', 4.0, 'Handcraft Lemongrass Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Lemongrass.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(7, 'Handcraft', 'Oregano', 4.0, 'Handcraft Oregano Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Oregano.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(8, 'Handcraft', 'Peppermint', 4.0, 'Handcraft Peppermint Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Peppermint.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(9, 'Handcraft', 'Rosemary', 4.0, 'Handcraft Rosemary Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Rosemary.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(10, 'Handcraft', 'Spearmint', 4.0, 'Handcraft Spearmint Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Spearmint.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(11, 'Handcraft', 'Sweet Orange', 4.0, 'Handcraft Sweet Orange Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Sweet Orange.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(12, 'Handcraft', 'Tea Tree', 4.0, 'Handcraft Tea Tree Essential Oil', '&lt;p&gt;100% Pure & Natural – Premium Therapeutic Grade with Premium Glass Dropper - Huge 4 fl.oz. Scent: Peppermint.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(13, 'ArtNaturals', 'Lavender', 4.0, 'ArtNaturals 100% Pure Lavender Essential Oil', '&lt;p&gt;(4 Fl Oz / 120ml) - Premium Undiluted Therapeutic Grade Natural from Bulgaria - Aromatherapy for Diffuser, Sleep, Relaxation, Skin and Hair Growth.&lt;/p&gt;', '14.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(14, 'ArtNaturals', 'Peppermint', 0.5, 'ArtNaturals 100% Pure Peppermint Essential Oil', '&lt;p&gt;(.5 Fl Oz / 15ml) - Premium Therapeutic Grade Mentha Peperita - Fresh Mint for Hair Growth and Skin - Repel Mice and Spiders - Natural Rodent Repellent.&lt;/p&gt;', '6.47', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(15, 'ArtNaturals', 'Tea Tree', 0.5, 'ArtNaturals 100% Pure Tea Tree Essential Oil', '&lt;p&gt;(.5 Fl Oz / 15ml) - Natural Premium Melaleuca Therapeutic Grade - Great with Soap and Shampoo, Face and Body Wash - Treatment for Acne, Lice.&lt;/p&gt;', '8.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(16, 'ArtNaturals', 'Frankincense', 0.5, 'ArtNaturals 100% Pure Frankincense Essential Oil', '&lt;p&gt;(.5 Fl Oz / 15ml) - Natural Undiluted Therapeutic Grade – Premium Aromatherapy Quality Oil for Diffuser Internal Use, Skin, and Face - Frankensence.&lt;/p&gt;', '5.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(17, 'Hana', 'Lavender', 1.0, 'Hana Lavender Essential Oil', '&lt;p&gt;Calms Minds and Improves Sleep Quality - for Peaceful Slumbers - 100 Pure Therapeutic Grade for Aromatherapy and Topical Use - 1.0 fl oz.&lt;/p&gt;', '6.89', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(18, 'Hana', 'Peppermint', 1.0, 'Hana Peppermint Essential Oil', '&lt;p&gt;Clears Breathing and Boosts Hair Growth - for Refreshing Morning Rituals - 100 Pure Therapeutic Grade for Aromatherapy and Topical Use - 1.0 fl oz.&lt;/p&gt;', '4.99', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(19, 'Hana', 'Orange', 1.0, 'Hana Orange Essential Oil', '&lt;p&gt;Uplifts Moods and Boosts Skin Glow - for Upbeat Days - 100 Pure Therapeutic Grade for Aromatherapy and Topical Use - 1.0 fl oz.&lt;/p&gt;', '6.99', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(20, 'Hana', 'Lemongrass', 1.0, 'Hana Lemongrass Essential Oil', '&lt;p&gt;Outdoor Protection and Relaxes Muscle Aches - For Worry-Free Fun - 100 Pure Therapeutic Grade for Aromatherapy and Topical Use - 1.0 fl oz.&lt;/p&gt;', '19.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(21, 'Greensleeves', 'Lavender', 0.3,'GREENSLEEVES Lavender Essential Oil', '&lt;p&gt;100% Pure Organic Therapeutic Grade Aromatherapy Oil 0.3 fl oz for Massage, Skin Care, Diffuser.&lt;/p&gt;', '6.99', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(22, 'Greensleeves', 'Peppermint', 0.3,'GREENSLEEVES Peppermint Essential Oil', '&lt;p&gt;100% Pure Organic Therapeutic Grade Aromatherapy Oil 0.3 fl oz for Massage, Skin Care, Diffuser (Peppermint).&lt;/p&gt;', '5.19', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(23, 'Greensleeves', 'Orange', 0.3,'GREENSLEEVES Orange Essential Oil', '&lt;p&gt;100% Pure Organic Therapeutic Grade Aromatherapy Oil 0.3 fl oz for Massage, Skin Care, Diffuser (Orange).&lt;/p&gt;', '5.26', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(24, 'Florona', 'Lavender', 4.0,'Florona Lavender Essential Oil', '&lt;p&gt;100% Pure Therapeutic Grade for Aromatherapy Diffuser and for Stress Relief, Relaxation & Sleep - Large Bottle with Gift Box.&lt;/p&gt;', '15.95', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='image files related to a product' AUTO_INCREMENT=105 ;

--
-- Dumping data for table `product_images`
--

--
--  SR 03-07-2021 11:30 Essential oil images w/timestamp
--
INSERT INTO `product_images` (`id`, `product_id`, `name`, `created`, `modified`) VALUES
(200, 1, 'p200sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(201, 2, 'p201sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(202, 3, 'p202sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(203, 4, 'p203sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(204, 5, 'p204sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(205, 6, 'p205sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(206, 7, 'p206sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(207, 8, 'p207sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(208, 9, 'p208sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(209, 10, 'p209sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(210, 11, 'p210sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(211, 12, 'p211sq.jpg', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
