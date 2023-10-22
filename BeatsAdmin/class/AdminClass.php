<?php

$GLOBALS["con"] = mysqli_connect("localhost", "root", "", "beatsdb");

class admin
{
    function logIn($unm, $pwd)
    {
        $result = mysqli_query($GLOBALS["con"], "select * from adminusers where UserName='$unm' and Password='$pwd'");

        $count = mysqli_num_rows($result);

        if ($count == 1) 
        {
            $_SESSION["unm"] = "Admin";
            echo "<script>window.location='index.php'</script>";
        }
        else
        {
            echo "<script>alert('Access Denied')</script>";
            echo "<script>window.location='LoginPage.php'</script>";
        }
    }

    function select($query)
    {
        $result = mysqli_query($GLOBALS["con"],$query);

        return $result;
    }

    function sendReply($mail,$body)
    {
        $receiver = "To:".$mail;

        $subject = "Thanks for your feedback.";

        $sender = "kbakraniya603@rku.ac.in";
   
        if(mail($receiver,$subject,$body,$sender))
        {
            echo "<script>alert('Reply Sended Successfully')</script>";
            echo "<script>window.location='UserFeedbacks.php'</script>";
        }

    }
}


$admin = new admin();

?>