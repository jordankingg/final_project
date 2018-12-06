<?php
session_start();
?>
<!DOCTYPE html>
<head>
	<title>Web Programming Exam</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
  <script src="http://parsleyjs.org/dist/parsley.js"></script>
</head>
<body>
	<?php
  $user = $_SESSION['username'];
  $pwd = $_SESSION['password'];

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
                include 'exam_header.php';
  ?>




<section class="content">
	  <h2 id="ExTitle">WELCOME TO MINES PROGRAMMING ADMISSION EXAM</h2>
  <p>
Please read the following instructions carefully:

<br><br>

This exam is the last step of your admission process. It has 10
questions and you need to have a total of 8 correct answer to pass. This exam
consists of 5 JavaScript and 5 PHP questions. It does not matter
the number of question answered in each category, you just need a total of
8 correct answers.
<br><br>
Whenever you are ready, click the button below to start the exam.
  </p>
	<div class='buttons'>
	<a href="exam.php" class="pure-button pure-button-primary">Start Exam</a>
</div>
</section>


</body>
</html>
