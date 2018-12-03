<?php
session_start();
?>
<!DOCTYPE html>
<head>
	<title>Learn Web Programming</title>
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

        $user_sql = "SELECT * FROM userInfo WHERE username='{$user}'";
        $user_exists_query = mysqli_query($conn, $user_sql);
        $user_info = mysqli_fetch_array($user_exists_query);

        $_SESSION['user_id'] = $user_info['id'];

        $user_exists_query->close();


  ?>
		<section class="heading">
      <div class="pure-g">
      <div class="pure-u-1-3"></div>
  <h1 class="pure-u-1-3" id="ExTitle">Mines Admission Exam</h1>
  <div class="pure-u-1-3" id="head_bar">
    <div >
    <a class="pure-button pure-button-primary" href="../account/my_account.php">My Account</a>
    <a class="pure-button pure-button-primary" href="">Log Out</a>
  </div>
</div>
</div>
</section>
<section class="content">
<?php echo "<h2>Welcome, {$user_info['firstname']} </h2>"; ?>
</section>
</body>
</html>
