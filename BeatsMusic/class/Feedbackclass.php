<?php

    include("Connect.php");

    class feedback
    {
        function addFeedback($email,$uid,$feedback)
        {
            $query = "insert into feedback(Email,UID,Feedback,Status) values('$email','$uid','$feedback','Not Viewed')";

            $result = mysqli_query($GLOBALS["con"],$query);

            if($result)
            {
                echo "<script>alert('Thanks for your feedback')</script>";
                echo "<script>window.location='UserAccount.php'</script>";
            }
            else
            {
                echo "<script>alert('Something went wrong please try again')</script>";
                echo "<script>window.location='Feedback.php'</script>";
            }
        }
    }

    $feedback = new feedback();

?>