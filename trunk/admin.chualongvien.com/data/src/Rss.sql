CREATE TABLE IF NOT EXISTS `chualongvien_news_rss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `id_rss` int(11) DEFAULT NULL,
  `author` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` longtext NOT NULL,
  `title` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `key` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_field` (`id_category`, `id_rss`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `chualongvien_rss_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT, 
  `name` varchar(50) NOT NULL,  
  `weburl` longtext NOT NULL,
  `rssurl` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `enable` int(11) NOT NULL DEFAULT '1', 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `chualongvien_news_rss`
  ADD CONSTRAINT `chualongvien_news_rss_1` FOREIGN KEY (`id_category`) REFERENCES `chualongvien_category_news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chualongvien_news_rss_2` FOREIGN KEY (`id_rss`) REFERENCES `chualongvien_rss_link` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
