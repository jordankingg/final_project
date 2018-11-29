<!DOCTYPE html>
<head>
	<title>Learn Web Programming</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.js"></script>
	<script src="../script.js"></script>
</head>
<body>
<h1 id="title">Create Account</h1>
<div id="create_account">
<<<<<<< HEAD
    <form data-parsley-validate="" id="create_account_form" method="post"
		action="create_account_success.php" onsubmit="timeSubmit()">
=======
    <form data-parsley-validate="" id="create_account_form" method="post" action="create_account_page">
>>>>>>> eeee1bd11f771aa2a7f69b79e1747ba0f16ed822
<fieldset>
        <label for="username">Username: </label>
        <input id="username" name="username" type="text"
        required>
        <br><br>
        <label for="firstname">First Name: </label>
        <input id="firstname" name="firstname" type="text"
        data-parsley-type="alphanum"
        required>
        <br><br>
        <label for="lastname">Last Name: </label>
        <input id="lastname" name="lastname" type="text"
        data-parsley-type="alphanum"
        required>
        <br><br>
        <label for="email">Email: </label>
        <input id="email" name="email" type="text" data-parsley-type="email"
        data-parsley-email-message="Sorry, that doesn't look like an email. Please try again."
        required>
        <br><br>
        <label for="password">Password: </label>
        <input data-parsley-minlength="8" id="password" name="password" type="password"
        data-parsley-minlength-message="Your password must be at least 8 characters!"
        required>
				<input id="timesubmit" type="text" name="timesubmit"/>
</fieldset>
        <input id="reset" name="reset" type="reset" value="Reset">
        <input id="user_submit" name="submit" type="submit" value="Submit">
    </form>
</div>
</div>
</body>
</html>
