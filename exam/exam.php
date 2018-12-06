<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Jordan King">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css" />
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
    <section class="content_center">

        <form id="exam_form" method="post" action="exam_sub.php" class='pure-form pure-form-aligned'>
        <?php



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
      $question_num = 1;
      $get_question_sql = "SELECT * FROM examQuestionInfo";
      $result = mysqli_query($conn, $get_question_sql);
      while ($row = $result->fetch_assoc()) {
          echo "<b>{$question_num}: {$row['question']} </b><br><br>";

          echo "<fieldset id='group{$question_num}' >

          <input type='radio' name='{$question_num}' id='A{$question_num}' value='A' required><label for='A{$question_num}'><b>A:</b><xmp> {$row['choice_a']}</xmp></label> <br>
          <input type='radio' name='{$question_num}' id='B{$question_num}' value='B'><label for='B{$question_num}'><b>B:</b> <xmp>{$row['choice_b']}</xmp></label> <br>
          <input type='radio' name='{$question_num}' id='C{$question_num}' value='C'><label for='C{$question_num}'><b>C:</b> <xmp> {$row['choice_c']}</xmp></label> <br>
          <input type='radio' name='{$question_num}' id='D{$question_num}' value='D'><label for='D{$question_num}'><b>D:</b> <xmp>{$row['choice_d']}</xmp></label><br>
          </fieldset>
          <br>";
          $question_num++;
      }
        ?>
        <input class="pure-button pure-button-primary" type='submit' name='submit' id='submit' value='Submit Exam'>
      </form>
<div class="buttons">


</div>






    </section>


</body>

</html>
