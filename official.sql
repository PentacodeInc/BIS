-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2015 at 04:42 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bis`
--

-- --------------------------------------------------------

--
-- Table structure for table `official`
--

CREATE TABLE IF NOT EXISTS `official` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `position` varchar(100) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `picture` varchar(100) DEFAULT NULL,
  `about` longtext,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_OFFICIAL_USER` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `official`
--

INSERT INTO `official` (`id`, `name`, `position`, `level`, `picture`, `about`, `user_id`) VALUES
(1, 'Maricris Versoza Mercado', 'Punog Barangay', 1, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque libero mi, iaculis non ultrices condimentum, cursus at ligula. Nullam pellentesque dignissim tempor. Etiam a dictum ex. Nunc congue sagittis aliquam. Integer rhoncus scelerisque nulla. Cras enim massa, convallis ac aliquet nec, dictum vitae nisl. Vivamus ultricies faucibus lacinia. Vivamus vitae nulla sed eros sollicitudin ullamcorper.<br><br>Ut suscipit auctor magna quis ullamcorper. Vestibulum lorem elit, vulputate quis ipsum in, pharetra imperdiet turpis. Praesent hendrerit dolor sed dolor vehicula lobortis. Nullam eu nulla vestibulum, porta sem sit amet, tristique velit. Pellentesque cursus condimentum metus sit amet elementum. Sed justo mauris, venenatis quis vestibulum sed, mattis eu tortor. Nulla facilisi. Nulla quam justo, scelerisque a lacinia et, maximus vitae lorem.', 1),
(3, 'Antonio Abad', 'Kagawad', 2, NULL, 'Nam et orci metus. Nunc pulvinar sem nulla, ut dapibus magna vehicula eu. Mauris auctor lectus nibh, et consequat diam convallis nec. Morbi pulvinar justo at est vulputate eleifend. Nulla imperdiet commodo cursus. Mauris dapibus risus sed malesuada finibus. Morbi porttitor fermentum est, quis tempor erat posuere quis. Fusce auctor magna non sem tincidunt, id lobortis nisi tincidunt. Integer eu varius elit, eu tristique arcu.<br><br>Quisque quis nisi elementum, rhoncus est ac, maximus massa. Aliquam congue risus diam, non semper quam ultrices non. Aenean porta euismod dui ac lacinia. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ullamcorper scelerisque nisl ac lacinia. Fusce aliquet, nisl vitae mattis scelerisque, lacus nisi convallis justo, quis hendrerit est elit sit amet nisl. Nunc convallis dolor arcu, id varius est posuere non. Etiam ut ultrices velit.', 1),
(4, 'Ma. Lilysa Castillo', 'Kagawad', 2, NULL, 'Nam et orci metus. Nunc pulvinar sem nulla, ut dapibus magna vehicula eu. Mauris auctor lectus nibh, et consequat diam convallis nec. Morbi pulvinar justo at est vulputate eleifend. Nulla imperdiet commodo cursus. Mauris dapibus risus sed malesuada finibus. Morbi porttitor fermentum est, quis tempor erat posuere quis. Fusce auctor magna non sem tincidunt, id lobortis nisi tincidunt. Integer eu varius elit, eu tristique arcu.<br><br>Quisque quis nisi elementum, rhoncus est ac, maximus massa. Aliquam congue risus diam, non semper quam ultrices non. Aenean porta euismod dui ac lacinia. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ullamcorper scelerisque nisl ac lacinia. Fusce aliquet, nisl vitae mattis scelerisque, lacus nisi convallis justo, quis hendrerit est elit sit amet nisl. Nunc convallis dolor arcu, id varius est posuere non. Etiam ut ultrices velit.', 1),
(5, 'Leonila Del Rosario\r\n', 'Kagawad', 2, NULL, 'Nam et orci metus. Nunc pulvinar sem nulla, ut dapibus magna vehicula eu. Mauris auctor lectus nibh, et consequat diam convallis nec. Morbi pulvinar justo at est vulputate eleifend. Nulla imperdiet commodo cursus. Mauris dapibus risus sed malesuada finibus. Morbi porttitor fermentum est, quis tempor erat posuere quis. Fusce auctor magna non sem tincidunt, id lobortis nisi tincidunt. Integer eu varius elit, eu tristique arcu.<br><br>Quisque quis nisi elementum, rhoncus est ac, maximus massa. Aliquam congue risus diam, non semper quam ultrices non. Aenean porta euismod dui ac lacinia. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ullamcorper scelerisque nisl ac lacinia. Fusce aliquet, nisl vitae mattis scelerisque, lacus nisi convallis justo, quis hendrerit est elit sit amet nisl. Nunc convallis dolor arcu, id varius est posuere non. Etiam ut ultrices velit.', 1),
(6, 'Nicolas Martinez\r\n', 'Kagawad', 2, NULL, 'Nam et orci metus. Nunc pulvinar sem nulla, ut dapibus magna vehicula eu. Mauris auctor lectus nibh, et consequat diam convallis nec. Morbi pulvinar justo at est vulputate eleifend. Nulla imperdiet commodo cursus. Mauris dapibus risus sed malesuada finibus. Morbi porttitor fermentum est, quis tempor erat posuere quis. Fusce auctor magna non sem tincidunt, id lobortis nisi tincidunt. Integer eu varius elit, eu tristique arcu.<br><br>Quisque quis nisi elementum, rhoncus est ac, maximus massa. Aliquam congue risus diam, non semper quam ultrices non. Aenean porta euismod dui ac lacinia. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ullamcorper scelerisque nisl ac lacinia. Fusce aliquet, nisl vitae mattis scelerisque, lacus nisi convallis justo, quis hendrerit est elit sit amet nisl. Nunc convallis dolor arcu, id varius est posuere non. Etiam ut ultrices velit.', 1),
(7, 'Manuel Gardose\r\n', 'Kagawad', 2, NULL, 'Nam et orci metus. Nunc pulvinar sem nulla, ut dapibus magna vehicula eu. Mauris auctor lectus nibh, et consequat diam convallis nec. Morbi pulvinar justo at est vulputate eleifend. Nulla imperdiet commodo cursus. Mauris dapibus risus sed malesuada finibus. Morbi porttitor fermentum est, quis tempor erat posuere quis. Fusce auctor magna non sem tincidunt, id lobortis nisi tincidunt. Integer eu varius elit, eu tristique arcu.<br><br>Quisque quis nisi elementum, rhoncus est ac, maximus massa. Aliquam congue risus diam, non semper quam ultrices non. Aenean porta euismod dui ac lacinia. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ullamcorper scelerisque nisl ac lacinia. Fusce aliquet, nisl vitae mattis scelerisque, lacus nisi convallis justo, quis hendrerit est elit sit amet nisl. Nunc convallis dolor arcu, id varius est posuere non. Etiam ut ultrices velit.', 1),
(8, 'Ma. Cristina Dimayacyac ', 'Kagawad', 2, NULL, 'Nam et orci metus. Nunc pulvinar sem nulla, ut dapibus magna vehicula eu. Mauris auctor lectus nibh, et consequat diam convallis nec. Morbi pulvinar justo at est vulputate eleifend. Nulla imperdiet commodo cursus. Mauris dapibus risus sed malesuada finibus. Morbi porttitor fermentum est, quis tempor erat posuere quis. Fusce auctor magna non sem tincidunt, id lobortis nisi tincidunt. Integer eu varius elit, eu tristique arcu.<br><br>Quisque quis nisi elementum, rhoncus est ac, maximus massa. Aliquam congue risus diam, non semper quam ultrices non. Aenean porta euismod dui ac lacinia. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ullamcorper scelerisque nisl ac lacinia. Fusce aliquet, nisl vitae mattis scelerisque, lacus nisi convallis justo, quis hendrerit est elit sit amet nisl. Nunc convallis dolor arcu, id varius est posuere non. Etiam ut ultrices velit.', 1),
(9, '\r\nRoselia Andrade', 'Kagawad', 2, NULL, 'Nam et orci metus. Nunc pulvinar sem nulla, ut dapibus magna vehicula eu. Mauris auctor lectus nibh, et consequat diam convallis nec. Morbi pulvinar justo at est vulputate eleifend. Nulla imperdiet commodo cursus. Mauris dapibus risus sed malesuada finibus. Morbi porttitor fermentum est, quis tempor erat posuere quis. Fusce auctor magna non sem tincidunt, id lobortis nisi tincidunt. Integer eu varius elit, eu tristique arcu.<br><br>Quisque quis nisi elementum, rhoncus est ac, maximus massa. Aliquam congue risus diam, non semper quam ultrices non. Aenean porta euismod dui ac lacinia. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In ullamcorper scelerisque nisl ac lacinia. Fusce aliquet, nisl vitae mattis scelerisque, lacus nisi convallis justo, quis hendrerit est elit sit amet nisl. Nunc convallis dolor arcu, id varius est posuere non. Etiam ut ultrices velit.', 1),
(10, 'Rafoncel Delos Reyes ', 'Secretary', 3, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque libero mi, iaculis non ultrices condimentum, cursus at ligula. Nullam pellentesque dignissim tempor. Etiam a dictum ex. Nunc congue sagittis aliquam. Integer rhoncus scelerisque nulla. Cras enim massa, convallis ac aliquet nec, dictum vitae nisl. Vivamus ultricies faucibus lacinia. Vivamus vitae nulla sed eros sollicitudin ullamcorper.<br><br>Ut suscipit auctor magna quis ullamcorper. Vestibulum lorem elit, vulputate quis ipsum in, pharetra imperdiet turpis. Praesent hendrerit dolor sed dolor vehicula lobortis. Nullam eu nulla vestibulum, porta sem sit amet, tristique velit. Pellentesque cursus condimentum metus sit amet elementum. Sed justo mauris, venenatis quis vestibulum sed, mattis eu tortor. Nulla facilisi. Nulla quam justo, scelerisque a lacinia et, maximus vitae lorem.', 1),
(11, 'Bernadette Bautista ', 'Treasurer', 3, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque libero mi, iaculis non ultrices condimentum, cursus at ligula. Nullam pellentesque dignissim tempor. Etiam a dictum ex. Nunc congue sagittis aliquam. Integer rhoncus scelerisque nulla. Cras enim massa, convallis ac aliquet nec, dictum vitae nisl. Vivamus ultricies faucibus lacinia. Vivamus vitae nulla sed eros sollicitudin ullamcorper.<br><br>Ut suscipit auctor magna quis ullamcorper. Vestibulum lorem elit, vulputate quis ipsum in, pharetra imperdiet turpis. Praesent hendrerit dolor sed dolor vehicula lobortis. Nullam eu nulla vestibulum, porta sem sit amet, tristique velit. Pellentesque cursus condimentum metus sit amet elementum. Sed justo mauris, venenatis quis vestibulum sed, mattis eu tortor. Nulla facilisi. Nulla quam justo, scelerisque a lacinia et, maximus vitae lorem.', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `official`
--
ALTER TABLE `official`
  ADD CONSTRAINT `fk_official_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
