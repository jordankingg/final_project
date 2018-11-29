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
    //gmail username: exam.csci445@gmail.com
    //gmail password: jeffpaone1
    /*
        $mail = new PHPMailer\PHPMailer\PHPMailer();
    
        // Send mail using Gmail
    
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 465; // set the SMTP port for the GMAIL server
        $mail->Username = "exam.csci445@gmail.com"; // GMAIL username
        $mail->Password = "jeffpaone1"; // GMAIL password
    
    
        // Typical mail data
        $mail->AddAddress($email, $firstname . " " . $lastname);
        $mail->SetFrom("exam.csci445@gmail.com", "Exam CSCI445");
        $mail->Subject = "Please confirm your exam account!";
        $mail->Body = "Hi";
    
        try {
            $mail->Send();
            echo "Success!";
        } catch (Exception $e) {
            // Something went bad
            echo "Fail :(";
        }*/


    // the message
    $msg = "First line of text\nSecond line of text";

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 70);

    // send email
    mail($email, "My subject", $msg);



    echo "<section class='heading'>
		<h1 id='title'>Your account has been created!</h1>
		</section>
		<section class='content'>
			<p>Please check your email to follow the link to activate your account!</p>
			<p>Once your account has been activated, click <a href='../index.php'>here</a> to return to the home page to log in.</p>
		</section>";
} else {
    echo "	<section class='heading'>
	<h1 id='title'>Create account unsuccessful.</h1>
	</section>
	<section class='content'><p>Please try again!</p> </section>";
}
?>
</div>
</body>
</html>
