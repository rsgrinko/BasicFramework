CREATE TABLE `messages` (
  `id` int(128) NOT NULL,
  `message_from` varchar(128) DEFAULT NULL,
  `message_to` varchar(128) DEFAULT NULL,
  `message` varchar(512) DEFAULT NULL,
  `time` varchar(128) DEFAULT NULL,
  `new` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `messages`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
