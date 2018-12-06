<?php
session_start();
$inactive = 600;

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['start'];
    if ($session_life > $inactive) {
        header("Location: ../logout.php");
    }
}
$_SESSION['timeout'] = time();
?>
<!DOCTYPE html>
<head>
	<title>My Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css" />
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
  <script src="http://parsleyjs.org/dist/parsley.js"></script>
  <script src="../script.js"></script>
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

                $user_sql = "SELECT * FROM userExamInfo WHERE user_id='{$_SESSION['user_id']}'";
                $user_exists_query = mysqli_query($conn, $user_sql);
                $user_exam_info = mysqli_fetch_array($user_exists_query);


        $numQuestionsCorrect = $user_exam_info['num_total_correct_quest'];
        $numQuestionsWrong = $user_exam_info['num_total_wrong_quest'];
        if ($numQuestionsWrong == -1) {
            $numQuestionsWrong = 0;
        }
        if ($numQuestionsCorrect == -1) {
            $numQuestionsCorrect = 0;
        }

        $user_exists_query->close();

include '../exam/exam_header.php';
  ?>

<section class="content">
<h2>My Account</h2>
<table class="pure-table" id="account_info">
  <tr>
    <td class="boldme">Name:</td>
    <td><?php echo "{$user_info['firstname']} {$user_info['lastname']}"; ?></td>
  </tr>
  <tr>
    <td class="boldme">Username:</td>
    <td><?php echo "{$user_info['username']}"; ?></td>
  </tr>
  <tr>
    <td class="boldme">Email:</td>
    <td><?php echo "{$user_info['email']}"; ?></td>
  </tr>
</table>
<br>
<hr>
<h2>Exam Information</h2>
<table class="pure-table" id="exam_info">
  <tr>
    <td class="boldme">Number of questions answered correctly:</td>
    <td><?php echo $numQuestionsCorrect; ?></td>
  </tr>
  <tr>
    <td class="boldme">Number of questions answered incorrectly:</td>
    <td><?php echo $numQuestionsWrong; ?></td>
  </tr>
</table>
<br>
<hr>
<p>If you'd like to restart your exam, click the button below.</p>
<div class="buttons">
<a class="pure-button pure-button-primary" href="reset_exam.php">Reset Exam</a>
</div>
<br>
<hr>
<p>If you'd like to close your account, click the button below.</p>
<p><b>NOTE:</b> This action is irreversible and your account cannot be recovered if closed. If you close your account, your exam progress will be permanently deleted and you will be logged out immediately.</p>
<div class="buttons">
<a class="pure-button pure-button-primary" href="close_account.php?token=<?= $_SESSION['user_token'] ?>" onclick="return confirm('Are you sure you want to close your account?');">Close Account</a>
</div>
<br>
<hr>
<div class="buttons">
	<br>
<a class="pure-button pure-button-primary" href="../exam/exam_index.php">Back</a>
<br>
</div>
<?php


?>
</section>
</body>
</html>
