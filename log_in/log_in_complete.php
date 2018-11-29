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
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];

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

      $user_sql = "SELECT * FROM userInfo WHERE username='$username' AND password='$password'";
      $user_exists = mysqli_num_rows(mysqli_query($conn, $user_sql));
      echo $user_exists;
      if ($user_exists) {
          echo "The user exists!";
      } else {
          echo "Sorry, please try again!";
      }
     ?>
<h1 id="title">Log In</h1>
<div id="log_in">


</div>
</div>
</body>
</html>
