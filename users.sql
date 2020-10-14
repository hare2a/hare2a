-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`username` varchar(5) NOT NULL,
	`password` varchar(5) NOT NULL,
	`salt` varchar(5) NOT NULL,
	`email` varchar(5) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
