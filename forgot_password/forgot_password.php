<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
</head>
<body>
    <section class="content">
        <h1 id="title">Forgot Password?</h1>
        <div id="log_in" class="pure-g">
            <div class="pure-u-1-3"></div>
            <div class="pure-u-1-3">
                <form data-parsley-validate="" id="forgot_password_form" class="pure-form-aligned" method="post" action="forgot_password_submit.php">
                    <fieldset>
                        <div class="pure-control-group">

                            <input id="email" name="email" data-parsley-type="email" placeholder="Email" type="text" required>
                        </div>
                    </fieldset>
                    <br>
                    <div class="buttons">
                        <input class="pure-button pure-button-primary" id="user_submit" name="submit" type="submit" value="Submit">
                    </div>
                </form>
                <br>
                <div class="buttons">
                    <a href="../index.php">
                        <button class="pure-button pure-button-primary" id="back">Back</button>
                    </a>
                </div>
            </div>
            <div class="pure-u-1-3"></div>
        </div>
    </section>
</body>
</html>
