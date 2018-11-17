<!DOCTYPE html>
<head>
	<title>Learn Web Programming</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.js"></script>
</head>
<body>
<h1 id="title">Log In</h1>
<div id="log_in">
    <form data-parsley-validate="" id="log_in_form" method="post" action="">
        <label for="username">Username: </label>
        <input id="username" name="username" type="text"
        required>
        <br><br>
        <label for="password">Password: </label>
        <input data-parsley-minlength="8" id="password" name="password" type="text"
        data-parsley-minlength-message="Your password must be at least 8 characters!"
        required>
        <br><br>
        <input id="reset" name="reset" type="reset" value="Reset">
        <input id="user_submit" name="submit" type="submit" value="Submit">
    </form>
</div>
</div>
</body>
</html>
