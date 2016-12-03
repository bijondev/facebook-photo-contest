-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2013 at 07:34 PM
-- Server version: 5.5.32-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csbazar_cbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `custompage`
--

CREATE TABLE IF NOT EXISTS `custompage` (
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `allow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custompage`
--

INSERT INTO `custompage` (`name`, `content`, `allow`) VALUES
('Custom page', '<h2>Custom Page</h2>\r\n<p>Maecenas libero. Integer vulputate sem a nibh rutrum consequat. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nam sed tellus id magna elementum tincidunt. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Nunc tincidunt ante vitae massa. Nulla est. Etiam posuere lacus quis dolor. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Nulla quis diam. Aliquam erat volutpat. Aliquam erat volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Aliquam id dolor.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(350) NOT NULL,
  `photo_name` varchar(250) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `description`, `name`, `photo_name`, `rating`) VALUES
(1, 100001260353862, 'a best movie of india', 'Meghe-Dhaka-Tara-Full-Bengali-Movie-Online.jpg', 'Mege Dhaka Tara', 0),
(2, 100000428217049, '0', 'Pi-RandH-MO2-0002.jpg', 'Just Fun', 2),
(3, 771367163, 'This is a wonderful transparent tent. ', 'bubbletree-see-through-bubble-tent-1050x700.jpg', 'Amazing tent', 0),
(4, 564730335, 'test', 'aaaa.jpg', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `user_id` bigint(20) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`user_id`, `photo_id`) VALUES
(100000428217049, 2),
(100001260353862, 2),
(564730335, 4);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `event` varchar(300) NOT NULL,
  `count` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `img_per_page` int(11) NOT NULL,
  `condition` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `privacy` text NOT NULL,
  `tracking` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`event`, `count`, `url`, `img_per_page`, `condition`, `start`, `end`, `privacy`, `tracking`) VALUES
('Photo Contest', 30, 'http://apps.facebook.com/clickbdbkb/', 12, '<h2>Rules and Prizes</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla est. Aliquam erat volutpat. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Pellentesque ipsum. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Nulla pulvinar eleifend sem. Donec vitae arcu. Fusce consectetuer risus a nunc. Aliquam erat volutpat. Etiam dictum tincidunt diam. Pellentesque pretium lectus id turpis. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Praesent id justo in neque elementum ultrices. Aenean id metus id velit ullamcorper pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Fusce suscipit libero eget elit. Aenean fermentum risus id tortor. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Curabitur bibendum justo non orci. Aenean vel massa quis mauris vehicula lacinia. Mauris dictum facilisis augue. Etiam egestas wisi a erat. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam eget nisl. Donec vitae arcu. Fusce suscipit libero eget elit. Pellentesque pretium lectus id turpis. Vestibulum fermentum tortor id mi. Aliquam ornare wisi eu metus. Praesent vitae arcu tempor neque lacinia pretium. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>', '2013-04-24', '2013-12-28', '<h2>Privacy Policy and Terms of use</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla est. Aliquam erat volutpat. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Pellentesque ipsum. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Nulla pulvinar eleifend sem. Donec vitae arcu. Fusce consectetuer risus a nunc. Aliquam erat volutpat. Etiam dictum tincidunt diam. Pellentesque pretium lectus id turpis. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Praesent id justo in neque elementum ultrices. Aenean id metus id velit ullamcorper pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Fusce suscipit libero eget elit. Aenean fermentum risus id tortor. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Curabitur bibendum justo non orci. Aenean vel massa quis mauris vehicula lacinia. Mauris dictum facilisis augue. Etiam egestas wisi a erat. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam eget nisl. Donec vitae arcu. Fusce suscipit libero eget elit. Pellentesque pretium lectus id turpis. Vestibulum fermentum tortor id mi. Aliquam ornare wisi eu metus. Praesent vitae arcu tempor neque lacinia pretium. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci.</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `uptable`
--

CREATE TABLE IF NOT EXISTS `uptable` (
  `cctable` int(11) NOT NULL,
  `ddtable` text NOT NULL,
  `eetable` int(11) NOT NULL,
  `fftable` int(11) NOT NULL,
  `ggtable` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(222) NOT NULL,
  `photo_count` int(11) NOT NULL DEFAULT '1',
  `user_profile` varchar(400) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `photo_count`, `user_profile`) VALUES
(564730335, 'Click Bd', 1, 'https://www.facebook.com/ClickBD'),
(771367163, 'Modhushree Khan', 1, 'https://www.facebook.com/modhushree.khan'),
(1846061327, 'Zbyněk Hovorka', 1, 'http://www.facebook.com/zbynekhovorka'),
(100000428217049, 'Abdur Rob Soyon', 1, 'https://www.facebook.com/abdurrob.soyon'),
(100001260353862, 'Bijon Krishna Bairagi', 1, 'https://www.facebook.com/bijoncse'),
(100003569516597, 'Bairagi Sudhin Kumar', 1, 'https://www.facebook.com/bairagisudhin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
