<!DOCTYPE html>
<head>
    <title>
        HOME
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php 
    if(isset($_POST['encrypt']))
    {
        header('location:http://127.0.0.1:5000/');
    }
    if(isset($_POST['decrypt']))
    {
        header('location:/decrypt.php');
    }
?>
<div class="container">
<h1 class="text-center">Image Encryption & Decryption</h1>
<hr>
<br><br><br><br><br><br>
<form role="form" action='#' method="post">
    <div class="row">
    <div class="col-sm-9 form-group">
        <button align="center" type="submit" name="encrypt" class="btn btn-lg btn-success btn-block"><font color="white">Encryption</font></button>
    </div>
    </div>
    <br><br><br><br>
    <div class="row">
    <div class="col-sm-9 form-group">
        <button type="submit" name="decrypt" href="decrpyt.php" class="btn btn-lg btn-success btn-block">Decryption</button>
    </div>
    </div>
</form>
<a href="\Testing 2\login.php"> Hello</a>
<br><br>
<h4 class="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout </a></h1>


</div>
</body>
</html>