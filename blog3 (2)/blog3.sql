-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2021 at 08:16 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog3`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `userPassword` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `userPassword`, `email`, `code`) VALUES
(1, 'Asif Seferov', '2ba33365e5c76095284e9992bb98b09d', 'asif_seferov_1995@mail.ru', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_img` varchar(200) DEFAULT NULL,
  `article_title` varchar(200) DEFAULT NULL,
  `article_content` text,
  `article_category` varchar(200) DEFAULT NULL,
  `article_author` varchar(200) DEFAULT NULL,
  `article_active` varchar(1) DEFAULT '0',
  `article_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_populer` int(11) NOT NULL,
  `article_category_active` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_img`, `article_title`, `article_content`, `article_category`, `article_author`, `article_active`, `article_date`, `article_populer`, `article_category_active`) VALUES
(11, '574258blog-1.jpg', 'CSS dersleri haqqinda her sey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum, metus vel venenatis finibus, leo est porttitor nunc, eu tempor magna enim quis lorem. Nullam auctor, turpis vel tristique ultrices, nisl elit elementum lectus, sed dictum nulla dui eu leo. In elit mi, porttitor quis tellus ut, porta bibendum lectus. Aliquam pulvinar velit sit amet tortor sagittis, id ornare justo euismod. Sed id tortor arcu. Aliquam vel pellentesque sem. Mauris erat urna, ultrices ut accumsan at, tincidunt sit amet orci. Ut interdum quam at vulputate sagittis. Sed vehicula porttitor orci quis lacinia. Proin vitae laoreet magna, a blandit metus. Vivamus mi nulla, malesuada et maximus a, consequat non orci. Etiam tempor accumsan metus id consectetur. Vivamus tincidunt at quam in tincidunt.\r\n\r\nAenean et magna mauris. Nulla facilisi. Donec vitae turpis quis massa elementum rhoncus. Pellentesque id nibh fringilla, laoreet massa vehicula, mollis turpis. Etiam ultrices dictum nisi non faucibus. Nunc imperdiet malesuada feugiat. Curabitur sit amet lorem non urna maximus malesuada eu ut nulla.\r\n\r\nPraesent quis rhoncus turpis. Vivamus rutrum mattis pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In malesuada vel augue at blandit. Sed non velit dapibus, ornare enim vitae, pellentesque neque. Donec ex ipsum, interdum quis interdum sit amet, rutrum at ipsum. Sed eget nunc eget mi pharetra mollis. Vestibulum ut diam lorem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce tempor at elit eu tincidunt. Aliquam hendrerit mi nisi, quis mattis elit interdum ut.\r\n\r\nCurabitur sed lacinia enim. Sed at rhoncus mi, pulvinar tristique lorem. Aenean blandit sapien metus, tincidunt luctus nisl tempus et. Etiam varius dui eu nisi tempor mollis. Fusce in lectus et nulla condimentum consequat. Nunc lacinia interdum mi, at dapibus nisi bibendum non. Fusce id metus feugiat, scelerisque mi vitae, congue diam. Suspendisse ac lacinia eros. Nullam accumsan urna vitae diam convallis gravida sit amet non lectus. In hac habitasse platea dictumst. Fusce quis porta justo, sed accumsan mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nSuspendisse nec interdum dui. Suspendisse potenti. Vestibulum finibus ultrices eros vitae congue. Integer condimentum est faucibus mauris tincidunt, ut aliquam nunc tincidunt. Duis iaculis dui non quam interdum, nec volutpat lacus blandit. Maecenas semper in nisl lacinia convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam laoreet ligula ut euismod efficitur. Sed bibendum magna fermentum erat semper, id faucibus justo faucibus. Sed interdum venenatis sapien. Vivamus sit amet mauris felis. In id nisl in mi cursus interdum vel vel magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam nec ante porttitor, egestas augue non, blandit enim. Nunc eget mi sed metus iaculis placerat.', 'Technology', 'asif seferov', '1', '2021-10-09 09:23:22', 2, '0'),
(12, '490479blog-2.jpg', 'Php dersleri12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum, metus vel venenatis finibus, leo est porttitor nunc, eu tempor magna enim quis lorem. Nullam auctor, turpis vel tristique ultrices, nisl elit elementum lectus, sed dictum nulla dui eu leo. In elit mi, porttitor quis tellus ut, porta bibendum lectus. Aliquam pulvinar velit sit amet tortor sagittis, id ornare justo euismod. Sed id tortor arcu. Aliquam vel pellentesque sem. Mauris erat urna, ultrices ut accumsan at, tincidunt sit amet orci. Ut interdum quam at vulputate sagittis. Sed vehicula porttitor orci quis lacinia. Proin vitae laoreet magna, a blandit metus. Vivamus mi nulla, malesuada et maximus a, consequat non orci. Etiam tempor accumsan metus id consectetur. Vivamus tincidunt at quam in tincidunt.\r\n\r\nAenean et magna mauris. Nulla facilisi. Donec vitae turpis quis massa elementum rhoncus. Pellentesque id nibh fringilla, laoreet massa vehicula, mollis turpis. Etiam ultrices dictum nisi non faucibus. Nunc imperdiet malesuada feugiat. Curabitur sit amet lorem non urna maximus malesuada eu ut nulla.\r\n\r\nPraesent quis rhoncus turpis. Vivamus rutrum mattis pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In malesuada vel augue at blandit. Sed non velit dapibus, ornare enim vitae, pellentesque neque. Donec ex ipsum, interdum quis interdum sit amet, rutrum at ipsum. Sed eget nunc eget mi pharetra mollis. Vestibulum ut diam lorem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce tempor at elit eu tincidunt. Aliquam hendrerit mi nisi, quis mattis elit interdum ut.\r\n\r\nCurabitur sed lacinia enim. Sed at rhoncus mi, pulvinar tristique lorem. Aenean blandit sapien metus, tincidunt luctus nisl tempus et. Etiam varius dui eu nisi tempor mollis. Fusce in lectus et nulla condimentum consequat. Nunc lacinia interdum mi, at dapibus nisi bibendum non. Fusce id metus feugiat, scelerisque mi vitae, congue diam. Suspendisse ac lacinia eros. Nullam accumsan urna vitae diam convallis gravida sit amet non lectus. In hac habitasse platea dictumst. Fusce quis porta justo, sed accumsan mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nSuspendisse nec interdum dui. Suspendisse potenti. Vestibulum finibus ultrices eros vitae congue. Integer condimentum est faucibus mauris tincidunt, ut aliquam nunc tincidunt. Duis iaculis dui non quam interdum, nec volutpat lacus blandit. Maecenas semper in nisl lacinia convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam laoreet ligula ut euismod efficitur. Sed bibendum magna fermentum erat semper, id faucibus justo faucibus. Sed interdum venenatis sapien. Vivamus sit amet mauris felis. In id nisl in mi cursus interdum vel vel magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam nec ante porttitor, egestas augue non, blandit enim. Nunc eget mi sed metus iaculis placerat.', 'National', 'asif seferov', '1', '2021-10-09 09:52:17', 0, '0'),
(13, '534256blog-3.jpg', 'HTML dersleri', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum, metus vel venenatis finibus, leo est porttitor nunc, eu tempor magna enim quis lorem. Nullam auctor, turpis vel tristique ultrices, nisl elit elementum lectus, sed dictum nulla dui eu leo. In elit mi, porttitor quis tellus ut, porta bibendum lectus. Aliquam pulvinar velit sit amet tortor sagittis, id ornare justo euismod. Sed id tortor arcu. Aliquam vel pellentesque sem. Mauris erat urna, ultrices ut accumsan at, tincidunt sit amet orci. Ut interdum quam at vulputate sagittis. Sed vehicula porttitor orci quis lacinia. Proin vitae laoreet magna, a blandit metus. Vivamus mi nulla, malesuada et maximus a, consequat non orci. Etiam tempor accumsan metus id consectetur. Vivamus tincidunt at quam in tincidunt.\r\n\r\nAenean et magna mauris. Nulla facilisi. Donec vitae turpis quis massa elementum rhoncus. Pellentesque id nibh fringilla, laoreet massa vehicula, mollis turpis. Etiam ultrices dictum nisi non faucibus. Nunc imperdiet malesuada feugiat. Curabitur sit amet lorem non urna maximus malesuada eu ut nulla.\r\n\r\nPraesent quis rhoncus turpis. Vivamus rutrum mattis pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In malesuada vel augue at blandit. Sed non velit dapibus, ornare enim vitae, pellentesque neque. Donec ex ipsum, interdum quis interdum sit amet, rutrum at ipsum. Sed eget nunc eget mi pharetra mollis. Vestibulum ut diam lorem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce tempor at elit eu tincidunt. Aliquam hendrerit mi nisi, quis mattis elit interdum ut.\r\n\r\nCurabitur sed lacinia enim. Sed at rhoncus mi, pulvinar tristique lorem. Aenean blandit sapien metus, tincidunt luctus nisl tempus et. Etiam varius dui eu nisi tempor mollis. Fusce in lectus et nulla condimentum consequat. Nunc lacinia interdum mi, at dapibus nisi bibendum non. Fusce id metus feugiat, scelerisque mi vitae, congue diam. Suspendisse ac lacinia eros. Nullam accumsan urna vitae diam convallis gravida sit amet non lectus. In hac habitasse platea dictumst. Fusce quis porta justo, sed accumsan mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nSuspendisse nec interdum dui. Suspendisse potenti. Vestibulum finibus ultrices eros vitae congue. Integer condimentum est faucibus mauris tincidunt, ut aliquam nunc tincidunt. Duis iaculis dui non quam interdum, nec volutpat lacus blandit. Maecenas semper in nisl lacinia convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam laoreet ligula ut euismod efficitur. Sed bibendum magna fermentum erat semper, id faucibus justo faucibus. Sed interdum venenatis sapien. Vivamus sit amet mauris felis. In id nisl in mi cursus interdum vel vel magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam nec ante porttitor, egestas augue non, blandit enim. Nunc eget mi sed metus iaculis placerat.\r\n', 'Technology', 'asif seferov', '1', '2021-10-09 09:58:34', 0, '0'),
(14, '534103blog-4.jpg', 'Javascript dersleri', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum, metus vel venenatis finibus, leo est porttitor nunc, eu tempor magna enim quis lorem. Nullam auctor, turpis vel tristique ultrices, nisl elit elementum lectus, sed dictum nulla dui eu leo. In elit mi, porttitor quis tellus ut, porta bibendum lectus. Aliquam pulvinar velit sit amet tortor sagittis, id ornare justo euismod. Sed id tortor arcu. Aliquam vel pellentesque sem. Mauris erat urna, ultrices ut accumsan at, tincidunt sit amet orci. Ut interdum quam at vulputate sagittis. Sed vehicula porttitor orci quis lacinia. Proin vitae laoreet magna, a blandit metus. Vivamus mi nulla, malesuada et maximus a, consequat non orci. Etiam tempor accumsan metus id consectetur. Vivamus tincidunt at quam in tincidunt.\r\n\r\nAenean et magna mauris. Nulla facilisi. Donec vitae turpis quis massa elementum rhoncus. Pellentesque id nibh fringilla, laoreet massa vehicula, mollis turpis. Etiam ultrices dictum nisi non faucibus. Nunc imperdiet malesuada feugiat. Curabitur sit amet lorem non urna maximus malesuada eu ut nulla.\r\n\r\nPraesent quis rhoncus turpis. Vivamus rutrum mattis pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In malesuada vel augue at blandit. Sed non velit dapibus, ornare enim vitae, pellentesque neque. Donec ex ipsum, interdum quis interdum sit amet, rutrum at ipsum. Sed eget nunc eget mi pharetra mollis. Vestibulum ut diam lorem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce tempor at elit eu tincidunt. Aliquam hendrerit mi nisi, quis mattis elit interdum ut.\r\n\r\nCurabitur sed lacinia enim. Sed at rhoncus mi, pulvinar tristique lorem. Aenean blandit sapien metus, tincidunt luctus nisl tempus et. Etiam varius dui eu nisi tempor mollis. Fusce in lectus et nulla condimentum consequat. Nunc lacinia interdum mi, at dapibus nisi bibendum non. Fusce id metus feugiat, scelerisque mi vitae, congue diam. Suspendisse ac lacinia eros. Nullam accumsan urna vitae diam convallis gravida sit amet non lectus. In hac habitasse platea dictumst. Fusce quis porta justo, sed accumsan mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nSuspendisse nec interdum dui. Suspendisse potenti. Vestibulum finibus ultrices eros vitae congue. Integer condimentum est faucibus mauris tincidunt, ut aliquam nunc tincidunt. Duis iaculis dui non quam interdum, nec volutpat lacus blandit. Maecenas semper in nisl lacinia convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam laoreet ligula ut euismod efficitur. Sed bibendum magna fermentum erat semper, id faucibus justo faucibus. Sed interdum venenatis sapien. Vivamus sit amet mauris felis. In id nisl in mi cursus interdum vel vel magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam nec ante porttitor, egestas augue non, blandit enim. Nunc eget mi sed metus iaculis placerat.', 'International', 'asif seferov', '1', '2021-10-09 10:01:06', 1, '0'),
(15, '506902menu-burger-img.jpg', 'En yaxsi yemekler bize mexsusdur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer congue ipsum a urna pellentesque, sed ornare magna suscipit. Integer id lacinia nisl. In rhoncus laoreet quam. Maecenas aliquet felis id auctor ullamcorper. Donec imperdiet rhoncus justo nec dignissim. Nullam commodo non turpis quis convallis. In mauris nibh, cursus fermentum urna at, lobortis dignissim turpis. Donec sit amet laoreet odio. Etiam luctus dolor a elit ullamcorper tincidunt. Proin quis augue sed enim vulputate molestie nec dapibus est. Praesent id rhoncus ex. Integer rhoncus mollis commodo. Proin pharetra ipsum felis, non sodales nunc convallis vel.\r\n\r\nDonec non blandit felis. Aenean aliquet aliquet facilisis. Nullam sit amet erat sit amet nisi interdum ultricies. Vivamus faucibus non sapien in finibus. Integer porta ornare turpis et tincidunt. Aliquam vitae ipsum sed ipsum euismod pharetra vitae vel nibh. Nam ultrices ornare rhoncus. Sed cursus mi vitae diam tincidunt mollis vel a augue. Duis sollicitudin mi sit amet consequat dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam iaculis quam nulla, in congue ipsum finibus eget. Curabitur eget porta dolor. Aenean accumsan tempus sem quis commodo. Etiam nec mi quis purus luctus luctus at a tortor.\r\n\r\nNulla consequat elit lectus, eu venenatis leo aliquam eget. Nam vitae tempor metus. Sed pretium, nunc sollicitudin ornare faucibus, orci ante venenatis felis, ultrices volutpat felis lorem nec dui. Quisque malesuada, diam at interdum malesuada, quam justo ullamcorper tellus, vitae lobortis enim nisi eu est. Donec sed neque fermentum, mattis turpis ut, imperdiet quam. Aliquam vestibulum porttitor turpis a fringilla. Fusce suscipit sodales arcu non pellentesque. Aliquam erat volutpat. Curabitur convallis sollicitudin nunc, sit amet luctus leo dictum sit amet. Cras arcu enim, imperdiet id tellus quis, auctor accumsan lectus.\r\n\r\nUt pharetra orci a ante dapibus, et luctus risus blandit. Etiam eleifend rhoncus volutpat. Aliquam velit ex, porttitor sed orci lobortis, cursus tempus magna. Etiam congue odio a erat fringilla, vitae porttitor sem egestas. Quisque vehicula nunc quis est luctus, et malesuada nisl iaculis. Vivamus eget ante nec quam viverra iaculis congue sed ligula. Cras lacinia porta nibh, sit amet maximus nisi posuere quis.\r\n\r\nCurabitur in turpis euismod, condimentum urna eget, pellentesque massa. Duis ac purus erat. Morbi sollicitudin lectus lacus, condimentum lobortis augue pellentesque eget. In hac habitasse platea dictumst. Sed non consectetur nulla. Aliquam neque mi, tristique et tincidunt a, malesuada ac nisl. Donec ullamcorper libero ut dolor tempus, in fermentum nisi vestibulum. Nullam placerat accumsan felis, sed pulvinar nunc efficitur sed. Vivamus tristique urna at justo condimentum, ut imperdiet nisl lobortis. Vestibulum velit metus, varius quis elit vehicula, ullamcorper laoreet lorem. Fusce placerat augue vitae quam tristique, nec lacinia quam pharetra. Maecenas id libero facilisis, tincidunt mauris sit amet, sagittis elit. Sed felis arcu, convallis non vehicula id, ornare id odio. Ut congue, turpis sit amet pellentesque cursus, ligula justo mollis urna, ut vehicula ex felis sed sapien. Pellentesque sodales eros nec lacinia mollis. Nullam dapibus ultricies nunc vel fringilla.\r\n\r\nUt dapibus non nunc sed tincidunt. Phasellus malesuada tristique purus nec iaculis. Donec quis nibh ante. Proin maximus commodo urna ut fringilla. Ut dapibus ipsum quam, eget lacinia odio vehicula nec. Curabitur in lacus turpis. Integer pellentesque blandit turpis. Donec at ipsum dignissim urna vestibulum egestas in eu leo. Nunc lacinia viverra vulputate. Donec rhoncus efficitur consequat. Duis egestas consectetur tellus nec iaculis.\r\n\r\nVivamus pulvinar purus diam, a vulputate justo tincidunt nec. Aliquam erat volutpat. Vivamus sit amet interdum eros, quis tincidunt ligula. Sed blandit pretium velit. Proin at justo justo. Maecenas pharetra dolor sit amet eros malesuada, eu lobortis arcu pulvinar. Cras quis tellus quis orci ullamcorper sollicitudin in et est. Quisque at vehicula nunc. Maecenas ultrices augue vitae feugiat volutpat. Etiam accumsan quam sapien, at porttitor odio eleifend vel. Mauris at magna ut mi elementum cursus sit amet vel ipsum. Quisque pellentesque et metus in condimentum. Sed lectus risus, suscipit a tellus quis, luctus vehicula orci. Sed risus dolor, pretium tristique mi aliquam, egestas tempor metus. Maecenas mattis urna at laoreet auctor.', 'National', 'asif seferov', '1', '2021-10-10 08:04:52', 4, '0'),
(16, '704307feature-2.jpg', 'Yemeksiz yasamaq mumukun deyil', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer congue ipsum a urna pellentesque, sed ornare magna suscipit. Integer id lacinia nisl. In rhoncus laoreet quam. Maecenas aliquet felis id auctor ullamcorper. Donec imperdiet rhoncus justo nec dignissim. Nullam commodo non turpis quis convallis. In mauris nibh, cursus fermentum urna at, lobortis dignissim turpis. Donec sit amet laoreet odio. Etiam luctus dolor a elit ullamcorper tincidunt. Proin quis augue sed enim vulputate molestie nec dapibus est. Praesent id rhoncus ex. Integer rhoncus mollis commodo. Proin pharetra ipsum felis, non sodales nunc convallis vel.\r\n\r\nDonec non blandit felis. Aenean aliquet aliquet facilisis. Nullam sit amet erat sit amet nisi interdum ultricies. Vivamus faucibus non sapien in finibus. Integer porta ornare turpis et tincidunt. Aliquam vitae ipsum sed ipsum euismod pharetra vitae vel nibh. Nam ultrices ornare rhoncus. Sed cursus mi vitae diam tincidunt mollis vel a augue. Duis sollicitudin mi sit amet consequat dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam iaculis quam nulla, in congue ipsum finibus eget. Curabitur eget porta dolor. Aenean accumsan tempus sem quis commodo. Etiam nec mi quis purus luctus luctus at a tortor.\r\n\r\nNulla consequat elit lectus, eu venenatis leo aliquam eget. Nam vitae tempor metus. Sed pretium, nunc sollicitudin ornare faucibus, orci ante venenatis felis, ultrices volutpat felis lorem nec dui. Quisque malesuada, diam at interdum malesuada, quam justo ullamcorper tellus, vitae lobortis enim nisi eu est. Donec sed neque fermentum, mattis turpis ut, imperdiet quam. Aliquam vestibulum porttitor turpis a fringilla. Fusce suscipit sodales arcu non pellentesque. Aliquam erat volutpat. Curabitur convallis sollicitudin nunc, sit amet luctus leo dictum sit amet. Cras arcu enim, imperdiet id tellus quis, auctor accumsan lectus.\r\n\r\nUt pharetra orci a ante dapibus, et luctus risus blandit. Etiam eleifend rhoncus volutpat. Aliquam velit ex, porttitor sed orci lobortis, cursus tempus magna. Etiam congue odio a erat fringilla, vitae porttitor sem egestas. Quisque vehicula nunc quis est luctus, et malesuada nisl iaculis. Vivamus eget ante nec quam viverra iaculis congue sed ligula. Cras lacinia porta nibh, sit amet maximus nisi posuere quis.\r\n\r\nCurabitur in turpis euismod, condimentum urna eget, pellentesque massa. Duis ac purus erat. Morbi sollicitudin lectus lacus, condimentum lobortis augue pellentesque eget. In hac habitasse platea dictumst. Sed non consectetur nulla. Aliquam neque mi, tristique et tincidunt a, malesuada ac nisl. Donec ullamcorper libero ut dolor tempus, in fermentum nisi vestibulum. Nullam placerat accumsan felis, sed pulvinar nunc efficitur sed. Vivamus tristique urna at justo condimentum, ut imperdiet nisl lobortis. Vestibulum velit metus, varius quis elit vehicula, ullamcorper laoreet lorem. Fusce placerat augue vitae quam tristique, nec lacinia quam pharetra. Maecenas id libero facilisis, tincidunt mauris sit amet, sagittis elit. Sed felis arcu, convallis non vehicula id, ornare id odio. Ut congue, turpis sit amet pellentesque cursus, ligula justo mollis urna, ut vehicula ex felis sed sapien. Pellentesque sodales eros nec lacinia mollis. Nullam dapibus ultricies nunc vel fringilla.\r\n\r\nUt dapibus non nunc sed tincidunt. Phasellus malesuada tristique purus nec iaculis. Donec quis nibh ante. Proin maximus commodo urna ut fringilla. Ut dapibus ipsum quam, eget lacinia odio vehicula nec. Curabitur in lacus turpis. Integer pellentesque blandit turpis. Donec at ipsum dignissim urna vestibulum egestas in eu leo. Nunc lacinia viverra vulputate. Donec rhoncus efficitur consequat. Duis egestas consectetur tellus nec iaculis.\r\n\r\nVivamus pulvinar purus diam, a vulputate justo tincidunt nec. Aliquam erat volutpat. Vivamus sit amet interdum eros, quis tincidunt ligula. Sed blandit pretium velit. Proin at justo justo. Maecenas pharetra dolor sit amet eros malesuada, eu lobortis arcu pulvinar. Cras quis tellus quis orci ullamcorper sollicitudin in et est. Quisque at vehicula nunc. Maecenas ultrices augue vitae feugiat volutpat. Etiam accumsan quam sapien, at porttitor odio eleifend vel. Mauris at magna ut mi elementum cursus sit amet vel ipsum. Quisque pellentesque et metus in condimentum. Sed lectus risus, suscipit a tellus quis, luctus vehicula orci. Sed risus dolor, pretium tristique mi aliquam, egestas tempor metus. Maecenas mattis urna at laoreet auctor.', 'Lifestyle', 'asif seferov', '1', '2021-10-10 08:19:56', 4, '0'),
(17, '141398carousel-1.jpg', 'Php ile seifelemi nece edilir?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt nibh erat, et gravida felis fermentum et. Aenean congue velit sit amet magna bibendum, non rutrum elit luctus. Phasellus rutrum aliquam felis, vel sollicitudin justo pretium at. Duis sagittis consequat ante, vitae lacinia nisl eleifend ut. Mauris vehicula tincidunt congue. In nec congue mauris. In dui tortor, pulvinar ut condimentum at, pretium et nisi. Quisque mattis elit vitae dolor mattis malesuada. Quisque quis nunc urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ornare magna nunc, vel maximus arcu aliquet non. Nunc laoreet lobortis suscipit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sit amet ex vitae purus efficitur pharetra ut vitae enim. Quisque a arcu mauris.\r\n\r\nVivamus interdum metus sem, sed luctus mi egestas sed. Aenean eget odio id nulla ultrices tincidunt eget eu lorem. Donec dignissim nec est nec tempor. Sed congue dui vehicula, egestas dolor eu, tincidunt est. Sed porttitor mattis odio, a suscipit libero dictum in. Sed a faucibus ex. Etiam imperdiet nunc arcu, fringilla pharetra ligula pellentesque a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ultricies faucibus elit, non ultrices felis lacinia sit amet. Vestibulum convallis malesuada ligula vel suscipit. Fusce facilisis rutrum velit, in ultricies urna efficitur at. Vivamus eu ultrices velit. Fusce ex nisl, euismod a vulputate id, hendrerit at magna.\r\n\r\nCurabitur dapibus orci sed turpis dignissim aliquet. Aliquam sollicitudin pretium leo. Etiam sodales justo quis bibendum luctus. Donec finibus turpis auctor justo iaculis sagittis. Aenean ultricies libero vel turpis feugiat, nec ornare risus dignissim. Suspendisse lacinia felis in nisl iaculis ultrices. Fusce mattis vulputate augue non rutrum. Suspendisse sed pharetra est. Donec vulputate accumsan pretium.\r\n\r\nMaecenas tincidunt ac sem quis egestas. Curabitur cursus felis in ligula fermentum tincidunt. Integer eleifend arcu at turpis ultrices fermentum. Sed bibendum euismod magna scelerisque ullamcorper. Pellentesque non faucibus ante, et finibus mi. Fusce egestas nec urna et tempor. Quisque tempus congue massa in venenatis. Donec eu lacus odio. Vestibulum a nisl at ante accumsan maximus.\r\n\r\nUt quis tellus gravida, laoreet massa id, feugiat tellus. Nulla facilisi. Morbi luctus gravida iaculis. Sed feugiat orci turpis, ut pulvinar felis luctus eu. Morbi hendrerit viverra tortor quis rutrum. Vivamus vel ornare ante. Proin diam augue, maximus sed neque vitae, maximus luctus purus. Quisque aliquam odio sed nulla maximus blandit. In viverra cursus sagittis.\r\n\r\nQuisque elementum posuere metus, quis gravida sem finibus ac. Fusce et volutpat sem. Ut euismod in erat condimentum hendrerit. Nulla at est eu mi malesuada aliquam. Praesent posuere neque cursus dapibus interdum. Ut vitae erat pellentesque, consectetur lectus a, dapibus elit. Duis arcu dui, tristique eget condimentum et, bibendum in augue. Nullam vitae vestibulum nulla, non elementum nisi. Sed laoreet est quis nunc tempor fringilla. Aenean iaculis risus non erat pellentesque eleifend. Nulla et porta nisi, nec luctus erat. Suspendisse commodo turpis vel arcu pharetra, quis porta ipsum condimentum. Aenean eros felis, hendrerit non pellentesque sit amet, pulvinar a risus. Curabitur iaculis non erat a dictum. Donec sodales fermentum erat sed aliquet. Vivamus elementum semper massa, in rutrum turpis ornare id.', 'Politics', 'asif seferov', '1', '2021-10-13 19:58:06', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `person_ID` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(200) DEFAULT NULL,
  `person_email` varchar(200) DEFAULT NULL,
  `person_mobile` varchar(200) DEFAULT NULL,
  `person_date` varchar(50) DEFAULT NULL,
  `person_time` varchar(50) DEFAULT NULL,
  `person_guest` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`person_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`person_ID`, `person_name`, `person_email`, `person_mobile`, `person_date`, `person_time`, `person_guest`) VALUES
