<?php

    class mail
    {
        function fdbReply($Email,$UserName)
        {
            $receiver = "To:".$Email;

            $subject = "Thanks for your feedback.";

            $body = "Thanks ".$UserName.", for taking the time to give us feedback.
            
We review ideas or suggestions that people send to us and work on them to improve the experience for everyone.

Regards,
Kaushal Bakraniya";

            $sender = "From:kbakraniya603@rku.ac.in";

            if(mail($receiver,$subject,$body,$sender))
            {
                echo "<script>alert('Thanks check the Email')</script>";
            }
        }

        function sendOTP($Email,$UserName,$OTP)
        {
            $receiver = "To:".$Email;

            $subject = "Verify your OTP";

            $body = "Hello ".$UserName.", Your OTP Is ".$OTP;

            $sender = "From:kbakraniya603@rku.ac.in";

            if(mail($receiver,$subject,$body,$sender))
            {
                $query = "insert into otp_tbl values('$OTP','$Email')";

                $result = mysqli_query($GLOBALS["con"],$query);

                $_SESSION["tempmail"] = $Email;

                echo "<script>alert('OTP Sended Successfully')</script>";
                echo "<script>window.location='VerifyOTP.php'</script>";
            }
            else
            {
                echo "<script>alert('Something Went Wrong Please Try Again')</script>";
            }
        }
    }

    $mail = new mail();

?>