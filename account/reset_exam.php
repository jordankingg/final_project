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
$sql_update = "UPDATE userInfo SET num_correct_quest=-1, num_wrong_quest=-1 WHERE id='{$user_id}'";

if (mysqli_query($conn, $sql_update)) {
    header('Location: my_account.php');
}

?>

<?php ?>
