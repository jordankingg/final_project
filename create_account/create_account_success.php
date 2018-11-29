<!DOCTYPE html>
<head>
	<title>Learn Web Programming</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
  <script src="../script.js"></script>
</head>
<body>
<h1 id="title">Your account has been created!</h1>
<?php
$servername = "localhost";
$username = "user";
$password = "password";
$database = "Final";

$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$timesubmit = $_POST['timesubmit'];

$stmt_user_exists = "SELECT * FROM userInfo WHERE firstname='$firstname' AND email='$email' AND time_='$timesubmit'";
$user_exists = mysqli_query($conn, $stmt_user_exists);
$user_count = mysqli_num_rows($user_exists);
$user_exists->close();

if ($user_count == 0) {
    $user_orders = $conn->prepare("INSERT INTO userInfo (lastname, firstname, email, password, username, time_) VALUES (?, ?, ?, ?, ?, ?)");
    $user_orders->bind_param("ssssss", $lastname, $firstname, $email, $password, $username, $timesubmit);
    $user_orders->execute();
    $user_orders->close();
}
?>
</div>
</body>
</html>
