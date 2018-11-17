<!DOCTYPE html>
<head>
	<title>Learn Web Programming</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
  <script src="script.js"></script>
</head>
<body>
<h1 id="title">Your account has been created!</h1>
<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt_order_exists = "SELECT * FROM ORDERS WHERE product='$products' AND customer_id='$ex[cust_id]' AND order_time='$timesubmit'";
$order_exists = mysqli_query($conn, $stmt_order_exists);
$order_count = mysqli_num_rows($order_exists);
$order_exists->close();


$new_quantity = ($p["quantity"] - $quantity);
$customerID = $ex["cust_id"];
$prod_val_name = $p["val_name"];
if ($order_count == 0) {
    $stmt_orders = $conn->prepare("INSERT INTO ORDERS (product, customer_id, product_cost, quantity, tax, donate, order_time) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt_orders->bind_param("sididds", $products, $customerID, $cost, $quantity, $tax, $donation, $timesubmit);
    $stmt_orders->execute();
    $stmt_orders->close();

    $updateQ = "UPDATE PRODUCTS
SET quantity = '$new_quantity'
WHERE val_name = '$prod_val_name'";
    $conn->query($updateQ);
}


?>
</div>
</body>
</html>