(15, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '4:09 PM', '7'),
(16, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '4:09 PM', '7'),
(17, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '4:09 PM', '7'),
(18, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '5:38 PM', '2'),
(19, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '5:44 PM', '1'),
(20, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '5:46 PM', '5'),
(21, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '5:49 PM', '8'),
(22, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '5:50 PM', '1'),
(23, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '5:53 PM', '4'),
(24, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '5:55 PM', '7'),
(25, 'asif', 'asif_seferov_1995@mail.ru', '055-940-66-10', '09/25/2021', '5:55 PM', '7');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) DEFAULT NULL,
  `category_num` int(11) DEFAULT NULL,
  `category_active` varchar(1) NOT NULL DEFAULT '0',
  `category_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_num`, `category_active`, `category_date`) VALUES
(1, 'National', 1, '1', '2021-10-05 20:19:49'),
(2, 'International', 2, '1', '2021-10-05 20:21:21'),
(3, 'Economics', 3, '1', '2021-10-05 20:36:03'),
(4, 'Politics', 4, '1', '2021-10-05 20:37:00'),
(5, 'Lifestyle', 5, '1', '2021-10-05 20:51:26'),
(16, 'Technology', 7, '1', '2021-10-10 07:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `cheaf_team`
--

DROP TABLE IF EXISTS `cheaf_team`;
CREATE TABLE IF NOT EXISTS `cheaf_team` (
  `team_ID` int(11) NOT NULL AUTO_INCREMENT,
  `team_img` varchar(200) NOT NULL,
  `team_person` varchar(300) NOT NULL,
  `team_person_position` varchar(400) NOT NULL,
  `team_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `team_active` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`team_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cheaf_team`
--

INSERT INTO `cheaf_team` (`team_ID`, `team_img`, `team_person`, `team_person_position`, `team_date`, `team_active`) VALUES
(10, '145653team-1.jpg', 'Adam Phillips', 'CEO, Co Founder', '2021-10-17 17:23:28', '1'),
(11, '268904team-2.jpg', 'Dylan Adams', 'Master Chef', '2021-10-17 17:24:07', '1'),
(12, '196541team-3.jpg', 'Jhon Doe', 'Master Chef', '2021-10-17 17:24:44', '1'),
(13, '904157team-4.jpg', 'Josh Dunn', 'Master Chef', '2021-10-17 17:25:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_user` varchar(200) DEFAULT NULL,
  `comment_email` varchar(250) DEFAULT NULL,
  `comment_article_id` int(11) NOT NULL,
  `comment_message` text,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_active` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_user`, `comment_email`, `comment_article_id`, `comment_message`, `comment_date`, `comment_active`) VALUES
(1, 'mehmet', 'mehmet@mail.ru', 17, 'Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst.', '2021-10-14 18:51:59', '0'),
(2, 'ƏVƏZ', 'hezi.mamedov.93@mail.ru', 16, 'Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst.', '2021-10-14 18:54:35', '0'),
(3, 'aydin', 'aydin@mail.ru', 16, 'Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst.', '2021-10-14 18:58:29', '0'),
(4, 'cemil', 'kenan@mail.ru', 16, 'Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst.', '2021-10-14 19:01:58', '0'),
(5, 'aydin', 'asif_seferov_1995@mail.ru', 14, 'Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst.', '2021-10-14 20:52:08', '0'),
(6, 'mehmet23', 'mehmet@mail.ru', 12, 'Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst.', '2021-10-16 07:23:53', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `user_subject` varchar(500) NOT NULL,
  `user_message` varchar(1500) NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `contact_heading` varchar(250) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_blog`
--

DROP TABLE IF EXISTS `food_blog`;
CREATE TABLE IF NOT EXISTS `food_blog` (
  `food_blog_ID` int(11) NOT NULL AUTO_INCREMENT,
  `food_blog_name` varchar(200) NOT NULL,
  `food_blog_heading` varchar(300) NOT NULL,
  `food_blog_img` varchar(300) NOT NULL,
  `food_blog_head` varchar(200) NOT NULL,
  `food_blog_user` varchar(250) NOT NULL,
  PRIMARY KEY (`food_blog_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

DROP TABLE IF EXISTS `food_menu`;
CREATE TABLE IF NOT EXISTS `food_menu` (
  `food_menu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `food_menu_name` varchar(200) NOT NULL,
  `food_menu_heading` varchar(300) NOT NULL,
  `btn_bg` varchar(150) NOT NULL,
  `btn_hover` varchar(200) NOT NULL,
  `btn_1_text` varchar(200) NOT NULL,
  `btn_2_text` varchar(200) NOT NULL,
  `btn_3_text` varchar(200) NOT NULL,
  `btn_img_1` varchar(250) NOT NULL,
  `btn_img_2` varchar(250) NOT NULL,
  PRIMARY KEY (`food_menu_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_blogs`
--

DROP TABLE IF EXISTS `menu_blogs`;
CREATE TABLE IF NOT EXISTS `menu_blogs` (
  `menu_blog_ID` int(11) NOT NULL AUTO_INCREMENT,
  `menu_blog_icon` varchar(200) NOT NULL,
  `menu_blog_heading` varchar(300) NOT NULL,
  `menu_blog_text` varchar(1500) NOT NULL,
  PRIMARY KEY (`menu_blog_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `is_active` tinyint(2) DEFAULT NULL,
  `logo` varchar(200) NOT NULL,
  `logo_2` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `s_tw` varchar(100) NOT NULL,
  `s_fb` varchar(100) NOT NULL,
  `s_ins` varchar(100) NOT NULL,
  `s_yt` varchar(100) NOT NULL,
  `s_in` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`is_active`, `logo`, `logo_2`, `address`, `phone`, `mail`, `s_tw`, `s_fb`, `s_ins`, `s_yt`, `s_in`) VALUES
(NULL, '', '', '', '', '', '', '', '', '', ''),
(NULL, '', '', '', '', '', '', '', '', '', ''),
(NULL, '', '', '', '', '', '', '', '', '', ''),
(NULL, '', '', '', '', '', '', '', '', '', ''),
(NULL, '', '', '', '', '', '', '', '', '', ''),
(NULL, '', '', '', '', '', '', '', '', '', ''),
(NULL, '', '', '', '', '', '', '', '', '', ''),
(NULL, '', '', '', '', '', '', '', '', '', ''),
(NULL, 'Burger', 'King', '', '', '', '', '', '', '', ''),
(NULL, '', '', '123 Street, New York, USA', '+012 345 67890', 'info@example.com', '', '', '', '', ''),
(NULL, '', '', '', '', '', '', '', '', '', ''),
(NULL, '', '', '', '', '', 'fab fa-twitter', 'fab fa-facebook-f', 'fab fa-instagram', 'fab fa-youtube', 'fab fa-linkedin-in');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `btn_color_1` varchar(300) DEFAULT NULL,
  `btn_text_1` varchar(200) DEFAULT NULL,
  `btn_text_2` varchar(300) DEFAULT NULL,
  `btn_color_2` varchar(200) DEFAULT NULL,
  `btn_status_1` varchar(1) NOT NULL DEFAULT '0',
  `btn_status_2` varchar(1) NOT NULL DEFAULT '0',
  `rank` varchar(1) NOT NULL DEFAULT '0',
  `isActive` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `btn_url_1` varchar(300) DEFAULT NULL,
  `btn_url_2` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img`, `title`, `description`, `btn_color_1`, `btn_text_1`, `btn_text_2`, `btn_color_2`, `btn_status_1`, `btn_status_2`, `rank`, `isActive`, `created`, `updated`, `btn_url_1`, `btn_url_2`) VALUES
(24, '223193carousel-1.jpg', 'Best Quality Ingredients', ' Lorem ipsum dolor sit amet elit. Phasellus ut mollis mauris. Vivamus egestas eleifend dui ac consequat at lectus in malesuada', '#6982dd', 'View Menu', 'Book Table', '#719a0a', '1', '1', '1', 'aktiv', '2021-09-16 12:09:18', '2021-09-16 12:09:18', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider_carousel`
--

DROP TABLE IF EXISTS `slider_carousel`;
CREATE TABLE IF NOT EXISTS `slider_carousel` (
  `slider_ID` int(11) NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(200) NOT NULL,
  `slider_img` varchar(350) NOT NULL,
  `slider_text` varchar(500) NOT NULL,
  `slider_position` varchar(300) NOT NULL,
  PRIMARY KEY (`slider_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
