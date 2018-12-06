<!DOCTYPE html>
<head>
	<title>Create Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/af.js"></script>

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
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$timesubmit = $_POST['timesubmit'];

$stmt_user_exists = "SELECT * FROM userInfo WHERE firstname='$firstname' AND username='$username' AND email='$email' AND time_='$timesubmit'";
$user_exists = mysqli_query($conn, $stmt_user_exists);
$user_count = mysqli_num_rows($user_exists);
$user_exists->close();

if ($user_count == 0) {
    $token1 = bin2hex(openssl_random_pseudo_bytes(10));
    $token2 = bin2hex(openssl_random_pseudo_bytes(10));
    $has_Activated = 0;
    $questions = -1;
    $user_orders = $conn->prepare("INSERT INTO userInfo (lastname, firstname, email, password, username, time_, token1, token2, has_Actived) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $user_orders->bind_param("ssssssssi", $lastname, $firstname, $email, $password, $username, $timesubmit, $token1, $token2, $has_Activated);
    $user_orders->execute();
    $user_orders->close();


    $get_id_sql = "SELECT * FROM userInfo WHERE email='$email'";
    $get_id_query = mysqli_query($conn, $get_id_sql);
    if (!$get_id_query) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $user_info = mysqli_fetch_array($get_id_query);
    $user_id = $user_info['id'];
    $question = $conn->prepare("INSERT INTO userExamInfo (user_id, num_total_correct_quest, num_total_wrong_quest) VALUES (?, ?, ?)");
    $question->bind_param("iii", $user_id, $questions, $questions);
    $question->execute();
    $question->close();
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
        $mail->addAddress($email, $firstname . " " . $lastname);     // Add a recipient

        $mail->isHTML(true);                                // Set email format to HTML
        $prefix = "192.168.64.2/csci445/final_project/";
        $link = "http://{$prefix}authenticate_account.php?username={$username}&token1={$token1}&token2=${token2}";
        $mail->Subject = 'Mines Admission Exam Confirmation Email';
        $mail->Body    = "Hello {$firstname}, please click <a href='{$link}'>here</a> to confirm your account.";
        $mail->AltBody = "Hello {$firstname}, please open the following link to confirm your account. {$link}";

        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }


    echo "<section class='heading'>
		<h1 id='title'>Your account has been created!</h1>
		</section>
		<section class='content'>
			<p>Please check your email to follow the link to activate your account! If you don't see it in your inbox, please check your junk folder!</p>
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
