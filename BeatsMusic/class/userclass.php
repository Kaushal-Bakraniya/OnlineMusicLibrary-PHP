<?php 

    include("Connect.php");

    include("MailClass.php");

    class user
    {

        function insert($UserName,$Email,$Gen,$Type,$ProfilePicture,$Bio,$Password)
        {
            $query = "insert into users values(null,'$UserName','$Email','$Gen','$Type','$ProfilePicture','$Bio','$Password')";

            $result = mysqli_query($GLOBALS["con"],$query);

            if($result)
            {
                echo "<script>window.location='Class/SendMail.php?rec=".$Email."&nm=".$UserName."'</script>";
            }
            else
            {
                echo "<script>alert('Please Enter Unique Email Address')</script>";
                unlink($ProfilePicture);
                echo "<script>window.location='LoginPage.php'</script>";
            }
        }

        function logIn($Email,$Password)
        {
            $query = "select * from users where Email='$Email' and Password='$Password'";

            $result = mysqli_query($GLOBALS["con"],$query);

            $rowsSelected = mysqli_num_rows($result);

            if($rowsSelected > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $_SESSION["ID"] = $row["ID"];
                    $_SESSION["UserName"] = $row["UserName"];
                    $_SESSION["Type"] = $row["Type"]; 
                    $_SESSION["ProfilePicture"] = $row["ProfilePicture"];
                }
                
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.location='index.php'</script>";
            }
            else
            {
                echo "<script>alert('Login Failed')</script>";
                echo "<script>window.location='LoginPage.php'</script>";
            }
        }

        function editUser($UserName,$Email,$ProfilePicture,$Bio,$Password,$ID)
        {
            $query = "update users set UserName='$UserName',Email='$Email',ProfilePicture='$ProfilePicture',Bio='$Bio',Password='$Password' where ID='$ID'";

            $result = mysqli_query($GLOBALS["con"],$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function forgotPassword($Email)
        {
            $query = "select UserName,Email from users where Email='$Email'";

            $result = mysqli_query($GLOBALS["con"],$query);
            
            if(mysqli_num_rows($result) == 1)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $UserName = $row["UserName"];
                }

                $OTP = rand(11111,99999);

                $mail = new mail();
                
                $mail -> sendOTP($Email,$UserName,$OTP);
            }
            else
            {
                echo "<script>alert('No Registered Email Found')</script>";
            }
        }

        function verifyOTP($OTP,$mail)
        {
            $query = "select * from otp_tbl where Email='$mail'";

            $result = mysqli_query($GLOBALS["con"],$query);

            $count = mysqli_num_rows($result);

            if($count > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    if($row["OTP"] == $OTP)
                    {
                        $count = 1;
                    }
                }

                if($count == 1)
                {
                    $_SESSION["tmail"] = $mail;

                    echo "<script>alert('OTP Verified')</script>";
                    echo "<script>window.location='updatepassword.php'</script>";
                }
                else
                {
                    $query = "delete from otp_tbl where Email='$mail'";
                    
                    $result = mysqli_query($GLOBALS["con"],$query);

                    echo "<script>alert('OTP Verification Failed Please Try Again')</script>";
                    echo "<script>window.location='ForgotPassword.php'</script>";
                }
            }
        }

        function updatePassword($Pwd,$Email)
        {
            $query = "update users set Password='$Pwd' where Email='$Email'";

            $result = mysqli_query($GLOBALS["con"],$query);

            if($result)
            {
                session_destroy();

                $query = "delete from otp_tbl where Email='$Email'";

                $result = mysqli_query($GLOBALS["con"],$query);

                echo "<script>alert('Password Updated Please Log In')</script>";
                echo "<script>window.location='LoginPage.php'</script>";
            }
        }

        function deleteUser($id)
        {
            $res = mysqli_query($GLOBALS["con"],"select Type from users where ID='$id'");

            echo $res;
        }

    }

    $user = new user();

?>