CREATE DATABASE IF NOT EXISTS Final;
USE Final;

DROP TABLE IF EXISTS userInfo;
CREATE TABLE userInfo(
    id INT UNSIGNED AUTO_INCREMENT UNIQUE,
    lastname VARCHAR (30)  NOT NULL,
    firstname VARCHAR (30) NOT NULL,
    email VARCHAR (50) NOT NULL,
    username VARCHAR (30)  NOT NULL,
    password VARCHAR (30) NOT NULL,
    time_ VARCHAR(50),
    has_Actived BOOLEAN,
    token1 VARCHAR(20),
    token2 VARCHAR(20),
    password_reset_token VARCHAR(20),
    num_correct_quest INT,
    num_wrong_quest INT,
    PRIMARY KEY(id)
  );

DROP TABLE IF EXISTS userExamInfo;
CREATE TABLE userExamInfo(
    id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED UNIQUE NOT NULL,
    num_total_correct_quest INT,
    num_total_wrong_quest INT,
    num_js_correct_quest INT,
    num_php_correct_quest INT,
    PRIMARY KEY(id)
  );

DROP TABLE IF EXISTS examQuestionInfo;
CREATE TABLE examQuestionInfo(
    id INT UNSIGNED AUTO_INCREMENT,
    question VARCHAR(200),
    question_type VARCHAR(5),
    choice_a VARCHAR(200),
    choice_b VARCHAR(200),
    choice_c VARCHAR(200),
    choice_d VARCHAR(200),
    correct_answer CHAR(1),
    PRIMARY KEY(id)
);

INSERT INTO examQuestionInfo (question, question_type, choice_a, choice_b, choice_c, choice_d, correct_answer)
VALUES ('What does the method, console.log() do?', 'js',  "Opens your computer\'s terminal", 'Logs a message to the console', 'Prints out all local variables', 'Nothing', 'A');
INSERT INTO examQuestionInfo (question, question_type, choice_a, choice_b, choice_c, choice_d, correct_answer)
VALUES ('How would you include the local JavaScript file, script.js?', 'js',  "<javascript src='script.js'>", "<javascript src='script.js'></javascript>", "<script src='script.js'></script>", "<script src='script.js'>", 'C'); 

/*
ALTER TABLE userInfo ADD FOREIGN KEY(id) REFERENCES userExamInfo(user_id);
ALTER TABLE userExamInfo ADD FOREIGN KEY(user_id) REFERENCES userExamInfo(id);
*/
