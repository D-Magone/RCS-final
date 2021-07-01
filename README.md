# RCS-final

Register, Login, To-do List



Database setup:



CREATE DATABASE **to_do_list**;

CREATE TABLE `task` ( `id` int(255) NOT NULL AUTO_INCREMENT, `description` varchar(500) NOT NULL, `user_id` int(255) NOT NULL, `done` tinyint(1) unsigned NOT NULL DEFAULT 0, PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4; CREATE TABLE `user` ( `id` int(11) NOT NULL AUTO_INCREMENT, `email` varchar(200) NOT NULL, `password` varchar(250) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4; 
