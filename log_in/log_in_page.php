<!DOCTYPE html>
<head>
	<title>Learn Web Programming</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
  <script src="http://parsleyjs.org/dist/parsley.js"></script>
</head>
<body>
<section class="heading">
<h1 id="title">Log In</h1>
</section>
<section class="content">
<div id="log_in">
    <form data-parsley-validate="" id="log_in_form" method="post" action="log_in_complete.php">
        <label for="username">Username: </label>
        <input id="username" name="username" type="text"
        required>
        <br><br>
        <label for="password">Password: </label>
        <input data-parsley-minlength="8" id="password" name="password" type="password"
        data-parsley-minlength-message="Your password must be at least 8 characters!"
        required>
        <br><br>
        <input class="button_input" id="reset" name="reset" type="reset" value="Reset">
        <input class="button_input" id="user_submit" name="submit" type="submit" value="Submit">
    </form>
		<br>
		<a href="../index.php"><button id="back" >Back</button></a>
</div>
</div>
</section>
</body>
</html>
