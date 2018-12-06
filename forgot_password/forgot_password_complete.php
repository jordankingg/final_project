<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
  <script src="../script.js"></script>
</head>
<body>
	<section class="heading">
<h1 id="title">Reset Password</h1>
</section>

<?php

$new_password = $_POST['password'];
$user_id =  $_SESSION['id'];

$servername = "localhost";
$username = "user";
$password = "password";
$database = "Final";
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$exists_sql = "SELECT * FROM userInfo WHERE id='{$user_id}'";
$user_exists_query = mysqli_query($conn, $exists_sql);
$user_count = mysqli_num_rows($user_exists_query);
$user_exists = mysqli_fetch_array($user_exists_query);

if ($user_count == 1) {
    $sql_update = "UPDATE userInfo SET password='{$new_password}' WHERE id='{$user_id}'";

    if (mysqli_query($conn, $sql_update)) {
        echo "<section class='content_center'>";
        echo "<p>Your password has successfully been changed! Please click <a href='../index.php'>here</a> to return to the home page to log in.</p>";
    }
} else {
    echo "<section class='content_center'>";
    echo "Sorry, we weren't able to change your password.. Please try again! <br><br> Please click <a href='../index.php'>here</a> to return to the home page.";
}

mysqli_close($conn);

?>
</section>
</body>
</html>
