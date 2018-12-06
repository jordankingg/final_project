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

INSERT INTO examQuestionInfo (question, question_type, choice_a, choice_b, choice_c, choice_d, correct_answer)
VALUES ('How do you correctly instantiate an array in JavaScript?', 'js',  "var food = ['sandwich' . 'strawberry' . 'chips'];", "var food = ['sandwich', 'strawberry', 'chips'];", "var food = 'sandwich', 'strawberry', 'chips';", "var food = ('sandwich', 'strawberry', 'chips');", 'B');

INSERT INTO examQuestionInfo (question, question_type, choice_a, choice_b, choice_c, choice_d, correct_answer)
VALUES ('Which of the following displays a dialog with an optional message prompting the user to input text?', 'js',  "prompt(message, default);", 'Console.log(message);', 'alert(message);', 'confirm()', 'A');

INSERT INTO examQuestionInfo (question, question_type, choice_a, choice_b, choice_c, choice_d, correct_answer)
VALUES ('Variables are declared in JavaScript with which of the following keywords?', 'js',  "new", 'variable', 'js', 'var', 'D');

INSERT INTO examQuestionInfo (question, question_type, choice_a, choice_b, choice_c, choice_d, correct_answer)
VALUES ('Why would you use GET over POST?', 'php',  "GET URLs can be bookmarked", 'Parameters are not saved in browser history.', 'GET is more secure than POST', 'There are no restrictions on URL length', 'A');

INSERT INTO examQuestionInfo (question, question_type, choice_a, choice_b, choice_c, choice_d, correct_answer)
VALUES ('Which of the following is a comment in PHP?', 'php',  "/* */", '//', '#', 'All of the above', 'D');

INSERT INTO examQuestionInfo (question, question_type, choice_a, choice_b, choice_c, choice_d, correct_answer)
VALUES ('Which of the following is not a valid PHP comparison operator?', 'php', "<=>", "!=", '>=', 'None of the above', 'A');

INSERT INTO examQuestionInfo (question, question_type, choice_a, choice_b, choice_c, choice_d, correct_answer)
VALUES ('Which of the following is NOT valid in PHP?', 'echo(\'hi\');',  "echo 'hi';", '//', '#', 'All of the above', 'D');
/*
ALTER TABLE userInfo ADD FOREIGN KEY(id) REFERENCES userExamInfo(user_id);
ALTER TABLE userExamInfo ADD FOREIGN KEY(user_id) REFERENCES userExamInfo(id);
*/
