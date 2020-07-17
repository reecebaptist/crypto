<?php

session_start();
                $con = mysqli_connect('localhost','root','');

                mysqli_select_db($con,'crypto');

                $uname = $_POST['uname'];
                $pass = $_POST['password'];
                
                $s = "SELECT * FROM usertable WHERE uname= '$uname'";

                $result = mysqli_query($con, $s);

                $num = mysqli_num_rows($result);
                
                if($num==1) {
                    $_SESSION['uname'] = $uname;
                    $_SESSION['password'] = $pass;
                    
                    $result = $con->query($s);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        
                                 $_SESSION['mobile']=$row["mobile"];
                    }
            }
        }else {
                echo "Invalid Username or Password";
            }

?>