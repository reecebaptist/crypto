<?php

    session_start();
    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con,'crypto');

    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $mobile=$_POST['mobile'];
    $pass = $_POST['password'];
    
    $email = $_POST['email'];

    $s = "SELECT * FROM usertable WHERE uname = '$uname'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num==1) {
        echo "Already Present!";

    }else {
        $reg = "INSERT INTO usertable(name,email,uname,mobile,password) VALUES ('$name','$email','$uname','$mobile','$hash')";
        mysqli_query($con,$reg);
        $_SESSION['uname']=$uname;
    }


    ?>