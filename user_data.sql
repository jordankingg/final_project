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
    NumCorrectQuest INT,
    NumWrongQuest INT,
    time_ VARCHAR(50),
    As_Actived BOOLEAN,
    PRIMARY KEY(id));
