<script type="text/javascript">
    window.setTimeout('checkIfContinue()', 10*60*1000);  //10 minutes

    function checkIfContinue()
    {

            window.location = '../logout.php';

    }
</script>
<section class="heading">
  <div class="pure-g">
  <div class="pure-u-1-3"></div>
<h1 class="pure-u-1-3" id="ExTitle">Mines Admission Exam</h1>
<div class="pure-u-1-3" id="head_bar">
<div >
<a class="pure-button pure-button-primary" href="../account/my_account.php">My Account</a>
<a class="pure-button pure-button-primary" href="../logout.php?token=<?= $_SESSION['user_token'] ?>">Log Out</a>
</div>
</div>
</div>
</section>
