<?php
session_start();
?>
<!DOCTYPE html>
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

$user_id = $_GET['user_id'];
$password_reset_token = $_GET['password_reset_token'];

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

if ($user_count == 1 and $user_exists['password_reset_token'] == $password_reset_token) {
    $sql_update = "UPDATE userInfo SET password_reset_token='' WHERE id='{$user_id}'";

    if (mysqli_query($conn, $sql_update)) {
        $_SESSION['id'] = $user_id;
        echo "<section class='content'>";
        echo "<div id='password_reset_form' class='pure-g'>
          <div class='pure-u-1-3'></div>
          <div class='pure-u-1-3'>
          <p> Enter your new password below. </p>
              <form data-parsley-validate='' id='password_reset' class='pure-form-aligned' method='post' action='forgot_password_complete.php'>
                  <fieldset>
                  <div class='pure-control-group'>
                      <input data-parsley-minlength='8' id='password' name='password' type='password' data-parsley-minlength-message='Your password must be at least 8 characters!' required>
                  </div>
                  </fieldset>
                  <br>
                  <div class='buttons'>
                      <input class='pure-button pure-button-primary' id='user_submit' name='submit' type='submit' value='Submit'>
                  </div>
              </form>
              </div>
              <div class='pure-u-1-3'></div>
          </div>";
    }
} else {
    echo "<section class='content_center'>";
    echo "Sorry, this was a bad link. Please try again! <br><br> Please click <a href='../index.php'>here</a> to return to the home page.";
}

mysqli_close($conn);

?>
</section>
</body>
</html>
