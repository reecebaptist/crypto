
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="text-center">Image Encryption & Decryption</h1>
<hr>
<div class="row">
	<div class="col-md-9 col-md-offset-2">
    <?php
    if(isset($_POST['submit'])) {
        session_start();
    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con,'crypto');

    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $mobile=$_POST['mobile'];
    $pass = $_POST['password'];
    $hash = password_hash($pass,PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $s = "SELECT * FROM usertable WHERE uname = '$uname'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num==1) {
        echo "<h4 align='center'><font color='red'>Username already present!</font><br><br></h4>";

    }else {
        $reg = "INSERT INTO usertable(name,email,uname,mobile,password) VALUES ('$name','$email','$uname','$mobile','$hash')";
        mysqli_query($con,$reg);
        echo "<h4 align='center'><font color='green'>Registered successfully!</font><br><br></h4>";
    }


    }
    ?>
    </div>
</div>
<div class="col-md-9 col-md-offset-2">
        <form role="form" action='#' method="post">
        <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="uname">Name</label>
                    <input type="text" class="form-control" id="name" name="name" maxlength="10" placeholder="Enter your full name" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="uname">Email</label>
                    <input type="email" class="form-control" id="email" name="email" maxlength="25" placeholder="Enter your email" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="uname">Username</label>
                    <input type="text" class="form-control" id="uname" name="uname" maxlength="10" placeholder="Enter your username" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="uname">Mobile No.</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" placeholder="Enter your mobile no." required="">
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" maxlength="10" placeholder="Enter your password" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Register</button>
                </div>
            </div>
            </form>
        
        Already have an account? <a href='login.php'>Click here</a>
	</div>
</div>
</body>
</html>