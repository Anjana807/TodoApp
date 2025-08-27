
CREATE DATABASE sampletodo;

USE sampletodo;

CREATE TABLE `todo` (
  `todoid` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
);

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(20) NOT NULL
);

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'anjana@gmail.com', 'anjana');


ALTER TABLE `todo`
  ADD PRIMARY KEY (`todoid`),
  ADD KEY `userid` (`userid`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `todo`
  MODIFY `todoid` int(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;


ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

