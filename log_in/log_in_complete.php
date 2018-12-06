<?php
session_start();
//create a cryptographically secure token.
$userToken = bin2hex(openssl_random_pseudo_bytes(24));

//assign the token to a session variable.
$_SESSION['user_token'] = $userToken;
?>
<!DOCTYPE html>
<html lang="en">
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
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
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

      $user_sql = "SELECT * FROM userInfo WHERE username='$user' AND password='$pwd'";
      $user_query = mysqli_query($conn, $user_sql);
      $user_exists = mysqli_num_rows($user_query);
            $user_information = mysqli_fetch_array($user_query);

      if ($user_exists == 1 and $user_information['has_Actived'] == 1) {
          ?>
          <?php

          echo "<div id='log_in_successful'>";
          echo "<section class='heading'> <h1 id='title'>Thank you for logging in, " . $user_information['firstname'] . "!</h1></section>";
          echo "<section class='content'><p> You should be redirected soon! </p></section>";
          header("refresh:2;url=../exam/exam_index.php");
      } elseif ($user_exists == 1 and $user_information['has_Actived'] == 0) {
          echo "<div id='log_in_failure'>";
          echo "<section class='heading'><h1 id='title'>Login Failure</h1></section>";
          echo "<section class='content'><p>Sorry, the username and password does not match any accounts in our system.</p></section>";
          header("refresh:5;url=log_in_page.php");
      } else {
          echo "<div id='log_in_failure'>";
          echo "<section class='heading'><h1 id='title'>Login Failure</h1></section>";
          echo "<section class='content'><p>Sorry, the username and password does not match any accounts in our system.</p></section>";
          header("refresh:5;url=log_in_page.php");
      }
     ?>


</div>
</div>
</body>
</html>
