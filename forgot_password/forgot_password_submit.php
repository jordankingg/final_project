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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


$servername = "localhost";
$username = "user";
$password = "password";
$database = "Final";
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

$stmt_user_exists = "SELECT * FROM userInfo WHERE email='$email'";
if (mysqli_query($conn, $stmt_user_exists)) {
    $user_exists = mysqli_query($conn, $stmt_user_exists);
    $user_count = mysqli_num_rows($user_exists);
    $user_info = mysqli_fetch_array($user_exists);
    $user_exists->close();
    if ($user_count == 1) {
        $user_id = $user_info['id'];
        $password_reset_token = bin2hex(openssl_random_pseudo_bytes(10));

        $sql_update = "UPDATE userInfo SET password_reset_token='{$password_reset_token}' WHERE id='{$user_id}'";
        mysqli_query($conn, $sql_update);

        //gmail username: exam.csci445@gmail.com
        //gmail password: jeffpaone1

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
          //  $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'exam.csci445@gmail.com';                 // SMTP username
            $mail->Password = 'jeffpaone1';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('exam.csci445@gmail.com', 'Mines Admission Exam');
            $mail->addAddress($email, "{$user_info['firstname']} {$user_info['lastname']}");     // Add a recipient

            $mail->isHTML(true);                                // Set email format to HTML
            $prefix = "192.168.64.2/csci445/final_project/forgot_password/";
            $link = "http://{$prefix}forgot_password_email.php?user_id={$user_id}&password_reset_token={$password_reset_token}";
            $mail->Subject = 'Mines Admission Exam - Forgot Password';
            $mail->Body    = "Hello {$user_info['firstname']}, it looks like you forgot your password. Please click <a href='{$link}'>here</a> to reset and change your password.";
            $mail->AltBody = "Hello {$user_info['firstname']}, please open the following link to reset your password. {$link}";

            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }


        echo "<section class='heading'>
		<h1 id='title'>Password Reset</h1>
		</section>
		<section class='content'>
    <p>If the email entered is in the system, you should recieve an email to reset your password.</p>
			<p>If you don't see it in your inbox, please check your junk folder!</p>
			<p>Once your password has been reset, click <a href='../index.php'>here</a> to return to the home page to log in.</p>
		</section>";
    } else {
        echo "<section class='heading'>
  <h1 id='title'>Password Reset</h1>
  </section>
  <section class='content'>
  <p>If the email entered is in the system, you should recieve an email to reset your password.</p>
    <p>If you don't see it in your inbox, please check your junk folder!</p>
    <p>Once your password has been reset, click <a href='../index.php'>here</a> to return to the home page to log in.</p>
  </section>";
    }
}
?>
</div>
</body>
</html>
