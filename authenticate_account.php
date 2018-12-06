<!DOCTYPE html>
<head>
	<title>Account Confirmation</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
  <script src="script.js"></script>
</head>
<body>
	<section class="heading">
<h1 id="title">Account Confirmation</h1>
</section>
<section class="content_center">
<?php

$user = $_GET['username'];
$token1 = $_GET['token1'];
$token2 = $_GET['token2'];

$servername = "localhost";
$username = "user";
$password = "password";
$database = "Final";
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$exists_sql = "SELECT * FROM userInfo WHERE username='{$user}'";
$user_exists_query = mysqli_query($conn, $exists_sql);
$user_count = mysqli_num_rows($user_exists_query);
$user_exists = mysqli_fetch_array($user_exists_query);

if ($user_count == 1 and $user_exists['has_Actived'] == 0 and $user_exists['token1'] == $token1 and $user_exists['token2'] == $token2) {
    $sql_update = "UPDATE userInfo SET has_Actived=1 WHERE username='{$user}'";

    if (mysqli_query($conn, $sql_update)) {
        echo "Your account has been confirmed! <br><br> Please click <a href='index.php'>here</a> to return to the home page to log in.";
    } else {
        echo "Sorry, we weren't able to confirm your account!";
    }
} else {
    if ($user_count == 1 and $user_exists['has_Actived'] == 1) {
        echo "It looks like you've already confirmed your account! <br><br> Please click <a href='index.php'>here</a> to return to the home page to log in.";
    } else {
        echo "Sorry, we weren't able to find your account to confirm! <br><br> Please click <a href='index.php'>here</a> to return to the home page.";
    }
}
mysqli_close($conn);

?>
</section>
</body>
</html>
