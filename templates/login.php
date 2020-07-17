<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="text-center">Image Encryption & Decryption</h1>
<hr>
<br>
	<div class="row justify-content-center">
	<div class="col-md-9 col-md-offset-2">
		<?php
			if(isset($_POST['sendopt'])) {
                require('textlocal.class.php');
                $con = mysqli_connect('localhost','root','');

                mysqli_select_db($con,'crypto');

                $uname = $_POST['uname'];
                $pass = $_POST['password'];
                
                $s = "SELECT * FROM usertable WHERE uname= '$uname'";

                $result = mysqli_query($con, $s);
                $c=0;
                $flag=0;
                $num = mysqli_num_rows($result);
                if($num==1) {
                    $_SESSION['uname'] = $uname;
                    //$_SESSION['password'] = $pass;

                    $result = $con->query($s);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if(password_verify($pass,$row['password']))
                            {
                                $flag=1;
                                $c=$row['mobile'];
                            }
                    }
                }
            }
    else
    {
        $flag=1;
        echo "<font color='red'>Invalid Username or Password!</font>";
    }
    if($flag==0)
        {
            echo "<font color='red'>Invalid Username or Password!</font>";
        }
        
        if($c!=0)
        {
            define('API_KEY','b7Y/DJRV9Sg-747fd8AUais8QW7MIiXGHVelYz9xqK');
                
				$textlocal = new Textlocal(false, false, API_KEY);
                $numbers = array($c);
				$sender = 'TXTLCL';
				$otp = mt_rand(10000, 99999);
                $message = "Hello " . $_POST['uname'] . " This is your OTP: " . $otp;
                $result = $textlocal->sendSms($numbers, $message, $sender);
                setcookie('otp', $otp);
				echo "<font color='green'>OTP successfully sent!</font>";
        }
}
        if(isset($_POST['verifyotp'])) { 
    $otp = $_POST['otp'];
    if($_COOKIE['otp'] == $otp) {
        header('location:http://127.0.0.1:5000/');
    } else {
        echo "<font color='red'>Please enter correct OTP.</font>";
    }
}
		?>
	</div>
    <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="uname">Username</label>
                    <input type="text" class="form-control" id="uname" name="uname" value="" maxlength="10" placeholder="Enter your username" required="">
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