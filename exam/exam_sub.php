<?php
session_start();
$inactive = 600;

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['start'];
    if ($session_life > $inactive) {
        header("Location: ../logout.php");
    }
}
$_SESSION['timeout'] = time();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Jordan King">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="quiz.css" />
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">

    <title>Exam</title>
</head>

<body onload="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="quiz.js"></script>
    <?php
include 'exam_header.php';
?>
    <section class="quiz_area">


        <?php
$user_id = $_SESSION['user_id'];
            $servername = "localhost";
              $username = "user";
              $password = "password";
              $dbname = "Final";

          // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }



              $answers = array();
              for ($i = 1 ; $i <= 10; $i++) {
                  if (isset($_POST["{$i}"])) {
                      array_push($answers, $_POST["{$i}"]);
                  }
              }


      $questions_correct = 0;

      $get_question_sql = "SELECT * FROM examQuestionInfo";
      $result = mysqli_query($conn, $get_question_sql);
      while ($row = $result->fetch_assoc()) {
          $question_index = $row['id'];
          if ($_POST[$question_index] == $row['correct_answer']) {
              $questions_correct++;
          }
      }
      $questions_wrong = 10 - $questions_correct;
      echo "<h2>Your Score</h2>";
      echo "<p>Your score was {$questions_correct} out of 10!</p>";
      if ($questions_correct >= 5) {
          echo "<h2>Congrats!</h2>";
          echo "<p>You passed the exam!</p>";
          echo "<p>You may retake your exam by restarting it on the Restart Exam page.</p>";
      } else {
          echo "<p>Sorry, it looks like you failed your admission exam.</p>";
          echo "<p>You may retake your exam by restarting it on the Restart Exam page.</p>";
      }
      $sql_update = "UPDATE userExamInfo SET num_total_correct_quest={$questions_correct}, num_total_wrong_quest={$questions_wrong} WHERE id='{$user_id}'";
      mysqli_query($conn, $sql_update);

        ?>



        <div class="buttons">
        	<br>
        <a class="pure-button pure-button-primary" href="exam_index.php">Back</a>
        <br>
        </div>



    </section>


</body>

</html>
