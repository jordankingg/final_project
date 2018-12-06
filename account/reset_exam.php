<?php
//Start the session as normal.
session_start();

$servername = "localhost";
$username = "user";
$password = "password";
$database = "Final";
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_id = $_SESSION['user_id'];

$sql_update = "UPDATE userExamInfo SET num_total_correct_quest=-1, num_total_wrong_quest=-1 WHERE user_id='{$user_id}'";
mysqli_query($conn, $sql_update);
if (mysqli_query($conn, $sql_update)) {
    header('Location: my_account.php');
}

?>

<?php ?>
