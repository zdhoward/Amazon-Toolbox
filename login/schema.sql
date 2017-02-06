CREATE DATABASE todo;

USE todo;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_registered` datetime NOT NULL default '0000-00-00 00:00:00',  
  PRIMARY KEY (`user_id`),
  KEY `idx_user_login_key` (`user_login`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL REFERENCES `users`(`user_id`),
  `task_name` varchar(60) NOT NULL,
  `task_priority` tinyint(2) NOT NULL default '2',
  `task_color` varchar(7) NOT NULL default '#ffffff',
  `task_description` varchar(150) NULL,
  `task_attendees` varchar(4000) NULL,
  `task_date` datetime NOT NULL default '0000-00-00 00:00:00',  
  PRIMARY KEY (`task_id`),
  KEY `idx_task_name_key` (`task_name`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


INSERT INTO `users` ( `user_login`, `user_password`, `user_firstname`, 
	`user_surname`, `user_email`, `user_registered` )
SELECT 'developerdrive', PASSWORD('to-do-password'), 'developer',
	'drive', 'developer@email.com', NOW();
	
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL REFERENCES `users`(`user_id`),
  `session_key` varchar(60) NOT NULL,
  `session_address` varchar(100) NOT NULL,
  `session_useragent` varchar(200) NOT NULL,
  `session_expires` datetime NOT NULL default '0000-00-00 00:00:00',  
  PRIMARY KEY (`session_id`),
  KEY `idx_session_key` (`session_key`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;