use info_watch_test;

CREATE TABLE IF NOT EXISTS sources (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    url varchar(32) NOT NULL,
    image varchar(255),
    description text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;