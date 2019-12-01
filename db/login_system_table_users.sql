
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(255) COLLATE utf8_bin NOT NULL,
  `surname` char(255) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
