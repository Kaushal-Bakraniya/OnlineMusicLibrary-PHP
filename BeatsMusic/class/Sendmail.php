<?php

    $receiver = "To:".$_REQUEST["rec"];

    $subject = "Welcome To Beats Music";

    $body = "Hello ".$_REQUEST["nm"].", Welcome To BeatsMusic.org";

    $sender = "From:kbakraniya603@rku.ac.in";

    if(mail($receiver,$subject,$body,$sender))
    {
        echo "<script>alert('Welcome to beatsMusic')</script>";
        echo "<script>window.location='../LoginPage.php'</script>";
    }
    else
    {
        echo "<script>alert('Welcome to beatsMusic But Not Working')</script>";
        echo "<script>window.location='../LoginPage.php'</script>";
    }

?>