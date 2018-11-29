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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.js"></script>
</head>
<body>
	<?php
  $user = $_SESSION['username'];
  $pwd = $_SESSION['password'];

  echo $username;
  echo $password;

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
  <h1 id="ExTitle">WELCOME TO MINES ADMISSION EXAM</h1>
  <p>
Please read the following carefully.
This exam is the last step of your admission process. It has 10
questions you need to have 8 corrects answer to pass. This exam
consists of 5 Math and 5 English questions. It does not matter
the numbers of question answered in each category you just need
8 corrects answers.
Whenever you are ready just click the continue button to start the exam.
  </p>
  <div id="continue"> CONTINUE
<form data-parsley-validate="" id="exam" method="post" action="exam.php">
  </div>

</body>
</html>
