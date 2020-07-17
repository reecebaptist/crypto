
<html>
<body>
<?php
if(isset($_POST['sendopt'])) {
$password = $_POST['password'];
$hash = password_hash('1234',PASSWORD_DEFAULT);

if (password_verify($password, $hash)) {
    echo "Let me in, I'm genuine!";
}
}

?>
<div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="uname">Name</label>
                    <input type="text" class="form-control" id="uname" name="uname" value="" maxlength="10" placeholder="Enter your name" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="" maxlength="10" placeholder="Enter your password" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendopt" class="btn btn-lg btn-success btn-block">Send OTP</button>
                </div>
            </div>
            </form>
            <form method="POST" action="">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="otp">OTP</label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" maxlength="5" required="">
                </div>
            </div>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="verifyotp" class="btn btn-lg btn-info btn-block">Log In</button>
                </div>
            </div>
        </form>
        Don't have an account? <a href='register.php'>Click here</a>
	</div>
</div>
</body>
</html>