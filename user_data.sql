CREATE DATABASE IF NOT EXISTS Final;
USE Final;

DROP TABLE IF EXISTS userInfo;

 CREATE TABLE userInfo(
    id INT  UNSIGNED AUTO_INCREMENT,
    lastname VARCHAR (30)  NOT NULL,
    firstname VARCHAR (30) NOT NULL,
    email VARCHAR (50) NOT NULL,
    username VARCHAR (30)  NOT NULL,
    password VARCHAR (30) NOT NULL,
    num_correct_quest INT,
    num_wrong_quest INT,
    time_ VARCHAR(50),
    has_Actived BOOLEAN,
    token1 VARCHAR(20),
    token2 VARCHAR(20),
    PRIMARY KEY(id));
