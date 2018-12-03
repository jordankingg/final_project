<?php
session_start();
?>
<!DOCTYPE html>
<head>
	<title>Learn Web Programming</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css" />
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
  ?>
		<section class="heading">
  <h1 id="ExTitle">WELCOME TO MINES ADMISSION EXAM</h1>
</section>
<section class="content">
  <p>
Please read the following instructions carefully:

<br><br>

This exam is the last step of your admission process. It has 10
questions and you need to have a total of 8 correct answer to pass. This exam
consists of 5 Math and 5 English questions. It does not matter
the number of question answered in each category, you just need a total of
8 correct answers.
<br><br>
Whenever you are ready just click the button below to start the exam.
  </p>
	<a href="exam.php"><button id="start_exam" >Start Exam</button></a>
</section>


</body>
</html>
